<script src="<?php echo base_url() ?>assets/global/plugins/handsontable-pro-master/dist/handsontable.full.min.js"></script>
<link href="<?php echo base_url() ?>assets/global/plugins/handsontable-pro-master/dist/handsontable.full.min.css" rel="stylesheet">
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

                  <?php  if ($this->usuario_library->permiso_evento('LISTA DE PRECIO', 'CREAR')): ?> 
                  <li class="nav-item">
                     <a href="<?php echo site_url("precio_lista/crear_lista_precio_carga_masiva");?>">
                     <span class="title">Crear lista de precio</span>
                     </a>
                  </li>

               <?php endif; ?>

               </ul>
            </div>
         </div>
      </div>
      <!-- BEGIN PAGE HEADER-->

        <div class="page-bar">

                              <h4>Analisis proveedor / Nueva </h4>
                              <div class="page-toolbar pull-left">
                              <?php  if ($this->usuario_library->permiso_evento('LISTA DE PRECIO', 'CREAR')): ?> 
                              <a class="btn blue btn-sm" id="actualizar_analisis_proveedor" onclick="actualizar_analisis_proveedor()"> Guardar</a>
                               <?php endif; ?>

                              <a class="btn btn-default btn-sm" href="javascript:window.history.back();"> Descartar</a>


                            <a class="btn btn-default btn-sm" href='<?php echo site_url("analisis_proveedor/agregar_lista_proveedor_linea/$info_analisis_proveedor->id");?>' data-target="#ajax_remote" data-toggle="modal"> Agregar
                           </a>

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
                        Analisis proveedor
                        </a>
                     </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                     <div class="panel-body">

                        <table width="100%">
                           <tr>
                              <td width="90%"><a href='<?php echo site_url("analisis_proveedor/index");?>'> <span class="items_menu" id="lista_precios_recientes"> Recientes </span> </a></td>
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
                                <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-speech"></i>
                                            <span class="caption-subject bold uppercase">Nuevo</span>
                                            <span class="caption-helper">nuevo </span>
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
                                                  <label class="col-md-3 control-label"><b>Nombre</b></label>

                                                  <div class="col-md-9">
                         <input type="text" name="nb_analisis_proveedor" id="nb_analisis_proveedor" class="form-control input-sm input-lg" placeholder="Nombre" value="<?php echo $info_analisis_proveedor->nb_lista; ?>"> 

                         </div>

                                                </div>

                                                                  <div class="form-group">
                                      <label class="control-label col-md-3"><b>Moneda</b></label>
                                      <div class="col-md-9">

                                 <select class="form-control input-sm" id="co_moneda" name="co_moneda">
                            <option value="">Seleccione ...</option>
                                          <?php foreach($lista_monedas->result() as $row){

                                            if ($row->id == $info_analisis_proveedor->co_moneda):
                                            echo "<option selected='selected' value='".$row->id."'>".$row->nb_moneda."</option>";
                                            continue; endif;

                                         echo "<option value='".$row->id."'>".$row->nb_moneda."</option>";

                                          } ?>
                                          </select>  
                  </div>

                      </div>


   

                                                </div>
                                                <div class="col-lg-6">

                              <div class="form-group">
                                      <label class="control-label col-md-3"><b>Proveedor</b></label>
                                      <div class="col-md-9">

                                 <select class="form-control input-sm" id="co_contacto" name="co_contacto">
                            <option value="">Seleccione ...</option>
                                          <?php foreach($lista_proveedores->result() as $row){


                                            if ($row->id == $info_analisis_proveedor->co_contacto):
                                            echo "<option selected='selected' value='".$row->id."'>".$row->nb_cliente."</option>";
                                            continue; endif;

                                         echo "<option value='".$row->id."'>".$row->nb_cliente."</option>";


                                          } ?>
                                          </select>  
                  </div>

                      </div>

                                                </div>
                                              </div>

    
                                            </div>

 
                                      </form>

                                      <div class="row">

                                         <div class="col-lg-12">
                                        
                                        <div class="tabbable tabbable-tabdrop">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab1" data-toggle="tab">Productos</a>
                                                </li>
                                                 
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                    
                                                      <?php if ($info_analisis_proveedor_detalle->num_rows() > 0) : ?>
            <table class="table table-striped table-hover dt-responsive table-condensed" id="table_1" width="100%">
               <thead>
                  <tr class="bg-blue-chambray bg-font-blue-chambray">
                    <th class="all" width="5%"></th>
                     <th class="all" width="30%">Producto</th>
                     <th class="all" width="30%">Descripcion</th>
                     <th class="all" width="10%">Precio</th>
                     <th width="10%">Unidad de manejo</th>
                     <th class="all" width="10%">Acciones</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $con = 0;  ?>
                  <?php foreach ($info_analisis_proveedor_detalle->result() as $row) : $con ++; ?>
                  <tr>
                     <td><?php echo $con; ?> </td>
                     <td><?php echo $row->nb_producto; ?> </td>
                     <td><?php echo $row->tx_descripcion; ?> </td>
                     <td><?php echo $row->ca_precio; ?> </td>
                     <td><?php echo $row->ca_unidad_manejo; ?> </td>
                     <td>
                        <?php  if ($this->usuario_library->perfil(array('ADMINISTRADOR'))): ?>
                        <div class="task-config-btn btn-group">
                           <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                           <i class="fa fa-cog"></i>
                           <i class="fa fa-angle-down"></i>
                           </a>
                           <ul class="dropdown-menu pull-right">
                              <li>

                            <a href='<?php echo site_url("analisis_proveedor/editar_lista_proveedor_linea/$row->id");?>' data-target="#ajax_remote" data-toggle="modal">
                              <i class="fa fa-copy "></i> <b>Editar</b>
                           </a>

                              </li>
                              <li>
                                 <a href="javascript:;" onclick="eliminar_lista_analisis_proveedor_linea(<?php echo $row->id; ?>)">
                                 <i class="fa fa-trash-o"></i> <b>Eliminar</b> </a>
                              </li>
                           </ul>
                        </div>
                        <?php endif; ?>
                     </td>
                  </tr>
                  <?php endforeach; ?>   
               </tbody>
            </table>
            <?php else: ?>
            <h4>Sin producto cargados</h4>
            <p></p>
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

   document.title = 'Analisis de proveedor';

   $(document).ready(function() {


    $('#table_1').DataTable( {
      "order": [],
      "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]],
       stateSave: true,
       responsive: true
       } );



   }); // Fin ready


   function eliminar_lista_analisis_proveedor_linea(co_analisis_lista_proveedor_linea) 
   
   {
      $.confirm({
       backgroundDismiss: false,
       backgroundDismissAnimation: 'glow',
         theme: 'material', 
       title: 'Eliminar',
       content: '¿Estas seguro que deseas eliminar este producto ?.',
           type: 'red',
       animation: 'opacity',
       autoClose: 'no|10000',
       escapeKey: 'no',
       buttons: {
        si: function () {
         $.ajax({
           method: "POST",
           data: {'co_analisis_lista_proveedor_linea':co_analisis_lista_proveedor_linea},
           url: "<?php echo site_url('analisis_proveedor/eliminar_lista_analisis_proveedor_linea') ?>",
           beforeSend: function(){ },
                        }).done(function( data ) { 
                         var obj = JSON.parse(data);              

                        location.reload();

                         }).fail(function(){
   
                            alert('Error de conexion');
   
   
                         }); 
              
       
   
           },
           no: function () {
   
              
           },
     
       }
   });
   
   
   }


   function actualizar_analisis_proveedor()
   {


           var co_analisis_proveedor = '<?php echo $info_analisis_proveedor->id; ?>';
           var nb_analisis_proveedor = $('#nb_analisis_proveedor').val(); 
           var co_moneda = $('#co_moneda').val(); 
           var co_contacto = $('#co_contacto').val(); 


                  if (nb_analisis_proveedor == '') {
   
   notificacion_toas('error','Error','Ingrese el nombre del proveedor');
   $('#nb_analisis_proveedor').focus();
              return;
   
       };
   

       if (co_moneda == '') {
   
   notificacion_toas('error','Error','Seleccione la moneda');
   $('#co_moneda').focus();
              return;
   
       };
   
     
   
                                  $.ajax({
           method: "POST",
           data: {'co_analisis_proveedor':co_analisis_proveedor, 'co_moneda':co_moneda, 'nb_analisis_proveedor':nb_analisis_proveedor, 'co_contacto':co_contacto},
           url: "<?php echo site_url('analisis_proveedor/editar_ejecutar_analisis_proveedor') ?>",
           beforeSend: function(){  },
                        }).done(function( data ) { 
   
                         var obj = JSON.parse(data);
   
                         if (obj.error > 0)
   
                         {
   
                          notificacion_toas('error','Error',obj.message);
                           return;
   
   
                         }else{
   

                             location.reload();
   
   
                         }
   
   
      
                         }).fail(function(){
   
   
                       alert('Fallo');
   
   
                         }); 
   
   
   
   }



</script>