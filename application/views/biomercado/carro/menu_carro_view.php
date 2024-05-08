                    <!--begin::Content-->
                    <?php $info_empresa_partner = $this->ion_auth->info_partner_todo(); ?>
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
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Compras</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                                    
                            
                                        <a href="javascript:" onclick="analizar_compra()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Analizar compra</a>
                                    
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

                                     <form  action="<?= site_url('/compra/analisis_compra') ?>" autocomplete="off"  id="form_analisis_compra"  method="POST" >
    
                                         <div class="card card-custom gutter-b">
                                            <!--begin::Header-->
                                            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label font-weight-bolder font-size-h3 text-dark">Carro de compra</span>
                                                </h3>
                                                <div class="card-toolbar">
                                                    <div class="dropdown dropdown-inline">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Header-->
                                            <div class="card-body pt-0 pl-2 pr-2 pl-lg-4 pr-lg-4">
                                                <!--begin::Shopping Cart-->
                                         <?php if (isset($listado_carro)): ?>
                                     <?php if ($listado_carro->num_rows() > 0) : ?>
    


                                                <table class="table table-sm">

                                                         <thead class="thead-light">
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>Producto</th>
                                                                        <th class="text-center d-none d-lg-block">Estatus</th>
                                                                        <th class="text-center">Cantidad</th>
                                                                        <th class="text-right">Precio</th>
                                                                        <th class="text-right d-none d-lg-block">Subtotal</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                 <tbody>

                                                    <?php $con = 0; foreach ($listado_carro->result() as $row) : $con ++; ?>
                                                    <tr id="tr_<?php echo $row->id; ?>">

                                                            <td>

                                                            <?php if($row->nb_estatus_compra == 'En carro' or $row->nb_estatus_compra == 'Compra ganada'): ?>
                                                                <label class="checkbox">
                                                                <input type="checkbox" <?php if($row->in_preparado_compra == true): ?> checked="checked" <?php endif; ?> onclick="validar_check(this.value)" class="checkbox_comprobar" name="accion_check[]" id="carro_compras_<?php echo $row->co_carro_compra ?>" value="<?php echo $row->co_carro_compra; ?>" /> 
                                                                <span></span>
                                                                    </label>
                                                            <?php endif; ?>
                                                        
                                                            </td>

                                                                <td>
                                                                     <a href="javascript::" onclick="comprar_modal('<?php echo $row->id; ?>')" class="text-dark text-hover-primary"> <?php echo $row->nb_producto; ?></a>
                                                                     <span class="text-muted font-weight-bold d-block"><?php echo substr($row->tx_descripcion, 0,20); ?>...
                                                                     </span> <b> <?php echo substr($row->username, 0,30); ?></b>
                                                                      <?php if ($row->ca_unidades_comprado > $this->inventario_library->get_producto_disponible($row->id)): ?>  <br>No hay disponibilidad del producto <?php endif; ?>

                                                                </td>

                                                             <td class="text-center align-middle">
                                                                <span class=" d-none d-lg-block">
                                                                <span class="label label-inline label-light-primary font-weight-bold"><?php echo $row->nb_estatus_compra; ?></span>
                                                                        </span>
                                                                </td>

                                                               


                                                                <td class="text-center align-middle" id="td_unidades_comprado_<?php echo $row->id ?>">
                                                                     <a href="javascript::" class="text-dark text-hover-primary"> <?php echo $row->ca_unidades_comprado; ?></a>
                                                                    
                                                                </td>


                                                                <td class="text-right align-middle">
                                                                     <a href="#" class="text-dark text-hover-primary"> 
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

                                                          <?php echo number_format($ca_precio_actual,2,',','.'); ?> <?php echo $row->nb_acronimo; ?> </a>
                                                                    
                                                                </td>


                                                                <td class="text-right align-middle"  id="td_unidades_total_<?php echo $row->id ?>">

                                                                    <span class="d-none d-lg-block ">
                                                                      <?php $ca_total = $row->ca_unidades_comprado * $ca_precio_actual; echo $ca_total; ?> 

                                                                      </span>
                                                                    
                                                                </td>

                                                                <td class="text-center align-middle">
                                                                    
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
                                                                <i class="flaticon-cart icon-2x mr-0"></i>
                                                            </a>

                                                             <?php endif; ?>

                                                             </span>


                                                                </td>

                                                            </tr>

                                                            <?php endforeach; ?>

                                                                 </tbody>

                                                </table>

                                                <span id="actualizar_carro_orden_compra_total"></span>
                                              
                                        <?php else: ?>

                                         
                                     <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
                                    <div class="alert-icon">
                                        <span class="svg-icon svg-icon-primary svg-icon-xl">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"></path>
                                                    <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <div class="alert-text">  <h4> Pulse <a href="<?php echo site_url('biomercado/cartelera')?>"> aquí </a> para ir a la cartelera de productos </h4>
                                     <p>Los productos agregados desde la cartelera se iran guardando en carro de compra.</p>
                                    </div>
                                </div>

                                           

       


            <?php endif; ?>

             <?php else: ?>

    
             <?php endif; ?>

                                                <!--end::Shopping Cart-->
                                            
                                        </div>





                                    </form>


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

                    function analizar_compra()
                    {

             var selected = new Array();
            $(".checkbox_comprobar:checked").each(function () {
                selected.push(this.value);
            });
    
      if (selected.length === 0) { toastr.error("Error", 'Por favor seleccione un producto');  return false; }


                      $("#form_analisis_compra").submit();

                    }




                            function comprar_modal(co_producto_publicaciones) {


                            $.get("<?php echo site_url('compra/agregar_carro') ?>"+"/"+co_producto_publicaciones,
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }



    $("#actualizar_carro_orden_compra_total").load("<?php echo base_url(); ?>/compra/actualizar_carro_orden_compra_total");

   $(document).ready(function(){

    $("#nav_movil_compras").addClass("text-primary");
   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready
   
   


   
      function eliminar_producto(co_producto_publicaciones)
   {
   
   
                                              $.ajax({
   method: "POST",
   data: {'co_producto_publicaciones':co_producto_publicaciones},
   url: "<?php echo site_url('compra/eliminar_producto_carro_compra') ?>",
                }).done(function( data ) { 
   
                   var obj = JSON.parse(data);
                    
                  var url = "<?php echo site_url() ?>compra/agregar_carro"+'/'+co_producto_publicaciones;

                   $("#td_"+co_producto_publicaciones).html('<i class="fa fa-times"></i>');
                   $("#tr_"+co_producto_publicaciones).addClass("danger");
  

                                   if ( $("#reload_carrito").length > 0 ) {
                    $("#reload_carrito").load("<?php echo base_url(); ?>/biomercado/reload_carro_compra");
                   }
   
                 }).fail(function(){
   
                    toastr.error("Error", 'Error del servidor');
   
   
                 }); 
 
      
      

   
   }
   
 
                    
                   function validar_check(co_carro_compras){

     var check = $('#carro_compras_'+co_carro_compras).is(":checked") 

                           $.ajax({
    method: "POST",
    data: {'co_carro_compras':co_carro_compras, 'check':check},
    url: "<?php echo site_url('compra/producto_listo_comprar') ?>",
    beforeSend: function(){  },
                 }).done(function(data) { 

                var obj = JSON.parse(data);

                      if (obj.error > 0)

                      {

                    toastr.error("Error", obj.message);
                        return;

                      }else{

                 $("#actualizar_carro_orden_compra_total").load("<?php echo base_url(); ?>/compra/actualizar_carro_orden_compra_total");

                      }
                    
         
   
                  }).fail(function(){
   
                    toastr.error("Error", 'Error del servidor');
   
   
                  }); 
   }

                      function comprar_ahora(){


   
         KTApp.blockPage({
  overlayColor: 'black',
  opacity: 0.2,
  state: 'primary' // a bootstrap color
 });


                           $.ajax({
    method: "POST",
    data: {},
    url: "<?php echo site_url('compra/comprar_ahora') ?>",
    beforeSend: function(){  },
                 }).done(function(data) { 

                 KTApp.unblockPage();

                var obj = JSON.parse(data);


                      if (obj.error > 0)

                      {


                        toastr.error("Error", obj.message);

                        return;


                      }else{


                  
                   $(location).attr('href',"<?php echo site_url() ?>compra/orden_compra"); 


                      }

                   
   
                  }).fail(function(){
   
                    toastr.error("Error", 'Error del servidor');

                KTApp.unblockPage();
   
   
                  }); 
   }
   
   
</script>


