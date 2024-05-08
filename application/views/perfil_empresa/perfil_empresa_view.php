                    <!--begin::Content-->


                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Perfil de Empresa</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>


        
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
                                 <!--begin::Body-->
                                 <div class="card-body pt-4">
                                    <!--begin::Toolbar-->
                                    <div class="d-flex justify-content-end py-2">
                                    </div>
                                    <!--end::Toolbar-->
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center">
                                       <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                          <div class="symbol-label" style="background-image:url('<?php echo base_url(); ?>assets/media/bg/demo-7.jpg')">
                                                <span style="font-size:40px; color:white;"><?php echo substr($info_usuario->username, 0,1); ?></span>

                                          </div>
                                          <i class="symbol-badge bg-success"></i>
                                       </div>
                                       <div>
                                          <a href="javascript:" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary"><?php echo $info_usuario->username; ?></a>
                                          <div class="text-muted"><?php echo $info_empresa->nb_tipo_empresa; ?></div>
                                          <div class="mt-2">
                                          </div>
                                       </div>
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Contact-->
                                    <div class="pt-8 pb-6">

                                       <div class="d-flex align-items-center">  



                                          <span class="font-weight-bold mr-2"><i class="flaticon2-pin text-dark"></i></span>
                                          <span class="text-dark"><?php echo $info_empresa->nb_estado; ?></span>

                                          <?php if($info_empresa->nb_tipo_pago != ''): ?>
                                        <span class="font-weight-bold  ml-4 mr-2"><i class="far fa-money-bill-alt text-dark"></i></span>
                                          <span class="text-dark"><?php echo $info_empresa->nb_tipo_pago; ?></span>
                                      <?php endif; ?>
                                       

                                        <?php if($info_empresa->nb_forma_envio != ''): ?>
                                        <span class="font-weight-bold  ml-4 mr-2"><i class="fas fa-truck text-dark"></i></span>
                                          <span class="text-dark"><?php echo $info_empresa->nb_forma_envio; ?></span>
                                        <?php endif; ?>


                                          <?php if($info_empresa->nb_forma_entrega != ''): ?>
                                        <span class="font-weight-bold  ml-4 mr-2"><i class="fas fa-truck-loading text-dark"></i></span>
                                          <span class="text-dark"><?php echo $info_empresa->nb_forma_entrega; ?></span>
                                          <?php endif; ?>
                                          
                                       </div>
                                       


                                       

                                    </div>


                                  <div class="separator separator-solid separator-border-4 mt-3 mb-3"></div>

                                  <div class="row">



                                                                  <?php $get_promocion = $this->publicidad_library->get_publicidad_cartelera(); ?>
                                                      <?php if ($get_promocion->num_rows() > 0): $info_promocion = $get_promocion->row();  ?>
                                                  
                                                <div class="flex-grow-1 p-6 mb-4 card-rounded bgi-no-repeat d-flex flex-column justify-content-center align-items-start" style="background-color: #021c1e; background-position: right bottom; background-size: auto 100%; background-image: url(<?php echo base_url(); ?>assets/media/svg/illustrations/working.svg)">
                                                    <h4 class="text-white font-weight-bolder m-0"><i class="text-warning">Anuncio</i> - <?php echo $info_promocion->nb_producto; ?> - <b><?php echo number_format($info_promocion->ca_precio,2,',','.'); ?> <?php echo $info_promocion->nb_acronimo; ?></b> </h4>
                                                    <p class="text-white my-2 font-size-xl font-weight-bold"><b> <?php echo $info_promocion->username; ?></b> - <?php echo $info_promocion->tx_descripcion; ?> </p>
                                                    <a href="javascript:" class="btn btn-light-success font-weight-bold py-2 px-6" onclick="comprar_modal('<?php echo $info_promocion->co_producto_publicaciones; ?>')">Agregar al carro</a>
                                                </div>
                                          
                                                  <?php endif; ?>
                              

                                          
                                                   
                                                        <table class="table table-head-bg table-borderless table-vertical-center">
                                                            <thead>
                                                                <tr class="text-left text-uppercase">
                                                                    <th>
                                                                        <span class="text-dark-90">Producto</span>
                                                                    </th>
                                                                    <th><span class="d-none d-xl-block">Ubicacion</span></th>
                                                                    <th><span class="d-none d-xl-block">Usuario</span></th>
                                                                    <th>Precio</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                             <?php $con = 0; foreach ($listado_publicaciones->result() as $row) :  ?>
                                                   <?php if ($this->inventario_library->get_producto_disponible($row->id) != 0): $con ++; ?> 

                                                                <tr>
                                                                    <td class="pl-0 py-0">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="symbol symbol-50 symbol-light mr-2 d-none d-lg-block">
                                                                                <span class="symbol-label">
                                                                                    <?php if($row->nb_url_foto != ''): ?>
                                                                                    <img width="100%" height="100%" src="<?php echo $row->nb_url_foto; ?>" class="h-75 align-self-end" alt="" />
                                                                                <?php else: ?>
                                                                                        BM
                                                                                <?php endif; ?>
                                                                                </span>
                                                                            </div>
                                                                            <div>
                                                                                <a href="javascript::" onclick="comprar_modal('<?php echo $row->id; ?>')"class="text-dark-75 font-weight-bolder text-hover-primary mb-1"><?php echo $row->nb_producto; ?> </a>
                                                                                <span class="text-muted font-weight-bold d-block"> <?php echo substr($row->tx_descripcion, 0, 30); ?>  </span>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                 <td>
                                                                        <span class="text-dark-75 font-weight-bolder d-block">
                                                                           <span class="d-none d-xl-block"> <?php echo $row->nb_estado; ?> </span>
                                                                        </span>
                                                                        <span class="text-warning font-weight-bold">
        

                                                                        </span>
                                                                    </td>

                                                                <td> 
                                                                        <?php if($this->ion_auth->in_empresa_activado() == 1): ?>
                                                                    <span class="d-none d-xl-block">
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">

                                                                      <?php $token_partner =  $this->authjwt->encode_token_empresa($row->co_usuario, $row->nb_empresa, $row->co_partner, $row->username); ?>

                                                         <a href="javascript:" onclick="perfil_empresa('<?php echo $token_partner; ?>')"><?php echo substr($row->username, 0,30); ?></a>

                                                                        </span>
                                                                        <span class="text-warning font-weight-bold">
                                                                             
                                                                            <?php $info_reputacion = $this->ion_auth->promedio_reputacion_usuario('VENDEDOR', $row->co_usuario); ?>
                                                                            <?php if ($info_reputacion): echo $info_reputacion->ca_promedio_reputacion; else: echo "Usuario Nuevo"; endif; ?>

                                                                        </span>
                                                                    </span>
                                                                     <?php else: ?>

                                                                      <span class="text-dark-75 font-weight-bolder d-block font-size-lg">  Usuario</span>

                                                                     <?php endif; ?>
                                                                    </td>

                                                                    <td>
                                                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">

                                                                              <?php if($row->nb_tipo_venta == 'Subasta'): 
                                                        $info_carrito_subasta = $this->biomercado_library->info_comprado_carrito_subasta($row->id);
                                                             if(!is_null($info_carrito_subasta)): 
                                                                 $ca_precio_actual = $info_carrito_subasta->ca_precio_carrito; 
                                                             else:
                                                                $ca_precio_actual = $row->ca_precio; 
                                                             endif;
                                                         else:
                                                            $ca_precio_actual = $row->ca_precio; 
                                                         endif; ?> 

                                                        <?php echo number_format($ca_precio_actual,2,',','.'); ?> <?php echo $row->nb_acronimo; ?>
                                                                        </span>
                                                                        <span class="text-muted font-weight-bold"></span>
                                                                    </td>
                                                                    <td class="pr-0 text-center">

                                                                        <?php if($this->ion_auth->in_empresa_activado() == 1): ?>

                                                                        <span id="td_<?php echo $row->id; ?>"> 

                                                                                <?php if($this->biomercado_library->get_info_comprado($row->id)): ?>

                                                            <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Accion">
                                                        <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right" style="">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover">
                                                                <li class="navi-header font-weight-bold py-4">
                                                                    <span class="font-size-lg">Accion:</span>
                                                                    <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
                                                                </li>
                                                                <li class="navi-separator mb-3 opacity-70"></li>
                                                                <li class="navi-item">
                                                                    <a onclick="comprar_modal('<?php echo $row->id; ?>')" class="navi-link">
                                                                        <span class="navi-text">
                                                                           Ajustar
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a onclick="eliminar_producto('<?php echo $row->id; ?>')" class="navi-link">
                                                                        <span>
                                                                            Cancelar
                                                                        </span>
                                                                    </a>
                                                                </li>
        
           
                                                            </ul>
                                                            <!--end::Navigation-->
                                                        </div>
                                                    </div>


                                                                                       <?php else: ?>

                                                         <a onClick="comprar_modal('<?php echo $row->id ?>')" class="btn btn-icon btn-light-success mr-0">
                                                                <i class="flaticon-cart icon-2x"></i>
                                                            </a>

                                                             <?php endif; ?>

                                                             </span>
                                                         <?php endif; ?>
                                                                    </td>
                                                                </tr>

                                                         <?php endif; ?> 
                                                       <?php endforeach; ?>  


     
                                                            </tbody>
                                                        </table>
                                             

                                                            <div class="d-flex justify-content-between align-items-center flex-wrap">




        </div>





                                  </div>




                                   

                                     
                                 </div>
                                 <!--end::Body-->
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

                 function perfil_empresa(token_empresa)
        {
        $(location).attr('href',"<?php echo site_url() ?>perfil_empresa/empresa"+'/'+token_empresa); 
        }



                            function comprar_modal(co_producto_publicaciones) {
                                $('#ajax_remote').modal('show');
                                 
                            $.get("<?php echo site_url('compra/agregar_carro') ?>"+"/"+co_producto_publicaciones,
                            function(data){
                            if (data != "") {
                               
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }



   $(document).ready(function(){


    if ('<?php echo $con; ?>' == 0){

        $('#div_registro_filtro').html('Sin Registros');
        $('#div_registro_principal').html('<h4>Sin Registros</h4><p>En estos momentos no hay productos disponible para la venta</p>');

    }
   
   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('<h3 align="center" class="text-dark">Cargando...</h3>');
   })
   

   }); // Fin ready
   
   


            function filtrar()

    {

      var tx_buscar = '<?php echo $tx_buscar ?>';
      $("#tx_buscar").val(tx_buscar);


    $('<input />').attr('type', 'hidden')
     .attr('name', "nb_estado")
     .attr('value', $("#nb_estado").val())
     .appendTo('#form_1');


    $('<input />').attr('type', 'hidden')
     .attr('name', "ordenar")
     .attr('value', $("#orderby").val())
     .appendTo('#form_1');

      $("#form_1").submit();


    }



  



   
      function eliminar_producto(co_producto_publicaciones)
   {
   
   
                                              $.ajax({
   method: "POST",
   data: {'co_producto_publicaciones':co_producto_publicaciones},
   url: "<?php echo site_url('compra/eliminar_producto_carro_compra') ?>",
                }).done(function( data ) { 
   
                   var obj = JSON.parse(data);
                    

                   $("#td_"+co_producto_publicaciones).html('<a onClick="comprar_modal('+co_producto_publicaciones+')" class="btn btn-icon btn-light-success mr-0"> <i class="flaticon-cart icon-2x mr-0"></i></a>');
                   
                 if ( $("#reload_carrito").length > 0 ) {
                    $("#reload_carrito").load("<?php echo base_url(); ?>/biomercado/reload_carro_compra");
                   }


   
                 }).fail(function(){
   
               alert('Fallo');
   
   
                 }); 
 
   
   }
   


                                                      </script>

