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





$datosPerfil = $selector->darPerfil($trabajador->getId_trabajador());

$perfil = new Perfil($datosPerfil);

$trabajador->setPerfil($perfil);




$datosServicio = $selector->darServicio($trabajador->getId_trabajador());

$servicio = new Servicio($datosServicio);

$trabajador->setServicio_objeto($servicio);






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

$nombre_tra_tit = $nombre_trabajador;

if ($img_trabajador != ""){
	$img_trabajador = "'http://localhost/SIF/servidor/assets/imagenes-Perfil/".$img_trabajador."'";
}else{
	$img_trabajador = "'http://localhost/SIF/servidor/assets/imagenes-Perfil//avatar.jpg'";
}

if(strlen($nombre_trabajador) > 15){
	$nombre_tra_tit = substr($nombre_trabajador, 0, 13) . "...";
}

echo "<!-- Header -->
	<div id='header'>
            <div class='top'>
                <!-- Logo -->
                <div id='logo'>
                        <a href='#about'><span class='image avatar48'><img id ='foto' src = $img_trabajador /></span></a>
                        <h1 id='title'>$nombre_tra_tit</h1>
			<p id='servicioTrabajador'>$servicio_trabajador</p>
		</div>

		<!-- Nav -->
		<nav id='nav'>
                    <ul>
                        <li><a href='#top' id='top-link' class='skel-layers-ignoreHref'><span class='icon fa-home'>Inicio</span></a></li>
                        <li><a href='#portfolio' id='portfolio-link' class='skel-layers-ignoreHref'><span class='icon fa-search'>Buscar</span></a></li>
                        <li><a href='#about' id='about-link' class='skel-layers-ignoreHref'><span class='icon fa-user'>Configuraciones</span></a></li>
                        <li><a href='#mensajes' id='mensaje-link' class='skel-layers-ignoreHref'><span class='icon fa-envelope'>Tus mensajes</span></a></li>
                        <li><a href='#contact' id='contact-link' class='skel-layers-ignoreHref'><span class='icon fa-envelope'>Contáctanos</span></a></li>
                        <li><a href='#' id='salir-link' class='skel-layers-ignoreHref'><span class='icon fa-exit'>Cerrar sesión</span></a></li>
                    </ul>
                </nav>

		</div>

                    <div class='bottom'>
			<!-- Social Icons
			<ul class='icons'>
                            <li><a href='#' class='icon fa-twitter'><span class='label'>Twitter</span></a></li>
                            <li><a href='#' class='icon fa-facebook'><span class='label'>Facebook</span></a></li>
                            <li><a href='#' class='icon fa-instagram'><span class='label'>Github</span></a></li>
                            <li><a href='#' class='icon fa-play store'><span class='label'>Dribbble</span></a></li>
                            <li><a href='#' class='icon fa-envelope'><span class='label'>Email</span></a></li>
                        </ul>
                        -->
                        <ul class='icons'>
                            <li><a href='#'><span class='label'>SIF</span></a></li>
                        </ul>

                    </div>

                    </div>
                        <!-- Main -->
			<div id='main'>

                            <!-- Intro -->
                            <section id='top' class='one dark cover'>
                                <div class='container'>
                                    <header>
					<h2 class='alt'>Hola, <strong>SIF</strong> te da la oportunidad de ofrecer tu trabajo a m&aacute;s persona, para tener m&aacute;s clientes, m&aacute;s trabajo y m&aacute;s ganancias.</h2>
                                        <br>
                                        <!--Los usuarios de SIF pueden encontrarte, mirar tu informaci&oacute;n laboral y así ponerse en contacto contigo.<br>-->
                                        <h2>Empieza a disfrutar de los beneficios que te ofrecemos.</h2>
                                    </header>
                                    <footer>
					<a href='#about' class='button scrolly'>Ofrece tu servicio</a>
                                    </footer>
                                    <br /><br /><br /><br /><br />
				</div>
                            </section>

                            <!-- Portfolio -->
				<section id='portfolio' class='two'>
                                    <div class='container'>
					<header>
                                            <h2>Buscar un trabajador</h2>
                                            <h4>Usted también puede buscar un trabajador, en el caso de necesitarlo</h4>
								
                                            <select name='busqueda' id = 'busqueda'>
                                                <option value='metodo1'>Por palabra</option>
                    				<option value='metodo2'>Por categorías</option>
                                            </select>
                                            <br>
								
                                            <div id='meto1'>
                                                <form method='post' id='busquedaPorPalabra'>
                                                    <h2><input type='search' placeholder='Palabra clave' id='palClave'> </h2>
                                                    <input type='submit' id='buscar1' name ='buscar1' value = 'Buscar'/>
                                                </form>
                                            </div>
                                
                                            <div id='meto2'style='display:none'>
                                                <form method='post' id='busquedaPorCategoria'>
                                                    <SELECT NAME='categorias' SIZE='1' ID = 'categorias'> 
                                                        <OPTION >Escoge tu servicio</OPTION>
                                                        <OPTION >Albañil</OPTION>
                                                        <OPTION >Abogado</OPTION>
                                                        <OPTION >Arquitecto</OPTION> 
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
                                                        <OPTION >Programador</OPTION> 
                                                        <OPTION >Sastre</OPTION>
                                                        <OPTION >Técnico</OPTION>
                                                        <OPTION >Vendedor</OPTION>
                                                        <OPTION >Veterinario</OPTION>
                                                    </SELECT><br>
                                                    <input type='submit' id='buscar2' name ='buscar2' value='Buscar' />
                                                </form>
                                            </div>
					</header>
                                        <p>Abajo aparecer&aacute;n los resultados de tu búsqueda cuando presiones el bot&oacute;n buscar.</p>
					<div class = 'row' id = 'rowBusqueda'></div>
                                    </div>
                                </section>

				<!-- About Me -->
                                    <section id='about' class='three'>
                                        <div class='container'>
                                            <header>
						<h2>Mi cuenta</h2>
						<p>En esta parte podr&aacute;s cambiar la información relacionada a tus datos personales y de contacto.</p>
                                                <br>
                                                <button id='edit'>Ir a editar perfil</button>
                                                <div id='oculto'></div>
                                            </header>
                                            <center>
                                                <a class='image featured'><img id = 'fotoEnPagina'  src = $img_trabajador/>
                                                <h4 id='cambiarImagen'>Cambiar imagen</h4></a>
                                            <center>
                                            <div id='cimagen' style='display:none'>
                                            
                                                <form id ='form_img' method = '' enctype = 'multipart/form-data'>
                                                    <label class='edi' >Selecciona una imagen para subir</label>
                                                    <input type='hidden' name='MAX_FILE_SIZE' value='1000000' />
                                                    <input type='file' accept='image/*' value='' id='img' name='img'>
                                                    <!--<input type='text' value=$correo_trabajador  id = 'correoImg' name='correoImg' style='display:none'>-->
                                                    
                                                    <br>
                                                    
                                                    <label class='edit'>Despu&eacute;s presiona en: guardar cambios</label>
                                                    <!--    <input id = 'inputImg' type ='submit' value ='Subir'>-->
                                                </form>
                                                
                                                <!--<button>Guardar cambios</button>-->
                                                <br>							     
                                            </div>
                                            <label id = 'editar'>Nombre: $nombre_trabajador</label> <br>
                                            <label id = 'editar1'><a id='cambiarContra'>Cambiar contraseña</a></label><br>
                                            <div id='ccontra' style='display:none'>
                                                <input type='password' placeholder='La actual contraseña' name='contVieja' id='contVieja'><br><br>
                                                <input type='password' placeholder='La nueva contraseña' name='contNueva' id='contNueva'><br>
                                                <label class='edit'>Despu&eacute;s presiona en: guardar cambios</label>
                                                <br>
                                            </div>
                                            <br><br>
                                            <button id='guardarCambios'>Guardar cambios</button>
                                            <div id='m'></div>
                                        </div>
                                    </section>

                                    <!-- Mensajes -->
                                    <section id='mensajes' class='four'>
                                        <div class='container'>
                                            <header>
						<h2>Bandeja de mensajes</h2>
                                            </header>
                                            <p>Aquí aparecerán los mensajes que has enviado.</p>
                                            <div id='cajaMensajes' style='border:solid #ef4300'></div>
                                            <br><br><br><br><br>
                                            <br><br><br><br><br>
                                        </div>
                                    </section>
                                    
                                    <!-- Contact -->
                                    <section id='contact' class='four'>
                                        <div class='container'>
                                            <header>
                                                <h2>Contáctanos</h2>
                                            </header>
                                            <p>Envia tus sugerencias, opiniones, críticas y consejos; para así seguir mejorando y ofrecerte un servicio cada vez mejor.<br>Tu opinión es muy importante para nosotros.</p>
                                            <form method='post' id = 'formularioComentarios'>
                                                <div class='row'>
                                                    <div class='6u 12u$(mobile)'><input type='text' name = 'titulo_comentario' id = 'titulo_comentario' placeholder='Asunto' /></div>
                                                    <div class='12u$'>
                                                        <textarea name='mensaje_comentario' id = 'mensaje_comentario' placeholder='Escribe aquí'></textarea>
                                                    </div>
                                                    <div class='12u$'>
                                                        <input id= 'enviarComentarios' type='submit' value='Enviarlo' />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div id = 'resp_correo'></div>
                                    </section>
                                
			</div>
			<!--****************************************************   primera Vex   ***************************************************-->
                        <div class='row text-center' style='display: none;'>
                            <div class='col-md-4 col-sm-4'>
                                <a class='fancybox-media' title='Presiona en la X para cerrar' href='#primeraVez' id='primera_enlace'>
                                    <!--  Path for image to open -->
                                    <img src='images/pic04.jpg' class='img-responsive ' alt='' />
                                    <!-- Path for image to display -->
                                </a>
                                <div id='primeraVez' style='display: none;'>
                                    <img src='../../assets/img/icono1.png' class='img-responsive ' alt='' />

                                    <p style='color:black;'><b>Bienvenido a SIF, una plataforma que te será de mucha ayuda</b></p>
                                    
                                </div>
                            </div>
                        </div>
                        <!--*********************************************************************+***************************************************-->
                        <!-- Footer -->
			<div id='footer'>

                            <!-- Copyright -->
                            <ul class='copyright'>
				<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href='http://html5up.net'>HTML5 UP</a></li>
                            </ul>
			</div>

                        <!-- Scripts -->
			<script src='assets/js/jquery.min.js'></script>
			<script src='assets/js/jquery.scrolly.min.js'></script>
			<script src='assets/js/jquery.scrollzer.min.js'></script>
			<script src='assets/js/skel.min.js'></script>
			<script src='assets/js/util.js'></script>
			<!--[if lte IE 8]><script src='assets/js/ie/respond.min.js'></script><![endif]-->
			<script src='assets/js/main.js'></script>
			<script src='assets/js/app2.js'></script>
			<script src='assets/js/source/jquery.fancybox.js'></script>

			<script>
                            $(document).ready(function(){
                                //alert('Listo');
                                $('.fancybox-media').fancybox({
                                    openEffect: 'elastic',
                                    closeEffect: 'elastic',
                                    helpers: {
                    			title: {
                                            type: 'inside'
                                            }
                			}
                                });
                            });
			</script>";

?>