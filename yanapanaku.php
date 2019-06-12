<!DOCTYPE html>

<html>
    <head>
    <title>Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

	<style>
	
		.primario{
			display: block;
			width: 25%;
			border-radius: 5px;
			background: white;
			font-size: 14px;
			text-align: center;
			vertical-align: middle;
			background-position: center;
			box-shadow: 0px 0px 10px 1px #e0e0e0;
		}
		.secundario{
			background-color: #2e7c8c;
			color: white;
			height: 100%;
			vertical-align: middle;
			font-size: 10px;
			border-radius: 5px;

		}

		.form-input{

			width: 80%;
			margin: 10px;
			font-size: 15px;
			padding: 3px;
			border: 1px solid #e0e0e0;
			border-radius: 5px;
			padding-left: 5px;
			color: black;
		}

		.forma-button{
			background-color: #2e7c8c;
			color: white;
			margin: 20px;
			width: 40%;
			height: 30px;
			border: none;
			border-radius: 5px;
		}

		.password-btn{
			background-color: #2e7c8c;
			color: white;
			border: none;
		}
		
	</style>
    
<body>
	
	
	<div class="w3-row-padding w3-display-middle" style="width: 80%">
	
	<div class="w3-col l8" style="padding: 4% 0 0 0">
	<div style="width: 100%">
		<img src="imagenes/CEYT.png" width="100%"></div></div>
		
	<!-- cuadrado de login pantallas grandes-->
	<div class="w3-col l4" style="padding: 1% 2%">
	
	<div class="primario w3-hide-small w3-hide-medium w3-center" style="width: 100%;">
		<div class="secundario" style="font-size: 15px; padding: 5px; text-align: left; padding-left: 10px;">Inicio de Sesión</div>
		<div style="padding-top: 20px; padding-bottom: 20px; ">
			<a>Optimizado para Chrome</a>
			<form action="validacion_login.php" method="post" id="formlogin">
				<input type="text" id="usuario" name="usuario" placeholder="Usuario" class="form-input w3-hover-shadow" required />
				<input type="password" id="password" name="password" placeholder="Contraseña" class="form-input w3-hover-shadow" required>
				<!--input type="text" id="cedula" name="cedula" placeholder="R.U.C." class="form-input w3-hover-shadow"/-->
				<input type="button" onClick="openmodal1()" name="enviar" value="Iniciar" class="forma-button w3-hover-gray" >
			</form>
		</div>
		<div class="secundario" style="padding: 1px 10px 0 10px; height: 25px;">
			<a class="w3-left" style="text-decoration: none;">V 1.19</a>
			<a class="w3-right" style="text-decoration: none;">Safari no recomendado</a>
		</div>
	</div>
	</div>
		
	</div>
	
	<!-- Footer (sit on bottom) ->
	<footer class="w3-bottom footer w3-hide-small">
		<div class="w3-center" style="padding: 20px;">Powered by <a style="text-decoration: none; color: #2e7c8c; font-weight: 600">Webdit</a></div>
	</footer-->
	
	
	
	
	
	
	<!-- modal de informacion -->
	<div id="modalinfo" class="w3-modal w3-display-middle">
		<div class="w3-modal-content w3-display-middle w3-justify" id='modalcontent' style="padding: 1%; display: block; width: 80%; text-align: center; border-radius: 5px; box-shadow: 0px 0px 10px 1px #e0e0e0; color: darkgreen;">
				
	<div style="padding: 2%; font-size: 18px; text-align: justify">
	<!-- terminos y condiciones -->
	<spam style="color: red; font-size: 22px;">EL PRESENTE DOCUMENTO ES SOLO PARA CONOCIMIENTO Y MANEJO DE LOS BENEFICIARIOS DEL PROGRAMA YANAPANAKU.</spam>
	
	<ul>
	<li>Mediante este documento, como beneficiario del programa yanapanaku, podrás adquirir quincenalmente y de forma gratuita determinados víveres del mercado central de Urcuquí.</li>
	<li>Se requiere llenar correctamente y enviar a las autoridades correspondientes el documento en el tiempo estipulado para que este posea vigencia.</li>
	<li>El presente documento solo posee validez para la persona a la cual fue destinado, no se permite su uso, divulgación o manejo a intermediarios o terceros.</li>
	<li>Para retirar los productos seleccionados se requiere presentar impresas 2 copias de la <spam style="color: red;">hoja de abastecimiento</spam> 
	y el original del carnet personal de estudiante, como identificación al comerciante.</li>
	<li>Después de cada adquisición, el estudiante y el comerciante que despachó el producto deberán firmar la <spam style="color: red;">hoja de abastecimiento</spam> en la casilla correspondiente a manera de registro de transacción. incumplir este requisito conlleva a medidas disciplinarias.</li>
	<li>El manejo irresponsable o adulteramiento del presente documento (digital o impreso) conlleva a medidas disciplinarias para el beneficiario, en calidad de responsable del documento.</li>
	<li>El manejo de los productos obtenidos a través del programa para fines de lucro u otros fines independientes de su función original conlleva a medidas disciplinarias para el beneficiario.</li></ul>
	</div>
			
		<div class="w3-center"><button type="button" onClick="login()" style="border-radius: 50%; background-color: #2e7c8c; border: none;"><em class="fa fa-arrow-right fa-3x"></em></button><br>
		
			
	</div></div>
	
</body>
	
<script>
//funcion de ventana modal 

// info
var modalinfo = document.getElementById('modalinfo');//get modal
function openmodal1(){
	modalinfo.style.display = 'block'; }
function closemodal1(){
	modalinfo.style.display = 'none'; }

window.addEventListener('click', outsideclick1);//close on outside click
function outsideclick1(e){
	if (e.target == modalinfo){
	modalinfo.style.display = 'none'; }}


function login(){
	document.getElementById("formlogin").submit();
}

</script>

</html>
