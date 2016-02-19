<?php

/**
 * @Usuarios clase en donde se accede a la base de datos
 * @ABM consultas sobre las tablas de usuarios y usarios-clientes
 */

date_default_timezone_set('America/Buenos_Aires');

class ServiciosUsuarios {

function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}


function login($usuario,$pass) {
	
	$sqlusu = "select * from se_usuarios where activo = 1 and email = '".$usuario."'";



if (trim($usuario) != '' and trim($pass) != '') {

$respusu = $this->query($sqlusu,0);

if (mysql_num_rows($respusu) > 0) {
	$error = '';
	
	$idUsua = mysql_result($respusu,0,0);
	$sqlpass = "select concat(apellido,' ',nombre),email,direccion,refroll from se_usuarios where password = '".$pass."' and activo = 1 and IdUsuario = ".$idUsua;

	$resppass = $this->query($sqlpass,0);
	
	if (mysql_num_rows($resppass) > 0) {
		$error = '';
		} else {
			$error = 'Usuario o Password incorrecto';
		}
	
	}
	else
	
	{
		$error = 'Usuario o Password incorrecto';	
	}
	
	if ($error == '') {
		session_start();
		$_SESSION['usua_cv'] = $usuario;
		$_SESSION['nombre_cv'] = mysql_result($resppass,0,0);
		$_SESSION['email_cv'] = mysql_result($resppass,0,1);
		$_SESSION['direccion_cv'] = mysql_result($resppass,0,2);
		$_SESSION['refroll_cv'] = mysql_result($resppass,0,3);
	}
	
}	else {
	$error = 'Usuario y Password son campos obligatorios';	
}
	
	
	return $error;
	
}

function loginFacebook($usuario) {
	
	$sqlusu = "select concat(apellido,' ',nombre),email,direccion,refroll from se_usuarios where activo = 1 and email = '".$usuario."'";
	$error = '';


if (trim($usuario) != '') {

$respusu = $this->query($sqlusu,0);

	if (mysql_num_rows($respusu) > 0) {
		
		
		if ($error == '') {
			session_start();
			$_SESSION['usua_cv'] = $usuario;
			$_SESSION['nombre_cv'] = mysql_result($respusu,0,0);
			$_SESSION['email_cv'] = $usuario;
			$_SESSION['direccion_cv'] = mysql_result($respusu,0,2);
			$_SESSION['refroll_cv'] = mysql_result($respusu,0,3);
			//$error = 'andube por aca'-$sqlusu;
		}
		
	}	else {
		$error = 'Usuario y Password son campos obligatorios';	
	}

}

	return $error;
	
}

function agregarIntentoIngreso($idUsuario) {
	$sql	=	"update se_usuarios set intentoserroneos = intentoserroneos + 1 where IdUsuario =".$idUsuario;
	$this->query($sql,0);
	$sqlIntentos = "select intentoserroneos from se_usuarios where IdUsuario =".$idUsuario;
	$res = mysql_result($this->query($sqlIntentos,0),0,0);
	return $res;
}

function blanquearIntentoIngreso($idUsuario) {
	$sql	=	"update se_usuarios set intentoserroneos = 0 where idusuario =".$idUsuario;
	$this->query($sql,0);

	return '';
}


function loginUsuario($usuario,$pass) {
	
	$sqlusu = "select * from se_usuarios where email = '".$usuario."'";



if (trim($usuario) != '' and trim($pass) != '') {

	$respusu = $this->query($sqlusu,0);
	
	if (mysql_num_rows($respusu) > 0) {
		$error = '';
		
		$idUsua = mysql_result($respusu,0,0);
		$sqlpass = "select concat(apellido,' ',nombre),email,direccion,refroll from se_usuarios where password = '".$pass."' and activo = 1 and IdUsuario = ".$idUsua;
	
		$resppass = $this->query($sqlpass,0);
		
			if (mysql_num_rows($resppass) > 0) {
				$error = '';
				$this->blanquearIntentoIngreso($idUsua);
			} else {
				if (mysql_result($respusu,0,'activo') == 0) {
					$error = 'El usuario no fue activado, verifique su cuenta de email: '.$usuario;
				} else {
					$error = 'Usuario o Password incorrecto';
				}
				$this->agregarIntentoIngreso($idUsua);
			}
		
		}
		else
		
		{
			$error = 'Usuario o Password incorrecto';	
		}
		
		if ($error == '') {
			session_start();
			$_SESSION['usua_cv'] = $usuario;
			$_SESSION['nombre_cv'] = mysql_result($resppass,0,0);
			$_SESSION['email_cv'] = mysql_result($resppass,0,1);
			$_SESSION['direccion_cv'] = mysql_result($resppass,0,2);
			$_SESSION['refroll_cv'] = mysql_result($resppass,0,3);
		}
	
	
	}	else {
		$error = 'Usuario y Password son campos obligatorios';	
	}
	
	
	return $error;
	
}

function traerUsuario($email) {
	$sql = "select idusuario,apellido,refroll,nombre,direccion,email,password from se_usuarios where email = '".$email."'";
	$res = $this->query($sql,0);
	if ($res == false) {
		return 'Error al traer datos';
	} else {
		return $res;
	}
}

function traerUsuarios() {
	$sql = "select idusuario,concat(apellido,', ',nombre),refroll,nombre,direccion,email,password 
			from se_usuarios 
			order by concat(apellido,', ',nombre)";
	$res = $this->query($sql,0);
	if ($res == false) {
		return 'Error al traer datos';
	} else {
		return $res;
	}
}

function traerTodosUsuarios() {
	$sql = "select u.idusuario,u.apellido,u.nombre,u.refroll,u.direccion,u.email,u.password,u.telefono,u.direccion,r.descripcion
			from se_usuarios u
			inner
			join se_roles r on u.refroll = r.idrol
			order by concat(apellido,', ',nombre)";
	$res = $this->query($sql,0);
	if ($res == false) {
		return 'Error al traer datos';
	} else {
		return $res;
	}
}

function traerUsuarioId($id) {
	$sql = "select idusuario,apellido,refroll,nombre,direccion,email,password from se_usuarios where idusuario = ".$id;
	$res = $this->query($sql,0);
	if ($res == false) {
		return 'Error al traer datos';
	} else {
		return $res;
	}
}

function existeUsuario($usuario) {
	$sql = "select * from se_usuarios where email = '".$usuario."'";
	$res = $this->query($sql,0);
	if (mysql_num_rows($res)>0) {
		return true;	
	} else {
		return false;	
	}
}

function enviarEmail($destinatario,$asunto,$cuerpo) {

	
	# Defina el número de e-mails que desea enviar por periodo. Si es 0, el proceso por lotes
	# se deshabilita y los mensajes son enviados tan rápido como sea posible.
	define("MAILQUEUE_BATCH_SIZE",0);

	//para el envío en formato HTML
	//$headers = "MIME-Version: 1.0\r\n";
	
	// Cabecera que especifica que es un HMTL
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	//dirección del remitente
	$headers .= "From: Daniel Eduardo Duranti <info@carnesacasa.com.ar>\r\n";
	
	//ruta del mensaje desde origen a destino
	$headers .= "Return-path: ".$destinatario."\r\n";
	
	//direcciones que recibirán copia oculta
	$headers .= "Bcc: info@carnesacasa.com.ar,msredhotero@msn.com\r\n";
	
	mail($destinatario,$asunto,$cuerpo,$headers); 	
}


function insertarUsuario($apellido,$password,$refroll,$email,$nombre,$telefono,$direccion,$imagen,$mime,$carpeta,$intentoserroneos) {
	$sql = "INSERT INTO se_usuarios
				(idusuario,
				apellido,
				password,
				refroll,
				email,
				nombre,
				telefono,
				direccion,
				imagen,
				mime,
				carpeta,
				intentoserroneos,
				activo)
			VALUES
				('',
				'".utf8_decode($apellido)."',
				'".utf8_decode($password)."',
				".$refroll.",
				'".utf8_decode($email)."',
				'".utf8_decode($nombre)."',
				'".$telefono."',
				'".utf8_decode($direccion)."',
				'',
				'',
				'',
				0,
				0)";
	if ($this->existeUsuario($email) == true) {
		return "Ya existe el usuario";	
	}
	$res = $this->query($sql,1);
	if ($res == false) {
		return 'Error al insertar datos';
	} else {
		$ui = $this->GUID();
		$this->insertarActivacion($res,$ui);
		
		// Cuerpo o mensaje
		$mensaje = '
		<html>
		<head>
		  <title>Se ha registrado correctamente en Carnes A Casa.</title>
		</head>
		<body>
		  <h3>Bienvenido/a</h3>
		  <p>Para ingresar sus datos son:</p>
		  <h4><b>Usuario:</b> '.$email.'</h4>
		  <h4><b>Password:</b> '.$password.'</h4>
		  <br>
		  <div style="border: 1px solid;
			margin: 10px 0px;
			padding:15px 10px 15px 50px;
			background-repeat: no-repeat;
			background-position: 10px center;
			font-family:Arial, Helvetica, sans-serif;
			font-size:13px;
			text-align:left;
			width:auto;
			color: #4F8A10;
			background-color: #DFF2BF;">
		  El siguiente link es para activar su cuenta. Haga click <a href="http://www.carnesacasa.com.ar/activacion.php?token='.$ui.'">Aqui</a>
		</div>
		</body>
		</html>
		';
		
		$this->enviarEmail($email,"Se ha registrado en Carnes A Casa correctamente.",$mensaje);
		return $res;
	}
}

function insertarActivacion($refcliente,$ui) {
	$sql = "insert into cv_activacion
				(idactivacion,refcliente,token)
			VALUES
			('',
			".$refcliente.",
			'".$ui."')";
	$res = $this->query($sql,1);
	if ($res == false) {
		return 'Error al insertar datos';
	} else {
		return $res;
	}
}

function traerActivacion($ui) {
	$sql = "select refcliente,token from cv_activacion where token = '".$ui."'";
	$res = $this->query($sql,0);
	if ($res == false) {
		return 'Error al traer datos';
	} else {
		if (mysql_num_rows($res)>0) {
			return mysql_result($res,0,0);	
		} else {
			return 0;
		}
	}
}

function modificarUsuario($id,$apellido,$password,$refroll,$email,$nombre,$telefono,$direccion,$imagen,$mime,$carpeta,$intentoserroneos) {
	$sql = "UPDATE se_usuarios
			SET
				apellido = '".utf8_decode($apellido)."',
				password = '".utf8_decode($password)."',
				email = '".utf8_decode($email)."',
				nombre = '".utf8_decode($nombre)."',
				telefono = '".$telefono."',
				direccion = '".utf8_decode($direccion)."'
			WHERE idusuario = ".$id;
	$res = $this->query($sql,0);
	if ($res == false) {
		return 'Error al modificar datos';
	} else {
		return '';
	}
}

function activarUsuario($id) {
	$sql = "UPDATE se_usuarios
			SET
				activo = 1
			WHERE idusuario = ".$id;
	$res = $this->query($sql,0);
	if ($res == false) {
		return 'Error al modificar datos';
	} else {
		return '';
	}
}

function deshactivarUsuario($id) {
	$sql = "UPDATE se_usuarios
			SET
				activo = 0
			WHERE idusuario = ".$id;
	$res = $this->query($sql,0);
	if ($res == false) {
		return 'Error al modificar datos';
	} else {
		return '';
	}
}




function query($sql,$accion) {
		
		
		
		require_once 'appconfig.php';

		$appconfig	= new appconfig();
		$datos		= $appconfig->conexion();	
		$hostname	= $datos['hostname'];
		$database	= $datos['database'];
		$username	= $datos['username'];
		$password	= $datos['password'];
		
		$conex = mysql_connect($hostname,$username,$password) or die ("no se puede conectar".mysql_error());
		
		mysql_select_db($database);
		
		        $error = 0;
		mysql_query("BEGIN");
		$result=mysql_query($sql,$conex);
		if ($accion && $result) {
			$result = mysql_insert_id();
		}
		if(!$result){
			$error=1;
		}
		if($error==1){
			mysql_query("ROLLBACK");
			return false;
		}
		 else{
			mysql_query("COMMIT");
			return $result;
		}
		
	}

}

?>