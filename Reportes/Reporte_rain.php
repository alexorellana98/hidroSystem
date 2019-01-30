<?php

require '../ProcesoSubir/conexion.php';
 $fecha=$_GET['fe'];
 $ESTa=$_GET['E'];
  $x=explode("-",$fecha);
  $mes1=$x[0];
   $a=$x[1];


///********************plantilla encabezado******************
require '../fpdf/fpdf.php';

class PDF extends FPDF {

    function Header() {
        $fecha=$_GET['fe'];
        $x=explode("-",$fecha);
        if($x[0]=='01'){
            $mes="Enero";
        }
        if($x[0]=='02'){
            $mes="Febrero";
        }
        if($x[0]=='03'){
            $mes="Marzo";
        }
        if($x[0]=='04'){
            $mes="Abril";
        }
        if($x[0]=='05'){
            $mes="Mayo";
        }
        if($x[0]=='06'){
            $mes="Junio";
        }
        if($x[0]=='07'){
            $mes="Julio";
        }
        if($x[0]=='08'){
            $mes="Agosto";
        }
        if($x[0]=='09'){
            $mes="Septiembre";
        }
        if($x[0]=='10'){
            $mes="Octubre";
        }
        if($x[0]=='11'){
            $mes="Noviembre";
        }
        if($x[0]=='12'){
            $mes="Diciembre";
        }
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
         $this->Cell(104,6, 'Informe de Rain Rate promedio', 0, 0, 'C');
         $this->Ln(10);
         $this->SetFont('Arial', 'B', 15);
        $this->Cell(40, 6, '', 0, 0, 'C');
        $this->SetTextColor(0);
        $this->SetDrawColor(231, 169, 249);
        $this->SetLineWidth(1.5);
         $this->Cell(104,6, 'Correspondiente a '.$mes.' '.$x[1], 0, 0, 'C');
      
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
        //vamos a validar 
        $vali = mysqli_query($mysqli, "SELECT
e.codiogestacion,
l.date,
avg(l.rainrate) as promrainrate
FROM estacionmet e
INNER JOIN lecturaestaciones l ON l.idestacion = e.id_estacion
where EXTRACT(MONTH FROM l.date)='$mes1'  AND EXTRACT(YEAR FROM l.date)='$a' AND e.id_estacion='$ESTa'
GROUP BY e.codiogestacion, l.date
ORDER BY l.date");
        if(mysqli_num_rows($vali)>0){
        
  $estacion = mysqli_query($mysqli, "SELECT
e.codiogestacion,
l.date,
avg(l.rainrate) as promrainrate
FROM estacionmet e
INNER JOIN lecturaestaciones l ON l.idestacion = e.id_estacion
where EXTRACT(MONTH FROM l.date)='$mes1'  AND EXTRACT(YEAR FROM l.date)='$a' AND e.id_estacion='$ESTa'
GROUP BY e.codiogestacion, l.date
ORDER BY l.date");
   while ($row1 = mysqli_fetch_array($estacion)) {
    $esta=$row1['codiogestacion'];
}
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(100, 10, 'Estacion : ' .$esta, 0, 0, 'C');

$pdf->Ln(10);
$pdf->SetFillColor(116,177,189);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Fecha', 1, 0, 'C', 1);

$pdf->Cell(70, 6, 'Pomedio', 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 10);

$estacion1 = mysqli_query($mysqli, "SELECT
e.codiogestacion,
l.date,
avg(l.rainrate) as promrainrate
FROM estacionmet e
INNER JOIN lecturaestaciones l ON l.idestacion = e.id_estacion
where EXTRACT(MONTH FROM l.date)='$mes1'  AND EXTRACT(YEAR FROM l.date)='$a' AND e.id_estacion='$ESTa'
GROUP BY e.codiogestacion, l.date
ORDER BY l.date");
while ($row = $estacion1->fetch_assoc()) {
    $pdf->Cell(60, 6,$row['date'], 1, 0, 'C'); 
    $pdf->Cell(70, 6,$row['promrainrate'], 1, 1, 'C');
    ;
}
        }else{
             $pdf->Ln(30);
       $pdf->Cell(150, 6,'No hay datos almacenados', 0, 0, 'C'); 
        }
$pdf->Output();
?>

