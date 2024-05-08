                  <link href="<?php echo base_url() ?>css/acordeon/styles_acordeon.css" rel="stylesheet" type="text/css" /> 

                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <div class="page-bar">

                            <h4>Usuarios / Perfiles </h4>
                            <div class="page-toolbar pull-left">
                        
                            <a class="btn blue btn-sm" id="actualzar_perfil"> Guardar</a>
                            <a class="btn default btn-sm" href="javascript:window.history.back();"> Descartar</a>
                            </div>

                        <div class="page-toolbar pull-right">

                            </div>
                        </div>

        <h1 class="page-title">    </h1>

                        <div class="row">

            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 ">


              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a class="" role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Usuarios
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                        <div class="panel-body">

                    <table width="100%">
                                            <tr>
                    <td width="90%"><a href="<?php echo site_url('usuario/users_index')?>"> <span id="ver_usuarios_activos"> Usuarios  </span> </a></td>
                    <td width="10%"></td>
                    </tr>
                  </table>
                        </div>
                    </div>
                </div>

            </div>

                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Permisos
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="true" style="">
                        <div class="panel-body">

                    <table width="100%">
                    <tr>
                    <td width="90%"><a href="<?php echo site_url('usuario/perfiles')?>"> <span id="ver_perfiles"> Perfiles  </span> </a></td>
                    <td width="10%"></td>
                    </tr>

                  </table>
                        </div>
                    </div>
                </div>

            </div>


                                               <div class="list-group">
                                            <span class="list-group-item active">
                                                <h4 class="list-group-item-heading">Super Usuario</h4>
                                                <p class="list-group-item-text" id="info_adicional"> Modulo administrativo Super Usuario </p>
                                            </span>

                                            </div>



                                        <!-- END MENU -->
                                    </div>




                                   <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 ">



                                                                     <div class="portlet light">
                                <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-speech"></i>
                                            <span class="caption-subject bold uppercase"> Editar </span>
                                            <span class="caption-helper">editar perfil</span>
                                        </div>
                                    </div>
                                      <div class="portlet-body">

                                                                             <div class="row">
                                             
                                             <div class="col-lg-6">


                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Nombre del perfil</label>
                                                    <div class="col-md-9">

                                                <input type="text" id="nb_perfil" name="nb_perfil" placeholder="Nombre" class="form-control input-sm input-lg" value="<?php echo $info_perfil->nb_perfil; ?>">

                                                        </div>
                                                </div>


                                                </div>


                                                 <div class="col-lg-6">

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Descripcion del perfil</label>
                                                    <div class="col-md-9">
                                                    <textarea id="tx_descripcion" name="tx_descripcion" class="form-control" rows="2"> <?php echo $info_perfil->tx_descripcion; ?></textarea>
                                                    </div>
                                                </div>

                                                 </div>

                                                </div>



                          <?php  foreach ($lista_privilegios->result() as $row) : ?>

                                                 <h4><?php echo $row->tx_modulo; ?></h4>

                             <?php $info_privilegio = $this->usuario_library->get_permisos_privilegios_editar($row->tx_modulo, $info_perfil->id); 

                                    if($info_privilegio->num_rows() > 0):?>
                      
                                        <div class="table-scrollable">
                                            <table class="table table-condensed table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="10%"></th>
                                                        <th width="20%"> Permiso </th>
                                                        <th width="70%"> Descripcion </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                 <?php foreach ($info_privilegio->result() as $key): ?>
                                                    <tr>
                                                        <td> <?php if($key->activado > 0): ?>

                                                        <input type="checkbox" class="checkbox_comprobar" checked="checked" name="accion_check[]" id="accion_check" value="<?php echo $key->id; ?>" /> 
                                                            
                                                            <?php else: ?>

                                                            <input type="checkbox" class="checkbox_comprobar" name="accion_check[]" id="accion_check" value="<?php echo $key->id; ?>" /> 

                                                            <?php endif; ?>
                                                        </td>
                                                        <td> <?php echo $key->tx_permiso; ?> </td>
                                                        <td> <?php echo $key->tx_descripcion; ?> </td>

                                                    </tr>
                                                    <?php endforeach; ?> 
   
                                                </tbody>
                                            </table>
                                        </div>

                                        <?php endif; ?> 

                                        <?php endforeach; ?> 



                                      </div>
                                    </div>
                                </div>  
                              
                                   


                            </div>

                                  
                                </div>


                    </div>
                    <!-- END CONTENT BODY -->
                </div>


  <script type="text/javascript">


          $('#actualzar_perfil').click(function(){
        
        var co_perfil = '<?php echo $info_perfil->id; ?>';
        var nb_perfil = $("#nb_perfil").val();
        var tx_descripcion = $("#tx_descripcion").val();


          if (nb_perfil == '') {

          notificacion_toas('error','Error','Ingrese el nombre del perfil');
          $('#nb_perfil').focus();
          return;

          };

          if (tx_descripcion == '') {

          notificacion_toas('error','Error','Ingrese la descripcion del perfil');
          $('#tx_descripcion').focus();
          return;

          };




              if (confirm("Estas seguro que deseas actualizar este perfil?"))

        {    

                        var accion_check = $('[name="accion_check[]"]').serializeArray();
               
                $.ajax({
                       method: "POST",
                       data: {'accion_check':accion_check, 'nb_perfil':nb_perfil, 'tx_descripcion':tx_descripcion, 'co_perfil':co_perfil},
                       url: "<?php echo site_url('usuario/write_perfil')?>"
                     }).done(function( data ) { 

                    notificacion_toas('info','Perfiles','Perfil actualizado');
                    $(location).attr('href',"<?php echo site_url() ?>usuario/perfiles");


                      }); 


        }


        
        });
  </script>