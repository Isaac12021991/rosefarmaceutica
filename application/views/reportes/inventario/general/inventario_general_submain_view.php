              <?php if($co_tipo_salida == -1): ?>

              <?php if ($inventario_general->num_rows() > 0) : ?>

                  <table class="table compact table-hover" id="tabla_1" width="100%">
                    <thead>
                       <tr>
                       <th width="5%">#</th>
                       <th width="20%">ALMACEN</th>
                         <th width="55%">PRODUCTO</th>
                         <th width="20%">CANTIDAD</th>
                       </tr>
                    </thead> 
                    <tbody>
                      <?php $con = 0; foreach ($inventario_general->result() as $row) : $con ++; ?>
                          <tr style="cursor:pointer;">
                              <td><?php echo $con; ?> </td>
                              <td><?php echo $row->nb_almacen; ?></td>
                              <td><?php echo $row->nb_producto; ?></td>
                              <td><?php echo $row->ca_unidades_disponibles; ?> </td>
                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

                                                   <?php else: ?>

                                      <h4>Sin Inventario</h4>
                                      <p></p>


                                    <?php endif; ?>

                                     <?php endif; ?>

                                        <?php if($co_tipo_salida == -2): ?>

                                                  <?php if ($inventario_general_detalle->num_rows() > 0) : ?>

                  <table class="table compact table-hover" id="tabla_1" width="100%">
                    <thead>
                       <tr>
                       <th width="5%">#</th>
                       <th width="20%">ALMACEN</th>
                         <th width="30%">PRODUCTO</th>
                         <th width="15%">LOTE</th>
                         <th width="15%">VENCE</th>
                         <th width="10%">CANTIDAD</th>
                       </tr>
                    </thead> 
                    <tbody>
                      <?php $con = 0; foreach ($inventario_general_detalle->result() as $row) : $con ++; ?>
                          <tr style="cursor:pointer;">
                              <td><?php echo $con; ?> </td>
                              <td><?php echo $row->nb_almacen; ?></td>
                              <td><?php echo $row->nb_producto; ?></td>
                              <td><?php echo $row->nu_lote; ?></td>
                              <td><?php echo $row->ff_vencimiento; ?></td>
                              <td><?php echo $row->ca_unidades; ?> </td>
                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

                                                   <?php else: ?>

                                      <h4>Sin Inventario</h4>
                                      <p></p>


                                    <?php endif; ?>

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