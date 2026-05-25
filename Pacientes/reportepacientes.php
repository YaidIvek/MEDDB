<?php

include("../ConexiónConMedDB.php");

require('../fpdf/fpdf.php');

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(190,10,'Reporte de Pacientes',1,1,'C');

$pdf->Ln(10);

$pdf->SetFont('Arial','B',11);

$pdf->Cell(15,10,'ID',1);

$pdf->Cell(35,10,'Nombre',1);

$pdf->Cell(40,10,'Apellido P.',1);

$pdf->Cell(40,10,'Apellido M.',1);

$pdf->Cell(30,10,'Genero',1);

$pdf->Cell(30,10,'Pais',1);

$pdf->Ln();

$sql = "SELECT * FROM Pacientes";

$stmt = $conn->query($sql);

$pdf->SetFont('Arial','',10);

while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){

    $pdf->Cell(15,10,
    $fila['ID'],1);

    $pdf->Cell(35,10,
    utf8_decode($fila['Nombre']),1);

    $pdf->Cell(40,10,
    utf8_decode($fila['Apellido_Paterno']),1);

    $pdf->Cell(40,10,
    utf8_decode($fila['Apellido_Materno']),1);

    $pdf->Cell(30,10,
    utf8_decode($fila['Genero']),1);

    $pdf->Cell(30,10,
    utf8_decode($fila['Pais_Origen']),1);

    $pdf->Ln();

}

$pdf->Output();

?>