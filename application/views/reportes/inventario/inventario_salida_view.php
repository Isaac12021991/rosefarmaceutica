


<div class="row animated fadeIn">


                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

                                      
              <?php if ($inventario_salida->num_rows() > 0) : ?>

                  <table class="table compact table-hover" id="tabla_2">
                    <thead>
                       <tr>
                       <th width="5%">#</th>
                         <th width="25%">PRODUCTO</th>
                         <th width="5%">UNIDADES</th>
                       </tr>
                    </thead> 
                    <tbody>
                      <?php $con = 0; foreach ($inventario_salida->result() as $row) : $con ++; ?>
                          <tr>
                              <td><?php echo $con; ?> </td>
                              <td><?php echo $row->nb_producto; ?></td>
                              <td><?php echo number_format($row->ca_unidades,0,',','.'); ?> </td>
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



  <script type="text/javascript">

            $('#tabla_2').DataTable( {
        "responsive": true,
                "order": [],
                stateSave: true,
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
    } );




</script>

<script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>