

<div class="row animated fadeIn">

                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

                                      <div id="controllers_reportes_1">

                                  <div class="portlet box bg-blue-chambray">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Inventario </div>
                                        <div class="actions">

                                        </div>
                                    </div>
                                    <div class="portlet-body">

                                      <div class="row">
                                                                  <div class="col-md-2">
                                                                    <div class="form-group">
                                                                  
                                          <select class="form-control input-sm" id="co_almacen" name="co_almacen">
                                              <option value="-1">Todos</option>
                                            <?php foreach($lista_almacenes->result() as $row){echo "<option value='".$row->id."'>".$row->nb_almacen."</option>";} ?>
                                            </select>     

                                                                        <span class="help-block"> Almacenes </span>
                                                                    </div>
                                                                </div>

                                                                          
                                                                          <div class="col-md-2">                                                                                           
                                                                    <div class="form-group">
                                                                  
                                          <select class="form-control input-sm" id="co_tipo_salida" name="co_tipo_salida">
                                              <option value="-1">Resumen</option>
                                              <option value="-2">Detallado</option>
                                            </select>     
                                                                        <span class="help-block"> Tipo de salida </span>
                                                                    </div>
                                                                </div>

                                                                <!--/span-->

                                                                 <div class="col-md-3">

                                                                  <a href="javascript:;" onclick="buscar()" class="btn blue align-middle"> <li class="fa fa-search"></li> </a>

                                                      <a href="javascript:;" onclick="exportar_excel()" class="btn blue align-middle"> <li class="fa fa-file-excel-o"></li>Exportar a excel </a>
                                                              </div>

                                                                                 <div class="col-md-2">


                                                              </div>
                                                                <!--/span-->


                                      </div>


                                          <div id="response_submain">

                                            <div class="note note-info">
                                            <h4 class="block">Informacion!</h4>
                                            <p> Seleccione su criterio de busqueda. </p>
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



function buscar()


{

  $('#response_submain').html('<div class="loader_panel_inside"> <div class="ball"></div><h6 align="center"><B>CARGANDO DETALLE... ESPERE POR FAVOR</b></h6></div><br> <h3 align="center"><b>DROGUERIA SOFIMED C.A.</b></h3>');


        var co_almacen = $('#co_almacen').val();
    var co_tipo_salida = $('#co_tipo_salida').val();

      $.ajax({
        method: "POST",
        data: {'co_almacen':co_almacen, 'co_tipo_salida':co_tipo_salida},
        url: "<?php echo site_url('reportes/reporte_inventario_general_submain') ?>",
        beforeSend: function(){  },
                     }).done(function( data ) { 

                  $("#response_submain").html(data);

   
                      }).fail(function(){

                    alert('Fallo');


                      }); 

  
}





  function exportar_excel(){

        var co_almacen = $('#co_almacen').val();
    var co_tipo_salida = $('#co_tipo_salida').val();

      $.ajax({
        method: "POST",
        data: {'co_almacen':co_almacen, 'co_tipo_salida':co_tipo_salida},
        url: "<?php echo site_url('reportes/exportar_inventario_general_excel') ?>",
        beforeSend: function(){  },
                     }).done(function( data ) { 

                  window.open('data:application/vnd.ms-excel,' + encodeURIComponent(data));

   
                      }).fail(function(){

                    alert('Fallo');


                      }); 

  
  }


</script>
