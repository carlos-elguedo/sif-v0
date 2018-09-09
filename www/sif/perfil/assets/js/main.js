/*
	Read Only by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

	skel.breakpoints({
		xlarge: '(max-width: 1680px)',
		large: '(max-width: 1280px)',
		medium: '(max-width: 1024px)',
		small: '(max-width: 736px)',
		xsmall: '(max-width: 480px)'
	});

	$(function() {

		var $body = $('body'),
			$header = $('#header'),
			$nav = $('#nav'), $nav_a = $nav.find('a'),
			$wrapper = $('#wrapper');

		// Fix: Placeholder polyfill.
			$('form').placeholder();

		// Prioritize "important" elements on medium.
			skel.on('+medium -medium', function() {
				$.prioritize(
					'.important\\28 medium\\29',
					skel.breakpoint('medium').active
				);
			});

		// Header.
			var ids = [];

			// Set up nav items.
				$nav_a
					.scrolly({ offset: 44 })
					.on('click', function(event) {

						var $this = $(this),
							href = $this.attr('href');

						// Not an internal link? Bail.
							if (href.charAt(0) != '#')
								return;

						// Prevent default behavior.
							event.preventDefault();

						// Remove active class from all links and mark them as locked (so scrollzer leaves them alone).
							$nav_a
								.removeClass('active')
								.addClass('scrollzer-locked');

						// Set active class on this link.
							$this.addClass('active');

					})
					.each(function() {

						var $this = $(this),
							href = $this.attr('href'),
							id;

						// Not an internal link? Bail.
							if (href.charAt(0) != '#')
								return;

						// Add to scrollzer ID list.
							id = href.substring(1);
							$this.attr('id', id + '-link');
							ids.push(id);

					});

			// Initialize scrollzer.
				$.scrollzer(ids, { pad: 300, lastHack: true });

		// Off-Canvas Navigation.

			// Title Bar.
				$(
					'<div id="titleBar">' +
						'<a href="#header" class="toggle"></a>' +
						'<span class="title">' + $('#atras').html() + $('#espacio').html() +$('#logo').html() + '</span>' +
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
						side: 'right',
						target: $body,
						visibleClass: 'header-visible'
					});

			// Fix: Remove navPanel transitions on WP<10 (poor/buggy performance).
				if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
					$('#titleBar, #header, #wrapper')
						.css('transition', 'none');
        
//Codigo Mio...........................................---------------------------------------------------------------Codigo Mio
        
        $("#form_primerMensaje").submit(function(eve){
            eve.preventDefault();
            //alert(de_correo);
            //alert("Lo va aenviar");
            var asunto = $("#subject").val();
            var mensaje = $("#message").val();
            
            var datoOculto = $("#correoOculto2").val();
            
            $.ajax({
                url: "http://localhost/SIF/servidor/logica/scripts/enviarMensaje.php",//url del servidor
                type: "post",
                data:{tipo : "1", titulo : asunto, mensaje : mensaje, datoOculto : datoOculto},
            }).done(function(res){//cuando ya este listo
                //alert(res);
                //$("#respuesta").append(res);
                if(res == "OK"){
                    $("#four").fadeOut(1000, function(){
                        $("#respuesta").html("");
                        $("#respuesta").append("<center><h2>Mensaje enviado</h2><br><h1>Ahora aparecer&aacute; en tu lista de mensajes, que est&aacute; en la p&aacute;gina principal.</h1></center>");
                    });
                }else{
                    $("#respuesta").html("");
                    $("#respuesta").append("<center><h1>No se envio el mensaje correctamente</h1></center>");
                }
            });//fin del done
        });//fin del evento submit
        
        intel.xdk.device.addVirtualPage();
	});
    /*$("atras").click(function(eve){
            eve.preventDefault();
            //alert("Quiere Salir");
            alert("Llego");
            $("body").append("<script>alert('Esto es mio');</script>");
            
        });
        */
    document.addEventListener("intel.xdk.device.hardware.back", function() {
        //continue to grab the back button
        //alert("ok");
        
        intel.xdk.device.addVirtualPage();

        //alert("Atras");
        //alert($("#tipo_usuario_para_atras").val());
        if($("#tipo_usuario_para_atras").val() === "1"){
            location.href = "../inicioCliente.html#portfolio";
        }else{
            location.href = "../inicioTrabajador.html#portfolio";
        }
    
    }, false);

    
})(jQuery);