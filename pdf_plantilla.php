<!DOCTYPE HTML>
<html lang="es">
<head>
<title>pdf</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
	body{
		/*height: 297mm;
		width: 180mm;*/
		font-family:  Arial,Helvetica Neue,Helvetica,sans-serif;
	}
	.per10{width: 10%}	
	.per15{width: 15%}	
	.per25{width: 25%}	
	.per30{width: 30%}	
	.per40{width: 40%}	
	.per50{width: 50%}	
	.per60{width: 60%}	
	.per100{width: 100%}
	.border-bottom{border-bottom: 0.5px solid grey;}
</style>
	
</head>
	
<body id="abasto">
	

	<div style="border-radius: 5px; width: 180mm">

		<table  style="width: 100%">
			
		<tr><td rowspan="2" style="width: 72mm"><div style="padding: 1%; width: 100%;"><img src="../imagenes/CEYT.png" style="width: 100%; height: auto" alt="logo"></div></td>
			
		<td style="width: 108mm"><div style="padding: 10px; background-color: #2e7c8c; color: white; border-radius: 5px 5px 0px 0px; width: 100%;" id="titulo">PROYECTO DE AYUDA ECONÓMICA "YANAPANAKU"</div></td></tr>


			<?php require("php/DDBB.php");
			$queryabasto = "SELECT * FROM `abastecimiento` WHERE `inicio`='$idabasto' ";
			$resultadoabasto = mysqli_query($conexion, $queryabasto);
			$abasto = mysqli_fetch_array($resultadoabasto, MYSQL_ASSOC);
			
			$querynombre = "SELECT * FROM `usuarios` WHERE `cedula`='".$abasto['beneficiario']."' ";
			$resultadonombre = mysqli_query($conexion, $querynombre);
			$nombre = mysqli_fetch_array($resultadonombre, MYSQL_ASSOC); ?>
			
			<input type="hidden" value="<?php echo $nombre['email']; ?>" name="email" />
			
		<!-- datos del cliente -->
		<tr><td style="width: 108mm"><div style="width: 98%; margin: 1%; display: block;">
			<table style="width: 100%">
				<tbody>
				<tr class="per100">
					<td class="per100" colspan="3"><b>Datos del beneficiado</b></td>
				</tr>

				<tr>
					<td class="per25">Nombre:</td>
					<td class="per50"><?php echo $nombre['nombres'].' '.$nombre['apellidos']; ?></td>
					<td class="per25">Fecha:</td>
				</tr>

				<tr>
					<td class="per25">Cédula:</td>
					<td class="per50"><?php echo $nombre['cedula']; ?></td>
					<td class="per25"><?php echo $abasto['fechacreacion']; ?></td>
				</tr>
			  </tbody>
			</table><br>
		</div></td></tr></table>


		<!-- procesos -->
		<div style="width: 100%; margin-top: 1%; border-top: 1px solid black; ">
			<table style="width: 100%;" id='tableproductos'>
				<thead><tr>
					<td class="border-bottom per30"><b>Producto</b></td>
					<td class="border-bottom per10">Unidad</td>
					<td class="border-bottom per10" style="text-align: center;">Cantidad</td>
					<td class="border-bottom per10" style="text-align: center;">V/U $</td>	
					<td class="border-bottom per10" style="text-align: center;">V Total $</td>	
					<td class="border-bottom per15" style="text-align: center;">Firma estudiante</td>	
					<td class="border-bottom per15" style="text-align: center;">Firma comerciante</td>
				</tr></thead>

				<tbody>
					
					<?php	$queryprod = "SELECT * FROM `abastproductos` WHERE `inicio`='$idabasto' ";
					$resultadoprod = mysqli_query($conexion, $queryprod);
					while($prod = mysqli_fetch_array($resultadoprod, MYSQL_ASSOC)){?>
					<tr>
						
						<td class="per30"><?php $queryproducto = "SELECT * FROM `productos` WHERE `idproducto`='".$prod['producto']."' ";
								$resultadoproducto = mysqli_query($conexion, $queryproducto);
								$producto = mysqli_fetch_array($resultadoproducto, MYSQL_ASSOC);
								echo $producto['producto']; ?></td>
						<td class="per10"><?php echo $prod['unidad']; ?></td>
						<td class="per10" style="text-align: center;"><?php echo $prod['cantidad']; ?></td>
						<td class="per10" style="text-align: center;"><?php echo $prod['valor']; ?></td>
						<td class="per10" style="text-align: center;"><?php echo $prod['total']; ?></td>
						<td class="per15"></td>
						<td class="per15"></td>
					</tr>
					<?php } ?>
					
				</tbody>
				
				<tfoot>
					<tr>
						<td colspan="4" style="text-align: right"><b>TOTAL $</b></td>
						<td style="text-align: center"><?php echo $abasto['total']; ?></td>
						<td colspan="2"></td>
					</tr>
				</tfoot>

			</table>
		</div>
		
	<!-- tabla azul y gris -->	
	</div>
	
	
</body>

</html>