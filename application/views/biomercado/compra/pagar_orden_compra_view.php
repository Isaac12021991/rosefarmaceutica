<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Marcar como pagado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">

              <div class="row justify-content-center my-2 px-2 my-lg-0 px-lg-2">
                        <div class="col-xl-12 col-xxl-8">

                            <p class="lead">Informacion principal:</p>

                                <div class="form-group mb-2">
                                <label>Cuenta destino</label>
            <?php $info_cuenta_vendedor = $this->empresa_library->get_info_cuentas_bancarias($info_orden_compra->co_partner_vendedor); ?>

                        <?php if($info_cuenta_vendedor): ?>
                     <select class="form-control form-control-solid" id="co_diario" name="co_diario">
                    <?php foreach($info_cuenta_vendedor->result() as $row){
                                   echo "<option value='".$row->id."'>".$row->nb_diario."</option>";
                              } ?>
                              </select> 
                          <?php else: ?>

                            <span class="form-control-lg">El vendedor no ha reportado las cuentas bancarias en la plataforma</span>
                          <?php endif; ?>
                                <span class="form-text text-dark">Seleccione a que cuenta se le realizo el pago.</span>
                              </div>

                                                              <div class="form-group mb-2">
                                <label>Forma de pago</label>
                            <select class="form-control form-control-solid" id="nb_forma_pago" name="nb_forma_pago">
                            <?php foreach($lista_forma_pago->result() as $row){
                                   echo "<option value='".$row->nb_forma_pago."'>".$row->nb_forma_pago."</option>";
                              } ?>
                              </select>  
                                <span class="form-text text-dark">Seleccione la forma de pago.</span>
                              </div>


                                <div class="form-group mb-2">
                                <label>Monto</label>
                                <input type="text" class="form-control form-control-solid form-control-lg"  name="ca_pago" id="ca_pago" placeholder="Monto" value="<?php echo number_format($ca_monto_orden_compra,2,',','.'); ?>" />
                                <span class="form-text text-dark">Ingrese el monto de la orden de compra.</span>
                              </div>

         
                                <table class="table table-sm table-bordered">
                                  
                                  <tr>
                                    <td>Monto a pagar: </td> <td><?php echo number_format($ca_monto_orden_compra, 2,',','.'); ?></td>

                                  </tr>

                                   <tr>
                                    <td>Monto en Bs: </td> <td> <?php echo number_format($this->biomercado_library->get_info_dolar_bcv($ca_monto_orden_compra, date('Y-m-d',$info_orden_compra->ff_fecha_elaboracion)), 2,',','.') ; ?></td>

                                  </tr>

                                </table>

                         

                                <div class="form-group mb-2">
                                <label>Numero de comprobante</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="nu_referencia" id="nu_referencia"  placeholder="Referencia" autofocus="autofocus" value="" />
                                <span class="form-text text-dark">Ingrese la referencia, numero de comprobante  o confirmacion de la transaccion.</span>
                              </div>


     

                              <div class="form-group mb-2"> 
                                <label>Fecha</label>
                               <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" id="ff_pago" name="ff_pago" placeholder="01-01-2000" data-target="#datetimepicker4"/>
                                <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                                <span class="form-text text-dark">Ingrese la fecha de pago.</span>
                              </div>


                             <div class="form-group mb-2">
                             <label>Subir Comprobante:</label>
                            
                              <div class="custom-file">
                                          <input type="file" name="file" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label selected" for="customFile"></label>
                                      </div>
                          

                              <span class="form-text text-dark">De manera opcional puede adjuntar el comprobate de pago.</span>
                            </div>
             

                        </div>


                      </div>







            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                 <a id="actualizar_usuario" onclick="guardar_marcar_pagado()" class="btn btn-light-primary font-weight-bold mr-2">Guardar</a>

            </div>




  <script type="text/javascript">

            $(function () {
                $('#datetimepicker4').datetimepicker({
                    format: 'DD-MM-YYYY'
                });

                $('#ca_pago').mask('000.000.000.000.000,00', {reverse: true});
            });



   function guardar_marcar_pagado()
   {
                  var co_orden_compra = '<?php echo $info_orden_compra->id; ?>';
                  var co_diario = $('#co_diario').val();
                  var ca_pago = $('#ca_pago').val();
                  var nu_referencia = $('#nu_referencia').val();
                  var ff_pago = $('#ff_pago').val();
                  var nb_forma_pago = $('#nb_forma_pago').val();
                  var customFile = document.getElementById('customFile');


             
         if (co_diario == '') {
   
          toastr.error("Seleccione la cuenta a donde se le realizo el pago", 'Error');
           $('#co_diario').focus();
            return;
   
       };

                if (ca_pago == '') {
             toastr.error("Ingrese el pago de la orden de compra", 'Error');
           $('#ca_pago').focus();
            return;
   
       };

                       if (nu_referencia <= 0) {
             toastr.error("Ingrese el comprobante de pago, referencia o identificacion de la transaccion", 'Error');
           $('#nu_referencia').focus();
            return;
   
       };

               if (ff_pago == '') {
             toastr.error("Seleccione la fecha de pago", 'Error');
           $('#ff_pago').focus();
            return;
   
       };

   
   
            var file = customFile.files[0];

            var data = new FormData();

            data.append('mi_archivo', file);
            data.append('co_orden_compra', co_orden_compra);
            data.append('co_diario', co_diario);
            data.append('ca_pago', ca_pago);
            data.append('nu_referencia', nu_referencia);
            data.append('ff_pago', ff_pago);
            data.append('nb_forma_pago', nb_forma_pago);



            var url = "<?php echo site_url('compra/ejecutar_guardar_marcar_pagado') ?>";

            KTApp.blockPage({
              overlayColor: 'black',
              opacity: 0.2,
              state: 'primary' // a bootstrap color
             });


                $.ajax({
                url:url,
                type:'POST',
                contentType:false,
                data:data,
                processData:false,
                cache:false}).done(function( data ) { 
                    KTApp.unblockPage();
                   var obj = JSON.parse(data);



                       if (obj.error == 0) {

                    location.reload();
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 


   
   
   }
   

  </script>