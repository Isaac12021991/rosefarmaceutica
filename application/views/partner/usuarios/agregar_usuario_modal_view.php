

<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">


 <!--begin::Form-->
 <form>


<div class="row">

 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

  <div class="form-group">
        <label>Nombre</label>
         <input type="text" autofocus="" name="first_name" id="first_name" class="form-control input-lg" placeholder="Nombre" value=""> 
      </div>

        <div class="form-group">
        <label>Apellido</label>
       <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Apellido" value=""> 
      </div>


        <div class="form-group">
        <label>Correo</label>
       <input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email" value=""> 
      </div>


 </div>
   <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

          <div class="form-group">
        <label>Confirmar</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" value=""> 
      </div>


      <div class="form-group">
        <label>Confirmar contraseña</label>
       <input type="password" name="password_repeat" autocomplete="off" id="password_repeat" class="form-control input-sm input-lg" placeholder="Confirmar contraseña" maxlength="50" value="">
      </div>

            <div class="form-group">
        <label>Permisos</label>
        <select class="form-control input-sm js-example-basic-single" id="tx_permiso" name="tx_permiso" multiple="multiple">
           <option value="Administrador">Administrador</option>
           <option value="Compras">Compras</option>
           <option value="Ventas">Ventas</option>
           <option value="Bioenlace">Bioenlace</option>
           <option value="Biomercado">Biomercado</option>
            </select>  
      </div>
              
</div>

</div>



 </form>




            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                 <a onclick="agregar_usuario()" class="btn btn-light-primary font-weight-bold mr-2">Guardar</a>

            </div>




<script type="text/javascript">

       

           $(document).ready(function(){
   
    $('.js-example-basic-single').select2();

   }); // Fin ready
   
   

function agregar_usuario()
{



              var email = $('#email').val(); 
               var first_name = $('#first_name').val(); 
               var last_name = $('#last_name').val();
              var password_repeat = $('#password_repeat').val(); 
               var password = $('#password').val();
               var tx_permiso = $('#tx_permiso').val();


      if (email == '') {
         toastr.error('Ingrese el email', 'Error');
         $('#email').focus();
         return;

    };

          

          if (first_name == '') {

         toastr.error('Ingrese el nombre', 'Error');
         $('#first_name').focus();
         return;

    };

              if (last_name == '') {

         toastr.error('Ingrese el apellido', 'Error');
         $('#last_name').focus();
         return;

    };


                      if(password.length <= 4){

      toastr.error('Ingrese un minimo de 6 caracateres en su contraseña', 'Error');
      $('#nu_cedula').focus();
      return false;
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

       var co_partner = '<?php echo $co_partner; ?>';


             $.ajax({
        method: "POST",
      data: {'email':email, 'first_name':first_name, 'last_name':last_name, 'password':password,'tx_permiso':tx_permiso, 'co_partner':co_partner},
      url: "<?php echo site_url('partner/ejecutar_agregar_usuario_partner') ?>",
                     }).done(function( data ) { 

                        var obj = JSON.parse(data);

                       if (obj.error == 0) {

                        toastr.success(obj.message, 'Exito');

                       $('#ajax_remote').modal('hide');
                       location.reload();

                         

                       }else{

                        toastr.error(obj.message, 'Error');

                         return;

                       }
                                   

                      }).fail(function(){

                        toastr.error('Intente mas tarde', 'Error');
                         return;


                      }); 




}


</script>



