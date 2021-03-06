<?php

/**
 * @Usuarios clase en donde se accede a la base de datos
 * @ABM consultas sobre las tablas de usuarios y usarios-clientes
 */

date_default_timezone_set('America/Buenos_Aires');

class ServiciosProyects {


function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}


///**********  PARA SUBIR ARCHIVOS  ***********************//////////////////////////
	function borrarDirecctorio($dir) {
		array_map('unlink', glob($dir."/*.*"));	
	
	}
	
	function borrarArchivo($id,$archivo) {
		$sql	=	"delete from images where idfoto =".$id;
		
		$res =  unlink("./../archivos/".$archivo);
		if ($res)
		{
			$this->query($sql,0);	
		}
		return $res;
	}
	
	
	function existeArchivo($id,$nombre,$type) {
		$sql		=	"select * from images where refproyecto =".$id." and imagen = '".$nombre."' and type = '".$type."'";
		$resultado  =   $this->query($sql,0);
			   
			   if(mysql_num_rows($resultado)>0){
	
				   return mysql_result($resultado,0,0);
	
			   }
	
			   return 0;	
	}
	
	function sanear_string($string)
{
 
    $string = trim($string);
 
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );
 
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );
 
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );
 
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );
 
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );
 
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );
 
 
 
    return $string;
}

	function subirArchivo($file,$carpeta,$id) {
		$dir_destino = '../archivos/'.$carpeta.'/'.$id.'/';
		$imagen_subida = $dir_destino . $this->sanear_string(str_replace(' ','',basename($_FILES[$file]['name'])));
		
		$noentrar = '../imagenes/index.php';
		$nuevo_noentrar = '../archivos/'.$carpeta.'/'.$id.'/'.'index.php';
		
		if (!file_exists($dir_destino)) {
			mkdir($dir_destino, 0777);
		}
		
		 
		if(!is_writable($dir_destino)){
			
			echo "no tiene permisos";
			
		}	else	{
			if ($_FILES[$file]['tmp_name'] != '') {
				if(is_uploaded_file($_FILES[$file]['tmp_name'])){
					/*echo "Archivo ". $_FILES['foto']['name'] ." subido con éxtio.\n";
					echo "Mostrar contenido\n";
					echo $imagen_subida;*/
					if (move_uploaded_file($_FILES[$file]['tmp_name'], $imagen_subida)) {
						
						$archivo = $this->sanear_string($_FILES[$file]["name"]);
						$tipoarchivo = $_FILES[$file]["type"];
						
						if ($this->existeArchivo($id,$archivo,$tipoarchivo) == 0) {
							$sql	=	"insert into images(idfoto,refproyecto,imagen,type) values ('',".$id.",'".str_replace(' ','',$archivo)."','".$tipoarchivo."')";
							$this->query($sql,1);
						}
						echo "";
						
						copy($noentrar, $nuevo_noentrar);
		
					} else {
						echo "Posible ataque de carga de archivos!\n";
					}
				}else{
					echo "Posible ataque del archivo subido: ";
					echo "nombre del archivo '". $_FILES[$file]['tmp_name'] . "'.";
				}
			}
		}	
	}


	
	function TraerFotosRelacion($id) {
		$sql    =   "select 'galeria',s.idproyect,f.imagen,f.idfoto,f.type
							from proyects s
							
							inner
							join images f
							on	s.idproyect = f.refproyecto

							where s.idproyect = ".$id;
		$result =   $this->query($sql, 0);
		return $result;
	}
	
	
	function eliminarFoto($id)
	{
		
		$sql		=	"select concat('galeria','/',s.idproyect,'/',f.imagen) as archivo
							from proyects s
							
							inner
							join images f
							on	s.idproyect = f.refproyecto

							where f.idfoto =".$id;
		$resImg		=	$this->query($sql,0);
		
		$res 		=	$this->borrarArchivo($id,mysql_result($resImg,0,0));
		
		if ($res == false) {
			return 'Error al eliminar datos';
		} else {
			return '';
		}
	}

/* fin archivos */


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

function insertarProyects($title,$price,$refresponsible,$refstate,$order,$commission,$observations,$sendemail) {
$sql = "insert into proyects(`idproyect`,`title`,`price`,`refresponsible`,`refstate`,`order`,`commission`,`observations`,`sendemail`)
values ('','".utf8_decode($title)."',".$price.",".$refresponsible.",".$refstate.",".$order.",".$commission.",'".utf8_decode($observations)."',".$sendemail.")";
$res = $this->query($sql,1);
return $res;
} 


function modificarProyects($id,$title,$price,$refresponsible,$refstate,$order,$commission,$observations,$sendemail) {

session_start();

$resViejo = $this->traerProyectsPorId($id);

$titleV 			=	mysql_result($resViejo,0,"title");
$priceV 			=	mysql_result($resViejo,0,"price");
$refresponsibleV 	=	mysql_result($resViejo,0,"refresponsible");
$refstateV 			=	mysql_result($resViejo,0,"refstate");
$orderV 			=	mysql_result($resViejo,0,"order");
$commissionV 		=	mysql_result($resViejo,0,"commission"); 
$observationsV 		=	mysql_result($resViejo,0,"observations"); 

$sql = "update proyects
set
`title` = '".utf8_decode($title)."',`price` = ".$price.",`refresponsible` = ".$refresponsible.",`refstate` = ".$refstate.",`order` = ".$order.",`commission` = ".$commission.",`observations` = '".utf8_decode($observations)."',`sendemail` = ".$sendemail."
where idproyect =".$id;

$res = $this->query($sql,0);

////////////////////     Auditoria   //////////////////
if ($titleV != $title) {
	$this->insertarAudit("proyects",$id,"title",$titleV,$title,date('Y-m-d H:m:i'),	$_SESSION['nombre_p'],"update");
}

if ($priceV != $price) {
	$this->insertarAudit("proyects",$id,"title",$priceV,$price,date('Y-m-d H:m:i'),	$_SESSION['nombre_p'],"update");
}

if ($refresponsibleV != $refresponsible) {
	$this->insertarAudit("proyects",$id,"refresponsible",$refresponsibleV,$refresponsible,date('Y-m-d H:m:i'), $_SESSION['nombre_p'],"update");
}

if ($refstateV != $refstate) {
	$this->insertarAudit("proyects",$id,"refstate",$refstateV,$refstate,date('Y-m-d H:m:i'), $_SESSION['nombre_p'],"update");
}

if ($orderV != $order) {
	$this->insertarAudit("proyects",$id,"order",$orderV,$order,date('Y-m-d H:m:i'),	$_SESSION['nombre_p'],"update");
}

if ($commissionV != $commission) {
	$this->insertarAudit("proyects",$id,"commission",$commissionV,$commission,date('Y-m-d H:m:i'), $_SESSION['nombre_p'],"update");
}

if ($observationsV != $observations) {
	$this->insertarAudit("proyects",$id,"observations",$observationsV,$observations,date('Y-m-d H:m:i'), $_SESSION['nombre_p'],"update");
}

//////////////////////////////////////////////////////

return $res;
} 


function eliminarProyects($id) { 
$sql = "delete from proyects where idproyect =".$id; 
$res = $this->query($sql,0); 
return $res; 
} 

function traerProyects() { 
$sql = "select idproyect,p.`order`,title,r.responsible,s.state,observations,(case when sendemail=1 then 'Yes' else 'No' end) as sendemail,price,p.commission,refresponsible ,refstate
		from proyects p 
		inner join responsibles r on r.idresponsible = p.refresponsible
		inner join states s on s.idstate = p.refstate
		order by 1"; 
$res = $this->query($sql,0); 
return $res; 
} 

function traerProyectsPorUsuario($idUser) { 
$sql = "select idproyect,p.`order`,title,r.responsible,s.state,observations,(case when sendemail=1 then 'Yes' else 'No' end) as sendemail,price,p.commission,refresponsible ,refstate
		from proyects p 
		inner join responsibles r on r.idresponsible = p.refresponsible
		inner join states s on s.idstate = p.refstate
		inner join proyectemployees pe on pe.refproyect = p.idproyect
		where pe.refemployee = ".$idUser."
		order by 1"; 
$res = $this->query($sql,0); 
return $res; 
} 


function traerProyectsPorId($id) { 
$sql = "select idproyect,title,price,refresponsible,refstate,`order`,commission,observations,sendemail from proyects where idproyect =".$id; 
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


/* PARA Audit */

function insertarAudit($tabla,$idtabla,$campo,$previousvalue,$newvalue,$dateupdate,$user,$action) { 
$sql = "insert into audit(idaudit,tabla,idtabla,campo,previousvalue,newvalue,dateupdate,user,action) 
values ('','".utf8_decode($tabla)."',".$idtabla.",'".$campo."','".utf8_decode($previousvalue)."','".utf8_decode($newvalue)."','".utf8_decode($dateupdate)."','".utf8_decode($user)."','".utf8_decode($action)."')"; 
$res = $this->query($sql,1); 
return $res; 
} 


function modificarAudit($id,$tabla,$idtabla,$idmodificado,$previousvalue,$newvalue,$dateupdate,$user,$action) { 
$sql = "update audit 
set 
tabla = '".utf8_decode($tabla)."',idtabla = ".$idtabla.",idmodificado = ".$idmodificado.",previousvalue = '".utf8_decode($previousvalue)."',newvalue = '".utf8_decode($newvalue)."',dateupdate = '".utf8_decode($dateupdate)."',user = '".utf8_decode($user)."',action = '".utf8_decode($action)."' 
where idaudit =".$id; 
$res = $this->query($sql,0); 
return $res; 
} 


function eliminarAudit($id) { 
$sql = "delete from audit where idaudit =".$id; 
$res = $this->query($sql,0); 
return $res; 
} 


function traerAudit() { 
$sql = "select idaudit,tabla,idtabla,idmodificado,previousvalue,newvalue,dateupdate,user,action from audit order by 1"; 
$res = $this->query($sql,0); 
return $res; 
} 


function traerAuditPorId($id) { 
$sql = "select idaudit,tabla,idtabla,idmodificado,previousvalue,newvalue,dateupdate,user,action from audit where idaudit =".$id; 
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