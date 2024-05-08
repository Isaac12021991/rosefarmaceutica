


<div class="row animated fadeIn">


                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">


              <?php $co_documento_keep = ''; if ($reporte_documento_inventario->num_rows() > 0):  ?>

                <?php foreach ($reporte_documento_inventario->result() as $row): 
                  if($co_documento_keep != $row->co_documento):

                  $co_documento_keep = $row->co_documento; ?>


                                        <table class="table" border="1">
                                        <thead>
                                        <tr>
                                        <th colspan="3"><?php echo $row->nb_documento; ?> <?php echo $row->nu_documento; ?><br>
                                          <?php echo $row->nb_cliente; ?> - <?php echo $row->nu_rif; ?>
                                        </th>
                                        </tr>
                                        </thead>

                                        <tr>
                                        <td width="60%"><b>Producto</b></td>
                                        <td width="20%"><b>Cantidad</b></td>
                                        <td width="20%"><b>Lote</b></td>
                                        </tr>

                                        <?php foreach ($reporte_documento_inventario->result() as $row_detalle): ?>

                                        <?php if($row_detalle->co_documento == $co_documento_keep): ?>
                                        <tr>
                                        <td><?php echo $row_detalle->nb_producto; ?></td>
                                        <td><?php echo $row_detalle->ca_unidades; ?></td>
                                        <td><?php echo $row_detalle->nu_lote; ?></td>
                                        </tr>

                                      <?php endif; ?>
                                        
                                        <?php endforeach; ?>

                                        <tfoot>
                                        <tr>
                                        <td colspan="3">Fecha de Emision: <?php echo date_user($row->ff_emision); ?> - Total productos: <?php echo $row->nu_productos; ?> </td>
                                        </tr>

                                        </tfoot>
                                        </table>


                 <?php endif; 

               endforeach;
                  ?>


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