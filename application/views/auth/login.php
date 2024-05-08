
<!DOCTYPE html>

<html lang="es">
    <!--begin::Head-->
    <head>
        <meta charset="utf-8" />
        <title>Inicio | ROSE</title>
        <meta name="description" content="Es una plataforma que permite a las empresas del sector farmacéutico, Anunciar, Comprar, Vender productos a nivel nacional." />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="theme-color" content="#2c7873">
        <meta name="MobileOptimized" content="width">
        <meta name="HandheldFriendly" content="true">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <link rel="manifest" href="<?php echo base_url(); ?>/manifest.json">
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="<?php echo base_url() ?>assets/css/pages/login/classic/login-4.css" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <link href="<?php echo base_url() ?>assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
           <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/animsition/dist/css/animsition.min.css">
        <!--end::Layout Themes-->
               <link rel="shortcut icon" href="<?php echo base_url(); ?>img/logo/rose_nav.ico" />
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
                <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('<?php echo base_url() ?>assets/media/bg/bg-3.jpg');">
                    <div class="login-form text-center p-7 position-relative overflow-hidden">
                        <!--begin::Login Header-->
                        <div class="d-flex flex-center mb-15">
                            <a href="#">
                                <img src="<?php echo base_url() ?>img/logo/logo_blanco_rose_farmaceutica.png" class="max-h-75px" alt="" />
                            </a>
                        </div>
                        <!--end::Login Header-->
                        <!--begin::Login Sign in form-->
                        
                        <div class="login-signin animsition">

                            <?php echo form_open("auth/login");?>
                            <form ></form>

                             <form action="<?= site_url('/auth/login') ?>" id="form_login"  method="POST">
                            <div class="mb-20">
                                <h3>Acceder</h3>
                                <div class="text-muted font-weight-bold">Bienvenido a nuestra plataforma:</div>
                            </div>
                            <span id="infoMessage"> <b><?php echo $message;?></b></span>
                            <form class="form" id="kt_login_signin_form">
                                <div class="form-group mb-5">
                                    <?php echo form_input($identity);?>
                                </div>
                                <div class="form-group mb-5">
                                   <?php echo form_password($password);?> 
                                </div>
                                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="checkbox-inline">
                                        <label class="checkbox m-0 text-muted">
                                         <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                                        <span></span>Recordarme</label>
                                    </div>

                        <a class="text-muted text-hover-primary" href="javascript:" id="kt_login_forgot" onclick="abrir_modal()"> ¿Olvido su clave? </a>

                                </div>

                                <a href="javascript:" onclick="ingresar()" class='btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4 animsition-link'>Ingresar</a>
                            
                            </form>
                            <div class="mt-10">
                                <span class="opacity-70 mr-4">¿No tienes cuenta?</span>
                                <a href="<?php echo site_url('cuenta/registrarse')?>" id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold">Registrarse!</a>
                            </div>

                              <?php echo form_close();?>
                        </div>

                       
                        <!--end::Login Sign in form-->

                        <!--end::Login forgot password form-->
                    </div>
                </div>
            </div>
            <!--end::Login-->
        </div>
        <!--end::Main-->

            <div class="modal fade"  id="ajax_remote" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">

        </div>
    </div>
</div>

         <script src="<?php echo base_url(); ?>assets/plugins/custom/jquery/jquery-3.3.1.min.js"></script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
 <script src="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/custom/prismjs/prismjs.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.bundle.min.js"></script>
        <!--end::Global Theme Bundle-->
        <!--begin::Page Scripts(used by this page)-->
        <!--end::Page Scripts-->

      
  <script src="<?php echo base_url(); ?>assets/plugins/custom/animsition/dist/js/animsition.min.js"></script>


            <script>


        function ingresar()

    {

      $("#form_login").submit();

    }



                      $(".animsition").animsition({
    inClass: 'zoom-in-sm',
    outClass: 'zoom-out-sm',
    inDuration: 500,
    outDuration: 300,
    linkElement: '.animsition-link',
    // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
    loading: true,
    loadingParentElement: 'body', //animsition wrapper element
    loadingClass: 'animsition-loading',
    loadingInner: '',
    timeout: false,
    timeoutCountdown: 1000,
    onLoadEvent: true,
    browser: [ 'animation-duration', '-webkit-animation-duration'],
    // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
    // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
    overlay : false,
    overlayClass : 'animsition-overlay-slide',
    overlayParentElement : 'body',
    transition: function(url){ window.location.href = url; }
  });


        if('serviceWorker' in navigator){
            window.addEventListener('load',()=>{
                navigator.serviceWorker.register('/firebase-messaging-sw.js');
            });
        }

                                   function abrir_modal() {


                            $.get("<?php echo site_url('cuenta/recuperar_password') ?>",
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }


               $(document).ready(function () {
                   $("input:text:visible:first").focus();
               });
               
            </script>
    </body>
    <!--end::Body-->
</html>