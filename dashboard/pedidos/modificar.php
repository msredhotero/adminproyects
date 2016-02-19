<?php

session_start();

if ((!isset($_SESSION['usua_cv'])) && ($_SESSION['refroll_cv'] != 1))
{
	header('Location: ../../error.php');
} else {

include ('../../includes/funcionesProductos.php');
include ('../../includes/funcionesVentas.php');
include ('../../includes/funcionesUsuarios.php');

$serviciosProductos = new ServiciosProductos();
$serviciosVentas = new ServiciosVentas();
$serviciosUsuario = new ServiciosUsuarios();

$fecha = date('Y-m-d');

$id = $_GET['id'];
//$resProductos = $serviciosProductos->traerProductosLimite(6);


$resPedido = $serviciosVentas->traerPedidosPorId($id);

$resEstados = $serviciosVentas->traerEstados();


?>

<!DOCTYPE HTML>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta http-equiv='refresh' content='1000' />

<meta name='title' content='Carnes de Primera Calidad' />

<meta name='description' content='Carnes A Casa, somos una empresa abocada a la comercialización de productos cárnicos envasados al vació con los mas elevados Standars de calidad higiene y salubridad. Productos derivados de animales criados en los mejores establecimientos ganaderos del país. Nuestros productos llegan a su hogar por intermedio de transportes refrigerados cuidando celosamente la cadena de frió para mantener la máxima calidad del producto. Manipulados por personal habilitado con libreta sanitaria e indumentaria apropiada para la manipulación de alimentos. Nuestros productos están amparados por certificado de salubridad y establecimiento del SENASA (secretaria nacional de salubridad animal) desde el campo al frigorífico y del frigorífico a su mesa.' />

<meta name='keywords' content='Carnes, Envio Gratis, Frigorifico, Novillo, Ternera' />

<meta name='distribution' content='Global' />

<meta name='language' content='es' />

<meta name='identifier-url' content='http://www.carnesacasa.com.ar' />

<meta name='rating' content='General' />

<meta name='reply-to' content='' />

<meta name='author' content='Webmasters' />

<meta http-equiv='Pragma' content='no-cache/cache' />

<link rel="carnesacasa" href="imagenes/carnesacasaicon.ico" />


<meta http-equiv='Cache-Control' content='no-cache' />

<meta name='robots' content='all' />

<meta name='revisit-after' content='7 day' />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



<title>Gestión: Carnes A Casa</title>
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
    
    <script type="text/javascript">
		$( document ).ready(function() {
			$('.icodashboard2, .icoventas2, .icousuarios2, .icoturnos2, .icoproductos2, .icoreportes2, .icocontratos2, .icosalir2').click(function() {
				$('.menuHober').hide();
				$('.todoMenu').show(100, function() {
					$('#navigation').animate({'margin-left':'0px'}, {
													duration: 800,
													specialEasing: {
													width: "linear",
													height: "easeOutBounce"
													}});
				});
			});
			
			$('.ocultar').click(function(){
				$('.menuHober').show(100, function() {
					$('#navigation').animate({'margin-left':'-185px'}, {
													duration: 800,
													specialEasing: {
													width: "linear",
													height: "easeOutBounce"
													}});
				});
				$('.todoMenu').hide();
			});
			
			
						$("#tooltip2").mouseover(function(){
							$("#tooltip2").mousemove(function(e){
								 $(this).next().css({left : e.pageX , top: e.pageY});
							  });
							eleOffset = $(this).offset();
							$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().fadeOut("fast");
						});
						
						$("#tooltip3").mouseover(function(){
							$("#tooltip3").mousemove(function(e){
								 $(this).next().css({left : e.pageX , top: e.pageY});
							  });
							eleOffset = $(this).offset();
							$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().fadeOut("fast");
						});
						
						$("#tooltip4").mouseover(function(){
							$("#tooltip4").mousemove(function(e){
								 $(this).next().css({left : e.pageX , top: e.pageY});
							  });
							eleOffset = $(this).offset();
							$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().fadeOut("fast");
						});
						
						$("#tooltip5").mouseover(function(){
							$("#tooltip5").mousemove(function(e){
								 $(this).next().css({left : e.pageX , top: e.pageY});
							  });
							eleOffset = $(this).offset();
							$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().fadeOut("fast");
						});
						
						$("#tooltip6").mouseover(function(){
							$("#tooltip6").mousemove(function(e){
								 $(this).next().css({left : e.pageX , top: e.pageY});
							  });
							eleOffset = $(this).offset();
							$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().fadeOut("fast");
						});
						
						$("#tooltip7").mouseover(function(){
							$("#tooltip7").mousemove(function(e){
								 $(this).next().css({left : e.pageX , top: e.pageY});
							  });
							eleOffset = $(this).offset();
							$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().fadeOut("fast");
						});
						
						$("#tooltip8").mouseover(function(){
							$("#tooltip8").mousemove(function(e){
								 $(this).next().css({left : e.pageX , top: e.pageY});
							  });
							eleOffset = $(this).offset();
							$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().fadeOut("fast");
						});
						
						$("#tooltip9").mouseover(function(){
							$("#tooltip9").mousemove(function(e){
								 $(this).next().css({left : e.pageX , top: e.pageY});
							  });
							eleOffset = $(this).offset();
							$(this).next().fadeIn("fast").css({
								
									left: eleOffset.left + $(this).outerWidth(),
									top: eleOffset.top

								});
						}).mouseout(function(){
							$(this).next().fadeOut("fast");
						});

		});
	</script>
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
    
        <link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
</head>

<body>



 
<div id="navigation" >
	<div class="todoMenu">
        <div id="mobile-header">
            Menu
            <p>Usuario: <span style="color: #333; font-weight:900;"><?php echo $_SESSION['nombre_cv']; ?></span></p>
            <p class="ocultar" style="color: #900; font-weight:bold; cursor:pointer; font-family:'Courier New', Courier, monospace; height:20px;">(Ocultar)</p>
        </div>
    
        <nav class="nav">
            <ul>
                <li class="arriba"><div class="icodashboard"></div><a href="../index.php">Dashboard</a></li>
                
                <li><div class="icoventas"></div><a href="../pedidos/">Pedidos</a></li>
                <li><div class="icousuarios"></div><a href="../clientes/">Clientes</a></li>
                <li><div class="icoproductos"></div><a href="../productos/">Productos</a></li>
                <li><div class="icocontratos"></div><a href="../movimientos/">Movimientos</a></li>
                <li><div class="icosalir"></div><a href="../../index.php">Salir</a></li>
            </ul>
        </nav>
        
      
     </div>
     <div class="menuHober">
     	<ul class="ulHober">
                <li class="arriba">
                	<div class="icodashboard2" id="tooltip2"></div>
                    <div class="tooltip-dash">Dashboard</div>
                </li>
                <li>
                	<div class="icoventas2" id="tooltip4"></div>
                    <div class="tooltip-alqui">Pedidos</div>
                </li>
                <li>
                	<div class="icousuarios2" id="tooltip5"></div>
                    <div class="tooltip-usua">Clientes</div>
                </li>
                <li>
                	<div class="icoproductos2" id="tooltip9"></div>
                    <div class="tooltip-con">Productos</div>
                </li>
                <li>
                	<div class="icocontratos2" id="tooltip6"></div>
                    <div class="tooltip-con">Movimientos</div>
                </li>

                <li>
                	<div class="icosalir2" id="tooltip8"></div>
                    <div class="tooltip-sal">Salir</div>
                </li>
            </ul>
     </div>
</div>

<div id="ingoGral" style=" margin-left:60px; padding-top:20px;">

    <div class="boxInfoForm">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Pedidos</p>
        	
        </div>
    	<div class="cuerpoBox">
    		<div class="row"> 
        <div class="col-sm-12 col-md-12">
        <form class="form-inline formulario" role="form">
                	
<!--idproducto,nombre,precio_unit,precio_venta,stock,stock_min,reftipoproducto,refproveedor,codigo,codigobarra,caracteristicas -->
                	
				              	
                    
                    <div class="form-group col-md-6">
                    	<label for="producto" class="control-label" style="text-align:left">Nro Pedido</label>
                        <div class="input-group col-md-12">
                        	<input type="text" class="form-control" id="nropedido" name="nropedido" value="<?php echo mysql_result($resPedido,0, 'nrofactura') ?>" readonly>
                        </div>
                    </div>
					
                    <div class="form-group col-md-6">
                    	<label for="peso" class="control-label" style="text-align:left">Domicilio</label>
                        <div class="input-group col-md-12">
                        	<input type="text" class="form-control" id="domicilio" name="domicilio"  value="<?php echo utf8_encode(mysql_result($resPedido,0, 'domicilio')) ?>" placeholder="Ingrese el Domicilio..." required>
                        </div>
                    </div>


					<div class="form-group col-md-6">
                    	<label for="reftipoproducto" class="control-label" style="text-align:left">Estado</label>
                        <div class="input-group col-md-12">
                            <select class="form-control" id="refestado" name="refestado">
                            	<?php while ($rowE = mysql_fetch_array($resEstados)) { ?>
                            		<?php if ($rowE['idestadoenvio'] == mysql_result($resPedido,0, 'idestadoenvio')) { ?>
                            			<option value="<?php echo $rowE['idestadoenvio']; ?>" selected><?php echo $rowE['estado']; ?></option>
                            		<?php } else { ?>
                                		<option value="<?php echo $rowE['idestadoenvio']; ?>"><?php echo $rowE['estado']; ?></option>
                                	<?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                    	<label for="peso" class="control-label" style="text-align:left">Cliente</label>
                        <div class="input-group col-md-12">
                        	<input type="text" class="form-control" id="refcliente" name="refcliente"  value="<?php echo mysql_result($resPedido,0, 'nombrecompleto') ?>" readonly>
                        </div>
                    </div>
					
                    <div class="form-group col-md-6">
                        <label for="dtp_input2" class="control-label">Fecha de Entrega: (día/mes/año)</label>
                        <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input class="form-control" size="50" type="text" value="" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        <input type="hidden" id="dtp_input2" name="dtp_input2" value="" /><br/>
                    </div>
                    <div class="col-md-12">
                    	<div class="alert alert-warning">
                        	<strong>* Importante: </strong> Recuerde que la fecha de entrega es a partir de las 72 hs.
                        </div>
                    </div>
                    
                         
                    </div>
                    </div>
                    
                    <ul class="list-inline" style="padding-top:15px;">
                    	<li>
                    		<button type="button" class="btn btn-primary modificar" id="<?php echo mysql_result($resPedido,0, 'idfactura') ?>" style="margin-left:0px;">Modificar</button>
                        </li>
                        <li>
                    		<button type="button" class="btn btn-danger vareliminar" id="<?php echo mysql_result($resPedido,0, 'idfactura') ?>" style="margin-left:0px;">Eliminar</button>
                        </li>
   						<li>
                    		<button type="button" class="btn btn-info btnDetalle" id="<?php echo mysql_result($resPedido,0, 'idfactura') ?>" style="margin-left:0px;">Detalle</button>
                        </li>
                        <li>
 							<button type="button" class="btn btn-default volver" style="margin-left:0px;">Volver</button>                       
                        </li>
                    </ul>
                    <div id="load">
                    
                    </div>
                    <div id="error" class="alert alert-info">
                		<p><strong>Importante!:</strong> El campo domicilio es obligatorio</p>
                	</div>
                    <input type="hidden" id="accion" name="accion" value="modificarPedido"/>
                    <input type="hidden" id="idfactura" name="idfactura" value="<?php echo mysql_result($resPedido,0, 'idfactura') ?>"/>
                    <input type="hidden" id="idpedido" name="idpedido" value="<?php echo mysql_result($resPedido,0, 'idpedido') ?>"/>
                </form>
                
                <br>
            <div id="load">
            
            </div>
    	</div>
    </div>

    
    
   

</div>


<div id="dialogDetalle" title="Detalle del Pedido">
    	
        <h3>Carnes a Casa</h3>
        <table class="table table-striped table-responsive">
            	<thead>
                	<tr>
                    	<th>Imagen</th>
                    	<th>Producto</th>
                        <th>Tipo Producto</th>
                        <th>Unidades</th>
                    </tr>
                </thead>
                <tbody id="pedidoDetalle">

                </tbody>
            </table>
</div>

<div id="dialog2" title="Eliminar Pedido">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar el pedido?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Importante: </strong>Se borrara el pedido y se le enviara un email al cliente!.</p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>


<script src="../../js/bootstrap-datetimepicker.min.js"></script>
<script src="../../js/bootstrap-datetimepicker.es.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	
	$('.volver').click(function(event){
				url = "index.php";
				$(location).attr('href',url);
	});//fin del boton eliminar
	
	 $( '#dialog2' ).dialog({
		autoOpen: false,
		resizable: false,
		width:800,
		height:240,
		modal: true,
		buttons: {
			"Eliminar": function() {
				$.ajax({
					data:  {idfactura:	usersid,
							accion:		'eliminarPedido'},
					url:   '../../ajax/ajax.php',
					type:  'post',
					beforeSend: function () {
							$("#load").html('<img src="../../imagenes/load13.gif" width="50" height="50" />');
					},
					success:  function (response) {
							
							$(".alert").removeClass("alert-danger");
							$(".alert").removeClass("alert-info");
							$(".alert").addClass("alert-success");
							$(".alert").html('<strong>Ok!</strong> Se modifico exitosamente el <strong>Producto</strong>. ');
							$(".alert").delay(3000).queue(function(){
								/*aca lo que quiero hacer 
								  después de los 2 segundos de retraso*/
								$(this).dequeue(); //continúo con el siguiente ítem en la cola
								
							});
							$("#load").html('');
							url = "modificar.php?id="+usersid;
							$(location).attr('href',url);
					}
				});//fin del ajax
				$( this ).dialog( "close" );
			},
			"Cancelar": function() {
				$( this ).dialog( "close" );
			}
		}
	});

	 $( '#dialogDetalle' ).dialog({
		autoOpen: false,
		resizable: false,
		width:800,
		height:740,
		modal: true,
		buttons: {
			"Ok": function() {
				$( this ).dialog( "close" );
			}
		}
	});
	


$('.vareliminar').click(function(event){
		usersid =  $(this).attr("id");
		if (!isNaN(usersid)) {
			
			$( '#dialog2' ).dialog("open");
		} else {
			alert("Error, vuelva a realizar la acción.");	
		}  
	});//fin del boton nuevo


$('.btnDetalle').click(function(event){
		usersid =  $(this).attr("id");
		if (!isNaN(usersid)) {
			$.ajax({
				data:  {idfactura:	usersid,
						donde: '../../',
						accion:		'traerPedidosDetalleId'},
				url:   '../../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						$("#load").html('<img src="../../imagenes/load13.gif" width="50" height="50" />');
				},
				success:  function (response) {
						
						$('#pedidoDetalle').html(response);
						$("#load").html('');
				}
			});//fin del ajax
			$( '#dialogDetalle' ).dialog("open");
		} else {
			alert("Error, vuelva a realizar la acción.");	
		}  
	});//fin del boton nuevo
	
	
	$("#domicilio").click(function(event) {
		if ($("#domicilio").val() == "") {
			$("#domicilio").removeClass("alert-danger");
			$("#domicilio").attr('value','');
			$("#domicilio").attr('placeholder','Ingrese el Domicilio...');
		}
    });

	$("#domicilio").change(function(event) {
		if ($("#domicilio").val() == "") {
			$("#domicilio").removeClass("alert-danger");
			$("#domicilio").attr('placeholder','Ingrese el Domicilio');
		}
	});
	
	function validador(){

			$error = "";
//idproducto,nombre,precio_unit,precio_venta,stock,stock_min,reftipoproducto,refproveedor,codigo,codigobarra,caracteristicas
			
			if ($("#domicilio").val() == "") {
				$error = "Es obligatorio el campo Domicilio.";
				$("#domicilio").addClass("alert-danger");
				$("#domicilio").attr('placeholder',$error);
			}

			return $error;
    }

	//al enviar el formulario
    $('.modificar').click(function(){
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


						$(".alert").removeClass("alert-danger");
						$(".alert").removeClass("alert-info");
						$(".alert").addClass("alert-success");
						$(".alert").html('<strong>Ok!</strong> Se modifico exitosamente el <strong>Producto</strong>. ');
						$(".alert").delay(3000).queue(function(){
							/*aca lo que quiero hacer 
							  después de los 2 segundos de retraso*/
							$(this).dequeue(); //continúo con el siguiente ítem en la cola
							
						});
						$("#load").html('');
						//url = "modificar.php?id="+$('#id').val();
						//$(location).attr('href',url);

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

<script type="text/javascript">
$('.form_date').datetimepicker({
	language:  'es',
	weekStart: 1,
	todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	startView: 2,
	minView: 2,
	forceParse: 0,
	format: 'dd/mm/yyyy',
	startDate: '<?php echo date('d/m/Y'); ?>'
});
</script>

<?php } ?>
</body>
</html>
