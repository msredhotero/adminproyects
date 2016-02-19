<?php

session_start();

if ((!isset($_SESSION['usua_cv'])) && ($_SESSION['refroll_cv'] != 1))
{
	header('Location: ../../error.php');
} else {

include ('../../includes/funcionesProductos.php');

$serviciosProductos = new ServiciosProductos();


$fecha = date('Y-m-d');

$id = $_GET['id'];

$resProductos = $serviciosProductos->traerProductosPorId($id);

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
    
    <script src="../../js/jquery-ui.js"></script>
    <link rel="stylesheet" href="../../css/jquery-ui.css">
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"/>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>

	<style type="text/css">
		.form-group {
			padding:10px;
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
                <li><div class="icoventas"></div><a href="../pedidos/">Pedidos</a></li>
                <li><div class="icousuarios"></div><a href="../clientes/">Clientes</a></li>
                <li><div class="icoproductos"></div><a href="../productos/">Productos</a></li>
                <!--<li><div class="icocontratos"></div><a href="../movimientos/">Movimientos</a></li>-->
                <li><div class="icosalir"></div><a href="../salir/">Salir</a></li>
            </ul>
        </nav>
        
        <div id="infoMenu">
            <p>Información del Menu</p>
        </div>
        <div id="infoDescrMenu">
            <p>La descripción breve de cada item sera detallada aqui, deslizando el mouse por encima de cada menu.</p>
        </div>
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
                <!--<li>
                	<div class="icocontratos2" id="tooltip6"></div>
                    <div class="tooltip-con">Movimientos</div>
                </li>-->
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
        	<p style="color: #fff; font-size:18px; height:16px;">Modificar Producto</p>
        </div>
    	<div class="cuerpoBox">
        
        <div class="row"> 
        <div class="col-sm-12 col-md-12">
        <form class="form-inline formulario" role="form">
                	
<!--idproducto,nombre,precio_unit,precio_venta,stock,stock_min,reftipoproducto,refproveedor,codigo,codigobarra,caracteristicas -->
                	
				              	
                    
                    <div class="form-group col-md-6">
                    	<label for="producto" class="control-label" style="text-align:left">Nombre</label>
                        <div class="input-group col-md-12">
                        	<input type="text" class="form-control" id="producto" name="producto" value="<?php echo mysql_result($resProductos,0,'producto'); ?>" placeholder="Ingrese el Nombre..." required>
                        </div>
                    </div>
					
                    <div class="form-group col-md-6">
                    	<label for="peso" class="control-label" style="text-align:left">Peso Aprox.</label>
                        <div class="input-group col-md-12">
                        	<span class="input-group-addon">Kg.</span>
                        	<input type="text" class="form-control" id="peso" value="<?php echo mysql_result($resProductos,0,'peso'); ?>" name="peso" placeholder="Ingrese el Peso..." required>
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                    	<label for="precio_unit" class="control-label" style="text-align:left">Precio Unitario</label>
                        <div class="input-group col-md-12">
                        	<span class="input-group-addon">$</span>
                        	<input type="text" class="form-control" id="precio_unit" name="precio_unit" value="<?php echo mysql_result($resProductos,0,'preciounit'); ?>" placeholder="Ingrese el Precio Unitario..." required>
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-3">
                    	<label for="precio_venta" class="control-label" style="color:#999; font-size:12px;text-align:left">Presionar para calcularlo</label>
                        
                        <div class="input-group col-md-12">
                       		<button type="button" class="btn btn-success" id="calcular" style="margin-left:0px;">Calcular</button>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                    	<label for="precio_venta" class="control-label" style="text-align:left">Precio Venta</label>
                        <div class="input-group col-md-12">
                        	<span class="input-group-addon">$</span>
                            <input type="text" class="form-control" id="precio_venta" value="<?php echo mysql_result($resProductos,0,'precioventa'); ?>" name="precio_venta" placeholder="Ingrese el Precio Venta..." required>
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>

					<div class="form-group col-md-6">
                    	<label for="reftipoproducto" class="control-label" style="text-align:left">Precio Venta</label>
                        <div class="input-group col-md-12">
                            <select class="form-control" id="reftipoproducto" name="reftipoproducto">
                            	<?php if (mysql_result($resProductos,0,'reftipoproducto') == 1) { ?>
                                <option value="1" selected>Novillo</option>
                                <option value="2">Ternera</option>
                                <?php } else { ?>
                                <option value="1">Novillo</option>
                                <option value="2" selected>Ternera</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                    	<label for="imagen" class="control-label" style="text-align:left">Imagen</label>
                        <div class="input-group col-md-12">
                        	<div class='custom-input-file'>
                                    <input type="file" name="imagen1" id="imagen1">
                                    <img src="../../imagenes/clip20.jpg">
                                    <div class="files">...</div>
                                </div>
                                <img id="vistaPrevia1" name="vistaPrevia1" src="../../<?php echo mysql_result($resProductos,0,'imagen'); ?>" width="72" height="72"/>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-12">
                    	<label for="observacion" class="control-label" style="text-align:left">Observación</label>
                        <div class="input-group col-md-12">
                        	<textarea type="text" class="form-control" id="observacion" name="observacion" placeholder="Ingrese el Observación..." required>
                            <?php echo mysql_result($resProductos,0,'observacion'); ?>
                            </textarea>
                        </div>
                    </div>
					<!--div para visualizar mensajes-->
                            <div class="messages"></div><br /><br />
                            <!--div para visualizar en el caso de imagen-->
                            <div class="showImage"></div>

                  
                
                
                    </div>
                    </div>
                    
                    <ul class="list-inline" style="padding-top:15px;">
                    	<li>
                    		<button type="button" class="btn btn-warning" id="cargar" style="margin-left:0px;">Modificar</button>
                        </li>
                        <li>
                    		<button type="button" class="btn btn-danger varborrar" id="<?php echo mysql_result($resProductos,0,'idproducto'); ?>" style="margin-left:0px;">Eliminar</button>
                        </li>
                        <li>
                    		<button type="button" class="btn btn-default volver" id="volver" style="margin-left:0px;">Volver</button>
                        </li>
   
                    </ul>
                    <div id="load">
                    
                    </div>
                    <div id="error" class="alert alert-info">
                		<p><strong>Importante!:</strong> El campo nombre, precio unitario, precio venta son obligatorios</p>
                	</div>
                    <input type="hidden" id="accion" name="accion" value="modificarProducto"/>
                    <input type="hidden" id="id" name="id" value="<?php echo mysql_result($resProductos,0,'idproducto'); ?>"/>
                </form>
                
                <br>
                
                
        </div>
    </div>

    
    

</div>

<div id="dialog2" title="Eliminar Producto">
    	<p class="alert alert-danger">
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar al Producto?.<span id="proveedorEli"></span>
        </p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>

<script type="text/javascript">
$(document).ready(function(){
	
	$('#calcular').click(function() {
		var total = 0;
		if (($("#precio_unit").val() != '') && $("#peso").val() != '') {
			total = parseFloat($("#precio_unit").val()) * parseFloat($("#peso").val());
			$('#precio_venta').val(total);
		} else {
            alert('Debe ingresar un numero en Peso y precio_unit para calcularlo');
        }
	});

	$('.volver').click(function(event){
			url = "index.php";
			$(location).attr('href',url);
	});//fin del boton eliminar
	
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
									data:  {id: $('#idEliminar').val(), accion: 'eliminarProducto'},
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

	$("#producto").click(function(event) {
		if ($("#producto").val() == "") {
			$("#producto").removeClass("alert-danger");
			$("#producto").attr('value','');
			$("#producto").attr('placeholder','Ingrese el Nombre...');
		}
    });

	$("#producto").change(function(event) {
		if ($("#producto").val() == "") {
			$("#producto").removeClass("alert-danger");
			$("#producto").attr('placeholder','Ingrese el Nombre');
		}
	});
	
	$("#codigo").click(function(event) {
		if ($("#codigo").val() == "") {
			$("#codigo").removeClass("alert-danger");
			$("#codigo").attr('value','');
			$("#codigo").attr('placeholder','Ingrese el Codigo...');
		}
    });

	$("#codigo").change(function(event) {
		if ($("#codigo").val() == "") {
			$("#codigo").removeClass("alert-danger");
			$("#codigo").attr('placeholder','Ingrese el Codigo');
		}
	});
	
	$("#precio_unit").click(function(event) {
		if ($("#precio_unit").val() == "") {
			$("#precio_unit").removeClass("alert-danger");
			$("#precio_unit").attr('value','');
			$("#precio_unit").attr('placeholder','Ingrese el Precio Unit...');
		}
    });

	$("#precio_unit").change(function(event) {
		if ($("#precio_unit").val() == "") {
			$("#precio_unit").removeClass("alert-danger");
			$("#precio_unit").attr('placeholder','Ingrese el Precio Unit');
		}
	});
	
	$("#stock").click(function(event) {
		if ($("#stock").val() == "") {
			$("#stock").removeClass("alert-danger");
			$("#stock").attr('value','');
			$("#stock").attr('placeholder','Ingrese el Stock...');
		}
    });

	$("#stock").change(function(event) {
		if ($("#stock").val() == "") {
			$("#stock").removeClass("alert-danger");
			$("#stock").attr('placeholder','Ingrese el Stock');
		}
	});
	
	$("#stock_min").click(function(event) {
		if ($("#stock_min").val() == "") {
			$("#stock_min").removeClass("alert-danger");
			$("#stock_min").attr('value','');
			$("#stock_min").attr('placeholder','Ingrese el Stock Minimo...');
		}
    });

	$("#stock_min").change(function(event) {
		if ($("#stock_min").val() == "") {
			$("#stock_min").removeClass("alert-danger");
			$("#stock_min").attr('placeholder','Ingrese el Stock Minimo');
		}
	});
	
	function validador(){

			$error = "";
//idproducto,nombre,precio_unit,precio_venta,stock,stock_min,reftipoproducto,refproveedor,codigo,codigobarra,caracteristicas
			
			if ($("#producto").val() == "") {
				$error = "Es obligatorio el campo nombre.";
				$("#producto").addClass("alert-danger");
				$("#producto").attr('placeholder',$error);
			}
			
			
			if ($("#precio_unit").val() == "") {
				$error = "Es obligatorio el campo Precio Unit.";
				$("#precio_unit").addClass("alert-danger");
				$("#precio_unit").attr('placeholder',$error);
			}
			
			if ($("#stock_min").val() == "") {
				$error = "Es obligatorio el campo stock min.";
				$("#stock_min").addClass("alert-danger");
				$("#stock_min").attr('placeholder',$error);
			}


			return $error;
    }
	
	//al enviar el formulario
    $('#cargar').click(function(){
		existeCodigo($( this ).val());
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

					if (data != '') {
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
	
	function existeCodigo(codigo) {
		$.ajax({
			data:  {codigo:	$("#codigo").val(),
					accion:	'existeCodigo'},
			url:   '../../ajax/ajax.php',
			type:  'post',
			beforeSend: function () {
					$("#load").html('<img src="../../imagenes/load13.gif" width="50" height="50" />');
			},
			success:  function (response) {
					
					if (response == '') {
						
						$("#load").html('');
						$("#codigo").val('');
						$error = "Ya existe ese codigo.";
						$("#codigo").addClass("alert-danger");
						$("#codigo").attr('placeholder',$error);
						$("#errorCodigo").html('');
						$("#errorCodigo").html('<strong>Error!</strong> El codigo ya existe');

					} else {
						$("#load").html('');
						$("#errorCodigo").html('');
						$("#errorCodigo").html('<strong>Ok!</strong> El codigo se puede utilizar');
						
					}
					
			}
		});
	}
	
	$('#codigo').focusout(function(e) {
        existeCodigo($( this ).val());
    });
	
	$(".messages").hide();
    //queremos que esta variable sea global
    var fileExtension = "";
	
	
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


		jQuery('#imagen').on('change', function(e) {
		  var Lector,
			  oFileInput = this;
		 
		  if (oFileInput.files.length === 0) {
			return;
		  };
		 
		  Lector = new FileReader();
		  Lector.onloadend = function(e) {
			jQuery('#vistaPrevia').attr('src', e.target.result);         
		  };
		  Lector.readAsDataURL(oFileInput.files[0]);
		 
		});
	
	jQuery('#actualizarUsuario').on('click', function(e) {
	  e.preventDefault();
	  var parametros = {
		id : jQuery('#idUsuario').val(),
		nombre : jQuery('#nombreUsuario').val(),
		imagen : jQuery('#temporal').val()
	  };
	  $.ajax('guardar_imagen.php', {
		type : 'post',
		data : parametros,
		success : function(data) {
		  if(data.error){
			console.log('Error controlado.', data.mensaje);
			return;
		  };
		  console.log('Los datos del usuario ' + parametros.id + ' fueron guardados.');
		},
		error : function(data) {
		  console.log('Error no controlado.', data);
		}
	  });
	  return false;
	});
	
	function showMessage(message){
    $(".messages").html("").show();
    $(".messages").html(message);
}
 
//comprobamos si el archivo a subir es una imagen
//para visualizarla una vez haya subido
function isImage(extension)
{
    switch(extension.toLowerCase())
    {
        case 'jpg': case 'gif': case 'png': case 'jpeg':
            return true;
        break;
        default:
            return false;
        break;
    }
}

});//fin del document ready
</script>

<?php } ?>

</body>
</html>