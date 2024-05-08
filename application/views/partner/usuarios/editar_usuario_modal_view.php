

<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
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
        <label>Nombre:</label>
          <span><?php echo $info_usuario->first_name.' '.$info_usuario->last_name; ?></span>
      </div>

        <div class="form-group">
        <label>Correo:</label>
        <span><?php echo $info_usuario->email; ?></span>
      </div>




 </div>
   <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

            <div class="form-group">

                <?php $array_key = []; foreach ($tx_permiso->result() as $key) { 
                    array_push ($array_key, $key->tx_permiso);} 
                    ?>

        <label>Permisos</label>
                <select class="form-control input-sm js-example-basic-single" id="tx_permiso" name="tx_permiso" multiple="multiple">
           <option  <?php if (in_array("Administrador", $array_key)): ?> selected='selected' <?php endif; ?> value="Administrador">Administrador</option>
           <option  <?php if (in_array("Compras", $array_key)): ?> selected='selected' <?php endif; ?> value="Compras">Compras</option>
           <option  <?php if (in_array("Ventas", $array_key)): ?> selected='selected' <?php endif; ?> value="Ventas">Ventas</option>
           <option  <?php if (in_array("Bioenlace", $array_key)): ?> selected='selected' <?php endif; ?> value="Bioenlace">Bioenlace</option>
           <option  <?php if (in_array("Biomercado", $array_key)): ?> selected='selected' <?php endif; ?> value="Biomercado">Biomercado</option>
            </select> 
      </div>
              
</div>

</div>



 </form>




            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                 <a onclick="editar_usuario()" class="btn btn-light-primary font-weight-bold mr-2">Guardar</a>

            </div>


<script type="text/javascript">
       

           $(document).ready(function(){
   
    $('.js-example-basic-single').select2();

   }); // Fin ready
   
   

function editar_usuario()
{



              var co_usuario_partner = <?php echo $co_usuario_partner ?> 
               var tx_permiso = $('#tx_permiso').val();


             $.ajax({
        method: "POST",
      data: {'co_usuario_partner':co_usuario_partner,'tx_permiso':tx_permiso},
      url: "<?php echo site_url('partner/ejecutar_usuario_partner_permiso') ?>",
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




