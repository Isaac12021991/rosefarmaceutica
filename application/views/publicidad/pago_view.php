
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Publicidad</h5>
                                    
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
                                            Pagar
                                            <small>Realizar el pago de la publicidad</small>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                            <form class="form">
                                             <div class="card-body">

                                             <div class="row mb-8">

                                                 <div class="col-lg-12">
                
                                                         <div class="col-xxl-7 pl-xxl-11">
                                                                <h2 class="font-weight-bolder text-dark mb-4" style="font-size: 24px;"> <b><?php echo $info_publicidad->tx_link_dirigir; ?></h2>
                                                                <div class="font-size-h2 mb-4 text-dark-50">
                                                                <span class="text-info font-weight-boldest ml-2" id="precio_dolar_div">$ <?php echo $ca_presupuesto; ?></span> <span class="text-dark font-size-h6"  id="precio_bolivar_div"> Bs<?php echo number_format($this->biomercado_library->get_info_dolar_bcv($ca_presupuesto),2,',','.'); ?></span></div>
                                                                <div class="line-height-xl"><b>Duración:</b> <?php echo $info_publicidad->ca_dias; ?></div>
                                                                <div class="line-height-xl"><b>Descripcion:</b> <?php echo $info_publicidad->tx_descripcion; ?></div>
                                                            </div>
                                                 </div>




                                             </div>

                                                <div class="row">

                                                 <div class="col-lg-6">



                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Descripcion, referencia:</label>
                                               <div class="col-9">
                                                 <textarea class="form-control" id="tx_descripcion" name="tx_descripcion"></textarea>
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

                                           </div>
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

     var ca_pago_bolivar = '<?php echo $this->biomercado_library->get_info_dolar_bcv($ca_presupuesto); ?>';
     var ca_pago = '<?php echo $ca_presupuesto; ?>';
     

      $(document).ready(function(){


$('.date_picker_top').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    enableOnReadonly: true,
    orientation: "top",
    });

                 }); // Fin ready


   function crear_pago()
   {
                  var tx_descripcion = $('#tx_descripcion').val();
                  var ff_pago = $('#ff_pago').val(); 
                  var nb_url_foto = document.getElementById('nb_url_foto');


             
        if (ff_pago == '') {
             toastr.error("Ingrese la fecha del pago", 'Error');
           $('#ff_pago').focus();
            return;
   
       };

            var file = nb_url_foto.files[0];

            var data = new FormData();

            data.append('mi_archivo', file);
            data.append('tx_descripcion', tx_descripcion);
            data.append('ff_pago', ff_pago);
            data.append('ca_pago', ca_pago);
            data.append('ca_pago_bolivar', ca_pago_bolivar);
            data.append('co_publicidad', '<?php echo $co_publicidad; ?>');

            var url = "<?php echo site_url('publicidad/agregar_pago') ?>";

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

                     $(location).attr('href',"<?php echo site_url() ?>publicidad/index");
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 


   
   
   }
   

   
                                      
</script>


