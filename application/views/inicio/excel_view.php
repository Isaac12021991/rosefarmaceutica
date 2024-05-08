

<link href="<?php echo base_url() ?>css/acordeon/styles_acordeon.css" rel="stylesheet" type="text/css" />
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->

        <div class="page-bar">

                              <h4>Esxel </h4>
                              <div class="page-toolbar pull-left">
                                 <?php $info_empresa = $this->empresa_library->get_info_empresa(); ?>
                                 <?php echo $info_empresa->nb_empresa ?>
                              </div>

                          <div class="page-toolbar pull-right">
                             <?php if ($this->ion_auth->get_last_login() != ''):  echo 'Último ingreso: '.date("d-m-Y g:i:s a", $this->ion_auth->get_last_login()) ; endif; ?>

                          </div>
                          </div>

                <h1 class="page-title">   </h1>
      <div class="row">
       <div class="col-lg-8 col-md-8 col-sm-4 col-xs-12">

               <div class="portlet light">
         <div class="portlet-body"> 


          <h2>Import Excel File into MySQL Database using PHP</h2>
    
    <div class="outer-container">
<form action="<?php echo base_url("inicio/cargar_excel")?>" method="post" enctype="multipart/form-data">
                        <!--El name del campo tiene que ser si o si "userfile"-->
    Subir un fichero: <input type="file" name="file" value="fichero"/>
    <input type="submit" value="Enviar"/>
</form>
        
    </div>
 
            

           </div>
        </div>



            <!-- END MENU -->
         </div>
         <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12 ">



         </div>
      </div>
   </div>
   <!-- END CONTENT BODY -->
</div>

<div class="modal fade" id="ajax_remote" tabindex="-1">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body">
            <div class="loader_panel_inside">
               <div class="ball"></div>
               <h6 align="center"><B>CARGANDO... ESPERE POR FAVOR</b></h6>
            </div>
            <br> 
            <h3 align="center"><b>SIRE.</b></h3>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>


<script type="text/javascript" language="JavaScript">

</script>