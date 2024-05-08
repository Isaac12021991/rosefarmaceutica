                    <!--begin::Content-->


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
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Cartelera</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>


                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                                                <select class="form-control form-control-solid form-control-sm mr-2" id="nb_categoria" onChange="filtrar()">
                                                        <option value="">Categorias:</option>
                                                        <option value="">Todos</option>
                                                        <?php foreach($categorias->result() as $row){
                                                        echo "<option value='".$row->nb_categoria."'>".$row->nb_categoria."</option>";
                                                        } ?>
                                                    </select>
                                                         

                                                        <select class="form-control form-control-solid form-control-sm mr-2" id="nb_estado" onChange="filtrar()">
                                                        <option value="">Ubicacion:</option>
                                                        <?php foreach($estados->result() as $row){
                                                        echo "<option value='".$row->nb_estado."'>".$row->nb_estado."</option>";
                                                        } ?>
                                                    </select>
                                          

                                                     <select class="form-control form-control-solid form-control-sm" id="orderby" onChange="filtrar()">
                                                        <option value="">Mas Reciente</option>
                                                        <option value="menor_precio">Menor precio</option>
                                                        <option value="mayor_precio">Mayor precio</option>
                                                    </select>

                
                                       
                                    
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


                                <div class="col-lg-10 pl-0 pr-0">
                                               <?php $con = 0; if (isset($listado_publicaciones)) : ?>
                                                <?php if ($listado_publicaciones->num_rows() > 0) : ?>

                                                                        <div class="card card-custom card-stretch gutter-b">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 py-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label font-weight-bolder text-dark">Cartelera de productos</span>
                                                    <span class="text-muted mt-3 font-weight-bold font-size-sm"><?php if($tx_buscar != ''): echo 'Resultado para: '.$tx_buscar;  endif; ?> </span>
                                                </h3>
                                                <div class="card-toolbar">

                                                </div>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div class="card-body pt-0 pb-0">

                                                                                                              <?php $get_promocion = $this->publicidad_library->get_publicidad_cartelera(); ?>
                                                      <?php if ($get_promocion->num_rows() > 0): $info_promocion = $get_promocion->row();  ?>
                                                  
                                                <div class="flex-grow-1 p-6 mb-4 card-rounded bgi-no-repeat d-flex flex-column justify-content-center align-items-start" style="background-color: #021c1e; background-position: right bottom; background-size: auto 100%; background-image: url(<?php echo base_url(); ?>assets/media/svg/illustrations/working.svg)">
                                                    <h4 class="text-white font-weight-bolder m-0"><i class="text-warning">Anuncio</i> - <?php echo $info_promocion->nb_producto; ?> - <b><?php echo number_format($info_promocion->ca_precio,2,',','.'); ?> <?php echo $info_promocion->nb_acronimo; ?></b> </h4>
                                                    <p class="text-white my-2 font-size-xl font-weight-bold"><b> <?php echo $info_promocion->username; ?></b> - <?php echo $info_promocion->tx_descripcion; ?> </p>
                                                    <a href="javascript:" class="btn btn-light-success font-weight-bold py-2 px-6" onclick="comprar_modal('<?php echo $info_promocion->co_producto_publicaciones; ?>')">Agregar al carro</a>
                                                </div>
                                          
                                                  <?php endif; ?>



                                                                                                     <div class="row">

                                                      <?php $con = 0; foreach ($listado_publicaciones->result() as $row) :  ?>
                                                   <?php if ($this->inventario_library->get_producto_disponible($row->id) != 0): $con ++; ?> 

                                                      <?php $token_partner =  $this->authjwt->encode_token_empresa($row->co_usuario, $row->nb_empresa, $row->co_partner, $row->username); ?>

                                                            <div class="col-lg-4 p-2 py-lg-4">
                                                                                    <div class="d-flex mb-6">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-50 symbol-2by3 flex-shrink-0 mr-2">
                                                        <div class="d-flex flex-column">
                                                    <?php if($row->nb_url_foto != ''): ?>
                                                         <div class="symbol-label mb-3" style="background-image: url('<?php echo $row->nb_url_foto; ?>')"></div>
                                                                                <?php else: ?>
                                                        <div class="symbol-label mb-3" style="background-image: url('')">ROSE</div>
                                                                                <?php endif; ?>

                                                            <span id="td_<?php echo $row->id; ?>"> 
                                                        <?php if($this->biomercado_library->get_info_comprado($row->id)): ?>



                                                        <div class="dropdown">
                                                            <button class="btn btn-clean font-weight-bolder btn-sm mr-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Ajustar
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="javascript:" onclick="comprar_modal('<?php echo $row->id; ?>')" >Ajustar</a>
                                                                <a class="dropdown-item" href="javascript:" onclick="eliminar_producto('<?php echo $row->id; ?>')">Cancelar</a>
                                                            </div>
                                                        </div>



                                                        <?php else: ?>

                                                           
                                                            <a href="javascript:"  onclick="comprar_modal('<?php echo $row->id; ?>')" class="btn btn-light-success btn-sm font-weight-bolder py-2 font-size-sm">Agregar</a>

                                                        

                                                        <?php endif; ?>

                                                            </span>



                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-0 pr-0">
                                                        <a href="javascript:" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mb-2" onclick="comprar_modal('<?php echo $row->id; ?>')"><?php echo $row->nb_producto; ?></a>
                                                        <span class="text-dark font-size-sm mb-3"> <?php echo substr($row->tx_descripcion, 0, 30); ?> </span>


                                                             <div class="row mb-0 p-2">

                                                              

                                                                <table class="table table-sm table-light">
      
                                                                      <tr>
                                                                        <td><i class="fas fa-dollar-sign text-dark"></i></td><td>

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


                                                                      <span class="font-size-lg font-weight-bolder text-primary"> <?php echo number_format($ca_precio_actual,2,',','.'); ?> <?php echo $row->nb_acronimo; ?> </span></td>

                                                                        <td><i class="fas fa-map-marker-alt text-dark"></i></td><td><?php echo $row->nb_estado; ?> </td>
                                                                    </tr>

                                                                      <?php if($this->ion_auth->in_empresa_activado() == 1): ?>
                                                                    <tr>
                                                                        <td><i class="far fa-user text-dark"></i></td><td>
                                                                            <a href="javascript:" onclick="perfil_empresa('<?php echo $token_partner; ?>')"><?php echo substr($row->username, 0,30); ?></a>
                                                                        </td>
                                                                         <td><i class="far fa-star text-warning"></i></td><td> 

                                                                          <?php $info_reputacion = $this->ion_auth->promedio_reputacion_usuario('VENDEDOR', $row->co_usuario); ?>
                                                                            <?php if ($info_reputacion): echo $info_reputacion->ca_promedio_reputacion; else: echo "Usuario Nuevo"; endif; ?>
                                                                                
                                                                            </td>
                                                                    </tr>

                                                                     <?php endif; ?>


                                                                </table>

                                                           

   

                                                            </div>

            
                                                    </div>
                                                    <!--end::Title-->
                                                </div>

                                                </div>

                                                <?php else: ?>
                                                    
                                                    No hay registros

                                                           <?php endif; ?> 
                                                       <?php endforeach; ?>  

                     <?php if (isset($links)) { ?>
                        <?php echo $links ?>
                    <?php } ?>



                                                </div>








                                            </div>
                                            <!--end::Body-->


                                        </div>



                                                  <?php else: ?>

                                                                    <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
                                    <div class="alert-icon">
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Info-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"/>
                                                <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </div>
                                    <div class="alert-text"><h4 class="text-primary mb-4">No hay publicaciones que coincidan con tu búsqueda</h4>
                                    
                                            <ul>
                                            <li> Revisa la ortografía de la palabra</li>
                                            <li> Utiliza palabras más genéricas o menos palabras. </li>

                                                        </ul>

                                                    </div>
                                </div>
    

                                                <?php endif; ?>
                                                <?php endif; ?>




 






                                </div>



                                <div class="col-lg-2 pr-0 pl-0 pr-lg-6 pl-lg-6">
                                
                                        <!--begin::List Widget 1-->
                                        <div class="card card-custom">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label font-weight-bolder text-dark">Empresas</span>
                                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">Listado de empresas</span>
                                                </h3>
                                                <div class="card-toolbar">

                                                </div>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div class="card-body pt-2">
                                                <!--begin::Item-->
                                                <?php if($list_empresas_certificadas->num_rows() > 0): ?>

                                                    <?php foreach ($list_empresas_certificadas->result() as $row): ?>

                                                <div class="d-flex align-items-center mb-4">
                                        <?php $token_partner =  $this->authjwt->encode_token_empresa($row->co_usuario, $row->nb_empresa, $row->co_partner, $row->username); ?>

                                                    <div class="d-flex flex-column font-weight-bold">
                                                        <a href="javascript:"  onclick="perfil_empresa('<?php echo $token_partner; ?>')" class="text-dark text-hover-primary mb-1 font-size-lg"><?php echo $row->username; ?></a>
                                                        <span class="text-muted"><?php echo $row->nb_estado; ?></span>
                                                    </div>
                                                    <!--end::Text-->
                                                </div>

                                                 <?php endforeach; ?>

                                            <?php endif; ?>
                                                <!--end::Item-->
                                                <!--begin::Item-->
   
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::List Widget 1-->

                                </div>

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




    $('.tx_buscar').val('<?php echo $tx_buscar; ?>');
    $('#nb_estado').val('<?php echo $nb_estado; ?>');
    $('#nb_categoria').val('<?php echo $nb_categoria; ?>');
    $('#orderby').val('<?php echo $ordenar; ?>');


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

         $('<input />').attr('type', 'hidden')
     .attr('name', "nb_categoria")
     .attr('value', $("#nb_categoria").val())
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
                    

                   $("#td_"+co_producto_publicaciones).html('<a href="javascript:"  onclick="comprar_modal('+co_producto_publicaciones+')" class="btn btn-light-success btn-sm font-weight-bolder py-2 font-size-sm">Agregar</a>');
                   
                 if ( $("#reload_carrito").length > 0 ) {
                    $("#reload_carrito").load("<?php echo base_url(); ?>/biomercado/reload_carro_compra");
                   }


   
                 }).fail(function(){
   
               alert('Fallo');
   
   
                 }); 
 
   
   }
   


                                                      </script>

