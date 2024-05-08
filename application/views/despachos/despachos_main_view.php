

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


               </ul>
            </div>
         </div>
      </div>
      <!-- BEGIN PAGE HEADER-->

        <div class="page-bar">

                              <h4>Notas de despachos / entrega </h4>
                              <div class="page-toolbar pull-left">
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
                                 <a href='<?php echo site_url("inventario/tablero");?>'>
                                    <span class="items_menu" id="tablero_inventario">
                                       <li class="fa fa-caret-right"></li>
                                       Tablero 
                                    </span>
                                 </a>
                              </td>
                              <td width="10%"></td>
                           </tr>
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
            <div id="controllers_presupuesto">

               <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <div class="portlet light">
         <div class="portlet-body"> 

             <?php if ($list_nota_despachos->num_rows() > 0) : ?>
            <table class="table table-hover dt-responsive" id="tabla_1" width="100%">
               <thead>
                  <tr>
                     <th class="all" width="5%">#</th>
                     <th width="10%">Fecha</th>
                     <th class="all" width="30%">Operacion</th>
                     <th class="desktop" width="20%">Nota de despacho n°</th>
                     <th class="desktop" width="10%">Almacen</th>
                     <th width="5%" class="all"></th>
                  </tr>
               </thead>
               <tbody>
                  <?php $con = 0;
                     $total_inventario = 0;  ?>
                  <?php foreach ($list_nota_despachos->result() as $row) : $con ++; ?>
                  <tr <?php if ($row->co_estatus == '48'): ?> class="font-blue" <?php endif; ?>>
                     <td><?php echo $con; ?> </td>
                     <td><?php echo $row->ff_creacion; ?> </td>
                     <td>
                  <?php echo $row->tx_descripcion_movimiento; ?><br>
                           <?php if ($row->id_documento_origen != ''): ?>
                        <?php $info_despacho_documento = $this->despacho_library->get_despachos_id_documento($row->id_documento_origen); ?>

                              <?php foreach ($info_despacho_documento->result() as $row_two): ?>
                                 <span style="font-size:10px">
                                 <b>Cliente:</b> <?php echo $row_two->nb_cliente; ?>,  <?php echo $row_two->nb_documento; ?>: <?php echo $row_two->nu_documento; ?>
                                <br>
                                 Tipo de pago: <?php echo $row_two->nb_tipo_pago; ?>, Emitida el: <?php echo date_user($row_two->ff_emision); ?>
                                 <br>
                                 Vendedor(a): <?php echo $row_two->first_name; ?><br>
                                 </span>

                             <?php endforeach; ?>

                           <?php endif; ?>

                     </td>
                     <td><?php echo $row->nu_documento; ?><br>
                     <span style="font-size:10px"><?php echo $row->nb_estatus; ?></span> </td>
                     <td><?php echo $row->nb_almacen; ?> </td>
                     <td>
                        <div class="task-config-btn btn-group">
                           <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                           <i class="fa fa-cog"></i>
                           <i class="fa fa-angle-down"></i>
                           </a>
                           <ul class="dropdown-menu pull-right">

                     <?php if ($row->co_estatus == '48'): ?>


                     <?php if ($row->nb_movimiento == 'IN'): ?>

                        <?php if ($row->co_almacen == ''): ?>
                              <li>
                  <a  href='<?php echo site_url("despachos/certificar_despacho/$row->id");?>' data-target="#ajax_remote  " data-toggle="modal"> <i class="fa fa-check"></i> Certificar entrada
                           </a>  
                           </li> 

                           <?php else: ?>

                                                     <li>
                        <a onclick="certificar_entrada_almacen(<?php echo $row->id; ?>, <?php echo $row->co_almacen; ?>)" >
                           <i class="fa fa-check"></i> Certificar entrada
                        </a>
                     </li>


                           <?php endif; ?>
                     
                     <?php else: ?>
                        <li>
                        <a href='<?php echo site_url("despachos/listado_despachos_detalle/$row->id");?>' >
                           <i class="fa fa-check"></i> Confirmar despacho
                        </a>
                     </li>

                     <?php endif; ?>

                        <?php endif; ?>

                        <li>
                     <a onclick="imprimir_documento_despacho(<?php echo $row->id; ?>)" >
                           <i class="fa fa-file-pdf-o"></i> Imprimir
                        </a>
                     </li>



                           </ul>
                        </div>
                     </td>
                  </tr>
                  <?php endforeach; ?>   
               </tbody>
            </table>
            <?php else: ?>
            <h4>Sin ninguna operacion</h4>
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
   
             jQuery('#ajax_modal').on('hidden.bs.modal', function (e) {
     jQuery(this).removeData('bs.modal');
     jQuery(this).find('.modal-content').html('<div class="loader_panel_inside"> <div class="ball"></div><h6 align="center"><B>CARGANDO... ESPERE POR FAVOR</b></h6></div><h3 align="center"><b>SIRE.</b></h3>');
   })
   
         function imprimir_documento_despacho(co_nota_despacho) 
   {

      $.confirm({
         backgroundDismiss: false,
         backgroundDismissAnimation: 'glow',
         theme: 'material', 
         title: 'Nota de despacho',
         content: '¿Seguro de imprimir Nota de Despacho?.',
         type: 'blue',
         animation: 'opacity',
         escapeKey: 'cancelar',
         buttons: {
            No: function () {
         
            },
            Si: function () {

               window.open("<?php echo site_url() ?>/despachos/imprimir_documento_despacho_pdf"+"/"+co_nota_despacho+"", "_blank");

         
               },
            
            }  
         });
   }
   

   function listado_nota_despacho(){

   $(location).attr('href',"<?php echo site_url() ?>despachos/index"); 
   
   }
   
   function listado_despachos(){
   
     $(location).attr('href',"<?php echo site_url() ?>despachos/listado_despachos"); 
   
   }
   
   function listado_recepcion(){
   

        $(location).attr('href',"<?php echo site_url() ?>despachos/get_despachos_recepcion"); 
   
   }
   

   
   function ver_detalle_despacho_recepcion(co_documento) {
   
         $('#controllers_despachos').html(' <h4 align="center"> <b>Cargando Información ...</b> </h4>');
   
       $("#controllers_despachos").load('<?php echo site_url('despachos/listado_despachos_detalle_recepcion') ?>' + '/' + co_documento);
   
     // body...
   }
   

  

         function confirmar_despacho(co_nota_despacho) 
   {
      $.confirm({
         backgroundDismiss: false,
         backgroundDismissAnimation: 'glow',
         theme: 'material', 
         title: 'Nota de despacho',
         content: '¿Esta seguro que deseas confirmar este despacho?.',
         type: 'blue',
         animation: 'opacity',
         escapeKey: 'cancelar',
         buttons: {
            No: function () {
         
            },
            Si: function () {


               $.ajax({
                  method: "POST",
                  data: {'co_nota_despacho':co_nota_despacho},
                  url: "<?php echo site_url('despachos/confirmar_despacho') ?>",
                  beforeSend: function(){  },
                           }).done(function( data ) { 

                              var obj = JSON.parse(data);
                              notificacion_toas('info','Documento',obj.message);
                              
                              location.reload();
                              
                            }).fail(function(){
                  
                              alert('Fallo creacion de Nota Despacho');
   
                  }); 



         
               },
            
            }  
         });
   }
   
   
function certificar_entrada_almacen(co_nota_despacho, co_almacen)
{


    $.confirm({
    backgroundDismiss: false,
    backgroundDismissAnimation: 'glow',
      theme: 'material', 
     title: 'Nota de despacho',
     content: '¿Esta seguro que deseas confirmar este despacho?.',
        type: 'blue',
    animation: 'opacity',
    autoClose: 'no|10000',
    escapeKey: 'no',
    buttons: {
        si: function () {

      $.ajax({
        method: "POST",
        data: {'co_nota_despacho':co_nota_despacho, 'co_almacen':co_almacen},
        url: "<?php echo site_url('despachos/confirmar_despacho_proveedor') ?>",
        beforeSend: function(){  },
                     }).done(function( data ) { 

                      var obj = JSON.parse(data);

                      if (obj.error > 0)

                        {

                         notificacion_toas('error','Nota de despacho',obj.message);
                        return;

                        }else{

                         location.reload();


                        }

                      
   
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