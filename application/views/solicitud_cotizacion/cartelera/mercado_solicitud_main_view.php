
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
                                                <a href="" class="text-muted">Cartelera</a>
                                            </li>
                                        </ul>


        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

    

                                          
                                                           
                                            <form action="<?= site_url('/solicitud_cotizacion/cartelera_solicitud_cotizacion') ?>" autocomplete="off" id="form_solicitud_cotizacion_cartelera" method="GET">
                                                        <div class="row">
                                                                <div class="col-6">
                                                              <select class="form-control form-control-solid form-control-sm" id="nb_estado" onChange="filtrar()">
                                                        <option value="">Ubicacion:</option>
                                                        <?php foreach($estados->result() as $row){
                                                        echo "<option value='".$row->nb_estado."'>".$row->nb_estado."</option>";
                                                        } ?>
                                                    </select>
                                                    </div>
                                          
                                                    <div class="col-6">
                                                     <select class="form-control form-control-solid form-control-sm" id="orderby" onChange="filtrar()">
                                                        <option value="">Ordenar</option>
                                                        <option value="reciente">Reciente</option>
                                                        <option value="menos_reciente">Menos reciente</option>
                                                    </select>
                                                </div>
                                                        </div>

                                                 </form>


                                            

                                               
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
                            <div class="container animsition">
                                <div class="row">

                                <div class="col-lg-1">
                                    
                                    
                                </div>

                                <div class="col-lg-10 p-0">


                                    <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                    <div class="card-title">
                                    <h3 class="card-label">
                                    Cartelera de solicitudes
                                    <small></small>
                                    </h3>
                                    </div>
                                    </div>
                                    <div class="card-body pt-0 pl-0 pr-0">

                   

             <?php $con = 0; if (isset($listado_solicitud_cotizacion)) : ?>
             <?php if ($listado_solicitud_cotizacion->num_rows() > 0) : ?>
                                                            <table class="table table-borderless table-vertical-center table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th ></th>
                                                                        <th ></th>
                                                                        <th ></th>
                                                                        <th ></th>
                                                                   
                                                                        <th ></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                       <?php foreach ($listado_solicitud_cotizacion->result() as $row) : ?>
                                                                    <tr role="button" onclick="respuesta_solicitud_cotizacion('<?php echo $row->id; ?>')">

                                                                         <td class="text-center">
                                                                            <?php if ($row->co_solicitud_cotizacion_visto == 0): ?>
                                                                            <span class="label label-dot label-success blink"> </span> 
                                                                             <?php endif; ?>

                                                                            <span class="text-primary font-weight-bold ml-4">
                                                                           Hace <?php echo time_stamp(date('Y-m-d H:i:s',$row->ff_fecha_elaboracion)); ?></span>
                                                                        </td>
                                                                        <td class="pl-0 text-center align-middle">
                                                                            <a href="javascript:" class="text-dark-75 font-weight-bolder text-hover-primary font-size-sm">N° <?php echo $row->nu_codigo_cotizacion; ?></a>
           
                                                                        </td>
                                                                         <td class="pl-0 text-center align-middle">
                                                                            <a href="javascript:" class="text-dark-75 font-weight-bolder text-hover-primary font-size-sm"> <i class="fas fa-industry"></i>   <?php echo $row->nb_tipo_empresa; ?> <br> <?php echo $row->username; ?></a>
           
                                                                        </td>
                                                                             <td class="pl-0">
                                                                            <a href="javascript:" class="text-danger font-weight-bolder text-hover-primary font-size-sm">Vence:  <?php echo date('d-m-Y',$row->ff_vencimiento); ?></a>
           
                                                                        </td>
                                                                        <td class="text-left">
                                                                            <span class="text-dark-75 font-weight-bolder d-block font-size-sm"><?php echo $row->nb_estado; ?></span>
                                                                        </td>
                                                                        <td class="text-left" id="response_<?php echo $row->id; ?>">
                                                                            <?php  if($row->ca_orden_compra_generada > 0): ?>
                                                                            <span class="label label-xs label-success"><span class="fas fa-check" style="color:white;"></span></span>
                                                                            <?php endif; ?>
                                                                        </td>
           
                                                                    </tr>
                                                                      <?php endforeach; ?>  

               
                                                                </tbody>
                                                            </table>


                                                                <?php else: ?>
                                                                <h4 class="m-6">Sin registros</h4>
                                                                <p class="m-6">No hay solicitud de cotizaciones</p>
                                                                <?php endif; ?>
                                                                 <?php endif; ?>
                                                        



                                     <?php if (isset($links)) { ?>
                <?php echo $links ?>
            <?php } ?>


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

                     function respuesta_solicitud_cotizacion(co_solicitud_cotizacion)
        {


           <?php  if($this->ion_auth->in_empresa_activado() == 1): ?>

        $(location).attr('href',"<?php echo site_url() ?>solicitud_cotizacion/respuesta_solicitud_cotizacion"+'/'+co_solicitud_cotizacion); 

        <?php else: ?>


        toastr.error('Empresa no verificada, por favor pongase en contacto con nosotros para <b>verificar su empresa', 'Error');
        return;


    <?php endif; ?>
        }



      $('#nb_estado').val('<?php echo $nb_estado; ?>');
    $('#orderby').val('<?php echo $ordenar; ?>');


   $(document).ready(function(){

      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready
   
   


         function filtrar()

    {



    $('<input />').attr('type', 'hidden')
     .attr('name', "nb_estado")
     .attr('value', $("#nb_estado").val())
     .appendTo('#form_solicitud_cotizacion_cartelera');


    $('<input />').attr('type', 'hidden')
     .attr('name', "ordenar")
     .attr('value', $("#orderby").val())
     .appendTo('#form_solicitud_cotizacion_cartelera');

      $("#form_solicitud_cotizacion_cartelera").submit();


    }



  
   
</script>
