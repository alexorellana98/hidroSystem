<?php

require '../ProcesoSubir/conexion.php';
 $po=$_GET['po'];
// $fecha=$_GET['f'];
//   $x=explode("-",$fecha);
//  $mes1=$x[0];
//   $a=$x[1];
 


///********************plantilla encabezado******************
require '../fpdf/fpdf.php';

class PDF extends FPDF {

    function Header() {
        
        $this->Ln(10);
        $this->Image('../Imagenes/ceia.png',120, 20, 40);
        $this->Image('../Imagenes/minerva.png',25, 15,25);
        //$this->Image('images/ayuda.PNG', 0,0,600,600);

        $this->SetFont('Arial', 'B', 15);
        $this->Cell(40, 6, '', 0, 0, 'C');
        $this->SetTextColor(0);
        //$this->SetDrawColor(231, 169, 249);
        $this->SetLineWidth(1.5);
        $this->Cell(104, 6, 'Sistema Hidrometeorologico', 0, 0, 'C');
       
        $this->Ln(10);
         $this->SetFont('Arial', 'B', 15);
        $this->Cell(40, 6, '', 0, 0, 'C');
        $this->SetTextColor(0);
       // $this->SetDrawColor(231, 169, 249);
        $this->SetLineWidth(1.5);
         $this->Cell(104,6, 'Informe de observaciones y ', 0, 0, 'C');
         $this->Ln(10);
         $this->SetFont('Arial', 'B', 15);
        $this->Cell(40, 6, '', 0, 0, 'C');
        $this->SetTextColor(0);
        //$this->SetDrawColor(231, 169, 249);
        $this->SetLineWidth(1.5);
         $this->Cell(104,6, 'estados de los pozos', 0, 0, 'C');
      
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
$pdf = new FPDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
////Para los grado
     //titulo encabezado porque arriba no funciona por ser vertical
        $pdf->SetFont('Arial', 'B', 12);
        
        $pdf->Ln(10);
        $pdf->Image('../Imagenes/ceia.png',180, 20, 40);
        $pdf->Image('../Imagenes/minerva.png',70, 15,25);
        $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(40, 6, '', 0, 0, 'C');
        $pdf->SetTextColor(0);
       // $pdf->SetDrawColor(231, 169, 249);
        $pdf->SetLineWidth(1);
        $pdf->Cell(180, 6, 'Sistema Hidrometeorologico', 0, 0, 'C');
       
        $pdf->Ln(10);
         $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(40, 6, '', 0, 0, 'C');
        $pdf->SetTextColor(0);
        //$pdf->SetDrawColor(231, 169, 249);
        $pdf->SetLineWidth(1);
         $pdf->Cell(180,6, 'Informe de observaciones y ', 0, 0, 'C');
         $pdf->Ln(10);
         $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(40, 6, '', 0, 0, 'C');
        $pdf->SetTextColor(0);
        //$pdf->SetDrawColor(231, 169, 249);
        $pdf->SetLineWidth(1);
         $pdf->Cell(180,6, 'estados de los pozos', 0, 0, 'C');
      
       $pdf->Ln(20);
  $validar = mysqli_query($mysqli, "SELECT
m.nombre,
p.codigopozo,
p.tipo,
p.fechacreacion,
p.geologia,
p.observacion,
p.estado
FROM
pozos p
INNER JOIN municipios m ON m.idmunicipio=p.id_municipio WHERE m.idmunicipio=$po

ORDER BY
m.idmunicipio ASC");
  
   if(mysqli_num_rows($validar)>0){ 
   while ($row1 = mysqli_fetch_array($validar)) {
    $esta=$row1['nombre'];
}
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(70, 10, 'Municipio: ' .$esta, 0, 0, 'C');

$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(40, 6, 'Municipio',                 0, 0, 'C', 1);
$pdf->Cell(20, 6, 'Pozo '                    , 0, 0, 'C', 1);
$pdf->Cell(30, 6, 'Tipo de pozo',              0, 0, 'C', 1);
$pdf->Cell(60,6, 'Fecha de creacion de pozo ', 0, 0, 'C', 1);
$pdf->Cell(20, 6, 'Geologia',                   0, 0, 'C', 1);
$pdf->Cell(90, 6, 'Observacion ',               0, 0, 'C', 1);
$pdf->Cell(20, 6, 'Estado',                     0, 1, 'C', 1);



$pdf->SetFont('Arial', '', 10);

$pozo1 = mysqli_query($mysqli, "SELECT
m.nombre,
p.codigopozo,
p.tipo,
p.fechacreacion,
p.geologia,
p.observacion,
p.estado
FROM
pozos p
INNER JOIN municipios m ON m.idmunicipio=p.id_municipio WHERE m.idmunicipio=$po

ORDER BY
m.idmunicipio ASC");




while ($row = $pozo1->fetch_assoc()) {
    $pdf->Cell(40, 6,$row['nombre'],     0, 0, 'C'); 
    $pdf->Cell(20, 6,$row['codigopozo'], 0, 0, 'C');
    $pdf->Cell(30, 6,$row['tipo'],       0 , 0, 'C'); 
    $pdf->Cell(60, 6,$row['fechacreacion'], 0, 0, 'C');
    $pdf->Cell(20, 6,$row['geologia'],0, 0, 'C'); 
    $pdf->Cell(90, 6,$row['observacion'], 0, 0, 'C');
    $pdf->Cell(20, 6,$row['estado'],0, 1, 'C'); 
    
    ;
}
}else{
            $pdf->Ln(30);
       $pdf->Cell(150, 6,'No hay datos almacenados', 0, 0, 'C'); 
       }
$pdf->Output();
?>

