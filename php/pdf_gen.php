<?php
$idabasto = $_GET['id'];
	
require '..\html2pdf\vendor\autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
  ob_start();
  require_once '../pdf_plantilla.php';
  $content = ob_get_clean();
    
	$html2pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8', array(10, 10, 10, 10));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content);
  $pdf = $html2pdf->output('yanapanaku.pdf');
	
	require ('send_mail.php');

} catch (Html2PdfException $e) {

	$html2pdf->clean();
  $formatter = new ExceptionFormatter($e);
  echo $formatter->getHtmlMessage();

}

?>