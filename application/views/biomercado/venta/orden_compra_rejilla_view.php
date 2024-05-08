
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
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Venta</h5>
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

                                <div class="col-lg-10">


                                    <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                    <div class="card-title">
                                    <h3 class="card-label">
                                    Orden de compra
                                    <small>Ordenes de compras recibidas</small>
                                    </h3>
                                    </div>
                                    </div>
                                    <div class="card-body pt-0 pr-0 pl-0">

                     <?php if (isset($listado_orden_compra)): ?>
             <?php if ($listado_orden_compra->num_rows() > 0) : ?>
            <table class="table table-sm table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="text-center align-middle" width="5%"> </th>
                                                        <th width="15%"> Fecha</th>
                                                        <th width="10%"> <span class="d-none d-xl-block"> Código</span></th>
                                                        <th class="" width="15%"> <span class="d-none d-xl-block">  Monto </span></th>
                                                        <th width="20%"> Empresa</th>
                                                        <th width="15%"> <span class="d-none d-xl-block">  Estatus </th>
                                                        <th width="10%"> <span class="d-none d-xl-block">  Calificado </th>
                                                        <th width="10%">  </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?php $con = 0; foreach ($listado_orden_compra->result() as $row) : $con ++; ?>
               
                                                    <tr role="button" id="tr_<?php echo $row->id; ?>" <?php if($row->nb_estatus == 'Cancelado por el comprador' or $row->nb_estatus == 'Cancelado por el vendedor'): ?> class="text-danger" <?php endif; ?>

                                                    <?php if($row->nb_estatus == 'Confirmado por el vendedor'): ?> class="text-success" <?php endif; ?>
                                                    >


                                                        <td class="text-center align-middle" onclick="ver_detalle_orden('<?php echo $row->id; ?>')">    <?php if($row->nb_estatus == 'Cancelado por el comprador' or $row->nb_estatus == 'Cancelado por el vendedor'): ?> <i class="flaticon2-cancel text-danger"></i> <?php endif; ?> 

                                                        <?php if($row->nb_estatus == 'Confirmado por el vendedor'): ?> <i class="flaticon2-check-mark text-success"></i> <?php endif; ?> 


                                                        <?php if($row->nb_estatus == 'Orden de compra abandonada'): ?> <i class="flaticon2-delete text-danger"></i> <?php endif; ?>  
                                                        
                                                         </td>  

                                                         <td onclick="ver_detalle_orden('<?php echo $row->id; ?>')"> <span class="d-none"> <?php $fecha_elaboracion = date("d-m-Y g:i:s a", $row->ff_fecha_elaboracion); 
                                                         echo "Hace ".time_stamp($fecha_elaboracion); ?><br></span>
                                                         <span style="font-size:10px;"><?php echo $fecha_elaboracion; ?></span> <br> <span class="d-none"> # <?php echo $row->nu_codigo_orden_compra; ?></span>   </td>
                                                        <td onclick="ver_detalle_orden('<?php echo $row->id; ?>')"> <span class="d-none d-xl-block">  <?php echo $row->nu_codigo_orden_compra; ?> </span>  </td>
                                                       
                                                        <td onclick="ver_detalle_orden('<?php echo $row->id; ?>')"> <span class="d-none d-xl-block">  <?php echo number_format($row->ca_monto,2,',','.').' '.$row->nb_acronimo; ?> </span>  </td>
                                                          <td onclick="ver_detalle_orden('<?php echo $row->id; ?>')"> <?php if ($row->nb_estatus == 'Confirmado por el comprador' or $row->nb_estatus == 'Confirmado por el vendedor'): ?> <?php echo $row->nb_empresa_comprador; ?><br><?php endif; ?> <span style="font-size:10px;"><?php echo $row->nb_tipo_empresa_comprador; ?> <br><?php echo $row->nb_estado_comprador; ?><br> <?php echo $row->username; ?></span>
                                                          <span class="d-none">  <?php echo $row->nb_estatus; ?><br></span> 
                                                          <span class="d-none"> <?php echo number_format($row->ca_monto,2,',','.').' '.$row->nb_acronimo; ?> <br></span> 
                                                            </td>
                                                            <td onclick="ver_detalle_orden('<?php echo $row->id; ?>')"> <span class="d-none d-xl-block">  <?php echo $row->nb_estatus; ?> </span> </td>

                                                             <td id="td_calificado_<?php echo $row->id; ?>"> 
                                                                    <span class="hidden-md hidden-lg"> 
                                                            <?php if (!$this->biomercado_library->get_info_calificado($row->id)): ?>
                                                                <span class="text-info">Sin Calificar </span> 
                                                               
                                                            <?php else: ?>

                                                                <span class="text-info">Calificado </span> 

                                                                <?php endif; ?>
                                                            </span>
                                                            </td>
                                                        <td>
                                                         <span id="td_<?php echo $row->id; ?>"> 


                                                                                    <div class="card-toolbar">
                                                    <div class="dropdown dropdown-inline">
                                                        <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-0">
                                                                <li class="navi-item">
                                                                    <a href='<?php echo site_url("venta/detalle_orden_compra/$row->id");?>' class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Detalle</span>
                                                                    </a>
                                                                </li>

                                                                <?php if ($row->nb_estatus == 'En espera por aprobacion'): ?>

                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="cancelar_solicitud('<?php echo $row->id; ?>')" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-list-3"></i>
                                                                        </span>
                                                                        <span class="navi-text">Cancelar solicitud</span>
                                                                    </a>
                                                                </li>
                                                                <?php endif; ?>




                                                        <?php if ($row->nb_estatus == 'Cancelado por el comprador' or $row->nb_estatus == 'Confirmado por el vendedor' or $row->nb_estatus == 'Cancelado por el vendedor'): ?>
                                                                    <?php if (!$this->biomercado_library->get_info_calificado($row->id)): ?>

                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="abrir_modal('<?php echo $row->id; ?>')" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-list-3"></i>
                                                                        </span>
                                                                        <span class="navi-text">Calificar Usuario</span>
                                                                    </a>
                                                                </li>
                                                                <?php endif; ?>
                                                                <?php endif; ?>


                                                               <?php if ($row->nb_estatus == 'Confirmado por el comprador'): ?>

                                                                     <li class="navi-item">
                                                                    <a href="javascript::" onclick="confirmar_orden_compra('<?php echo $row->id; ?>')" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-rocket-1"></i>
                                                                        </span>
                                                                        <span class="navi-text">Confirmar venta</span>
                                                                    </a>
                                                                </li>


                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="cancelar_orden_compra('<?php echo $row->id; ?>')" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-rocket-1"></i>
                                                                        </span>
                                                                        <span class="navi-text">Cancelar</span>
                                                                    </a>
                                                                </li>
                                                                    <?php endif; ?>


                                                             <?php if ($this->biomercado_library->get_info_calificado($row->id) or $row->nb_estatus == 'Orden de compra abandonada' or $row->nb_estatus == 'Orden de compra cancelada por el vendedor' or $row->nb_estatus == 'Rechazado por el comprador'): ?> 

                                                                    <li class="navi-item">
                                                                        <a href="javascript::" onclick="remover_orden_compra('<?php echo $row->id; ?>')" class="navi-link">
                                                                            <span class="navi-icon">
                                                                                <i class="flaticon2-rubbish-bin-delete-button"></i>
                                                                            </span>
                                                                            <span class="navi-text">Remover</span>
                                                                        </a>
                                                                    </li>
                                                                        <?php endif; ?>


                                                            </ul>
                                                            <!--end::Navigation-->
                                                        </div>
                                                    </div>
                                                </div>


                                     </span>

                                                        </td>
                                                    </tr> 
                                                       <?php endforeach; ?>  

                                          
                                                </tbody>
                                            </table>
                        <?php else: ?>

                                            <div class="p-8">
                                           <h4>Sin orden de compra recibida</h4>
                                                <p>Todas las ordenes de compra recibidas de sus cliente aparecerán aqui</p>
                                            </div>


            <?php endif; ?>



            <?php else: ?>

                                        <div class="p-8">
                                          <h4>Sin orden de compra recibida</h4>
                                                <p>Todas las ordenes de compra recibidas de sus cliente aparecerán aqui</p>
                                            </div>

             <?php endif; ?>

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

     $(location).attr('href',"<?php echo site_url() ?>venta/detalle_orden_compra/"+co_orden_compra); 

}

   $(document).ready(function(){

$("#nav_movil_ventas").addClass("text-primary");


   
   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('<h3 align="center" class="text-dark">Cargando...</h3>');
   })
   

   }); // Fin ready
   
   

                function abrir_modal(co_orden_compra) {

                            $('#ajax_remote').modal('show');
                            $.get("<?php echo site_url('venta/calificar_proceso') ?>"+"/"+co_orden_compra,
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
    url: "<?php echo site_url('venta/cancelar_orden_compra') ?>",
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

        function confirmar_orden_compra(co_orden_compra) {
   $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Confirmar orden de compra',
   content: '¿Deseas confirmar esta orden de compra?',
    type: 'blue',
   animation: 'opacity',
   escapeKey: 'no',
   buttons: {   
   si: function () {
   $.ajax({
    method: "POST",
    data: {'co_orden_compra':co_orden_compra},
    url: "<?php echo site_url('venta/confirmar_orden_compra') ?>",
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
    url: "<?php echo site_url('venta/remover_orden_compra') ?>",
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
         
                    
   
   function cancelar_solicitud(co_orden_compra)
   {


            var data = new FormData();

            data.append('co_orden_compra', co_orden_compra);

            var url = "<?php echo site_url('solicitud_cotizacion/cancelar_solicitud_cotizacion_orden_compra') ?>";

            KTApp.blockPage({
              overlayColor: 'black',
              opacity: 0.2,
              state: 'primary' // a bootstrap color
             });


                $.ajax({
                url:url,
                type:'POST',
                contentType:false,
                data:data,
                processData:false,
                cache:false}).done(function( data ) { 
                    KTApp.unblockPage();

                   var obj = JSON.parse(data);


                       if (obj.error == 0) {

                         location.reload();
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 


   
   
   }
   

   
   
</script>

