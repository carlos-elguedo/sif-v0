<?php 
session_start();

require('Trabajador_Independiente.php');
//require('Perfil.php');
require("../accesoDatos/DAOselector.php");

$selector = new DAOselector();
$ID = $_SESSION["id_usuario"];




$datosUsuarioTrabajador = $selector->seleccionarTrabajador($ID);

$datosBanderas = array("nombres"=> "", "contra"=> "", "email"=> "", "edad"=> 0, "f_nac"=> "0000-00-00", "tipo"=> "Cliente");
$trabajador = new Trabajador_Independiente($datosBanderas);

$trabajador->Trabajador_Independiente($datosUsuarioTrabajador);
$portada = "";




$datosPerfil = $selector->darPerfil($trabajador->getId_trabajador());

$perfil = new Perfil($datosPerfil);

$trabajador->setPerfil($perfil);




$datosServicio = $selector->darServicio($trabajador->getId_trabajador());

$servicio_objeto = new Servicio($datosServicio);

$trabajador->setServicio_objeto($servicio_objeto);



$nombre_trabajador = $trabajador->get_Nombres();
$correo_trabajador = $trabajador->get_Correo();
$edad_trabajador   = $trabajador->get_Edad();
$fecha_trabajador  = $trabajador->get_FechaNac();
$tel_trabajador    = $trabajador->get_Telefono();
$img_trabajador    = $trabajador->getRutaImagen();

$id_trabajador    = $trabajador->getId_trabajador();
$id_usuario_trabajador    = $trabajador->getId();
$ciudad_trabajador    = $trabajador->getCiudad();
$servicio_trabajador    = $trabajador->getServicio();


$desc_trabajador =     $trabajador->getPerfil()->getDescripcion();
$exp_trabajador =      $trabajador->getPerfil()->getExperiencia();
$direc_trabajador =    $trabajador->getPerfil()->getDireccion();
$tel2_trabajador =     $trabajador->getPerfil()->getTelefono2();

$nombre_tra_tit = $nombre_trabajador;


if($servicio_trabajador == ""){
        $portada = "http://localhost/SIF/servidor/assets/imagenes-trabajos-banners/Default.jpg";
    }else{
        $portada = "http://localhost/SIF/servidor/assets/imagenes-trabajos-banners/".$servicio_trabajador.".jpg";
    }

if ($img_trabajador != ""){
	$img_trabajador = "'http://localhost/SIF/servidor/assets/imagenes-Perfil/".$img_trabajador."'";
}else{
	$img_trabajador = "'http://localhost/SIF/servidor/assets/imagenes-Perfil/avatar.jpg'";
}


//$atras =  "javascript:location.href='../inicioTrabajador.html#about';";
$atras =  "2";
/*
$servicio_traba = $_SESSION["servicio_traba"];
$nombre_traba =   $_SESSION["nombre_traba"];
$desc_traba =     $_SESSION["desc_traba"];
$exp_traba =      $_SESSION["exp_traba"];
$correo_traba =   $_SESSION["correo_traba"];
$direc_traba =    $_SESSION["direccion_traba"];
$tel1_traba =     $_SESSION["tel1_traba"];
$tel2_traba =     $_SESSION["tel2_traba"];
*/
//--------------------------------------------- codigo -----------------------------------------------------------------
		echo "<!-- Header -->
			<section id='header'>
				<header>
					<span class='image avatar'><img id='fotoPerfil'  src = $img_trabajador/></span><!--Imagen del trabajador-->
					<h1 id='atras'><a onclick='javascript:window.history.back();'>Atrás.  .</a></h1><!-- Logo atras-->
                    <h1 id='espacio'><a></a>        </h1><!-- Espacio en blanco-->
                    <h1 id='logo'><a href='#'>$servicio_trabajador</a></h1><!-- Nombre del trabajador o empresa-->
				</header>
				<nav id='nav'>
					<ul>
						<li><a href='#one' class='active'>Mi informaci&oacute;n</a></li>
						<li><a href='#two'>Mis datos de contacto</a></li>
						<li><a href='#three'>Mis trabajos</a></li>
						<!--<li><a href='#four'>Cont&aacute;ctalo</a></li>-->
					</ul>
				</nav>
				<footer>
                    <!--<h1>Vinculas tus cuentas</h1>
					<ul class='icons'>
						<li><a id = 'cuenta1' href='#' class='icon fa-twitter'><span class='label'>Twitter</span></a></li>
						<li><a id = 'cuenta2' href='#' class='icon fa-facebook'><span class='label'>Facebook</span></a></li>
						<li><a id = 'cuenta3' href='#' class='icon fa-instagram'><span class='label'>Instagram</span></a></li>
						<li><a id = 'cuenta4' href='#' class='icon fa-youtube'><span class='label'>Github</span></a></li>
						<li><a id = 'cuenta5' href='#' class='icon fa-envelope'><span class='label'>Email</span></a></li>
					</ul>-->
					<ul class='icons'>
                    	<li><a href='#'><span class='label'>SIF</span></a></li>
                	</ul>
				</footer>
			</section>

		<!-- Wrapper -->
			<div id='wrapper'>

				<!-- Main -->
					<div id='main'>

						<!-- One -->
							<section id='one'>
								<div class='container'>
								<!------------------------------------------------------------------------------------------------------------------------------------------------>
									<div class='row text-center' style='display: none;'>
                						<div class='col-md-4 col-sm-4'>
                    						<a class='fancybox-media' title='Titulo aqui' href='#twitter' id='addTwitter'>
                        						<img src='images/banner.jpg' class='img-responsive ' alt= />
                    						</a>
                    						<div id='twitter' style='display: none;'>
	                        					<img src='images/banner.jpg' class='img-responsive ' alt='' />
                        						<label>Bloquear a </label>
                        						<br />
                        						<label>Si lo bloqueas este usuario <b>NO</b> podra enviarte mas mensajes y tu tampoco a el, tambien el o ella <b>NO</</label>
                        						<center>
	                            					<button class = 'btn btn-info'> Si</button>
                            						<button class = 'btn btn-info'> No</button>
                        						</center>
                    						</div>
                						</div>
            						</div>
								<!------------------------------------------------------------------------------------------------------------------------------------------------>

								<!------------------------------------------------------------------------------------------------------------------------------------------------>
								<!------------------------------------------------------------------------------------------------------------------------------------------------>

								<!------------------------------------------------------------------------------------------------------------------------------------------------>
								<!------------------------------------------------------------------------------------------------------------------------------------------------>

								<!------------------------------------------------------------------------------------------------------------------------------------------------>
								<!------------------------------------------------------------------------------------------------------------------------------------------------>

								<!------------------------------------------------------------------------------------------------------------------------------------------------>
								<!------------------------------------------------------------------------------------------------------------------------------------------------>

								<!------------------------------------------------------------------------------------------------------------------------------------------------>
								<!------------------------------------------------------------------------------------------------------------------------------------------------>

								<!------------------------------------------------------------------------------------------------------------------------------------------------>
								<!------------------------------------------------------------------------------------------------------------------------------------------------>

								<!------------------------------------------------------------------------------------------------------------------------------------------------>

									<header class='major'>
                                        <div id='portadaServicio'><img id='imgServicio' src=''></div>
										<h2 id='nombre'>$nombre_trabajador</h2>
										<p id='desc2'>$desc_trabajador</p>
									</header>
									<p id='suParrafo'></p>
                                    <button id='cambiarDescripEnlace'> Editar</button>
                                     <!--<span class='icon fa-iedit'></span>-->
                                    <div id='cambiarDescrip' style='display:none'>
                                        <h4>Escribe aqu&iacute; una nueva descripci&oacute;n, algo sobre ti, lo que haces…</h4>
                                        <form id='descrip'>
                                            <textarea cols='8' id='nuevaDescrip' name='nuevaDescrip' value=''>
                                            </textarea>
                                            <br>
                                            <ul class='actions'>
                                                <li><input id = 'cambDescrip'type='submit' class='special' value='Listo' name='listoDescrip'></li>
                                                <li><input type='reset' value='Limpia el campo' /></li>
                                            </ul>
                                        </form>
                                    </div>
                                    <div id='oculto1'></div>
                                    <br><br><br><br>
                                    <br><br><br><br>
								</div>
							</section>

						<!-- Two -->
							<section id='two'>
								<div class='container'>
									<h3>Esta es su informaci&oacute;n de contacto</h3>
									<!--<p>Integer eu ante ornare amet commetus vestibulum blandit integer in curae ac faucibus integer non. Adipiscing cubilia elementum integer lorem ipsum dolor sit amet.</p>-->
                                    <br><br>
                                    <h4>Ac&aacute; presiona el ícono que est&aacute; a la izquierda del dato que quieres agregar o actualizar para que puedas editarlo, as&iacute; de f&aacute;cil.</h4>
									<ul class='feature-icons'>
                                        
                                        <li id='profesion' class='fa-code'>Profesión: $servicio_trabajador</li>
                                        <div id='cambiarProfesion' style='display:none'><!--Profesion -->
                                            <form id='editarPro'>
                                                Seleciona tu profesion:
                                                <SELECT NAME='profesiones' SIZE='1' id = 'profesiones'> 
<OPTION >Escoge tu servicio</OPTION>
<OPTION >Albañil</OPTION>
<OPTION >Abogado</OPTION>
<OPTION >Aquitecto</OPTION> 
<OPTION >Aseador</OPTION>
<OPTION >Bailarin</OPTION>
<OPTION >Carpintero</OPTION>
<OPTION >Chofer</OPTION>
<OPTION >Cocinero</OPTION>
<OPTION >Diseñador</OPTION>
<OPTION >Enfermero</OPTION>
<OPTION >Electricista</OPTION>
<OPTION >Escolta</OPTION>
<OPTION >Fotógrafo</OPTION>
<OPTION >Ingeniero</OPTION> 
<OPTION >Jardinero</OPTION>
<OPTION >Mensajero</OPTION>
<OPTION >Músico</OPTION>
<OPTION >Peluquero</OPTION>
<OPTION >Pintor</OPTION>
<OPTION >Plomero</OPTION>
<OPTION >Profesor</OPTION>
<OPTION >programador</OPTION> 
<OPTION >Sastre</OPTION>
<OPTION >Técnico</OPTION>
<OPTION >Vendedor</OPTION>
<OPTION >Veterinario</OPTION>
</SELECT>
                                            </form>
                                        </div>
										<li id='exp' class='fa-code'>Experiencia: $exp_trabajador a&ntilde;os</li>
                                        <div id='cambiarExper' style='display:none'><!--Primero -->
                                            <form id='editarExp'>
                                                <input type='number' id='nuevaExp' name = 'nuevaExp' placeholder='Escribe aqu&iacute;'>
                                            </form>
                                        </div>
										
                                        <li id='tel1' class='fa-cubes'>Tel&eacute;fono: $tel_trabajador</li>
                                        <div id='cambiarTel1' style='display:none'><!--Segundo -->
                                            <form id='editarTel1'>
                                                <input type='tel' id='nuevoTel1' name='nuevoTel1' placeholder='Escribe aqu&iacute;'>
                                            </form>
                                        </div>
                                        
										<li id='tel2' class='fa-book'>Celular : $tel2_trabajador</li>
                                        <div id='cambiarTel2' style='display:none'><!--Tercero -->
                                            <form id='editarTel2'>
                                                <input type='tel' id='nuevoTel2' name='nuevoTel2' placeholder='Escribe aqu&iacute;'>
                                            </form>
                                        </div>
                                        
										<li id='dir' class='fa-coffee'>Direcci&oacute;n: $direc_trabajador</li>
                                        <div id='cambiarDirec' style='display:none'><!--Cuarto -->
                                            <form id='editarDir'>
                                                <input type='text' id='nuevaDir' name='nuevaDir' placeholder='Escribe aqu&iacute;'>
                                            </form>
                                        </div>
										<li id='emailT' class='fa-bolt'>Correo: $correo_trabajador</li>
                                        <li id='ema' class='fa-bolt' style='display:none'></li>
										<!--<li id='val' class='fa-users'>Valoraci&oacute;n de los usarios</li>-->
									</ul>
                                    <ul class='actions'>
                                        <li><input id = 'GuardarCambios' type='submit' class='special' value='Guardar los cambios' /></li>
                                    </ul>
                                    <div id='oculto'></div>
                                    <br><br><br><br><br><br><br><br>
								</div>
							</section>

						<!-- Three -->
							<section id='three'>
								<div class='container'>
									<h3>Tus trabajos</h3>
									<p>En esta secci&oacute;n podr&aacute;s añadir tus trabajos anteriores para que los clientes que visiten tu perfil puedan ver lo que has hecho anteriormente.<br>
No todos los trabajos tienen esta opci&oacute;n así que si no quieres llenar esto no te preocupes.
                                    </p>
									<div class='features' id = 'trabajos_del_trabajador'>";
										


$preContador = $selector->traerContadorTrabajosUsuario($ID);
                

if($preContador > 0){
    //echo "SI hay trabajos";
    $TRABAJOS = $selector->traerTrabajos($ID);
    echo $TRABAJOS;
    //Imprimimos el formulario
    echo "<hr/>
        <style>
            hr{color:#ef4300;}
        </style>
        <article>
            <center>
                <h4 style='color:black;'>Formulario para subir un nuevo trabajo</h4>
                <div class='image' id = 'previewImg'>
                    <img src = '../../../assets/img/fondoTrabajoPreview.jpg' alt='' />
                </div>
            </center>
            <center>
		<form id ='form_img_trabajos' method = '' enctype = 'multipart/form-data'>
                    <label class='edi' >Selecciona una imagen desde tu dispositivo</label>
                    <input type='hidden' name='MAX_FILE_SIZE' value='1000000' />
                    <input type='file' accept='image/*' value='' id='img_trabajo_a_subir' name='img_trabajo_a_subir'>
                    <!--<input type='file' accept='image/*' value='' id='img_trabajo_a_subir' name='img_trabajo_a_subir'>-->
                    <!--    <input id = 'inputImg' type ='submit' value ='Subir'>-->
		</form>
            
            <div class='inner'>
                <h4>Escribe aquí un título y una descripción</h4><input type = 'text' id = 'titulo_del_trabajo' />
                <textarea id = 'desc_del_trabajo' placeholder = 'Escribe una descripción para que todos la lean' rows = '4'>
                </textarea>
            </div>
            <ul class='actions'>
                <li><input id = 'GuardarTrabajo' type='submit' class='special' form = 'form_img_trabajos' value='Guardar Trabajo' /></li>
            </ul>			
            </center>
        </article>";
}else{
    //echo "No hay trabajos";
    echo "<hr/>";
    echo "<article>
            <center><h3 style='color:black;'>Formulario para subir un nuevo trabajo</h3></center>
            <div class='image' id = 'previewImg'>
		<img src = '../../../assets/img/fondoTrabajoPreview.jpg' alt='' />
            </div>
            <center>
		<form id ='form_img_trabajos' method = '' enctype = 'multipart/form-data'>
                    <label class='edi' >Selecciona una imagen, arriba veras una vista previa</label>
                    <input type='hidden' name='MAX_FILE_SIZE' value='1000000' />
                    <input type='file' accept='image/*' value='' id='img_trabajo_a_subir' name='img_trabajo_a_subir'>
                    <!--<input type='file' accept='image/*' value='' id='img_trabajo_a_subir' name='img_trabajo_a_subir'>-->
                    <!--    <input id = 'inputImg' type ='submit' value ='Subir'>-->
		</form>
            
		<div class='inner'>
                    <h4>Escribe aquí un título y una descripción</h4><input type = 'text' id = 'titulo_del_trabajo' />
                    <textarea id = 'desc_del_trabajo' placeholder = 'Escribe una descripcion para que todos la lean' rows = '4'>
                    </textarea>
                </div>
            <ul class='actions'>
                <li><input id = 'GuardarTrabajo' type='submit' class='special' form = 'form_img_trabajos' value='Guardar Trabajo' /></li>
            </ul>			
            </center>
        </article>";
}
									echo "</div>
								</div><!--division del container -->
							</section>
<!--  . .......................................................................................................................................-->

					</div>

				<!-- Footer -->
					<section id='footer'>
						<div class='container'>
							<ul class='copyright'>
								<li>&copy; Untitled. All rights reserved.</li>
                                <li>Programador: <a href='#'>Carlos Elguedo</a></li>
                                <li>Design: <a href='http://html5up.net'>HTML5 UP</a></li>
							</ul>
						</div>
					</section>

			</div>

		<!-- Scripts -->
			<script src='assets/js/jquery.scrollzer.min.js'></script>
			<script src='assets/js/jquery.scrolly.min.js'></script>
			<script src='assets/js/skel.min.js'></script>
			<script src='assets/js/util.js'></script>
			<!--[if lte IE 8]><script src='assets/js/ie/respond.min.js'></script><![endif]-->
			<script src='assets/js/main.js'></script>
			<script src='assets/js/source/jquery.fancybox.js'></script>
			<style>
				#one:before {
					background-image: url('$portada');
					background-position: top right;
					background-repeat: no-repeat;
					background-size: cover;
					content: '';
					display: block;
					height: 15em;
					width: 100%;
				}
			</style>
			";
			
			echo "<script type='text/javascript'>
					$(document).ready(function(){
						alert('Listo');
						$('.fancybox-media').fancybox({
                			openEffect: 'elastic',
                			closeEffect: 'elastic',
                			helpers: {
                    			title: {
		                        	type: 'inside'
                    			}
                			}
            			});

						$('#cuenta1').click(function(evento){
							evento.preventDefault();
							alert('añade twiter');
							//setTimeout('daClick1()', 2000);
							$('#addTwitter').click();
						});


					});
					function daClick1(){
						$('#addTwitter').click();
					}
				</script>";

 ?>