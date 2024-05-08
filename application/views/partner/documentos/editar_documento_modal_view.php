
  <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Editar Usuario</h4>
</div>
<div class="modal-body">
   <form class="form-horizontal" role="form">
        <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
               <label class="col-md-3 control-label"><b>Nombre y Apellido</b></label>
               <div class="col-md-9">
                <span><?php echo $info_usuario->first_name.' '.$info_usuario->last_name; ?></span>
               </div>
            </div>


        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
               <label class="col-md-3 control-label"><b>Correo</b></label>
               <div class="col-md-9">
        <span><?php echo $info_usuario->email; ?></span>
      </div>
  </div>

                    <div class="form-group">
                <?php $array_key = []; foreach ($tx_permiso->result() as $key) { 
                    array_push ($array_key, $key->tx_permiso);} 
                    ?>
               <label class="col-md-3 control-label"><b>Permisos</b></label>
               <div class="col-md-9">
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
        </div>
    </form>
    </div>

<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
    <button type="button" class="btn blue" onclick="editar_usuario()">Guardar</button>
</div>


     <script src="<?php echo base_url() ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

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

                        notificacion_toas('info','Exito',obj.message);


                       $('#ajax_remote').modal('hide');
                       location.reload();

                         

                       }else{

                        notificacion_toas('error','Error',obj.message);

                         return;

                       }
                                   

                      }).fail(function(){

                         notificacion_toas('error','Error','Error del Servidor, Intente más tarde');
                         return;


                      }); 




}


</script>




