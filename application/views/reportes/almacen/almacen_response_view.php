


<div class="row animated fadeIn">


                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">


                                  <div class="portlet box bg-blue-chambray">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Registro de movimiento </div>
                                        <div class="actions">

                                        </div>
                                    </div>
                                    <div class="portlet-body">

              <?php if ($listado_inventario_movimiento->num_rows() > 0) : ?>

                  <table class="table compact table-hover" id="tabla_2">
                    <thead>
                       <tr>
                       <th width="5%">#</th>
                       <th width="10%">FECHA</th>
                       <th width="10%">MOVIMIENTO</th>
                         <th width="25%">PRODUCTO</th>
                          <th width="10%">LOTE</th>
                         <th width="10%">VENCE</th>
                         <th width="5%">UNIDADES</th>
                         <th width="5%">OBSERVACION</th>
                         <th width="10%">ALMACEN</th>
                       </tr>
                    </thead> 
                    <tbody>
                      <?php $con = 0; foreach ($listado_inventario_movimiento->result() as $row) : $con ++; ?>
                          <tr style="cursor:pointer;">
                              <td><?php echo $con; ?> </td>
                              <td><?php echo date_user($row->ff_fecha); ?></td>
                                <td><?php echo $row->nb_movimiento; ?></td>
                              <td><?php echo $row->nb_producto; ?></td>
                              <td><?php echo $row->nu_lote; ?> </td>
                              <td><?php echo $row->ff_vencimiento; ?> </td>
                              <td><?php echo $row->ca_unidades; ?> </td>
                              <td><?php echo $row->tx_observacion; ?> </td>
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