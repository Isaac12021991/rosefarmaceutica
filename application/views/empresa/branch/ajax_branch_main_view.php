
                         <table class="table compact">
                    <thead>
                       <tr>
                        <th width="65%">Direccion</th>
                         <th width="30%">Estado</th>
                         <th width="5%">Acciones</th>
                       </tr>
                    </thead> 
                    <tbody>

                          <?php  foreach ($branch as $row) : ?>
                          <tr> 
                          <td><?php echo $row->nb_direccion; ?> </td>
                          <td><?php echo $row->nb_estado; ?> </td>
                          <td><a href="#" onclick="get_branch(<?php echo $row->id; ?>)"><li class="fa fa-edit"></li></a> 
                          <a href="#" onclick="delete_branch(<?php echo $row->id; ?>, <?php echo $row->co_empresa; ?>)"><li class="fa fa-trash"></li></a></td>
                              </tr>
                               <?php endforeach; ?>  
                              </tbody>
                              </table>

              