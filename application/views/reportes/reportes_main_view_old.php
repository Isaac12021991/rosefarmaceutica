

<link href="<?php echo base_url() ?>css/acordeon/styles_acordeon.css" rel="stylesheet" type="text/css" />
 
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <h1 class="page-title"> <b>Reportes</b>
         <small>Reportes generales</small>
      </h1>
      <div class="row">
         <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 ">
            <?php  if ($this->ion_auth->perfil(array('ADMINISTRADOR','INVENTARIO','ALMACEN'))): ?>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
               <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                     <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Inventario
                        </a>
                     </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                     <div class="panel-body">
                        <table width="100%">
                           <tr>
                              <td width="90%"><a onclick="listado_inventario_general()"> <span class="items_menu" id="listado_inventario_general"> Inventario General</span> </a></td>
                              <td width="10%"></td>
                           </tr>
                           <tr>
                              <td width="90%"><a onclick="inventario_movimiento()"> <span class="items_menu" id="inventario_movimiento">Movimientos</span> </a></td>
                              <td width="10%"></td>
                           </tr>
                           <tr>
                              <td width="90%"><a onclick="inventario_movimiento_2()"> <span class="items_menu" id="inventario_movimiento_2">Movimientos inventario por costo</span> </a></td>
                              <td width="10%"></td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <?php endif; ?>
            <?php  if ($this->ion_auth->perfil(array('ADMINISTRADOR','DOCUMENTOS'))): ?>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
               <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingTwo">
                     <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Documentos
                        </a>
                     </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                     <div class="panel-body">
                        <table width="100%">
                           <tr>
                              <td width="90%"><a onclick="main_listado_cuentas_por_cobrar()"> <span class="items_menu" id="main_listado_cuentas_por_cobrar"> Cuentas por cobrar</span> </a></td>
                              <td width="10%"></td>
                           </tr>
                           <tr>
                              <td width="90%"><a onclick="reporte_documento_inventario()"> <span class="items_menu" id="reporte_documento_inventario"> Resumen 2</span> </a></td>
                              <td width="10%"></td>
                           </tr>
                           <tr>
                              <td width="90%"><a onclick="reporte_documento_mensual()"> <span class="items_menu" id="reporte_documento_mensual"> Resumen 3</span> </a></td>
                              <td width="10%"></td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <?php endif; ?>
            <?php  if ($this->ion_auth->perfil(array('ADMINISTRADOR'))): ?>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
               <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingThree">
                     <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        Encuesta
                        </a>
                     </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                     <div class="panel-body">
                        <table width="100%">
                           <tr>
                              <td width="90%"><a onclick="reporte_encuesta()"> <span class="items_menu" id="reporte_encuesta"> Encuesta</span> </a></td>
                              <td width="10%"></td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <?php endif; ?>

                        <?php  if ($this->ion_auth->perfil(array('ADMINISTRADOR','DOCUMENTOS'))): ?>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
               <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingfour">
                     <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                        Lista de Precio
                        </a>
                     </h4>
                  </div>
                  <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                     <div class="panel-body">
                        <table width="100%">
                           <tr>
                              <td width="90%"><a onclick="lista_precio_general()"> <span class="items_menu" id="lista_precio_general"> Resumen 1</span> </a></td>
                              <td width="10%"></td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <?php endif; ?>
            <div class="list-group">
               <span class="list-group-item active">
                  <h4 class="list-group-item-heading">Soporte Técnico</h4>
                  <p class="list-group-item-text"> Para ayuda y más informacion puede comunicarse con nosotros a traves de soporte@sofimed.com.ve </p>
               </span>
            </div>
            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="" id="notification" style="display: none;">
                  </div>
               </div>
            </div>
            <!-- END MENU -->
         </div>
         <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 ">
            <div id="controllers_reportes">
               <div class="well">
                  <h4 class="block">Listado de reportes y estadistica</h4>
                  <p> </p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- END CONTENT BODY -->
</div>
<div class="modal fade bs-modal-lg" id="modal_ajax" tabindex="-1" role="dialog" aria-hidden="true">
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
   $(document).ready(function(){
   
   
   
   }); // Fin ready
   
   
   function listado_inventario_general(){
   
   $("#controllers_reportes").load('<?php echo site_url('reportes/inventario_main_general') ?>');
       $(".items_menu").removeAttr('style');
   $("#listado_inventario_general").css({'font-weight':'bold'});
   
   }
   
   function inventario_movimiento(){
   
   $("#controllers_reportes").load('<?php echo site_url('reportes/inventario_main_movimiento') ?>');
       $(".items_menu").removeAttr('style');
   $("#inventario_movimiento").css({'font-weight':'bold'});
   
   }
   
   
   function main_listado_cuentas_por_cobrar(){
   
   $("#controllers_reportes").load('<?php echo site_url('reportes/main_listado_cuentas_por_cobrar') ?>');
       $(".items_menu").removeAttr('style');
   $("#main_listado_cuentas_por_cobrar").css({'font-weight':'bold'});
   
   }
   
   
     function listado_inventario_salida(){
   
   $("#controllers_reportes").load('<?php echo site_url('reportes/listado_inventario_salida') ?>');
       $(".items_menu").removeAttr('style');
   $("#listado_inventario_salida").css({'font-weight':'bold'});
   
   }
   
     function reporte_encuesta(){
   
   $("#controllers_reportes").load('<?php echo site_url('reportes/reporte_encuesta') ?>');
       $(".items_menu").removeAttr('style');
   $("#reporte_encuesta").css({'font-weight':'bold'});
   
   }
   
   
       function reporte_documento_inventario(){
   
   $("#controllers_reportes").load('<?php echo site_url('reportes/reporte_documento_inventario') ?>');
       $(".items_menu").removeAttr('style');
   $("#reporte_documento_inventario").css({'font-weight':'bold'});
   
   }
   
         function reporte_documento_mensual(){
   
   $("#controllers_reportes").load('<?php echo site_url('reportes/reporte_documento_mensual') ?>');
       $(".items_menu").removeAttr('style');
   $("#reporte_documento_mensual").css({'font-weight':'bold'});
   
   }
        function lista_precio_general(){
   
   $("#controllers_reportes").load('<?php echo site_url('reportes/lista_precio_general') ?>');
       $(".items_menu").removeAttr('style');
   $("#lista_precio_general").css({'font-weight':'bold'});
   
   }

      function inventario_movimiento_2(){
   
   $("#controllers_reportes").load('<?php echo site_url('reportes/reporte_movimiento_inventario_2_main') ?>');
       $(".items_menu").removeAttr('style');
   $("#inventario_movimiento_2").css({'font-weight':'bold'});
   
   }
   
   
</script>