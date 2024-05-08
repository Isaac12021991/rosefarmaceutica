

                    <?php $info_empresa_partner = $this->ion_auth->info_partner_todo(); ?>
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Mercado</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                                
                                <form action="<?= site_url('/mercado/index') ?>" id="form_buscar_mas"  method="POST">
                                    <input type="search" name="tx_buscar_producto" id="tx_buscar_producto" class="form-control form-control-sm" placeholder="Buscar">

                                </form>
             
  
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

                                <div class="col-lg-1"></div>

                                <div class="col-lg-10">


                                      <div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom card-stretch">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label text-info">Ficha <small>ficha del producto</small></h3>
                </div>
            </div>
            <div class="card-body">
                <?php if($producto_especifico->num_rows() > 0): ?>
                 <?php $con = 0; foreach ($producto_especifico->result() as $row): $con ++; ?>
                 <h4 class="text-dark text-hover-info"><?php echo $row->nb_producto_sicm; ?></h4>




                                      <?php $info_producto_especificaciones =  $this->mercado_library->get_info_producto_especificaciones($row->nb_producto_sicm); 
                                       $info_actual = $this->mercado_library->get_info_producto_mercado_actual($row->nb_producto_sicm);
                                        if(!is_null($info_producto_especificaciones)):
                                      ?>
                                        <p>Laboratorio: <?php echo $info_producto_especificaciones->nb_fabricante; ?>, Código de producto: <?php echo $info_producto_especificaciones->co_producto; endif; ?>  </p>

                                         <p>El producto se establece en: <b><?php echo number_format($info_actual->promedio, 2,',','.'); ?>  Bs</b></p>
                                         <h4> <?php 

                        if (is_null($info_actual)): $ca_precio_actual = 0; else: $ca_precio_actual = $info_actual->promedio; endif

                ?> </h4>

   <div class="separator separator-solid"></div>

                                        <table class="table table-bordered table-sm">
                                                <thead>
                                                    <tr>
                                                        <th> MINIMO </th>
                                                        <th> MÁXIMO </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                               
                                                    <tr>
                                                        <td> <?php echo number_format($info_actual->min_precio, 2,',','.'); ?> Bs </td>
                                                        <td> <?php echo number_format($info_actual->max_precio, 2,',','.'); ?> Bs </td>
                                                    </tr>

                                                    
                                                </tbody>
                                            </table>

                                            <h4>Movimiento promedio de unidades en el mercado</h4>
                                            <h4><b><?php echo number_format($info_actual->ca_unidades, 0,',','.'); ?></b></h4>

                                 <?php endforeach; ?>
                                  <?php endif; ?>



            </div>
        </div>
        <!--end::Card-->
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


<script type="text/javascript" language="JavaScript">

    
if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}


     function ver_producto_mercado(nb_producto) {
   
   
            $('<input />').attr('type', 'hidden')
     .attr('name', "nb_producto")
     .attr('value', nb_producto)
     .appendTo('#form_buscar_producto_mercado');
      $("#form_buscar_producto_mercado").submit();
   
      }

          function buscar_adyacente(nb_buscar)

    {




    }
   

   </script>