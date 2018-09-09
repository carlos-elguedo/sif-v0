/*
    1 ---> Pantalla de ingreso
    2 ---> Pantalla de registro
*/

var POSCISION = 1;
function onAppReady() {
    alert("Todo listo");
    if( navigator.splashscreen && navigator.splashscreen.hide ) {   // Cordova API detected
        navigator.splashscreen.hide() ;
    }
    
    intel.xdk.device.addVirtualPage();
    
}

document.addEventListener("intel.xdk.device.hardware.back", function() {
        //continue to grab the back button
        //alert("ok");
        
        intel.xdk.device.addVirtualPage();
        
        if(POSCISION == 1){
            //alert("Esta en la principal");
//lets register the event callback which is fired when confirm box is closed. For every confirm box this same callback is fired.
document.addEventListener("intel.xdk.notification.confirm", confirm_callback, false);

//e holds the confirm box id which is used to differentiate different confirm boxes
//e also holds information about which button was clicked
function confirm_callback(e)
{
    /*
    //e.id represents the id of the confirm box
    if(e.id == "confirm_box1")
    {
        if(e.success == true && e.answer == true)
        {
            //first button clicked.
            
        }
        else
        {
            //second button clicked
        }
    }
    
    /*else */if(e.id == "confirm_box2")
    {
        if(e.success == true && e.answer == true)
        {
            //first button clicked.
        }
        else
        {
            //second button clicked
        }
    }
}
/*
//lets display a confirm box with id confirm_box1
//Parameters: message in the popup, id of the confirm box, title of the popup, button 1 text and button 2 text 
intel.xdk.notification.confirm("Seguro que quieres salir?", "confirm_box1", "SIF 1", "Si", "No");
*/
//lets display a confirm box with id confirm_box2
intel.xdk.notification.confirm("Seguro que quieres salir?", "confirm_box1", "SIF 2", "Si", "No");

            
        }else{
            //alert("Despues atras: "+ POSCISION);
            $("#Registro").fadeToggle(1000, function(){
                POSCISION = 1;
                $(".page-container").fadeToggle(1800);
            });
        }
        
    }, false);


document.addEventListener("app.Ready", onAppReady, false) ;
