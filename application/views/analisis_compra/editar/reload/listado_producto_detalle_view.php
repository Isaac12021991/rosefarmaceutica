<?php if ($info_lista_principal->nu_redondeo >= 0): $nu_redondeo_mostrar = $info_lista_principal->nu_redondeo; else: $nu_redondeo_mostrar = 0; endif; ?>

<table class="compact table dt-responsive" id="table" width="100%">
                    <thead>
                       <tr>
                        <th width="70%" class="all">Descripcion</th>
                        <th width="10%">Precio de cambio</th>     
                        <th width="10%" class="all">Precio publicado</th>      
                         <th width="10%" class="all"></th> 
                       </tr>
                    </thead> 
                    <tbody>

                        <?php  foreach ($info_precios_lista_detalle as $row): ?>

                               <tr>
                          <td> <b> <?php echo $row->nb_producto; ?> </b><br>Categoria: <?php echo $row->nb_categoria; ?>
                                <?php  if($row->nu_tasa_cambio != '' and $row->nu_tasa_cambio > 1): ?>
                                  <br>
                                  <span class="text-info fa fa-info"></span>
                                  Tasa de cambio personalizada: <b><?php echo $row->nu_tasa_cambio; ?> </b>
                                <?php endif; ?> </td>
                             <td> <?php echo $row->nu_precio_dolar; ?></td>
                            <td> <?php echo number_format($row->nu_precio_bs,$nu_redondeo_mostrar,',','.'); ?></td>
                              <td>
                                          <div class="task-config">
                     <div class="task-config-btn btn-group">
                        <a class="btn btn-sm blue" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="fa fa-ellipsis-h"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                           <li>
                              <a href='<?php echo site_url("precios_lista/editar_producto_form/$co_precios_lista/$row->id");?>' data-target="#producto_modal" data-toggle="modal"><span class="fa fa-edit"></span><b>Editar</b></a>
                           </li>

                           <li>
                              <a onclick="eliminar_producto(<?php echo $row->id; ?>)" title="Eliminar producto"> <i class="fa fa-trash"></i><b>Eliminar</b></a>
                           </li>

                        </ul>
                     </div>
                  </div>

                               </td>
                           
                            </tr>

                       
                     <?php endforeach; ?>   
                   </tbody>

                          
                  </table>

  <script type="text/javascript">


  $('#table').DataTable( {
  "order": [],
  "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]],
  stateSave: true,
  responsive: true
  } );
  </script>