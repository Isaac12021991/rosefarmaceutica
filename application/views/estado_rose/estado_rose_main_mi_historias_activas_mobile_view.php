                 <script src="<?php echo base_url(); ?>assets/plugins/custom/zuck.js-master/src/zuck.js"></script>


                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/zuck.js-master/dist/zuck.css">
                 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/zuck.js-master/dist/skins/vemdezap.css">
                 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/zuck.js-master/dist/skins/snapgram.css">


    <div class="d-flex flex-column flex-root animsition" >
      <!--begin::Error-->
      <div class="d-flex flex-row-fluid flex-column bgi-size-cover bgi-position-center bgi-no-repeat p-10 p-sm-30" style="background-color:white;">
        <!--begin::Content-->
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-8">
                          <div class="my-5">
              
                            <div class="form-group row">

                              <div class="col-12 mt-0">
                
                                  <?php if($mi_estado->num_rows() > 0): ?>

                                                    <?php foreach ($mi_estado->result() as $row): ?>
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-4">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40 symbol-light-primary mr-5 symbol-circle">
                                                        <span class="symbol-label">
                                                            <img src="<?php echo $row->src; ?>" class="h-75 align-self-end" alt="">
                                                        </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                                                        <a href="javascript:" class="text-dark text-hover-primary mb-1 font-size-md"> Hace <?php echo time_stamp(date('Y-m-d H:i:s',$row->time_creado)); ?> </a>
                                                        <span class="text-muted"></span>
                                                    </div>
                                                    <!--end::Text-->

                                                    <a href="javascript:" onclick="eliminar_estado(<?php echo $row->id; ?>)">
                                                       <span class="fas fa-trash font-size-lg"></span>
                                                        </a>
                                                    <!--end::Dropdown-->
                                                </div>

                                                 <?php endforeach; ?>

                                            <?php else: ?>
                                                <h3>Sin estado</h3>
                                                <p class="lead">No tiene estados activos</p>
                                                <p class="">Los estado tienen una duración máxima de 24 horas</p>
                                                <p class="">Puede tener un máximo de 30 estado activos</p>

                                            <?php endif; ?>


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


<script type="text/javascript">





   $(document).ready(function(){

      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready


   //

   

function eliminar_estado(co_estado_rose) {

                  $.ajax({
   method: "POST",
   data: {'co_estado_rose':co_estado_rose},
   url: "<?php echo site_url('estado_rose/eliminar_estado') ?>",
            }).done(function(data) { 

                location.reload();

             }).fail(function(){ }); 
    // body...
}

//   setInterval(actualizar_estado_ajax,1000);



</script>