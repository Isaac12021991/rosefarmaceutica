                  <link href="<?php echo base_url() ?>css/acordeon/styles_acordeon.css" rel="stylesheet" type="text/css" /> 

                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <div class="page-bar">

                            <h4>Usuarios / Perfiles </h4>
                            <div class="page-toolbar pull-left">
                        
                            <a class="btn blue btn-sm" href='<?php echo site_url("usuario/nuevo_perfil");?>'> Crear</a>
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

                                     <table class="compact table table-hover dt-responsive" width="100%" id="tabla_1">
                     <thead>
                        <tr>
                           <th width="30%">Perfil</th>
                           <th width="50%">Descripcion</th>
                           <th width="20%">Acciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php  foreach ($lista_perfiles->result() as $row) : ?>
                        <tr>
                           <td><?php echo $row->nb_perfil; ?>   </td>
                           <td> <?php echo $row->tx_descripcion; ?> </td>

                           <td> 

                                                   <div class="task-config">
                           <div class="task-config-btn btn-group">
                              <a class="btn btn-sm blue" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <i class="fa fa-ellipsis-h"></i>
                              </a>
                              <ul class="dropdown-menu pull-right">
                                 <li>
                                    <a href="<?php echo site_url('usuario/editar_perfil/'.$row->id.'')?>"><i class="fa fa-edit"></i> Editar </a>
                                 </li>
                                 <li>
                                    <a href="#" onclick="eliminar_perfil(<?php echo $row->id; ?>)"><i class="fa fa-trash"></i>Eliminar</a>
                                 </li>
                              </ul>
                           </div>
                        </div>

                           </td>
                        </tr>
                        <?php endforeach; ?> 
                     </tbody>
                  </table>



                                    </div>
                                </div>


                            </div>

                                  
                                </div>


                    </div>
                    <!-- END CONTENT BODY -->
                </div>



                                            <div class="modal fade bs-modal-lg" id="ajax_editar" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
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
   

  function eliminar_perfil(co_perfil)
   {
   
   
                           $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar perfil',
   content: '¿Estas seguro que deseas eliminar este perfil?',
   type: 'blue',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                              $.ajax({
   method: "POST",
   data: {'co_perfil':co_perfil},
   url: "<?php echo site_url('usuario/eliminar_perfil') ?>",
   beforeSend: function(){  },
                }).done(function( data ) { 
   
                   var obj = JSON.parse(data);
   
                     notificacion_toas('info','Informacion',obj.message);

   
   
                 }).fail(function(){
   
               alert('Fallo');
   
   
                 }); 
      
      
   
   
   
   },
   no: function () {
   
   
      
   },
   
   }
   });
   
   
   
   
   }

  </script>