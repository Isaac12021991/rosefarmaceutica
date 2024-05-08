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
    <label  class="col-3 col-form-label">Producto<br>solicitado:</label>
    <div class="col-9">

                 <select class="form-control form-control-solid" id="nb_producto_solicitado" name="nb_producto_solicitado" onchange="ver_info_producto()">
        <?php foreach($lista_productos_cotizacion->result() as $row){
        echo "<option value='".$row->nb_producto."'>".$row->nb_producto."</option>";
        } ?>
        </select> 
    </div>
   </div>
</div>


</div>


        <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label"><b>Producto<br>a ofrecer:</b></label>
    <div class="col-9">


    <select class="form-control form-control-solid js-example-basic-single" id="co_producto_publicaciones" name="co_producto_publicaciones" onchange="ver_info_producto()">
        <option value="0">Seleccione...</option>
        <?php foreach($lista_productos_producto_publicaciones->result() as $row){
        echo "<option value='".$row->id."'>".$row->nb_producto."</option>";
        } ?>
        </select> 
         <span class="form-text text-dark">Seleccione los producto que tiene resgistrado, ¿No ha cargado productos? Registre primero sus productos para ofrecerlos a los clientes</span>
    </div>
   </div>
</div>


</div>

    <div class="row">
     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-4 col-form-label">Cantidad solicitada:</label>
    <div class="col-8">
        <input type="number" name="ca_unidades" id="ca_unidades" class="form-control" min="1" placeholder="Unidades" value="1">
        <span class="form-text text-muted">Cantidad solicitada por el cliente</span>

    </div>
   </div>

</div>



    
     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-4 col-form-label p-0">Precio a ofrecer:</label>
    <div class="col-8">
        <input type="number" name="ca_precio" id="ca_precio" class="form-control" min="1" placeholder="Unidades" value="1">

    </div>
   </div>
</div>


</div>

    <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="form-group row">
    <label  class="col-3 col-form-label">Vence:</label>
    <div class="col-9">
         <input type="text" name="ff_vence" id="ff_vence" maxlength="20" class="form-control" placeholder="Vence" value="">
    </div>
   </div>
</div>


</div>




 </form>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                 <a onclick="ejecutar_agregar_producto_orden_compra()" class="btn btn-light-primary font-weight-bold mr-2">Agregar</a>

            </div>



  <script type="text/javascript">

    ver_info_producto()

       $(document).ready(function(){


    $('.js-example-basic-single').select2();


                 }); // Fin ready

  
     function ejecutar_agregar_producto_orden_compra(){
  
  var co_orden_compra =  '<?php echo $co_orden_compra; ?>' 
  var co_solicitud_cotizacion =  '<?php echo $co_solicitud_cotizacion; ?>'
  var nb_producto_solicitado =  $('#nb_producto_solicitado').val();
  var co_producto_publicaciones =  $('#co_producto_publicaciones').val();
  var ca_unidades =  $('#ca_unidades').val();

  var ca_precio =  $('#ca_precio').val();
  var ff_vence =  $('#ff_vence').val();


        if (ca_precio == '') {
             toastr.error("Ingrese el precio", 'Error');
           $('#ca_precio').focus();
            return;
   
       };

        if (ca_precio <= 0) {
             toastr.error("Ingrese el precio", 'Error');
           $('#ca_precio').focus();
            return;
   
       };



      if (co_producto_publicaciones == 0) {
         toastr.error('Seleccione el producto a ofrecer al cliente', 'Error');
         $('#co_producto_publicaciones').focus();
         return;

    };


     KTApp.block('.modal-content');

                           $.ajax({
    method: "POST",
    data: {'co_orden_compra':co_orden_compra, 'co_solicitud_cotizacion':co_solicitud_cotizacion, 'nb_producto_solicitado':nb_producto_solicitado, 'ca_unidades':ca_unidades, 'ca_precio':ca_precio, 'ff_vence':ff_vence, 'co_producto_publicaciones':co_producto_publicaciones},
    url: "<?php echo site_url('solicitud_cotizacion/ejecutar_agregar_producto_orden_compra') ?>",
    beforeSend: function(){  },
                 }).done(function(data) { 


                   KTApp.unblock('.modal-content');

                    var obj = JSON.parse(data);

                       if (obj.error == 0) {

                $("#lista_productos_orden_compra").load('<?php echo site_url('solicitud_cotizacion/lista_productos_orden_compra/') ?>'+0+'/'+co_solicitud_cotizacion);
                $('#ajax_remote').modal('hide');
      

                       }else{

                        toastr.error(obj.message, 'Error');
                         return;


                       }
                   

   
                  }).fail(function(){
                KTApp.unblock('.modal-content'); 
   
   
   
                  }); 
   }

   function ver_info_producto()
   {

    var nb_producto_solicitado =  $('#nb_producto_solicitado').val();
    var co_producto_publicaciones =  $('#co_producto_publicaciones').val();

    $.post( "<?php echo site_url('solicitud_cotizacion/ver_info_producto_solicitud_cotizacion') ?>", { nb_producto_solicitado: nb_producto_solicitado, co_solicitud_cotizacion: co_solicitud_cotizacion, co_producto_publicaciones: co_producto_publicaciones })
  .done(function( data ) {
    var obj = JSON.parse(data);
    $('#ca_unidades').val(obj.ca_unidades)
    $('#ff_vence').val(obj.ff_vence)
    $('#ca_precio').val(obj.ca_precio)
    

  });


   }

</script>