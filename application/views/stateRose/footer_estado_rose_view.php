  <div class="modal fade"  id="ajax_remote_empresas_asociadas" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <h3 align="center" class="text-dark p-6">Cargando...</h3>
        </div>
    </div>
</div>

          <!--end::Content-->
          <!--begin::Footer-->
          <span class="d-none d-sm-block">
          <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
            <!--begin::Container-->
            <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
              <!--begin::Copyright-->
              <div class="text-dark order-2 order-md-1">

                <span class="text-muted font-weight-bold mr-2"><?php echo date('Y'); ?></span>

                <a href="javascript:" target="_blank" class="text-dark-75 text-hover-primary"><?php $info_empresa = $this->empresa_library->get_info_empresa(); ?>
                  
                  <?php $co_partner = $this->ion_auth->co_partner(); echo $info_empresa->nb_empresa; ?>
                </a>

              </div>
              <!--end::Copyright-->
              <!--begin::Nav-->
              <div class="nav nav-dark">
                <a href="#" target="_blank" class="nav-link pl-0 pr-5"><?php echo $this->ion_auth->empresa(); ?></a>
                <a href="# " target="_blank" class="nav-link pl-0 pr-5"><?php echo $this->ion_auth->tipo_empresa(); ?></a>

                 <?php if($this->ion_auth->in_empresa_activado() == 0): ?> <a href='<?php echo site_url("partner/editar_partner/$co_partner"); ?>' class="nav-link pl-0 pr-5 text-info"> Verificar empresa</a> <?php endif; ?>


              </div>
              <!--end::Nav-->
            </div>
            <!--end::Container-->
          </div>

          </span>

            <span class="mt-10 d-block d-md-none">


               <div class="footer bg-white pb-3 pt-1 mt-4 d-flex flex-column" id="kt_footer"  style="bottom:0; position:fixed; width:100%; z-index:1;">




             <div class="d-flex justify-content-end p-0">

  
             <a href="<?= site_url('/estado_rose/nuevo_estado_rose') ?>" class="btn btn-text-dark font-weight-bold mr-2"><span class="flaticon2-edit font-size-h4 text-primary"></span></a>
                
            

            </div>



            <!--begin::Container-->

                        <div class="container-fluid d-flex flex-md-row align-items-center justify-content-between pl-0 pr-0">



                <div class="col-5 d-flex justify-content-start">

                         
           <a href="<?= site_url('/inicio/index') ?>" data-animsition-out-class="fade-out" data-animsition-out-duration="200" class="animsition-link mt-0 btn p-0 btn-link-dark btn-block"><i id="nav_movil_home" class="fas fa-home icon-xl"></i></a>


             <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','LABORATORIO','CASA DE REPRESENTACION'")): ?>   
                 <?php if($this->usuario_library->permiso_empresa("'Administrador','Ventas'")): ?> 

 
           <a href="<?= site_url('/producto_publicaciones/index') ?>" data-animsition-out-class="fade-out" data-animsition-out-duration="200" class="animsition-link mt-0 btn p-0 btn-block btn-link-dark" ><i id="nav_movil_producto_publicaciones" class="fas fa-th-list icon-xl"></i></a>
    

        <?php endif; ?>
        <?php endif; ?>


          <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','FARMACIA','CLINICA'")): ?>   
                 <?php if($this->usuario_library->permiso_empresa("'Administrador','Compras'")): ?> 

           <a href="<?= site_url('/compra/orden_compra') ?>" data-animsition-out-class="fade-out" data-animsition-out-duration="200" class="animsition-link btn mt-0  btn-link-dark btn-block"><i id="nav_movil_compras" class="fas fa-shopping-cart icon-xl"></i>  <span id="nav_movil_compras_notificacion" style="margin-left:-20px; margin-top:28px; position: absolute;"  class="" ></span>  </a>
         
          

             <?php endif; ?>
        <?php endif; ?>


      
                </div>

                <div class="col-2 d-flex justify-content-center">
                  
                 <a href="<?= site_url('/estado_rose/mobile_index') ?>" class="animsition-link" data-animsition-out-class="fade-out" data-animsition-out-duration="200"> <i id="icon_estado_rose" class="flaticon-pie-chart font-weight-bold icon-2x"></i> <br>
                   <span id="nav_movil_estado_rose" style="margin-left:14px; position: absolute;"  class=""></span>
                  </a>

                </div>


              <div class="col-5 d-flex justify-content-end">


                             <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','LABORATORIO','CASA DE REPRESENTACION'")): ?>   
                 <?php if($this->usuario_library->permiso_empresa("'Administrador','Ventas'")): ?> 


           <a href="<?= site_url('/solicitud_cotizacion/cartelera_solicitud_cotizacion') ?>" data-animsition-out-class="fade-out" data-animsition-out-duration="200" class="animsition-link btn p-0  btn-link-dark btn-block"><i id="nav_movil_solicitud_cotizacion" class=" fas fa-clipboard-list icon-xl"></i>  <br> 

            <span id="nav_movil_solicitud_cotizacion_notificacion" style="margin-left:-20px margin-top:28px;  position: absolute;"  class="" ></span>

          </a>
          



                <?php endif; ?>
        <?php endif; ?>

                                 <?php if($this->usuario_library->permiso_tipo_empresa("'FARMACIA','CLINICA'")): ?>    
                         <?php if($this->usuario_library->permiso_empresa("'Administrador','Compras'")): ?> 


                        
           <a href="<?= site_url('/solicitud_cotizacion/index') ?>" data-animsition-out-class="fade-out" data-animsition-out-duration="200" class="animsition-link mt-0 btn p-0 btn-link-dark btn-block"><i id="nav_movil_solicitud_cotizacion" class="fas fa-clipboard-list icon-xl"></i></a>
  

             <?php endif; ?>
        <?php endif; ?>



                                     <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','LABORATORIO','CASA DE REPRESENTACION'")): ?>   
                 <?php if($this->usuario_library->permiso_empresa("'Administrador','Ventas'")): ?> 

    
           <a href="<?= site_url('/venta/orden_compra/nuevo') ?>" data-animsition-out-class="fade-out" data-animsition-out-duration="200" class="animsition-link mt-0 btn p-0 btn-link-dark btn-block">
            <i id="nav_movil_ventas" class="far fa-handshake icon-xl"></i> <br> 

            <span id="nav_movil_ventas_notificacion" style="position: absolute;"  class="" ></span> </a>


             


             <?php endif; ?>
        <?php endif; ?>

                             <?php if($this->usuario_library->permiso_tipo_empresa("'FARMACIA','CLINICA','MEDICO'")): ?>   


            
           <a href="<?= site_url('/bioenlace/index') ?>" data-animsition-out-class="fade-out" data-animsition-out-duration="200" class="animsition-link btn p-0 mt-0 btn-link-dark btn-block"><i id="nav_movil_bioenlace" class="fas fa-location-arrow icon-xl"></i></a>


  
        <?php endif; ?>




          <a href="javascript:" class="btn p-0 mt-0 btn-link-dark btn-block">
         <i id="nav_movil_perfil" class=" far fa-user icon-xl"></i>
         </a>


                </div>
                




              <!--end::Nav-->
            </div>

            <!--end::Container-->
          </div>

        </span>



          <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Page-->
    </div>
    <!--end::Main-->
    <!-- begin::User Panel-->
    <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
      <!--begin::Header-->
      <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">Perfil
        <small class="text-muted font-size-sm ml-2"></small></h3>



        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
          <i class="ki ki-close icon-xs text-muted"></i>
        </a>
      </div>
      <!--end::Header-->
      <!--begin::Content-->
      <div class="offcanvas-content pr-5 mr-n5">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
          <div class="symbol symbol-100 mr-5">
            <div class="symbol-label" style="background-image:url('<?php echo $this->ion_auth->foto_perfil(); ?>')"></div>
            <i class="symbol-badge bg-success"></i>
          </div>
          <div class="d-flex flex-column">
            <a href="<?php echo site_url('cuenta/cuenta')?>" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary"><?php echo $this->ion_auth->get_nombres(); ?></a>
            <div class="text-muted mt-1"><?php echo $this->ion_auth->username(); ?></div>
            <div class="navi mt-2">
              <a href="#" class="navi-item">
                <span class="navi-link p-0 pb-2">
                  <span class="navi-icon mr-1">
                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                      <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <rect x="0" y="0" width="24" height="24" />
                          <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
                          <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                        </g>
                      </svg>
                      <!--end::Svg Icon-->
                    </span>
                  </span>
                  <span class="navi-text text-muted text-hover-primary"><?php echo $this->ion_auth->get_email(); ?></span>
                </span>
              </a>
              <a href="<?php echo site_url('auth/logout')?>" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Cerrar Sesion</a>
            </div>
          </div>
        </div>

        <!--end::Nav-->
        <!--begin::Separator-->
        <div class="separator separator-dashed my-7"></div>
        <!--end::Separator-->

                <a href="<?php echo site_url('cuenta/cuenta')?>" class="btn btn-sm btn-light-primary">
    <i class="flaticon-settings"></i> Mi perfil
</a>
        <!--begin::Notifications-->
        <div>
           <div class="separator separator-dashed my-7"></div>

          <!--end:Heading-->
          <!--begin::Item-->
          

          <!--end::Item-->
          <!--end::Item-->
        </div>
        <!--end::Notifications-->
      </div>
      <!--end::Content-->
    </div>
    <!-- end::User Panel-->









        <div id="kt_quick_cart" class="offcanvas offcanvas-right p-10">

          <span id="reload_carrito">
      <!--begin::Header-->
      <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
        <h4 class="font-weight-bold m-0">Carro de compra</h4>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_cart_close">
          <i class="ki ki-close icon-xs text-muted"></i>
        </a>
      </div>
      <!--end::Header-->
      <!--begin::Content-->
      <div class="offcanvas-content">
        <!--begin::Wrapper-->
        <div class="offcanvas-wrapper mb-2 scroll-pull">

           <?php $ca_monto = 0; $info_carrito = $this->biomercado_library->get_info_comprado_general(); ?>

                                                        <?php if($info_carrito->num_rows()): ?>
                                                <?php foreach ($info_carrito->result() as $row): ?>
          <!--begin::Item-->
          <div class="d-flex align-items-center justify-content-between py-8">
            <div class="d-flex flex-column mr-2">
              <a href="<?php echo site_url(); ?>compra/menu_carro" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary"><?php echo $row->nb_producto; ?></a>
              <span class="text-muted"><?php echo $row->tx_descripcion; ?></span>
              <div class="d-flex align-items-center mt-2">
                <span class="font-weight-bold mr-1 text-dark-75 font-size-lg"><?php echo $row->ca_precio; ?></span>
                <span class="text-muted mr-1">Para</span>
                <span class="font-weight-bold mr-2 text-dark-75 font-size-lg"><?php echo $row->ca_unidades_comprado; ?> Unidad</span>
              </div>
            </div>
            <?php $ca_monto += $row->ca_precio; ?>
            <?php if($row->nb_url_foto != ''): ?>
            <a href="#" class="symbol symbol-70 flex-shrink-0">
              <img src="<?php echo $row->nb_url_foto; ?>" title="" alt="" />
            </a>
          <?php endif; ?>
          </div>

          <div class="separator separator-solid"></div>

                          <?php endforeach; ?>
                       <?php else: ?>
                        <div class="p-4">
                          <h4 class="text-dark-50">Carrito vacio</h4>
                          <p class="text-dark-50">Ingrese a cartelera y agrege producto</p>
                          </div>
                       <?php endif; ?>

          <!--end::Item-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Purchase-->
        <div class="offcanvas-footer py-10">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <span class="font-weight-bold text-muted font-size-sm mr-2">Total:</span>
            <span class="font-weight-bolder text-dark text-right"><?php echo $ca_monto; ?></span>
          </div>
          <div class="text-right">
            <a href="<?php echo site_url(); ?>compra/menu_carro" class="btn btn-primary text-weight-bold">Comprar</a>
          </div>
        </div>
        <!--end::Purchase-->
      </div>
      <!--end::Content-->
      </span>
    </div>

    <!--end::Quick Cart-->




    <!--end::Chat Panel-->
    <!--begin::Scrolltop-->
     <span class="d-none d-lg-block">
    <div id="kt_scrolltop" class="scrolltop">
      <span class="svg-icon">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon points="0 0 24 0 24 24 0 24" />
            <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
            <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
          </g>
        </svg>
        <!--end::Svg Icon-->
      </span>
    </div>
  </span>


    <!--end::Demo Panel-->
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->




    <script src="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/custom/prismjs/prismjs.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.bundle.min.js"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Vendors(used by this page)-->

    <!--end::Page Vendors-->

<script src="<?php echo base_url(); ?>assets/plugins/custom/jquery-confirm/js/jquery-confirm.js"></script>

<script src="<?php echo base_url(); ?>assets/js/pages/crud/file-upload/image-input.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/custom/ion.sound/ion.sound.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/animsition/dist/css/animsition.min.css">
  <script src="<?php echo base_url(); ?>assets/plugins/custom/animsition/dist/js/animsition.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/plugins/custom/jqueryfinger/jquery.finger.min.js"></script>

    <script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-messaging.js"></script>


<script type="text/javascript">


            $('#nav_movil_perfil').on('press', function(e) {

           

            $('#ajax_remote_empresas_asociadas').modal('show');
             
        $.get("<?php echo site_url('cuenta/ver_empresas_asociadas') ?>",
        function(data){
        if (data != "") {
           
            $('#ajax_remote_empresas_asociadas').modal('show');
            $('#ajax_remote_empresas_asociadas .modal-content').html(data);
        }            
                  }

        );  



        });

          $('#nav_movil_perfil').on('tap', function(e) {
          $(location).attr('href',"<?php echo site_url() ?>cuenta/cuenta");
        });



/*
  var firebaseConfig = {
    apiKey: "AIzaSyAmLGjgUm3ha_fuFh9hnUfA4vNVhsj7id8",
    authDomain: "rose-farmaceutica.firebaseapp.com",
    projectId: "rose-farmaceutica",
    storageBucket: "rose-farmaceutica.appspot.com",
    messagingSenderId: "800137635166",
    appId: "1:800137635166:web:c44ca20344c9de56df5bcf",
    measurementId: "G-SFGB4H9LCV"
  };
  // Initialize Firebase



  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
  const messaging =firebase.messaging();

  window.onload=function(){



    pedirPermiso();

    let enableForegroundNotification=true;
  messaging.onMessage(function(payload){
        console.log("mensaje recibido");
        if(enableForegroundNotification){
            const {title, ...options}=JSON.parse(payload.data.notification);
            navigator.serviceWorker.getRegistrations().then( registration =>{
                registration[0].showNotification(title, options);
            });
        }
    }); 

    function pedirPermiso(){
        messaging.requestPermission()
        .then(function(){
            console.log("Se han haceptado las notificaciones");
            return messaging.getToken();
        }).then(function(token){
            console.log(token);
            guardarToken(token);

        }).catch(function(err){
            console.log('No se ha recibido el permiso');
        });
    }


    function guardarToken(token){


             $.ajax({
   method: "POST",
   data: {'token':token},
   url: "<?php echo site_url('inicio/token_notificacion') ?>",
            }).done(function(data) { 


             }).fail(function(){
   

   
   
             }); 




    }





  }//llave on load

*/


    ion.sound({
      sounds: [
          {name: "SD_ALERT_29"}
      ],
      path: "<?php echo base_url(); ?>assets/plugins/custom/ion.sound/sounds/",
      preload: true,
      multiplay: true,
      volume: 1.0
  });



     if (document.getElementById('controlador') !=null) 
     {

    var controlador = document.getElementById("controlador").innerHTML;

    if(controlador == 'Perfil'){


      var intro = document.getElementById('nav_movil_perfil');
      intro.style.color = '#2c7873';

    }

        if(controlador == 'Inicio'){
      var intro = document.getElementById('nav_movil_home');
      intro.style.color = '#2c7873';

    }

            if(controlador == 'Productos'){
      var intro = document.getElementById('nav_movil_producto_publicaciones');
      intro.style.color = '#2c7873';

    }

                if(controlador == 'Compras'){
      var intro = document.getElementById('nav_movil_compras');
      intro.style.color = '#2c7873';

    }


            if(controlador == 'Venta'){
      var intro = document.getElementById('nav_movil_ventas');
      intro.style.color = '#2c7873';

    }


      if(controlador == 'Solicitud de cotizacion'){
      var intro = document.getElementById('nav_movil_solicitud_cotizacion');
      intro.style.color = '#2c7873';

    }

          if(controlador == 'Publicar'){
      var intro = document.getElementById('nav_movil_bioenlace');
      intro.style.color = '#2c7873';

    }


     }






 

      $(".animsition").animsition({
    inClass: 'zoom-in-sm',
    outClass: 'zoom-out-sm',
    inDuration: 300,
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


  
setInterval(function(){ 




             $.ajax({
   method: "POST",
   data: {},
   url: "<?php echo site_url('evento_cron/conexion_servidor') ?>",
            }).done(function(data) { 


                   var obj = JSON.parse(data);

                         if (obj.ca_mensajes_estado_rose > 0){

                    $("#nav_movil_estado_rose").addClass("label label-dot label-success blink");
                        var icon_estado_rose = document.getElementById('icon_estado_rose');
                       icon_estado_rose.style.color = '#2c7873';

                  navigator.vibrate([500, 500, 500]);


                   }else{

                    $("#nav_movil_estado_rose").removeClass("label label-dot label-success blink");
                        var icon_estado_rose = document.getElementById('icon_estado_rose');
                       icon_estado_rose.style.color = '#7f7f7f';

                   }


                   if (obj.ca_mensajes_notificacion_push_sms > 0){

                           $(".luz_notificacion").addClass("label label-dot label-danger blink");

                  navigator.vibrate([1000, 500, 2000]);
                  ion.sound.play("SD_ALERT_29");


                   }

                         if (obj.nu_venta_confirmada > 0){

                           $("#nav_movil_ventas_notificacion").addClass("label label-dot label-danger blink");

                   }


                       if (obj.nu_propuesta_orden_compra > 0){

                           $("#nav_movil_compras_notificacion").addClass("label label-dot label-danger blink");

                   }

                     if (obj.ca_solicitud_cotizacion_pendiente > 0){

                           $("#nav_movil_solicitud_cotizacion_notificacion").addClass("label label-dot label-danger blink");

                   }
        
                     var o = JSON.parse(obj.array_notificacion_push_sms);
                    

                   for (x of o ) {



                     var data_me = '<a href="'+x.tx_link+'" class="navi-item box_notificacion notificacion_'+x.id+'"><div class="navi-link"><div class="navi-icon mr-2"><i class="flaticon2-information text-success"></i> </div><div class="navi-text"><div class="font-weight-bold">'+x.tx_mensaje+'</div><div class="text-muted">'+x.ff_hora_minuto_segundo+'</div></div><button  onclick="cerrar_notificacion('+x.id+')" class="btn btn-primary p-2"><i class="flaticon-close"></i></button></div></a>';

                         $(".box_notificacion_1:first").before(data_me);

                         $(".box_notificacion_2:first").before(data_me);

                      }



   
             }).fail(function(){
   

   
   
             }); 


}, 2500);



  
          function cerrar_notificacion(co_notificacion_mensaje_push_sms)
   {



    $('.notificacion_drop').on('click', function(event){
    // The event won't be propagated up to the document NODE and 
    // therefore delegated events won't be fired
    event.stopPropagation();
});

    $(".notificacion_"+co_notificacion_mensaje_push_sms).remove();

       $.ajax({
   method: "POST",
   data: {'co_notificacion_mensaje_push_sms':co_notificacion_mensaje_push_sms},
   url: "<?php echo site_url('evento_cron/cerrar_notificacion') ?>",
                }).done(function( data ) { 
                   var obj = JSON.parse(data);
                   
   
                 }).fail(function(){
   
                 }); 
 
   }


</script>

                    <style type="text/css">
                        
                        .blink {
  animation: blink-animation 1s steps(5, start) infinite;
  -webkit-animation: blink-animation 1s steps(5, start) infinite;
}
@keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
@-webkit-keyframes blink-animation {
  to {
    visibility: hidden;
  }
}

                    </style>

    <!--end::Page Scripts-->
  </body>
  <!--end::Body-->
</html>