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
		$fechamod = date("Y-m-d");
		$apertura = $_POST['apertura'];
		$cierre = $_POST['cierre'];
		
		
		echo $fechacreacion."  ";
		echo $fechamod."  ";
		echo $apertura."  ";
		echo $cierre."  ";

	
		$ingreso = "UPDATE `sistema` SET `fechamod`='".$fechamod."', `apertura`='".$apertura."', `cierre`='".$cierre."' WHERE `idevento`='1' ";

		$resultados=mysqli_query($conexion, $ingreso);
	
		if($resultados !== false){
			echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Fechas modificadas');
						window.self.close();
					</script>");
			//echo '>seccion ok';
			
			}else{
			echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Fechas no modificadas');
						window.self.close();
					</script>");
			//echo '>seccion no';
		}

		mysqli_close($conexion);
		
	?>
	
</body>
</html>