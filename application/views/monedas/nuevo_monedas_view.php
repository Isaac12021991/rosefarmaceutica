

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

                              <h4>Monedas / Nuevo </h4>
                              <div class="page-toolbar pull-left">
                             <?php  if ($this->usuario_library->permiso_evento('PRODUCTOS', 'CREAR')): ?>
                              <a class="btn blue btn-sm" onclick="nuevo_producto()"> Guardar</a>
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
                                            <span class="caption-subject bold uppercase">Nuevo</span>
                                            <span class="caption-helper">nueva moneda</span>
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
                  <input type="text" name="nb_moneda" id="nb_moneda" class="form-control input-lg" placeholder="Producto" value=""> 
               </div>
            </div>

                    <div class="form-group">
               <label class="col-md-3 control-label"><b>Acronimo</b></label>
               <div class="col-md-9">
                  <input type="text" name="nb_acronimo" id="nb_acronimo" class="form-control input-lg" placeholder="Acronimo" value=""> 
               </div>
            </div>

   

                                                </div>
                                                <div class="col-lg-6">

                    <div class="form-group">
               <label class="col-md-3 control-label"><b>Simbolo</b></label>
               <div class="col-md-9">
                  <input type="text" name="nb_simbolo" id="nb_simbolo" class="form-control input-lg" placeholder="Simbolo" value=""> 
               </div>
            </div>

                               <div class="form-group">
               <label class="col-md-3 control-label"><b>Redondeo Decimal</b></label>
               <div class="col-md-9">
                  <input type="text" name="nu_redondeo" id="nu_redondeo" class="form-control input-lg" placeholder="Simbolo" value="2"> 
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





<script type="text/javascript">
   function nuevo_moneda()
   {
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
           data: {'nb_moneda':nb_moneda, 'nb_acronimo':nb_acronimo, 'nb_simbolo':nb_simbolo, 'nu_redondeo':nu_redondeo},
           url: "<?php echo site_url('monedas/agregar_nuevo_moneda') ?>",
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
   
   
   function sincronizar_sim()
   {
   
      var cod_producto_sicm = $('#cod_producto_sicm').val();
   
                                  $.ajax({
           method: "POST",
           data: {'cod_producto_sicm':cod_producto_sicm},
           url: "<?php echo site_url('productos/sincronizar_farmapatria') ?>",
           beforeSend: function(){  },
                        }).done(function( data ) { 
   
                     $("#response_farmapatria").html(data);
   
      
                         }).fail(function(){
   
                       alert('Fallo');
   
   
                         }); 
   
   
   }
   
   
   
                                      
</script>


<script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>