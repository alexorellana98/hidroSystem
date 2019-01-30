<?php

require '../ProcesoSubir/conexion.php';
 


///********************plantilla encabezado******************
require '../fpdf/fpdf.php';

class PDF extends FPDF {

    function Header() {
        
        $this->Ln(10);
        $this->Image('../Imagenes/ceia.png', 235, 20, 40);
        $this->Image('../Imagenes/minerva.png',25, 15,25);
        //$this->Image('images/ayuda.PNG', 0,0,600,600);

        $this->SetFont('Arial', 'B', 15);
        $this->Cell(40, 6, '', 0, 0, 'C');
        $this->SetTextColor(0);
        $this->SetDrawColor(231, 169, 249);
        $this->SetLineWidth(1.5);
        $this->Cell(193, 6, 'Sistema Hidrometeorologico', 0, 0, 'C');
       
        $this->Ln(10);
         $this->SetFont('Arial', 'B', 15);
        $this->Cell(40, 6, '', 0, 0, 'C');
        $this->SetTextColor(0);
        $this->SetDrawColor(231, 169, 249);
        $this->SetLineWidth(1.5);
         $this->Cell(190,6, 'Informe de Observadores con Equipo asignado', 0, 0, 'C');
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
        $this->SetMargins(17, 25, 15);

#Establecemos el margen inferior: 
        $this->SetAutoPageBreak(true, 25);
        // Título
        // Salto de línea
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(190, 5,'Fecha de impresion: '.date('d-m-Y'), 0, 1, 'C');
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        
    }

}


//****************************fin de la plantilla encabezado.******************
//$reporte_grado = mysqli_query($conexion, "SELECT*FROM docente");
//
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
////Para los grado
     
        $pdf->SetFont('Arial', 'B', 12);
         $validar = mysqli_query($mysqli, "SELECT
observadores.nombre,
observadores.dui,
equipoobservador.fechaasigna,
equipos.nombre as nombreeq,
equipos.descripcion,
equipos.tipouso
FROM
observadores
INNER JOIN equipoobservador ON equipoobservador.idobservador = observadores.id_observador
INNER JOIN equipos ON equipoobservador.idequipo = equipos.idequipo
");
        
       if(mysqli_num_rows($validar)>0){ 
  $pozo = mysqli_query($mysqli, "SELECT
observadores.nombre,
observadores.dui,
equipoobservador.fechaasigna,
equipos.nombre as nombreeq,
equipos.descripcion,
equipos.tipouso
FROM
observadores
INNER JOIN equipoobservador ON equipoobservador.idobservador = observadores.id_observador
INNER JOIN equipos ON equipoobservador.idequipo = equipos.idequipo
");
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

$pdf->Cell(60, 6, 'Nombre Observador', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'DUI', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'Fecha Asignacion', 1, 0, 'C', 1);
$pdf->Cell(50, 6, 'Equipo', 1, 0, 'C', 1);
$pdf->Cell(50, 6, 'Descripcion', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Tipo Uso', 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 9);

$pozo1 = mysqli_query($mysqli, "SELECT
observadores.nombre,
observadores.dui,
equipoobservador.fechaasigna,
equipos.nombre as nombreeq,
equipos.descripcion,
equipos.tipouso
FROM
observadores
INNER JOIN equipoobservador ON equipoobservador.idobservador = observadores.id_observador
INNER JOIN equipos ON equipoobservador.idequipo = equipos.idequipo
");
while ($row = $pozo1->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['nombre'],1 , 0, 'C'); 
    $pdf->Cell(30, 6,$row['dui'], 1, 0, 'C');
    $pdf->Cell(40, 6,$row['fechaasigna'], 1, 0, 'C');
    $pdf->Cell(50, 6,$row['nombreeq'],1 , 0, 'C'); 
    $pdf->Cell(50, 6,$row['descripcion'], 1, 0, 'C');
    $pdf->Cell(30, 6,$row['tipouso'], 1, 1, 'C');
}
       }else{
            $pdf->Ln(30);
       $pdf->Cell(150, 6,'No hay datos almacenados', 0, 0, 'C'); 
       }
       
$pdf->Output();
?>

