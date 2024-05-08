
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->

        <div class="page-bar">

                              
                              <div class="page-toolbar pull-left">
                                 <h4>Empresa </h4>
                               
                                <a class="btn btn-default btn-sm" href="javascript:window.history.back();"> Descartar</a>
                              </div>

                          <div class="page-toolbar pull-right"></div>
                          </div>

                <h1 class="page-title">    </h1>
      <div class="row">
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 ">
          </div>

         <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 ">


                          <?php if (isset($partner)) : ?>
                <?php if ($partner->num_rows() > 0) : ?>
                  <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                     <thead>
                        <tr>
                          <th width="20%">Empresa</th>
                           <th class="hidden-xs hidden-sm"  width="10%">Identificacion</th>
                           <th class="hidden-xs hidden-sm" width="10%">Estado</th>
                           <th class="hidden-xs hidden-sm"  width="20%">Direccion</th>
                           <th width="5%">Accion</th>
                        </tr>
                     </thead>
                     <tbody>
                      <?php foreach ($partner->result() as $row) : ?>
                        <tr <?php if($this->ion_auth->co_partner() == $row->id):?> class="success"  <?php endif; ?>>
                            <td><?php echo $row->nb_tipo_empresa; ?><br><?php echo $row->nb_empresa; ?> <br>Sicm: <?php echo $row->cod_sicm; ?>
                             <span  class="hidden-md hidden-lg"> <br><?php echo $row->nu_rif; ?> </span> </td>
                           <td class="hidden-xs hidden-sm"><?php echo $row->nu_rif; ?> </td>
                           <td class="hidden-xs hidden-sm"><?php echo $row->nb_estado; ?> <br> <?php echo $row->nb_municipio; ?> <br> <?php echo $row->nb_parroquia; ?> </td>
                           <td class="hidden-xs hidden-sm"><?php echo $row->tx_direccion; ?> </td>
                           <td>                         


                     <div class="task-config">
                           <div class="task-config-btn btn-group">
                           
                              <a class="btn btn-sm blue" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <i class="fa fa-navicon"></i>
                              </a>
                              <ul class="dropdown-menu pull-right">

                         <li>
                        <a href="#" onclick="cambiar_partner(<?php echo $row->id; ?>)" title="Cambiar de empresa"><i class="fa fa-exchange"></i> Cambiar</a>
                      </li>


                           <?php if($this->usuario_library->permiso_empresa_obtener($row->id, "'Administrador'")): ?>
                         <li>
                        <a href='<?php echo site_url("partner/editar_partner/$row->id");?>'>
                           <i class="fa fa-edit"></i> Editar
                        </a>
                          </li>

                        <li>
                        <a href="#" onclick="eliminar_partner(<?php echo $row->id; ?>)" title="Eliminar"><i class="fa fa-trash"></i> Eliminar</a>
                      </li>

                         <?php endif; ?>


                         </ul>
                           </div>
                        </div>


                    </td>
                        </tr>
                        <?php endforeach; ?>
                        
                     </tbody>
                  </table>
                  <?php endif; ?>
                  <?php else: ?>
                    <h4>Sin resultados</h4>
                  <?php endif; ?>

         </div>
                 <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 ">
          </div>
      </div>
   </div>
   <!-- END CONTENT BODY -->
</div>


   <!-- /.modal-dialog -->
</div>
<div class="modal fade bs-modal-lg" id="ajax_remote" tabindex="-1">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-body">
            <div class="loader_panel_inside">
               <div class="ball"></div>
               <h6 align="center"><B>CARGANDO... ESPERE POR FAVOR</b></h6>
            </div>
            <br> 
            <h3 align="center"><b>SIRE.</b></h3>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>

                                
<script type="text/javascript">

   
   if ( $("#nav_cuenta").length > 0 ) {
 $("#nav_cuenta").addClass('active open');
}

   if ( $("#nav_cuenta_arrow").length > 0 ) {
  $("#nav_cuenta_arrow").addClass('arrow open');
}




 $(document).ready(function(){


      }); // Fin ready





   function eliminar_partner(co_partner)
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar partner',
   content: '¿Estas seguro que deseas eliminar',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_partner':co_partner},
   url: "<?php echo site_url('partner/eliminar_partner') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
                notificacion_toas('info','Eliminar',obj.message);
   
           location.reload();
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   
   
   
   }

      function cambiar_partner(co_partner)
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Cambiar de empresa',
   content: '¿Estas seguro que deseas cambiar de empresa?',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
          $.ajax({
   method: "POST",
   data: {'co_partner':co_partner},
   url: "<?php echo site_url('partner/cambiar_partner') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
                notificacion_toas('info','Cambiar',obj.message);
   
           location.reload();
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   
   
   
   }



   
   
  </script>

