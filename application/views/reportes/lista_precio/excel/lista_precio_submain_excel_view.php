

              <?php if ($info_lista_precio->num_rows() > 0) : ?>

                  <table class="table compact table-hover" width="100%" id="tabla_2" border="1">
                    <thead>
                       <tr>
                       <th width="30%">Nombre de la lista</th>
                       <th width="10%">Codigo</th>
                       <th width="10%">Fecha inicio</th>
                       <th width="10%">Fecha fin</th>
                       <th width="10%">Tasa cambio</th>
                       <th width="10%">Moneda</th>
                       <th width="10%">Productos</th>
                       </tr>
                    </thead> 
                    <tbody>
                      <?php $con = 0; foreach ($info_lista_precio->result() as $row) : $con ++; ?>
                          <tr>
                                <td><b><?php echo $row->nb_lista; ?></b></td>
                                 <td><?php echo $row->codigo; ?></td>
                                 <td><?php echo $row->ff_inicio; ?></td>
                                   <td><?php echo $row->ff_fin; ?></td>
                                     <td><?php echo $row->nu_tasa_cambio; ?></td>
                                     <td><?php echo $row->nb_moneda; ?></td>
                                      <td><?php echo $row->nu_producto; ?></td>
                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

                                                   <?php else: ?>

                                      <h4>Sin Registro</h4>
                                      <p></p>


                                    <?php endif; ?>