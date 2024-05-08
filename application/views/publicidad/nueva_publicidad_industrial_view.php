
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Publicaciones</h5>
                                    
                                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="" class="text-muted">Crear</a>
                                            </li>
                                        </ul>

                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                                
                                        <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','CASA DE REPRESENTACION','LABORATORIO'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador'")): ?> 
                                    
                                <a onclick="nueva_publicidad_industrial()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

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

                                <div class="col-lg-10">



                                    <div class="card card-custom gutter-b">
                                         <div class="card-header">
                                          <div class="card-title">
                                           <h3 class="card-label">
                                            Promocionar
                                            <small>Crear promocion</small>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                            <form class="form">
                                             <div class="card-body">

                                                <div class="row">

                                                 <div class="col-lg-6">

                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Publicacion:</label>
                                               <div class="col-9">
                                                <select class="form-control form-control-solid js-example-basic-single" id="co_producto_publicaciones" name="co_producto_publicaciones" style="width: 100%">
                                                <?php foreach($producto_publicaciones->result() as $row){
                                                echo "<option value='".$row->id."'>".$row->nb_producto."</option>";
                                                } ?>
                                                </select>  
                                               </div>
                                              </div>
                                           </div>

                                           <div class="col-lg-6">

                                            <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Descripcion:</label>
                                               <div class="col-9">
                                                 <textarea class="form-control form-control-solid" maxlength="50" id="tx_descripcion" name="tx_descripcion" placeholder="Descripcion de la promocion"></textarea>
                                               </div>
                                              </div>


                                           </div>
                                           </div>

                                           <div class="row">

                                            <div class="col-lg-12">
                                            
                 <ul class="nav nav-tabs nav-tabs-line">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">Criterio</a>
    </li>

</ul>
<div class="tab-content mt-5" id="myTabContent">
    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_1">
    
             <div class="row">
            <div class="col-lg-6">

              <div class="form-group row mb-2">
       <label  class="col-lg-3 col-form-label">Ubicacion:</label>
       <div class="col-lg-9">
            <select class="form-control js-example-basic-single" id="nb_estado" name="nb_estado" multiple="multiple" style="width: 100%">

            <?php foreach($ubicacion->result() as $row){
                if ($this->ion_auth->ubicacion_estado() == $row->nb_estado):
                    echo "<option selected='selected' value='".$row->nb_estado."'>".$row->nb_estado."</option>";
                    continue;
                endif;
            echo "<option value='".$row->nb_estado."'>".$row->nb_estado."</option>";
            } ?>
            </select>   
       </div>
      </div>


            </div>

            <div class="col-lg-6">



                          <div class="form-group row mb-2">
           <label  class="col-3 col-form-label">Dias:</label>
           <div class="col-9">
             <input type="number" name="ca_dias" id="ca_dias" class="form-control" min="1" value="1" onchange="calcular_presupuesto()" onkeyup="calcular_presupuesto()"> 
           </div>
          </div>


            </div>

            </div>

            <div class="separator separator-solid separator-border-2 mt-4"></div>

                         <div class="row mb-6">
            <div class="col-lg-12 py-2">
                <h4  class="font-size-h3 mt-4 mb-0">Presupuesto total</h4>

                                                    <!--begin::Body-->
                <div class="card-body d-flex flex-column">
                    <!--begin::Stats-->
                    <div class="flex-grow-1">
                        <div class="text-dark-50 font-weight-bold">Total $</div>
                        <div class="font-weight-bolder font-size-h3" id="total_presupuesto">0</div>
                    </div>
                    <!--end::Stats-->
                    <!--begin::Progress-->
                    <!--end::Progress-->
                </div>
                                                    <!--end::Body-->
                                      

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

    calcular_presupuesto();


    function calcular_presupuesto() {

        var ca_dias = $('#ca_dias').val();
        var ca_total_presupuesto = ca_dias * 1;
        $('#total_presupuesto').html(ca_total_presupuesto);
        
    }


      $(document).ready(function(){

    $('.js-example-basic-single').select2();


        $('#tx_descripcion').maxlength({
            threshold: 20
        });

                 }); // Fin ready



   function nueva_publicidad_industrial()
   {

                  var co_producto_publicaciones = $('#co_producto_publicaciones').val(); 
                  var tx_descripcion = $('#tx_descripcion').val();
                  var ca_dias = $('#ca_dias').val(); 
                  var nb_estado = $('#nb_estado').val();  

     if (co_producto_publicaciones == '') {
             toastr.error("Seleccione un producto a promocionar", 'Error');
           $('#co_producto_publicaciones').focus();
            return;
   
       };


                if (nb_estado == '') {
             toastr.error("Seleccione la ubicacion de la publicidad", 'Error');
           $('#nb_estado').focus();
            return;
   
       };
   


            var data = new FormData();

            data.append('co_producto_publicaciones', co_producto_publicaciones);
            data.append('tx_descripcion', tx_descripcion);
            data.append('ca_dias', ca_dias);
            data.append('nb_estado', nb_estado);

            var url = "<?php echo site_url('publicidad/agregar_nueva_publicidad_industrial') ?>";

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

                        $(location).attr('href',"<?php echo site_url() ?>publicidad/index");
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 


   
   
   }
   

   
                                      
</script>


