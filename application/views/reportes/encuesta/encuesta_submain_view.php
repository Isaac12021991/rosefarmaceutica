


<div class="row animated fadeIn">


                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">


              <?php if ($reporte_encuesta_usuario->num_rows() > 0) : ?>

                  <table class="table compact table-hover" width="100%">
                    <thead>
                       <tr>
                       <th width="30%">USUARIOS</th>
                       <th width="10%">CONTACTADOS</th>
                       <th width="10%">NO CONTACTADOS NUMERO ERRADO</th>
                       <th width="10%">NO CONTACTADOS NO ATENDIO</th>
                       <th width="10%">PENDIENTE POR LLAMAR</th>
                       <th width="10%">TOTAL</th>
                       </tr>
                    </thead> 
                    <tbody>
                      <?php $con = 0; foreach ($reporte_encuesta_usuario->result() as $row) : $con ++; ?>
                          <tr style="cursor:pointer;">

                                <td><b><?php echo $row->first_name.' '.$row->last_name; ?></b></td>
                                 <td><?php echo $row->contactadas; ?> <li class="fa fa-check"></li></td>
                                 <td><?php echo $row->no_contactadas_numero_errado; ?></td>
                                   <td><?php echo $row->no_contactadas_no_atendio; ?></td>
                                     <td><?php echo $row->pendiente_por_llamar; ?></td>
                                     <td><?php echo $row->nu_llamadas; ?></td>
                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

                                                   <?php else: ?>

                                      <h4>Sin Registro</h4>
                                      <p></p>


                                    <?php endif; ?>



                                    <br>

                                                            <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?php echo $reporte_encuesta_general->contactadas ?>"><?php echo $reporte_encuesta_general->contactadas ?></span>
                                        </div>
                                        <div class="desc"> Contactados </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-5 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?php echo $reporte_encuesta_general->no_contactadas_numero_errado ?>"><?php echo $reporte_encuesta_general->no_contactadas_numero_errado ?></span></div>
                                        <div class="desc"> No Contactados numero errados</div>
                                    </div>
                                </a>
                            </div>



                            <div class="col-lg-2 col-md-2 col-sm-5 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?php echo $reporte_encuesta_general->no_contactadas_no_atendio ?>"><?php echo $reporte_encuesta_general->no_contactadas_no_atendio ?></span>
                                        </div>
                                        <div class="desc"> No Contactados no atendio </div>
                                    </div>
                                </a>
                            </div>

                                                        <div class="col-lg-2 col-md-2 col-sm-5 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup" data-value="<?php echo $reporte_encuesta_general->pendiente_por_llamar ?>"><?php echo $reporte_encuesta_general->pendiente_por_llamar ?></span></div>
                                        <div class="desc"> Pendiente por llamar</div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number"> 
                                            <span data-counter="counterup" data-value="<?php echo $reporte_encuesta_general->nu_llamadas ?>"></span><?php echo $reporte_encuesta_general->nu_llamadas ?> </div>
                                        <div class="desc"> Total Llamadas </div>
                                    </div>
                                </a>
                            </div>
                        </div>


                        <br>
              <?php if ($reporte_encuesta_detalle->num_rows() > 0) : ?>

                  <table class="table compact table-hover" id="tabla_2" width="100%">
                    <thead>
                       <tr>
                       <th width="6%">#</th>
                       <th width="10%">USUARIO</th>
                       <th width="20%">EMPRESA</th>
                       <th width="31%">DESCRIPCION</th>
                       <th width="15%">ESTATUS</th>
                       <th width="9%">FECHA</th>
                       <th width="9%">DURACION</th>
                       </tr>
                    </thead> 
                    <tbody>
                      <?php $con = 0; foreach ($reporte_encuesta_detalle->result() as $row) : $con ++; ?>
                          <tr style="cursor:pointer;">
                              <td><?php echo $con; ?> </td>
                                <td><?php echo $row->first_name; ?></td>
                                 <td><?php echo $row->nb_empresa; ?><br><?php echo $row->nu_rif; ?></td>
                                 <td><?php echo $row->nb_persona_contacto; ?> - <?php echo $row->tx_email; ?> - <?php echo $row->nu_telefono_local; ?> - <?php echo $row->nu_telefono_movil; ?></td>
                                   <td><?php echo $row->nb_estatus; ?></td>
                                   <td><?php 

                                  $fecha = strtotime($row->ff_registro);
                                   echo date("d-m-Y g:i:s a", $fecha)
                                   ?>

                                   </td>
                                   <td> <?php echo conversor_segundos($row->time_duracion_llamada); ?>
                                    
                                   </td>
                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

                                                   <?php else: ?>

                                      <h4>Sin Registro</h4>
                                      <p></p>


                                    <?php endif; ?>

    



  <script type="text/javascript">

            $('#tabla_2').DataTable( {
        "responsive": true,
                "order": [],
                stateSave: true,
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
    } );




</script>