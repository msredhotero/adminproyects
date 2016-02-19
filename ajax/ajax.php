<?php

include ('../includes/funcionesUsuarios.php');
include ('../includes/funciones.php');
include ('../includes/funcionesHTML.php');
include ('../includes/funcionesReferencias.php');


$serviciosUsuarios  		= new ServiciosUsuarios();
$serviciosFunciones 		= new Servicios();
$serviciosHTML				= new ServiciosHTML();
$serviciosReferencias		= new ServiciosReferencias();


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


/* PARA Sector */
case 'insertarSector':
insertarSector($serviciosReferencias);
break;
case 'modificarSector':
modificarSector($serviciosReferencias);
break;
case 'eliminarSector':
eliminarSector($serviciosReferencias);
break;

/* Fin */

/* PARA Ciudades */
case 'insertarCiudades':
insertarCiudades($serviciosReferencias);
break;
case 'modificarCiudades':
modificarCiudades($serviciosReferencias);
break;
case 'eliminarCiudades':
eliminarCiudades($serviciosReferencias);
break;

/* Fin */

/* PARA Provincias */
case 'insertarProvincias':
insertarProvincias($serviciosReferencias);
break;
case 'modificarProvincias':
modificarProvincias($serviciosReferencias);
break;
case 'eliminarProvincias':
eliminarProvincias($serviciosReferencias);
break;

/* Fin */

/* PARA Paises */
case 'insertarPaises':
insertarPaises($serviciosReferencias);
break;
case 'modificarPaises':
modificarPaises($serviciosReferencias);
break;
case 'eliminarPaises':
eliminarPaises($serviciosReferencias);
break;

/* Fin */

/* PARA Valoracion */
case 'insertarValoracion':
insertarValoracion($serviciosReferencias);
break;
case 'modificarValoracion':
modificarValoracion($serviciosReferencias);
break;
case 'eliminarValoracion':
eliminarValoracion($serviciosReferencias);
break;

/* Fin */

/* PARA Usos */
case 'insertarUsos':
insertarUsos($serviciosReferencias);
break;
case 'modificarUsos':
modificarUsos($serviciosReferencias);
break;
case 'eliminarUsos':
eliminarUsos($serviciosReferencias);
break;

/* Fin */


/* PARA TipoVivienda */
case 'insertarTipoVivienda':
insertarTipoVivienda($serviciosReferencias);
break;
case 'modificarTipoVivienda':
modificarTipoVivienda($serviciosReferencias);
break;
case 'eliminarTipoVivienda':
eliminarTipoVivienda($serviciosReferencias);
break;

/* Fin */

/* PARA TipoUsuarios */
case 'insertarTipoUsuarios':
insertarTipoUsuarios($serviciosReferencias);
break;
case 'modificarTipoUsuarios':
modificarTipoUsuarios($serviciosReferencias);
break;
case 'eliminarTipoUsuarios':
eliminarTipoUsuarios($serviciosReferencias);
break;

/* Fin */


/* PARA TipodeInformacion */
case 'insertarTipodeInformacion':
insertarTipodeInformacion($serviciosReferencias);
break;
case 'modificarTipodeInformacion':
modificarTipodeInformacion($serviciosReferencias);
break;
case 'eliminarTipodeInformacion':
eliminarTipodeInformacion($serviciosReferencias);
break;

/* Fin */

/* PARA SituacionInmueble */
case 'insertarSituacionInmueble':
insertarSituacionInmueble($serviciosReferencias);
break;
case 'modificarSituacionInmueble':
modificarSituacionInmueble($serviciosReferencias);
break;
case 'eliminarSituacionInmueble':
eliminarSituacionInmueble($serviciosReferencias);
break;

/* Fin */


/* PARA Situaciones */
case 'insertarSituaciones':
insertarSituaciones($serviciosReferencias);
break;
case 'modificarSituaciones':
modificarSituaciones($serviciosReferencias);
break;
case 'eliminarSituaciones':
eliminarSituaciones($serviciosReferencias);
break;

/* Fin */

/* PARA Urbanizacion */
case 'insertarUrbanizacion':
insertarUrbanizacion($serviciosReferencias);
break;
case 'modificarUrbanizacion':
modificarUrbanizacion($serviciosReferencias);
break;
case 'eliminarUrbanizacion':
eliminarUrbanizacion($serviciosReferencias);
break;

/* Fin */


/* PARA Perfiles */
case 'insertarPerfiles':
insertarPerfiles($serviciosReferencias);
break;
case 'modificarPerfiles':
modificarPerfiles($serviciosReferencias);
break;
case 'eliminarPerfiles':
eliminarPerfiles($serviciosReferencias);
break;

/* Fin */


/* PARA CostoNacional */
case 'insertarCostoNacional':
insertarCostoNacional($serviciosReferencias);
break;
case 'modificarCostoNacional':
modificarCostoNacional($serviciosReferencias);
break;
case 'eliminarCostoNacional':
eliminarCostoNacional($serviciosReferencias);
break;

case 'traerCostoNacionalPorPais':
	traerCostoNacionalPorPais($serviciosReferencias);
	break;
/* Fin */


/* PARA Costomts */
case 'insertarCostomts':
insertarCostomts($serviciosReferencias);
break;
case 'modificarCostomts':
modificarCostomts($serviciosReferencias);
break;
case 'eliminarCostomts':
eliminarCostomts($serviciosReferencias);
break;

case 'traerCostomtsPorCiudad':
	traerCostomtsPorCiudad($serviciosReferencias);
	break;
/* Fin */


/* PARA Comision */
case 'insertarComision':
insertarComision($serviciosReferencias);
break;
case 'modificarComision':
modificarComision($serviciosReferencias);
break;
case 'eliminarComision':
eliminarComision($serviciosReferencias);
break;

/* Fin */


/* PARA Pedidos */
case 'insertarPedidos':
insertarPedidos($serviciosReferencias);
break;
case 'modificarPedidos':
modificarPedidos($serviciosReferencias);
break;
case 'eliminarPedidos':
eliminarPedidos($serviciosReferencias);
break;

/* Fin */

/* PARA UsuariosRegistrados */
case 'insertarUsuariosRegistrados':
insertarUsuariosRegistrados($serviciosReferencias);
break;
case 'modificarUsuariosRegistrados':
modificarUsuariosRegistrados($serviciosReferencias);
break;
case 'eliminarUsuariosRegistrados':
eliminarUsuariosRegistrados($serviciosReferencias);
break;

/* Fin */


/* PARA Inmuebles */
case 'insertarInmuebles':
insertarInmuebles($serviciosReferencias);
break;
case 'modificarInmuebles':
modificarInmuebles($serviciosReferencias);
break;
case 'eliminarInmuebles':
eliminarInmuebles($serviciosReferencias);
break;
case 'buscarInmuebles':
buscarInmuebles($serviciosReferencias);
break;

case 'Filtros':
Filtros($serviciosReferencias);
break;

case 'graficosValoracion':
graficosValoracion($serviciosReferencias);
break;

case 'graficosTipoVivienda':
graficosTipoVivienda($serviciosReferencias);
break;

case 'graficosUsos':
graficosUsos($serviciosReferencias);
break;
/* Fin */

}

//////////////////////////Traer datos */////////////////////////////////////////////////////////////


/* PARA Sector */
function insertarSector($serviciosReferencias) {
$refciudad = $_POST['refciudad'];
$sector = $_POST['sector'];
$res = $serviciosReferencias->insertarSector($refciudad,$sector);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarSector($serviciosReferencias) {
$id = $_POST['id'];
$refciudad = $_POST['refciudad'];
$sector = $_POST['sector'];
$res = $serviciosReferencias->modificarSector($id,$refciudad,$sector);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarSector($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarSector($id);
echo $res;
}

/* Fin */ 


/* PARA Ciudades */
function insertarCiudades($serviciosReferencias) {
$refprovincia = $_POST['refprovincia'];
$ciudad = $_POST['ciudad'];
$res = $serviciosReferencias->insertarCiudades($refprovincia,$ciudad);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarCiudades($serviciosReferencias) {
$id = $_POST['id'];
$refprovincia = $_POST['refprovincia'];
$ciudad = $_POST['ciudad'];
$res = $serviciosReferencias->modificarCiudades($id,$refprovincia,$ciudad);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarCiudades($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarCiudades($id);
echo $res;
}

/* Fin */


/* PARA Provincias */
function insertarProvincias($serviciosReferencias) {
$refpais = $_POST['refpais'];
$provincia = $_POST['provincia'];
$res = $serviciosReferencias->insertarProvincias($refpais,$provincia);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarProvincias($serviciosReferencias) {
$id = $_POST['id'];
$refpais = $_POST['refpais'];
$provincia = $_POST['provincia'];
$res = $serviciosReferencias->modificarProvincias($id,$refpais,$provincia);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarProvincias($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarProvincias($id);
echo $res;
}

/* Fin */ 


/* PARA Paises */
function insertarPaises($serviciosReferencias) {
$nombre = $_POST['nombre'];
$res = $serviciosReferencias->insertarPaises($nombre);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarPaises($serviciosReferencias) {
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$res = $serviciosReferencias->modificarPaises($id,$nombre);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarPaises($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarPaises($id);
echo $res;
}

/* Fin */ 



/* PARA Valoracion */
function insertarValoracion($serviciosReferencias) {
$valoracion = $_POST['valoracion'];
$observacion = $_POST['observacion'];
$res = $serviciosReferencias->insertarValoracion($valoracion,$observacion);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarValoracion($serviciosReferencias) {
$id = $_POST['id'];
$valoracion = $_POST['valoracion'];
$observacion = $_POST['observacion'];
$res = $serviciosReferencias->modificarValoracion($id,$valoracion,$observacion);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarValoracion($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarValoracion($id);
echo $res;
}

/* Fin */ 



/* PARA Usos */
function insertarUsos($serviciosReferencias) {
$usos = $_POST['usos'];
$res = $serviciosReferencias->insertarUsos($usos);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarUsos($serviciosReferencias) {
$id = $_POST['id'];
$usos = $_POST['usos'];
$res = $serviciosReferencias->modificarUsos($id,$usos);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarUsos($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarUsos($id);
echo $res;
}

/* Fin */ 


/* PARA TipoVivienda */
function insertarTipoVivienda($serviciosReferencias) {
$tipovivienda = $_POST['tipovivienda'];
$res = $serviciosReferencias->insertarTipoVivienda($tipovivienda);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarTipoVivienda($serviciosReferencias) {
$id = $_POST['id'];
$tipovivienda = $_POST['tipovivienda'];
$res = $serviciosReferencias->modificarTipoVivienda($id,$tipovivienda);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarTipoVivienda($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarTipoVivienda($id);
echo $res;
}

/* Fin */ 


/* PARA TipoUsuarios */
function insertarTipoUsuarios($serviciosReferencias) {
$descripcion = $_POST['descripcion'];
$res = $serviciosReferencias->insertarTipoUsuarios($descripcion);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarTipoUsuarios($serviciosReferencias) {
$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
$res = $serviciosReferencias->modificarTipoUsuarios($id,$descripcion);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarTipoUsuarios($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarTipoUsuarios($id);
echo $res;
}

/* Fin */ 

/* PARA TipodeInformacion */
function insertarTipodeInformacion($serviciosReferencias) {
$tipodeinformacion = $_POST['tipodeinformacion'];
$res = $serviciosReferencias->insertarTipodeInformacion($tipodeinformacion);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarTipodeInformacion($serviciosReferencias) {
$id = $_POST['id'];
$tipodeinformacion = $_POST['tipodeinformacion'];
$res = $serviciosReferencias->modificarTipodeInformacion($id,$tipodeinformacion);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarTipodeInformacion($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarTipodeInformacion($id);
echo $res;
}

/* Fin */ 

/* PARA SituacionInmueble */
function insertarSituacionInmueble($serviciosReferencias) {
$situacioninmueble = $_POST['situacioninmueble'];
$res = $serviciosReferencias->insertarSituacionInmueble($situacioninmueble);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarSituacionInmueble($serviciosReferencias) {
$id = $_POST['id'];
$situacioninmueble = $_POST['situacioninmueble'];
$res = $serviciosReferencias->modificarSituacionInmueble($id,$situacioninmueble);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarSituacionInmueble($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarSituacionInmueble($id);
echo $res;
}

/* Fin */ 

/* PARA Situaciones */
function insertarSituaciones($serviciosReferencias) {
$situacion = $_POST['situacion'];
$res = $serviciosReferencias->insertarSituaciones($situacion);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarSituaciones($serviciosReferencias) {
$id = $_POST['id'];
$situacion = $_POST['situacion'];
$res = $serviciosReferencias->modificarSituaciones($id,$situacion);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarSituaciones($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarSituaciones($id);
echo $res;
}

/* Fin */ 



/* PARA Urbanizacion */
function insertarUrbanizacion($serviciosReferencias) {
$refsector = $_POST['refsector'];
$urbanizacion = $_POST['urbanizacion'];
$res = $serviciosReferencias->insertarUrbanizacion($refsector,$urbanizacion);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarUrbanizacion($serviciosReferencias) {
$id = $_POST['id'];
$refsector = $_POST['refsector'];
$urbanizacion = $_POST['urbanizacion'];
$res = $serviciosReferencias->modificarUrbanizacion($id,$refsector,$urbanizacion);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarUrbanizacion($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarUrbanizacion($id);
echo $res;
}

/* Fin */ 



/* PARA Perfiles */
function insertarPerfiles($serviciosReferencias) {
$reftipousuario = $_POST['reftipousuario'];
$nombreperfil = $_POST['nombreperfil'];
$res = $serviciosReferencias->insertarPerfiles($reftipousuario,$nombreperfil);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarPerfiles($serviciosReferencias) {
$id = $_POST['id'];
$reftipousuario = $_POST['reftipousuario'];
$nombreperfil = $_POST['nombreperfil'];
$res = $serviciosReferencias->modificarPerfiles($id,$reftipousuario,$nombreperfil);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarPerfiles($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarPerfiles($id);
echo $res;
}

/* Fin */ 



/* PARA CostoNacional */
function insertarCostoNacional($serviciosReferencias) {
	$refpais = $_POST['refpais'];
	$valormts = $_POST['valormts'];
	$fechamodi = $_POST['fechamodi'];
	$refusuario = $_POST['refusuario'];

	if ($serviciosReferencias->existeCostoNacional($refpais) == 0) {

		$res = $serviciosReferencias->insertarCostoNacional($refpais,$valormts,$fechamodi,$refusuario);
		
		if ((integer)$res > 0) {
			echo '';
		} else {
			echo 'Huvo un error al insertar datos';
		}
	} else {
		echo 'Ya existe un Costo Nacional cargado';
	}
}
function modificarCostoNacional($serviciosReferencias) {
$id = $_POST['id'];
$refpais = $_POST['refpais'];
$valormts = $_POST['valormts'];
$fechamodi = $_POST['fechamodi'];
$refusuario = $_POST['refusuario'];
$res = $serviciosReferencias->modificarCostoNacional($id,$refpais,$valormts,$fechamodi,$refusuario);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarCostoNacional($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarCostoNacional($id);
echo $res;
}

function traerCostoNacionalPorPais($serviciosReferencias) {
	$pais	=	$_POST['refurbanizacion'];
	
	$res	= $serviciosReferencias->traerCostoNacionalPorPais($pais);
	
	$cad = '';
	while ($rowCN = mysql_fetch_array($res)) {
		$cad .= '<option value='.$rowCN[0].'>'.$rowCN['apellidoynombre'].' - $'.$rowCN['valormts'].'</option>';	
	}
	
	echo $cad;
}

/* Fin */ 


/* PARA Costomts */
function insertarCostomts($serviciosReferencias) {
	$refciudad = $_POST['refciudad'];
	$refuso = $_POST['refuso'];
	$valormts = $_POST['valormts'];
	$fechamodi = $_POST['fechamodi'];
	$refusuario = $_POST['refusuario'];
	$res = $serviciosReferencias->insertarCostomts($refciudad,$refuso,$valormts,$fechamodi,$refusuario);
	if ((integer)$res > 0) {
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}

function modificarCostomts($serviciosReferencias) {
	$id = $_POST['id'];
	$refciudad = $_POST['refciudad'];
	$refuso = $_POST['refuso'];
	$valormts = $_POST['valormts'];
	$fechamodi = $_POST['fechamodi'];
	$refusuario = $_POST['refusuario'];
	$res = $serviciosReferencias->modificarCostomts($id,$refciudad,$refuso,$valormts,$fechamodi,$refusuario);
	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}
}

function eliminarCostomts($serviciosReferencias) {
	$id = $_POST['id'];
	$res = $serviciosReferencias->eliminarCostomts($id);
	echo $res;
}


function traerCostomtsPorCiudad($serviciosReferencias) {
	$ciudad	=	$_POST['refurbanizacion'];
	$uso	=	$_POST['refuso'];
	
	$res	= $serviciosReferencias->traerCostomtsPorCiudad($ciudad,$uso);
	
	$cad = '';
	while ($rowCN = mysql_fetch_array($res)) {
		$cad .= '<option value='.$rowCN[0].'>'.$rowCN['apellidoynombre'].' - $'.$rowCN['valormts'].'</option>';	
	}
	
	echo $cad;
}
/* Fin */ 



/* PARA Comision */
function insertarComision($serviciosReferencias) {
$comision = $_POST['comision'];
$res = $serviciosReferencias->insertarComision($comision);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarComision($serviciosReferencias) {
$id = $_POST['id'];
$comision = $_POST['comision'];
$res = $serviciosReferencias->modificarComision($id,$comision);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarComision($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarComision($id);
echo $res;
}

/* Fin */ 



/* PARA Pedidos */
function insertarPedidos($serviciosReferencias) {
$reftipoinformacion = $_POST['reftipoinformacion'];
$refinmueble = $_POST['refinmueble'];
$refusuario = $_POST['refusuario'];
$fechapedido = $_POST['fechapedido'];
$comentariousuario = $_POST['comentariousuario'];
$res = $serviciosReferencias->insertarPedidos($reftipoinformacion,$refinmueble,$refusuario,$fechapedido,$comentariousuario);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarPedidos($serviciosReferencias) {
$id = $_POST['id'];
$reftipoinformacion = $_POST['reftipoinformacion'];
$refinmueble = $_POST['refinmueble'];
$refusuario = $_POST['refusuario'];
$fechapedido = $_POST['fechapedido'];
$comentariousuario = $_POST['comentariousuario'];
$res = $serviciosReferencias->modificarPedidos($id,$reftipoinformacion,$refinmueble,$refusuario,$fechapedido,$comentariousuario);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarPedidos($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarPedidos($id);
echo $res;
}

/* Fin */ 




/* PARA UsuariosRegistrados */
function insertarUsuariosRegistrados($serviciosReferencias) {
$fechadeingreso = $_POST['fechadeingreso'];
$reftipousuario = $_POST['reftipousuario'];
$apellidoynombre = $_POST['apellidoynombre'];
$nombreentidad = $_POST['nombreentidad'];
$celular1 = $_POST['celular1'];
$celular2 = $_POST['celular2'];
$celular3 = $_POST['celular3'];
$email1 = $_POST['email1'];
$email2 = $_POST['email2'];
$refsituacion = $_POST['refsituacion'];
$refurbanizacion = $_POST['refurbanizacion'];
$calle = $_POST['calle'];
$nro = $_POST['nro'];
$codpostal = $_POST['codpostal'];
$documento = $_POST['documento'];
$password = $_POST['password'];
$res = $serviciosReferencias->insertarUsuariosRegistrados($fechadeingreso,$reftipousuario,$apellidoynombre,$nombreentidad,$celular1,$celular2,$celular3,$email1,$email2,$refsituacion,$refurbanizacion,$calle,$nro,$codpostal,$documento,$password);
if ((integer)$res > 0) {
echo '';
} else {
echo 'Huvo un error al insertar datos';
}
}
function modificarUsuariosRegistrados($serviciosReferencias) {
$id = $_POST['id'];
$fechadeingreso = $_POST['fechadeingreso'];
$reftipousuario = $_POST['reftipousuario'];
$apellidoynombre = $_POST['apellidoynombre'];
$nombreentidad = $_POST['nombreentidad'];
$celular1 = $_POST['celular1'];
$celular2 = $_POST['celular2'];
$celular3 = $_POST['celular3'];
$email1 = $_POST['email1'];
$email2 = $_POST['email2'];
$refsituacion = $_POST['refsituacion'];
$refurbanizacion = $_POST['refurbanizacion'];
$calle = $_POST['calle'];
$nro = $_POST['nro'];
$codpostal = $_POST['codpostal'];
$documento = $_POST['documento'];
$password = $_POST['password'];
$res = $serviciosReferencias->modificarUsuariosRegistrados($id,$fechadeingreso,$reftipousuario,$apellidoynombre,$nombreentidad,$celular1,$celular2,$celular3,$email1,$email2,$refsituacion,$refurbanizacion,$calle,$nro,$codpostal,$documento,$password);
if ($res == true) {
echo '';
} else {
echo 'Huvo un error al modificar datos';
}
}
function eliminarUsuariosRegistrados($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarUsuariosRegistrados($id);
echo $res;
}


/* Fin */ 



/* PARA Inmuebles */
function insertarInmuebles($serviciosReferencias) {
	$refurbanizacion = $_POST['refurbanizacion'];
	$reftipovivienda = $_POST['reftipovivienda'];
	$refuso = $_POST['refuso'];
	$refsituacioninmueble = $_POST['refsituacioninmueble'];
	$dormitorios = $_POST['dormitorios'];
	$banios = $_POST['banios'];
	$encontruccion = $_POST['encontruccion'];
	$mts2 = $_POST['mts2'];
	$anioconstruccion = $_POST['anioconstruccion'];
	$precioventapropietario = $_POST['precioventapropietario'];
	$nombrepropietario = $_POST['nombrepropietario'];
	$apellidopropietario = $_POST['apellidopropietario'];
	$fechacarga = $_POST['fechacarga'];
	$refusuario = $_POST['refusuario'];
	$refcomision = $_POST['refcomision'];
	$calc_edadconstruccion 			= '';
	$calc_porcentajedepreciacion 	= '';
	$calc_avaluoconstruccion 		= '';
	$calc_depreciacion 				= '';
	$calc_avaluoterreno 			= '';
	$calc_preciorealmercado 		= '';
	$calc_restacliente 				= '';
	$calc_porcentaje 				= '';
	$refvaloracion 					= '';
	
	$idCostoMts			=	$_POST['refcostomts'];
	$idCostoNacional	=	$_POST['refcostonacional'];
	
	$res = $serviciosReferencias->insertarInmuebles($refurbanizacion,$reftipovivienda,$refuso,$refsituacioninmueble,$dormitorios,$banios,$encontruccion,$mts2,$anioconstruccion,$precioventapropietario,$nombrepropietario,$apellidopropietario,$fechacarga,$refusuario,$refcomision,$calc_edadconstruccion,$calc_porcentajedepreciacion,$calc_avaluoconstruccion,$calc_depreciacion,$calc_avaluoterreno,$calc_preciorealmercado,$calc_restacliente,$calc_porcentaje,$refvaloracion,$idCostoMts,$idCostoNacional);
	
	if ((integer)$res > 0) {
		echo '';
	} else {
		echo 'Huvo un error al insertar datos';
	}
}


function modificarInmuebles($serviciosReferencias) {
	$id = $_POST['id'];
	$refurbanizacion = $_POST['refurbanizacion'];
	$reftipovivienda = $_POST['reftipovivienda'];
	$refuso = $_POST['refuso'];
	$refsituacioninmueble = $_POST['refsituacioninmueble'];
	$dormitorios = $_POST['dormitorios'];
	$banios = $_POST['banios'];
	$encontruccion = $_POST['encontruccion'];
	$mts2 = $_POST['mts2'];
	$anioconstruccion = $_POST['anioconstruccion'];
	$precioventapropietario = $_POST['precioventapropietario'];
	$nombrepropietario = $_POST['nombrepropietario'];
	$apellidopropietario = $_POST['apellidopropietario'];
	$fechacarga = $_POST['fechacarga'];
	$refusuario = $_POST['refusuario'];
	$refcomision = $_POST['refcomision'];
	$calc_edadconstruccion 			= '';
	$calc_porcentajedepreciacion 	= '';
	$calc_avaluoconstruccion 		= '';
	$calc_depreciacion 				= '';
	$calc_avaluoterreno 			= '';
	$calc_preciorealmercado 		= '';
	$calc_restacliente 				= '';
	$calc_porcentaje 				= '';
	$refvaloracion 					= '';
	
	$idCostoMts			=	$_POST['refcostomts'];
	$idCostoNacional	=	$_POST['refcostonacional'];
	
	$res = $serviciosReferencias->modificarInmuebles($id,$refurbanizacion,$reftipovivienda,$refuso,$refsituacioninmueble,$dormitorios,$banios,$encontruccion,$mts2,$anioconstruccion,$precioventapropietario,$nombrepropietario,$apellidopropietario,$fechacarga,$refusuario,$refcomision,$calc_edadconstruccion,$calc_porcentajedepreciacion,$calc_avaluoconstruccion,$calc_depreciacion,$calc_avaluoterreno,$calc_preciorealmercado,$calc_restacliente,$calc_porcentaje,$refvaloracion,$idCostoMts,$idCostoNacional);
	
	if ($res == true) {
		echo '';
	} else {
		echo 'Huvo un error al modificar datos';
	}
} 


function eliminarInmuebles($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarInmuebles($id);
echo $res;
}

function buscarInmuebles($serviciosReferencias) {
	$tipobusqueda	= $_POST['tipobusqueda'];
	$busqueda		= $_POST['busqueda'];
	
	$res = $serviciosReferencias->buscarInmuebles($tipobusqueda,$busqueda);
	
	$cad3 = '';
	//////////////////////////////////////////////////////busquedajugadores/////////////////////
	$cad3 = $cad3.'
				<div class="col-md-12">
				<div class="panel panel-info">
                                <div class="panel-heading">
                                	<h3 class="panel-title">Resultado de la Busqueda</h3>
                                </div>
                                <div class="panel-body-info" style="padding:5px 20px;">
                                	';
	$cad3 = $cad3.'
	<div class="row">
                	<table id="example" class="table table-responsive table-striped" style="font-size:0.8em; padding:2px;">
						<thead>
                        <tr>
                        	<th>Dormitorios</th>
							<th>Banios</th>
							<th>Mts en contruc.</th>
							<th>Mts2</th>
							<th>Año Construc.</th>
							<th>Precio Venta Propietario</th>
							<th>Nombre Propietario</th>
							<th>Apellido Propietario</th>
							<th>Fec. Carga</th>
							<th>Calc.Edad Construc.</th>
							<th>Calc. % Deprec.</th>
							<th>Calc.Avaluo Construc.</th>
							<th>Calc.Depreciacion</th>
							<th>Calc.Avaluo Terreno</th>
							<th>Calc.Precio Real Mercado</th>
							<th>Calc.Resta Cliente</th>
							<th>Calc. %</th>
							<th>Valoracion</th>
							<th>Urbanizacion</th>
							<th>Ciudad</th>
							<th>Provincia</th>
							<th>País</th>
							<th>Tipo Vivienda</th>
							<th>Usos</th>
							<th>Situacion Inmueble</th>
							<th>Usuario</th>
							<th>Comisión</th>
							<th>Acciones</th>
                        </tr>
						</thead>
						<tbody>';
	while ($rowJ = mysql_fetch_array($res)) {
		$cad3 .= '<tr>
					<td>'.utf8_encode($rowJ[1]).'</td>
					<td>'.utf8_encode($rowJ[2]).'</td>
					<td>'.utf8_encode($rowJ[3]).'</td>
					<td>'.utf8_encode($rowJ[4]).'</td>
					<td>'.utf8_encode($rowJ[5]).'</td>
					<td>'.utf8_encode($rowJ[6]).'</td>
					<td>'.utf8_encode($rowJ[7]).'</td>
					<td>'.utf8_encode($rowJ[8]).'</td>
					<td>'.utf8_encode($rowJ[9]).'</td>
					<td>'.utf8_encode($rowJ[10]).'</td>
					<td>'.utf8_encode($rowJ[11]).'</td>
					<td>'.utf8_encode($rowJ[12]).'</td>
					<td>'.utf8_encode($rowJ[13]).'</td>
					<td>'.utf8_encode($rowJ[14]).'</td>
					<td>'.utf8_encode($rowJ[15]).'</td>
					<td>'.utf8_encode($rowJ[16]).'</td>
					<td>'.utf8_encode($rowJ[17]).'</td>
					<td>'.utf8_encode($rowJ[18]).'</td>
					<td>'.utf8_encode($rowJ[19]).'</td>
					<td>'.utf8_encode($rowJ[20]).'</td>
					<td>'.utf8_encode($rowJ[21]).'</td>
					<td>'.utf8_encode($rowJ[22]).'</td>
					<td>'.utf8_encode($rowJ[23]).'</td>
					<td>'.utf8_encode($rowJ[24]).'</td>
					<td>'.utf8_encode($rowJ[25]).'</td>
					<td>'.utf8_encode($rowJ[26]).'</td>
					<td>'.utf8_encode($rowJ[27]).'</td>
					<td>
								
							<div class="btn-group">
								<button class="btn btn-success" type="button">Acciones</button>
								
								<button class="btn btn-success dropdown-toggle" data-toggle="dropdown" type="button">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								
								<ul class="dropdown-menu" role="menu">
									<li>
									<a href="modificar.php?id='.$rowJ[0].'" class="varmodificar" id="'.$rowJ[0].'">Modificar</a>
									</li>

									
								</ul>
							</div>
						</td>';
	}
	
	$cad3 = $cad3.'</tbody>
                                </table></div>
                            </div>
						</div>';
						
	echo $cad3;	
	
}

function graficosValoracion($serviciosReferencias) {
	$refurbanizacion = $_POST['refurbanizacion'];
	$reftipovivienda = $_POST['reftipovivienda'];
	$refuso = $_POST['refuso'];
	$refsituacioninmueble = $_POST['refsituacioninmueble'];
	$dormitorios = $_POST['dormitorios'];
	$banios = $_POST['banios'];
	$encontruccion = $_POST['encontruccion'];
	$mts2 = $_POST['mts2'];
	$anioconstruccion = $_POST['anioconstruccion'];
	$precioventapropietario = $_POST['precioventapropietario'];
	$nombrepropietario = $_POST['nombrepropietario'];
	$apellidopropietario = $_POST['apellidopropietario'];
	$fechacarga = $_POST['fechacarga'];
	$refusuario = $_POST['refusuario'];
	$refcomision = $_POST['refcomision'];
	
	$where = '';
	
	$res = $serviciosReferencias->graficosValoracion($where);
	
	echo $res;
	
}


function graficosTipoVivienda($serviciosReferencias) {
	$refurbanizacion = $_POST['refurbanizacion'];
	$reftipovivienda = $_POST['reftipovivienda'];
	$refuso = $_POST['refuso'];
	$refsituacioninmueble = $_POST['refsituacioninmueble'];
	$dormitorios = $_POST['dormitorios'];
	$banios = $_POST['banios'];
	$encontruccion = $_POST['encontruccion'];
	$mts2 = $_POST['mts2'];
	$anioconstruccion = $_POST['anioconstruccion'];
	$precioventapropietario = $_POST['precioventapropietario'];
	$nombrepropietario = $_POST['nombrepropietario'];
	$apellidopropietario = $_POST['apellidopropietario'];
	$fechacarga = $_POST['fechacarga'];
	$refusuario = $_POST['refusuario'];
	$refcomision = $_POST['refcomision'];
	
	$where = '';
	
	$res = $serviciosReferencias->graficosTipoVivienda($where);
	
	echo $res;
	
}


function graficosUsos($serviciosReferencias) {
	$refurbanizacion = $_POST['refurbanizacion'];
	$reftipovivienda = $_POST['reftipovivienda'];
	$refuso = $_POST['refuso'];
	$refsituacioninmueble = $_POST['refsituacioninmueble'];
	$dormitorios = $_POST['dormitorios'];
	$banios = $_POST['banios'];
	$encontruccion = $_POST['encontruccion'];
	$mts2 = $_POST['mts2'];
	$anioconstruccion = $_POST['anioconstruccion'];
	$precioventapropietario = $_POST['precioventapropietario'];
	$nombrepropietario = $_POST['nombrepropietario'];
	$apellidopropietario = $_POST['apellidopropietario'];
	$fechacarga = $_POST['fechacarga'];
	$refusuario = $_POST['refusuario'];
	$refcomision = $_POST['refcomision'];
	
	$where = '';
	
	$res = $serviciosReferencias->graficosUsos($where);
	
	echo $res;
	
}

function Filtros($serviciosReferencias) {
	$refurbanizacion = $_POST['refurbanizacion'];
	$reftipovivienda = $_POST['reftipovivienda'];
	$refuso = $_POST['refuso'];
	$refsituacioninmueble = $_POST['refsituacioninmueble'];
	$dormitorios = $_POST['dormitorios'];
	$banios = $_POST['banios'];
	$encontruccion = $_POST['encontruccion'];
	$mts2 = $_POST['mts2'];
	$anioconstruccion = $_POST['anioconstruccion'];
	$precioventapropietario = $_POST['precioventapropietario'];
	$nombrepropietario = $_POST['nombrepropietario'];
	$apellidopropietario = $_POST['apellidopropietario'];
	$fechacarga = $_POST['fechacarga'];
	$refusuario = $_POST['refusuario'];
	$refcomision = $_POST['refcomision'];
	
	$where = '';
	
	$res = $serviciosReferencias->filtros($where);
	
	$cad3 = '';
	//////////////////////////////////////////////////////busquedajugadores/////////////////////
	$cad3 = $cad3.'
				<div class="col-md-12">
				<div class="panel panel-info">
                                <div class="panel-heading">
                                	<h3 class="panel-title">Resultado de la Busqueda</h3>
                                </div>
                                <div class="panel-body-info" style="padding:5px 20px;">
                                	';
	$cad3 = $cad3.'
	<div class="row">
                	<table style="font-size:1em; padding:2px;">
						<thead>
                        <tr>
                        	<th>Valoracion</th>
							<th>Dormitorios</th>
							<th>Banios</th>
							<th>Mts en contruc.</th>
							<th>Mts2</th>
							<th>Año Construc.</th>
							<th>Precio Venta Propietario</th>
							<th>Nombre Propietario</th>
							<th>Apellido Propietario</th>
							<th>Fec. Carga</th>
							<th>Calc.Edad Construc.</th>
							<th>Calc. % Deprec.</th>
							<th>Calc.Avaluo Construc.</th>
							<th>Calc.Depreciacion</th>
							<th>Calc.Avaluo Terreno</th>
							<th>Calc.Precio Real Mercado</th>
							<th>Calc.Resta Cliente</th>
							<th>Calc. %</th>
							<th>Urbanizacion</th>
							<th>Ciudad</th>
							<th>Provincia</th>
							<th>País</th>
							<th>Tipo Vivienda</th>
							<th>Usos</th>
							<th>Situacion Inmueble</th>
							<th>Usuario</th>
							<th>Comisión</th>
							<th>Acciones</th>
                        </tr>
						</thead>
						<tbody>';
	while ($rowJ = mysql_fetch_array($res)) {
		switch ($rowJ[28])
		{
			case 1:
				$color = " bgcolor='#04B404' ";
				break;
			case 2:
				$color = " bgcolor='#FFFF00' ";
				break;
			case 3:
				$color = " bgcolor='#FF8000' ";
				break;
			case 4:
				$color = " bgcolor='red' ";
				break;	
		}
		$cad3 .= '<tr'.$color.'>
					<td>'.utf8_encode($rowJ[18]).'</td>
					<td>'.utf8_encode($rowJ[1]).'</td>
					<td>'.utf8_encode($rowJ[2]).'</td>
					<td>'.utf8_encode($rowJ[3]).'</td>
					<td>'.utf8_encode($rowJ[4]).'</td>
					<td>'.utf8_encode($rowJ[5]).'</td>
					<td>'.utf8_encode($rowJ[6]).'</td>
					<td>'.utf8_encode($rowJ[7]).'</td>
					<td>'.utf8_encode($rowJ[8]).'</td>
					<td>'.utf8_encode($rowJ[9]).'</td>
					<td>'.utf8_encode($rowJ[10]).'</td>
					<td>'.utf8_encode($rowJ[11]).'</td>
					<td>'.utf8_encode($rowJ[12]).'</td>
					<td>'.utf8_encode($rowJ[13]).'</td>
					<td>'.utf8_encode($rowJ[14]).'</td>
					<td>'.utf8_encode($rowJ[15]).'</td>
					<td>'.utf8_encode($rowJ[16]).'</td>
					<td>'.utf8_encode($rowJ[17]).'</td>
					<td>'.utf8_encode($rowJ[19]).'</td>
					<td>'.utf8_encode($rowJ[20]).'</td>
					<td>'.utf8_encode($rowJ[21]).'</td>
					<td>'.utf8_encode($rowJ[22]).'</td>
					<td>'.utf8_encode($rowJ[23]).'</td>
					<td>'.utf8_encode($rowJ[24]).'</td>
					<td>'.utf8_encode($rowJ[25]).'</td>
					<td>'.utf8_encode($rowJ[26]).'</td>
					<td>'.utf8_encode($rowJ[27]).'</td>
					<td>
								
							<div class="btn-group">
								<button class="btn btn-success" type="button">Acciones</button>
								
								<button class="btn btn-success dropdown-toggle" data-toggle="dropdown" type="button">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								
								<ul class="dropdown-menu" role="menu">
									<li>
									<a href="modificar.php?id='.$rowJ[0].'" class="varmodificar" id="'.$rowJ[0].'">Modificar</a>
									</li>

									
								</ul>
							</div>
						</td>';
	}
	
	$cad3 = $cad3.'</tbody>
                                </table></div>
                            </div>
						</div>';
						
	echo $cad3;	
	
}

/* Fin */ 


////////////////////////// FIN DE TRAER DATOS ////////////////////////////////////////////////////////////

//////////////////////////  BASICO  /////////////////////////////////////////////////////////////////////////

function toArray($query)
{
    $res = array();
    while ($row = @mysql_fetch_array($query)) {
        $res[] = $row;
    }
    return $res;
}


function entrar($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	echo $serviciosUsuarios->loginUsuario($email,$pass);
}


function registrar($serviciosUsuarios) {
	$usuario			=	$_POST['usuario'];
	$password			=	$_POST['password'];
	$refroll			=	$_POST['refroll'];
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombrecompleto'];
	
	$res = $serviciosUsuarios->insertarUsuario($usuario,$password,$refroll,$email,$nombre);
	if ((integer)$res > 0) {
		echo '';	
	} else {
		echo $res;	
	}
}


function insertarUsuario($serviciosUsuarios) {
	$usuario			=	$_POST['usuario'];
	$password			=	$_POST['password'];
	$refroll			=	$_POST['refroll'];
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombrecompleto'];
	
	$res = $serviciosUsuarios->insertarUsuario($usuario,$password,$refroll,$email,$nombre);
	if ((integer)$res > 0) {
		echo '';	
	} else {
		echo $res;	
	}
}


function modificarUsuario($serviciosUsuarios) {
	$id					=	$_POST['id'];
	$usuario			=	$_POST['usuario'];
	$password			=	$_POST['password'];
	$refroll			=	$_POST['refroll'];
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombrecompleto'];
	
	echo $serviciosUsuarios->modificarUsuario($id,$apellido,$password,$refroll,$email,$nombre);
}


function enviarMail($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	//$idempresa  =	$_POST['idempresa'];
	
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