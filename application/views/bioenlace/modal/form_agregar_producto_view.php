                                  
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Crear producto</h4>
                                </div>
                                <div class="modal-body" id="block_page">
                                  
                                                                       <form class="form-horizontal" role="form">

                                            <div class="form-body">


                                            <div class="row">
                                             <div class="col-lg-6">

        

                    <div class="form-group">
               <label class="col-md-3 control-label"><b>Producto</b></label>
               <div class="col-md-9">
                  <input type="text" name="nb_producto" id="nb_producto" class="form-control input-lg" placeholder="Producto" value=""> 
               </div>
            </div>

                      <div class="form-group">
                <label class="col-md-3 control-label"><b>Venta / Compra</b></label>
                <div class="col-md-9">
                    <div class="mt-checkbox-inline">
                        <label class="mt-checkbox">
                            <input type="checkbox" id="nb_vendido" name="nb_vendido" checked="checked"> Puede ser vendido
                            <span></span>
                        </label>
                        <label class="mt-checkbox">
                            <input type="checkbox" id="nb_comprado" name="nb_comprado" checked="checked"> Puede ser comprado
                            <span></span>
                        </label>
                    </div>
                </div>
            </div>


   

                                                </div>
                                                <div class="col-lg-6">

            <div class="form-group">
               <label class="col-md-3 control-label"><b>Tipo de producto</b></label>
               <div class="col-md-9">

              <select class="form-control input-sm" id="nb_tipo_producto" name="nb_tipo_producto">
              <option value="">Seleccione ...</option>
              <option value="consumible">Consumible</option>
              <option value="servicio">Servicio</option>
              <option value="producto_almacenable">Producto almacenable</option>
            </select> 

               </div>
            </div>

                                                </div>


                                                </div>

                                               <div class="row">
                                                  <div class="col-md-12">

                                                                                            <div class="tabbable tabbable-tabdrop">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab1_modal" data-toggle="tab">Informacion General</a>
                                                </li>
                                                <li>
                                                    <a href="#tab2_modal" data-toggle="tab">Inventario</a>
                                                </li>
 
                                                                                
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1_modal">


                                                    
                                     <form class="form-horizontal" role="form">

                                            <div class="form-body">

                                                 <div class="row">
                                             <div class="col-lg-6">

        
           <div class="form-group">
               <label class="col-md-3 control-label"><b>Categoria</b></label>
               <div class="col-md-9">
              <select class="form-control input-sm" id="co_categoria" name="co_categoria">
            <?php foreach($listado_categorias_productos->result() as $row){echo "<option value='".$row->id."'>".$row->nb_categoria_completo."</option>";} ?>
            </select>  
               </div>
            </div>

                                         <div class="form-group">
               <label class="col-md-3 control-label"><b>Referencia interna</b></label>
               <div class="col-md-9">
                <input type="text" name="nu_referencia" id="nu_referencia" class="form-control input-sm" placeholder="Referencia interna" value=""> 
               </div>
            </div>


                           <div class="form-group">
                 <label class="col-md-3 control-label"><b>Codigo barra SICM</b></label>
                 <div class="col-md-9">
                  <div class="input-group">
                     <input type="text" class="form-control input-sm" placeholder="Codigo de barras de farmapatria" id="cod_producto_sicm" name="cod_producto_sicm" value="">
                     <span class="input-group-btn input-group-sm">
                     <a class="btn green" onclick="sincronizar_sim()">Sincronizar!</a>
                     </span>
                  </div>
                </div>
                  <!-- /input-group -->
               </div>

                           <div class="form-group">
               <div class="col-md-offset-3 col-md-9">
                  <div id="response_farmapatria"></div>
               </div>
            </div>

                                                 <div class="form-group">
               <label class="col-md-3 control-label"><b>Codigo SICA</b></label>
               <div class="col-md-9">
                <input type="text" name="cod_sica" id="cod_sica" class="form-control input-sm" placeholder="Codigo Sica" value=""> 
               </div>
            </div>

                                                </div>
                                                <div class="col-lg-6">


                              <div class="form-group">
               <label class="col-md-3 control-label"><b>Fabricante</b></label>
               <div class="col-md-9">
                <input type="text" name="nb_fabricante" id="nb_fabricante" class="form-control input-sm" placeholder="Fabricante" value=""> 
               </div>
            </div>


                              <div class="form-group">
               <label class="col-md-3 control-label"><b>Descripcion</b></label>
               <div class="col-md-9">
                <textarea class="form-control" id="tx_descripcion" name="tx_descripcion"></textarea>
               </div>
            </div>



                                                </div>
                                              </div>

     
                                              </div>

                                            </form>



                                                </div>
                                                <div class="tab-pane" id="tab2_modal">

                                            <form class="form-horizontal" role="form">

                                            <div class="form-body">

                                                 <div class="row">
                                             <div class="col-lg-6">


                        <div class="form-group">
               <label class="col-md-3 control-label"><b>Peso (KG)</b></label>
               <div class="col-md-9">
                <input type="text" name="ca_peso" id="ca_peso" class="form-control input-sm" placeholder="Peso" value="0"> 
               </div>
            </div>

            <div class="form-group">
               <label class="col-md-3 control-label"><b>Volumen (Mt2)</b></label>
               <div class="col-md-9">
                <input type="text" name="ca_volumen" id="ca_volumen" class="form-control input-sm" placeholder="Peso" value="0"> 
               </div>
            </div>



                                             </div>

                                           </div>
                                         </div>

                                       </form>


                                          </div>
  
                    
                                            </div>
                                        </div>


                                                  </div>

                                                 </div>


                                            </div>

 
                                      </form>




                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn default" data-dismiss="modal">Cerrar</button>
                                    <a onclick="nuevo_producto()" class="btn blue">Guardar</a>
                                </div>





                                

<script type="text/javascript">


   function nuevo_producto()
   {
                  var nb_producto = $('#nb_producto').val();
                  var nb_tipo_producto = $('#nb_tipo_producto').val();
                  var co_categoria = $('#co_categoria').val();
                  var ca_peso = $('#ca_peso').val();
                  var ca_volumen = $('#ca_volumen').val();
                  var nu_referencia = $('#nu_referencia').val();
                  var nb_fabricante = $('#nb_fabricante').val();
                  var tx_descripcion = $('#tx_descripcion').val();
                  var cod_producto_sicm = $('#cod_producto_sicm').val(); 
                  var cod_sica = $('#cod_sica').val();   
                  var nb_vendido = $("#nb_vendido").is(":checked");
                  var nb_comprado = $("#nb_comprado").is(":checked");

             
         if (nb_producto == '') {
   
            notificacion_toas('error','Producto','Ingrese el producto');
           $('#nb_producto').focus();
            return;
   
       };
   
   
       if (co_categoria == '') {
   
   
           notificacion_toas('error','Producto','Ingrese la categoria del producto');
           $('#nb_categoria').focus();
            return;
   
       };
   
   
   
                                  $.ajax({
           method: "POST",
           data: {'nb_producto':nb_producto, 'nb_tipo_producto':nb_tipo_producto, 'ca_peso':ca_peso, 'ca_volumen':ca_volumen, 'co_categoria':co_categoria, 'nb_vendido':nb_vendido, 'nb_comprado':nb_comprado, 'nu_referencia':nu_referencia, 'tx_descripcion':tx_descripcion, 'cod_producto_sicm':cod_producto_sicm, 'cod_sica':cod_sica, 'nb_fabricante':nb_fabricante},
           url: "<?php echo site_url('productos/agregar_nuevo_producto') ?>",
           beforeSend: function(){  },
                        }).done(function( data ) { 
   
                         var obj = JSON.parse(data);
   
                         if (obj.error > 0)
   
                         {
   
                           notificacion_toas('error','Producto',obj.message);
                           return;
   
   
                         }else{
   

                      $("#reload_select_producto").load('<?php echo site_url('productos/reload_select_producto') ?>');
                    $('#ajax_remote_producto').modal('hide');     
   
   
                         }
   
   
      
                         }).fail(function(){
   
                       alert('Fallo');
   
   
                         }); 
   
   
   
   }
   
   
   function sincronizar_sim()
   {
   
      var cod_producto_sicm = $('#cod_producto_sicm').val();
   
                                  $.ajax({
           method: "POST",
           data: {'cod_producto_sicm':cod_producto_sicm},
           url: "<?php echo site_url('productos/sincronizar_farmapatria') ?>",
           beforeSend: function(){  },
                        }).done(function( data ) { 
   
                     $("#response_farmapatria").html(data);
   
      
                         }).fail(function(){
   
                       alert('Fallo');
   
   
                         }); 
   
   
   }
   
   
   
                                      
</script>

<script src="<?php echo base_url() ?>js/jquery.blockUI.js" type="text/javascript"></script>


