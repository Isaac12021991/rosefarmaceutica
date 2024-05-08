<div class="row animated fadeIn">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
   <div class="portlet box bg-blue-chambray">
      <div class="portlet-title">
         <div class="caption">
            Resumen de Movimientos de la Cuenta <?php echo $info_cuenta_banco->result()[0]->nu_cuenta; ?>
         </div>
         <div class="actions">
         </div>
      </div>
      <div class="portlet-body">
         <div class="item-body">
            <?php if($info_cuenta_banco->num_rows() > 0): ?>
            <table class="table compact table-hover" id="tabla_1">
               <thead>
                  <tr>
                     <th align="center" width="10%">MONTOS ACREDITADOS </th>
                     <th align="center" width="10%">MONTOS VALIDADOS</th>
                     <th align="center" width="10%">GASTOS ASOCIADOS </th>
                    
                  </tr>
               </thead>
               <tbody>
                  <?php $con = 0; $total = 0; $total_val = 0; $total_gastos = 0; 
                  foreach ($info_cuenta_banco->result() as $row) : $con ++; 
                    if ($row->ca_pago > 0): $total +=$row->ca_pago;
                    else: $total_gastos +=$row->ca_pago; 
                    endif; 
                    $total_val += $row->ca_pago_verificado; ?>
                  <?php endforeach; ?>   
               </tbody>
               <footer>
                  <td align="center"><?php echo number_format($total,2,',','.');  ?></td>
                  <td align="center"><?php echo number_format($total_val,2,',','.');  ?></td>
                  <td align="center"><font color="red"><?php echo number_format($total_gastos*-1,2,',','.');  ?></font></td>
                  
               </footer>
            </table>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                  <a class="btn btn-xs default pull-right" onclick="detalle_estado_cuenta()" title="Detalles de movimientos">Detalles</a>
            </div>
            <?php else: ?>
            <h4>Sin movimientos en la cuenta</h4>
            <p></p>
            <?php endif; ?>
         </div>
      </div>
   </div>
   <div id="detalle_estado_cuenta" ></div>
</div>
<script type="text/javascript">
   
function detalle_estado_cuenta(){

   
   $("#detalle_estado_cuenta").html('<div class="loader_panel_inside"> <div class="ball"></div><h6 align="center"><B>CARGANDO... ESPERE POR FAVOR</b></h6></div> <h3 align="center"><img src="<?php echo base_url()?>/img/logo_vertical_sofimed.png" alt="logo" width="20%" height="20%" /></h3>'); 

   $("#detalle_estado_cuenta").html('<div class="portlet-body"> <div class="item-body"> <?php if($info_cuenta_banco->num_rows() > 0): ?> <table class="table compact table-hover" id="tabla_1"> <thead><tr> <th width="2%">#</th> <th width="5%">REFERENCIA</th> <th width="5%">FECHA </th> <th width="5%">ORDEN COMPRA/PRESUPUESTO</> <th width="5%">MONTO</th> </tr> </thead> <tbody> <?php $con = 0; $total = 0; foreach ($info_cuenta_banco->result() as $row) : $con ++; ?> <?php if ($row->ca_pago > 0): ?> <tr> <td><?php echo $con; ?> </td> <td><?php echo $row->nu_referencia; ?> </td> <td><?php echo date_user($row->ff_pago); ?> </td> <td align="center"><?php echo $row->nu_documento; ?>  </td> <td align="right"><?php echo number_format($row->ca_pago,2,',','.'); ?>  </td> </tr> <?php else: ?><tr><td><font color="red"><?php echo $con; ?></font> </td> <td><font color="red"><?php echo $row->nu_referencia; ?></font> </td><td><font color="red"><?php echo date_user($row->ff_pago); ?></font> </td> <td align="center"><font color="red"><?php echo $row->nu_documento; ?></font>  </td> <td align="right"><font color="red"><?php echo number_format($row->ca_pago*-1,2,',','.'); ?></font>  </td> </tr> <?php endif; ?> <?php $total +=$row->ca_pago ?> <?php endforeach; ?></tbody><footer> <td></td> <td></td> <td></td> <td align="right"> Total : </td><td align="right"><?php echo number_format($total,2,',','.');  ?></td> </footer> </table> <?php else: ?> <h4>Sin movimientos en la cuenta</h4> <p></p> <?php endif; ?> </div> </div>');
}



</script>