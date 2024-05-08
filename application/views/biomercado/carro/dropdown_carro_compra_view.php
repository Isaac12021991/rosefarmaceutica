<div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
        <h4 class="font-weight-bold m-0">Carro de compra</h4>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_cart_close">
          <i class="ki ki-close icon-xs text-muted"></i>
        </a>
      </div>
      <!--end::Header-->
      <!--begin::Content-->
      <div class="offcanvas-content">
        <!--begin::Wrapper-->
        <div class="offcanvas-wrapper mb-5 scroll-pull">

           <?php $ca_monto = 0; $info_carrito = $this->biomercado_library->get_info_comprado_general(); ?>

                                                        <?php if($info_carrito->num_rows()): ?>
                                                <?php foreach ($info_carrito->result() as $row): ?>
          <!--begin::Item-->
          <div class="d-flex align-items-center justify-content-between py-8">
            <div class="d-flex flex-column mr-2">
              <a href="<?php echo site_url(); ?>compra/menu_carro" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary"><?php echo $row->nb_producto; ?></a>
              <span class="text-muted"><?php echo $row->tx_descripcion; ?></span>
              <div class="d-flex align-items-center mt-2">
                <span class="font-weight-bold mr-1 text-dark-75 font-size-lg"><?php echo $row->ca_precio; ?></span>
                <span class="text-muted mr-1">Para</span>
                <span class="font-weight-bold mr-2 text-dark-75 font-size-lg"><?php echo $row->ca_unidades_comprado; ?> Unidad</span>
              </div>
            </div>
            <?php $ca_monto += $row->ca_precio; ?>
            <?php if($row->nb_url_foto != ''): ?>
            <a href="#" class="symbol symbol-70 flex-shrink-0">
              <img src="<?php echo $row->nb_url_foto; ?>" title="" alt="" />
            </a>
          <?php endif; ?>
          </div>

          <div class="separator separator-solid"></div>

                          <?php endforeach; ?>
                       <?php else: ?>
                          <h4 class="mb-4 p-4 text-dark-50">Carrito vacio</h4>
                          <p class="mb-4 p-4 text-dark-50">Ingrese a cartelera y agrege producto</p>
                       <?php endif; ?>

          <!--end::Item-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Purchase-->
        <div class="offcanvas-footer">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <span class="font-weight-bold text-muted font-size-sm mr-2">Total:</span>
            <span class="font-weight-bolder text-dark-50 text-right"><?php echo $ca_monto; ?></span>
          </div>
          <div class="text-right">
            <a href="<?php echo site_url(); ?>compra/menu_carro" class="btn btn-primary text-weight-bold">Comprar</a>
          </div>
        </div>
        <!--end::Purchase-->
      </div>
      
    <script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/pages/widgets.js"></script>