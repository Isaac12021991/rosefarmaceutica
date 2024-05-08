
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
                     <a href='<?php echo site_url("almacen/crear_almacen");?>'>
                     <span class="title">Crear almacen</span>
                     </a>
                  </li>
                  <?php endif; ?>
               </ul>
            </div>
         </div>
      </div>
      <!-- BEGIN PAGE HEADER-->

        <div class="page-bar">

       

            <h4>Almacen / Editar </h4>
            <div class="page-toolbar pull-left">

             <div id="reload_btn_header">

         <?php  if ($this->usuario_library->permiso_evento('ALMACEN', 'MODIFICAR')): ?>
            <a class="btn blue btn-sm" onclick="editar_almacen()">Guardar</a>
             <?php endif; ?>

              <a class="btn btn-default btn-sm" href="javascript:window.history.back();"> Descartar</a>

       
                              </div>

                              </div>

                          <div class="page-toolbar pull-right"> 
                                                          

                          </div>


                          </div>

                <h1 class="page-title">    </h1>
      <div class="row">
       <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 visible-md visible-lg">
     
          
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a class="" role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Informacion Personal
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                        <div class="panel-body">

                    <table width="100%">
                    <tr>
                    <td width="90%"><a href="<?php echo site_url('perfil/personal')?>"> <span id="ver_usuarios_activos"> Personal  </span> </a></td>
                    <td width="10%"></td>
                    </tr>

                    <tr>
                    <td width="90%"><a href="<?php echo site_url('perfil/email')?>"> <span id="ver_usuarios_activos"> Email  </span> </a></td>
                    <td width="10%"></td>
                    </tr>

                      <tr>
                    <td width="90%"><a href="<?php echo site_url('perfil/password')?>"> <span id="ver_usuarios_activos"> Contraseña  </span> </a></td>
                    <td width="10%"></td>
                    </tr>
                  </table>
                        </div>
                    </div>
                </div>

            </div>
              <?php  if ($this->usuario_library->perfil(array('ADMINISTRADOR'))): ?>
                                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Empresa
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="true" style="">
                        <div class="panel-body">

                    <table width="100%">
                    <tr>
                    <td width="90%"><a href="<?php echo site_url('empresa/index')?>">Empresa </a></td>
                    <td width="10%"></td>
                    </tr>

                                              <tr>
                            <td width="90%"><a href='<?php echo site_url("almacen/index");?>'> <span class="items_menu" id="listado_nota_despachos"> Almacen  </span> </a></td>
                            <td width="10%"></td>
                         </tr>

                         
                                                   <tr>
                            <td width="90%"><a href="<?php echo site_url('cuenta_banco/index')?>"> <span class="items_menu" id="cuentas_bancarias"> Cuentas bancarias  </span> </a></td>
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
                                            <span class="caption-helper">nuevo almacen</span>
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
               <label class="col-md-3 control-label"><b>Nombre del Almacen</b></label>
               <div class="col-md-9">
                  <input type="text" name="nb_almacen" id="nb_almacen" class="form-control input-sm input-medium" placeholder="Nombre del almacen" value="<?php echo $info_almacen->nb_almacen; ?>">  
                  <span class="help-inline">Ingrese el nombre del almacen</span>
               </div>
            </div>


   

                                                </div>
                                                <div class="col-lg-6">

            <div class="form-group">
               <label class="col-md-3 control-label"><b>Seleccione la sucursal</b></label>
               <div class="col-md-9">
                  <?php echo form_dropdown('co_sucursal', $lista_sucursal, $co_sucursal,'class="form-control input-sm input-medium input-inline" id="co_sucursal"');?>
                  <span class="help-inline">Seleccione la sucursal</span>
               </div>
            </div>

                                                </div>


                                                </div>

                                                      <div class="row">
                                             <div class="col-lg-6">

            <div class="form-group">
               <label class="col-md-3 control-label"><b>Estado</b></label>
               <div class="col-md-9">
                  <?php echo form_dropdown('co_estado', $estados, $co_estado,'class="form-control input-sm input-medium input-inline" onchange="get_municipio(this.value)" id="co_estado"');?>
                  <span class="help-inline"> Seleccione el estado</span>
               </div>
            </div>

                                             </div>

                                           <div class="col-lg-6">

            <div class="form-group">
               <label class="col-md-3 control-label"><b>Municipio</b></label>
               <div class="col-md-9">
                  <div id="div_municipio"><?php echo form_dropdown('co_municipio', $municipios, $co_municipio,'class="form-control input-sm input-medium input-inline" onchange="get_parroquias(this.value)"'); ?></div>
                  <span class="help-inline"> Seleccione el municipio</span>
               </div>
            </div>

                                             </div>

                                           </div>

                          <div class="row">
                          <div class="col-lg-6">


             <div class="form-group">
               <label class="col-md-3 control-label"><b>Parroquia</b></label>
               <div class="col-md-9">
                  <div id="div_parroquia"><?php echo form_dropdown('co_parroquia', $parroquias, $co_parroquia,'class="form-control input-sm input-medium input-inline" id="co_parroquia"'); ?></div>
                  <span class="help-inline"> Seleccione la parroquia</span>
               </div>
            </div>


                          </div>

                          <div class="col-lg-6">


            <div class="form-group">
               <label class="col-md-3 control-label"><b>Usuarios encargados</b></label>
               <div class="col-md-9">
                   <?php echo form_dropdown('co_usuario', $usuarios, $co_usuario,'class="form-control input-sm input-medium input-inline"  id="co_usuario"');?>
                  <span class="help-inline"> Seleccione los usuarios encargados del almacen</span>
               </div>
            </div>

                          </div>
                          </div>


                                                    <div class="row">
                          <div class="col-lg-6">

                <div class="form-group">
               <label class="col-md-3 control-label"><b>Direccion</b></label>
               <div class="col-md-9">
                  <textarea cols="2" id="tx_direccion" name="tx_direccion" class="form-control"><?php echo $info_almacen->tx_direccion; ?></textarea>
                  <span class="help-inline">Direccion del almacen</span>
               </div>
            </div>

                          </div>

                          <div class="col-lg-6">

                                      <div class="form-group">
               <label class="col-md-3 control-label"><b>Prioridad</b></label>
               <div class="col-md-9">
                  <input type="text" class="form-control input-sm input-small" name="nu_orden" id="nu_orden" value="<?php echo $info_almacen->nu_orden; ?>" placeholder="N°">
                  <span class="help-inline">Indique la prioridad</span>
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

   
   function editar_almacen()
   {
   
       var nb_almacen = $('#nb_almacen').val();
       var tx_direccion = $('#tx_direccion').val(); 
       var co_parroquia = $('#co_parroquia').val();
       var co_sucursal = $('#co_sucursal').val();
       var nu_orden = $('#nu_orden').val();
       var co_usuario = $('#co_usuario').val();  
   
                 if (nu_orden == '') {
   
          notificacion_toas('error','Error','Ingrese la prioridad del almacen');
           return;
   
   };
   
              if (co_sucursal == '') {
   

          notificacion_toas('error','Error','Seleccione una sucursal');
           return;
   
   };
   
   
   
   if (nb_almacen == '') {
   
          notificacion_toas('error','Error','Ingrese el nombre del almacen');
           return;
   
   };
   
       if (tx_direccion == '') {
   
          notificacion_toas('error','Error','Ingrese una direccion');
           return;
        return;
   
   };
   
           if (co_parroquia == '') {
   
          notificacion_toas('error','Error','Seleccione la parroquia');
           return;
   
   };

         if (co_usuario == '') {
   
          notificacion_toas('error','Error','Seleccione un usuario');
           return;
   
   };
   
   
   
   
                            $.ajax({
     method: "POST",
     data: {'nb_almacen':nb_almacen, 'tx_direccion':tx_direccion, 'co_parroquia':co_parroquia, co_almacen:'<?php echo $co_almacen ?>', 'co_sucursal':co_sucursal, 'nu_orden':nu_orden, 'co_usuario':co_usuario},
     url: "<?php echo site_url('almacen/editar_almacen_ejecutar') ?>",
     beforeSend: function(){  },
                  }).done(function( data ) { 
   
                   var obj = JSON.parse(data);
   
                   if (obj.error > 0)
   
                   {
   
                     alert(obj.message);
                     return;
   
   
                   }else{
   

              $(location).attr('href',"<?php echo site_url() ?>almacen/index"); 
   
   
                   }
   
   
   
                   }).fail(function(){
   
                 alert('Fallo');
   
   
                   }); 
   
   
   
   }
   
   function get_municipio(co_estado)
   
   {
   
     $.ajax(
     {
     type: "POST",
     url: "<?php echo site_url('almacen/municipios') ?>",
     data: { 'co_estado' : co_estado
     },
     cache: false,
   
     success: function(data)
     {
     $('#div_municipio').html(data);
   
   
     }
     });
   
   
   }
   
   function get_parroquias(id)
   
   {
   
     $.ajax(
     {
     type: "POST",
     url: "<?php echo site_url('almacen/parroquias') ?>",
     data: { 'id_municipios' : id
     },
     cache: false,
   
     success: function(data)
     {
     $('#div_parroquia').html(data);
   
   
     }
     });
   
   
   }
   
                                
</script>
<script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>

