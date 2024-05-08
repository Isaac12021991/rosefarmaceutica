


                          <?php if ($info_movimiento_inventario->num_rows() > 0) : ?>

                  <table class="table compact table-hover" width="100%" id="tabla_2" border="1">
                    <thead>
                       <tr>
                       <th width="30%">Producto</th>
                       <th width="10%">Mes</th>
                       <th width="10%">Año</th>
                       <th width="10%">Precio</th>
                       <th width="10%">Cantidad</th>

                       </tr>
                    </thead> 
                    <tbody>
                      <?php $con = 0; foreach ($info_movimiento_inventario->result() as $row) : $con ++; ?>
                          <tr style="cursor:pointer;">

                                <td><b><?php echo $row->nb_producto; ?></b></td>
                                 <td><?php $meses = array("Default","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");  echo $meses[$row->nu_mes]; ?></td>
                                 <td><?php echo $row->nu_year; ?></td>
                                 <td><?php echo number_format($row->nu_precio,2,',','.'); ?></td>
                                   <td><?php echo number_format($row->nu_unidades,0,',','.'); ?></td>
                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

                                                   <?php else: ?>

                                      <h4>Sin Registro</h4>
                                      <p></p>


                                    <?php endif; ?>