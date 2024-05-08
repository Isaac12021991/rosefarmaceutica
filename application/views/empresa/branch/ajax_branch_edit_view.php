                                   <div class="portlet box bg-blue-chambray" id="box_form">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Editar Sucursal </div>
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
                                                    <label class="col-md-3 control-label"><b>Cod SCIM</b></label>

                                                    <div class="col-md-9">
                                                       <?php echo form_input($cod_sicm);?>
                                                        <span class="help-inline"> Ingrese el código scim de la sucursal</span>
                                                    </div>
                                                </div>

                                                                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Direccion</b></label>

                                                    <div class="col-md-9">
                                 <?php echo form_input($nb_direccion);?>
                                                        <span class="help-inline"> Especifique le direccion de la sucursal</span>
                                                    </div>
                                                </div>

    
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Telefono</b></label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon">
                                                            <i class="fa fa-phone"></i>
                                          <?php echo form_input($nu_telefono_local);?>
                 <span class="help-inline"> Ingrese el numero de telefono de la sucursal. </span>
                </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Estado</b></label>
                                                    <div class="col-md-9">
 <?php echo form_dropdown('co_estados', $estados, $co_estados,'class="form-control input-sm input-medium input-inline" onchange="get_municipio(this.value)" id="co_estados"');?>
 
                    <span class="help-inline"> Seleccione el estado. </span>
                    </div>
                                                </div>

                                                                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Municipio</b></label>
                                                    <div class="col-md-9">
                                      <div id="div_municipio"><?php echo form_dropdown('co_municipios', $municipios, $co_municipios,'class="form-control input-sm input-medium input-inline" onchange="get_parroquias(this.value)"'); ?></div>
                    <span class="help-inline"> Seleccione el municipio. </span>
                    </div>
                                                </div>

                                                                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Parroquia</b></label>
                                                    <div class="col-md-9">
<div id="div_parroquia"><?php echo form_dropdown('co_parroquias', $parroquias, $co_parroquias,'class="form-control input-sm input-medium input-inline" id="co_parroquias"'); ?></div>
                    <span class="help-inline"> Seleccione la parroquia. </span>
                    </div>
                                                </div>
           
                                            </div>


                                                                                        <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                    <a href="javascript:;" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true"> Cancelar</a>
                                                        <a id="actualizar_branch" class="btn blue-chambray btn-sm">Actualizar sucursal</a>

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


 $('#actualizar_branch').click(function(){


      var cod_sicm = $('#cod_sicm').val();
     var co_sucursal = <?php echo $co_sucursal; ?>;
       var nb_direccion = $('#nb_direccion').val();
        var nu_telefono_local = $('#nu_telefono_local').val();
          var co_parroquias = $('#co_parroquias').val();

          
      if (cod_sicm == '') {

          $('#notificacion_2').fadeIn(200);
          $("#notificacion_2").addClass("alert alert-danger");
          $('#notificacion_2').html('Ingrese el código sicm');
           return;

    };

              if (cod_sicm <= 0) {

          $('#notificacion_2').fadeIn(200);
          $("#notificacion_2").addClass("alert alert-danger");
          $('#notificacion_2').html('Ingrese el código sicm válido');
           return;

    };

          if (nb_direccion == '') {

          $('#notificacion_2').fadeIn(200);
          $("#notificacion_2").addClass("alert alert-danger");
          $('#notificacion_2').html('Ingrese la direccion de la sucursal');
           return;

    };

              if (nu_telefono_local == '') {

          $('#notificacion_2').fadeIn(200);
          $("#notificacion_2").addClass("alert alert-danger");
          $('#notificacion_2').html('Ingrese un numero de telefono');
           return;

    };

                  if (co_parroquias == '') {

          $('#notificacion_2').fadeIn(200);
          $("#notificacion_2").addClass("alert alert-danger");
          $('#notificacion_2').html('Seleccione la parroquia');
           return;

    };


             $.ajax({
        method: "POST",
        data: {'co_sucursal':co_sucursal, 'cod_sicm':cod_sicm, 'nb_direccion':nb_direccion, 'nu_telefono_local':nu_telefono_local, 'co_parroquias':co_parroquias},
        url: "<?php echo site_url('empresa/update_branch') ?>",
        beforeSend: function(){ $('#guardar_branch').html('Creando sucursal'); $('#guardar_branch').attr("disabled", true);},
                     }).done(function( data ) { 

                        var obj = JSON.parse(data);

                       if (obj.error == 0) {
                         $('#notificacion_2').fadeIn(200); $("#notificacion_2").removeClass("alert alert-danger"); $("#notificacion_2").addClass("alert alert-success"); $('#notificacion_2').html(obj.message);
                        $('#guardar_branch').html('Crear sucursal');
                        $('#guardar_branch').attr("disabled", false);
                         $('#ajax_remote').modal('hide');
                         location.reload();


                         

                       }else{
                         $('#notificacion_2').fadeIn(200); $("#notificacion_2").addClass("alert alert-danger"); $('#notificacion_2').html(obj.message);
                        $('#guardar_branch').html('Crear sucursal');
                        $('#guardar_branch').attr("disabled", false);
                         return;

                       }
                                   

                      }).fail(function(){

                        $('#notificacion_2').fadeIn(200); $("#notificacion_2").addClass("alert alert-danger"); $('#notificacion_2').html('Error del Servidor, Intente más tarde');
                        $('#guardar_branch').html('Agregar');
                        $('#guardar_branch').attr("disabled", false);
                         return;


                      }); 

   });



  function get_municipio(id)

{

        $.ajax(
        {
        type: "POST",
        url: "<?php echo site_url('empresa/municipios') ?>",
        data: { 'id_estado' : id
        },
        cache: false,

        success: function(data)
        {
        $('#div_municipio').html(data);


        }
        });


}

    function get_parroquias(id)

{

        $.ajax(
        {
        type: "POST",
        url: "<?php echo site_url('empresa/parroquias') ?>",
        data: { 'id_municipios' : id
        },
        cache: false,

        success: function(data)
        {
        $('#div_parroquia').html(data);


        }
        });


}


                                   </script>

                                   <script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>

