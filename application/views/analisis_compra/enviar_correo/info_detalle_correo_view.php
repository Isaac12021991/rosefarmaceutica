

<div class="portlet box bg-blue-chambray" id="box_form">
   <div class="portlet-title">
      <div class="caption">
         Detalle del envío 
      </div>
      <div class="tools">
         <a href="javascript:;" data-dismiss="modal" aria-hidden="true" class="remove"> </a>
      </div>
      <div class="actions">
      </div>
   </div>
   <div class="portlet-body" id="block_email_lista_precio">

            <?php if ($info_precio_lista_email->num_rows() > 0): ?>
            <table class="compact table table-bordered dt-responsive" id="table_detalle" width="100%" >
               <thead>
                  <tr>
                     <th width="60%">Email</th>
                     <th width="40%">Fecha del envío</th>
                  </tr>
               </thead>
               <tbody>
                  <?php  foreach ($info_precio_lista_email->result() as $row): ?>
                  <tr>
                     <td> <?php echo $row->tx_email; ?></td>
                     <td><?php echo date_user($row->ff_sistema); ?></td>
                  </tr>
                  <?php endforeach; ?>   
               </tbody>
            </table>
            <?php else: ?>
            No hay registro.
            <?php endif; ?>
         
         <div class="form-actions">
            <div class="row">
               <div class="col-md-offset-3 col-md-9">
                  <a href="javascript:;" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true"> Cerrar</a>
               </div>
            </div>
         </div>
     
   </div>
</div>
<script type="text/javascript">
   $('#table_detalle').DataTable( {
   "order": [],
   "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]],
     stateSave: true,
     responsive: true
   } );
   
</script>

