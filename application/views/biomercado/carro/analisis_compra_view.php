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
                                                <a href="" class="text-muted">Ordenes de compra</a>
                                            </li>
                                        </ul>


        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                  
        
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

                                                                    <div class="card card-custom">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <span class="card-icon">
                                                <i class="flaticon2-box-1 text-success"></i>
                                            </span>
                                            <h3 class="card-label">Analisis de compra</h3>
                                            <small>Resultado y analisis de cada producto</small>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row my-0">
                                            <!--begin: Pricing-->
                                             <?php if ($resultado_busqueda->num_rows() > 0) : ?>

                                                <?php foreach ($resultado_busqueda->result() as $row): ?>

                                     <div class="col-md-6 col-xxl-3 border-right-0 border-right-md border-bottom border-bottom-xxl-0">
                                                <div class="pt-5 pt-md-5 pb-5 px-5 text-center">
                                                    <span class="font-size-h1 d-block font-weight-boldest text-dark-75 py-2"><?php echo $row->nb_producto; ?></span>
                                                    <h4 class="font-size-h6 d-block font-weight-bold mb-7 text-dark-50">20 CAJA POR 10ML</h4>

                                                    <table class="table table-sm">
                                                        <tr><td class="text-left">Precio:</td> <td><span class="text-primary font-size-h4"><?php echo $row->ca_precio; ?> $ </span></td></tr>
                                                        <tr><td class="text-left">Vence:</td> <td><?php echo $row->ff_vence; ?></td></tr>
                                                        <tr><td class="text-left">Usuario:</td> <td><?php echo $row->username; ?></td></tr>
                                                        <tr><td class="text-left">Ubicacion:</td> <td><?php echo $row->nb_estado; ?></td></tr>
                                                        <tr><td class="text-left">Forma de pago:</td> <td><?php echo $row->nb_tipo_pago; ?></td></tr>
                                                        <tr><td class="text-left">Forma de envío:</td> <td><?php echo $row->nb_forma_envio; ?></td></tr>


                                                    </table>
                                                </div>
                                            </div>

                                        <?php endforeach; ?>
                                        <?php endif; ?>

          
                                            <!--end: Pricing-->
                                        </div>


                                         <div class="row my-0 mt-4">

                                              <?php if ($comparar_precios_solo_partner->num_rows() > 1) : ?>
    <div class="table-responsive">
             <table class="table table-sm" id="table_1" width="100%">
               <thead class="thead-light">
                
                  <tr class="font-size-h4">
                    <th width="20%"></th>
                    <?php foreach ($comparar_precios_solo_partner->result() as $row) : ?>
                     <th class="text-center"><?php echo $row->username; ?></th>
                      <?php endforeach; ?>  
                  </tr>
                 
               </thead>
               <tbody>

                  <tr>
                 
                     <td>Precios: </td>
                     
                     
                    <?php foreach ($comparar_precios_solo_partner->result() as $row) : ?>

                      <?php $info_producto = $this->analisis_compra_library->info_producto_compra_carro($row->username, $pivote); ?>


                    <?php if ($info_producto->num_rows() > 0): 

                        $info_producto_obtenido = $info_producto->row();

                    if($info_producto_obtenido->max_ca_precio == $info_producto_obtenido->ca_precio): ?>
                     <td class="table-danger text-center">
                     <?php elseif($info_producto_obtenido->min_ca_precio == $info_producto_obtenido->ca_precio): ?>
                      <td class="table-success text-center">
                        <?php else: ?>
                        <td class="text-center">
                       <?php endif; ?>


                     <span class="font-size-h2 font-weight-boldest"> <?php echo $info_producto_obtenido->ca_precio; 

                     else: ?> </span>
                      <td>
                      <?php echo 'N/D';

                     endif; ?> 
                   </td>
                      <?php endforeach; ?>  
                  </tr>

               </tbody>
            </table>
        </div>
            <?php else: ?>
            <h4></h4>
            <p></p>
            <?php endif; ?>
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
            <h3 align="center" class="text-dark">Cargando...</h3>

        </div>
    </div>
</div>


<script type="text/javascript">

    function ver_detalle_orden(co_orden_compra) {

     $(location).attr('href',"<?php echo site_url() ?>compra/detalle_orden_compra/"+co_orden_compra); 

}


   $(document).ready(function(){

    
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('<h3 align="center" class="text-dark">Cargando...</h3>');
   })
   

   }); // Fin ready
   
                function abrir_modal(co_orden_compra) {

                        $('#ajax_remote').modal('show');
                            $.get("<?php echo site_url('compra/calificar_proceso') ?>"+"/"+co_orden_compra,
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }



   
     function cancelar_orden_compra(co_orden_compra) {
   $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Cancelar orden de compra',
   content: '¿Deseas cancelar esta orden de compra?',
    type: 'red',
   animation: 'opacity',
   escapeKey: 'no',
   buttons: {   
   si: function () {
   $.ajax({
    method: "POST",
    data: {'co_orden_compra':co_orden_compra},
    url: "<?php echo site_url('compra/cancelar_orden_compra') ?>",
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
                    

     function remover_orden_compra(co_orden_compra) {
   $.confirm({
   backgroundDismiss: true,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Remover orden de compra',
   content: '¿Deseas remover esta orden de compra?',
    type: 'blue',
   animation: 'opacity',
   escapeKey: 'no',
   buttons: {   
   si: function () {
   $.ajax({
    method: "POST",
    data: {'co_orden_compra':co_orden_compra},
    url: "<?php echo site_url('compra/remover_orden_compra') ?>",
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


            function aprobar_orden_compra(co_orden_compra, nu_orden_compra)
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


         function rechazar_orden_compra(co_orden_compra, nu_orden_compra)
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

             

   
   
</script>

