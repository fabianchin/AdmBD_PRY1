<?php
ob_start();
//require('fpdf/fpdf.php');
include '../fpdf/fpdf.php';
class PDF extends FPDF
{
// Header de todas las paginas
function Header()
{
    $image1 = "../Estilo/images/fordlogo.png";
    // Fuente
    $this->SetFont('Arial','B',9);
    // Movimiento de las celdas de izq a der
    $this->Cell(57);
    // Titulo
    $this->Cell(0, 0, $this->Image($image1, $this->GetX() - 57, $this->GetY(), 33.78), 0, 1, 'L', false );
    $this->Cell(110,13,utf8_decode('REPORTE DE VENTAS'),0,0,'C');
    // Salto de linea
    $this->Ln(20);
    //Los titulos de los campos a mostrar
    $this->Cell(15,10,'Marca',1,0,'C',0);
    $this->Cell(15,10,'Modelo',1,0,'C',0);
    $this->Cell(25,10,'Cedula Cliente',1,0,'C',0);
    $this->Cell(35,10,'Nombre Cliente',1,0,'C',0);
    $this->Cell(35,10,'Correo Cliente',1,0,'C',0);
    $this->Cell(35,10,'Correo Vendedor',1,0,'C',0);
    $this->Cell(15,10,'Precio',1,1,'C',0);
}
// Footer de todas las paginas
function Footer()
{
    //Posision a 1.5 centimetros del final
    $this->SetY(-15);
    //Fuente (I de italic)
    $this->SetFont('Arial','I',8);
    //Numero de paginas
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
} //Fin de la clase encapsulada
//Llamado a la clase de conexion a SQL
require '../data/ConectionDB.php';
//Conexion a BD
$con = new ConectionDB();
$conn = $con->conection2();
//Query
$query="SELECT a.marca as 'Marca', m.modelo as 'Modelo', c.cedula as 'Cedula Cliente', c.nombre as 'Nombre Cliente', c.correo as 'Correo Cliente', u.usuario as 'Vendedor', v.precioVenta as 'Precio de venta'
FROM venta v
INNER JOIN automovil a
	ON v.idAutomovil=a.idAutomovil
INNER JOIN modelo m
	ON a.idModelo=m.idModelo
INNER JOIN cliente c
	ON v.cedula=c.cedula
INNER JOIN usuario u
	ON v.usuario=u.usuario";
$res = sqlsrv_query($conn,$query);
//Creacion de PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);
//Llenado de celdas
while($row=sqlsrv_fetch_array($res)){
    $pdf->Cell(15,7,$row[0],2,0,'C',0);
    $pdf->Cell(15,7,$row[1],1,0,'C',0);
    $pdf->Cell(25,7,$row[2],1,0,'C',0);
    $pdf->Cell(35,7,$row[3],1,0,'C',0);
    $pdf->Cell(35,7,$row[4],1,0,'C',0);
    $pdf->Cell(35,7,$row[5],1,0,'C',0);
    $pdf->Cell(15,7,$row[6],3,1,'C',0);
    $pdf->Cell(175,2,7,1,1,'C',1);
    //$pdf->Cell(0, 0, $pdf->Image($image1, $pdf->GetX()+ 72, $pdf->GetY()+ 5, 33.78), 0, 1, 'L', false );
}
//Impresion
$pdf->Output();
ob_end_flush();
?>