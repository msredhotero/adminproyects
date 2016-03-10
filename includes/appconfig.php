<?php

date_default_timezone_set('America/Buenos_Aires');

class appconfig {

function conexion() {
		
		$hostname = "localhost";
		$database = "proyects";
		$username = "root";
		$password = "";
		
		/*
		$hostname = "mysql.hostinger.es";
		$database = "u235498999_proye";
		$username = "u235498999_proye";
		$password = "rhcp7575";
		*/
		//u235498999_kike usuario
		
		
		$conexion = array("hostname" => $hostname,
						  "database" => $database,
						  "username" => $username,
						  "password" => $password);
						  
		return $conexion;
}

}




?>