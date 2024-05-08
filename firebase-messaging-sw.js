// Import and configure the Firebase SDK
// These scripts are made available when the app is served or deployed on Firebase Hosting
// If you do not serve/host your project using Firebase Hosting see https://firebase.google.com/docs/web/setup

importScripts('https://www.gstatic.com/firebasejs/8.4.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.4.1/firebase-messaging.js');

/**
 * Here is is the code snippet to initialize Firebase Messaging in the Service
 * Worker when your app is not hosted on Firebase Hosting.

 // Give the service worker access to Firebase Messaging.
 // Note that you can only use Firebase Messaging here. Other Firebase libraries
 // are not available in the service worker.
 importScripts('https://www.gstatic.com/firebasejs/8.4.1/firebase-app.js');
 importScripts('https://www.gstatic.com/firebasejs/8.4.1/firebase-messaging.js');

 // Initialize the Firebase app in the service worker by passing in
 // your app's Firebase config object.
 // https://firebase.google.com/docs/web/setup#config-object
 firebase.initializeApp({
   apiKey: 'api-key',
   authDomain: 'project-id.firebaseapp.com',
   databaseURL: 'https://project-id.firebaseio.com',
   projectId: 'project-id',
   storageBucket: 'project-id.appspot.com',
   messagingSenderId: 'sender-id',
   appId: 'app-id',
   measurementId: 'G-measurement-id',
 });

 // Retrieve an instance of Firebase Messaging so that it can handle background
 // messages.
 const messaging = firebase.messaging();
 **/


// If you would like to customize notifications that are received in the
// background (Web app is closed or not in browser focus) then you should
// implement this optional method.
// Keep in mind that FCM will still show notification messages automatically 
// and you should use data messages for custom notifications.
// For more info see: 
// https://firebase.google.com/docs/cloud-messaging/concept-options
var firebaseConfig = {
    apiKey: "AIzaSyAmLGjgUm3ha_fuFh9hnUfA4vNVhsj7id8",
    authDomain: "rose-farmaceutica.firebaseapp.com",
    projectId: "rose-farmaceutica",
    storageBucket: "rose-farmaceutica.appspot.com",
    messagingSenderId: "800137635166",
    appId: "1:800137635166:web:c44ca20344c9de56df5bcf",
    measurementId: "G-SFGB4H9LCV"
  };

  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  const messaging = firebase.messaging();

  
  messaging.onBackgroundMessage(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  const {title, ...options}=JSON.parse(payload.data.notification);
  self.registration.showNotification(title, options);

});



const CACHE_NAME = 'v1_cache_rose',
  urlsToCache = [
    './',
    'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700',
    'https://empresa.rosefarmaceutica.com/assets/plugins/custom/jquery/jquery-3.3.1.min.js',
    'https://empresa.rosefarmaceutica.com/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css',
    'https://empresa.rosefarmaceutica.com/assets/plugins/global/plugins.bundle.min.css',
    'https://empresa.rosefarmaceutica.com/assets/plugins/custom/prismjs/prismjs.bundle.css',
    'https://empresa.rosefarmaceutica.com/assets/css/style.bundle.css',
    'https://empresa.rosefarmaceutica.com/assets/css/themes/layout/header/base/light.css',
    'https://empresa.rosefarmaceutica.com/assets/css/themes/layout/header/menu/light.css',
    'https://empresa.rosefarmaceutica.com/assets/css/themes/layout/brand/dark.css',
    'https://empresa.rosefarmaceutica.com/assets/css/themes/layout/aside/dark.css',
    'https://empresa.rosefarmaceutica.com/assets/plugins/global/plugins.bundle.min.js',
    'https://empresa.rosefarmaceutica.com/assets/plugins/custom/prismjs/prismjs.bundle.min.js',
    'https://empresa.rosefarmaceutica.com/assets/js/scripts.bundle.min.js',
    'https://empresa.rosefarmaceutica.com/assets/js/pages/widgets.min.js',
    'https://empresa.rosefarmaceutica.com/assets/plugins/custom/jquery-confirm/js/jquery-confirm.js',
    'https://empresa.rosefarmaceutica.com/assets/js/pages/crud/file-upload/image-input.js',
    'https://empresa.rosefarmaceutica.com/assets/plugins/custom/push.js-master/bin/push.min.js',
    'https://empresa.rosefarmaceutica.com/assets/plugins/custom/animsition/dist/css/animsition.min.css',
    'https://empresa.rosefarmaceutica.com/assets/plugins/custom/animsition/dist/js/animsition.min.js',
    'https://empresa.rosefarmaceutica.com/assets/media/bg/bg-3.jpg',
    'https://empresa.rosefarmaceutica.com/img/logo/logo_blanco_rose_farmaceutica.png',
    'https://empresa.rosefarmaceutica.com/assets/plugins/custom/ion.sound/ion.sound.min.js'


  ]

//durante la fase de instalación, generalmente se almacena en caché los activos estáticos
self.addEventListener('install', e => {
  e.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(urlsToCache)
          .then(() => self.skipWaiting())
      })
      .catch(err => console.log('Falló registro de cache', err))
  )
})

//una vez que se instala el SW, se activa y busca los recursos para hacer que funcione sin conexión
self.addEventListener('activate', e => {
  const cacheWhitelist = [CACHE_NAME]

  e.waitUntil(
    caches.keys()
      .then(cacheNames => {
        return Promise.all(
          cacheNames.map(cacheName => {
            //Eliminamos lo que ya no se necesita en cache
            if (cacheWhitelist.indexOf(cacheName) === -1) {
              return caches.delete(cacheName)
            }
          })
        )
      })
      // Le indica al SW activar el cache actual
      .then(() => self.clients.claim())
  )
})

//cuando el navegador recupera una url
self.addEventListener('fetch', e => {
  //Responder ya sea con el objeto en caché o continuar y buscar la url real
  e.respondWith(
    caches.match(e.request)
      .then(res => {
        if (res) {
          //recuperar del cache
          return res
        }
        //recuperar de la petición a la url
        return fetch(e.request)
      })
  )
})
