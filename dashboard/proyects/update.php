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

$serviciosFunciones 	= new Servicios();
$serviciosUsuario 		= new ServiciosUsuarios();
$serviciosHTML 			= new ServiciosHTML();
$serviciosProyects	 	= new ServiciosProyects();

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_p']),"Projects",$_SESSION['refroll_p'],'');


$id = $_GET['id'];

$resResultado = $serviciosProyects->traerProyectsPorId($id);


/////////////////////// Opciones pagina ///////////////////////////////////////////////
$singular = "Project";

$plural = "Projects";

$eliminar = "eliminarProyects";

$modificar = "modificarProyects";

$idTabla = "idproyect";

$tituloWeb = "Restricted access: B-Projects";
//////////////////////// Fin opciones ////////////////////////////////////////////////


/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "proyects";

$lblCambio	 	= array("commission","refresponsible","refstate","order","sendemail");
$lblreemplazo	= array("Percentage of Commission","Responsible","Status","Number Order","Send email change of status");



$resResp 	= $serviciosProyects->traerResponsible();
$cadRef2 = '';
while ($rowTT2 = mysql_fetch_array($resResp)) {
	if (mysql_result($resResultado,0,'refresponsible') == $rowTT2[0]) {
		$cadRef2 = $cadRef2.'<option value="'.$rowTT2[0].'">'.utf8_encode($rowTT2[1]).'</option>';
	} else {
		$cadRef2 = $cadRef2.'<option value="'.$rowTT2[0].'">'.utf8_encode($rowTT2[1]).'</option>';
	}
	
}

$resState 	= $serviciosProyects->traerState();
$cadRef3 = '';
while ($rowTT3 = mysql_fetch_array($resState)) {
	if (mysql_result($resResultado,0,'refstate') == $rowTT3[0]) {
		$cadRef3 = $cadRef3.'<option value="'.$rowTT3[0].'">'.utf8_encode($rowTT3[1]).'</option>';
	} else {
		$cadRef3 = $cadRef3.'<option value="'.$rowTT3[0].'">'.utf8_encode($rowTT3[1]).'</option>';
	}
	
}

$refdescripcion = array(0=> $cadRef2, 1=> $cadRef3);
$refCampo 	=  array("refresponsible","refstate");
//////////////////////////////////////////////  FIN de los opciones //////////////////////////

/////////////////// Fechas para Suspender ///////////////////////

$resUser = $serviciosProyects->traerUser();

$resUserProyect = $serviciosProyects->traerProyectEmployeesPorProyect($id);


	while ($subrow = mysql_fetch_array($resUserProyect)) {
			$arrayFS[] = $subrow;
	}



$cadUser = '<ul class="list-inline">';
while ($rowFS = mysql_fetch_array($resUser)) {
	$check = '';
	if (mysql_num_rows($resUserProyect)>0) {
		foreach ($arrayFS as $item) {
			if (stripslashes($item['iduser']) == $rowFS[0]) {
				$check = 'checked';	
			}
		}
	}
	$cadUser = $cadUser."<li>".'<input id="user'.$rowFS[0].'" '.$check.' class="form-control" type="checkbox" required="" style="width:50px;" name="user'.$rowFS[0].'"><p>'.$rowFS[1].'</p>'."</li>";


}



$cadUser = $cadUser."</ul>";

/////////////////////////////////////////////////////////////////

$resRelacionFotos = $serviciosProyects->TraerFotosRelacion($id);

$cantidadImagenes = 0;
$cantidadImagenes = mysql_num_rows($resRelacionFotos);


$formulario 	= $serviciosFunciones->camposTablaModificar($id, $idTabla, $modificar,$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);


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
        	<p style="color: #fff; font-size:18px; height:16px;">Update <?php echo $singular; ?></p>
        	
        </div>
    	<div class="cuerpoBox">
        	<form class="form-inline formulario" role="form">
        	
			<div class="row">
			<?php echo $formulario; ?>
            </div>
            
            <div class="row">
            	<div class="form-group col-md-12">
                	<label class="control-label" style="text-align:left" for="fechas">Select Users</label>
                    <div class="input-group col-md-12">
                    	<?php echo $cadUser; ?>
                    </div>
                </div>
            </div>
            
            <div class="row" style="margin-left:25px; margin-right:25px;">
                <h3>Loaded images</h3>
                    <ul class="list-inline">
                        <?php while ($rowImg = mysql_fetch_array($resRelacionFotos)) { ?>
                        <li>
                            
                            <div class="col-md-4" align="center">
                            <div id="img<?php echo $rowImg[3]; ?>">
                            	<?php 
									$mystring = $rowImg['type'];
									$findme   = 'image';
									$pos = strpos($mystring, $findme);
									if ($pos !== false) { 
								?>
                                <img src="<?php echo '../../archivos/'.$rowImg[0].'/'.$rowImg[1].'/'.utf8_encode($rowImg[2]) ?>" width="100" height="100">
                                <?php } else { ?>
                                <img src="../../imagenes/pdf_ico2.jpg" width="100" height="100"><?php echo $rowImg['imagen']; ?>
                                <?php } ?>
                            </div>
                            <input type="button" name="eliminar" id="<?php echo $rowImg[3]; ?>" class="btn btn-danger eliminar" value="Deleted">
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
                        <button type="button" class="btn btn-warning" id="cargar" style="margin-left:0px;">Update</button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-danger varborrar" id="<?php echo $id; ?>" style="margin-left:0px;">Delete</button>
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
                                //$('#vistaPrevia30').attr('src', e.target.result);
				$("#auxImg").html($('#'+imagenId).html());
				$("#dialog3").dialog("open");
				//url = "../clienteseleccionado/index.php?idcliente=" + usersid;
				//$(location).attr('href',url);
			  } else {
				alert("Error, vuelva a realizar la acción.");	
			  }
			  
			  //post code
	});
	
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
	
	$( "#dialog3" ).dialog({
		 	
		autoOpen: false,
		resizable: false,
		width:600,
		height:340,
		modal: true,
		buttons: {
			"Eliminar": function() {

				$.ajax({
							data:  {id: $("#idAgente").val(), accion: 'eliminarFoto'},
							url:   '../../ajax/ajax.php',
							type:  'post',
							beforeSend: function () {
									
							},
							success:  function (response) {
									url = "update.php?id=<? echo $id; ?>";
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
