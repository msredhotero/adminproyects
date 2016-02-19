<?php

session_start();

if (!isset($_SESSION['usua_cv']))
{
	header('Location: ../error.php');
} else {

include ('../includes/funcionesProductos.php');
include ('../includes/funcionesVentas.php');
include ('../includes/funcionesUsuarios.php');

$serviciosProductos = new ServiciosProductos();
$serviciosVentas = new ServiciosVentas();
$serviciosUsuario = new ServiciosUsuarios();

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);

if ($_SESSION['refroll_cv'] != 1) {
	$idcliente = mysql_result($serviciosUsuario->traerUsuario($_SESSION['email_cv']),0,'idusuario');
	$resPedidos = $serviciosVentas->traerPedidosAbiertos($idcliente);
} else {
	$resPedidos = $serviciosVentas->traerTodosPedidos();
	
	$resPedidosPendientes = $serviciosVentas->traerTodosPedidosPendientes();
	$resClientes = $serviciosUsuario->traerUsuarios();
	$cantClientes = mysql_num_rows($resClientes);
	$cantPedidos = mysql_num_rows($resPedidos);
	$cantPedidosPendientes = mysql_num_rows($resPedidosPendientes);
	
}


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
                <li class="arriba"><div class="icodashboard"></div><a href="index.php">Dashboard</a></li>
                
                <?php if ($_SESSION['refroll_cv'] == 1) { ?>
                <li><div class="icoventas"></div><a href="pedidos/">Pedidos</a></li>
                <li><div class="icousuarios"></div><a href="clientes/">Clientes</a></li>
                <li><div class="icoproductos"></div><a href="productos/">Productos</a></li>
                <!--<li><div class="icocontratos"></div><a href="movimientos/">Movimientos</a></li>-->
                <?php } else { ?>
                <li><div class="icoventas"></div><a href="compras/">Mis Compras</a></li>
                <li><div class="icousuarios"></div><a href="clientes/modificar.php">Mis Datos</a></li>
                <?php } ?>
                <li><div class="icosalir"></div><a href="../index.php">Salir</a></li>
            </ul>
        </nav>
        
      
     </div>
     <div class="menuHober">
     	<ul class="ulHober">
                <li class="arriba">
                	<div class="icodashboard2" id="tooltip2"></div>
                    <div class="tooltip-dash">Dashboard</div>
                </li>
				<?php if ($_SESSION['refroll_cv'] == 1) { ?>
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
                <!--<li>
                	<div class="icocontratos2" id="tooltip6"></div>
                    <div class="tooltip-con">Movimientos</div>
                </li>-->
                <?php } else { ?>
                <li>
                	<div class="icoventas2" id="tooltip4"></div>
                    <div class="tooltip-alqui">Mis Compras</div>
                </li>
                <li>
                	<div class="icousuarios2" id="tooltip5"></div>
                    <div class="tooltip-usua">Mis Datos</div>
                </li>
                <?php } ?>
                <li>
                	<div class="icosalir2" id="tooltip8"></div>
                    <div class="tooltip-sal">Salir</div>
                </li>
            </ul>
     </div>
</div>

<div id="ingoGral" style=" margin-left:60px; padding-top:20px;">
<?php if ($_SESSION['refroll_cv'] == 1) { ?>
<div align="center" style="margin-left:-240px;">
	<table border="0" cellpadding="0" cellspacing="0" width="600">
    	<tr>
            <td style="border:1px dashed #666; padding:10px;" width="150" align="center">
            	<img src="../imagenes/iconmenu/shopping145.png" width="50" height="50" style="float:left;">
                <p style="color:#0CF; font-size:18px; height:16px;"><?php echo $cantPedidos; ?></p>
                <p style="height:16px;">Pedidos</p>
            </td>
            <td style="border:1px dashed #666; padding:10px;" width="150" align="center">
            	<img src="../imagenes/iconmenu/icon_19476.png" width="50" height="50" style="float:left;">
                <p style="color: #30F; font-size:18px; height:16px;"><?php echo $cantClientes; ?></p>
                <p style="height:16px;"><a href="clientes/">Clientes</a></p>
            </td>
        	<td style="border:1px dashed #666; padding:10px;" width="150" align="center">
            	<img src="../imagenes/iconmenu/1409708811_edit_property.png" width="50" height="50" style="float:left;">
                <p style="color: #090; font-size:18px; height:16px;"><?php echo $cantPedidosPendientes; ?></p>
                <p style="height:16px;"><a href="">Envios Pendientes</a></p>
            </td>
        </tr>
    
    </table>
</div>
<?php } ?>
    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Ultimas Compras Realizadas</p>
        	
        </div>
    	<div class="cuerpoBox">
    		<table class="table table-striped table-responsive">
            	<thead>
                	<tr>
                    	<th>Nro Pedido</th>
                    	<th>Domicilio</th>
                        <th>Estado</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Fecha Entrega</th>
                        <th>Ver Detalle</th>
                    </tr>
                </thead>
                <tbody>
<!--idproducto,nombre,precio_unit,precio_venta,stock,stock_min,reftipoproducto,refproveedor,codigo,codigobarra,caracteristicas -->
                	<?php
						if (mysql_num_rows($resPedidos)>0) {
							
							while ($row = mysql_fetch_array($resPedidos)) {
								
					?>
                    	<tr>
                        	<td><?php echo $row['nrofactura']; ?></td>
                        	<td><?php echo utf8_encode($row['domicilio']); ?></td>
                            <td style="vertical-align:bottom;"><img src="../<?php echo $row['icono']; ?>" width="32" height="30" style="float:left; padding-right:8px; margin-top:-6px;"><?php echo $row['estado']; ?></td>
                            <td><?php echo $row['nombrecompleto']; ?></td>
							<td><?php echo $row['fechacreacion']; ?></td>
                            <td><?php echo $row['fechaentrega']; ?></td>
                            <td>
                            	<?php if ($_SESSION['refroll_cv'] != 1) { ?>
                                <button type="button" class="btn btn-success btnDetalle" id="<?php echo $row['idfactura']; ?>">
                                  <span class=" glyphicon glyphicon-zoom-in" aria-hidden="true"></span> Ver
                                </button>
                                <?php } else { ?>
                                <div class="btn-group">
                                    <button class="btn btn-success" type="button">Acciones</button>
                                    
                                    <button class="btn btn-success dropdown-toggle" data-toggle="dropdown" type="button">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                        <a href="javascript:void(0)" class="varmodificar" id="<?php echo $row['idfactura']; ?>">Modificar</a>
                                        </li>

                                        <li>
                                        <a href="javascript:void(0)" class="varborrar" id="<?php echo $row['idfactura']; ?>">Borrar</a>
                                        </li>
										
                                        <li>
                                        <a href="javascript:void(0)" class="btnDetalle" id="<?php echo $row['idfactura']; ?>">Ver</a>
                                        </li>
                                    </ul>
                                </div>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php } else { ?>
                    	<h3>No hay pedidos cargados.</h3>
                    <?php } ?>
                </tbody>
            </table>
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
                        <th>Piezas</th>
                        <th>Importe</th>
                    </tr>
                </thead>
                <tbody id="pedidoDetalle">

                </tbody>
            </table>
</div>

<div id="dialog2" title="Eliminar Producto">
    	<p class="alert alert-danger">
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar el pedido?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Importante: </strong>El pedido no se borrara, se dara de baja y se le enviara un email al cliente avisandole!.</p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>


<script type="text/javascript">
$(document).ready(function(){
	
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

	 $( '#dialog2' ).dialog({
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
	
  <?php if ($_SESSION['refroll_cv'] != 1) { ?>
  $('.btnDetalle').click(function(event){
		usersid =  $(this).attr("id");
		if (!isNaN(usersid)) {
			$.ajax({
				data:  {idcliente:		<?php echo $idcliente; ?>,
						idfactura:	usersid,
						donde: '../',
						accion:		'traerPedidosDetalle'},
				url:   '../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						$("#load").html('<img src="../imagenes/load13.gif" width="50" height="50" />');
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
	<?php } else { ?>
		$('.varmodificar').click(function(event){
			  usersid =  $(this).attr("id");
			  if (!isNaN(usersid)) {
				url = "pedidos/modificar.php?id=" + usersid;
				$(location).attr('href',url);
			  } else {
				alert("Error, vuelva a realizar la acción.");	
			  }
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
	
	$( "#dialog2" ).dialog({
		 	
			autoOpen: false,
			resizable: false,
			width:600,
			height:260,
			modal: true,
			buttons: {
				"Eliminar": function() {

					$.ajax({
								data:  {idfactura: $('#idEliminar').val(), accion: 'eliminarPedido'},
								url:   '../ajax/ajax.php',
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
	
$('.btnDetalle').click(function(event){
		usersid =  $(this).attr("id");
		if (!isNaN(usersid)) {
			$.ajax({
				data:  {idfactura:	usersid,
						donde: '../',
						accion:		'traerPedidosDetalleId'},
				url:   '../ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						$("#load").html('<img src="../imagenes/load13.gif" width="50" height="50" />');
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
	
	<?php } ?>

});
</script>
<?php } ?>
</body>
</html>
