<?php

require '../conexion/conexion.php';



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
         $this->Cell(104,6, 'Informe de Pozos por departamento', 0, 0, 'C');
         $this->Ln(10);
         $this->SetFont('Arial', 'B', 15);
        $this->Cell(40, 6, '', 0, 0, 'C');
        $this->SetTextColor(0);
        $this->SetDrawColor(231, 169, 249);
        $this->SetLineWidth(1.5);
//$this->Cell(104,6, 'Segun visitas efectuadas', 0, 0, 'C');
      
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
 
 $sonsonate= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='SONSONATE'
ORDER BY
d.iddepto ASC");

if(mysqli_num_rows($sonsonate)>0){



$tempe= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='SONSONATE'
ORDER BY
d.iddepto ASC
");

while ($row1 = mysqli_fetch_array($tempe)) {
    $esta=$row1['nombredepto'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Municipio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Pozo', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'Propietario ', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);


$fech = mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='SONSONATE'
ORDER BY
d.iddepto ASC
");



//$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
while ($row = $fech->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['nombre'],1 , 0, 'C');
     $pdf->Cell(30, 6,$row['codigopozo'],1 , 0, 'C'); 
    $pdf->Cell(70, 6,$row['nom'], 1, 1, 'C');
    ;
}
$pdf->Ln(10);
}//FIN SONSONATE

// SAN VICENTE
$sanvi= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='SAN VICENTE'
ORDER BY
d.iddepto ASC");

    if(mysqli_num_rows($sanvi)>0){



$tempe= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='SAN VICENTE'
ORDER BY
d.iddepto ASC
");

while ($row1 = mysqli_fetch_array($tempe)) {
    $esta=$row1['nombredepto'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Municipio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Pozo', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'Propietario ', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);


$fech = mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='SAN VICENTE'
ORDER BY
d.iddepto ASC
");



//$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
while ($row = $fech->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['nombre'],1 , 0, 'C');
     $pdf->Cell(30, 6,$row['codigopozo'],1 , 0, 'C'); 
    $pdf->Cell(70, 6,$row['nom'], 1, 1, 'C');
    ;
}
$pdf->Ln(10);
}//FIN SAN VICENTE

// LA PAZ
$lapaz= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='LA PAZ'
ORDER BY
d.iddepto ASC");

    if(mysqli_num_rows($lapaz)>0){



$tempe= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='LA PAZ'
ORDER BY
d.iddepto ASC
");

while ($row1 = mysqli_fetch_array($tempe)) {
    $esta=$row1['nombredepto'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Municipio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Pozo', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'Propietario ', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);


$fech = mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='LA PAZ'
ORDER BY
d.iddepto ASC
");



//$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
while ($row = $fech->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['nombre'],1 , 0, 'C');
     $pdf->Cell(30, 6,$row['codigopozo'],1 , 0, 'C'); 
    $pdf->Cell(70, 6,$row['nom'], 1, 1, 'C');
    ;
}
$pdf->Ln(10);
}//FIN LA PAZ



// CHALATENANGO
$chalatenango= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='CHALATENANGO'
ORDER BY
d.iddepto ASC");

    if(mysqli_num_rows($chalatenango)>0){



$tempe= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='CHALATENANGO'
ORDER BY
d.iddepto ASC
");

while ($row1 = mysqli_fetch_array($tempe)) {
    $esta=$row1['nombredepto'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Municipio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Pozo', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'Propietario ', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);


$fech = mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='CHALATENANGO'
ORDER BY
d.iddepto ASC
");



//$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
while ($row = $fech->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['nombre'],1 , 0, 'C');
     $pdf->Cell(30, 6,$row['codigopozo'],1 , 0, 'C'); 
    $pdf->Cell(70, 6,$row['nom'], 1, 1, 'C');
    ;
}
$pdf->Ln(10);
}//FIN CHALATENANGO



// SANTA ANA
$santana= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='SANTA ANA'
ORDER BY
d.iddepto ASC");

    if(mysqli_num_rows($santana)>0){



$tempe= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='SANTA ANA'
ORDER BY
d.iddepto ASC
");

while ($row1 = mysqli_fetch_array($tempe)) {
    $esta=$row1['nombredepto'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Municipio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Pozo', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'Propietario ', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);


$fech = mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='SANTA ANA'
ORDER BY
d.iddepto ASC
");



//$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
while ($row = $fech->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['nombre'],1 , 0, 'C');
     $pdf->Cell(30, 6,$row['codigopozo'],1 , 0, 'C'); 
    $pdf->Cell(70, 6,$row['nom'], 1, 1, 'C');
    ;
}
$pdf->Ln(10);
}//FIN SANTA ANA




// AHUACHAPAN
$ahuachapan= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='AHUACHAPAN'
ORDER BY
d.iddepto ASC");

    if(mysqli_num_rows($ahuachapan)>0){



$tempe= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='AHUACHAPAN'
ORDER BY
d.iddepto ASC
");

while ($row1 = mysqli_fetch_array($tempe)) {
    $esta=$row1['nombredepto'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Municipio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Pozo', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'Propietario ', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);


$fech = mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='AHUACHAPAN'
ORDER BY
d.iddepto ASC
");



//$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
while ($row = $fech->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['nombre'],1 , 0, 'C');
     $pdf->Cell(30, 6,$row['codigopozo'],1 , 0, 'C'); 
    $pdf->Cell(70, 6,$row['nom'], 1, 1, 'C');
    ;
}
$pdf->Ln(10);
}//FIN AHUACHAPAN




// LA LIBERTAD
$lalibertad= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='LA LIBERTAD'
ORDER BY
d.iddepto ASC");

    if(mysqli_num_rows($lalibertad)>0){



$tempe= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='LA LIBERTAD'
ORDER BY
d.iddepto ASC
");

while ($row1 = mysqli_fetch_array($tempe)) {
    $esta=$row1['nombredepto'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Municipio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Pozo', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'Propietario ', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);


$fech = mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='LA LIBERTAD'
ORDER BY
d.iddepto ASC
");



//$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
while ($row = $fech->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['nombre'],1 , 0, 'C');
     $pdf->Cell(30, 6,$row['codigopozo'],1 , 0, 'C'); 
    $pdf->Cell(70, 6,$row['nom'], 1, 1, 'C');
    ;
}
$pdf->Ln(10);
}//FIN LA LIBERTAD



// SAN SALVADOR
$sansalvador= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='SAN SALVADOR'
ORDER BY
d.iddepto ASC");

    if(mysqli_num_rows($sansalvador)>0){



$tempe= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='SAN SALVADOR'
ORDER BY
d.iddepto ASC
");

while ($row1 = mysqli_fetch_array($tempe)) {
    $esta=$row1['nombredepto'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Municipio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Pozo', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'Propietario ', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);


$fech = mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='SAN SALVADOR'
ORDER BY
d.iddepto ASC
");



//$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
while ($row = $fech->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['nombre'],1 , 0, 'C');
     $pdf->Cell(30, 6,$row['codigopozo'],1 , 0, 'C'); 
    $pdf->Cell(70, 6,$row['nom'], 1, 1, 'C');
    ;
}
$pdf->Ln(10);
}//FIN SAN SALVADOR


// CABAÑAS
$cabañas= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='CABAÑAS'
ORDER BY
d.iddepto ASC");

    if(mysqli_num_rows($cabañas)>0){



$tempe= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='CABAÑAS'
ORDER BY
d.iddepto ASC
");

while ($row1 = mysqli_fetch_array($tempe)) {
    $esta=$row1['nombredepto'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Municipio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Pozo', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'Propietario ', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);


$fech = mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='CABAÑAS'
ORDER BY
d.iddepto ASC
");



//$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
while ($row = $fech->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['nombre'],1 , 0, 'C');
     $pdf->Cell(30, 6,$row['codigopozo'],1 , 0, 'C'); 
    $pdf->Cell(70, 6,$row['nom'], 1, 1, 'C');
    ;
}
$pdf->Ln(10);
}//FIN CABAÑAS





// CUSCATLAN
$cuscatlan= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='CUSCATLAN'
ORDER BY
d.iddepto ASC");

    if(mysqli_num_rows($cuscatlan)>0){



$tempe= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='CUSCATLAN'
ORDER BY
d.iddepto ASC
");

while ($row1 = mysqli_fetch_array($tempe)) {
    $esta=$row1['nombredepto'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Municipio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Pozo', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'Propietario ', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);


$fech = mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom,
pr.apellido
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='CUSCATLAN'
ORDER BY
d.iddepto ASC
");



//$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
while ($row = $fech->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['nombre'],1 , 0, 'C');
     $pdf->Cell(30, 6,$row['codigopozo'],1 , 0, 'C'); 
     $pdf->Cell(70, 6,$row['nom'], 1, 1, 'C');
    ;
}
$pdf->Ln(10);
}//FIN CUSCATLAN





// USULUTAN
$usulutan= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='USULUTAN'
ORDER BY
d.iddepto ASC");

    if(mysqli_num_rows($usulutan)>0){



$tempe= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='USULUTAN'
ORDER BY
d.iddepto ASC
");

while ($row1 = mysqli_fetch_array($tempe)) {
    $esta=$row1['nombredepto'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Municipio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Pozo', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'Propietario ', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);


$fech = mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='USULUTAN'
ORDER BY
d.iddepto ASC
");



//$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
while ($row = $fech->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['nombre'],1 , 0, 'C');
     $pdf->Cell(30, 6,$row['codigopozo'],1 , 0, 'C'); 
    $pdf->Cell(70, 6,$row['nom'], 1, 1, 'C');
    ;
}
$pdf->Ln(10);
}//FIN USULUTAN





// SAN MIGUEL
$sanmiguel= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='SAN MIGUEL'
ORDER BY
d.iddepto ASC");

    if(mysqli_num_rows($sanmiguel)>0){



$tempe= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='SAN MIGUEL'
ORDER BY
d.iddepto ASC
");

while ($row1 = mysqli_fetch_array($tempe)) {
    $esta=$row1['nombredepto'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Municipio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Pozo', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'Propietario ', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);


$fech = mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='SAN MIGUEL'
ORDER BY
d.iddepto ASC
");



//$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
while ($row = $fech->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['nombre'],1 , 0, 'C');
     $pdf->Cell(30, 6,$row['codigopozo'],1 , 0, 'C'); 
    $pdf->Cell(70, 6,$row['nom'], 1, 1, 'C');
    ;
}
$pdf->Ln(10);
}//FIN SAN MIGUEL




// MORAZAN
$morazan= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='MORAZAN'
ORDER BY
d.iddepto ASC");

    if(mysqli_num_rows($morazan)>0){



$tempe= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='MORAZAN'
ORDER BY
d.iddepto ASC
");

while ($row1 = mysqli_fetch_array($tempe)) {
    $esta=$row1['nombredepto'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Municipio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Pozo', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'Propietario ', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);


$fech = mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='MORAZAN'
ORDER BY
d.iddepto ASC
");



//$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
while ($row = $fech->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['nombre'],1 , 0, 'C');
     $pdf->Cell(30, 6,$row['codigopozo'],1 , 0, 'C'); 
    $pdf->Cell(70, 6,$row['nom'], 1, 1, 'C');
    ;
}
$pdf->Ln(10);
}//FIN MORAZAN



// LA UNION
$launion= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='LA UNION'
ORDER BY
d.iddepto ASC");

    if(mysqli_num_rows($launion)>0){



$tempe= mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='LA UNION'
ORDER BY
d.iddepto ASC
");

while ($row1 = mysqli_fetch_array($tempe)) {
    $esta=$row1['nombredepto'];
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Municipio', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Pozo', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'Propietario ', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);


$fech = mysqli_query($conexion, "SELECT
d.nombredepto,
m.nombre,
p.codigopozo,
pr.nom
FROM
departamentos d
INNER JOIN municipios m ON m.iddepto = d.iddepto
INNER JOIN pozos p ON p.id_municipio = m.idmunicipio
INNER JOIN propietariospozos pr ON p.id_propietario = pr.id_propietario
WHERE d.nombredepto='LA UNION'
ORDER BY
d.iddepto ASC
");



//$pdf->Cell(70, 10, 'Departamento: ' .$esta, 0, 0, 'C');
while ($row = $fech->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['nombre'],1 , 0, 'C');
     $pdf->Cell(30, 6,$row['codigopozo'],1 , 0, 'C'); 
    $pdf->Cell(70, 6,$row['nom'], 1, 1, 'C');
    ;
}
$pdf->Ln(10);
}//FIN MORAZAN


$pdf->Output();
?>

