
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
                                                <a href="javascript::" class="text-muted">Editar</a>
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
                                         <div class="card-header">
                                          <div class="card-title">
                                           <h3 class="card-label">
                                            Editar
                                            <small>Editar registro</small>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                            <form class="form">
                                             <div class="card-body">

                                                <div class="row">

                                                 <div class="col-lg-6">

                                               <div class="form-group row mb-2">
                                               <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Producto:</label>
                                               <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                                                <input type="text" name="nb_producto" id="nb_producto" class="form-control form-control-solid" placeholder="Producto" value="<?php echo $info_producto_publicaciones->nb_producto; ?>"> 
                                               </div>
                                              </div>
                                               <div class="form-group row mb-2">
                                               <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Descripcion:</label>
                                               <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                                                 <textarea class="form-control form-control-solid" id="tx_descripcion" maxlength="50" name="tx_descripcion" placeholder="Descripcion del producto"><?php echo $info_producto_publicaciones->tx_descripcion; ?></textarea>
                                               </div>
                                              </div>

                                                                                 <div class="form-group row mb-2">
                                           <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Cod Barra:</label>
                                           <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                                          <input type="text" name="cod_barra " id="cod_barra" class="form-control" placeholder="Codigo de barra" value="<?php echo $info_producto_publicaciones->cod_barra; ?>"> 
                                           </div>
                                          </div>

                                     <div class="form-group row mb-2">
                                           <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Etiquetas:</label>
                                           <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                            
                                            <?php $etiqueta_array = json_decode($info_producto_publicaciones->nb_tags); ?>
                                          <input type="text" name="nb_tags" id="nb_tags" class="form-control" placeholder="Etiquetas" value="<?php if(!is_null($etiqueta_array)):
                                           foreach ($etiqueta_array as $posicion) { echo $posicion->value.','; } endif; ?>"> 

                                        
                                           </div>
                                          </div>

                                          </div>

                                           <div class="col-lg-6">

                                              <div class="form-group row mb-2">
                                               <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Precio:</label>
                                               <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                                                 <input type="text" name="ca_precio" id="ca_precio" class="form-control" placeholder="0,00" value="<?php echo $info_producto_publicaciones->ca_precio; ?>"> 
                                               </div>
                                              </div>

                                               <div class="form-group row mb-2">
                                               <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Disponibilidad:</label>
                                               <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                                                 <input type="number" name="ca_disponible" id="ca_disponible" class="form-control" min="1" placeholder="0" value="<?php echo $info_producto_publicaciones->ca_disponible; ?>" > 
                                               </div>
                                              </div>

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Vence:</label>
                                               <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                                                  <input type="text" name="ff_vence" id="ff_vence" class="form-control date_picker" autocomplete="off" placeholder="Vence" value="<?php echo $info_producto_publicaciones->ff_vence; ?>">
                                               </div>
                                              </div>

                                                                                                                  <div class="form-group row mb-2">
                                           <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Nacional o importado:</label>
                                           <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                                              <select class="form-control" id="nb_origen_producto" name="nb_origen_producto">
                                                <option value="">No especificar</option>
                                              <option value="Nacional">Nacional</option>
                                              <option value="Importado">Importado</option>
                                            </select> 
                                           </div>
                                          </div>

                                                                                   <div class="form-group row mb-2">
                                           <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Registro sanitario:</label>
                                           <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                                          <input type="text" name="nb_permiso_importacion" id="nb_permiso_importacion" class="form-control" placeholder="Registro sanitario o permiso de importacion" value="<?php echo $info_producto_publicaciones->nb_permiso_importacion; ?>"> 
                                           </div>
                                          </div>


                                           </div>
                                           </div>

                                           <div class="row">

                                            <div class="col-lg-12">
                                            
                 <ul class="nav nav-tabs nav-tabs-line">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">Condiciones y pagos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">Publicación</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3">Foto</a>
    </li>
</ul>
<div class="tab-content mt-5" id="myTabContent">
    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_2">
    
                                                    <div class="row">
                                                 <div class="col-lg-6">


                                              <div class="form-group row mb-2">
                                               <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Categoria:</label>
                                               <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                                                             <select class="form-control" id="nb_categoria" name="nb_categoria">
                                                            <option value="">No especificar</option>
                                                        <?php foreach($categoria->result() as $row){
                                                             echo "<option value='".$row->nb_categoria."'>".$row->nb_categoria."</option>";
                                                        } ?>
                                                             </select>  
                                               </div>
                                              </div>
                                              <div class="form-group row mb-2">
                                               <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Modo de pago:</label>
                                               <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                                                 <?php $array_nb_tipo_pago_actual = explode(",", $info_producto_publicaciones->nb_tipo_pago); ?>

                                            <select class="form-control js-modo_pago" id="nb_tipo_pago" name="nb_tipo_pago" multiple="multiple">


                                                <?php  foreach($tipo_pago->result() as $row){
                                                        $in_verificado = 0;
                                                        foreach ($array_nb_tipo_pago_actual as $value) {
                                                            
                                                            if($value == $row->nb_tipo_pago):
                                                            $in_verificado ++;
                                                            echo "<option selected='selected' value='".$row->nb_tipo_pago."'>".$row->nb_tipo_pago."</option>";
                                                            break;
                                                            endif;
                                                        }

                                                        if($in_verificado == 0):
                                                    echo "<option value='".$row->nb_tipo_pago."'>".$row->nb_tipo_pago."</option>";
                                                        endif;
                                                       } ?>

                                                </select>  
                                               </div>
                                              </div>


                                            <div class="form-group row mb-2">
                                               <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Pedido mínimo:</label>
                                               <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                                                 <input type="number" name="ca_pedido_minimo" id="ca_pedido_minimo" class="form-control" min="1" value="<?php echo $info_producto_publicaciones->ca_pedido_minimo; ?>" placeholder="0"> 
                                               </div>
                                              </div>

                                                 <div class="form-group row mb-2">
                                               <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Multiplo de:</label>
                                               <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                                                 <input type="number" name="ca_multiplo" id="ca_multiplo" class="form-control" min="1" placeholder="0" value="<?php echo $info_producto_publicaciones->ca_multiplo; ?>"> 
                                               </div>
                                              </div>


                                                 </div>
                                                 <div class="col-lg-6">

                                        <div class="form-group row mb-2">
                                           <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Moneda:</label>
                                           <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                                                <select class="form-control" id="co_moneda" name="co_moneda">
                                                <?php foreach($moneda->result() as $row){
                                                if($row->nb_moneda == 'DOLARES'):
                                                echo "<option selected='selected' value='".$row->id."'>".$row->nb_moneda."</option>";
                                                continue;
                                                endif;
                                                echo "<option value='".$row->id."'>".$row->nb_moneda."</option>";
                                                } ?>
                                                </select>   
                                           </div>
                                          </div>

                                          <div class="form-group row mb-2">
                                           <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Tipo de venta:</label>
                                           <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                                              <select class="form-control" id="nb_tipo_venta" name="nb_tipo_venta">
                                              <option value="Venta directa">Venta directa</option>
                                              <option value="Subasta">Subasta</option>
                                            </select> 
                                           </div>
                                          </div>


                                          <div class="form-group row mb-2">
                                           <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Forma de entrega:</label>
                                           <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">

                                             <select class="form-control" id="nb_forma_entrega" name="nb_forma_entrega">
                                                    <option value="">No especificar</option>
                                                <?php foreach($forma_entrega->result() as $row){
                                                     echo "<option value='".$row->nb_forma_entrega."'>".$row->nb_forma_entrega."</option>";
                                                } ?>
                                                </select>  
                                           </div>
                                          </div>

                                      <div class="form-group row mb-2">
                                           <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Forma de envío:</label>
                                           <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">

                                            <?php $array_forma_envio_actual = explode(",", $info_producto_publicaciones->nb_forma_envio); ?>

                                             <select class="form-control js-forma_envio" id="nb_forma_envio" multiple="multiple" name="nb_forma_envio">


                                                    <?php  foreach($forma_envio->result() as $row){
                                                        $in_verificado = 0;
                                                        foreach ($array_forma_envio_actual as $value) {
                                                            
                                                            if($value == $row->nb_forma_envio):
                                                            $in_verificado ++;
                                                            echo "<option selected='selected' value='".$row->nb_forma_envio."'>".$row->nb_forma_envio."</option>";
                                                            break;
                                                            endif;
                                                        }

                                                        if($in_verificado == 0):
                                                    echo "<option value='".$row->nb_forma_envio."'>".$row->nb_forma_envio."</option>";
                                                        endif;
                                                       } ?>
                                                </select>  
                                           </div>
                                          </div>


                                                 </div>


                                             </div>


    </div>
    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">
        
            <div class="row">
            <div class="col-lg-6">

            <div class="form-group row mb-2">
           <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Estatus:</label>
           <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
              <select class="form-control form-control-solid" id="nb_estatus" name="nb_estatus">
              <option value="Publicado">Publicar producto en cartelera</option>
              <option value="No Publicado">No publicar</option>
              <option value="Borrador">Dejar en Borrador</option>
            </select> 
           </div>
          </div>
         <?php $array_estado_actual = explode(",", $info_producto_publicaciones->nb_dirigido_ubicacion); ?>
                        <div class="form-group row mb-2">
       <label  class="col-lg-3 col-form-label">Ubicacion:</label>
       <div class="col-lg-9">
            <select class="form-control js-example-basic-single" id="nb_estado" name="nb_estado" multiple="multiple" style="width: 100%">

            <?php  foreach($ubicacion->result() as $row){
                $in_verificado = 0;
                foreach ($array_estado_actual as $value) {
                    
                    if($value == $row->nb_estado):
                    $in_verificado ++;
                    echo "<option selected='selected' value='".$row->nb_estado."'>".$row->nb_estado."</option>";
                    break;
                    endif;
                }

                if($in_verificado == 0):
            echo "<option value='".$row->nb_estado."'>".$row->nb_estado."</option>";
                endif;
               } ?>
            </select>   
       </div>
      </div>


            </div>
            <div class="col-lg-6">

                            <div class="form-group row mb-2">
           <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Vencimiento de la publicación:</label>
           <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
               <input type="text" name="ff_vence_publicacion" id="ff_vence_publicacion" class="form-control date_picker_top" autocomplete="off" placeholder="Vence" value="<?php echo date('d-m-Y', $info_producto_publicaciones->ff_vence_publicacion); ?>"> 
           </div>
          </div>


            </div>
            </div>

    </div>
    <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel" aria-labelledby="kt_tab_pane_3">
            
                    <div class="row">
            <div class="col-lg-6">

                         <div class="form-group row mb-2">
           <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Foto del producto:</label>

           <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                <div class="image-input image-input-outline" id="kt_image_1">
            <div class="image-input-wrapper" style="background-image: url('<?php echo $info_producto_publicaciones->nb_url_foto; ?>');"></div>
            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Cambiar imagen">
                <i class="fa fa-pen icon-sm text-muted"></i>
                <input type="file" name="nb_url_foto" id="nb_url_foto" accept=".png, .jpg, .jpeg">

            </label>
            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancelar foto">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
        </div>

           </div>
          </div>
      </div>

  </div>

 

    </div>
</div>
    </div>


                                           </div>


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



<script type="text/javascript">



      $(document).ready(function(){


    var input = document.querySelector('input[name=nb_tags]');
    new Tagify(input)

        $('#ca_precio').mask('000.000.000.000.000,00', {reverse: true});

        $('#tx_descripcion').maxlength({
            threshold: 20
        });

        $('.js-example-basic-single').select2();


    $('.js-modo_pago').select2({
         tags: "true",
         placeholder: "Seleccione los tipo de pago"
    });

    $('.js-forma_envio').select2({
         tags: "true",
         placeholder: "Seleccione los modo de envio"
    });


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

$('#nb_forma_entrega').val('<?php echo $info_producto_publicaciones->nb_forma_entrega; ?>')


$('#nb_origen_producto').val('<?php echo $info_producto_publicaciones->nb_origen_producto; ?>')



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
                  var ca_pedido_minimo = $('#ca_pedido_minimo').val();
                  var ca_multiplo = $('#ca_multiplo').val();
                  var nb_tags = $('#nb_tags').val();

                  var nb_forma_envio = $('#nb_forma_envio').val();
                  var nb_origen_producto = $('#nb_origen_producto').val();
                  var nb_permiso_importacion = $('#nb_permiso_importacion').val();
                  var cod_barra = $('#cod_barra').val();  

             
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

                       if (ca_precio <= 0) {
             toastr.error("Ingrese el precio", 'Error');
           $('#ca_precio').focus();
            return;
   
       };

               if (ca_disponible == '') {
             toastr.error("Ingrese una cantidad disponible", 'Error');
           $('#ca_disponible').focus();
            return;
   
       };
   

        if (ca_disponible <= 0) {
             toastr.error("Ingrese una cantidad disponible", 'Error');
           $('#ca_disponible').focus();
            return;
   
       };

             if (nb_estado == '') {
   
            toastr.error("Debe seleccionar la ubicacion de su publicacion", 'Error');
           $('#nb_estado').focus();
            return;
   
       };
   
   

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
            data.append('ca_pedido_minimo', ca_pedido_minimo);
            data.append('ca_multiplo', ca_multiplo);
            data.append('nb_tags', nb_tags);

            data.append('nb_forma_envio', nb_forma_envio);
            data.append('nb_origen_producto', nb_origen_producto);
            data.append('nb_permiso_importacion', nb_permiso_importacion);
            data.append('cod_barra', cod_barra);

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
