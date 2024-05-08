<?php

require(FCPATH.'fpdf/fpdf.php');

class PDF extends FPDF
{

function Header()
{

    $this->Ln(6);
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->Cell(90,10,$this->info_orden_compra->nb_empresa_vendedor,0,0,'L');

    $this->SetFont('Arial','B',15);
    //Título
    $this->Cell(90,10,'Orden de compra',0,0,'R');
    $this->Ln();

    $this->SetFont('Arial','',8);
    //Título
    $this->Cell(90,5,'Direccion:',0,0,'L');
    $this->Cell(90,5,'Nro '.$this->info_orden_compra->nu_codigo_orden_compra,0,1,'R');

     $this->MultiCell(100,4,utf8_decode($this->info_orden_compra->tx_direccion_vendedor),0);
     $this->MultiCell(100,4,'Email: '.$this->info_orden_compra->email_vendedor,0);
     $this->MultiCell(100,4,'Telefono: '.$this->info_orden_compra->phone_vendedor,0);
    //Salto de línea
    $this->Ln(5);
}

// Cabecera de página


// Tabla de informacion de cliente

function informacion_empresas()
   {
    //Cabecera

     $this->SetFont('Arial','B',10);

     $this->Cell(90,5,'Vendedor:',0,0,'L');
     $this->Cell(90,5,'Comprador:',0,0,'L');

     $this->Ln(5);
     $this->SetFont('Arial','',8);
     $this->Cell(90,5,$this->info_orden_compra->nb_empresa_vendedor,0,0,'L');
     $this->Cell(90,5,$this->info_orden_compra->nb_empresa_comprador,0,0,'L');

          $this->Ln(5);
     $this->SetFont('Arial','',8);
     $this->Cell(90,5,utf8_decode($this->info_orden_compra->tx_direccion_vendedor),0,0,'L');
     $this->Cell(90,5,utf8_decode($this->info_orden_compra->tx_direccion),0,0,'L');

          $this->Ln(5);
     $this->SetFont('Arial','',8);
     $this->Cell(90,5,utf8_decode($this->info_orden_compra->email_vendedor),0,0,'L');
     $this->Cell(90,5,utf8_decode($this->info_orden_compra->tx_email),0,0,'L');

    $this->Ln(5);
     $this->SetFont('Arial','',8);
     $this->Cell(90,5,utf8_decode($this->info_orden_compra->phone_vendedor),0,0,'L');
     $this->Cell(90,5,utf8_decode($this->info_orden_compra->phone),0,0,'L'); 


    $this->Ln(5);
     $this->SetFont('Arial','',8);
     $this->Cell(90,5,utf8_decode($this->info_orden_compra->nombre_vendedor.' '.$this->info_orden_compra->apellido_vendedor),0,0,'L');
     $this->Cell(90,5,utf8_decode($this->info_orden_compra->first_name.' '.$this->info_orden_compra->last_name),0,0,'L'); 
  

   }



// Better table
function ImprovedTable($info_presupuesto_detalle)
{
    // Column widths
    $header = array('CANTIDAD','DESCRIPCION', 'PRECIO', 'TOTAL '.$this->moneda_abr);

    $w = array(20, 90, 30, 40);
    // Header
    $this->SetFont('Arial','B',8);

            $y = $this->GetY();   
        $this->Line(20,$y,200,$y);  

    for($i=0;$i<count($header);$i++)

        if($i == 3 or $i == 2):

        $this->Cell($w[$i],7,$header[$i],0,0,'R');

         else:

            $this->Cell($w[$i],7,$header[$i],0,0,'C');

         endif;

                 $y = $this->GetY();   
        $this->Line(20,$y+6,200,$y+6);  


    $this->Ln();
    // Data

    $this->SetFont('Arial','',8);
    $con = 0;
    $subtotal = 0;
    $iva = 0;

    foreach($info_presupuesto_detalle->result() as $row)
    {   
        $con ++;


    $current_y = $this->GetY();
    $current_x = $this->GetX();
    $this->MultiCell(20,5,number_format($row->ca_unidades,0,',','.'),0,'C',0,0);
    $end_y = $this->GetY();

    $current_x = $current_x + 20;
    $this->SetXY($current_x, $current_y);
    $this->MultiCell(90,5,$row->nb_producto,0,'C',0,0);
    $end_y = ($this->GetY() > $end_y)?$this->GetY() : $end_y;

    $current_x = $current_x + 90;
    $this->SetXY($current_x, $current_y);
    $this->MultiCell(30,5,number_format($row->ca_precio,2,',','.'),0,'R',0,0);
    $end_y = ($this->GetY() > $end_y)?$this->GetY() : $end_y;

    $current_x = $current_x + 30;
    $this->SetXY($current_x, $current_y);
    $this->MultiCell(40,5,number_format($total_precio_renglon = $row->ca_unidades * $row->ca_precio,$this->nu_redondeo,',','.'),0,'R',0,0);
    $end_y = ($this->GetY() > $end_y)?$this->GetY() : $end_y;

    $this->SetY($end_y);


        $subtotal =+ $total_precio_renglon;

         if ($current_y > 200) {

            $this->AddPage();

             $this->SetFont('Arial','B',8);

            $y = $this->GetY();   
        $this->Line(20,$y,200,$y);  

    for($i=0;$i<count($header);$i++)

        if($i == 3 or $i == 2):

        $this->Cell($w[$i],7,$header[$i],0,0,'R');

         else:

            $this->Cell($w[$i],7,$header[$i],0,0,'C');

         endif;

                 $y = $this->GetY();   
        $this->Line(20,$y+6,200,$y+6);  

        $this->SetFont('Arial','',8);


    $this->Ln();

         }
    }

        $total_presupuesto = $subtotal + $iva;
    // Closing line
}





// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
        $subtotal = 0;

                foreach($this->detalle_orden_compra->result() as $row)
    {   
        $total_precio_renglon = $row->ca_unidades * $row->ca_precio;
        $subtotal += $total_precio_renglon;

    }


  
    //$this->Line(20,$y2=210,200,$y2=210);  

    $this->Line(20,$y2=220,200,$y2=220);


    //$this->SetY(-70);
    $this->SetY(-60);
    // Arial italic 8
        $this->SetX(130);
        $this->SetFont('Arial','B',10);  
        $this->Cell(30,10,"SUBTOTAL:",0,0,'R');
        $this->Cell(40,10,number_format($subtotal,$this->nu_redondeo,',','.').' '.$this->moneda_abr,0,0,'R');


    $this->ln(5);


        $total_presupuesto = $subtotal;

        $this->SetX(130);
        $this->SetFont('Arial','B',10);  
        $this->Cell(30,10,"TOTAL:",0,0,'R');
        $this->Cell(40,10,number_format($total_presupuesto,$this->nu_redondeo,',','.').' '.$this->moneda_abr,0,0,'R');

        $y = $this->GetY();   
        $this->Line(20,$y+10,200,$y+10); 


   // $this->SetY(-40);
    $this->SetY(-30);
    $this->SetFont('Arial','',8);

    $this->MultiCell(170,4,utf8_decode(''),0,'C');

    $this->SetFont('Arial','B',8);

    $this->MultiCell(170,4,utf8_decode('Orden de compra generada a traves de Rose Farmaceutica'),0,'C');

    $this->SetY(-15);
    // Arial itálica 8
    $this->SetFont('Arial','I',8);
    // Color del texto en gris
    $this->SetTextColor(128);

    $this->Cell(50,10,utf8_decode('Fecha de elaboracion: ').date("d-m-Y g:i:s a", $this->info_orden_compra->ff_fecha_elaboracion),0,0,'R');    
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo(),0,0,'R');


}

}



// variables de la planilla

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->SetTitle('ROSE - ORDEN DE COMPRA NRO: '.$info_orden_compra->nu_codigo_orden_compra);
$pdf->title = $info_orden_compra->nu_codigo_orden_compra;
$pdf->nb_estatus = $info_orden_compra->nb_estatus;
$pdf->detalle_orden_compra = $detalle_orden_compra;
$pdf->estatus = $info_orden_compra->nb_estatus;
$pdf->moneda_abr = $info_orden_compra->nb_acronimo;
$pdf->info_empresa = $info_empresa;
$pdf->info_orden_compra = $info_orden_compra;


$pdf->nu_redondeo = 2;


$pdf->vence = $info_orden_compra->ff_fecha_vencimiento;

$subtotal = 0;
$iva = 0;
$total_presupuesto = 0;

$pdf->AliasNbPages();

#Creamos el objeto pdf (con medidas en milímetros):

#Establecemos los márgenes izquierda, arriba y derecha:
$pdf->SetMargins(20, 10, 20, 25); 

//primera pagina

$pdf->AddPage();
$pdf->SetFont('Times','',8);
$año = date('Y');
$pdf->informacion_empresas();
$pdf->ln(10);
$pdf->ImprovedTable($detalle_orden_compra);




// IMPRIMIR
$pdf->Output('ROSE - ORDEN DE COMPRA NRO: '.$info_orden_compra->nu_codigo_orden_compra.'.pdf', 'I');


?>
