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
                            <div class="container animsition">
                            <div class="row p-0">

                                <div class="col-lg-1">
                                    
                                    
                                </div>

                                <div class="col-lg-10 pl-0 pr-0">

                                <?php if ($listado_orden_compra->num_rows() > 0) : ?>

<?php foreach ($listado_orden_compra->result() as $row) : ?>

    
    
<div class="d-flex align-items-center mb-2 bg-white p-2 bg-hover-gray-100" id="elemento_<?php echo $row->id; ?>">

<?php if ($row->nb_estatus == 'En espera por aprobacion'): ?> 
                                                            
            <span class="bullet bullet-bar bg-primary align-self-stretch p-0 mr-0"></span>
            
            <?php else: ?> <span class="bullet bullet-bar bg-success align-self-stretch p-0 mr-0"></span>  
                
                <?php endif; ?>
                    <!--begin::Bullet-->

                    <!--end::Checkbox-->
                    <!--begin::Text-->
                    <div class="ml-2 d-flex flex-column w-200px mr-0">
                        <a href="<?php echo site_url("compra/detalle_orden_compra/$row->id");?>" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-0"> <?php echo $row->nu_codigo_orden_compra; ?> </a>
    
                            
                       <span class="text-primary font-weight-bold">  <?php echo $row->nb_estatus; ?>  </span> 
                                
                       
                <span id="td_calificado_<?php echo $row->id; ?>">

                <?php if (!$this->biomercado_library->get_info_calificado($row->id)): ?>

                <span class="text-danger">Sin Calificar </span> 

                <?php else: ?>

                <span class="text-info">Calificado </span> 

                <?php endif; ?>

                </span>

                <?php if($row->ca_pagado > 0): ?>
                                                        <span class=" text-success font-size-sm">¡Pagado!</span>
                                                         <?php endif; ?>

                
                <span class="d-block d-md-none text-dark font-weight-bold"> 
                <i class="far fa-user"></i>   <?php echo $row->username; ?> 

                <i class="ml-4 fas fa-money-bill"></i>  <?php echo number_format($row->ca_monto,2,',','.').' '.$row->nb_acronimo; ?> 
                

                </span>


              </div>




                <span class="d-none d-md-block">
                <div class="d-flex flex-column mr-4 ml-4 w-120px">
                <div class="p-0 font-weight-bold text-left font-size-sm">Usuario</div>
                <div class="p-0"><?php echo $row->username; ?></div>
                </div>

                </span>

                <span class="d-none d-md-block">
             <div class="d-flex flex-column mr-12">
                <div class="p-0 font-weight-bold text-left font-size-sm w-100px">Monto</div>
                <div class="p-0"><?php echo number_format($row->ca_monto,2,',','.').' '.$row->nb_acronimo; ?> </div>

                </div>
            </span>

            <span class="d-none d-md-block">
             <div class="d-flex flex-column mr-12">
                <div class="p-0 font-weight-bold text-left font-size-sm w-80px">Ubicacion</div>
                <div class="p-0"><?php echo $row->nb_estado_vendedor; ?> </div>

                </div>
            </span>


            <span class="d-none d-md-block">
            <div class="d-flex flex-column">

               <div class="p-0 font-weight-bold text-left font-size-sm">Creado</div>
                <div class="p-0 text-left"> <?php echo date("d-m-Y g:i:s a", $row->ff_fecha_elaboracion); ?> </div>

                </div>
            </span>




                    <!--end::Text-->
                    <!--begin::Dropdown-->

                    <div class="d-flex align-items-end flex-column ml-auto mb-auto">

  <span class="text-muted font-size-xs text-right mr-2">  <?php $fecha_elaboracion = date("d-m-Y g:i:s a", $row->ff_fecha_elaboracion); 
                                                         echo "Hace ".time_stamp($fecha_elaboracion); ?> </span>

  


  <div class="p-1"> 




  <?php if ($row->nb_estatus == 'En espera por aprobacion'): ?> 

<a href="javascript:"  onclick="aprobar_orden_compra('<?php echo $row->id; ?>','<?php echo $row->nu_codigo_orden_compra; ?>')" class="btn btn-success btn-sm mb-2 p-1 mr-2">
    <i class="far fa-check-circle"></i>
</a>

<a href="javascript:" onclick="rechazar_orden_compra('<?php echo $row->id; ?>','<?php echo $row->nu_codigo_orden_compra; ?>')" class="btn btn-danger btn-sm p-1 mr-2">
    <i class="far fa-times-circle"></i>
</a>

<?php endif; ?>


<?php if ($row->nb_estatus == 'Cancelado por el comprador' or $row->nb_estatus == 'Confirmado por el vendedor' or $row->nb_estatus == 'Cancelado por el vendedor'): ?>
<?php if (!$this->biomercado_library->get_info_calificado($row->id)): ?>

    <a href="javascript:"  onclick="abrir_modal('<?php echo $row->id; ?>')" class="btn btn-light-warning btn-sm font-weight-bold p-1 mt-1 mr-2"><i class="fas fa-star"></i></a>
    
    

    <?php endif; ?>
    <?php endif; ?>

    <?php if ($row->nb_estatus == 'Confirmado por el comprador'): ?>

<a href="javascript:" onclick="cancelar_orden_compra('<?php echo $row->id; ?>')" class="btn btn-light-danger btn-sm font-weight-bold p-1 mt-1 mr-2"><i class="far fa-times-circle"></i></a>

<?php endif; ?>

<?php if ($this->biomercado_library->get_info_calificado($row->id) or $row->nb_estatus == 'Orden de compra abandonada'  or $row->nb_estatus == 'Orden de compra cancelada por el vendedor' or $row->nb_estatus == 'Rechazado por el comprador'): ?>

<a class="btn btn-light-info btn-sm font-weight-bold p-1 mt-1 mr-2"href="javascript:"  onclick="remover_orden_compra('<?php echo $row->id; ?>')" ><i class="fas fa-archive"></i></a>

<?php endif; ?>


</div>

  


</div>

               

         




                    <!--end::Dropdown-->
                </div>



    

    <?php endforeach; ?>

    <?php else: ?>

        <span class="text-center p-4">
        <h4>Sin Registro</h4>
                    <p>Todas las ordenes de compra que emita de su proveedor aparecerán aqui</p>
</span>

    <?php endif; ?>



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

        $('#elemento_'+co_orden_compra).fadeOut(300, function() { $(this).remove(); });

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

