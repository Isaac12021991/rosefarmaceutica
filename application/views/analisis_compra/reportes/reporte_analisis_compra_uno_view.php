
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
                                    <h5 id="controlador" class="text-dark font-weight-bold mt-2 mb-2 mr-5">Analisis de compra</h5>
                                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="javascript:" class="text-muted">Analisis</a>
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

                                    
                                 <div class="col-lg-12 pt-lg-0 pl-lg-4 pr-lg-4 pt-2 pl-0 pr-0 mb-6">


                                                                            <div class="card card-custom card-stretch">
                                            <!--begin::Header-->
                                            <div class="card-header py-3">
                                                <div class="card-title align-items-start flex-column">
                                                    <h3 class="card-label font-weight-bolder text-dark">Analisis de compra</h3>
                                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Analisis 1</span>
                                                </div>
                                                <div class="card-toolbar">

                                                
      
                                                </div>
                                            </div>
                                            <!--end::Header-->

                                                <!--begin::Body-->
                                                <div class="card-body pl-lg-4 pr-lg-4 pl-0 pr-0 pt-lg-4 pt-0">

                                                      <?php if ($resultado_busqueda->num_rows() > 0) : ?>
                  <div class="table-responsive">
             <table class="table table-sm" id="table_1" width="100%">
               <thead class="thead-light">
                  <tr>
                    <th width="5%"></th>
                     <th width="12%">Empresa</th>
                     <th width="12%">Lista</th>
                     <th width="30%">Producto</th>
                     <th width="10%">Unidad de manejo</th>
                     <th width="10%">Precio</th>
                     <th width="10%">Moneda</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $con = 0;  ?>
                  <?php foreach ($resultado_busqueda->result() as $row) : $con ++; ?>
                  <tr>
                     <td><?php echo $con; ?> </td>
                     <td><?php echo $row->nb_empresa; ?> </td>
                     <td><?php echo $row->nb_lista; ?> </td>
                     <td><?php echo $row->nb_producto; 
      $info_producto = $this->analisis_compra_library->get_info_producto_co_analisis_compra_linea($row->id); ?> 
                <?php if ($info_producto->tx_descripcion != ''): ?>
                           <br> <span style="font-size:11px;"><?php echo $info_producto->tx_descripcion; ?> </span><br>
                <?php endif; ?>
                <?php if ($info_producto->vence != ''): ?>
                            <span style="font-size:11px;"><?php echo $info_producto->vence; ?> </span><br>
                <?php endif; ?>
                <?php if ($info_producto->tx_fabricante != ''): ?>
                            <span style="font-size:11px;"> <?php echo $info_producto->tx_fabricante; ?> </span>
                <?php endif; ?>
                   </td>
                     <td><?php echo $row->ca_unidad_manejo; ?></td>
                     <td><?php echo $row->ca_precio; ?></td>
                     <td><?php echo $row->nb_moneda; ?></td>
                  </tr>
                  <?php endforeach; ?>   
               </tbody>
            </table>
        </div>
            <?php else: ?>
            <h4>Sin registro</h4>
            <p></p>
            <?php endif; ?>

                                                </div>
                                                <!--end::Body-->
                                            
                                            <!--end::Form-->
                                        </div>





        

                                </div>



                                                                 <div class="col-lg-12 pt-lg-0 pl-lg-4 pr-lg-4 pt-2 pl-0 pr-0 mb-6">


                                                                            <div class="card card-custom card-stretch">
                                            <!--begin::Header-->
                                            <div class="card-header py-3">
                                                <div class="card-title align-items-start flex-column">
                                                    <h3 class="card-label font-weight-bolder text-dark">Analisis de compra</h3>
                                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Analisis 2</span>
                                                </div>
                                                <div class="card-toolbar">

                                                
      
                                                </div>
                                            </div>
                                            <!--end::Header-->

                                                <!--begin::Body-->
                                                <div class="card-body pl-lg-4 pr-lg-4 pl-0 pr-0 pt-lg-4 pt-0">

  <?php if ($resultado_busqueda_dos->num_rows() > 0) : ?>
    <div class="table-responsive">
             <table class="table table-sm" id="table_1" width="100%">
               <thead class="thead-light">
                
                  <tr>
                    <th width="20%">PRODUCTO</th>
                    <?php foreach ($resultado_busqueda_dos->result() as $row) : ?>
                     <th><?php echo $row->nb_empresa; ?></th>
                      <?php endforeach; ?>  
                  </tr>
                 
               </thead>
               <tbody>
                 <?php foreach ($produtos_comparar->result() as $row_principal): ?>
                  <tr>
                 
                     <td><?php echo $row_principal->nb_producto; ?> </td>
                     
                     
                    <?php foreach ($resultado_busqueda_dos->result() as $row) : ?>

                      <?php $info_producto = $this->analisis_compra_library->info_producto_compra($row->nb_empresa, $row_principal->nb_producto); ?>


                    <?php if ($info_producto->num_rows() > 0): 

                        $info_producto_obtenido = $info_producto->row();

                    if($info_producto_obtenido->max_ca_precio == $info_producto_obtenido->ca_precio): ?>
                     <td class="bg-danger">
                     <?php elseif($info_producto_obtenido->min_ca_precio == $info_producto_obtenido->ca_precio): ?>
                      <td class="bg-success">
                        <?php else: ?>
                        <td>
                       <?php endif; ?>


                      <?php echo $info_producto_obtenido->ca_precio;

                     else: ?>
                      <td>
                      <?php echo 'N/D';

                     endif; ?> 
                   </td>
                      <?php endforeach; ?>  
                  </tr>
                   <?php endforeach; ?>  
               </tbody>
            </table>
        </div>
            <?php else: ?>
            <h4>Sin registro</h4>
            <p></p>
            <?php endif; ?>

                                                    
                                                </div>
                                                <!--end::Body-->
                                            
                                            <!--end::Form-->
                                        </div>





        

                                </div>







                                                                                       <div class="col-lg-12 pt-lg-0 pl-lg-4 pr-lg-4 pt-2 pl-0 pr-0 mb-6">


                                                                            <div class="card card-custom card-stretch">
                                            <!--begin::Header-->
                                            <div class="card-header py-3">
                                                <div class="card-title align-items-start flex-column">
                                                    <h3 class="card-label font-weight-bolder text-dark">Analisis de compra</h3>
                                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Analisis 3</span>
                                                </div>
                                                <div class="card-toolbar">

                                                
      
                                                </div>
                                            </div>
                                            <!--end::Header-->

                                                <!--begin::Body-->
                                                <div class="card-body pl-lg-4 pr-lg-4 pl-0 pr-0 pt-lg-4 pt-0">

       <?php if ($resultado_busqueda_dos->num_rows() > 0) : ?>
        <div class="table-responsive">
            <table class="table table-sm" id="table_1" width="100%">
               <thead class="thead-light">
                
                  <tr>
                    <th width="20%">PRODUCTO</th>
                    <th width="20%">Precio mas bajo</th>
                    <th width="20%">compra mas bajo</th>
                    <th width="20%">Precio mas alto</th>
                    <th width="20%">compra mas alto</th>
                    <th width="10%">Diferencia</th>

                  </tr>
                 
               </thead>
               <tbody>
                 <?php foreach ($produtos_comparar->result() as $row_principal): ?>
                  <tr>
                 
                     <td><?php echo $row_principal->nb_producto; ?> </td>

                      <?php $info_producto_precio_minimo = $this->analisis_compra_library->info_producto_compra_comparacion_precio_minimo($row_principal->nb_producto); ?>

                      <td><?php echo $info_producto_precio_minimo->ca_precio; ?> </td>

                      <td><?php echo $info_producto_precio_minimo->nb_empresa; ?> </td>


                      <?php $info_producto_precio_maximo = $this->analisis_compra_library->info_producto_compra_comparacion_precio_maximo($row_principal->nb_producto); ?>

                      <td><?php echo $info_producto_precio_maximo->ca_precio; ?> </td>

                      <td><?php echo $info_producto_precio_maximo->nb_empresa; ?> </td>

                      <td><?php echo $diferencia = $info_producto_precio_maximo->ca_precio - $info_producto_precio_minimo->ca_precio; ?> </td>
                  </tr>
                   <?php endforeach; ?>  
               </tbody>
            </table>
            </div>
            <?php else: ?>
            <h4>Sin registro</h4>
            <p></p>
            <?php endif; ?>


                                                    
                                                </div>
                                                <!--end::Body-->
                                            
                                            <!--end::Form-->
                                        </div>





        

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


      document.title = 'Analisis de compra';


   
  

</script>
