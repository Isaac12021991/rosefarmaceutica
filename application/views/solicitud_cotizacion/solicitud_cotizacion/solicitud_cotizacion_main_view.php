
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
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>



        <div class="btn-group ml-2">
                    <button type="button" class="btn btn-sm btn-light-primary font-weight-bold dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Accion
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu  dropdown-menu-right dropdown-menu-sm" style="">
                        <a class="dropdown-item" onclick="accion_estatus_masiva('Abierta')" href="javascript::">Abrir</a>
                        <a class="dropdown-item" onclick="accion_estatus_masiva('Cancelada')" href="javascript::">Cancelar</a>
                        <a class="dropdown-item" href="javascript::" onclick="eliminar_accion_check()">Eliminar</a>
                    </div>
                </div>


        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                                                                    <div class="dropdown">

                                    <!--begin::Toggle-->
                                    <div class="topbar-item" data-toggle="dropdown">
                                        <div class="btn btn-icon btn-clean btn-dropdown mr-2">
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                        </div>
                                    </div>

                                    <!--end::Toggle-->

                                    <!--begin::Dropdown-->
                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-xl dropdown-menu-anim-up">
                                          <form action="<?= site_url('/solicitud_cotizacion/index') ?>" id="form_solicitud_cotizacion"  method="GET">

                                        
<!--begin::Header-->
                                            <div class="d-flex align-items-center py-10 px-8 bgi-size-cover bgi-no-repeat rounded-top" 
                                            style="background-image: url(<?php echo base_url(); ?>assets/media/misc/bg-1.jpg)">
                                                <span class="btn btn-md btn-icon bg-white-o-15 mr-4">
                                                    <i class="flaticon-search text-primary"></i>
                                                </span>
                                                <h4 class="text-white m-0 flex-grow-1 mr-3">Filtrar</h4>
                                            </div>

                                            <!--end::Header-->

                                            <!--begin::Scroll-->
                                            <div class="scroll scroll-push" data-scroll="true" data-height="200" data-mobile-height="200">

                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center justify-content-between p-2">
                                                
                   
  <div class="card-body">
   <div class="form-group row">
    <label for="example-search-input" class="col-2 col-form-label">Filtrar</label>
    <div class="col-10">
     <input class="form-control" type="text" name="tx_buscar" id="tx_buscar" placeholder="Filtrar" />
    </div>
   </div>


   <div class="form-group row">
    <label for="example-email-input" class="col-2 col-form-label">Estatus</label>
    <div class="col-10">
                                                       
                                                        <select class="form-control input-medium" name="nb_estatus" id="nb_estatus">
                                                            <option value="-1">Todos</option>
                                                            <option value="Abierta">Abierta</option>
                                                            <option value="Borrador">Borrador</option>
                                                            <option value="Cerrada">Cerrada</option>
                                                            <option value="Cancelada">Cancelada</option>
                                                        </select>
    </div>
   </div>
  </div>


    
                                                </div>


                                                <!--end::Item-->

                                                <!--begin::Separator-->
                                                <div class="separator separator-solid"></div>


                                                <!--end::Item-->
                                            </div>

                                            <!--end::Scroll-->

                                            <!--begin::Summary-->
                                            <div class="p-8">
  
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary text-weight-bold">Aplicar</button>
                                                </div>
                                            </div>

                                            <!--end::Summary-->

                                        </form>
                                    </div>

                                    <!--end::Dropdown-->
                                </div>
                  
           
  
                                        <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','FARMACIA','CLINICA'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador','Compras'")): ?> 
                                    
                                <a href="<?php echo site_url("solicitud_cotizacion/nuevo_solicitud_cotizacion");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Crear</a>

                                       
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
                            <div class="container animsition">
                                <div class="row">

                                <div class="col-lg-1">
                                    
                                    
                                </div>

                                <div class="col-lg-10 pl-0 pr-0">


                                    <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                    <div class="card-title">
                                    <h3 class="card-label">
                                     Lista de solicitud de cotizaciones
                                    <small></small>
                                    </h3>

                                    </div>
                                        <div class="card-toolbar">
                                                <input type="checkbox" name="checkall" id="checkall" />
                                                <span class="font-weight-bold ml-4">Seleccionar todo</span>
                                                </div>
                                    </div>
                                    <div class="card-body pt-4 pr-4 pl-4">

                                      

                 <?php $con = 0; if (isset($listado_solicitud_cotizacion)) : ?>
             <?php if ($listado_solicitud_cotizacion->num_rows() > 0) : ?>
                                                <!--begin::Item-->

                                                     <?php foreach ($listado_solicitud_cotizacion->result() as $row) : ?>

                                                    <div class="d-flex align-items-center mb-6">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-bar <?php if($row->ff_vencimiento < time()): ?> bg-danger blink <?php else: ?> bg-success  <?php endif; ?> align-self-stretch p-0 mr-0"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Checkbox-->
                                                    <label class="checkbox checkbox-sm checkbox-light-dark checkbox-inline flex-shrink-0 m-0 mx-4">
                                                        <input type="checkbox" name="accion_check" id="accion_check" value="<?php echo $row->id; ?>" class="checkbox_comprobar check_get">
                                                        <span></span>
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 mr-0">
                                                        <a href="<?php echo site_url("solicitud_cotizacion/ver_solicitud_cotizacion/$row->id");?>" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-0"> Nro <?php echo $row->nu_codigo_cotizacion; ?> </a>
                                                        <span class="text-muted font-weight-bold"> Hace <?php echo time_stamp(date('Y-m-d H:i:s',$row->ff_fecha_elaboracion)); ?></span>

                                                         <span class="d-block d-md-none text-dark font-weight-bold"> Respuestas:  <?php if($row->ca_solicitud_en_espera > 0): ?> <span class="label label-dot label-success blink"></span> <span class="font-weight-bold"> <?php echo $row->ca_solicitud_en_espera; ?></span> <?php else: ?> <span class="text-muted"> <?php echo $row->ca_solicitud_en_espera; ?></span>    <?php endif; ?> </span>
                                                    </div>


                                                <span class="d-none d-md-block">
                                                <div class="d-flex flex-column mr-12">
                                                <div class="p-0 font-weight-bold text-center font-size-lg">Inicio</div>
                                                <div class="p-0"><?php echo date('d-m-Y', $row->ff_fecha_elaboracion); ?></div>
                                                </div>

                                                </span>

                                                <span class="d-none d-md-block">
                                             <div class="d-flex flex-column mr-12">
                                                <div class="p-0 font-weight-bold text-center font-size-lg">Vence</div>
                                                <div class="p-0"> <?php echo date('d-m-Y', $row->ff_vencimiento); ?></div>

                                                </div>
                                            </span>


                                            <span class="d-none d-md-block">
                                            <div class="d-flex flex-column mr-12">
                                               <div class="p-0 font-weight-bold text-center font-size-lg">Productos</div>
                                                <div class="p-0 text-center"><?php echo $row->ca_producto; ?> </div>

                                                </div>
                                            </span>

                                                <span class="d-none d-md-block">
                                            <div class="d-flex flex-column mr-12">
                                                <div class="p-0 font-weight-bold text-center font-size-lg">Respuesta</div>
                                                <div class="p-0 text-center"> <?php if($row->ca_solicitud_en_espera > 0): ?> <span class="label label-dot label-success blink"></span> <span class="font-weight-bold"> <?php echo $row->ca_solicitud_en_espera; ?></span> <?php else: ?> <span class="text-muted"> <?php echo $row->ca_solicitud_en_espera; ?></span>    <?php endif; ?></div>

                                                </div>
                                            </span>


                                                <div class="d-flex flex-column flex-grow-1">
                                                <div class="p-0 text-center"> 
                        <?php if($row->nb_estatus == 'Abierta'): ?> <span class="label label-lg label-light-success label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
                      <?php if($row->nb_estatus == 'Borrador'): ?> <span class="label label-lg label-light-warning label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
                       <?php if($row->nb_estatus == 'Cerrada'): ?> <span class="label label-lg label-light-primary label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
                       <?php if($row->nb_estatus == 'Cancelada'): ?> <span class="label label-lg label-light-danger label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>

                        <?php if($row->ff_vencimiento < time()): ?> <br> <span class="label label-sm label-danger label-inline blink"> Vencido </span> <?php endif; ?>

                    </div>
                                                </div>

                              
                                                    <!--end::Text-->
                                                    <!--begin::Dropdown-->
                 <div class="card-toolbar">
                                                    <div class="dropdown dropdown-inline">
                                                        <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-5">
                                                                 <li class="navi-item">
                                                                    <a href='<?php echo site_url("solicitud_cotizacion/ver_solicitud_cotizacion/$row->id");?>' class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Ver solicitud de cotizacion</span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href='<?php echo site_url("solicitud_cotizacion/editar_solicitud_cotizacion/$row->id");?>' class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Editar</span>
                                                                    </a>
                                                                </li>
                                                                 <?php if($row->nb_estatus == 'Borrador' or $row->nb_estatus == 'Cerrada'): ?>
                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="cambiar_estatus_solicitud_cotizacion(<?php echo $row->id; ?>, 'Abierta')" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-list-3"></i>
                                                                        </span>
                                                                        <span class="navi-text">Abrir</span>
                                                                    </a>
                                                                </li>
                                                                <?php endif; ?>


                                                                 <?php if($row->nb_estatus == 'Abierta'): ?>

    

                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="cambiar_estatus_solicitud_cotizacion(<?php echo $row->id; ?>, 'Cerrada')" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-rocket-1"></i>
                                                                        </span>
                                                                        <span class="navi-text">Cerrar</span>
                                                                    </a>
                                                                </li>
                                                                    <?php endif; ?>

                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="eliminar_solicitud_cotizacion(<?php echo $row->id; ?>)" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Eliminar</span>
                                                                    </a>
                                                                </li>
    

                                                            </ul>
                                                            <!--end::Navigation-->
                                                        </div>
                                                    </div>
                                                </div>
                                                    <!--end::Dropdown-->
                                                </div>

                                                <?php endforeach; ?>   


            <?php else: ?>
            <h4 class="m-6">Sin registros</h4>
            <p class="m-6">No tienes solicitud de cotizaciones</p>
            <?php endif; ?>
             <?php endif; ?>


                                                <!--begin::Item-->


                                     
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



   $('#nb_estatus').val('<?php echo $nb_estatus; ?>');
   $('#tx_buscar').val('<?php echo $tx_buscar; ?>');


   $(document).ready(function(){

      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready
   
   



   
   
   function eliminar_solicitud_cotizacion(co_solicitud_cotizacion)
   {


   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar producto',
   content: '¿Estas seguro que deseas eliminar ?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_solicitud_cotizacion':co_solicitud_cotizacion},
   url: "<?php echo site_url('solicitud_cotizacion/eliminar_solicitud_cotizacion') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);

                toastr.info("Exito", obj.message);
   
           location.reload();
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   
   
   
   }



      function cambiar_estatus_solicitud_cotizacion(co_solicitud_cotizacion, nb_estatus)
   {

    if(nb_estatus == 'Abierta'){mensaje_estatus = 'Abrir';}else{mensaje_estatus = 'Cerrar';}
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: mensaje_estatus,
   content: '¿Estas seguro que deseas '+mensaje_estatus+' esta solicitud ?.',
   type: 'blue',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_solicitud_cotizacion':co_solicitud_cotizacion, 'nb_estatus':nb_estatus},
   url: "<?php echo site_url('solicitud_cotizacion/cambiar_estatus_solicitud_cotizacion') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
              toastr.info("Exito", obj.message);
   
           location.reload();
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   
   
   
   }



   
   


   
   $("#checkall").change(function () {
   
   $("input:checkbox").prop('checked', $(this).prop("checked"));
   
   
   });



   
   function eliminar_accion_check()
   {
   

            var selected = new Array();
            $(".check_get:checked").each(function () {
                selected.push(this.value);
            });
    
      if (selected.length === 0) { toastr.error("Error", 'Por favor seleccione una solicitud');  return false; }

   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar solicitud',
   content: '¿Estas seguro que deseas eliminar estas solicitudes ?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'input_check':selected},
   url: "<?php echo site_url('solicitud_cotizacion/eliminar_solicitud_cotizacion_accion_check') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
                toastr.info("Exito", obj.message);
   
           location.reload();
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   
   
   
   }
   

   function accion_estatus_masiva(nb_estatus)
   {
   

            var selected = new Array();
            $(".check_get:checked").each(function () {
                selected.push(this.value);
            });
    
      if (selected.length === 0) { toastr.error("Error", 'Por favor seleccione una solicitud');  return false; }

   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Cambiar solicitud',
   content: '¿Estas seguro que deseas cambiar de estatus estas solicitudes ?.',
   type: 'blue',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'input_check':selected, 'nb_estatus':nb_estatus},
   url: "<?php echo site_url('solicitud_cotizacion/cambiar_estatus_solicitud_cotizacion_accion_check') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
                toastr.info("Exito", obj.message);
   
           location.reload();
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   
   
   
   }
   
  
   
</script>
