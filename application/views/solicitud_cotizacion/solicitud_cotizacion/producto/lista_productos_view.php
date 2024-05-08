                       <!--Registros temporales-->
                       <?php if($co_solicitud_cotizacion == 0): ?>

                      <?php if ($lista_productos->num_rows() > 0) : ?>
 
               <table class="table table-sm" id="tabla_1" width="100%">
                  <thead>
                     <tr>
                           <th width="12%" class="all">Producto</th>
                        <th width="12%" class="all">Cantidad</th>
                         <th width="15%" class="desktop">Accion</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($lista_productos->result() as $row) : ?>
                     <tr>

               <?php $array = json_decode($row->tx_carga, true); 

            foreach ($array as $key => $row_2): ?>

          <td><?php echo $row_2; ?></td> 
                                   

                <?php  endforeach; ?>

                <td>


                           <a href="javascript:" class="btn btn-icon btn-light btn-hover-primary btn-sm" onclick="eliminar_producto_temporal(<?php echo $row->id; ?>)">
                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                               <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                     <rect x="0" y="0" width="24" height="24"></rect>
                                                                     <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                     <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                                  </g>
                                                               </svg>
                                                               <!--end::Svg Icon-->
                                                            </span>
                                                         </a>

                        </td>
                     </tr>
                     <?php endforeach; ?>   
                  </tbody>
               </table>
               <?php else: ?>
               <h4>Sin registro</h4>

               <?php endif; ?>

               <?php endif; ?>



          <!--Registros completos-->



                       <?php if($co_solicitud_cotizacion != 0): ?>

                      <?php if ($lista_productos->num_rows() > 0) : ?>
 
               <table class="table table-sm" id="tabla_1" width="100%">
                  <thead>
                     <tr>
                           <th width="12%" class="all">Producto</th>
                        <th width="12%" class="all">Cantidad</th>
                         <th width="15%" class="desktop">Accion</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($lista_productos->result() as $row) : ?>
                     <tr>

                     <td> <?php echo $row->nb_producto; ?></td>
                     <td> <?php echo $row->ca_unidades; ?></td>

                <td>


                           <a href="javascript:" class="btn btn-icon btn-light btn-hover-primary btn-sm" onclick="eliminar_producto(<?php echo $row->id; ?>)">
                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                               <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                     <rect x="0" y="0" width="24" height="24"></rect>
                                                                     <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                     <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                                  </g>
                                                               </svg>
                                                               <!--end::Svg Icon-->
                                                            </span>
                                                         </a>

                        </td>
                     </tr>
                     <?php endforeach; ?>   
                  </tbody>
               </table>
               <?php else: ?>
               <h4>Sin registro</h4>

               <?php endif; ?>

               <?php endif; ?>


               <script type="text/javascript">
                  


                 
      function eliminar_producto_temporal(co_temp)
   {
   
                                                 $.ajax({
   method: "POST",
   data: {'co_temp':co_temp},
   url: "<?php echo site_url('solicitud_cotizacion/eliminar_producto_temporal') ?>",
   beforeSend: function(){  },
                }).done(function( data ) { 
   
               $("#reload_lista_productos").load('<?php echo site_url('solicitud_cotizacion/lista_productos/') ?>'+co_solicitud_cotizacion);
   

                 }).fail(function(){
   
               alert('Fallo');
   
   
                 }); 
      
      
   
   }

       function eliminar_producto(co_solicitud_cotizacion_linea)
   {
   
                                                 $.ajax({
   method: "POST",
   data: {'co_solicitud_cotizacion_linea':co_solicitud_cotizacion_linea},
   url: "<?php echo site_url('solicitud_cotizacion/eliminar_producto_solicitud_cotizacion_linea') ?>",
   beforeSend: function(){  },
                }).done(function( data ) { 
   
               $("#reload_lista_productos").load('<?php echo site_url('solicitud_cotizacion/lista_productos/') ?>'+co_solicitud_cotizacion);
   

                 }).fail(function(){
   
               alert('Fallo');
   
   
                 }); 
      
      
   
   }



               </script>
