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
		$seccion = $_POST['seccion'];
		
		
		echo $fechacreacion."  ";
		echo $seccion."  ";

	
		$ingreso="INSERT INTO `seccion`(`fechacreacion`, `seccion`) VALUES ('$fechacreacion', '$seccion')";
		$resultados=mysqli_query($conexion, $ingreso);
		if($resultados !== false){
			echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Seccion agregada');
						window.self.close();
					</script>");
			//echo '>seccion ok';
			
			}else{
			echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Seccion no agregada');
						window.self.close();
					</script>");
			//echo '>seccion no';
		}

		mysqli_close($conexion);
		
	?>
	
</body>
</html>