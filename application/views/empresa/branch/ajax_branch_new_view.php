                                                                                                 <div class="col-md-12">

            
                  <div class="form-group">
                    <label>Cod SCIM</label>
                   <input type="text" class="form-control input-sm" name="cod_sicm" id="cod_sicm" placeholder="Cod SICM">
                  </div><!-- /.form-group -->
                  </div>


                                                 <div class="col-md-12">

            
                  <div class="form-group">
                    <label>Direccion</label>
                   <input type="text" class="form-control input-sm" name="nb_direccion" id="nb_direccion" placeholder="Direccion">
                  </div><!-- /.form-group -->
                  </div>

                                      <div class="col-md-12">
                  <div class="form-group">
                    <label>Telefono:</label>
                   <input type="text" class="form-control input-sm" name="nu_telefono_local" onKeyPress="return(SoloNumero(event));" id="nu_telefono_local" placeholder="Telefono">
                  </div><!-- /.form-group -->
                  </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Estado:</label>
                   <?php echo form_dropdown('co_estados', $estados, $co_estados,'class="form-control input-sm" onchange="get_municipio(this.value)"');?>
                  </div><!-- /.form-group -->
                  </div>

              <div class="col-md-12">
                  <div class="form-group">
                    <label>Municipio</label> 
                   <div id="div_municipio"><select class="form-control input-sm"><option>Seleccione Municipio</option></select></div>
                  </div><!-- /.form-group -->
                  </div>

                                <div class="col-md-12">
                  <div class="form-group">
                    <label>Parroquia</label> 
                   
                    <div id="div_parroquia"><select class="form-control input-sm"><option>Seleccione Parroquia</option></select></div>
                  </div><!-- /.form-group -->
                  </div>


                                                  <div class="col-md-12">

                    <button class="btn blue btn-block" id="guardar_branch_dos"><strong>Crear sucursal</strong></button>
                  </div>

                 <script type="text/javascript">
    $('#guardar_branch_dos').click(function(){


       var cod_sicm = $('#cod_sicm').val();
     var co_empresa = <?php echo $co_empresa; ?>;
       var nb_direccion = $('#nb_direccion').val();
        var nu_telefono_local = $('#nu_telefono_local').val();
          var co_parroquias = $('#co_parroquias').val();

          if (cod_sicm == '') {
            alert('Ingrese el código SCIM');
              return;
          }


          if (nb_direccion == '') {
            alert('Ingrese la direccion de la sucursal');
              return;
          }

                    if (nu_telefono_local == '') {
            alert('Ingrese el numero de telefono');
            return;

          }

                              if (co_parroquias == '') {
            alert('Seleccione la parroquia donde de encuentra');
            return;

          }

                var ruta="<?=site_url("administration/add_branch")?>";
                $.ajax({
                       type: 'POST', url: ruta, data:{ 'nb_direccion':nb_direccion, 'nu_telefono_local':nu_telefono_local, 'co_parroquias':co_parroquias, 'co_empresa':co_empresa },
                       success: function(datos){  

                        $('#response').html(datos);
                        $('#nb_direccion').val('');
                        $('#cod_sicm').val('');
                        $('#nu_telefono_local').val('');
                        $('#co_parroquias').val('');
                        $('#co_municipios').val('');
                        $('#co_estados').val('');
      
                       }
                 })
        
        });

    </script>