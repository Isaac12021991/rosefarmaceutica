<?php

require(FCPATH.'fpdf/fpdf.php');

class PDF extends FPDF 
{

  var $angle=0;

    function Rotate($angle, $x=-1, $y=-1)
    {
        if($x==-1)
            $x=$this->x;
        if($y==-1)
            $y=$this->y;
        if($this->angle!=0)
            $this->_out('Q');
        $this->angle=$angle;
        if($angle!=0)
        {
            $angle*=M_PI/180;
            $c=cos($angle);
            $s=sin($angle);
            $cx=$x*$this->k;
            $cy=($this->h-$y)*$this->k;
            $this->_out(sprintf('q %.5f %.5f %.5f %.5f %.2f %.2f cm 1 0 0 1 %.2f %.2f cm', $c, $s, -$s, $c, $cx, $cy, -$cx, -$cy));
        }
    }

    function _endpage()
    {
        if($this->angle!=0)
        {
            $this->angle=0;
            $this->_out('Q');
        }
        parent::_endpage();
    }

    function RotatedText($x, $y, $txt, $angle)
    {
        //Text rotated around its origin
        $this->Rotate($angle, $x, $y);
        $this->Text($x, $y, $txt);
        $this->Rotate(0);
    }

    function RotatedImage($file, $x, $y, $w, $h, $angle)
    {
        //Image rotated around its upper-left corner
        $this->Rotate($angle, $x, $y);
        $this->Image($file, $x, $y, $w, $h);
        $this->Rotate(0);
    }

    function Header()
    {

        $this->Image($this->imagen_header,20,12,50,20); 
        $this->Ln(35);
        // Arial bold 15
        $this->SetFont('Arial','B',12);  

        $this->SetX(150); 


        $this->Cell(40,4,'NOTA DE DESPACHO: '.str_pad($this->title, 8, '0', STR_PAD_LEFT),0,1,'R'); 

        
        $this->Ln(4);
    }

    // Cabecera de página


    // Better table
    function ImprovedTable($info_documento_detalle, $co_almacen)
    {

        $x = $this->GetX(); $y = $this->GetY();
        $this->SetLineWidth(0.3); 
        $this->Line(15,$y,200,$y); 
        $this->Ln(1);
        // Column widths
        $header = array('RENGLON','DESCRIPCION', 'LOTE', 'VENCE', 'CANTIDAD');

        $w = array(8, 80, 30, 30, 30);
        // Header
        $this->SetFont('Arial','B',8);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],5,$header[$i],0,0,'C');
        $this->Ln();
        // Data

        $x = $this->GetX(); $y = $this->GetY();
         $this->SetLineWidth(0.3); 
         $this->Line(15,$y,200,$y);

        $this->SetFont('Arial','',10);
        $con = 0;
        $subtotal = 0;
        $iva = 0;
        $this->ln(1);

       foreach($info_documento_detalle->result() as $row)
        {

                $con ++;

                $this->SetFont('Arial','',8);   

                $current_y = $this->GetY();
                $current_x = $this->GetX();
                $this->MultiCell(10,3.5,$con,0,'C',0,0);
                $end_y = $this->GetY();

                $current_x = $current_x + 8;
                $this->SetXY($current_x, $current_y);
                $this->MultiCell(90,3.5,$row->nb_producto,0,'C',0,0);
                
                $end_y = ($this->GetY() > $end_y)?$this->GetY() : $end_y;

               // $this->SetFont('Arial','',8);
                $current_x = $current_x + 80;
                $this->SetXY($current_x, $current_y);
                $this->MultiCell(30,3.5,$row->nu_lote,0,'C',0,0);
                $end_y = ($this->GetY() > $end_y)?$this->GetY() : $end_y;

                $current_x = $current_x + 30;
                $this->SetXY($current_x, $current_y);
                $this->MultiCell(30,3.5,$row->ff_vencimiento,0,'C',0,0);

                $current_x = $current_x + 20;
                $this->SetXY($current_x, $current_y);
                $this->MultiCell(25,3.5,$row->ca_real,0,'R',0,0);
                $end_y = ($this->GetY() > $end_y)?$this->GetY() : $end_y;


                $this->SetY($end_y);
                $subtotal =+ $row->ca_real;  // CANTIDAD de unidades
            
        }
        $total_factura = $subtotal;
        // Closing line
        $this->Cell(array_sum($w),0,'','','T');
        
    }

    function TablaBasica($info_documento_general)
       {
        //Cabecera


            $current_y = $this->GetY();
            $current_x = $this->GetX();

            $this->SetFont('Arial','B',8);  
            $this->Cell(20,5,"ALMACEN:",0);

            $this->SetFont('Arial','',8);
            $x = $this->GetX(); 
            $y = $this->GetY();      
           $this->SetXY($x+0, $y-0);
            $this->Cell(50,5,utf8_decode($info_documento_general->nb_almacen),0);


            $this->SetX(90);

            $this->SetFont('Arial','B',8); 
            $this->Cell(20,5,utf8_decode($info_documento_general->nb_documento),0,0,'R');


            $this->SetX(110);

            $this->SetFont('Arial','',8); 
            

            $this->Cell(20,5,utf8_decode(str_pad($info_documento_general->nu_documento_factura, 8, '0', STR_PAD_LEFT)),0,0,'L');



            $current_y = $this->GetY();
            $current_x = $this->GetX();

            $this->SetX(150);

            $this->SetFont('Arial','B',8); 
            $this->Cell(20,5,"FECHA",0,0,'R');

            $this->SetFont('Arial','',8);
            
            $this->Cell(20,5,date_user($info_documento_general->ff_creacion),0,0);
                
            $current_y = $this->GetY();
            $this->SetY($current_y +5);
            $this->SetX(150);

            
            $current_y = $this->GetY();
            $this->SetY($current_y);
             $this->SetFont('Arial','B',8);
            $this->Ln(1);
      
            $this->MultiCell(45,5,"DIRECCION DEL ALMACEN:",0,'L');
            $x = $this->GetX(); 
            $y = $this->GetY();      
           $this->SetXY($x+45, $y-5);

            $this->SetFont('Arial','',8);

            $this->MultiCell(120,5,utf8_decode($info_documento_general->tx_direccion),0);
            $this->Ln(0);

            $this->SetXY($x+0, $y+0);

            
            $current_y = $this->GetY();
            $this->SetY($current_y);
             $this->SetFont('Arial','B',8);
            $this->Ln(1);
      
            $this->MultiCell(20,5,"CLIENTE:",0,'L');
            $x = $this->GetX(); 
            $y = $this->GetY();      
           $this->SetXY($x+20, $y-5);

            $this->SetFont('Arial','',8);

            $this->MultiCell(80,5,utf8_decode($info_documento_general->nb_cliente),0);

$this->SetFont('Arial','B',8);
            $x = $this->GetX(); 
            $y = $this->GetY();      
           $this->SetXY($x+100, $y-5);
            $this->Cell(10,5,'RIF:',0);


            $this->SetX(128);

            $this->SetFont('Arial','',8); 
            $this->Cell(20,5,utf8_decode($info_documento_general->nu_rif),0,0,'R');


     
       }


    // Pie de página
    function Footer()
    {

        $this->SetFont('Arial','B',6); 

        // Arial italic 8
        $this->SetY(-50);

        $x = $this->GetX(); $y = $this->GetY();
        $this->SetLineWidth(0.3); 
        $this->Line(10,$y,80,$y); 
        $this->Ln(1);

        $this->SetX(20);
        $this->SetFont('Arial','B',6);  
        $this->Cell(30,5,"Encargado Almacen:",0,0,'L');

        $this->SetY(-46);
        $this->SetX(20);
        $this->Cell(42,5,utf8_decode($this->nombre_encargado),0,0,'L');
        $this->SetY(-48);
        
        $this->SetLineWidth(0.3); 
        $this->Line(100,$y,180,$y); 
        $this->Ln(1);

        $x = $this->GetX(); $y = $this->GetY();
        $this->SetX($x + 110);
        $this->SetFont('Arial','B',6);  
        $this->Cell(30,5,"Movilizacion",0,0,'C');

        $this->SetY(-46);
        $this->SetFont('Arial','B',6);  
        
        $this->SetY(-48);

        $this->SetX(130);
        $this->SetFont('Arial','B',6);  

        $this->SetY(-26);
        $x = $this->GetX(); $y = $this->GetY();
        $this->SetLineWidth(0.3); 
        $this->Line(10,$y,200,$y); 
        $this->Ln(1);


   $this->SetY(-20);
   $this->SetX(10);
   $this->SetFont('Arial','I',8);
  $this->Cell(0,5,"Nota de despacho correspondiente a la ".utf8_decode($this->tipo_documento).' Nro '.$this->nu_documento_factura.' por el vendedor(a)'.utf8_decode($this->nombre_vendedor),0,0,'L');


          
        $x = $this->GetX(); $y = $this->GetY();
        $this->SetXY(10,-30);

        $this->SetFont('Arial','I',10);
        // Número de página
        if ($this->co_estatus == 3) {
            $this->SetTextColor(255, 0, 0);
            $this->RotatedText(15, 200, utf8_decode('Nota de Despacho no valida, primero cierre la factura antes de imprimir'), 90);

            $this->RotatedText(200, 100, utf8_decode('Nota de Despacho no valida, primero cierre la factura antes de imprimir'), -90);

        }

        if ($this->nu_impresion > 1) {
            # code...
            $this->SetTextColor(255, 0, 0);
            $this->RotatedText(15, 200, utf8_decode('Nota de Despacho Reimpresa'), 90);
            $this->RotatedText(200, 100, utf8_decode('Nota de Despacho Reimpresa'), -90);

        }

        if ($this->co_estatus == 4) {
            # code...
            $this->SetFont('Arial','I',32);
            $this->SetTextColor(255, 0, 0);
            $this->RotatedText(40, 150, utf8_decode('NOTA DE DESPACHO NO VALIDA'), 45);

        }


    }

}


// variables de la planilla

$pdf = new PDF('P', 'mm', 'Letter');

$co_almacen = 0;

foreach($info_documento_general->result() as $row_general) {

    $co_almacen =  $row_general->co_almacen;
   
    $pdf->SetTitle('Nota de Despacho '.$row_general->nu_documento);
    $pdf->title = $row_general->nu_documento;

    $pdf->imagen_header = base_url('img/perfil/empresa/'.$info_empresa->nb_url_foto);
    //$pdf->imagen_footer = base_url('img/facturacion/footer_factura.jpg'); 

    $pdf->co_estatus = $row_general->co_estatus;
    $pdf->nu_impresion = $row_general->nu_impresion;
    $pdf->nombre_encargado = $row_general->nombre_usuario_almacen.' '.$row_general->apellido_usuario_almacen;
    $pdf->nombre_vendedor = $row_general->nombre_vendedor.' '.$row_general->apellido_vendedor;
    $pdf->tipo_documento = $row_general->nb_documento;
    $pdf->nu_documento_factura = $row_general->nu_documento_factura;
    $pdf->info_documento_detalle = $info_documento_detalle;

    $subtotal = 0;

    $total_factura = 0;

    $pdf->AliasNbPages();

    #Creamos el objeto pdf (con medidas en milímetros):

    #Establecemos los márgenes izquierda, arriba y derecha:
    $pdf->SetMargins(18, 15, 18, 25); 

    //primera pagina

    $pdf->AddPage();
    $pdf->SetFont('Times','',8);
    $año = date('Y');
    $pdf->TablaBasica($row_general);
    $pdf->ln(10);
    $pdf->ImprovedTable($info_documento_detalle, $co_almacen);
   

    }

    // IMPRIMIR
    $pdf->Output('Nota de Despacho Nro '.$row_general->nu_documento.'.pdf', 'I');



?>
