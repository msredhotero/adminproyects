<?php

session_start();

if (!isset($_SESSION['usua_p']))
{
	header('Location: ../error.php');
} else {


include ('../includes/funciones.php');
include ('../includes/funcionesUsuarios.php');
include ('../includes/funcionesHTML.php');
include ('../includes/funcionesProyects.php');

$serviciosFunciones 	= new Servicios();
$serviciosUsuario 		= new ServiciosUsuarios();
$serviciosHTML 			= new ServiciosHTML();
$serviciosProyect 		= new ServiciosProyects();


$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_p']),"Dashboard",$_SESSION['refroll_p'],'');


/////////////////////// Opciones pagina ///////////////////////////////////////////////

$tituloWeb = "Restricted access: B-Projects";
//////////////////////// Fin opciones ////////////////////////////////////////////////

/////////////////////// Opciones para la creacion del view  /////////////////////
$cabeceras 		= "	<th>Order</th>
					<th>Title</th>
					<th>Price</th>
					<th>Responsible</th>
					<th>State</th>
					<th>Commission</th>
					<th>Observation</th>
					<th>Send Email</th>";

//////////////////////////////////////////////  FIN de los opciones //////////////////////////

if ($_SESSION['idroll_p'] != 1) {
	$lstCargados 	= $serviciosFunciones->camposTablaViewNoAction($cabeceras,$serviciosProyect->traerProyectsPorUsuario($_SESSION['idusuario']),98);
} else {
	$lstCargados 	= $serviciosFunciones->camposTablaView($cabeceras,$serviciosProyect->traerProyects(),98);
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
        	<p style="color: #fff; font-size:18px; height:16px;">Proyects Charged</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<?php echo $lstCargados; ?>
    	</div>
    </div>
    



</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Users assigned to the project</h4>
      </div>
      <div class="modal-body userasignates">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
	
if ($_SESSION['idroll_p'] == 1) {
	
?>
<div id="dialog2" title="Delete Project">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Are you sure you want to delete the Project?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Important: </strong>If you delete the Project will lose all data in this</p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>
<?php
}
?>

<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
<script src="../bootstrap/js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$('#example').dataTable();
<?php
	
if ($_SESSION['idroll_p'] == 1) {
	
?>
	$("#example").on("click",'.varborrar', function(){
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
	
	$("#example").on("click",'.varmodificar', function(){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			
			url = "proyects/update.php?id=" + usersid;
			$(location).attr('href',url);
		  } else {
			alert("Error redo action.");	
		  }
	});//fin del boton modificar

	 $( "#dialog2" ).dialog({
		 	
			    autoOpen: false,
			 	resizable: false,
				width:600,
				height:240,
				modal: true,
				buttons: {
				    "Delete": function() {
	
						$.ajax({
									data:  {id: $('#idEliminar').val(), accion: 'eliminarProyects'},
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
				    Cancel: function() {
						$( this ).dialog( "close" );
				    }
				}
		 
		 
	 		}); //fin del dialogo para eliminar
<?php
}
?>
			
	$("#example").on("click",'.varver', function(){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {

			$.ajax({
					data:  {id: usersid, accion: 'traerUserbyProyect'},
					url:   '../ajax/ajax.php',
					type:  'post',
					beforeSend: function () {
							
					},
					success:  function (response) {
							$('.userasignates').html(response);
							
					}
			});
			
			//url = "../clienteseleccionado/index.php?idcliente=" + usersid;
			//$(location).attr('href',url);
		  } else {
			alert("Error redo action.");	
		  }
	});//fin del boton ver

});
</script>


<?php } ?>
</body>
</html>
