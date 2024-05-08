<script src="<?php echo base_url() ?>assets/global/plugins/handsontable-pro-master/dist/handsontable.full.min.js"></script>
<link href="<?php echo base_url() ?>assets/global/plugins/handsontable-pro-master/dist/handsontable.full.min.css" rel="stylesheet">
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

                  <?php  if ($this->usuario_library->permiso_evento('LISTA DE PRECIO', 'CREAR')): ?> 
                  <li class="nav-item">
                     <a href="<?php echo site_url("precio_lista/crear_lista_precio_carga_masiva");?>">
                     <span class="title">Crear lista de precio</span>
                     </a>
                  </li>

               <?php endif; ?>
                  <li class="nav-item">
                     <a onclick="lista_precios('recientes')">
                     <span class="title">Recientes</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a onclick="lista_precios('activas')">
                     <span class="title">Abiertos</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a onclick="lista_precios('inactivas')">
                     <span class="title">Inactivas</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a onclick="lista_precios('todas')">
                     <span class="title">Todas</span>
                     </a>
                  </li>

               </ul>
            </div>
         </div>
      </div>
      <!-- BEGIN PAGE HEADER-->

        <div class="page-bar">

                              <h4>Lista de precio / Nueva </h4>
                              <div class="page-toolbar pull-left">
                              <?php  if ($this->usuario_library->permiso_evento('LISTA DE PRECIO', 'CREAR')): ?> 
                              <a class="btn blue btn-sm" name="save_dolar" id="save_dolar"> Guardar</a>
                               <?php endif; ?>

                              <a class="btn btn-default btn-sm" href="javascript:window.history.back();"> Descartar</a>
                              </div>

                          <div class="page-toolbar pull-right"></div>
                          </div>

                <h1 class="page-title">    </h1>
      <div class="row">
       <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 visible-md visible-lg">
     
            <div  class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
               <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                     <h4 class="panel-title">
                        <a class="" role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="">
                        Lista de Precios
                        </a>
                     </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                     <div class="panel-body">

                        <table width="100%">
                           <tr>
                              <td width="90%"><a onclick="lista_precios('recientes')"> <span class="items_menu" id="lista_precios_recientes"> Recientes </span> </a></td>
                              <td width="10%"></td>
                           </tr>
                           <tr>
                              <td width="90%"><a onclick="lista_precios('activas')"> <span class="items_menu" id="lista_precios_activas"> Activas </span> </a></td>
                              <td width="10%"></td>
                           </tr>
                           <tr>
                              <td width="90%"><a onclick="lista_precios('inactivas')"> <span class="items_menu" id="lista_precios_inactivas"> Inactivas </span> </a></td>
                              <td width="10%"></td>
                           </tr>
                           <tr>
                              <td width="90%"><a onclick="lista_precios('todas')"> <span class="items_menu" id="lista_precios_todas"> Todas </span> </a></td>
                              <td width="10%"></td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
            </div>

                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
               <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingOne">
                     <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
                        Lista de Grupos
                        </a>
                     </h4>
                  </div>
                  <div id="collapseOne2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                     <div class="panel-body">
                        <table width="100%">
                           <tr>
                              <td width="90%"><a onclick="ver_lista_grupos('activas');"> <span class="items_menu" id="grupo_vendedores_activos"> Activos</span> </a></td>                              
                              <td width="10%"></td>
                            </tr> 
                            <tr>
                              <td width="90%"><a onclick="ver_lista_grupos('inactivas');"> <span class="items_menu" id="grupo_vendedores_inactivos"> Inactivos</span> </a></td>                              
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

               <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

                                                 <div class="portlet light">
                                <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-speech"></i>
                                            <span class="caption-subject bold uppercase">Nueva</span>
                                            <span class="caption-helper">nueva lista de precio</span>
                                        </div>

                                        <div class="actions">
  
                                        </div>
                                    </div>
                                    <div class="portlet-body">

                                     <form class="form-horizontal" role="form">

                                            <div class="form-body">


                                            <div class="row">
                                             <div class="col-lg-6">

        
                                                            <div class="form-group">
                                                  <label class="col-md-3 control-label"><b>Nombre</b></label>

                                                  <div class="col-md-9">
                         <input type="text" name="nb_lista" id="nb_lista" class="form-control input-sm input-lg" placeholder="Nombre" value="<?php echo $info_lista_principal->nb_lista; ?>"> 

                         </div>

                                                </div>


   

                                                </div>
                                                <div class="col-lg-6">

                                           <div class="form-group">
                                                  <label class="col-md-3 control-label"><b>Desde</b></label>
                                                  <div class="col-md-9">
                         <input type="text" name="fe_desde" id="fe_desde" value="<?php echo date_user($info_lista_principal->ff_inicio); ?>" class="form-control form-control-inline input-sm date-picker" placeholder="Fecha de Inicio"> 
                                                </div>
               

                                                </div>


                                                </div>
                                              </div>

                                                      <div class="row">
                                             <div class="col-lg-6">

                                                                                       <div class="form-group">
                                      <label class="control-label col-md-3"><b>Hasta</b></label>
                                       <div class="col-md-9">
                                      <input type="text" name="fe_hasta" id="fe_hasta" class="form-control input-sm date-picker" placeholder="Fecha Fin" value="">
                                    </div>
                      </div>

    

                                             </div>

                                           <div class="col-lg-6">

     

                                             </div>

                                           </div>





                                            </div>

 
                                      </form>

                                      <div class="row">

                                         <div class="col-lg-12">
                                        
                                        <div class="tabbable tabbable-tabdrop">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab1" data-toggle="tab">Productos</a>
                                                </li>
                                                <li>
                                                    <a href="#tab2" data-toggle="tab">Moneda</a>
                                                </li>
                                                <li>
                                                    <a href="#tab3" data-toggle="tab">Otra informacion</a>
                                                </li>
                                                
                                                
                                                
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab1">
                                                   
                                                   <div id="carga" ></div>



                                                </div>
                                                <div class="tab-pane" id="tab2">


                                     <form class="form-horizontal" role="form">

                                            <div class="form-body">

                                                 <div class="row">
                                             <div class="col-lg-6">

        
             
                              <div class="form-group">
                                      <label class="control-label col-md-3"><b>Moneda</b></label>
                                      <div class="col-md-9">

                                 <select class="form-control input-sm" id="co_moneda" name="co_moneda">
                            <option value="">Seleccione ...</option>
                                        <?php foreach($lista_moneda->result() as $row){

                                          if($row->id == $info_lista_principal->co_moneda):

                                        echo "<option selected='selected' value='".$row->id."'>".$row->nb_moneda.' - '.$row->nb_acronimo."</option>";

                                      continue; endif;

                                       echo "<option value='".$row->id."'>".$row->nb_moneda.' - '.$row->nb_acronimo."</option>";

                                          } ?>
                                          </select>  
                                  </div>

                                      </div>

                                                </div>
                                                <div class="col-lg-6">


                                                                    <div class="form-group">
                                      <label class="control-label col-md-3"><b>Redondear en base a</b></label>

                                      <div class="col-md-9">
                                       <input type="number" name="nu_redondeo" id="nu_redondeo" class="form-control input-inline input-sm input-xsmall" placeholder="Redondear" value="<?php echo $info_lista_principal->nu_redondeo; ?>" minlength="0" maxlength="1" min="-6" max="3">
                                         </div>

                                             </div>

                                                </div>
                                              </div>

                                             <div class="row">
                                             <div class="col-lg-6">

                                                                    <div class="form-group">
                                      <label class="control-label col-md-3"><b>Tasa de cambio</b></label>
                                      <div class="col-md-9">
                                       <input type="text" name="ca_tasa_cambio" id="ca_tasa_cambio" maxlength="10" class="form-control input-sm" value="<?php echo $info_lista_principal->nu_tasa_cambio; ?>" placeholder="Tasa de cambio">
                         </div>
                      </div>

                                             </div>

                                          <div class="col-lg-6">



                                           </div>
                                                </div>
                                              </div>

                                            </form>

                                          </div>
                                                <div class="tab-pane" id="tab3">
                                        <form class="form-horizontal" role="form">

                                            <div class="form-body">

                                             <div class="row">
                                             <div class="col-lg-6">

                                                                    <div class="form-group">
                                      <label class="control-label col-md-3"><b>Estatus</b></label>
                                      <div class="col-md-9">
                    <select class="form-control input-sm" id="co_estatus" name="co_estatus">
                      <?php 
                        foreach($lista_estatus->result() as $row) {
                          if($info_lista_principal->co_estatus == $row->id){
                            echo "<option selected='selected' value='".$row->id."'>".$row->nb_estatus."</option>"; 
                            continue;
                           };
                          echo "<option value='".$row->id."'>".$row->nb_estatus."</option>";
                        };
                      ?>
                    </select>      
                                  </div>
                      </div>

                                             </div>

                                              <div class="col-lg-6">

                                   <div class="form-group">
                                      <label class="control-label col-md-3"><b>Condicion de pago</b></label>

                                      <div class="col-md-9">
                  <select class="form-control input-sm" id="co_tipo_pago" name="co_tipo_pago">
                    <option value="">Seleccione ...</option>
                    <?php 
                      foreach($lista_pagos->result() as $row) {
                        if($info_lista_principal->co_tipo_pago == $row->id){
                          echo "<option selected='selected' value='".$row->id."'>".$row->nb_tipo_pago."</option>";
                          continue;
                          };
                        echo "<option value='".$row->id."'>".$row->nb_tipo_pago."</option>";
                      };
                    ?>
                  </select> 
                                          </div>    

                           </div>

                                             </div>

                                           </div>

                                             <div class="row">
                                             <div class="col-lg-6">

                                                                                      <div class="form-group">
                                      <label class="control-label col-md-3"><b>Dias de rango de pago</b></label>
                                      <div class="col-md-9">
                                       <input type="number" name="ca_dias" id="ca_dias" class="form-control input-sm input-xsmall" placeholder="Dias" value="<?php echo $info_lista_principal->ca_dias; ?>"  minlength="0" maxlength="1" min="0" max="365">
                                     </div>
                        
                      </div>

                                             </div>


                                            <div class="col-lg-6">


              <div class="form-group">
                <div class="mt-checkbox-inline">
                    <label class="control-label col-md-3"><b>Asociada al Inventario </b> </label>

                      <div class="col-md-9">

                     <?php if ($info_lista_principal->in_asociado_inventario == '1') : ?>
                      <input type="checkbox" id="in_asociado_iventario" name="in_asociado_iventario" value="true" checked />
                    <?php else : ?>
                      <input type="checkbox" id="in_asociado_iventario" name="in_asociado_iventario" value="false" />
                    <?php endif; ?>

                    </div>

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
                                </div>


   </div>
</div>


         </div>
      </div>
   </div>
   <!-- END CONTENT BODY -->
</div>

<div class="modal fade" id="ajax_remote" tabindex="-1">
   <div class="modal-dialog">
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






   function lista_precios(filtro) {

   $(location).attr('href',"<?php echo site_url() ?>precios_lista/index"+'/'+filtro);

   }



              function validate_fechaMayorQue(fechaInicial,fechaFinal)

        {

            valuesStart=fechaInicial.split("-");

            valuesEnd=fechaFinal.split("-");

            // Verificamos que la fecha no sea posterior a la actual

            var dateStart=new Date(valuesStart[2],(valuesStart[1]-1),valuesStart[0]);

            var dateEnd=new Date(valuesEnd[2],(valuesEnd[1]-1),valuesEnd[0]);

            if(dateStart>dateEnd)

            {

                return 1;

            }

            return 0;

        }

$("#in_asociado_iventario").on('change', function() {
  if ($("#in_asociado_iventario").is(":checked")) {
    $("#in_asociado_iventario").attr('value', 'true');    
  } else {
    $("#in_asociado_iventario").attr('value', 'false');
  }
});


$(document).ready(function () {

      $('.date-picker').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    enableOnReadonly: true
    });

    var info_tasa_cambio = <?php echo $info_lista_principal->nu_tasa_cambio; ?>;
  var in_otra_moneda = <?php echo $info_lista_principal->in_otra_moneda; ?>;
  var co_precios_lista = <?php echo $info_lista_principal->id; ?>;

      var ventana_ancho = $(window).width();
  var ventana_alto = $(window).height();

    if (ventana_ancho > 1000) {

        var ancho_datatable = 760;

    }else{

        var ancho_datatable = 300;
    }


    
  var container = document.getElementById("carga");

  var data =<?php echo $info_lista_detalle ?>;
    
    var hot = new Handsontable(container, {
      data: data,
      minSpareRows: 1,
      rowHeaders: true,
      colWidths: [10, 200, 140, 140, 100, 100, 100, 100],
      colHeaders: true,
      contextMenu: true,
      width: ancho_datatable,
      height: ventana_alto,
      hiddenColumns: {
      columns: [0],
      indicators: true
    },

      colHeaders: ['Id','Producto','Categoria','Precio de venta','Unidad de manejo','Laboratorio','Vence','Tasa Cambio', 'Precio de compra'],
      columns: [
          {data:'id', type: 'text', strict:true},
          {data:'nb_producto', type: 'text', strict:true},
          {data:'nb_categoria', type: 'text', strict:true},
          {data:'nu_precio_dolar', type: 'numeric',format: '00,0.00',strict:true},
          {data:'nb_unidad_manejo', type: 'text', strict:true},
          {data:'nb_laboratorio', type: 'text', strict:true},
          {data:'ff_vencimiento', type: 'text', strict:true},
          {data:'nu_tasa_cambio', type: 'numeric',format: '00,0.00',strict:true},
          {data:'nu_precio_compra', type: 'numeric',format: '00,0.00',strict:true},
               ]
    }); 


      $( "#save_dolar" ).on( "click", function() {



    var datos= hot.getData();


               var nb_lista = $('#nb_lista').val();
               var fe_desde = $('#fe_desde').val();
               var fe_hasta = $('#fe_hasta').val(); 

            if(validate_fechaMayorQue(fe_desde,fe_hasta))

        {

            notificacion_toas('error','Error','La fecha de inicio no puede ser mayor a la fecha fin');
            $('#fe_desde').focus();
            return;

        }

                var in_otra_moneda = 1;
                var ca_tasa_cambio = $('#ca_tasa_cambio').val();
                var nu_redondeo = $('#nu_redondeo').val();
                var co_moneda = $('#co_moneda').val();
                var co_estatus = $('#co_estatus').val();
                var ca_dias = $('#ca_dias').val();
                var co_tipo_pago = $('#co_tipo_pago').val();
                var in_asociado_iventario = $('#in_asociado_iventario').val();

                console.log(in_asociado_iventario);


                        if (fe_desde == '') {

                    notificacion_toas('error','Error','Ingrese la fecha de inicio');
                   $('#fe_desde').focus();
                  return;

              };

                if (fe_hasta == '') {
 
              notificacion_toas('error','Error','Ingrese la fecha fin');
            $('#fe_hasta').focus();
                  return;
                };

                      if (co_moneda == '') {

                   notificacion_toas('error','Error','Seleccione la moneda');
                    $('#co_moneda').focus();
                       return;

                };




                if (nu_redondeo == '') {
                   notificacion_toas('error','Error','Ingrese el número de redondeo');
                 $('#nu_redondeo').focus();
                       return;

                };


                  if(isNaN(nu_redondeo)) {
 
                notificacion_toas('error','Error','Ingrese el número de redondeo valido');
              $('#nu_redondeo').focus();
                return;

                    };


                if (ca_tasa_cambio == '') {

                  notificacion_toas('error','Error','Ingrese la tasa de cambio');
                $('#ca_tasa_cambio').focus();
                       return;

                };

                  if(isNaN(ca_tasa_cambio)) {

                      
                   notificacion_toas('error','Error','Ingrese un numero de tasa válido');
                     $('#ca_tasa_cambio').focus();
                return;

                    };

                                      if(isNaN(ca_dias)) {
 
                notificacion_toas('error','Error','Ingrese un número de dias valido');
              $('#ca_dias').focus();
                return;

                    };
               if(co_tipo_pago == '') {
 
                notificacion_toas('error','Error','Seleccione la condicion de pago');
              $('#co_tipo_pago').focus();
                return;

                    };


    //Validacion
    var errores = '';
    var fila=1;


    datos.forEach(function(dato,index) {

    if(((dato[1]==null) || dato[1]=='') && (datos.length-1)!=index)
      {
       errores+='Fila: ' + fila + '. Producto = ' + dato[1] + ' no pueder ser vacio <br>';
      } 

          if(((dato[2]==null) || dato[2]=='') && (datos.length-1)!=index)
      {
       errores+='Fila: ' + fila + '. Categoria = ' + dato[2] + ' no pueder ser vacio <br>';
      } 

          if(((dato[3]==null) || dato[3]=='') && (datos.length-1)!=index)
      {
       errores+='Fila: ' + fila + '. Precio = ' + dato[3] + ' no pueder ser vacio <br>';
      }
    
     
     fila++;
    });

    
    if(errores!='')
    {
      
       notificacion_toas('error','Error',errores);
      return null;
    }


    $.confirm({
    backgroundDismiss: false,
    backgroundDismissAnimation: 'glow',
      theme: 'material', 
    title: 'Lista de Precio',
    content: '<b>¿Estas seguro que deseas crear una nueva lista de precio?.',
        type: 'red',
    animation: 'opacity',
    escapeKey: 'no',
    buttons: {
        no: function () {
           
 
        },
        si: function () {



    $.ajax({
            method: "POST",
            data: {
            'datos':datos, 
            'fe_desde':fe_desde, 'fe_hasta':fe_hasta, 'ca_tasa_cambio':ca_tasa_cambio, 'nb_lista':nb_lista, 'nu_redondeo':nu_redondeo, 'co_moneda':co_moneda, 'in_otra_moneda':in_otra_moneda, 'co_estatus':co_estatus, 'ca_dias':ca_dias, 'co_tipo_pago':co_tipo_pago, 'in_asociado_iventario': in_asociado_iventario},
            url: "<?php echo site_url('precios_lista/guardar_carga_masiva_nueva_editando/') ?>",
             beforeSend: function(){ $('#save_dolar').html('Enviando...'); $('#save_dolar').attr("disabled", true);},
            dataType: "html"
          }).done(function( data ) {

         var obj = JSON.parse(data);

     if (obj.error == 0) {
      $('#save_dolar').html('Guardar');
    $('#save_dolar').attr("disabled", false);
    var c = 'recientes';

       $('#notification').fadeIn(200); $("#notification").addClass("alert alert-success"); $('#notification').html(obj.message);


                                         $.confirm({
    backgroundDismiss: false,
    backgroundDismissAnimation: 'glow',
      theme: 'material', 
    title: 'Lista de Precio',
    content: '¿Imprimir resumen o completo?',
        type: 'blue',
    animation: 'opacity',
    escapeKey: 'cancelar',
    buttons: {
        cancelar: function () {
          $(location).attr('href',"<?php echo site_url() ?>precios_lista/index"+'/'+c);

        },
        resumen: function () {
        $(location).attr('href',"<?php echo site_url() ?>precios_lista/index"+'/'+c);
         window.open("<?php echo site_url() ?>/precios_lista/pdf_controllers"+"/"+obj.co_precios_lista_nuevo+"/"+'0'+"", "_blank");


        },
        completo: function () {
        $(location).attr('href',"<?php echo site_url() ?>precios_lista/index"+'/'+c);
       window.open("<?php echo site_url() ?>/precios_lista/pdf_controllers"+"/"+obj.co_precios_lista_nuevo+"/"+'1'+"", "_blank");
           
        },
  
    }
});



     }else{


              $('#notification').fadeIn(200); $("#notification").addClass("alert alert-danger"); $('#notification').html(obj.message_javascript);
        $('#save_dolar').html('Guardar');
    $('#save_dolar').attr("disabled", false);

       notificacion_toas('error','Error',obj.message);
       return;

     }
              
           }); //FIN AJAX 

           
        },
  
    }
});




  });


   
});


</script>