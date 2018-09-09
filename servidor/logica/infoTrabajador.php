<?php 
session_start();


//require('Perfil.php');
require("../accesoDatos/DAOselector.php");
require('Trabajador_Independiente.php');


//Objeto para seleccionar datos desde la base de datos
$selector = new DAOselector();
//El id del usuario actual
$ID = $_SESSION["id_usuario"];


//Tomamos desde el usuario el numero del resultado que desea ver
$numero_de_resultados = $_POST["cont"];
//Toomamos el array de resultados desde la sesion actual del usuario
$array_del_trabajador = $_SESSION["RESULTADOS_DE_BUSQUEDA"];

$atras;
$portada = "";



if($numero_de_resultados < sizeof($array_del_trabajador)){

    $id_usuario_resultado = $array_del_trabajador[$numero_de_resultados]["id_usuario"];
    $id_trabajador_resultado = $array_del_trabajador[$numero_de_resultados]["id_trabajador"];



    $datosUsuarioTrabajador = $selector->seleccionarTrabajador($id_usuario_resultado);

    $datosBanderas = array("nombres"=> "", "contra"=> "", "email"=> "", "edad"=> 0, "f_nac"=> "0000-00-00", "tipo"=> "Cliente");
    $trabajador = new Trabajador_Independiente($datosBanderas);

    $trabajador->Trabajador_Independiente($datosUsuarioTrabajador);




    //Traemos los datos del perfil del trabajador
    $datosPerfil = $selector->darPerfil($id_trabajador_resultado);

    $perfil = new Perfil($datosPerfil);

    $trabajador->setPerfil($perfil);


    //Traemos los datos del servicio del trabajador
    $datosServicio = $selector->darServicio($id_trabajador_resultado);

    $servicio_objeto = new Servicio($datosServicio);

    $trabajador->setServicio_objeto($servicio_objeto);




    //Tomamos los datos del trabajador
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

    //Los datos del perfil
    $desc_trabajador =     $trabajador->getPerfil()->getDescripcion();
    $exp_trabajador =      $trabajador->getPerfil()->getExperiencia();
    $direc_trabajador =    $trabajador->getPerfil()->getDireccion();
    $tel2_trabajador =     $trabajador->getPerfil()->getTelefono2();

    //Los datos del servicio
    $id_servicio = $trabajador->getServicio_objeto()->getId_servicio();
    $nombre_servicio = $trabajador->getServicio_objeto()->getNombre_servicio();
    $area_servicio = $trabajador->getServicio_objeto()->getArea_servicio();
    $detalles_servicio = $trabajador->getServicio_objeto()->getDetalles_del_trabajador();




    if ($img_trabajador != ""){
    	$img_trabajador = "'http://localhost/SIF/servidor/assets/imagenes-Perfil/".$img_trabajador."'";
    }else{
    	$img_trabajador = "'http://localhost/SIF/servidor/assets/imagenes-Perfil/avatar.jpg'";
    }

    if($desc_trabajador == ""){
        $desc_trabajador = "No ha escrito su descripción personal aun.";
    }

    if($tel_trabajador == ""){
        $tel_trabajador = "No ha definido su telefono";
    }

    if($tel2_trabajador == ""){
        $tel2_trabajador = "No ha definido su celular";
    }

    if($direc_trabajador == ""){
        $direc_trabajador = "No ha definido la dirección";
    }


    if($servicio_trabajador == ""){
        $portada = "http://localhost/SIF/servidor/assets/imagenes-trabajos-banners/Default.jpg";
    }else{
        $portada = "http://localhost/SIF/servidor/assets/imagenes-trabajos-banners/".$servicio_trabajador.".jpg";
    }

    

    if(strcmp($selector->darTipoUsuario($id_usuario_resultado), "Cliente") == 0 ){
        $atras = "1";
    }else{
        $atras = "2";
    }



//respuesta----------------------------------------------------------------

echo "<!-- Header -->
    <section id='header'>
        <header>
            <span class='image avatar'><img  id='fotoPerfil' src = $img_trabajador/></span>	
            <input type='text' name='tipo_usuario_para_atras' id='tipo_usuario_para_atras' value='$atras' style='display:none;' />
            <h1 id='atras'><a  onclick='javascript:window.history.back();'>Atrás.  .</a></h1><!-- Logo atras-->
            <h1 id='espacio'><a></a></h1><!-- Espacio en blanco-->
            <h1 id='logo'><a href='#' style='text-align:center;'>$servicio_trabajador</a></h1><!-- Nombre del trabajador o empresa-->
            <input type='text' name='tipo_usuario_para_atras' id='tipo_usuario_para_atras' value='$correo_trabajador' style='display:none;' />

	</header>
	<nav id='nav'>
            <ul>
		<li><a href='#one' class='active'>Informaci&oacute;n</a></li>
		<li><a href='#two'>Datos de contacto</a></li>
		<li><a href='#three'>Mira sus trabajos</a></li>
		<li><a href='#four'>Cont&aacute;ctalo</a></li>
            </ul>
        </nav>
	<footer>
            <!--<ul class='icons'>
		<li><a href='#' class='icon fa-twitter'><span class='label'>Twitter</span></a></li>
		<li><a href='#' class='icon fa-facebook'><span class='label'>Facebook</span></a></li>
		<li><a href='#' class='icon fa-instagram'><span class='label'>Instagram</span></a></li>
		<li><a href='#' class='icon fa-github'><span class='label'>Github</span></a></li>
		<li><a href='#' class='icon fa-envelope'><span class='label'>Email</span></a></li>
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
                    <header class='major'>
                        <img id='portadaServicio' src=''>
			<h2 id='nombre'>$nombre_trabajador</h2>
			<p id='desc2'>$desc_trabajador</p>
                    </header>
                    <p id='suParrafo'></p>
                    <br/><br/><br/><br/>
                    <br/><br/><br/><br/>
                    <br/><br/>
		</div>
            </section>
            
            <!-- Two -->
            <section id='two'>
		<div class='container'>
                    <h3>Esta es su informaci&oacute;n de contacto</h3>
                    <br><br>
                    <ul class='feature-icons'>
			<li id='exp' class='fa-bolt'>Experiencia: $exp_trabajador a&ntilde;os</li>
			<li id='tel1' class='fa-phone'>Tel&eacute;fono: $tel_trabajador</li>
			<li id='tel2' class='fa-mobile'>Celular : $tel2_trabajador</li>
			<li id='dir' class='fa-coffee'>Direcci&oacute;n: $direc_trabajador</li>
			<li id='emailT' class='fa-envelope'>Correo: $correo_trabajador</li>
			<!--<li id='val' class='fa-users'>Valoraci&oacute;n de los usarios</li>-->
                    </ul>
                    <br/><br/><br/><br/><br/><br/><br/><br/>
		</div>
            </section>

            <!-- Three -->
            <section id='three'>
                <div class='container'>
                    <h3>Sus trabajos</h3>
                    <p>Estos son algunos de sus trabajos anteriores que ha subido.<br>
                    Algunos usuarios trabajadores no tienen nada en esta parte porque sus trabajos no lo requieren, por lo que la información mostrada en esta secci&oacute;n es solo para mostrar algunas referencias de lo puede llegar a hacer.</p>
                    <div class='features' id = 'trabajos_del_trabajador'>";

$preContador = $selector->traerContadorTrabajosUsuario($id_usuario_resultado);
                

if($preContador > 0){
    //echo "SI hay trabajos";
    $TRABAJOS = $selector->traerTrabajos($id_usuario_resultado);
    echo $TRABAJOS;
    //Imprimimos el formulario
}else{
    echo("<article>
            <center>
            <div class='inner'>
		<h3 style='color:#ef4300;'>No hay Trabajos</h3>
		<h4 style='color:black;'>Este trabajador aún no ha subido, o no puede subir trabajos.</h4>
            </div>
            </center>
	</article>");
}

                echo "</div>
                </div>
            </section>

            <!-- Four -->
            <section id='four'>
		<div class='container'>
                    <h3>Cont&aacute;ctalo</h3>
                    <p>SIF te ofrece los datos de contacto de este trabajador para contactarlo personalmente, pero tambi&eacute;n te damos la opci&oacute;n de enviarle un mensaje en privado donde le comentes lo que deseas hacer y para que lo necesitas.<br>
                    Esta persona u organizaci&oacute;n recibir&aacute; tu mensaje como una notificaci&oacute;n y de seguro se pondr&aacute; en contacto contigo.</p>
                    <form id = 'form_primerMensaje'>
			<div class='row uniform'>
                            <div class='12u'>
                                <input type='text' name='subject' id='subject' placeholder='Dale un título a este mensaje' required/>
                                <input type='text' name='correoOculto2' id='correoOculto2' value='$numero_de_resultados' style='display:none;' />
                            </div>
			</div>
			<div class='row uniform'>
                            <div class='12u'><textarea name='message' id='message' placeholder='Di lo que quieres hacer, escribe tu mensaje.' rows='6' required></textarea></div>
			</div>
			<div class='row uniform'>
                            <div class='12u'>
                                <ul class='actions'>
                                    <li><input type='submit' class='special' value='Enviarlo' /></li>
                                    <li><input type='reset' value='Limpia los campos' /></li>
				</ul>
                            </div>
			</div>
                    </form>
		</div>
            </section>
            <div id = 'respuesta'></div>

	</div>

	<!-- Footer -->
	<section id='footer'>
            <div class='container'>
		<ul class='copyright'>
                    <li>&copy; Untitled. All rights reserved.</li>
                    <li>Programadores: <a href='http://caep.atwebpages.com'>Carlos Elguedo, Rafael Castellar, Zamir Martelo</a></li>
                    <li>Design: <a href='http://html5up.net'>HTML5 UP</a></li>
                </ul>
            </div>
        </section>

    </div>
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
    <!-- Scripts -->
    <script src='assets/js/jquery.scrollzer.min.js'></script>
    <script src='assets/js/jquery.scrolly.min.js'></script>
    <script src='assets/js/skel.min.js'></script>
    <script src='assets/js/util.js'></script>
    <!--[if lte IE 8]><script src='assets/js/ie/respond.min.js'></script><![endif]-->
    <script src='assets/js/main.js'></script>";

}else{
    echo "Talla:". sizeof($array_del_trabajador) . "<div id='wrapper'> <div id='main'> <center> <h2> No existe este resultado </h2> <br/> <p>Estas tratando de acceder a un resultado que no existe, por favor busca un trabajador y mira su perfil</p> </center> </div></div>";
}


?>