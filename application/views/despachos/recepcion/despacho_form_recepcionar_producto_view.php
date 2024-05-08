                                   <div class="portlet box bg-blue-chambray" id="box_form">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Recibir </div>
                                                                              <div class="tools">
                                            <a href="javascript:;" data-dismiss="modal" aria-hidden="true" class="remove"> </a>
                                        </div>
                                        <div class="actions">
                                        </div>
                                    </div>

                                    <div class="portlet-body">
                            <div class="row"> 

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="" id="notificacion_2" style="display: none;">

                            </div>


                            </div>

                                    </div>



                                     <form class="form-horizontal" role="form">

                                            <div class="form-body">

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Almacen</b></label>

                                                    <div class="col-md-9">

                                            <select class="form-control input-sm" id="co_almacen" name="co_almacen">
                                            <option value="">Seleccione ...</option>
                                            <?php foreach($lista_almacen->result() as $row){echo "<option value='".$row->id."'>".$row->nb_almacen."</option>";} ?>
                                            </select>                  

                                                        <span class="help-inline">Seleccione un almacen</span>
                                                    </div>
                                                </div>

                                             <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Cantidades</b></label>

                                                    <div class="col-md-9">
                                          <input type="text" name="ca_unidades_recibidas" id="ca_unidades_recibidas" class="form-control input-sm input-small" placeholder="Unidades" value="<?php echo $info_articulo->nu_unidades; ?>">  
                                                        <span class="help-inline"> Unidades</span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Observacion</b></label>

                                                    <div class="col-md-9">
                                                    <input type="text" name="txt_observacion" id="txt_observacion" class="form-control input-sm" placeholder="Observaciones">   
                                                        <span class="help-inline"> Observacion</span>
                                                    </div>
                                                </div>


                                            </div>


                                                                                        <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                    <a href="javascript:;" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true"> Cerrar</a>
                                                        <a onclick="recibir_articulo()" class="btn blue-chambray btn-sm">Recibir</a>

                                                    </div>
                                                </div>
                                            </div>
 
                </form>

                                       

                                    </div>


                                        </div>




  <script type="text/javascript">

      function SoloNumero(e)
{
 tecla=(document.all) ? e.keyCode : e.which; 
 if ((tecla>=48 && tecla<=57) || (tecla==8) || (tecla==9) || (tecla==13) || (tecla==241)|| (tecla==0)|| (tecla==209)|| (tecla==8) || (tecla==9) || (tecla==13) || (tecla==32)){  
       return true; 
    } else { return false;} 
}

function recibir_articulo()
{

                var co_documento_detalle = <?php echo $co_documento_detalle; ?>;
                var co_documento = <?php echo $co_documento; ?>;
                var co_almacen = $('#co_almacen').val(); 
               var ca_unidades_recibidas = $('#ca_unidades_recibidas').val(); 
               var txt_observacion = $('#txt_observacion').val(); 
              
          
      if (co_almacen == '') {

          $('#notificacion_2').fadeIn(200);
          $("#notificacion_2").addClass("alert alert-danger");
          $('#notificacion_2').html('Seleccione el almacen');
           return;

    };


    if (ca_unidades_recibidas == '') {

          $('#notificacion_2').fadeIn(200);
          $("#notificacion_2").addClass("alert alert-danger");
          $('#notificacion_2').html('Indique si falta alguna unidad');
           return;

    };
    
        if (ca_unidades_recibidas % 1 != 0){

          $('#notificacion_2').fadeIn(200);
          $("#notificacion_2").addClass("alert alert-danger");
          $('#notificacion_2').html('Ingrese un número entero');
          $('#ca_unidades_recibidas').focus();
            return false;
        }


          if ($('#ca_unidades_recibidas').val() < 0) {
          $('#notificacion_2').fadeIn(200);
          $("#notificacion_2").addClass("alert alert-danger");
          $('#notificacion_2').html('Ingrese cantidad válida');
          $('#ca_unidades_recibidas').focus();
            return false;
        }

                               $.ajax({
        method: "POST",
        data: {'co_almacen':co_almacen, 'ca_unidades_recibidas':ca_unidades_recibidas, 'txt_observacion':txt_observacion, 'co_documento_detalle':co_documento_detalle, 'co_documento':co_documento},
        url: "<?php echo site_url('despachos/recepcionar') ?>",
        beforeSend: function(){  },
                     }).done(function( data ) { 

                      var obj = JSON.parse(data);

                      if (obj.error > 0)

                      {

                        alert(obj.message);
                        return;


                      }else{

                         $('#modal_recepcion').modal('hide');
                   $("#controllers_despachos").load('<?php echo site_url('despachos/listado_despachos_detalle_recepcion') ?>' + '/' + co_documento);


                      }


   
                      }).fail(function(){

                    alert('Fallo');


                      }); 



}





function get_inventario_almacen(co_almacen)
{

                               $.ajax({
        method: "POST",
        data: {'co_almacen':co_almacen},
        url: "<?php echo site_url('documentos/get_inventario_almacen') ?>",
        beforeSend: function(){  },
                     }).done(function( data ) { 

                  $("#get_productos_div").html(data);

   
                      }).fail(function(){

                    alert('Fallo');


                      }); 


} 





                                   </script>

                                   <script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>

