

<div class="row animated fadeIn">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <div class="portlet box bg-blue-chambray">
         <div class="portlet-title">
            <div class="caption">
               Despacho de mercancia 
            </div>
            <div class="actions">
            </div>
         </div>
         <div class="portlet-body">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                  <div class="btn-group pull-right" id="button_accion_check">
                     <a class="btn btn-default btn-sm" href="javascript:;" data-toggle="dropdown">
                     <i class="fa fa-info"></i> Accion
                     <i class="fa fa-angle-down"></i>
                     </a>
                     <ul class="dropdown-menu pull-right">
                        <li>
                           <a href="#" id="button_despachar"  title="despachar" onclick="despachar()">Despachar</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <br>
            <?php if ($list_despachos_detalle->num_rows() > 0) : ?>
            <table class="table table-striped table-advance table-hover" id="tabla_2" width="100%">
               <thead>
                  <tr>
                     <th width="5%"><input type="checkbox" name="checkall" id="checkall" checked="checked" /></th>
                     <th width="20%">ALMACEN</th>
                     <th width="30%">PRODUCTO</th>
                     <th width="10%">UNIDADES A DESPACHAR</th>
                     <th width="15%">LOTE</th>
                     <th width="10%">VENCE</th>
                     <th width="10%">ESTATUS</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($list_despachos_detalle->result() as $row) : ?>
                  <tr>
                     <td>
                        <?php if ($row->in_despacho == '0'): ?>
                        <input type="checkbox" class="checkbox_comprobar" checked="checked" name="accion_check[]" id="accion_check" value="<?php echo $row->id; ?>" />
                        <?php endif; ?>
                     </td>
                     <td><?php echo $row->nb_almacen; ?> </td>
                     <td><?php echo $row->nb_producto; ?> </td>
                     <td><?php echo $row->nu_unidades; ?> </td>
                     <td><?php echo $row->nu_lote; ?> </td>
                     <td><?php echo $row->ff_vencimiento; ?> </td>
                     <td>
                        <?php if ($row->in_despachado == '1'): ?>
                        <h6><span class="label label-success"> Despachado </span> </h6>
                        <?php elseif($row->in_no_despachado == '1'): ?>
                        <h6><span class="label label-danger"> Rechazado </span> </h6>
                        <?php else: ?>
                        <h6><span class="label label-info"> Sin despachar </span> </h6>
                        <?php endif; ?>
                     </td>
                  </tr>
                  <?php endforeach; ?>   
               </tbody>
            </table>
            <?php else: ?>
            <h4>Sin registro</h4>
            <p></p>
            <?php endif; ?>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $('#tabla_2').DataTable( {
   "responsive": true,
   "order": [],
   "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
   } );
   
   $("#checkall").change(function () {
   
   
   $("input:checkbox").prop('checked', $(this).prop("checked"));
   
   if($("input:checkbox").is(':checked')) {  
   $('#button_accion_check').fadeIn(200); return;
   } else {  
   $('#button_accion_check').fadeOut(200); return;
   }  
   
   
   });
   
   
   $(".checkbox_comprobar").click(function() { 
   
   if($("input:checkbox").is(':checked')) {  
   $('#button_accion_check').fadeIn(200); return;
   } else {  
   $('#button_accion_check').fadeOut(200); return;
   }  
   }); 
   
   
   
   function despachar() 
   
   {
   
   
                            $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Despacho',
   content: '<b>¿Estas seguro que deseas despachar estos productos seleccionados?</b><br>.',
   type: 'blue',
   animation: 'opacity',
   escapeKey: 'cancelar',
   buttons: {
   si: function () {
   
   var accion_check = $('[name="accion_check[]"]').serializeArray();
   
   $.ajax({
          method: "POST",
          data: {'accion_check':accion_check, 'co_documento':<?php echo $co_documentos; ?>},
          url: "<?php echo site_url('despachos/despachar_masivo')?>"
        }).done(function( data ) { 
   
         var obj = JSON.parse(data);
   
           if (obj.error > 0)
   
         {
   
   
           notificacion_toas('error','Despacho',obj.message);
           return;
   
   
         }else{
   
            $('#ajax_modal').modal('hide');
         notificacion_toas('success','Despacho',obj.message);
        $("#controllers_despachos").load('<?php echo site_url('despachos/listado_despachos') ?>');
   
       }
   
   
         }); 
   
   
   
   },
   cancelar: function () {
   
   
   
   },
   
   }
   });
   
                          }
   
   
   function no_despachar()
   {
   
   
                   $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Despacho',
   content: '<b>¿Estas seguro que deseas rechazar este despacho?</b><br>.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
           var accion_check = $('[name="accion_check[]"]').serializeArray();
   
   $.ajax({
          method: "POST",
          data: {'accion_check':accion_check, 'co_documento':<?php echo $co_documentos; ?>},
          url: "<?php echo site_url('despachos/despachar_rechazar_masivo')?>"
        }).done(function( data ) { 
   
         var obj = JSON.parse(data);
   
           if (obj.error > 0)
   
         {
   
   
           notificacion_toas('error','Despacho',obj.message);
           return;
   
   
         }else{
   
            $('#ajax_modal').modal('hide');
         notificacion_toas('info','Despacho',obj.message);
       $("#controllers_despachos").load('<?php echo site_url('despachos/listado_despachos') ?>');
   
       }
   
   
         }); 
   
   
   
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   }
   
   
   
   
   
   
   
</script>

