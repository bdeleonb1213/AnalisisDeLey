
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

    $this->Cell(80,10,  'ACUERDO No. 006-2011 (Panamá)',0,0,'C');
    // Salto de línea
    $this->Ln(20);
     $this->Ln(20);

    $this->cell(80,10, 'Nombre Ley ', 1, 0, 'c', 0);
    $this->cell(30,10, 'Articulo ', 1, 0, 'c', 0);
     $this->cell(30,10, 'Estado ', 1, 0, 'c', 0);
    $this->cell(30,10,   'Evidencia', 1, 1, 'c', 0);
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



require 'cn.php';   
$consulta= "SELECT NombreLey, Articulo, cumplimiento_articulo.titulo, estado, evidencia FROM cumplimiento_articulo INNER JOIN articulo ON cumplimiento_articulo.id_articulo = articulo.IdArticulo INNER JOIN ley on cumplimiento_articulo.id_ley = ley.IdLey WHERE IdLey = 6";




$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf -> aliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
//$pdf->Cell(40,10,utf8_decode('¡EJEMPLo DE REPORTE de ley,!'));


while($row = $resultado-> fetch_assoc()){

    $pdf->cell(80,10, $row['NombreLey'], 1, 0, 'c', 0);
    $pdf->cell(30,10, $row['Articulo'], 1, 0, 'c', 0);
    $pdf->cell(30,10, $row['estado'], 1, 0, 'c', 0);
    $pdf->cell(30,10, $row['evidencia'], 1, 1, 'c', 0);
}

$pdf->Output();
?>

