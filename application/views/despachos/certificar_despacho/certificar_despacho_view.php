                                   <div class="portlet box bg-blue-chambray" id="box_form">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Certificar despacho</div>
                                                                              <div class="tools">
                                            <a href="javascript:;" data-dismiss="modal" aria-hidden="true" class="remove"> </a>
                                        </div>
                                        <div class="actions">
                                        </div>
                                    </div>

                                    <div class="portlet-body">


                                     <form class="form-horizontal" role="form">

                                            <div class="form-body">

                                            
                                              
                                              <div class="form-group">
                                                    <label class="col-md-3 control-label"><b>Almacen de recepción</b></label>

                                                    <div class="col-md-9">
                                                                            
                                              <select class="form-control input-sm"  id="co_almacen" name="co_almacen">
                                                 <?php foreach($list_alamacen->result() as $row): ?>
                                              <option value="<?php echo $row->id; ?>"><?php echo $row->nb_almacen; ?></option>
                                              <?php endforeach; ?>

                                                </select>

                                                    </div>
                                                </div>


                                            </div>


                                                                                        <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                    <a href="javascript:;" class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true"> Cancelar</a>
                                                        <a onclick="certificar_despacho()" class="btn blue-chambray btn-sm">Certificar</a>

                                                    </div>
                                                </div>
                                            </div>
 
                </form>

                                       

                                    </div>


                                        </div>




  <script type="text/javascript">


function certificar_despacho()
{

      var co_almacen = $("#co_almacen").val();
      var co_nota_despacho = '<?php echo $co_nota_despacho; ?>';


    $.confirm({
    backgroundDismiss: false,
    backgroundDismissAnimation: 'glow',
      theme: 'material', 
     title: 'Nota de despacho',
     content: '¿Esta seguro que deseas confirmar este despacho?.',
        type: 'blue',
    animation: 'opacity',
    autoClose: 'no|10000',
    escapeKey: 'no',
    buttons: {
        si: function () {

      $.ajax({
        method: "POST",
        data: {'co_nota_despacho':co_nota_despacho, 'co_almacen':co_almacen},
        url: "<?php echo site_url('despachos/confirmar_despacho_proveedor') ?>",
        beforeSend: function(){  },
                     }).done(function( data ) { 

                      var obj = JSON.parse(data);

                      if (obj.error > 0)

                        {

                         notificacion_toas('error','Nota de despacho',obj.message);
                        return;

                        }else{


                         $('#ajax_remote').modal('hide');
                          location.reload();


                        }

                      
   
                      }).fail(function(){

                    alert('Fallo');


                      }); 
           
      


        },
        no: function () {


           
        },
  
    }
});


}


                                   </script>
