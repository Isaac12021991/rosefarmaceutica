<link href="<?php echo base_url() ?>css/acordeon/styles_acordeon.css" rel="stylesheet" type="text/css" />
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->

        <div class="page-bar">

                              <h4>Partner / nuevo </h4>
                              <div class="page-toolbar pull-left">

                              <a class="btn blue btn-sm" onclick="agregar_partner()">Guardar</a>
                 
                                <a class="btn default btn-sm" href="javascript:window.history.back();"> Descartar</a>





                              </div>

                          <div class="page-toolbar pull-right"></div>
                          </div>

                <h1 class="page-title">    </h1>
      <div class="row">
       <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 visible-md visible-lg">
     



            <!-- END MENU -->
         </div>
         <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">

                        <div id="controllers_facturacion_cliente">

                                               <div class="portlet light">
                                <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-speech"></i>
                                            <span class="caption-subject bold uppercase">  Nuevo </span>
                                            <span class="caption-helper"><b></b></span>
                                        </div>

                                        <div class="actions">
                                      </div>
                                    </div>
                                    <div class="portlet-body" id="block_page">

                                                                       <form class="form-horizontal" role="form">

                                        <div class="form-body">
                                        <div class="row">
                                          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                                <div class="form-group">
                                                     <label class="col-md-3 control-label"><span class="pull-left">Identificacion</span></label>

                                                    <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input type="text" name="nu_identificacion" id="nu_identificacion" class="form-control input-sm input-lg" placeholder="Identificacion" > 

                                                    </div>

                                                  </div>
                                                    <!-- /input-group -->
                                                </div>


                                  <div class="form-group">
                            <label class="col-md-3 control-label"><span class="pull-left">Nombre</span></label>
                            <div class="col-md-9">
                              <input type="text" name="nb_partner" id="nb_partner" class="form-control input-sm" placeholder="Nombre">  
                            </div>
                                </div>

                                                                <div class="form-group">
                            <label class="col-md-3 control-label"><span class="pull-left">Tipo partner</span></label>
                            <div class="col-md-9">
                              <input type="text" name="nb_tipo_empresa" id="nb_tipo_empresa" class="form-control input-sm" placeholder="Nombre">  
                            </div>
                                </div>


    


                                              <div class="form-group">
                                            <label class="col-md-3 control-label"><span class="pull-left">Representante </span></label>

                                            <div class="col-md-9">
                                            <input type="text" name="nb_representante" id="nb_representante" class="form-control input-sm" placeholder="Representante">  

                                            </div>
                                            </div>


                                                                                   <div class="form-group">
                                            <label class="col-md-3 control-label"><span class="pull-left">Direccion</span></label>

                                            <div class="col-md-9">
                                              <textarea class="form-control" id="tx_direccion" name="tx_direccion"></textarea>
                                            </div>
                                            </div>




                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">




                                               <div class="form-group">
                                            <label class="col-md-3 control-label"><span class="pull-left">Telefono</span></label>

                                            <div class="col-md-9">
                                            <input type="text" name="nu_telefono" id="nu_telefono" class="form-control input-sm" placeholder="Telefono / Celular">  
                                            </div>

                                               </div>


                                                <div class="form-group">

                                             <label class="col-md-3 control-label"><span class="pull-left">Email</span></label>
                                            <div class="col-md-9">
                                            <input type="text" name="tx_email" id="tx_email" class="form-control input-sm" placeholder="Email">  
                                            </div>

                                               </div>


                                          <div class="form-group">
                        <label class="control-label col-md-3"> <span class="pull-left">Cod Sicm</span> </label>
                        <div class="col-md-9">
                           <input type="text" class="form-control input-sm" id="nu_sicm" name="nu_sicm" placeholder="Código" maxlength="6">
                        </div>
                     </div>

                                           <div class="form-group">
                <label class="col-md-3 control-label">Estado</label>
                <div class="col-md-9">
                <select id="nb_estado_accion" name="nb_estado_accion" class="form-control">
                  <option value="">Sin estado</option>
             <?php foreach($estados->result() as $row){echo "<option value='".$row->nb_estado."'>".$row->nb_estado."</option>";} ?>
                </select>
                </div>
            </div>

                          <div class="form-group">
                <label class="col-md-3 control-label">Municipio</label>
                <div class="col-md-9">
                                            <select id="nb_municipio_accion" name="nb_municipio_accion" class="form-control">
                                              <option value="">Sin municipio</option>
                                         <?php foreach($municipios->result() as $row){echo "<option value='".$row->nb_municipio."'>".$row->nb_municipio."</option>";} ?>
                                            </select>
                </div>
            </div>

                                  <div class="form-group">
                <label class="col-md-3 control-label">Parroquia</label>
                <div class="col-md-9">
                                            <select id="nb_parroquia_accion" name="nb_parroquia_accion" class="form-control">
                                              <option value="">Sin parroquia</option>
                                         <?php foreach($parroquias->result() as $row){echo "<option value='".$row->nb_parroquia."'>".$row->nb_parroquia."</option>";} ?>
                                            </select>
                </div>
            </div>


                                                <div class="form-group">

                                             <label class="col-md-3 control-label"><span class="pull-left">Latitud</span></label>
                                            <div class="col-md-9">
                                            <input type="text" name="tx_latitud" id="tx_latitud" class="form-control input-sm" placeholder="Latitud">  
                                            </div>

                                               </div>


                                                <div class="form-group">

                                             <label class="col-md-3 control-label"><span class="pull-left">Longitud</span></label>
                                            <div class="col-md-9">
                                            <input type="text" name="tx_longitud" id="tx_longitud" class="form-control input-sm" placeholder="Longitud">  
                                            </div>

                                               </div>
                       



                                                </div>
                                                </div>




                                                </div>

                                                </form>


                                   </div>
                                </div>


            </div>
         </div>

                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 visible-md visible-lg">
     



            <!-- END MENU -->
         </div>
      </div>
   </div>
   <!-- END CONTENT BODY -->
</div>


   <!-- /.modal-dialog -->
</div>
                  <div class="modal fade bs-modal-lg" id="ajax_remote" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>







  <script type="text/javascript">






function agregar_partner()
{


    var nu_identificacion = $('#nu_identificacion').val(); 
    var nb_partner = $('#nb_partner').val(); 
    var nb_tipo_empresa = $('#nb_tipo_empresa').val(); 
    var nb_representante = $('#nb_representante').val(); 
    var nu_telefono = $('#nu_telefono').val(); 
   var tx_email = $('#tx_email').val();
   var tx_direccion = $('#tx_direccion').val();
   var nu_sicm = $('#nu_sicm').val();
   var nb_estado = $('#nb_estado_accion').val(); 
   var nb_municipio = $('#nb_municipio_accion').val(); 
   var nb_parroquia = $('#nb_parroquia_accion').val(); 
    var tx_latitud = $('#tx_latitud').val(); 
   var tx_longitud = $('#tx_longitud').val(); 


               if (nu_identificacion == '') {

          notificacion_toas('error','Error','Ingrese el numero de identicacion');
           $('#nu_identificacion').focus();
           return;

    };



        if (nb_partner == '') {

          notificacion_toas('error','Error','Ingrese el nombre');
          $('#nb_partner').focus();
           return;

    };





                               $.ajax({
        method: "POST",
        data: {'nu_identificacion':nu_identificacion,'nb_partner':nb_partner, 'nb_representante':nb_representante, 'nu_telefono':nu_telefono, 'tx_direccion':tx_direccion, 'tx_email':tx_email, 'nu_sicm':nu_sicm, 'nb_tipo_empresa':nb_tipo_empresa, 'nb_estado':nb_estado, 'nb_municipio':nb_municipio, 'nb_parroquia':nb_parroquia, 'tx_latitud':tx_latitud, 'tx_longitud':tx_longitud},
        url: "<?php echo site_url('partner/agregar_partner') ?>",
        beforeSend: function(){  },
                     }).done(function( data ) { 

                      var obj = JSON.parse(data);

                      if (obj.error > 0)

                      {
      

                        notificacion_toas('error','Error',obj.message);
                        return;


                      }else{
      

                    
                  notificacion_toas('success','Bien',obj.message);
  

                   location.reload()   
                    
                

                      }


   
                      }).fail(function(){


                    alert('Fallo');


                      }); 




}




                                   </script>
  