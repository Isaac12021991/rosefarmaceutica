
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
                                    <h5 id="controlador" class="text-dark font-weight-bold mt-2 mb-2 mr-5">Productos</h5>
                                    
                                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="javascript::" class="text-muted">Informacion</a>
                                            </li>
                                        </ul>

                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                                
                            <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','LABORATORIO','CASA DE REPRESENTACION'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador','Ventas'")): ?> 
                                    
                                <a onclick="editar_producto_publicaciones()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

                                <a href="javascript:window.history.back();" class="btn btn-clean font-weight-bolder btn-sm mr-2">Descartar</a>
                                
                                       
                                    <?php endif; ?>
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

                                                                    <div class="card card-custom gutter-b">
                                    <div class="card-body">
                                        <!--begin::Details-->
                                        <div class="d-flex mb-9">
                                            <!--begin: Pic-->
                                            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                                                <div class="symbol symbol-50 symbol-lg-120">
                                                    <img src="<?php echo $info_producto_publicaciones->nb_url_foto; ?>" alt="image" />
                                                </div>
                                                <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                                    <span class="font-size-h3 symbol-label font-weight-boldest">J</span>
                                                </div>
                                            </div>
                                            <!--end::Pic-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <!--begin::Title-->
                                                <div class="d-flex justify-content-between flex-wrap mt-1">
                                                    <div class="d-flex mr-3">
                                                        <a href="<?php echo site_url("producto_publicaciones/editar_producto_publicaciones/$info_producto_publicaciones->id");?>" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3"><?php echo $info_producto_publicaciones->nb_producto; ?></a>
                                                    </div>
                                                    <div class="my-lg-0 my-3">

                                                    </div>
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Content-->
                                                <div class="d-flex flex-wrap justify-content-between mt-1">
                                                    <div class="d-flex flex-column flex-grow-1 pr-8">
                                                        <div class="d-flex flex-wrap mb-4">
                                                            <a href="javascript:" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                            <i class="fas fa-dollar-sign mr-2 font-size-lg"></i><?php echo $info_producto_publicaciones->ca_precio; ?>
                                                        </a>
                                                            <a href="javascript:" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                            <i class="fas fa-dolly mr-2 font-size-lg"></i><?php echo $info_producto_publicaciones->ca_disponible; ?></a>
                                                            <a href="javascript:" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                            <i class="fab fa-buffer mr-2 font-size-lg"></i><?php echo $info_producto_publicaciones->nb_estatus; ?></a>

                                                            <a href="javascript:" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                            <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>Inicio: <?php echo date("d-m-Y g:i:s a", $info_producto_publicaciones->ff_inicio_publicacion); ?></a>

                                                             <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                            <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>Fin:
                                                            <?php echo date("d-m-Y g:i:s a", $info_producto_publicaciones->ff_vence_publicacion); ?>
                                                        </a>
            
                             
                                                        </div>
                                                        <span class="font-weight-bold text-dark-50"><?php echo $info_producto_publicaciones->tx_descripcion; ?></span>
                                                        <span class="font-weight-bold text-dark-50"><?php echo $info_producto_publicaciones->nb_categoria; ?> <?php echo $info_producto_publicaciones->nb_forma_entrega; ?> <?php echo $info_producto_publicaciones->nb_tipo_pago; ?> <?php echo $info_producto_publicaciones->nb_tipo_venta; ?></span>
                                                    </div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Details-->
                                        <div class="separator separator-solid"></div>
                                        <!--begin::Items-->
                                        <div class="d-flex align-items-center flex-wrap mt-8">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                                <span class="mr-4">
                                                    <i class="flaticon-piggy-bank display-4 text-muted font-weight-bold"></i>
                                                </span>
                                                <div class="d-flex flex-column text-dark-75">
                                                    <span class="font-weight-bolder font-size-sm">Ventas</span>
                                                    <span class="font-weight-bolder font-size-h5">
                                                    <span class="text-dark-50 font-weight-bold">$</span><?php echo $estadistica->ca_monto_vendido; ?></span>
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                                <span class="mr-4">
                                                    <i class="flaticon-confetti display-4 text-muted font-weight-bold"></i>
                                                </span>
                                                <div class="d-flex flex-column text-dark-75">
                                                    <span class="font-weight-bolder font-size-sm">Usuario Responsable</span>
                                                    <span class="font-weight-bolder font-size-h5">
                                                    <span class="text-dark-50 font-weight-bold"></span> <?php echo $info_producto_publicaciones->first_name; ?> <?php echo $info_producto_publicaciones->last_name; ?></span>
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                                <span class="mr-4">
                                                    <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
                                                </span>
                                                <div class="d-flex flex-column text-dark-75">
                                                    <span class="font-weight-bolder font-size-sm">Usuarios alcanzados</span>
                                                    <span class="font-weight-bolder font-size-h5">
                                                    <span class="text-dark-50 font-weight-bold"></span><?php echo $estadistica->ca_visita_producto; ?></span>
                                                </div>
                                            </div>


                                            <!--end::Item-->
                                        </div>
                                        <!--begin::Items-->
                                    </div>
                                </div>

                                                                <div class="row">
                                    <div class="col-lg-8">


                                        <div class="card card-custom">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <span class="card-icon">
                                                        <i class="flaticon2-line-chart text-primary"></i>
                                                    </span>
                                                    <h3 class="card-label">Inventario
                                                    <small>Movimiento del producto</small></h3>
                                                </div>
                                            </div>
                                            <div class="card-body">

            <?php $con = 0; $ca_saldo_final = 0; ?>
             <?php if ($inventario->num_rows() > 0) : ?>
        <div class="table-responsive">
        <table class="table table-sm">
    <thead>
        <tr>
            <th scope="col">#</th>
         <th width="20%">Fecha</th>
         <th width="20%">Movimiento</th>
         <th width="20%">Descripcion</th>
         <th width="10%">Entrada</th>
         <th width="10%">Salida</th>
         <th width="10%">Restante</th>
        </tr>
    </thead>
    <tbody>
<?php foreach ($inventario->result() as $row) : $con ++; ?>
        <tr>
            <th scope="row"><?php echo $con; ?></th>
            <td> <?php echo date("d-m-Y g:i:s a", $row->ff_sistema_time); ?></td>
            <td><?php echo $row->nb_tipo_movimiento; ?></td>
            <td><?php echo $row->tx_descripcion; ?></td>
            <td><?php if($row->nb_movimiento == 'ENTRADA'): echo $row->ca_unidades; else: echo '0'; endif;  ?></td>
            <td><?php if($row->nb_movimiento == 'SALIDA'): echo $row->ca_unidades; else: echo '0'; endif;  ?></td>
            <td><?php echo $ca_saldo_final += $row->ca_unidades; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th scope="row"></th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Disponible:</b></td>
            <td><?php echo $ca_saldo_final; ?></td>
        </tr>

    </tfoot>
</table>
</div>

  <?php else: ?>

 <?php endif; ?>




                                        </div>
                                        </div>
                                        


                                    </div>

                                    <div class="col-lg-4">

                                        

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



<script type="text/javascript">



      $(document).ready(function(){

        
        $('#tx_descripcion').maxlength({
            threshold: 20
        });

        $('.js-example-basic-single').select2();

$('.date_picker').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    enableOnReadonly: true,
    orientation: "bottom",
    startDate: '1d'
    });


$('.date_picker_top').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    enableOnReadonly: true,
    orientation: "top",
    startDate: '1d'
    });


                 }); // Fin ready



<?php if($info_producto_publicaciones->nb_estatus == 'Publicado' or $info_producto_publicaciones->nb_estatus == 'Borrador'): ?>
$('#nb_estatus').val('<?php echo $info_producto_publicaciones->nb_estatus; ?>')
<?php endif; ?>

$('#co_moneda').val('<?php echo $info_producto_publicaciones->co_moneda; ?>')
$('#nb_tipo_venta').val('<?php echo $info_producto_publicaciones->nb_tipo_venta; ?>')

$('#nb_categoria').val('<?php echo $info_producto_publicaciones->nb_categoria; ?>')
$('#nb_tipo_pago').val('<?php echo $info_producto_publicaciones->nb_tipo_pago; ?>')
$('#nb_forma_entrega').val('<?php echo $info_producto_publicaciones->nb_forma_entrega; ?>')


function quitar_foto()
{

    

}

   function editar_producto_publicaciones()
   {               
                  var co_producto_publicaciones = '<?php echo $info_producto_publicaciones->id; ?>';
                  var nb_producto = $('#nb_producto').val();
                  var nb_tipo_venta = $('#nb_tipo_venta').val();
                  var ca_precio = $('#ca_precio').val();
                  var ca_disponible = $('#ca_disponible').val();
                  var nb_estatus = $('#nb_estatus').val();
                  var tx_descripcion = $('#tx_descripcion').val();
                  var ff_vence = $('#ff_vence').val(); 
                  var co_moneda = $('#co_moneda').val();
                  var ff_vence_publicacion = $('#ff_vence_publicacion').val(); 
                  var nb_categoria = $('#nb_categoria').val();
                  var nb_tipo_pago = $('#nb_tipo_pago').val();
                  var nb_forma_entrega = $('#nb_forma_entrega').val(); 
                  var nb_url_foto = document.getElementById('nb_url_foto');
                  var nb_estado = $('#nb_estado').val();

             
         if (nb_producto == '') {
   
            toastr.error("Ingrese el producto", 'Error');
           $('#nb_producto').focus();
            return;
   
       };

                if (ca_precio == '') {
   
            toastr.error("Ingrese el precio", 'Error');
           $('#ca_precio').focus();
            return;
   
       };

             if (nb_estado == '') {
   
            toastr.error("Debe seleccionar la ubicacion de su publicacion", 'Error');
           $('#nb_estado').focus();
            return;
   
       };
   
   
            ca_precio = ca_precio.replace(",",".");

            var file = nb_url_foto.files[0];
            var data = new FormData();

            data.append('mi_archivo', file);
            data.append('nb_producto', nb_producto);
            data.append('nb_tipo_venta', nb_tipo_venta);
            data.append('ca_precio', ca_precio);
            data.append('ca_disponible', ca_disponible);
            data.append('nb_estatus', nb_estatus);
            data.append('ff_vence', ff_vence);
            data.append('tx_descripcion', tx_descripcion);
            data.append('co_moneda', co_moneda);
            data.append('ff_vence_publicacion', ff_vence_publicacion);
            data.append('nb_categoria', nb_categoria);
            data.append('nb_tipo_pago', nb_tipo_pago);
            data.append('nb_forma_entrega', nb_forma_entrega);
            data.append('co_producto_publicaciones', co_producto_publicaciones);
            data.append('nb_estado', nb_estado);

            var url = "<?php echo site_url('producto_publicaciones/ejecutar_editar_producto_publicaciones') ?>";

            
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

                     $(location).attr('href',"<?php echo site_url() ?>producto_publicaciones/index");
   

                       }else{
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 

   
   
   
   }
   

   
   
   
                                      
</script>
