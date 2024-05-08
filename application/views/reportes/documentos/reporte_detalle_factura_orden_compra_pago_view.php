

<div class="row animated fadeIn">

                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">


                                  <div class="portlet box bg-blue-chambray">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Documentos </div>
                                        <div class="actions">

                                        </div>
                                    </div>
                                    <div class="portlet-body">

                                        <div class="general-item-list">
                                      <div class="item">
                                                    <div class="item-head">
                                                        <div class="item-details">
                                                           <a class="item-name primary-link" onclick="imprimir_documento(<?php echo $info_general->co_documento; ?>)">N° <?php echo $info_general->nb_documento; ?> <?php echo $info_general->nu_documento; ?></a>
                                                            <span class="item-label"><?php echo $info_general->ff_emision; ?></span>
                                                        </div>
                                                        <span class="item-status">
                                                            <span class="badge badge-empty badge-info"></span>Cerrado</span>
                                                    </div>
                                                    <div class="item-body">  
                                                      <table width="80%" border="0">
                                                        <tr>
                                                          <td>VENDEDOR</td> <td><?php echo $info_general->first_name.' '.$info_general->last_name; ?></td>
                                                          <td>PAGO REPORTADO:</td> <td><?php echo $info_general->ca_pago_reportado; ?></td>
                                                        </tr>

                                                        <tr>
                                                           <td>TIPO DE PAGO</td> <td><?php echo $info_general->nb_tipo_pago; ?></td>
                                                           <td>PAGO VERIFICADO</td> <td><?php echo $info_general->ca_pago_verificado; ?></td>   
                                                        </tr>

                                                        <tr>
                                                           <td>N° PRESUPUESTO:</td> <td>
                                                             

                                <a href="#" title="Imprimir presupuesto" onclick="imprimir_presupuesto(<?php echo $info_general->co_presupuesto; ?>)"><?php echo $info_general->nu_codigo_presupuesto; ?></a>

                                                           </td>   
                                                        </tr>


                                                        <tr>
                                                           <td>PRECIO:</td> <td><?php echo $info_general->ca_total_factura; ?></td>   
                                                        </tr>

                                                      </table>

                                                    </div>
                                                </div>

                                              </div>

                                   <?php if ($factura_orden_compra_pago->num_rows() > 0) : ?>

                                    <hr>
                <h4>Detalle</h4>

                  <table class="table compact table-hover" id="tabla_1">
                    <thead>
                       <tr>
                       <th width="2%">#</th>
                         <th width="5%">REFERENCIA</th>
                         <th width="5%">MONTO</th>
                         <th width="5%">FECHA </th>
                         <th width="5%">BANCO ORIGEN</th>
                         <th width="5%">CUENTA DESTINO</th>

                         
                       </tr>
                    </thead> 
                    <tbody>
                      <?php $con = 0; foreach ($factura_orden_compra_pago->result() as $row) : $con ++; ?>
                          <tr>

                              <td><?php echo $con; ?> </td>
                               <td><?php if($row->nb_url == ''): ?><?php echo $row->nu_referencia; else: ?>  <?php echo $row->nu_referencia; ?>  <a target="_blank" href="<?php echo base_url() ?>archivos/orden_compra_entrada/financiero/<?php echo $row->nb_url; ?>"> <li class="fa fa-paperclip"></li> Adjunto</a> <?php endif; ?> </td>
                                <td><?php echo $row->ca_pago; ?> </td>
                                 <td><?php echo date_user($row->ff_pago); ?> </td>
                                  <td><?php echo $row->nb_banco; ?> </td>
                                    <td><?php echo $row->nu_cuenta; ?> - <?php echo $row->tx_nb_titular; ?> </td>

                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

                                                   <?php else: ?>

                                      <h4>Sin reporte de pago</h4>
                                      <p></p>


                                    <?php endif; ?>


                                </div>



                            </div>

                            </div>

</div>




  <script type="text/javascript">

    function imprimir_presupuesto(co_presupuesto) 

{
         window.open("<?php echo site_url() ?>/presupuesto/imprimir_presupuesto_pdf"+"/"+co_presupuesto+"", "_blank");

}


    function imprimir_documento(co_documento) 

{

       window.open("<?php echo site_url() ?>/documentos/imprimir_documento_pdf"+"/"+co_documento+"/"+'1'+"", "_blank");


}



</script>
