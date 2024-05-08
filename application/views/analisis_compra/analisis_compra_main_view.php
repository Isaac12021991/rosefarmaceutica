
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
                                    <h5 id="controlador" class="text-dark font-weight-bold mt-2 mb-2 mr-5">Analisis de compra</h5>
                                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="javascript:" class="text-muted"></a>
                                            </li>
                                        </ul>


        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

                                <a href="javascript:" id="ejecutar_analisis" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Ejecutar analisis</a>

                                 <a href="<?php echo site_url("analisis_compra/crear_lista_carga_masiva");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Crear</a>
        
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

                                    
                                <div class="col-lg-12 pt-lg-0 pl-lg-4 pr-lg-4 pt-2 pl-0 pr-0">


                                                                            <div class="card card-custom card-stretch">
                                            <!--begin::Header-->
                                            <div class="card-header py-3">
                                                <div class="card-title align-items-start flex-column">
                                                    <h3 class="card-label font-weight-bolder text-dark">Analisis de compra</h3>
                                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Lista de precio cargadas</span>
                                                </div>
                                                <div class="card-toolbar">

                                                
      
                                                </div>
                                            </div>
                                            <!--end::Header-->

                                                <!--begin::Body-->
                                                <div class="card-body pl-lg-4 pr-lg-4 pl-0 pr-0 pt-lg-4 pt-0">

                       <form action="<?= site_url('/analisis_compra/comparar_precios') ?>" id="form_comparar_precios"  method="GET">
    
            <?php if ($lista_analisis_compra->num_rows() > 0) : ?>
            <table class="table table-sm" id="table_1" width="100%">
               <thead>
                  <tr class="thead-light">
                    <th width="5%"></th>
                    <th width="5%">N°</th>
                    <th width="20%">Empresa</th>
                     <th width="15%">Nombre Lista</th>
                     <th width="15%">Moneda</th>
                     <th width="15%">Fecha</th>
                     <th width="10%"></th>
                  </tr>
               </thead>
               <tbody>
                  <?php $con = 0;  ?>
                  <?php foreach ($lista_analisis_compra->result() as $row) : $con ++; ?>
                  <tr>
                     
                    <td>  <input type="checkbox" class="checkbox_comprobar" name="accion_check[]" id="accion_check" value="<?php echo $row->id; ?>" /> </td>
                    <td><?php echo $con; ?> </td>
                    <td><?php echo $row->nb_empresa; ?> </td>
                     <td><?php echo $row->nb_lista; ?> </td>
                     <td><?php echo $row->nb_moneda; ?> </td>
                     <td><?php echo $row->ff_sistema; ?> </td>
                     <td>


                                             <div class="card-toolbar">
                                                    <div class="dropdown dropdown-inline">
                                                        <a href="javascript:" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ki ki-bold-more-hor"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover py-5">
                                                                 <li class="navi-item">
                                                                    <a href='<?php echo site_url("analisis_compra/editar_lista_compra/$row->id");?>' class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="flaticon2-drop"></i>
                                                                        </span>
                                                                        <span class="navi-text">Editar</span>
                                                                    </a>
                                                                </li>

                                                                <li class="navi-item">
                                                                    <a href="javascript::" onclick="eliminar_lista_analisis_proveedor(<?php echo $row->id; ?>)" class="navi-link">
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
            <h4>Sin lista</h4>
            <p></p>
            <?php endif; ?>

             </form>

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


     document.title = 'Analisis de proveedor';


   $(document).ready(function(){

   
      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready
   
   


    $("#ejecutar_analisis").click(function() {

      if( $('.checkbox_comprobar').is(':checked') ) {

    $("#form_comparar_precios").submit();


}else{

alert('Por favor seleccione una lista');

}

  
});


   
   function eliminar_lista_analisis_proveedor(co_analisis_lista_proveedor) 
   
   {
      $.confirm({
       backgroundDismiss: false,
       backgroundDismissAnimation: 'glow',
         theme: 'material', 
       title: 'Eliminar Lista',
       content: '¿Estas seguro que deseas eliminar esta lista ?.',
           type: 'red',
       animation: 'opacity',
       autoClose: 'no|10000',
       escapeKey: 'no',
       buttons: {
        si: function () {
         $.ajax({
           method: "POST",
           data: {'co_analisis_lista_proveedor':co_analisis_lista_proveedor},
           url: "<?php echo site_url('analisis_proveedor/eliminar_lista_analisis_proveedor') ?>",
           beforeSend: function(){ },
                        }).done(function( data ) { 
                         var obj = JSON.parse(data);              

                        location.reload();

                         }).fail(function(){
   
                            alert('Fallo eliminar_precios_lista');
   
   
                         }); 
              
       
   
           },
           no: function () {
   
              
           },
     
       }
   });
   
   
   }
   
   
  

</script>
