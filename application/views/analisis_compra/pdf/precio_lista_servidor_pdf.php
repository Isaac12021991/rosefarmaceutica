<?php

if (!class_exists('MYPDF')) {
require_once(FCPATH . 'tcpdf/tcpdf.php');

class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        
        $image_file = 'img/perfil/empresa/'.$this->info_empresa->nb_url_foto;

        $this->Image($image_file,10,10,50,20); 
        // Set font
        $this->SetY(13);
        $this->SetFont('helvetica', 'B', 10);
        // Title
        $this->Cell(0, 15, 'N° ' . $this->nro_lista, 0, false, 'R', 0, '', 0, false, 'M', 'M');
        $this->SetY(18);
        $this->SetFont('helvetica', 'B', 8);
        $this->Cell(0, 10, 'Vence:' . date_user($this->vence), 0, false, 'R', 0, '', 0, false, 'M', 'M');
    }
    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        //$this->SetY(-15);
        $this->SetY(-25); // subida para ubicar nota importante
        // Set font
        $this->SetFont('helvetica', 'B', 8);
        $this->MultiCell(190,2,utf8_decode('NOTA IMPORTANTE: No se haran devoluciones de mercancia por fecha de vencimiento, esta debe ser verificada por el cliente antes de realizar el pedido.'),0,'C');

        $this->ln(5);

        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 15, utf8_decode('Oferta Valida hasta el  ' . date_user($this->vence) . ', Pago anticipado para garantizar la disponibilidad.'), 0, false, 'C', 0, '', 0, false, 'M', 'M');
        // Page number
        $this->Cell(0, 10, 'Pagina ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}

}
// create new PDF document

$pdf = new MYPDF('P', 'mm', 'Letter', true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SIRE.');
$pdf->SetTitle('Lista # ' . $info_precios_lista->nu_codigo);
$pdf->vence     = $info_precios_lista->ff_fin;
$pdf->nro_lista = $info_precios_lista->nu_codigo;
$pdf->info_empresa = $info_empresa;
$pdf->SetSubject('Lista de Precio ');
$pdf->SetKeywords('Lista, Precio');
// set header and footer fonts
// set margins
$pdf->SetMargins(10, 30, 10);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(10);
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 15);
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
if ($info_precios_lista->nu_redondeo > 0):
    $redondear = $info_precios_lista->nu_redondeo;
else:
    $redondear = '0';
endif;
// set some language-dependent strings (optional)
// ---------------------------------------------------------
// set font
// add a page
$pdf->AddPage();
// set some text to print
if ($tipo_salida == 0):
    $html = '<p align="center"><B>OFERTA DE PRODUCTO N°: ' . $info_precios_lista->nu_codigo . '</b></p>';
    $html .= '<p align="center">' . date_user($info_precios_lista->ff_inicio) . ' al ' . date_user($info_precios_lista->ff_fin) . '</p><br>';
    $pdf->SetFont('times', '', 8.5);
    $i         = 0;
    $iteracion = 0;
    foreach ($info_precios_lista_detalle as $row):
        $i++;
        if($html == ''):
        $pdf->AddPage();
        endif;  
        $iteracion++;
        if ($iteracion == 1):
            $html .= '<table style="color:black; background:black;" border="0.5" cellspacing="0" cellpadding="2">
                     <tr bgcolor="black" color="white">
                        <th width="5%" >N°</th>
                        <th width="55%" align="center">PRODUCTO</th>
                        <th width="20%" align="center">CATEGORIA</th>
                        <th width="20%" align="center">' . strtoupper($info_precios_lista->nb_moneda) . '</th>
                     </tr>';
        endif;
        $html .= '<tr>
                        <td>' . $i . '</td>
                        <td>' . $row->nb_producto . '</td>
                         <td align="center">' . $row->nb_categoria . '</td>
                         <td align="right">' . number_format($row->nu_precio_bs, $redondear, ',', '.') . '</td>
                        </tr>';
        if ($iteracion == 40):
            $iteracion = 0;
            $html .= '</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $html = '';
        endif;
    endforeach;
   if ($iteracion != 0):
    if ($iteracion < 40):
        $iteracion = 0;
        $html .= '</table>';
        $pdf->writeHTML($html, true, false, true, false, '');
        $html = '';
    endif;
   endif; 
else:
    $html = '<p align="center"><B>OFERTA DE PRODUCTO N°: ' . $info_precios_lista->nu_codigo . '</b></p>';
    $html .= '<p align="center">' . date_user($info_precios_lista->ff_inicio) . ' al ' . date_user($info_precios_lista->ff_fin) . '</p><br>';
    $pdf->SetFont('times', '', 8.5);
    $i         = 0;
    $iteracion = 0;
    foreach ($info_precios_lista_detalle as $row):
        $i++;
        if($html == ''):
        $pdf->AddPage();
        endif;  
        $iteracion++;
        if ($iteracion == 1):
            $html .= '<table style="color:black; background:black;" border="0.5" cellspacing="0" cellpadding="2">
                     <tr bgcolor="black" color="white">
                        <th width="5%" >N°</th>
                        <th width="30%" align="center">PRODUCTO</th>
                        <th width="15%" align="center">CATEGORIA</th>
                        <th width="15%" align="center">UNIDAD MANEJO</th>
                        <th width="15%" align="center">LABORATORIO</th>
                        <th width="10%" align="center">VENCE</th>
                        <th width="10%" align="center">' . strtoupper($info_precios_lista->nb_moneda) . '</th>
                     </tr>';
        endif;
        $html .= '<tr>
                        <td>' . $i . '</td>
                        <td>' . $row->nb_producto . '</td>
                         <td align="center">' . $row->nb_categoria . '</td>
                         <td align="center">' . $row->nb_unidad_manejo . '</td>
                         <td align="center">' . $row->nb_laboratorio . '</td>
                         <td align="center">' . $row->ff_vencimiento . '</td>
                         <td align="right">' . number_format($row->nu_precio_bs, $redondear, ',', '.') . '</td>
                        </tr>';
        if ($iteracion == 25):
            $iteracion = 0;
            $html .= '</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $html = '';
        endif;
    endforeach;
 if ($iteracion != 0):
    if ($iteracion < 25):
        $iteracion = 0;
        $html .= '</table>';
        $pdf->writeHTML($html, true, false, true, false, '');
        $html = '';
    endif;
 endif;   
endif;
//Close and output PDF document

//$url = substr(base_url(),strpos(base_url(),'sofimed'));

if (file_exists('pdf/lista_precio/'.$info_precios_lista->nu_codigo.''.$tipo_salida.'.pdf')) {

    echo "Impreso en servidor";

} else {

  $pdf->Output('pdf/lista_precio/'.$info_precios_lista->nu_codigo.''.$tipo_salida.'.pdf', 'F');

}

?>
