

                                  <div class="portlet box bg-blue-chambray" id="box_form">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Editar sucursal </div>
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
                                            <label class="col-md-3 control-label"><b>Direccion</b></label>

                                            <div class="col-md-9">

                                      <input type="text" name="nb_direccion" id="nb_direccion" class="form-control input-sm input-medium" placeholder="Direccion" value="<?php echo $sucursales->nb_direccion;  ?>">     

                                            <span class="help-inline">Direccion de la sucursal</span>
                                            </div>
                                            </div>


                                                   <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Telefono local</b></label>

                                                    <div class="col-md-9">
                          <input type="text" name="nu_telefono_local" id="nu_telefono_local" class="form-control input-sm input-small" placeholder="Telefono local" value="<?php echo $sucursales->nu_telefono_local;  ?>">  
                                                                            
                                                        <span class="help-inline">Ingrese el telefono local</span>
                                                    </div>
                                                </div>

                                                                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Telefono movil</b></label>

                                                    <div class="col-md-9">
                                                       <input type="text" name="nu_telefono_movil" id="nu_telefono_movil" class="form-control input-sm input-small" placeholder="Telefono movil" value="<?php echo $sucursales->nu_telefono_movil;  ?>">  
                                                        <span class="help-inline"> Ingrese el telefono movil</span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Cod Sicm</b></label>

                                                    <div class="col-md-9" id="div_precio">
                                                    <input type="text" name="cod_sicm" id="cod_sicm" class="form-control input-sm input-small" placeholder="Cod Sicm" value="<?php echo $sucursales->cod_sicm;  ?>">   
                                                        <span class="help-inline">Cod Sicm</span>
                                                    </div>
                                                </div>


                                            </div>


                                                                                        <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                    <a href="javascript:;" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true"> Cerrar</a>
                                                        <a onclick="actualizar_sucursal()" class="btn blue-chambray btn-sm">Actualizar</a>

                                                    </div>
                                                </div>
                                            </div>
 
                </form>

                                       

                                    </div>


                                        </div>

                                      </div>




  <script type="text/javascript">

    function nuevo_producto_presupuesto()

    {

      $('#div_producto').html('<input type = "text" class="form-control input-sm input-medium" id = "nb_producto" name="nb_producto">');
      $('#ca_precio').val(''); 

    }


function actualizar_sucursal()
{


    var co_sucursal = <?php echo $co_sucursal; ?>;
    var nb_direccion = $('#nb_direccion').val(); 
    var nu_telefono_local = $('#nu_telefono_local').val(); 
    var nu_telefono_movil = $('#nu_telefono_movil').val(); 
    var cod_sicm = $('#cod_sicm').val(); 


        if (nb_direccion == '') {

          $('#notificacion_3').fadeIn(200);
          $("#notificacion_3").addClass("alert alert-danger");
          $('#notificacion_3').html('Ingrese la dirección');
           return;

    };



    if (nu_telefono_local == '') {

          $('#notificacion_3').fadeIn(200);
          $("#notificacion_3").addClass("alert alert-danger");
          $('#notificacion_3').html('Ingrese el telefono local');
           return;

    };



    if (nu_telefono_movil == '') {

          $('#notificacion_3').fadeIn(200);
          $("#notificacion_3").addClass("alert alert-danger");
          $('#notificacion_3').html('Ingrese el telefono movil');
           return;

    };


                    $('#block').block({ 
                message: '<h5>Procesando...</h5>', 
                css: { border: '2px solid #000' },
                overlayCSS: { backgroundColor: '#fff' }
            }); 

    
                               $.ajax({
        method: "POST",
        data: {'co_sucursal':co_sucursal, 'nb_direccion':nb_direccion, 'nu_telefono_local':nu_telefono_local, 'nu_telefono_movil':nu_telefono_movil, 'cod_sicm':cod_sicm},
        url: "<?php echo site_url('empresa/editar_sucursal_ejecutar') ?>",
        beforeSend: function(){  },
                     }).done(function( data ) { 

                      var obj = JSON.parse(data);

                      if (obj.error > 0)

                      {
                         $('#block').unblock(); 

                        notificacion_toas('error','Sucursal',obj.message);
                        return;


                      }else{

                 $('#block').unblock();         

                $("#response_controllers").load('<?php echo site_url('empresa/sucursales') ?>');
                  notificacion_toas('success','Sucursal',obj.message);
                $('#ajax_editar_sucursal').modal('hide');



                      }


   
                      }).fail(function(){

                    $('#block').unblock(); 

                    alert('Fallo');


                      }); 




}





                                   </script>

         <script src="<?php echo base_url() ?>js/jquery.blockUI.js" type="text/javascript"></script>


