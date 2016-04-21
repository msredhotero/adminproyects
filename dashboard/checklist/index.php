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
include ('../../includes/funcionesTasks.php');

$serviciosFunciones 	= new Servicios();
$serviciosUsuario 		= new ServiciosUsuarios();
$serviciosHTML 			= new ServiciosHTML();
$serviciosProyects	 	= new ServiciosProyects();
$serviciosTasks		 	= new ServiciosTasks();

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_p']),"Check-List",$_SESSION['refroll_p'],'');


/////////////////////// Opciones pagina ///////////////////////////////////////////////
$singular = "CheckList";

$plural = "CheckList";

$eliminar = "eliminarCheckList";

$insertar = "insertarCheckList";

$tituloWeb = "Restricted access: B-Projects";
//////////////////////// Fin opciones ////////////////////////////////////////////////


/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "checklist";

$lblCambio	 	= array("refuser","refproject","refstatechecklist","enddate","timelimitfinished","executedincomplete","typetask");
$lblreemplazo	= array("User","Projet","Status","End Date","Time limit finished","Executed Incomplete","Type of Task");


$cadRef = '<option value="'.$_SESSION['idusuario'].'" selected>'.utf8_encode($_SESSION['nombre_p']).'</option>';


$resState 	= $serviciosTasks->traerStateCheckList();
$cadRef3 = '';
while ($rowTT3 = mysql_fetch_array($resState)) {

	$cadRef3 = $cadRef3.'<option value="'.$rowTT3[0].'">'.utf8_encode($rowTT3[1]).'</option>';

	
}

$cadRef = '<option value="'.$_SESSION['idusuario'].'" selected>'.utf8_encode($_SESSION['nombre_p']).'</option>';


$resProyect 	= $serviciosProyects->traerProyectsPorUsuario($_SESSION['idusuario']);
$cadVar2 = '';
while ($rowP = mysql_fetch_array($resProyect)) {

	$cadVar2 = $cadVar2.'<option value="'.$rowP[0].'">'.utf8_encode($rowP['title']).'</option>';

	
}

$refdescripcion = array(0 => $cadRef,1=>$cadRef3,2=>$cadVar2);
$refCampo 	=  array("refuser","refstatechecklist","refproject");
//////////////////////////////////////////////  FIN de los opciones //////////////////////////


$resList 	= $serviciosTasks->traerTasksByUser($_SESSION['idusuario']);

$cadList = '<ul class="list-inline">';
while ($rowT = mysql_fetch_array($resList)) {
	$cadList = $cadList."<li>".'<input id="user'.$rowT[0].'" class="form-control" type="checkbox" required="" style="width:50px;" name="user'.$rowT[0].'"><p>'.$rowT['task'].'</p>'."</li>";
}
$cadList = $cadList."</ul>";



/////////////////////// Opciones para la creacion del view  /////////////////////
$cabeceras 		= "	<th>Projet</th>
					<th>User</th>
					<th>End Date</th>
					<th>Alarm</th>
					<th>Type of Task</th>
					<th>Status</th>
					<th>Executed</th>
					<th>Time Limit Finished</th>
					<th>Executed Incomplete</th>";

//////////////////////////////////////////////  FIN de los opciones //////////////////////////




$formulario 	= $serviciosFunciones->camposTabla($insertar ,$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);

$lstCargados 	= $serviciosFunciones->camposTablaView($cabeceras,$serviciosTasks->traerCheckListByUser($_SESSION['idusuario']),9);



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
	<link rel="stylesheet" type="text/css" href="../../css/jquery.datetimepicker.css"/>
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
        	<p style="color: #fff; font-size:18px; height:16px;">Load <?php echo $plural; ?></p>
        	
        </div>
    	<div class="cuerpoBox">
        	<form class="form-inline formulario" role="form">
        	<div class="row">
			<?php echo $formulario; ?>
            </div>

            <div class="row">
            	<div class="form-group col-md-12">
                	<label class="control-label" style="text-align:left" for="fechas">Select Tasks</label>
                    <div class="input-group col-md-12">
                    	<?php echo $cadList; ?>
                    </div>
                </div>
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
                        <button type="button" class="btn btn-primary" id="cargar" style="margin-left:0px;">Save</button>
                    </li>
                </ul>
                </div>
            </div>
            </form>
    	</div>
    </div>
    
    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;"><?php echo $plural; ?> Charged</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<?php echo $lstCargados; ?>
    	</div>
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

<div id="dialog2" title="Delete <?php echo $singular; ?>">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Are you sure you want to delete the <?php echo $singular; ?>?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Important: </strong>If you delete the <?php echo $singular; ?> will lose all data in this</p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>
<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
<script src="../../bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../../js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#example').DataTable( {
        "order": [[ 2, "desc" ]]
    } );
	
	
	/*userasignates*/
	$("#example").on("click",'.varver', function(){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {

			$.ajax({
					data:  {id: usersid, accion: 'traerUserbyProyect'},
					url:   '../../ajax/ajax.php',
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
	});//fin del boton eliminar
	
	
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
			
			url = "update.php?id=" + usersid;
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
                                            $(".alert").html('<strong>Ok!</strong> Will successfully charge the <strong><?php echo $singular; ?></strong>. ');
											$(".alert").delay(3000).queue(function(){
												/*aca lo que quiero hacer 
												  después de los 2 segundos de retraso*/
												$(this).dequeue(); //continúo con el siguiente ítem en la cola
												
											});
											$("#load").html('');
											url = "index.php";
											$(location).attr('href',url);
                                            
											
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
	
	$('#enddate').datetimepicker({
	dayOfWeekStart : 1,
	format: 'Y-m-d H:i',
	lang:'en'
	});
	$('#enddate').datetimepicker({step:10});
	
	$('#alarm').datetimepicker({
	dayOfWeekStart : 1,
	format: 'Y-m-d H:i',
	lang:'en'
	});
	$('#alarm').datetimepicker({step:10});

});
</script>
<?php } ?>
</body>
</html>
