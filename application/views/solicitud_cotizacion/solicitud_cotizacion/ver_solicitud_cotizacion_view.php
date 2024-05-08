
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
                                <div class="d-flex align-items-center">

                                        <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','FARMACIA','CLINICA'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador','Compras'")): ?> 
                                    

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
                                        

                                        <div class="col-lg-4">

                                        <div class="card card-custom gutter-b">
                                         <div class="card-header">
                                          <div class="card-title">
                                           <h3 class="card-label">
                                            Solicitud  N° <span class="text-primary"><?php echo $info_solicitud_cotizacion->nu_codigo_cotizacion; ?></span>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                     
                                             <div class="card-body">
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


                                            

                                        </div>


                                        <div class="col-lg-8">

                                                                         <div class="card card-custom gutter-b">
                                         <div class="card-header">
                                          <div class="card-title">
                                           <h3 class="card-label">
                                            Lista de propuestas de orden de compra</span>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                     
                                             <div class="card-body">

                 <?php if ($info_solicitud_cotizacion_orden_compra_todos->num_rows() > 0) : ?>
                
                <div class="table-responsive">
               <table class="table table-sm" id="tabla_1" width="100%">
                  <thead class="thead-light">
                     <tr>
                           <th width="20%" class="all text-left align-middle">Orden Nro</th>
                           <th width="20%" class="all text-center align-middle">Informacion Vendedor</th>
                        <th width="20%" class="all text-right align-middle">Modo de pago</th>
                        <th width="20%" class="all text-right align-middle">Forma de entrega</th>
                        <th width="20%" class="all text-center align-middle">Estatus</th>
                         <th width="20%" class="all text-right align-middle">Monto $</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($info_solicitud_cotizacion_orden_compra_todos->result() as $row) : ?>
                     <tr role="button" onclick="ver_detalle_orden('<?php echo $row->id; ?>')">

                     <td class="text-left align-middle"> <?php echo $row->nu_codigo_orden_compra; ?></td>
                     <td class="text-center align-middle"><span class="text-primary"> <?php echo $row->nb_estado; ?> </span> <br> <?php echo $row->nb_tipo_empresa; ?> <br> <?php echo $row->username; ?></td>
                     <td class="text-right align-middle"> <?php echo $row->nb_tipo_pago; ?></td>
                      <td class="text-right align-middle"> <?php echo $row->nb_forma_entrega; ?></td>
                      <td class="text-center align-middle"> <?php echo $row->nb_estatus; ?></td>
                       <td class="text-right align-middle"> <?php echo number_format($row->ca_monto_orden_compra,2,',','.'); ?> $</td>


                     </tr>
                     <?php endforeach; ?>   
                  </tbody>
               </table>
               </div>
               <?php else: ?>
               <h4>Sin registro</h4>

               <?php endif; ?>

                                                    

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

        function ver_detalle_orden(co_orden_compra) {

     $(location).attr('href',"<?php echo site_url() ?>compra/detalle_orden_compra/"+co_orden_compra); 

}



                  $('#nb_estatus').val('<?php echo $info_solicitud_cotizacion->nb_estatus; ?>');
                  $('#ff_vencimiento').val('<?php echo date('d-m-Y', $info_solicitud_cotizacion->ff_vencimiento); ?>'); 



                    var co_solicitud_cotizacion = '<?php echo $co_solicitud_cotizacion; ?>'


                                function agregar_producto() {

                                $('#ajax_remote').modal('show');
                                 
                            $.get("<?php echo site_url('solicitud_cotizacion/agregar_producto_solicitud_cotizacion/') ?>" + co_solicitud_cotizacion,
                            function(data){
                            if (data != "") {
                               
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }


       $(document).ready(function(){

        
    $('.js-example-basic-single').select2();


 $("#reload_lista_productos").load('<?php echo site_url('solicitud_cotizacion/lista_productos/') ?>'+co_solicitud_cotizacion);
   
   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('<h3 align="center" class="text-dark">Cargando...</h3>');
   })

      $('.date_picker').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    enableOnReadonly: true,
    orientation: "bottom",
    startDate: '1d'
    });

   

   }); // Fin ready
   
   

                                      
</script>


