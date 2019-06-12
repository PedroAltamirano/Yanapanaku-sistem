<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	
<?php
	
require 'PHPMailer-5.2/PHPMailerAutoload.php';
date_default_timezone_set('America/Guayaquil');
	
$mail = new PHPMailer;

$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';	
// Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->SMTPAuth = true;
		//Whether to use SMTP authentication
$mail->Username = 'yanapanaku.yachaytech@gmail.com';             // SMTP username
$mail->Password = 'consejo2017';                       // SMTP password
$mail->SMTPSecure = 'tls';                           // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('yanapanaku.yachaytech@gmail.com', 'Sistema Yanapanaku');
		$mail->addAddress('jordy.cevallos@yachaytech.edu.ec', 'Jordy Cevallos');     // Add a recipient
		$mail->addAddress('yanapanaku.yachaytech@gmail.com', 'Yanapanaku');
		$mail->addAddress('pedroaal@hotmail.com', 'Outlook');     // Add a recipient
/*$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Correo php test';
$mail->Body    = 'Ojala q sirva la guada';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

	?>
	
</body>
</html>