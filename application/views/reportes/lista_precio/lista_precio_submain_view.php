
                                                           <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?php echo $info_general->nu_bolivares; ?>"><?php echo $info_general->nu_bolivares; ?></span>
                                        </div>
                                        <div class="desc"> Bolivares </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?php echo $info_general->nu_dolares; ?>"><?php echo $info_general->nu_dolares; ?></span></div>
                                        <div class="desc">Dolares </div>
                                    </div>
                                </a>
                            </div>

                        </div>

<br>
<div class="row animated fadeIn">


                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">


              <?php if ($info_lista_precio->num_rows() > 0) : ?>

                  <table class="table compact table-hover" width="100%" id="tabla_2">
                    <thead>
                       <tr>
                       <th width="30%">Nombre de la lista</th>
                       <th width="10%">Codigo</th>
                       <th width="10%">Fecha inicio</th>
                       <th width="10%">Fecha fin</th>
                       <th width="10%">Tasa cambio</th>
                       <th width="10%">Productos</th>
                       <th width="10%">Moneda</th>
                       </tr>
                    </thead> 
                    <tbody>
                      <?php $con = 0; foreach ($info_lista_precio->result() as $row) : $con ++; ?>
                          <tr style="cursor:pointer;">

                                <td><b><?php echo $row->nb_lista; ?></b></td>
                                 <td><a onclick="imprimir_lista('<?php echo $row->id; ?>')"><?php echo $row->codigo; ?></a></td>
                                 <td><?php echo $row->ff_inicio; ?></td>
                                   <td><?php echo $row->ff_fin; ?></td>
                                     <td><?php echo $row->nu_tasa_cambio; ?></td>
                                     <td><?php echo $row->nu_producto; ?></td>
                                     <td><?php echo $row->nb_moneda; ?></td>
                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

                                                   <?php else: ?>

                                      <h4>Sin Registro</h4>
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



       function imprimir_lista(co_lista_precio) 
   
   {
   
   
                                            $.confirm({
       backgroundDismiss: false,
       backgroundDismissAnimation: 'glow',
         theme: 'material', 
       title: 'Lista de Precio',
       content: '<b>¿Imprimir resumen o completo?</b><br>.',
           type: 'blue',
       animation: 'opacity',
       escapeKey: 'cancelar',
       buttons: {
                 cancelar: function () {
   
   
           },
           resumen: function () {
   
            window.open("<?php echo site_url() ?>precios_lista/pdf_controllers"+"/"+co_lista_precio+"/"+'0'+"", "_blank");
   
   
           },
           completo: function () {
   
          window.open("<?php echo site_url() ?>precios_lista/pdf_controllers"+"/"+co_lista_precio+"/"+'1'+"", "_blank");
              
           },
     
       }
   });
   
   }
   


</script>