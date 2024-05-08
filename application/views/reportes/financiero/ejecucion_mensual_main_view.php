<div class="row animated fadeIn">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div id="controllers_reportes_1">
            <div class="portlet box bg-blue-chambray">
                <div class="portlet-title">
                    <div class="caption"> Ejecucion Mensual</div>
                    <div class="actions">
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control input-sm" id="co_tipo_pago" name="co_tipo_pago">
                                    <option value="">Seleccione ...</option>
                                    <?php foreach($lista_pagos->result() as $row){echo "<option value='".$row->id."'>".$row->nb_tipo_pago."</option>";} ?>
                                    
                                </select>
                                <span class="help-block">Seleccione Condicion de Pago</span>               
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select class="form-control input-sm" id="co_tipo_documento" name="co_tipo_documento">
                                    <option value="">Seleccione ...</option>
                                    <?php foreach($list_documento->result() as $row){echo "<option value='".$row->nb_documento."'>".strtoupper($row->nb_documento)."</option>";} ?>
                                    
                                </select>
                                <span class="help-block">Seleccione Tipo de Documento</span>               
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input id="mes" name="mes" class="form-control input-sm from" placeholder="Mes" type="text"></input>
                                <span class="help-block"> Seleccione Mes </span>
                            </div>
                        </div>
                         <div class="col-md-3">
                            <select class="form-control input-sm" id="co_vendedor" name="co_vendedor">
                                    <option value="">Seleccione...</option>
                                    <?php foreach($list_vendedor->result() as $row){echo "<option value='".$row->vendedor."'>".$row->vendedor."</option>";} ?>
                                    
                                </select>
                                <span class="help-block">Seleccione Vendedor</span>               
                            </div>
                             <div class="col-md-1">
                                <a href="javascript:;" onclick="search_report()" class="btn default align-middle"> <li class="fa fa-search"></li> </a>
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
     var startDate = new Date();
  $('.from').datepicker({
    autoclose: true,
    minViewMode: 1,
    format: 'mm/yyyy'
      }).on('changeDate', function(selected){
              startDate = new Date(selected.date.valueOf());
              startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
              
          });

    function search_report(){
        
        var condicion = $('#co_tipo_pago').val();
        var mes = $('#mes').val();
        var vendedor = $('#co_vendedor').val();
        var co_tipo_documento = $('#co_tipo_documento').val();
        
        $('#response_documento').html('<div class="loader_panel_inside"> <div class="ball"></div><h6 align="center"><B>CARGANDO DETALLE... ESPERE POR FAVOR</b></h6></div><br> <h3 align="center"><b>SIRE.</b></h3>');
        $.ajax({
        method: "POST",
        data: {'condicion':condicion, 'mes':mes, 'vendedor':vendedor,'co_tipo_documento': co_tipo_documento,},
        url: "<?php echo site_url('reportes/ejecucion_financiera_detalle') ?>",
        beforeSend: function(){  },
                     }).done(function( data ) { 

                  $("#response_documento").html(data);

   
                      }).fail(function(){

                    alert('Fallo');


                      });      
  


    } 

     </script>
     <script src="<?php echo base_url() ?>assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script> 


</div>