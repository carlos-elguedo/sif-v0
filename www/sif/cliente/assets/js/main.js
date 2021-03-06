/*
	Prologue by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

	skel.breakpoints({
		wide: '(min-width: 961px) and (max-width: 1880px)',
		normal: '(min-width: 961px) and (max-width: 1620px)',
		narrow: '(min-width: 961px) and (max-width: 1320px)',
		narrower: '(max-width: 960px)',
		mobile: '(max-width: 736px)'
	});
	$(function() {
		var	$window = $(window),
			$body = $('body');	
	
		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');

			$window.on('load', function() {
				$body.removeClass('is-loading');
			});

		// CSS polyfills (IE<9).
			if (skel.vars.IEVersion < 9)
				$(':last-child').addClass('last-child');

		// Fix: Placeholder polyfill.
			$('form').placeholder();

		// Prioritize "important" elements on mobile.
			skel.on('+mobile -mobile', function() {
				$.prioritize(
					'.important\\28 mobile\\29',
					skel.breakpoint('mobile').active
				);
			});

		// Scrolly links.
			$('.scrolly').scrolly();

		// Nav.
			var $nav_a = $('#nav a');

			// Scrolly-fy links.
				$nav_a
					.scrolly()
					.on('click', function(e) {

						var t = $(this),
							href = t.attr('href');

						if (href[0] != '#')
							return;

						e.preventDefault();

						// Clear active and lock scrollzer until scrolling has stopped
							$nav_a
								.removeClass('active')
								.addClass('scrollzer-locked');

						// Set this link to active
							t.addClass('active');

					});

			// Initialize scrollzer.
				var ids = [];

				$nav_a.each(function() {

					var href = $(this).attr('href');

					if (href[0] != '#')
						return;

					ids.push(href.substring(1));

				});

				$.scrollzer(ids, { pad: 200, lastHack: true });

		// Header (narrower + mobile).

			// Toggle.
				$(
					'<div id="headerToggle">' +
						'<a href="#header" class="toggle"></a>' +
					'</div>'
				)
					.appendTo($body);

			// Header.
				$('#header')
					.panel({
						delay: 500,
						hideOnClick: true,
						hideOnSwipe: true,
						resetScroll: true,
						resetForms: true,
						side: 'left',
						target: $body,
						visibleClass: 'header-visible'
					});

			// Fix: Remove transitions on WP<10 (poor/buggy performance).
				if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
					$('#headerToggle, #header, #main')
						.css('transition', 'none');
//buscar...........................................---------------------------------------------------------------Metodo 1
        $("#busquedaPorPalabra").submit(function(evento){
            evento.preventDefault();//quitamos las acciones por defecto
            //alert("Presiono buscar por palabra");
            var palabra = $('input#palClave').val();//tomamos los parametros a enviar
            var metodo   = "1";
            //...........................................................alert(c + " - "+ palabra);
            //alert(" palabra clave  "+ palabra);
            //$("#mensaje2").append("<div class='modal1'><div class='center1'> <center> <img src='img/gif-load.gif'> Procesando datos...</center></div></div>");
            if(palabra!== ""){//si las palabras ingresadas no estan vacias
                $.post("http://localhost/SIF/servidor/logica/Busqueda.php",{palabra : palabra, metodo : metodo},function(respuesta){//enviamos el pos
                    //....................................................alert("Envio el post busqueda.");
                    //alert(respuesta);
                    $("#rowBusqueda").html("");//limpiamos la salida
                    $("#rowBusqueda").append(respuesta);//ponemos la respuesta en la division de busqueda
                    if(respuesta === ""){//si no devolvio nada
                        $("#rowBusqueda").html("");//limpiamos la salida
                        $("#rowBusqueda").append("<br/>");//Mostramos un mensaje de no hay nada
                        $("#rowBusqueda").append("No hay reultados.");
                    }//fin del no hay nada
                });//fin del post
            }//fin de palabra diferente a vacio
        });//fin del boton buscar1

            
            
            
            
            //Metodo 2
        $("#busquedaPorCategoria").submit(function(evento){
            evento.preventDefault();
            //alert("Quiere enviar");
            var categoria = $("select#categorias").val();
            //alert(categoria);
            if(categoria == "Escoge tu servicio"){
                alert("No has escogio nada");
            }else{
                var metodo   = "1";
                $.post("http://localhost/SIF/servidor/logica/Busqueda.php",{palabra : categoria, metodo : metodo},function(respuesta){//enviamos el pos
                    //....................................................alert("Envio el post busqueda.");
                    //alert(respuesta);
                    $("#rowBusqueda").html("");//limpiamos la salida
                    $("#rowBusqueda").append(respuesta);//ponemos la respuesta en la division de busqueda
                    if(respuesta === ""){//si no devolvio nada
                        $("#rowBusqueda").html("");//limpiamos la salida
                        $("#rowBusqueda").append("<br>");//Mostramos un mensaje de no hay nada
                        $("#rowBusqueda").append("No hay reultados.");
                    }//fin del no hay nada
                });//fin del post
            }
        });
//buscar...........................................---------------------------------------------------------------
        var editar = "";
        var editoCont = 2, editoImg = 2, edito_telefono = 2, edito_nombre = 2, edito_fechaNac = 2 ;

        
        $("#editar_nombre").click(function(evento){//evento controlador del cambiar el nombre
            if(edito_nombre%2 === 0){
                $("#cambiarNombre").show(1500);
                edito_nombre++;
            }else{
                $("#cambiarNombre").fadeOut(1000);
                edito_nombre++;
            }
        });
        
        $("#editar_telefono").click(function(evento){//evento controlador del cambiar el telefono
            if(edito_telefono%2 === 0){
                $("#cambiar_telefono").show(1500);
                edito_telefono++;
            }else{
                $("#cambiar_telefono").fadeOut(1000);
                edito_telefono++;
            }
        });
         
            
        $("#cambiarContra").click(function(evento){//evento controlador del cambiar contraseña
            if(editoCont%2 === 0){
                $("#ccontra").show(1500);
                editoCont++;
            }else{
                $("#ccontra").fadeOut(1000);
                editoCont++;
            }
        });
        
        $("#cambiarImagen").click(function(evento){//evento controlador del cambiar imagen
            if(editoImg%2 === 0){
                $("#cimagen").show(1500);
                editoImg++;
            }else{
                $("#cimagen").fadeOut(1000);
                editoImg++;
            }
        });
        
        
        $("#guardarCambios").click(function(evento){//evento para guardar los cambios
            var estado = false;
            
            if(editoImg != 2){//si se presiono cambiar imagen
                if($("input#img").val() !== "" && $("input#img").val() !== null){//verificamos que haya ingresado una imagen
                    var f = $(this);
                    var formData = new FormData(document.getElementById("form_img"));//obtenemos una referencia al formulario con formData
                    formData.append("img", "valor");
                    //formData.append(f.attr("name"), $(this)[0].files[0]);
                    $.ajax({//enviamos la imagen al servidor por ajax
                        url: "http://localhost/SIF/servidor/logica/scripts/subirImagenPerfil.php",//url del servidor
                        type: "post",
                        dataType: "html",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false
                    }).done(function(res){//cuando ya este listo
                        $("#m").html(res);//ponemos la respuesta del servidor en el documeto
                        //alert(res);
                        //alert("Se ha subido la imagen");
                            
                    });//fin del done
                }//fin del diferente
            }//fin del edito imagen
            
            
            if(edito_nombre > 2 || editoCont > 2 || edito_telefono > 2 ){
                //alert("Entro en mayor");
                var e1 = "", e2 = "",e3 = "";
                
                if($("#nombre_Nuevo").val() !== "" && $("nombre_Nuevo").val() != NaN && edito_nombre > 2){//Para el nombre
                    if($("#nombre_Nuevo").val().length > 8){
                        e1 = $("#nombre_Nuevo").val();
                        estado = true;
                    }else{
                        alert("Como minimo son 8 caracteres para tu nombre");
                        estado = false;
                    }
                    
                }
                if($("#contVieja").val() != "" && $("#contVieja").val() != NaN && $("#contNueva").val() != "" && $("#contNueva").val() != NaN && editoCont > 2){
                    e2 = $("#contNueva").val();
                    //alert(e2);
                    estado = true;
                }
                
                
                if($("#teleNuevo").val() != "" && $("#teleNuevo").val() != NaN && edito_telefono > 2){//Para el telefono
                    e3 = $("#teleNuevo").val();
                    estado = true;
                }
                
                
                if(estado == true){
                    //alert("Entro en el enviador");
                    $.ajax({
                        url: "http://localhost/SIF/servidor/logica/editarDatos.php",//url del servidor
                        type: "post",
                        data:{e1:e1, e2:e2, e3:e3, usuario:"20"},
                    }).done(function(res){//cuando ya este listo
                        //alert(res);
                        $("#m").html("");
                        $("#m").append(res);
                    });//fin del done
                }
            }else{
                //alert("No has editado nada");
            }
        });//fin del guardar cambios
        
        
        
        //alert(ruta);
        //$("input#correoImg").prop("value", correoUsuario);
        $("input#tipo").prop("value", "Cliente");	
        //alert($("#correoParaBusquedas").val());
        mostrarMensajes();
         
        $("#busqueda").change(function(){//funcion que cambia los metodos de busqueda
            var tipoBusqueda = $('#busqueda').val();
                if(tipoBusqueda == "metodo1"){
                    //alert("cambio.......");
                    $("#meto1").css({"display":"block"});
                    $("#meto2").css({"display":"none"});
                }else{
                    $("#meto2").css({"display":"block"});
                    $("#meto1").css({"display":"none"});
                }
        });
        
        $("#salir-link").click(function(eve){
            eve.preventDefault();
            //alert("Quiere Salir");
            $.ajax({
                url: "http://localhost/SIF/servidor/logica/scripts/salir.php",//url del servidor
                type: "post"
            }).done(function(res){//cuando ya este listo
                //alert(res);
                localStorage.setItem("sav", "0");
                $("body").append(res);//limpiamos la salida
                //cerrarCesion();
            });//fin del done
        });
        
        $("#formularioComentarios").submit(function (eve){
            eve.preventDefault();
            var titulo_comentario = $("#titulo_comentario").val();
            var mensaje_comentario = $("#mensaje_comentario");
            
            $.ajax({
                url: "http://localhost/sif/servidor/logica/scripts/enviarCorreo.php",//url del servidor
                type: "post",
                data:{titulo_comentario : titulo_comentario, mensaje_comentario : mensaje_comentario}
            }).done(function(res){//cuando ya este listo
                //$("#cajaMensajes").append(res);
                //alert(res);
                if(res === "OK"){
                    location.href = "index.html";
                }else{
                        //alert("No hay nada");
                    $("#resp_correo").html("");
                    $("#resp_correo").append("<h1>No se pudo enviar el mensaje, intentalo de nuevo!</h1>");
                }
            });//fin del done
        });
    
        });//fIN DE LA FUNCION PRINCIPAL
    
    
    
    function mostrarMensajes(){
        var ancho = $("#cajaMensajes").width();
        //alert(ancho);
        $.ajax({
        url: "http://localhost/SIF/servidor/logica/scripts/bandejaMensajes.php",//url del servidor
        type: "post",
        data:{usuario : "1", ancho : ancho}
        }).done(function(res){//cuando ya este listo
            //$("#cajaMensajes").append(res);
            //alert(res);
            if(res === "" || res === false){
                //alert("No hay nada");
                $("#cajaMensajes").html("");
                $("#cajaMensajes").append("<h1>No tienes mensajes!</h1>");
            }else{
                $("#cajaMensajes").html("");
                $("#cajaMensajes").append(res);
            }
        });//fin del done
    }
})(jQuery);