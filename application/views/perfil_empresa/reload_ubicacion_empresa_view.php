

        <?php if($info_empresa_ubicacion): ?>

                                          <div class="mt-element-list">
                                            <div class="mt-list-head list-news font-white bg-blue">
                                                <div class="list-head-title-container">
                                                    <span class="badge badge-primary pull-right"><?php echo $info_empresa_ubicacion->num_rows(); ?></span>
                                                    <h3 class="list-title">Lista de farmacias</h3>
                                                </div>
                                            </div>
                                            <div class="mt-list-container list-news">
                                                <ul>

                                              <?php foreach ($info_empresa_ubicacion->result() as $row): ?>




                                                    <li class="mt-list-item">
                                                        <div class="list-icon-container">
                                                            <a href="javascript:;">
                                                                <i class="fa fa-angle-right"></i>
                                                            </a>
                                                        </div>
                                                        <div class="list-datetime font-blue"> A <b><?php echo $row->distancia; ?></b> Kilometros de distancia. </div>
                                                        <div class="list-item-content">
                                                            <h3 class="uppercase">
                                                                <a href="javascript:;"><?php echo $row->nb_empresa; ?></a>
                                                            </h3>

                                                          <ul>

                                                            <li><i class="icon-pointer" style="font-size:20px;"></i>: 
                                                          <?php echo $row->tx_direccion; ?> <?php if($row->estado != ''): ?> EN EL ESTADO <?php echo $row->estado; ?>, <?php endif; ?> <?php if($row->municipio != ''): ?> MUNICIPIO <?php echo $row->municipio; ?>    <?php endif; ?>. </li>


                                                            <li><i style="font-size:20px;" class="fa fa-phone"></i>: 
                                                          <a href="tel:<?php echo $row->nu_telefono_local; ?>"><?php echo $row->nu_telefono_local; ?></a>
                                                               </li>

                                                        </ul>

                                                           </div>
                                                    </li>

                                                    <?php endforeach; ?>
                                              


                                                </ul>
                                            </div>
                                        </div>


                                            <?php else: ?>

                                              <h4>Sin informacion</h4>
                                              <p>No hemos encontrado farmacias cercanas a su posicion.</p>

                                              <ul>
                                                <li>Recuerde permitir la ubicacion de su posicion en su dispositivo.</li>
                                              </ul>

                                          <?php endif; ?>

