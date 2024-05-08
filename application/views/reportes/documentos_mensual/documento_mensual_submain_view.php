


<div class="row animated fadeIn">

                                   <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">

                                    <table class="table" border="0">
                                      <tr>
                                        <th>TIPO DE PAGO</th>
                                        <th> MONTO</th>
                                        <th> MONTO VERIFICADO</th>
                                      </tr>
                                      <tr>
                                        <td>PREPAGADO</td>
                                        <td align="right"><?php echo number_format($reporte_documento_general_mensual->monto_prepagado,2,',','.'); ?> </td>
                                        <td align="right"> <?php echo number_format($reporte_documento_general_mensual_verificacion_monto->monto_verificado_prepagado,2,',','.'); ?> </td>
                                      </tr>
                                                                            <tr>
                                        <td>CREDITO</td>
                                        <td align="right"><?php echo number_format($reporte_documento_general_mensual->monto_credito,2,',','.'); ?> </td>
                                        <td align="right"> <?php echo number_format($reporte_documento_general_mensual_verificacion_monto->monto_verificado_credito,2,',','.'); ?></td>
                                      </tr>

                                                                                                                  <tr>
                                        <td>CONTRA DESPACHO</td>
                                        <td align="right"><?php echo number_format($reporte_documento_general_mensual->monto_contra_despacho,2,',','.'); ?> </td>
                                        <td align="right">  <?php echo number_format($reporte_documento_general_mensual_verificacion_monto->monto_verificado_contra_despacho,2,',','.'); ?></td>
                                      </tr>

                                    </table>

                                    <table class="table" border="0">
                                      
                                      <tr>
                                        <td> <b> TOTAL MONTO: </b> </td>
                                        <td align="right"> <b> <?php echo number_format($reporte_documento_general_mensual->monto_documento,2,',','.'); ?> BsS  </b> </td>

                                      <td> <b> TOTAL VERIFICADO: </b> </td>
                                        <td align="right"> <b>  <?php echo number_format($reporte_documento_general_mensual_verificacion_monto->monto_verificado,2,',','.'); ?> BsS </b> </td>
                                      </tr>

                                    </table>

                                  
                                   <br>


                                 </div>

                                 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                                                      <table class="table">
                                      <tr>
                                        <th> DOCUMENTO</th>
                                        <th> CANTIDAD</th>
                                      </tr>
                                      <tr>
                                        <td>Facturas</td>
                                        <td><?php echo number_format($reporte_documento_general_mensual->ca_factura,0,',','.'); ?> </td>
                                      </tr>
                                                                            <tr>
                                        <td>Nota de entrega</td>
                                        <td><?php echo number_format($reporte_documento_general_mensual->ca_nota_entrega,0,',','.'); ?> </td>
                                      </tr>

                                    </table>

                                     <table class="table">
                                      
                                      <tr>
                                        <td> <b> TOTAL FACTURAS Y NOTAS DE ENTREGAS: </b> </td>
                                        <td> <b> <?php $ca_documento_total = $reporte_documento_general_mensual->ca_factura + $reporte_documento_general_mensual->ca_nota_entrega;
                                          echo number_format($ca_documento_total,0,',','.');
                                        ?>  </b> </td>

                                      </tr>

                                    </table>




                                 </div>


                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

              <?php if ($reporte_documento_mensual->num_rows() > 0) : ?>
                  <div class="table-responsive">
                  <table class="table compact table-hover" width="100%" id="tabla_2">
                       <thead>
                       <tr>
                       <th width="10%">Documento</th>
                       <th width="10%">Fecha</th>
                        <th width="10%">Cliente</th>
                         <th width="10%">Monto</th>
                         <th width="10%">Tipo pago</th>
                         <th width="10%">Vendedor</th>
                         <th width="10%">Pago</th>
                         <th width="10%">N° referencia</th>
                         <th width="10%">Banco Origen</th>
                          <th width="10%">Banco Receptor</th>
                          <th width="10%">Fecha pago</th>
                          <th width="10%">Despachado</th>
                       </tr>
                        </thead> 
                    <tbody>
                      <?php $con = 0; foreach ($reporte_documento_mensual->result() as $row) : $con ++; ?>
                          <tr style="cursor:pointer;">

                                <td><b><?php echo $row->nb_documento.' '.$row->nu_documento; ?></b></td>
                                <td><b><?php echo $row->ff_emision; ?></b></td>
                                <td><?php echo $row->nb_cliente; ?></td>
                                <td><?php echo number_format($row->monto_documento,2,',','.'); ?></td>
                                <td><?php echo $row->nb_tipo_pago; ?></td>
                                <td><?php echo $row->first_name.' '.$row->last_name; ?></td>
                                 <td><?php echo number_format($row->ca_pago,2,',','.'); ?></td>
                                 <td><?php echo $row->nu_referencia; ?></td>
                                 <td><?php echo $row->nb_banco_origen; ?></td>
                                  <td><?php echo $row->tx_nb_titular; ?></td>
                                   <td><?php echo date_user($row->ff_pago); ?></td>
                                   <td><?php echo $row->estatus_despacho; ?></td>
                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>
               </div>

                                                   <?php else: ?>

                                      <h4>Sin Registro</h4>
                                      <p></p>


                                    <?php endif; ?>




  <script type="text/javascript">

            $('#tabla_2').DataTable( {
        "responsive": true,
                "order": [],
                stateSave: true,
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
    } );




</script>