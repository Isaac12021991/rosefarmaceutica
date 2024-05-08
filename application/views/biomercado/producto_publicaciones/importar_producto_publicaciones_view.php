
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
                                                <a href="" class="text-muted">Importar</a>
                                            </li>
                                        </ul>

                            <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','FARMACIA','CLINICA'")): ?> 
                         <?php if($this->usuario_library->permiso_empresa("'Administrador','Compras'")): ?>

                                    <a href="<?php echo site_url('compra/orden_compra')?>" class="font-weight-bolder btn-sm mr-2">Mis Compras</a>
                                
                                <?php endif; ?>
                                <?php endif; ?>
                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                                
                            <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','LABORATORIO','CASA DE REPRESENTACION'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador','Ventas'")): ?> 
                                <?php if($this->ion_auth->in_empresa_activado() == 1): ?>
                               <a onclick="importar_producto_masivo()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>
                                <?php endif; ?>
                                                                        
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
                                            Importar
                                            <small>Cargue grande cantidades de registros</small>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                    <form action="<?php echo base_url("producto_publicaciones/cargar_excel")?>" id="importar_producto" class="form" role="form" method="post" enctype="multipart/form-data">

                                             <div class="card-body">

                                                <div class="row">

                                                 <div class="col-lg-6">

                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Subir Fichero:</label>
                                               <div class="col-9">
                                                <div class="custom-file">
                                                            <input type="file" name="file" class="custom-file-input" id="customFile">
                                                            <label class="custom-file-label selected" for="customFile"></label>
                                                        </div>
                                               </div>
                                              </div>


                                          </div>

                                           <div class="col-lg-6">

                                                     <p>Formato del excel para subir correctamente:</p>
                                                     <div class="table-responsive">
                                                    <table class="table" border=1>
                                                        <thead>
                                                        <tr>
                                                            <td>Producto</td><td>Descripcion</td><td>Precio</td><td>Disponible</td><td>Vencimiento</td>
                                                        </tr>
                                                        </thead>
                                                    </table>
                                                    </div>


                                         <div class="form-group row mb-2">
                                           <label  class="col-3 col-form-label">Nacional o importado:</label>
                                           <div class="col-9">
                                              <select class="form-control" id="nb_origen_producto" name="nb_origen_producto">
                                                <option value="">No especificar</option>
                                              <option value="Nacional">Nacional</option>
                                              <option value="Importado">Importado</option>
                                            </select> 
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
</ul>
<div class="tab-content mt-5" id="myTabContent">
    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_2">
    
                                                    <div class="row">
                                                 <div class="col-lg-6">


                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Categoria:</label>
                                               <div class="col-9">
                                                             <select class="form-control input-sm" id="nb_categoria" name="nb_categoria">
                                                            <option value="">No especificar</option>
                                                        <?php foreach($categoria->result() as $row){
                                                             echo "<option value='".$row->nb_categoria."'>".$row->nb_categoria."</option>";
                                                        } ?>
                                                             </select>  
                                               </div>
                                              </div>
                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Modo de pago:</label>
                                               <div class="col-9">
                                            <select class="form-control input-sm" id="nb_tipo_pago" name="nb_tipo_pago">
                                                    <option value="">No especificar</option>
                                                <?php foreach($tipo_pago->result() as $row){
                                                     echo "<option value='".$row->nb_tipo_pago."'>".$row->nb_tipo_pago."</option>";
                                                } ?>
                                                </select>  
                                               </div>
                                              </div>

                                              
                                            <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Pedido mínimo:</label>
                                               <div class="col-9">
                                                 <input type="number" name="ca_pedido_minimo" id="ca_pedido_minimo" class="form-control" min="1" placeholder="0" value="1"> 
                                               </div>
                                              </div>

                                                 <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Multiplo de:</label>
                                               <div class="col-9">
                                                 <input type="number" name="ca_multiplo" id="ca_multiplo" class="form-control" min="1" placeholder="0" value="1"> 
                                               </div>
                                              </div>


                                                 </div>
                                                 <div class="col-lg-6">

                                        <div class="form-group row mb-2">
                                           <label  class="col-3 col-form-label">Moneda:</label>
                                           <div class="col-9">
                                                <select class="form-control input-sm" id="co_moneda" name="co_moneda">
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
                                           <label  class="col-3 col-form-label">Tipo de venta:</label>
                                           <div class="col-9">
                                              <select class="form-control input-sm" id="nb_tipo_venta" name="nb_tipo_venta">
                                              <option value="Venta directa">Venta directa</option>
                                              <option value="Subasta">Subasta</option>
                                            </select> 
                                           </div>
                                          </div>


                                          <div class="form-group row mb-2">
                                           <label  class="col-3 col-form-label">Forma de entrega:</label>
                                           <div class="col-9">
                                             <select class="form-control input-sm" id="nb_forma_entrega" name="nb_forma_entrega">
                                                    <option value="">No especificar</option>
                                                <?php foreach($forma_entrega->result() as $row){
                                                     echo "<option value='".$row->nb_forma_entrega."'>".$row->nb_forma_entrega."</option>";
                                                } ?>
                                                </select>  
                                           </div>
                                          </div>

                                                                                                                              <div class="form-group row mb-2">
                                           <label  class="col-3 col-form-label">Forma de envío:</label>
                                           <div class="col-9">
                                             <select class="form-control js-forma_envio" id="nb_forma_envio" multiple="multiple" name="nb_forma_envio">
                                                    <option value="">No especificar</option>
                                                <?php foreach($forma_envio->result() as $row){
                                                     echo "<option value='".$row->nb_forma_envio."'>".$row->nb_forma_envio."</option>";
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
           <label  class="col-3 col-form-label">Estatus:</label>
           <div class="col-9">
              <select class="form-control form-control-solid" id="nb_estatus" name="nb_estatus">
              <option value="Publicado">Publicar producto en cartelera</option>
              <option value="No Publicado">No publicar</option>
              <option value="Borrador">Dejar en Borrador</option>
            </select> 
           </div>
          </div>

                        <div class="form-group row mb-2">
       <label  class="col-lg-3 col-form-label">Ubicacion:</label>
       <div class="col-lg-9">
            <select class="form-control js-example-basic-single" id="nb_estado" name="nb_estado" multiple="multiple" style="width: 100%">

            <?php foreach($ubicacion->result() as $row){
            echo "<option selected='selected' value='".$row->nb_estado."'>".$row->nb_estado."</option>";
            } ?>
            </select>   
       </div>
      </div>


            </div>
            <div class="col-lg-6">

                            <div class="form-group row mb-2">
           <label  class="col-3 col-form-label">Vencimiento de la publicación:</label>
           <div class="col-9">
               <input type="text" name="ff_vence_publicacion" id="ff_vence_publicacion" class="form-control input-sm date_picker_top" autocomplete="off" placeholder="Vence" value=""> 
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

           $('.js-example-basic-single').select2();

           $('.js-forma_envio').select2();

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



   function importar_producto_masivo()
   {

        KTApp.blockPage({
              overlayColor: 'black',
              opacity: 0.2,
              state: 'primary' // a bootstrap color
             });

    $('#importar_producto').submit();

   }
   
   

   
   
                                      
</script>