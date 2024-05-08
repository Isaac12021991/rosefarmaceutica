
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
                                    <h5 id="controlador" class="text-dark font-weight-bold mt-2 mb-2 mr-5">Publicar</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>


        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

        
           
  
                        <?php if($this->usuario_library->permiso_tipo_empresa("'FARMACIA','CLINICA','MEDICO'")): ?> 
                <?php if($this->usuario_library->permiso_empresa("'Administrador','Bioenlace'")): ?>
                                    
                                <a href="<?php echo site_url("bioenlace/nuevo_producto_servicio");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Crear</a>

                                       
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
                                    Publicaciones
                                    <small>Lista de productos y servicios</small>
                                    </h3>
                                    </div>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">

                                        <div class="col-lg-12">
                                             <?php if($this->usuario_library->permiso_tipo_empresa("'FARMACIA'")): ?> 
                                            <table class="table table-light">
                                                
                                                <tr>
                                                    <td>

                                                        Desea mostrar y sicncronizar los datos generados a traves de la guia sicm en el sistema Rose, para que las personas naturales puedan encontrar tus productos a traves del sistema en linea de Rose.
                                                        
                                                    </td>

                                                     <td> 

                                    <div class="col-12">
                                    <span class="switch">
                                    <label>
                                    <input type="checkbox" <?php if($in_sicronizar_sicm): ?> checked="checked" <?php endif; ?> name="sicncronizar_sicm" id="sicncronizar_sicm" />
                                    <span></span>
                                    </label>
                                    </span>
                                    </div>

                                </td>

                                                </tr>
                                            </table>

                                        <?php endif; ?>

                                             
                    

                                        </div>

                                        </div>




                 <?php if ($inventario_principal->num_rows() > 0) : ?>
            <table class="table table-sm" id="tabla_1" width="100%">
               <thead>
                  <tr>
                     <th class="all" width="30%">Producto / Servicio</th>
                     <th width="20%">Descripcion</th>
                     <th width="15%">Precio</th>
                     <th width="15%">Vence</th>
                     <th class="all" width="15%"></th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($inventario_principal->result() as $row) : ?>
                  <tr <?php if(time() > $row->ff_vence): ?> class="font-red" <?php endif; ?>>
                     <td> <a class="text-dark text-hover-primary" href="<?php echo site_url("bioenlace/editar_producto_servicio/$row->id");?>">  <?php  if ($row->nb_producto == ''): echo $row->nb_producto_sicm; else: echo $row->nb_producto; endif; ?> </a> </td>
                     <td>  <?php echo $row->tx_descripcion; ?> </td>
                     <td>  <?php echo $row->ca_precio; ?> </td>
                     <td> <?php echo date('d-m-Y', $row->ff_vence); ?> </td>
                     <td>

                                     <div class="card-toolbar">
                                                    <div class="dropdown dropdown-inline">
                                                        <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-5">
                                                                <li class="navi-item">
                                                                    <a  href='<?php echo site_url("bioenlace/editar_producto_servicio/$row->id");?>' class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Editar</span>
                                                                    </a>
                                                                </li>
        
           
                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="eliminar_producto(<?php echo $row->id; ?>, '<?php echo $row->nb_producto; ?>')" class="navi-link">
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




                     </td>
                  </tr>
                  <?php endforeach; ?>   
               </tbody>
            </table>
            <?php else: ?>
            <h4>Sin registro</h4>
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


   $(document).ready(function(){


      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready
   
   


   
   
   function eliminar_producto(co_inventario_principal, nb_producto)
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar registro',
   content: '¿Estas seguro que deseas eliminar '+nb_producto+' ?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_inventario_principal':co_inventario_principal},
   url: "<?php echo site_url('bioenlace/eliminar_inventario_principal') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);

                toastr.info(obj.message,"Exito");
   
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

       $("#sicncronizar_sicm").on('change', function() {

      if ($("#sicncronizar_sicm").is(":checked")) {


       var in_sicncronizar_sicm = 1;
        sicncronizar_sicm_bioenlace(in_sicncronizar_sicm)

      } else {



       var in_sicncronizar_sicm = 0;
       sicncronizar_sicm_bioenlace(in_sicncronizar_sicm)

      }
    });






   
         function sicncronizar_sicm_bioenlace(in_sicncronizar_sicm)
   {
   
   

            $.ajax({
   method: "POST",
   data: {'in_sicncronizar_sicm':in_sicncronizar_sicm},
   url: "<?php echo site_url('bioenlace/sicncronizar_sicm_bioenlace') ?>",
                }).done(function( data ) { 
   
                   var obj = JSON.parse(data);
                    

   
                 }).fail(function(){
   
               alert('Fallo');
   
   
                 }); 
 
   
   }
   
   

   
</script>
