

                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Indice de precio</h5>
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

                                <div class="col-lg-1">
                                    
                                    
                                </div>

                                <div class="col-lg-10">


                                    <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                    <div class="card-title">
                                    <h3 class="card-label">
                                    Indice de precio en industrias farmaceuticas
                                    <small></small>
                                    </h3>
                                    </div>
                                    </div>
                                    <div class="card-body">
<form action="<?= site_url('/mercado/ver_producto_mercado') ?>" id="form_buscar_producto_mercado"  method="POST">
                                         <?php $con = 0; if (isset($productos)) : ?>
                                                  <?php if($productos->num_rows() > 0): ?>
                                        
                                        <div class="table-responsive">
                                        <table class="table table-sm table-hover" id="kt_datatable">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th> PRODUCTO</th>
                                                        <th> MINIMO </th>
                                                        <th> MÁXIMO </th>
                                                        <th> PRECIO </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $con = 0; foreach ($productos->result() as $row): $con ++; ?>
                                                     <?php $info_actual = $this->mercado_library->get_info_producto_mercado_actual($row->nb_producto_sicm); ?>
                                                    <tr>
                                                        <td> <?php echo $con; ?> </td>
                                                        <td> <a href="javascript:" onclick="ver_producto_mercado('<?php echo $row->nb_producto_sicm; ?>')"><?php echo substr($row->nb_producto_sicm, 0, 50); ?> </a>   </td>
                                                        <td> <?php echo number_format($info_actual->min_precio, 2, ',','.'); ?>  Bs </td>
                                                        <td>  <?php echo number_format($info_actual->max_precio, 2, ',','.'); ?> Bs </td>
                                                        <td>  <?php echo number_format($info_actual->promedio, 2, ',','.'); ?> Bs </td>
                                                     
                                                    </tr>

                                                     <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                           

</form>
                                              <?php else: ?>
                                                  <h4 class="text-info">Sin resultado</h4>
                                                <p>Intente con otro producto</p>   

                                              <?php endif; ?>     

                                                <?php else: ?>

                                                <h4 class="text-info">Sin resultado</h4>
                                                <p>Intente con otro producto</p>           
                            <?php endif; ?>

             <?php if (isset($links)) { ?>
                <?php echo $links ?>
            <?php } ?>

                            




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