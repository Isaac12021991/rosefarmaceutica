             <?php if (isset($carro_orden_compra_total)) : ?>
             <?php if ($carro_orden_compra_total->num_rows() > 0) : ?>
               <hr>

<div class="row">

   <div class="col-xl-6">

      <div class="card-body">
                                    <a href="javascript:" class="card-title font-weight-bold text-muted text-hover-primary font-size-h5">Atencion</a>
                                    <div class="font-weight-bold text-success mt-2 mb-2"><?php echo $this->ion_auth->get_nombres(); ?></div>
                                    <p class="text-dark-75 font-weight-bolder m-0">Al confirmar la compra le llegará un correo de notificacion con todos sus datos al vendedor.<br> Al confirmar la compra usted adquiere un compromiso con el vendedor.</p>
                                 </div>

   </div>

                           <div class="col-xl-6">
                              <!--begin::List Widget 19-->
                              <div class="card card-custom card-stretch gutter-b">
                                 <!--begin::Header-->
                                 <div class="card-header border-0 pt-6 mb-2">
                                    <h3 class="card-title align-items-start flex-column">
                                       <span class="card-label font-weight-bold font-size-h4 text-dark-75 mb-3">Resumen</span>
                                       <span class="text-muted font-weight-bold font-size-sm">Ordenes de compra</span>
                                    </h3>
                                    <div class="card-toolbar">

                                       <a href="javascript::"  onclick="comprar_ahora()" class="btn btn-light-success font-weight-bolder btn-sm mr-2">Confirmar compra</a>
                                    </div>
                                 </div>
                                 <!--end::Header-->
                                 <!--begin::Body-->
                                 <div class="card-body pt-2">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                       <table class="table table-borderless mb-0">
                                          <tbody>
                                             <!--begin::Item-->
                                              <?php $con = 0; $sum_total = 0; foreach ($carro_orden_compra_total->result() as $row) : $con ++; ?>
                                             <!--begin::Item-->
                                             <tr>
                                                <td class="w-40px pb-6 pl-0 pr-2">
                                                   <!--begin::Symbol-->
                                                   <div class="symbol symbol-40 symbol-light-primary align-middle">
                                                      <span class="symbol-label">
                                                         <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                  <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                  <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                                  <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                                               </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                         </span>
                                                      </span>
                                                   </div>
                                                   <!--end::Symbol-->
                                                </td>
                                                <td class="font-size-lg font-weight-bolder text-dark-75 w-100px align-middle pb-6"> <?php echo substr($row->username, 0,30); ?></td>
                                                <td class="font-weight-bolder font-size-lg text-dark-75 text-right align-middle pb-6"><?php echo number_format($row->total_precio,2,',','.').' '.$row->nb_acronimo; 
                                                        $sum_total += $row->total_precio; ?></td>
                                             </tr>

                                          <?php endforeach; ?>
                                             <!--end::Item-->
                                             <!--begin::Item-->
            
                                             <!--end::Item-->
                                          </tbody>
                                       </table>
                                    </div>
                                    <!--end::Table-->
                                 </div>
                                 <!--end::Body-->
                              </div>
                              <!--end::List Widget 19-->
                           </div>
                        </div>


                   <?php else: ?>
                      <hr>

                     <div class="row">

   <div class="col-xl-6">

      <div class="card-body">
                                    <a href="javascript:" class="card-title font-weight-bold text-muted text-hover-primary font-size-h5">Atencion</a>
                                    <div class="font-weight-bold text-success mt-2 mb-2"><?php echo $this->ion_auth->get_nombres(); ?></div>
                                    <p class="text-dark-75 font-weight-bolder m-0">Al confirmar la compra le llegará un correo de notificacion con todos sus datos al vendedor.<br> Al confirmar la compra usted adquiere un compromiso con el vendedor.</p>
                                 </div>



   </div>
</div>



            <?php endif; ?>
             <?php endif; ?>


