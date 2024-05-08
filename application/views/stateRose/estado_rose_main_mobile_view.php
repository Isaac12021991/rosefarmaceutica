                 <script src="<?php echo base_url(); ?>assets/plugins/custom/zuck.js-master/src/zuck.js"></script>


                <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/zuck.js-master/src/zuck.css">
                 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/zuck.js-master/dist/skins/vemdezap.css">
                 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/custom/zuck.js-master/dist/skins/snapgram.css">


    <div class="d-flex flex-column flex-root animsition" >
      <!--begin::Error-->
      <div class="d-flex flex-row-fluid flex-column bgi-size-cover bgi-position-center bgi-no-repeat p-0" style="background-color:white;">
        <!--begin::Content-->
                   
                        <div class="col-12">
                  
              
                            <div class="form-group row">

                              <div class="col-12 mt-0">
                                    <?php if($mi_estado->num_rows() > 0): ?>
                                    <div class="row">
                                        <div class="col-9">
                                      <div id="mi_stories" class="storiesWrapper p-0"></div>
                                      </div>
                                      <div class="col-3 text-right my-auto">
                                        <a href="<?php echo site_url(); ?>estado_rose/mi_historias_activas" class="btn btn-link-dark font-weight-bold mr-4"><span class="flaticon-more-v2 icon-1x"></span></a>
                                      </div>


                                      </div>

                                    <?php endif; ?>
                                        


                                    <div id="stories" class="storiesWrapper"></div>

                                     <p align="center" class="bg-gray-200 font-weight-bold">Visto</p>

                                     <div id="stories_visto" class="storiesWrapper"></div>



                              </div>
                            </div>
      
    

                          
                        </div>
                      

        <!--end::Content-->
      </div>
      <!--end::Error-->
    </div>


<script type="text/javascript">

    actualizar_estado_ajax()

    function add() {

stories.removeItem('isaac666', 'https://raw.githubusercontent.com/ramon82/assets/master/zuck.js/stories/1.jpg');

return


    }

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
        autoFullScreen: true, // enables fullscreen on mobile browsers
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
        autoFullScreen: true, // enables fullscreen on mobile browsers
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
        autoFullScreen: true, // enables fullscreen on mobile browsers
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

//   setInterval(actualizar_estado_ajax,1000);



</script>