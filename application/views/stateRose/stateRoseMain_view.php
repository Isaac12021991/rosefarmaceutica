              <script type="text/javascript"> 

                var co_usuario = '<?php echo $this->ion_auth->user_id(); ?>'; 

            </script> 

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

           
                               <a href="<?php echo site_url("estado_rose/nuevo_estado_rose");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Crear</a>
                                
            
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

                                <?php if ($infoGetState->num_rows() > 0) : ?>
<?php foreach ($infoGetState->result() as $row) : ?>


  <div class="d-flex align-items-center mb-2 bg-white p-2 bg-hover-gray-100" id="elemento_<?php echo $row->id; ?>">

  <div class="ml-2 d-flex flex-column w-200px mr-0">
    
  <div class="symbol symbol-50 symbol-lg-60 symbol-circle">
        <img alt="Pic" src="media/assets/users/300_11.jpg"/>
    </div>


</div>


</div>


  <?php endforeach; ?>
             <?php endif; ?>

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




</script>
