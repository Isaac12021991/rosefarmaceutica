                                 

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

                  <?php endif; ?>

               </ul>
            </div>
         </div>
      </div>
      <!-- BEGIN PAGE HEADER-->

        <div class="page-bar">

                              <h4>Mi perfil / Empresas / Editar Empresa </h4>
                              <div class="page-toolbar pull-left">

                              <a id="ajust_medinet_bussines" class="btn blue btn-sm"> Guardar</a>

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
                                                <h4 class="list-group-item-heading">Super Usuario</h4>
                                                <p class="list-group-item-text" id="info_adicional"> Modulo administrativo Super Usuario </p>
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
                                            <span class="caption-helper">editar empresa</span>
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
               <label class="col-md-3 control-label"><b>Logo</b></label>
               <div class="col-md-9">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
      <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 70px; line-height: 150px;">
        
          <img src="<?php echo base_url() ?>/img/perfil/empresa/<?php echo $info_empresa->nb_url_foto; ?>">

      </div>
      <div>
          <span class="btn red btn-outline btn-file">
              <span class="fileinput-new"> Seleccione imagen </span>
              <span class="fileinput-exists"> Cambiar </span>
              <input type="hidden" value="" name="..."><input id="mi_archivo" type="file" name="mi_archivo"> </span>
          <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput" style=""> Quitar </a>
      </div>
  </div> 
               </div>
            </div>

                      <div class="form-group">
                <label class="col-md-3 control-label"><b>Empresa</b></label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="nb_empresa" id="nb_empresa" value="<?php echo $info_empresa->nb_empresa; ?>">
                                                        
                </div>
            </div>


                     <div class="form-group">
                      <label class="col-md-3 control-label"><b>Representante</b></label>

                      <div class="col-md-9">
                        <input type="text" class="form-control" name="nb_representante_legal" id="nb_representante_legal" value="<?php echo $info_empresa->nb_representante_legal; ?>">
                          
                      </div>
                  </div>


   

                                                </div>
                                                <div class="col-lg-6">

            <div class="form-group">
               <label class="col-md-3 control-label"><b>Alias de la empresa</b></label>
               <div class="col-md-9">

                    <input type="text" class="form-control" name="nb_alias" id="nb_alias" value="<?php echo $info_empresa->nb_alias; ?>">
               </div>
            </div>


            <div class="form-group">
               <label class="col-md-3 control-label"><b>Rif</b></label>
               <div class="col-md-9">
         <input type="text" class="form-control" name="nu_rif" id="nu_rif" value="<?php echo $info_empresa->nu_rif; ?>">

               </div>
            </div>

                                                               <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Email</b></label>

                                                    <div class="col-md-9">
                                                      <input type="text" class="form-control" name="tx_email" id="tx_email" value="<?php echo $info_empresa->tx_email ; ?>">
                                                        
                                                    </div>
                                                </div>
   
                                                </div>


                                                </div>

                                               <div class="row">
                                                  <div class="col-md-12">

                                                                                            <div class="tabbable tabbable-tabdrop">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab1" data-toggle="tab">Sucursales</a>
                                                </li>
 
                                                                                
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">

                                        <?php $sucursales = $this->empresa_library->get_sucursales($co_empresa); ?>

                                                     <?php if($sucursales->num_rows() > 0): ?>
                                              <table class="table table-condensed" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Cod Sicm </th>
                                                        <th> Direccion </th>
                                                        <th> Telefono </th>
                                                        <th> Estado </th>
                                                        <th>  </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?php  foreach ($sucursales->result() as $row_two):?>
                                                        <tr>
                                                        <td>  <?php echo $row_two->cod_sicm; ?>  </td>
                                                        <td>  <?php echo $row_two->nb_direccion; ?>  </td>
                                                        <td>  <?php echo $row_two->nu_telefono_local; ?>  </td>
                                                        <td>  <?php echo $row_two->nb_estado; ?>  </td>
                                                        <td>         

                                                          <div class="task-config">
                                                            <div class="task-config-btn btn-group">
                                                                <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                                    <i class="fa fa-cog"></i>
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li>
                                  <a href='<?php echo site_url("empresa/edit_branch/$row_two->co_sucursal");?>' data-target="#ajax_remote" data-toggle="modal">Editar</a>

                                                                    </li>
                                                                    <li>
                                                                      <a onclick="eliminar_sucursal(<?php echo $row_two->co_sucursal; ?>, <?php echo $co_empresa; ?>)">Eliminar</a>
                                                                      </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                                                                                                                      
                                                        </td>
                                                        </tr>

                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                            <?php else: ?>
                                              <p>Sin sucursales</p>
                                            <?php endif; ?>
                                                         <a class="btn btn blue" href='<?php echo site_url("empresa/branch/$co_empresa");?>' data-target="#ajax_remote" data-toggle="modal">
                                                            <i class="fa fa-plus"></i> Agregar </a>


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


 $('#ajust_medinet_bussines').click(function(){



              var mi_archivo = document.getElementById('mi_archivo');
              var co_empresa = '<?php echo $co_empresa; ?>'; 
              var nb_empresa = $('#nb_empresa').val(); 
              var nu_rif = $('#nu_rif').val();
              var nb_alias = $('#nb_alias').val(); 
              var nb_representante_legal = $('#nb_representante_legal').val(); 
              var tx_email = $('#tx_email').val(); 


        if (nb_empresa == '') {

          notificacion_toas('error','Error','Ingrese el nombre de la empresa');
          return;

    };

            if (nu_rif == '') {

          notificacion_toas('error','Error','Ingrese el rif de la empresa');
          return;

    };


var file = mi_archivo.files[0];

var data = new FormData();

data.append('mi_archivo', file);
data.append('co_empresa', co_empresa);
data.append('nb_empresa', nb_empresa);
data.append('nu_rif', nu_rif);
data.append('nb_alias', nb_alias);
data.append('nb_representante_legal', nb_representante_legal);
data.append('tx_email', tx_email);

var url = "<?php echo site_url('empresa/write_update_business') ?>";


                $.ajax({
                url:url,
                type:'POST',
                contentType:false,
                data:data,
                processData:false,
                cache:false}).done(function( data ) { 

                   var obj = JSON.parse(data);


                       if (obj.error == 0) {

                     $(location).attr('href',"<?php echo site_url() ?>empresa/index");
   
   

                         

                       }else{
                          notificacion_toas('error','Error',obj.message);
                         return;

                       }
                                   

                      }); 

               });



                                   </script>

        <script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>


        <script src="<?php echo base_url() ?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>





































