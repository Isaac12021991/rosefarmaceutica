

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
                <?php  if ($this->usuario_library->permiso_evento('ALMACEN', 'CREAR')): ?>
                  <li class="nav-item">
                     <a  href='<?php echo site_url("pagos/crear_pago");?>'>
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

                              <h4>Pagos </h4>
                              <div class="page-toolbar pull-left">
                              <?php  if ($this->usuario_library->perfil(array('ADMINISTRADOR'))): ?>
                              <a class="btn blue btn-sm" href="<?php echo site_url("pagos/crear_pago");?>"> Crear</a>
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
                                Pagos
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                        <div class="panel-body">

                    <table width="100%">
                    <tr>
                    <td width="90%"><a href="<?php echo site_url('pagos/index/cliente')?>"> <span id="pago_cliente"> Cliente  </span> </a></td>
                    <td width="10%"></td>
                    </tr>

                    <tr>
                    <td width="90%"><a href="<?php echo site_url('pagos/index/proveedor')?>"> <span id="pago_proveedores"> Proveedores  </span> </a></td>
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

               <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <div class="portlet light">
         <div class="portlet-body"> 


                            <?php if ($list_pagos->num_rows() > 0) : ?>
                     <table class="table table-striped table-hover" id="tabla_1">
                        <thead>
                           <tr>
                              <th class="hidden-xs" width="25%">REFERENCIA</th>
                              <th class="hidden-xs" width="25%">BANCO ORIGEN</th>
                              <th width="25%">CUENTA DESTINO</th>
                              <th width="15%">FECHA</th>
                              <th width="20%">MONTO</th>
                              <th width="15%">ACCIONES</th>
                           </tr>
                        </thead>
                        <tbody>
                                                
                           <?php foreach ($list_pagos->result() as $row) : ?>
                           <tr >
                              <td class="hidden-xs">
                                 <?php if ($row->in_verificado > 0) : ?>  
                                 <span class="badge badge-success badge-roundless">
                                    <li class="fa fa-check"></li>
                                    ¡verificado! 
                                 </span>
                                 <?php endif; ?><?php if ($row->nb_url == '') : ?><?php echo $row->nu_referencia;
                                                                                    else : ?>  <?php echo $row->nu_referencia; ?>  
                                 <a target="_blank" href="<?php echo base_url() ?>archivos/orden_compra_entrada/financiero/<?php echo $row->nb_url; ?>">
                                    <li class="fa fa-paperclip"></li>
                                    Adjunto
                                 </a>
                                 <?php endif; ?> 
                              </td>
                              <td class="hidden-xs"><?php echo $row->nb_banco; ?> </td>
                              <td><?php echo $row->nb_banco_destino . ' (' . $row->nu_cuenta . ')'; ?> </td>
                              <td><?php echo date_user($row->ff_pago); ?> </td>
                              <td><?php echo $row->ca_pago; ?> </td>
                              <td>
                                 <?php if ($row->in_verificado == 0) : ?>

                                 


                                 <?php endif; ?>

                                 <?php if ($row->in_verificado == 0) : ?>

                                                      <div class="task-config">
                           <div class="task-config-btn btn-group">
                           
                              <a class="btn btn-sm blue" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <i class="fa fa-navicon"></i>
                              </a>
                              <ul class="dropdown-menu pull-right">


                           <li>
                                 <a href="#" onclick="eliminar_avance(<?php echo $row->id; ?>)"><i class="fa fa-trash"></i> Eliminar</a>
                          </li>

                           <li>
                        <a  href='<?php echo site_url("orden_compra_entrada/adjuntar_archivo_orden_compra_financiero/$row->id"); ?>' data-target="#ajax_remote" data-toggle="modal"><i class="fa fa-upload"></i> Adjuntar pago</a>
                      </li>

                              </ul>
                           </div>
                        </div>

                         <?php endif; ?>
                              </td>
                           </tr>
                           <?php endforeach; ?>                           
                        </tbody>
                     </table>                     
                     <?php endif; ?>



         </div>
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
      
   }); // Fin ready

  $('#ajax_remote').on('hidden.bs.modal', function (e) {
    location.reload();
   });
   
   $('#tipo_divisa').focus(); 


   function eliminar_avance(co_avance_financiero) {
   $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar registro',
   content: '¿Deseas eliminar este avance?',
    type: 'blue',
   animation: 'opacity',
   escapeKey: 'no',
   buttons: {   
   si: function () {
   $.ajax({
    method: "POST",
    data: {'co_avance_financiero':co_avance_financiero},
    url: "<?php echo site_url('orden_compra_entrada/eliminar_avance_financiero') ?>",
    beforeSend: function(){  },
    }).done(function( data ) { 
        var obj = JSON.parse(data);

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

