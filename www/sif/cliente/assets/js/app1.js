function onAppReady() {
    if( navigator.splashscreen && navigator.splashscreen.hide ) {   // Cordova API detected
        navigator.splashscreen.hide() ;
    }
    
    intel.xdk.device.addVirtualPage();
    
}
document.addEventListener("intel.xdk.device.hardware.back", function() {
        //continue to grab the back button
        //alert("ok");
        
        intel.xdk.device.addVirtualPage();

document.addEventListener("intel.xdk.notification.confirm", confirm_callback, false);

        //e holds the confirm box id which is used to differentiate different confirm boxes
        //e also holds information about which button was clicked
        function confirm_callback(e){
        
        //e.id represents the id of the confirm box
        if(e.id == "confirm_box1"){
            if(e.success == true && e.answer == true){
                //first button clicked.
            }else{
                //second button clicked
            }
        }else 
            if(e.id == "confirm_box2"){
                if(e.success == true && e.answer == true){
                    //first button clicked.
                }
                else{
                    //second button clicked
                }
            }
        }

        //lets display a confirm box with id confirm_box1
        //Parameters: message in the popup, id of the confirm box, title of the popup, button 1 text and button 2 text 
        intel.xdk.notification.confirm("Cerrar la cesion?", "confirm_box1", "Salir 3333", "Si", "No");

        //lets display a confirm box with id confirm_box2
        intel.xdk.notification.confirm("Cerrar la cesion?", "confirm_box1", "Salir 4444", "Si", "No");
    
    }, false);

document.addEventListener("app.Ready", onAppReady, false) ;