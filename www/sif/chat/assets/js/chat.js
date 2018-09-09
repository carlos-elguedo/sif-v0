var NUMERO_CHAT = 0;

$(document).ready(function(){
    //alert("Todo listo")
    
    
    //Tomamos el numero en el chat desde la url
    var numero = $_GET("num");
    //alert(numero);
    NUMERO_CHAT = numero;
    
    //Traemos el titulo del chat
    traerDatos(numero);
    
    cargarMensajes();
    $.ajaxSetup({"cache": false});
    setInterval("cargarMensajes()", 10000);
    var alto = $(window).height();
    var contador_filas_facuras = 2;
    

    $("#enviar_mensaje").click(function(eve){
        eve.preventDefault();
        //alert("Dio enviar: "+$("#mensaje_escrito").val());
        if($("#mensaje_escrito").val() !== ""){
            //alert("se prepara...");
            var mensaje = $("#mensaje_escrito").val();
            
            $.ajax({
                url: "http://localhost/SIF/servidor/logica/scripts/enviarMensaje.php",//url del servidor
                type: "post",
                data:{tipo : "2", mensaje: mensaje,  NUMERO_CHAT: NUMERO_CHAT}
            }).done(function(res){//cuando ya este listo
                //$("#cajaMensajes").append(res);
                //alert("Mando el mensaje");
                if(res === "OK"){
                    //alert("Mensaje enviado");
                    $("#mensaje_escrito").val("");
                    $("#mensaje_escrito").focus();
                    //alert("nada que enviar");
                }else{
                    //alert(res);
                }
            });//fin del done
        }else{
           //si el no ha escrito nada
            alert("Escribe algo");
        }
        
    });
    
    
    $("#nueva_fila_factura").click(function(eve){
       eve.preventDefault();
       //alert("Nueva fila");
       
       if(contador_filas_facuras == 2){
            $("#fila2").fadeIn(1000);
            contador_filas_facuras++;
       }else if(contador_filas_facuras == 3){
            $("#fila3").fadeIn(1000);contador_filas_facuras++;        
       }else if(contador_filas_facuras == 4){
            $("#fila4").fadeIn(1000);contador_filas_facuras++;
       }else if(contador_filas_facuras == 5){
            $("#fila5").fadeIn(1000);contador_filas_facuras++;
       }else if(contador_filas_facuras == 6){
            $("#fila6").fadeIn(1000);contador_filas_facuras++;
       }else if(contador_filas_facuras == 7){
            $("#fila7").fadeIn(1000);contador_filas_facuras++;
       }else if(contador_filas_facuras == 8){
            $("#fila8").fadeIn(1000);contador_filas_facuras++;
       }else if(contador_filas_facuras == 9){
            $("#fila9").fadeIn(1000);contador_filas_facuras++;
       }else if(contador_filas_facuras == 10){
            $("#fila10").fadeIn(1000);contador_filas_facuras++;
       }else if (contador_filas_facuras > 10){
            alert("Son maximos 10 filas...\n llena esta y luego envias otra :=)")
       }
       
       
    });
    
    $("#calcular_total").click(function(eve){
       eve.preventDefault();
       //alert("Calcular total");
       
       if(contador_filas_facuras == 2){
            var cant1 = $("#cant1").val();var valor1 = $("#valor1").val();
            if(cant1 != "" && valor1 != ""){
                var total = valor1 * cant1;$("#total").html("$ " + total);
            }
       }else if(contador_filas_facuras == 3){
            var cant1 = $("#cant1").val(); var cant2 = $("#cant2").val();
            var valor1 = $("#valor1").val(); var valor2 = $("#valor2").val();
            if(cant1 != "" && valor1 != "" && cant2 != "" && valor2 != ""){
                var total = (valor1 * cant1) + (valor2 * cant2);
                $("#total").html("$ " + total);
            }       
       }else if(contador_filas_facuras == 4){
            var cant1 = $("#cant1").val(); var cant2 = $("#cant2").val(); var cant3 = $("#cant3").val();
            var valor1 = $("#valor1").val(); var valor2 = $("#valor2").val(); var valor3 = $("#valor3").val();
            if(cant1 != "" && valor1 != "" && cant2 != "" && valor2 != "" && cant3 != "" && valor3 != ""){
                var total = (valor1 * cant1) + (valor2 * cant2) + (valor3 * cant3);
                $("#total").html("$ " + total);
            }
       }else if(contador_filas_facuras == 5){
            var cant1 = $("#cant1").val(); var cant2 = $("#cant2").val(); var cant3 = $("#cant3").val(); var cant4 = $("#cant4").val();
            var valor1 = $("#valor1").val(); var valor2 = $("#valor2").val(); var valor3 = $("#valor3").val(); var valor4 = $("#valor4").val();
            if(cant1 != "" && valor1 != "" && cant2 != "" && valor2 != "" && cant3 != "" && valor3 != "" && cant4 != "" && valor4 != ""){
                var total = (valor1 * cant1) + (valor2 * cant2) + (valor3 * cant3) + (valor4 * cant4);
                $("#total").html("$ " + total);
            }
       }else if(contador_filas_facuras == 6){
            var cant1 = $("#cant1").val(); var cant2 = $("#cant2").val(); var cant3 = $("#cant3").val(); var cant4 = $("#cant4").val(); var cant5 = $("#cant5").val();
            var valor1 = $("#valor1").val(); var valor2 = $("#valor2").val(); var valor3 = $("#valor3").val(); var valor4 = $("#valor4").val(); var valor5 = $("#valor5").val();
            if(cant1 != "" && valor1 != "" && cant2 != "" && valor2 != "" && cant3 != "" && valor3 != "" && cant4 != "" && valor4 != "" && cant5 != "" && valor5 != ""){
                var total = (valor1 * cant1) + (valor2 * cant2) + (valor3 * cant3) + (valor4 * cant4) + (valor5 * cant5);
                $("#total").html("$ " + total);
            }
       }else if(contador_filas_facuras == 7){
            var cant1 = $("#cant1").val(); var cant2 = $("#cant2").val(); var cant3 = $("#cant3").val(); var cant4 = $("#cant4").val(); var cant5 = $("#cant5").val(); var cant6 = $("#cant6").val();
            var valor1 = $("#valor1").val(); var valor2 = $("#valor2").val(); var valor3 = $("#valor3").val(); var valor4 = $("#valor4").val(); var valor5 = $("#valor5").val(); var valor6 = $("#valor6").val();
            if(cant1 != "" && valor1 != "" && cant2 != "" && valor2 != "" && cant3 != "" && valor3 != "" && cant4 != "" && valor4 != "" && cant5 != "" && valor5 != "" && cant6 != "" && valor6 != ""){
                var total = (valor1 * cant1) + (valor2 * cant2) + (valor3 * cant3) + (valor4 * cant4) + (valor5 * cant5) + (valor6 * cant6);
                $("#total").html("$ " + total);
            }
       }else if(contador_filas_facuras == 8){
            var cant1 = $("#cant1").val(); var cant2 = $("#cant2").val(); var cant3 = $("#cant3").val(); var cant4 = $("#cant4").val(); var cant5 = $("#cant5").val(); var cant6 = $("#cant6").val(); var cant7 = $("#cant7").val();
            var valor1 = $("#valor1").val(); var valor2 = $("#valor2").val(); var valor3 = $("#valor3").val(); var valor4 = $("#valor4").val(); var valor5 = $("#valor5").val(); var valor6 = $("#valor6").val(); var valor7 = $("#valor7").val();
            if(cant1 != "" && valor1 != "" && cant2 != "" && valor2 != "" && cant3 != "" && valor3 != "" && cant4 != "" && valor4 != "" && cant5 != "" && valor5 != "" && cant6 != "" && valor6 != "" && cant7 != "" && valor7 != ""){
                var total = (valor1 * cant1) + (valor2 * cant2) + (valor3 * cant3) + (valor4 * cant4) + (valor5 * cant5) + (valor6 * cant6) + (valor7 * cant7);
                $("#total").html("$ " + total);
            }
       }else if(contador_filas_facuras == 9){
            var cant1 = $("#cant1").val(); var cant2 = $("#cant2").val(); var cant3 = $("#cant3").val(); var cant4 = $("#cant4").val(); var cant5 = $("#cant5").val(); var cant6 = $("#cant6").val(); var cant7 = $("#cant7").val(); var cant8 = $("#cant8").val();
            var valor1 = $("#valor1").val(); var valor2 = $("#valor2").val(); var valor3 = $("#valor3").val(); var valor4 = $("#valor4").val(); var valor5 = $("#valor5").val(); var valor6 = $("#valor6").val(); var valor7 = $("#valor7").val(); var valor8 = $("#valor8").val();
            if(cant1 != "" && valor1 != "" && cant2 != "" && valor2 != "" && cant3 != "" && valor3 != "" && cant4 != "" && valor4 != "" && cant5 != "" && valor5 != "" && cant6 != "" && valor6 != "" && cant7 != "" && valor7 != "" && cant8 != "" && valor8 != ""){
                var total = (valor1 * cant1) + (valor2 * cant2) + (valor3 * cant3) + (valor4 * cant4) + (valor5 * cant5) + (valor6 * cant6) + (valor7 * cant7) + (valor8 * cant8);
                $("#total").html("$ " + total);
            }
       }else if(contador_filas_facuras == 10){
            var cant1 = $("#cant1").val(); var cant2 = $("#cant2").val(); var cant3 = $("#cant3").val(); var cant4 = $("#cant4").val(); var cant5 = $("#cant5").val(); var cant6 = $("#cant6").val(); var cant7 = $("#cant7").val(); var cant8 = $("#cant8").val(); var cant9 = $("#cant9").val();
            var valor1 = $("#valor1").val(); var valor2 = $("#valor2").val(); var valor3 = $("#valor3").val(); var valor4 = $("#valor4").val(); var valor5 = $("#valor5").val(); var valor6 = $("#valor6").val(); var valor7 = $("#valor7").val(); var valor8 = $("#valor8").val(); var valor9 = $("#valor9").val();
            if(cant1 != "" && valor1 != "" && cant2 != "" && valor2 != "" && cant3 != "" && valor3 != "" && cant4 != "" && valor4 != "" && cant5 != "" && valor5 != "" && cant6 != "" && valor6 != "" && cant7 != "" && valor7 != "" && cant8 != "" && valor8 != "" && cant9 != "" && valor9 != ""){
                var total = (valor1 * cant1) + (valor2 * cant2) + (valor3 * cant3) + (valor4 * cant4) + (valor5 * cant5) + (valor6 * cant6) + (valor7 * cant7) + (valor8 * cant8) + (valor9 * cant9);
                $("#total").html("$ " + total);
            }
       }else if(contador_filas_facuras == 11){
            var cant1 = $("#cant1").val(); var cant2 = $("#cant2").val(); var cant3 = $("#cant3").val(); var cant4 = $("#cant4").val(); var cant5 = $("#cant5").val(); var cant6 = $("#cant6").val(); var cant7 = $("#cant7").val(); var cant8 = $("#cant8").val(); var cant9 = $("#cant9").val(); var cant10 = $("#cant10").val();
            var valor1 = $("#valor1").val(); var valor2 = $("#valor2").val(); var valor3 = $("#valor3").val(); var valor4 = $("#valor4").val(); var valor5 = $("#valor5").val(); var valor6 = $("#valor6").val(); var valor7 = $("#valor7").val(); var valor8 = $("#valor8").val(); var valor9 = $("#valor9").val(); var valor10 = $("#valor10").val();
            if(cant1 != "" && valor1 != "" && cant2 != "" && valor2 != "" && cant3 != "" && valor3 != "" && cant4 != "" && valor4 != "" && cant5 != "" && valor5 != "" && cant6 != "" && valor6 != "" && cant7 != "" && valor7 != "" && cant8 != "" && valor8 != "" && cant9 != "" && valor9 != "" && cant10 != "" && valor10 != ""){
                var total = (valor1 * cant1) + (valor2 * cant2) + (valor3 * cant3) + (valor4 * cant4) + (valor5 * cant5) + (valor6 * cant6) + (valor7 * cant7) + (valor8 * cant8) + (valor9 * cant9) + (valor10 * cant10);
                $("#total").html("$ " + total);
            }
       }
       //alert("Contador: " + contador_filas_facuras);
    });
    
    $("#eliminar_fila_factura").click(function(eve){
       eve.preventDefault();
       //alert("Eliminar fila");
       
       if(contador_filas_facuras == 2){
            //$("#fila2").fadeIn(1000);
            //contador_filas_facuras++;
            alert("No se pueden eliminar mas filas");
       }else if(contador_filas_facuras == 3){
            $("#fila2").fadeOut(500);contador_filas_facuras--;        
       }else if(contador_filas_facuras == 4){
            $("#fila3").fadeOut(500);contador_filas_facuras--;
       }else if(contador_filas_facuras == 5){
            $("#fila4").fadeOut(500);contador_filas_facuras--;
       }else if(contador_filas_facuras == 6){
            $("#fila5").fadeOut(500);contador_filas_facuras--;
       }else if(contador_filas_facuras == 7){
            $("#fila6").fadeOut(500);contador_filas_facuras--;
       }else if(contador_filas_facuras == 8){
            $("#fila7").fadeOut(500);contador_filas_facuras--;
       }else if(contador_filas_facuras == 9){
            $("#fila8").fadeOut(500);contador_filas_facuras--;
       }else if(contador_filas_facuras == 10){
            $("#fila9").fadeOut(500);contador_filas_facuras--;
       }else if(contador_filas_facuras == 11){
            $("#fila10").fadeOut(500);contador_filas_facuras--;
       }else if (contador_filas_facuras > 11){
            //alert("jum... :V")
       }
    });   
    
    
    $("#form_nota").submit(function(eve){
        eve.preventDefault();
        //alert("enviar Nota");
        
        var t = $("#nota_titulo").val();
        var n = $("#nota_texto").val();
        var direccion = "http://localhost/SIF/servidor/logica/scripts/enviarMensaje.php";
        
        if(t != "" && n != ""){
            $.ajax({
                type:"POST",
                url:direccion,
                data:{tipo : "3", t:t, n:n, f: 1, nt : 1, NUMERO_CHAT : NUMERO_CHAT}
            }).done(function(info){
                //alert(info);
                
            });
        }else{
            alert("Llena los campos");
        }
        
        
            
    });
    
    $("#carga_img").submit(function(eve){
                                eve.preventDefault();
                                //alert("Enviar la img");
                                if($("input#img").val() !== "" && $("input#img").val() !== null){//verificamos que haya ingresado una imagen
                                    var f = $(this);
                                    var formData = new FormData(document.getElementById("carga_img"));//obtenemos una referencia al formulario con formData
                                    formData.append("img", "valor");
                                    //formData.append(f.attr("name"), $(this)[0].files[0]);
                                    $.ajax({//enviamos la imagen al servidor por ajax
                                        url: "http://localhost/SIF/servidor/logica/scripts/enviarImagenChat.php?NUMERO_CHAT="+NUMERO_CHAT,//url del servidor
                                        type: "post",
                                        dataType: "html",
                                        data: formData,
                                        cache: false,
                                        contentType: false,
                                        processData: false
                                    }).done(function(res){//cuando ya este listo
                                        //alert("Imagen enviada...");
                                    });//fin del done
                                }//fin del diferente            
                            });//fin del enviar imagen


    $("#form_factura").submit(function(eve){
        eve.preventDefault();
        //alert("Formulario: " + $("#total").html() + "<--");
        //alert("Contador: " + contador_filas_facuras);
        if($("#total").html() == ""){
            $("#calcular_total").click();
        }
        //alert("total: " + $("#total").html() + "<--");
        if($("#total").html() == ""){
            alert("No has llenado algunos campos...");
        }else{
            switch(contador_filas_facuras){
                case 1:
                    //alert("Entro en el caso uno");
                    break;
                case 2:
                    //alert("Entro en el caso 2");
                    var cantidad = $('#cant1').val();
                    var descripcion = $('#desc1').val();
                    var valor = $('#valor1').val();
                    var total = $("#total").html();
                    //alert(cantidad +" <--> "+descripcion + " -- "+ valor);
                    var direccion = "http://localhost/SIF/servidor/logica/scripts/enviarMensaje.php";
                    
                    $.ajax({
                        type:"POST",
                        url:direccion,
                        data:{tipo : "4", c:cantidad, d:descripcion, v:valor, t:total, f: contador_filas_facuras, NUMERO_CHAT : NUMERO_CHAT}
                    }).done(function(info){
                        //alert(info);
                    });
                    
                    break;
                case 3:
                    var cantidad = new Array($('#cant1').val(), $('#cant2').val());
                    var descripcion = new Array($('#desc1').val(), $('#desc2').val());
                    var valor = new Array($('#valor1').val(), $('#valor2').val());
                    var total = $("#total").html();
                    //alert(cantidad +" <--> "+descripcion + " -- "+ valor);
                    var direccion = "http://localhost/SIF/servidor/logica/scripts/enviarMensaje.php";
                    
                    $.ajax({
                        type:"POST",
                        url:direccion,
                        data:{tipo : "4", c:cantidad, d:descripcion, v:valor, t:total, f: contador_filas_facuras, NUMERO_CHAT : NUMERO_CHAT}
                    }).done(function(info){
                        //alert(info);
                    });
                    
                    break;
                case 4:
                    var cantidad = new Array($('#cant1').val(), $('#cant2').val(), $('#cant3').val() );
                    var descripcion = new Array($('#desc1').val(), $('#desc2').val(), $('#desc3').val());
                    var valor = new Array($('#valor1').val(), $('#valor2').val(), $('#valor3').val());
                    var total = $("#total").html();
                    //alert(cantidad +" <--> "+descripcion + " -- "+ valor);
                    var direccion = "http://localhost/SIF/servidor/logica/scripts/enviarMensaje.php";
                    
                    $.ajax({
                        type:"POST",
                        url:direccion,
                        data:{tipo : "4", c:cantidad, d:descripcion, v:valor, t:total, f: contador_filas_facuras, NUMERO_CHAT : NUMERO_CHAT}
                    }).done(function(info){
                        //alert(info);
                    });
                    
                    break;
                case 5:
                    var cantidad = new Array($('#cant1').val(), $('#cant2').val(), $('#cant3').val(), $('#cant4').val());
                    var descripcion = new Array($('#desc1').val(), $('#desc2').val(), $('#desc3').val(), $('#desc4').val());
                    var valor = new Array($('#valor1').val(), $('#valor2').val(), $('#valor3').val(), $('#valor4').val());
                    var total = $("#total").html();
                    //alert(cantidad +" <--> "+descripcion + " -- "+ valor);
                    var direccion = "http://localhost/SIF/servidor/logica/scripts/enviarMensaje.php";
                    
                    $.ajax({
                        type:"POST",
                        url:direccion,
                        data:{tipo : "4", c:cantidad, d:descripcion, v:valor, t:total, f: contador_filas_facuras, NUMERO_CHAT : NUMERO_CHAT}
                    }).done(function(info){
                        //alert(info);
                    });
                    
                    break;
                case 6:
                    var cantidad = new Array($('#cant1').val(), $('#cant2').val(), $('#cant3').val(), $('#cant4').val(), $('#cant5').val());
                    var descripcion = new Array($('#desc1').val(), $('#desc2').val(), $('#desc3').val(), $('#desc4').val(), $('#desc5').val());
                    var valor = new Array($('#valor1').val(), $('#valor2').val(), $('#valor3').val(), $('#valor4').val(), $('#valor5').val());
                    var total = $("#total").html();
                    //alert(cantidad +" <--> "+descripcion + " -- "+ valor);
                    var direccion = "http://localhost/SIF/servidor/logica/scripts/enviarMensaje.php";
                    
                    $.ajax({
                        type:"POST",
                        url:direccion,
                        data:{tipo : "4", c:cantidad, d:descripcion, v:valor, t:total, f: contador_filas_facuras, NUMERO_CHAT : NUMERO_CHAT}
                    }).done(function(info){
                        //alert(info);
                    });
                    
                    break;
                case 7:
                    var cantidad = new Array($('#cant1').val(), $('#cant2').val(), $('#cant3').val(), $('#cant4').val(), $('#cant5').val(), $('#cant6').val());
                    var descripcion = new Array($('#desc1').val(), $('#desc2').val(), $('#desc3').val(), $('#desc4').val(), $('#desc5').val(), $('#desc6').val());
                    var valor = new Array($('#valor1').val(), $('#valor2').val(), $('#valor3').val(), $('#valor4').val(), $('#valor5').val(), $('#valor6').val());
                    var total = $("#total").html();
                    //alert(cantidad +" <--> "+descripcion + " -- "+ valor);
                    var direccion = "http://localhost/SIF/servidor/logica/scripts/enviarMensaje.php";
                    
                    $.ajax({
                        type:"POST",
                        url:direccion,
                        data:{tipo : "4", c:cantidad, d:descripcion, v:valor, t:total, f: contador_filas_facuras, NUMERO_CHAT : NUMERO_CHAT}
                    }).done(function(info){
                        //alert(info);
                    });
                    
                    break;
                case 8:
                    var cantidad = new Array($('#cant1').val(), $('#cant2').val(), $('#cant3').val(), $('#cant4').val(), $('#cant5').val(), $('#cant6').val(), $('#cant7').val());
                    var descripcion = new Array($('#desc1').val(), $('#desc2').val(), $('#desc3').val(), $('#desc4').val(), $('#desc5').val(), $('#desc6').val(), $('#desc7').val());
                    var valor = new Array($('#valor1').val(), $('#valor2').val(), $('#valor3').val(), $('#valor4').val(), $('#valor5').val(), $('#valor6').val(), $('#valor7').val());
                    var total = $("#total").html();
                    //alert(cantidad +" <--> "+descripcion + " -- "+ valor);
                    var direccion = "http://localhost/SIF/servidor/logica/scripts/enviarMensaje.php";
                    
                    $.ajax({
                        type:"POST",
                        url:direccion,
                        data:{tipo : "4", c:cantidad, d:descripcion, v:valor, t:total, f: contador_filas_facuras, NUMERO_CHAT : NUMERO_CHAT}
                    }).done(function(info){
                        //alert(info);
                    });
                    
                    break;
                case 9:
                    var cantidad = new Array($('#cant1').val(), $('#cant2').val(), $('#cant3').val(), $('#cant4').val(), $('#cant5').val(), $('#cant6').val(), $('#cant7').val(), $('#cant8').val());
                    var descripcion = new Array($('#desc1').val(), $('#desc2').val(), $('#desc3').val(), $('#desc4').val(), $('#desc5').val(), $('#desc6').val(), $('#desc7').val(), $('#desc8').val());
                    var valor = new Array($('#valor1').val(), $('#valor2').val(), $('#valor3').val(), $('#valor4').val(), $('#valor5').val(), $('#valor6').val(), $('#valor7').val(), $('#valor8').val());
                    var total = $("#total").html();
                    //alert(cantidad +" <--> "+descripcion + " -- "+ valor);
                    var direccion = "http://localhost/SIF/servidor/logica/scripts/enviarMensaje.php";
                    
                    $.ajax({
                        type:"POST",
                        url:direccion,
                        data:{tipo : "4", c:cantidad, d:descripcion, v:valor, t:total, f: contador_filas_facuras, NUMERO_CHAT : NUMERO_CHAT}
                    }).done(function(info){
                        //alert(info);
                    });
                    
                    break;
            }
        }
    });

    
    $("#si_bloquear").click(function(eve){
        eve.preventDefault();
        $.ajax({
            type:"POST",
            url:"php/bloqueo.php"
        }).done(function(info){
            //alert("act: "+ info);
            alert(info);
        });
    });

    $("#no_bloquear").click(function(eve){
        eve.preventDefault();
        //alert("Dijo que no");
    });
    
    //$("#panel-chat").append("<script>alert('Hola ke ase');</script>");
    $("#panel-chat").height(alto-140);
    //alert($("#panel-chat").height());
    
    
    
    
    
    
    
    
});//fin del ready
//--------------------------------------------------------------------------------------------------------------------------------------------------------


function $_GET(param){//funcion que devuelve el parametro recibido en la url recibiendo el nombre del parametro
                url = document.URL;
                url = String(url.match(/\?+.+/));		
                url = url.replace("?", "");		
                url = url.split("&");
                x = 0;
                while (x < url.length){
                    p = url[x].split("=");
                    if (p[0] == param){
                        return decodeURIComponent(p[1]);
                    }
                    x++;
                }
            }//FIN DE LA FUNCION

var traerDatos = function(num){
    //alert("Llego a traer datos");
    $.ajax({
        url: "http://localhost/SIF/servidor/logica/scripts/traerDatos.php",//url del servidor
        type: "post",
        data:{tipo : "1", num : num}
    }).done(function(res){//cuando ya este listo
        //alert("1: " + res);
        $("#titulo").html("");
        $("#titulo").append(res);
    });//fin del done
    
    
    
    //Traemos la opcion que difiere de los dos usuario
    $.ajax({
        url: "http://localhost/SIF/servidor/logica/scripts/traerDatos.php",//url del servidor
        type: "post",
        data:{tipo : "2", num : num}
    }).done(function(res2){//cuando ya este listo
        //alert("2: " + res2);
        $("#cotizaciones-cambTitulo").html("");
        $("#cotizaciones-cambTitulo").append(res2);
    });//fin del done
}

var cargarMensajes = function(){
    var codigo_viejo = $("#panel-chat").val(); 
    //alert(codigo_viejo);
    //alert(NUMERO_CHAT);
    
    var texto_viejo = $("#panel-chat").val(); 
    
    //alert(texto_viejo);
    $.ajax({
        type:"POST",
        data:{ NUMERO_CHAT : NUMERO_CHAT},
        url:"http://localhost/SIF/servidor/logica/scripts/conversacion.php"
    }).done(function(info){
        //alert("act: "+ info);
        $("#panel-chat").html(info);
    });
    //alert($("#panel-chat").height());
    //alert($(document).height());
    
    //if()
    var altura = $("#panel-chat").prop("scrollHeight");
    $("#panel-chat").scrollTop(altura);
    
}//fin de la funcion cargar mensajes




