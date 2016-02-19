<?php

session_start();

if (!isset($_SESSION['usua_cv']))
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

if (!isset($_GET['id'])) {
	$refCliente = $serviciosUsuario->traerUsuario($_SESSION['email_cv']);
} else {
	$id = $_GET['id'];
	$refCliente = $serviciosUsuario->traerUsuarioId($id);
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


<title>Gestión de Carnes A Casa</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<link href="../../css/estiloDash.css" rel="stylesheet" type="text/css">
    

    
    <script type="text/javascript" src="../../js/jquery-1.8.3.min.js"></script>
    
    <script src="../../js/jquery-ui.js"></script>
    <link rel="stylesheet" href="../../css/jquery-ui.css">
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"/>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>

	<style type="text/css">
		label {
			padding:4px;
		}
		
		
		
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
                
                <?php if ($_SESSION['refroll_cv'] == 1) { ?>
                <li><div class="icoventas"></div><a href="../pedidos/">Pedidos</a></li>
                <li><div class="icousuarios"></div><a href="../clientes/">Clientes</a></li>
                <li><div class="icoproductos"></div><a href="../productos/">Productos</a></li>
                <li><div class="icocontratos"></div><a href="../movimientos/">Movimientos</a></li>
                <?php } else { ?>
                <li><div class="icoventas"></div><a href="..../ventas/">Mis Compras</a></li>
                <li><div class="icousuarios"></div><a href="..../clientes/">Mis Datos</a></li>
                <?php } ?>
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
                <li>
                	<div class="icocontratos2" id="tooltip6"></div>
                    <div class="tooltip-con">Movimientos</div>
                </li>
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



    <div class="boxInfoForm">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Modificar Datos</p>
        </div>
    	<div class="cuerpoBox">
        <form class="form-inline formulario" role="form">
                	
			<div class="row">
            	<div class="form-group col-md-6 col-sm-6 col-xs-6">
                    <label for="email" class="control-label" style="text-align:left">Usuario (email)</label>
                    <div class="input-group col-md-12 col-sm-12">
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo utf8_encode(mysql_result($refCliente,0,'email')); ?>" placeholder="Ingrese el Email..." required>
                    </div>
                </div>

            	<div class="form-group col-md-6 col-sm-6 col-xs-6">
                    <label for="password" class="control-label" style="text-align:left">Password</label>
                    <div class="input-group col-md-12 col-sm-12">
                        <input type="text" class="form-control" id="password" name="password" value="<?php echo utf8_encode(mysql_result($refCliente,0,'password')); ?>" placeholder="Ingrese el Password..." required>
                    </div>
                </div>                
            </div>
            
            <div class="row">
            	<div class="form-group col-md-12 col-sm-6 col-xs-6">
                    <label for="direccion" class="control-label" style="text-align:left">Dirección</label>
                    <div class="input-group col-md-12 col-sm-12">
                        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo utf8_encode(mysql_result($refCliente,0,'direccion')); ?>" placeholder="Ingrese el Dirección..." required>
                    </div>
                </div>            	
            </div>
            
            <div class="row">
            	<div class="form-group col-md-6 col-sm-6 col-xs-6">
                    <label for="Nombre" class="control-label" style="text-align:left">Nombre</label>
                    <div class="input-group col-md-12 col-sm-12">
                        <input type="text" class="form-control" value="<?php echo utf8_encode(mysql_result($refCliente,0,'nombre')); ?>" id="nombre" name="nombre" placeholder="Ingrese el Nombre..." required>
                    </div>
                </div>

            	<div class="form-group col-md-6 col-sm-6 col-xs-6">
                    <label for="Apellido" class="control-label" style="text-align:left">Apellido</label>
                    <div class="input-group col-md-12 col-sm-12">
                        <input type="text" class="form-control" value="<?php echo utf8_encode(mysql_result($refCliente,0,'apellido')); ?>" id="apellido" name="apellido" placeholder="Ingrese el Apellido..." required>
                    </div>
                </div>             	
            </div>                
                    
                    
                    <ul class="list-inline" style="margin-top:15px;">
                    	<li>
                    		<button type="button" class="btn btn-warning" id="modificar" style="margin-left:0px;">Modificar</button>
                        </li>

                        <li>
 							<button type="button" class="btn btn-default volver" style="margin-left:0px;">Volver</button>                       
                        </li>
   
                    </ul>
                    <div id="load">
                    
                    </div>
                    <div class="alert">
                    
                    </div>
                    <input type="hidden" id="accion" name="accion" value="modificarCliente"/>
                    <input type="hidden" id="id" name="id" value="<?php echo mysql_result($refCliente,0,'idusuario'); ?>"/>
                </form>
                
                <br>
                <div id="error">
                
                </div>
        </div>
    </div>

    
    

</div>



<script type="text/javascript">
$(document).ready(function(){
	

	
	$('.volver').click(function(event){
				url = "../index.php";
				$(location).attr('href',url);
	});//fin del boton eliminar



	$("#email").click(function(event) {
		$("#email").removeClass("alert-danger");
		if ($("#email").val() == '') {
			$("#email").attr('value','');
			$("#email").attr('placeholder','Ingrese el Usuario...');
		}
    });

	$("#email").change(function(event) {
		$("#email").removeClass("alert-danger");
		$("#email").attr('placeholder','Ingrese el Usuario');
	});
	
	$("#password").click(function(event) {
		$("#password").removeClass("alert-danger");
		if ($("#password").val() == '') {
			$("#password").attr('value','');
			$("#password").attr('placeholder','Ingrese el password...');
		}
    });

	$("#password").change(function(event) {
		$("#password").removeClass("alert-danger");
		$("#password").attr('placeholder','Ingrese el password');
	});
	
	
	$("#direccion").click(function(event) {
		$("#direccion").removeClass("alert-danger");
		if ($("#direccion").val() == '') {
			$("#direccion").attr('value','');
			$("#direccion").attr('placeholder','Ingrese el dirección...');
		}
    });

	$("#direccion").change(function(event) {
		$("#direccion").removeClass("alert-danger");
		$("#direccion").attr('placeholder','Ingrese el dirección');
	});
	
	
	$("#nombre").click(function(event) {
		$("#nombre").removeClass("alert-danger");
		if ($("#nombre").val() == '') {
			$("#nombre").attr('value','');
			$("#nombre").attr('placeholder','Ingrese el Nombre...');
		}
    });

	$("#nombre").change(function(event) {
		$("#nombre").removeClass("alert-danger");
		$("#nombre").attr('placeholder','Ingrese el Nombre');
	});
	
	
	$("#apellido").click(function(event) {
		$("#apellido").removeClass("alert-danger");
		if ($("#apellido").val() == '') {
			$("#apellido").attr('value','');
			$("#apellido").attr('placeholder','Ingrese el Apellido...');
		}
    });

	$("#apellido").change(function(event) {
		$("#apellido").removeClass("alert-danger");
		$("#apellido").attr('placeholder','Ingrese el Apellido');
	});
	
	
	
	function validador(){

			$error = "";

			
			if ($("#email").val() == "") {
				$error = "Es obligatorio el campo Usuario.";
				$("#email").addClass("alert-danger");
				$("#email").attr('placeholder',$error);
			}
			
			if ($("#password").val() == "") {
				$error = "Es obligatorio el campo Password.";
				$("#password").addClass("alert-danger");
				$("#password").attr('placeholder',$error);
			}
			
			if ($("#direccion").val() == "") {
				$error = "Es obligatorio el campo Dirección.";
				$("#direccion").addClass("alert-danger");
				$("#direccion").attr('placeholder',$error);
			}
			
			if ($("#nombre").val() == "") {
				$error = "Es obligatorio el campo Nombre.";
				$("#nombre").addClass("alert-danger");
				$("#nombre").attr('placeholder',$error);
			}
			
			if ($("#apellido").val() == "") {
				$error = "Es obligatorio el campo Apellido.";
				$("#apellido").addClass("alert-danger");
				$("#apellido").attr('placeholder',$error);
			}


			return $error;
    }
	
	//al enviar el formulario
    $('#modificar').click(function(){
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
                                            $(".alert").html('<strong>Ok!</strong> Se modifico exitosamente sus datos. ');
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

});//fin del document ready
</script>
<?php } ?>
</body>
</html>
