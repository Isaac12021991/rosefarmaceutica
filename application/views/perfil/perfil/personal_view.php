                  <link href="<?php echo base_url() ?>css/acordeon/styles_acordeon.css" rel="stylesheet" type="text/css" /> 

                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">

                  <div class="page-bar">

                              <h4>Mi perfil / Personal</h4>
                              <div class="page-toolbar pull-left">
                          
                              </div>

                          <div class="page-toolbar pull-right"></div>
                          </div>

                <h1 class="page-title">    </h1>
                        <!-- BEGIN PAGE HEADER-->
                        <div class="row">

            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 ">


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

                                <div class="portlet light">
                                    <div class="portlet-body">

                                                                    <div class="portlet box bg-blue-chambray" id="box_form">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Informacion Personal </div>
                                        <div class="actions">
                                        </div>
                                    </div>


                                    <div class="portlet-body">


                                     <form class="form-horizontal" role="form">

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Nombre del Usuario</b></label>

                                                    <div class="col-md-9">
                <input type="text" placeholder="Nombre" id="first_name" name="first_name" class="form-control input-sm input-medium" value="<?php echo $perfil->first_name; ?>" />

                                                        <span class="help-block"> Nombre Actual del Usuario, si desea cambiarlo escriba otro nombre y actualize</span>
                                                    </div>
                                                </div>

                                                                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Apellido del Usuario</b></label>

                                                    <div class="col-md-9">
               <input type="text" placeholder="Apellido" id="last_name" name="last_name" class="form-control input-sm input-medium" value="<?php echo $perfil->last_name; ?>"/>

                                                        <span class="help-block"> Apellido Actual del Usuario, si desea cambiarlo escriba otro nombre y actualize</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Cedula</b></label>
                                                    <div class="col-md-2">
                                                <select name="nb_nacionalidad" id="nb_nacionalidad" class="form-control input-sm input-small">
                                                <?php if ($perfil->nb_nacionalidad == 'V'): ?>
                                              <option selected="selected" value="V">V</option>
                                                <option value="E">E</option>
                                               <?php else: ?>
                                                <option value="V">V</option>
                                                <option selected="selected" value="E">E</option>
                                               <?php endif; ?>
                                                </select>
                                                         <span class="help-inline"> Nacionalidad </span>
                                                    </div>
                                                        <div class="col-md-7">

                   <input type="text" placeholder="Cedula" id="nu_cedula" maxlength="8" name="nu_cedula" class="form-control input-sm input-small" value="<?php echo $perfil->nu_cedula; ?>" />
                                                        <span class="help-inline"> Ingrese el número de identificación. </span>
                                                    </div>
                                                </div>
    
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Fecha Nacimiento</b></label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon">
                                                            <i class="fa fa-calendar"></i>
                                           <input type="text" name="ff_nacimiento" id="ff_nacimiento" class="form-control input-inline input-sm input-medium date-picker" placeholder="Fecha de Nacimiento" value="<?php echo date_user($perfil->ff_nacimiento); ?>">
                 <span class="help-inline"> Seleccione la fecha de nacimiento. </span>
                </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Telefono</b></label>
                                                    <div class="col-md-9">
 <input type="text" placeholder="Telefono" maxlength="11" id="phone" name="phone" class="form-control input-sm input-small" value="<?php echo $perfil->phone; ?>" />
 
                    <span class="help-inline"> Número telefonico actual. </span>
                    </div>
                                                </div>
           
                                            </div>


                                                                                        <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a id="guardar_tab_1" class="btn blue-chambray btn-sm">Actualizar</a>

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


                    </div>
                    <!-- END CONTENT BODY -->
                </div>



                                            <div class="modal fade bs-modal-lg" id="ajax_editar" tabindex="-1" role="dialog" aria-hidden="true">
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

        $("#first_name").focus();

          }); // Fin ready

    $('#guardar_tab_1').click(function(){

              var co_user = <?php echo $perfil->id; ?>;   
              var ruta_tab_1="<?=site_url("Perfil/update_perfil")?>";


               var first_name = $('#first_name').val(); 
               var last_name = $('#last_name').val();
                var nb_nacionalidad = $('#nb_nacionalidad').val();
               var nu_cedula = $('#nu_cedula').val();
                var ff_nacimiento = $('#ff_nacimiento').val();
                 var phone = $('#phone').val();

                if (first_name == '') { 

                      $('#notification').fadeIn(200);
                      $("#notification").addClass("alert alert-danger");
                      $('#notification').html('Ingrese el nombre');
                document.getElementById('first_name').focus(); return;};


                if (last_name == '') {

                     $('#notification').fadeIn(200);
                      $("#notification").addClass("alert alert-danger");
                      $('#notification').html('Ingrese el apellido');


                document.getElementById('last_name').focus(); return;};
                if (nu_cedula == '') {


                     $('#notification').fadeIn(200);
                      $("#notification").addClass("alert alert-danger");
                      $('#notification').html('Ingrese el número de cedula');

                document.getElementById('nu_cedula').focus(); return;}; 

                $.ajax({
                       method: "POST",
                       data: {'co_user': co_user, 'first_name':first_name, 'last_name':last_name, 'nb_nacionalidad':nb_nacionalidad, 'nu_cedula':nu_cedula, 'ff_nacimiento':ff_nacimiento, 'phone':phone},
                       url: ruta_tab_1,
                       beforeSend: function(){ $('#guardar_tab_1').html('Guardando...'); $('#guardar_tab_1').attr("disabled", true);},
                     }).done(function( data ) { 

                        var obj = JSON.parse(data);

                       if (obj.error == 0) {

                      $('#notification').fadeIn(200);

                        $("#notification").removeClass("alert alert-danger");
                        $("#notification").addClass("alert alert-success");
                        $("#notification").html(obj.message);

                        $('#guardar_tab_1').html('Actualizar');
                        $('#guardar_tab_1').attr("disabled", false);
                        $("#response_controllers").load('<?php echo site_url('perfil/personal') ?>');

                       }else{

                        $('#notification').fadeIn(200);
                        $("#notification").addClass("alert alert-danger");
                        $("#notification").html(obj.message);
                        $('#guardar_tab_1').html('Actualizar');
                        $('#guardar_tab_1').attr("disabled", false);
                         return;

                       }
     

                      }); 


        });

                                   </script>

                                   <script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>