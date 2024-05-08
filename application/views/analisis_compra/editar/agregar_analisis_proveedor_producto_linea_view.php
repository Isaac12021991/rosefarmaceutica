    
        <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Agregar</h4>
                                </div>
                                <div class="modal-body" id="block">
                                  
                                   <form class="form-horizontal" role="form">

                                        <div class="form-body">
                                        <div class="row">
                                          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">




              <div class="form-group">
               <label class="col-md-3 control-label">Producto</label>
               <div class="col-md-9">
                  <input type="text" name="nb_producto" id="nb_producto" class="form-control input-lg" placeholder="Producto" value="">  
               </div>
            </div>


              <div class="form-group">
               <label class="col-md-3 control-label">Descripcion</label>
               <div class="col-md-9">
                  <input type="text" name="tx_descripcion" id="tx_descripcion" class="form-control input-sm" placeholder="Descripcion" value="">  
               </div>
            </div>

              <div class="form-group">
               <label class="col-md-3 control-label">Fabricante</label>
               <div class="col-md-9">
                  <input type="text" name="tx_fabricante" id="tx_fabricante" class="form-control input-sm" placeholder="Fabricante" value="">  
               </div>
            </div>



                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">



                                            <div class="form-group">
                                            <label class="col-md-3 control-label">Precio</label>


                                            <div class="col-md-9">


                  <input type="text" name="ca_precio" id="ca_precio" class="form-control input-sm" placeholder="Precio" value="">  

  
                                            </div>
                                            </div>



                                            <div class="form-group">
                                            <label class="col-md-3 control-label">Unidad de manejo</label>


                                            <div class="col-md-9">


                  <input type="text" name="ca_unidad_manejo" id="ca_unidad_manejo" class="form-control input-sm input-small" placeholder="Unidad de manejo" value="">  

  
                                            </div>
                                            </div>

                                                          <div class="form-group">
               <label class="col-md-3 control-label">Vence</label>
               <div class="col-md-9">
                  <input type="text" name="vence" id="vence" class="form-control input-sm" placeholder="Vence" value="">  
               </div>
            </div>




                                                </div>
                                                </div>


                                                </div>

                                                </form>



                                </div>    
                                <div class="modal-footer">
                                    <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
                                    <a onclick="agregar_producto_listado()" class="btn blue">Guardar</a>
                                </div>






  <script type="text/javascript">



   function agregar_producto_listado()
   {
            

        var co_analisis_proveedor = '<?php echo $co_analisis_proveedor; ?>'; 
        var nb_producto = $('#nb_producto').val(); 
        var ca_precio = $('#ca_precio').val(); 
        var tx_descripcion = $('#tx_descripcion').val(); 
        var vence = $('#vence').val(); 
        var ca_unidad_manejo = $('#ca_unidad_manejo').val(); 
        var tx_fabricante = $('#tx_fabricante').val(); 

       if (ca_precio == '') {
   
   notificacion_toas('error','Error','Ingrese el precio del producto');
   $('#ca_precio').focus();
              return;
   
       };
   
   
   
   
             if ($('#ca_precio').val() <= 0) {
           notificacion_toas('error','Error','Ingrese cantidad válida');
             $('#ca_precio').focus();
               return false;
           }
   
   
   
   
       if (ca_unidad_manejo == '') {
   
   notificacion_toas('error','Error','Ingrese una unidad de manejo');
   $('#ca_unidad_manejo').focus();
              return;
   
       };
   
           
               if (ca_unidad_manejo % 1 != 0){
   
               notificacion_toas('error','Error','Ingrese un número entero');
             $('#ca_unidad_manejo').focus();
               return false;
           }
   
   
             if ($('#ca_unidad_manejo').val() <= 0) {
             notificacion_toas('error','Error','Ingrese cantidad válida');
             $('#ca_unidad_manejo').focus();
               return false;
           }
   
   
   
   
                               $('#block').block({ 
                   message: '<h5>Actualizando...</h5>', 
                   css: { border: '2px solid #000' },
                   overlayCSS: { backgroundColor: '#fff' }
               }); 
   
   
   
   
                                  $.ajax({
           method: "POST",
           data: {'co_analisis_proveedor':co_analisis_proveedor, 'nb_producto':nb_producto, 'ca_precio':ca_precio, 'tx_descripcion':tx_descripcion, 'vence':vence, 'ca_unidad_manejo':ca_unidad_manejo, 'tx_fabricante':tx_fabricante},
           url: "<?php echo site_url('analisis_proveedor/agregar_ejecutar_producto_listado') ?>",
           beforeSend: function(){  },
                        }).done(function( data ) { 
   
                         var obj = JSON.parse(data);
   
                         if (obj.error > 0)
   
                         {
   
                            $('#block').unblock(); 
   
                          notificacion_toas('error','Error',obj.message);
                           return;
   
   
                         }else{
   
                             $('#block').unblock(); 
                            location.reload();


                         }
   
   
      
                         }).fail(function(){
   
                             $('#block').unblock(); 
   
                       alert('Fallo');
   
   
                         }); 
   
   
   
   }



</script>


        <script src="<?php echo base_url() ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url() ?>assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>