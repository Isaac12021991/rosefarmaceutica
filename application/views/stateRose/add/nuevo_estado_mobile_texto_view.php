

    <div class="d-flex flex-column flex-root animsition" >
      <!--begin::Error-->
      <div class="d-flex flex-row-fluid flex-column bgi-size-cover bgi-position-center bgi-no-repeat p-10 p-sm-30" id="fondo_vid" style="background-color:#ffaec9;">
        <!--begin::Content-->
                  <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-8">
                          <div class="my-5">
              
                            <div class="form-group row">

                              <div class="col-12 mt-20">

                            <textarea autofocus="autofocus" id="tx_descripcion" name="tx_descripcion" class="form-control text-center" style="width:100%; font-size:40px;  border: none; overflow-y: auto; background: transparent; color:white;" placeholder="Escriba un estado"></textarea>
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
                    
                                    <select id="nb_fondo" name="nb_fondo" class="form-control" style="border: none;  background: transparent;" onchange="cambiar_fondo()">
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

               <div class="col-6  text-right">
                
            <a href="javascript:" onclick="guardar_estado()" class="btn btn-text-primary btn-hover-light-dark font-weight-bold mr-2"><span class="flaticon2-send-1 icon-2x"></span></a>


               </div>

            </div>




<script type="text/javascript">
  var type = 'mensaje';


     $(document).ready(function(){

        autosize($('textarea'));

      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready


function cambiar_fondo() {


   var nb_fondo = $('#nb_fondo').val();


      $('#fondo_vid').css('background-color', nb_fondo);
  


}






   function guardar_estado()
   {


    type = 'mensaje';

    var tx_descripcion = $('#tx_descripcion').val();
    var nb_fondo = $('#nb_fondo').val();


              if (tx_descripcion == '') {
   
          toastr.error("Ingrese algun titulo", 'Error');
           $('#tx_descripcion').focus();
            return;
   
       };



            var data = new FormData();


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