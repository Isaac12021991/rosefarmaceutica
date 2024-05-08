
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
    <!--begin::Head-->
    <head>
        <meta charset="utf-8" />
        <title>Inicio| Rose</title>
        <meta name="description" content="Rose" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="<?php echo base_url() ?>assets/css/pages/login/classic/login-4.css" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="<?php echo base_url() ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <link href="<?php echo base_url() ?>assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
        <!--end::Layout Themes-->
         <link rel="shortcut icon" href="<?php echo base_url(); ?>img/logo/rose_nav.ico" />
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-4 d-flex flex-row-fluid login-signup-on" id="kt_login">
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
                        <div class="login-signup">
                            <div class="mb-10">
                                <h3>Restablecer Contraseña</h3>
                                <div class="text-muted font-weight-bold">Recuperacion de contraseña</div>
                            </div>
                            <form class="form" id="kt_login_signup_form">
                                <div class="form-group mb-5">
                                    <input type="password" name="password" id="password" class="form-control h-auto form-control-solid py-4 px-8" autocomplete="off" maxlength="50" placeholder="Contraseña" autofocus="autofocus" value="">
                                </div>

                                 <div class="form-group mb-5">
                                    <input type="password" name="password_repeat" id="password_repeat" class="form-control h-auto form-control-solid py-4 px-8" maxlength="50" placeholder="Confirmar contraseña" value="">
                                </div>


                                <div class="form-group d-flex flex-wrap flex-center mt-10">
                                    <a id="guardar_password" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Actualizar contraseña</a>
                                    <a id="kt_login_signup_cancel"  href="<?php echo site_url('auth/login')?>" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancelar</a>
                                </div>
                            </form>
                        </div>
                        <!--end::Login Sign in form-->

                        <!--end::Login forgot password form-->
                    </div>
                </div>
            </div>
            <!--end::Login-->
        </div>
        <!--end::Main-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="<?php echo base_url() ?>assets/plugins/global/plugins.bundle.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
        <script src="<?php echo base_url() ?>assets/js/scripts.bundle.js"></script>
        <!--end::Global Theme Bundle-->
        <!--begin::Page Scripts(used by this page)-->
        <script src="<?php echo base_url() ?>assets/js/pages/custom/login/login-general.js"></script>
        <!--end::Page Scripts-->


 <script>
               $(document).ready(function () {
                   $("input:text:visible:first").focus();
               });
               
            </script>



  <script type="text/javascript">


               /*  var response = grecaptcha.getResponse();

    if(response.length == 0){
      notificacion_toas('error','Error','Verifica si eres humano');
       return;

    }; */
  


 $('#guardar_password').click(function(){


               var password_repeat = $('#password_repeat').val(); 
               var password = $('#password').val();
               var co_usuario = '<?php echo $co_usuario ?>';



              if(password.length <= 4){
      toastr.error('Ingrese un minimo de 6 caracateres en su contraseña', 'Error');
      $('#password').focus();
      return false;
    }


       if ($('#password').val() != $('#password_repeat').val()) {


         toastr.error('Las contraseña no son iguales por favor verifique', 'Error');
         $('#password').focus();
         return;

       }

              if ($('#password').val() == '') {

         toastr.error('Ingrese una contraseña', 'Error');
         $('#password').focus();
         return;

       }



             $.ajax({
        method: "POST",
      data: {'password':password, 'co_usuario':co_usuario},
      url: "<?php echo site_url('cuenta/restablecer_contrasena_ejecutar') ?>",
        beforeSend: function(){ $('#guardar_password').html('Enviando...'); $('#guardar_password').attr("disabled", true);},
                     }).done(function( data ) { 

                        var obj = JSON.parse(data);

                       if (obj.error == 0) {

                        toastr.success(obj.message, 'Exito');

                        $('#guardar_password').html('Actualizar');
                        $('#guardar_password').attr("disabled", false);

                        $(location).attr('href',"<?php echo site_url() ?>auth/login"); 

                       }else{

                        toastr.error(obj.message, 'Error');
                        $('#guardar_password').html('Actualizar');
                        $('#guardar_password').attr("disabled", false);
                         return;

                       }
                                   

                      }).fail(function(){

                         toastr.error('Error del Servidor, Intente más tarde', 'Error');
                        $('#guardar_password').html('Actualizar');
                        $('#guardar_password').attr("disabled", false);
                         return;


                      }); 

   });


  </script>
      

    </body>
    <!--end::Body-->
</html>