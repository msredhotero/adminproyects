<?php

date_default_timezone_set('America/Buenos_Aires');

class appconfig {

function conexion() {
		
		$hostname = "localhost";
		$database = "carnesvictoria";
		$username = "root";
		$password = "";
		
		/*
		$hostname = "localhost";
		$database = "carnesac_carnesvictoria";
		$username = "carnesacasacom";
		$password = "frigorifico326435";
		*/
		
		$conexion = array("hostname" => $hostname,
						  "database" => $database,
						  "username" => $username,
						  "password" => $password);
						  
		return $conexion;
}

}




?>