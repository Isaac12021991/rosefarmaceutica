<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar cuenta</h5>
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




 </form>




            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                 <a id="eliminar_cuenta" class="btn btn-light-danger font-weight-bold mr-2">Eliminar</a>

            </div>



  <script type="text/javascript">


 $('#eliminar_cuenta').click(function(){

              var tx_password_actual = $('#tx_password_actual').val(); 


             $.ajax({
        method: "POST",
      data: {'tx_password_actual':tx_password_actual},
      url: "<?php echo site_url('cuenta/eliminar_cuenta_ejecutar') ?>",
        beforeSend: function(){ $('#cambiar_password').html('Actualizando...'); $('#eliminar_cuenta').attr("disabled", true);},
                     }).done(function( data ) { 

                        var obj = JSON.parse(data);

                       if (obj.error == 0) {

                        toastr.success(obj.message, 'Exito');

                        $('#eliminar_cuenta').html('Eliminar');
                        $('#eliminar_cuenta').attr("disabled", false);

                         location.reload();
                         $('#ajax_remote').modal('hide');

                       }else{


                        toastr.error(obj.message, 'Error');
                        $('#eliminar_cuenta').html('Eliminar');
                        $('#eliminar_cuenta').attr("disabled", false);
                         return;

                       }
                                   

                      }).fail(function(){

                         toastr.error('Error del Servidor, Intente más tarde', 'Error');
                        $('#cambiar_password').html('Eliminar');
                        $('#cambiar_password').attr("disabled", false);
                         return;


                      }); 

   });




  </script>