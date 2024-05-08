                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">
                                                           <a href="javascript:window.history.back();"class="btn btn-clean btn-xs p-2 mr-2 d-block d-md-none">
                                    <i class="fas fa-arrow-left"></i> 
                                    </a>

                                    <!--begin::Actions-->
                                    <h5 id="controlador" class="text-dark font-weight-bold mt-2 mb-2 mr-5">Compras</h5>
                                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="" class="text-muted">Detalle de compra</a>
                                            </li>
                                        </ul>

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                                     <?php $info_lista_pagos = $this->pagos_library->get_pagos_registrados($info_orden_compra->id); ?>

                                     <?php $info_cuentas_bancarias = $this->empresa_library->get_info_cuentas_bancarias($info_orden_compra->co_partner_vendedor); ?>

                                     <?php  if($info_cuentas_bancarias): ?>

                                     <?php if($info_orden_compra->nb_estatus == 'Confirmado por el vendedor' or $info_orden_compra->nb_estatus == 'Confirmado por el comprador'): ?>
                                    <a onclick="abrir_modal()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Marcar como pagado</a>
                                    <?php endif; ?>

                                     <?php endif; ?>
                  

                                     <?php if($info_orden_compra->nb_estatus == 'En espera por aprobacion'): ?>

                                        <a onclick="aprobar_orden_compra()" class="btn btn-light-success font-weight-bolder btn-sm mr-2">Aprobar</a>
                                          <a onclick="rechazar_orden_compra()" class="btn btn-light-danger font-weight-bolder btn-sm mr-2">Rechazar</a>

                                    <?php endif; ?>
                  
        
                                    <!--end::Actions-->
                                    <!--begin::Dropdown-->
                                            <!--end::Dropdown-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                        </div>
                        <!--end::Subheader-->
                        <!--begin::Entry-->
                        <div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class="container">
                                <div class="row">

                                <div class="col-lg-1">
                                    
                                    
                                </div>

                                <div class="col-lg-10 pl-0 pr-0">

                                    <div class="card card-custom gutter-b" id="div_imprimir">
                                            <div class="card-body p-0">
                                                <!-- begin: Invoice-->
                                                <!-- begin: Invoice header-->
                                                <div class="row justify-content-center py-4 px-0 py-md-20 px-md-0">
                                                    <div class="col-md-10">
                                                        <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row ">
                                                            <h1 class="display-4 font-weight-boldest mb-4 px-4">Orden de Compra</h1>
                                                            <div class="d-flex flex-column align-items-md-end px-4">
                                                                <!--begin::Logo-->
                                                                <?php if($info_orden_compra->nb_estatus == 'Confirmado por el comprador' or $info_orden_compra->nb_estatus == 'Confirmado por el vendedor'): ?>

                                                                <a href="javascript::" class="mb-5">
                                                                    <?php echo $info_orden_compra->nb_empresa_vendedor; ?>
                                                                </a>
                                                                <!--end::Logo-->
                                                                <span class="d-flex flex-column align-items-md-end opacity-90">
                                                                    <span><?php echo $info_orden_compra->nu_rif_vendedor; ?></span>
                                                                    <span><?php echo $info_orden_compra->tx_direccion; ?></span>
                                                                    <span><?php echo $info_orden_compra->nombre_vendedor.' '.$info_orden_compra->nombre_vendedor; ?></span>
                                                                    <span><?php echo $info_orden_compra->email_vendedor; ?></span>
                                                                    <span><?php echo $info_orden_compra->phone_vendedor; ?></span>
                                                                    <span><?php echo 'Sicm: '.$info_orden_compra->cod_sicm_vendedor; ?></span>
                                                                </span>

                                                            <?php else: ?>

                                                                         <a href="javascript::" class="mb-5">
                                                                    <?php echo $info_orden_compra->username_vendedor; ?>
                                                                </a>
                                                                <!--end::Logo-->
                                                                <span class="d-flex flex-column align-items-md-end opacity-70">
                                                                    <span><?php echo $info_orden_compra->nb_tipo_empresa_vendedor; ?></span>
                                                                    <span><?php echo $info_orden_compra->nb_estado_vendedor; ?></span>
                                                                </span>

                                                            <?php endif; ?>


                                                            </div>
                                                        </div>
                                                        <div class="border-bottom w-100"></div>
                                                        <div class="d-flex justify-content-between pt-6 px-4">
                                                            <div class="d-flex flex-column flex-root">
                                                                <span class="font-weight-bolder mb-2">Fecha</span>
                                                                <span class="opacity-70"><?php echo $fecha_elaboracion = date("d-m-Y g:i:s a", $info_orden_compra->ff_fecha_elaboracion); ?> </span>
                                                            </div>
                                                            <div class="d-flex flex-column flex-root">
                                                                <span class="font-weight-bolder mb-2">Orden Nro.</span>
                                                                <span class="opacity-70"><?php echo $info_orden_compra->nu_codigo_orden_compra; ?></span>
                                                            </div>
                                                            <div class="d-flex flex-column flex-root">
                                                                <span class="font-weight-bolder mb-2">Comprador:</span>
                                                                <span class="opacity-70"><?php echo $info_orden_compra->nb_empresa_comprador; ?><br>    
                                                                <?php echo $info_orden_compra->nu_rif; ?><br>
                                                                <?php echo $info_orden_compra->tx_direccion; ?>
                                                                <br><?php echo $info_orden_compra->first_name.' '.$info_orden_compra->last_name; ?><br>
                                                                    <?php echo $info_orden_compra->tx_email; ?><br>
                                                                    <?php echo $info_orden_compra->phone; ?><br>
                                                                     <span><?php echo 'Sicm: '.$info_orden_compra->cod_sicm_comprador; ?></span>
                                                            </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end: Invoice header-->
                                                <!-- begin: Invoice body-->
                                                <div class="row justify-content-center py-2 px-8 py-md-2 px-md-0">
                                                    <div class="col-md-10">
                                                        <div class="table-responsive">
                                                                         <?php if (isset($detalle_orden_compra)): ?>
                                                    <?php $sum_total = 0; if ($detalle_orden_compra->num_rows() > 0) : ?>
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="pl-0 font-weight-bold text-muted text-uppercase">Producto</th>
                                                                        <th class="text-right font-weight-bold text-muted text-uppercase">Cantidad</th>
                                                                        <th class="text-right font-weight-bold text-muted text-uppercase">Precio Uni</th>
                                                                        <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Monto</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                     <?php $con = 0; foreach ($detalle_orden_compra->result() as $row) : $con ++; ?>
                                                                    <tr class="font-weight-boldest">
                                                                        <td class="border-0 pl-0 pt-2 d-flex align-items-center">
                                                                        <?php echo $row->nb_producto; ?><br> <?php echo $row->tx_descripcion; ?><br> <?php if($row->ff_vence != ''): echo 'Vence: '.$row->ff_vence; endif; ?></td>
                                                                        <td class="text-right pt-7 align-middle"><?php echo $row->ca_unidades; ?></td>
                                                                        <td class="text-right pt-7 align-middle"><?php echo number_format($row->ca_precio,2,',','.'); ?> <?php echo $info_orden_compra->nb_acronimo; ?></td>
                                                                        <td class="text-primary pr-0 pt-7 text-right align-middle"><?php $sum_total += $row->ca_subtotal; echo number_format($row->ca_subtotal,2,',','.'); ?></td>
                                                                    </tr>
                                                                    <?php endforeach; ?>  

                                                                </tbody>

                                                            </table>

                                                             <?php endif; ?>
                                                                    <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end: Invoice body-->
                                                <!-- begin: Invoice footer-->
                                                <div class="row justify-content-center bg-gray-100 py-2 px-2 py-md-2 px-md-0 mx-0">
                                                    <div class="col-md-10">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="font-weight-bold text-muted text-uppercase">Estatus</th>
                                                                        <th class="font-weight-bold text-muted text-uppercase">Modo de pago</th>
                                                                        
                                                                        <th class="font-weight-bold text-muted text-uppercase">Forma de entrega </th>
                                                                        <th class="font-weight-bold text-muted text-uppercase text-right"> TOTAL <?php echo $info_orden_compra->nb_acronimo; ?>:</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="font-weight-bolder">
                                                                        <td><?php echo $info_orden_compra->nb_estatus; ?></td>
                                                                        <td><?php echo $info_orden_compra->nb_tipo_pago; ?></td>
                                                                        
                                                                        <td><?php echo $info_orden_compra->nb_forma_entrega; ?></td>
                                                                        <td class="text-primary font-size-h3 font-weight-boldest text-right"><?php echo number_format($sum_total,2,',','.'); ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>





                                                   <?php if($info_cuentas_bancarias): ?>  
                                                      <div class="row justify-content-center bg-lght-100 py-2 px-2 py-md-2 px-md-0 mx-0">

                                                      <span class="font-size-h4 font-weight-boldest mb-2 px-2">Medios de pago</span>  
                                                      </div>                                    
                                                <div class="row justify-content-center bg-light-100 py-2 px-2 py-md-2 px-md-0 mx-0">


                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-sm">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th class="font-weight-bold">Cuenta</th>
                                                                        <th class="font-weight-bold">Titular </th>
                                                                        <th class="font-weight-bold">Tipo</th>
                                                                        <th class="font-weight-bold">Descripcion</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($info_cuentas_bancarias->result() as $row): ?>
                                                                    <tr class="font-weight-bolder">
                                                                        <td><?php echo $row->nb_diario; ?><br><span class="font-size-lg text-primary "><b><?php echo $row->nb_banco; ?></b></span> <br> <span class="font-size-sm"><?php echo $row->nu_cuenta; ?></span><br><span class="font-size-sm"><?php echo $row->tx_email; ?></span></td>
                                                                        <td><?php echo $row->tx_nb_titular; ?><br></span> <span class="font-size-sm"><?php echo $row->tx_id_titular; ?></span></td>
                                                                        
                                                                        <td><?php echo $row->tx_tipo_cuenta; ?></td>
                                                                        <td class="font-size-sm text-center"><?php echo $row->nb_moneda; ?><br></span> <span class="font-size-sm"><?php echo $row->tx_descripcion; ?></td>
                                                                    </tr>

                                                                <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endif; ?>
                                                <!-- end: Invoice footer-->
                                                <!-- begin: Invoice action-->



                                                   <?php if($info_lista_pagos->num_rows() > 0): ?>  
                                                      <div class="row justify-content-center bg-lght-100 py-2 px-2 py-md-2 px-md-0 mx-0">

                                                      <span class="font-size-h4 font-weight-boldest mb-2 px-2">Pagos registrados</span>  
                                                      </div>                                    
                                                <div class="row justify-content-center bg-light-100 py-2 px-2 py-md-2 px-md-0 mx-0">

                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-sm">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th class="font-weight-bold">Cuenta</th>
                                                                        <th class="font-weight-bold">Monto</th>
                                                                        <th class="font-weight-bold">Forma de Pago </th>
                                                                        <th class="font-weight-bold">Fecha</th>
                                                                        <th class="font-weight-bold">Descripcion</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($info_lista_pagos->result() as $row): ?>
                                                                    <tr class="font-weight-bolder">
                                                                        <td><?php echo $row->nb_diario; ?></td>
                                                                        <td><?php echo number_format($row->ca_pago,2,',','.'); ?><br><span class="font-size-lg text-primary "><b><?php echo $row->nb_moneda; ?></b></span> <br></td>

                                                                        <td><?php echo $row->nb_forma_pago; ?><br></span></td>
                                                                        
                                                                        <td><?php echo $row->ff_pago; ?></td>
                                                                        <td class="font-size-sm">
                                                                            <span class="font-size-sm">Comprobante: <?php echo $row->nu_referencia; ?><br>
                                                                            <?php echo $row->tx_descripcion; ?></span> </td>
                                                                    </tr>

                                                                <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endif; ?>

                                                                                              <div class="row pl-10 py-8 px-8 py-md-10 px-md-0">

                                                   <?php if($info_orden_compra->nb_estatus == 'Confirmado por el comprador' or $info_orden_compra->nb_estatus == 'Confirmado por el vendedor'): ?>
                                              
                                                    <div class="col-md-6 pl-lg-20 pr-lg-20 mb-2">



                                     <button type="button" class="btn btn-primary btn-block font-weight-bold" onclick="imprimir_pdf('<?php echo $info_orden_compra->id; ?>');">Imprimir</button>


                                                         <?php if($info_orden_compra->email_vendedor != ''): ?>

                                        <a href="mailto:<?php echo $info_orden_compra->email_vendedor; ?>" class="btn btn-primary btn-block font-weight-bold"><i class="far fa-envelope"></i> Enviar email al vendedor</a>

                                            <?php endif; ?>



 

                                                    </div>

                                                  <div class="col-md-6 pl-lg-20 pr-lg-20">


                                                                   <?php if($info_orden_compra->phone_vendedor != ''): ?>

                                                        <a href="tel:<?php echo $info_orden_compra->phone_vendedor; ?>" class="btn btn-info btn-block font-weight-bold"><i class="fas fa-phone"></i>Llamar al vendedor</a>

                                                            <?php endif; ?>


                                                        <?php if($info_orden_compra->whatsapp_vendedor != ''): ?>

                                                  <a class="btn btn-success btn-block font-weight-bold" target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $info_orden_compra->whatsapp_vendedor; ?>&text=Hola,%20He%20generado%20una%20orden%20de%20compra%20a%20traves%20de%20la%20plataforma%20ROSE%20con%20el%20numero%20<?php echo $info_orden_compra->nu_codigo_orden_compra; ?>%20.%20 https://rosefarmaceutica.com"><i class="fab fa-whatsapp"></i>Enviar WhatsApp al vendedor</a>


            

                                                            <?php endif; ?>




                                                     </div>


                                                 <?php endif;  ?>


                                          
                                                <!-- end: Invoice action-->
                                                <!-- end: Invoice-->
                                            </div>

















                                        </div>

         
                            </div>

                        </div>


                                <div class="col-lg-1"></div>

                            </div>

                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>


    <div class="modal fade"  id="ajax_remote" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">

        </div>
    </div>
</div>


<script type="text/javascript">

    var co_orden_compra = '<?php echo $info_orden_compra->id; ?>';
    var nu_orden_compra = '<?php echo $info_orden_compra->nu_codigo_orden_compra; ?>';
    var monto_total = '<?php echo $sum_total; ?>';

    function imprimir_pdf(co_orden_compra) {

    window.open('<?php echo base_url() ?>biomercado/imprimir_orden_compra_pdf/'+co_orden_compra, '_blank');

}

   $(document).ready(function(){

      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready

         function aprobar_orden_compra()
   {
   

   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Aprobar',
   content: '¿Estas seguro que deseas aprobar esta orden de compra N°'+nu_orden_compra+' ?.',
   type: 'blue',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_orden_compra':co_orden_compra, 'nb_estatus':'Confirmado por el comprador'},
   url: "<?php echo site_url('compra/cambiar_estatus_orden_compra') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
              toastr.info("Exito", obj.message);
   
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


         function rechazar_orden_compra()
   {
   

   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Rechazar',
   content: '¿Estas seguro que deseas rechazar esta orden de compra N°'+nu_orden_compra+' ?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_orden_compra':co_orden_compra, 'nb_estatus':'Rechazado por el comprador'},
   url: "<?php echo site_url('compra/cambiar_estatus_orden_compra') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
              toastr.info("Exito", obj.message);
   
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

                   function abrir_modal() {

                        $('#ajax_remote').modal('show');
                            $.get("<?php echo site_url('compra/marcar_pagado') ?>"+"/"+co_orden_compra+"/"+monto_total,
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }


</script>

   
   

