<?php

require '../ProcesoSubir/conexion.php';
 


///********************plantilla encabezado******************
require '../fpdf/fpdf.php';

class PDF extends FPDF {

    function Header() {
        
        $this->Ln(10);
        $this->Image('../Imagenes/ceia.png', 160, 20, 40);
        $this->Image('../Imagenes/minerva.png',25, 15,25);
        //$this->Image('images/ayuda.PNG', 0,0,600,600);

        $this->SetFont('Arial', 'B', 15);
        $this->Cell(40, 6, '', 0, 0, 'C');
        $this->SetTextColor(0);
        $this->SetDrawColor(231, 169, 249);
        $this->SetLineWidth(1.5);
        $this->Cell(104, 6, 'Sistema Hidrometeorologico', 0, 0, 'C');
       
        $this->Ln(10);
         $this->SetFont('Arial', 'B', 15);
        $this->Cell(40, 6, '', 0, 0, 'C');
        $this->SetTextColor(0);
        $this->SetDrawColor(231, 169, 249);
        $this->SetLineWidth(1.5);
         $this->Cell(104,6, 'Informe de datos de pozos', 0, 0, 'C');
         $this->Ln(10);
         $this->SetFont('Arial', 'B', 15);
        $this->Cell(40, 6, '', 0, 0, 'C');
        $this->SetTextColor(0);
        $this->SetDrawColor(231, 169, 249);
        $this->SetLineWidth(1.5);
         $this->Cell(104,6, '', 0, 0, 'C');
      
        $this->SetDrawColor(0, 80, 180);
        $this->SetFillColor(230, 230, 0);
        $this->SetTextColor(220, 50, 50);
        // Ancho del borde (1 mm)
        $this->SetLineWidth(1);
        #Establecemos los márgenes izquierda, arriba y derecha: 
        $this->SetMargins(30, 25, 30);

#Establecemos el margen inferior: 
        $this->SetAutoPageBreak(true, 25);
        // Título
        // Salto de línea
        $this->Ln(10);
    }


}


//****************************fin de la plantilla encabezado.******************
//$reporte_grado = mysqli_query($conexion, "SELECT*FROM docente");
//
//$pdf = new PDF();
$pdf = new FPDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(10);
        $pdf->Image('../Imagenes/ceia.png', 200, 20, 40);
        $pdf->Image('../Imagenes/minerva.png',50, 15,25);
        //$this->Image('images/ayuda.PNG', 0,0,600,600);

        $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(40, 6, '', 0, 0, 'C');
        $pdf->SetTextColor(0);
        //$pdf->SetDrawColor(231, 169, 249);
        $pdf->SetLineWidth(1.5);
        $pdf->Cell(180, 6, 'Sistema Hidrometeorologico', 0, 0, 'C');
       
        $pdf->Ln(10);
         $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(40, 6, '', 0, 0, 'C');
        $pdf->SetTextColor(0);
        //$pdf->SetDrawColor(231, 169, 249);
        $pdf->SetLineWidth(1.5);
         $pdf->Cell(180,6, 'Informe de datos de pozos', 0, 0, 'C');
         $pdf->Ln(10);
         $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(40, 6, '', 0, 0, 'C');
        $pdf->SetTextColor(0);
       // $pdf->SetDrawColor(231, 169, 249);
        $pdf->SetLineWidth(1.5);
        $pdf->SetLineWidth(1);
        #Establecemos los márgenes izquierda, arriba y derecha: 
        $pdf->SetMargins(15, 25, 25);
////Para los grado
     
        $pdf->SetFont('Arial', 'B', 12);
         $validar = mysqli_query($mysqli, "SELECT pz.codigopozo,pz.tipo,pz.latitud,pz.longitud,pz.fechacreacion,pz.profundidad,pr.nombre,pr.apellido
FROM pozos as pz
INNER JOIN propietariospozos as pr ON pr.id_propietario = pz.id_propietario
ORDER BY pz.id_pozo");
        
       if(mysqli_num_rows($validar)>0){ 
  $pozo = mysqli_query($mysqli, "SELECT pz.codigopozo,pz.tipo,pz.latitud,pz.longitud,pz.fechacreacion,pz.profundidad,pr.nombre,pr.apellido
FROM pozos as pz
INNER JOIN propietariospozos as pr ON pr.id_propietario = pz.id_propietario
ORDER BY pz.id_pozo");
   while ($row1 = mysqli_fetch_array($pozo)) {
    $muni=$row1['municipio'];
    $pozos=$row1['codigopozo'];
    $geos=$row1['geologia'];
}
$pdf->SetFont('Arial', 'B', 12);
//$pdf->Cell(50, 10, 'Municipio: ' .$muni, 0, 0, 'C');
//$pdf->Cell(60, 10, 'Pozo: ' .$pozos, 0, 0, 'C');

$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(30, 6, 'Codigo Pozo', 0, 0, 'C', 1);
$pdf->Cell(20, 6, 'Tipo', 0, 0, 'C', 1);
$pdf->Cell(40, 6, 'Latidud', 0, 0, 'C', 1);
$pdf->Cell(40, 6, 'Longitud', 0, 0, 'C', 1);
$pdf->Cell(40, 6, 'Fecha creacion', 0, 0, 'C', 1);
$pdf->Cell(20, 6, 'Profundidad', 0, 0, 'C', 1);
$pdf->Cell(65, 6, 'Nombre Propietario', 0, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);

$pozo1 = mysqli_query($mysqli, "SELECT pz.codigopozo,pz.tipo,pz.latitud,pz.longitud,pz.fechacreacion,pz.profundidad,pr.nombre,pr.apellido
FROM pozos as pz
INNER JOIN propietariospozos as pr ON pr.id_propietario = pz.id_propietario
ORDER BY pz.id_pozo");
while ($row = $pozo1->fetch_assoc()) {
    $pdf->Cell(30, 6,$row['codigopozo'],0 , 0, 'C'); 
    $pdf->Cell(20, 6,$row['tipo'],0, 0, 'C');
    $pdf->Cell(40, 6,$row['latitud'], 0, 0, 'C');
    $pdf->Cell(40, 6,$row['longitud'],0 , 0, 'C');
     $pdf->Cell(40, 6,$row['fechacreacion'],0 , 0, 'C');
      $pdf->Cell(20, 6,$row['profundidad'],0 , 0, 'C');
       $pdf->Cell(65, 6,$row['nombre'].' '.$row['apellido'],0 , 1, 'C');
}
       }else{
            $pdf->Ln(30);
       $pdf->Cell(150, 6,'No hay datos almacenados', 0, 0, 'C'); 
       }
      // function Footer() {
        $pdf->SetY(-40);
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Cell(230, 5,'Fecha de impresion: '.date('d-m-Y'), 0, 1, 'C');
        $pdf->Cell(0, 5, 'Pagina ' . $pdf->PageNo() . '/{nb}', 0, 0, 'C');
        
    //}
$pdf->Output();
?>

