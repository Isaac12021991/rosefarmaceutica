


<div class="row animated fadeIn">


                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">


                                  <div class="portlet box bg-blue-chambray">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Reporte </div>
                                        <div class="actions">

                                        </div>
                                    </div>
                                    <div class="portlet-body">

                                      <div class="row">


                                       <div class="col-md-6 col-md-offset-3">

                                        <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                  
                                                                    	<select name="co_almacen" id="co_almacen" class="form-control input-sm">
                                                                    		<option value="">Seleccione...</option>

                                                                    	</select>
                                                                        <span class="help-block"> Seleccione almacen </span>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->

                                                                <!--/span-->
                                                            </div>
                                        </div>

                                      </div>


                                          <div id="response_inventario">

                                            <div class="note note-info">
                                            <h4 class="block">Informacion!</h4>
                                            <p> Seleccione un rango de fecha para generar un reporte de salida. </p>
                                        </div>



      

                                </div>



                            </div>

                            </div>


</div>



  <script type="text/javascript">

            $('#tabla_2').DataTable( {
        "responsive": true,
                "order": [],
                stateSave: true,
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
    } );


function buscar_fecha()


{

  $('#response_inventario').html('<div class="loader_panel_inside"> <div class="ball"></div><h6 align="center"><B>CARGANDO DETALLE... ESPERE POR FAVOR</b></h6></div><br> <h3 align="center"><b>DROGUERIA SOFIMED C.A.</b></h3>');


    var ff_desde = $('#ff_desde').val();
    var ff_hasta = $('#ff_hasta').val();

                                 $.ajax({
        method: "POST",
        data: {'ff_desde':ff_desde, 'ff_hasta':ff_hasta},
        url: "<?php echo site_url('reportes/reporte_inventario_salida') ?>",
        beforeSend: function(){  },
                     }).done(function( data ) { 

                  $("#response_inventario").html(data);

   
                      }).fail(function(){

                    alert('Fallo');


                      }); 

  
}



</script>

<script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>