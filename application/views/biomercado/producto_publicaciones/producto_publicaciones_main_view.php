
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
                                    <h5 id="controlador" class="text-dark font-weight-bold mt-2 mb-2 mr-5">Productos</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>



        <div class="btn-group ml-2">
                    <button type="button" class="btn btn-sm btn-light-primary font-weight-bold dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Accion
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" style="">
                        <a class="dropdown-item" onclick="publicar_accion_check()" href="javascript::">Publicar</a>
                        <a class="dropdown-item" onclick="suspender_accion_check()" href="javascript::">Suspender</a>
                        <a class="dropdown-item" href="javascript::" onclick="eliminar_accion_check()">Eliminar</a>
                         <a class="dropdown-item" href="javascript::" onclick="imprimir_lista_precio()">Imprimir</a>
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
                                          <form action="<?= site_url('/producto_publicaciones/index') ?>" id="form_producto_publicaciones"  method="GET">

                                        
<!--begin::Header-->
                                            <div class="d-flex align-items-center py-10 px-8 bgi-size-cover bgi-no-repeat rounded-top" 
                                            style="background-image: url(<?php echo base_url(); ?>assets/media/misc/bg-1.jpg)">
                                                <span class="btn btn-md btn-icon bg-white-o-15 mr-4">
                                                    <i class="flaticon-search text-primary"></i>
                                                </span>
                                                <h4 class="text-white m-0 flex-grow-1 mr-3">Filtrar Publicaciones</h4>
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
     <input class="form-control" type="search" name="tx_buscar_producto_publicaciones" id="tx_buscar_producto_publicaciones" placeholder="Filtrar publicacion" />
    </div>
   </div>


   <div class="form-group row">
    <label for="example-email-input" class="col-2 col-form-label">Estatus</label>
    <div class="col-10">
                                                       
                                                        <select class="form-control input-medium" name="nb_estatus" id="nb_estatus">
                                                            <option value="-1">Todos</option>
                                                            <option value="Publicado">Publicado</option>
                                                            <option value="Borrador">Borrador</option>
                                                            <option value="Suspendido">Suspendido</option>
                                                            <option value="Vencido">Vencido</option>
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
                  
           
  
                                        <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','LABORATORIO','CASA DE REPRESENTACION'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador','Ventas'")): ?> 
                                    
                                <a href="<?php echo site_url("producto_publicaciones/nuevo_producto_publicaciones");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Crear</a>

                                <a href="<?php echo site_url("producto_publicaciones/importar_producto_publicaciones");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Importar</a>
                                
                                       
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




                                          <?php $con = 0; if (isset($listado_productos)) : ?>
             <?php if ($listado_productos->num_rows() > 0) : ?>





                <?php foreach ($listado_productos->result() as $row) : ?>



                <div class="d-flex align-items-center mb-2 bg-white p-2 bg-hover-gray-100" id="elemento_<?php echo $row->id; ?>">



<label class="checkbox checkbox-sm checkbox-light-dark checkbox-inline flex-shrink-0 m-0 mx-4">

    <input type="checkbox" class="checkbox_comprobar check_get" name="accion_check" id="accion_check" value="<?php echo $row->id; ?>" /> 
    <span></span>
</label>
<!--end::Checkbox-->
<!--begin::Text-->

<div class="ml-2 d-flex flex-column w-200px mr-0">
    <a href="<?php echo site_url("producto_publicaciones/editar_producto_publicaciones/$row->id");?>" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-0">   <?php echo $row->nb_producto; ?> </a>
    <span class="text-muted font-weight-bold"> Hace <?php  echo time_stamp(date('Y-m-d H:i:s',$row->ff_sistema)); ?></span>
    <?php if($row->ca_promocion_activa > 0): ?><br><span class="text-warning font-weight-bold">  En promocion   </span> <?php endif; ?>

        <?php if($row->co_usuario != $this->ion_auth->user_id()): ?> <br> <span style="font-size:10px"><i class="fa fa-user"></i>
                        <?php echo $row->username; ?>
                     </span><?php endif; ?> 
                     


</div>

<span class="d-none d-md-block">
<div class="d-flex flex-column mr-4 ml-4 w-160px">
<div class="p-0 font-weight-bold text-left font-size-sm">Descripcion</div>
<div class="p-0"><?php echo $row->tx_descripcion; ?></div>
</div>

</span>


<span class="d-none d-md-block">
<div class="d-flex flex-column mr-12 w-160px">
<div class="p-0 font-weight-bold text-left font-size-lg">Monto</div>
<div class="p-0"><?php echo number_format($row->ca_precio,2,',','.').' '.$row->nb_acronimo; ?> </div>
</div>

</span>

<span class="d-none d-md-block">
<div class="d-flex flex-column mr-12">
<div class="p-0 font-weight-bold text-center font-size-lg">Disp</div>
<div class="p-0"><?php echo $row->ca_disponible; ?> </div>
</div>

</span>


<div class="d-flex flex-column flex-grow-1">
<div class="p-0 text-center"> 

<?php if($row->nb_estatus == 'Publicado'): ?> <span class="label label-lg label-light-success label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
<?php if($row->nb_estatus == 'No Publicado'): ?> <span class="label label-lg label-light-primary label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
<?php if($row->nb_estatus == 'Borrador'): ?> <span class="label label-lg label-light-warning label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
<?php if($row->nb_estatus == 'Suspendido'): ?> <span class="label label-lg label-light-danger label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
<?php if($row->nb_estatus == 'Vencido'): ?> <span class="label label-lg label-light-danger label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>

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

        <ul class="navi navi-hover py-1">   
                                                                 <li class="navi-item">
                                                                    <a href='<?php echo site_url("producto_publicaciones/dashboard_producto/$row->id");?>' class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Ver producto</span>
                                                                    </a>
                                                                </li>
                                                                <li class="navi-item">
                                                                    <a href='<?php echo site_url("producto_publicaciones/editar_producto_publicaciones/$row->id");?>' class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Editar</span>
                                                                    </a>
                                                                </li>
                                                                 <?php if($row->nb_estatus == 'Borrador' or $row->nb_estatus == 'Suspendido'): ?>
                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="publicar_producto_publicaciones(<?php echo $row->id; ?>, '<?php echo $row->nb_producto; ?>')" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-list-3"></i>
                                                                        </span>
                                                                        <span class="navi-text">Publicar</span>
                                                                    </a>
                                                                </li>
                                                                <?php endif; ?>
                                                                 <?php if($row->nb_estatus == 'Publicado'): ?>

                                                                     <?php if($row->ca_promocion_activa == 0): ?>
                                                             <li class="navi-item">
                                                                    <a href="javascript::" onclick="promocionar(<?php echo $row->id; ?>, '<?php echo $row->nb_producto; ?>')" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-rocket-1"></i>
                                                                        </span>
                                                                        <span class="navi-text">Promocionar</span>
                                                                    </a>
                                                                </li>

                                                            <?php endif; ?>


                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="suspender_producto_publicaciones(<?php echo $row->id; ?>, '<?php echo $row->nb_producto; ?>')" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-rocket-1"></i>
                                                                        </span>
                                                                        <span class="navi-text">Suspender</span>
                                                                    </a>
                                                                </li>
                                                                    <?php endif; ?>
                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="eliminar_producto_publicaciones(<?php echo $row->id; ?>, '<?php echo $row->nb_producto; ?>')" class="navi-link">
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
                <div class="p-8">
            <h4>Sin registros</h4>
            <p>No tienes productos publicados</p>
        </div>
            <?php endif; ?>
             <?php endif; ?>

                                     <?php if (isset($links)) { ?>
                <?php echo $links ?>
            <?php } ?>




                                          



    

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

        function imprimir_lista_precio() {

    window.open('<?php echo base_url() ?>producto_publicaciones/imprimir_lista_producto_publicaciones_pdf', '_blank');

}



   $('#nb_estatus').val('<?php echo $nb_estatus; ?>');
   $('#tx_buscar_producto_publicaciones').val('<?php echo $tx_buscar_producto_publicaciones; ?>');


   $(document).ready(function(){


   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('<div class="loader_panel_inside"> <div class="ball"></div><h6 align="center"><B>CARGANDO... ESPERE POR FAVOR</b></h6></div><br> <h3 align="center"><b>SIRE.</b></h3>');
   })
   

   }); // Fin ready
   
   



   
   
   function eliminar_producto_publicaciones(co_producto_publicaciones, nb_producto)
   {


   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar producto',
   content: '¿Estas seguro que deseas eliminar '+nb_producto+' ?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_producto_publicaciones':co_producto_publicaciones},
   url: "<?php echo site_url('producto_publicaciones/eliminar_producto_publicaciones') ?>",
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


   function suspender_producto_publicaciones(co_producto_publicaciones, nb_producto)
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Suspender publicacion',
   content: '¿Estas seguro que deseas suspender '+nb_producto+' ?.',
   type: 'blue',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_producto_publicaciones':co_producto_publicaciones},
   url: "<?php echo site_url('producto_publicaciones/suspender_producto_publicaciones') ?>",
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

      function publicar_producto_publicaciones(co_producto_publicaciones, nb_producto)
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Publicar',
   content: '¿Estas seguro que deseas publicar '+nb_producto+' ?.',
   type: 'blue',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_producto_publicaciones':co_producto_publicaciones},
   url: "<?php echo site_url('producto_publicaciones/publicar_producto_publicaciones') ?>",
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



   
   

                function publicaciones_estatus(nb_estatus)

    {

            $('<input />').attr('type', 'hidden')
             .attr('name', "nb_estatus")
             .attr('value', nb_estatus)
             .appendTo('#form_producto_publicaciones');


      $("#form_producto_publicaciones").submit();


    }


                function buscar_producto_publicaciones()

    {

      $("#form_producto_publicaciones").submit();

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
    
      if (selected.length === 0) { toastr.error("Error", 'Por favor seleccione un producto');  return false; }

   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar producto',
   content: '¿Estas seguro que deseas eliminar estos productos ?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'input_check':selected},
   url: "<?php echo site_url('producto_publicaciones/eliminar_producto_publicaciones_accion_check') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
                toastr.info(obj.message);
   
           $(".check_get:checked").each(function () {

                $("#elemento_"+this.value).remove();
            });
   
             }).fail(function(){
   
                toastr.info("Error", 'Error del servidor');
   
             }); 
   
   
   },
   no: function () {
   
   
   
   },
   
   }
   });
   
   
   
   
   }
   

      function suspender_accion_check()
   {
   

            var selected = new Array();
            $(".check_get:checked").each(function () {
                selected.push(this.value);
            });
    
      if (selected.length === 0) { toastr.error("Error", 'Por favor seleccione un producto'); return false; }

   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Suspender Publicacion',
   content: '¿Estas seguro que deseas suspender estos productos ?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'input_check':selected},
   url: "<?php echo site_url('producto_publicaciones/suspender_producto_publicaciones_accion_check') ?>",
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
   

        function publicar_accion_check()
   {
   

            var selected = new Array();
            $(".check_get:checked").each(function () {
                selected.push(this.value);
            });
    
      if (selected.length === 0) { toastr.error("Error", 'Por favor seleccione un producto'); return false; }

   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Publicar',
   content: '¿Estas seguro que deseas publicar estos productos ?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'input_check':selected},
   url: "<?php echo site_url('producto_publicaciones/publicar_producto_publicaciones_accion_check') ?>",
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


   function promocionar(co_producto_publicaciones, nb_producto)
   {

                                              $.ajax({
   method: "POST",
   data: {'co_producto_publicaciones':co_producto_publicaciones},
   url: "<?php echo site_url('producto_publicaciones/ejecutar_nueva_publicidad_industrial') ?>",
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
              $(location).attr('href',"<?php echo site_url() ?>publicidad/editar_publicidad_industrial"+"/"+obj.co_publicidad);
   
             }).fail(function(){
   
           alert('Fallo');
   
   
             }); 
   

   
   }
   
</script>
