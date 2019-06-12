<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	
	<?php
		session_start();
		if(!isset($_SESSION["cedula"])){
			header("Location: yanapanaku.php");
		}
	
		require("DDBB.php");
	
		$fechacreacion = date("Y-m-d");
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		$cedula = $_POST['cedula'];
		$nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		$email = $_POST['email'];
		$perfil = $_POST['perfil'];
		$estado = $_POST['estado'];
		
		
		echo $fechacreacion."  ";
		echo $usuario."  ";
		echo $password."  ";
		echo $cedula."  ";
		echo $nombres."  ";
		echo $apellidos."  ";
		echo $email."  ";
		echo $perfil."  ";
		echo $estado."  ";

		$exis = mysqli_query($conexion, "SELECT * FROM `usuarios` WHERE `cedula` = $cedula");
		$row = mysqli_num_rows($exis);
	
		if($row == 0){
	
		$ingreso="INSERT INTO `usuarios`(`fechacreacion`, `usuario`, `password`, `cedula`, `nombres`, `apellidos`,`email`, `perfil`, `estado`) VALUES ('$fechacreacion', '$usuario', '$password', '$cedula', '$nombres', '$apellidos', '$email', '$perfil', '$estado')";

		$resultados=mysqli_query($conexion, $ingreso);
	
		if($resultados !== false){
			echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Usuario agregado');
						window.self.close();
					</script>");
			//echo '>usuario ok';
			
			}else{
			echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Usuario no agregado');
						window.self.close();
					</script>");
			//echo '>usuario no';
		}

		mysqli_close($conexion);
		
		} else {
			
			echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Numero de cedula ya existe!');
						window.self.close();
					</script>");
			//echo 'cedula existente';
			
		}
		
	?>
	
</body>
</html>