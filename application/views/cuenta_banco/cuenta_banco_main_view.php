
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
                                    <h5 id="controlador" class="text-dark font-weight-bold mt-2 mb-2 mr-5">Perfil</h5>
                                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="javascript:" class="text-muted">Cuentas bancarias</a>
                                            </li>
                                        </ul>


        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                                 <a href="<?php echo site_url("cuenta_banco/crear_cuenta_banco");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Crear</a>
        
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

                                      <div class="col-lg-4 p-0 p-lg-0">

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
                                                      <img src="<?php echo $info_usuario->nb_foto_perfil; ?>" alt="Cambiar foto de perfil" onclick="abrir_foto_perfil_modal()">
                                                        <i class="symbol-badge bg-success"></i>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary"><?php echo $info_usuario->first_name; ?> <?php echo $info_usuario->last_name; ?></a>
                                                        <div class="text-dark"><?php echo $info_usuario->username; ?></div>
                                                    </div>
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Contact-->
                                                <div class="py-9">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Ubicacion:</span>
                                                        <a href="javascript:" class="text-muted text-hover-primary"><?php echo $info_usuario->nb_estado; ?></a>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Email:</span>
                                                        <a href="javascript:" class="text-muted text-hover-primary"><?php echo $info_usuario->email; ?></a>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Celular:</span>
                                                        <span class="text-muted"><?php echo $info_usuario->phone; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">WhatsApp:</span>
                                                        <span class="text-muted"><?php echo $info_usuario->nu_whatsapp; ?></span>
                                                    </div>

                             
                                                </div>

                                         <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
    
                                                    <div class="navi-item mb-2">
                                                        <a href="<?php echo site_url("cuenta/cuenta"); ?>" class="navi-link py-4">
                                                            <span class="navi-icon mr-2">
                                                                <span class="svg-icon">
                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </span>
                                                            <span class="navi-text font-size-lg">Informacion Personal</span>
                                                        </a>
                                                    </div>
   
                                                     <?php if($this->usuario_library->permiso_empresa("'Administrador'")): ?>
                                                    <div class="navi-item mb-2">
                                                        <?php $co_partner = $this->ion_auth->co_partner(); ?>
                                                        <a href="<?php echo site_url("partner/editar_partner/$co_partner"); ?>" class="navi-link py-4">

                                                             <span class="navi-icon mr-2">
                                                            <span class="svg-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Building.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="#000000"/>
                                                                <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
                                                                <path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="#000000" opacity="0.3"/>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                        </span>
                                                            <span class="navi-text font-size-lg">Empresas</span>

                                                        </a>
                                                    </div>
                                                     <?php endif; ?>


 
                        <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','CASA DE REPRESENTACION','LABORATORIO'")): ?> 
                         <?php if($this->usuario_library->permiso_empresa("'Administrador'")): ?>

                                                    <div class="navi-item mb-2">
                                                        <a href="<?php echo site_url("cuenta_banco/index"); ?>" class="navi-link py-4 active">
                                                            <span class="navi-icon mr-2">
                                                                 <span class="svg-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Wallet2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <rect fill="#000000" opacity="0.3" x="2" y="2" width="10" height="12" rx="2"/>
                                                                    <path d="M4,6 L20,6 C21.1045695,6 22,6.8954305 22,8 L22,20 C22,21.1045695 21.1045695,22 20,22 L4,22 C2.8954305,22 2,21.1045695 2,20 L2,8 C2,6.8954305 2.8954305,6 4,6 Z M18,16 C19.1045695,16 20,15.1045695 20,14 C20,12.8954305 19.1045695,12 18,12 C16.8954305,12 16,12.8954305 16,14 C16,15.1045695 16.8954305,16 18,16 Z" fill="#000000"/>
                                                                </g>
                                                            </svg><!--end::Svg Icon--></span>
                                                            </span>
                                                            <span class="navi-text font-size-lg">Cuentas Bancarias</span>
                                                        </a>
                                                    </div>

                                                <?php endif; ?>
                                                <?php endif; ?>


                                             <div class="navi-item mb-2">
                                            <a href="<?php echo site_url("cuenta/ver_partner_cuenta"); ?>" class="navi-link py-4">
                                                 <span class="navi-icon mr-2">
                                                <span class="svg-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Navigation\Exchange.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                        <rect fill="#000000" opacity="0.3" transform="translate(13.000000, 6.000000) rotate(-450.000000) translate(-13.000000, -6.000000) " x="12" y="8.8817842e-16" width="2" height="12" rx="1"/>
                                                        <path d="M9.79289322,3.79289322 C10.1834175,3.40236893 10.8165825,3.40236893 11.2071068,3.79289322 C11.5976311,4.18341751 11.5976311,4.81658249 11.2071068,5.20710678 L8.20710678,8.20710678 C7.81658249,8.59763107 7.18341751,8.59763107 6.79289322,8.20710678 L3.79289322,5.20710678 C3.40236893,4.81658249 3.40236893,4.18341751 3.79289322,3.79289322 C4.18341751,3.40236893 4.81658249,3.40236893 5.20710678,3.79289322 L7.5,6.08578644 L9.79289322,3.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(7.500000, 6.000000) rotate(-270.000000) translate(-7.500000, -6.000000) "/>
                                                        <rect fill="#000000" opacity="0.3" transform="translate(11.000000, 18.000000) scale(1, -1) rotate(90.000000) translate(-11.000000, -18.000000) " x="10" y="12" width="2" height="12" rx="1"/>
                                                        <path d="M18.7928932,15.7928932 C19.1834175,15.4023689 19.8165825,15.4023689 20.2071068,15.7928932 C20.5976311,16.1834175 20.5976311,16.8165825 20.2071068,17.2071068 L17.2071068,20.2071068 C16.8165825,20.5976311 16.1834175,20.5976311 15.7928932,20.2071068 L12.7928932,17.2071068 C12.4023689,16.8165825 12.4023689,16.1834175 12.7928932,15.7928932 C13.1834175,15.4023689 13.8165825,15.4023689 14.2071068,15.7928932 L16.5,18.0857864 L18.7928932,15.7928932 Z" fill="#000000" fill-rule="nonzero" transform="translate(16.500000, 18.000000) scale(1, -1) rotate(270.000000) translate(-16.500000, -18.000000) "/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                                            </span>
                                                            <span class="navi-text font-size-lg">Cambiar empresa</span>
                                                        </a>
                                                    </div>

                                                </div>


                                                <!--end::Contact-->
                                                <!--begin::Nav-->
                    
                                                <!--end::Nav-->
                                            </div>
                                            <!--end::Body-->
                                        </div>



                                       </div>
                                    

                                    

   
                                <div class="col-lg-8 pt-lg-0 pl-lg-4 pr-lg-4 pt-2 pl-0 pr-0">


                                                                            <div class="card card-custom card-stretch">
                                            <!--begin::Header-->
                                            <div class="card-header py-3">
                                                <div class="card-title align-items-start flex-column">
                                                    <h3 class="card-label font-weight-bolder text-dark">Cuentas bancarias</h3>
                                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Cuentas bancarias de la empresa</span>
                                                </div>
                                                <div class="card-toolbar">

                                                
      
                                                </div>
                                            </div>
                                            <!--end::Header-->

                                                <!--begin::Body-->
                                                <div class="card-body">

                            <?php if ($list_cuenta_banco->num_rows() > 0) : ?>
                                <div class="table-responsive">
            <table class="table table-sm table-hover" id="tabla_1" width="100%">
               <thead class="table-light">
                  <tr>
                    <th width="15%">Nombre del diario</th>
                     <th width="15%">N° Cuenta</th>
                     <th width="30%">Banco</th>
                     <th width="15%">Titular</th>
                     <th width="15%">Moneda</th>
                     <th width="10%">Acciones</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($list_cuenta_banco->result() as $row) : ?>
                  <tr>
                     <td> <?php echo $row->nb_diario; ?>  </td>
                     <td><?php echo $row->nu_cuenta; ?> </td>
                     <td><?php echo $row->nb_banco; ?> </td>
                     <td><?php echo $row->tx_nb_titular; ?> <br><?php echo $row->tx_id_titular; ?> </td>
                     <td><?php echo $row->nb_moneda; ?> </td>
                     <td>


                                       <div class="card-toolbar">
                                                    <div class="dropdown dropdown-inline">
                                                        <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-0">

                                                                        <li class="navi-item">
                                                                    <a href='<?php echo site_url("cuenta_banco/editar_cuenta_banco/$row->id");?>' class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Editar</span>
                                                                    </a>
                                                                </li>



                                                            </ul>
                                                            <!--end::Navigation-->
                                                        </div>
                                                    </div>
                                                </div>





                     </td>
                  </tr>
                  <?php endforeach; ?>   
               </tbody>
            </table>
            </div>
            <?php else: ?>
            <h4>Sin Cuentas Bancarias</h4>
            <?php endif; ?>

                                                </div>
                                                <!--end::Body-->
                                            
                                            <!--end::Form-->
                                        </div>





        

                                </div>






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



   $(document).ready(function(){

   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready
   
   

</script>
