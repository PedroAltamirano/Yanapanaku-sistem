<?php
  $db_host="localhost";
	$db_nombre="DBname";
	$db_usuario="user";
	$db_contra="psw";

	$conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);
		if(mysqli_connect_errno()){ 
			echo "Fallo de conexion";
			exit();
		}
	mysqli_set_charset($conexion, "utf8");
?>