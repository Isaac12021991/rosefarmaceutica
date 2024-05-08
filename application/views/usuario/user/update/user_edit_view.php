                  <link href="<?php echo base_url() ?>css/acordeon/styles_acordeon.css" rel="stylesheet" type="text/css" /> 

                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
           <div class="page-bar">

                            <h4>Usuarios / Editar</h4>
                            <div class="page-toolbar pull-left">
                          
                            <a class="btn blue btn-sm" id="editar_usuario"> Guardar</a>
                            <a class="btn default btn-sm" href="javascript:window.history.back();"> Descartar</a>
                            </div>

                        <div class="page-toolbar pull-right"></div>
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
                                            <span class="caption-helper">editar usuario del sistema</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">


                                     <form class="form-horizontal" role="form">

                                            <div class="form-body">


                                            <div class="row">
                                             <div class="col-lg-6">

                                            <div class="form-group has-success">
                                                    <label class="col-md-3 control-label"><b>Nombre</b></label>

                                                    <div class="col-md-9">

                                                        <input type="text" name="first_name" id="first_name" class="form-control input-sm input-lg" maxlength="50" value="<?php echo $info_usuario->first_name ?>" placeholder="Nombre">
                                                    </div>
                                                </div>



                                                <div class="form-group has-success">
                                                    <label class="col-md-3 control-label"><b>Apellido</b></label>

                                                    <div class="col-md-9">
                                                  <input type="text" name="last_name" id="last_name" maxlength="50" class="form-control input-sm input-lg" placeholder="Apellido" value="<?php echo $info_usuario->last_name ?>">
                                                    </div>
                                                </div>







                                                </div>
                                                <div class="col-lg-6">

                                                                                                <div class="form-group has-success">
                                                    <label class="col-md-3 control-label"><b>Email</b></label>

                                                    <div class="col-md-9">
                                                      <input type="text" name="email" id="email" class="form-control input-sm" placeholder="Email" autofocus="autofocus" value="<?php echo $info_usuario->email ?>" maxlength="50">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>N° de Cedula</b></label>

                                                    <div class="col-md-9">
                                                      <input type="text" name="nu_cedula" id="nu_cedula" class="form-control input-sm input-medium" maxlength="15" placeholder="Cedula" maxlength="8" value="<?php echo $info_usuario->nu_cedula ?>">
                                                    </div>
                                                </div>
                                                </div>


                                                </div>


                                            </div>

 
                                      </form>

                                                                            <div class="tabbable tabbable-tabdrop">
                                            <ul class="nav nav-tabs">

                                                <li class="active">
                                                    <a href="#tab1" data-toggle="tab">Perfiles</a>
                                                </li>
        
                                                                        
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                                                 <?php if($info_perfiles_user->num_rows() > 0):?>
                      
                                        <div class="table-scrollable">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th width="10%"></th>
                                                        <th width="20%"> Perfil </th>
                                                        <th width="70%"> Descripcion </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                 <?php foreach ($info_perfiles_user->result() as $key): ?>
                                                    <tr>
                                                        <td><?php if ($key->activado > 0): ?> <input checked='checked' type="checkbox" class="checkbox_comprobar" name="accion_check[]" id="accion_check" value="<?php echo $key->id; ?>"/>  <?php else: ?> 

                                                        <input type="checkbox" class="checkbox_comprobar" name="accion_check[]" id="accion_check" value="<?php echo $key->id; ?>"/> 
                                                        <?php endif; ?> </td>
                                                        <td> <?php echo $key->nb_perfil; ?> </td>
                                                        <td> <?php echo $key->tx_descripcion; ?> </td>

                                                    </tr>
                                                    <?php endforeach; ?> 
   
                                                </tbody>
                                            </table>
                                        </div>

                                        <?php endif; ?> 
                                                </div>
        
                                            </div>
                                        </div>



                                    </div>


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


 $('#editar_usuario').click(function(){

              var accion_check = $('[name="accion_check[]"]').serializeArray();
              var email = $('#email').val(); 
              var nu_cedula = $('#nu_cedula').val(); 
               var first_name = $('#first_name').val(); 
               var last_name = $('#last_name').val();
               var co_usuario = <?php echo $co_usuario; ?>; 

      if (email == '') {
         notificacion_toas('error','Error','Ingrese el email');
         $('#email').focus();
         return;

    };

          
      if (nu_cedula == '') {

         notificacion_toas('error','Error','Ingrese una identificacion');
         $('#nu_cedula').focus();
         return;

    };

          if (first_name == '') {

         notificacion_toas('error','Error','Ingrese el nombre');
         $('#first_name').focus();
         return;

    };

              if (last_name == '') {

         notificacion_toas('error','Error','Ingrese el apellido');
         $('#last_name').focus();
         return;

    };

                if (nu_cedula % 1 != 0){

         notificacion_toas('error','Error','Ingrese una identificacion valida');
         $('#nu_cedula').focus();
         return;
        }


          if ($('#nu_cedula').val() <= 0) {
         notificacion_toas('error','Error','Ingrese una identificacion valida');
         $('#nu_cedula').focus();
         return;
        }



             $.ajax({
        method: "POST",
      data: {'co_usuario':co_usuario, 'email':email, 'nu_cedula':nu_cedula, 'first_name':first_name, 'last_name':last_name, 'accion_check':accion_check,},
      url: "<?php echo site_url('usuario/editar_usuario_ejecutar') ?>",
        beforeSend: function(){ $('#crear_usuario').html('Creando usuario'); $('#crear_usuario').attr("disabled", true);},
                     }).done(function( data ) { 

                        var obj = JSON.parse(data);

                       if (obj.error == 0) {

                        notificacion_toas('info','Exito',obj.message);

                        $('#crear_usuario').html('Crear usuario');
                        $('#crear_usuario').attr("disabled", false);


                         $(location).attr('href',"<?php echo site_url() ?>usuario/users_index");

                         

                       }else{

                        notificacion_toas('error','Error',obj.message);
                        $('#crear_usuario').html('Crear usuario');
                        $('#crear_usuario').attr("disabled", false);
                         return;

                       }
                                   

                      }).fail(function(){

                         notificacion_toas('error','Error','Error del Servidor, Intente más tarde');
                        $('#crear_usuario').html('Crear usuario');
                        $('#crear_usuario').attr("disabled", false);
                         return;


                      }); 

   });


  </script>