                                  

              <?php if ($listado_cuentas_por_cobrar->num_rows() > 0) : ?>

                  <table class="table compact table-hover" id="tabla_2" border="1">
                    <thead>
                       <tr>
                         <th width="5%">DOCUMENTOS</th>
                         <th width="10%">FECHA</th>
                         <th width="10%">CLIENTES</th>
                          <th width="10%">MONTO BSS</th>
                          <th width="10%">MONTO $</th>
                         <th width="10%">VENDEDOR</th> 
                         <th width="10%">PENDIENTE</th>
                         <th width="10%">VENCE</th> 
                          <th width="10%">PAGOS REPORTADOS</th>
                          <th width="10%">PAGOS VERIFICADOS</th>
                         
                       </tr>
                    </thead> 
                    <tbody>
                      <?php $ca_monto_total_dolares = 0; foreach ($listado_cuentas_por_cobrar->result() as $row) : ?>
                          <tr>
                              <td><?php echo $row->nb_documento; ?><br> <?php echo $row->nu_documento; ?>
                               </td>
                               <td><?php echo date_user($row->ff_emision); ?></td>
                               <td><?php echo $row->nb_cliente; ?> </td>
                                 <td><?php echo number_format($row->ca_total_factura,2,',','.'); ?></td>
                                 <td> <?php echo number_format($row->ca_pago_dolares,2,',','.'); $ca_monto_total_dolares += $row->ca_pago_dolares ?></td>
                                <td><?php echo $row->first_name.' '.$row->last_name; ?> </td>
                                <td><?php $pago_pendiente = $row->ca_total_factura - $row->ca_pago_reportado; echo number_format($pago_pendiente,2,',','.');
                                 ?>
                                  </td>
                              <td><?php if($row->ff_vencimiento != ''): echo date_user($row->ff_vencimiento); else: echo 'N/D'; endif; ?> </td>
                                 <td><?php echo number_format($row->ca_pago_reportado,2,',','.'); ?> 
                                  </td>
                                  <td><?php echo number_format($row->ca_pago_verificado,2,',','.'); ?></td>

                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

                                                   <?php else: ?>

                                      <h4>SIN REGISTRO</h4>
                                      <p></p>


                                    <?php endif; ?>

                                                    <?php if ($listado_cuentas_por_cobrar_resumen->num_rows() > 0) : ?>


                  <table class="table compact table-hover" border="1">
                    <thead>
                       <tr>
                         <th width="10%">TOTAL DOCUMENTO</th>
                         <th width="20%">MONTO TOTAL $</th>
                         <th width="20%">MONTO TOTAL BSS</th>
                        <th width="20%">MONTO PAGOS REPORTADOS BSS</th>
                         <th width="20%">MONTO VERIFICADO BSS</th>
                         <th width="20%">MONTO PENDIENTE BSS</th> 
                         
                       </tr>
                    </thead> 
                    <tbody>
                      <?php $con = 0; foreach ($listado_cuentas_por_cobrar_resumen->result() as $row) : $con ++; ?>
                          <tr>
                              <td><?php echo number_format($row->nu_documentos,0,',','.'); ?></td>
                              <td><?php echo number_format($ca_monto_total_dolares,3,',','.'); ?></td>
                              <td><?php echo number_format($row->ca_total_factura,2,',','.'); ?></td>
                              <td><?php echo number_format($row->ca_pago_reportado,2,',','.'); ?></td>
                              <td><?php echo number_format($row->ca_pago_verificado,2,',','.'); ?></td>
                              <td><span style="color:red; font-size:12;"><b><?php $monto_total_pendiente = $row->ca_total_factura -  $row->ca_pago_reportado; echo number_format($monto_total_pendiente,2,',','.'); ?></b></span></td>
                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

                <?php endif; ?> 

