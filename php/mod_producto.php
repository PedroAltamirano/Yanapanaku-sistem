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
		$idproducto = $_POST['idproducto'];
		$producto = $_POST['producto'];
		$unidad = $_POST['unidad'];
		$maxcant = $_POST['maxcant'];
		$seccion = $_POST['seccion'];
		$valor = $_POST['valor'];
		$disp = $_POST['disponibilidad'];
	
		
		echo $fechacreacion."  ";
		echo $idproducto."  ";
		echo $producto."  ";
		echo $unidad."  ";
		echo $maxcant."  ";
		echo $seccion."  ";
		echo $valor."  ";
		echo $disp."  ";

	
		$ingreso="UPDATE `productos` SET `producto`='".$producto."', `unidad`='".$unidad."', `maxcant`='".$maxcant."', `seccion`='".$seccion."', `valor`='".$valor."', `disponibilidad`='".$disp."' WHERE `idproducto`='".$_POST['idproducto']."' ";

		$resultados=mysqli_query($conexion, $ingreso);
	
		if($resultados !== false){
			echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Producto modificado');
						window.self.close();
					</script>");
			//echo '>producto ok';
			
			}else{
			echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Producto no modificado');
						window.self.close();
					</script>");
			//echo '>producto no';
		}

		mysqli_close($conexion);
		
	?>
	
</body>
</html>