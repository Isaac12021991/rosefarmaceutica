
                    <!--begin::Content-->
                    <?php $info_empresa_partner = $this->ion_auth->info_partner_todo(); ?>
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">
                                    <!--begin::Actions-->
                                    <h5 id="controlador" class="text-dark font-weight-bold mt-2 mb-2 mr-5">Inicio</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>



                                    <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','LABORATORIO','CASA DE REPRESENTACION'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador','Ventas'")): ?> 
                                    <a href="<?php echo site_url('producto_publicaciones/nuevo_producto_publicaciones')?>" class="font-weight-bolder btn-sm mr-2">Vender</a>

                                <?php endif; ?>
                                <?php endif; ?>

                            <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','FARMACIA','CLINICA'")): ?> 
                         <?php if($this->usuario_library->permiso_empresa("'Administrador','Compras'")): ?>

                                    <a href="<?php echo site_url('compra/orden_compra')?>" class="font-weight-bolder btn-sm mr-2">Mis Compras</a>
                                
                                <?php endif; ?>
                                <?php endif; ?>
                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                
                                       
                                    
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

                                     <div class="col-lg-8">


                                                                                     <div class="row">

                                                <div class="col-12">
                                                    
                              <p class="font-size-h4 font-weight-bolder"> Tendencias</small></p>



                                                </div>

                                            </div>


                                              <div class="row mb-4">

                                                <div class="col-12">


                                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

        <?php $con = 0; foreach ($productos_mas_solicitados->result() as $row): $con ++; ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $con; ?>"></li>
        <?php endforeach; ?>

  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
       
      <img class="d-block w-100" src="<?php echo base_url(); ?>assets/media/stock-900x600/1.png" height="100%" width="100%" alt="First slide">

    </div>

    

    <?php foreach ($productos_mas_solicitados->result() as $row): ?>



    <div class="carousel-item">

      <img class="d-block w-100" src="<?php echo base_url(); ?>assets/media/stock-900x600/2.png" height="100%" width="100%" alt="Second slide">
          <div class="carousel-caption" style="height:80%; width:77%;">
    <h1 class="text-dark" align="right"><?php echo $row->nb_producto; ?></h1>
    <table border="0" class="font-size-sm" width="50%" align="right" style="color:black;">
        <tr>
            <td align="left">Ultimos 5 dias:</td> <td><?php echo number_format($row->ca_producto,2,',','.'); ?> Uni</td>
        </tr> 
    </table>
  </div>
    </div>

   <?php endforeach ?>




  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Atras</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>

                                                

                                                </div>

                                            </div>



            <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','FARMACIA','CLINICA','MEDICO'")): ?> 

                                             <div class="row">

                                                <div class="col-12">
                                                   <p class="font-size-h4 font-weight-bolder">Nuevas entradas <small>

                                                    <a href="<?php echo site_url('biomercado/cartelera')?>" class="animsition-link" data-animsition-out-class="fade-out" data-animsition-out-duration="200">Ver más</a></small></p>

                                                </div>

                                            </div>



                                             <div class="row mb-4">

                                                <div class="col-12">


                                                <div class="row scroll flex-nowrap" style="overflow-x:auto;">

                              
                                             <?php $con = 0; foreach ($info_nuevos_producto->result() as $row): ?>
                                               <?php if ($this->inventario_library->get_producto_disponible($row->id) != 0): $con ++; ?> 

                                                 <div class="col-6 col-sm-6 col-md-4 col-lg-3 ml-0 mr-0">
                                                <div class="card card-custom card-shadowless">
                                                <div class="card-body p-0">
                                                   <!--begin::Image-->
                                                   <div class="overlay">
                                                      <div class="overlay-wrapper rounded bg-light text-center">
                                                         <?php if($row->nb_url_foto != ''): ?>
                                                         <img src="<?php echo $row->nb_url_foto; ?>" style="width:200px; height:150px;" alt="" class="mw-100 w-200px">
                                                      <?php else: ?>
                                                          <img src="<?php echo base_url(); ?>img/productos/producto_sin_foto.jpg" style="width:200px; height:150px;" alt="" class="mw-100 w-200px">
                                                      <?php endif; ?>
                                                      </div>
                                                      <div class="overlay-layer">
                                                         <a href="javascript:" onclick="comprar_modal('<?php echo $row->id; ?>')" class="btn font-weight-bolder btn-sm btn-light-dark">Ver</a>
                                                      </div>
                                                   </div>
                                                   <!--end::Image-->
                                                   <!--begin::Details-->
                                                   <div class="text-center mt-5 mb-md-0 mb-lg-5 mb-md-0 mb-lg-5 mb-lg-0 mb-5 d-flex flex-column">
                                                      <a href="javascript:" onclick="comprar_modal('<?php echo $row->id; ?>')" class="font-size-h6 font-weight-bolder text-dark-75 text-hover-primary mb-1"><?php echo substr($row->nb_producto, 0,15); ?></a>
                                                      <span class="font-size-lg">
   

                                                         <a href="javascript:"><?php echo $row->nb_estado; ?></a>



                                                      </span>
                                                   </div>
                                                   <!--end::Details-->
                                                </div>
                                             </div>

                                          </div>

                                           <?php endif; ?>
                                       <?php endforeach; ?>




                               </div>




                                 </div>

                                 </div>



                                             <div class="row">

                                                <div class="col-12">
                                                    <p class="font-size-h4 font-weight-bolder"> Categorias</p>

                                                </div>

                                            </div>


                                 <div class="row mb-4">
                                      <?php if($list_categoria->num_rows() > 0): ?>
                                      <?php foreach ($list_categoria->result() as $row): ?>
                                        <?php if ($row->nb_categoria != ''): ?>
                                                                <div class="col-4 mr-2">
                                        <!--begin::Engage Widget 5-->
                                        <div class="card card-custom card-stretch gutter-b">
                                            <div class="card-body d-flex p-0">
                                                <div class="flex-grow-1 p-6 pb-6 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: right bottom; background-size: 55% auto; background-color:#004445;">
                                                    <h3 class="text-inverse-info pb-5 font-weight-bolder"><?php echo $row->nb_categoria; ?></h3>
                                                 
                                                    <a href="javascript:" onclick="ver_categoria('<?php echo $row->nb_categoria; ?>')" class="btn btn-white font-weight-bold py-2 px-6 p-0">Ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Engage Widget 5-->
                                    </div>

                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    <?php endif; ?>

                                 </div>

                                         <div class="row">

                                                <div class="col-12">
                                                    <p class="font-size-h4 font-weight-bolder"> Usuarios certificados</p>

                                                </div>

                                            </div>


                                <div class="row mb-4">
                                      <?php if($list_empresas_certificadas->num_rows() > 0): ?>
                                      <?php foreach ($list_empresas_certificadas->result() as $row): ?>


                                          <?php  $token_partner =  $this->authjwt->encode_token_empresa($row->co_usuario, $row->nb_empresa, $row->co_partner, $row->username); ?>


                                          <div class="col-6 col-lg-4">


                                            <div class="card-body rounded bg-white p-2">
                                                                <div class="text-center">
                                                                    <h3 class="font-size-h4">
                                                                        <a href="javascript:" onclick="perfil_empresa('<?php echo $token_partner; ?>')" class="text-dark font-weight-bolder"><?php echo $row->username; ?></a>
                                                                    </h3>
                                                                    <div class="font-size-md text-primary"><?php echo $row->nb_estado; ?></div>
                                                                </div>
                                                            </div>


                                                        </div>




                                    <?php endforeach; ?>
                                    <?php endif; ?>

                                 </div>

                             <?php endif; ?>

                                     </div>


                                <div class="col-lg-4">

                                    <div class="row">
                                    <div class="col-lg-12">
                                       
                                    <?php if($this->ion_auth->in_empresa_activado() == 0): ?>
                                         <?php $co_partner = $this->ion_auth->co_partner(); ?>

                                        <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
                                    <div class="alert-icon">
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Info-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"/>
                                                <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </div>
                                    <div class="alert-text"><h4 class="text-danger">Empresa no verificada</h4>
                                    
                                            <ul>
                                            <li> Ingresa a  <a href='<?php echo site_url("partner/editar_partner/$co_partner"); ?>' class="pl-0 pr-5 text-info">Administracion de empresa</a> </li>

                                            <li> Complete todos los datos de su empresa y envie los documentos solicitados. </li>
                                            <li> En lapso no mayor a 24 horas nuestro equipo verificará los datos y procederá a verificarlos. </li>

                                                        </ul>

                                                    </div>
                                </div>
        
                                   <?php endif; ?>
                                          

                                            

                                    <div class="card card-custom">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                            
                                                <!--begin::Section-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Pic-->
               
                                                    <!--end::Pic-->
                                                    <!--begin::Info-->
                                                    <div class="d-flex flex-column mr-auto">
                                                         <?php $co_partner = $this->ion_auth->co_partner(); ?>
                                                        <!--begin: Title-->
                                                        <a href='<?php echo site_url("partner/editar_partner/$co_partner") ?>' class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1"><?php echo $this->ion_auth->empresa(); ?> 
                                                         <?php if($this->ion_auth->in_empresa_activado() == 0): ?><span class="text-danger">(EMPRESA NO VERIFICADA)</span></span> <?php endif; ?></a> 

                                                        <?php if($this->ion_auth->in_empresa_activado() == 0): ?>
                                                        <a href='<?php echo site_url("partner/editar_partner/$co_partner"); ?>' class="pl-0 pr-5 text-info"> Haga click aqui para comlpetar los datos de su empresa</a>  <?php endif; ?>
                                                        <span class="text-muted font-weight-bold"><?php echo $this->ion_auth->tipo_empresa(); ?></span>

                                                        <!--end::Title-->
                                                    </div>

                                                </div>
                                                <!--end::Section-->
                                                <!--begin::Content-->
                                                <div class="d-flex flex-wrap mt-8">
                                            <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','LABORATORIO','CASA DE REPRESENTACION'")): ?>   
                            <?php if($this->usuario_library->permiso_empresa("'Administrador','Ventas'")): ?> 

                                                    <div class="mr-12 d-flex flex-column mb-7" onclick="ver_publicaciones();">
                                                        <span class="d-block font-weight-bold mb-4">Publicaciones activas</span>
                                                        <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text"><?php echo $info_actividad_plataforma->ca_publicaciones; ?></span>
                                                    </div>
                                                    <div class="mr-12 d-flex flex-column mb-7" onclick="ver_orden_compra();">
                                                        <span class="d-block font-weight-bold mb-4">Ventas por certificar</span>
                                                        <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text"><?php echo $info_actividad_plataforma->ca_venta; ?></span>
                                                    </div>
                                                <?php endif; ?>
                                                <?php endif; ?>


            
                                                    <!--end::Progress-->
                                                </div>
                                                <!--end::Content-->

        

                                                <!--begin::Blog-->
                                                <div class="d-flex flex-wrap">
                                                    <!--begin: Item-->
                                            <?php if($dolar_paralelo->num_rows() > 0): ?>
                                            <?php $info_dolar = $dolar_paralelo->row(); ?>
                                                    <div class="mr-12 d-flex flex-column mb-7">
                                                        <span class="font-weight-bolder mb-4">Dolar BCV</span>
                                                        <span class="font-weight-bolder font-size-h5 pt-1">
                                                        <span class="font-weight-bold text-dark-50">Bs</span> <?php echo number_format($info_dolar->ca_tasa_cambio, '2',',','.');  ?></span>
                                                    </div>
                                                <?php endif; ?>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="mr-12 d-flex flex-column mb-7">
                                                        <span class="font-weight-bolder mb-4">Membresía</span>
                                                        <span class="font-weight-bolder font-size-h5 pt-1">
                                                        <span class="font-weight-bold text-dark-50"></span>
                                                        <a href="<?php echo site_url('membresia/index'); ?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2" 
                                                        data-toggle="tooltip" data-theme="dark" title="¿Deseas cambiar de membresia?, has clic para cambiar de membresia"><?php $info_membresia = $this->membresia_library->get_membresia(); echo $info_membresia->nb_membresia; ?></a>
                                                        </span>
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-column flex-lg-fill float-left mb-7">
                                                        <span class="font-weight-bolder mb-4">Ubicación</span>
                                                         <span class="font-weight-bolder font-size-h5 pt-1">
                                                         <span class="font-weight-bold text-dark-50"></span><?php echo $info_empresa_partner->nb_estado; ?> </span>

                                                    </div>


                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Blog-->
                                            </div>
                                            <!--end::Body-->
                                            <!--begin::Footer-->
                                            <div class="card-footer d-flex align-items-center">
                                                <div class="d-flex">
                                                    <div class="d-flex align-items-center mr-10">

                                                      

                                                        <span class="svg-icon svg-icon-warning">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Text/Bullet-list.svg-->
                                                          <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Star.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <a href="#" class="font-weight-bolder text-primary ml-2"> <?php $info_reputacion = $this->ion_auth->promedio_reputacion_empresa('VENDEDOR', $info_empresa_partner->id); if ($info_reputacion): echo $info_reputacion->ca_promedio_reputacion; else: echo "N/D"; endif; ?> Reputacion</a>
                                                    </div>
                                                    <div class="d-flex align-items-center mr-7">
                                                        <span class="svg-icon svg-icon-gray-500">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"></path>
                                                                    <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                         <?php $ff_creacion = date("d-m-Y g:i:s a", $info_empresa_partner->ff_sistema_time); ?>
                                                        <a href="#" class="font-weight-bolder text-primary ml-2"> <?php echo time_stamp($ff_creacion); ?> En Rose</a>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--end::Footer-->
                                        </div>




                                                <div class="card mb-4 mt-4">
                                                <div class="card-body">
                                                <div class="p-2">
                                                    <div class="d-flex justify-content-between align-items-center mb-8">
                                                        <!--begin::Heading-->
                                                        <h2 class="text-dark">Centro de Ayuda</h2>
                                                        <!--end::Heading-->
                                                        <!--begin::Badge-->
                                                        <!--end::Badge-->
                                                    </div>
                                                    <!--begin::Content-->
                                                    <div class="text-dark-50 font-size-lg">
                                                        <p>Hola <?php echo $this->ion_auth->get_nombre_usuario(); ?>, Bienvenido a Rose, la Red Orgánica del Sector Empresarial Farmaceutico, tu plataforma digital empresarial.</p>

                                                        <p> ¿Como podemos ayudarte?</p>
                                                        <a href="<?php echo site_url("ayuda/ayuda_rose_general");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Ir al Centro de Ayuda</a>
                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                            </div>
                                            </div>



                

                                            </div>




                                            </div>







                                </div>



                            </div>

                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>

<div class="modal fade"  id="ajax_remote" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <h3 align="center" class="text-dark">Cargando...</h3>
        </div>
    </div>
</div>



<script type="text/javascript">

                 function perfil_empresa(token_empresa)
        {
        $(location).attr('href',"<?php echo site_url() ?>perfil_empresa/empresa"+'/'+token_empresa); 
        }


        function comprar_modal(co_producto_publicaciones) {

            $('#ajax_remote').modal('show');
             
        $.get("<?php echo site_url('compra/agregar_carro') ?>"+"/"+co_producto_publicaciones,
        function(data){
        if (data != "") {
           
            $('#ajax_remote').modal('show');
            $('#ajax_remote .modal-content').html(data);
        }            
                  }

        );  

        
        }


    
    function ver_orden_compra() {

         $(location).attr('href',"<?php echo site_url() ?>venta/orden_compra/nuevo"); 
        // body...
    }

        function ver_publicaciones() {

         $(location).attr('href',"<?php echo site_url() ?>producto_publicaciones/index"); 
        // body...
    }

        function ver_terminos() {

        window.open('<?php echo base_url() ?>archivos/politicas/Terminos Y Condiciones Rose.pdf', '_blank');

    }

    // Consultar de forma estándar el permiso
 


   $(document).ready(function(){


      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('<h3 align="center" class="text-dark">Cargando...</h3>');
   })
   

   }); // Fin ready
   
   
               function ver_categoria(nb_categoria)

    {


         $('<input />').attr('type', 'hidden')
     .attr('name', "nb_categoria")
     .attr('value', nb_categoria)
     .appendTo('#form_1');

      $("#form_1").submit();


    }




</script>