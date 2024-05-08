<div class="modal-header p-6">
                <h5 class="modal-title" id="exampleModalLabel">Elegir empresas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body pb-0">

              <div class="row justify-content-center my-2 px-2 my-lg-0 px-lg-2">
                        <div class="col-xl-12 col-xxl-7">

                                     <div class="card-body pt-0 pl-0">

                                                                 <?php if (isset($partner)) : ?>
                                                                    <?php if ($partner->num_rows() > 0) : ?>

                                                                    <?php foreach ($partner->result() as $row): ?>

                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-4">
                                                    <!--begin::Bullet-->
                                                     <?php if($this->ion_auth->co_partner() == $row->id):?> 
                                                    <span class="bullet bullet-bar bg-success align-self-stretch"></span>
                                                <?php else: ?>
                                                    <span class="bullet bullet-bar bg-primary align-self-stretch"></span>
                                                <?php endif; ?>
                                                    <!--end::Bullet-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 ml-5">
                                                        <a href="javascript:" onclick="cambiar_partner(<?php echo $row->id; ?>)" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">

                                                           <?php echo $row->nb_tipo_empresa; ?> <?php echo $row->nb_empresa; ?> (<?php echo $row->nb_estado; ?> )</a>

                                                    </div>
                                                    <!--end::Text-->
                                                    <!--begin::Dropdown-->
                                                     <?php if($this->ion_auth->co_partner() == $row->id):?> 
                                                      <i class="far fa-dot-circle text-success font-size-h3"></i> 
                                                     <?php else: ?>
                                                    <i class="far fa-circle font-size-h3"></i> 
                                                  <?php endif; ?>
                                                    <!--end::Dropdown-->
                                                </div>

                                            <?php endforeach; ?>

                                            <?php else: ?>

                                                <h4>Sin empresas registradas</h4>

                                            <?php endif; ?>
                                            <?php endif; ?>
                                                <!--end:Item-->
                                                <!--end::Item-->
                                            </div>


                               

                        </div>


                      </div>







            </div>

            <div class="modal-footer p-0">

            </div>




  <script type="text/javascript">


     function cambiar_partner(co_partner)
   {
   

             $.ajax({
   method: "POST",
   data: {'co_partner':co_partner},
   url: "<?php echo site_url('partner/cambiar_partner') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
           location.reload();
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 

   
   
   
   }


  </script>