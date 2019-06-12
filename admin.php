<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
	<link rel="stylesheet" href="w3.css">
<script src="js/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
</head>
	
<body>
	
	<?php
		session_start();
		if(!isset($_SESSION["cedula"])){
			header("Location: yanapanaku.php");
		}
	
		require("php/DDBB.php");
	
		$querynombre = "SELECT * FROM `usuarios` WHERE `cedula`='".$_SESSION['cedula']."' ";
		$resultadonombre = mysqli_query($conexion, $querynombre);
		$nombre = mysqli_fetch_array($resultadonombre, MYSQL_ASSOC);
	
		if($nombre['perfil'] != "adminstrador"){
	?>
	
	<div class="w3-row">
	
	<div class="w3-col l4 w3-center" style="padding: 2% 2% 2% 2%;">
		<div class="w3-center" style="border-radius: 5px;"><img class="w3-centered" src="imagenes/CEYT.png" width="85%"></div>
	</div>
	
	
	<div class="w3-col l8 w3-center" style="padding: 2% 2% 2% 0%; font-size: 46px; color: white;">
		<div class="w3-border" style="border-radius: 5px; background-color: #2e7c8c;">Hola <?php echo $nombre['nombres'].' '.$nombre['apellidos']; ?>	
		<span style="font-size: 36px;">Administrador Yanapanaku</span>
		<div class="w3-right" style="padding: 0 5px;"><a href="cierre.php"><button style="font-size: 12px;">Cerrar sesión</button></a></div>
		</div>
	</div>	
	
		
	<!-- add usuario -->
	<div class="w3-col l4" style="padding: 0% 2% 2% 2%;">
		<!-- tabla azul blanco gris -->
		<div class="w3-border" style="border-radius: 5px;">

			<div style="padding: 10px; background-color: #2e7c8c; color: white; border-radius: 5px 5px 0px 0px;">Añadir usuario</div>
			
			<form method="post" target="_blank" action="php/add_usuario.php">
			<div style="padding: 10px;">
				
				<table cellpadding="2" width="100%">
				<tr><td><input type="text" name="usuario" placeholder="Nombre de usuario" maxlength="10" style="width: 100%" required></td></tr>
				<tr><td><input type="text" name="password" placeholder="Contraseña" maxlength="10" style="width: 100%" minlength=6 required id="password"></td></tr>
				<tr><td><input type="text" name="password1" placeholder="Repetir contraseña" maxlength="10" style="width: 100%" minlength=6 required oninput='check(this)'></td></tr>
				<tr><td><input type="number" name="cedula" placeholder="Numero de cedula" style="width: 100%" required min="0100000000" max="2500000000"></td></tr>
				<tr><td><input type="text" name="nombres" placeholder="Nombres" maxlength="20" style="width: 100%" required></td></tr>
				<tr><td><input type="text" name="apellidos" placeholder="Apellidos" maxlength="20" style="width: 100%" required></td></tr>
				<tr><td><input type="text" name="email" placeholder="Email" maxlength="40" style="width: 100%" required></td></tr>
				<tr><td><select name="perfil" style="width: 100%" required>
					<option value="administrador">Administrador</option>
					<option value="usuario" selected>Usuario</option>
					</select></td></tr>
				<tr><td><select name="estado" style="width: 100%" required>
					<option value="1" selected>Activo</option>
					<option value="0">Inactivo</option>
					</select></td></tr>
				</table>
			</div>

			<div class="w3-light-gray" style="padding: 10px; border-radius: 0px 0px 5px 5px;">
				<input type="submit" value="Crear usuario" />
				<button type="button" onClick="openmodal1()">Modificar usuario</button>
			</div></form>
		</div>	
	</div>
		
	
		
	<!-- add producto -->
	<div class="w3-col l4" style="padding: 0% 2% 2% 0%;">
		<!-- tabla azul blanco gris -->
		<div class="w3-border" style="border-radius: 5px;">

			<div style="padding: 10px; background-color: #2e7c8c; color: white; border-radius: 5px 5px 0px 0px;">Añadir producto</div>

			<form method="post" target="_blank" action="php/add_producto.php">
			<div style="padding: 10px;">
				
				<table cellpadding="2" width="100%">
				<tr><td colspan="3">
				<input type="text" name="producto" style="width: 100%" placeholder="producto" maxlength="40" required></td></tr>
				<tr><td><input type="text" name="unidad" style="width: 100%" placeholder="unidad"  maxlength="10" required></td>
					<td><input type="number" name="maxcant" style="width: 100%" placeholder="Cantidad maxima" min="1" max="10" required></td>
					<td><input type="number" name="valor" style="width: 100%" placeholder="Valor unitario" step="0.01" min="0.1" max="30" onChange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" required></td>
				</tr>
				<tr><td colspan="2"><select name="seccion" style="width: 100%">
					<?php $queryseccion = "SELECT * FROM `seccion`";
					$resultadoseccion = mysqli_query($conexion, $queryseccion);
					while($seccion = mysqli_fetch_array($resultadoseccion, MYSQL_ASSOC)){?>
					<option value="<?php echo $seccion["idseccion"]; ?>"><?php echo $seccion["seccion"]; ?></option><?php } ?>
				</select></td>
				<td><select name="disponibilidad" style="width: 100%">
					<option value="1">Disponible</option>
					<option value="0">No disponible</option>
				</select></td></tr>
				</table>
			
			</div>

			<div class="w3-light-gray" style="padding: 10px; border-radius: 0px 0px 5px 5px;">
				<input type="submit" value="Crear producto" />
				<button type="button" onClick="openmodal2()">Modificar producto</button>
			</div></form>
		</div>	
	</div>
		
		
	<!-- add seccion -->
	<div class="w3-col l4" style="padding: 0% 2% 2% 0%;">
		<!-- tabla azul blanco gris -->
		<div class="w3-border" style="border-radius: 5px;">

			<div style="padding: 10px; background-color: #2e7c8c; color: white; border-radius: 5px 5px 0px 0px;">Añadir sección</div>

			<form method="post" target="_blank" action="php/add_seccion.php">
			<div style="padding: 10px;">
				
				<table cellpadding="2" width="100%">
				<tr><td>
				<input type="text" name="seccion" style="width: 100%" placeholder="Seccion"  maxlength="20" required></td></tr>
				</table>
			
			</div>
			
			<div class="w3-light-gray" style="padding: 10px; border-radius: 0px 0px 5px 5px;">
				<input type="submit" value="Crear seccion" />
				<button type="button" onClick="openmodal3()">Modificar sección</button>
			</div></form>
		</div>	
	</div>
		
		
	<!-- apertura del sistema -->
	<div class="w3-col l4" style="padding: 0% 2% 2% 0%;">
		<!-- tabla azul blanco gris -->
		<div class="w3-border" style="border-radius: 5px;">

			<div style="padding: 10px; background-color: #2e7c8c; color: white; border-radius: 5px 5px 0px 0px;">Apertura del sistema</div>

			<?php $querysis = "SELECT * FROM `sistema`";
			$resultadosis = mysqli_query($conexion, $querysis);
			$sis = mysqli_fetch_array($resultadosis, MYSQL_ASSOC);?>
			
			<form method="post" target="_blank">
			<div style="padding: 10px;">
				
				<table cellpadding="2" width="100%">
				<tr><td width="30%">
					<label>Apertura: </label>
				</td><td>
					<input type="date" name="apertura" style="width: 100%" value="<?php echo $sis['apertura']; ?>" required>
				</td></tr>
				<tr><td>
					<label>Cierre: </label>
				</td><td>
					<input type="date" name="cierre" style="width: 100%" value="<?php echo $sis['cierre']; ?>" required>
				</td></tr>
				</table>
			
			</div>
			
			<div class="w3-light-gray" style="padding: 10px; border-radius: 0px 0px 5px 5px;">
				<input type="submit" value="Cambiar fechas" formaction="php/mod_sistema.php" />
				<input type="submit" value="Reporte" formaction="php/get_report.php" >
			</div></form>
		</div>	
	</div>
		
		
		
	<!-- ver abastos -->
	<div class="w3-col l6" style="padding: 0% 2% 2% 0%;">
		<!-- tabla azul blanco gris -->
		<div class="w3-border" style="border-radius: 5px;">

			<div style="padding: 10px; background-color: #2e7c8c; color: white; border-radius: 5px 5px 0px 0px;">Lista de abastos</div>

			<div style="padding: 10px;">
			
			<table id="abastos" class="display" width="100%" style="text-align: center; padding-top: 10px;">
				<thead><tr>
					<td width="20%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Índice</td>
					<td width="20%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Fecha</td>
					<td width="40%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Beneficiario</td>
					<td width="20%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Total</td>
				</tr></thead>

				<tbody>

					<?php 
					$queryabst = "SELECT * FROM `abastecimiento` ORDER BY `abastecimiento`.`inicio` ASC ";
					$resultadoabst = mysqli_query($conexion, $queryabst);
					while($abst = mysqli_fetch_array($resultadoabst, MYSQL_ASSOC)){ ?>
					<tr><td width="20%" style=" border: 1px solid white;"><?php echo $abst['inicio']; ?></td>
					<td width="20%" style=" border: 1px solid white;"><?php echo $abst['fechacreacion']; ?></td>
					<?php 
					$queryben = "SELECT * FROM `usuarios` WHERE `cedula`='".$abst['beneficiario']."' ";
					$resultadoben = mysqli_query($conexion, $queryben);
					$ben = mysqli_fetch_array($resultadoben, MYSQL_ASSOC); ?></td>
					<td width="60%" style="text-align: left; border: 1px solid white;"><?php echo $ben['nombres'].' '.$ben['apellidos']; ?></td>
					<td width="20%" style="text-align: left; border: 1px solid white;"><?php echo $abst['total']; ?></td>
					</tr><?php } ?>						
				</tbody>
				</table>

			</div>
			
			<div class="w3-light-gray" style="padding: 10px; border-radius: 0px 0px 5px 5px;">
				
			</div>
		</div>	
	</div>
	<!-- end row -->
	</div>


<!-- modal usuario -->
	<div id="modalusuario" class="w3-modal w3-display-middle">
		<div class="w3-modal-content w3-display-middle w3-justify" id='modalcontent' style="padding: 1%; display: block; width: 90%; max-height: 500px; text-align: center; border-radius: 5px; box-shadow: 0px 0px 10px 1px #e0e0e0; color: black;">
			
		<div class="w3-margin"><button class="w3-right" onClick="closemodal1()" style="border-radius: 50%; background-color: red; border: none;"><em class="fa fa-close"></em></button><br></div>
		
		<!-- tabla azul blanco gris -->
			<div class="w3-border" style="border-radius: 5px; min-height: 400px; max-height: 400px; overflow: scroll;">

				<div style="padding: 10px; background-color: #2e7c8c; color: white; border-radius: 5px 5px 0px 0px;">Usuarios</div>

				<table id="modusuarios" class="display" width="100%" style="text-align: center; padding-top: 10px;">
				<thead><tr>
					<td width="12%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Usuario</td>
					<td width="12%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Contraseña</td>
					<td width="12%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Cédula</td>
					<td width="13%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Nombres</td>
					<td width="13%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Apellidos</td>
					<td width="14%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Email</td>
					<td width="12%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Perfil</td>
					<td width="10%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Estado</td>
					<td width="2%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;"></td>
				</tr></thead>
				<tbody>
					<?php $queryusu = "SELECT * FROM `usuarios` ";
					$resultadousu = mysqli_query($conexion, $queryusu);
					while($usu = mysqli_fetch_array($resultadousu, MYSQL_ASSOC)){ ?>
					<form target="_blank" action="php/mod_usuario.php" method="post">
					<td width="12%" style="text-align: left; border: 1px solid white;"><input style="width: 100%;" width="100%" type="text" value="<?php echo $usu['usuario']; ?>" name="usuario" required ></td>
					<td width="12%" style="text-align: left; border: 1px solid white;"><input style="width: 100%;" width="100%" type="text" value="<?php echo $usu['password']; ?>" name="password" required ></td>
					<td width="12%" style="text-align: left; border: 1px solid white;"><input style="width: 100%;" width="100%" type="text" value="<?php echo $usu['cedula']; ?>" name="cedula" readonly ></td>
					<td width="13%" style="text-align: left; border: 1px solid white;"><input style="width: 100%;" width="100%" type="text" value="<?php echo $usu['nombres']; ?>" name="nombres" required ></td>
					<td width="13%" style="text-align: left; border: 1px solid white;"><input style="width: 100%;" width="100%" type="text" value="<?php echo $usu['apellidos']; ?>" name="apellidos" required ></td>
					<td width="14%" style="text-align: left; border: 1px solid white;"><input style="width: 100%;" width="100%" type="text" value="<?php echo $usu['email']; ?>" name="email" required ></td>
					<td width="12%" style="text-align: left; border: 1px solid white;">
						<select name="perfil" style="width: 100%" required>
							<?php if($usu['perfil']=='administrador'){ ?>
							<option value="administrador" selected>Administrador</option>
							<option value="usuario">Usuario</option>
							<?php } else { ?>
							<option value="administrador">Administrador</option>
							<option value="usuario" selected>Usuario</option>
							<?php } ?>
						</select></td>
					<td width="10%" style="text-align: left; border: 1px solid white;">
						<select name="estado" style="width: 100%" required>
							<?php if($usu['estado']=='1'){ ?>
							<option value="1" selected>Activo</option>
							<option value="0">Inactivo</option>
							<?php } else { ?>
							<option value="1">Activo</option>
							<option value="0" selected>Inactivo</option>
							<?php } ?>
						</select></td>
					<td width="2%" style="text-align: left; border: 1px solid white;"><button type="submit"><em class="fa fa-pencil"></em></button></td></form>
					</tr><?php } ?>						
				</tbody>
				</table>
			</div>
		</div></div><!--fin modal usuario-->


<!-- modal producto -->
	<div id="modalproducto" class="w3-modal w3-display-middle">
		<div class="w3-modal-content w3-display-middle w3-justify" id='modalcontent' style="padding: 1%; display: block; width: 90%; max-height: 700px; text-align: center; border-radius: 5px; box-shadow: 0px 0px 10px 1px #e0e0e0; color: black;">
			
		<div class="w3-margin"><button class="w3-right" onClick="closemodal2()" style="border-radius: 50%; background-color: red; border: none;"><em class="fa fa-close"></em></button><br></div>
		
		<!-- tabla azul blanco gris -->
			<div class="w3-border" style="border-radius: 5px; min-height: 400px; max-height: 400px; overflow: scroll;">

				<div style="padding: 10px; background-color: #2e7c8c; color: white; border-radius: 5px 5px 0px 0px;">Productos</div>

				<table id="modproductos" class="display" width="100%" style="text-align: center; padding-top: 10px;">
				<thead><tr>
					<td width="32%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Producto</td>
					<td width="12%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Unidad</td>
					<td width="10%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Cantidad máx.</td>
					<td width="10%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Valor unitario</td>
					<td width="17%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Sección</td>
					<td width="17%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Disponibilidad</td>
					<td width="2%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;"></td>
				</tr></thead>
				<tbody>
					<?php $queryprod = "SELECT * FROM `productos` ";
					$resultadoprod = mysqli_query($conexion, $queryprod);
					while($prod = mysqli_fetch_array($resultadoprod, MYSQL_ASSOC)){ ?>
					<form target="_blank" action="php/mod_producto.php" method="post">
					<input type="hidden" value="<?php echo $prod['idproducto']; ?>" name="idproducto">
					<td width="32%" style="text-align: left; border: 1px solid white;"><input style="width: 100%;" width="100%" type="text" value="<?php echo $prod['producto']; ?>" name="producto" required ></td>
					<td width="12%" style="text-align: left; border: 1px solid white;"><input style="width: 100%;" type="text" value="<?php echo $prod['unidad']; ?>" name="unidad" required ></td>
					<td width="10%" style="text-align: left; border: 1px solid white;"><input style="width: 100%;" type="number" min="0" value="<?php echo $prod['maxcant']; ?>" name="maxcant" required ></td>
					<td width="10%" style="text-align: left; border: 1px solid white;"><input style="width: 100%;" type="text" value="<?php echo $prod['valor']; ?>" name="valor" required ></td>
					<td width="17%" style="text-align: left; border: 1px solid white;">
						<select name="seccion" style="width: 100%" required>
							<?php $querysec = "SELECT * FROM `seccion` ";
							$resultadosec = mysqli_query($conexion, $querysec);
							while($sec = mysqli_fetch_array($resultadosec, MYSQL_ASSOC)){ ?>
							<?php if($prod['seccion'] == $sec['idseccion']){ ?>
							<option value="<?php echo $sec['idseccion']; ?>" selected><?php echo $sec['seccion']; ?></option>
							<?php } else { ?>
							<option value="<?php echo $sec['idseccion']; ?>"><?php echo $sec['seccion']; ?></option>
							<?php }} ?>
						</select></td>
					<td width="17%" style="text-align: left; border: 1px solid white;">
						<select name="disponibilidad" style="width: 100%" required>
							<?php if($prod['disponibilidad']=='1'){ ?>
							<option value="1" selected>Disponible</option>
							<option value="0">No disponible</option>
							<?php } else { ?>
							<option value="1">Disponible</option>
							<option value="0" selected>No disponible</option>
							<?php } ?>
						</select></td>
					<td width="2%" style="text-align: left; border: 1px solid white;"><button type="submit"><em class="fa fa-pencil"></em></button></td></form>
					</tr><?php } ?>						
				</tbody>
				</table>
			</div>
	</div></div><!--fin modal-->

<!-- modal seccion -->
	<div id="modalseccion" class="w3-modal w3-display-middle">
		<div class="w3-modal-content w3-display-middle w3-justify" id='modalcontent' style="padding: 1%; display: block; width: 50%; text-align: center; border-radius: 5px; box-shadow: 0px 0px 10px 1px #e0e0e0; color: black;">
			
		<div class="w3-margin"><button class="w3-right" onClick="closemodal3()" style="border-radius: 50%; background-color: red; border: none;"><em class="fa fa-close"></em></button><br></div>
		
		<!-- tabla azul blanco gris -->
			<div class="w3-border" style="border-radius: 5px; min-height: 400px; overflow: scroll;">

				<div style="padding: 10px; background-color: #2e7c8c; color: white; border-radius: 5px 5px 0px 0px;">Secciones</div>

				<table id="modseccion" class="display" width="100%" style="text-align: center; padding-top: 10px;">
				<thead><tr>
					<td width="95%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;">Sección</td>
					<td width="5%" class="w3-border" style="background-color: #2e7c8c; padding: 2px; color: white;"></td>
				</tr></thead>
				<tbody>
					<?php $querysecc = "SELECT * FROM `seccion` ";
					$resultadosecc = mysqli_query($conexion, $querysecc);
					while($secc = mysqli_fetch_array($resultadosecc, MYSQL_ASSOC)){ ?></td>
					<form target="_blank" action="php/mod_seccion.php" method="post">
					<input type="hidden" name="idseccion" value="<?php echo $secc['idseccion']; ?>" >
					<td width="95%" style="text-align: left; border: 1px solid white;"><input type="text" name="seccion" value="<?php echo $secc['seccion']; ?>"></td>
					<td width="5%" style="text-align: left; border: 1px solid white;"><button type="submit"><em class="fa fa-pencil"></em></button></td></form>
					</tr><?php } ?>						
				</tbody>
				</table>
			</div>
	</div></div><!--fin modal seccion-->
	
</body>
	
<script>

//tabla de datos
$(document).ready( function () {
$('#abastos').DataTable({
"paging":   true,
"ordering": true,
"info":     false
});
} );

	
// usuario
var modalusuario = document.getElementById('modalusuario');//get modal
function openmodal1(){
	modalusuario.style.display = 'block'; }
function closemodal1(){
	modalusuario.style.display = 'none'; }
window.addEventListener('click', outsideclick1);//close on outside click
function outsideclick1(e){
if (e.target == modalusuario){
	modalusuario.style.display = 'none'; }}
	
// producto
var modalproducto = document.getElementById('modalproducto');//get modal
function openmodal2(){
	modalproducto.style.display = 'block'; }
function closemodal2(){
	modalproducto.style.display = 'none'; }
window.addEventListener('click', outsideclick2);//close on outside click
function outsideclick2(e){
if (e.target == modalproducto){
	modalproducto.style.display = 'none'; }}
	
// seccion
var modalseccion = document.getElementById('modalseccion');//get modal
function openmodal3(){
	modalseccion.style.display = 'block'; }
function closemodal3(){
	modalseccion.style.display = 'none'; }
window.addEventListener('click', outsideclick3);//close on outside click
function outsideclick3(e){
if (e.target == modalseccion){
	modalseccion.style.display = 'none'; }}


function check(input) {
	if (input.value != document.getElementById('password').value) {
		input.setCustomValidity('Las contraseñas deben coincidir.');
	} else {
		//input is valid -- reset the error message
		input.setCustomValidity('');
	}
}

</script>
		<?php } else { header("location: abastecimento.php");} ?>
</html>