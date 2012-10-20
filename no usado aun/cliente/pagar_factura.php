<?php 
 require("sesion.php");
 
require('../scripts/fpdf/fpdf.php'); 
include ("conexion_bdd.php");

include ("consulta_bdd.php");

$conexion=conectarbd("localhost","root","","seguweb");
$id=$_GET['id_factura'];
$query="select * from factura where id=$id"; 
$consulta=consulta($query, $conexion);







while($row=mysql_fetch_array($consulta,MYSQL_NUM)) { 
    $data = $row[3];
    $pdf=new FPDF(); 
    $pdf->AddPage(); 
	$pdf->Header();
	$pdf->Image('../imagenes/factura.png');
	$pdf->Ln(10);
	$pdf->SetFont('Arial','B',16); 
    $pdf->Cell(40,10,'Nro de Factura: '.$row[1]);
	$pdf->Ln(10);
	$pdf->Cell(40,10,'Fecha: '.$row[2]);
	$pdf->Ln(10);
	$pdf->Ln(10);
	$pdf->Cell(40,10,'Concepto: Servicio de monitoreo de dispositivos');
	$pdf->Ln(10);
	$pdf->Cell(40,10,'Importe: '.$row[3]);
	$pdf->Ln(10);
	$pdf->Ln(10);
	
    $pdf->Ln(10); 

 
$pdf->Output(); 
}
?> 