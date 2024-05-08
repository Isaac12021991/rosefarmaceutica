

<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">


 <!--begin::Form-->
 <form>

<div class="row">


 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

  <div class="form-group">
        <label>Documento</label>
                        <select class="form-control" id="nb_documento" name="nb_documento">
           <option value="RIF">RIF VIGENTE</option>
           <option value="PERMISO DE INSTALACION Y FUNCIONAMIENTO">PERMISO DE INSTALACION Y FUNCIONAMIENTO</option>
           <option value="TITULO">TITULO FARMACEUTA, MEDICO, DOCTOR ENTRE OTROS</option>
            </select>  
      </div>

 </div>

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

  <div class="form-group">
        <label>Vence</label>
        <input type="text" name="ff_vencimiento" id="ff_vencimiento" class="form-control date_picker" autocomplete="off" placeholder="Vence" value="">
      </div>

 </div>

</div>


<div class="row">

   <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

          <div class="form-group">
        <label>Adjunto</label>
      <input id="mi_archivo" type="file" name="mi_archivo" accept="*" class="form-control">
      </div>

  </div>

  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


      <div class="form-group">
        <label>Descripcion</label>
       <textarea class="form-control" id="tx_descripcion" name="tx_descripcion"></textarea>
      </div>

              
</div>

</div>





 </form>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                 <a onclick="agregar_documento()" class="btn btn-light-primary font-weight-bold mr-2">Guardar</a>

            </div>



<script type="text/javascript">

    $('.date_picker').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    enableOnReadonly: true,
    orientation: "bottom",
    startDate: '1d'
    });


      function agregar_documento()
   {                


                  var co_partner = '<?php echo $co_partner; ?>';
                  var mi_archivo = document.getElementById('mi_archivo');
                  var nb_documento = $('#nb_documento').val();
                  var tx_descripcion = $('#tx_descripcion').val();
                  var ff_vencimiento = $('#ff_vencimiento').val();
                  var file = mi_archivo.files[0];

            
         if (nb_documento == '') {

            toastr.error('Seleccione un documento', 'Error');
           $('#nb_producto').focus();
            return;
   
       };

                if (ff_vencimiento == '') {

            toastr.error('Seleccione cuando vence el documento', 'Error');
           $('#ff_vencimiento').focus();
            return;
   
       };
   

       var data = new FormData();

data.append('mi_archivo', file);
data.append('nb_documento', nb_documento);
data.append('tx_descripcion', tx_descripcion);
data.append('co_partner', co_partner);
data.append('ff_vencimiento', ff_vencimiento);

var url = "<?php echo site_url('partner/ejecutar_agregar_documento') ?>";

                $.ajax({
                url:url,
                type:'POST',
                contentType:false,
                data:data,
                processData:false,
                cache:false}).done(function( data ) { 

                   var obj = JSON.parse(data);

                       if (obj.error == 0) {

                      location.reload();


                       }else{

                          toastr.error(obj.message, 'Error');

                         return;

                       }
                                   

                      }); 

   
   
   }
   
   

</script>






