<?php
set_include_path("class");

require 'includes/funcionesUsuarios.php';

$serviciosUsuarios = new ServiciosUsuarios();



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
		
			$(document).ready(function(){
				
				
					$("#email").click(function(event) {
        			$("#email").removeClass("alert alert-danger");
					$("#email").attr('placeholder','Ingrese el email');
					$("#error").removeClass("alert alert-danger");
					$("#error").text('');
        			});

        			$("#email").change(function(event) {
        			$("#email").removeClass("alert alert-danger");
        			$("#email").attr('placeholder','Ingrese el email');
        			});
					
					
					$("#pass").click(function(event) {
        			$("#pass").removeClass("alert alert-danger");
					$("#pass").attr('placeholder','Ingrese el password');
        			});

        			$("#pass").change(function(event) {
        			$("#pass").removeClass("alert alert-danger");
        			$("#pass").attr('placeholder','Ingrese el password');
        			});
					
				
				function validador(){

        				$error = "";
		
        				if ($("#email").val() == "") {
        					$error = "Es obligatorio el campo E-Mail.";

        					$("#error").addClass("alert alert-danger");
        					$("#error").attr('placeholder',$error);
        				}
						
						if ($("#pass").val() == "") {
        					$error = "Es obligatorio el campo Password.";

        					$("#pass").addClass("alert alert-danger");
        					$("#pass").attr('placeholder',$error);
        				}
						

						
						
						var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
						
						if( !emailReg.test( $("#email").val() ) ) {
							$error = "El E-Mail ingresado es inválido.";

        					$("#error").addClass("alert alert-danger");
        					$("#error").text($error);
						  }

        				return $error;
        		}
				
				
				$("#login").click(function(event) {
        			
						if (validador() == "")
        				{
        						$.ajax({
                                data:  {email:		$("#email").val(),
										pass:		$("#pass").val(),
										accion:		'login'},
                                url:   'ajax/ajax.php',
                                type:  'post',
                                beforeSend: function () {
                                        $("#load").html('<img src="imagenes/load13.gif" width="50" height="50" />');
                                },
                                success:  function (response) {
      									
                                        if (response != '') {
                                            
                                            $("#error").removeClass("alert alert-danger");

                                            $("#error").addClass("alert alert-danger");
                                            $("#error").html('<strong>Error!</strong> '+response);
                                            $("#load").html('');

                                        } else {
											url = "dashboard/";
											$(location).attr('href',url);
										}
                                        
                                }
                        });
        				}
        		});
				
			});/* fin del document ready */
		
		</script>


        
        
</head>



<body>
<div style="height:35px; background: none repeat scroll 0% 0% rgb(58, 64, 71); padding-top:6px;">
	<div class="row">
    	<div class="col-md-8">
        
        </div>
        <div class="col-md-4">
        	<p style="color:#FFF; font-family:'Courier New', Courier, monospace;">Carnes Victoria: <span style="color:#C00;">Login</span></p>
        </div>
    </div>
</div><!-- para el login -->

<div class="content">

<div class="row" style="margin-top:-20px; font-family:Verdana, Geneva, sans-serif;">
	<div class="col-md-6" align="center">
		<img src="imagenes/logo.png">
    </div>
    <div class="col-md-6" align="right" style="padding-right:100px; padding-top:50px;">
		 <div class="col-md-12" style="height:25px;text-shadow: 1px 1px #fff;">
         	<p><span style="color: #009; font-weight:bold; font-size:16px;">Contáctenos</span></p>
         </div>
         <div class="col-md-12" style="height:25px;text-shadow: 1px 1px #fff;">
         	<p><span style="color: #F00; font-weight:bold; font-size:18px;">(011) 4244 - 2092</span></p>
         </div>
         <div class="col-md-12" style="height:25px;text-shadow: 1px 1px #fff;">
         	<p>info@carnesvictoria.com.ar - dsagasti@yahoo.com.ar</p>
         </div>
         <div class="col-md-12" style="height:25px;text-shadow: 1px 1px #fff;">
         	<p><span style="color: #333; font-weight:bold; font-size:15px;">Av. 7 n° 71 1/2 Entre 33 y 34</span></p>
         </div>
         <div class="col-md-12" style="height:25px;text-shadow: 1px 1px #fff;">
         	<p>Horarios de Atención, Lun a Vie de 10:00 a 18 hs</p>
         </div>

    </div>
</div>


<div class="logueo" align="center">
<br>
<br>
<br>
	<section style="width:700px; padding-top:10px; padding-top:60px; background-color:#333; border:1px solid #101010; padding:25px;box-shadow: 4px 4px 5px #464646;-webkit-box-shadow: 4px 4px 5px #464646;
  -moz-box-shadow: 4px 4px 5px #464646;">

			<div id="error" style="text-align:left;">
            
            </div>

            <div align="center">
				<div align="center"><p style="color:#E9E9E9; font-size:28px;">Acceso al panel de control de Carnes Victoria</p></div>
                <br>
            </div>
			<form role="form" class="form-horizontal">
              
             <!--
                <label for="usuario" class="col-md-2 control-label" style="color:#FFF">Usuario</label>
                <br>
                  <input type="text" name="usuario" maxlength="50" />
                <br>
              

              
                <label for="ejemplo_password_2" class="col-md-2 control-label" style="color:#FFF">Contraseña</label>
                <br>
                  
                  <input type="password" name="password" maxlength="50" />
                <br>
              
             
              
                
                  <input type="submit" value="enviar">
                -->
              <div class="form-group">
                <label for="usuario" class="col-md-2 control-label" style="color:#FFF;text-align:left;">E-Mail</label>
                <div class="col-lg-10">
                  <input type="email" class="form-control" id="email" name="email" 
                         placeholder="E-Mail" style="width:400px;">
                </div>
              </div>

              <div class="form-group">
                <label for="ejemplo_password_2" class="col-md-2 control-label" style="color:#FFF">Contraseña</label>
                <div class="col-lg-10">
                  <input type="password" class="form-control" id="pass" name="pass" 
                         placeholder="password" style="width:400px;">
                </div>
              </div>
              
              <div class="form-group">
              	<label for="olvido" class="control-label" style="color:#FFF">¿Has olvidado tu contraseña?. <a href="recuperarpassword.php">Recuperar.</a></label>
              </div>
             
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                  <button type="button" class="btn btn-default" id="login">Login</button>
                </div>
              </div>
				
                <div id="load">
                
                </div>

            </form>

     </section>
</div><!-- fin del content -->

<footer>

<div class="row">
	<div class="col-md-12" align="center">
    	<p style="text-shadow: 1px 1px #fff;"><strong>Copyright © 2014 Carnes Victoria. Diseño Web: Saupurein Marcos.</strong></p>

    </div>
</div>

</footer>

<script type="text/javascript">
$( document ).ready(function() {
	$('#novillo').click(function(event){
			url = "novillo.php";
			$(location).attr('href',url);
	});//fin del boton novillo
	
	$('#ternera').click(function(event){
			url = "ternera.php";
			$(location).attr('href',url);
	});//fin del boton ternera
});
</script>


</body>

</html>