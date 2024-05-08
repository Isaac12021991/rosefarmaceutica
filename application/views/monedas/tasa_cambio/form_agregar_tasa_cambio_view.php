                                  
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Agregar tasa de cambio</h4>
                                </div>
                                <div class="modal-body" id="block_page">
                                  
                                                                       <form class="form-horizontal" role="form">

                                            <div class="form-body">


                                            <div class="row">
                                             <div class="col-lg-12">

                        <div class="form-group">
               <label class="col-md-3 control-label"><b>Moneda</b></label>
               <div class="col-md-9">
                           <select class="form-control input-sm" id="co_moneda_tasa_cambio" name="co_moneda_tasa_cambio">
            <option value="">Seleccione ... </option>
            <?php foreach($listado_monedas->result() as $row){echo "<option value='".$row->id."'>".$row->nb_moneda.' ('.$row->nb_acronimo.')'."</option>";} ?>
         </select>
               </div>
            </div>


                    <div class="form-group">
               <label class="col-md-3 control-label"><b>Tasa de cambio</b></label>
               <div class="col-md-9">
                  <input type="text" name="ca_tasa_cambio" id="ca_tasa_cambio" class="form-control input-lg" placeholder="Monto" value=""> 
               </div>
            </div>


   

                                                </div>



                                                </div>

                
                                            </div>

 
                                      </form>




                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
                                    <a onclick="agregar_tasa_cambio()" class="btn blue">Guardar</a>
                                </div>





                                

<script type="text/javascript">


   function agregar_tasa_cambio()
   {
                  var co_moneda = '<?php echo $co_moneda; ?>';
                  var co_moneda_tasa_cambio = $('#co_moneda_tasa_cambio').val();
                  var ca_tasa_cambio = $('#ca_tasa_cambio').val();

             
         if (co_moneda_tasa_cambio == '') {
   
            notificacion_toas('error','Moneda','Seleccione un producto');
           $('#co_moneda_tasa_cambio').focus();
            return;
   
       };
   
   
       if (ca_tasa_cambio == '') {
   
   
           notificacion_toas('error','Moneda','Ingrese un monto');
           $('#ca_tasa_cambio').focus();
            return;
   
       };
   
   
   
                                  $.ajax({
           method: "POST",
           data: {'co_moneda':co_moneda,'co_moneda_tasa_cambio':co_moneda_tasa_cambio, 'ca_tasa_cambio':ca_tasa_cambio},
           url: "<?php echo site_url('monedas/agregar_tasa_cambio') ?>",
           beforeSend: function(){  },
                        }).done(function( data ) { 
   
                         var obj = JSON.parse(data);
   
                         if (obj.error > 0)
   
                         {
   
                           notificacion_toas('error','Monedas',obj.message);
                           return;
   
   
                         }else{
   
                    $('#ajax_remote').modal('hide'); 
                    location.reload();    
   
   
                         }
   
   
      
                         }).fail(function(){
   
                       alert('Fallo');
   
   
                         }); 
   
   
   
   }
   
  
   
   
                                      
</script>

<script src="<?php echo base_url() ?>js/jquery.blockUI.js" type="text/javascript"></script>


