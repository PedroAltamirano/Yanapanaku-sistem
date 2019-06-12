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

	
		$ingreso="UPDATE `usuarios` SET `usuario`='".$usuario."', `password`='".$password."', `nombres`='".$nombres."', `apellidos`='".$apellidos."', `email`='".$email."', `perfil`='".$perfil."', `estado`='".$estado."' WHERE `cedula`='".$cedula."' ";

		$resultados=mysqli_query($conexion, $ingreso);
	
		if($resultados !== false){
			echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Usuario modificado');
						window.self.close();
					</script>");
			//echo '>usuario ok';
			
			}else{
			echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Usuario no modificado');
						window.self.close();
					</script>");
			//echo '>usuario no';
		}

		mysqli_close($conexion);
		
	?>
	
</body>
</html>