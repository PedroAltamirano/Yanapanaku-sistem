<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link href="w3.css" rel="stylesheet" type="text/css">
</head>

<body>

	<?php
		
		session_start();
		session_destroy();
		header("Location: yanapanaku.php");
	
	?>
	
</body>
</html>