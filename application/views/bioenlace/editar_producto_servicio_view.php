
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
                                    
                                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="" class="text-muted">Editar</a>
                                            </li>
                                        </ul>
                                    <!--end::Actions-->

        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">
                                

                                    
                                <a onclick="editar_producto()"class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Guardar</a>

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

                                <div class="col-lg-1">
                                    
                                    
                                </div>

                                <div class="col-lg-10 pl-0 pr-0">



                                    <div class="card card-custom gutter-b">
                                         <div class="card-header">
                                          <div class="card-title">
                                           <h3 class="card-label">
                                            Editar
                                            <small>Editar producto o servicio</small>
                                           </h3>
                                          </div>
                                         </div>
                                        
                                            <form class="form">
                                             <div class="card-body">

                                                <div class="row">

                                                 <div class="col-lg-6">

                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label"><span class="text-danger">*</span>Tipo de publicacion:</label>
                                               <div class="col-9">
                                               
                                                  <select class="form-control form-control-solid" id="nb_tipo_busqueda" name="nb_tipo_busqueda" onclick="check_tipo_busqueda()">
                                                  <option value="Producto">PRODUCTO</option>
                                                  <option value="Servicio">SERVICIO</option>
                                                </select> 
                                               </div>
                                              </div>
                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label"><span class="text-danger">*</span>Producto / Servicio:</label>
                                               <div class="col-9">
                                                 <input type="text" name="nb_producto" id="nb_producto" class="form-control form-control-solid" placeholder="Nombre" value="<?php echo $info_inventario_principal->nb_producto; ?>"> 
                                               </div>
                                              </div>

                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Descripcion:</label>
                                               <div class="col-9">
                                               <textarea class="form-control" id="tx_descripcion" name="tx_descripcion"><?php echo $info_inventario_principal->tx_descripcion; ?></textarea> 
                                               </div>
                                              </div>

                                          </div>

                                           <div class="col-lg-6">

                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Precio en $ (opcional):</label>
                                               <div class="col-9">
                                                <input type="text" name="ca_precio" id="ca_precio" class="form-control" placeholder="00.0" value="<?php echo $info_inventario_principal->ca_precio; ?>">
                                                 <span class="form-text text-muted">Los precios de los productos o servicios no son obligatorios.</span> 
                                               </div>


                                              </div>


                                             <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Vencimiento de la publicacion:</label>
                                               <div class="col-9">
                                <input type="text" name="ff_vence" id="ff_vence" class="form-control input-sm date_picker" autocomplete="off" placeholder="Vence" value="<?php echo date('d-m-Y', $info_inventario_principal->ff_vence); ?>">   
                                        <span class="form-text text-muted">Las publicaciones por defecto tienen un vencimiento de 30 dias.</span> 
                                               </div>
                                              </div>

                                           </div>
                                           </div>

                                           <div class="row">

                                            <div class="col-lg-12">
                                            
                 <ul class="nav nav-tabs nav-tabs-line">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">Informacion adicional</a>
    </li>

</ul>
<div class="tab-content mt-5" id="myTabContent">
    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_2">
    
                                                    <div class="row" id="producto_div">
                                                 <div class="col-lg-6">

                                                 <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Codigo barra:</label>
                                               <div class="col-9">
                                                <input type="text" name="co_producto" id="co_producto" class="form-control" placeholder="Ejem 7000123456" value="<?php echo $info_inventario_principal->co_producto; ?>"> 
                                               </div>
                                              </div>


                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Principio activo:</label>
                                               <div class="col-9">

                                            <select id="nb_principio_activo" name="nb_principio_activo" class="form-control select2">
                                              <option value=" " selected="selected">Sin principio activo</option>
                                         <?php foreach($principio_activo->result() as $row){echo "<option value='".$row->nb_principio_activo."'>".$row->nb_principio_activo."</option>";} ?>
                                            </select> 
                                               </div>
                                              </div>


                                              <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Uso Terapeutico:</label>
                                               <div class="col-9">
                                                <select id="nb_uso_terapeutico" name="nb_uso_terapeutico" class="form-control select2" data-live-search="true">
                                              <option value=" " selected="selected">Sin uso terapeutico</option>
                                         <?php foreach($uso_terapeutico->result() as $row){echo "<option value='".$row->nb_uso_terapeutico."'>".$row->nb_uso_terapeutico."</option>";} ?>
                                            </select>
                                               </div>
                                              </div>



                                                 </div>
                                                 <div class="col-lg-6">

                                        <div class="form-group row mb-2">
                                           <label  class="col-3 col-form-label">Forma farmaceutica:</label>
                                           <div class="col-9">
                                                <select id="nb_forma_farmaceutica" name="nb_forma_farmaceutica" class="form-control select2" data-live-search="true">
                                               
                                              <option value=" " selected="selected">Sin forma farmaceutica</option>
                                         <?php foreach($forma_farmaceutica->result() as $row){echo "<option value='".$row->nb_forma_farmaceutica."'>".$row->nb_forma_farmaceutica."</option>";} ?>
                                            </select> 
                                           </div>
                                          </div>


                                          <div class="form-group row mb-2">
                                           <label  class="col-3 col-form-label">Concentracion:</label>
                                           <div class="col-9">
                                           <select id="nb_concentracion" name="nb_concentracion" class="form-control select2" data-live-search="true">
                                              <option value=" " selected="selected">Sin concentracion</option>
                                         <?php foreach($concentracion->result() as $row){echo "<option value='".$row->nb_concentracion."'>".$row->nb_concentracion."</option>";} ?>
                                            </select>
                                           </div>
                                          </div>

                                                                                                                     <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label">Laboratorio:</label>
                                               <div class="col-9">
                                                <select id="nb_fabricante" name="nb_fabricante" class="form-control select2" data-live-search="true">
                                              <option value=" " selected="selected">Sin laboratorio</option>
                                         <?php foreach($laboratorio->result() as $row){echo "<option value='".$row->nb_laboratorio."'>".$row->nb_laboratorio."</option>";} ?>
                                            </select>
                                               </div>
                                              </div>


                                                 </div>


                                             </div>

                                             <div class="row">
                                                 
                                                <div class="col-6">


                                          <div class="form-group row mb-2">
                                           <label  class="col-lg-3 col-form-label">Etiquetas:</label>
                                           <div class="col-lg-9">
                            
                                            <?php $etiqueta_array = json_decode($info_inventario_principal->nb_tags); ?>
                                          <input type="text" name="nb_tags" id="nb_tags" class="form-control" placeholder="Etiquetas" value="<?php if(!is_null($etiqueta_array)):
                                           foreach ($etiqueta_array as $posicion) { echo $posicion->value.','; } endif; ?>"> 

                                        
                                           </div>
                                          </div>
                                                
                                                </div>

                                             <div class="col-6">

                                                    <div class="form-group row mb-2">
                                           <label  class="col-lg-3 col-form-label">Imagen:</label>
                                           <div class="col-lg-9">
                                          <input id="mi_archivo" type="file" name="mi_archivo" accept="image/*" class="form-control">
                                           </div>
                                          </div>
                                                
                                                </div>

                                             </div>


    </div>


</div>
    </div>


                                           </div>


                                             </div>
                                             </form>
                                             
   
                                        </div>









                                </div>



                                <div class="col-lg-1"></div>

                            </div>

                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>


<script type="text/javascript">

       if('<?php echo $info_inventario_principal->nb_tipo_busqueda; ?>' == 'Producto') {

           $('#producto_div').fadeIn();


}else{
       $('#producto_div').fadeOut();
}


    $('#nb_tipo_busqueda').val('<?php echo $info_inventario_principal->nb_tipo_busqueda; ?>');
    $('#co_partner').val('<?php echo $info_inventario_principal->co_partner; ?>');

    $('#nb_fabricante').val('<?php echo $info_inventario_principal->nb_fabricante; ?>');
    $('#nb_principio_activo').val('<?php echo $info_inventario_principal->nb_principio_activo; ?>');
    $('#nb_uso_terapeutico').val('<?php echo $info_inventario_principal->nb_uso_terapeutico; ?>');
    $('#nb_concentracion').val('<?php echo $info_inventario_principal->nb_concentracion; ?>');
    $('#nb_forma_farmaceutica').val('<?php echo $info_inventario_principal->nb_forma_farmaceutica; ?>');


        function check_tipo_busqueda(){

   if( $('#nb_tipo_busqueda').val() == 'Producto') {

           $('#producto_div').fadeIn();


}else{
       $('#producto_div').fadeOut();
}

}
 

  $(document).ready(function(){

    var input = document.querySelector('input[name=nb_tags]');
    new Tagify(input)
     $('.select2').select2();

$('.date_picker').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    enableOnReadonly: true,
    orientation: "bottom",
    startDate: '1d'
    });

                 }); // Fin ready


   function editar_producto()
   {                

                  var mi_archivo = document.getElementById('mi_archivo');
                  var co_inventario_principal = '<?php echo $info_inventario_principal->id; ?>'
                  var nb_producto = $('#nb_producto').val();
                  var nb_tipo_busqueda = $('#nb_tipo_busqueda').val();
                  var tx_descripcion = $('#tx_descripcion').val();
                  var ca_precio = $('#ca_precio').val();
                  var ff_vence = $('#ff_vence').val();

                  var co_producto = $('#co_producto').val();
                  
                  var nb_fabricante = $('#nb_fabricante').val();
                  var nb_principio_activo = $('#nb_principio_activo').val();
                  var nb_uso_terapeutico = $('#nb_uso_terapeutico').val(); 
                  var nb_concentracion = $('#nb_concentracion').val();   
                  var nb_forma_farmaceutica = $('#nb_forma_farmaceutica').val();   
                  var nb_tags = $('#nb_tags').val();    
                  var file = mi_archivo.files[0];

             
         if (nb_producto == '') {
   
            toastr.error('Ingrese el producto / servicio', 'Error');
           $('#nb_producto').focus();
            return;
   
       };
   
   
       if (nb_tipo_busqueda == '') {
   
   
          toastr.error('Seleccione que tipo de publicacion desea realizar', 'Error');
           $('#nb_tipo_busqueda').focus();
            return;
   
       };



       var data = new FormData();

data.append('mi_archivo', file);


data.append('co_inventario_principal', co_inventario_principal);
data.append('nb_producto', nb_producto);
data.append('tx_descripcion', tx_descripcion);
data.append('nb_tipo_busqueda', nb_tipo_busqueda);
data.append('ff_vence', ff_vence);
data.append('ca_precio', ca_precio);
data.append('nb_tags', nb_tags);

data.append('nb_principio_activo', nb_principio_activo);
data.append('nb_uso_terapeutico', nb_uso_terapeutico);
data.append('nb_concentracion', nb_concentracion);
data.append('nb_forma_farmaceutica', nb_forma_farmaceutica);
data.append('nb_fabricante', nb_fabricante);

var url = "<?php echo site_url('bioenlace/actualizar_nuevo_producto_servicio') ?>";


                $.ajax({
                url:url,
                type:'POST',
                contentType:false,
                data:data,
                processData:false,
                cache:false}).done(function( data ) { 

                   var obj = JSON.parse(data);


                       if (obj.error == 0) {

                      $(location).attr('href',"<?php echo site_url() ?>bioenlace/index"); 

                         

                       }else{
                          notificacion_toas('error','Error',obj.message);

                         return;

                       }
                                   

                      }); 

   
   
   }
   
   

   
   
   
                                      
</script>
