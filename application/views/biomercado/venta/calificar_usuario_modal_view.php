<script src="<?php echo base_url() ?>assets/plugins/custom/rate/rater.min.js" type="text/javascript"></script>
<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Calificar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h5 align="center">Calificar a <?php echo $info_orden_compra->first_name.' '.$info_orden_compra->last_name; ?> de <?php echo $info_orden_compra->nb_empresa_comprador; ?></h5>
        </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

     
            <div style="font-size:37px;" class="d-flex flex-row justify-content-center">
                <span class="rating text-warning" data-rate-value=0></span>
                    </div>
  

      
        </div>

    </div>

    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="form-group row">
            <label class="col-3 col-form-label">Observacion</label>
            <div class="col-9">
                 <textarea class="form-control" id="tx_observacion" name="tx_observacion"></textarea>
            </div>
        </div>

        </div>
    </div>

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                 <a onclick="calificar()" class="btn btn-light-success font-weight-bold mr-2">Calificar</a>

            </div>



<script type="text/javascript">



//or for example
var options = {
    max_value: 5,
    step_size: 1,
}
$(".rating").rate(options);

$(".rating").rate();

function calificar()
{

   var ca_calificacion = $(".rating").rate("getValue");
    var co_orden_compra = '<?php echo $co_orden_compra; ?>';
    var tx_observacion = $('#tx_observacion').val();

    if (ca_calificacion == '0') {

          toastr.error('Califique el proceso de compra', 'Error');
          $('#ca_calificacion').focus();
           return;

    };



                               $.ajax({
        method: "POST",
        data: {'co_orden_compra':co_orden_compra, 'ca_calificacion':ca_calificacion, 'tx_observacion':tx_observacion},
        url: "<?php echo site_url('venta/ejecutar_calificacion') ?>",
                     }).done(function( data ) { 
                      var obj = JSON.parse(data);
                      if (obj.error > 0)

                      {

                        toastr.error(obj.message, 'Error');
                        return;


                      }else{


                   $('#ajax_remote').modal('hide');
                   location.reload();
        

                      }

   
                      }).fail(function(){


                    alert('Fallo');

                      }); 




}


</script>