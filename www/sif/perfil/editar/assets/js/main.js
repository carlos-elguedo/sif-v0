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
        
//Codigo Mio...........................................---------------------------------------------------------
        var editoDescrip = 2, editoExp = 2, editarTel1 = 2, editarTel2 = 2, editarDir = 2, editoPro = 2;
        $("#nuevaDescrip").val("");
        
        
        $("#cambiarDescripEnlace").click(function(eve){
            if(editoDescrip % 2 === 0){
                $("#cambiarDescrip").show(1000);
                editoDescrip++;
            }else{
                $("#cambiarDescrip").fadeOut(1000);
                editoDescrip++;
            }
        });
        
        $("#profesion").click(function(eve){
            if(editoPro % 2 === 0){
                $("#cambiarProfesion").show(1000);
                editoPro++;
            }else{
                $("#cambiarProfesion").fadeOut(1000);
                editoPro++;
            }
        });
        
        $("#exp").click(function(eve){
            if(editoExp % 2 === 0){
                $("#cambiarExper").show(1000);
                editoExp++;
            }else{
                $("#cambiarExper").fadeOut(1000);
                editoExp++;
            }
        });
        $("#tel1").click(function(eve){
            if(editarTel1 % 2 === 0){
                $("#cambiarTel1").show(1000);
                editarTel1++;
            }else{
                $("#cambiarTel1").fadeOut(1000);
                editarTel1++;
            }
        });
        $("#tel2").click(function(eve){
            if(editarTel2 % 2 === 0){
                $("#cambiarTel2").show(1000);
                editarTel2++;
            }else{
                $("#cambiarTel2").fadeOut(1000);
                editarTel2++;
            }
        });
        $("#dir").click(function(eve){
            if(editarDir % 2 === 0){
                $("#cambiarDirec").show(1000);
                editarDir++;
            }else{
                $("#cambiarDirec").fadeOut(1000);
                editarDir++;
            }
        });
        
        $("#GuardarCambios").click(function(eve){
            eve.preventDefault();
            //alert("Se presiono guardar cambios");
            if(editarDir>2 || editarTel1>2 || editarTel2>2 || editoExp>2 || editoPro>2){
                //alert("Presiono algun campo");
                var e1 = "", e2 = "",e3 = "",e4 = "", e5 = "";
                
                if($("#profesiones").val() != "Escoge tu servicio" && isNaN($("#profesiones").val())){
                    e5 = $("#profesiones").val();//alert("1");
                }
                if($("#nuevaExp").val() !== "" && $("#nuevaExp").val() != NaN){
                    e1 = $("#nuevaExp").val();//alert("2");
                }
                if($("#nuevoTel1").val() != "" && $("#nuevoTel1").val() != NaN){
                    e2 = $("#nuevoTel1").val();//alert("3");
                }
                if($("#nuevoTel2").val() != "" && $("#nuevoTel2").val() != NaN){
                    e3 = $("#nuevoTel2").val();//alert("4");
                }
                if($("#nuevaDir").val() != "" && $("#nuevaDir").val() != NaN){
                    e4 = $("#nuevaDir").val();//alert("5");
                }
                //if($("#").val() != "" && $("#").val() != NaN){    }
                
                //alert(correo);
                $.ajax({
                        url: "http://localhost/SIF/servidor/logica/editarDatos.php",//url del servidor
                        type: "post",
                        data:{e1:e1, e2:e2, e3:e3, e4:e4, e5:e5, usuario:"1"},
                    }).done(function(res){//cuando ya este listo
                        //alert(res);
                        $("#oculto").html("");
                        $("#oculto").append(res);
                    });//fin del done
                
            }else{
                //alert("No ha editado nada");
            }
        });
        $("#cambDescrip").click(function(eve){
            eve.preventDefault();
            if(editoDescrip>2){
                if($("#nuevaDescrip").val() != "" && $("#nuevaDescrip").val() != NaN){
                    ///alert("Hay algo en la descripcion");
                    var des = $("#nuevaDescrip").val();
                    $.ajax({
                        url: "http://localhost/SIF/servidor/logica/editarDatos.php",//url del servidor
                        type: "post",
                        data:{des:des, usuario:"2"},
                    }).done(function(res){//cuando ya este listo
                        $("#oculto1").append(res);
                    });//fin del done
                }
            }
        });
        //------------------------------------Subir un nuevo trabajo --------------------
        $("#desc_del_trabajo").val("");
        $("#titulo_del_trabajo").val("");
        $("#desc_del_trabajo").prop("placeholder", "¿Qué es?, ¿de qué se trata?, ¿cómo lo hiciste?");
        
        setInterval("cargarImagenPreview()", 3000);
        
        $("#GuardarTrabajo").click(function(eve){
           eve.preventDefault();
            //alert("Quiere subir");
            var img_del_tra = $("#img_trabajo_a_subir").val();
            var tit_del_tra = $("#titulo_del_trabajo").val();
            var des_del_tra = $("#desc_del_trabajo").val();
            if(img_del_tra != "" && tit_del_tra != ""){
                //alert("Correcto");
                if(des_del_tra != ""){
                    var f = $(this);
                    var formData = new FormData(document.getElementById("form_img_trabajos"));//obtenemos una referencia al formulario con formData
                    formData.append("img_trabajo_a_subir", "valor");
                    //formData.append(f.attr("name"), $(this)[0].files[0]);
                    //$("#GuardarTrabajo").disabled = true;
                    $.ajax({//enviamos la imagen al servidor por ajax
                        url: "http://localhost/SIF/servidor/logica/scripts/guardarTrabajos.php?tit="+tit_del_tra+"&desc="+des_del_tra,
                        type: "post",
                        dataType: "html",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false
                    }).done(function(res){//cuando ya este listo
                        //alert("Envio el trabajo");
                        //alert(res);
                        if(res.valueOf() == "OK" ){
                            alert("Se ha subido tu trabajo");
                            location.href = "index.html";
                        }
                    });//fin del done
                }else{
                    
                }
                
                
            }else{
                alert("Llena como minimo la imagen y el titulo");
            }
            
        });
        
        //------------------------------------Subir un nuevo trabajo --------------------
        intel.xdk.device.addVirtualPage();
	});
    
    document.addEventListener("intel.xdk.device.hardware.back", function() {
        //continue to grab the back button
        //alert("ok");
        
        intel.xdk.device.addVirtualPage();

        //alert("Atras");
        //alert($("#tipo_usuario_para_atras").val());
        
            location.href = "../inicioTrabajador.html#about";
    
    }, false);

})(jQuery);
/*
function cargarTrabajos(){
    //alert("Llego");
    $.ajax({
        url: "http://localhost/SIF/cargarTrabajos.php",//url del servidor
        type: "post"
    }).done(function(resp){//cuando ya este listo
        alert(resp);
        $("#trabajos_del_trabajador").html(resp);
        //return res;
    });//fin del done
}
*/
function cargarImagenPreview(){
    //alert("Llego aqui xd");
    var img_del_tra = $("#img_trabajo_a_subir").val();
    if(img_del_tra != ""){
        //alert("Tiene algo xd: " + img_del_tra);
        $("#previewImg").html("<img src='../../../assets/img/fondoTrabajoPreview-ok.jpg' alt='' />");
    }
}

















