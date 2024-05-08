                  <link href="<?php echo base_url() ?>css/acordeon/styles_acordeon.css" rel="stylesheet" type="text/css" /> 

                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <div class="page-bar">

                            <h4>Usuarios </h4>
                            <div class="page-toolbar pull-left">
                        
                            <a class="btn blue btn-sm" href='<?php echo site_url("usuario/agregar_usuario");?>'> Crear</a>
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
                                    <div class="portlet-body">

                                     <?php if ($user_usuario->num_rows() > 0) : ?>
                  <table class="compact table table-hover dt-responsive" width="100%" id="tabla_1">
                     <thead>
                        <tr>
                           <th width="10%">Id</th>
                           <th width="20%">Nombre y Apellido</th>
                           <th width="30%">Cedula</th>
                           <th width="10%">Email</th>
                           <th width="10%">Estatus</th>
                           <th width="20%">Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                      <?php foreach ($user_usuario->result() as $row) : ?>
                        <tr <?php if ($row->active == '0'): ?>
                           class="alert-danger"
                           <?php endif; ?>>
                           <td><?php echo $row->id; ?> </td>
                           <td><?php echo $row->first_name.' '.$row->last_name; ?> </td>
                           <td><?php echo $row->nu_cedula; ?> </td>
                           <td><?php echo $row->email; ?> </td>
                           <td><?php if ($row->active == '1') { ?>
                              Activado
                              <?php }else{ ?>
                              Desactivado
                              <?php } ?> 
                           </td>
                           <td>
                              <a class="tooltips"
                                 data-placement="bottom" data-original-title="Ver informacion del usuario"  href='<?php echo site_url("usuario/editar_usuario/".$row->id."")?>'>
                                 <li class="fa fa-edit"></li>
                              </a>
                              | <?php if ($row->active == '1'): ?> 
                              <a class="tooltips"
                                 data-placement="bottom" data-original-title="Desactivar este usuario a la entrada de usuario" onclick="quitar_usuario(<?php echo $row->id ?>)">
                                 <li class=" glyphicon glyphicon-off"></li>
                              </a>
                              <?php else: ?>
                              <a class="tooltips"
                                 data-placement="bottom" data-original-title="Activar usuario" onclick="activar_usuario(<?php echo $row->id; ?>)">
                                 <li class="glyphicon glyphicon-off"></li>
                              </a>
                              <?php endif; ?>  
                              </th>
                        </tr>
                        <?php endforeach; ?>
                        
                     </tbody>
                  </table>
                  <?php endif; ?>


                                    </div>
                                </div>








                            </div>

                                  
                                </div>


                    </div>
                    <!-- END CONTENT BODY -->
                </div>

   
                                        <div class="modal fade bs-modal-sm" id="ajax_modal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                 <div class="modal-content">
                                                    <div class="modal-body">
                                                        <span> &nbsp;&nbsp;Cargando... </span>
                                                    </div>
                                                </div>

                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>


                                    
<script type="text/javascript">

 $(document).ready(function(){

   $('#tabla_1').DataTable( {
   "responsive": true,
   "order": [],
   "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
   });

      }); // Fin ready
   
   
   
   
   function activar_usuario(co_usuario)
   
   {
   if (confirm("Estas seguro de activar este usuario al sistema?"))
   
   {    
   
   $.ajax(
   {
   type: "POST",
   url: "<?php echo site_url('usuario/active_user') ?>",
   data: { 'co_usuario' : co_usuario
   },
   cache: false,
   
   success: function(data)
   {
   
   //

   $(location).attr('href',"<?php echo site_url() ?>usuario/users_index");
   
   }
   });
   }
   
   }
   
   
   function quitar_usuario(co_usuario)
   
   {
   if (confirm("Estas seguro de desactivar este usuario del sistema ?"))
   
   {    
   
   $.ajax(
   {
   type: "POST",
   url: "<?php echo site_url('usuario/desactive_user') ?>",
   data: { 'co_usuario' : co_usuario
   },
   cache: false,
   
   success: function(data)
   {


   $(location).attr('href',"<?php echo site_url() ?>usuario/users_index");
   }
   });
   }
   
   }
   
   
</script>
