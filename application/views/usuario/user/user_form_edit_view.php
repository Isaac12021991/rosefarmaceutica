

<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
   <div class="portlet box bg-blue-chambray" id="box_form">
      <div class="portlet-title">
         <div class="caption">
            Editar Usuario 
         </div>
         <div class="tools">
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
                  <label class="col-md-3 control-label"><b>Email</b></label>
                  <div class="col-md-9">
                     <input type="text" name="email" id="email" class="form-control input-sm input-medium" placeholder="Email" autofocus="autofocus" value="<?php echo $info_usuario->email; ?>">
                     <span class="help-inline">Ingrese el email</span>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3 control-label"><b>N° de Cedula</b></label>
                  <div class="col-md-9">
                     <input type="text" name="nu_cedula" id="nu_cedula" class="form-control input-sm input-medium" placeholder="Cedula" maxlength="8" value="<?php echo $info_usuario->nu_cedula; ?>">
                     <span class="help-inline">Ingrese el número de cedula</span>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3 control-label"><b>Nombre del usuario</b></label>
                  <div class="col-md-9">
                     <input type="text" name="first_name" id="first_name" class="form-control input-sm input-medium" placeholder="Nombre" value="<?php echo $info_usuario->first_name; ?>">
                     <span class="help-inline"> Nombre</span>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-3 control-label"><b>Apellido del usuario</b></label>
                  <div class="col-md-9">
                     <input type="text" name="last_name" id="last_name" class="form-control input-sm input-medium" placeholder="Apellido" value="<?php echo $info_usuario->last_name; ?>">
                     <span class="help-inline"> Apellido</span>
                  </div>
               </div>
            </div>
            <div class="form-actions">
               <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                     <a href="javascript:;" class="btn btn-default btn-sm" onclick="volver()"> Cancelar</a>
                     <a id="editar_usuario" class="btn blue-chambray btn-sm">Actualizar Usuario</a>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
   <div class="portlet box bg-blue-chambray" id="box_form">
      <div class="portlet-title">
         <div class="caption">
            Permisos 
         </div>
         <div class="tools">
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
                  <label class="col-md-3 control-label"><b>Permiso</b></label>
                  <div class="col-md-9">
                     <div class="input-group">
                        <select class="form-control" id="co_privilegio" name="co_privilegio">
                           <option value="">Seleccione ...</option>
                           <?php foreach($lista_privilegio->result() as $row){echo "<option value='".$row->id."'>".$row->nb_privilegio."</option>";} ?>
                        </select>
                        <span class="input-group-btn">
                        <a class="btn blue" id="agregar_permiso"> + </a>
                        </span>
                     </div>
                     <span class="help-inline">Selccione permiso</span>
                  </div>
               </div>
            </div>
            <?php if ($lista_privilegio_usuario->num_rows() > 0) : ?>
            <table class="table table-striped table-hover dt-responsive compact" id="tabla_1">
               <thead>
                  <tr>
                     <th width="80%">Permiso</th>
                     <th width="20%"></th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($lista_privilegio_usuario->result() as $row) : ?>
                  <tr>
                     <td align=center><?php echo $row->nb_privilegio; ?> </td>
                     <td>
                        <a id="eliminar_privilegio" onclick="eliminar_privilegio(<?php echo $row->id; ?>)">
                           <li class="fa fa-trash"> </li>
                        </a>
                     </td>
                  </tr>
                  <?php endforeach; ?>   
               </tbody>
            </table>
            <?php else: ?>
            <h4>Usuario sin permiso</h4>
            <?php endif; ?>
         </form>
      </div>
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
   
   function volver()
   {
   
   $("#response_controller").load('<?php echo site_url('usuario/users_index') ?>');
   
   }
   
   
   $('#editar_usuario').click(function(){
   
   
           var email = $('#email').val(); 
           var nu_cedula = $('#nu_cedula').val(); 
            var first_name = $('#first_name').val(); 
            var last_name = $('#last_name').val(); 
   
   if (email == '') {
   
       $('#notificacion_2').fadeIn(200);
       $("#notificacion_2").addClass("alert alert-danger");
       $('#notificacion_2').html('Ingrese el email');
        return;
   
   };
   
       
   if (nu_cedula == '') {
   
       $('#notificacion_2').fadeIn(200);
       $("#notificacion_2").addClass("alert alert-danger");
       $('#notificacion_2').html('Ingrese la cedula');
        return;
   
   };
   
       if (first_name == '') {
   
       $('#notificacion_2').fadeIn(200);
       $("#notificacion_2").addClass("alert alert-danger");
       $('#notificacion_2').html('Ingrese el nombre');
        return;
   
   };
   
           if (last_name == '') {
   
       $('#notificacion_2').fadeIn(200);
       $("#notificacion_2").addClass("alert alert-danger");
       $('#notificacion_2').html('Ingrese el apellido');
        return;
   
   };
   
   
   
          $.ajax({
     method: "POST",
   data: {'co_usuario':'<?php echo $info_usuario->id; ?>', 'email':email, 'nu_cedula':nu_cedula, 'first_name':first_name, 'last_name':last_name},
   url: "<?php echo site_url('usuario/editar_usuario_ejecutar') ?>",
     beforeSend: function(){ $('#editar_usuario').html('Creando usuario'); $('#editar_usuario').attr("disabled", true);},
                  }).done(function( data ) { 
   
                     var obj = JSON.parse(data);
   
                    if (obj.error == 0) {
                      $('#notificacion_2').fadeIn(200); $("#notificacion_2").removeClass("alert alert-danger"); $("#notificacion_2").addClass("alert alert-success"); $('#notificacion_2').html(obj.message);
                     $('#editar_usuario').html('Actualizar usuario');
                     $('#editar_usuario').attr("disabled", false);
   
                     $("#response_controller").load('<?php echo site_url('usuario/users_index') ?>');
   
                      
   
                    }else{
                      $('#notificacion_2').fadeIn(200); $("#notificacion_2").addClass("alert alert-danger"); $('#notificacion_2').html(obj.message);
                     $('#editar_usuario').html('Actualizar usuario');
                     $('#editar_usuario').attr("disabled", false);
                      return;
   
                    }
                                
   
                   }).fail(function(){
   
                     $('#notificacion_2').fadeIn(200); $("#notificacion_2").addClass("alert alert-danger"); $('#notificacion_2').html('Error del Servidor, Intente más tarde');
                     $('#editar_usuario').html('Actualizar usuario');
                     $('#editar_usuario').attr("disabled", false);
                      return;
   
   
                   }); 
   
   });
   
   
   
   
   
   $('#agregar_permiso').click(function(){
   
   
     var co_privilegio = $('#co_privilegio').val(); 
   
   
   if (co_privilegio == '') {
   
       $('#notificacion_2').fadeIn(200);
       $("#notificacion_2").addClass("alert alert-danger");
       $('#notificacion_2').html('Seleccione el privilegio');
        return;
   
   };
   
     var co_usuario = <?php echo $co_usuario; ?>;
   
   
          $.ajax({
     method: "POST",
   data: {'co_usuario':'<?php echo $co_usuario; ?>', 'co_privilegio':co_privilegio},
   url: "<?php echo site_url('usuario/agregar_privilegio') ?>",
     beforeSend: function(){ $('#agregar_permiso').html('Espere'); $('#agregar_permiso').attr("disabled", true);},
                  }).done(function( data ) { 
   
                     var obj = JSON.parse(data);
   
                    if (obj.error == 0) {
                      $('#notificacion_2').fadeIn(200); $("#notificacion_2").removeClass("alert alert-danger"); $("#notificacion_2").addClass("alert alert-success"); $('#notificacion_2').html(obj.message);
                     $('#agregar_permiso').html('+');
                     $('#agregar_permiso').attr("disabled", false);
   
                       $("#response_controller").load('<?php echo site_url('usuario/editar_usuario') ?>' + '/' + co_usuario);
   
                      
   
                    }else{
                      $('#notificacion_2').fadeIn(200); $("#notificacion_2").addClass("alert alert-danger"); $('#notificacion_2').html(obj.message);
                     $('#agregar_permiso').html('+');
                     $('#agregar_permiso').attr("disabled", false);
                      return;
   
                    }
                                
   
                   }).fail(function(){
   
                     $('#notificacion_2').fadeIn(200); $("#notificacion_2").addClass("alert alert-danger"); $('#notificacion_2').html('Error del Servidor, Intente más tarde');
                     $('#agregar_permiso').html('+');
                     $('#agregar_permiso').attr("disabled", false);
                      return;
   
   
                   }); 
   
   });
   
   function eliminar_privilegio(co_privilegio)
   {
   
   var co_usuario = <?php echo $co_usuario; ?>;
   
   $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar privilegio',
   content: '<b>¿Estas seguro que deseas eliminar este privilegio?.',
     type: 'blue',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
     si: function () {
   
                                      $.ajax({
     method: "POST",
     data: {'co_privilegio_usuario':co_privilegio},
     url: "<?php echo site_url('usuario/eliminar_privilegio') ?>",
     beforeSend: function(){  },
                  }).done(function( data ) { 
   
                   var obj = JSON.parse(data);
   
                 notificacion_toas('info','Privilegio',obj.message);
   
                  $("#response_controller").load('<?php echo site_url('usuario/editar_usuario') ?>' + '/' + co_usuario);
   
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

