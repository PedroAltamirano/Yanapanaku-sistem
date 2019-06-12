<!doctype html>
<html lang="es">
<head>
<title>Hoja de abastecimiento</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<script src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style type = "text/css">
	@media print{
		body{
			font-size: 12px;
		}
		.medium{
			font-size: 18px;
		}
		.little{
			font-size: 10px;
		}	
	}
</style>
	
<body onLoad="openmodal1()" id="abasto">
	
	<?php
		session_start();
		if(!isset($_SESSION["cedula"])){
			header("Location: yanapanaku.php");
		}
	
		require("php/DDBB.php");
	?>
	
	<script>var counter = 1;</script>
	
	<!-- modal inicial -->
	<div id="modalproceso" class="w3-modal w3-display-middle">
		<div class="w3-modal-content w3-display-middle w3-justify" id='modalcontent' style="padding: 1%; display: block; width: 50%; text-align: center; border-radius: 5px; box-shadow: 0px 0px 10px 1px #e0e0e0; color: darkgreen;">
			
		<div class="w3-margin"><button class="w3-right" id="closebtnproceso" onClick="closemodal1()" style="border-radius: 50%; background-color: red; border: none;"><em class="fa fa-close"></em></button><br>
		
		PROCEDIMIENTO PARA LLENAR EL DOCUMENTO

		<ul><li>De la <spam style="color: red;">lista de productos</spam> a su derecha seleccione <b>un producto</b> y de click en <em class="fa fa-check"></em>.</li>

		<li>Una vez agregado, en 
		  <spam style="color: red;">cantidad</spam> determine cuantos productos desea <b>1, 2, 3...</b> haciendo click en las <b>flechas a la derecha del casillero</b>.</li>

		<li>Revise que el monto total sea el correcto, recuerde que ne debe ser <spam style="color: red;">mayor a 30$</spam>. Se recomienda distribuir el monto entre los productos de mayor necesidad y seleccionar el número de estos con moderación.</li>

		<li>Final mente de click en <em class="fa fa-floppy-o"></em> e imprima la hoja con ctrl+p. <spam style="color: red;">Recuerde</spam> que debe tener <b>2 copias</b> de esta para presentar en el mercado.</li>
			
		<li><spam style="color: red; font-size: 20px;">Recuerda que solo se puede realizar el guardado una vez, si necesitas hacer un cambio comunícate con un Administrador.</spam></li></ul></div>
			
	</div></div>
	
	
	
	<div class="w3-row" style="margin: 2%;">
	<!-- hoja de abastecimento -->
	<div class="w3-border w3-col l9 s9" style="border-radius: 5px;" id="HTMLtoPDF">

		<form method="post" id="formdatos" action="php/add_abast.php" target="_self">

		<table width="100%" cellpadding="0" cellspacing="0">
			
		<tr><td rowspan="2" width="40%"><div style="padding: 10px; width: 100%;"><img src="imagenes/CEYT.png" width="100%"></div></td>
			
		<td width="60%"><div style="padding: 10px; background-color: #2e7c8c; color: white; border-radius: 5px 5px 0px 0px; width: 100%;" id="titulo">PROYECTO DE AYUDA ECONÓMICA "YANAPANAKU"</div></td></tr>


			<?php $querynombre = "SELECT * FROM `usuarios` WHERE `cedula`='".$_SESSION['cedula']."' ";
			$resultadonombre = mysqli_query($conexion, $querynombre);
			$nombre = mysqli_fetch_array($resultadonombre, MYSQL_ASSOC); ?>
			
			<input type="hidden" value="<?php echo $nombre['email']; ?>" name="email">
			
		<!-- datos del cliente -->
		<tr><td width="60%"><div style="width: 98%; margin: 1%; display: block;">
			<table style="width: 100%;">
				<tbody>

				<tr style="width: 100%">
					<td width="100%" colspan="3"><b>Datos del beneficiado</b></td>
				</tr>

				<tr>
					<td width="25%">Nombre:</td>
					<td width="50%"><input type="text" value="<?php echo $nombre['nombres'].' '.$nombre['apellidos']; ?>" style="width: 90%; border-width: 0 1px 1px 0; border-color: lightgray; border-style: solid;" readonly required ></td>
					<td width="25%">Fecha:</td>
				</tr>

				<tr>
					<td width="25%">Cédula:</td>
					<td width="50%"><input type="text" value="<?php echo $nombre['cedula']; ?>" style="width: 90%; border-width: 0 1px 1px 0; border-color: lightgray; border-style: solid;" readonly required ></td>
					<td width="25%"><input type='date' name="fecha" value="<?php echo date('Y-m-d'); ?>" style="width: 90%; border-width: 0 1px 1px 0; border-color: lightgray; border-style: solid;" required readonly></td>
				</tr>
			  </tbody>
			</table><br>
		</div></td></tr></table>


		<!-- procesos -->
		<div style="width: 98%; margin: 1%; border-top: 1px solid black; ">
			<table style="width: 100%;" id='tableproductos'>
				<thead><tr>
					<td width="2%" class="w3-border-bottom"></td>
					<td width="28%" class="w3-border-bottom"><b>Producto</b></td>
					<td width="10%" class="w3-border-bottom little">Unidad</td>
					<td width="10%" class="w3-border-bottom little" style="text-align: center;">Cantidad</td>
					<td width="10%" class="w3-border-bottom little" style="text-align: center;">V/U $</td>	
					<td width="10%" class="w3-border-bottom little" style="text-align: center;">V Total $</td>	
					<td width="15%" class="w3-border-bottom little" style="text-align: center;">Firma estudiante</td>	
					<td width="15%" class="w3-border-bottom little" style="text-align: center;">Firma comerciante</td>
				</tr></thead>

				<tbody id='tableproductos' class="tableitems">

				</tbody>

			</table>
		</div>

		<div style="padding: 10px; border-radius: 0px 0px 5px 5px; background-color: #2e7c8c; width: 100%; height: 100%;" id="titulopie">
			<a style="text-decoration: none; padding: 0px 15px" type="button" onClick="save()"><em class="fa fa-floppy-o"></em></a>
		</div>
		
	<!-- tabla azul y gris -->	
	</div>
	
	
	<!-- total -->
	<div class="w3-col l3 s3" style="padding: 0 0 20px 20px;">
	<div class="w3-border" style="border-radius: 5px;">
		
		<div style="padding: 10px; background-color: #2e7c8c; color: white; border-radius: 5px 5px 0px 0px; width: 100%;">Total</div>
		
		<input class="medium" id="totalproductos" type="number" name="total" value="0.00" style="padding: 10px; text-align: center; font-size: 48px; font-weight: bold; width: 100%; border: none;" readonly>
		</form>
	</div></div>
	
		
		
		
	<!-- anadir producto -->
		<div class="w3-col l3" style="padding: 0 0 20px 20px;" id="cuadroproducto">
		<div class="w3-border" style="border-radius: 5px;">
			
			<div style="padding: 10px; background-color: #2e7c8c; color: white; border-radius: 5px 5px 0px 0px; width: 100%;">Elija un producto:</div>
			
			<div style="padding: 10px; text-align: center;">
			<select id="selectproducto" style="padding: 2px; width: 80%;" size="10">
			<?php mysqli_set_charset($conexion, "utf8");
			
			$queryseccion = "SELECT * FROM `seccion`";
			$resultadoseccion = mysqli_query($conexion, $queryseccion);
			while($seccion = mysqli_fetch_array($resultadoseccion, MYSQL_ASSOC)){?>
			<optgroup label="<?php echo $seccion["seccion"]; ?>"></optgroup>
				
			<?php $queryproducto = "SELECT * FROM `productos` WHERE `seccion`= '".$seccion["idseccion"]."' AND `disponibilidad`='1' ORDER BY `productos`.`producto` ASC ";
			$resultadoproducto = mysqli_query($conexion, $queryproducto);
			while($producto = mysqli_fetch_array($resultadoproducto, MYSQL_ASSOC)){ ?> 
			
				<option value="<?php echo $producto['producto']."-".$producto['unidad']."-".$producto['valor']."-".$producto['maxcant']."-".$producto['idproducto']; ?>">&emsp;<?php echo $producto['producto']; ?></option>
				<?php }} ?>
			</select>
			
		<button style="text-decoration: none; padding: 0px 15px" onClick="chekprod()" type="button"><em class="fa fa-check"></em></button></div>
		
		</div></div>
		
	<!-- fin row -->
	</div>
	
	
	
	<!--ERRORES-->
	<!-- modal total mayor 30 -->
	<div id="modaltotal" class="w3-modal w3-display-middle">
		<div class="w3-modal-content w3-display-middle w3-justify" id='modalcontent' style="padding: 1%; display: block; width: 40%; text-align: center; border-radius: 5px; box-shadow: 0px 0px 10px 1px #e0e0e0; color: darkgreen;">
			
		<div class="w3-margin"><button class="w3-right" onClick="closemodal2()" style="border-radius: 50%; background-color: red; border: none;"><em class="fa fa-close"></em></button><br>
		
		<div class="w3-center" style="color: red; font-size: 48px;">El total es mayor a 30$</div>
			
	</div></div></div>
	
	<!-- modal total 0 -->
	<div id="modalcero" class="w3-modal w3-display-middle">
		<div class="w3-modal-content w3-display-middle w3-justify" id='modalcontent' style="padding: 1%; display: block; width: 40%; text-align: center; border-radius: 5px; box-shadow: 0px 0px 10px 1px #e0e0e0; color: darkgreen;">
			
		<div class="w3-margin"><button class="w3-right" onClick="closemodal3()" style="border-radius: 50%; background-color: red; border: none;"><em class="fa fa-close"></em></button><br>
		
		<div class="w3-center" style="color: red; font-size: 48px;">El total es 0$, debe tener almenos un producto</div>
			
	</div></div></div>
	
</body>
	

	
	<script>
		//funcion de ventana modal 

		// proceso
		var modalproceso = document.getElementById('modalproceso');//get modal
		function openmodal1(){
			modalproceso.style.display = 'block'; }
		function closemodal1(){
			modalproceso.style.display = 'none'; }

		
		// total > 30
		var modaltotal = document.getElementById('modaltotal');//get modal
		function openmodal2(){
			modaltotal.style.display = 'block'; }
		function closemodal2(){
			modaltotal.style.display = 'none'; }

	
		// total = 0
		var modalcero = document.getElementById('modalcero');//get modal
		function openmodal3(){
			modalcero.style.display = 'block'; }
		function closemodal3(){
			modalcero.style.display = 'none'; }

		window.addEventListener('click', outsideclick);//close on outside click
		function outsideclick(e){
			if (e.target == modaltotal){
			modaltotal.style.display = 'none'; }
			if (e.target == modalproceso){
				modalproceso.style.display = 'none'; }
			if (e.target == modalcero){
			modalcero.style.display = 'none'; }
		}
	
		
		//funcion de revision de producto
		function chekprod(){
			var exi = 0;
			var size = document.getElementById("tableproductos").rows.length;
			var str = document.getElementById('selectproducto').value;
			var res = str.split("-")
			var optselectproducto = res[0];
			for(var i=1; i<=(size-1); i++){
				var optsel = document.getElementById('producto'+String(i)).value;
				if(optsel == optselectproducto){
					exi++;
				}}
			if(exi==0){	addproducto(); }
		}
		
	
		// funcion de auto tabla proceso
		  function addproducto(){
			  
			  var tableproductos = $('table[id="tableproductos"]');

			  var button = $('<a />', {'class':'fa fa-close', 'onclick':'removeproducto(this)', 'style':'text-decoration: none; width: 100%; text-align: center; color: grey;'});
			  
			  var str = document.getElementById('selectproducto').value;
			  var res = str.split("-")
			  var optselectproducto = res[0];	
			  var optselectunidad = res[1];
			  var optselectvalor = res[2];
			  var optselectmax = res[3];
			  var optselectid = res[4];
			  
			  var tdproducto = $('<input />', {'type': 'text', 'value':optselectproducto, 'readonly':'readonly', 'style': "width: 100%;", 'name':'producto'+counter, 'id':'producto'+counter});
			  
			  var tdunidad = $('<input />', {'type' : 'text', 'name' : 'unidad', 'style': "width: 100%; text-align: center;", 'value':optselectunidad, 'id':'unidad'+counter, 'name':'unidad'+counter, 'readonly':'readonly'});
			  
			  var tdcantidad = $('<input />', {'type':"number", 'name':"cantidad", 'style':"width: 100%; text-align: center;", 'value':"0", 'id':'cantidad'+counter, 'name':'cantidad'+counter, 'min':'0', 'max':optselectmax, 'onchange':'sumar('+counter+'); sumartotal();', 'onkeydown':"return false"});
			  
			  var tdvalorunitario = $('<input />', {'type':"number", 'step':"0.01", 'name':"valor", 'style':"width: 100%; text-align: center;", 'value':optselectvalor, 'id':'valor'+counter, 'name':'valor'+counter, 'min':'0', 'readonly':'readonly'});
			  
			  var tdtotal = $('<input />', {'type':"number", 'step':'0.01', 'style':"width: 100%; text-align: center", 'value':"0.00", 'id':'total'+counter, 'readonly':'readonly', 'name':'total'+counter});
			  
			  var tdest = $('<input />', {'type':"text", 'style':"width: 100%;", 'readonly':'readonly'});
			
			  var tdcom = $('<input />', {'type':"text", 'style':"width: 100%;", 'readonly':'readonly'});
				
			  var tdcounter = $('<input />', {'type':"hidden", 'name':"counter", 'id':'counter', 'value':counter});
			  
			  var tdprodid = $('<input />', {'type' : 'hidden', 'value':optselectid, 'id':'prodid'+counter, 'name':'prodid'+counter, 'readonly':'readonly'});
			  
				counter++;

			newRow(tableproductos,[button, tdproducto, tdunidad, tdcantidad, tdvalorunitario, tdtotal, tdest, tdcom, tdcounter, tdprodid]);
		  		}

			function newRow($table,cols){
				$row = $('<tr/>', {'class':"tableitems"});
				for(i=0; i<cols.length; i++){
					$col = $('<td/>');
					$col.append(cols[i]);
					$row.append($col);
				}
				$table.append($row);
			}
			
			function removeproducto(oButton) {
				document.getElementById('tableproductos').deleteRow(oButton.parentNode.parentNode.rowIndex);
			}
		
		
		//funcion para sumar el total
			function sumar(num){
				var cantidad = document.getElementById('cantidad'+String(num)).value;
				var valor = document.getElementById('valor'+String(num)).value;
				document.getElementById('total'+String(num)).value = parseFloat(parseInt(cantidad) * parseFloat(valor)).toFixed(2);
			}
			
			// sumar totla procesos
			function sumartotal(){
				var i, valortotal = 0;
			for( i=1; i<counter; i++){
				var valor = document.getElementById('total'+String(i)).value;
				valortotal += parseFloat(valor);
			}
			if(valortotal <= 30){
				document.getElementById("totalproductos").style.color="green"
			} else {
				document.getElementById("totalproductos").style.color="red"
			}
			document.getElementById('totalproductos').value = parseFloat(valortotal).toFixed(2);
			}
		
		// submit form si total < 30
		function save(){
			var tot = document.getElementById("totalproductos").value;
			if (tot <= 30.00 && tot > 0.00){
				document.getElementById("formdatos").submit();
			} else if(tot <= 0) {
				openmodal3();
			} else {
				openmodal2();
			} 
		}

		</script>
	

</html>