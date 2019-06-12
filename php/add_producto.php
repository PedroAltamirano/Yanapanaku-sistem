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
		$producto = $_POST['producto'];
		$unidad = $_POST['unidad'];
		$maxcant = $_POST['maxcant'];
		$seccion = $_POST['seccion'];
		$valor = $_POST['valor'];
		$disp = $_POST['disponibilidad'];
	
		
		echo $fechacreacion."  ";
		echo $producto."  ";
		echo $unidad."  ";
		echo $maxcant."  ";
		echo $seccion."  ";
		echo $valor."  ";
		echo $disp."  ";

	
		$ingreso="INSERT INTO `productos`(`fechacreacion`, `producto`, `unidad`, `maxcant`, `seccion`, `valor`, `disponibilidad`) VALUES ('$fechacreacion', '$producto', '$unidad', '$maxcant', '$seccion', '$valor', '$disp')";

		$resultados=mysqli_query($conexion, $ingreso);
	
		if($resultados !== false){
			echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Producto agregado');
						window.self.close();
					</script>");
			//echo '>producto ok';
			
			}else{
			echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Producto no agregado');
						window.self.close();
					</script>");
			//echo '>producto no';
		}

		mysqli_close($conexion);
		
	?>
	
</body>
</html>