

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
                <?php  if ($this->usuario_library->permiso_evento('PRODUCTOS', 'CREAR')): ?>
                  <li class="nav-item">
                     <a  href='<?php echo site_url("productos/nuevo_producto");?>'>
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

                              <h4>Monedas / Editar </h4>
                              <div class="page-toolbar pull-left">
                             <?php  if ($this->usuario_library->permiso_evento('PRODUCTOS', 'CREAR')): ?>
                              <a class="btn blue btn-sm" onclick="actualizar_moneda()"> Guardar</a>
                               <?php endif; ?>
                                <a class="btn btn-default btn-sm" href="javascript:window.history.back();"> Descartar</a>
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
                                Productos
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                        <div class="panel-body">

                    <table width="100%">
                    <tr>
                    <td width="90%"><a href="<?php echo site_url('productos/index')?>"> <span id="productos"> Productos  </span> </a></td>
                    <td width="10%"></td>
                    </tr>

                     <tr>
                    <td width="90%"><a href="<?php echo site_url('categorias_productos/listado_categorias_productos')?>"> <span id="productos"> Categorias  </span> </a></td>
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
            <div id="controllers_presupuesto">

                                               <div class="portlet light">
                                <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-speech"></i>
                                            <span class="caption-subject bold uppercase">Editar</span>
                                            <span class="caption-helper">editar moneda</span>
                                        </div>

                                        <div class="actions">
  
                                        </div>
                                    </div>
                                    <div class="portlet-body">

                                     <form class="form-horizontal" role="form">

                                            <div class="form-body">


                                            <div class="row">
                                             <div class="col-lg-6">

        

                    <div class="form-group">
               <label class="col-md-3 control-label"><b>Moneda</b></label>
               <div class="col-md-9">
                  <input type="text" name="nb_moneda" id="nb_moneda" class="form-control input-lg" placeholder="Moneda" value="<?php echo $info_moneda->nb_moneda; ?>"> 
               </div>
            </div>

                    <div class="form-group">
               <label class="col-md-3 control-label"><b>Acronimo</b></label>
               <div class="col-md-9">
                  <input type="text" name="nb_acronimo" id="nb_acronimo" class="form-control input-lg" placeholder="Acronimo" value="<?php echo $info_moneda->nb_acronimo; ?>"> 
               </div>
            </div>

   

                                                </div>
                                                <div class="col-lg-6">

                    <div class="form-group">
               <label class="col-md-3 control-label"><b>Simbolo</b></label>
               <div class="col-md-9">
                  <input type="text" name="nb_simbolo" id="nb_simbolo" class="form-control input-lg" placeholder="Simbolo" value="<?php echo $info_moneda->nb_simbolo; ?>"> 
               </div>
            </div>

                               <div class="form-group">
               <label class="col-md-3 control-label"><b>Redondeo Decimal</b></label>
               <div class="col-md-9">
                  <input type="text" name="nu_redondeo" id="nu_redondeo" class="form-control input-lg" placeholder="Simbolo" value="<?php echo $info_moneda->nu_redondeo; ?>"> 
               </div>
            </div>


                                                </div>


                                                </div>

                                                                                               <div class="row">
                                                  <div class="col-md-12">

                                                                                            <div class="tabbable tabbable-tabdrop">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab1" data-toggle="tab">Tasa de cambio</a>
                                                </li>                                
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">


                                                    
                                     <form class="form-horizontal" role="form">

                                            <div class="form-body">

                                                 <div class="row">
                                             <div class="col-lg-12">

                                                              <?php if ($info_moneda_tasa_cambio->num_rows() > 0) : ?>
            <table class="table table-condensed" id="tabla_1" width="100%">
               <thead>
                  <tr class="bg-blue-chambray bg-font-blue-chambray">
                     <th width="30%">Moneda</th>
                     <th width="20%">Tasa de Cambio</th>
                     <th width="15%">Fecha</th>
                     <th width="15%">Acciones</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($info_moneda_tasa_cambio->result() as $row) : ?>
                  <tr>
                     <td>  <?php echo $row->nb_moneda; ?> </td>
                     <td>  <?php echo $row->ca_tasa_cambio; ?> </td>
                     <td>  <?php echo $row->ff_sistema; ?> </td>
                     <td>


                     <div class="task-config">
                           <div class="task-config-btn btn-group">
                           
                              <a class="btn btn-sm blue" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <i class="fa fa-navicon"></i>
                              </a>
                              <ul class="dropdown-menu pull-right">

                       <?php  if ($this->usuario_library->permiso_evento('PRODUCTOS', 'MODIFICAR')): ?> 
                         <li>

                        <a href='<?php echo site_url("monedas/editar_tasa_cambio/$row->id/$co_moneda");?>' data-target="#ajax_remote" data-toggle="modal">Editar</a>

                          </li>
                        <?php endif; ?>


                      <?php  if ($this->usuario_library->permiso_evento('PRODUCTOS', 'ELIMINAR')): ?>
                        <li>
                        <a href="#" onclick="eliminar_tasa_cambio(<?php echo $row->id; ?>, '<?php echo $row->nb_moneda; ?>')" title="Eliminar producto"><i class="fa fa-trash"></i> Eliminar</a>
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
            <h4>Sin tasa de cambios</h4>
            <?php endif; ?>

       <a class="btn btn blue" href='<?php echo site_url("monedas/nueva_tasa_cambio/$co_moneda");?>' data-target="#ajax_remote" data-toggle="modal">
                                                            <i class="fa fa-plus"></i> Agregar </a>

                                                </div>
                  
                                              </div>

     
                                              </div>

                                            </form>



                                                </div>
     
                    
                                            </div>
                                        </div>


                                                  </div>

                                                 </div>

     

                                            </div>

 
                                      </form>

     

                                   </div>
                                </div>


            </div>
         </div>
      </div>
   </div>
   <!-- END CONTENT BODY -->
</div>



                                            <div class="modal fade bs-modal-lg" id="ajax_remote" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                 <div class="modal-content">
                                                    <div class="modal-body">
                                                        <span> &nbsp;&nbsp;Cargando... </span>
                                                    </div>
                                                </div>

                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>


<script type="text/javascript">
   function actualizar_moneda()
   {              
                  var co_moneda = '<?php echo $co_moneda; ?>';
                  var nb_moneda = $('#nb_moneda').val();
                  var nb_acronimo = $('#nb_acronimo').val();
                  var nb_simbolo = $('#nb_simbolo').val();
                  var nu_redondeo = $('#nu_redondeo').val();

             
         if (nb_moneda == '') {
   
            notificacion_toas('error','Monedas','Ingrese el nombre de la moneda');
           $('#nb_moneda').focus();
            return;
   
       };
   
   
       if (nb_acronimo == '') {
   
   
           notificacion_toas('error','Monedas','Ingrese el acronimo de la moneda');
           $('#nb_acronimo').focus();
            return;
   
       };

              if (nb_simbolo == '') {
   
   
           notificacion_toas('error','Monedas','Ingrese el simbolo de la moneda');
           $('#nb_simbolo').focus();
            return;
   
       };


              if (nu_redondeo == '') {
   
   
           notificacion_toas('error','Monedas','Ingrese el redondeo de la moneda');
           $('#nu_redondeo').focus();
            return;
   
       };
   
   
   
                                  $.ajax({
           method: "POST",
           data: {'co_moneda':co_moneda, 'nb_moneda':nb_moneda, 'nb_acronimo':nb_acronimo, 'nb_simbolo':nb_simbolo, 'nu_redondeo':nu_redondeo},
           url: "<?php echo site_url('monedas/actualizar_moneda') ?>",
           beforeSend: function(){  },
                        }).done(function( data ) { 
   
                         var obj = JSON.parse(data);
   
                         if (obj.error > 0)
   
                         {
   
                           notificacion_toas('error','Moneda',obj.message);
                           return;
   
   
                         }else{
   

                     $(location).attr('href',"<?php echo site_url() ?>monedas/index");
   
   
                         }
   
   
      
                         }).fail(function(){
   
                       alert('Fallo');
   
   
                         }); 
   
   
   
   }
   
   

   
   
   
                                      
</script>


<script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>