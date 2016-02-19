<?php

require 'includes/funcionesUsuarios.php';
require 'includes/funcionesProductos.php';
require 'includes/funcionesVentas.php';

session_start();

$serviciosProductos = new ServiciosProductos();
$serviciosVentas = new ServiciosVentas();
$serviciosUsuario = new ServiciosUsuarios();

$resProductos = $serviciosProductos->traerProductosPorCategoria(1);

$ui = $serviciosProductos->GUID();
$cantCarrito = 0;
$idcliente = '';
if (!isset($_SESSION['usua_cv'])) {
	$usuario = "";
	$nombre  = "";
	$email   = "";
	$direccion = "";
	$refroll = "";
	
	
} else {
	
	$usuario = $_SESSION['usua_cv'];
	$nombre  = $_SESSION['nombre_cv'];
	$email   = $_SESSION['email_cv'];
	//echo $email;
	$direccion = $_SESSION['direccion_cv'];
	$refroll = $_SESSION['refroll_cv'];
	$idcliente = mysql_result($serviciosUsuario->traerUsuario($email),0,0);
	$resCarrito = $serviciosVentas->traerVentasActivas($idcliente);
	//echo $resCarrito;
	$cantCarrito = mysql_num_rows($resCarrito);
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



<title>Carnes A Casa</title>



		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>

<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

         <link rel="stylesheet" href="css/jquery-ui.css">

    <script src="js/jquery-ui.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        
      <script type="text/javascript">
		$( document ).ready(function() {
			$('#icoCate').click(function() {
				$('#icoCate').hide();
				$('.todoMenu').show(100, function() {
					$('#menuCate').animate({'margin-left':'0px'}, {
													duration: 800,
													specialEasing: {
													width: "linear",
													height: "easeOutBounce"
													}});
				});
			});
			
			$('.ocultar').click(function(){
				$('#icoCate').show(100, function() {
					$('#menuCate').animate({'margin-left':'-235px'}, {
													duration: 800,
													specialEasing: {
													width: "linear",
													height: "easeOutBounce"
													}});
				});
				$('.todoMenu').hide();
			});
			
			
		

		});
	</script>


        
        
</head>



<body>


<div class="content">

<div class="row" style="margin-top:-20px; font-family:Verdana, Geneva, sans-serif;">
	<div class="col-md-6" align="center">
		<a href="index.php" title="Carnes A Casa"><img src="imagenes/logo.png"></a>
    </div>
    <div class="col-md-6" align="right" style="padding-right:100px; padding-top:50px;">
		 <div class="col-md-12" style="height:25px;text-shadow: 1px 1px #fff;">
         	<p><span style="color: #009; font-weight:bold; font-size:16px;">Contáctenos</span></p>
         </div>
         <div class="col-md-12" style="height:25px;text-shadow: 1px 1px #fff;">
         	<p><span style="color: #F00; font-weight:bold; font-size:18px;">(011) 15 3946 - 7546</span></p>
         </div>
         <div class="col-md-12" style="height:auto;text-shadow: 1px 1px #fff;">
         	<p>info@carnesacasa.com.ar - dsagasti@yahoo.com.ar</p>
         </div>
         <div class="col-md-12" style="height:25px;text-shadow: 1px 1px #fff;">
         	<p><span style="color: #333; font-weight:bold; font-size:15px;">Calle 136 n° 1408 La Plata</span></p>
         </div>
         <div class="col-md-12" style="height:25px;text-shadow: 1px 1px #fff;">
         	<p>Horarios de Atención, Lun a Vie de 09:00 a 20:00 Hs</p>
         </div>

    </div>
</div>

<div style=" background-color:#FFF; border:1px solid #F7F7F7;height: auto; position: relative;margin-bottom:35px; padding:12px;box-shadow: 2px 2px 5px #999;
				-webkit-box-shadow: 2px 2px 5px #999;
  				-moz-box-shadow: 2px 2px 5px #999;">
        
    <div class="row" style="padding-left:20px; padding-right:20px; ">
    		<!--<h4 style="color:rgb(63, 82, 95);">
            	¿Como hago el pedido?
            </h4>-->
            <div align="center">
            	<img src="imagenes/comohagomipedido2.png" width="400" height="109">
                <hr>
            </div>
            <div class="row" style="margin-bottom:15px; ">
            	<div class="col-md-2" style=" padding-top:18px;" align="center">
            		<p style="font-size:20px;"><span class="glyphicon glyphicon-user"></span> Registrese</p>
                </div>
                
                <div class="col-md-3" style="vertical-align:middle;" align="center">
            		<img src="imagenes/flechas.jpg" width="214" height="63">
                </div>
                
                <div class="col-md-2" align="center">
            		<p style="font-size:20px;"><span class="glyphicon glyphicon-hand-up"></span> Seleccione cada unidad del Producto elegido</p>
                </div>                
                
                <div class="col-md-3" style="vertical-align:middle;" align="center">
            		<img src="imagenes/flechas.jpg" width="214" height="63">
                </div>
                
                <div class="col-md-2" style="padding-top:10px;" align="center">
            		<p style="font-size:20px;"><span class="glyphicon glyphicon-check"></span> Confirme el domicilio </p>
                </div>
            </div>
        	<?php if ($usuario == '') { ?>
            <div class="alert alert-danger col-md-6">
    		Recuerde que para hacer su pedido debe registrarse. <a href="usuario.php">REGISTRESE.</a>
            </div>
            <?php } else { ?>
            <div class="col-md-6">
            	<h4>Bienvenido: <?php echo $nombre; ?></h4>
                <ul class="list-inline">
                <li>
                <button type="button" class="btn btn-info cuenta" id="1">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Mi Cuenta
                </button>
                </li>
                <li>
                <button type="button" class="btn btn-danger salir" id="1">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span> Salir
                </button>
                </li>
                <li>
                <button type="button" class="btn btn-default volver" id="1">
                  <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Volver
                </button>
                </li>
                </ul>
            </div>
            <?php } ?>
        
        <div class="col-md-6" align="right">
    		<h3><span style="font-size:18px;">Clickea para confirmar</span> <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> <a href="carrito.php" title="Confirmar Su Pedido"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a> Productos Cargados: <span id="cantidadTotal"><?php echo $cantCarrito; ?></span></h3>
        </div>
    </div>
    
    <div class="row" style="padding-left:30px; padding-right:30px; ">
        <div class="col-md-12" style="padding:8px; background-color:#333;margin-top:10px;-moz-border-radius: 6px 6px 6px 6px;-webkit-border-radius: 6px 6px 6px 6px;
border-radius: 6px 6px 6px 6px;">
                <div class="col-md-6" style="color:#FFF; font-size:18px;" align="left">
                	Novillo
                </div>
                <div class="col-md-6" style="color:#FFF; font-size:18px;" align="right">
                	Hay <?php echo mysql_num_rows($resProductos); ?> productos.
                </div>
                	
        </div>            
    </div>
    
    <div class="row" style="padding-left:30px; padding-right:30px;">
    	<form class="form-inline formulario" role="form">
        <table class="table table-striped table-responsive">
            	<thead>
                	<tr>
                    	<th>Imagen</th>
                    	<th>Nombre</th>
                        <th>Precio x Kg.</th>
                        <th>Peso Aprox.</th>
                        <th style="width:62px;">Piezas</th>
                        <th>Carrito</th>
                    </tr>
                </thead>
                <tbody>
<!--idproducto,nombre,precio_unit,precio_venta,stock,stock_min,reftipoproducto,refproveedor,codigo,codigobarra,caracteristicas -->
                	<?php
						if (mysql_num_rows($resProductos)>0) {
							
							
							while ($row = mysql_fetch_array($resProductos)) {
							
					?>
                    	<tr>
                        	<td><?php echo '<img src="'.utf8_encode($row[5]).'"  width="72"/>'; ?></td>
                            <td><strong><?php echo utf8_encode($row['producto']); ?></strong></td>
							<td><strong><?php echo '$ '.$row['precioventa']; ?></strong></td>
                            <td><strong><?php echo $row['peso'].' Kg.'; ?></strong></td>
                            
                            <td>
								<input type="number" class="form-control" style="width:62px;" id="cant<?php echo $row['idproducto']; ?>" name="cant<?php echo $row['idproducto']; ?>" value="0" min="0" max="50" maxlength="2"/>
                            </td>
                            <td>
                            	
                                <button type="button" class="btn btn-success agregarCarrito" id="<?php echo $row['idproducto']; ?>">
                                  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Agregar
                                </button>
                                <div id="comprado<?php echo $row['idproducto']; ?>" style="font-family:Verdana, Geneva, sans-serif; color:#C30;"></div>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php } else { ?>
                    	<h3>No hay productos cargados.</h3>
                    <?php } ?>
                </tbody>
            </table>
            </form>
    </div>
    
   

</div>


</div><!-- fin del content -->



<script type="text/javascript">
$( document ).ready(function() {
	
	$('.salir').click(function(event){
			url = "logout.php";
			$(location).attr('href',url);
	});//fin del boton salir
	
	$('.volver').click(function(event){
			url = "index.php";
			$(location).attr('href',url);
	});//fin del boton volver
	
	$('.agregarCarrito').click(function(event){
		<?php if ($usuario == '') { ?>
			alert('Debe loguearse para agregar productos!!');
		<?php } else { ?>
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			if ($('#cant'+usersid).val() != 0) {
			$.ajax({
				data:  {refcliente:		<?php echo $idcliente; ?>,
						refproducto:	usersid,
						cantidad:		$('#cant'+usersid).val(),
						accion:		'insertarCarrito'},
				url:   'ajax/ajax.php',
				type:  'post',
				beforeSend: function () {
						$("#load").html('<img src="imagenes/load13.gif" width="50" height="50" />');
				},
				success:  function (response) {
						
						if (response.indexOf('Error') >0) {
							
							$("#errorI").removeClass("alert alert-danger");

							$("#errorI").addClass("alert alert-danger");
							$("#errorI").html('<strong>Error!</strong> '+response);
							$("#load").html('');

						} else {
							//url = "index.php";
							//$(location).attr('href',url);
							cantidadTotal = parseInt($('#cantidadTotal').html()) + 1;
							$('#cantidadTotal').html(cantidadTotal).fadeOut("slow");
							$('#cantidadTotal').fadeIn(500);
							$('html, body').animate({
								scrollTop: '10'
							},
							300);
							$('#comprado'+usersid).html('Ya compró '+$('#cant'+usersid).val()+'Kg.');
						}
						
				}
			});//fin del ajax
			} else {
				alert('La cantidad debe ser mayor a 0');	
			}
			//url = "../clienteseleccionado/index.php?idcliente=" + usersid;
			//$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
		<?php } ?>
	});//fin del boton eliminar
	
	$('#novillo').click(function(event){
			url = "novillo.php";
			$(location).attr('href',url);
	});//fin del boton novillo
	
	$('#ternera').click(function(event){
			url = "ternera.php";
			$(location).attr('href',url);
	});//fin del boton ternera
	
	$('.cuenta').click(function(event){
			url = "dashboard/";
			$(location).attr('href',url);
	});//fin del boton dashboard
	
});
</script>

<footer>

<div class="row">
	<div class="col-md-12" align="center">
    	<p style="text-shadow: 1px 1px #fff;"><strong>Copyright © 2014 Carnes A Casa. Diseño Web: Saupurein Marcos.</strong></p>

    </div>
</div>

</footer>

</body>

</html>