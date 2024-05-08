


<div class="row animated fadeIn">


                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">


                                  <div class="portlet box bg-blue-chambray">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Inventario (<?php echo $nb_producto; ?>) </div>
                                        <div class="actions">

                                        </div>
                                    </div>
                                    <div class="portlet-body">

              <?php if ($listado_inventario_detalle->num_rows() > 0) : ?>

                  <table class="table compact table-hover" id="tabla_2">
                    <thead>
                       <tr>
                       <th width="5%">#</th>
                         <th width="25%">PRODUCTO</th>
                          <th width="10%">LOTE</th>
                         <th width="10%">VENCE</th>
                         <th width="5%">UNIDADES</th>
                         <th width="10%">ALMACEN</th>
                       </tr>
                    </thead> 
                    <tbody>
                      <?php $con = 0; foreach ($listado_inventario_detalle->result() as $row) : $con ++; ?>
                          <tr style="cursor:pointer;" onclick="ver_detalle_inventario_movimiento('<?php echo $row->nb_producto; ?>')">
                              <td><?php echo $con; ?> </td>
                              <td><?php echo $row->nb_producto; ?></td>
                              <td><?php echo $row->nu_lote; ?> </td>
                              <td><?php echo $row->ff_vencimiento; ?> </td>
                              <td><?php echo $row->ca_unidades; ?> </td>
                              <td><?php echo $row->nb_almacen; ?> </td>
                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

                                                   <?php else: ?>

                                      <h4>Sin Inventario</h4>
                                      <p></p>


                                    <?php endif; ?>

      

                                </div>



                            </div>

                            </div>


</div>



  <script type="text/javascript">

            $('#tabla_2').DataTable( {
        "responsive": true,
                "order": [],
                stateSave: true,
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
    } );




</script>