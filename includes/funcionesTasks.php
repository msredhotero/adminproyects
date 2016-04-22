<?php

/**
 * @Usuarios clase en donde se accede a la base de datos
 * @ABM consultas sobre las tablas de usuarios y usarios-clientes
 */

date_default_timezone_set('America/Buenos_Aires');

class ServiciosTasks {






/* PARA Tasks */

function insertarTasks($task,$order,$value,$active,$refuser) {
$sql = "insert into tasks(idtask,task,`order`,value,active,refuser)
values ('','".utf8_decode($task)."',".$order.",".$value.",".$active.",".$refuser.")";
$res = $this->query($sql,1);
return $res;
}


function modificarTasks($id,$task,$order,$value,$active,$refuser) {
$sql = "update tasks
set
task = '".utf8_decode($task)."',`order` = ".$order.",value = ".$value.",active = ".$active.",refuser = ".$refuser."
where idtask =".$id;
$res = $this->query($sql,0);
return $res;
}

function modificarOrden($id, $order) {
	$sql = "update tasks
	set
	`order` = ".$order."
	where idtask =".$id;
	$res = $this->query($sql,0);
	return $res;
}


function eliminarTasks($id) {
	
session_start();

$sql = "delete from tasks where idtask =".$id;
$res = $this->query($sql,0);

$this->reOrdenarOrden($_SESSION['idusuario']);

return $res;
}

function reOrdenarOrden($idUser) {
	$res = $this->traerTasksByUser($idUser);
	$i = 1;
	while ($row = mysql_fetch_array($res)) {
		$this->modificarOrden($row['idtask'],$i);
		$i += 1;
	}
}

function traerTasks() {
$sql = "select idtask,task,`order`,value,(case when active = 1 then 'Yes' else 'No' end) as active,refuser from tasks order by `order` ";
$res = $this->query($sql,0);
return $res;
}


function traerTasksPorId($id) {
$sql = "select idtask,task,`order`,value,active,refuser from tasks where idtask =".$id;
$res = $this->query($sql,0);
return $res;
}

function traerTasksByUser($idUser) {
$sql = "select idtask,task,`order`,value,(case when active = 1 then 'Yes' else 'No' end) as active,refuser 
		from tasks 
		where refuser = ".$idUser."
		order by idtask asc";
$res = $this->query($sql,0);
return $res;
}

function traerTasksByUserMenosUna($idUser, $id) {
$sql = "select idtask,task,`order`,value,(case when active = 1 then 'Yes' else 'No' end) as active,refuser 
		from tasks 
		where refuser = ".$idUser." and idtask <> ".$id."
		order by idtask asc";
$res = $this->query($sql,0);
return $res;
}

function modificarTaskOrder($order, $neworder) {
	$resO = $this->traerTasksPorId($order);
	$resNO= $this->traerTasksPorId($neworder);
	
	$this->modificarOrden($order, mysql_result($resNO,0,'order'));
	$this->modificarOrden($neworder, mysql_result($resO,0,'order'));
	
	return true;	
}

/* Fin */

/* PARA StateCheckList */
function insertarStateCheckList($serviciosTasks) {
$status = $_POST['status'];
if (isset($_POST['active'])) {
$active = 1;
} else {
$active = 0;
}
$res = $serviciosTasks->insertarStateCheckList($status,$active);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarStateCheckList($serviciosTasks) {
$id = $_POST['id'];
$status = $_POST['status'];
if (isset($_POST['active'])) {
$active = 1;
} else {
$active = 0;
}
$res = $serviciosTasks->modificarStateCheckList($id,$status,$active);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarStateCheckList($serviciosTasks) {
$id = $_POST['id'];
$res = $serviciosTasks->eliminarStateCheckList($id);
echo $res;
}

function traerStateCheckList() {
$sql = "select idstatechecklist,status,active from statechecklist order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerStateCheckListPorId($id) {
$sql = "select idstatechecklist,status,active from statechecklist where idstatechecklist =".$id;
$res = $this->query($sql,0);
return $res;
} 
/* Fin */ 

/* PARA CheckList */

function insertarCheckList($refproject,$refuser,$enddate,$alarm,$typetask,$refstatechecklist,$executed,$timelimitfinished,$executedincomplete) {
$sql = "insert into checklist(idchecklist,refproject,refuser,enddate,alarm,typetask,refstatechecklist,executed,timelimitfinished,executedincomplete)
values ('',".$refproject.",".$refuser.",'".utf8_decode($enddate)."','".utf8_decode($alarm)."','".utf8_decode($typetask)."',".$refstatechecklist.",".$executed.",".$timelimitfinished.",".$executedincomplete.")";
$res = $this->query($sql,1);
return $res;
}


function modificarCheckList($id,$refproject,$refuser,$enddate,$alarm,$typetask,$refstatechecklist,$executed,$timelimitfinished,$executedincomplete) {
$sql = "update checklist
set
refproject = ".$refproject.",refuser = ".$refuser.",enddate = '".utf8_decode($enddate)."',alarm = '".utf8_decode($alarm)."',typetask = '".utf8_decode($typetask)."',refstatechecklist = ".$refstatechecklist.",executed = ".$executed.",timelimitfinished = ".$timelimitfinished.",executedincomplete = ".$executedincomplete."
where idchecklist =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarCheckList($id) {
$sql = "delete from checklist where idchecklist =".$id;

$this->eliminarTasksCheckListByCheckList($id);

$res = $this->query($sql,0);

return $res;
}


function traerCheckList() {
$sql = "select idchecklist,refproject,refuser,enddate,alarm,typetask,refstatechecklist,executed,timelimitfinished,executedincomplete from checklist order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerCheckListPorId($id) {
$sql = "select idchecklist,refproject,refuser,enddate,alarm,typetask,refstatechecklist,executed,timelimitfinished,executedincomplete from checklist where idchecklist =".$id;
$res = $this->query($sql,0);
return $res;
}

function traerCheckListByUser($idUser) {
$sql = "select idchecklist,p.title,u.fullname,enddate,alarm,typetask,st.status,
				(case when executed = 1 then 'Yes' else 'No' end) as executed,
				(case when timelimitfinished = 1 then 'Yes' else 'No' end) as timelimitfinished,
				(case when executedincomplete = 1 then 'Yes' else 'No' end) as executedincomplete,
				cl.refproject,cl.refuser, cl.refstatechecklist
		from checklist cl
		inner join proyects p on p.idproyect = cl.refproject
		inner join statechecklist st on st.idstatechecklist = cl.refstatechecklist
		inner join user u on u.iduser = cl.refuser
		where refuser =".$idUser;
$res = $this->query($sql,0);
return $res;
}

/* Fin */

/* PARA TasksCheckList */

function insertarTasksCheckList($refchecklist,$reftask,$yes,$no,$other,$observation) {
$sql = "insert into taskschecklist(idtaskschecklist,refchecklist,reftask,yes,no,other,observation)
values ('',".$refchecklist.",".$reftask.",".$yes.",".$no.",".$other.",'".$observation."')";
$res = $this->query($sql,1);
return $res;
}


function modificarTasksCheckList($id,$refchecklist,$reftask,$yes,$no,$other,$observation) {
$sql = "update taskschecklist
set
refchecklist = ".$refchecklist.",reftask = ".$reftask.",yes = ".$yes.",no = ".$no.",other = ".$other.",observation = '".$observation."' 
where idtaskschecklist =".$id;
$res = $this->query($sql,0);
return $res;
}

function cargarTasksCheckList($id,$yes,$no,$other,$observation) {
$sql = "update taskschecklist
set
yes = ".$yes.",no = ".$no.",other = ".$other.",observation = '".$observation."' 
where idtaskschecklist =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarTasksCheckList($id) {
$sql = "delete from taskschecklist where idtaskschecklist =".$id;
$res = $this->query($sql,0);
return $res;
}

function eliminarTasksCheckListByCheckList($id) {
$sql = "delete from taskschecklist where refchecklist =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerTasksCheckList() {
$sql = "select idtaskschecklist,refchecklist,reftask,yes,no,other,observation from taskschecklist order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerTasksCheckListPorId($id) {
$sql = "select idtaskschecklist,refchecklist,reftask,yes,no,other,observation from taskschecklist where idtaskschecklist =".$id;
$res = $this->query($sql,0);
return $res;
}

function traerTasksCheckListByCheckListUser($id) {
	
session_start();	
	
$sql = "select idtaskschecklist,cl.typetask,t.task, t.order,
				(case when yes = 1 then 'X' else '' end) as yes,
				(case when no = 1 then 'X' else '' end) as no,
				(case when other = 1 then 'X' else '' end) as other,
				observation , tc.refchecklist,tc.reftask
			from taskschecklist tc
			inner join tasks t on t.idtask = tc.reftask
			inner join checklist cl on cl.idchecklist = tc.refchecklist
			where refchecklist =".$id." and cl.refuser =".$_SESSION['idusuario']." order by t.order";
$res = $this->query($sql,0);
return $res;
}

function traerTasksCheckListByCheckListUserSinSession($id, $idUser) {	
	
$sql = "select idtaskschecklist,cl.typetask,t.task, t.order,
				(case when yes = 1 then 'X' else '' end) as yes,
				(case when no = 1 then 'X' else '' end) as no,
				(case when other = 1 then 'X' else '' end) as other,
				observation , tc.refchecklist,tc.reftask
			from taskschecklist tc
			inner join tasks t on t.idtask = tc.reftask
			inner join checklist cl on cl.idchecklist = tc.refchecklist
			where refchecklist =".$id." and cl.refuser =".$idUser." order by t.order";
$res = $this->query($sql,0);
return $res;
}

function traerPercentageCheckList($id, $idUser) {
	$res = $this->traerTasksCheckListByCheckListUserSinSession($id, $idUser);
	$resTotal = $this->traerTasksCheckListByCheckListUserSinSession($id, $idUser);
	$total = mysql_num_rows($resTotal);
	$cant  = 0;
	while ($row = mysql_fetch_array($res)) {
		if (($row['yes'] == 'X') || ($row['no'] == 'X') || ($row['other'] == 'X')) {
			$cant += 1;	
		}
	}
	
	if ($total != 0) {
		return round($cant * 100 / $total,2);
		//return $total;
	}
	
	return 0;
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