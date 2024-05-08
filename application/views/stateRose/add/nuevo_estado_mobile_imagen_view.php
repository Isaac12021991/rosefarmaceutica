

    <div class="d-flex flex-column flex-root animsition">
      <!--begin::Error-->
      <div class="d-flex flex-row-fluid flex-column bgi-size-cover bgi-position-center bgi-no-repeat p-10 p-sm-30" id="fondo_vid" style="background-color:white;">
        <!--begin::Content-->
                  <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-8">
                          <div class="my-5">
              
                            <div class="form-group row">

                                <div class="col-12 d-flex justify-content-center">
                                    

                                    <img id="blah" class="text-center" align="center" style="width:80%; height:80%;" src="<?php echo base_url() ?>/img/sin_foto.png" alt="Tu imagen" />

                                </div>

                                    <div class="col-12 mt-0">


                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Subir Imagen:</label>
                                               <div class="col-9">
                                                <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="nb_url_foto" id="nb_url_foto" accept=".png, .jpg, .jpeg">
                                                            <label class="custom-file-label selected" for="customFile"></label>
                                                        </div>
                                               </div>
                                              </div>



                              </div>

                              <div class="col-12 mt-4">

                            <textarea autofocus="autofocus" id="tx_descripcion" name="tx_descripcion" class="form-control text-center" style="width:100%; font-size:12px;  border: none; overflow-y: auto; background: transparent;" placeholder="Escriba alguna descripcion"></textarea>
                              </div>
                            </div>
      
    
                          </div>

                          
                        </div>
                        <div class="col-xl-2"></div>
                      </div>





        <!--end::Content-->
      </div>





      <!--end::Error-->
    </div>



         <div class="d-flex justify-content-between bg-white  pb-10 pt-3" style="bottom:0;">

              <div class="col-6 text-center">
                    


              </div>

               <div class="col-6  text-right">
                
            <a href="javascript:" onclick="guardar_estado()" class="btn btn-text-primary btn-hover-light-dark font-weight-bold mr-2"><span class="flaticon2-send-1 icon-2x"></span></a>


               </div>

            </div>




<script type="text/javascript">
  var type = 'photo';

    $("#nb_url_foto").change(function () {
    readImage(this);
  });



      function readImage (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#blah').attr('src', e.target.result); // Renderizamos la imagen
      }
      reader.readAsDataURL(input.files[0]);
    }
  }


     $(document).ready(function(){

        autosize($('textarea'));

      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready





   function guardar_estado()
   {


    type = 'photo';

    var tx_descripcion = $('#tx_descripcion').val();
    var nb_fondo = $('#nb_fondo').val();



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

                      $(location).attr('href',"<?php echo site_url() ?>estado_rose/mobile_index");
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 


   
   
   }
   


</script>