                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">
                                                        <a href="javascript:window.history.back();"class="btn btn-clean btn-xs p-2 mr-2 d-block d-md-none">
                                    <i class="fas fa-arrow-left"></i> 
                                    </a>

                                    <!--begin::Actions-->
                                    <h5 id="controlador" class="text-dark font-weight-bold mt-2 mb-2 mr-5">Solicitud de cotizacion</h5>
                                    
                                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="" class="text-muted">Ver solicitud</a>
                                            </li>
                                        </ul>

                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-left">

                                        <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','FARMACIA','CLINICA'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador','Compras'")): ?> 
                                    
                                <?php if($info_solicitud_cotizacion_orden_compra->nb_estatus == 'En espera por aprobacion'): ?>
                                 <a onclick="cancelar_solicitud()" class="btn btn-light-danger font-weight-bolder btn-sm mr-2"><b>Cancelar solicitud</b></a>
                                 <?php endif; ?>
                                <a href="javascript:window.history.back();" class="btn btn-clean font-weight-bolder btn-sm mr-2">Descartar</a>
                                
                                       
                                    <?php endif; ?>
                                <?php endif; ?>
                                       
                                    
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


                                    <div class="row">
                                        

                                       <div class="col-lg-4 p-0 p-lg-2">



                                                                                    <div class="card card-custom card-stretch">
                                            <!--begin::Body-->
                                            <div class="card-body pt-4">
                                                <!--begin::Toolbar-->
                                                <div class="d-flex justify-content-end mt-4">
          
                                                </div>
                                                <!--end::Toolbar-->
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                                        <div class="symbol-label font-size-h1" style="background-image:url('<?php echo base_url(); ?>assets/media/misc/bg-2.jpg'); color:white"><?php echo substr($info_solicitud_cotizacion->username, 0, 1); ?></div>
                                                        <i class="symbol-badge bg-success"></i>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary"><?php echo $info_solicitud_cotizacion->username; ?></a>
                                                        <div class="text-dark"><?php echo $info_solicitud_cotizacion->nb_tipo_empresa; ?></div>
                                                        <div class="mt-2">
                                                            <a href="javascript:" class="font-weight-bolder font-size-h5 text-dark">N° <?php echo $info_solicitud_cotizacion->nu_codigo_cotizacion; ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Contact-->
                                                <div class="py-9">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Tipo empresa:</span>
                                                        <a href="javascript:" class="text-muted text-hover-primary"><?php echo $info_solicitud_cotizacion->nb_tipo_empresa; ?></a>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span class="font-weight-bold mr-2">Ubicacion:</span>
                                                        <span class="text-muted"><?php echo $info_solicitud_cotizacion->nb_estado; ?></span>
                                                    </div>

                                                 <div class="d-flex align-items-center justify-content-between pt-4">

                                                                     <?php if ($lista_productos->num_rows() > 0) : ?>
                                             
                                                           <table class="table table-sm" id="tabla_1" width="100%">
                                                              <thead class="thead-light">
                                                                 <tr>
                                                                       <th width="60%" class="all text-left align-middle">Producto</th>
                                                                    <th width="20%" class="all text-right align-middle">Cantidad</th>
                                                                 </tr>
                                                              </thead>
                                                              <tbody>
                                                                 <?php foreach ($lista_productos->result() as $row) : ?>
                                                                 <tr>

                                                                 <td class="text-left align-middle"> <?php echo $row->nb_producto; ?></td>
                                                                 <td class="text-right align-middle"> <?php echo $row->ca_unidades; ?></td>

                                                                 </tr>
                                                                 <?php endforeach; ?>   
                                                              </tbody>
                                                           </table>
                                                           <?php else: ?>
                                                           <h4>Sin registro</h4>

                                                           <?php endif; ?>
                                                                         
                                                    </div>
                                                </div>
                                                <!--end::Contact-->
                                                <!--begin::Nav-->
                    
                                                <!--end::Nav-->
                                            </div>
                                            <!--end::Body-->
                                        </div>



         

                                            

                                        </div>


                                        <div class="col-lg-8 mt-4 mt-lg-0">


                                                                                    <div class="card card-custom gutter-b">
                                            <div class="card-body p-6">
                                                <!-- begin: Invoice-->
                                                <!-- begin: Invoice header-->
                                                <div class="row justify-content-center py-2 px-2 py-md-10 px-md-0">
                                                    <div class="col-md-10">
                                                        <div class="d-flex justify-content-between pb-10 pb-md-2 flex-column flex-md-row">
                                                            <h1 class="display-4 font-weight-boldest mb-2">Orden de compra</h1>
                                                            <div class="d-flex flex-column align-items-md-end px-0">
                                                                <!--begin::Logo-->
                                                                <!--end::Logo-->
                                                                <span class="d-flex flex-column align-items-md-end">
                                                                    <span class="text-primary"><?php echo $info_solicitud_cotizacion_orden_compra->nb_estatus; ?></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="border-bottom w-100"></div>
                                                        <div class="d-flex justify-content-between pt-6">
                                                            <div class="d-flex flex-column flex-root">
                                                                <span class="font-weight-bolder mb-2">Fecha</span>
                                                                <span class="opacity-70"><?php echo date('d-m-Y',$info_solicitud_cotizacion_orden_compra->ff_fecha_elaboracion); ?></span>
                                                            </div>
                                                            <div class="d-flex flex-column flex-root">
                                                                <span class="font-weight-bolder mb-2">Orden Nro</span>
                                                                <span class="opacity-70"><?php echo $info_solicitud_cotizacion_orden_compra->nu_codigo_orden_compra; ?></span>
                                                            </div>
                                                            <div class="d-flex flex-column flex-root">
                                                                <span class="font-weight-bolder mb-2">Orden propuesta a:</span>
                                                                <span class="opacity-70"><?php echo $info_solicitud_cotizacion->nb_tipo_empresa; ?><br> <?php echo $info_solicitud_cotizacion->username; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end: Invoice header-->
                                                <!-- begin: Invoice body-->
                                                <div class="row justify-content-center py-2 px-2 py-md-2 px-md-0">
                                                    <div class="col-md-10">
                                                        <div class="table-responsive">
                                                            <table class="table table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="pl-0 font-weight-bold text-muted text-uppercase">Producto</th>
                                                                        <th class="text-right font-weight-bold text-muted text-uppercase">Cantidad</th>
                                                                        <th class="text-right font-weight-bold text-muted text-uppercase">Precio</th>
                                                                        <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Subtotal</th>
                                                                    </tr>
                                                                </thead>
                                                                <?php $total_orden = 0; $info_detalle_orden_compra =  $this->orden_compra_library->get_detalle_orden_compra($info_solicitud_cotizacion_orden_compra->id); ?>
                                                                <tbody>
                                                                    <?php foreach ($info_detalle_orden_compra->result() as $row): ?>
                                                                    <tr class="font-weight-boldest">
                                                                        <td class="border-0 pl-0 pt-2 d-flex align-items-center">
                                                                        <?php echo $row->nb_producto; ?></td>
                                                                        <td class="text-right pt-2 align-middle"> <?php echo $row->ca_unidades; ?></td>
                                                                        <td class="text-right pt-2 align-middle"> <?php echo $row->ca_precio; ?>  <?php $ca_subtotal = $row->ca_unidades * $row->ca_precio; ?></td>
                                                                        <td class="text-primary pr-0 pt-2 text-right align-middle"><?php echo $ca_subtotal; $total_orden += $ca_subtotal; ?> </td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end: Invoice body-->
                                                <!-- begin: Invoice footer-->
                                                <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0 mx-0">
                                                    <div class="col-md-10">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="font-weight-bold text-dark text-uppercase">Modo pago</th>
                                                                        <th class="font-weight-bold text-dark text-uppercase">Modo de entrega</th>
                                                                        <th class="font-weight-bold text-dark text-uppercase text-right">TOTAL</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="font-weight-bolder">
                                                                        <td><?php echo $info_solicitud_cotizacion_orden_compra->nb_tipo_pago; ?></td>
                                                                        <td><?php echo $info_solicitud_cotizacion_orden_compra->nb_forma_entrega; ?></td>
                                                                        <td class="text-primary font-size-h3 font-weight-boldest text-right"><?php echo number_format($total_orden,2,',','.'); ?> $</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end: Invoice footer-->
                                                <!-- begin: Invoice action-->

                                                <!-- end: Invoice action-->
                                                <!-- end: Invoice-->
                                            </div>
                                        </div>

     
                                            
                                        </div>


                                    </div>









                                </div>



                                <div class="col-lg-1"></div>

                            </div>

                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>




    <div class="modal fade"  id="ajax_remote" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">
            <h3 align="center" class="text-dark">Cargando...</h3>
        </div>
    </div>
</div>


<script type="text/javascript">

    var co_orden_compra = '<?php echo $info_solicitud_cotizacion_orden_compra->id; ?>'

       $(document).ready(function(){

      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('<h3 align="center" class="text-dark">Cargando...</h3>');

   })

   

   }); // Fin ready
   
   
   function cancelar_solicitud()
   {


            var data = new FormData();

            data.append('co_orden_compra', co_orden_compra);

            var url = "<?php echo site_url('solicitud_cotizacion/cancelar_solicitud_cotizacion_orden_compra') ?>";

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


