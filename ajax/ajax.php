<?php

include ('../includes/funcionesUsuarios.php');
include ('../includes/funcionesProyects.php');
include ('../includes/funcionesTasks.php');

$serviciosUsuarios 		= new ServiciosUsuarios();
$serviciosProyect		= new ServiciosProyects();
$serviciosTasks		 	= new ServiciosTasks();

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
case 'eliminarFoto':
	eliminarFoto($serviciosProyect);
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

/* PARA Tasks */
case 'insertarTasks':
insertarTasks($serviciosTasks);
break;
case 'modificarTasks':
modificarTasks($serviciosTasks);
break;
case 'eliminarTasks':
eliminarTasks($serviciosTasks);
break;
case 'modificarTaskOrder':
modificarTaskOrder($serviciosTasks);
break;
/* Fin */

/* PARA CheckList */
case 'insertarCheckList':
insertarCheckList($serviciosTasks);
break;
case 'modificarCheckList':
modificarCheckList($serviciosTasks);
break;
case 'eliminarCheckList':
eliminarCheckList($serviciosTasks);
break;
case 'traerListTaskByCheckList':
traerListTaskByCheckList($serviciosTasks);
break;

case 'cargarTaskCheckListByTask':
cargarTaskCheckListByTask($serviciosTasks);
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
	
	if (isset($_POST['sendemail'])) {
		$sendemail = 1;
	} else {
		$sendemail = 0;
	}
	
	$res = $serviciosProyect->insertarProyects($title,$price,$refresponsible,$refstate,$order,$commission,$observations,$sendemail); 
	
	if ((integer)$res > 0) { 
		$resUser = $serviciosProyect->traerUser();
		$cad = 'user';
		while ($rowFS = mysql_fetch_array($resUser)) {
			if (isset($_POST[$cad.$rowFS[0]])) {
				$serviciosProyect->insertarProyectEmployees($res,$rowFS[0]);
			}
		}
		
		$imagenes = array("imagen1" => 'imagen1',
						  "imagen2" => 'imagen2',
						  "imagen3" => 'imagen3',
						  "imagen4" => 'imagen4',
						  "imagen5" => 'imagen5',
						  "imagen6" => 'imagen6',
						  "imagen7" => 'imagen7',
						  "imagen8" => 'imagen8');
	
		foreach ($imagenes as $valor) {
			$serviciosProyect->subirArchivo($valor,'galeria',$res);
		}
		echo ''; 
	} else { 
		echo 'There was an error inserting data';	
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
	
	if (isset($_POST['sendemail'])) {
		$sendemail = 1;
	} else {
		$sendemail = 0;
	}
	
	$res = $serviciosProyect->modificarProyects($id,$title,$price,$refresponsible,$refstate,$order,$commission,$observations,$sendemail); 
	if ($res == true) { 
		$serviciosProyect->eliminarProyectEmployeesPorProyect($id);
			$resUser = $serviciosProyect->traerUser();
			$cad = 'user';
			while ($rowFS = mysql_fetch_array($resUser)) {
				if (isset($_POST[$cad.$rowFS[0]])) {
					$serviciosProyect->insertarProyectEmployees($id,$rowFS[0]);
				}
			}
			
			$imagenes = array("imagen1" => 'imagen1',
						  "imagen2" => 'imagen2',
						  "imagen3" => 'imagen3',
						  "imagen4" => 'imagen4',
						  "imagen5" => 'imagen5',
						  "imagen6" => 'imagen6',
						  "imagen7" => 'imagen7',
						  "imagen8" => 'imagen8');
	
			foreach ($imagenes as $valor) {
				$serviciosProyect->subirArchivo($valor,'galeria',$id);
			}
		echo ''; 
	} else { 
		echo 'There was an error modifying data'; 
	} 
} 
function eliminarProyects($serviciosProyect) { 
$id = $_POST['id']; 
$res = $serviciosProyect->eliminarProyects($id); 
echo $res; 
} 

function eliminarFoto($serviciosProyect) {
	$id			=	$_POST['id'];
	echo $serviciosProyect->eliminarFoto($id);
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



/* PARA Tasks */
function insertarTasks($serviciosTasks) {
$task = $_POST['task'];
$order = $_POST['order'];
$value = $_POST['value'];
if (isset($_POST['active'])) {
$active = 1;
} else {
$active = 0;
}
$refuser = $_POST['refuser'];
$res = $serviciosTasks->insertarTasks($task,$order,$value,$active,$refuser);
if ((integer)$res > 0) {
echo '';
} else {
echo 'There was an error inserting data';
}
}
function modificarTasks($serviciosTasks) {
$id = $_POST['id'];
$task = $_POST['task'];
$order = $_POST['order'];
$value = $_POST['value'];
if (isset($_POST['active'])) {
$active = 1;
} else {
$active = 0;
}
$refuser = $_POST['refuser'];
$res = $serviciosTasks->modificarTasks($id,$task,$order,$value,$active,$refuser);
if ($res == true) {
echo '';
} else {
echo 'There was an error modifying data';
}
}
function eliminarTasks($serviciosTasks) {
$id = $_POST['id'];
$res = $serviciosTasks->eliminarTasks($id);
echo $res;
}

function modificarTaskOrder($serviciosTasks) {
	$order 		= $_POST['order'];
	$neworder 	= $_POST['oorder'];
	
	$res = $serviciosTasks->modificarTaskOrder($order,$neworder);
	if ($res == true) {
		echo '';
	} else {
		echo 'There was an error modifying data';
	}
}
/* Fin */ 

/* PARA CheckList */
function insertarCheckList($serviciosTasks) {
	$refproject = $_POST['refproject'];
	$refuser = $_POST['refuser'];
	$enddate = $_POST['enddate'];
	$alarm = $_POST['alarm'];
	$typetask = $_POST['typetask'];
	
	session_start();
	
	$refUser = $_POST['typetask'];
	
	$refstatechecklist = $_POST['refstatechecklist'];
	
	if (isset($_POST['executed'])) {
		$executed = 1;
	} else {
		$executed = 0;
	}
	
	if (isset($_POST['timelimitfinished'])) {
		$timelimitfinished = 1;
	} else {
		$timelimitfinished = 0;
	}
	
	if (isset($_POST['executedincomplete'])) {
		$executedincomplete = 1;
	} else {
		$executedincomplete = 0;
	}
	
	$res = $serviciosTasks->insertarCheckList($refproject,$refuser,$enddate,$alarm,$typetask,$refstatechecklist,$executed,$timelimitfinished,$executedincomplete);
	
	if ((integer)$res > 0) {
		$resTask = $serviciosTasks->traerTasksByUser($_SESSION['idusuario']);
		$cad = 'task';
		while ($rowFS = mysql_fetch_array($resTask)) {
			if (isset($_POST[$cad.$rowFS[0]])) {
				$serviciosTasks->insertarTasksCheckList($res,$rowFS[0],0,0,0,'');
			}
		}
		echo '';
	} else {
		echo 'There was an error inserting data';
	}
}

function modificarCheckList($serviciosTasks) {
$id = $_POST['id'];
$refproject = $_POST['refproject'];
$refuser = $_POST['refuser'];
$enddate = $_POST['enddate'];
$alarm = $_POST['alarm'];
$typetask = $_POST['typetask'];
$refstatechecklist = $_POST['refstatechecklist'];
if (isset($_POST['executed'])) {
$executed = 1;
} else {
$executed = 0;
}
if (isset($_POST['timelimitfinished'])) {
$timelimitfinished = 1;
} else {
$timelimitfinished = 0;
}
if (isset($_POST['executedincomplete'])) {
$executedincomplete = 1;
} else {
$executedincomplete = 0;
}
	
	session_start();
	
	$res = $serviciosTasks->modificarCheckList($id,$refproject,$refuser,$enddate,$alarm,$typetask,$refstatechecklist,$executed,$timelimitfinished,$executedincomplete);
	
	if ($res == true) {
		$serviciosTasks->eliminarTasksCheckListByCheckList($id);
			$resTask = $serviciosTasks->traerTasksByUser($_SESSION['idusuario']);
			$cad = 'task';
			while ($rowFS = mysql_fetch_array($resTask)) {
				if (isset($_POST[$cad.$rowFS[0]])) {
					$serviciosTasks->insertarTasksCheckList($id,$rowFS[0],0,0,0,'');
				}
			}
		echo '';
	} else {
		echo 'There was an error modifying data';
	}
}
function eliminarCheckList($serviciosTasks) {
$id = $_POST['id'];
$res = $serviciosTasks->eliminarCheckList($id);

echo $res;
}

function traerListTaskByCheckList($serviciosTasks) {
$id = $_POST['id'];
$res = $serviciosTasks->traerTasksCheckListByCheckListUser($id);

$cad = '';

$cad = '<table class="table table-striped table-responsive table-bordered">';
$cad .= '<thead>
			<th>Task</th>
			<th>Order</th>
			<th>Yes</th>
			<th>No</th>
			<th>Other</th>
			<th style="width:250px;">Obs.</th>
		</thead>';
$cad .= '<tbody>';
while ($rowT = mysql_fetch_array($res)) {
	$cad .= '<tr>';
	$cad .= '<td>'.$rowT['task'].'</td>';
	$cad .= '<td>'.$rowT['order'].'</td>';
	$cad .= '<td>'.$rowT['yes'].'</td>';
	$cad .= '<td>'.$rowT['no'].'</td>';
	$cad .= '<td>'.$rowT['other'].'</td>';
	$cad .= '<td>'.$rowT['observation'].'</td>';
	$cad .= '</tr>';
}
$cad .= '</tbody>';

echo $cad;	
}


function cargarTaskCheckListByTask($serviciosTasks) {
	$id		=	$_POST['checklist'];
	
	session_start();
	
	$resTaskCheckList = $serviciosTasks->traerTasksCheckListByCheckListUserSinSession($id,$_SESSION['idusuario']);
	
	while ($row = mysql_fetch_array($resTaskCheckList)) {
		if (isset($_POST['yes'.$row['idtaskschecklist']])) {
			$yes = 1;
		} else {
			$yes = 0;
		}
		
		if (isset($_POST['no'.$row['idtaskschecklist']])) {
			$no = 1;
		} else {
			$no = 0;
		}
		
		if (isset($_POST['other'.$row['idtaskschecklist']])) {
			$other = 1;
			$observation = $_POST['observation'.$row['idtaskschecklist']];

		} else {
			$other = 0;
			$observation = '';
		}
		
		$serviciosTasks->cargarTasksCheckList($row['idtaskschecklist'],$yes,$no,$other,$observation);
	}
	
	return '';
	
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