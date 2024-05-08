

<div class="row animated fadeIn">

                                   <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 ">

                                      <div id="controllers_reportes_1">

                                  <div class="portlet box bg-blue-chambray">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Inventario </div>
                                        <div class="actions">

                                        </div>
                                    </div>
                                    <div class="portlet-body">

              <?php if ($listado_inventario_general->num_rows() > 0) : ?>

                  <table class="table compact table-hover" id="tabla_1">
                    <thead>
                       <tr>
                       <th width="5%">#</th>
                         <th width="30%">PRODUCTO</th>
                         <th width="10%">CANTIDAD</th>
                       </tr>
                    </thead> 
                    <tbody>
                      <?php $con = 0; foreach ($listado_inventario_general->result() as $row) : $con ++; ?>
                          <tr style="cursor:pointer;" onclick="ver_detalle_inventario('<?php echo $row->nb_producto; ?>')">
                              <td><?php echo $con; ?> </td>
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

      

                                </div>



                            </div>

                            </div>

</div>

 <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 ">

  <div id="controllers_reportes_2">

  </div>


</div>


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