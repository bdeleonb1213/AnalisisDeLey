<?php
require('fpdf/fpdf.php');


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('file:///C:/xampp/htdocs/Reportes/imagenes/umg.png',160,10,35);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(80,10,'Reporte de Ley',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->cell(80,10, 'capitulo', 1, 0, 'c', 0);
    $this->cell(30,10, 'cumple/capitulo', 1, 0, 'c', 0);
    $this->cell(30,10,  'stock', 1, 1, 'c', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}



require 'conexion.php';   
$consulta= "SELECT * FROM cumplimiento_articulo";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf -> aliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
//$pdf->Cell(40,10,utf8_decode('¡EJEMPLo DE REPORTE de ley,!'));


while($row = $resultado-> fetch_assoc()){

    $pdf->cell(80,10, $row['nombre_producto'], 1, 0, 'c', 0);
    $pdf->cell(30,10, $row['precio_producto'], 1, 0, 'c', 0);
    $pdf->cell(30,10, $row['stock_producto'], 1, 1, 'c', 0);
}

$pdf->Output();
?>