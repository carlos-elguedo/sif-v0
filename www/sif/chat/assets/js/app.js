/*
 * Please see the included README.md file for license terms and conditions.
 */


// This file is a suggested starting place for your code.
// It is completely optional and not required.
// Note the reference that includes it in the index.html file.


/*jslint browser:true, devel:true, white:true, vars:true */
/*global $:false, intel:false app:false, dev:false, cordova:false */


// For improved debugging and maintenance of your app, it is highly
// recommended that you separate your JavaScript from your HTML files.
// Use the addEventListener() method to associate events with DOM elements.
// For example:

// var el ;
// el = document.getElementById("id_myButton") ;
// el.addEventListener("click", myEventHandler, false) ;



// The function below is an example of a way to "start" your app. if you convert
// your app to a Cordova app, this function will call the standard Cordova
// "hide splashscreen" function. If this is a web app that does not use Cordova
// this function is quietly ignored and does nothing.

// You can add other code to this function or add additional functions that are
// triggered by the same event. The app.Ready event used here is created by the
// init-dev.js file. It serves as a unifier for a variety of "ready" events.
// See the init-dev.js file for more details. If you prefer to use other events
// to start your app, you can use those in addition to, or instead of this event.

// NOTE: change "dev.LOG" in "init-dev.js" to "true" to enable some console.log
// messages that can help you debug app initialization issues.

function onAppReady() {
    if( navigator.splashscreen && navigator.splashscreen.hide ) {   // Cordova API detected
        navigator.splashscreen.hide() ;
    }
    /*
    //alert("Listo");
    var a = document.getElementById("panel-chat");
    var altura = a.scrollHeight;
    //alert(altura);
    a.scrollTop = altura;
    //var largoTotal = $(document).height();
    //alert(largoTotal);
    var lar = window.innerHeight;
    var ancho = window.innerWidth;
    alert(lar);
    a.style.maxHeight =(lar-115)+'px';
    //a.style.maxWidth = ancho+'px';
    window.body.style.height =(lar-130)+'px';
    window.body.style.borderTop = 0+'px';
    */
    //var boton_enviar_mensaje = document.getElementById("enviar_mensaje");
    
    //boton_enviar_mensaje.addEventListener('click', enviarMensaje, false);
}
function enviarMensaje(){
    alert("Presiono enviar");
}

document.addEventListener("app.Ready", onAppReady, false) ;