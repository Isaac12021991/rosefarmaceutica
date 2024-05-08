
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
               <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="1000" style="padding-top: 20px">
                <?php  if ($this->usuario_library->permiso_evento('INVENTARIO', 'CREAR')): ?>
                  <li class="nav-item">
                     <a  href='<?php echo site_url("inventario/index");?>'>
                     <span class="title">Inventario</span>
                     </a>
                  </li>
                                    <li class="nav-item">
                     <a  href='<?php echo site_url("inventario/tablero");?>'>
                     <span class="title">Indicadores</span>
                     </a>
                  </li>

                                  <li class="nav-item">
                     <a  href='<?php echo site_url("inventario/operaciones");?>'>
                     <span class="title">Operaciones</span>
                     </a>
                  </li>

                      <li class="nav-item">
                     <a  href='<?php echo site_url("despachos/index");?>'>
                     <span class="title">Despacho</span>
                     </a>
                  </li>

                    <li class="nav-item">
                     <a  href='<?php echo site_url("despachos/listado_despachos");?>'>
                     <span class="title">Movilizacion</span>
                     </a>
                  </li>

                  
                  <?php endif; ?>
               </ul>
            </div>
         </div>
      </div>
      <!-- BEGIN PAGE HEADER-->

        <div class="page-bar">

                              <h4>Despacho / Despachar  </h4>
                              <div class="page-toolbar pull-left">

     
   

                                <a class="btn default btn-sm" href="javascript:window.history.back();"> Descartar</a>
                                <?php if ($info_despacho->co_estatus == '48'): ?>
                                <a class="btn blue btn-sm" onclick="confirmar_despacho()">Confirmar</a>

                                <?php endif; ?>

    

                              </div>

                          <div class="page-toolbar pull-right"></div>
                          </div>

                <h1 class="page-title">    </h1>
      <div class="row">
       <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 visible-md visible-lg">
     
            <div  class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
               <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                     <h4 class="panel-title">
                        <a class="" role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="">
                        Inventario
                        </a>
                     </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                     <div class="panel-body">
                        <table width="100%">
                           <tr>
                              <td width="90%">
                                 <a href='<?php echo site_url("inventario/index");?>'>
                                    <span class="items_menu" id="listado_inventario">
                                       <li class="fa fa-caret-right"></li>
                                       Inventario 
                                    </span>
                                 </a>
                              </td>
                              <td width="10%"></td>
                           </tr>
                                                      <tr>
                              <td width="90%">
                                 <a href='<?php echo site_url("inventario/tablero");?>'>
                                    <span class="items_menu" id="tablero_inventario">
                                       <li class="fa fa-caret-right"></li>
                                       Indicadores 
                                    </span>
                                 </a>
                              </td>
                              <td width="10%"></td>
                           </tr>
                            <tr>
                              <td width="90%">
                                 <a href='<?php echo site_url("inventario/operaciones");?>'>
                                    <span class="items_menu" id="listado_operaciones">
                                       <li class="fa fa-caret-right"></li>
                                       Operaciones 
                                    </span>
                                 </a>
                              </td>
                              <td width="10%"></td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
            </div>

                        <div  class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
               <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingTwo">
                     <h4 class="panel-title">
                        <a class="" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="">
                        Despacho
                        </a>
                     </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                     <div class="panel-body">
                                                <table width="100%">
                           <tr>
                              <td width="90%"><a href='<?php echo site_url("despachos/index");?>'> <span class="items_menu" id="listado_nota_despachos"> Nota de despacho </span> </a></td>
                              <td width="10%"></td>
                           </tr>

                           <tr>
                              <td width="90%"><a href='<?php echo site_url("despachos/listado_despachos");?>'> <span class="items_menu" id="listado_despachos"> Movilizacion </span> </a></td>
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

                        <div id="controllers_facturacion_cliente">

                                               <div class="portlet light">
                                <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-speech"></i>
                                            <span class="caption-subject bold uppercase">  Despachar </span>
                                            <span class="caption-helper"></span>
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
                                         <label class="col-md-3 control-label"><b>Nota de despacho</b></label>
                                         <div class="col-md-9">
                                            <?php echo $info_despacho->nu_documento; ?>
                                         </div>
                                      </div>

   

                                                </div>
                                                <div class="col-lg-6">

                                   <div class="form-group">
                                         <label class="col-md-3 control-label"><b>Tipo de movimiento</b></label>
                                         <div class="col-md-9">
                                        <?php echo $info_despacho->tx_descripcion_movimiento; ?>
                                         </div>
                                      </div>
               

                                                </div>


                                                </div>

                                                 <div class="row">
                                             <div class="col-lg-6">



                                                         <div class="form-group"  id="almacen_origen_toggle">
                                   <label class="col-md-3 control-label"><b>Almacen</b></label>
                                   <div class="col-md-9">
                                    <?php echo $info_despacho->nb_almacen; ?>
          
                                   </div>
                                </div>



                                             </div>

                                           <div class="col-lg-6">

                                    <div class="form-group"  id="almacen_origen_toggle">
                                   <label class="col-md-3 control-label"><b>Estatus</b></label>
                                   <div class="col-md-9">
                                    <?php echo $info_despacho->nb_estatus; ?>
                                   </div>
                                </div>



                                             </div>
                                          </div>



                                            </div>

 
                                      </form>

                                      <div class="tabbable tabbable-tabdrop">
                                            <ul class="nav nav-tabs">

                                                <li class="active">
                                                    <a href="#tab1" data-toggle="tab">Linea de la nota de despacho</a>
                                                </li>
        
                                                                        
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                  <div id="div_reload_linea">
                                                  
                                                    
         <?php if ($list_despachos_detalle->num_rows() > 0) : ?>
         <table class="table table-striped table-hover">
            <thead>
               <tr>
                  <th> # </th>
                  <th> Descripcion </th>
                  <th> Cantidad </th>
                  <th> Cantidad real a despachar </th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               <?php $subtotal = 0;
                  $con = 0;
                  ?>
               <?php foreach ($list_despachos_detalle->result() as $row) : $con ++; ?>
               <tr>
                  <td> <?php echo $con; ?> </td>
                  <td>
                     <?php echo $row->nb_producto;  ?><br>
                     <h6>Lote: <?php echo $row->nu_lote; ?> - Vence:<?php echo $row->ff_vencimiento; ?></h6>
                  </td>
                  <td> <?php echo number_format($row->nu_unidades,'0',',','.'); ?> </td>
                   <td> 
                    <?php if ($info_despacho->co_estatus == '48'): ?>
                      <input type="text" class="form-control ca_real" name="<?php echo $row->id; ?>" value="<?php echo $row->nu_unidades; ?>">
                      <?php else: ?>
                        <?php echo number_format($row->ca_real,'0',',','.'); ?> 

                    <?php endif; ?>

                       </td>

                  <td>
 
                     </td>
               </tr>
               <?php endforeach; ?>   
            </tbody>
         </table>
         <?php else: ?>

          <p align="center">Sin datos que mostrar</p>

          <?php endif; ?>


                                                        </div>
                                                
                                                </div>
        
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
   <!-- /.modal-dialog -->
</div>


                  <div class="modal fade bs-modal-lg" id="ajax_remote" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>



<script type="text/javascript"> 


      function confirmar_despacho() 
   
   {

       var ca_real = $('.ca_real').serializeArray();
       var co_nota_despacho = '<?php echo $co_nota_despacho; ?>';

        $.ajax({
           method: "POST",
           data: {'ca_real':ca_real, 'co_nota_despacho':co_nota_despacho},
           url: "<?php echo site_url('despachos/confirmar_despacho_ejecutar') ?>",
           beforeSend: function(){  },
                        }).done(function( data ) { 
   
                         var obj = JSON.parse(data);

                         if (obj.error > 0)

                         {
                           
                           notificacion_toas('error','Error',obj.message);

                         }else{

                        location.reload();

                           
                         }
                         
   
   
                         }).fail(function(){
   
                       alert('Error de conexion');
   
   
                         }); 
   
   
   }
   



   
                                      
</script>
