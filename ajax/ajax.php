<?php

include ('../includes/funcionesUsuarios.php');
include ('../includes/funcionesProyects.php');


$serviciosUsuarios  = new ServiciosUsuarios();
$serviciosProyect  = new ServiciosProyects();


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


/* PARA Responsible */
case 'insertarResponsible': 
insertarResponsible($serviciosProyect); 
break; 
case 'modificarResponsible': 
modificarResponsible($serviciosProyect); 
break; 
case 'eliminarResponsible': 
eliminarResponsible($serviciosProyect); 
break; 

/* Fin */

/* PARA Proyects */
case 'insertarProyects': 
insertarProyects($serviciosProyect); 
break; 
case 'modificarProyects': 
modificarProyects($serviciosProyect); 
break; 
case 'eliminarProyects': 
eliminarProyects($serviciosProyect); 
break; 

case 'traerUserbyProyect':
	traerUserbyProyect($serviciosProyect);
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
echo 'There was an error inserting data';
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
echo 'There was an error modifying data';
}
}
function eliminarEmployee($serviciosProyect) {
$id = $_POST['id'];
$res = $serviciosProyect->eliminarEmployee($id);
echo $res;
}

/* Fin */ 


/* PARA Proyects */
function insertarProyects($serviciosProyect) { 
	$title = $_POST['title']; 
	$price = $_POST['price']; 
	$refresponsible = $_POST['refresponsible']; 
	$refstate = $_POST['refstate']; 
	$order = $_POST['order'];
	$commission = $_POST['commission'];
	$observations = $_POST['observations'];  
	
	$res = $serviciosProyect->insertarProyects($title,$price,$refresponsible,$refstate,$order,$commission,$observations); 
	
	if ((integer)$res > 0) { 
		$resUser = $serviciosProyect->traerUser();
		$cad = 'user';
		while ($rowFS = mysql_fetch_array($resUser)) {
			if (isset($_POST[$cad.$rowFS[0]])) {
				$serviciosProyect->insertarProyectEmployees($res,$rowFS[0]);
			}
		}
		echo ''; 
	} else { 
		echo 'Huvo un error al insertar datos';	
	} 
	//echo $res;
} 
function modificarProyects($serviciosProyect) { 
	$id = $_POST['id']; 
	$title = $_POST['title']; 
	$price = $_POST['price']; 
	$refresponsible = $_POST['refresponsible']; 
	$refstate = $_POST['refstate']; 
	$order = $_POST['order'];
	$commission = $_POST['commission'];
	$observations = $_POST['observations']; 
	
	$res = $serviciosProyect->modificarProyects($id,$title,$price,$refresponsible,$refstate,$order,$commission,$observations); 
	if ($res == true) { 
		$serviciosProyect->eliminarProyectEmployeesPorProyect($id);
			$resUser = $serviciosProyect->traerUser();
			$cad = 'user';
			while ($rowFS = mysql_fetch_array($resUser)) {
				if (isset($_POST[$cad.$rowFS[0]])) {
					$serviciosProyect->insertarProyectEmployees($id,$rowFS[0]);
				}
			}
		echo ''; 
	} else { 
		echo 'Huvo un error al modificar datos'; 
	} 
} 
function eliminarProyects($serviciosProyect) { 
$id = $_POST['id']; 
$res = $serviciosProyect->eliminarProyects($id); 
echo $res; 
} 


function traerUserbyProyect($serviciosProyect) {
	$id = $_POST['id']; 
	
	$res = $serviciosProyect->traerProyectEmployeesPorProyect($id);
	$cadRef = '';
	while ($row = mysql_fetch_array($res)) {
		$cadRef .= "<p><span class='glyphicon glyphicon-user'></span> (".$row['user'].") ".$row['fullname']."</p>";
	}
	echo $cadRef;
}
/* Fin */



/* PARA State */
function insertarState($serviciosProyect) {
$state = $_POST['state'];

$res = $serviciosProyect->insertarState($state);
if ((integer)$res > 0) {
echo '';
} else {
echo 'There was an error inserting data';
}
}
function modificarState($serviciosProyect) {
$id = $_POST['id'];
$state = $_POST['state'];

$res = $serviciosProyect->modificarState($id,$state);
if ($res == true) {
echo '';
} else {
echo 'There was an error modifying data';
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
echo 'There was an error inserting data';
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
echo 'There was an error modifying data';
}
}
function eliminarUser($serviciosProyect) {
$id = $_POST['id'];
$res = $serviciosProyect->eliminarUser($id);
echo $res;
}

/* Fin */ 


/* PARA Responsible */
function insertarResponsible($serviciosProyect) { 
$responsible = $_POST['responsible']; 
$res = $serviciosProyect->insertarResponsible($responsible); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'There was an error inserting data';	
} 
} 
function modificarResponsible($serviciosProyect) { 
$id = $_POST['id']; 
$responsible = $_POST['responsible']; 
$res = $serviciosProyect->modificarResponsible($id,$responsible); 
if ($res == true) { 
echo ''; 
} else { 
echo 'There was an error modifying data'; 
} 
} 
function eliminarResponsible($serviciosProyect) { 
$id = $_POST['id']; 
$res = $serviciosProyect->eliminarResponsible($id); 
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



function enviarMail($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	echo $serviciosUsuarios->login($email,$pass);
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



?>