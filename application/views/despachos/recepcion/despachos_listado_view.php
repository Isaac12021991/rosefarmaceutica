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

              <?php if ($list_despachos->num_rows() > 0) : ?>

                  <table class="table table-striped table-advance table-hover" id="tabla_1" width="100%">
                    <thead>
                       <tr>
                       <th width="40%">DESCRIPCION</th>
                         <th width="20%">CLIENTE</th>
                         <th width="10%">ESTADO</th>
                         <th width="10%">TOTAL</th>
                         <th width="10%">ACCIONES</th>

                       </tr>
                    </thead> 
                    <tbody>
                      <?php $subtotal = 0;
                        $total_documento = 0;  ?>
                      <?php foreach ($list_despachos->result() as $row) : ?>
                          <tr>
                              <td><?php echo $row->nb_documento; ?> Numero: <?php echo $row->nu_documento; ?>, forma de pago: <?php echo $row->nb_tipo_pago; ?>, <?php echo $row->nb_documento; ?> emitido el: <?php echo date_user($row->ff_emision); ?>. Recepcionado: (<?php echo $row->nu_productos; ?>/<?php echo $row->in_despachos; ?>)  </td>
                              <td><?php echo $row->nb_cliente; ?> </td>
                              <td>
                                <?php if ($row->co_estatus == '1'): ?>
                                <h6><span class="label label-success"> <?php echo $row->nb_estatus; ?>  </span> </h6>
                              <?php endif; ?>

                                <?php if ($row->co_estatus == '3'): ?>
                                <h6><span class="label label-warning"> <?php echo $row->nb_estatus; ?>  </span> </h6>
                              <?php endif; ?>

                                                              <?php if ($row->co_estatus == '4'): ?>
                                <h6><span class="label label-danger"> <?php echo $row->nb_estatus; ?>  </span> </h6>
                              <?php endif; ?>

                            </td>
                              <td><?php echo number_format($row->nu_precio_factura,2,',','.') ?> Bs </td> 

                              <td> 
                                  <?php if ($row->co_estatus == '1'): ?>


                            
                               <a href="#" onclick="ver_detalle_despacho_recepcion(<?php echo $row->id; ?>)" class="btn btn-xs default" title="ver productos a despachar"><i class="fa fa-mail-forward"></i></a>


                          <?php endif; ?>
                            


                               </td>
                              
                          </tr>
                       
                     <?php endforeach; ?>   
                   </tbody>

                 </table>

                                                   <?php else: ?>

                                      <h4>Sin documentos</h4>
                                      <p>Crear documentos</p>


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


    function despachar(co_documento) 

{


                                         $.confirm({
    backgroundDismiss: false,
    backgroundDismissAnimation: 'glow',
      theme: 'material', 
    title: 'documento',
    content: '<b>¿documento digital o impresa?</b><br>.',
        type: 'blue',
    animation: 'opacity',
    escapeKey: 'cancelar',
    buttons: {
              cancelar: function () {


        },
        impresa: function () {

         window.open("<?php echo site_url() ?>/documentos/imprimir_documento_pdf"+"/"+co_documento+"/"+'0'+"", "_blank");


        },
        digital: function () {

       window.open("<?php echo site_url() ?>/documentos/imprimir_documento_pdf"+"/"+co_documento+"/"+'1'+"", "_blank");



           
        },
  
    }
});


function no_despachar(co_documento)
{


                                $.confirm({
    backgroundDismiss: false,
    backgroundDismissAnimation: 'glow',
      theme: 'material', 
    title: 'Anular documento',
    content: '<b>¿Estas seguro que deseas anular esta documento?</b><br>.',
        type: 'red',
    animation: 'opacity',
    autoClose: 'no|10000',
    escapeKey: 'no',
    buttons: {
        si: function () {

                                                   $.ajax({
        method: "POST",
        data: {'co_documento':co_documento},
        url: "<?php echo site_url('documentos/anular_documento') ?>",
        beforeSend: function(){  },
                     }).done(function( data ) { 

                        var obj = JSON.parse(data);

                         // notificacion_toas('info','documento',obj.message);
                        $("#controllers_documentos").load('<?php echo site_url('documentos/listado_documentos') ?>');

   
                      }).fail(function(){

                    alert('Fallo');


                      }); 
           
           
      


        },
        no: function () {


           
        },
  
    }
});

}




}




</script>