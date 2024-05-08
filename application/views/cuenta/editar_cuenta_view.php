<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar datos de usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">

              <div class="row justify-content-center my-2 px-2 my-lg-0 px-lg-2">
                        <div class="col-xl-12 col-xxl-7">

                            <p class="lead">Informacion principal:</p>
                                <div class="form-group mb-2">
                                <label>Nombre</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="first_name" id="first_name"  maxlength="50" placeholder="Nombre" autofocus="autofocus" value="<?php echo $info_usuario->first_name; ?>" />
                                <span class="form-text text-muted">Ingrese su nombre completo.</span>
                              </div>

                                 <div class="form-group mb-2">
                                <label>Nombre</label>
                                <input type="text" class="form-control form-control-solid form-control-lg"  name="last_name" id="last_name" maxlength="50" placeholder="Apellido" value="<?php echo $info_usuario->last_name; ?>" />
                                <span class="form-text text-muted">Ingrese el apellido.</span>
                              </div>

                              <div class="form-group mb-2">
                                <label>Cedula o pasaporte</label>
                                 <input type="text" name="nu_cedula" id="nu_cedula" class="form-control form-control-sm"  maxlength="15" placeholder="Cedula" maxlength="10" value="<?php echo $info_usuario->nu_cedula; ?>">
                                <span class="form-text text-muted">Ingrese su numero de cedula o pasaporte.</span>
                              </div>

                              <p class="lead">Contacto:</p>


                              <div class="form-group mb-2">
                                <label>Email</label>
                                <input class="form-control form-control-sm"  type="email" name="email" id="email" maxlength="50" placeholder="Email" maxlength="50" value="<?php echo $info_usuario->email; ?>" />
                                <span class="form-text text-muted">Ingrese el email de contacto.</span>
                              </div>


                              <div class="form-group mb-2">
                                <label>Celular</label>
                                   <input type="text" name="phone" id="phone"  class="form-control form-control-sm"  placeholder="Celular" maxlength="30" value="<?php echo $info_usuario->phone; ?>">
                                <span class="form-text text-muted">Ingrese el numero de celular que desea recibir notificaciones.</span>
                              </div>

                              <div class="form-group mb-2">
                                <label>WhatsApp</label>
                                   <input type="text" name="nu_whatsapp" id="nu_whatsapp"  class="form-control form-control-sm"  placeholder="WhatsApp" maxlength="30" value="<?php echo $info_usuario->nu_whatsapp; ?>">
                                <span class="form-text text-muted">Indique su numero de WhatsApp.</span>
                              </div>


                               

                        </div>


                      </div>







            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                 <a id="actualizar_usuario" class="btn btn-light-primary font-weight-bold mr-2">Guardar</a>

            </div>




  <script type="text/javascript">



 $('#actualizar_usuario').click(function(){

              var email = $('#email').val(); 
              var nu_cedula = $('#nu_cedula').val(); 
               var first_name = $('#first_name').val(); 
               var last_name = $('#last_name').val();
               var phone = $('#phone').val();
               var nu_whatsapp = $('#nu_whatsapp').val();
               


      if (email == '') {
         toastr.error('Ingrese el email', 'Error');
         $('#email').focus();
         return;

    };

    if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {

      toastr.error('Ingrese el email valido', 'Error');
       $('#email').focus();
       return;
    }

          
      if (nu_cedula == '') {

          toastr.error('Ingrese una identificacion', 'Error');
         $('#nu_cedula').focus();
         return;

    };

          if (first_name == '') {

         toastr.error('Ingrese un nombre', 'Error');
         $('#first_name').focus();
         return;

    };

              if (last_name == '') {

         toastr.error('Ingrese un apellido', 'Error');
         $('#last_name').focus();
         return;

    };

                if (nu_cedula % 1 != 0){

         toastr.error('Ingrese una identificacion valida', 'Error');
         $('#nu_cedula').focus();
         return;
        }


          if ($('#nu_cedula').val() <= 0) {
         toastr.error('Ingrese una identificacion valida', 'Error');
         $('#nu_cedula').focus();
         return;
        }


       if ($('#password').val() != $('#password_repeat').val()) {

         toastr.error('Las contraseña no son iguales por favor verifique', 'Error');
         $('#password').focus();
         return;

       }

              if ($('#password').val() == '') {

         toastr.error('Ingrese una contraseña', 'Error');
         $('#password').focus();
         return;

       }



             $.ajax({
        method: "POST",
      data: {'email':email, 'nu_cedula':nu_cedula, 'first_name':first_name, 'last_name':last_name, 'phone':phone, 'nu_whatsapp':nu_whatsapp},
      url: "<?php echo site_url('cuenta/editar_cuenta_usuario') ?>",
        beforeSend: function(){ $('#actualizar_usuario').html('Actualizando...'); $('#actualizar_usuario').attr("disabled", true);},
                     }).done(function( data ) { 

                        var obj = JSON.parse(data);

                       if (obj.error == 0) {

                        toastr.success(obj.message, 'Exito');

                        $('#actualizar_usuario').html('Acualizar');
                        $('#actualizar_usuario').attr("disabled", false);

                         location.reload();
                         $('#ajax_remote').modal('hide');

                       }else{

                        toastr.error(obj.message, 'Error');
                        $('#actualizar_usuario').html('Acualizar');
                        $('#actualizar_usuario').attr("disabled", false);
                         return;

                       }
                                   

                      }).fail(function(){

                         toastr.error('Error del Servidor, Intente más tarde', 'Error');
                        $('#actualizar_usuario').html('Acualizar');
                        $('#actualizar_usuario').attr("disabled", false);
                         return;


                      }); 

   });


  </script>