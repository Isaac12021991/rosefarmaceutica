
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Publicidad</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>




        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

           
  
                                        <?php if($this->usuario_library->permiso_tipo_empresa("'FARMACIA','CLINICA','MEDICO'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador'")): ?> 
                                    
                                <a href="<?php echo site_url("publicidad/nueva_publicidad");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Crear</a>
                                
                                    <?php endif; ?>    
                                    <?php endif; ?>

                        <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','CASA DE REPRESENTACION','LABORATORIO'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador'")): ?> 
                                    
                                <a href="<?php echo site_url("publicidad/nueva_publicidad_industrial");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Crear</a>
                                
                                       
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



                                          <?php $con = 0; if (isset($listado_publicaciones)) : ?>
             <?php if ($listado_publicaciones->num_rows() > 0) : ?>


                <?php foreach ($listado_publicaciones->result() as $row) : ?>
                    
                    <div class="d-flex align-items-center mb-2 bg-white p-2 bg-hover-gray-100" id="elemento_<?php echo $row->id; ?>">



                                                    <label class="checkbox checkbox-sm checkbox-light-dark checkbox-inline flex-shrink-0 m-0 mx-4">
                                                        <input type="checkbox" name="accion_check" id="accion_check" value="<?php echo $row->id; ?>" class="checkbox_comprobar check_get">
                                                        <span></span>
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Text-->

                                                    <div class="ml-2 d-flex flex-column w-200px mr-0">
                                                        <a href="<?php echo site_url("publicidad/editar_publicidad_industrial/$row->id");?>" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-0"> <?php if($row->co_producto_publicaciones == ''): ?>  <?php echo $row->tx_link_dirigir; ?> <?php else: ?>  <?php echo $row->nb_producto; ?>  <?php endif; ?></a>
                                                        <span class="text-muted font-weight-bold"> Hace <?php  echo time_stamp(date('Y-m-d H:i:s',$row->ff_sistema_time)); ?></span>
                                                                
                                                        <?php if($row->co_usuario != $this->ion_auth->user_id()): ?>
                                                          <span style="font-size:10px"> <?php echo $row->username; ?> </span>
                                                        <?php endif; ?>
                                                    
                                                    </div>

                                                    <span class="d-none d-md-block">
                                                    <div class="d-flex flex-column mr-4 ml-4 w-160px">
                                                    <div class="p-0 font-weight-bold text-left font-size-sm">Descripcion</div>
                                                    <div class="p-0"><?php echo $row->tx_descripcion; ?></div>
                                                    </div>

                                                    </span>


                                                <span class="d-none d-md-block">
                                                <div class="d-flex flex-column mr-12">
                                                <div class="p-0 font-weight-bold text-center font-size-lg">Monto</div>
                                                <div class="p-0"><?php echo number_format($row->ca_presupuesto,2,',','.').' $'; ?></div>
                                                </div>

                                                </span>


                                                <div class="d-flex flex-column flex-grow-1">
                                                <div class="p-0 text-center"> 

                                                <?php if($row->nb_estatus == 'Activo'): ?> 

                                    <span class="label label-lg label-light-success label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
                                    <?php if($row->nb_estatus == 'Borrador'): ?> <span class="label label-lg label-light-warning label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
                                    <?php if($row->nb_estatus == 'Rechazado'): ?> <span class="label label-lg label-light-danger label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>
                                    <?php if($row->nb_estatus == 'En espera por aprobacion'): ?> <span class="label label-lg label-light-primary label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>

                                    <?php if($row->nb_estatus == 'Culminado'): ?> <span class="label label-lg label-light-success label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>

                                    <?php if($row->nb_estatus == 'Detenido'): ?> <span class="label label-lg label-light-info label-inline"> <?php echo $row->nb_estatus; ?> </span> <?php endif; ?>

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
                                                            <ul class="navi navi-hover py-0">



                                                            <?php if($row->nb_estatus == 'Borrador'): ?>
  
  <?php if($this->usuario_library->permiso_tipo_empresa("'FARMACIA','CLINICA','MEDICO'")): ?>   
 <?php if($this->usuario_library->permiso_empresa("'Administrador'")): ?> 
         
                             <li class="navi-item">
                                         <a href='<?php echo site_url("publicidad/editar_publicidad/$row->id");?>' class="navi-link">
                                             <span class="navi-icon">
                                                 <i class="flaticon2-drop"></i>
                                             </span>
                                             <span class="navi-text">Editar</span>
                                         </a>
                                     </li>

     
         <?php endif; ?>    
         <?php endif; ?>

<?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','CASA DE REPRESENTACION','LABORATORIO'")): ?>   
<?php if($this->usuario_library->permiso_empresa("'Administrador'")): ?> 


                             <li class="navi-item">
                         <a href='<?php echo site_url("publicidad/editar_publicidad_industrial/$row->id");?>' class="navi-link">
                             <span class="navi-icon">
                                 <i class="flaticon2-drop"></i>
                             </span>
                             <span class="navi-text">Editar</span>
                         </a>
                     </li>


<?php endif; ?>
<?php endif; ?>


    
                   <li class="navi-item">
                         <a href='<?php echo site_url("publicidad/pago/$row->id/$row->ca_presupuesto");?>' class="navi-link">
                             <span class="navi-icon">
                                 <i class="flaticon2-drop"></i>
                             </span>
                             <span class="navi-text">Pagar</span>
                         </a>
                     </li>


                     <?php endif; ?>

                     <?php if($row->nb_estatus == 'Activo'): ?>

<li class="navi-item">
    <a href="javascript:" onclick="detener_publicidad(<?php echo $row->id; ?>)" class="navi-link">
        <span class="navi-icon">
            <i class="flaticon2-rocket-1"></i>
        </span>
        <span class="navi-text">Detener</span>
    </a>
</li>

    <?php endif; ?>

 <?php if($row->nb_estatus == 'Detenido'): ?>

<li class="navi-item">
    <a href="javascript:" onclick="activar_publicidad(<?php echo $row->id; ?>)" class="navi-link">
        <span class="navi-icon">
            <i class="flaticon2-rocket-1"></i>
        </span>
        <span class="navi-text">Activar</span>
    </a>
</li>

    <?php endif; ?>

<li class="navi-item">
    <a href="javascript::" onclick="eliminar_publicidad(<?php echo $row->id; ?>)" class="navi-link">
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
            <h4>Sin registros</h4>
            <p>No tienes productos publicados</p>
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



   $(document).ready(function(){

   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('<div class="loader_panel_inside"> <div class="ball"></div><h6 align="center"><B>CARGANDO... ESPERE POR FAVOR</b></h6></div><br> <h3 align="center"><b>SIRE.</b></h3>');
   })
   

   }); // Fin ready
   
   



   
   
   function eliminar_publicidad(co_publicidad)
   {


   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar Publicidad',
   content: '¿Estas seguro que deseas eliminar ?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_publicidad':co_publicidad},
   url: "<?php echo site_url('publicidad/eliminar_publicidad') ?>",
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



   
   function detener_publicidad(co_publicidad)
   {


   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Detener promocion',
   content: '¿Estas seguro que deseas detener la promocion ?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_publicidad':co_publicidad},
   url: "<?php echo site_url('publicidad/detener_publicidad') ?>",
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

      function activar_publicidad(co_publicidad)
   {


   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Activar promocion',
   content: '¿Estas seguro que deseas activar la promocion ?.',
   type: 'blue',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_publicidad':co_publicidad},
   url: "<?php echo site_url('publicidad/activar_publicidad') ?>",
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
