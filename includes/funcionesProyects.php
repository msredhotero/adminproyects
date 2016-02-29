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


/* PARA ProyectEmployees */

function insertarProyectEmployees($refproyect,$refemployee) {
$sql = "insert into proyectemployees(idproyectemployee,refproyect,refemployee)
values ('',".$refproyect.",".$refemployee.")";
$res = $this->query($sql,1);
return $res;
}


function modificarProyectEmployees($id,$refproyect,$refemployee) {
$sql = "update proyectemployees
set
refproyect = ".$refproyect.",refemployee = ".$refemployee."
where idproyectemployee =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarProyectEmployees($id) {
$sql = "delete from proyectemployees where idproyectemployee =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarProyectEmployeesPorProyect($proyect) {
$sql = "delete from proyectemployees where refproyect =".$proyect;
$res = $this->query($sql,0);
return $res;
}


function traerProyectEmployees() {
$sql = "select 
			idproyectemployee,e.lastname,e.firstname,e.id,p.title,pe.refproyect,pe.refemployee 
		from proyectemployees pe
		inner join employees e ON e.idemployee = pe.refemployee
		inner join proyects p ON p.idproyect = pe.refproyect
		order by 1";
$res = $this->query($sql,0);
return $res;
}

function traerProyectEmployeesPorUser($user) {
$sql = "select 
			idproyectemployee,e.lastname,e.firstname,e.id,p.title,pe.refproyect,pe.refemployee 
		from proyectemployees pe
		inner join employees e ON e.idemployee = pe.refemployee
		inner join proyects p ON p.idproyect = pe.refproyect
		inner join user u on u.iduser = pe.refemployee
		inner join responsibles r on r.idresponsible = p.refresponsible
		inner join states s on s.idstate = p.refstate
		where u.iduser = ".$user."
		order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerProyectEmployeesPorProyect($proyect) {
$sql = "select 
			idproyectemployee,e.user,e.fullname,p.title,pe.refproyect,pe.refemployee,e.iduser 
		from proyectemployees pe
		inner join user e ON e.iduser = pe.refemployee
		inner join proyects p ON p.idproyect = pe.refproyect
		where pe.refproyect = ".$proyect."
		order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerProyectEmployeesPorId($id) {
$sql = "select idproyectemployee,refproyect,refemployee from proyectemployees where idproyectemployee =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */

/* PARA Proyects */

function insertarProyects($title,$price,$refresponsible,$refstate,$order,$commission,$observations) {
$sql = "insert into proyects(`idproyect`,`title`,`price`,`refresponsible`,`refstate`,`order`,`commission`,`observations`)
values ('','".utf8_decode($title)."',".$price.",".$refresponsible.",".$refstate.",".$order.",".$commission.",'".utf8_decode($observations)."')";
$res = $this->query($sql,1);
return $res;
} 


function modificarProyects($id,$title,$price,$refresponsible,$refstate,$order,$commission,$observations) {
$sql = "update proyects
set
`title` = '".utf8_decode($title)."',`price` = ".$price.",`refresponsible` = ".$refresponsible.",`refstate` = ".$refstate.",`order` = ".$order.",`commission` = ".$commission.",`observations` = '".utf8_decode($observations)."'
where idproyect =".$id;
$res = $this->query($sql,0);
return $res;
} 


function eliminarProyects($id) { 
$sql = "delete from proyects where idproyect =".$id; 
$res = $this->query($sql,0); 
return $res; 
} 

function traerProyects() { 
$sql = "select idproyect,title,price,r.responsible,s.state,p.order,p.commission,observations,refresponsible ,refstate
		from proyects p 
		inner join responsibles r on r.idresponsible = p.refresponsible
		inner join states s on s.idstate = p.refstate
		order by 1"; 
$res = $this->query($sql,0); 
return $res; 
} 

function traerProyectsPorUsuario($idUser) { 
$sql = "select idproyect,title,price,r.responsible,s.state,p.order,p.commission,observations,refresponsible ,refstate
		from proyects p 
		inner join responsibles r on r.idresponsible = p.refresponsible
		inner join states s on s.idstate = p.refstate
		inner join proyectemployees pe on pe.refproyect
		where pe.refemployee = ".$idUser."
		order by 1"; 
$res = $this->query($sql,0); 
return $res; 
} 


function traerProyectsPorId($id) { 
$sql = "select idproyect,title,price,refresponsible,refstate,`order`,commission,observations from proyects where idproyect =".$id; 
$res = $this->query($sql,0); 
return $res; 
} 

/* Fin */


/* PARA State */

function insertarState($state) {
$sql = "insert into states(idstate,state)
values ('','".utf8_decode($state)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarState($id,$state) {
$sql = "update states
set
state = '".utf8_decode($state)."'
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
$sql = "select idstate,state from states order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerStatePorId($id) {
$sql = "select idstate,state from states where idstate =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */




/* PARA User */

function insertarUser($user,$password,$refroll,$email,$fullname) {
$sql = "insert into user(iduser,user,password,refroll,email,fullname)
values ('','".utf8_decode($user)."','".utf8_decode($password)."',".$refroll.",'".utf8_decode($email)."','".utf8_decode($fullname)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarUser($id,$user,$password,$refroll,$email,$fullname) {
$sql = "update user
set
user = '".utf8_decode($user)."',password = '".utf8_decode($password)."',refroll = ".$refroll.",email = '".utf8_decode($email)."',fullname = '".utf8_decode($fullname)."'
where iduser =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarUser($id) {
$sql = "delete from user where iduser =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerUser() {
$sql = "select iduser,user,password,r.rol,email,fullname ,refroll
		from user u 
		inner join roles r on r.idrol = u.refroll
		order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerUserPorId($id) {
$sql = "select iduser,user,password,refroll,email,fullname from user where iduser =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */


/* PARA Roles */

function insertarRoles($rol,$active) { 
$sql = "insert into roles(idrol,rol,active) 
values ('','".utf8_decode($rol)."',".$active.")"; 
$res = $this->query($sql,1); 
return $res; 
} 


function modificarRoles($id,$rol,$active) { 
$sql = "update roles 
set 
rol = '".utf8_decode($rol)."',active = ".$active." 
where idrol =".$id; 
$res = $this->query($sql,0); 
return $res; 
} 


function eliminarRoles($id) { 
$sql = "delete from roles where idrol =".$id; 
$res = $this->query($sql,0); 
return $res; 
} 


function traerRoles() { 
$sql = "select idrol,rol,active from roles order by 1"; 
$res = $this->query($sql,0); 
return $res; 
} 


function traerRolesPorId($id) { 
$sql = "select idrol,rol,active from roles where idrol =".$id; 
$res = $this->query($sql,0); 
return $res; 
} 

/* Fin */

/* PARA Responsible */

function insertarResponsible($responsible) { 
$sql = "insert into responsibles(idresponsible,responsible) 
values ('','".utf8_decode($responsible)."')"; 
$res = $this->query($sql,1); 
return $res; 
} 


function modificarResponsible($id,$responsible) { 
$sql = "update responsibles 
set 
responsible = '".utf8_decode($responsible)."' 
where idresponsible =".$id; 
$res = $this->query($sql,0); 
return $res; 
} 


function eliminarResponsible($id) { 
$sql = "delete from responsibles where idresponsible =".$id; 
$res = $this->query($sql,0); 
return $res; 
} 


function traerResponsible() { 
$sql = "select idresponsible,responsible from responsibles order by 1"; 
$res = $this->query($sql,0); 
return $res; 
} 


function traerResponsiblePorId($id) { 
$sql = "select idresponsible,responsible from responsibles where idresponsible =".$id; 
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