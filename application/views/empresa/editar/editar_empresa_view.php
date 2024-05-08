<div class="portlet box bg-blue-chambray" id="box_form">
   <div class="portlet-title">
      <div class="caption">
         Editar empresa 
      </div>
      <div class="tools">
         <a href="javascript:;" data-dismiss="modal" aria-hidden="true" class="remove"> </a>
      </div>
      <div class="actions">
      </div>
   </div>
   <div class="portlet-body" id="block">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="" id="notificacion_3" style="display: none;">
            </div>
         </div>
      </div>
      <form class="form-horizontal" role="form">
         <div class="form-body">
            <div class="form-group">
               <label class="col-md-3 control-label"><b>Nombre de la empresa</b></label>
               <div class="col-md-9">
                  <input type="text" name="nb_empresa" id="nb_empresa" class="form-control input-sm" placeholder="Empresa" value="<?php echo $empresa->nb_empresa; ?>">  
                  <span class="help-inline">Nombre de la empresa</span>
               </div>
            </div>
            <div class="form-group">
               <label class="col-md-3 control-label"><b>RIF</b></label>
               <div class="col-md-9">
                  <input type="text" name="nu_rif" id="nu_rif" class="form-control input-sm input-small" placeholder="RIF" value="<?php echo $empresa->nu_rif; ?>">  
                  <span class="help-inline">Ingrese RIF</span>
               </div>
            </div>
            <div class="form-group">
               <label class="col-md-3 control-label"><b>Representante</b></label>
               <div class="col-md-9">
                  <input type="text" name="nb_representante_legal" id="nb_representante_legal" class="form-control input-sm" placeholder="Cantidad" value="<?php echo $empresa->nb_representante_legal; ?>">  
                  <span class="help-inline"> Representante legal</span>
               </div>
            </div>
         </div>
         <div class="form-actions">
            <div class="row">
               <div class="col-md-offset-3 col-md-9">
                  <a href="javascript:;" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true"> Cerrar</a>
                  <a onclick="actualizar_empresa()" class="btn blue-chambray btn-sm">Actualizar</a>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
<script type="text/javascript">
   function nuevo_producto_presupuesto()
   
   {
   
     $('#div_producto').html('<input type = "text" class="form-control input-sm input-medium" id = "nb_producto" name="nb_producto">');
     $('#ca_precio').val(''); 
   
   }
   
   
   function actualizar_empresa()
   {
   
   
   
   
   var nb_empresa = $('#nb_empresa').val(); 
   var nb_representante_legal = $('#nb_representante_legal').val(); 
   var nu_rif = $('#nu_rif').val(); 
   
   
       if (nb_empresa == '') {
   
         $('#notificacion_3').fadeIn(200);
         $("#notificacion_3").addClass("alert alert-danger");
         $('#notificacion_3').html('Ingrese el nombre de la empresa');
          return;
   
   };
   
   
   
   if (nb_representante_legal == '') {
   
         $('#notificacion_3').fadeIn(200);
         $("#notificacion_3").addClass("alert alert-danger");
         $('#notificacion_3').html('Ingrese el nombre del representante legal');
          return;
   
   };
   
   
   
   if (nu_rif == '') {
   
         $('#notificacion_3').fadeIn(200);
         $("#notificacion_3").addClass("alert alert-danger");
         $('#notificacion_3').html('Ingrese el rif');
          return;
   
   };
   
   
   
                   $('#block').block({ 
               message: '<h5>Procesando...</h5>', 
               css: { border: '2px solid #000' },
               overlayCSS: { backgroundColor: '#fff' }
           }); 
   
   
                              $.ajax({
       method: "POST",
       data: {'nb_empresa':nb_empresa, 'nb_representante_legal':nb_representante_legal, 'nu_rif':nu_rif},
       url: "<?php echo site_url('empresa/editar_empresa_ejecutar') ?>",
       beforeSend: function(){  },
                    }).done(function( data ) { 
   
                     var obj = JSON.parse(data);
   
                     if (obj.error > 0)
   
                     {
                        $('#block').unblock(); 
   
                       notificacion_toas('error','Empresa',obj.message);
   
                       return;
   
   
                     }else{
   
   
                   notificacion_toas('success','Empresa',obj.message);
                   $("#response_controllers").load('<?php echo site_url('empresa/sucursales') ?>');
                   $("#ajax_editar_empresa").modal('hide');
   
                     }
   
   
   
                     }).fail(function(){
   
                   $('#block').unblock(); 
   
                   alert('Fallo');
   
   
                     }); 
   
   
   
   
   }
   
   
   
   
   
   
   
   
                                  
</script>
<script src="<?php echo base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>


