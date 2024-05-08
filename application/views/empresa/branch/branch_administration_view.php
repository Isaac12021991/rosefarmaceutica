                                   <div class="portlet box bg-blue-chambray" id="box_form">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Nueva Sucursal </div>
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
                <input type="text" class="form-control input-sm input-small input-inline" name="cod_sicm" id="cod_sicm" placeholder="Cod SICM">
                                                        <span class="help-inline"> Ingrese el código scim de la sucursal</span>
                                                    </div>
                                                </div>

                                                                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Direccion</b></label>

                                                    <div class="col-md-9">
                                  <input type="text" class="form-control input-sm input-medium input-inline" name="nb_direccion" id="nb_direccion" placeholder="Direccion">
                                                        <span class="help-inline"> Especifique le direccion de la sucursal</span>
                                                    </div>
                                                </div>

    
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Telefono</b></label>
                                                    <div class="col-md-9">
                                                        <div class="input-icon">
                                                            <i class="fa fa-phone"></i>
                                          <input type="text" class="form-control input-sm input-medium input-inline" name="nu_telefono_local" onKeyPress="return(SoloNumero(event));" id="nu_telefono_local" placeholder="Telefono">
                 <span class="help-inline"> Ingrese el numero de telefono de la sucursal. </span>
                </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Estado</b></label>
                                                    <div class="col-md-9">
 <?php echo form_dropdown('co_estados', $estados, $co_estados,'class="form-control input-sm input-sm input-medium input-inline" onchange="get_municipio(this.value)"');?>
 
                    <span class="help-inline"> Seleccione el estado. </span>
                    </div>
                                                </div>

                                                                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Municipio</b></label>
                                                    <div class="col-md-9">
<div id="div_municipio"><select id="co_municipio" name="co_municipio" class="form-control input-sm input-medium input-inline"><option value="">Seleccione Municipio</option></select></div>
 
                    <span class="help-inline"> Seleccione el municipio. </span>
                    </div>
                                                </div>

                                                                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Parroquia</b></label>
                                                    <div class="col-md-9">
<div id="div_parroquia"><select id="co_parroquias" name="co_parroquias" class="form-control input-sm input-medium input-inline"><option value="">Seleccione Parroquia</option></select></div>
 
                    <span class="help-inline"> Seleccione la parroquia. </span>
                    </div>
                                                </div>
           
                                            </div>


                                                                                        <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                    <a href="javascript:;" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true"> Cancelar</a>
                                                        <a id="guardar_branch" class="btn blue-chambray btn-sm">Crear sucursal</a>

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


 $('#guardar_branch').click(function(){


      var cod_sicm = $('#cod_sicm').val();
     var co_empresa = <?php echo $co_empresa; ?>;
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
        data: {'co_empresa':co_empresa, 'cod_sicm':cod_sicm, 'nb_direccion':nb_direccion, 'nu_telefono_local':nu_telefono_local, 'co_parroquias':co_parroquias},
        url: "<?php echo site_url('empresa/add_branch') ?>",
        beforeSend: function(){ $('#guardar_branch').html('Creando sucursal'); $('#guardar_branch').attr("disabled", true);},
                     }).done(function( data ) { 

                        var obj = JSON.parse(data);

                       if (obj.error == 0) {
                        
                         $('#notificacion_2').fadeIn(200); $("#notificacion_2").removeClass("alert alert-danger"); $("#notificacion_2").addClass("alert alert-success"); $('#notificacion_2').html(obj.message);
                        $('#guardar_branch').html('Crear sucursal');
                        $('#guardar_branch').attr("disabled", false);
                         $('#ajax_remote').modal('hide');
                         notificacion_toas('success','Sucursal Agregada','Nueva sucursal agregada');
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

                                   </script>

                                   <script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>

