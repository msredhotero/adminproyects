<?php

/**
 * @Usuarios clase en donde se accede a la base de datos
 * @ABM consultas sobre las tablas de usuarios y usarios-clientes
 */

date_default_timezone_set('America/Buenos_Aires');

class ServiciosTasks {






/* PARA Tasks */

function insertarTasks($task,$order,$value,$active,$refproject) {
$sql = "insert into tasks(idtask,task,order,value,active,refproject)
values ('','".utf8_decode($task)."',".$order.",".$value.",".$active.",".$refproject.")";
$res = $this->query($sql,1);
return $res;
}


function modificarTasks($id,$task,$order,$value,$active,$refproject) {
$sql = "update tasks
set
task = '".utf8_decode($task)."',order = ".$order.",value = ".$value.",active = ".$active.",refproject = ".$refproject."
where idtask =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarTasks($id) {
$sql = "delete from tasks where idtask =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerTasks() {
$sql = "select idtask,task,order,value,active,refproject from tasks order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerTasksPorId($id) {
$sql = "select idtask,task,order,value,active,refproject from tasks where idtask =".$id;
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