

<div class="row animated fadeIn">

                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

                                      <div id="controllers_reportes_1">

                                  <div class="portlet box bg-blue-chambray">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Reporte Detallado de Cuentas por Cobrar </div>
                                        <div class="actions">

                                        </div>
                                    </div>
                                    <div class="portlet-body">

                                      <div class="row">


                                       <div class="col-lg-12">
                                                          <div class="col-md-3">
                                                              <div class="form-group">
                                                                    <select class="form-control input-sm" id="co_tipo_pago" name="co_tipo_pago">
                                                                            <option value="">Seleccione ...</option>
                                                                            <?php foreach($lista_pagos->result() as $row){echo "<option value='".$row->id."'>".$row->nb_tipo_pago."</option>";} ?>
                                                                    </select>
                                                                  <span class="help-block">Seleccione el Tipo de Pago</span>               
                                                              </div>
                                                           </div>   

                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                  
                                                                        <input id="ff_desde" name="ff_desde" class="form-control input-sm date_picker" placeholder="Desde" type="text">
                                                                        <span class="help-block"> Seleccione Fecha Inicial </span>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->

                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                    
                                                                        <input id="ff_hasta" name="ff_hasta" class="form-control input-sm date_picker" placeholder="Hasta" type="text">
                                                                        <span class="help-block"> Seleccione Fecha Fin. </span>
                                                                    </div>
                                                                </div>


                                                              

                                                                 <div class="col-md-2">

                                                                  <a href="javascript:;" onclick="buscar_fecha()" class="btn default align-middle"> <li class="fa fa-search"></li> </a>

                                                                  <a href="javascript:;" onclick="exportar_excel_documento()" class="btn blue align-middle"> <li class="fa fa-file-excel-o"></li> </a>
                                                              </div>
                                                                <!--/span-->
                                                  
                                        </div>

                                      </div>


                                          <div id="response_documento">

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

        $('.date_picker').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    enableOnReadonly: true
    });



function buscar_fecha()


{



    var ff_desde = $('#ff_desde').val();
    var ff_hasta = $('#ff_hasta').val();
    var co_tipo_pago = $('#co_tipo_pago').val();
    if (co_tipo_pago == "") {
            notificacion_toas("error", "Error", "Ingrese el Tipo de Pago");
            $("#fe_desde").focus();
            return;
    }
    if (ff_desde == "") {
            notificacion_toas("error", "Error", "Ingrese la Fecha de Inicio");
            $("#fe_desde").focus();
            return;
    }
    if (ff_hasta == "") {
            notificacion_toas("error", "Error", "Ingrese la Fecha Fin");
            $("#fe_desde").focus();
            return;
    }

  $('#response_documento').html('<div class="loader_panel_inside"> <div class="ball"></div><h6 align="center"><B>CARGANDO DETALLE... ESPERE POR FAVOR</b></h6></div><br> <h3 align="center"><b>DROGUERIA SOFIMED C.A.</b></h3>');        
    $.ajax({
        method: "POST",
        data: {'ff_desde':ff_desde, 'ff_hasta':ff_hasta, 'co_tipo_pago':co_tipo_pago,},
        url: "<?php echo site_url('reportes/sub_main_listado_cuentas_por_cobrar') ?>",
        beforeSend: function(){  },
                     }).done(function( data ) { 

                  $("#response_documento").html(data);

   
                      }).fail(function(){

                    alert('Fallo');


                      }); 
  
}


function exportar_excel_documento()


{


    var ff_desde = $('#ff_desde').val();
    var ff_hasta = $('#ff_hasta').val();
    var co_tipo_pago = $('#co_tipo_pago').val();
    var co_estatus_pago = $('#co_estatus_pago').val();

                                 $.ajax({
        method: "POST",
        data: {'ff_desde':ff_desde, 'ff_hasta':ff_hasta, 'co_tipo_pago':co_tipo_pago, 'co_estatus_pago':co_estatus_pago,},
        url: "<?php echo site_url('reportes/sub_main_listado_cuentas_por_cobrar_excel') ?>",
        beforeSend: function(){  },
                     }).done(function( data ) { 

                  window.open('data:application/vnd.ms-excel,' + encodeURIComponent(data));

   
                      }).fail(function(){

                    alert('Fallo');


                      }); 


}


</script>
