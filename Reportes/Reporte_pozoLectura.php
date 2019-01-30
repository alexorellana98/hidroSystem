<?php

require '../ProcesoSubir/conexion.php';
 $fe1=$_GET['fe1'];
 $fe2=$_GET['fe2'];
 $pos=$_GET['p'];
 


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
         $this->Cell(104,6, 'Informe de nivel de pozo', 0, 0, 'C');
         $this->Ln(10);
         $this->SetFont('Arial', 'B', 15);
        $this->Cell(40, 6, '', 0, 0, 'C');
        $this->SetTextColor(0);
        $this->SetDrawColor(231, 169, 249);
        $this->SetLineWidth(1.5);
         $this->Cell(104,6, 'Segun Lecturas', 0, 0, 'C');
      
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
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
////Para los grado
     
        $pdf->SetFont('Arial', 'B', 12);
        $validacion= mysqli_query($mysqli,"SELECT
p.codigopozo,
l.date,
m.nombre,
Avg(l.level) AS promlevel
FROM
pozos p
INNER JOIN lecturapozos l ON l.id_pozo = p.id_pozo
INNER JOIN municipios m ON p.id_municipio = m.idmunicipio
WHERE
l.date>='$fe1' AND
l.date<='$fe2' AND p.id_pozo='$pos'
GROUP BY
p.codigopozo,
l.date,
m.nombre
ORDER BY
l.date ASC");
       if(mysqli_num_rows($validacion)>0){ 
        
  $pozo = mysqli_query($mysqli, "SELECT
p.codigopozo,
l.date,
m.nombre,
Avg(l.level) AS promlevel
FROM
pozos p
INNER JOIN lecturapozos l ON l.id_pozo = p.id_pozo
INNER JOIN municipios m ON p.id_municipio = m.idmunicipio
WHERE
l.date>='$fe1' AND
l.date<='$fe2' AND p.id_pozo='$pos'
GROUP BY
p.codigopozo,
l.date,
m.nombre
ORDER BY
l.date ASC");
   while ($row1 = mysqli_fetch_array($pozo)) {
    $esta=$row1['codigopozo'];
    $muni=$row1['nombre'];
}
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 10, 'Municipio: ' .$muni, 0, 0, 'C');
$pdf->Cell(70, 10, 'Pozo: ' .$esta, 0, 0, 'C');

$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Fecha', 1, 0, 'C', 1);

$pdf->Cell(70, 6, 'Nivel', 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 10);

$pozo1 = mysqli_query($mysqli, "SELECT
p.codigopozo,
l.date,
m.nombre,
Avg(l.level) AS promlevel
FROM
pozos p
INNER JOIN lecturapozos l ON l.id_pozo = p.id_pozo
INNER JOIN municipios m ON p.id_municipio = m.idmunicipio
WHERE
l.date>='$fe1' AND
l.date<='$fe2' AND p.id_pozo='$pos'
GROUP BY
p.codigopozo,
l.date,
m.nombre
ORDER BY
l.date ASC");
while ($row = $pozo1->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['date'], 1, 0, 'C'); 
    $pdf->Cell(70, 6,$row['promlevel'], 1, 1, 'C');
    ;
}
       } else {
           $pdf->Ln(30);
       $pdf->Cell(150, 6,'No hay datos almacenados', 0, 0, 'C');    
}
$pdf->Output();
?>

