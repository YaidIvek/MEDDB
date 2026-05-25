<?php

include("../ConexiónConMedDB.php");

require('../fpdf/fpdf.php');

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(190,10,'Reporte de Pagos',1,1,'C');

$pdf->Ln(10);

$pdf->SetFont('Arial','B',12);

$pdf->Cell(20,10,'ID',1);
$pdf->Cell(40,10,'Monto',1);
$pdf->Cell(60,10,'Metodo',1);
$pdf->Cell(50,10,'Fecha',1);

$pdf->Ln();

$sql = "SELECT * FROM Pagos";

$stmt = $conn->query($sql);

$pdf->SetFont('Arial','',11);

while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){

    $pdf->Cell(20,10,$fila['ID'],1);

    $pdf->Cell(40,10,
    '$'.$fila['Monto'],1);

    $pdf->Cell(60,10,
    $fila['Metodo_Pago'],1);

    $pdf->Cell(50,10,
    $fila['Fecha_Pago'],1);

    $pdf->Ln();

}

$pdf->Output();

?>