<?php

session_start();

if (!isset($_SESSION['usua_predio']))
{
	header('Location: ../error.php');
} else {


include ('../includes/funciones.php');
include ('../includes/funcionesUsuarios.php');
include ('../includes/funcionesHTML.php');
include ('../includes/funcionesReferencias.php');

$serviciosFunciones 	= new Servicios();
$serviciosUsuario 		= new ServiciosUsuarios();
$serviciosHTML 			= new ServiciosHTML();
$serviciosReferencias 	= new ServiciosReferencias();


$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_predio']),"Dashboard",$_SESSION['refroll_predio'],'');


/////////////////////// Opciones pagina ///////////////////////////////////////////////

$tituloWeb = "Gestión: Caracol Bienes Raíces";
//////////////////////// Fin opciones ////////////////////////////////////////////////

$tabla 			= "inmuebles";

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


<link href="../css/estiloDash.css" rel="stylesheet" type="text/css">
    

    
    <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" href="../css/jquery-ui.css">

    <script src="../js/jquery-ui.js"></script>
    
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

	<style type="text/css">
		table {
		   width: 100%;
		   border: 1px solid #343434;
		   border-radius: 8px 8px 0px 0px;
		-moz-border-radius: 8px 8px 0px 0px;
		-webkit-border-radius: 8px 8px 0px 0px;
		border: 0px solid #000000;
		}
		
		.radius {
		border-radius: 8px 8px 0px 0px;
		-moz-border-radius: 8px 8px 0px 0px;
		-webkit-border-radius: 8px 8px 0px 0px;
		border: 0px solid #000000;
		}
		
		table thead {
			background-color: #686868;
			
		}
		
td {
   width: 100%;
   text-align: center;
   vertical-align: top;
   border: 1px solid #343434;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
   font-weight:bold;
   color:#FFF;
   text-shadow: 1px 1px 1px #333;
}

th {
   width: 100%;
   padding:2px 5px;
   color:#FFF;
   text-align: center;
   vertical-align: top;
   border: 1px solid #343434;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
   font-weight:bold;
   
}
caption {
   padding: 0.3em;
}

.headBoxInfo span {
	cursor:pointer;
}
		
	</style>
    
   
   <link href="../css/perfect-scrollbar.css" rel="stylesheet">
      <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
      <script src="../js/jquery.mousewheel.js"></script>
      <script src="../js/perfect-scrollbar.js"></script>
      <script>
      jQuery(document).ready(function ($) {
        "use strict";
        $('#navigation').perfectScrollbar();
      });
    </script>
    
    <link rel="stylesheet" href="../css/chosen.css">
    
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
	<script src="../js/graficos/morris.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
	<script src="../lib/example.js"></script>
  	<link rel="stylesheet" href="../lib/example.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
    <link rel="stylesheet" href="../css/graficos/morris.css">
</head>

<body>

 
<?php echo str_replace('..','../dashboard',$resMenu); ?>

<div id="content">

<h3>Dashboard</h3>

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Filtros <span class="glyphicon glyphicon-minus abrir" style="cursor:pointer; float:right; padding-right:12px;">(Cerrar)</span></p>
	        
        </div><!-- fin del headBoxInfo-->
    	<div class="cuerpoBox filt">
            <form class="form-inline formulario" role="form">
            <div class="row">
    			<div class="form-group col-md-3">
                	<label class="control-label" style="text-align:left" for="celular1">Urbanización</label>
                    <div class="input-group col-md-12">
                    	<select data-placeholder="selecione el cliente..." id="refurbanizacion" name="refurbanizacion" class="chosen-select" style="width:250px;" tabindex="2">
                            <option value=""></option>
                            <?php while ($rowC = mysql_fetch_array($resUrbanizacion)) { ?>
                                <option value="<?php echo $rowC[0]; ?>"><?php echo $rowC[4].' - '.$rowC[3].' - '.$rowC[2].' - '.$rowC[1]; ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group col-md-3">
                	<label class="control-label" style="text-align:left" for="celular1">Tipo Vivienda</label>
                    <div class="input-group col-md-12">
                    	<select id="reftipovivienda" name="reftipovivienda" class="form-control">
                            <?php while ($rowTV = mysql_fetch_array($resTipoVivienda)) { ?>
                                <option value="<?php echo $rowTV[0]; ?>"><?php echo $rowTV[1]; ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                
                <div class="form-group col-md-3">
                	<label class="control-label" style="text-align:left" for="celular1">Uso</label>
                    <div class="input-group col-md-12">
                    	<select id="refuso" name="refuso" class="form-control">
                            <?php while ($rowU = mysql_fetch_array($resUsos)) { ?>
                                <option value="<?php echo $rowU[0]; ?>"><?php echo $rowU[1]; ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group col-md-3">
                	<label class="control-label" style="text-align:left" for="celular1">Situación Inmueble</label>
                    <div class="input-group col-md-12">
                    	<select id="refsituacioninmueble" name="refsituacioninmueble" class="form-control">
                            <?php while ($rowST = mysql_fetch_array($resSitInm)) { ?>
                                <option value="<?php echo $rowST[0]; ?>"><?php echo $rowST[1]; ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group col-md-3">
                    <label class="control-label" style="text-align:left" for="celular1">Dormitorios</label>
                    <div class="input-group col-md-12">
                    	<input id="dormitorios" class="form-control" type="number" required placeholder="Ingrese los Dormitorios..." name="dormitorios">
                    </div>
                </div>
                
                
                <div class="form-group col-md-3">
                    <label class="control-label" style="text-align:left" for="celular1">Baños</label>
                    <div class="input-group col-md-12">
                    	<input id="banios" class="form-control" type="number" required placeholder="Ingrese los Baños..." name="banios">
                    </div>
                </div>
                
                
                <div class="form-group col-md-3">
                    <label class="control-label" style="text-align:left" for="celular1">Mtrs En Construcción</label>
                    <div class="input-group col-md-12">
                    	<input id="encontruccion" class="form-control" type="number" required placeholder="Ingrese los Mtrs en Construcción..." name="encontruccion">
                    </div>
                </div>
                
                
                <div class="form-group col-md-3">
                    <label class="control-label" style="text-align:left" for="celular1">Mtrs Cuadrados</label>
                    <div class="input-group col-md-12">
                    	<input id="mts2" class="form-control" type="number" required placeholder="Ingrese los Mtrs Cuadrados..." name="mts2">
                    </div>
                </div>
                
                
                <div class="form-group col-md-3">
                    <label class="control-label" style="text-align:left" for="celular1">Año en Construcción</label>
                    <div class="input-group col-md-12">
                    	<input id="anioconstruccion" class="form-control" type="number" required placeholder="Ingrese los Años en Construcción..." name="anioconstruccion">
                    </div>
                </div>
                
                
                <div class="form-group col-md-3">
                    <label class="control-label" style="text-align:left" for="Valor Mtrs">Precio Venta Propietario</label>
                    <div class="input-group col-md-12">
                    	<span class="input-group-addon">$</span>
                    		<input id="precioventapropietario" class="form-control" type="text" required value="0" name="precioventapropietario">
                    	<span class="input-group-addon">.00</span>
                    </div>
                </div>
                
                
                <div class="form-group col-md-3">
                    <label class="control-label" style="text-align:left" for="celular1">Nombre Propietario</label>
                    <div class="input-group col-md-12">
                    	<input id="nombrepropietario" class="form-control" type="text" required placeholder="Ingrese Nombre del Propietario..." name="nombrepropietario">
                    </div>
                </div>
                
                
                <div class="form-group col-md-3">
                    <label class="control-label" style="text-align:left" for="celular1">Apellido Propietario</label>
                    <div class="input-group col-md-12">
                    	<input id="apellidopropietario" class="form-control" type="text" required placeholder="Ingrese Apellido del Propietario..." name="apellidopropietario">
                    </div>
                </div>
                
                
                <div class="form-group col-md-3">
                    <label for="fechacarga" class="control-label" style="text-align:left">Fecha de Carga</label>
                    <div class="input-group col-md-6">
                        <input class="form-control" type="text" name="fechacarga" id="fechacarga" value="Date"/>
                    </div>
                    
                </div>

				
                <div class="form-group col-md-3">
                	<label class="control-label" style="text-align:left" for="celular1">Usuario</label>
                    <div class="input-group col-md-12">
                    	<select id="refusuario" name="refusuario" class="form-control">
                            <?php while ($rowUsua = mysql_fetch_array($resUsuario)) { ?>
                                <option value="<?php echo $rowUsua[0]; ?>"><?php echo $rowUsua['apellidoynombre']; ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group col-md-3">
                	<label class="control-label" style="text-align:left" for="celular1">Comisión</label>
                    <div class="input-group col-md-12">
                    	<select id="refcomision" name="refcomision" class="form-control">
                            <?php while ($rowCom = mysql_fetch_array($resComision)) { ?>
                                <option value="<?php echo $rowCom[0]; ?>"><?php echo $rowCom[1]; ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>
                
                
				<input type="hidden" id="accion" name="accion" value="filtros"/>
                
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
                        <button type="button" class="btn btn-success" id="cargar" style="margin-left:0px;"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                    </li>
                </ul>
                </div>
            </div>
            </form>
    </div><!-- fin del cuerpoBox-->

    </div><!-- fin del BoxLargo-->
    
    
    <div class="boxInfoLargo2">
    	<div class="cuerpoBox">
            <div class="row" style="margin:0 15px;">
                <div class="col-md-4">
                    <div align="center">
                    <h3>Valoración</h3>
                    </div>
                    
                    <div id="graph"></div>
                    <pre id="code" class="prettyprint linenums">
        
                    </pre>
                </div>
                <div class="col-md-4">
                    <div align="center">
                    <h3>Tipo Vivienda</h3>
                    </div>
                    <div id="graph2"></div>
                    <pre id="code2" class="prettyprint linenums">
        
                    </pre>
                </div>
                
                <div class="col-md-4">
                    <div align="center">
                    <h3>Usos</h3>
                    </div>
                    <div id="graph3"></div>
                    <pre id="code3" class="prettyprint linenums">
        
                    </pre>
                </div>
        
            </div>
    	</div>
    </div>
    
    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Inmuebles Cargados</p>
        	
        </div>
    	<div class="cuerpoBox resultados" id="example">
        	
    	</div>
    </div>
    
    
    



</div>



<script src="../js/chosen.jquery.js" type="text/javascript"></script>
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
  });
  </script>
<script type="text/javascript">
$(document).ready(function(){
	
	$('.abrir').click(function() {
		
		if ($('.abrir').text() == '(Abrir)') {
			$('.filt').show( "slow" );
			$('.abrir').text('(Cerrar)');
			$('.abrir').removeClass('glyphicon glyphicon-plus');
			$('.abrir').addClass('glyphicon glyphicon-minus');
		} else {
			$('.filt').slideToggle( "slow" );
			$('.abrir').text('(Abrir)');
			$('.abrir').addClass('glyphicon glyphicon-plus');
			$('.abrir').removeClass('glyphicon glyphicon-minus');

		}
	});
	
	$('.abrir').click();
	
	$('.abrir').click(function() {
		$('.filt').show();
	});
	
	function traerInmuebles() {
		$.ajax({
				data:  {refurbanizacion : $('#refurbanizacion').val(),
						reftipovivienda : $('#reftipovivienda').val(),
						refuso : $('#refuso').val(),
						refsituacioninmueble : $('#refsituacioninmueble').val(),
						dormitorios : $('#dormitorios').val(),
						banios : $('#banios').val(),
						encontruccion : $('#encontruccion').val(),
						mts2 : $('#mts2').val(),
						anioconstruccion : $('#anioconstruccion').val(),
						precioventapropietario : $('#precioventapropietario').val(),
						nombrepropietario : $('#nombrepropietario').val(),
						apellidopropietario : $('#apellidopropietario').val(),
						fechacarga : $('#fechacarga').val(),
						refusuario : $('#refusuario').val(),
						refcomision : $('#refcomision').val(),
						accion: 'Filtros'},
				url:   '../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('.resultados').html(response);
						
				}
		});
	}
	
	function graficos() {
	
	  eval($('#code').text());
	  prettyPrint();
	}
	
	function graficosTV() {
	
	  eval($('#code2').text());
	  prettyPrint();
	}
	
	function graficosU() {
	
	  eval($('#code3').text());
	  prettyPrint();
	}
	
	function GraficoValoracion() {
		$.ajax({
				data:  {refurbanizacion : $('#refurbanizacion').val(),
						reftipovivienda : $('#reftipovivienda').val(),
						refuso : $('#refuso').val(),
						refsituacioninmueble : $('#refsituacioninmueble').val(),
						dormitorios : $('#dormitorios').val(),
						banios : $('#banios').val(),
						encontruccion : $('#encontruccion').val(),
						mts2 : $('#mts2').val(),
						anioconstruccion : $('#anioconstruccion').val(),
						precioventapropietario : $('#precioventapropietario').val(),
						nombrepropietario : $('#nombrepropietario').val(),
						apellidopropietario : $('#apellidopropietario').val(),
						fechacarga : $('#fechacarga').val(),
						refusuario : $('#refusuario').val(),
						refcomision : $('#refcomision').val(),
						accion: 'graficosValoracion'},
				url:   '../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('#code').html(response);
						graficos();
				}
		});
	}
	
	function GraficosTipoVivienda() {
		$.ajax({
				data:  {refurbanizacion : $('#refurbanizacion').val(),
						reftipovivienda : $('#reftipovivienda').val(),
						refuso : $('#refuso').val(),
						refsituacioninmueble : $('#refsituacioninmueble').val(),
						dormitorios : $('#dormitorios').val(),
						banios : $('#banios').val(),
						encontruccion : $('#encontruccion').val(),
						mts2 : $('#mts2').val(),
						anioconstruccion : $('#anioconstruccion').val(),
						precioventapropietario : $('#precioventapropietario').val(),
						nombrepropietario : $('#nombrepropietario').val(),
						apellidopropietario : $('#apellidopropietario').val(),
						fechacarga : $('#fechacarga').val(),
						refusuario : $('#refusuario').val(),
						refcomision : $('#refcomision').val(),
						accion: 'graficosTipoVivienda'},
				url:   '../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('#code2').html(response);
						graficosTV();
				}
		});
	}
	
	
	function GraficosUsos() {
		$.ajax({
				data:  {refurbanizacion : $('#refurbanizacion').val(),
						reftipovivienda : $('#reftipovivienda').val(),
						refuso : $('#refuso').val(),
						refsituacioninmueble : $('#refsituacioninmueble').val(),
						dormitorios : $('#dormitorios').val(),
						banios : $('#banios').val(),
						encontruccion : $('#encontruccion').val(),
						mts2 : $('#mts2').val(),
						anioconstruccion : $('#anioconstruccion').val(),
						precioventapropietario : $('#precioventapropietario').val(),
						nombrepropietario : $('#nombrepropietario').val(),
						apellidopropietario : $('#apellidopropietario').val(),
						fechacarga : $('#fechacarga').val(),
						refusuario : $('#refusuario').val(),
						refcomision : $('#refcomision').val(),
						accion: 'graficosUsos'},
				url:   '../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						
				},
				success:  function (response) {
						$('#code3').html(response);
						graficosU();
				}
		});
	}
	
	traerInmuebles();
	GraficoValoracion();
	GraficosTipoVivienda();
	GraficosUsos();
	$('#buscar').click(function(e) {
        
		
	});
	
	
	
	
});
</script>
<?php } ?>
</body>
</html>
