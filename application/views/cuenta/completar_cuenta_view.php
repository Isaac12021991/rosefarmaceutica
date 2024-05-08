                  <link href="<?php echo base_url() ?>css/acordeon/styles_acordeon.css" rel="stylesheet" type="text/css" /> 

                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                                          <div class="row">
                     <div class="col-lg-6 col-lg-offset-3">

                        <div class="row">




                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                  
                            <div class="portlet light">
                                <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-speech"></i>
                                            <span class="caption-subject bold uppercase"> Actualizar cuenta </span>
                                            <span class="caption-helper">Para continuar por favor complete la siguiente información</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">


                                      <form role="form">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>Nombre</label>
 <input type="text" name="first_name" id="first_name" class="form-control input-sm input-lg" maxlength="50" placeholder="Nombre" autofocus="autofocus" value="<?php echo $info_usuario->first_name; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Apellido</label>
                                                  <input type="text" name="last_name" id="last_name" maxlength="50" class="form-control input-sm input-lg" placeholder="Apellido" value="<?php echo $info_usuario->last_name; ?>">

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Email</label>
                                                <input type="text" name="email" id="email" class="form-control input-sm" placeholder="Email" maxlength="50" value="<?php echo $info_usuario->email; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>N° de Cedula</label>
                                                <input type="text" name="nu_cedula" id="nu_cedula" class="form-control input-sm input-medium" maxlength="15" placeholder="Cedula" maxlength="10" value="<?php echo $info_usuario->nu_cedula; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Estado</label>
                                              <select class="form-control input-sm" id="nb_estado" name="nb_estado">
                                                 <option value="">Seleccione</option>
                                                 <?php foreach($estados->result() as $row): ?>

                                                  <?php if ($info_usuario->nb_estado == $row->nb_estado): ?>
                                              <option selected="selected" value="<?php echo $row->nb_estado; ?>"> <?php echo $row->nb_estado; ?></option>

                                              <?php continue; endif; ?>

                                            <option value="<?php echo $row->nb_estado; ?>"> <?php echo $row->nb_estado; ?></option>


                                              <?php endforeach; ?>
                                                </select>
                                                </div>


                                            </div>
                                            <div class="form-actions">
                                                <a  id="actualizar_usuario" class="btn blue">Actualizar</a>
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



 $('#actualizar_usuario').click(function(){

              var email = $('#email').val(); 
              var nu_cedula = $('#nu_cedula').val(); 
               var first_name = $('#first_name').val(); 
               var last_name = $('#last_name').val();
               var nb_estado = $('#nb_estado').val();



      if (email == '') {
         notificacion_toas('error','Error','Ingrese el email');
         $('#email').focus();
         return;

    };

    if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {

      notificacion_toas('error','Error','Ingrese un email válido');
       $('#email').focus();
       return;
    }

          

          if (first_name == '') {

         notificacion_toas('error','Error','Ingrese el nombre');
         $('#first_name').focus();
         return;

    };

              if (last_name == '') {

         notificacion_toas('error','Error','Ingrese el apellido');
         $('#last_name').focus();
         return;

    };


       if ($('#password').val() != $('#password_repeat').val()) {

         notificacion_toas('error','Error','Las contraseña no son iguales porr favor verifique');
         $('#password').focus();
         return;

       }

              if ($('#password').val() == '') {

         notificacion_toas('error','Error','Ingrese una contraseña');
         $('#password').focus();
         return;

       }



             $.ajax({
        method: "POST",
      data: {'email':email, 'nu_cedula':nu_cedula, 'first_name':first_name, 'last_name':last_name, 'nb_estado':nb_estado},
      url: "<?php echo site_url('cuenta/editar_cuenta_usuario') ?>",
        beforeSend: function(){ $('#actualizar_usuario').html('Actualizando...'); $('#actualizar_usuario').attr("disabled", true);},
                     }).done(function( data ) { 

                        var obj = JSON.parse(data);

                       if (obj.error == 0) {

                        notificacion_toas('info','Exito',obj.message);

                        $('#actualizar_usuario').html('Acualizar');
                        $('#actualizar_usuario').attr("disabled", false);

                        $(location).attr('href',"<?php echo site_url() ?>inicio/index"); 

                       }else{

                        notificacion_toas('error','Error',obj.message);
                        $('#actualizar_usuario').html('Acualizar');
                        $('#actualizar_usuario').attr("disabled", false);
                         return;

                       }
                                   

                      }).fail(function(){

                         notificacion_toas('error','Error','Error del Servidor, Intente más tarde');
                        $('#actualizar_usuario').html('Acualizar');
                        $('#actualizar_usuario').attr("disabled", false);
                         return;


                      }); 

   });


  </script>