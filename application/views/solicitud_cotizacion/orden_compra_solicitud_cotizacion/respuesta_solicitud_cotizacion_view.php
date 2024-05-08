                    <?php $info_partner = $this->ion_auth->info_partner_todo(); ?>

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
                                                <a href="" class="text-muted">Ver solicitud</a>
                                            </li>
                                        </ul>

                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-left">

                             <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','LABORATORIO','CASA DE REPRESENTACION'")): ?>    
                            <?php if($this->usuario_library->permiso_empresa("'Administrador','Ventas'")): ?> 
                                    
                                 <a onclick="enviar_solicitud()" class="btn btn-light-success font-weight-bolder btn-sm mr-2"><b>Enviar propuesta de orden de compra</b></a>
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


                                    <div class="row">
                                        

                                        <div class="col-lg-4 p-0 p-lg-2">



                                                                                    <div class="card card-custom card-stretch">
                                            <!--begin::Body-->
                                            <div class="card-body pt-4">
                                                <!--begin::Toolbar-->
                                                <div class="d-flex justify-content-end mt-4">
          
                                                </div>
                                                <!--end::Toolbar-->
                                                <!--begin::User-->
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                                        <div class="symbol-label font-size-h1" style="background-image:url('<?php echo base_url(); ?>assets/media/misc/bg-2.jpg'); color:white"><?php echo substr($info_solicitud_cotizacion->username, 0, 1); ?></div>
                                                        <i class="symbol-badge bg-success"></i>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary"><?php echo $info_solicitud_cotizacion->username; ?></a>
                                                        <div class="text-dark"><?php echo $info_solicitud_cotizacion->nb_tipo_empresa; ?></div>
                                                        <div class="mt-2">
                                                            <a href="javascript:" class="font-weight-bolder font-size-h5 text-dark">N° <?php echo $info_solicitud_cotizacion->nu_codigo_cotizacion; ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Contact-->
                                                <div class="py-9">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Tipo empresa:</span>
                                                        <a href="javascript:" class="text-muted text-hover-primary"><?php echo $info_solicitud_cotizacion->nb_tipo_empresa; ?></a>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span class="font-weight-bold mr-2">Ubicacion:</span>
                                                        <span class="text-muted"><?php echo $info_solicitud_cotizacion->nb_estado; ?></span>
                                                    </div>

                                                 <div class="d-flex align-items-center justify-content-between pt-4">

                                                                     <?php if ($lista_productos->num_rows() > 0) : ?>
                                             
                                                           <table class="table table-sm" id="tabla_1" width="100%">
                                                              <thead class="thead-light">
                                                                 <tr>
                                                                       <th width="60%" class="all text-left align-middle">Producto</th>
                                                                    <th width="20%" class="all text-right align-middle">Cantidad</th>
                                                                 </tr>
                                                              </thead>
                                                              <tbody>
                                                                 <?php foreach ($lista_productos->result() as $row) : ?>
                                                                 <tr>

                                                                 <td class="text-left align-middle"> <?php echo $row->nb_producto; ?></td>
                                                                 <td class="text-right align-middle"> <?php echo $row->ca_unidades; ?></td>

                                                                 </tr>
                                                                 <?php endforeach; ?>   
                                                              </tbody>
                                                           </table>
                                                           <?php else: ?>
                                                           <h4>Sin registro</h4>

                                                           <?php endif; ?>
                                                                         
                                                    </div>
                                                </div>
                                                <!--end::Contact-->
                                                <!--begin::Nav-->
                    
                                                <!--end::Nav-->
                                            </div>
                                            <!--end::Body-->
                                        </div>



         

                                            

                                        </div>


                                        <div class="col-lg-8 mt-4 mt-lg-0 p-0 p-lg-2">


                                            <div class="card card-custom gutter-b">
    <div class="card-header card-header-tabs-line">
        <div class="card-toolbar">
            <ul class="nav nav-tabs nav-bold nav-tabs-line">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_4">
                        <span class="nav-icon"><i class="flaticon2-chat-1"></i></span>
                        <span class="nav-text">Informacion general</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_4">
                        <span class="nav-icon"><i class="flaticon2-drop"></i></span>
                        <span class="nav-text">Detalle de productos</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="card-toolbar">

        </div>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <!--begin::Input-->
                                                                    <div class="form-group">
                                                                        <label>Modo de pago</label>


                                                                    <?php $array_nb_tipo_pago_actual = explode(",", $info_partner->nb_tipo_pago); ?>
                                                                    <select class="form-control js-multiple_tipo_pago" multiple="multiple" id="nb_tipo_pago" name="nb_tipo_pago">
                                                                 
                                                <?php  foreach($tipo_pago->result() as $row){
                                                        $in_verificado = 0;
                                                        foreach ($array_nb_tipo_pago_actual as $value) {
                                                            
                                                            if($value == $row->nb_tipo_pago):
                                                            $in_verificado ++;
                                                            echo "<option selected='selected' value='".$row->nb_tipo_pago."'>".$row->nb_tipo_pago."</option>";
                                                            break;
                                                            endif;
                                                        }

                                                        if($in_verificado == 0):
                                                    echo "<option value='".$row->nb_tipo_pago."'>".$row->nb_tipo_pago."</option>";
                                                        endif;
                                                       } ?>
                                                                    </select> 
                                                                        <span class="form-text text-muted">Seleccione el modo de pago que acepta.</span>
                                                                    </div>
                                                                    <!--end::Input-->
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <!--begin::Input-->
                                                                    <div class="form-group">
                                                                        <label>Forma de entrega</label>
                                                                    <select class="form-control" id="nb_forma_entrega" name="nb_forma_entrega">
                                                                        <?php foreach($forma_entrega->result() as $row){
                                                                             echo "<option value='".$row->nb_forma_entrega."'>".$row->nb_forma_entrega."</option>";
                                                                        } ?>
                                                                        </select>  
                                                                        <span class="form-text text-muted">Selecione el modo que se entrega la mercancía.</span>
                                                                    </div>
                                                                    <!--end::Input-->
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <!--begin::Input-->
                                                                    <div class="form-group">
                                                                        <label>Metodo de envío</label>
                                                                        <?php $array_forma_envio_actual = explode(",", $info_partner->nb_forma_envio); ?>
                                                                    <select class="form-control js-multiple_forma_envio" multiple="multiple" id="nb_forma_envio" name="nb_forma_envio">
                                                                 
                                                    <?php  foreach($forma_envio->result() as $row){
                                                        $in_verificado = 0;
                                                        foreach ($array_forma_envio_actual as $value) {
                                                            
                                                            if($value == $row->nb_forma_envio):
                                                            $in_verificado ++;
                                                            echo "<option selected='selected' value='".$row->nb_forma_envio."'>".$row->nb_forma_envio."</option>";
                                                            break;
                                                            endif;
                                                        }

                                                        if($in_verificado == 0):
                                                    echo "<option value='".$row->nb_forma_envio."'>".$row->nb_forma_envio."</option>";
                                                        endif;
                                                       } ?>
                                                                    </select> 
                                                                        <span class="form-text text-muted">Seleccione los modos de envia de mercancía.</span>
                                                                    </div>
                                                                    <!--end::Input-->
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <!--begin::Input-->
                                                                    <div class="form-group">
                                                                        <label>Moneda</label>
                                                                    <select class="form-control" id="co_moneda" name="co_moneda">
                                                                         <?php foreach($lista_moneda->result() as $row){
                                                                        if($row->nb_moneda == 'DOLARES'):
                                                                        echo "<option selected='selected' value='".$row->id."'>".$row->nb_moneda."</option>";
                                                                        continue;
                                                                        endif;
                                                                        echo "<option value='".$row->id."'>".$row->nb_moneda."</option>";
                                                                        } ?>
                                                                        </select>  
                                                                        <span class="form-text text-muted">Selecione la moneda en que deseas realizar la propuesta de orden de compra.</span>
                                                                    </div>
                                                                    <!--end::Input-->
                                                                </div>
                                                            </div>

                                                                                                                        <div class="row">
                                                                <div class="col-lg-6">
                                                                    <!--begin::Input-->
                                                                    <div class="form-group">
                                                                        <label>Forma de pago</label>

                                                                           <?php $array_forma_pago_actual = explode(",", $info_partner->nb_forma_pago); ?>
                                                                    <select class="form-control js-multiple_forma_pago" multiple="multiple" id="nb_forma_pago" name="nb_forma_pago">

                                                 <?php  foreach($lista_forma_pago->result() as $row){
                                                        $in_verificado = 0;
                                                        foreach ($array_forma_pago_actual as $value) {
                                                            
                                                            if($value == $row->nb_forma_pago):
                                                            $in_verificado ++;
                                                            echo "<option selected='selected' value='".$row->nb_forma_pago."'>".$row->nb_forma_pago."</option>";
                                                            break;
                                                            endif;
                                                        }

                                                        if($in_verificado == 0):
                                                    echo "<option value='".$row->nb_forma_pago."'>".$row->nb_forma_pago."</option>";
                                                        endif;
                                                       } ?>
                                                                    </select> 
                                                                        <span class="form-text text-muted">Seleccione la forma de pago.</span>
                                                                    </div>
                                                                    <!--end::Input-->
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <!--begin::Input-->

                                                                    <!--end::Input-->
                                                                </div>
                                                            </div>




            </div>
            <div class="tab-pane fade" id="kt_tab_pane_2_4" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
                                   <div class="row mb-2">
                         <div class="col-lg-12">
                    <div id="lista_productos_orden_compra"></div>
                    </div>
                    </div>
                    <!--begin::Input-->
                      <a onclick="agregar_producto()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Agregar productos</a>


            </div>

        </div>
    </div>
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
            <h3 align="center" class="text-dark">Cargando...</h3>
        </div>
    </div>
</div>


<script type="text/javascript">


$('#co_moneda').val('<?php echo $info_partner->co_moneda; ?>')
$('#nb_forma_entrega').val('<?php echo $info_partner->nb_forma_entrega; ?>')




                    var co_solicitud_cotizacion = '<?php echo $co_solicitud_cotizacion; ?>'


                                function agregar_producto() {

                                    var co_moneda = $('#co_moneda').val();

                                $('#ajax_remote').modal('show');
                                 
                            $.get("<?php echo site_url('solicitud_cotizacion/agregar_producto_solicitud_cotizacion_orden_compra/') ?>"+0+'/'+co_solicitud_cotizacion+'/'+co_moneda,
                            function(data){
                            if (data != "") {
                               
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }


       $(document).ready(function(){


 $("#lista_productos_orden_compra").load('<?php echo site_url('solicitud_cotizacion/lista_productos_orden_compra/') ?>'+0+'/'+co_solicitud_cotizacion);


    $('.js-multiple_tipo_pago').select2({
         tags: "true",
         placeholder: "Seleccione los tipo de pago"
    });

    $('.js-multiple_forma_envio').select2({
         tags: "true",
         placeholder: "Seleccione los modo de envio"
    });
    $('.js-multiple_forma_pago').select2({
         tags: "true",
         placeholder: "Seleccione las forma de pago"
    });

    
   
   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('<h3 align="center" class="text-dark">Cargando...</h3>');
   })

   

   }); // Fin ready
   
   
   function enviar_solicitud()
   {

          var nb_tipo_pago = $('#nb_tipo_pago').val();
          var nb_forma_entrega = $('#nb_forma_entrega').val();
          var nb_forma_envio = $('#nb_forma_envio').val();
          var nb_forma_pago = $('#nb_forma_pago').val();
          var co_moneda = $('#co_moneda').val();

              if (nb_tipo_pago == '') {
   
          toastr.error("Ingrese el tipo de pago", 'Error');
           $('#nb_tipo_pago').focus();
            return;
   
       };

                if (nb_forma_entrega == '') {
             toastr.error("Ingrese la forma de entrega", 'Error');
           $('#nb_forma_entrega').focus();
            return;
   
       };

        if (nb_forma_envio == '') {
             toastr.error("Ingrese la forma de envío", 'Error');
           $('#nb_forma_envio').focus();
            return;
   
       };


        if (nb_forma_pago == '') {
             toastr.error("Ingrese la forma de pago", 'Error');
           $('#nb_forma_pago').focus();
            return;
   
       };



            var data = new FormData();

            data.append('nb_tipo_pago', nb_tipo_pago);
            data.append('nb_forma_entrega', nb_forma_entrega);
            data.append('nb_forma_envio', nb_forma_envio);
            data.append('nb_forma_pago', nb_forma_pago);
            data.append('co_moneda', co_moneda);
            data.append('co_solicitud_cotizacion', co_solicitud_cotizacion);


            var url = "<?php echo site_url('solicitud_cotizacion/enviar_solicitud_orden_compra') ?>";

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

                     $(location).attr('href',"<?php echo site_url() ?>solicitud_cotizacion/cartelera_solicitud_cotizacion");
   

                       }else{
              
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 


   
   
   }
   

                                      
</script>


