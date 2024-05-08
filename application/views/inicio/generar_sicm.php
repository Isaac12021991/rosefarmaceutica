<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0052)http://www.sicm.gob.ve/g_4cguia.php?id_guia=23249829 -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="keywords" content="Sistema Integral de Control de Medicamentos, Ministerio de Salud, Ministerio de Alimentación, Ministerio de Alimentacion, Importación, Exportación, Importacion, Exportacion, Venezuela, Medicamentos, Alimentos, Mercal, SADA, sada, CASA, casa, PDVAL,medicamentos,  alimentos, alimentacion, Ministerio de Alimentación, Carlos Osorio, Venezuela">
<meta name="description" content="Sistema Integral de Control de Medicamentos, Control y Monitoreo de la Distribución a Nivel Nacional">
<title>SICM - Consulta de Guía</title>
<link rel="shortcut icon" href="http://www.sicm.gob.ve/images/favicon03.ico">
<link href="<?php echo base_url() ?>/www.sicm.gob.ve/rpt.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>/www.sicm.gob.ve/datePicker.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>/www.sicm.gob.ve/jquery.autocomplete.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url() ?>/www.sicm.gob.ve/jsdialog_all.css" rel="stylesheet" type="text/css"><script type="text/javascript" src="<?php echo base_url() ?>/www.sicm.gob.ve/jquery-1.5.2.min.js.descarga"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/www.sicm.gob.ve/ddsmoothmenu.js.descarga"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/www.sicm.gob.ve/init.js.descarga"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/www.sicm.gob.ve/funciones.js.descarga"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/www.sicm.gob.ve/date.js.descarga"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/www.sicm.gob.ve/jquery.datePicker.js.descarga"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/www.sicm.gob.ve/jsdialog_all.js.descarga"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/www.sicm.gob.ve/jquery.autocomplete.js.descarga"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/www.sicm.gob.ve/jquery.tablednd.js.descarga"></script><style>
.precio{display:none;}
</style>
</head>
<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody><tr>
    <td><table id="encabezado" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody><tr>
    <td align="center">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td width="49%" align="left"><img src="<?php echo base_url() ?>/www.sicm.gob.ve/cintillo.png" width="477" height="59" style="margin-left:5px"></td>
        <td width="51%" rows="2" align="right" valign="middle"><img src="<?php echo base_url() ?>/www.sicm.gob.ve/zamora-200.jpg"><br><span style="font-size:10px;"></span></td>
      </tr>
	  <tr>
	   <td colspan="2" width="100%" align="right" valign="bottom"></td>
	  </tr>
    </tbody></table>
    </td>
  </tr>
  <tr>
    <td><hr style=" border-width: 1px;border-color: #000;"></td>
  </tr>
  <tr>
    <td align="left">
    </td>
  </tr>
</tbody></table></td>
  </tr>
  <tr>
    <td align="center"><strong class="texto18">Guía de Movilización de Medicamentos</strong></td>
  </tr>
    <tr>
    <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
      <tbody><tr>
        <td width="80%" colspan="2" align="left" valign="middle" class="texto12">Nro Guia: <?php echo str_pad($info_documento_general->nu_documento, 8, '22564', STR_PAD_LEFT) ?></td>
        <td width="20%" colspan="2" rowspan="4" align="center" valign="middle"><span class="texto12">
                    <img class="box-center" src="<?php echo base_url() . "qr_code/" . $img ?>" title="<?php echo $img ?>" />
         </span></td>
        </tr>
      <tr>
        <td colspan="1" width="95%" align="center" valign="middle" bgcolor="#0DFF0D" class="texto_18">Estatus(APROBADA)</td>
        <td colspan="1" width="5%" align="center" class="texto_18"><div style="padding:3px;"><img src="<?php echo base_url() ?>/www.sicm.gob.ve/23249829.gif"></div></td>
        </tr>
      <tr>
        <td align="left" colspan="2" valign="middle" class="texto12">Fecha de Emisión: <?php echo $info_documento_general->ff_sistema; ?> </td>
        </tr>
      <tr>
                <td width="19%" colspan="2" align="left" valign="middle" class="texto12">Fecha de Vencimiento:<?php echo $fecha_vence = date("d-m-Y",strtotime($info_documento_general->ff_sistema."+ 9 days")); ?></td>
        </tr>
      <tr>
        <td align="left" valign="middle" class="texto12" colspan="4">Documentos: <?php echo str_pad($info_documento_general->nu_documento, 8, '0', STR_PAD_LEFT) ?></td>
        </tr>
	        <tr>
        <td colspan="4"><table width="100%" border="1" cellspacing="2" cellpadding="0">
          <tbody><tr>
            <td width="10%" align="right" class="texto10"><strong>Cod. SICM:</strong></td>
            <td width="35%" align="left" class="texto12">&nbsp;50077</td>
            <td width="10%" rowspan="9" align="center" valign="middle"><img src="<?php echo base_url() ?>/www.sicm.gob.ve/desdehasta.gif" width="65" height="65"></td>
            <td width="11%" align="right"><strong>Cod. SICM:</strong></td>
            <td width="34%" align="left" class="texto12">&nbsp;<?php echo $info_documento_cliente->cod_sicm ?></td>
            </tr>
          <tr>
            <td align="right" class="texto10"><strong>Razón:</strong></td>
            <td align="left" class="texto12">&nbsp;BIO NEW PHARMA</td>
            <td align="right"><strong>Razón:</strong></td>
            <td align="left" class="texto12">&nbsp;<?php echo $info_documento_cliente->nb_cliente; ?></td>
            </tr>
          <tr>
            <td align="right" class="texto10"><strong>Rif:</strong></td>
            <td align="left" class="texto12">&nbsp;J500244720</td>
            <td align="right"><strong>Rif:</strong></td>
            <td align="left" class="texto12">&nbsp;<?php echo $info_documento_cliente->nu_rif; ?></td>
            </tr>
          <tr>
            <td align="right" class="texto10"><strong>Tipo:</strong></td>
            <td align="left" class="texto12">&nbsp;Droguerias</td>
            <td align="right"><strong>Tipo:</strong></td>
            <td align="left" class="texto12">&nbsp;Farmacias Comerciales</td>
            </tr>
          <tr>
            <td align="right" class="texto10"><strong>Dirección:</strong></td>
            <td align="left" class="texto12">&nbsp;AV. PRINCIPAL BOLEITA CON ESQ. CALLE TIUNA.EDF. CASABER.PISO 4. OF. C ZON BOLEITA NORTE.</td>
            <td align="right"><strong>Dirección:</strong></td>
            <td align="left" class="texto12">&nbsp;<?php echo $info_documento_cliente->tx_direccion; ?></td>
            </tr>
          <tr>
            <td align="right" class="texto10"><strong>Edo/Ciudad:</strong></td>
            <td align="left" class="texto12">&nbsp;Miranda/Caracas</td>
            <td align="right"><strong>Edo/Ciudad:</strong></td>
            <td align="left" class="texto12">&nbsp;Caracas</td>
            </tr>
          <tr>
            <td align="right" class="texto10"><strong>Telefonos:</strong></td>
            <td align="left" class="texto12">&nbsp;02122345915 04145327612</td>
            <td align="right"><strong>Telefonos:</strong></td>
            <td align="left" class="texto12">&nbsp;<?php echo $info_documento_cliente->nu_telefono_movil; ?> </td>
            </tr>
          <tr>
            <td align="right" class="texto10"><strong>Contacto:</strong></td>
            <td align="left" class="texto12">&nbsp;JUAN CARLOS CORREA</td>
            <td align="right"><strong>Contacto:</strong></td>
            <td align="left" class="texto12">&nbsp;<?php echo $info_documento_cliente->nb_representante_legal; ?></td> 
            </tr>
          <tr>
            <td align="right" class="texto10"><strong>Email:</strong></td>
            <td align="left" class="texto12">&nbsp;drogueriacercentro@gmail.com</td>
            <td align="right"><strong>Email:</strong></td>
            <td align="left" class="texto12">&nbsp;<?php echo $info_documento_cliente->tx_email; ?></td>
            </tr>
          </tbody></table></td>
      </tr>
      <tr>
        <td colspan="4">
              <table width="100%" border="1" cellspacing="2" cellpadding="0">
          <tbody><tr>
             <?php $con = 0; $sum_unidades_uno = 0; foreach ($info_documento_detalle->result() as $key) { $con ++; ?>
              <?php  $sum_unidades_uno += $key->nu_unidades; } ?>
            <td colspan="8" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody><tr>
                <td align="center"><strong>Bultos:</strong><?php echo $info_documento_general->ca_bulto; ?></td>
                <td align="center"><strong>Renglones:</strong><?php echo $con; ?></td>
                <td align="center"><strong>Unidades:</strong><?php echo $sum_unidades_uno; ?></td>
              </tr>
            </tbody></table></td>
            </tr>
          <tr>
           
            <td width="25%" align="left" bgcolor="#CCCCCC"><span class="texto12"><strong>&nbsp;Producto</strong></span></td>
            <td width="10%" align="center" bgcolor="#CCCCCC"><span class="texto12"><strong>Lote</strong></span></td>
            <td width="5%" align="left" bgcolor="#CCCCCC"><span class="texto12"><strong>&nbsp;Cant</strong></span></td>
			           </tr>
                   <?php foreach ($info_documento_detalle->result() as $row) { ?>
                           <tr>
                               <td>&nbsp; <?php echo $row->nb_producto_general; ?> </td>
              <td>&nbsp;<?php echo $row->nu_lote; ?></td>
              <td>&nbsp;<?php echo $row->nu_unidades; ?></td>
			     </tr>

                    <?php } ?>
          <tr>
            <td colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody><tr>
                <td align="center"><strong>Bultos:</strong><?php echo $info_documento_general->ca_bulto; ?></td>
                <td align="center"><strong>Renglones:</strong><?php echo $con; ?></td>
                <td align="center"><strong>Unidades:</strong><?php echo $sum_unidades_uno; ?></td>
              </tr>
            </tbody></table></td>
            </tr>          
        </tbody></table></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>  
	  <tr>
      <td colspan="7">
		<table width="100%" cellspacing="0" cellpadding="3" border="0">
			<tbody><tr>
			  	<td colspan="3" bgcolor="#75847E"><div align="center"><b>DATOS DE TRANSPORTE</b></div></td>
				<td colspan="3" bgcolor="#75847E"><div align="center"><b>TRANSPORTE SUSTITUTO</b></div></td>
			</tr>
			<tr>
			  	<td colspan="6" bgcolor="#B8C0BC" align="center">Los datos del transporte pueden ser llenados a mano y con letra legible</td>
			</tr>
			<tr height="50">
			    <td width="7%"><div align="left">Chofer:</div></td>
				<td align="left" colspan="2">_________________________________</td>
			    <td width="7%" align="left"><div align="left">Chofer:</div></td>
				<td colspan="2" align="left">_________________________________</td>
			</tr>
			<tr height="30">
				<td><div align="left">Placas:</div></td>
				<td align="left">________________</td>
				<td align="center"><strong>SELLO</strong></td>
				<td><div align="left">Placas:</div></td>
				<td align="left">________________</td>
				<td align="center"><strong>SELLO</strong></td>
			</tr>
		</tbody></table>
	  </td>
  </tr>
  </tbody></table></td>
  </tr>
  <tr>
    <td colspan="8">&nbsp;</td>
  </tr>
  <tr>
    <td>
<table id="piePagina" width="100%" border="0">
	<tbody><tr>
	  <td colspan="3"><div class="pieDetalles" style="padding:0px; margin:0px; line-height:10px;font-size:9px" align="justify">
	   EL PRESIDENTE DE FARMAPATRIA, AUTORIZA EXPRESAMENTE AL TITULAR DE ESTA GUÍA
		DE MOVILIZACIÓN, EL TRASLADO DE LOS MEDICAMENTOS DESCRITOS EN LA MISMA, DESDE  EL SITIO DE ORIGEN
		HASTA SU DESTINO DENTRO DEL ÁMBITO DEL TERRITORIO NACIONAL, SEGÚN LO ESTABLECIDO EN GACETA NRO 39.922 DE FECHA 15 DE MAYO DE 2012. DEBE ANEXAR LA GUÍA DE DE"225"SPACHO. </div>
		<div style="padding:0px; margin:0px; line-height:10px;font-size:9px"><b>NOTA: DE ESTE FORMATO O GUÍA EXISTEN  UNA (01)  COPIA BENEFICIARIO Y UNA (01)  COPIA TRANSPORTE.</b></div><b>
	  </b></td>
  </tr>
	<tr>
	  <td colspan="3"><div class="pieDetalles" style="padding:0px; margin:0px; line-height:10px;font-size:9px" align="justify">
	 ° Farmapatria solo emite la Guía de Movilización con los datos suministrados por la empresa que moviliza el producto. <br>
	 ° Es responsabilidad del emisor el referido producto que carga en la Guía.	

	 </div></td>
  </tr>
	<tr>
		<td width="149" align="center" valign="middle">
		   <div align="center">
			  <p>
				 <img id="imagenLogo" src="<?php echo base_url() ?>/www.sicm.gob.ve/logofp.gif" width="271" height="83" align="baseline">
			 </p>
		  </div>
	  </td>
		<td width="283">
		   <p align="center" style="padding:0px; margin:0px; line-height:10px;">
				   					
						<img src="<?php echo base_url() ?>/www.sicm.gob.ve/firma1.png" width="225" height="160"><br>
										
					
				   
				 
			
	 </p></td>
		<td width="204" valign="middle">
			<div align="center" id="pieDetalles2">
			   <p align="center" style="padding:0px; margin:0px; line-height:10px;">
				  <b>
					 <font color="#FF0000">
						INDEPENDENCIA Y PATRIA SOCIALISTA
						<br>
						<br>						
						VIVIREMOS Y VENCEREMOS
					</font>
				  </b>
			  </p>
			</div>
		</td>
	</tr>
	<tr>
	  <td colspan="3" align="center" valign="middle"><div class="pieDetalles" align="center" style="padding:0px; margin:0px; line-height:10px;">© 2018 SICM. Ministerio del Poder Popular para la Salud. <br>Esq. Altagracia Edif. Anexo IVSS - Farmapatria Piso 2 Caracas-Distrito Capital Teléfono Atención al Usuario: (0212) 863 54 71 <br>RIF: G-20010196-2  Correo electrónico: soporte@farmapatria.com.ve</div>
		<div align="center" style="padding:0px; margin:0px; line-height:10px;"></div>
	  <div align="center" style="padding:0px; margin:0px; line-height:10px;"></div></td>
  </tr>
</tbody></table>
</td>
  </tr>
   <!--tr>
    <td><hr /></td>
  </tr-->
</tbody></table>



</body></html>

<script type="text/javascript">
  
//  window.history.replaceState({},'','wwww.sicm.gob.ve/4gp.php=1212122');

var nu_guia = "<?php echo str_pad($info_documento_general->nu_documento, 8, '22564', STR_PAD_LEFT) ?>";

history.pushState(null, "", "wwww.sicm.gob.ve/4gp.php="+nu_guia);

</script>