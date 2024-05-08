             <script src="<?php echo base_url(); ?>assets/plugins/custom/zuck.js-master/src/zuck.js"></script>


                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/zuck.js-master/dist/zuck.css">
                 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/zuck.js-master/dist/skins/vemdezap.css">
                 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/zuck.js-master/dist/skins/snapgram.css">

                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Estados</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>




        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

           


                               <a href="javascript:" onclick="guardar_estado()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Enviar</a>
                                
            
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
                                    Crear nuevo estado
                                    <small></small>
                                    </h3>
                                    </div>
                                    </div>
                                    <div class="card-body">

                     <div class="row my-2 px-2 my-lg-0 px-lg-2">
                         <div class="col-1"></div>
                        <div class="col-5">

                                                        <p class="lead">¿Que desea enviar?:</p>
                                <div class="form-group mb-2">
                                    <select id="type" name="type" class="form-control" onchange="cambiar_tipo_mensaje()">
                                        <option selected="selected" value="mensaje">Solo Mensaje</option>
                                        <option value="photo">Foto o Imagen</option>
                                        
                                    </select>
                              </div>

                   
                            <p class="lead">Sólo título:</p>
                                <div class="form-group mb-2">
                                <label>Titulo</label>
                                <textarea class="form-control" id="tx_descripcion" rows="0" maxlength="400"></textarea>
                                <span class="form-text text-muted">Ingrese el titulo del estado.</span>
                              </div>

   



                        </div>

                        <div class="col-5">

                                                       <div id="div_fondo">
                                  <div class="form-group mb-2">
                                    <label>Fondo</label>
                                    <select id="nb_fondo" name="nb_fondo" class="form-control">
                                    <option selected="selected" value="#ffaec9">Rosado</option>
                                        <option value="#000000">Negro</option>
                                        <option value="#0000ff">Azul</option>
                                        <option value="#7f7f7f">Gris</option>
                                        <option value="#400000">Marron</option>
                                        <option value="#a349a4">Morado</option>
                                        <option value="#e7121d">Rojo</option>
                                        <option value="#22b14c">Verde</option>
                                    </select>
                              </div>
                            </div>


                              <div id="div_photo" style="display:none;">
                              <p class="lead">Adjuntar imagen:</p>


                              <div class="form-group mb-2">
       

                            <div class="image-input image-input-outline" id="kt_image_1">
                             <div class="image-input-wrapper" style="background-image: url(assets/media/users/100_1.jpg)"></div>

                             <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                              <i class="fa fa-pen icon-sm text-muted"></i>
                              <input type="file" name="nb_url_foto" id="nb_url_foto" accept=".png, .jpg, .jpeg"/>
                              <input type="hidden" name="profile_avatar_remove"/>
                             </label>

                             <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                              <i class="ki ki-bold-close icon-xs text-muted"></i>
                             </span>
                            </div>


                              </div>

                         


                               </div>


                        </div>

                        <div class="col-1"></div>




                      </div>



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


<script type="text/javascript">

    var type = '';



    function cambiar_tipo_mensaje()

    {

        type = $('#type').val();

        if(type == 'photo'){

            $('#div_photo').fadeIn();
            $('#div_fondo').fadeOut();



        }else{
            $('#div_photo').fadeOut();
            $('#div_fondo').fadeIn();

        }


    }





   $(document).ready(function(){

   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready


   

   function guardar_estado()
   {


    type = $('#type').val();

    var tx_descripcion = $('#tx_descripcion').val();
    var nb_fondo = $('#nb_fondo').val();


        if(type == 'mensaje'){

              if (tx_descripcion == '') {
   
          toastr.error("Ingrese algun titulo", 'Error');
           $('#tx_descripcion').focus();
            return;
   
       };



        }
             


   
   
            var file = nb_url_foto.files[0];

            var data = new FormData();

            data.append('mi_archivo', file);
            data.append('tx_descripcion', tx_descripcion);
            data.append('type', type);
            data.append('nb_fondo', nb_fondo);


            var url = "<?php echo site_url('estado_rose/agregar_nuevo_estado') ?>";

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

                      $(location).attr('href',"<?php echo site_url() ?>estado_rose/desktop_index");
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 


   
   
   }
   




</script>
