<?php
require('fpdf184/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('logo.png',10,8,15);
    // Arial bold 15
    $this->SetFont('Courier','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(75,10,iconv('UTF-8','windows-1252','REPORTE DE PRÉSTAMOS'),1,0,'C');
    // Salto de línea
    $this->Ln(20);


    $this->SetTextColor(0,126,95);
    $this->SetFont('Times','B',11);
    $this->Cell(10,10,'ID',1,0,'C',0);
    $this->Cell(45,10,'Libro',1,0,'C',0);
    $this->Cell(45,10,'Usuario',1,0,'C',0);
    $this->Cell(35,10,utf8_decode('Fecha de préstamo'),1,0,'C',0);
    $this->Cell(35,10,utf8_decode('Fecha de devolución'),1,0,'C',0);
    $this->Cell(20,10,'Estado',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,iconv('UTF-8','windows-1252','Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

//Conexión a la base de datos
$conexion = new mysqli("localhost","root","","prestamoLibros");

if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}
$sql_prestamos = "SELECT * FROM prestamos";
$sql = "SELECT * FROM prestamos, usuarios, libros, autores";
$query_prestamos = mysqli_query($conexion, $sql_prestamos);
$query = mysqli_query($conexion, $sql);

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Helvetica','',9);
while($row = mysqli_fetch_array($query_prestamos)){
    $libro = mysqli_fetch_array(mysqli_query($conexion, "SELECT nombre FROM libros WHERE idlibros=".$row["libros_idlibros"].""));
    $usuario = mysqli_fetch_array(mysqli_query($conexion, "SELECT nombre FROM usuarios WHERE idusuarios=".$row["usuarios_idusuarios"].""));

    $pdf->Cell(10,10,$row['idprestamos'],1,0,'C',0);
    $pdf->Cell(45,10,utf8_decode($libro['nombre']),1,0,'C',0);
    $pdf->Cell(45,10,utf8_decode($usuario['nombre']),1,0,'C',0);
    $pdf->Cell(35,10,$row['fechaPrestamo'],1,0,'C',0);
    $pdf->Cell(35,10,$row['fechaRegreso'],1,0,'C',0);
    $pdf->Cell(20,10,utf8_decode($row['estado']),1,1,'C',0);
}
//for($i=1;$i<=40;$i++)
    //$pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
$pdf->Output();

$conexion->close();


?>