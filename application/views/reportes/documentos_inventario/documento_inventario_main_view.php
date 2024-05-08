

<div class="row animated fadeIn">

                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

                                      <div id="controllers_reportes_1">

                                  <div class="portlet box bg-blue-chambray">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Relacion de movimiento inventario - facturacion o nota de entrega </div>
                                        <div class="actions">

                                        </div>
                                    </div>
                                    <div class="portlet-body">

                                      <div class="row">


                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                  
                                                                        <input id="ff_desde" name="ff_desde" class="form-control input-sm date-picker" placeholder="Desde" type="text">
                                                                        <span class="help-block"> Seleccione desde que fecha </span>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->

                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                    
                                                                        <input id="ff_hasta" name="ff_hasta" class="form-control input-sm date-picker" placeholder="Hasta" type="text">
                                                                        <span class="help-block"> Seleccione hasta que fecha. </span>
                                                                    </div>
                                                                </div>

                                                                 <div class="col-md-2">

                                                                  <a href="javascript:;" onclick="buscar_documento_inventario()" class="btn default align-middle"> <li class="fa fa-search"></li> </a>
                                                              </div>
                                                                <!--/span-->


                                      </div>


                                          <div id="response_submain">

                                            <div class="note note-info">
                                            <h4 class="block">Informacion!</h4>
                                            <p> Seleccione un rango de fecha para generar un reporte de salida. </p>
                                        </div>
                                            

                                          </div>
                                    


      

                                </div>



                            </div>

                            </div>

</div>


  <script type="text/javascript">

            $('#tabla_1').DataTable( {
        "responsive": true,
                "order": [],
                stateSave: true,
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
    } );


            $('#tabla_2').DataTable( {
        "responsive": true,
                "order": [],
                stateSave: true,
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
    } );



function buscar_documento_inventario()


{

  $('#response_submain').html('<div class="loader_panel_inside"> <div class="ball"></div><h6 align="center"><B>CARGANDO DETALLE... ESPERE POR FAVOR</b></h6></div><br> <h3 align="center"><b>DROGUERIA SOFIMED C.A.</b></h3>');


    var ff_desde = $('#ff_desde').val();
    var ff_hasta = $('#ff_hasta').val();


      $.ajax({
        method: "POST",
        data: {'ff_desde':ff_desde, 'ff_hasta':ff_hasta},
        url: "<?php echo site_url('reportes/reporte_documento_inventario_submain') ?>",
        beforeSend: function(){  },
                     }).done(function( data ) { 

                  $("#response_submain").html(data);

   
                      }).fail(function(){

                    alert('Fallo');


                      }); 

  
}


</script>

<script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>