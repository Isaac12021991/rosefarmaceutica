
<link href="<?php echo base_url() ?>css/acordeon/styles_acordeon.css" rel="stylesheet" type="text/css" />
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <div class="theme-panel visible-xs visible-sm" style="margin-top:0px;">
         <div class="toggler"> </div>
         <div class="toggler-close"> </div>
         <div class="theme-options">
            <div class="theme-option">
               <span> Menú </span>
            </div>
            <div class="page-sidebar">
               <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <?php  if ($this->usuario_library->permiso_evento('ALMACEN', 'CREAR')): ?>
                  <li class="nav-item">
                     <a href='<?php echo site_url("almacen/crear_almacen");?>'>
                     <span class="title">Crear almacen</span>
                     </a>
                  </li>
                  <?php endif; ?>
               </ul>
            </div>
         </div>
      </div>
      <!-- BEGIN PAGE HEADER-->

        <div class="page-bar">

       

            <h4>Pagos / Crear </h4>
            <div class="page-toolbar pull-left">

             <div id="reload_btn_header">


            <a class="btn blue btn-sm" onclick="agregar_avance()">Guardar</a>


              <a class="btn btn-default btn-sm" href="javascript:window.history.back();"> Descartar</a>

       
                              </div>

                              </div>

                          <div class="page-toolbar pull-right"> 
                                                          

                          </div>


                          </div>

                <h1 class="page-title">    </h1>
      <div class="row">
       <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 visible-md visible-lg">
     
           <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a class="" role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Pagos
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                        <div class="panel-body">

                    <table width="100%">
                    <tr>
                    <td width="90%"><a href="<?php echo site_url('pagos/index/cliente')?>"> <span id="pago_cliente"> Cliente  </span> </a></td>
                    <td width="10%"></td>
                    </tr>

                    <tr>
                    <td width="90%"><a href="<?php echo site_url('pagos/index/proveedor')?>"> <span id="pago_proveedores"> Proveedores  </span> </a></td>
                    <td width="10%"></td>
                    </tr>

                  </table>
                        </div>
                    </div>
                </div>

            </div>





            <div class="list-group">
               <span class="list-group-item active">
                  <h4 class="list-group-item-heading">Soporte Técnico</h4>
                  <p class="list-group-item-text"> Para ayuda y más informacion puede comunicarse con nosotros a traves de
                  <h6>soporte@wakuza.net</h6>
                  </p>
               </span>
            </div>
            <!-- END MENU -->
         </div>
         <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12 ">
            <div id="controllers_presupuesto">

                                               <div class="portlet light">
                                <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-speech"></i>
                                            <span class="caption-subject bold uppercase">Nuevo</span>
                                            <span class="caption-helper">nuevo pago</span>
                                        </div>

                                        <div class="actions">
  
                                        </div>
                                    </div>
                                    <div class="portlet-body">


                                   <form class="form-horizontal" role="form">

                                        <div class="form-body">
                                        <div class="row">
                                          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                          <div class="form-group">
                           <label class="col-md-3 control-label"><span class="pull-left">Movimiento de pago</span></label>
                           <div class="col-md-9">
                           <select class="form-control input-lg" id="tx_movimiento_pago" name="tx_movimiento_pago">
                            <option value="entrada">Entrada</option>
                            <option value="salida">Salida</option>
                           </select>
                         </div>
                        </div>


               
                          <div class="form-group">
                           <label class="col-md-3 control-label">Tipo de empresa</label>
                           <div class="col-md-9">
                           <select class="form-control input-sm" id="tx_tipo_suplidor" name="tx_tipo_suplidor" onchange="tipo_suplidor()">
                            <option value="">Seleccione...</option>
                            <option value="cliente">Cliente</option>
                            <option value="proveedor">Proveedor</option>
                           </select>
                         </div>
                        </div>

                                                  <div class="form-group">
                           <label class="col-md-3 control-label"><span class="pull-left">Contacto</span></label>
                           <div class="col-md-9">
                            <div id="reload_contacto">
                           <select class="form-control input-sm" id="co_contacto" name="co_contacto">
                            <option value="0">Contacto</option>
                           </select>
                           </div>
                         </div>
                        </div>

                  



                          <div class="form-group">
                           <label class="col-md-3 control-label"><span class="pull-left">Moneda</span></label>
                           <div class="col-md-9">
                           <select class="form-control input-sm" id="tipo_divisa" name="tipo_divisa" onchange="cambiar_moneda(this.value)">
                              <?php foreach ($lista_divisa->result() as $row) {
                                    echo "<option value='" . $row->id . "'>" . $row->nb_moneda . "</option>";
                                } ?>
                           </select>
                         </div>
                        </div>


                    <div class="form-group">
                           <label class="col-md-3 control-label"><span class="pull-left">Forma de pago</span></label>
                            <div class="col-md-9">
                              <select class="form-control input-sm" id="co_forma_pago" name="co_forma_pago" onchange="cambiar_forma_pago()">
                              
                              <?php foreach ($lista_forma_pago->result() as $row) {
                                    echo "<option value='" . $row->id . "'>" . $row->nb_forma_pago . "</option>";
                                } ?>
                           </select>
                         </div>
                        </div>


    


                        <div class="form-group">
                            <label class="col-md-3 control-label"><span class="pull-left">Banco origen</span></label>
                            <div class="col-md-9">
                           <select class="form-control input-sm" id="co_banco" name="co_banco">
                              <option value="">Seleccione ...</option>
                              <?php foreach ($lista_banco->result() as $row) {
                                    echo "<option value='" . $row->id . "'>" . $row->nb_banco . "</option>";
                                } ?>
                           </select>
                         </div>
                        </div>



                        <div class="form-group">
                           <label class="col-md-3 control-label"><span class="pull-left">Diaro de pago</span></label>
                           <div class="col-md-9">
                           <select class="form-control input-sm selectpicker show-tick" data-live-search="true"  id="co_cuenta" name="co_cuenta">
                              <option value="">Seleccione ...</option>
                              <?php foreach ($lista_cuenta->result() as $row) { ?> 
                              <option data-content="<b><?php echo $row->nb_diario; ?></b><b><h6> <b><?php echo $row->nb_banco; ?></b>. </h6> <h5>Cuenta: <?php echo $row->primer_numero_cuenta . '***' . $row->ultimo_numero_cuenta; ?></h5></b>" value="<?php echo $row->id; ?>"></option>
                               <?php 
                            } ?>
                           </select>
                         </div>
                        </div>




                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                        <div class="form-group">
                           <label class="control-label col-md-3 "><b><span style="font-size:10px;" id="cambiar_forma_pago_label">TRANSFERENCIA</span></b></label>
                           <div class="col-md-9">
                           <input type="text" name="nu_referencia" id="nu_referencia" class="form-control input-sm" placeholder="Referencia">     
                         </div>
                        </div>

                        <div class="form-group">
                           <label class="control-label col-md-3"><b>Tasa de Cambio</b></label>
                            <div class="col-md-9">
                           <input type="text" onkeyup="calcular_pago_final()" name="ca_tasa_cambio" id="ca_tasa_cambio" class="form-control input-sm input-small" placeholder="Tasa de Cambio">     
                         </div>
                        </div>


                        <div class="form-group">
                           <label class="control-label col-md-3"><b>Cantidad</b></label>
                            <div class="col-md-9">
                           <input type="text" name="ca_cantidad_divisa" onkeyup="calcular_pago_final()" onblur="calcular_monto();" id="ca_cantidad_divisa" class="form-control input-sm" placeholder="Cantidad">     
                         </div>
                        </div>

                                                <div class="form-group">
                           <label class="control-label col-md-3"><b>Monto</b></label>
                           <div class="col-md-9">
                           <input type="text" name="ca_pago" id="ca_pago" class="form-control input-sm" placeholder="Monto">     
                         </div>
                        </div>

                                                <div class="form-group">
                           <label class="control-label col-md-3">Fecha</label>
                           <div class="col-md-9">
                           <input type="text" name="ff_pago" id="ff_pago" class="form-control date_picker input-sm" placeholder="Fecha de pago">    
                         </div>
                        </div>

                                                <div class="form-group">
                           <label class="control-label col-md-3">Descripcion</label>
                           <div class="col-md-9">
                            <textarea class="form-control" id="tx_descripcion" name="tx_descripcion"></textarea> 
                         </div>
                        </div>



                                                </div>
                                                </div>

              



                                                </div>

                                                </form>

     

                                   </div>
                                </div>


            </div>
         </div>
      </div>
   </div>
   <!-- END CONTENT BODY -->
</div>


   <!-- /.modal-dialog -->
</div>
<div class="modal fade bs-modal-lg" id="ajax_remote" tabindex="-1">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-body">
            <div class="loader_panel_inside">
               <div class="ball"></div>
               <h6 align="center"><B>CARGANDO... ESPERE POR FAVOR</b></h6>
            </div>
            <br> 
            <h3 align="center"><b>SIRE.</b></h3>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>


<script type="text/javascript">

  var co_orden_compra = 0;
  var co_documento = 0; 
  var co_contacto = 0;

function cambiar_forma_pago()

{
      var label_forma_pago = $('#co_forma_pago option:selected').html();

      $('#cambiar_forma_pago_label').html(label_forma_pago)

}




    function calcular_pago_final()
    {


      var co_moneda = $('#tipo_divisa').val(); 


   if (co_moneda != 1){
   

       var ca_tasa_cambio = $('#ca_tasa_cambio').val(); 
        var ca_cantidad_divisa  = $('#ca_cantidad_divisa').val(); 

        if (ca_tasa_cambio > 0 && ca_cantidad_divisa > 0) {
            var pago = parseInt(ca_cantidad_divisa)*parseInt(ca_tasa_cambio);
            $("#ca_pago").val(pago);
        }   



   }
       

    }


function cambiar_moneda(co_moneda)

{   

   if (co_moneda == 1){
   
$('#ca_tasa_cambio').val(1);
$('#ca_cantidad_divisa').val(1);

$("#ca_tasa_cambio").attr('disabled','disabled');
$("#ca_cantidad_divisa").attr('disabled','disabled');

$("#co_banco").removeAttr('disabled')

   }else{
      
      $("#ca_tasa_cambio").removeAttr('disabled')
      $("#ca_cantidad_divisa").removeAttr('disabled')
      $("#co_banco").attr('disabled','disabled');
   
   
       var ca_tasa_cambio = $('#ca_tasa_cambio').val(); 
        var ca_cantidad_divisa  = $('#ca_cantidad_divisa').val(); 

        if (ca_tasa_cambio > 0 && ca_cantidad_divisa > 0) {
            var pago = parseInt(ca_cantidad_divisa)*parseInt(ca_tasa_cambio);
            $("#ca_pago").val(pago);
        }   

   }

}


    function calcular_monto() {

      
        var ca_tasa_cambio = $('#ca_tasa_cambio').val(); 
        var ca_cantidad_divisa  = $('#ca_cantidad_divisa').val(); 

        if (ca_tasa_cambio > 0 && ca_cantidad_divisa > 0) {
            var pago = parseInt(ca_cantidad_divisa)*parseInt(ca_tasa_cambio);
            $("#ca_pago").val(pago);
        }        
    }

    $(document).ready(function(){  


    $(".radio_tipo_documento").click(function() { 

        if($("#ch_orden_compra").is(':checked')) {  

         $('#div_factura').hide(); //oculto mediante id
          $('#div_orden_compra').show(); //oculto mediante id
          $('#co_documento').val('0');

        } 

        if($("#ch_factura").is(':checked')) { 
          $('#div_factura').show(); //oculto mediante id
          $('#div_orden_compra').hide(); //oculto mediante id
          $('#co_orden_compra').val('0');

        }
    });  






      $('.selectpicker').selectpicker();
     
      $('.date_picker').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    enableOnReadonly: true
    });

  $('#ca_tasa_cambio').val(1);
$('#ca_cantidad_divisa').val(1);

$("#ca_tasa_cambio").attr('disabled','disabled');
$("#ca_cantidad_divisa").attr('disabled','disabled');

$("#co_banco").removeAttr('disabled')


    });


    function calcular_monto() {
        var ca_tasa_cambio = $('#ca_tasa_cambio').val(); 
        var ca_cantidad_divisa  = $('#ca_cantidad_divisa').val(); 

        if (ca_tasa_cambio > 0 && ca_cantidad_divisa > 0) {
            var pago = parseInt(ca_cantidad_divisa)*parseInt(ca_tasa_cambio);
            $("#ca_pago_divisa").val(pago);
        }        
    }


   $('#tipo_divisa').focus(); 


   
   function agregar_avance()
   {    

    

      co_contacto = $('#co_contacto').val();


              if (co_contacto == 0)

              {

            notificacion_toas('error','Avance financiero','Seleccione un contacto');
            return;

              }


    

       var tx_movimiento_pago = $('#tx_movimiento_pago').val(); 
       
       var ca_tasa_cambio = $('#ca_tasa_cambio').val(); 
       var ca_cantidad_divisa  = $('#ca_cantidad_divisa').val();
         
        var nu_referencia   = $('#nu_referencia').val(); 
        var ca_pago         = $('#ca_pago').val(); 
        var ff_pago         = $('#ff_pago').val();
        var co_banco        = $('#co_banco').val(); 
        var co_cuenta       = $('#co_cuenta').val();     
        var tipo_divisa         = $('#tipo_divisa').val(); 
        var co_forma_pago       = $('#co_forma_pago').val();

        if (tipo_divisa == 1) {

        if (co_banco == '') {
            notificacion_toas('error','Avance financiero','Seleccione el banco origen');
            return;
        };
         
      }
   
        if (co_cuenta == '') {
            notificacion_toas('error','Avance financiero','Seleccione la cuenta destino');
            return;
        };
   
        if (nu_referencia == '') {
            notificacion_toas('error','Avance financiero','Ingrese el numero de referencia');
            return;
        };
   
        if (ca_pago == '') {
            notificacion_toas('error','Avance financiero','Ingrese la cantidad de pago');
            return;
        };
   
        if (ff_pago == '') {
            notificacion_toas('error','Avance financiero','Seleccione la fecha de pago');
            return;
        };


        if (tipo_divisa != 1) {

          if (ca_tasa_cambio == '') {
            notificacion_toas('error','Avance financiero','Ingrese la tasa de cambio actual');
            return;
        };

        if (ca_cantidad_divisa == '') {
            notificacion_toas('error','Avance financiero','Ingrese la cantidad de divisas');
            return;
        };

        };
   
        if ($('#ca_pago').val() <= 0) {
            notificacion_toas('error','Avance financiero','Ingrese cantidad válida');
            $('#ca_pago').focus();
            return false;
        }

         
        $.ajax({        
        method: "POST",
        data: {'ca_pago':ca_pago, 'ff_pago':ff_pago, 'co_banco':co_banco, 'co_cuenta':co_cuenta, 'nu_referencia':nu_referencia, 'tipo_divisa':tipo_divisa, 'ca_tasa_cambio':ca_tasa_cambio, 'ca_cantidad_divisa':ca_cantidad_divisa, 'co_forma_pago':co_forma_pago, 'co_contacto':co_contacto,  'tx_movimiento_pago':tx_movimiento_pago},
        url: "<?php echo site_url('pagos/agregar_avance_financiero_ejecutar') ?>",
        beforeSend: function(){  },
        }).done(function( data ) { 
                var obj = JSON.parse(data);
                if (obj.error > 0) {
                    notificacion_toas('error','Avance financiero',obj.message);

                    

                    return;
                } else {

                  notificacion_toas('success','Registrado',obj.message);
                        history.back(1);
                        }
                }).fail(function(){
                    alert('Fallo');
                  }
                ); 

       

     }

    function tipo_suplidor()

    {

        var tx_tipo_suplidor = $('#tx_tipo_suplidor').val(); 

              $.ajax({        
        method: "POST",
        data: {'tx_tipo_suplidor':tx_tipo_suplidor},
        url: "<?php echo site_url('pagos/reload_contacto') ?>",
        beforeSend: function(){  },
        }).done(function( data ) { 

              $('#reload_contacto').html(data)

                }).fail(function(){
                    alert('Fallo');
                  }
                ); 


    }


   
</script>