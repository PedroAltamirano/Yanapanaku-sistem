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
		require('../PHPMailer-5.2/PHPMailerAutoload.php');
		
	
		$fechaapertura = $_POST['apertura'];
		$fechacierre = $_POST['cierre'];
		$sumtot = 0;
	
		
		echo $fechaapertura."  ";
		echo $fechacierre."  ";
		
		
		$txt = "Reporte de facturación<br>Fecha de inicio: $fechaapertura\nFecha de cierre: $fechacierre<br><br>";
		$txt .= "Index  ";
		$txt .= str_pad("Beneficiario", 25);
		$txt .= "Total<br>";
	
	
	
		$queryinicio = "SELECT * FROM `abastecimiento` WHERE `fechacreacion` BETWEEN '$fechaapertura' AND '$fechacierre' ";
		$resultadoinicio = mysqli_query($conexion, $queryinicio);
		while ($inicio = mysqli_fetch_array($resultadoinicio, MYSQL_ASSOC)){
		
		$sumtot += $inicio['total'];
		$ini = $inicio['inicio'];
		$ben = $inicio['beneficiario'];
		$tot = $inicio['total'];
			
			
		$txt .= "$ini    ";
		$txt .= "$ben";
		$txt .= "$tot<br>";
		
		}
	
		$txt .= "<br>Total facturado: $sumtot";
		
		date_default_timezone_set('America/Guayaquil');
	
	
		//mail config
		$mail = new PHPMailer();
		$mail->SMTPDebug = 2;                               // Enable verbose debug output
		$mail->Debugoutput = 'html';
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'yanapanaku.yachaytech@gmail.com';                 // SMTP username
		$mail->Password = 'consejo2017';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;
	
		//mail headers
		$mail->setFrom('yanapanaku.yachaytech@gmail.com', 'Sistema Yanapanaku');
		$mail->addAddress('jordy.cevallos@yachaytech.edu.ec', 'Jordy Cevallos');     // Add a recipient
		$mail->addAddress('yanapanaku.yachaytech@gmail.com', 'Yanapanaku');
	
		$mail->isHTML(true);                                  // Set email format to HTML
	
		//send mail
		$mail->Subject = 'Reporte';
		$mail->Body    = $txt;
	
		if(!$mail->send()) {
			echo ' Message could not be sent. ';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
	
		echo "<script>window.self.close();</script>";
	
	?>
	
	
</body>
</html>