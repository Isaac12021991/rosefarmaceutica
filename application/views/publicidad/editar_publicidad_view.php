
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
                                                <a href="" class="text-muted">Editar</a>
                                            </li>
                                        </ul>

                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                                
                                        <?php if($this->usuario_library->permiso_tipo_empresa("'FARMACIA','CLINICA','MEDICO'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador'")): ?> 
                                    
                                <a onclick="editar_publicidad()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

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
                                            Nueva
                                            <small>Crear publicidad</small>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                            <form class="form">
                                             <div class="card-body">

                                                <div class="row">

                                                 <div class="col-lg-6">

                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Descripcion:</label>
                                               <div class="col-9">
                                                 <textarea class="form-control" id="tx_descripcion" maxlength="320"  name="tx_descripcion"><?php echo $info_publicidad->tx_descripcion; ?></textarea>
                                               </div>
                                              </div>

   

                                          </div>

                                           <div class="col-lg-6">

                                                                    <div class="form-group row mb-2">
           <label  class="col-3 col-form-label">Foto:</label>

           <div class="col-9">
                <div class="image-input image-input-outline" id="kt_image_1">
            <div class="image-input-wrapper" style="background-image: url('<?php echo $info_publicidad->nb_url_foto; ?>');"></div>
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

                                           <div class="row">

                                            <div class="col-lg-12">
                                            
                 <ul class="nav nav-tabs nav-tabs-line">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">Criterio</a>
    </li>

</ul>
<div class="tab-content mt-5" id="myTabContent">
    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_2">
    
             <div class="row">
            <div class="col-lg-6">

            <div class="form-group row mb-2">
           <label  class="col-3 col-form-label">Dirigir a:</label>
           <div class="col-9">
              <select class="form-control" id="tx_link_dirigir" name="tx_link_dirigir">
              <option value="Ir al perfil">Ir al perfil</option>
              <option value="Ir al perfil de instagram">Ir al perfil de instagram</option>
              <option value="Llamar">Llamar</option>
              <option value="WhatsApp">WhatsApp</option>
              <option value="Email">Email</option>
              <option value="Pagina web">Pagina web</option>
            </select> 
           </div>
          </div>

              <div class="form-group row mb-2">
       <label  class="col-lg-3 col-form-label">Ubicacion:</label>
       <div class="col-lg-9">
          <?php $array_estado_actual = explode(",", $info_publicidad->tx_ubicacion); ?>
            <select class="form-control js-example-basic-single" id="nb_estado" name="nb_estado" multiple="multiple" style="width: 100%">


                 <?php foreach($ubicacion->result() as $row){
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
               }

            ?>
            </select>   
       </div>
      </div>


            </div>

            <div class="col-lg-6">

                          <div class="form-group row mb-2">
           <label  class="col-3 col-form-label">Link de dirigir:</label>
           <div class="col-9">
             <input type="text" name="tx_link" id="tx_link" class="form-control" value="<?php echo $info_publicidad->tx_link; ?>" placeholder="https:// o +580414"> 
           </div>
          </div>


                          <div class="form-group row mb-2">
           <label  class="col-3 col-form-label">Dias:</label>
           <div class="col-9">
             <input type="number" name="ca_dias" id="ca_dias" class="form-control" min="1" value="<?php echo $info_publicidad->ca_dias; ?>" onchange="calcular_presupuesto()" onkeyup="calcular_presupuesto()"> 
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


    $('#tx_link_dirigir').val('<?php echo $info_publicidad->tx_link_dirigir; ?>');


    calcular_presupuesto();


    function calcular_presupuesto() {

        var ca_dias = $('#ca_dias').val();
        var ca_total_presupuesto = ca_dias * 0.5;
        $('#total_presupuesto').html(ca_total_presupuesto);
        
    }


      $(document).ready(function(){

             $('.js-example-basic-single').select2();


                $('#tx_descripcion').maxlength({
            threshold: 20
        });

   

                 }); // Fin ready



   function editar_publicidad()
   {

                  var tx_descripcion = $('#tx_descripcion').val();
                  var ca_dias = $('#ca_dias').val(); 
                  var tx_link_dirigir = $('#tx_link_dirigir').val();
                  var tx_link = $('#tx_link').val();
                  var nb_url_foto = document.getElementById('nb_url_foto');
                  var nb_estado = $('#nb_estado').val();  

             
         if (tx_descripcion == '') {
   
          toastr.error("Ingrese alguna descripcion del producto o servicio", 'Error');
           $('#tx_descripcion').focus();
            return;
   
       };

                if (nb_estado == '') {
             toastr.error("Seleccione la ubicacion de la publicidad", 'Error');
           $('#nb_estado').focus();
            return;
   
       };
   

            var file = nb_url_foto.files[0];

            var data = new FormData();

            data.append('mi_archivo', file);
            data.append('tx_descripcion', tx_descripcion);
            data.append('ca_dias', ca_dias);
            data.append('tx_link_dirigir', tx_link_dirigir);
            data.append('tx_link', tx_link);
            data.append('nb_estado', nb_estado);
            data.append('co_publicidad', '<?php echo $info_publicidad->id; ?>');

            var url = "<?php echo site_url('publicidad/ejecutar_editar_publicidad') ?>";

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


