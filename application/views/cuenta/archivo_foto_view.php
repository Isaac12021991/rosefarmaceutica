<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Foto de Perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">


                    <div class="row">

         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


        <form action="<?= site_url('/cuenta/ejecutar_cambiar_foto_perfil/'.$co_usuario) ?>" class="dropzone" id="mydropzone" method="post" enctype="multipart/form-data">
        <div class="fallback">
          
                <input id="file" type="file" name="file" multiple="multiple">


        </div>

         <p>Haga click aqui o simplemente arrastre la foto que desea cargar aqui</p>
          
        </form>

    </div>

    </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>

            </div>



  <script type="text/javascript">
                                            

        var drop = new Dropzone("#mydropzone",{
  parallelUploads: 3,
      autoProcessQueue: true,
      addRemoveLinks: true,
  maxFilesize: 2,
  maxFiles: 1,
          success: function (file, response) {

            toastr.success('Foto cargada', 'Exito');
             $('#ajax_remote').modal('hide');
             location.reload();
        },
         error: function (file, response) {

        toastr.error('Error al cargar', 'Error');
        }


    });


                                </script>

