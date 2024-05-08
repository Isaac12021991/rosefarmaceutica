
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
                                <h3>Registrarse</h3>
                                <div class="text-muted font-weight-bold">Ingrese los datos de su nueva cuenta</div>
                            </div>
                            <form class="form" id="kt_login_signup_form">
                                <p class="hint"> Datos Personales</p>
                                <div class="form-group mb-5">
                                    <input type="text" name="first_name" id="first_name" class="form-control h-auto form-control-solid py-4 px-8" autocomplete="off" maxlength="25" placeholder="Nombre" autofocus="autofocus" value="">
                                </div>
                                <div class="form-group mb-5">
                                <input type="text" name="last_name" id="last_name" maxlength="25" autocomplete="off" class="form-control h-auto form-control-solid py-4 px-8" placeholder="Apellido" value="">
                                </div>
                                <div class="form-group mb-5">
                                     <input type="text" name="nu_cedula" id="nu_cedula" class="form-control h-auto form-control-solid py-4 px-8" maxlength="15" autocomplete="off" placeholder="Cedula o Pasaporte" value="">
                                </div>
                                <p class="hint"> Datos de Acceso al Sistema</p>
                                <div class="form-group mb-5">
                                    <input type="text" name="username" id="username" maxlength="6" autocomplete="off" class="form-control h-auto form-control-solid py-4 px-8" placeholder="Seudonimo" value="">
                                </div>

                                    <div class="form-group mb-5">
                                      <input type="text" name="email" id="email" class="form-control h-auto form-control-solid py-4 px-8" autocomplete="off" placeholder="Email" maxlength="50" value=""> 
                                </div>

                                <div class="form-group mb-5">
                                      <input type="password" name="password" id="password"  class="form-control h-auto form-control-solid py-4 px-8" autocomplete="off" placeholder="Clave" maxlength="15" value=""> 
                                </div>


                                <div class="form-group mb-5">
                                          <input type="password" name="password_repeat" id="password_repeat" autocomplete="off" class="form-control h-auto form-control-solid py-4 px-8" maxlength="15" placeholder="Confirme la clave">
                                </div>

                                <p class="hint"> Datos de la Empresa: </p>  

                            <div class="form-group mb-5">

                             <input type="text" name="nb_empresa" id="nb_empresa" class="form-control h-auto form-control-solid py-4 px-8" autocomplete="off" maxlength="50" placeholder="Nombre" value="">
                                </div>

                                 <div class="form-group mb-5">
                             <input type="text" name="nu_rif" id="nu_rif" class="form-control h-auto form-control-solid py-4 px-8" autocomplete="off" maxlength="10" placeholder="RIF - FORMATO: J000000000" value="">
                                </div>


                                 <div class="form-group mb-5">
                            <select class="form-control h-auto form-control-solid py-4 px-8" id="nb_tipo_empresa" name="nb_tipo_empresa">
                                 <option value="">Seleccione tipo de empresa</option>
                                 <?php foreach($tipos_empresa->result() as $row): ?>

                                    <option value="<?php echo $row->nb_tipo_empresa; ?>"> <?php echo $row->nb_tipo_empresa; ?></option>
                                      <?php endforeach; ?>
                            </select>
                                </div>

                        <div class="form-group mb-5">
                            <select class="form-control h-auto form-control-solid py-4 px-8" id="nb_estado" name="nb_estado">
                                <option value="">Seleccione su ubicacion</option>
                        <?php foreach($estados->result() as $row): ?>
                            
                    <option value="<?php echo $row->nb_estado; ?>"> <?php echo $row->nb_estado; ?></option>
                      <?php endforeach; ?>
                            </select>
                                </div>

                                                        <div class="form-group mb-5">
                         <textarea name="tx_direccion" id="tx_direccion" class="form-control h-auto form-control-solid py-4 px-8" maxlength="300" placeholder="Direccion fiscal"></textarea>
                                </div>

                               
                                <div class="form-group mb-5 text-left">
                                    <div class="checkbox-inline">
                                        <label class="checkbox m-0">
                                        <input type="checkbox"  name="tnc" id="tnc" />
                                        <span></span> Estoy de acuerdo con los
                                        <a onclick="ver_terminos()" class="font-weight-bold ml-1">Terminos y condiciones del servicio </a>.</label>
                                    </div>
                                    <div class="form-text text-muted text-center"></div>
                                </div>
                                <div class="form-group d-flex flex-wrap flex-center mt-10">
                                    <a id="crear_usuario" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Aceptar</a>
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






<?php if ($link_referido != '0'): $this->input->set_cookie("bionewpharma_vendedor", $link_referido, 5259600); endif; ?>
          

            <script>
               $(document).ready(function () {
                $("input:text:visible:first").focus();

                $('#username').maxlength({
                threshold: 6
                });

               });
               
            </script>


  <script type="text/javascript">

    function ver_terminos() {

        window.open('<?php echo base_url() ?>archivos/politicas/Terminos Y Condiciones Rose.pdf', '_blank');

    }



 $('#crear_usuario').click(function(){
    

            var email = $('#email').val(); 
            var username = $('#username').val();
            var nu_cedula = $('#nu_cedula').val(); 
             var first_name = $('#first_name').val(); 
             var last_name = $('#last_name').val();
             var password_repeat = $('#password_repeat').val(); 
             var password = $('#password').val();
             var nb_estado = $('#nb_estado').val();
              var nb_empresa = $('#nb_empresa').val();
             var nu_rif = $('#nu_rif').val();
              var nb_tipo_empresa = $('#nb_tipo_empresa').val();
             var tx_direccion = $('#tx_direccion').val();

             

               if (username == '') {
         toastr.error('Ingrese un seudonimo', 'Error');
         $('#username').focus();
         return;

    };
    
    if(username.length <= 2){
      toastr.error('Ingrese un seudonimo válido y unico', 'Error');
      $('#username').focus();
      return false;
    }



      if (email == '') {
         toastr.error('Ingrese el email', 'Error');
         $('#email').focus();
         return;

    };

    if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {

      toastr.error('Ingrese un email válido', 'Error');
       $('#email').focus();
       return;
    }


          if (first_name == '') {

         toastr.error('Ingrese el nombre', 'Error');
         $('#first_name').focus();
         return;

    };

              if (last_name == '') {

         toastr.error('Ingrese el apellido', 'Error');
         $('#last_name').focus();
         return;

    };


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

                 if (nb_empresa == '') {

         toastr.error('Ingrese el nombre de la empresa', 'Error');
         $('#nb_empresa').focus();
         return;

    };

              if (nu_rif == '') {

         toastr.error('Ingrese el rif de la empresa', 'Error');
         $('#nu_rif').focus();
         return;

    };

                  if (tx_direccion == '') {

         toastr.error('Ingrese la direccion fiscal de la empresa', 'Error');
         $('#tx_direccion').focus();
         return;

    };


              if (nb_tipo_empresa == '') {

         toastr.error('Seleccione el tipo de empresa', 'Error');
         $('#co_tipo_empresa').focus();
         return;

    };

if ($('#tnc').is(':checked') ) {
    console.log("De acuerdo con los terminos y condiciones");
}else{


         toastr.error('Para formar parte de BioMercado debe estar de acuerdo con los terminos y condiciones', 'Error');
         return;


}

            KTApp.blockPage({
              overlayColor: 'black',
              opacity: 0.2,
              state: 'primary' // a bootstrap color
             });


             $.ajax({
        method: "POST",
      data: {'email':email, 'nu_cedula':nu_cedula, 'first_name':first_name, 'last_name':last_name, 'username':username, 'password':password, 'nb_estado':nb_estado,'nb_empresa':nb_empresa, 'nu_rif':nu_rif, 'nb_tipo_empresa':nb_tipo_empresa, 'tx_direccion':tx_direccion},
      url: "<?php echo site_url('cuenta/agregar_usuario_ejecutar') ?>",
        beforeSend: function(){ $('#crear_usuario').html('Creando usuario'); $('#crear_usuario').attr("disabled", true);},
                     }).done(function( data ) { 
                          KTApp.unblockPage();

                        var obj = JSON.parse(data);

                       if (obj.error == 0) {

                        toastr.success(obj.message, 'Exito');

                        $('#crear_usuario').html('Crear usuario');
                        $('#crear_usuario').attr("disabled", false);

                        $(location).attr('href',"<?php echo site_url() ?>cuenta/registro_exitoso"); 

                       }else{

                        toastr.error(obj.message, 'Error');
                        $('#crear_usuario').html('Crear usuario');
                        $('#crear_usuario').attr("disabled", false);
                         return;

                       }
                                   

                      }).fail(function(){
                          KTApp.unblockPage();

                         toastr.error('Error del servidor', 'Error');
                        $('#crear_usuario').html('Crear usuario');
                        $('#crear_usuario').attr("disabled", false);
                         return;


                      }); 

   });


  </script>
    </body>
    <!--end::Body-->
</html>