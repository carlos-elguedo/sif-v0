<?php 
session_start();


require('Cliente.php');
require("../accesoDatos/DAOselector.php");

$selector = new DAOselector();
$ID = $_SESSION["id_usuario"];

$datosUsuarioCliente = $selector->seleccionarCliente($ID);

$datosBanderas = array("nombres"=> "", "contra"=> "", "email"=> "", "edad"=> 0, "f_nac"=> "0000-00-00", "tipo"=> "Cliente");
$cliente = new Cliente($datosBanderas);

$cliente->Cliente($datosUsuarioCliente);


$img_cliente    = $cliente->getRutaImagen();
$nombre_cliente = $cliente->get_Nombres();
$correo_cliente = $cliente->get_Correo();
$edad_cliente   = $cliente->get_Edad();
$fecha_cliente  = $cliente->get_FechaNac();
$tel_cliente    = $cliente->get_Telefono();

$id_cliente_cliente    = $cliente->getId_cliente();
$id_usuario_cliente    = $cliente->getId();
$ciudad_cliente        = $cliente->getCiudad();
$sexo_cliente          = $cliente->getSexo();


$nombre_cli_tit = $nombre_cliente;


if(strlen($nombre_cliente) > 17){
	$nombre_cli_tit = substr($nombre_cliente, 0, 15) . "...";
}

if ($img_cliente != ""){
	$img_cliente = "'http://localhost/SIF/servidor/assets/imagenes-Perfil/".$img_cliente."'";
}else{
	$img_cliente = "'http://localhost/SIF/servidor/assets/imagenes-Perfil/avatar.jpg'";
}

if(strlen($nombre_cliente) > 15){
	$nombre_cli_tit = substr($nombre_cliente, 0, 13) . "...";
}



echo "<!-- Header -->
        <div id='header'>
            <div class='top'>
		<!-- Logo -->
		<div id='logo'>
                    <a href='#about'><span class='image avatar48'><img id ='foto' src =$img_cliente/></span></a>
                    <h1 id='title'>$nombre_cli_tit</h1>
                    <p>Cliente</p>
		</div>
                
                <!-- Nav -->
		<nav id='nav'>
                    <ul>
                        <li><a href='#top' id='top-link' class='skel-layers-ignoreHref'><span class='icon fa-home'>Inicio</span></a></li>
                        <li><a href='#portfolio' id='portfolio-link' class='skel-layers-ignoreHref'><span class='icon fa-search'>Buscar</span></a></li>
                        <li><a href='#about' id='about-link' class='skel-layers-ignoreHref'><span class='icon fa-user'>Configuraciones</span></a></li>
                        <li><a href='#mensajes' id='mensaje-link' class='skel-layers-ignoreHref'><span class='icon fa-envelope'>Tus mensajes</span></a></li>
                        <li><a href='#contact' id='contact-link' class='skel-layers-ignoreHref'><span class='icon fa-edit'>Contáctanos</span></a></li>
                        <li><a href='#' id='salir-link' class='skel-layers-ignoreHref'><span class='icon fa-out'>Cerrar sesión</span></a></li>
                    </ul>
                </nav>
            </div>

            <div class='bottom'>";
/*
                <!-- Social Icons 
                <ul class='icons'>
                    <li><a href='#' class='icon fa-twitter'><span class='label'>Twitter</span></a></li>
                    <li><a href='#' class='icon fa-facebook'><span class='label'>Facebook</span></a></li>
                    <li><a href='#' class='icon fa-instagram'><span class='label'>Github</span></a></li>
                    <li><a href='#' class='icon fa-play store'><span class='label'>Dribbble</span></a></li>
                    <li><a href='#' class='icon fa-envelope'><span class='label'>Email</span></a></li>
                </ul>
                -->
 */
           echo "<ul class='icons'>
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
			<h2 class='alt'>Hola, en <strong>SIF</strong> podr&aacute;s encontrar la persona indicada para el trabajo que necesites.<br /></h2>
			<h3>En solo tres simples pasos:</h3>
			<h2>busca, mira y decide.</h2>
                    </header>

                    <footer>
			<a href='#portfolio' class='button scrolly' id='bo'>Empezar a buscar</a>
                    </footer>
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                </div>
            </section>
            
            <!-- Portfolio -->
            <section id='portfolio' class='two'>
                <div class='container'>
                    <header>
                        <h2>Buscar un trabajador</h2>
                        <select name='busqueda' id = 'busqueda'>
                            <option value='metodo1'>Por palabra</option>
                            <option value='metodo2'>Por categorías</option>
                	</select>
                        <br>
                        
                        <div id='meto1'>
                            <form method='post' id='busquedaPorPalabra'>
                                <h2><input type='search' placeholder='Palabra clave' id='palClave'> </h2>
                                <input type='submit' id='buscar1' name ='buscar1' value='Buscar' />
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
                                </SELECT>
                    			
                    		<br>
                                <input type='submit' id='buscar2' name ='buscar2' value='Buscar' />
                            </form>
                        </div>
                    </header>
                    <p>Abajo aparecer&aacute;n los resultados de tu búsqueda cuando presiones el bot&oacute;n buscar.</p>
                    <div class='row' id='rowBusqueda'>
                        <!--AQUI VAN LOS RESULTAOOS DE LA BUSQUEDA-->
                    </div>
                </div>
                </section>

                <!-- Configuraciones -->
                <section id='about' class='three'>
                    <div class='container'>
                        <header>
                            <h2>Mi cuenta</h2>
                            <p>En esta parte podr&aacute;s cambiar la información relacionada a tus datos personales y de contacto.</p>
			</header>
                        <center>
                            <a class='image featured'> <img id = 'fotoEnPagina' src = $img_cliente />
                            <h4 id='cambiarImagen'>Cambiar imagen</h4></a>	
                        </center>
			
                        <div id='cimagen' style='display:none'>
                            <form id ='form_img' method = '' enctype = 'multipart/form-data'>
				<label class='edi' >Selecciona una imagen para subir</label>
				<input type='hidden' name='MAX_FILE_SIZE' value='1000000' />
				<input type='file' accept='image/*' value='' id='img' name='img'>
                                
                                <br>
                                <label class='edit'>Despu&eacute;s presiona en: guardar cambios</label>
                                
                                <br><br>
                            </form>
			</div>
                        <div id='m'></div>
							
			<label id = 'editar_nombre'>Nombre: $nombre_cliente </label> <br>
                        <div id='cambiarNombre' style='display:none'>
                            <input type='text' placeholder='Escribe tu nombre aqui' name='nombre_Nuevo' id='nombre_Nuevo'><br>
                            <label class='edit'>Despu&eacute;s presiona en el boton: guardar cambios</label>
                            <br/>
                            <br/>
			</div>
                        
			<label id = 'editar_pass'><a id='cambiarContra'>Cambiar contraseña</a></label><br>
			<div id='ccontra' style='display:none'>
                            <input type='password' placeholder='La actual contraseña' name='contVieja' id='contVieja'><br><br>
                            <input type='password' placeholder='La nueva contraseña' name='contNueva' id='contNueva'><br>
                            <label class='edit'>Despu&eacute;s presiona en el boton: guardar cambios</label>
                            <br>
			</div>
							
                        <label id = 'editar_edad'>Edad: $edad_cliente</label><br>
			<label id = 'editar_fechaNac'>Fecha de nacimiento: $fecha_cliente</label><br>
			
                        <label id = 'editar_telefono'>Tel&eacute;fono: $tel_cliente</label> <a id='cambiarNombre'> <span class='icon fa-edit'></span> </a> <br>
			<div id='cambiar_telefono' style='display:none'>
                            <input type='number' placeholder='tu telefono' name='teleNuevo' id='teleNuevo'>
                            <label class='edit'>Despu&eacute;s presiona en el boton: guardar cambios</label>
			</div>
							
			<!--<label id = 'editar_direccion'>Direcci&oacute;n: </label><span class='icon fa-edit'></span><br>-->
			<label id = 'editar_ciudad'>Ciudad: Cartagena  </label> <a id='cambiarCiudad'> <span class='icon fa-edit'></span> </a> <br>
			<div id='cciudad' style='display:none'></div>
							
                        <br><br><br>
			<button id='guardarCambios'>Guardar cambios</button>

                    </div>
		</section>
		
                <!-- Mensajes -->
		<section id='mensajes' class='four'>
                    <div class='container'>
			<header>
                            <h2>Mis mensajes</h2>
			</header>
			<p>Aquí aparecerán los mensajes que has enviado.</p>
                        <div id='cajaMensajes' style='border:solid #ef4300'></div>
                    </div>
                    <br><br><br><br><br>
                    <br><br><br><br><br>
                    <br><br>
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
		<li>&copy; Untitled. All rights reserved.</li>
                <li>Programador: <a href='#'>Carlos Elguedo</a></li>
                <li>Design: <a href='http://html5up.net'>HTML5 UP</a></li>
            </ul>
	</div>
	
        <!-- Scripts -->
	<script src='assets/js/jquery.scrolly.min.js'></script>
	<script src='assets/js/jquery.scrollzer.min.js'></script>
	<script src='assets/js/skel.min.js'></script>
	<script src='assets/js/util.js'></script>
	<!--[if lte IE 8]><script src='assets/js/ie/respond.min.js'></script><![endif]-->
	<script src='assets/js/main.js'></script>
	<script src='assets/js/app1.js'></script>
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
//finnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn
?>