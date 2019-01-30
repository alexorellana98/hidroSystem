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
         $this->Cell(104,6, 'Informe de visitantes registrados', 0, 0, 'C');
         $this->Ln(10);
        
      
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
     function cabeceraHorizontal($cabecera)
    {
        $this->SetXY(30, 67);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(255, 255, 255);//Fondo verde de celda
        $this->SetTextColor(3, 3, 3); //Letra color blanco
        foreach($cabecera as $fila)
        {
 
            $this->CellFitSpace(40,7, utf8_decode($fila),1, 0 , 'L', true);
 
        }
    }
    function datosHorizontal($datos)
    {
        $this->SetXY(40,67);
        $this->SetFont('Arial','',10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = true; //Para alternar el relleno
        foreach($datos as $fila)
        {
            $this->Ln();//Salto de línea para generar otra fila
            //Usaremos CellFitSpace en lugar de Cell
            
            $this->CellFitSpace(40,7, utf8_decode($fila['dui']),1, 0 , 'L', $bandera );
            $this->CellFitSpace(40,7, utf8_decode($fila['nombre']),1, 0 , 'L', $bandera );
            $this->CellFitSpace(40,7, utf8_decode($fila['tipo']),1, 0 , 'L', $bandera );
            $this->CellFitSpace(40,7, utf8_decode($fila['genero']),1, 0 , 'L', $bandera );
            //$this->Ln();Salto de línea para generar otra fila
            //$bandera = !$bandera;Alterna el valor de la bandera
        }
    }
 
    function tablaHorizontal($cabeceraHorizontal, $datosHorizontal)
    {
        $this->cabeceraHorizontal($cabeceraHorizontal);
        $this->datosHorizontal($datosHorizontal);
    }
 
    //***** Aquí comienza código para ajustar texto *************
    //***********************************************************
    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);
 
        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;
 
        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }
 
        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);
 
        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }
 
    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }
 
    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }

    

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(190, 5,'Fecha de impresion: '.date('d-m-Y'), 0, 1, 'C');
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        
    }

}


//****************************fin de la plantilla encabezado.******************

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
////Para los grado
     
        $pdf->SetFont('Arial', 'B', 12);
         $validar = mysqli_query($mysqli, "SELECT nombre, dui , genero, tipo FROM `visitantes` GROUP BY tipo
ORDER BY
tipo ASC");
        
       if(mysqli_num_rows($validar)>0){ 
  $visitantes = mysqli_query($mysqli, "SELECT nombre, dui, genero, tipo FROM `visitantes` GROUP BY tipo
ORDER BY
tipo ASC");
  $miCabecera = array('DUI', 'Nombre', 'Genero', 'Tipo');
 
  while($row1 = mysqli_fetch_array($visitantes)) {
    $misDatos[] = array('dui' => $row1['dui'],'nombre' => $row1['nombre'],'genero' => $row1['genero'],'tipo' => $row1['tipo']
            );

}
 
$pdf->tablaHorizontal($miCabecera, $misDatos);

       }else{
            $pdf->Ln(30);
       $pdf->Cell(150, 6,'No hay datos almacenados', 0, 0, 'C'); 
       }
       
$pdf->Output();
?>

