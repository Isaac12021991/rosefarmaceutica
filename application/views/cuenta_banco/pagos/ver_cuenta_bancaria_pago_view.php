

<div class="row animated fadeIn">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <div class="portlet box bg-blue-chambray">
         <div class="portlet-title">
            <div class="caption">
               Pagos sin asociar en la cuenta 
            </div>
            <div class="actions">
            </div>
         </div>
         <div class="portlet-body">
         
         <div class="row">
         <div class="col-md-12">

         <table class="table table-hover">
         <tr>
         <td width="30%"><b>Cliente:</b></td>
         <td width="70%"><?php echo $info_orden_avance_financiero->nb_cliente; ?></td>
         </tr>

         <tr>
         <td><b>Referencia / Deposito / Nota credito </b></td>
         <td><?php echo $info_orden_avance_financiero->nb_forma_pago; ?><br> <?php echo $info_orden_avance_financiero->nu_referencia; ?></td>
         </tr>


         <tr>
         <td><b>Monto </b></td>
         <td> <?php echo number_format($info_orden_avance_financiero->ca_pago,2,',','.'); ?></td>
         </tr>


         <tr>
         <td><b>Fecha </b></td>
         <td><?php echo date_user($info_orden_avance_financiero->ff_pago); ?></td>
         </tr>
         </table>

         </div>
         </div>



            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label"><b>N° Referencia</b></label>
                     <input type="text" name="nu_referencia" id="nu_referencia" class="form-control input-sm" placeholder="Referencia">     
                     <span class="help-block">Ingrese el numero de referencia</span>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label class="control-label"><b>Monto</b></label>
                     <input type="text" name="ca_pago" id="ca_pago" class="form-control input-sm input-small" placeholder="Cantidad">     
                     <span class="help-block">Ingrese el monto</span>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label class="control-label"><b>Fecha</b></label>
                     <input type="text" name="ff_pago" id="ff_pago" class="form-control date-picker input-sm input-small" placeholder="Fecha de pago">  
                     <span class="help-inline"> Fecha de pago</span>
                  </div>
               </div>

                              <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label"><b>Observacion</b></label>
                     <input type="text" name="tx_observacion" id="tx_observacion" class="form-control input-sm" placeholder="Observacion">  
                     <span class="help-inline"> Observacion</span>
                  </div>
               </div>
               <!--/span-->
               <div class="col-md-2">
                  <a onclick="agregar_avance()" class="btn blue-chambray btn-sm">Agregar</a>
               </div>
               <!--/span-->
            </div>

            <h4 align="center">Listado de pagos cargados en el <?php echo $informacion_cuenta->nb_banco; ?></h4>
            <br><h5 align="center"><?php echo $informacion_cuenta->tx_nb_titular; ?></h5>
            <div id="controllers_cuenta_banco_modal">
               <?php if ($cuenta_bancaria_pago->num_rows() > 0) : ?>
               <table class="table table-striped table-hover dt-responsive compact" id="tabla_2">
                  <thead>
                     <tr>
                        <th width="10%">Referencia</th>
                        <th width="10%">Monto</th>
                        <th width="12%">Fecha</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($cuenta_bancaria_pago->result() as $row) : ?>
                     <tr style="cursor:pointer;" onclick="asociar_pago(<?php echo $row->id; ?>)">
                        <td align=left><?php echo $row->nu_referencia; ?> </td>
                        <td align=left><?php echo number_format($row->ca_pago,2,',','.'); ?> </td>
                        <td align=left><?php echo date_user($row->ff_pago); ?> </td>
                     </tr>
                     <?php endforeach; ?>   
                  </tbody>
               </table>
               <?php else: ?>
               <h4 align="center">No hay pagos registrados en el banco <?php echo $informacion_cuenta->nb_banco; ?> - <?php echo $informacion_cuenta->tx_nb_titular; ?></h4>
               <?php endif; ?>
            </div>
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
   
   
   
   
   
   function agregar_avance()
   {
   
           var co_cuenta_banco = <?php echo $co_cuenta_banco; ?>;
           var nu_referencia = $('#nu_referencia').val(); 
           var ca_pago = $('#ca_pago').val(); 
          var ff_pago = $('#ff_pago').val();
          var tx_observacion = $('#tx_observacion').val(); 
   
   
   if (nu_referencia == '') {
   
   notificacion_toas('error','Avance financiero','Ingrese el numero de referencia');
      return;
   
   };
   
   
   if (ca_pago == '') {
   
   notificacion_toas('error','Avance financiero','Ingrese la cantidad de pago');
      return;
   };
   
   
   if (ff_pago == '') {
   
      notificacion_toas('error','Avance financiero','Seleccione la fecha de pago');
   
      return;
   
   };
   
   
   
   
     if ($('#ca_pago').val() <= 0) {
      notificacion_toas('error','Avance financiero','Ingrese cantidad válida');
     $('#ca_pago').focus();
       return false;
   }
   
   
                          $.ajax({
   method: "POST",
   data: {'ca_pago':ca_pago, 'ff_pago':ff_pago,'co_cuenta_banco':co_cuenta_banco, 'nu_referencia':nu_referencia, 'tx_observacion':tx_observacion},
   url: "<?php echo site_url('cuenta_banco/agregar_financiero_cuenta_banco') ?>",
   beforeSend: function(){  },
                }).done(function( data ) { 
   
                 var obj = JSON.parse(data);
   
                 if (obj.error > 0)
   
                 {
   
                   notificacion_toas('error','Avance financiero',obj.message);
                   return;
   
   
                 }else{
   
                   
   
       $("#controllers_cuenta_banco_modal").load('<?php echo site_url('cuenta_banco/reload_ver_cuenta_bancaria_pago') ?>' + '/' + co_cuenta_banco);
   
   
                 }
   
                 if(obj.in_verificado == 1)
                 {
   
                   notificacion_toas('success','Avance financiero','Pago verificado con exito');
                   $('#ajax_modal').modal('hide');
                   $("#controllers_cuenta_banco").load('<?php echo site_url('cuenta_banco/listado_pagos') ?>' + '/' + '<?php echo $filtro; ?>');
   
                 }
   
   
   
                 }).fail(function(){
   
               alert('Fallo');
   
   
                 }); 
   
   
   
   }
   
   
   // Asociar pago
   
   
   
   function asociar_pago(co_cuenta_banco_financiero)
   {
   
   var co_orden_compra_avance_financiero = <?php echo $co_orden_compra_avance_financiero; ?>;
   
   $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Asociar pago',
   content: '<b>¿Estas seguro que deseas asociar este pago con este registro?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                          $.ajax({
   method: "POST",
   data: {'co_cuenta_banco_financiero':co_cuenta_banco_financiero, 'co_orden_compra_avance_financiero':co_orden_compra_avance_financiero},
   url: "<?php echo site_url('cuenta_banco/asociar_pago_ejecutar') ?>",
   beforeSend: function(){  },
                }).done(function( data ) { 
   
                 var obj = JSON.parse(data);
   
                 if(obj.error == 0)
                 {
   
                   $('#ajax_modal').modal('hide');
                   $("#controllers_cuenta_banco").load('<?php echo site_url('cuenta_banco/listado_pagos') ?>' + '/' + '<?php echo $filtro; ?>');
   
                 }
   
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
<script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>