<div class="m-grid m-grid-demo">
<div class="m-grid-row">
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center"><span>ddd</span></div>
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center">Row 1, Column 2</div>
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center">Row 1, Column 3</div>
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center">Row 1, Column 4</div>
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center">Row 1, Column 5</div>
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center">Row 1, Column 6</div>
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center">Row 1, Column 7</div>
                                                <div class="m-grid-col m-grid-col-middle m-grid-col-center">Row 1, Column 8</div>
                                            </div>
 </div
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

                <?php if ($info_detalle !== NULL) : ?>
                  <div class="table-responsive">
                  <table class="table compact table-hover" id="tabla_2" width="100%">
                       <thead>
                       <tr>
                       <th width="10%">Documento</th>
                       <th width="10%">Tipo pago</th>
                        <th width="10%">Cliente</th>
                         
                         <th width="10%">Vendedor</th>
                         <th width="10%">Monto</th>
                         <th width="10%">Monto Fact ($)</th>
                         <th width="10%">Monto Fact ($)</th>
                         <th width="10%">Monto Pagado</th>
                         
                         
                       </tr>
                        </thead> 
                    <tbody>
                      <?php  foreach ($info_detalle as $row) :  ?>
                          <tr style="cursor:pointer;">
                            <td><?php echo $row->nu_documento; ?></td>
                            <td><?php echo $row->tipo_pago; ?></td>
                            <td><?php echo $row->nb_cliente; ?></td>
                            <td><?php echo $row->vendedor; ?></td>
                            <td><?php echo $row->tot_documento; ?></td>
                            <td><?php echo $row->mnt_dolar_fact; ?></td>
                            <td><?php echo $row->mnt_bss_pagado; ?></td>

                               
                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>
<?php endif; ?>
                
               </div>
</table>

          <script type="text/javascript">

            $('#tabla_2').DataTable( {
        "responsive": true,
                "order": [],
                stateSave: true,
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
    } );
   




</script>