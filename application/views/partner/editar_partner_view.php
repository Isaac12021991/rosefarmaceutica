                    <?php $info_usuario = $this->ion_auth->info_user_todo(); ?>
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
                                    <h5 id="controlador" class="text-dark font-weight-bold mt-2 mb-2 mr-5">Perfil</h5>
                                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="javascript:" class="text-muted">Empresa</a>
                                            </li>
                                        </ul>


        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                                                                      
                                <a onclick="editar_partner()" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

                                <a href="javascript:window.history.back();" class="btn btn-clean font-weight-bolder btn-sm mr-2">Descartar</a>
                                
        
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

                                      <div class="col-lg-4 p-0 p-lg-0">

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
                                                      <img src="<?php echo $info_usuario->nb_foto_perfil; ?>" alt="Cambiar foto de perfil" onclick="abrir_foto_perfil_modal()">
                                                        <i class="symbol-badge bg-success"></i>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary"><?php echo $info_usuario->first_name; ?> <?php echo $info_usuario->last_name; ?></a>
                                                        <div class="text-dark"><?php echo $info_usuario->username; ?></div>
                                                    </div>
                                                </div>
                                                <!--end::User-->
                                                <!--begin::Contact-->
                                                <div class="py-9">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Ubicacion:</span>
                                                        <a href="javascript:" class="text-muted text-hover-primary"><?php echo $info_usuario->nb_estado; ?></a>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Email:</span>
                                                        <a href="javascript:" class="text-muted text-hover-primary"><?php echo $info_usuario->email; ?></a>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">Celular:</span>
                                                        <span class="text-muted"><?php echo $info_usuario->phone; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <span class="font-weight-bold mr-2">WhatsApp:</span>
                                                        <span class="text-muted"><?php echo $info_usuario->nu_whatsapp; ?></span>
                                                    </div>

                             
                                                </div>

                                         <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
    
                                                    <div class="navi-item mb-2">
                                                        <a href="<?php echo site_url("cuenta/cuenta"); ?>" class="navi-link py-4">
                                                            <span class="navi-icon mr-2">
                                                                <span class="svg-icon">
                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span>
                                                            </span>
                                                            <span class="navi-text font-size-lg">Informacion Personal</span>
                                                        </a>
                                                    </div>
   
                                                     <?php if($this->usuario_library->permiso_empresa("'Administrador'")): ?>
                                                    <div class="navi-item mb-2">
                                                        <?php $co_partner = $this->ion_auth->co_partner(); ?>
                                                        <a href="<?php echo site_url("partner/editar_partner/$co_partner"); ?>" class="navi-link py-4 active">

                                                             <span class="navi-icon mr-2">
                                                            <span class="svg-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Building.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="#000000"/>
                                                                <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
                                                                <path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="#000000" opacity="0.3"/>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                        </span>
                                                            <span class="navi-text font-size-lg">Empresas</span>

                                                        </a>
                                                    </div>
                                                     <?php endif; ?>


 
                        <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','CASA DE REPRESENTACION','LABORATORIO'")): ?> 
                         <?php if($this->usuario_library->permiso_empresa("'Administrador'")): ?>

                                                    <div class="navi-item mb-2">
                                                        <a href="<?php echo site_url("cuenta_banco/index"); ?>" class="navi-link py-4">
                                                            <span class="navi-icon mr-2">
                                                                 <span class="svg-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Wallet2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <rect fill="#000000" opacity="0.3" x="2" y="2" width="10" height="12" rx="2"/>
                                                                    <path d="M4,6 L20,6 C21.1045695,6 22,6.8954305 22,8 L22,20 C22,21.1045695 21.1045695,22 20,22 L4,22 C2.8954305,22 2,21.1045695 2,20 L2,8 C2,6.8954305 2.8954305,6 4,6 Z M18,16 C19.1045695,16 20,15.1045695 20,14 C20,12.8954305 19.1045695,12 18,12 C16.8954305,12 16,12.8954305 16,14 C16,15.1045695 16.8954305,16 18,16 Z" fill="#000000"/>
                                                                </g>
                                                            </svg><!--end::Svg Icon--></span>
                                                            </span>
                                                            <span class="navi-text font-size-lg">Cuentas Bancarias</span>
                                                        </a>
                                                    </div>

                                                <?php endif; ?>
                                                <?php endif; ?>


                                             <div class="navi-item mb-2">
                                            <a href="<?php echo site_url("cuenta/ver_partner_cuenta"); ?>" class="navi-link py-4">
                                                 <span class="navi-icon mr-2">
                                                <span class="svg-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Navigation\Exchange.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                        <rect fill="#000000" opacity="0.3" transform="translate(13.000000, 6.000000) rotate(-450.000000) translate(-13.000000, -6.000000) " x="12" y="8.8817842e-16" width="2" height="12" rx="1"/>
                                                        <path d="M9.79289322,3.79289322 C10.1834175,3.40236893 10.8165825,3.40236893 11.2071068,3.79289322 C11.5976311,4.18341751 11.5976311,4.81658249 11.2071068,5.20710678 L8.20710678,8.20710678 C7.81658249,8.59763107 7.18341751,8.59763107 6.79289322,8.20710678 L3.79289322,5.20710678 C3.40236893,4.81658249 3.40236893,4.18341751 3.79289322,3.79289322 C4.18341751,3.40236893 4.81658249,3.40236893 5.20710678,3.79289322 L7.5,6.08578644 L9.79289322,3.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(7.500000, 6.000000) rotate(-270.000000) translate(-7.500000, -6.000000) "/>
                                                        <rect fill="#000000" opacity="0.3" transform="translate(11.000000, 18.000000) scale(1, -1) rotate(90.000000) translate(-11.000000, -18.000000) " x="10" y="12" width="2" height="12" rx="1"/>
                                                        <path d="M18.7928932,15.7928932 C19.1834175,15.4023689 19.8165825,15.4023689 20.2071068,15.7928932 C20.5976311,16.1834175 20.5976311,16.8165825 20.2071068,17.2071068 L17.2071068,20.2071068 C16.8165825,20.5976311 16.1834175,20.5976311 15.7928932,20.2071068 L12.7928932,17.2071068 C12.4023689,16.8165825 12.4023689,16.1834175 12.7928932,15.7928932 C13.1834175,15.4023689 13.8165825,15.4023689 14.2071068,15.7928932 L16.5,18.0857864 L18.7928932,15.7928932 Z" fill="#000000" fill-rule="nonzero" transform="translate(16.500000, 18.000000) scale(1, -1) rotate(270.000000) translate(-16.500000, -18.000000) "/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                                            </span>
                                                            <span class="navi-text font-size-lg">Cambiar empresa</span>
                                                        </a>
                                                    </div>

                                                </div>


                                                <!--end::Contact-->
                                                <!--begin::Nav-->
                    
                                                <!--end::Nav-->
                                            </div>
                                            <!--end::Body-->
                                        </div>



                                       </div>
                                    

   
                                <div class="col-lg-8 pt-lg-0 pl-lg-4 pr-lg-4 pt-2 pl-0 pr-0">


                                                                            <div class="card card-custom card-stretch">
                                            <!--begin::Header-->
                                            <div class="card-header py-3">
                                                <div class="card-title align-items-start flex-column">
                                                    <h3 class="card-label font-weight-bolder text-dark">Informacion de la empresa</h3>
                                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Actualize la información de la empresa</span>
                                                </div>
                                                <div class="card-toolbar">

                                                
      
                                                </div>
                                            </div>
                                            <!--end::Header-->
                                                <!--begin::Body-->
                                                <div class="card-body">



              <div class="row justify-content-center my-2 px-2 my-lg-0 px-lg-2">
                        <div class="col-xl-12 col-xxl-7">

                            
                                 <div class="separator separator-dashed my-0"></div>
                                        <!--begin::Form Group-->
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h5 class="font-weight-bold mb-6">Informacion principal:</h5>
                                    </div>
                                </div>
                                 <?php if($this->ion_auth->in_empresa_activado() == 0): ?>
                                <div class="form-group mb-2">
                                <label>Identificacion</label>
                                 <input type="text" name="nu_identificacion" id="nu_identificacion" class="form-control form-control-lg" placeholder="Identificacion" value="<?php echo $info_partner->nu_rif; ?>">
                                <span class="form-text text-muted">Identificacion de la empresa.</span>
                              </div>

                          <?php else: ?>
    

                             <div class="form-group">
                            <label>Identificacion:</label>
                            <p class="form-control-plaintext text-muted"><?php echo $info_partner->nu_rif; ?></p>
                            </div>


                           <?php endif; ?>



                                 <div class="form-group mb-2">
                                <label>Nombre</label>
                               <input type="text" name="nb_partner" id="nb_partner" class="form-control" placeholder="Nombre" value="<?php echo $info_partner->nb_empresa; ?>">
                                <span class="form-text text-muted">Nombre completo de la empresa.</span>
                              </div>

                              <div class="form-group mb-2">
                                <label>Representante</label>
                                  <input type="text" name="nb_representante" id="nb_representante" class="form-control" placeholder="Representante" value="<?php echo $info_partner->nb_representante; ?>">  
                                <span class="form-text text-muted">Ingrese el nombre del representante.</span>
                              </div>


                                             <div class="separator separator-dashed my-5"></div>
                                                    <!--begin::Form Group-->
                                            <div class="row">
                                                <label class="col-xl-3"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <h5 class="font-weight-bold mb-6">Contacto:</h5>
                                                </div>
                                            </div>


                              <div class="form-group mb-2">
                                <label>Telefono</label>
                               <input type="text" name="nu_telefono" id="nu_telefono" class="form-control" value="<?php echo $info_partner->nu_telefono_celular; ?>" placeholder="Telefono / Celular">  
                                <span class="form-text text-muted">Ingrese el telefono de contacto.</span>
                              </div>


                              <div class="form-group mb-2">
                                <label>Email</label>
                                  <input type="text"  name="tx_email" id="tx_email" class="form-control" value="<?php echo $info_partner->tx_email; ?>" placeholder="Email">  
                                <span class="form-text text-muted">Ingrese el email de la empresa.</span>
                              </div>

                                <?php if($this->ion_auth->in_empresa_activado() == 0): ?>
                              <div class="form-group mb-2">
                                <label>Cod Sicm</label>
                                    <input type="text" class="form-control" id="nu_sicm" name="nu_sicm" placeholder="Código" maxlength="6" value="<?php echo $info_partner->cod_sicm; ?>">
                                <span class="form-text text-muted">Indique su codigo SICM.</span>
                              </div>

                                                        <?php else: ?>
    

                             <div class="form-group">
                            <label>Cod Sicm:</label>
                            <p class="form-control-plaintext text-muted"><?php echo $info_partner->cod_sicm; ?></p>
                            </div>


                           <?php endif; ?>

                                        <div class="separator separator-dashed my-5"></div>
                                                    <!--begin::Form Group-->
                                            <div class="row">
                                                <label class="col-xl-3"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <h5 class="font-weight-bold mb-6">Ubicacion:</h5>
                                                </div>
                                            </div>


                              <div class="form-group mb-2">
                                <label>Direccion</label>
                                 <textarea class="form-control" id="tx_direccion" name="tx_direccion"><?php echo $info_partner->tx_direccion; ?></textarea>
                                <span class="form-text text-muted">Direccion Fiscal.</span>
                              </div>


                              <div class="form-group mb-2">
                                <label>Latitud</label>
                                  <input type="text" name="tx_latitud" value="<?php echo $info_partner->tx_latitud; ?>" id="tx_latitud" class="form-control" placeholder="Latitud">   
                                <span class="form-text text-muted">Latitud.</span>
                              </div>

                              <div class="form-group mb-2">
                                <label>Longitud</label>
                                    <input type="text" name="tx_longitud" id="tx_longitud" class="form-control" placeholder="Longitud" value="<?php echo $info_partner->tx_longitud; ?>">  
                                <span class="form-text text-muted">Longitud.</span>
                              </div>

                              <a class="btn btn-sm btn-light-primary" href="javascript:" onclick="obtener_posicion()">Obtener ubicación</a>
                              <?php if($this->usuario_library->permiso_tipo_empresa("'FARMACIA','CLINICA','MEDICO'")): ?> 
                              <p class="text-dark">Ingresa la latitud y longitud para saber la ubicacion exacta de tu empresa; al ingresar tus coordenadas las personas podran ubicarte con mayor facilidad a traves de ROSE</p>
                                 <?php endif; ?>

                                <?php if($this->ion_auth->in_empresa_activado() == 0): ?>

                                <div class="form-group mb-2">
                                <label>Estado</label>
                                   <select id="nb_estado_accion" name="nb_estado_accion" class="form-control" onchange="buscar_municipio(this.value)">
                                  <option value="">Sin estado</option>
                             <?php foreach($estados->result() as $row){echo "<option value='".$row->nb_estado."'>".$row->nb_estado."</option>";} ?>
                                </select>   
                                <span class="form-text text-muted">Estado.</span>
                              </div>


                              <div class="form-group mb-2">
                                <label>Municipio</label>
                                <div id="div_municipio">
                                     <select id="nb_municipio_accion" name="nb_municipio_accion" class="form-control" onchange="buscar_parroquia(this.value)">
                                              <option value="">Sin municipio</option>
                                         <?php foreach($municipios->result() as $row){echo "<option value='".$row->nb_municipio."'>".$row->nb_municipio."</option>";} ?>
                                            </select> 
                                        </div>
                                <span class="form-text text-muted">Municipio.</span>
                              </div>


                              <div class="form-group mb-2">
                                <label>Parroquia</label>
                                <div id="div_parroquia">
                                            <select id="nb_parroquia_accion" name="nb_parroquia_accion" class="form-control">
                                              <option value="">Sin parroquia</option>
                                         <?php foreach($parroquias->result() as $row){echo "<option value='".$row->nb_parroquia."'>".$row->nb_parroquia."</option>";} ?>
                                            </select>
                                            </div>
                                <span class="form-text text-muted">Municipio.</span>
                              </div>

                               <?php endif; ?>


                              
                                                 <div class="separator separator-dashed my-5"></div>
                                                    <!--begin::Form Group-->
                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-6">Usuarios:</h5>
                                                        </div>
                                                    </div>
                                                    <!--begin::Form Group-->
                                                    <!--begin::Form Group-->
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                        

                                                            <div class="card-body pt-2">


                                                     <?php if (isset($usuarios_partner)) : ?>
                                                    <?php if ($usuarios_partner->num_rows() > 0) : ?>

                                                        <?php foreach ($usuarios_partner->result() as $row) : ?>

                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-4">
                                                    <!--begin::Bullet-->

                                                    <span class="bullet bullet-bar bg-primary align-self-stretch"></span>
                                        
                                                    <!--end::Bullet-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 ml-5">
                                                        <a href="javascript:" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1"><?php echo $row->first_name; ?> <?php echo $row->last_name; ?></a>

                                                        <span class="text-muted font-weight-bold"><?php echo $row->email; ?></span>
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

                                                                                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="abrir_modal_permiso_usuario(<?php echo $row->co_usuario_partner; ?>)" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-bell-2"></i>
                                                                        </span>
                                                                        <span class="navi-text">Permisos</span>
                                                                    </a>
                                                                </li>

         
                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="eliminar_usuario_partner(<?php echo $row->id; ?>)" class="navi-link">
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

                                                <span>Sin usuarios registrados</span>

                                            <?php endif; ?>

                                            <?php endif; ?>
                                                <!--end:Item-->
                                                <!--end::Item-->
                                            </div>



                                                                                                <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Agregar Usuario</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <a onclick="abrir_modal_agregar_usuario_partner('<?php echo $co_partner; ?>')" class="btn btn-light-primary font-weight-bold btn-sm">Agregar usuario</a>
                                                            <p class="form-text text-muted pt-2">Si desea que otro usuario administre su empresas presione en agregar usuario.
                                                            </p>
                                                        </div>
                                                    </div>




                                                        </div>
                                                    </div>



                                                 <div class="separator separator-dashed my-5"></div>
                                                    <!--begin::Form Group-->
                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-6">Documentación:</h5>
                                                        </div>
                                                    </div>
                                                    <!--begin::Form Group-->
                                                    <!--begin::Form Group-->
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                        

                                                            <div class="card-body pt-2">

                                                 <?php if (isset($documentos_partner)) : ?>
                                                                <?php if ($documentos_partner->num_rows() > 0) : ?>

                                                        <?php foreach ($documentos_partner->result() as $row) : ?>

                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-4">
                                                    <!--begin::Bullet-->

                                                    <span class="bullet bullet-bar bg-primary align-self-stretch"></span>
                                        
                                                    <!--end::Bullet-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 ml-5">
                                                        <a href="javascript:" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1">
                                                            <?php echo $row->nb_documento; ?></a>

                                                        <span class="text-muted font-weight-bold"><?php echo $row->nb_estatus; ?></span>
                                                        <span class="text-dark font-weight-bold"><a href="<?php echo $row->nb_url; ?>" target="_blank">Ver adjunto</a></span>
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
         
                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="eliminar_documento(<?php echo $row->id; ?>)" class="navi-link">
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

                                                <span>No hay documentos registrados</span>

                                            <?php endif; ?>

                                            <?php endif; ?>
                                                <!--end:Item-->
                                                <!--end::Item-->
                                            </div>



                                                                                                <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">Agregar Documento</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <a onclick="abrir_modal_documento('<?php echo $co_partner; ?>')"class="btn btn-light-primary font-weight-bold btn-sm">Agregar</a>
                                                            <p class="form-text text-muted pt-2">Para certificar su empresa cargue y adjunte: el rif, el permiso de instalación y funcionamiento entre otros.
                                                            </p>
                                                        </div>
                                                    </div>




                                                        </div>
                                                    </div>

                                                    <?php if($this->usuario_library->permiso_tipo_empresa("'DROGUERIA','CASA DE REPRESENTACION'")): ?> 

                                    <div class="separator separator-dashed my-5"></div>
                                                    <!--begin::Form Group-->
                                            <div class="row">
                                                <label class="col-xl-3"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <h5 class="font-weight-bold mb-6">Configuracion y politicas de la empresa:</h5>
                                                </div>
                                            </div>


                              <div class="form-group mb-2">
                                <label>Tipo de pago</label>
                                  <?php $array_nb_tipo_pago_actual = explode(",", $info_partner->nb_tipo_pago); ?>

                                             <select class="form-control js-multiple_tipo_pago" id="nb_tipo_pago" name="nb_tipo_pago" multiple="multiple">

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
                                <span class="form-text text-muted">Seleccione el tipo de pago.</span>
                              </div>

                              <div class="form-group mb-2">
                                <label>Forma de pago</label>
                                  <?php $array_nb_forma_pago_actual = explode(",", $info_partner->nb_forma_pago); ?>

                                             <select class="form-control js-multiple_forma_pago" id="nb_forma_pago" name="nb_forma_pago" multiple="multiple">

                                                <?php  foreach($lista_forma_pago->result() as $row){
                                                        $in_verificado = 0;
                                                        foreach ($array_nb_forma_pago_actual as $value) {
                                                            
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
                                <span class="form-text text-muted">Indique su forma de pago.</span>
                              </div>

                            <div class="form-group mb-2">
                                <label>Forma de entrega</label>
                                 
                                             <select class="form-control" id="nb_forma_entrega" name="nb_forma_entrega">
                                                    <option value="">No especificar</option>
                                                <?php foreach($forma_entrega->result() as $row){
                                                     echo "<option value='".$row->nb_forma_entrega."'>".$row->nb_forma_entrega."</option>";
                                                } ?>
                                                </select> 

                                <span class="form-text text-muted">Indique su forma de entrega.</span>
                              </div>



                            <div class="form-group mb-2">
                                <label>Forma de envio</label>
                                            <?php $array_forma_envio_actual = explode(",", $info_partner->nb_forma_envio); ?>

                                             <select class="form-control js-forma_envio" id="nb_forma_envio" multiple="multiple" name="nb_forma_envio">


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
                                <span class="form-text text-muted">Seleccione la forma de envío.</span>
                              </div>

                            <div class="form-group mb-2">
                                <label>Moneda principal</label>
                                        <select class="form-control" id="co_moneda" name="co_moneda" placeholder="Moneda predeterminada">
                                                <option value="">No especificar</option>
                                                <?php foreach($moneda->result() as $row){
                                                if($row->nb_moneda == 'DOLARES'):
                                                echo "<option selected='selected' value='".$row->id."'>".$row->nb_moneda."</option>";
                                                continue;
                                                endif;
                                                echo "<option value='".$row->id."'>".$row->nb_moneda."</option>";
                                                } ?>
                                                </select>  
                                <span class="form-text text-muted">Seleccione la moneda predeterminada que va manejar esta compañia.</span>
                              </div>


                                                           <div class="form-group mb-2">
                                <label>Terminos, condiciones, politicas de devolucion y demas reglas de la empresa</label>
                              <div class="summernote"></div>
                              </div>


                          <?php endif; ?>



                        </div>




                      </div>



                                                </div>
                                                <!--end::Body-->
                                         
                                            <!--end::Form-->
                                        </div>





        

                                </div>






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


    function obtener_posicion() {

        KTApp.blockPage({
              overlayColor: 'white',
              opacity: 0.2,
              state: 'primary',
              message: 'Obteniendo coordenadas... <br>para obtener las coordenadas debe de<br> conceder el permiso en el navegador'
             });


  if (navigator.geolocation) {


    navigator.geolocation.getCurrentPosition(mostrarPosicion, mostrarErrores, opciones);    
} else {
    KTApp.unblockPage();
}

function mostrarPosicion(posicion) {
    var latitud = posicion.coords.latitude;
    var longitud = posicion.coords.longitude;
    var precision = posicion.coords.accuracy;
    var fecha = new Date(posicion.timestamp);

    $('#tx_latitud').val(posicion.coords.latitude); 
   $('#tx_longitud').val(posicion.coords.longitude); 


       $.ajax({
   method: "POST",
   data: {'tx_latitud':posicion.coords.latitude, 'tx_longitud':posicion.coords.longitude},
   url: "<?php echo site_url('partner/obtener_posicionamiento') ?>",
                }).done(function( data ) { 
   
                 }).fail(function(){
  
                 }); 

    KTApp.unblockPage();

}

function mostrarErrores(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            KTApp.unblockPage();
            break;
        case error.POSITION_UNAVAILABLE:
            KTApp.unblockPage();
            break; 
        case error.TIMEOUT:
            KTApp.unblockPage();
            break;
        default:
            KTApp.unblockPage();
    }
}

var opciones = {
    enableHighAccuracy: true,
    timeout: 10000,
    maximumAge: 1000
};

}





    function buscar_municipio(nb_estado) {

        $('#nb_parroquia_accion').val('');

                               $.ajax({
        method: "POST",
        data: {'nb_estado':nb_estado},
        url: "<?php echo site_url('partner/buscar_municipio') ?>",
                     }).done(function( data ) { 

                        $('#div_municipio').html(data);

   
                      }).fail(function(){


                    alert('Fallo');


                      }); 


        // body...
    }

        function buscar_parroquia(nb_municipio) {

                               $.ajax({
        method: "POST",
        data: {'nb_municipio':nb_municipio},
        url: "<?php echo site_url('partner/buscar_parroquia') ?>",
                     }).done(function( data ) { 

                        $('#div_parroquia').html(data);

   
                      }).fail(function(){


                    alert('Fallo');


                      }); 


        // body...
    }


   
                   function abrir_modal_agregar_usuario_partner(co_partner) {


                            $.get("<?php echo site_url('partner/agregar_usuario_partner') ?>" + "/"+co_partner,
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }

                                             function abrir_modal_documento(co_partner) {


                            $.get("<?php echo site_url('partner/agregar_documento') ?>" + "/"+co_partner,
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }


                    function abrir_modal_permiso_usuario(co_partner) {

                            $.get("<?php echo site_url('partner/editar_usuario_partner_permisos') ?>" + "/"+co_partner,
                            function(data){
                            if (data != "") {
                                $('#ajax_remote').modal('show');
                                $('#ajax_remote .modal-content').html(data);
                            }            
                                      }

                            );  

                            
                            }




                            



    $(document).ready(function() {

$('#co_moneda').val('<?php echo $info_partner->co_moneda; ?>')
$('#nb_forma_entrega').val('<?php echo $info_partner->nb_forma_entrega; ?>')


        $('.summernote').summernote('code', '<?php echo $info_partner->tx_terminos_condiciones ; ?>');



    $('.js-multiple_tipo_pago').select2({
         tags: "true",
         placeholder: "Seleccione los tipo de pago"
    });

    $('.js-forma_envio').select2({
         tags: "true",
         placeholder: "Seleccione los modo de envio"
    });
    $('.js-multiple_forma_pago').select2({
         tags: "true",
         placeholder: "Seleccione las forma de pago"
    });


      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   



});




$('#nb_estado_accion').val('<?php echo $info_partner->nb_estado; ?>');
$('#nb_municipio_accion').val('<?php echo $info_partner->nb_municipio; ?>');
$('#nb_parroquia_accion').val('<?php echo $info_partner->nb_parroquia; ?>');



 function editar_partner()
   {               
        var co_partner = '<?php echo $co_partner; ?>';
        var nu_identificacion = $('#nu_identificacion').val(); 
        var nb_partner = $('#nb_partner').val(); 
        var nb_representante = $('#nb_representante').val(); 
        var nu_telefono = $('#nu_telefono').val(); 
        var tx_email = $('#tx_email').val();
        var tx_direccion = $('#tx_direccion').val();
        var nu_sicm = $('#nu_sicm').val();
        var nb_estado = $('#nb_estado_accion').val(); 
        var nb_municipio = $('#nb_municipio_accion').val(); 
        var nb_parroquia = $('#nb_parroquia_accion').val(); 
        var tx_latitud = $('#tx_latitud').val(); 
        var tx_longitud = $('#tx_longitud').val(); 

        var co_moneda = $('#co_moneda').val();
        var nb_tipo_pago = $('#nb_tipo_pago').val();
        var nb_forma_entrega = $('#nb_forma_entrega').val(); 
        var nb_forma_pago = $('#nb_forma_pago').val();
        var nb_forma_envio = $('#nb_forma_envio').val();

        var tx_condiciones = $('.summernote').summernote('code');


        if (nu_identificacion == '') {

        toastr.error("Ingrese el numero de identificacion", 'Error');
        $('#nu_identificacion').focus();
        return;

        };



        if (nb_partner == '') {

        toastr.error("Ingrese el nombre de la empresa", 'Error');
        $('#nb_partner').focus();
        return;

        };



            var data = new FormData();

            data.append('co_partner', co_partner);
            data.append('nu_identificacion', nu_identificacion);
            data.append('nb_partner', nb_partner);
            data.append('nb_representante', nb_representante);
            data.append('nu_telefono', nu_telefono);
            data.append('tx_email', tx_email);
            data.append('tx_direccion', tx_direccion);

            data.append('nu_sicm', nu_sicm);
            data.append('nb_estado', nb_estado);
            data.append('nb_municipio', nb_municipio);
            data.append('nb_parroquia', nb_parroquia);

            data.append('tx_latitud', tx_latitud);
            data.append('tx_longitud', tx_longitud);
            data.append('co_moneda', co_moneda);
            data.append('nb_tipo_pago', nb_tipo_pago);
            data.append('nb_forma_entrega', nb_forma_entrega);
            data.append('nb_forma_pago', nb_forma_pago);
            data.append('nb_forma_envio', nb_forma_envio);
            data.append('tx_condiciones', tx_condiciones);

            var url = "<?php echo site_url('partner/actualizar_partner_editar') ?>";

            
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

                        location.reload();
   

                       }else{
                          toastr.error(obj.message, 'Error');
                         return;

                       }
                                   

                      }); 

   
   
   
   }
   



   function eliminar_documento(co_documentos_partner)
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar registro',
   content: '¿Estas seguro que deseas eliminarlo?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_documentos_partner':co_documentos_partner},
   url: "<?php echo site_url('partner/eliminar_documento') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
 
                toastr.success(obj.message, 'Eliminado');
   
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


   function eliminar_usuario_partner(co_usuario_partner)
   {
   
   
                       $.confirm({
   backgroundDismiss: false,
   backgroundDismissAnimation: 'glow',
   theme: 'material', 
   title: 'Eliminar registro',
   content: '¿Estas seguro que deseas este usuario?.',
   type: 'red',
   animation: 'opacity',
   autoClose: 'no|10000',
   escapeKey: 'no',
   buttons: {
   si: function () {
   
                                          $.ajax({
   method: "POST",
   data: {'co_usuario_partner':co_usuario_partner},
   url: "<?php echo site_url('partner/eliminar_usuario_partner') ?>",
   beforeSend: function(){  },
            }).done(function( data ) { 
   
               var obj = JSON.parse(data);
   
               toastr.success(obj.message, 'Eliminado');
   
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
