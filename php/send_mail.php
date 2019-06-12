<?php

require('../PHPMailer-5.2/PHPMailerAutoload.php');

date_default_timezone_set('America/Guayaquil');


  //mail config
  $mail = new PHPMailer();
  $mail->SMTPDebug = 2;                               // Enable verbose debug output
  $mail->Debugoutput = 'html';
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'correo@mail.com';                 // SMTP username
  $mail->Password = 'passw';                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;

  //mail headers
  $mail->setFrom('sender@mail.com', 'Nombre de quien envia');

  $mail->isHTML(true);                                  // Set email format to HTML

  //send mail
  $mail->Subject = 'Asunto';
  $mail->Body = "Cuerpo del correo";

  if(!$mail->send()){
		echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
						window.alert('Mail no enviado');
					</script>");

	}

?>