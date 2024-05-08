              <?php if ($reporte_encuesta_detalle->num_rows() > 0) : ?>

                  <table class="table compact table-hover" id="tabla_2" width="100%" border="1">
                    <thead>
                       <tr>
                       <th width="6%">#</th>
                       <th width="10%">USUARIO</th>
                       <th width="20%">EMPRESA</th>
                       <th width="20%">RIF</th>
                       <th width="31%">DESCRIPCION</th>
                       <th width="15%">ESTATUS</th>
                       <th width="9%">FECHA</th>
                       <th width="9%">DURACION</th>
                       </tr>
                    </thead> 
                    <tbody>
                      <?php $con = 0; foreach ($reporte_encuesta_detalle->result() as $row) : $con ++; ?>
                          <tr style="cursor:pointer;">
                              <td><?php echo $con; ?> </td>
                                <td><?php echo $row->first_name; ?></td>
                                 <td><?php echo $row->nb_empresa; ?></td>
                                 <td><?php echo $row->nu_rif; ?></td>   
                                 <td><?php echo $row->nb_persona_contacto; ?> - <?php echo $row->tx_email; ?> - <?php echo $row->nu_telefono_local; ?> - <?php echo $row->nu_telefono_movil; ?></td>
                                   <td><?php echo $row->nb_estatus; ?></td>
                                   <td><?php 

                                  $fecha = strtotime($row->ff_registro);
                                   echo date("d-m-Y g:i:s a", $fecha)
                                   ?>

                                   </td>
                                   <td> <?php echo conversor_segundos($row->time_duracion_llamada); ?>
                                    
                                   </td>
                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

                                                   <?php else: ?>

                                      <h4>Sin Registro</h4>
                                      <p></p>


                                    <?php endif; ?>

    
