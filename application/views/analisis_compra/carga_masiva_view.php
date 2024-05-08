
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
                                                <a href="" class="text-muted">Importar</a>
                                            </li>
                                        </ul>
                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                                
                            <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','FARMACIA','CLINICA'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador','Compras'")): ?> 

                                <?php if($this->ion_auth->in_empresa_activado() == 1): ?>

                               <a onclick="importar_lista_analisis_compra_masivo()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>
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
                                        
                                    <form action="<?php echo base_url("analisis_compra/cargar_excel")?>" id="importar_lista_analisis_compra" class="form" role="form" method="post" enctype="multipart/form-data">

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
                                                    <table class="table  table-sm" border=1>
                                                        <thead>
                                                        <tr class="text-center">
                                                            <th>A</th><th>B</th><th>C</th><th>D</th><th>E</th><th>F</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Producto</td><td>Descripcion</td><td>Precio</td><td>Unidad Manejo</td><td>Vence</td><td>Fabricante</td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                    </div>

                                                    <span class="text-center text-dark">Informacion: la Columna A - Producto es el punto de compraracion para todas las lista, si desea comparar un producto, <b> el nombre del "PRODUCTO DEBE DE ESTAR ESCRITO IGUAL" </b></span>




                                           </div>
                                           </div>

                                           <div class="row">

                                            <div class="col-lg-12">
                                            
                 <ul class="nav nav-tabs nav-tabs-line">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">Informacion General</a>
    </li>

</ul>
<div class="tab-content mt-5" id="myTabContent">
    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_2">
    
                                                    <div class="row">
                                                 <div class="col-lg-6">

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Empresa:</label>
                                               <div class="col-9">
                                            <input type="text" name="nb_empresa" id="nb_empresa" class="form-control form-control-lg form-control-solid" placeholder="Nombre de la empresa" value=""> 
                                               </div>
                                              </div>


                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Nombre de la lista:</label>
                                               <div class="col-9">
                                            <input type="text" name="nb_lista" id="nb_lista" class="form-control form-control-lg form-control-solid" placeholder="Nombre unico de la lista de precio" value=""> 
                                               </div>
                                              </div>

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 pl-lg-4 pr-lg-4 pl-0 pr-0 col-form-label">Descripcion:</label>
                                               <div class="col-9 pl-lg-4 pr-lg-4 pl-0 pr-0">
                                                 <textarea class="form-control form-control-solid" maxlength="50" id="tx_descripcion" name="tx_descripcion" placeholder="Indique alguna observacion importante"></textarea>
                                               </div>
                                              </div>




                                                 </div>
                                                 <div class="col-lg-6">

                                                  <div class="form-group row mb-2">
                                           <label  class="col-lg-3 col-form-label">Ubicacion:</label>
                                           <div class="col-lg-9">
                                                <select class="form-control" id="nb_estado" name="nb_estado" style="width: 100%">

                                                <?php foreach($ubicacion->result() as $row){
                                                echo "<option value='".$row->nb_estado."'>".$row->nb_estado."</option>";
                                                } ?>
                                                </select>   
                                           </div>
                                          </div>


                                        <div class="form-group row mb-2">
                                           <label  class="col-3 col-form-label">Moneda:</label>
                                           <div class="col-9">
                                                <select class="form-control" id="co_moneda" name="co_moneda">
                                                <?php foreach($lista_monedas->result() as $row){
                                                if($row->nb_moneda == 'DOLARES'):
                                                echo "<option selected='selected' value='".$row->id."'>".$row->nb_moneda."</option>";
                                                continue;
                                                endif;
                                                echo "<option value='".$row->id."'>".$row->nb_moneda."</option>";
                                                } ?>
                                                </select>   
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


                 }); // Fin ready



   function importar_lista_analisis_compra_masivo()
   {

        KTApp.blockPage({
              overlayColor: 'black',
              opacity: 0.2,
              state: 'primary' // a bootstrap color
             });

    $('#importar_lista_analisis_compra').submit();

   }
   
   

   
   
                                      
</script>