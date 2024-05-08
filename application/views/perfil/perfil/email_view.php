                  <link href="<?php echo base_url() ?>css/acordeon/styles_acordeon.css" rel="stylesheet" type="text/css" /> 

                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">

                  <div class="page-bar">

                              <h4>Mi perfil / Email</h4>
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

       
                                             <h3><?php echo $perfil->email; ?></h3> Si desea cambiar su correo electronico ingrese el nuevo email:

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Correo Electronico (Email)</b></label>
                                                    <div class="col-md-9">
 <input type="text" placeholder="Ingrese el nuevo email" id="email" name="email" class="form-control input-sm input-medium input-inline" />
 
                    <span class="help-inline"> Ingrese el email que desea actualizar en el sistema. </span>
                    </div>
                                                </div>
           
                                            </div>


                                                                                        <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a id="chage_email_code" class="btn blue-chambray btn-sm">Cambiar</a>

                                                    </div>
                                                </div>
                                            </div>

                                            </form>
                                            <br>


                                                                        <div id="codigo_seguridad" style="display:none;">   

                                                                          <form class="form-horizontal" role="form">


                                            <div class="form-body">


                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Codigo de Verificacion del email actual</b></label>
                                                    <div class="col-md-9">
 <input type="text" placeholder="********" maxlength="8" id="co_verificacion" name="co_verificacion" class="form-control input-sm input-small text-center" value="" /> 
 
                    <span class="help-inline"> Ingrese código que ha recibido en el email actual </span>
                    </div>
                                                </div>


                                          <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Codigo de Verificacion del nuevo email <span id="new_email"></span></b></label>
                                                    <div class="col-md-9">
                                    <input type="text" placeholder="********" maxlength="8" id="co_verificacion_new_email" name="co_verificacion_new_email" class="form-control input-small input-sm text-center" value="" /> 

 
                    <span class="help-inline"> Ingrese el código que ha recibido en el nuevo email que desea registrar. </span>
                    </div>
                                                </div>
           
                                            </div>


                                                                                        <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                    
      <a href="javascript:;" id="actualizar_email" class="btn blue-chambray btn-sm"> Actualizar Email </a>
      <a href="javascript:;" id="cancelar_envio_codigo" class="btn blue-chambray btn-sm"> Cancelar envío de código </a>

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


        $("#email").focus();


  var ruta_ver_existencia="<?=site_url("Perfil/verificar_codigo")?>";

           $.ajax({
           method: "POST",
           url: ruta_ver_existencia,
         }).done(function( data ) {

        var obj = JSON.parse(data);

           if (obj.existe == 1) {

            $('#codigo_seguridad').fadeIn(200); 
            $('#new_email').html('para: ' + obj.message); 

           }else{

            $('#codigo_seguridad').fadeOut(200);


           }

          }); 



  }); // Fin ready




      $("#chage_email_code").on( "click", function() {

              var email = $('#email').val();
              if (email == '') {

                $('#notification').fadeIn(200);
                $("#notification").addClass("alert alert-danger");
                $('#notification').html('Ingrese un email');
                return;
              }

            if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {


                $('#notification').fadeIn(200);
                $("#notification").addClass("alert alert-danger");
                $('#notification').html('El correo electrónico introducido no es correcto.');



            return false;
        }


              var ruta_ver_1="<?=site_url("Perfil/generar_codigo")?>";


                       $.ajax({
                       method: "POST",
                       data: {'email': email},
                       url: ruta_ver_1,
                       beforeSend: function(){ $('#chage_email_code').html('Ejecutando...'); $('#chage_email_code').attr("disabled", true);},
            
                     }).done(function( data ) {

                    var obj = JSON.parse(data);

                       if (obj.error == 0) {

                        $('#codigo_seguridad').fadeIn(200); 
                        $('#notification').fadeIn(200);
                        $("#notification").removeClass("alert alert-danger");
                        $("#notification").addClass("alert alert-warning");
                        $('#notification').html('Se le ha enviado un código de 8 digitos al <b>correo actual</b> y al <b>nuevo correo</b>, ingrese ambos código para proceder al cambio de correo electronico');
                       $('#chage_email_code').html('Cambiar!');
                        $('#chage_email_code').attr("disabled", false);


                       }else{

                      $('#chage_email_code').html('Cambiar!');
                      $('#chage_email_code').attr("disabled", false);  

                      $('#notification').fadeIn(200);
                      $("#notification").addClass("alert alert-danger");
                      $('#notification').html(obj.message);
                      $('#codigo_seguridad').fadeOut(200);



                       }

                      }).fail(function(xhr, textStatus, errorThrown){
                    alert('Error de conexion');
                    }).always(function() {

                        $('#chage_email_code').html('Cambiar!');
                        $('#chage_email_code').attr("disabled", false);
  });


          });


                                         $('#actualizar_email').click(function(){


              var co_verificacion = $('#co_verificacion').val();
              var co_verificacion_new_email = $('#co_verificacion_new_email').val();   
              var ruta_tab_1="<?=site_url("Perfil/change_email_user")?>";


                $.ajax({
                       method: "POST",
                       data: {'co_verificacion': co_verificacion, 'co_verificacion_new_email': co_verificacion_new_email},
                       url: ruta_tab_1,
                       beforeSend: function(){ $('#actualizar_email').html('Verificando...'); $('#actualizar_email').attr("disabled", true);},
                     }).done(function( data ) { 

                        var obj = JSON.parse(data);

                       if (obj.error == 0) {

                        $('#notification').fadeIn(200);
                        $("#notification").removeClass("alert alert-danger");
                        $("#notification").addClass("alert alert-success");
                        $('#notification').html(obj.message);
                        $('#actualizar_email').html('Actualizar email');
                        $('#actualizar_email').attr("disabled", false);
                        $("#response_controllers").load('<?php echo site_url('perfil/email') ?>');

                       }else{

                        $('#actualizar_email').html('Actualizar email');
                        $('#actualizar_email').attr("disabled", false);
                      $('#notification').fadeIn(200);
                      $("#notification").addClass("alert alert-danger");
                      $('#notification').html(obj.message);
                         return;

                       }
     

                      }); 


        });


            $('#cancelar_envio_codigo').click(function(){

                var ruta_tab_1="<?=site_url("Perfil/cancelar_envio_codigo")?>";


                $.ajax({
                       method: "POST",
                       url: ruta_tab_1,
                       beforeSend: function(){ $('#cancelar_envio_codigo').html('Cancelando...'); $('#cancelar_envio_codigo').attr("disabled", true);},
                     }).done(function( data ) { 

                        var obj = JSON.parse(data);

                       if (obj.error == 0) {
                        $('#codigo_seguridad').fadeOut(200); 
                        $('#notification').fadeIn(200);
                        $("#notification").removeClass("alert alert-danger");
                        $("#notification").removeClass("alert alert-warning");
                        $("#notification").addClass("alert alert-info");
                        $('#notification').html('Ha sido cancelada el cambio de correo eletrónico');

                        $('#cancelar_envio_codigo').html('Cancelar envío de código');
                        $('#cancelar_envio_codigo').attr("disabled", false);

                       }else{
                         alert(obj.message);
                        $('#cancelar_envio_codigo').html('Cancelar envío de código');
                        $('#cancelar_envio_codigo').attr("disabled", false);
                         return;

                       }
     

                      }); 


        });



                                   </script>

                                   <script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>

