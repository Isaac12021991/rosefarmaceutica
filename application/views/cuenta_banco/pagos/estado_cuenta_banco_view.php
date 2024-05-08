                  <link href="<?php echo base_url() ?>css/acordeon/styles_acordeon.css" rel="stylesheet" type="text/css" /> 

                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">

                  <div class="page-bar">

                              <h4>Cuentas Bancarias / <?php echo $info_cuenta_banco->nb_diario; ?> / Estado de cuenta </h4>
                              <div class="page-toolbar pull-left">

                          
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

                                     <?php $ca_saldo_mostrar = 0; if ($lista_movimiento_banco->num_rows() > 0) : ?>

                                     <?php foreach ($lista_movimiento_banco->result() as $row) : ?>

                                      <?php ; if ($row->tx_movimiento_pago == 'entrada'): $ca_saldo_mostrar += $row->ca_pago; endif; ?>
                                       <?php if ($row->tx_movimiento_pago == 'salida'): $ca_saldo_mostrar -= $row->ca_pago; endif; ?>

                                        <?php endforeach; ?>  

                                     <?php endif; ?>

                                <div class="portlet light">
                                    <div class="portlet-body">
                                      <h4 class="font-blue"><?php echo $info_cuenta_banco->nb_diario; ?> - <?php echo $info_cuenta_banco->tx_tipo_diario; ?> - <?php echo $info_cuenta_banco->nb_moneda; ?></h4>
                                      <h4><b>Saldo: <?php echo number_format($ca_saldo_mostrar,$info_cuenta_banco->nu_redondeo,',','.'); ?></b></h4>

                                        <?php if ($lista_movimiento_banco->num_rows() > 0) : ?>
            <table class="table table-striped table-hover dt-responsive table-condensed" width="100%">
               <thead>
                  <tr>
                    <th width="15%">Fecha</th>
                    <th width="15%">Operacion</th>
                     <th width="30%">Descripcion</th>
                     <th width="15%">Monto (<?php echo $info_cuenta_banco->nb_acronimo; ?> )</th>
                     <th width="15%">Saldo</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $ca_saldo = 0;  foreach ($lista_movimiento_banco->result() as $row) : ?>
                  <tr>
                    <td><?php echo date_user($row->ff_pago); ?> </td>
                    <td> <?php echo $row->tx_movimiento_pago; ?>  </td>
                     
                     
                     <td> <?php echo $row->nb_forma_pago; ?>  </td>
                     <td> <?php echo number_format($row->ca_pago,'0',',','.'); ?> </td>
                     <td><?php if ($row->tx_movimiento_pago == 'entrada'): $ca_saldo += $row->ca_pago; endif; ?>
                         <?php if ($row->tx_movimiento_pago == 'salida'): $ca_saldo -= $row->ca_pago; endif; ?>
                       <?php echo number_format($ca_saldo,$info_cuenta_banco->nu_redondeo,',','.'); ?>
                      </td>
                  </tr>
                  <?php endforeach; ?>   
               </tbody>
               <tfoot>
                                   <tr>
                    <td> </td>
                    <td>   </td>
                     
                     
                     <td> </td>
                     <td>TOTAL </td>
                     <td><?php echo number_format($ca_saldo,$info_cuenta_banco->nu_redondeo,',','.'); ?></td>
                  </tr>

               </tfoot>
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