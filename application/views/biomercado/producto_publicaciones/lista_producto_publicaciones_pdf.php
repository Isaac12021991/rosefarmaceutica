<?php

require(FCPATH.'fpdf/fpdf.php');

class PDF extends FPDF
{

function Header()
{

    $this->Ln(5);
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->Cell(90,10,$this->info_empresa_personal->nb_empresa,0,0,'L');
    $this->Ln(5);
    $this->SetFont('Arial','I',10);
    $this->Cell(90,10,$this->info_empresa_personal->nu_rif,0,0,'L');
    $this->Ln(5);
    $this->SetFont('Arial','',10);
    $this->Cell(90,10,'Lista de precio',0,0,'L');

    //Salto de línea
    $this->Ln(5);
}

// Cabecera de página


// Tabla de informacion de cliente


// Better table
function ImprovedTable($listado_producto_publicaciones)
{
    // Column widths
    $header = array('NRO','PRODUCTO', 'DESCRIPCION', 'PRECIO');

    $w = array(20, 30, 90, 40);
    // Header
    $this->SetFont('Arial','B',8);

            $y = $this->GetY();   
        $this->Line(20,$y,200,$y);  

    for($i=0;$i<count($header);$i++)

        if($i == 0 or $i == 2 or $i == 1):

        $this->Cell($w[$i],7,$header[$i],0,0,'L');

         else:

        $this->Cell($w[$i],7,$header[$i],0,0,'R');

         endif;

                 $y = $this->GetY();   
        $this->Line(20,$y+6,200,$y+6);  


    $this->Ln();
    // Data

    $this->SetFont('Arial','',8);
    $con = 0;
    $subtotal = 0;
    $iva = 0;

    foreach($listado_producto_publicaciones->result() as $row)
    {   
        $con ++;


    $current_y = $this->GetY();
    $current_x = $this->GetX();
    $this->MultiCell(20,5,number_format($con,0,',','.'),0,'C',0,0);
    $end_y = $this->GetY();

    $current_x = $current_x + 20;
    $this->SetXY($current_x, $current_y);
    $this->MultiCell(30,5,$row->nb_producto,0,'L',0,0);
    $end_y = ($this->GetY() > $end_y)?$this->GetY() : $end_y;

    $current_x = $current_x + 30;
    $this->SetXY($current_x, $current_y);
    $this->MultiCell(90,5,$row->tx_descripcion,0,'L',0,0);
    $end_y = ($this->GetY() > $end_y)?$this->GetY() : $end_y;

    $current_x = $current_x + 90;
    $this->SetXY($current_x, $current_y);
    $this->MultiCell(40,5,number_format($row->ca_precio, $row->nu_redondeo,',','.').' '.$row->nb_acronimo,0,'R',0,0);
    $end_y = ($this->GetY() > $end_y)?$this->GetY() : $end_y;



    $this->SetY($end_y);

            //$this->Line(20,$end_y,200,$end_y); 



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

    // Closing line
}





// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $subtotal = 0;


    $this->SetY(-15);
    // Arial itálica 8
    $this->SetFont('Arial','I',8);
    // Color del texto en gris
    $this->SetTextColor(128);

    $this->MultiCell(180,0,utf8_decode('Lista de precio generada a traves de Rose Farmaceutica'),0,'L');
    $this->Cell(50,10,utf8_decode('Generado el: ').date("d-m-Y g:i:s a"),0,0,'R');    
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo(),0,0,'R');


}

}



// variables de la planilla

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->SetTitle('ROSE - LISTA DE PRECIO '.$info_empresa_personal->nb_empresa);
$pdf->title = 'LISTA DE PRECIO '.$info_empresa_personal->nb_empresa;
$pdf->info_empresa = $info_empresa;
$pdf->info_empresa_personal = $info_empresa_personal;


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
$pdf->ln(10);
$pdf->ImprovedTable($listado_producto_publicaciones);




// IMPRIMIR
$pdf->Output('ROSE - LISTA DE PRECIO '.$info_empresa_personal->nb_empresa.'.pdf', 'I');


?>
