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
		$idseccion = $_POST['idseccion'];
		$seccion = $_POST['seccion'];
		
		
		echo $fechacreacion."  ";
		echo $idseccion."  ";
		echo $seccion."  ";

	
		$ingreso="UPDATE `seccion` SET `seccion`='".$seccion."' WHERE `idseccion`='".$_POST['idseccion']."' ";
		$resultados=mysqli_query($conexion, $ingreso);
		if($resultados !== false){
			echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Seccion modificada');
						window.self.close();
					</script>");
			//echo '>seccion ok';
			
			}else{
			echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Seccion no modificada');
						window.self.close();
					</script>");
			//echo '>seccion no';
		}

		mysqli_close($conexion);
		
	?>
	
</body>
</html>