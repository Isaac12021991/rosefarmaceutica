              <script type="text/javascript"> 

                var co_usuario = '<?php echo $this->ion_auth->user_id(); ?>'; 

            </script> 

             <script src="<?php echo base_url(); ?>assets/plugins/custom/zuck.js-master/src/zuck.js"></script>


                  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/zuck.js-master/src/zuck.css">
                 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/zuck.js-master/dist/skins/vemdezap.css">
                 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/zuck.js-master/dist/skins/snapgram.css">

                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Estados</h5>
                                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>




        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

           


                               <a href="<?php echo site_url("estado_rose/nuevo_estado_rose");?>" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">Crear</a>
                                
            
                                    <!--begin::Dropdown-->
                                            <!--end::Dropdown-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                        </div>
                        <!--end::Subheader-->
                        <!--begin::Entry-->
                        <div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class="container">
                                <div class="row">

                                <div class="col-lg-1">
                                    
                                    
                                </div>

                                <div class="col-lg-4">


                                    <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                    <div class="card-title">
                                    <h3 class="card-label">
                                    Estados
                                    <small></small>
                                    </h3>
                                    </div>
                                    </div>
                                    <div class="card-body">

                                    <div id="mi_stories" class="storiesWrapper p-0"></div>
                                        


                                    <div id="stories" class="storiesWrapper"></div>

                                     <p align="center" class="bg-gray-200">Visto</p>

                                     <div id="stories_visto" class="storiesWrapper"></div>


                                    </div>
                                    </div>

                                          


                            </div>

                            <div class="col-lg-6">

                                                                    <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                    <div class="card-title">
                                    <h3 class="card-label">
                                    Mis estados
                                    <small>Lista de estados</small>
                                    </h3>
                                    </div>
                                    </div>
                                    <div class="card-body">

                                                <?php if($mi_estado->num_rows() > 0): ?>

                                                    <?php foreach ($mi_estado->result() as $row): ?>
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-4">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40 symbol-light-primary mr-5 symbol-circle">
                                                        <span class="symbol-label">
                                                            <img src="<?php echo $row->preview; ?>" class="h-75 align-self-end" alt="">
                                                        </span>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                                                        <a href="javascript:" class="text-dark text-hover-primary mb-1 font-size-md"> Hace <?php echo time_stamp(date('Y-m-d H:i:s',$row->time_creado)); ?> </a>
                                                        <span class="text-muted"></span>
                                                    </div>
                                                    <!--end::Text-->

                                                    <a href="javascript:" onclick="eliminar_estado(<?php echo $row->id; ?>)">
                                                       <span class="fas fa-trash font-size-lg"></span>
                                                        </a>
                                                    <!--end::Dropdown-->
                                                </div>

                                                 <?php endforeach; ?>

                                            <?php else: ?>
                                                <h3>Sin estado</h3>
                                                <p class="lead">No tiene estados activos</p>
                                                <p class="">Los estado tienen una duración máxima de 24 horas</p>
                                                <p class="">Puede tener un máximo de 30 estado activos</p>

                                            <?php endif; ?>
                                                <!--end::Item-->

                                                <!--end::Item-->





                                    </div>
                                    </div>



                            </div>



                                <div class="col-lg-1"></div>

                            </div>

                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>


    <div class="modal fade"  id="ajax_remote" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">

        </div>
    </div>
</div>


<script type="text/javascript">

    actualizar_estado_ajax()


    var array_old_stories = '';
    var array_new_stories = '';
    var array_mi_stories = '';

    function actualizar_estado_ajax()

{

           $.ajax({
   method: "POST",
   data: {},
   url: "<?php echo site_url('estado_rose/get_estado_actual') ?>",
            }).done(function(data) { 
        obj = JSON.parse(data); 

        array_old_stories = JSON.parse(obj.array_old_stories);
         array_new_stories = JSON.parse(obj.array_new_stories);
         array_mi_stories = JSON.parse(obj.array_mi_stories);

            for (x of array_mi_stories) {

            mi_stories.update(x);


             }


         for (x of array_new_stories) {

            stories.update(x);


             }


         for (x of array_old_stories) {

                stories_visto.update(x);

             }


             }).fail(function(){
   

   
   
             }); 

}





     var stories_nuevas = [];

      var stories = new Zuck('stories', {
        id: '1',                // timeline container id or reference
        skin: 'Snapgram',      // container class
        avatars: false,         // shows user photo instead of last story item preview
        list: true,           // displays a timeline instead of carousel
        openEffect: true,      // enables effect when opening story - may decrease performance
        cubeEffect: false,
        autoFullScreen: false, // enables fullscreen on mobile browsers
        backButton: true,      // adds a back button to close the story viewer
        backNative: true,     // uses window history to enable back button on browsers/android
        localStorage: false,
        stories: stories_nuevas,
        'language': {
          'unmute': 'Touch to unmute',
          'keyboardTip': 'Press space to see next',
          'visitLink': 'Ir',
          'time': {
            'ago':'atras', 
            'hour':'hora', 
            'hours':'horas', 
            'minute':'minuto', 
            'minutes':'minutos', 
            'fromnow': 'justo ahora', 
            'seconds':'segundos', 
            'yesterday': 'ayer', 
            'tomorrow': 'mañana', 
            'days':'dias'
  }
},

      callbacks:  {
    onOpen (storyId, callback) {
      callback();  // on open story viewer
    },
        onEnd (storyId, callback) {
      callback(

       quitar(storyId)

        )


    },
     }

      });


          function quitar(idhistoria) {



           stories.remove(idhistoria);

        for (x of array_new_stories) {
        
             if(idhistoria == x.id)

          { stories_visto.update(x); 

             actualizar_stories(x, idhistoria);
            }


             }

            // body...
          }

        

             var stories_vistas = [];

      var stories_visto = new Zuck('stories_visto', {
        id: '2',                // timeline container id or reference
        skin: 'Snapgram',      // container class
        avatars: false,         // shows user photo instead of last story item preview
        list: true,           // displays a timeline instead of carousel
        openEffect: true,      // enables effect when opening story - may decrease performance
        cubeEffect: false,
        autoFullScreen: false, // enables fullscreen on mobile browsers
        backButton: true,      // adds a back button to close the story viewer
        backNative: true,     // uses window history to enable back button on browsers/android
        localStorage: true,
        stories: stories_vistas,
        'language': {
          'unmute': 'Touch to unmute',
          'keyboardTip': 'Press space to see next',
          'visitLink': 'Ir',
          'time': {
            'ago':'atras', 
            'hour':'hora', 
            'hours':'horas', 
            'minute':'minuto', 
            'minutes':'minutos', 
            'fromnow': 'justo ahora', 
            'seconds':'segundos', 
            'yesterday': 'ayer', 
            'tomorrow': 'mañana', 
            'days':'dias'
  }
},
      callbacks:  {
    onOpen (storyId, callback) {
      callback();  // on open story viewer
    },
        onEnd (storyId, callback) {
      callback(

        )


    },
     } });


                   var stories_mi_stories = [];

      var mi_stories = new Zuck('mi_stories', {
        id: '3',                // timeline container id or reference
        skin: 'vemdezap',      // container class
        avatars: false,         // shows user photo instead of last story item preview
        list: true,           // displays a timeline instead of carousel
        openEffect: true,      // enables effect when opening story - may decrease performance
        cubeEffect: false,
        autoFullScreen: false, // enables fullscreen on mobile browsers
        backButton: true,      // adds a back button to close the story viewer
        backNative: true,     // uses window history to enable back button on browsers/android
        localStorage: false,
        stories: stories_mi_stories,
        'language': {
          'unmute': 'Touch to unmute',
          'keyboardTip': 'Press space to see next',
          'visitLink': 'Ir',
          'time': {
            'ago':'atras', 
            'hour':'hora', 
            'hours':'horas', 
            'minute':'minuto', 
            'minutes':'minutos', 
            'fromnow': 'justo ahora', 
            'seconds':'segundos', 
            'yesterday': 'ayer', 
            'tomorrow': 'mañana', 
            'days':'dias'
  }
},
      callbacks:  {
    onOpen (storyId, callback) {
      callback();  // on open story viewer
    },
        onEnd (storyId, callback) {
      callback(

        )


    },
     } });


   $(document).ready(function(){

      jQuery('#ajax_remote').on('hidden.bs.modal', function (e) {
    jQuery(this).removeData('bs.modal');
    jQuery(this).find('.modal-content').html('Cargando...');
   })
   

   }); // Fin ready


   //

   function actualizar_stories(co_stories, co_usuario) {

               $.ajax({
   method: "POST",
   data: {'co_stories':co_stories, 'co_usuario':co_usuario},
   url: "<?php echo site_url('estado_rose/actualizar_estado_actual') ?>",
            }).done(function(data) { 


             }).fail(function(){ }); 
       // body...
   }
   

function eliminar_estado(co_estado_rose) {

                  $.ajax({
   method: "POST",
   data: {'co_estado_rose':co_estado_rose},
   url: "<?php echo site_url('estado_rose/eliminar_estado') ?>",
            }).done(function(data) { 

                location.reload();

             }).fail(function(){ }); 
    // body...
}




</script>
