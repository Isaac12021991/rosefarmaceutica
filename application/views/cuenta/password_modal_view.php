<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">


 <!--begin::Form-->
 <form>

    <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Contraseña actual</label>
    <div class="col-9">
      <input type="password" name="tx_password_actual" id="tx_password_actual" autocomplete="off" class="form-control input-sm input-lg" maxlength="50" placeholder="Contraseña actual" autofocus="autofocus" value="">
    </div>
   </div>
</div>

</div>
<div class="row">

 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

  <div class="form-group">
        <label>Nueva contraseña</label>
        <input type="password" name="password" id="password" maxlength="50" autocomplete="off" class="form-control input-sm input-lg" placeholder="Nueva contraseña" value="">
      </div>



 </div>
   <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

      <div class="form-group">
        <label>Confirmar contraseña</label>
       <input type="password" name="password_repeat" autocomplete="off" id="password_repeat" class="form-control input-sm input-lg" placeholder="Confirmar contraseña" maxlength="50" value="">
      </div>
              
</div>

</div>



 </form>




            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                 <a id="cambiar_password" class="btn btn-light-primary font-weight-bold mr-2">Guardar</a>

            </div>



  <script type="text/javascript">



 $('#cambiar_password').click(function(){

              var tx_password_actual = $('#tx_password_actual').val(); 
               var password_repeat = $('#password_repeat').val(); 
               var password = $('#password').val();



     if(password.length <= 6){
      toastr.error('Ingrese un minimo de 6 caracateres en su contraseña', 'Error');
      $('#password').focus();
      return false;
    }


       if ($('#password').val() != $('#password_repeat').val()) {

          toastr.error('Las contraseña no son iguales porr favor verifique', 'Error');
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
      data: {'tx_password_actual':tx_password_actual, 'password':password},
      url: "<?php echo site_url('cuenta/cambiar_password_ejecutar') ?>",
        beforeSend: function(){ $('#cambiar_password').html('Actualizando...'); $('#cambiar_password').attr("disabled", true);},
                     }).done(function( data ) { 

                        var obj = JSON.parse(data);

                       if (obj.error == 0) {

                        toastr.success(obj.message, 'Exito');

                        $('#cambiar_password').html('Cambiar');
                        $('#cambiar_password').attr("disabled", false);

                         location.reload();
                         $('#ajax_remote').modal('hide');

                       }else{

                        toastr.error(obj.message, 'Error');
                        $('#cambiar_password').html('Cambiar');
                        $('#cambiar_password').attr("disabled", false);
                         return;

                       }
                                   

                      }).fail(function(){

                         toastr.error('Error del Servidor, Intente más tarde', 'Error');
                        $('#cambiar_password').html('Cambiar');
                        $('#cambiar_password').attr("disabled", false);
                         return;


                      }); 

   });


  </script>