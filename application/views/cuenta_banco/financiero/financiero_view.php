                  <link href="<?php echo base_url() ?>css/acordeon/styles_acordeon.css" rel="stylesheet" type="text/css" /> 

                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">

                  <div class="page-bar">

                              <h4>Cuentas Bancarias / Movimientos </h4>
                              <div class="page-toolbar pull-left">

                              <a class="btn blue btn-sm" href="<?php echo site_url("cuenta_banco/crear_cuenta_banco");?>"> Crear</a>
                          
                              </div>

                          <div class="page-toolbar pull-right"></div>
                          </div>

                <h1 class="page-title">    </h1>
                        <!-- BEGIN PAGE HEADER-->
                        <div class="row">

            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 ">


              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a class="" role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Informacion Personal
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                        <div class="panel-body">

                    <table width="100%">
                    <tr>
                    <td width="90%"><a href="<?php echo site_url('perfil/personal')?>"> <span id="ver_usuarios_activos"> Personal  </span> </a></td>
                    <td width="10%"></td>
                    </tr>

                    <tr>
                    <td width="90%"><a href="<?php echo site_url('perfil/email')?>"> <span id="ver_usuarios_activos"> Email  </span> </a></td>
                    <td width="10%"></td>
                    </tr>

                      <tr>
                    <td width="90%"><a href="<?php echo site_url('perfil/password')?>"> <span id="ver_usuarios_activos"> Contraseña  </span> </a></td>
                    <td width="10%"></td>
                    </tr>
                  </table>
                        </div>
                    </div>
                </div>

            </div>
              <?php  if ($this->usuario_library->perfil(array('ADMINISTRADOR'))): ?>
                                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Empresa
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="true" style="">
                        <div class="panel-body">

                    <table width="100%">
                                          <tr>
                    <td width="90%"><a href="<?php echo site_url('bancos/index')?>">Bancos </a></td>
                    <td width="10%"></td>
                    </tr>

                    <tr>
                    <td width="90%"><a href="<?php echo site_url('empresa/index')?>">Empresa </a></td>
                    <td width="10%"></td>
                    </tr>

                          <tr>
                            <td width="90%"><a href='<?php echo site_url("almacen/index");?>'> <span class="items_menu" id="listado_nota_despachos"> Almacen  </span> </a></td>
                            <td width="10%"></td>
                         </tr>


                               <tr>
                            <td width="90%"><a href="<?php echo site_url('cuenta_banco/index')?>"> <span class="items_menu" id="cuentas_bancarias"> Cuentas bancarias  </span> </a></td>
                            <td width="10%"></td>
                         </tr>

                  </table>
                        </div>
                    </div>
                </div>

            </div>

          <?php endif; ?>


                                               <div class="list-group">
                                            <span class="list-group-item active">
                                                <h4 class="list-group-item-heading">Super Usuario</h4>
                                                <p class="list-group-item-text" id="info_adicional"> Modulo administrativo Super Usuario </p>
                                            </span>

                                            </div>




                                        <!-- END MENU -->
                                    </div>




                                   <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 ">

                                <div class="portlet light">
                                    <div class="portlet-body">
                                      <h4 class="font-blue"><?php echo $info_cuenta_banco->nb_diario; ?> - <?php echo $info_cuenta_banco->tx_tipo_diario; ?> - <?php echo $info_cuenta_banco->nb_moneda; ?></h4>

                                        <?php if ($lista_movimiento_banco->num_rows() > 0) : ?>
            <table class="table table-striped table-hover dt-responsive compact" id="tabla_1" width="100%">
               <thead>
                  <tr>
                    <th width="15%">Movimiento</th>
                    <th width="15%">Nro Transferencia / Nota credito  / Deposito</th>
                     <th width="15%">Monto</th>
                     <th width="15%">Fecha</th>
                     <th width="30%">Informacion</th>
                     <th width="15%">Estatus</th>
                     <th width="10%">Acciones</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($lista_movimiento_banco->result() as $row) : ?>
                  <tr <?php if($row->co_estatus == '55'): ?> class="font-blue" <?php endif; ?> <?php if($row->co_estatus == '57'): ?> class="font-red" <?php endif; ?>>
                    <td> <?php echo $row->tx_movimiento_pago; ?>  </td>
                     <td> <?php echo $row->nu_referencia; ?>  </td>
                     <td><?php echo $row->ca_pago; ?> <?php echo $info_cuenta_banco->nb_acronimo; ?> </td>
                     <td><?php echo date_user($row->ff_pago); ?> </td>
                     <td>

                          <?php if ($row->co_orden_compra != '0'): ?>
                             <?php $info_orden_compra = $this->pagos_library->get_orden_compra($row->co_orden_compra); ?>
                              <ul>
                                  <?php if ($info_orden_compra->co_documento == ''): ?>
                                  <li>Orden de compra sin factura</li>
                                    <?php else: ?> 
                                      <?php $info_documento = $this->pagos_library->get_documento($info_orden_compra->co_documento); ?>
                                  <li>Documento: <?php echo $info_documento->nb_documento; ?> N° <?php echo $info_documento->nu_documento; ?></li>
                                  <?php endif; ?>
                                  <li>Contacto: <?php echo $info_orden_compra->nb_empresa; ?></li>
                                  <li>Vendedor: <?php echo $info_orden_compra->first_name; ?> <?php echo $info_orden_compra->last_name; ?></li>
                              </ul>

                          <?php elseif($row->co_documento != '0'): ?>
                           <?php $info_documento = $this->pagos_library->get_documento($row->co_documento); ?>
                              <ul>
                                  <li>Contacto: <?php echo $info_documento->nb_cliente; ?></li>
                                  <li>Documento: <?php echo $info_documento->nb_documento; ?> N° <?php echo $info_documento->nu_documento; ?></li>
                                  <li>Vendedor: <?php echo $info_documento->nombre_vendedor; ?> <?php echo $info_documento->apellido_vendedor; ?></li>
                              </ul>

                          <?php else: ?>
                            <?php $info_contacto = $this->pagos_library->get_contacto($row->co_contacto); ?>
                              <ul>
                                  <li>Contacto: <?php echo $info_contacto->nb_cliente; ?></li>
                                  <li>Identificacion: <?php echo $info_contacto->nu_rif; ?></li>
                              </ul>


                              <span style="font-size:10px">Sin conciliar</span>
                          <?php endif; ?>


                     </td>
                     <td> <?php echo $row->nb_estatus; ?>  </td>
                     <td>

                                 <div class="task-config">
                           <div class="task-config-btn btn-group">
                           
                              <a class="btn btn-sm blue" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <i class="fa fa-ellipsis-h"></i>
                              </a>
                              <ul class="dropdown-menu pull-right">

                                <?php if ($row->co_estatus == '55'): ?>

                                 <li>
                                    <a onclick="confirmar('<?php echo $row->id; ?>')" title="Confirmar"><i class="fa fa-check"></i>Confirmar</a> 
                                 </li>


                                 <li>
                                    <a onclick="rechazar('<?php echo $row->id; ?>')" title="Rechazar"><i class="fa fa-times"></i>Rechazar</a> 
                                 </li>

                               <?php endif; ?>
                                <?php if ($row->co_estatus != '57'): ?>
                                   <?php if ($row->co_orden_compra == '0' and $row->co_documento == '0'): ?>
                                  <li>
                                    <a href='<?php echo site_url("cuenta_banco/conciliar/$row->id");?>'  ><i class="fa fa-money"></i>Conciliar</a>
                                 </li>

                               <?php endif; ?>
                               <?php else: ?>


                                 <li>
                                    <a onclick="eliminar('<?php echo $row->id; ?>')" title="Eliminar"><i class="fa fa-trash"></i>Eliminar</a> 
                                 </li>

                              <?php endif; ?>
                                 

                              </ul>
                           </div>
                        </div>





                     </td>
                  </tr>
                  <?php endforeach; ?>   
               </tbody>
            </table>
            <?php else: ?>
            <h4>Sin datos que mostrar</h4>
            <?php endif; ?>

                                    </div>
                                </div>









                            </div>

                                  
                                </div>


                    </div>
                    <!-- END CONTENT BODY -->
                </div>



                                            <div class="modal fade bs-modal-lg" id="ajax_editar" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                 <div class="modal-content">
                                                    <div class="modal-body">
                                                        <span> &nbsp;&nbsp;Cargando... </span>
                                                    </div>
                                                </div>

                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>



                                    


                                    
<script type="text/javascript">

 $(document).ready(function(){

   $('#tabla_1').DataTable( {
   "responsive": true,
   "order": [],
   "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
   });

      }); // Fin ready


 function confirmar(co_cuenta_banco_pago)
   {
   
   
                   $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Confirmar',
   content: '¿Estas seguro que deseas confirmar este pago?',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                      $.ajax({
   method: "POST",
   data: {'co_cuenta_banco_pago':co_cuenta_banco_pago},
   url: "<?php echo site_url('cuenta_banco/confirma_pago') ?>",
   beforeSend: function(){  },
        }).done(function( data ) { 
   
           var obj = JSON.parse(data);

           location.reload();
   
   
         }).fail(function(){
   
       alert('Fallo');
   
   
         }); 
   
   
   
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   
   
   
   }


    function rechazar(co_cuenta_banco_pago)
   {
   
   
                   $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Rechazar',
   content: '¿Estas seguro que deseas rechazar este pago?',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                      $.ajax({
   method: "POST",
   data: {'co_cuenta_banco_pago':co_cuenta_banco_pago},
   url: "<?php echo site_url('cuenta_banco/rechazar_pago') ?>",
   beforeSend: function(){  },
        }).done(function( data ) { 
   
           var obj = JSON.parse(data);

           location.reload();
   
   
         }).fail(function(){
   
       alert('Fallo');
   
   
         }); 
   
   
   
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   
   
   
   }
   

     function eliminar(co_cuenta_banco_pago)
   {
   
   
                   $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar',
   content: '¿Estas seguro que deseas eliminar este pago?',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                      $.ajax({
   method: "POST",
   data: {'co_cuenta_banco_pago':co_cuenta_banco_pago},
   url: "<?php echo site_url('cuenta_banco/eliminar_pago') ?>",
   beforeSend: function(){  },
        }).done(function( data ) { 
   
           var obj = JSON.parse(data);

           location.reload();
   
   
         }).fail(function(){
   
       alert('Fallo');
   
   
         }); 
   
   
   
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   
   
   
   }
  </script>