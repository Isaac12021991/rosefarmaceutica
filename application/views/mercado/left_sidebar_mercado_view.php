                <div class="page-sidebar-wrapper">
                    <div class="page-sidebar navbar-collapse collapse">
                        <ul id="ident_sidebar" class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>

                             <!--Inicio del menu superior-->

                        <li class="nav-item start hidden-lg hidden-md">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Menú</span>
                                    <span class="arrow"></span>
                                </a>

                                <ul class="sub-menu">

                                     <?php if($this->usuario_library->permiso_tipo_empresa("'LABORATORIO','CASA DE REPRESENTACION','DROGUERIA','FARMACIA','CLINICA'")): ?> 

                                    <li class="nav-item start ">
                                        <a href="<?php echo site_url('mercado/index')?>" class="nav-link ">
                                            <span class="title">Mercado</span>
                                        </a>
                                    </li>

                                         <?php endif; ?>



               <?php if($this->usuario_library->permiso_tipo_empresa("'LABORATORIO','CASA DE REPRESENTACION','DROGUERIA','FARMACIA','CLINICA'")): ?>
                <?php if($this->usuario_library->permiso_empresa("'Administrador','Compras','Ventas'")): ?>

                                    <li class="nav-item start ">
                                        <a href="<?php echo site_url('biomercado/cartelera')?>" class="nav-link ">
                                            <span class="title">BioMercado</span>
                                        </a>
                                    </li>

                <?php endif; ?>
              <?php endif; ?>


               <?php if($this->usuario_library->permiso_tipo_empresa("'FARMACIA','CLINICA'")): ?> 
                <?php if($this->usuario_library->permiso_empresa("'Administrador','Bioenlace'")): ?>

                                                       <li class="nav-item start ">
                                        <a href="<?php echo site_url('bioenlace/cartelera')?>" class="nav-link ">
                                            <span class="title">BioEnlace</span>
                                        </a>
                                    </li>


                                   <?php endif; ?>
                                     <?php endif; ?>


                                </ul>



                            </li>

                            <!--Fin del menu superior-->



                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
