<div class="row animated fadeIn">


                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">


                                  <div class="portlet box bg-blue-chambray">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Recepcion de mercancía </div>
                                        <div class="actions">


                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                      <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

                                         <b> <?php echo $info_documento->nb_documento; ?> </b> <?php echo $info_documento->nu_documento; ?>

                                        </div>
                                        


                                      </div>

              <?php if ($list_despachos_detalle->num_rows() > 0) : ?>
                  <br>
                  <table class="table table-striped table-advance table-hover" id="tabla_1" width="100%">
                    <thead>
                       <tr>
                       <th width="20%">PRODUCTO</th>
                       <th width="10%">UNIDADES A RECIBIR</th>
                       <th width="10%">LOTE</th>
                         <th width="20%">VENCE</th>
                         <th width="10%">ESTATUS</th>
                         <th width="10%">ACCION</th>

                       </tr>
                    </thead> 
                    <tbody>
                      <?php foreach ($list_despachos_detalle->result() as $row) : ?>
                          <tr>
                              <td><?php echo $row->nb_producto; ?> </td>
                              <td><?php echo $row->nu_unidades; ?> </td>
                              <td><?php echo $row->nu_lote; ?> </td>
                              <td><?php echo $row->ff_vencimiento; ?> </td>
                              <td>
                                <?php if ($row->in_despachado == '1'): ?>
                                <h6><span class="label label-success"> Recepcionado </span> </h6>
                                <?php elseif($row->in_no_despachado == '1'): ?>
                                     <h6><span class="label label-danger"> Rechazado </span> </h6>
                                  <?php else: ?>
                                   <h6><span class="label label-warning"> Sin recepcionar </span> </h6>
                              <?php endif; ?>

                            </td>

                              <td>

                              <?php if ($row->in_despachado == '1'): ?>
                
                                <?php elseif($row->in_no_despachado == '1'): ?>
                                   
                                  <?php else: ?>
                <a class="btn btn default btn-xs" href='<?php echo site_url("despachos/info_articulo_despachar/$row->id/$co_documentos");?>' data-target="#modal_recepcion" data-toggle="modal"> Recepcionar
                                        <i class="fa fa-plus"></i>
                                    </a>   
                              <?php endif; ?>

                              
                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

                                                   <?php else: ?>

                                      <h4>Sin registro</h4>
                                      <p></p>


                                    <?php endif; ?>

      

                                </div>



                            </div>

                            </div>




</div>

  <script type="text/javascript">

                $('#tabla_1').DataTable( {
        "responsive": true,
                "order": [],
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todo"]]
    } );



            $("#checkall").change(function () {


      $("input:checkbox").prop('checked', $(this).prop("checked"));

             if($("input:checkbox").is(':checked')) {  
             $('#button_accion_check').fadeIn(200); return;
        } else {  
             $('#button_accion_check').fadeOut(200); return;
        }  


  });


            $(".checkbox_comprobar").click(function() { 

        if($("input:checkbox").is(':checked')) {  
             $('#button_accion_check').fadeIn(200); return;
        } else {  
             $('#button_accion_check').fadeOut(200); return;
        }  
    }); 



    function recepcionar() 

{


                                         $.confirm({
    backgroundDismiss: false,
    backgroundDismissAnimation: 'glow',
      theme: 'material', 
    title: 'Despacho',
    content: '<b>¿Estas seguro que deseas recepcionar estos productos seleccionados?</b><br>.',
        type: 'blue',
    animation: 'opacity',
    escapeKey: 'cancelar',
    buttons: {
              si: function () {

              var accion_check = $('[name="accion_check[]"]').serializeArray();
               
                $.ajax({
                       method: "POST",
                       data: {'accion_check':accion_check, 'co_documento':<?php echo $co_documentos; ?>},
                       url: "<?php echo site_url('despachos/recepcionar_masivo')?>"
                     }).done(function( data ) { 

                      var obj = JSON.parse(data);

                        if (obj.error > 0)

                      {


                        notificacion_toas('error','Despacho',obj.message);
                        return;


                      }else{


                      notificacion_toas('success','Despacho',obj.message);
                      $("#controllers_despachos").load('<?php echo site_url('despachos/listado_despachos_detalle') ?>' + '/' + obj.co_documento);

                    }


                      }); 



        },
        cancelar: function () {



        },
  
    }
});

                                       }


function no_recepcionar()
{


                                $.confirm({
    backgroundDismiss: false,
    backgroundDismissAnimation: 'glow',
      theme: 'material', 
    title: 'Despacho',
    content: '<b>¿Estas seguro que deseas rechazar esta mercancía?</b><br>.',
        type: 'red',
    animation: 'opacity',
    autoClose: 'no|10000',
    escapeKey: 'no',
    buttons: {
        si: function () {

                        var accion_check = $('[name="accion_check[]"]').serializeArray();
               
                $.ajax({
                       method: "POST",
                       data: {'accion_check':accion_check, 'co_documento':<?php echo $co_documentos; ?>},
                       url: "<?php echo site_url('despachos/recepcionar_rechazar_masivo')?>"
                     }).done(function( data ) { 

                      var obj = JSON.parse(data);

                        if (obj.error > 0)

                      {


                        notificacion_toas('error','Despacho',obj.message);
                        return;


                      }else{


                      notificacion_toas('info','Despacho',obj.message);
                      $("#controllers_despachos").load('<?php echo site_url('despachos/listado_despachos_detalle') ?>' + '/' + obj.co_documento);

                    }


                      }); 





        },
        no: function () {


           
        },
  
    }
});

}







</script>