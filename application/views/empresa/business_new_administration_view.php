
                            <div class="col-md-12 ">
                                <!-- BEGIN Portlet PORTLET-->
                                <div class="portlet box blue-hoki">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-gift"></i>Nueva empresa</div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="scroller" data-rail-visible="1" data-rail-color="blue" data-handle-color="#a1b2bd">


                                                             <div class="row">


                  <div class="col-md-12">

<div class="row">

             <div class="col-md-6">
                  <div class="form-group">
                    <label>Rif:</label>
                    <?php echo form_input($nu_rif);?>
                  </div><!-- /.form-group -->
                  </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Empresa:</label>
                    <?php echo form_input($nb_empresa);?>
                  </div><!-- /.form-group -->
                  </div>



                  </div>


                  <div class="row">

                   <div class="col-md-4">
                  <div class="form-group">
                    <label>Cod Sicm</label> 
                    <?php echo form_input($cod_sicm);?>
                  </div><!-- /.form-group -->
                  </div>

                                <div class="col-md-4">
                  <div class="form-group">
                    <label>Telefono</label> 
                    <?php echo form_input($nu_telefono);?>
                  </div><!-- /.form-group -->
                  </div>


                                <div class="col-md-4">
                  <div class="form-group">
                    <label>Telefono movil</label> 
                    <?php echo form_input($nu_telefono_movil);?>
                  </div><!-- /.form-group -->
                  </div>
                  </div>


                  <div class="row">

                  <div class="col-md-4">
                  <div class="form-group">
                    <label>Estado:</label> 
                   <?php echo form_dropdown('co_estados', $estados, $co_estados,'class="form-control" onchange="get_municipio(this.value)"');?>

                  </div><!-- /.form-group -->
                  </div>

                                    <div class="col-md-4">
                  <div class="form-group">
                    <label>Municipio:</label> 
               <div id="div_municipio"><select class="form-control"><option>Seleccione Municipio</option></select></div>
                  </div><!-- /.form-group -->
                  </div>

                                    <div class="col-md-4">
                  <div class="form-group">
                    <label>Parroquia:</label> 
               <div id="div_parroquia"><select class="form-control"><option>Seleccione Parroquia</option></select></div>
                  </div><!-- /.form-group -->
                  </div>


  </div>


                 

                  <div class="row">

         <div class="col-md-12">
                  <div class="form-group">
                  <label>Direccion:</label> 
                  <?php echo form_input($tx_direccion);?>
                  </div><!-- /.form-group -->
                  </div>
                  </div>




                  <div class="row">
                    
                      <div class="col-md-12">
                  <div class="form-group">
                   <button class="btn blue btn-block" id="guardar"><strong>Crear empresa</strong></button>
                  </div><!-- /.form-group -->
                  </div>


                  </div>








                                            </div>

                                            </div>
                                    </div>
                                </div>
                                <!-- END Portlet PORTLET-->
                            </div>



  <script type="text/javascript">

            $('#guardar').click(function(){


              var cod_sicm = $('#cod_sicm').val(); 
               var nb_empresa = $('#nb_empresa').val(); 
               var tx_direccion = $('#tx_direccion').val(); 
               var co_parroquias = $('#co_parroquias').val(); 
               var nu_telefono = $('#nu_telefono').val(); 
               var nu_rif = $('#nu_rif').val(); 
               var tx_direccion = $('#tx_direccion').val(); 
               var nu_telefono_movil = $('#nu_telefono_movil').val(); 

                $.ajax({
                       method: "POST",
                       data: {'cod_sicm':cod_sicm, 'nb_empresa':nb_empresa, 'tx_direccion':tx_direccion, 'co_parroquias':co_parroquias, 'nu_telefono':nu_telefono, 'nu_rif':nu_rif, 'nu_telefono_movil':nu_telefono_movil},
                       url: "<?php echo site_url('administration/add_business_administration') ?>"
                     }).done(function( data ) { 



      var obj = JSON.parse(data);

     if (obj.error == 0) {
       alert(obj.message);
       location.reload();

     }else{
       alert(obj.message);
       return;

     }
     
                      

                      }); 

        
        });





    function SoloNumero(e)
{
 tecla=(document.all) ? e.keyCode : e.which; 
 if ((tecla>=48 && tecla<=57) || (tecla==8) || (tecla==9) || (tecla==13) || (tecla==241)|| (tecla==0)|| (tecla==209)|| (tecla==8) || (tecla==9) || (tecla==13) || (tecla==32)){  
       return true; 
    } else { return false;} 
}



$(document).ready(function(){


   $( "#cerrar" ).on( "click", function() {
      $(location).attr('href',"<?php echo site_url() ?>/inicio/index/");   
       $('#anime').addClass('animated fadeOut');
    });



}); // Fin DOM Ready Load

function get_municipio(id)

{

        $.ajax(
        {
        type: "POST",
        url: "<?php echo site_url('administration/municipios') ?>",
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