<?php
require_once 'fpdf/fpdf.php';
require_once 'MetodosManuelAmador.php';
$objconexion =new clasesql();
$consulta = "SELECT  * FROM `pistas` WHERE idPista='" .$_GET["e"]. "'";
$objconexion->realizarConsultas($consulta);
if ($objconexion->comprobarSelect()> 0) {
    $fila = $objconexion->extraerFilas();
}
$objconexion->realizarConsultas($consulta);
$pdf=new FPDF();
$pdf->AddPage();
$pdf->Image('imagenes/emdtalavera.png',100,8,20);
$pdf->Ln(35);
$pdf->SetFont("helvetica", "B", 30);
$pdf->Cell(200,10,'Tu reserva ha sido un exito: ',0,0,'C');
$pdf->Ln(20);
$pdf->SetFont("helvetica", "B", 10);
$pdf->Cell(200,10,'Nombre de la reserva: ',0,0,'C');
$pdf->Ln(10);
$pdf->SetFont("helvetica", "", 10);
$pdf->Cell(200,10,$_GET["s"],0,0,'C');
$pdf->Ln(20);
$pdf->SetFont("helvetica", "B", 10);
$pdf->Cell(200,10,'Pista Reservada: ',0,0,'C');
$pdf->Ln(10);
$pdf->SetFont("helvetica", "", 10);
$pdf->Cell(200,10,$fila["Nombre"],0,0,'C');
$pdf->Ln(20);
$pdf->SetFont("helvetica", "B", 10);
$pdf->Cell(200,10,'Horario: ',0,0,'C');
$pdf->Ln(10);
$pdf->SetFont("helvetica", "", 10);
$pdf->Cell(200,10,$_GET["i"].'-'.$_GET["r"],0,0,'C');
$pdf->Ln(20);
$pdf->SetFont("helvetica", "B", 10);
$pdf->Cell(200,10,'Fecha Reserva: ',0,0,'C');
$pdf->Ln(10);
$pdf->SetFont("helvetica", "", 10);
$pdf->Cell(200,10,$_GET["x"],0,0,'C');
$pdf->Ln(40);
$pdf->SetFont("helvetica", "B", 18);
$pdf->Cell(200,10,'Disfruta y cuida de las instalaciones Deportivas ',0,0,'C');
$pdf->Ln(25);
$pdf->SetFont("helvetica", "B", 8);
$pdf->Cell(200,10,'emdtalavera.com ',0,0,'R');
$pdf->Ln(10);
$pdf->Image('imagenes/jj.jpg',0,250,210);
ob_end_clean();
$pdf->Output("D","ReservaPista.pdf");
?>

