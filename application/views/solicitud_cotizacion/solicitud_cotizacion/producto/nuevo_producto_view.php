<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo producto</h5>
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
    <label  class="col-3 col-form-label">Producto</label>
    <div class="col-9">

             <input type="text" name="nb_producto" id="nb_producto" maxlength="200" class="form-control" placeholder="Producto" value="">
    
    </div>
   </div>
</div>


</div>

    <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Cantidad</label>
    <div class="col-9">
        <input type="number" name="ca_unidades" id="ca_unidades" class="form-control" min="1" placeholder="Unidades" value="1">

    </div>
   </div>
</div>



</div>




 </form>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                 <a onclick="ejecutar_agregar_producto()" class="btn btn-light-primary font-weight-bold mr-2">Agregar</a>

            </div>



  <script type="text/javascript">

  
     function ejecutar_agregar_producto(){
   
  var co_solicitud_cotizacion =  '<?php echo $co_solicitud_cotizacion; ?>'
  var nb_producto =  $('#nb_producto').val();
  var ca_unidades =  $('#ca_unidades').val();



      if (nb_producto == '') {
         toastr.error('Ingrese el nombre del producto', 'Error');
         $('#nb_producto').focus();
         return;

    };


     KTApp.block('.modal-content');

                           $.ajax({
    method: "POST",
    data: {'co_solicitud_cotizacion':co_solicitud_cotizacion, 'nb_producto':nb_producto, 'ca_unidades':ca_unidades},
    url: "<?php echo site_url('solicitud_cotizacion/ejecutar_agregar_producto') ?>",
    beforeSend: function(){  },
                 }).done(function(data) { 

                   KTApp.unblock('.modal-content');
                   
                $("#reload_lista_productos").load('<?php echo site_url('solicitud_cotizacion/lista_productos/') ?>'+co_solicitud_cotizacion);
                $('#ajax_remote').modal('hide');
      
   
                  }).fail(function(){
                KTApp.unblock('.modal-content'); 
   
                alert('Error de conexion');
   
   
                  }); 
   }

</script>