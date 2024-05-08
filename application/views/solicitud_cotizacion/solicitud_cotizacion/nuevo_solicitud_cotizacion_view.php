
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
                                    <h5 id="controlador" class="text-dark font-weight-bold mt-2 mb-2 mr-5">Solicitud de cotizacion</h5>
                                    
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

                                        <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','FARMACIA','CLINICA'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador','Compras'")): ?> 
                                    
                                <a onclick="nuevo_solicitud_cotizacion()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

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
                                            Nuevo
                                            <small>Crear nueva solicitud de cotizacion</small>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                            <form class="form">
                                             <div class="card-body">

                                                <div class="row">

                                                 <div class="col-lg-6">

                                                        <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Estatus:</label>
                                               <div class="col-9">
                                                  <select class="form-control input-sm" id="nb_estatus" name="nb_estatus">
                                                  <option value="Abierta">Abierta</option>
                                                  <option value="Borrador">Borrador</option>
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
                               <label  class="col-lg-3 col-form-label">Usuario:</label>
                               <div class="col-lg-9">
                    <input type='text' class='form-control username_seleccionar' name="nb_dirigido_usuario" id="nb_dirigido_usuario" placeholder='Escriba un usuario' value=''>  
                                    <span class="text-dark">Seleccione si desea enviarle la solicitud a un usuario en especifico</span> 
                               </div>
                              </div>

                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Vencimiento de la solicitud:</label>
                                               <div class="col-9">
                                                <input type="text" name="ff_vencimiento" id="ff_vencimiento" class="form-control input-sm date_picker" autocomplete="off" placeholder="Vence" value="">

                                               </div>
                                              </div>

    

                                           </div>
                                           </div>

                                           <div class="row">

                                            <div class="col-lg-12">
                                            
                 <ul class="nav nav-tabs nav-tabs-line">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">Productos</a>
    </li>

</ul>
<div class="tab-content mt-5" id="myTabContent">
    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_2">
    
                                                    <div class="row">
                                                 <div class="col-lg-12">

                                                    <div id="reload_lista_productos"></div>

                                                    <a onclick="agregar_producto()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Agregar productos</a>


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




    <div class="modal fade"  id="ajax_remote" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">
            <h3 align="center" class="text-dark">Cargando...</h3>
        </div>
    </div>
</div>


<script type="text/javascript">


var co_solicitud_cotizacion = 0;


                                function agregar_producto() {

                                $('#ajax_remote').modal('show');
                                 
                            $.get("<?php echo site_url('solicitud_cotizacion/agregar_producto_solicitud_cotizacion') ?>",
                            function(data){
                            if (data != "") {
                               
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }


       $(document).ready(function(){



            var input = document.querySelector('.username_seleccionar');
    tagify = new Tagify(input, {
        enforceWhitelist : true,
        delimiters       : null,
        whitelist        : [<?php echo $username; ?>],
        callbacks        : {
            add    : console.log,  // callback when adding a tag
            remove : console.log   // callback when removing a tag
        }
    });



    $('.js-example-basic-single').select2();


 $("#reload_lista_productos").load('<?php echo site_url('solicitud_cotizacion/lista_productos/') ?>'+co_solicitud_cotizacion);
   
   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('<h3 align="center" class="text-dark">Cargando...</h3>');
   })

      $('.date_picker').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    enableOnReadonly: true,
    orientation: "bottom",
    startDate: '1d'
    });

   

   }); // Fin ready
   
   

   function nuevo_solicitud_cotizacion()
   {

                  var nb_estatus = $('#nb_estatus').val();
                  var ff_vencimiento = $('#ff_vencimiento').val(); 
                  var nb_estado = $('#nb_estado').val();
                  var nb_dirigido_usuario = $('#nb_dirigido_usuario').val();



            var data = new FormData();

            data.append('nb_estado', nb_estado);
            data.append('nb_dirigido_usuario', nb_dirigido_usuario);
            data.append('nb_estatus', nb_estatus);
            data.append('ff_vencimiento', ff_vencimiento);


            var url = "<?php echo site_url('solicitud_cotizacion/ejecutar_nuevo_solicitud_cotizacion') ?>";

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

                     $(location).attr('href',"<?php echo site_url() ?>solicitud_cotizacion/index");
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 


   
   
   }
   

   
                                      
</script>


