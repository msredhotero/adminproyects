<?php

include ('../includes/funcionesUsuarios.php');
include ('../includes/funcionesProductos.php');
include ('../includes/funcionesVentas.php');


$serviciosUsuarios  = new ServiciosUsuarios();
$serviciosProductos  = new ServiciosProductos();
$serviciosVentas  = new ServiciosVentas();

$accion = $_POST['accion'];


switch ($accion) {
    case 'login':
        enviarMail($serviciosUsuarios);
        break;
	case 'entrar':
		entrar($serviciosUsuarios);
		break;
	case 'insertarUsuario':
        insertarUsuario($serviciosUsuarios);
        break;
	case 'modificarUsuario':
        modificarUsuario($serviciosUsuarios);
        break;
	case 'registrar':
		registrar($serviciosUsuarios);
        break;
		
	case 'modificarProducto':
		modificarProducto($serviciosProductos);
		break;

	case 'traerProductoPorId':
		traerProductoPorId($serviciosProductos);
		break;


	case 'eliminarProducto':
		eliminarProducto($serviciosProductos);
		break;
		
	case 'insertarProducto':
		insertarProducto($serviciosProductos);
		break;	
	
	case 'insertarCarrito':
		insertarCarrito($serviciosVentas);
		break;
	case 'eliminarCarrito':
		eliminarCarrito($serviciosVentas);
		break;
	case 'traerPedidosDetalle':
		traerPedidosDetalle($serviciosVentas);
		break;
	case 'traerPedidosDetalleId':
		traerPedidosDetalleId($serviciosVentas);
		break;
	case 'modificarPedido':
		modificarPedido($serviciosVentas);
		break;
	case 'eliminarPedido':
		eliminarPedido($serviciosVentas);
		break;
	case 'modificarCliente';
		modificarCliente($serviciosUsuarios);
		break;
	
}

function modificarCliente($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$password	=	$_POST['password'];
	$direccion	=	$_POST['direccion'];
	$nombre		=	$_POST['nombre'];
	$apellido	=	$_POST['apellido'];
	$id			=	$_POST['id'];
	
	echo $serviciosUsuarios->modificarUsuario($id,$apellido,$password,'',$email,$nombre,'',$direccion,'','','','');
}

function traerPedidosDetalleId($serviciosVentas) {
	$idfactura		=	$_POST['idfactura'];
	$donde 			=	$_POST['donde'];
	
	$cad = 0;
	$res = $serviciosVentas->traerPedidosDetalleId($idfactura);
	
	$totalImporte = 0;
	
	while ($row = mysql_fetch_array($res)) {
		
		$totalImporte = $totalImporte + ($row[3]*$row[4]);
		
		$cad = $cad."<tr>";
		$cad = $cad."<td><img src='".$donde.$row[0]."'></td>";
		$cad = $cad."<td>".utf8_encode($row[1])."</td>";
		$cad = $cad."<td>".$row[2]."</td>";
		$cad = $cad."<td>".$row[3]."</td>";
		$cad = $cad."<td>".($row[3]*$row[4])."</td>";
		$cad = $cad."</tr>";
	}
	
	$cad = $cad.'<tr><td colspan="5" class="success">Importe Total:$ '.$totalImporte.'</td></tr>';
	
	echo $cad;
}


function traerPedidosDetalle($serviciosVentas) {
	$idcliente		=	$_POST['idcliente'];
	$idfactura		=	$_POST['idfactura'];
	$donde 			=	$_POST['donde'];
	
	$cad = 0;
	$res = $serviciosVentas->traerPedidosDetalle($idcliente,$idfactura);
	
	$totalImporte = 0;
	
	while ($row = mysql_fetch_array($res)) {
		
		$totalImporte = $totalImporte + ($row[3]*$row[4]);
		
		$cad = $cad."<tr>";
		$cad = $cad."<td><img src='".$donde.$row[0]."'></td>";
		$cad = $cad."<td>".utf8_encode($row[1])."</td>";
		$cad = $cad."<td>".$row[2]."</td>";
		$cad = $cad."<td>".$row[3]."</td>";
		$cad = $cad."<td>".($row[3]*$row[4])."</td>";
		$cad = $cad."</tr>";
	}
	
	$cad = $cad.'<tr><td colspan="5" class="success">Importe Total:$ '.$totalImporte.'</td></tr>';
	
	echo $cad;
}

function eliminarPedido($serviciosVentas) {

	$idfactura		=	$_POST['idfactura'];
	
	$resP = $serviciosVentas->eliminarPedido($idfactura);
	$resF = $serviciosVentas->eliminarFactura($idfactura);
	
	if (($resP == '') && ($resF == '')) {
		echo 'Se elimino correctamente el Pedido';	
	} else {
		echo 'Error al eliminar el Pedido';
	}
}


function modificarPedido($serviciosVentas) {
	$idpedido		=	$_POST['idpedido'];
	$idfactura		=	$_POST['idfactura'];
	$domicilio		=	$_POST['domicilio'];
	$refestado		=	$_POST['refestado'];
	$fechaentrega	=	$_POST['dtp_input2'];
	
	$resP = $serviciosVentas->modificarPedido($idpedido,$refestado,$fechaentrega);
	$resF = $serviciosVentas->modificarFactura($idfactura,$domicilio);
	
	if (($resP == '') && ($resF == '')) {
		echo 'Se modifico correctamente el Pedido';	
	} else {
		echo 'Error al modificar el Pedido';
	}
}


function insertarCarrito($serviciosVentas) {
	$refcliente		=	$_POST['refcliente'];
	$refproducto	=	$_POST['refproducto'];
	$precioventa	=	0;
	$cantidad		=	$_POST['cantidad'];
	$temporal		=	date('Y-m-d h:i:s');
	$activo			=	1;
	$ip 			=	$_SERVER['REMOTE_ADDR'];
	echo $serviciosVentas->insertarCarrito($refcliente,$refproducto,$precioventa,$cantidad,$temporal,$activo,$ip);
}

function eliminarCarrito($serviciosVentas) {
	$id		=	$_POST['id'];
	echo $serviciosVentas->eliminarCarrito($id);
}


function entrar($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	echo $serviciosUsuarios->loginUsuario($email,$pass);
}


function registrar($serviciosUsuarios) {
	$apellido			=	$_POST['apellido'];
	$password			=	$_POST['password'];
	$refroll			=	2;
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombre'];
	$telefono			=	'';
	$direccion			=	$_POST['direccion'];
	$imagen				=	'';
	$mime				=	'';
	$carpeta			=	'';
	$intentoserroneos	=	0;
	$res = $serviciosUsuarios->insertarUsuario($apellido,$password,$refroll,$email,$nombre,$telefono,$direccion,$imagen,$mime,$carpeta,$intentoserroneos);
	if ((integer)$res > 0) {
		echo '';	
	} else {
		echo $res;	
	}
}


function insertarUsuario($serviciosUsuarios) {
	$apellido			=	$_POST['apellido'];
	$password			=	$_POST['password'];
	$refroll			=	2;
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombre'];
	$telefono			=	'';
	$direccion			=	$_POST['direccion'];
	$imagen				=	'';
	$mime				=	'';
	$carpeta			=	'';
	$intentoserroneos	=	0;
	echo $serviciosUsuarios->insertarUsuario($apellido,$password,$refroll,$email,$nombre,$telefono,$direccion,$imagen,$mime,$carpeta,$intentoserroneos);
}


function modificarUsuario($serviciosUsuarios) {
	$id					=	$_POST['id'];
	$apellido			=	$_POST['apellido'];
	$password			=	$_POST['password'];
	$refroll			=	2;
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombre'];
	$telefono			=	'';
	$direccion			=	$_POST['direccion'];
	$imagen				=	'';
	$mime				=	'';
	$carpeta			=	'';
	$intentoserroneos	=	0;
	echo $serviciosUsuarios->modificarUsuario($id,$apellido,$password,$refroll,$email,$nombre,$telefono,$direccion,$imagen,$mime,$carpeta,$intentoserroneos);
}


function existeCodigoMod($serviciosProductos) {
	$id		=	$_POST['id'];
	$codigo =	$_POST['codigo'];
	echo	$serviciosProductos->existeCodigoMod($id,$codigo);
}

function existeCodigo($serviciosProductos) {
	$codigo =	$_POST['codigo'];
	echo	$serviciosProductos->existeCodigo($codigo);
}


function insertarProveedores($serviciosProductos) {
	$proveedor	=	$_POST['proveedor'];
	$direccion	=	$_POST['direccion'];
	$telefono	=	$_POST['telefono'];
	$cuit		=	$_POST['cuit'];
	$nombre		=	$_POST['nombre'];
	$email		=	$_POST['email'];
	echo	$serviciosProductos->insertarProveedores($proveedor,$direccion,$telefono,$cuit,$nombre,$email);
}


function eliminarProveedores($serviciosProductos) {
	$id			=	$_POST['id'];

	echo	$serviciosProductos->eliminarProveedores($id);
}

function modificarProveedores($serviciosProductos) {
	$id			=	$_POST['id'];
	$proveedor	=	$_POST['proveedor'];
	$direccion	=	$_POST['direccion'];
	$telefono	=	$_POST['telefono'];
	$cuit		=	$_POST['cuit'];
	$nombre		=	$_POST['nombre'];
	$email		=	$_POST['email'];
	echo	$serviciosProductos->modificarProveedores($id,$proveedor,$direccion,$telefono,$cuit,$nombre,$email);
}



function enviarMail($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	echo $serviciosUsuarios->login($email,$pass);
}

function traerCodigo($serviciosProductos) {
	$codigo =	$_POST['codigo'];
	
	$res 	= $serviciosProductos->traerCodigo($codigo);
	echo $res;
}


function traerProductoPorId($serviciosProductos) {
	$id 	=	$_POST['id'];
	
	$res 	= $serviciosProductos->traerProductoPorId($id);
	echo $res;
}

function traerProductoPorCodigo($serviciosProductos) {
	$codigo		=	$_POST['codigo'];
	
	$res 		= $serviciosProductos->traerProductoPorCodigo($codigo);
	echo $res;
}

function traerProductoPorCodigoBarra($serviciosProductos) {
	$codigobarra 	=	$_POST['$codigobarra'];
	
	$res			= $serviciosProductos->traerProductoPorCodigoBarra($codigobarra);
	echo $res;
}



function devolverImagen($nroInput) {
	
	if( $_FILES['archivo'.$nroInput]['name'] != null && $_FILES['archivo'.$nroInput]['size'] > 0 ){
	// Nivel de errores
	  error_reporting(E_ALL);
	  $altura = 100;
	  // Constantes
	  # Altura de el thumbnail en píxeles
	  //define("ALTURA", 100);
	  # Nombre del archivo temporal del thumbnail
	  //define("NAMETHUMB", "/tmp/thumbtemp"); //Esto en servidores Linux, en Windows podría ser:
	  //define("NAMETHUMB", "c:/windows/temp/thumbtemp"); //y te olvidas de los problemas de permisos
	  $NAMETHUMB = "c:/windows/temp/thumbtemp";
	  # Servidor de base de datos
	  //define("DBHOST", "localhost");
	  # nombre de la base de datos
	  //define("DBNAME", "portalinmobiliario");
	  # Usuario de base de datos
	  //define("DBUSER", "root");
	  # Password de base de datos
	  //define("DBPASSWORD", "");
	  // Mime types permitidos
	  $mimetypes = array("image/jpeg", "image/pjpeg", "image/gif", "image/png");
	  // Variables de la foto
	  $name = $_FILES["archivo".$nroInput]["name"];
	  $type = $_FILES["archivo".$nroInput]["type"];
	  $tmp_name = $_FILES["archivo".$nroInput]["tmp_name"];
	  $size = $_FILES["archivo".$nroInput]["size"];
	  // Verificamos si el archivo es una imagen válida
	  if(!in_array($type, $mimetypes))
		die("El archivo que subiste no es una imagen válida");
	  // Creando el thumbnail
	  switch($type) {
		case $mimetypes[0]:
		case $mimetypes[1]:
		  $img = imagecreatefromjpeg($tmp_name);
		  break;
		case $mimetypes[2]:
		  $img = imagecreatefromgif($tmp_name);
		  break;
		case $mimetypes[3]:
		  $img = imagecreatefrompng($tmp_name);
		  break;
	  }
	  
	  $datos = getimagesize($tmp_name);
	  
	  $ratio = ($datos[1]/$altura);
	  $ancho = round($datos[0]/$ratio);
	  $thumb = imagecreatetruecolor($ancho, $altura);
	  imagecopyresized($thumb, $img, 0, 0, 0, 0, $ancho, $altura, $datos[0], $datos[1]);
	  switch($type) {
		case $mimetypes[0]:
		case $mimetypes[1]:
		  imagejpeg($thumb, $NAMETHUMB);
			  break;
		case $mimetypes[2]:
		  imagegif($thumb, $NAMETHUMB);
		  break;
		case $mimetypes[3]:
		  imagepng($thumb, $NAMETHUMB);
		  break;
	  }
	  // Extrae los contenidos de las fotos
	  # contenido de la foto original
	  $fp = fopen($tmp_name, "rb");
	  $tfoto = fread($fp, filesize($tmp_name));
	  $tfoto = addslashes($tfoto);
	  fclose($fp);
	  # contenido del thumbnail
	  $fp = fopen($NAMETHUMB, "rb");
	  $tthumb = fread($fp, filesize($NAMETHUMB));
	  $tthumb = addslashes($tthumb);
	  fclose($fp);
	  // Borra archivos temporales si es que existen
	  //@unlink($tmp_name);
	  //@unlink(NAMETHUMB);
	} else {
		$tfoto = '';
		$type = '';
	}
	$tfoto = utf8_decode($tfoto);
	return array('tfoto' => $tfoto, 'type' => $type);	
}

function insertarProducto($serviciosProductos) {
	
	$producto		=	$_POST['producto'];
	$precio_unit	=	$_POST['precio_unit'];
	$precio_venta	=	$_POST['precio_venta'];
	$peso			=	$_POST['peso']; 
	$reftipoproducto=	$_POST['reftipoproducto'];
	$observacion	=	$_POST['observacion'];
	
	$res 			= $serviciosProductos->insertarProducto($producto, $precio_unit, $precio_venta, $peso, '', '', $reftipoproducto, $observacion);
	
	$valor = 'imagen1';
	
	$serviciosProductos->subirArchivo($valor,$res);
	
	echo $res;
}

function modificarProducto($serviciosProductos) {
	$id 			=	$_POST['id'];
	$producto		=	$_POST['producto'];
	$precio_unit	=	$_POST['precio_unit'];
	$precio_venta	=	$_POST['precio_venta'];
	$peso			=	$_POST['peso']; 
	$reftipoproducto=	$_POST['reftipoproducto'];
	$observacion	=	$_POST['observacion'];

	$res 			= $serviciosProductos->modificarProducto($id,$producto, $precio_unit, $precio_venta, $peso, '', '', $reftipoproducto, $observacion);
	
	$valor = 'imagen1';
	
	$serviciosProductos->subirArchivo($valor,$res);
	
	echo $res;
}

function eliminarProducto($serviciosProductos) {
	$id 			=	$_POST['id'];

	$res 			= $serviciosProductos->eliminarProducto($id);
	echo $res;
}

?>