<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />

<?php  

  if ($this->usuario_library->perfil(array('ADMINISTRADOR'))):
                                    
    $correo_predeterminado = '';
  else:  
    $correo_predeterminado = '';
  endif; ?>
  
<div class="portlet box bg-blue-chambray" id="box_form">
  <div class="portlet-title">
    <div class="caption">
      Enviar lista 
    </div>
    <div class="tools">
      <a href="javascript:;" data-dismiss="modal" aria-hidden="true" class="remove"> </a>
    </div>
    <div class="actions">
    </div>
  </div>
  <div class="portlet-body" id="block_email_lista_precio">
    <div class="row"> 
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="" id="notificacion_2" style="display: none;"> </div>
      </div>
    </div>
    <form class="form-horizontal" role="form">
      <div class="form-body">
        <div class="form-group">
          <label class="col-md-3 control-label"><b>Correos</b></label>
          <div class="col-md-9">
            <div id="correos_div">
              <input type="text" name="mail_txt" id="mail_txt" data-role="tagsinput" class="form-control input-sm" placeholder="Email" value="<?php echo $correo_predeterminado; ?>"> 
            </div>
            <span class="help-inline">Correos</span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"><b>Tipo de salida</b></label>
          <div class="col-md-9">
            <select class="form-control input-sm" id="tipo_salida" name="tipo_salida">
              <option value="0">Resumen</option>
              <option value="1">Completo</option>
            </select>
            <span class="help-inline">Seleccione si desea enviar la lista de manera resumida o con la informacion completa</span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"><b>Mostrar Lista</b></label>
          <div class="col-md-9">
            <select class="form-control input-sm" id="adjunto" name="adjunto">
              <option value="0">PDF</option>
              <option value="1">HTML</option>
            </select>
            <span class="help-inline">Seleccione si desea enviar la lista como Archivo PDF o en el cuerpo del mensaje</span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"><b>Observacion</b></label>
          <div class="col-md-9">
            <textarea name="observacion" id="observacion" class="form-control" placeholder="Observacion" value=""></textarea> 
            <span class="help-inline">Ingrese alguna observacion</span>
          </div>
        </div>
      </div>
      <div class="form-actions">
        <div class="row">
          <div class="col-md-offset-3 col-md-9">
            <a href="javascript:;" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true"> Cerrar</a>
                                                          <a onclick="enviar_correo_masivo_lista()" class="btn blue-chambray btn-sm">Enviar lista</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">

  function ver_tipo_empresa() {

      var tipo_empresa = $('[name="tipo_empresa[]"]').serializeArray();


         $.ajax({
        method: "POST",
        data: {'tipo_empresa':tipo_empresa},
        url: "<?php echo site_url('/precios_lista/buscar_tipo_emmpresa') ?>",
        beforeSend: function(){ },
                     }).done(function( data ) { 

                      $('#estados_div').html(data);

                      }).fail(function(){



                      }); 

      // body...
    }

  function ver_correos() {

      var tipo_empresa = $('[name="tipo_empresa[]"]').serializeArray();
      var estado_tipo_empresa = $('[name="estado_tipo_empresa[]"]').serializeArray();


         $.ajax({
        method: "POST",
        data: {'tipo_empresa':tipo_empresa, 'estado_tipo_empresa':estado_tipo_empresa},
        url: "<?php echo site_url('/precios_lista/get_correo_empresas_potenciales') ?>",
        beforeSend: function(){ },
                     }).done(function( data ) { 

                      $('#correos_div').html(data);

                      }).fail(function(){



                      }); 

    }


  function enviar_correo_masivo_lista() {

    var lote_email  = $('#mail_txt').val();
    var observacion = $('#observacion').val();
    var tipo_salida = $('#tipo_salida').val();
    var adjunto     = $('#adjunto').val();
    $('#block_email_lista_precio').block({ 
         message: '<h5>Enviando lista de precio, espere un momento por favor...</h5>', 
             css: { border: '2px solid #000' },
      overlayCSS: { backgroundColor: '#fff' }
    }); 

    var timeout = setTimeout(function(){ 

      $('#block_email_lista_precio').unblock();         
      notificacion_toas('info','Lista de precio','Este proceso esta tardando demasiado, posiblemente se deba a un error de conexion');
      $('#ajax_enviar_mail').modal('hide');

    }, 50000);

    $.ajax({
        method: "POST",
        data: {'lote_email':lote_email, co_precios_lista:'<?php echo $co_precios_lista; ?>', 'observacion':observacion, 'tipo_salida':tipo_salida, 'adjunto':adjunto},
        url: "<?php echo site_url('/precios_lista/enviar_correo_masivo_lista') ?>",
        beforeSend: function(){ },
                     }).done(function( data ) { 

                      clearTimeout(timeout);

                      var obj = JSON.parse(data);

                      if (obj.error > 0){

                        $('#block_email_lista_precio').unblock();

                        notificacion_toas('error','Lista de precio',obj.message);


                      }else{


                        $('#block_email_lista_precio').unblock();         
                        notificacion_toas('success','Lista de precio',obj.message);
                        $('#ajax_enviar_mail').modal('hide');


                      }


                      }).fail(function(){

                  $('#block_email_lista_precio').unblock();         
                  notificacion_toas('error','Lista de precio','Error de conexion');

                      clearTimeout(timeout);


                      }); 
} 

</script>

<script src="<?php echo base_url() ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url() ?>assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>






