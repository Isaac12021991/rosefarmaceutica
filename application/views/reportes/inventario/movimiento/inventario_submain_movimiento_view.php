

              <?php if ($inventario_detalle->num_rows() > 0) : ?>

                  <table class="table compact table-hover" id="tabla_1" width="100%">
                    <thead>
                       <tr>
                       <th width="5%">#</th>
                       <th width="10%">ALMACEN</th>
                       <th width="10%">MOVIMIENTO</th>
                         <th width="30%">PRODUCTO</th>
                         <th width="10%">CANTIDAD</th>
                         <th width="10%">FECHA</th>
                         <th width="10%">OBSERVACION</th>
                       </tr>
                    </thead> 
                    <tbody>
                      <?php $con = 0; foreach ($inventario_detalle->result() as $row) : $con ++; ?>
                          <tr style="cursor:pointer;">
                              <td><?php $con; ?> <?php  if($row->in_suma == 1):?> <li class="fa fa-plus"></li><?php else: ?> <li class="fa fa-minus"></li> <?php endif; ?> </td>
                              <td><?php echo $row->nb_almacen; ?></td>
                              <td><?php echo $row->nb_movimiento; ?></td>
                              <td><?php echo $row->nb_producto; ?></td>
                              <td><?php echo $row->ca_unidades; ?> </td>
                              <td><?php echo $row->ff_movimiento; ?> </td> 
                              <td><?php echo $row->tx_observacion; ?> </td>
                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

                                                   <?php else: ?>

                                      <h4>Sin Inventario</h4>
                                      <p></p>


                                    <?php endif; ?>


  <script type="text/javascript">

            $('#tabla_1').DataTable( {
        "responsive": true,
                "order": [],
                stateSave: true,
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
    } );



function ver_detalle_inventario(nb_producto)


{

  $('#controllers_reportes_2').html('<div class="loader_panel_inside"> <div class="ball"></div><h6 align="center"><B>CARGANDO DETALLE DE INVENTARIO... ESPERE POR FAVOR</b></h6></div><br> <h3 align="center"><b>DROGUERIA SOFIMED C.A.</b></h3>');

                                 $.ajax({
        method: "POST",
        data: {'nb_producto':nb_producto},
        url: "<?php echo site_url('reportes/listado_inventario_detalle') ?>",
        beforeSend: function(){  },
                     }).done(function( data ) { 

                  $("#controllers_reportes_2").html(data);

   
                      }).fail(function(){

                    alert('Fallo');


                      }); 

  
}


</script>