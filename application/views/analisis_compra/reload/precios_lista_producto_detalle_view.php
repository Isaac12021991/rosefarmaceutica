
                                                      <?php if ($info_precios_lista_detalle->num_rows() > 0): ?>
                                                    <table class="table">
                                                      <thead>
                                                        <tr>
                                                        <th>Producto</th>
                                                        <th>Categoria</th>
                                                        <th>Precio Bs</th>
                                                      </tr>
                                                      </thead>
                                                      <tbody>

                                                        <?php foreach ($info_precios_lista_detalle->result() as $row): ?>
                                                          
                                                          <tr>
                                                          <td><?php echo $row->nb_producto; ?></td>
                                                          <td><?php echo $row->nb_tipo_empresa; ?></td> 
                                                          <td><?php echo $row->ca_precio_final; ?></td>
                                                        </tr>  

                                                        <?php endforeach; ?>
                                                        
                                                        
                                                      </tbody>
                                                    </table>

                                                  <?php else: ?>

                                                    Ningun Producto Agregado

                                                  <?php endif; ?>