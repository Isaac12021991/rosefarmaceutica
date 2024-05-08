<?php

require(FCPATH.'fpdf/fpdf.php');

class PDF extends FPDF
{

var $logo_vp;

function Header()
{


    $this->Ln(20);

    $this->logo_vp = base_url('img/Drogueria_sofimed.png');
    // Logos
    $this->Image($this->logo_vp,15,18,50,20); 
    // Arial bold 15
    $this->SetFont('Arial','B',12);  

    $this->SetX(120); 
    $this->Cell(0,4,'PRESUPUESTO: '.$this->title,0,1,'R');  
    
    $this->Ln(4);
}

// Cabecera de página


// Better table
function ImprovedTable($info_presupuesto_detalle)
{
    // Column widths
    $header = array('CANTIDAD','DESCRIPCION', 'LOTE', 'PRECIO', 'TOTAL');

    $w = array(20, 80, 20, 20, 30);
    // Header
    $this->SetFont('Arial','B',10);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data

    $this->SetFont('Arial','',8);
    $con = 0;
    $subtotal = 0;
    $iva = 0;
    foreach($info_presupuesto_detalle->result() as $row)
    {   
        $con ++;

        $this->Cell($w[0],4,number_format($row->nu_unidades,0,',','.'),'LR',0,'C');
        $this->Cell($w[1],4,$row->nb_producto,'LR',0,'C');
        $this->Cell($w[2],4,$row->nu_lote,'LR',0,'C');
        $this->Cell($w[3],4,number_format($row->nu_precio,2,',','.'),'LR',0,'C');
        $this->Cell($w[4],4,number_format($total_precio_renglon = $row->nu_unidades * $row->nu_precio,2,',','.'),'LR',0,'C');

        $this->Ln();

        $subtotal =+ $total_precio_renglon;
    }

        $total_presupuesto = $subtotal + $iva;
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}


function TablaBasica($info_presupuesto_general)
   {
    //Cabecera
        $this->SetFont('Arial','B',10);  
        $this->Cell(30,10,"CLIENTE:",0);

        $this->SetFont('Arial','',8);
        $this->Cell(80,10,$info_presupuesto_general->nb_empresa,0);

        $this->SetFont('Arial','B',10); 
        $this->Cell(20,10,"FECHA",0);

        $this->SetFont('Arial','',8);
        $this->Cell(20,10,$info_presupuesto_general->ff_fecha_elaboracion,0);
        $this->Ln();
        $this->SetFont('Arial','B',10); 
        $this->MultiCell(30,5,"DOMICILIO FISCAL:",0, 2);
        $x = $this->GetX(); 
        $y = $this->GetY();      
        $this->SetXY($x+30, $y-5);
        $this->SetFont('Arial','',8);
        $this->MultiCell(120,5,$info_presupuesto_general->tx_direccion,0);
        $this->Ln(0);

        $this->SetFont('Arial','B',10); 
        $this->Cell(30,5,"RIF",0);
        $this->SetFont('Arial','',8);
        $this->Cell(120,5,$info_presupuesto_general->nu_rif,0);

   }





// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final

        $subtotal = 0;

        foreach($this->info_presupuesto_detalle->result() as $row)
    {   
        $total_precio_renglon = $row->nu_unidades * $row->nu_precio;

        $subtotal += $total_precio_renglon;
    }

    $total_presupuesto = $subtotal + 0;



    $this->SetY(-60);
    // Arial italic 8

    // Número de página
    $this->SetFont('Arial','B',10);
    $this->Cell(0,14,utf8_decode('SUBTOTAL: '.number_format($subtotal,0,',','.').' Bs'),0,0,'R');
    $this->ln(5);
    $this->Cell(0,14,utf8_decode('IVA: 0 %'),0,0,'R');
    $this->ln(5);
    $this->Cell(0,14,utf8_decode('TOTAL: '.number_format($total_presupuesto,0,',','.').' Bs'),0,0,'R');

     $this->SetY(-40);
    $this->SetFont('Arial','B',12);
     $this->Cell(0,14,utf8_decode('PRESUPUESTO '.$this->estatus),0,0,'C');

     $this->SetY(-26);

    $this->SetFont('Arial','',8);

    $this->MultiCell(170,4,utf8_decode('Realizar pagos a nombre de DROGUERIA SOFIMED, C.A. Rif: J-40898256-4 en la cuenta del BANCO OCCIDENTAL DE DESCUENTO (BOD), número: 0116-0494-37-0027482880. Enviar el comprobante de transferencia o depósito al correo drogueriasofimed@gmail.com. Este Presupuesto tiene una vigencia de 72 horas continuas a partir de su emisión, pagos deben validarse antes de la culminación de la misma para garantizar el despacho.'),0,'C');


}

}



// variables de la planilla

$pdf = new PDF('P', 'mm', 'A4');
$pdf->title = $info_presupuesto_general->nu_codigo_presupuesto;
$pdf->co_estatus = $info_presupuesto_general->co_estatus;
$pdf->info_presupuesto_detalle = $info_presupuesto_detalle;
$pdf->estatus = $info_presupuesto_general->nb_estatus;

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
$pdf->TablaBasica($info_presupuesto_general);
$pdf->ln(10);
$pdf->ImprovedTable($info_presupuesto_detalle);




// IMPRIMIR
$pdf->Output($info_presupuesto_general->id.'.pdf', 'I');


?>
