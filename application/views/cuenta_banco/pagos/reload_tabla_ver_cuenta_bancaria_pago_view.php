

              <?php if ($cuenta_bancaria_pago->num_rows() > 0) : ?>

                  <table class="table table-striped table-hover dt-responsive compact" id="tabla_2">
                    <thead>
                       <tr>
                        <th width="10%">Referencia</th>
                        <th width="12%">Monto</th>
                        <th width="12%">Fecha</th>
                       </tr>
                    </thead> 
                    <tbody>
                      <?php foreach ($cuenta_bancaria_pago->result() as $row) : ?>
                          <tr style="cursor:pointer;" onclick="asociar_pago(<?php echo $row->id; ?>)">
                            <td align=left><?php echo $row->nu_referencia; ?> </td>
                              <td align=left> <?php echo number_format($row->ca_pago,2,',','.') ?> </td>
                              <td align=left><?php echo date_user($row->ff_pago); ?> </td>

                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

                                                   <?php else: ?>

                                      <h4>Sin pagos reportados en esta cuenta</h4>
                                      


                                    <?php endif; ?>

                                 <script type="text/javascript">

        $('#tabla_2').DataTable( {
        "responsive": true,
                "order": [],
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
    } );


</script>