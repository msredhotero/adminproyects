<?php

include ('../includes/funcionesUsuarios.php');
include ('../includes/funcionesProyects.php');


$serviciosUsuarios  = new ServiciosUsuarios();
$serviciosProyects  = new ServiciosProyects();


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
		
/* PARA Employee */
case 'insertarEmployee':
insertarEmployee($serviciosProyect);
break;
case 'modificarEmployee':
modificarEmployee($serviciosProyect);
break;
case 'eliminarEmployee':
eliminarEmployee($serviciosProyect);
break;

/* Fin */	
	
	
/* PARA Proyect */
case 'insertarProyect':
insertarProyect($serviciosProyect);
break;
case 'modificarProyect':
modificarProyect($serviciosProyect);
break;
case 'eliminarProyect':
eliminarProyect($serviciosProyect);
break;

/* Fin */


/* PARA State */
case 'insertarState':
insertarState($serviciosProyect);
break;
case 'modificarState':
modificarState($serviciosProyect);
break;
case 'eliminarState':
eliminarState($serviciosProyect);
break;

/* Fin */


/* PARA User */
case 'insertarUser':
insertarUser($serviciosProyect);
break;
case 'modificarUser':
modificarUser($serviciosProyect);
break;
case 'eliminarUser':
eliminarUser($serviciosProyect);
break;

/* Fin */

}


/////////////////////////////////////////////////////***** TRAER DATOS **********/////////////////////////////////////////////////////

/* PARA Employee */
function insertarEmployee($serviciosProyect) {
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$id = $_POST['id'];
$res = $serviciosProyect->insertarEmployee($lastname,$firstname,$id);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarEmployee($serviciosProyect) {
$id = $_POST['id'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$id = $_POST['id'];
$res = $serviciosProyect->modificarEmployee($id,$lastname,$firstname,$id);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarEmployee($serviciosProyect) {
$id = $_POST['id'];
$res = $serviciosProyect->eliminarEmployee($id);
echo $res;
}

/* Fin */ 


/* PARA Proyect */
function insertarProyect($serviciosProyect) {
$title = $_POST['title'];
$price = $_POST['price'];
$refemployee = $_POST['refemployee'];
$observations = $_POST['observations'];
$res = $serviciosProyect->insertarProyect($title,$price,$refemployee,$observations);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarProyect($serviciosProyect) {
$id = $_POST['id'];
$title = $_POST['title'];
$price = $_POST['price'];
$refemployee = $_POST['refemployee'];
$observations = $_POST['observations'];
$res = $serviciosProyect->modificarProyect($id,$title,$price,$refemployee,$observations);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarProyect($serviciosProyect) {
$id = $_POST['id'];
$res = $serviciosProyect->eliminarProyect($id);
echo $res;
}

/* Fin */ 



/* PARA State */
function insertarState($serviciosProyect) {
$state = $_POST['state'];
$icono = $_POST['icono'];
$res = $serviciosProyect->insertarState($state,$icono);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarState($serviciosProyect) {
$id = $_POST['id'];
$state = $_POST['state'];
$icono = $_POST['icono'];
$res = $serviciosProyect->modificarState($id,$state,$icono);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarState($serviciosProyect) {
$id = $_POST['id'];
$res = $serviciosProyect->eliminarState($id);
echo $res;
}

/* Fin */ 

/* PARA User */
function insertarUser($serviciosProyect) {
$user = $_POST['user'];
$password = $_POST['password'];
$refroll = $_POST['refroll'];
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$res = $serviciosProyect->insertarUser($user,$password,$refroll,$email,$fullname);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarUser($serviciosProyect) {
$id = $_POST['id'];
$user = $_POST['user'];
$password = $_POST['password'];
$refroll = $_POST['refroll'];
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$res = $serviciosProyect->modificarUser($id,$user,$password,$refroll,$email,$fullname);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarUser($serviciosProyect) {
$id = $_POST['id'];
$res = $serviciosProyect->eliminarUser($id);
echo $res;
}

/* Fin */ 

/////////////////////////////////////////////////////***** FIN **********/////////////////////////////////////////////////////

/////////////////////////////////////////////////////***** BASICOS **********/////////////////////////////////////////////////////
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