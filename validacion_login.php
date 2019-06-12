<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Login validation</title>
	</head>

	<body>

	<?php

		try{
			
			require("php/DDBB.php");
			
			$query = "SELECT * FROM usuarios WHERE usuario='".$_POST['usuario']."' AND password='".$_POST['password']."' AND estado='1' ";
			$resultado = mysqli_query($conexion, $query);
			$dato = mysqli_fetch_array($resultado, MYSQL_ASSOC);
			$numero_registro = mysqli_num_rows($resultado);
			
			echo $_POST['usuario'];
			echo $_POST['password'];
			echo '->'.$dato['cedula'];
			echo $numero_registro;
			
			if($numero_registro == 1){

				session_start();
				$_SESSION["cedula"]=$dato['cedula'];
				
				if($dato['perfil']=='administrador'){ 
					header("Location: admin.php"); 
				} else { 
					$querysis = "SELECT * FROM sistema ";
					$resultadosis = mysqli_query($conexion, $querysis);
					$sis = mysqli_fetch_array($resultadosis, MYSQL_ASSOC);
                  
                    $queryexis = "SELECT * FROM `abastecimiento` WHERE `fechacreacion` BETWEEN '".$sis['apertura']."' AND '".$sis['cierre']."' AND `beneficiario`='".$_SESSION['cedula']."' ";
                    $resultadoexis = mysqli_query($conexion, $queryexis);
                    $exis = mysqli_num_rows($resultadoexis);
                  
					if(date('Y-m-d')>=$sis['apertura'] && date('Y-m-d')<=$sis['cierre'] && $exis == 0){
						header("Location: abastecimento.php");
					} else {
						header("Location: yanapanaku.php");
					}
				}
			
			} else {	header('Location: yanapanaku.php');	}

		} catch(Exception $e) { 
			echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Servidor mal');
						window.location.href = 'yanapanaku.php';
					</script>"); }

	?>

	</body>
</html>