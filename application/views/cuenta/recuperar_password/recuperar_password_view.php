<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recuperar Acceso al sistema</h5>
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
    <label  class="col-3 col-form-label">Email</label>
    <div class="col-9">
     <input type="text" name="tx_email" id="tx_email" maxlength="50" class="form-control input-lg" placeholder="Email" value="">
    </div>
   </div>
</div>

</div>
<div class="row">

 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

  <h4 class="text-info">Aviso</h4>
  <p>Ingrese el email que esta registrado en nuestra plataforma, si su email esta registrado en el sistema, le llegará un correo con un link de recuperacion.</p>
  <h5 class="text-success" id="respuesta"></h5>
 </div>

</div>



 </form>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                 <a onclick="enviar_informacion()" class="btn btn-light-primary font-weight-bold mr-2">Enviar Informacion</a>

            </div>



  <script type="text/javascript">

  
     function enviar_informacion(){
   
  var tx_email =  $('#tx_email').val();


      if (tx_email == '') {
         toastr.error('Ingrese el Email', 'Error');
         $('#tx_email').focus();
         return;

    };

    if($("#tx_email").val().indexOf('@', 0) == -1 || $("#tx_email").val().indexOf('.', 0) == -1) {

      toastr.error('Ingrese un tx_email válido', 'Error');
       $('#tx_email').focus();
       return;
    }


     KTApp.block('.modal-content');

                           $.ajax({
    method: "POST",
    data: {'tx_email':tx_email},
    url: "<?php echo site_url('cuenta/verificar_email') ?>",
    beforeSend: function(){  },
                 }).done(function(data) { 

                   KTApp.unblock('.modal-content');
                   
                     var obj = JSON.parse(data);


                      if (obj.error > 0){ 

                        $('#respuesta').html(obj.error) ;

                    }else{

                      $('#respuesta').html(obj.message);

                    }
   
                  }).fail(function(){
                KTApp.unblock('.modal-content'); 
   
                alert('Error de conexion');
   
   
                  }); 
   }

</script>