<?php
  session_start();
  if(!isset($_SESSION["cedula"])){
      header("Location: yanapanaku.php");
  }

  require("DDBB.php");
  
  $fechacreacion = date("Y-m-d");
  $beneficiario = $_SESSION['cedula'];
  $tot = $_POST['total'];
  $email = $_POST['email'];

  echo $fechacreacion."  ";
  echo $beneficiario."  ";
  echo $tot."  ";
  echo $email."  ";


  $querysis = "SELECT * FROM `sistema` ";
  $resultadosis = mysqli_query($conexion, $querysis);
  $sis = mysqli_fetch_array($resultadosis);


  $queryexis = "SELECT * FROM `abastecimiento` WHERE `fechacreacion` BETWEEN '".$sis['apertura']."' AND '".$sis['cierre']."' AND `beneficiario`='".$_SESSION['cedula']."' ";
  $resultadoexis = mysqli_query($conexion, $queryexis);
  $exis = mysqli_num_rows($resultadoexis);
  if($exis == 0){


  $queryinicio = "SELECT * FROM `abastecimiento` ORDER BY `abastecimiento`.`inicio` DESC";
  $resultadoinicio = mysqli_query($conexion, $queryinicio);
  $inicio = mysqli_fetch_array($resultadoinicio, MYSQL_ASSOC);
  echo ' >'.$inicio['inicio'].'< ';


  $next = $inicio['inicio']+1;
  echo ' -'.$next.'- ';

  $ingreso="INSERT INTO `abastecimiento`(`fechacreacion`, `inicio`, `beneficiario`, `total`) VALUES ('$fechacreacion', '$next', '$beneficiario', '$tot')";

  $resultados=mysqli_query($conexion, $ingreso);

  if($resultados !== false){
      echo 'datos agregados <br>';


      // agregar solicitud de material
  $counter = $_POST['counter'];
  echo " >>".$counter.'<< ';

  if($counter > 0){

  for($i = 1; $i < $counter+1; $i++){
  $producto = $_POST["prodid".$i];
  $unidad = $_POST["unidad".$i];
  $cantidad = $_POST["cantidad".$i];
  $valor = $_POST["valor".$i];
  $total = $_POST["total".$i];

  echo $i.$producto."&nbsp;&nbsp;";
  echo $i.$unidad."&nbsp;&nbsp;";
  echo $i.$cantidad."&nbsp;&nbsp;";
  echo $i.$valor."&nbsp;&nbsp;";
  echo $i.$total."&nbsp;&nbsp;";


  $ingresoproducto = "INSERT INTO `abastproductos`(`fechacreacion`, `inicio`, `producto`, `unidad`, `cantidad`, `valor`, `total`) VALUES ('$fechacreacion', '$next', '$producto', '$unidad', '$cantidad', '$valor', '$total') ";
  $resultadoproducto = mysqli_query($conexion, $ingresoproducto);

  if($resultadoproducto !== false){
      echo 'producto agregado <br>';
  }else{
      echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
                  window.alert('producto no agregada');
                  window.self.close();
              </script>");
      //echo 'producto no agregado <br>';
  }}//termina for pedidos



  } echo ("<script type='text/javascript' LANGUAGE='JavaScript'>
                  window.alert('Abastecimiento agregada');
              </script>");//termina if contadores

      } else {
      echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
                  window.alert('Abastecimiento no agregados');
              </script>");
      //echo 'datos no agregados ';
  }

  mysqli_close($conexion);
		
	session_start();
	session_destroy();
	header("Location: pdf_gen.php?id=".$next);
	
  } else {
      echo ("	<script type='text/javascript' LANGUAGE='JavaScript'>
                  window.alert('Abastecimiento ya existe');
                  window.self.close();
              </script>");
      //echo 'ya existe';
  }
?>