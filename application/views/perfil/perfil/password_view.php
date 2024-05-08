                  <link href="<?php echo base_url() ?>css/acordeon/styles_acordeon.css" rel="stylesheet" type="text/css" /> 

                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">

                  <div class="page-bar">

                              <h4>Mi perfil / Contraseña</h4>
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



                                                <form class="form-horizontal" role="form">

                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Contraseña actual</b></label>

                                                    <div class="col-md-9">
    <input type="password" class="form-control input-sm input-inline" name="co_password_user" id="co_password_user" placeholder="Contraseña Actual">
                                                        <span class="help-inline"> Contraseña actual de acceso a MEDINET. </span>
                                                    </div>
                                                </div>

                                                    <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Nueva contraseña</b></label>

                                                    <div class="col-md-9">
 <input type="password" class="form-control input-sm input-inline" name="new_password" id="new_password" placeholder="Nueva Contraseña">
                                                        <span class="help-inline">Ingrese su nueva contraseña</span>
                                                    </div>
                                                </div>


                                                    <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Verifique contraseña</b></label>

                                                    <div class="col-md-9">
<input type="password" class="form-control input-sm input-inline" name="repeat_new_password" id="repeat_new_password" placeholder="Verificar Contraseña">

                                                        <span class="help-inline">Ingrese nuevamente su nueva contraseña</span>
                                                    </div>
                                                </div>


                                                                                        <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                      <a id="cambiar_password" class="btn blue-chambray btn-sm">Cambiar Contraseña</a>

                                                    </div>
                                                </div>
                                            </div>



                                                </form>
              

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

        $("#co_password_user").focus();

          }); // Fin ready



        $( "#cambiar_password" ).on( "click", function() {


                var password = $("#new_password").val();
                var co_password_user = $("#co_password_user").val();
                var repeat_new_password = $("#repeat_new_password").val();

                if ($("#co_password_user" ).val()=='')
                {


                notificacion_toas('error','Error','Ingrese su contraseña actual.');
                $("#co_password_user").focus()
                return;
                }

                if ($("#new_password" ).val()=='')
                {

                notificacion_toas('error','Error','Ingrese su nueva contraseña.');
                $("#new_password").focus()
                return;
                }


                if ($("#repeat_new_password" ).val()=='')
                {
                
                notificacion_toas('error','Error','Ingrese su nueva contraseña.');
                $("#repeat_new_password").focus()
                return;
                }


              if ($("#new_password" ).val() != $("#repeat_new_password" ).val())
                {

                notificacion_toas('error','Error','Las contraseñas no coiciden.');
                $("#new_password").focus()
                return;
                }

                    if (password.length < 8 ) { 
                    
                notificacion_toas('error','Error','La contraseña tiene que contener mas de 8 caracteres');
                return;
                  } 

                  //validate lette
                  if (!password.match(/[A-z]/)) { 

                notificacion_toas('error','Error','La contraseña tiene que contener una letra');
                return;

                  } 

                  //validate capital letter
                  if (!password.match(/[A-Z]/) ) { 

                notificacion_toas('error','Error','La contraseña tiene que contener una mayuscula');
                return;
                  }

                  //validate number
                          if (!password.match(/\d/) ) {

                notificacion_toas('error','Error','La contraseña tiene que contener un número');
                return;
              
        }


        var patron=/[\^$.*+?=!:|\\/()\[\]{}]/;

          if (!patron.test(password))
         {

              notificacion_toas('error','Error','La contraseña tiene que contener un caracter especial, ejemplo: $. * +? =! : | \ / () [] {}');
                return;
        }



                
                $.ajax({
                       method: "POST",
                       data: {
                         co_password_user:$("#co_password_user").val(),
                         new_password:$("#new_password").val(),
  
                         },
                         beforeSend: function(){ $('#cambiar_password').html('Verificando...'); $('#cambiar_password').attr("disabled", true);},
                       url: "<?php echo site_url('perfil/update_change_seguridad') ?>",
                       dataType: "html"
                     }).done(function( data ) {


                      var obj = JSON.parse(data);

                       if (obj.error == 0) {
                         alert(obj.message);
                         location.reload();

                       }else{
                       alert(obj.message);
                         return;

                       }


                      }); //FIN AJAX 
    });







  </script>