

<link href="<?php echo base_url() ?>css/acordeon/styles_acordeon.css" rel="stylesheet" type="text/css" />
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <div class="theme-panel visible-xs visible-sm" style="margin-top:0px;">
         <div class="toggler"> </div>
         <div class="toggler-close"> </div>
         <div class="theme-options">
            <div class="theme-option">
               <span> Menú </span>
            </div>
            <div class="page-sidebar">
               <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <?php  if ($this->usuario_library->permiso_evento('FACTURACION', 'IMPUESTOS')): ?>
                  <li class="nav-item">
                     <a  href='<?php echo site_url("monedas/nuevo_moneda");?>'>
                     <span class="title">Crear</span>
                     </a>
                  </li>
                  <?php endif; ?>

               </ul>
            </div>
         </div>
      </div>
      <!-- BEGIN PAGE HEADER-->

        <div class="page-bar">

                              <h4>Monedas </h4>
                              <div class="page-toolbar pull-left">
                             <?php  if ($this->usuario_library->permiso_evento('PRODUCTOS', 'CREAR')): ?>
                              <a class="btn blue btn-sm" href="<?php echo site_url("monedas/nuevo_moneda");?>"> Crear</a>
                               <?php endif; ?>
          
                              </div>

                          <div class="page-toolbar pull-right"></div>
                          </div>

                <h1 class="page-title">    </h1>
      <div class="row">
       <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 visible-md visible-lg">
     


              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a class="" role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Monedas
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                        <div class="panel-body">

                    <table width="100%">
                    <tr>
                    <td width="90%"><a href="<?php echo site_url('monedas/index')?>"> <span id="monedas"> Monedas  </span> </a></td>
                    <td width="10%"></td>
                    </tr>
                  </table>
                        </div>
                    </div>
                </div>

            </div>
   



    

            <div class="list-group">
               <span class="list-group-item active">
                  <h4 class="list-group-item-heading">Soporte Técnico</h4>
                  <p class="list-group-item-text"> Para ayuda y más informacion puede comunicarse con nosotros a traves de
                  <h6>soporte@wakuza.net</h6>
                  </p>
               </span>
            </div>
            <!-- END MENU -->
         </div>
         <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 ">

               <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <div class="portlet light">
         <div class="portlet-body"> 

                <?php if ($listado_monedas->num_rows() > 0) : ?>
            <table class="table table-condensed" id="tabla_1" width="100%">
               <thead>
                  <tr class="bg-blue-chambray bg-font-blue-chambray">
                     <th width="30%">Moneda</th>
                     <th width="20%">Acronimo</th>
                     <th width="15%">Simbolo</th>
                     <th width="15%">Redondeo Decimal</th>
                     <th width="15%">Acciones</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($listado_monedas->result() as $row) : ?>
                  <tr>
                     <td>  <?php echo $row->nb_moneda; ?> </td>
                     <td>  <?php echo $row->nb_acronimo; ?> </td>
                     <td>  <?php echo $row->nb_simbolo; ?> </td>
                     <td>  <?php echo $row->nu_redondeo; ?> </td> 
                     <td>


                     <div class="task-config">
                           <div class="task-config-btn btn-group">
                           
                              <a class="btn btn-sm blue" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <i class="fa fa-navicon"></i>
                              </a>
                              <ul class="dropdown-menu pull-right">


                       <?php  if ($this->usuario_library->permiso_evento('PRODUCTOS', 'MODIFICAR')): ?> 
                         <li>
                        <a href='<?php echo site_url("monedas/editar_moneda/$row->id");?>'>
                           <i class="fa fa-edit"></i> Editar
                        </a>
                          </li>
                        <?php endif; ?>


                      <?php  if ($this->usuario_library->permiso_evento('PRODUCTOS', 'ELIMINAR')): ?>
                        <li>
                        <a href="#" onclick="eliminar_moneda(<?php echo $row->id; ?>, '<?php echo $row->nb_moneda; ?>')" title="Eliminar producto"><i class="fa fa-trash"></i> Eliminar</a>
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
            <?php else: ?>
            <h4>Sin monedas</h4>
            <?php endif; ?>

         </div>
      </div>
   
</div>

            </div>
         </div>
      </div>
   </div>
   <!-- END CONTENT BODY -->
</div>

<div class="modal fade" id="ajax_remote" tabindex="-1">
   <div class="modal-dialog">
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


   $(document).ready(function(){

       $('#tabla_1').DataTable( {
   "responsive": true,
       "order": [],
   "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
   } );
   
   
   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('<div class="loader_panel_inside"> <div class="ball"></div><h6 align="center"><B>CARGANDO... ESPERE POR FAVOR</b></h6></div><br> <h3 align="center"><b>SIRE.</b></h3>');
   })
   

   }); // Fin ready
   
   



   
   
   function eliminar_moneda(co_producto, nb_producto)
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar producto',
   content: '¿Estas seguro que deseas eliminar '+nb_producto+' ?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_producto':co_producto},
   url: "<?php echo site_url('productos/eliminar_moneda') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
                notificacion_toas('info','Producto',obj.message);
   
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

