                                    

                                    <?php if (!$invitaciones):?>
                  <div class="alert alert-block alert-info"> 
                  <h4 class="block">Usted no ha realizado invitaciones!</h4>
                        <p> Si desea invitar a una empresa para que se una al grupo Medinet, ingrese  <em>el nombre la empresa </em>,  <em>el rif, </em> <em>el correo del usuario </em> y haga click en <b>Enviar Invitacion</b>.</p>

                        <p>Nota: Asegurese de que el correo electrónico y el Rif de la empresa a invitar sean correctos.</p>
                    </div>





                                      <?php else: ?>

                                                             <?php 
                          foreach ($invitaciones as $row) : ?>

                                        <div class="mt-actions">
                                                    <div class="mt-action">

                                                        <div class="mt-action-body">
                                                            <div class="mt-action-row">
                                                                <div class="mt-action-info ">
                                                                    <div class="mt-action-icon ">
                                                                        <i class="icon-user"></i>
                                                                    </div>
                                                                    <div class="mt-action-details ">
                                                                        <span class="mt-action-author"><?php echo $row->nb_empresa ?></span>
                                                                        <p class="mt-action-desc"><?php echo $row->nu_rif; ?> - <?php echo $row->tx_email; ?></p>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-action-datetime ">
                                                                    <span class="mt-action-date"><?php echo $row->nb_estatus_referencia; ?></span>

                                                                              <?php 

                      switch($row->co_estatus_referencia) {

                      case 1:// En proceso


                       ?>  

                       <span class="mt-action-dot bg-blue"></span>
                        
                      <?php

                      break;

                      case 2: // Verificado



                       ?>  
                  <span class="mt-action-dot bg-green"></span>
                      
                      <?php

                      

                      break;

                      case 3: // Vencido

                       ?>  

                        <span class="mt-action-dot bg-red"></span>

                      
                      <?php

                      break;

                      case 4: // Utilizado por tercero

                       ?>  

                        <span class="mt-action-dot bg-red"></span>

                       <?php

                      break;

                      default:

                      echo 'Sin definir';

                      }
                      ?>

                                                                  
                                                                    <span class="mt=action-time"><?php echo date_user($row->ff_referencia); ?></span>
                                                                </div>
                                                                <div class="mt-action-buttons ">
                                                                    <div class="btn-group">
                                                                       <?php 

                      switch($row->co_estatus_referencia) {

                      case 1:// En proceso

                     $fecha_actual = date('Y-m-d');

                    $dias = (strtotime($fecha_actual)-strtotime($row->ff_referencia))/86400;
                    $dias = abs($dias);
                    $dias = floor($dias);
                    
                    if ($dias > 1) { ?>

              <a href='<?php echo site_url("perfil/edit_reference/$row->id");?>' class="btn btn-outline green btn-sm tooltips" data-placement="bottom" data-target="#ajax_edit" data-toggle="modal" data-original-title="Editar"> Editar </a><?php
                    
                  }

                      break;

                      case 2: // Verificado

                      ; 

                      break;

                      case 3: // Vencido

                       ?>  

                      
                        <a href='<?php echo site_url("perfil/edit_reference/$row->id");?>' class="btn btn-outline green btn-sm tooltips" data-placement="bottom" data-target="#ajax_edit" data-toggle="modal" data-original-title="Editar"> Editar </a><?php

                      break;

                      case 4: // Utilizado por tercero

                       ?>  

                      
                        <a href='<?php echo site_url("perfil/edit_reference/$row->id");?>' class="btn btn-outline green btn-sm tooltips" data-placement="bottom" data-target="#ajax_edit" data-toggle="modal" data-original-title="Editar"> Editar </a><?php

                      break;

                      default:

                      echo 'Sin definir';

                      }
                      ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                         <?php endforeach; ?>   








                                   <?php endif; ?>
