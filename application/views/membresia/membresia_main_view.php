
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Membresias</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                                    <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-0"><?php $info_membresia = $this->membresia_library->get_membresia(); echo $info_membresia->nb_membresia; ?> </a>

                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

  
        
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
                <?php $con = 0; if (isset($membresia_pagos)) : ?>
             <?php if ($membresia_pagos->num_rows() > 0) : ?>

                                    <div class="card card-custom gutter-b mb-6">
                                     <div class="card-header">
                                      <div class="card-title">
                                       <h3 class="card-label">
                                        Pagos de Membresia
                                        <small>listado de pagos de membresias</small>
                                       </h3>
                                      </div>
                                     </div>
                                     <div class="card-body">
                                     

   
            <table class="table table-sm">
               <thead class="thead-dark">
                  <tr>

                     <th>Membresia</th>
                     <th class="text-center align-middle"><span class="d-none d-xl-block">Mes</span></th>
                     <th class="text-center align-middle"> <span class="d-none d-xl-block">Descripcion</span></th>
                     <th class="text-center align-middle"><span class="d-none d-xl-block">Pago</span></th>
                     <th>Estatus</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($membresia_pagos->result() as $row) : ?>
                  <tr>
                     <td>   <?php echo $row->nb_membresia; ?> 
                     <span class="d-none"><br> <?php echo number_format($row->ca_precio,2,',','.'); ?>  </span><br> <span class="d-none"> <?php echo $row->tx_descripcion; ?> </span></td>
                     <td class="text-center align-middle"> <span class="d-none d-xl-block"> <?php echo $row->ca_mes; ?> </span></td>
                     <td class="text-center align-middle"> <span class="d-none d-xl-block"> <?php echo $row->tx_descripcion; ?> </span></td>
                     <td class="text-center align-middle">  <span class="d-none d-xl-block">$ <?php echo number_format($row->ca_pago,2,',','.'); ?> | Bs <?php echo number_format($row->ca_pago_bolivar,2,',','.'); ?></span> </td>

                      <td> 

                        <?php if($row->nb_estatus == 'Verificado'): ?> <span class="label label-lg label-light-success label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
                      <?php if($row->nb_estatus == 'En proceso'): ?> <span class="label label-lg label-light-info label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
                       <?php if($row->nb_estatus == 'Cancelado'): ?> <span class="label label-lg label-light-danger label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
                       <?php if($row->nb_estatus == 'Rechazado'): ?> <span class="label label-lg label-light-danger label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
                        </td>
                     <td>

                        <?php if($row->nb_estatus == 'En proceso'): ?>
                        <div class="card-toolbar">
                                                    <div class="dropdown dropdown-inline">
                                                        <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-5">

                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="eliminar_pago(<?php echo $row->id; ?>)" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Eliminar</span>
                                                                    </a>
                                                                </li>
    

                                                            </ul>
                                                            <!--end::Navigation-->
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endif; ?>




                     </td>
                  </tr>
                  <?php endforeach; ?>   
               </tbody>
            </table>
      


                                     </div>
                                    </div>


            <?php endif; ?>
             <?php endif; ?>

               

                                    <div class="card">
                                    <!-- begin: Custom background-->
                                    <div class="d-block d-lg-none rounded-card-top bg-primary position-absolute w-100 h-25"></div>
                                    <!-- end: Custom background-->
                                    <!--begin::Card- body-->
                                    <div class="card-body position-relative p-0 rounded-card-top">
                                        <!--begin::Pricing title-->
                                        <h3 class="bg-primary text-white text-center py-10 py-lg-20 m-0 rounded-card-top">Planes mensuales para las membresias</h3>
                                        <!--end::Pricing title-->
                                        <div class="row justify-content-center m-0 position-relative">
                                            <!-- begin: Custom background-->
                                            <div class="d-none d-lg-block bg-primary position-absolute w-100 h-100"></div>
                                            <!-- end: Custom background-->
                                            <div class="col-11">
                                                <div class="row">

                                                    <?php foreach ($membresia_precios->result() as $row): ?>
                                                        
                                                         <div class="col-12 col-lg-4 bg-white border-x-0 border-x-lg border-y border-y-lg-0 p-0">
                                                        <div class="py-15 px-0 px-lg-5 text-center">
                                                            <div class="d-flex flex-center mb-7">
                                                                <span class="svg-icon svg-icon-5x svg-icon-primary">
                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                                            <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"></path>
                                                                            <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </div>
                                                            <h4 class="font-size-h3 mb-10 text-dark"><?php echo $row->nb_membresia; ?></h4>
                                                            <div class="d-flex flex-column pb-7 text-dark-50">
                                                                <span><?php echo $row->tx_descripcion; ?></span>
                                                                <span></span>
                                                            </div>
                                                            <span class="font-size-h1 font-weight-boldest text-dark"><?php echo $row->ca_precio; ?>
                                                            <sup class="font-size-h3 font-weight-normal pl-1">$</sup></span>
                                                            <!--begin::Mobile Pricing Table-->
                                                            <div class="">
                                                                <div class="bg-gray-100 py-3">
                                                                    <span class="font-weight-boldest">Alcance</span>
                                                                    <span><?php echo $row->nb_alcance_ubicacion_compra; ?></span>
                                                                </div>
                                                                <div class="py-3">
                                                                    <span class="font-weight-boldest">Indice de precio industrial</span>
                                                                    <span><?php if($row->in_indice_precio == 1): echo 'Si'; else: echo 'No'; endif; ?></span>
                                                                </div>
                                                                <div class="bg-gray-100 py-3">
                                                                    <span class="font-weight-boldest">Usuarios por empresa</span>
                                                                    <span><?php echo $row->ca_usuarios; ?></span>
                                                                </div>
                                                                <div class="py-3">
                                                                    <span class="font-weight-boldest">Reportes Estadisticas</span>
                                                                    <span><?php if($row->in_reporte_sicm == 1): echo 'Si'; else: echo 'No'; endif; ?></span>
                                                                </div>
                                                                <?php if($this->ion_auth->tipo_empresa() == 'FARMACIA' or $this->ion_auth->tipo_empresa() == 'CLINICA' or $this->ion_auth->tipo_empresa() == 'DROGUERIA'): ?>
                                                                <div class="bg-gray-100 py-3">
                                                                    <span class="font-weight-boldest">Monto máximo de compra mensual</span>
                                                                    <span><?php echo $row->ca_monto_maximo_compra_mensual; ?></span>
                                                                </div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <!--end::Mobile Pricing Table-->
                                                            <?php if($row->nb_membresia != 'GRATIS'): ?>
                                                            <div class="mt-7">
                                                                <a href='<?php echo site_url("membresia/pago/$row->id/$row->ca_precio")?>' class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">Comprar</a>
                                                            </div>
                                                        <?php endif; ?>
                                                        </div>
                                                    </div>
        
                                                <?php endforeach; ?>
                                                    <!-- end: Pricing-->
                                                    <!-- begin: Pricing-->

                                                    <!-- end: Pricing-->
                                                </div>
                                            </div>
                                        </div>

                                        <!--end::Pricings-->
                                    </div>
                                    <!--end::Card body-->
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

        </div>
    </div>
</div>


<script type="text/javascript">


   $(document).ready(function(){

   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('<div class="loader_panel_inside"> <div class="ball"></div><h6 align="center"><B>CARGANDO... ESPERE POR FAVOR</b></h6></div><br> <h3 align="center"><b>SIRE.</b></h3>');
   })
   

   }); // Fin ready
   
   



   
   
   function eliminar_pago(co_pago)
   {


   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar pago',
   content: '¿Estas seguro que deseas eliminar este pago ?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_pago':co_pago},
   url: "<?php echo site_url('membresia/eliminar_pago') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);

                toastr.info("Exito", obj.message);
   
           location.reload();
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   
   
   
   }


   
</script>
