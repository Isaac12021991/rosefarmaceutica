<?php header('Access-Control-Allow-Origin: *'); ?>





                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <!--begin::Subheader-->
                        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
                            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                                <!--begin::Info-->
                                <!--begin::Info-->
                                <div class="d-flex align-items-center flex-wrap mr-2">
                                                                        <a href="javascript:window.history.back();"class="btn btn-clean btn-xs p-2 mr-2 d-block d-md-none">
                                    <i class="fas fa-arrow-left"></i> 
                                    </a>

                                    <!--begin::Actions-->
                                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Prueba</h5>
                                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                            <li class="breadcrumb-item text-muted">
                                                <a href="javascript:" class="text-muted">Crear</a>
                                            </li>
                                        </ul>


        
                                </div>
                                <!--end::Info-->
                                <!--begin::Toolbar-->
                                <div class="d-flex align-items-center">

        
                                    <!--end::Actions-->
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

        

   
                                <div class="col-lg-12 pt-lg-0 pl-lg-4 pr-lg-4 pt-2 pl-0 pr-0">


                                                                            <div class="card card-custom card-stretch">
                                            <!--begin::Header-->
                                            <div class="card-header py-3">
                                                <div class="card-title align-items-start flex-column">
                                                    <h3 class="card-label font-weight-bolder text-dark">Prueba</h3>
                                                    <span class="text-muted font-weight-bold font-size-sm mt-1"></span>
                                                </div>
                                                <div class="card-toolbar">

                                                
      
                                                </div>
                                            </div>
                                            <!--end::Header-->

                                                <!--begin::Body-->
                                                <div class="card-body">

                                                    
                                                <div class="row">

                                                 <div class="col-lg-6">


                                               <div class="form-group row mb-2">
                                               <label  class="col-3 col-form-label"><span class="font-red-mint"> * </span>Foto</label>
                                               <div class="col-9">
                                                                                         
                                            <input type="file" accept="image/*" capture="camera" id="camera" />
                                               </div>
                                              </div>






                                          </div>

                                           <div class="col-lg-6">

                                                 <img id="photo" class="photo" style="width:100px; height:100px;">

                                                 <input type="text" name="mensaje" id="mensaje" class="form-control"/>


                                           </div>


                                           </div>

                                           <button onclick="enviar()" class="btn btn-clean">Enviar</button>





                                                </div>
                                                <!--end::Body-->
                                            
                                            <!--end::Form-->
                                        </div>





        

                                </div>






                            </div>

                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Entry-->
                    </div>


    <div class="modal fade"  id="ajax_remote" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">
            <h3 align="center" class="text-dark">Cargando...</h3>
        </div>
    </div>
</div>

 <script src="<?php echo base_url(); ?>assets/plugins/custom/artyom/artyom.js"></script>

 <script src="<?php echo base_url(); ?>assets/plugins/custom/artyom/artyom.window.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script type="text/javascript">

// Create a variable that stores your instance
const artyom = new Artyom();

// Or if you are using it in the browser
// var artyom = new Artyom();// or `new window.Artyom()`

// Add command (Short code artisan way)
artyom.on(['Good morning','Good afternoon']).then((i) => {
    switch (i) {
        case 0:
            artyom.say("Good morning, how are you?");
        break;
        case 1:
            artyom.say("Good afternoon, how are you?");
        break;            
    }
});

// Smart command (Short code artisan way), set the second parameter of .on to true
artyom.on(['Repeat after me *'] , true).then((i,wildcard) => {
    artyom.say("You've said : " + wildcard);
});

// or add some commandsDemostrations in the normal way
artyom.addCommands([
    {
        indexes: ['Hello','Hi','is someone there'],
        action: (i) => {
            artyom.say("Hello, it's me");
        }
    },
    {
        indexes: ['Repeat after me *'],
        smart:true,
        action: (i,wildcard) => {
            artyom.say("You've said : "+ wildcard);
        }
    },
    // The smart commands support regular expressions
    {
        indexes: [/Good Morning/i],
        smart:true,
        action: (i,wildcard) => {
            artyom.say("You've said : "+ wildcard);
        }
    },
    {
        indexes: ['shut down yourself'],
        action: (i,wildcard) => {
            artyom.fatality().then(() => {
                console.log("Artyom succesfully stopped");
            });
        }
    },
]);

// Start the commands !
artyom.initialize({
    lang: "en-GB", // GreatBritain english
    continuous: true, // Listen forever
    soundex: true,// Use the soundex algorithm to increase accuracy
    debug: true, // Show messages in the console
    executionKeyword: "and do it now",
    listen: true, // Start to listen commands !

    // If providen, you can only trigger a command if you say its name
    // e.g to trigger Good Morning, you need to say "Jarvis Good Morning"
    name: "Jarvis" 
}).then(() => {
    console.log("Artyom has been succesfully initialized");
}).catch((err) => {
    console.error("Artyom couldn't be initialized: ", err);
});

/**
 * To speech text
 */
artyom.say("Hello, this is a demo text. The next text will be spoken in Spanish",{
    onStart: () => {
        console.log("Reading ...");
    },
    onEnd: () => {
        console.log("No more text to talk");

        // Force the language of a single speechSynthesis
        artyom.say("Hola, esto está en Español", {
            lang:"es-ES"
        });
    }
});




    const photo = document.querySelector('#photo');
  const camera = document.querySelector('#camera');
  camera.addEventListener('change', function(e) {
    photo.src = URL.createObjectURL(e.target.files[0]);
  });


      $(document).ready(function(){



                 }); // Fin ready



 // const socket = io("http://rosefarmaceutica.com/node/");
 

 
 var socket = io.connect('https://nodejs.rosefarmaceutica.com', {secure: true, query: {part:19255, use:71}});
 
 console.log(socket);
 


// DOM elements
let message = document.getElementById('mensaje');



function enviar()
{
    

var i = socket.emit('message', {
    message: message.value,
    user: 'Isaac'
  });
  
  console.log(i);


}

socket.on('message', function(data) {

    console.log('El usuario ' + data.user + ' ha mandado el mensaje '+ data.message);
    
    console.log(data);

});

socket.on('users connected', function(data) {

    console.log(data);

});


socket.on('nota', function(data) {

    console.log(data);

});



socket.on('particular', function(data) {

    console.log(data);

});

   
   
                                
</script>
