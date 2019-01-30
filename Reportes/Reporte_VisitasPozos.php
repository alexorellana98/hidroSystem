<?php

require '../ProcesoSubir/conexion.php';
 $f1=$_GET['fe1'];
 $f2=$_GET['fe2'];
 


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
$pdf = new FPDF('L','mm','A4');
//$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
////Para los grado
 $pdf->Ln(10);
       $pdf->Image('../Imagenes/ceia.png', 180, 20, 40);
        $pdf->Image('../Imagenes/minerva.png',70, 15,25);
        //$this->Image('images/ayuda.PNG', 0,0,600,600);

        $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(40, 6, '', 0, 0, 'C');
        //$pdf->SetTextColor(0);
        
        $pdf->SetLineWidth(1.5);
        $pdf->Cell(180, 6, 'Sistema Hidrometeorologico', 0, 0, 'C');
       
        $pdf->Ln(10);
         $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(40, 6, '', 0, 0, 'C');
       // $pdf->SetTextColor(0);
        
        $pdf->SetLineWidth(1.5);
         $pdf->Cell(180,6, 'Informe de visitas efectuadas', 0, 0, 'C');
         $pdf->Ln(10);
         $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(40, 6, '', 0, 0, 'C');
        //$pdf->SetTextColor(0);
        
        $pdf->SetLineWidth(1.5);
         $pdf->Cell(180,6, 'a pozos', 0, 0, 'C');
      
        // Ancho del borde (1 mm)
        $pdf->SetLineWidth(1);
        #Establecemos los márgenes izquierda, arriba y derecha: 
        $pdf->SetMargins(15, 25, 15);
        //#######################################
     
        $pdf->SetFont('Arial', 'B', 12);
         $pdf->Ln(15);
        $validacion= mysqli_query($mysqli,"SELECT visitantes.tipo as tipo, visitantes.nombre as nombre, pozos.codigopozo as pozo, hojavisitaspozos.fechavisita as fecha, hojavisitaspozos.observacion as observacion, hojavisitaspozos.level as nivel, municipios.nombre as municipio FROM hidrodb.hojavisitaspozos INNER JOIN pozos ON hojavisitaspozos.id_pozo = pozos.id_pozo INNER JOIN visitantes ON hojavisitaspozos.id_visitante = visitantes.id_visitante inner join municipios on pozos.id_municipio=municipios.idmunicipio WHERE hojavisitaspozos.fechavisita>='$f1' AND hojavisitaspozos.fechavisita<='$f2'  ORDER BY hojavisitaspozos.fechavisita ASC");

if(mysqli_num_rows($validacion)>0){ 
      
  
$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);

$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(30, 6, 'Fecha', 0, 0, 'C', 1);
$pdf->Cell(30, 6, 'Tipo', 0, 0, 'C', 1);
$pdf->Cell(60, 6, 'Nombre', 0, 0, 'C', 1);
$pdf->Cell(30, 6, 'Pozo', 0, 0, 'C', 1);
$pdf->Cell(100, 6, 'Observacion', 0, 0, 'C', 1);

$pdf->Cell(20, 6, 'Nivel', 0, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->SetFillColor(255,255,255);
$pozo1 = mysqli_query($mysqli, "SELECT visitantes.tipo as tipo, visitantes.nombre as nombre, pozos.codigopozo as pozo, hojavisitaspozos.fechavisita as fecha, hojavisitaspozos.observacion as observacion, hojavisitaspozos.level as nivel, municipios.nombre as municipio FROM hidrodb.hojavisitaspozos INNER JOIN pozos ON hojavisitaspozos.id_pozo = pozos.id_pozo INNER JOIN visitantes ON hojavisitaspozos.id_visitante = visitantes.id_visitante inner join municipios on pozos.id_municipio=municipios.idmunicipio WHERE   hojavisitaspozos.fechavisita>='$f1' AND hojavisitaspozos.fechavisita<='$f2'  ORDER BY hojavisitaspozos.fechavisita ASC");
while ($row = $pozo1->fetch_assoc()) {
    
    $pdf->Cell(30, 6, $row['fecha'], 0, 0, 'C', 1);
    $pdf->Cell(30, 6, $row['tipo'], 0, 0, 'C', 1);
    $pdf->Cell(60, 6, $row['nombre'], 0, 0, 'C', 1);
    $pdf->Cell(30, 6, $row['pozo'], 0, 0, 'C', 1);
    $pdf->Cell(100, 6, $row['observacion'], 0, 0, 'C', 1);

    $pdf->Cell(20, 6, $row['nivel'], 0, 1, 'C', 1);
    ;
}
       } else {
           $pdf->Ln(30);
       $pdf->Cell(150, 6,'No hay datos almacenados', 0, 0, 'C');    
}
$pdf->Output();
?>
30