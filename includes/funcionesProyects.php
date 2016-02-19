<?php

/**
 * @Usuarios clase en donde se accede a la base de datos
 * @ABM consultas sobre las tablas de usuarios y usarios-clientes
 */

date_default_timezone_set('America/Buenos_Aires');

class ServiciosProyects {

/* FOR Employee */

function insertarEmployee($lastname,$firstname,$id) {
$sql = "insert into employees(idemployee,lastname,firstname,id)
values ('','".utf8_decode($lastname)."','".utf8_decode($firstname)."',".$id.")";
$res = $this->query($sql,1);
return $res;
}


function modificarEmployee($id,$lastname,$firstname,$id) {
$sql = "update employees
set
lastname = '".utf8_decode($lastname)."',firstname = '".utf8_decode($firstname)."',id = ".$id."
where idemployee =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarEmployee($id) {
$sql = "delete from employees where idemployee =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerEmployee() {
$sql = "select idemployee,lastname,firstname,id from employees order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerEmployeePorId($id) {
$sql = "select idemployee,lastname,firstname,id from employees where idemployee =".$id;
$res = $this->query($sql,0);
return $res;
}

/* End */


/* PARA Proyect */

function insertarProyect($title,$price,$refemployee,$observations) {
$sql = "insert into proyects(idproyect,title,price,refemployee,observations)
values ('','".utf8_decode($title)."',".$price.",".$refemployee.",'".utf8_decode($observations)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarProyect($id,$title,$price,$refemployee,$observations) {
$sql = "update proyects
set
title = '".utf8_decode($title)."',price = ".$price.",refemployee = ".$refemployee.",observations = '".utf8_decode($observations)."'
where idproyect =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarProyect($id) {
$sql = "delete from proyects where idproyect =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerProyect() {
$sql = "select idproyect,title,price,refemployee,observations from proyects order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerProyectPorId($id) {
$sql = "select idproyect,title,price,refemployee,observations from proyects where idproyect =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */


/* PARA State */

function insertarState($state,$icono) {
$sql = "insert into states(idstate,state,icono)
values ('','".utf8_decode($state)."','".utf8_decode($icono)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarState($id,$state,$icono) {
$sql = "update states
set
state = '".utf8_decode($state)."',icono = '".utf8_decode($icono)."'
where idstate =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarState($id) {
$sql = "delete from states where idstate =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerState() {
$sql = "select idstate,state,icono from states order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerStatePorId($id) {
$sql = "select idstate,state,icono from states where idstate =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */




/* PARA User */

function insertarUser($user,$password,$refroll,$email,$fullname) {
$sql = "insert into user(idusuario,user,password,refroll,email,fullname)
values ('','".utf8_decode($user)."','".utf8_decode($password)."',".$refroll.",'".utf8_decode($email)."','".utf8_decode($fullname)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarUser($id,$user,$password,$refroll,$email,$fullname) {
$sql = "update user
set
user = '".utf8_decode($user)."',password = '".utf8_decode($password)."',refroll = ".$refroll.",email = '".utf8_decode($email)."',fullname = '".utf8_decode($fullname)."'
where idusuario =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarUser($id) {
$sql = "delete from user where idusuario =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerUser() {
$sql = "select idusuario,user,password,refroll,email,fullname from user order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerUserPorId($id) {
$sql = "select idusuario,user,password,refroll,email,fullname from user where idusuario =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */

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
		/*
		$result = mysql_query($sql,$conex);
		if ($accion && $result) {
			$result = mysql_insert_id();
		}
		mysql_close($conex);
		return $result;
		*/
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