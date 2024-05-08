
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Membresias</h5>
                                    
                                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="" class="text-muted">Pagos</a>
                                            </li>
                                        </ul>


        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                                
                                    
                                <a onclick="crear_pago()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Enviar</a>
                                <a href="javascript:window.history.back();" class="btn btn-clean font-weight-bolder btn-sm mr-2">Descartar</a>
                                

                                    
                                    <!--end::Actions-->
                                    <!--begin::Dropdown-->
                                            <!--end::Dropdown-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                        </div>
                        <!--end::Subheader-->
                        <!--begin::Entry-->
                        <div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class="container">
                                <div class="row">

                                <div class="col-lg-1">
                                    
                                    
                                </div>

                                <div class="col-lg-10">



                                    <div class="card card-custom gutter-b">
                                         <div class="card-header">
                                          <div class="card-title">
                                           <h3 class="card-label">
                                            <?php echo $info_membresia->nb_membresia; ?>
                                            <small>Informacion de la membresia</small>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                            <form class="form">
                                             <div class="card-body">

                                             <div class="row mb-8">

                                                 <div class="col-lg-12">
                
                                                         <div class="col-xxl-7 pl-xxl-11">
                                                                <h2 class="font-weight-bolder text-dark mb-4" style="font-size: 24px;">Membresia: <b><?php echo $info_membresia->nb_membresia; ?></h2>
                                                                <div class="font-size-h2 mb-4 text-dark-50">
                                                                <span class="text-info font-weight-boldest ml-2" id="precio_dolar_div">$ <?php echo $ca_precio; ?></span> <span class="text-dark font-size-h6"  id="precio_bolivar_div"> Bs<?php echo number_format($this->biomercado_library->get_info_dolar_bcv($ca_precio),2,',','.'); ?></span></div>
                                                                <div class="line-height-xl"><?php echo $info_membresia->tx_descripcion; ?></div>
                                                            </div>
                                                 </div>




                                             </div>

                                                <div class="row">

                                                 <div class="col-lg-6">

                                                           <div class="form-group row mb-2">
                                                       <label  class="col-3 col-form-label">Meses:</label>
                                                       <div class="col-9">
                                                          <select class="form-control" id="ca_mes" name="ca_mes" onchange="cambiar_mes()">
                                                          <option value="1">1 Mes</option>
                                                         
                                                        </select> 
                                                       </div>
                                                      </div>


                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Descripcion, referencia:</label>
                                               <div class="col-9">
                                                 <textarea class="form-control" id="tx_descripcion" name="tx_descripcion" placeholder="Referencias, identificacion del pago"></textarea>
                                               </div>
                                              </div>

                                          </div>

                                           <div class="col-lg-6">


                                         <div class="form-group row mb-2">
                                           <label  class="col-3 col-form-label">Adjunto:</label>
                                           <div class="col-9">
                                                 <input id="nb_url_foto" class="form-control" type="file" name="nb_url_foto">  
                                           </div>
                                          </div>

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Fecha de pago:</label>
                                               <div class="col-9">
                                                  <input type="text" name="ff_pago" id="ff_pago" class="form-control date_picker_top" autocomplete="off" placeholder="Pago" value="">
                                               </div>
                                              </div>

                                                                                           <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Forma de pago:</label>
                                               <div class="col-9">
                                            <select class="form-control" id="nb_forma_pago" name="nb_forma_pago">
                                                    <option value="">Elija la forma de pago</option>
                                                <?php foreach($list_forma_pago->result() as $row){
                                                     echo "<option value='".$row->nb_forma_pago."'>".$row->nb_forma_pago."</option>";
                                                } ?>
                                                </select>  
                                               </div>
                                              </div>


                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Destino:</label>
                                               <div class="col-9">
                                            <select class="form-control" id="co_diario" name="co_diario">
                                                    <option value="">Elija la cuenta</option>
                                                <?php foreach($list_cuenta_banco->result() as $row){
                                                     echo "<option value='".$row->id."'>".$row->nb_diario."</option>";
                                                } ?>
                                                </select>  
                                               </div>
                                              </div>

                                           </div>
                                           </div>

                                           <div class="row">

                                             <?php foreach($list_cuenta_banco->result() as $row): ?>
                                            <div class="col-4">
                                                <h3 class="font-size-h2 text-info"><?php echo $row->nb_diario; ?></h3>

                                            <ul class="list-unstyled">
                                            <?php if($row->nu_cuenta != ''): ?><li>N° Cuenta: <?php echo $row->nu_cuenta; ?></li> <?php endif; ?>
                                            <?php if($row->tx_tipo_cuenta != ''): ?> <li>Tipo Cuenta: <?php echo $row->tx_tipo_cuenta; ?></li> <?php endif; ?>
                                            <li>Titular: <?php echo $row->tx_nb_titular; ?></li>
                                            <li>Identificacion: <?php echo $row->tx_id_titular; ?></li>
                                            <?php if($row->tx_email != ''): ?> <li>Email: <?php echo $row->tx_email; ?></li> <?php endif; ?>
                                              <?php if($row->tx_descripcion != ''): ?> <li> <?php echo $row->tx_descripcion; ?></li> <?php endif; ?>
                                            </ul>


                                             </div>

                                         <?php endforeach; ?>


                                           </div>


                                             </div>
                                             </form>
                                             
   
                                        </div>









                                </div>



                                <div class="col-lg-1"></div>

                            </div>

                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>



<script type="text/javascript">

     var ca_precio_bolivar = '<?php echo $this->biomercado_library->get_info_dolar_bcv($ca_precio); ?>';
     var ca_precio = '<?php echo $ca_precio; ?>';
     

      $(document).ready(function(){


$('.date_picker_top').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    enableOnReadonly: true,
    orientation: "top",
    });

                 }); // Fin ready

function cambiar_mes()

{

var ca_mes = $('#ca_mes').val();

var ca_pago = ca_mes * ca_precio;
var ca_pago_bolivar = ca_mes * ca_precio_bolivar;


$('#precio_dolar_div').html('$ '+ca_pago);
$('#precio_bolivar_div').html('Bs '+ca_pago_bolivar);


}


   function crear_pago()
   {
                  var ca_mes = $('#ca_mes').val();
                  var tx_descripcion = $('#tx_descripcion').val();
                  var ff_pago = $('#ff_pago').val(); 
                  var co_diario = $('#co_diario').val();
                  var nb_forma_pago = $('#nb_forma_pago').val(); 

                  

                  var nb_url_foto = document.getElementById('nb_url_foto');

                var ca_pago = ca_mes * ca_precio;
                var ca_pago_bolivar = ca_mes * ca_precio_bolivar;

        if (co_diario == '') {
             toastr.error("Seleccione la cuenta en donde realizo el pago", 'Error');
           $('#co_diario').focus();
            return;
   
       };


             
        if (ff_pago == '') {
             toastr.error("Ingrese la fecha del pago", 'Error');
           $('#ff_pago').focus();
            return;
   
       };

        if (nb_forma_pago == '') {
             toastr.error("Ingrese la forma de pago", 'Error');
           $('#nb_forma_pago').focus();
            return;
   
       };

            var file = nb_url_foto.files[0];

            var data = new FormData();

            data.append('mi_archivo', file);
            data.append('tx_descripcion', tx_descripcion);
            data.append('ff_pago', ff_pago);
            data.append('ca_pago', ca_pago);
            data.append('ca_pago_bolivar', ca_pago_bolivar);
            data.append('ca_mes', ca_mes);
            data.append('co_diario', co_diario);
            data.append('nb_forma_pago', nb_forma_pago);
            data.append('co_membresia', '<?php echo $co_membresia; ?>');

            var url = "<?php echo site_url('membresia/agregar_pago') ?>";

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

                     $(location).attr('href',"<?php echo site_url() ?>membresia/index");
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 


   
   
   }
   

   
                                      
</script>


