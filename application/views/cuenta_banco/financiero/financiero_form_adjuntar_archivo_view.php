<link href="<?php echo base_url() ?>css/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url() ?>js/dropzone/dropzone.js"></script>

                                   <div class="portlet box bg-blue-chambray" id="box_form">
                                    <div class="portlet-title">
                                        <div class="caption">
                                        Adjuntar archivo </div>
                                                                              <div class="tools">
                                            <a href="javascript:;" data-dismiss="modal" aria-hidden="true" class="remove"> </a>
                                        </div>
                                        <div class="actions">
                                        </div>
                                    </div>

                                    <div class="portlet-body">


                                    <form action="<?= site_url('/cuenta_banco/guardar_archivo_cuenta_banco_financiero/'.$co_cuenta_banco_financiero) ?>" class="dropzone" id="mydropzone" method="post" enctype="multipart/form-data">
                                    <div class="fallback">
                                      
                                                       <input id="file" type="file" name="file" multiple="multiple">


                                    </div>

                                     <p>Haga click aqui o simplemente arrastre la foto que desea cargar aqui</p>
                                      
                                    </form>

                                                                                        <div class="modal-footer">
                                                      <a class="btn dark btn-outline" onclick="adjuntar_archivo()">Adjuntar archivo</a>
                                                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cerrar</button>
                                                    </div>

                                    </div>


                                        </div>

                                            <!-- /.modal-dialog -->


                                        <script type="text/javascript">
                                            

                                            var drop = new Dropzone("#mydropzone",{
  parallelUploads: 3,
      autoProcessQueue: false,
      addRemoveLinks: true,
  maxFilesize: 2,
  maxFiles: 1,
          success: function (file, response) {

            notificacion_toas('success','Cuentas','Archivo cargado exitosamente');
        },
         error: function (file, response) {

notificacion_toas('error','Cuentas','Error al cargar');
        }


    });


    function adjuntar_archivo()
    {
drop.processQueue();

    }
                                        </script>