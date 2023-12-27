<?php
require_once '../vendor/autoload.php';
require_once '../models/asistencia.php'; //
 
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
 
try {
 
    $asistencia = new Asistencia();
    $data = $asistencia->AlumnosPorCurso($_GET['nombreCurso']);
 
    ob_start();
 
 
    //Archivos que componen el PDF
    include './estilos.reporte.html';//
    include './estado.data.php'; //
 
    $content = ob_get_clean();
 
    $html2pdf = new Html2Pdf('P', 'A4', 'es'); //
    $html2pdf->writeHTML($content);
    $html2pdf->output('ControlEstados-venta.pdf'); // Cambiar nombre de el pdf
} catch (Html2PdfException $e) {
    $html2pdf->clean();
 
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}