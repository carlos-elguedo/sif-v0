$(document).ready(function(){//Cuando el documento ya se haya cargado
    
    var cajaGuardar = 2;//Variable para controlar el autoguardado    
	var dios = true;//Variable controladora


	$("#boton").click(function(evento){
		evento.preventDefault();
	    //alert("Presiono iniciar secion");
        var correo = $('input#no').val();
        var pass   = $('input#pa').val();
	    //alert(" pass  "+ pass);
		if(correo!== "" && pass !== ""){
			if(dios===true){
                $("#mensaje2").append("<div class='modal1'><div class='center1'> <center> <img src='assets/img/gif-load.gif'></center><br><button id = 'cancelar'>Cancelar</button></div></div>");
                $("#cancelar").click(function(eve){
                    //alert("Preiono cancelar");
                    location.href = "index.html";
                });
                
                //Enviamos los datos al servidor mediante post
                $.post("http://localhost/SIF/servidor/logica/inicioSesion.php",{correo : correo, pass : pass},function(respuesta){
                    //alert("Envio el post.");
                    
                    //Para manejar el guardado de datos, verificamos si el usuario marco la casilla
                    if(cajaGuardar % 2 === 0){
                        //No esta seleccionada
                        //alert("No esta seleccionada");
                        localStorage.setItem("sav", "0");
                    }else{
                        //Si esta seleccionada
                        //alert("Si esta seleccionada");
                        guardarDatos(correo, pass);
                    }

                    //Con esta linea de codigo, tomamos la respuesta del servidor y la colocamos en el documento para realizar las acciones 
                    $("#mensaje").append(respuesta);
                    //alert(respuesta);
                });//fin del post
            }
		}else{
            alert("Llena los datos, por favor");
        }
    });//fin del boton login
	


    //------------------------------------------registro-----------------------------------
    $("#botonRegistro").click(function(evento){
        evento.preventDefault();
        //alert("Presiono el boton registro");

    	var nombre  = $('input#nombre').val();//Tomamos los datos desde el formulario registro
    	var fecha_n = $('input#edad').val();
        var email   = $('input#correo').val();
    	var pass    = $('input#pass1').val();
    	var pass2   = $('input#pass2').val();
    	var tipo   = $('#seleccionado').val();
        //alert(fecha_n);
    	if(nombre!== "" && fecha_n!== "" && email !== "" && pass !== "" && pass2!== "" && tipo !== ""){//Verificamos que no esten vacios nuevamente
		    //alert(" pass  "+ pass);
	        if(dios===true){
		        //Verificamos las contraseñas
                if(validarEmail(email) == true){
                    if(fechaCorrecta(fecha_n)){
                        if(pass === pass2){
    		                //Enviamos los datos al servidor mediante post, al archivo registro
                            $.post("http://localhost/SIF/servidor/logica/Registro.php",{nombre:nombre ,edad:fecha_n, email:email , pass:pass , tipo:tipo},function(respuesta2){
    			                //alert("Envio el post registro.");
                                
                                //Con esta linea de codigo, tomamos la respuesta del servidor y la colocamos en el documento para realizar las acciones
			                    //alert(respuesta2);
                                $("#mensaje").append(respuesta2);
    		                    });//fin del post
	    	            }else{
        			        alert("Las contraseñas no coinciden");
    		            }
                    }
                }//Fin del comprobador de correo
	        }//fin de la bandera
	    }else{
		    alert("Por favor llene todos los datos");
	    }
    
    
    });//fin del boton reistro
	
    //Metodo controlador para el manejo de las pulsasiones al boton volver, desde la parte de registro
    $("#volver_a_login").click(function(eve){
        eve.preventDefault();
        $("#Registro").fadeToggle(1000, function(){
            POSCISION = 1;
            $(".page-container").fadeToggle(1800);
        });
    });
    
    //Metodo controlador para el manejo de las pulsasiones al boton registrarse
    $("#registro").click(function(event){
        event.preventDefault();
        
        $(".page-container").fadeOut(1000, function(){
            POSCISION = 2;
            $("#Registro").show(1200);
        });
    });//fin del evento
	
    
    //Metodo controlador para el manejo de las pulsasiones al checkButon guardar datos
    $("#guardarDatos").change(function(eve){
        eve.preventDefault();
        cajaGuardar++;
    });

    //Lanzamos esta funcion para que configure la aplaicacion
    configurar();



});//fin del ready

function validarEmail( email ) {
    var ret = false;
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) ){
        alert("Error: La dirección de correo " + email + " es incorrecta.");
        ret = false;
    }else{
        ret = true;
        //alert("Email correcto");
    }
    return ret;
}

function fechaCorrecta(fecha){
    var ret = false;

    var fechaf = fecha.split("-");
    var day = fechaf[2];
    var month = fechaf[1];
    var year = fechaf[0];
    year2 = parseInt(year);
    
    if(year2 < 1998 && year2 > 1900){
        ret = true;
        //alert("Fecha correcta: - " + year2);
    }else{
        alert("El año de la fecha es incorrecto: " + year2);
    }

    return ret;
}





//Funcion para guardar datos en la memoria del usuario
function guardarDatos(nombre, contra){
    localStorage.setItem("sav", "1");
    localStorage.setItem("usu", nombre);
    localStorage.setItem("con", contra);
}



//Funcion para configrar la aplicaion, datos guardados
function configurar(){
    //alert("Llego a configurar");
    //localStorage.clear();
    total = localStorage.length;
    //alert(total);
    
    if(total >= 1){
        for(var f = 0; f < localStorage.length; f++){
            var clave = localStorage.key(f);
            var valor = localStorage.getItem(clave);
            //alert(clave + "-<->-" + valor);
            if(clave === "sav" && valor === "1"){
                //alert("Esta guardado");
                $("#mensaje2").append("<div class='modal1'><div class='center1'> <center> <img src='assets/img/gif-load.gif'></center><br><button id = 'cancelar'>Cancelar</button></div></div>");
                var correo_usuario = "", pass_usuario = "";
                for(var i = 0; i<localStorage.length; i++){
                    var clave_2 = localStorage.key(i);
                    var valor_2 = localStorage.getItem(clave_2);
                    if(clave_2 === "usu"){correo_usuario = valor_2;}
                    if(clave_2 === "con"){pass_usuario = valor_2;}
                }
                $("#cancelar").click(function(eve){
                    //alert("Preiono cancelar");
                    localStorage.setItem("sav", "0");
                    localStorage.setItem("usu", "");
                    localStorage.setItem("con", "");
                    location.href = "index.html";
                    
                    //$('input#no').val(correo_usuario + "<--");
                    //$('input#pa').val(pass_usuario + "<--");
                });
                //alert(correo_usuario + " - " + pass_usuario)
                
                $.post("http://localhost/SIF/servidor/logica/inicioSesion.php",{correo : correo_usuario, pass : pass_usuario},function(respuesta){
                    //alert("Envio el post");
                    $("#mensaje").append(respuesta);
                });//fin del post
            }
            
        }//fin del For
    }else{
        //alert("No hay nada");
        localStorage.setItem("sav", "0");
    }
}