<?php


session_start();

if (!isset($_SESSION['usua_p']))
{
	header('Location: ../../error.php');
} else {


include ('../../includes/funciones.php');
include ('../../includes/funcionesUsuarios.php');
include ('../../includes/funcionesHTML.php');
include ('../../includes/funcionesProyects.php');
include ('../../includes/funcionesTasks.php');

$serviciosFunciones 	= new Servicios();
$serviciosUsuario 		= new ServiciosUsuarios();
$serviciosHTML 			= new ServiciosHTML();
$serviciosProyects	 	= new ServiciosProyects();
$serviciosTasks		 	= new ServiciosTasks();

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_p']),"Check-List",$_SESSION['refroll_p'],'');


$id = $_GET['id'];

$resResultado = $serviciosTasks->traerCheckListPorId($id);


/////////////////////// Opciones pagina ///////////////////////////////////////////////
$singular = "CheckList";

$plural = "CheckList";

$eliminar = "eliminarCheckList";

$modificar = "modificarCheckList";

$idTabla = "idchecklist";

$tituloWeb = "Restricted access: B-Projects";
//////////////////////// Fin opciones ////////////////////////////////////////////////


/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "checklist";

$lblCambio	 	= array("refuser","refproject","refstatechecklist","enddate","timelimitfinished","executedincomplete","typetask");
$lblreemplazo	= array("User","Projet","Status","End Date","Time limit finished","Executed Incomplete","Type of Task");


$cadRef = '<option value="'.$_SESSION['idusuario'].'" selected>'.utf8_encode($_SESSION['nombre_p']).'</option>';


$resState 	= $serviciosTasks->traerStateCheckList();
$cadRef3 = '';
while ($rowTT3 = mysql_fetch_array($resState)) {
	if (mysql_result($resResultado,0,'refstatechecklist') == $rowTT3[0]) {
		$cadRef3 = utf8_encode($rowTT3[1]);
	}
	
}

$resEmp 	= $serviciosProyects->traerUser();

$cadRef = '';
while ($rowU = mysql_fetch_array($resEmp)) {
	if (mysql_result($resResultado,0,'refuser')==$rowU[0]) {
		$cadRef =utf8_encode($rowU['fullname']);
	} 
}

$resProyect 	= $serviciosProyects->traerProyectsPorUsuario($_SESSION['idusuario']);
$cadVar2 = '';
while ($rowP = mysql_fetch_array($resProyect)) {
	if (mysql_result($resResultado,0,'refproject')==$rowP[0]) {
		$cadVar2 = utf8_encode($rowP['title']);
	}
}

$refdescripcion = array(0 => $cadRef,1=>$cadRef3,2=>$cadVar2);
$refCampo 	=  array("refuser","refstatechecklist","refproject");
//////////////////////////////////////////////  FIN de los opciones //////////////////////////


$resList 	= $serviciosTasks->traerTasksByUser($_SESSION['idusuario']);

$cadList = '<ul class="list-inline">';
while ($rowT = mysql_fetch_array($resList)) {
	$cadList = $cadList."<li>".'<input id="task'.$rowT[0].'" class="form-control" type="checkbox" required="" style="width:50px;" name="task'.$rowT[0].'"><p>'.$rowT['task'].'</p>'."</li>";
}
$cadList = $cadList."</ul>";






$resTask = $serviciosTasks->traerTasksByUser($_SESSION['idusuario']);

$resTaskCheckList = $serviciosTasks->traerTasksCheckListByCheckListUserSinSession($id,$_SESSION['idusuario']);

$resTaskCheckListValidation = $serviciosTasks->traerTasksCheckListByCheckListUserSinSession($id,$_SESSION['idusuario']);

//////////////////////////////////////////////  FIN de los opciones //////////////////////////

$formulario 	= $serviciosFunciones->camposTablaVer($id, $idTabla,$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);
//$formulario 	= $serviciosFunciones->camposTablaVer($id, "idsocio",$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);



$resRelacionFotos = $serviciosTasks->TraerFotosRelacion($id);

$cantidadImagenes = 0;
$cantidadImagenes = mysql_num_rows($resRelacionFotos);

if ($_SESSION['refroll_p'] != 1) {

} else {

	
}


?>

<!DOCTYPE HTML>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



<title><?php echo $tituloWeb; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link href="../../css/estiloDash.css" rel="stylesheet" type="text/css">
    

    
    <script type="text/javascript" src="../../js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" href="../../css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="../../css/jquery.datetimepicker.css"/>
    <script src="../../js/jquery-ui.js"></script>
    
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"/>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>

	<style type="text/css">
		
  
		
	</style>
    
   
   <link href="../../css/perfect-scrollbar.css" rel="stylesheet">
      <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
      <script src="../../js/jquery.mousewheel.js"></script>
      <script src="../../js/perfect-scrollbar.js"></script>
      <script>
      jQuery(document).ready(function ($) {
        "use strict";
        $('#navigation').perfectScrollbar();
      });
    </script>
</head>

<body>

 <?php echo $resMenu; ?>

<div id="content">

<h3><?php echo $plural; ?></h3>

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Load Task</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<form enctype="multipart/form-data" class="form-inline formulario" role="form">
        	
            <div class="row" id="muestra">

            <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" media="all"/>
			<?php echo $formulario; ?>
            </div>
            
			<div class="row" style="margin:10px 15px;">
				<table class="table table-bordered table-responsive table-striped">
                	<thead>
                    	<th>Order</th>
                        <th>Task</th>
                        <th>Yes</th>
                        <th>No</th>
                        <th>Other</th>
                    </thead>
                    <tbody>
                    	<?php
							$i = 0;
							while ($row = mysql_fetch_array($resTaskCheckList)) {
						?>
                        	<tr>
                            	<td><?php echo $row['order']; ?></td>
                                <td><?php echo $row['task']; ?></td>
                                <td><input class="form-control" type="checkbox" id="yes<?php echo $row['idtaskschecklist']; ?>" name="yes<?php echo $row['idtaskschecklist']; ?>" <?php if ($row['yes']=='X') echo 'checked'; ?>/></td>
                                <td><input class="form-control" type="checkbox" id="no<?php echo $row['idtaskschecklist']; ?>" name="no<?php echo $row['idtaskschecklist']; ?>" <?php if ($row['no']=='X') echo 'checked'; ?>/></td>
                                <td><input class="form-control" type="checkbox" id="other<?php echo $row['idtaskschecklist']; ?>" name="other<?php echo $row['idtaskschecklist']; ?>" <?php if ($row['other']=='X') echo 'checked'; ?>/></td>
                            </tr>
                            <?php if ($row['other']!='X') { ?>
                            <tr class="cerrar" id="comentario<?php echo $row['idtaskschecklist']; ?>" style="display:none;">
                        		<td colspan="5">
                                	<textarea id="observation<?php echo $row['idtaskschecklist']; ?>" name="observation<?php echo $row['idtaskschecklist']; ?>" class="form-control" rows="4" cols="110">
                                    
                                    </textarea>
                                </td>
                        	</tr>
                            <?php } else { ?>
                            <tr class="abrir" id="comentario<?php echo $row['idtaskschecklist']; ?>">
                        		<td colspan="5">
                                	<textarea id="observation<?php echo $row['idtaskschecklist']; ?>" name="observation<?php echo $row['idtaskschecklist']; ?>" class="form-control" rows="4" cols="110"><?php echo $row['observation']; ?></textarea>
                                </td>
                        	</tr>
                            <?php } ?>
                        <?php
							$i += 1;
							}
						?>
                    </tbody>
                </table>
                <input type="hidden" id="accion" name="accion" value="cargarTaskCheckListByTask"/>
                <input type="hidden" id="checklist" name="checklist" value="<?php echo $id; ?>"/>
            
            <?php
			
			$labelPercentage = '';
			$percentage = $serviciosTasks->traerPercentageCheckList($id,$_SESSION['idusuario']);
			switch ($percentage) {
				case $percentage >= 0 && $percentage < 34:
					$labelPercentage = "progress-bar-danger";
					break;
				case $percentage >= 34 && $percentage < 67:
					$labelPercentage = "progress-bar-warning";
					break;
				case $percentage >= 67 && $percentage <= 100:
					$labelPercentage = "progress-bar-success";
					break;
				default:
					$labelPercentage = "";
					break;
			}
			
			?>
            	<h3>Percentage of work completed</h3>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped <?php echo $labelPercentage; ?>" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage; ?>%;">
                    <?php echo $percentage; ?>%
                    </div>
                </div>
                
                <div class="row" style="margin-left:25px; margin-right:25px;">
                <h3>Loaded images</h3>
                    <ul class="list-inline">
                        <?php while ($rowImg = mysql_fetch_array($resRelacionFotos)) { ?>
                        <li>
                            
                            <div class="col-md-12" align="center">
                            <div id="img<?php echo $rowImg[3]; ?>">
                            	<?php 
									$mystring = $rowImg['type'];
									$findme   = 'image';
									$pos = strpos($mystring, $findme);
									if ($pos !== false) { 
								?>
                                <img src="<?php echo '../../archivostask/'.$rowImg[0].'/'.$rowImg[1].'/'.utf8_encode($rowImg[2]) ?>" width="100" height="100">
                                <?php } else { ?>
                                <img src="../../imagenes/pdf_ico2.jpg" width="100" height="100"><?php echo $rowImg['imagen']; ?>
                                <?php } ?>
                            </div>
                            <ul class="list-inline" style="margin-top:10px;">
                            <li>
                            <input type="button" name="eliminar" id="<?php echo $rowImg[3]; ?>" class="btn btn-danger eliminar" value="Deleted">
                            </li>
                            <li>
                            <input type="button" name="view" id="<?php echo '../../archivostask/'.$rowImg[0].'/'.$rowImg[1].'/'.utf8_encode($rowImg[2]) ?>" class="btn btn-info view" value="View">
                            </li>
                            </div>
                            
                        </li>
                        <?php } ?>
                    </ul>
            </div>
            
            
            <div class="row" style="margin-left:25px; margin-right:25px;">
                	<h4>Add Images / Files</h4>
                        <p style=" color: #999;">Images / Files (maximum file size per upload to 3 MB)</p>
                        <div style="height:auto; 
                    			width:100%; 
                                background-color:#FFF;
                                -webkit-border-radius: 13px; 
                            	-moz-border-radius: 13px;
                            	border-radius: 13px;
                                margin-left:-20px;
                                padding-left:20px;">

                            
                <ul class="list-inline">
                            <li style="margin-top:14px;">
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen1" id="imagen1">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                
                                <img id="vistaPrevia1" name="vistaPrevia1" width="50" height="50"/>
                            </div>
                            <div style="height:14px;">
                                
                            </div>
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen2" id="imagen2">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia2" name="vistaPrevia2" width="50" height="50"/>
                            </div>
    
                                
                            </li>
                            <li style="margin-top:14px;">
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen4" id="imagen4">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia4" name="vistaPrevia4" width="50" height="50"/>
                            </div>
                            <div style="height:14px;">
                                
                            </div>
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen5" id="imagen5">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia5" name="vistaPrevia5" width="50" height="50"/>
                            </div>
                            
                            </li>
                            
                            <li>
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen3" id="imagen3">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia3" name="vistaPrevia3" width="50" height="50"/>
                            </div>
                            <div style="height:14px;">
                                
                            </div>
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen6" id="imagen6">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia6" name="vistaPrevia6" width="50" height="50"/>
                            </div>
                            </li>
                            
                            
                            <li>
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen7" id="imagen7">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia7" name="vistaPrevia7" width="50" height="50"/>
                            </div>
                            <div style="height:14px;">
                                
                            </div>
                            <div style=" height:110px; width:140px; border:2px dashed #CCC; text-align:center; overflow: auto;">
                                <div class='custom-input-file'>
                                    <input type="file" name="imagen8" id="imagen8">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia8" name="vistaPrevia8" width="50" height="50"/>
                            </div>
                            </li>
                            
                            
                            </ul>
                                   
                </div>
            </div>
            
            
            
            
            <div class='row' style="margin-left:25px; margin-right:25px;">
                <div class='alert'>
                
                </div>
                <div id='load'>
                
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                <ul class="list-inline" style="margin-top:15px;">
                    <li>
                        <button type="button" class="btn btn-primary" id="cargar" style="margin-left:0px;">Load</button>
                    </li>

                    <li>
                        <button type="button" class="btn btn-default volver" style="margin-left:0px;">Back</button>
                    </li>
                </ul>
                </div>
            </div>
            </form>
    	</div>
    </div>
    
    
   
</div>


</div>

<div id="dialog2" title="Delete <?php echo $singular; ?>">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Are you sure you want to delete the <?php echo $singular; ?>?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Important: </strong>If you delete the <?php echo $singular; ?> will lose all data in this</p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>

<div id="dialog3" title="Remove image">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Are you sure you want to delete the image?.
        </p>
        <div id="auxImg">
        
        </div>
        <input type="hidden" value="" id="idAgente" name="idAgente">
</div>
<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
<script src="../../bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../../js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$('.volver').click(function(event){
		 
		url = "index.php";
		$(location).attr('href',url);
	});//fin del boton modificar
	
	$('.varborrar').click(function(event){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			$("#idEliminar").val(usersid);
			$("#dialog2").dialog("open");

			
			//url = "../clienteseleccionado/index.php?idcliente=" + usersid;
			//$(location).attr('href',url);
		  } else {
			alert("Error redo action.");	
		  }
	});//fin del boton eliminar
	
	$('.eliminar').click(function(event){
                
			  usersid =  $(this).attr("id");
			  imagenId = 'img'+usersid;
			  
			  if (!isNaN(usersid)) {
				$("#idAgente").val(usersid);

				$("#auxImg").html($('#'+imagenId).html());
				$("#dialog3").dialog("open");

			  } else {
				alert("Error redo action.");	
			  }
			  
			  //post code
	});
	
	$('.view').click(function(event){
                
			usersid =  $(this).attr("id");

			url = usersid;

			window.open(usersid,'_blank');

	});
	
	
	$( "#dialog3" ).dialog({
		 	
		autoOpen: false,
		resizable: false,
		width:600,
		height:340,
		modal: true,
		buttons: {
			"Eliminar": function() {

				$.ajax({
							data:  {id: $("#idAgente").val(), accion: 'eliminarFotoTask'},
							url:   '../../ajax/ajax.php',
							type:  'post',
							beforeSend: function () {
									
							},
							success:  function (response) {
									url = "view.php?id=<? echo $id; ?>";
									$(location).attr('href',url);
									
							}
					});
				$( this ).dialog( "close" );
				$( this ).dialog( "close" );
					$('html, body').animate({
						scrollTop: '1000px'
					},
					1500);
			},
			Cancelar: function() {
				$( this ).dialog( "close" );
			}
		}
 
 
	});
	<?php
		$i = 0;
		while ($row = mysql_fetch_array($resTaskCheckListValidation)) {
	?>
		$('#other<?php echo $row['idtaskschecklist']; ?>').click(function() {
			
			if ( $(this).is(':checked') ) {
				$('#comentario<?php echo $row['idtaskschecklist']; ?>').show("slow");
				$('#comentario<?php echo $row['idtaskschecklist']; ?>').removeClass('cerrar');
				$('#comentario<?php echo $row['idtaskschecklist']; ?>').addClass('abrir');
				
				$('#yes<?php echo $row['idtaskschecklist']; ?>').prop('checked', false);
				$('#no<?php echo $row['idtaskschecklist']; ?>').prop('checked', false);
			} else {
				$('#comentario<?php echo $row['idtaskschecklist']; ?>').slideToggle( "slow" );
				$('#comentario<?php echo $row['idtaskschecklist']; ?>').removeClass('abrir');
				$('#comentario<?php echo $row['idtaskschecklist']; ?>').addClass('cerrar');
			}
			

			
			
		}); 

		
		$("#yes<?php echo $row['idtaskschecklist']; ?>").on( 'change', function() {
			if( $(this).is(':checked') ) {
				var className = $('#comentario<?php echo $row['idtaskschecklist']; ?>').attr('class');
				if (className == 'abrir') {
					$('#comentario<?php echo $row['idtaskschecklist']; ?>').slideToggle( "slow" );
					$('#comentario<?php echo $row['idtaskschecklist']; ?>').removeClass('abrir');
					$('#comentario<?php echo $row['idtaskschecklist']; ?>').addClass('cerrar');
				}
				// Hacer algo si el checkbox ha sido seleccionado
				$('#other<?php echo $row['idtaskschecklist']; ?>').prop('checked', false);
				$('#no<?php echo $row['idtaskschecklist']; ?>').prop('checked', false);
			}
		});
		
		$("#no<?php echo $row['idtaskschecklist']; ?>").on( 'change', function() {
			if( $(this).is(':checked') ) {
				var className = $('#comentario<?php echo $row['idtaskschecklist']; ?>').attr('class');
				if (className == 'abrir') {
					$('#comentario<?php echo $row['idtaskschecklist']; ?>').slideToggle( "slow" );
					$('#comentario<?php echo $row['idtaskschecklist']; ?>').removeClass('abrir');
					$('#comentario<?php echo $row['idtaskschecklist']; ?>').addClass('cerrar');
				}
				// Hacer algo si el checkbox ha sido seleccionado
				$('#other<?php echo $row['idtaskschecklist']; ?>').prop('checked', false);
				$('#yes<?php echo $row['idtaskschecklist']; ?>').prop('checked', false);
			}
		});
		
	<?php	
		}
	?>
	
	 $( "#dialog2" ).dialog({
		 	
			    autoOpen: false,
			 	resizable: false,
				width:600,
				height:240,
				modal: true,
				buttons: {
				    "Delete": function() {
	
						$.ajax({
									data:  {id: $('#idEliminar').val(), accion: '<?php echo $eliminar; ?>'},
									url:   '../../ajax/ajax.php',
									type:  'post',
									beforeSend: function () {
											
									},
									success:  function (response) {
											url = "index.php";
											$(location).attr('href',url);
											
									}
							});
						$( this ).dialog( "close" );
						$( this ).dialog( "close" );
							$('html, body').animate({
	           					scrollTop: '1000px'
	       					},
	       					1500);
				    },
				    Cancel: function() {
						$( this ).dialog( "close" );
				    }
				}
		 
		 
	 		}); //fin del dialogo para eliminar
	
	
	<?php 
		echo $serviciosHTML->validacion($tabla);
	
	?>
	
	
	
	//al enviar el formulario
    $('#cargar').click(function(){
		
		if (validador() == "")
        {
			//información del formulario
			var formData = new FormData($(".formulario")[0]);
			var message = "";
			//hacemos la petición ajax  
			$.ajax({
				url: '../../ajax/ajax.php',  
				type: 'POST',
				// Form data
				//datos del formulario
				data: formData,
				//necesario para subir archivos via ajax
				cache: false,
				contentType: false,
				processData: false,
				//mientras enviamos el archivo
				beforeSend: function(){
					$("#load").html('<img src="../../imagenes/load13.gif" width="50" height="50" />');       
				},
				//una vez finalizado correctamente
				success: function(data){

					if (data == '') {
                                            $(".alert").removeClass("alert-danger");
											$(".alert").removeClass("alert-info");
                                            $(".alert").addClass("alert-success");
                                            $(".alert").html('<strong>Ok!</strong> Was modified Successfully the <strong><?php echo $singular; ?></strong>. ');
											$(".alert").delay(3000).queue(function(){
												/*aca lo que quiero hacer 
												  después de los 2 segundos de retraso*/
												$(this).dequeue(); //continúo con el siguiente ítem en la cola
												
											});
											$("#load").html('');
											//url = "index.php";
											//$(location).attr('href',url);
                                            
											
                                        } else {
                                        	$(".alert").removeClass("alert-danger");
                                            $(".alert").addClass("alert-danger");
                                            $(".alert").html('<strong>Error!</strong> '+data);
                                            $("#load").html('');
                                        }
				},
				//si ha ocurrido un error
				error: function(){
					$(".alert").html('<strong>Error!</strong> Refresh the page');
                    $("#load").html('');
				}
			});
		}
    });
	
	$('#enddate').datetimepicker({
	dayOfWeekStart : 1,
	format: 'Y-m-d H:i',
	lang:'en'
	});
	$('#enddate').datetimepicker({step:10});
	
	$('#alarm').datetimepicker({
	dayOfWeekStart : 1,
	format: 'Y-m-d H:i',
	lang:'en'
	});
	$('#alarm').datetimepicker({step:10});
	
	$('#imagen1').on('change', function(e) {
	  var Lector,
		  oFileInput = this;
	 
	  if (oFileInput.files.length === 0) {
		return;
	  };
	 
	  Lector = new FileReader();
	  Lector.onloadend = function(e) {
		$('#vistaPrevia1').attr('src', e.target.result);         
	  };
	  Lector.readAsDataURL(oFileInput.files[0]);
	 
	});
	
	$('#imagen2').on('change', function(e) {
	  var Lector,
		  oFileInput = this;
	 
	  if (oFileInput.files.length === 0) {
		return;
	  };
	 
	  Lector = new FileReader();
	  Lector.onloadend = function(e) {
		$('#vistaPrevia2').attr('src', e.target.result);         
	  };
	  Lector.readAsDataURL(oFileInput.files[0]);
	 
	});
	
	$('#imagen3').on('change', function(e) {
	  var Lector,
		  oFileInput = this;
	 
	  if (oFileInput.files.length === 0) {
		return;
	  };
	 
	  Lector = new FileReader();
	  Lector.onloadend = function(e) {
		$('#vistaPrevia3').attr('src', e.target.result);         
	  };
	  Lector.readAsDataURL(oFileInput.files[0]);
	 
	});
	
	$('#imagen4').on('change', function(e) {
	  var Lector,
		  oFileInput = this;
	 
	  if (oFileInput.files.length === 0) {
		return;
	  };
	 
	  Lector = new FileReader();
	  Lector.onloadend = function(e) {
		$('#vistaPrevia4').attr('src', e.target.result);         
	  };
	  Lector.readAsDataURL(oFileInput.files[0]);
	 
	});
	
	
	$('#imagen5').on('change', function(e) {
	  var Lector,
		  oFileInput = this;
	 
	  if (oFileInput.files.length === 0) {
		return;
	  };
	 
	  Lector = new FileReader();
	  Lector.onloadend = function(e) {
		$('#vistaPrevia5').attr('src', e.target.result);         
	  };
	  Lector.readAsDataURL(oFileInput.files[0]);
	 
	});
	
	$('#imagen6').on('change', function(e) {
	  var Lector,
		  oFileInput = this;
	 
	  if (oFileInput.files.length === 0) {
		return;
	  };
	 
	  Lector = new FileReader();
	  Lector.onloadend = function(e) {
		$('#vistaPrevia6').attr('src', e.target.result);         
	  };
	  Lector.readAsDataURL(oFileInput.files[0]);
	 
	});
	
	$('#imagen7').on('change', function(e) {
	  var Lector,
		  oFileInput = this;
	 
	  if (oFileInput.files.length === 0) {
		return;
	  };
	 
	  Lector = new FileReader();
	  Lector.onloadend = function(e) {
		$('#vistaPrevia7').attr('src', e.target.result);         
	  };
	  Lector.readAsDataURL(oFileInput.files[0]);
	 
	});
	
	$('#imagen8').on('change', function(e) {
	  var Lector,
		  oFileInput = this;
	 
	  if (oFileInput.files.length === 0) {
		return;
	  };
	 
	  Lector = new FileReader();
	  Lector.onloadend = function(e) {
		$('#vistaPrevia8').attr('src', e.target.result);         
	  };
	  Lector.readAsDataURL(oFileInput.files[0]);
	 
	});

});
</script>
<?php } ?>
</body>
</html>
