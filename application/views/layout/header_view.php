
<!DOCTYPE html>

<html lang="en">
    <!--begin::Head-->
    <head>
        <meta charset="utf-8" />
        <title>Rose</title>
        <meta name="description" content="Es una plataforma que permite a las empresas del sector farmacéutico, Anunciar, Comprar, Vender productos a nivel nacional." />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="theme-color" content="#2c7873">
        <meta name="MobileOptimized" content="width">
        <meta name="HandheldFriendly" content="true">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <link rel="manifest" href="<?php echo base_url(); ?>/manifest.json">

        <link rel="canonical" href="Rose Farmaceutica" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

        <script src="<?php echo base_url(); ?>assets/plugins/custom/jquery/jquery-3.3.1.min.js"></script>


          <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/jquery-confirm/css/jquery-confirm.min.css">
        <!--end::Fonts-->
        <!--begin::Page Vendors Styles(used by this page)-->
        <link href="<?php echo base_url(); ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
          
        <!--end::Page Vendors Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />

          <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/animsition/dist/css/animsition.min.css">
          <script src="<?php echo base_url(); ?>assets/plugins/custom/animsition/dist/js/animsition.min.js"></script>

        <!--end::Layout Themes-->
          <link rel="shortcut icon" href="<?php echo base_url(); ?>img/logo/rose_nav.ico" />


    </head>
    <!--end::Head-->
    <!--begin::Body-->
  <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed">
        <!--begin::Main-->
        <!--begin::Header Mobile-->
        <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
             <?php if($this->usuario_library->permiso_tipo_empresa("'CASA DE REPRESENTACION','LABORATORIO'")): ?> 
            <!--begin::Logo -->
    
                        <a href="<?php echo site_url("inicio/index") ?>">
                <img alt="Logo" src="<?php echo base_url(); ?>img/logo/logo_negro_rose_farmaceutica.png" class="logo-default max-h-30px" />
            </a> 

        <?php endif; ?>

              <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','FARMACIA','CLINICA', 'MEDICO'")): ?> 

             <div class="quick-search quick-search-inline ml-0 mr-4 w-300px">
                                    <!--begin::Form-->
                                    <form  action="<?= site_url('/biomercado/cartelera') ?>" class="quick-search-form" autocomplete="off" id="form_1"  method="GET" >
                                        <div class="input-group rounded bg-light">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <span class="svg-icon svg-icon-lg">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control tx_buscar" minlength="4" maxlength="50" placeholder="Buscar medicamentos, principio activo y más..."  name="tx_buscar" id="tx_buscar" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="quick-search-close ki ki-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                    <!--begin::Search Toggle-->
                                    <div id="kt_quick_search_toggle" data-toggle="dropdown" data-offset="0px,1px"></div>
                                    <!--end::Search Toggle-->
                                    <!--begin::Dropdown-->
                                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-lg dropdown-menu-anim-up">
                                        <div class="quick-search-wrapper scroll" data-scroll="true" data-height="350" data-mobile-height="200"></div>
                                    </div>
                                    <!--end::Dropdown-->
                                </div>


                            <?php endif; ?>
   
            <!--end::Logo-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Aside Mobile Toggle-->


                                                                            <span class="d-block d-md-none">
                                          
                                    <!--begin::Toggle-->
                                    <div class="topbar-item cerrar_notificacion_luz_mensaje_push_sms" data-toggle="dropdown" data-offset="10px,10px">
                                        <div class="btn btn-hover-text-primary p-0 ml-0">


                                                  <span class="svg-icon svg-icon-xl"><!--begin::Svg Icon |  <span class="svg-icon svg-icon-xl svg-icon-primary">path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Notifications1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <path d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z" fill="#000000"/>
                                            <rect fill="#000000" opacity="0.3" x="10" y="16" width="4" height="4" rx="2"/>
                                            </g>
                                            </svg><!--end::Svg Icon-->

                                        </span>


                                             <?php $info_notificacion_push_sms = $this->evento_cron_library->get_info_notificacion_push_sms(); ?>

                                            
                                            <span style="margin-top:0px; margin-left:-5px; position: absolute;"  class="<?php if ($info_notificacion_push_sms): ?> label label-dot label-danger blink  <?php endif; ?>  luz_notificacion"></span>

                                        

                                        </div>
                                    </div>

                                    <!--end::Toggle-->

                                    <!--begin::Dropdown-->
                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-xl dropdown-menu-anim-up notificacion_drop">
                                        
                            
<!--begin::Header-->                        
                                            <div class="d-flex align-items-center py-10 px-8 bgi-size-cover bgi-no-repeat rounded-top" 
                                            style="background-image: url(<?php echo base_url(); ?>assets/media/misc/bg-1.jpg)">
                                                <h4 class="text-white m-0 flex-grow-1 mr-3">Notificaciones</h4>
                                              
                                            </div>

                                            <!--begin::Scroll-->
                                                <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                        <div class="navi navi-hover scroll my-4" data-scroll="true" data-height="300" data-mobile-height="200">
                                            <span class="box_notificacion_1"></span>

                                           

                                            <?php if($info_notificacion_push_sms): ?>

                                                <?php foreach ($info_notificacion_push_sms->result() as $row): ?>
                                                   
                                                    <a href="<?php echo $row->tx_link; ?>"  class="navi-item box_notificacion_1 notificacion_<?php echo $row->id; ?>"><div class="navi-link"><div class="navi-icon mr-2"><i class="flaticon2-information text-success"></i> </div><div class="navi-text"><div class="font-weight-bold"><?php echo $row->tx_mensaje ?></div><div class="text-muted"><?php echo $row->ff_hora_minuto_segundo; ?></div></div><button onclick="cerrar_notificacion('<?php echo $row->id; ?>')" class="btn btn-primary p-2"><i class="flaticon-close"></i></button></div></a>

                                               <?php endforeach; ?>

                                            <?php endif; ?>




                                                <!--end::Separator-->

                                                <!--end::Item-->
                                            </div>
                                            </div>

                                            <!--end::Scroll-->

                                            <!--begin::Summary-->


                                            <!--end::Summary-->

                           
                                    
                                    </div>

                                    <!--end::Dropdown-->
                               
                                </span>

              
        

                <!--end::Aside Mobile Toggle-->
                <!--begin::Header Menu Mobile Toggle-->

                                        <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','FARMACIA','CLINICA'")): ?> 
                         <?php if($this->usuario_library->permiso_empresa("'Administrador','Compras'")): ?>

                                                 <div class="btn btn-hover-text-primary p-0 ml-0" id="kt_quick_cart_toggle">
                                        <span class="svg-icon svg-icon-xl">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>

                                <?php endif; ?>
                                <?php endif; ?>
                                




                                <button class="btn p-0 burger-icon ml-2" id="kt_header_mobile_toggle">
                    <span></span>
                </button>

                <!--end::Topbar Mobile Toggle-->
            </div>



            <!--end::Toolbar-->
        </div>




        <!--end::Header Mobile-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="d-flex flex-row flex-column-fluid page">
                <!--begin::Aside-->

                <!--end::Aside-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">


                    <!--begin::Header-->
                    <div id="kt_header" class="header header-fixed">
                        <!--begin::Container-->
                        <div class="container-fluid d-flex align-items-stretch justify-content-between">
                            <!--begin::Header Menu Wrapper-->
                            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">

                                                                <div class="header-logo">
                                    <a href="<?= site_url('/inicio/index') ?>">
                                        <img alt="Logo" src="<?php echo base_url(); ?>img/logo/logo_blanco_rose_farmaceutica.png" width="120px" height="100%" />
                                    </a>
                                </div>

                                                <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','FARMACIA','CLINICA', 'MEDICO'")): ?> 

                                <div class="quick-search quick-search-inline ml-2 mr-2 mt-3 w-300px d-none d-lg-block">
                                    <!--begin::Form-->
                                    <form class="quick-search-form" action="<?= site_url('/biomercado/cartelera') ?>" id="form_1" autocomplete="off" method="GET" >
                                        

                                        <div class="input-group rounded bg-light">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <span class="svg-icon svg-icon-lg">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control h-45px tx_buscar"  minlength="4" maxlength="50" placeholder="Buscar productos..."  name="tx_buscar" id="tx_buscar" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="quick-search-close ki ki-close icon-sm text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                    <!--begin::Search Toggle-->
                                    <div id="kt_quick_search_toggle" data-toggle="dropdown" data-offset="0px,1px"></div>
                                    <!--end::Search Toggle-->
                                    <!--begin::Dropdown-->
                                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-lg dropdown-menu-anim-up">
                                        <div class="quick-search-wrapper scroll" data-scroll="true" data-height="350" data-mobile-height="200"></div>
                                    </div>
                                    <!--end::Dropdown-->
                                </div>

                            <?php endif; ?>

                                <!--begin::Header Menu-->
                                <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                                    <!--begin::Header Nav-->
                                    <ul class="menu-nav">



                                                
                                <?php $info_membresia = $this->membresia_library->get_membresia(); 

                                if($this->ion_auth->in_empresa_activado() == 1):
                                 if ($info_membresia->in_indice_precio == 1): ?>

                                        <li class="menu-item p-0">
                                            <a href="<?php echo site_url('mercado/index')?>" class="menu-link">
                                                <span class="menu-text">Indice de Precio</span>
                                               
                                            </a>
                                        </li>

                                    <?php endif; endif; ?>







                                            <li class="menu-item menu-item-submenu menu-item-rel p-0" data-menu-toggle="click" aria-haspopup="true">
                                            <a href="javascript:;" class="menu-link menu-toggle">
                                                <span class="menu-text">Cotizaciones</span>
                                                <i class="menu-arrow"></i>
                                                
                                            </a>
                                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                                <ul class="menu-subnav">


                                 <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','LABORATORIO','CASA DE REPRESENTACION'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador','Ventas'")): ?> 


                                                     <li class="menu-item" aria-haspopup="true">
                                                        <a href="<?php echo site_url('solicitud_cotizacion/cartelera_solicitud_cotizacion')?>" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Safe-chat.svg-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path d="M8,17 C8.55228475,17 9,17.4477153 9,18 L9,21 C9,21.5522847 8.55228475,22 8,22 L3,22 C2.44771525,22 2,21.5522847 2,21 L2,18 C2,17.4477153 2.44771525,17 3,17 L3,16.5 C3,15.1192881 4.11928813,14 5.5,14 C6.88071187,14 8,15.1192881 8,16.5 L8,17 Z M5.5,15 C4.67157288,15 4,15.6715729 4,16.5 L4,17 L7,17 L7,16.5 C7,15.6715729 6.32842712,15 5.5,15 Z" fill="#000000" opacity="0.3" />
                                                                        <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">Ver solicitudes de cotizacion</span>
                                                        </a>
                                                    </li>


                                                            <?php endif; ?>
                                                            <?php endif; ?>


                        <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','FARMACIA','CLINICA'")): ?> 
                         <?php if($this->usuario_library->permiso_empresa("'Administrador','Compras'")): ?>



                                                     <li class="menu-item" aria-haspopup="true">
                                                        <a href="<?php echo site_url('solicitud_cotizacion/index')?>" class="menu-link">
                                                            <span class="svg-icon menu-icon">
                                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Safe-chat.svg-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path d="M8,17 C8.55228475,17 9,17.4477153 9,18 L9,21 C9,21.5522847 8.55228475,22 8,22 L3,22 C2.44771525,22 2,21.5522847 2,21 L2,18 C2,17.4477153 2.44771525,17 3,17 L3,16.5 C3,15.1192881 4.11928813,14 5.5,14 C6.88071187,14 8,15.1192881 8,16.5 L8,17 Z M5.5,15 C4.67157288,15 4,15.6715729 4,16.5 L4,17 L7,17 L7,16.5 C7,15.6715729 6.32842712,15 5.5,15 Z" fill="#000000" opacity="0.3" />
                                                                        <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                            <span class="menu-text">Crear nueva solicitud</span>
                                                        </a>
                                                    </li>

                                                            <?php endif; ?>
                                                            <?php endif; ?>


                                                </ul>
                                            </div>
                                        </li>


                                    <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','LABORATORIO','CASA DE REPRESENTACION'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador','Ventas'")): ?> 

                                                          <li class="menu-item p-0">
                                            <a href="<?php echo site_url('venta/orden_compra/nuevo')?>" class="menu-link">
                                                <span class="menu-text">Ventas</span>
                                               
                                            </a>
                                        </li>

                                    <?php endif; ?>
                              <?php endif; ?>

                            <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','FARMACIA','CLINICA'")): ?> 
                         <?php if($this->usuario_library->permiso_empresa("'Administrador','Compras'")): ?>

                                                          <li class="menu-item p-0">
                                            <a href="<?php echo site_url('compra/orden_compra')?>" class="menu-link">
                                                <span class="menu-text">Compras</span>
                                               
                                            </a>
                                        </li>

                                    <?php endif; ?>
                              <?php endif; ?>



                                                       <?php if($this->usuario_library->permiso_tipo_empresa("'FARMACIA','CLINICA','MEDICO'")): ?> 
                <?php if($this->usuario_library->permiso_empresa("'Administrador','Bioenlace'")): ?>

                                     <li class="menu-item menu-item-submenu menu-item-rel p-0" data-menu-toggle="click" aria-haspopup="true">
                                            <a href="<?php echo site_url('bioenlace/index')?>" class="menu-link">
                                                <span class="menu-text">Publicar</span>
                                               
                                            </a>
                                        </li>

                                <?php endif; ?>
                              <?php endif; ?>

                                      <li class="menu-item p-0">
                                            <a href="<?php echo site_url('publicidad/index')?>" class="menu-link">
                                                <span class="menu-text">Publicidad</span>
                                               
                                            </a>
                                        </li>


                                    <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','LABORATORIO','CASA DE REPRESENTACION'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador','Ventas'")): ?> 

                                  <li class="menu-item p-0">
                                            <a href="<?php echo site_url('producto_publicaciones/index')?>" class="menu-link">
                                                <span class="menu-text">Mis Productos</span>
                                               
                                            </a>
                                        </li>


                          <?php endif; ?>
                        <?php endif; ?>

                          
                                  <li class="menu-item p-0 d-block d-md-none">
                                            <a href="<?php echo site_url('auth/logout')?>" class="menu-link">
                                                <span class="menu-text text-primary"><b>Cerrar sesion</b></span>
                                               
                                            </a>
                                        </li>
                                    



                                    </ul>
                                    <!--end::Header Nav-->
                                </div>
                                <!--end::Header Menu-->
                            </div>
                            <!--end::Header Menu Wrapper-->
                            <!--begin::Topbar-->
                            <div class="topbar">



                                              <span class="d-none d-lg-block">
                                        
                                    <!--begin::Toggle-->


                                             <a href="<?php echo site_url(); ?>estado_rose/desktop_index"  class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 mt-3"> 


                                                <span class="flaticon-pie-chart font-weight-bold icon-2x"></span>

      

                                        <span style="margin-top:36px; position: absolute;"  class="" ></span>

                                         </a>


                                            
                                            

                                            

                                        
                                    <!--end::Toggle-->



                                </span>













                                                                            <span class="d-none d-lg-block">
                                            <div class="dropdown mt-3">
                                    <!--begin::Toggle-->
                                    <div class="topbar-item cerrar_notificacion_luz_mensaje_push_sms" data-toggle="dropdown" data-offset="10px,0px">
                                        <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">


                                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon |  <span class="svg-icon svg-icon-xl svg-icon-primary">path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Notifications1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <path d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z" fill="#000000"/>
                                            <rect fill="#000000" opacity="0.3" x="10" y="16" width="4" height="4" rx="2"/>
                                            </g>
                                            </svg><!--end::Svg Icon-->

                                        </span>


                                             <?php $info_notificacion_push_sms = $this->evento_cron_library->get_info_notificacion_push_sms(); ?>

                                            

                                            <span style="margin-top:36px; position: absolute;"  class="<?php if ($info_notificacion_push_sms): ?>label label-dot label-danger blink  <?php endif; ?> luz_notificacion " ></span>

                                        

                                        </div>
                                    </div>

                                    <!--end::Toggle-->

                                    <!--begin::Dropdown-->
                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-xl dropdown-menu-anim-up notificacion_drop">
                                        
                            

<!--begin::Header-->                        
                                            <div class="d-flex align-items-center py-10 px-8 bgi-size-cover bgi-no-repeat rounded-top" 
                                            style="background-image: url(<?php echo base_url(); ?>assets/media/misc/bg-1.jpg)">
                                                <h4 class="text-white m-0 flex-grow-1 mr-3">Notificaciones</h4>
                                              
                                            </div>

                                            <!--begin::Scroll-->
                                                <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                        <div class="navi navi-hover scroll my-4" data-scroll="true" data-height="300" data-mobile-height="200">
                                            <span class="box_notificacion_2"></span>

                                            <?php if($info_notificacion_push_sms): ?>
                                                <?php foreach ($info_notificacion_push_sms->result() as $row): ?>
                                                   
                                                    <a href="<?php echo $row->tx_link; ?>"  class="navi-item box_notificacion_2 notificacion_<?php echo $row->id; ?>"><div class="navi-link"><div class="navi-icon mr-2"><i class="flaticon2-information text-success"></i> </div><div class="navi-text"><div class="font-weight-bold"><?php echo $row->tx_mensaje ?></div><div class="text-muted"><?php echo $row->ff_hora_minuto_segundo; ?></div></div><button onclick="cerrar_notificacion('<?php echo $row->id; ?>')" class="btn btn-primary p-2"><i class="flaticon-close"></i></button></div></a>

                                               <?php endforeach; ?>
                                            <?php endif; ?>




                                                <!--end::Separator-->

                                                <!--end::Item-->
                                            </div>
                                            </div>

                                            <!--end::Scroll-->

                                            <!--begin::Summary-->


                                            <!--end::Summary-->

                           
                                    
                                    </div>

                                    <!--end::Dropdown-->
                                </div>
                                </span>


        


                                <!--begin::Search-->

           <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','FARMACIA','CLINICA'")): ?> 
                         <?php if($this->usuario_library->permiso_empresa("'Administrador','Compras'")): ?>
                                            <span class="d-none d-lg-block">
                                            <div class="dropdown mt-3">
                                    <!--begin::Toggle-->
                                    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                        <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                                            <span class="svg-icon svg-icon-xl svg-icon-primary">

                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
                                                    </g>
                                                </svg>

                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                    </div>

                                    <!--end::Toggle-->

                                    <!--begin::Dropdown-->
                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-xl dropdown-menu-anim-up">
                                        
                                        <form>

                                            <?php $ca_monto = 0; $info_carrito = $this->biomercado_library->get_info_comprado_general(); ?>
<!--begin::Header-->                        
                                            <div class="d-flex align-items-center py-10 px-8 bgi-size-cover bgi-no-repeat rounded-top" 
                                            style="background-image: url(<?php echo base_url(); ?>assets/media/misc/bg-1.jpg)">
                                                <span class="btn btn-md btn-icon bg-white-o-15 mr-4">
                                                    <i class="flaticon2-shopping-cart-1 text-success"></i>
                                                </span>
                                                <h4 class="text-white m-0 flex-grow-1 mr-3">Carrito</h4>
                                                <button type="button" class="btn btn-success btn-sm"><?php echo $info_carrito->num_rows(); ?>  Items</button>
                                            </div>

                                            <!--begin::Scroll-->
                                            <div class="scroll scroll-push" data-scroll="true" data-height="250" data-mobile-height="200">

                                                <!--begin::Item-->
                                                <?php if($info_carrito->num_rows()): ?>
                                                <?php foreach ($info_carrito->result() as $row): ?>

                                               
                                                <div class="d-flex align-items-center justify-content-between p-6">
                                                    <div class="d-flex flex-column mr-2">
                                                        <a href="<?php echo site_url(); ?>compra/menu_carro" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary"><?php echo $row->nb_producto; ?></a>
                                                        <span class="text-muted"><?php echo $row->tx_descripcion; ?></span>
                                                        <div class="d-flex align-items-center mt-2">
                                                            <span class="font-weight-bold mr-1 text-dark-75 font-size-lg"><?php echo $row->ca_precio; ?></span>
                                                            <span class="text-muted mr-1">X</span>
                                                            <span class="font-weight-bold mr-2 text-dark-75 font-size-lg"><?php echo $row->ca_unidades_comprado; ?></span>
                                                        </div>
                                                    </div>
                                                    <?php if($row->nb_url_foto != ''): ?>
                                                    <a href="<?php echo site_url(); ?>compra/menu_carro" class="symbol symbol-70 flex-shrink-0">
                                                        <img src="<?php echo $row->nb_url_foto; ?>" title="<?php echo $row->nb_producto; ?>" alt="" />
                                                    </a>
                                                <?php endif; ?>

                                
                                                </div>



                                                <?php $ca_monto += $row->ca_precio; ?>
                                                <!--begin::Separator-->
                                                <div class="separator separator-solid"></div>

                                                 <?php endforeach; ?>
                                             <?php else: ?>
                                                <div class="p-4">
                                                <h4 class="text-dark-50">Carrito vacio</h4>
                                                <p class="text-dark-50">Ingrese a cartelera y agregue producto</p>
                                                </div>
                                             <?php endif; ?>
                                                <!--end::Separator-->

                                                <!--end::Item-->
                                            </div>

                                            <!--end::Scroll-->

                                            <!--begin::Summary-->
                                            <div class="p-8">
                                                <div class="d-flex align-items-center justify-content-between mb-4">
                                                    <span class="font-weight-bold text-muted font-size-sm mr-2">Total</span>
                                                    <span class="font-weight-bolder text-dark-20 text-right"><?php echo $ca_monto; ?></span>
                                                </div>
                                                <div class="text-right">
                                                    <a href="<?php echo site_url(); ?>compra/menu_carro"  class="btn btn-primary text-weight-bold">Comprar</a>
                                                </div>
                                            </div>

                                            <!--end::Summary-->

                                        </form>
                                    
                                    </div>

                                    <!--end::Dropdown-->
                                </div>
                                </span>

                            <?php endif; ?>
                            <?php endif; ?>





                                <div class="topbar-item">
                                    <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                                        <span class="text-muted font-weight-bold font-size-base mr-1">Hola,</span>
                                        <span class="text-dark-50 font-weight-bolder font-size-base mr-3"><?php echo $this->ion_auth->get_nombre_usuario(); ?></span>
                                        <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                            <span class="symbol-label font-size-h5 font-weight-bold"> <?php echo substr($this->ion_auth->get_nombre_usuario(), 0, 1); ?></span>
                                        </span>
                                    </div>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Topbar-->
                        </div>
                        <!--end::Container-->
                    </div>

