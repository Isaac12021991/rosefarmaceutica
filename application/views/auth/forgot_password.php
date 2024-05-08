

<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8" />
      <title>SIRE - Inicio</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1" name="viewport" />
      <meta content="Drogueria" name="Drogueria" />
      <meta content="Drogueria" name="Isaac Betancourt" />
      <link rel="shortcut icon" href="<?php echo base_url() ?>/img/sofimed_fav_ico.ico" />
      <script src="<?php echo base_url() ?>assets/global/plugins/jquery/jquery-1.11.2.min.js"></script>
      <link href="<?php echo base_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url() ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url() ?>assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
      <link href="<?php echo base_url() ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url() ?>assets/layouts/layout/css/layout.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url() ?>assets/layouts/layout/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color" />
   </head>
   <!-- END HEAD -->
   <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-full-width" style="font-family:'Verdana';">
      <div class="page-wrapper">
         <!-- BEGIN HEADER -->
         <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
         </div>
         <!-- END HEADER -->
         <!-- BEGIN HEADER & CONTENT DIVIDER -->
         <div class="clearfix"> </div>
         <!-- END HEADER & CONTENT DIVIDER -->
         <!-- BEGIN CONTAINER -->
         <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
               <!-- BEGIN SIDEBAR -->
               <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
               <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
               <div class="page-sidebar navbar-collapse collapse">
                  <!-- END SIDEBAR MENU -->
                  <div class="page-sidebar-wrapper">
                     <!-- BEGIN RESPONSIVE MENU FOR HORIZONTAL & SIDEBAR MENU -->
                     <!-- END RESPONSIVE MENU FOR HORIZONTAL & SIDEBAR MENU -->
                  </div>
               </div>
               <!-- END SIDEBAR -->
            </div>
            <div class="page-content-wrapper">
               <!-- BEGIN CONTENT BODY -->
               <div class="page-content">
                  <div class="row">
                     <div class="col-lg-10 col-lg-offset-1">
                        <!-- BEGIN PAGE HEADER-->
                        <div class="row">
                           <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 hidden-xs hidden-sm">
                              <div class="row">
                                 <div class="col-lg-10 col-lg-offset-1">
                                    <h3 class="text-center">
                                       <b> SIRE. </b><br>Software administrativo<br>
                                       <small>Recuperar Contraseña</small>
                                    </h3>
                                    <div class="well well-lg">
                                       <h4 class="block">¿Olvido su contraseña?</h4>
                                       <p> 
                                          Las contraseñas nuevas solamente se envían a los clientes válidos registrados en la plataforma,
                                          Si Ud, No recibe nuestro e-mail dentro de un par de minutos, por favor, verifique el email que ingresó. 
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                              <?php echo form_open("auth/forgot_password");?>
                              <div class="row">
                                 <div class="col-lg-10 col-md-offset-1">
                                    <h2 class="text-center visible-lg visible-md"><b>Restablecer contraseña</b></h2>
                                    <h3 class="text-center visible-xs visible-sm">
                                       <b> SIRE. </b><br>Software administrativo<br>
                                       <small>Restablecer contraseña</small>
                                    </h3>
                                    <br>
                                    <div class="form-group">
                                       <label><label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> </label>
                                       <div class="input-group">
                                          <span class="input-group-addon">
                                          <i class="fa fa-envelope"></i>
                                          </span>
                                          <?php echo form_input($identity);?>
                                       </div>
                                    </div>
                                    <div class="form-actions">
                                       <?php echo form_submit('submit', lang('forgot_password_submit_btn'), "class='btn blue-chambray btn btn-lg btn-primary btn-block signup-btn'");?>
                                    </div>
                                    <div class="form-group">
                                       <small>
                                          <div id="infoMessage"><b><font color="red"><?php echo $message;?></font></b></div>
                                       </small>
                                    </div>
                                    <?php echo form_close();?>
                                    <div class="well well-lg visible-xs visible-sm">
                                       <h4 class="block">¿Olvido su contraseña?</h4>
                                       <p> 
                                          Las contraseñas nuevas solamente se envían a los clientes válidos registrados en la plataforma,
                                          Si Ud, No recibe nuestro e-mail dentro de un par de minutos, por favor, verifique el email que ingresó. 
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row visible-lg visible-md">
                           <div class="col-lg-10 col-md-offset-1">
                              <hr>
                              <p class="text-center"> Para una mejor experiencia utlilize los siguientes navegadores actualizados: <b> <a target="_blank" href="https://www.google.com/chrome">Google Chrome</a>, <a target="_blank" href="https://www.mozilla.org/es-ES/firefox/new/">Mozilla Firefox</a>  o <a target="_blank" href="https://support.apple.com/es_ES/downloads/safari">Safari</a></b> </p>
                              <p align="center"><a href="<?php echo site_url('noticias/')?>">Ir al portal principal</a></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- END CONTENT BODY -->
            </div>
            <script>
               $(document).ready(function () {
                   $("input:text:visible:first").focus();
               });
               
               
               
            </script>
         </div>
         <!-- END QUICK SIDEBAR -->
      </div>
      <!-- END CONTAINER -->
      <!-- BEGIN FOOTER -->
      <div class="page-footer">
         <div class="page-footer-inner"> SIRE. - Software administrativo. V.1.0
         </div>
         <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
         </div>
      </div>
      <!-- END FOOTER -->
      </div>
      <!-- BEGIN CORE PLUGINS -->
      <script src="<?php echo base_url() ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url() ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url() ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url() ?>assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
   </body>
</html>

