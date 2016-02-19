<?php


session_start();

if (!isset($_SESSION['usua_predio']))
{
	header('Location: ../../error.php');
} else {


include ('../../includes/funciones.php');
include ('../../includes/funcionesUsuarios.php');
include ('../../includes/funcionesHTML.php');
include ('../../includes/funcionesReferencias.php');

$serviciosFunciones = new Servicios();
$serviciosUsuario 	= new ServiciosUsuarios();
$serviciosHTML 		= new ServiciosHTML();
$serviciosReferencias 	= new ServiciosReferencias();

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_predio']),"Imnuebles",$_SESSION['refroll_predio'],'');


$id = $_GET['id'];

$resResultado = $serviciosReferencias->traerInmueblesPorId($id);


/////////////////////// Opciones pagina ///////////////////////////////////////////////
$singular = "Imnueble";

$plural = "Imnuebles";

$eliminar = "eliminarInmuebles";

$modificar = "modificarInmuebles";

$idTabla = "idinmueble";

$tituloWeb = "Gestión: Caracol Bienes Raíces";
//////////////////////// Fin opciones ////////////////////////////////////////////////


/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "inmuebles";


//////////////////////////////////////////////  FIN de los opciones //////////////////////////

$resUrbanizacion	=	$serviciosReferencias->traerUrbanizacion();
$resTipoVivienda	=	$serviciosReferencias->traerTipoVivienda();
$resUsos			=	$serviciosReferencias->traerUsos();
$resComision		=	$serviciosReferencias->traerComision();
$resSitInm			=	$serviciosReferencias->traerSituacionInmueble();

if ($_SESSION['idroll_predio'] == 1) {
	$resUsuario = $serviciosReferencias->traerUsuariosRegistrados();
} else {
	$resUsuario = $serviciosReferencias->traerUsuariosRegistradosPorId($_SESSION['idusuario']);
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
    
    <link rel="stylesheet" href="../../css/chosen.css">
    
</head>

<body>

 <?php echo $resMenu; ?>

<div id="content">

<h3><?php echo $plural; ?></h3>

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Modificar <?php echo $singular; ?></p>
        	
        </div>
    	<div class="cuerpoBox">
        	<form class="form-inline formulario" role="form">
        	
			<div class="row">
				<div class="alert alert-info" style="margin:0 15px;">
                	<p><span class="glyphicon glyphicon-info-sign"></span> Los datos <strong>Urbanización, Mtrs En Construcción, Mtrs Cuadrados, Año en Construcción, Precio Venta Propietario, Costo Mtrs, Costo Nacional</strong>.</p>
                </div>
            	<div class="form-group col-md-6">
                	<label class="control-label" style="text-align:left" for="celular1">Urbanización</label>
                    <div class="input-group col-md-12">
                    	<select data-placeholder="selecione el cliente..." id="refurbanizacion" name="refurbanizacion" class="chosen-select" style="width:450px;" tabindex="2">
                            <option value=""></option>
                            <?php while ($rowC = mysql_fetch_array($resUrbanizacion)) { ?>
                            	<?php if (mysql_result($resResultado,0,'refurbanizacion') == $rowC[0]) { ?>
                                <option value="<?php echo $rowC[0]; ?>" selected><?php echo $rowC[4].' - '.$rowC[3].' - '.$rowC[2].' - '.$rowC[1]; ?></option>
                                <?php } else { ?>
                            	<option value="<?php echo $rowC[0]; ?>"><?php echo $rowC[4].' - '.$rowC[3].' - '.$rowC[2].' - '.$rowC[1]; ?></option>
                                <?php } ?>    
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                	<label class="control-label" style="text-align:left" for="celular1">Tipo Vivienda</label>
                    <div class="input-group col-md-12">
                    	<select id="reftipovivienda" name="reftipovivienda" class="form-control">
                            <?php while ($rowTV = mysql_fetch_array($resTipoVivienda)) { ?>
                                
                                <?php if (mysql_result($resResultado,0,'reftipovivienda') == $rowTV[0]) { ?>
                                	<option value="<?php echo $rowTV[0]; ?>" selected><?php echo $rowTV[1]; ?></option>
                                <?php } else { ?>
                            		<option value="<?php echo $rowTV[0]; ?>"><?php echo $rowTV[1]; ?></option>
                                <?php } ?>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                
                <div class="form-group col-md-6">
                	<label class="control-label" style="text-align:left" for="celular1">Uso</label>
                    <div class="input-group col-md-12">
                    	<select id="refuso" name="refuso" class="form-control">
                            <?php while ($rowU = mysql_fetch_array($resUsos)) { ?>
                                
                                <?php if (mysql_result($resResultado,0,'refuso') == $rowU[0]) { ?>
                                	<option value="<?php echo $rowU[0]; ?>" selected><?php echo $rowU[1]; ?></option>
                                <?php } else { ?>
                            		<option value="<?php echo $rowU[0]; ?>"><?php echo $rowU[1]; ?></option>
                                <?php } ?>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                	<label class="control-label" style="text-align:left" for="celular1">Situación Inmueble</label>
                    <div class="input-group col-md-12">
                    	<select id="refsituacioninmueble" name="refsituacioninmueble" class="form-control">
                            <?php while ($rowST = mysql_fetch_array($resSitInm)) { ?>
                                
                                <?php if (mysql_result($resResultado,0,'refsituacioninmueble') == $rowST[0]) { ?>
                                	<option value="<?php echo $rowST[0]; ?>" selected><?php echo $rowST[1]; ?></option>
                                <?php } else { ?>
                            		<option value="<?php echo $rowST[0]; ?>"><?php echo $rowST[1]; ?></option>
                                <?php } ?>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                    <label class="control-label" style="text-align:left" for="celular1">Dormitorios</label>
                    <div class="input-group col-md-12">
                    	<input id="dormitorios" class="form-control" type="number" required placeholder="Ingrese los Dormitorios..." name="dormitorios" value="<?php echo mysql_result($resResultado,0,'dormitorios'); ?>">
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                    <label class="control-label" style="text-align:left" for="celular1">Baños</label>
                    <div class="input-group col-md-12">
                    	<input id="banios" class="form-control" type="number" required placeholder="Ingrese los Baños..." name="banios" value="<?php echo mysql_result($resResultado,0,'banios'); ?>">
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                    <label class="control-label" style="text-align:left" for="celular1">Mtrs En Construcción</label>
                    <div class="input-group col-md-12">
                    	<input id="encontruccion" class="form-control" type="number" required placeholder="Ingrese los Mtrs en Construcción..." name="encontruccion" value="<?php echo mysql_result($resResultado,0,'encontruccion'); ?>">
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                    <label class="control-label" style="text-align:left" for="celular1">Mtrs Cuadrados</label>
                    <div class="input-group col-md-12">
                    	<input id="mts2" class="form-control" type="number" required placeholder="Ingrese los Mtrs Cuadrados..." name="mts2" value="<?php echo mysql_result($resResultado,0,'mts2'); ?>">
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                    <label class="control-label" style="text-align:left" for="celular1">Año en Construcción</label>
                    <div class="input-group col-md-12">
                    	<input id="anioconstruccion" class="form-control" type="number" required placeholder="Ingrese los Años en Construcción..." name="anioconstruccion" value="<?php echo mysql_result($resResultado,0,'anioconstruccion'); ?>">
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                    <label class="control-label" style="text-align:left" for="Valor Mtrs">Precio Venta Propietario</label>
                    <div class="input-group col-md-12">
                    	<span class="input-group-addon">$</span>
                    		<input id="precioventapropietario" class="form-control" type="text" required value="<?php echo mysql_result($resResultado,0,'precioventapropietario'); ?>" name="precioventapropietario">
                    	<span class="input-group-addon">.00</span>
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                    <label class="control-label" style="text-align:left" for="celular1">Nombre Propietario</label>
                    <div class="input-group col-md-12">
                    	<input id="nombrepropietario" class="form-control" type="text" required placeholder="Ingrese Nombre del Propietario..." name="nombrepropietario" value="<?php echo mysql_result($resResultado,0,'nombrepropietario'); ?>">
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                    <label class="control-label" style="text-align:left" for="celular1">Apellido Propietario</label>
                    <div class="input-group col-md-12">
                    	<input id="apellidopropietario" class="form-control" type="text" required placeholder="Ingrese Apellido del Propietario..." name="apellidopropietario" value="<?php echo mysql_result($resResultado,0,'apellidopropietario'); ?>">
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                    <label for="fechacarga" class="control-label" style="text-align:left">Fecha de Carga</label>
                    <div class="input-group col-md-6">
                        <input class="form-control" type="text" name="fechacarga" id="fechacarga" value="Date"/>
                    </div>
                    
                </div>

				
                <div class="form-group col-md-6">
                	<label class="control-label" style="text-align:left" for="celular1">Usuario</label>
                    <div class="input-group col-md-12">
                    	<select id="refusuario" name="refusuario" class="form-control">
                            <?php while ($rowUsua = mysql_fetch_array($resUsuario)) { ?>
                                
                                <?php if (mysql_result($resResultado,0,'refusuario') == $rowUsua[0]) { ?>
                                	<option value="<?php echo $rowUsua[0]; ?>" selected><?php echo $rowUsua['apellidoynombre']; ?></option>
                                <?php } else { ?>
                            		<option value="<?php echo $rowUsua[0]; ?>"><?php echo $rowUsua['apellidoynombre']; ?></option>
                                <?php } ?>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                	<label class="control-label" style="text-align:left" for="celular1">Comisión</label>
                    <div class="input-group col-md-12">
                    	<select id="refcomision" name="refcomision" class="form-control">
                            <?php while ($rowCom = mysql_fetch_array($resComision)) { ?>
                                
                                <?php if (mysql_result($resResultado,0,'refcomision') == $rowCom[0]) { ?>
                                	<option value="<?php echo $rowCom[0]; ?>" selected><?php echo $rowCom[1]; ?></option>
                                <?php } else { ?>
                            		<option value="<?php echo $rowCom[0]; ?>"><?php echo $rowCom[1]; ?></option>
                                <?php } ?>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                	<label class="control-label" style="text-align:left" for="celular1">Costo Mtrs</label>
                    <div class="input-group col-md-12">
                    	<select id="refcostomts" name="refcostomts" class="form-control">
                            
                            
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                	<label class="control-label" style="text-align:left" for="celular1">Costo Nacional</label>
                    <div class="input-group col-md-12">
                    	<select id="refcostonacional" name="refcostonacional" class="form-control">
                            
                            
                        </select>
                    </div>
                </div>
				<input type="hidden" id="accion" name="accion" value="<?php echo $modificar; ?>"/>
                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>"/>
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
                        <button type="button" class="btn btn-warning" id="cargar" style="margin-left:0px;">Modificar</button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-danger varborrar" id="<?php echo $id; ?>" style="margin-left:0px;">Eliminar</button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-default volver" style="margin-left:0px;">Volver</button>
                    </li>
                </ul>
                </div>
            </div>
            </form>
    	</div>
    </div>
    
    
   
</div>


</div>

<div id="dialog2" title="Eliminar <?php echo $singular; ?>">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar el <?php echo $singular; ?>?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Importante: </strong>Si elimina el equipo se perderan todos los datos de este</p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
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
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton eliminar
	
	
	function traerCostoNacional() {
        $.ajax({
				data:  {refurbanizacion: $('#refurbanizacion').val(),
						accion: 'traerCostoNacionalPorPais'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('#refcostonacional').html(response);
						
				}
		});
	}
	
	function traerCostoMts() {
        $.ajax({
				data:  {refurbanizacion: $('#refurbanizacion').val(),
						refuso:	$('#refuso').val(),
						accion: 'traerCostomtsPorCiudad'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('#refcostomts').html(response);
						
				}
		});
	}
	
	
	
	$('#refurbanizacion').change(function(e) {
		traerCostoNacional();
		traerCostoMts();
	});
	
	$('#refuso').change(function(e) {
		traerCostoMts();
	});
	
	traerCostoNacional();
	traerCostoMts();
	
	
	 $( "#dialog2" ).dialog({
		 	
			    autoOpen: false,
			 	resizable: false,
				width:600,
				height:240,
				modal: true,
				buttons: {
				    "Eliminar": function() {
	
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
				    Cancelar: function() {
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
                                            $(".alert").html('<strong>Ok!</strong> Se modifico exitosamente el <strong><?php echo $singular; ?></strong>. ');
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
					$(".alert").html('<strong>Error!</strong> Actualice la pagina');
                    $("#load").html('');
				}
			});
		}
    });

});
</script>
<script src="../../js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
<script>
  $(function() {
	  $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
 
    $( "#fechacarga" ).datepicker();

    $( "#fechacarga" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	$('#fechacarga').datepicker('setDate', <?php echo "'".mysql_result($resResultado,0,'fechacarga')."'"; ?>);
  });
  </script>
<?php } ?>
</body>
</html>
