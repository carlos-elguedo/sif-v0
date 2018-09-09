<?php
/**
 * @author Carlos Elguedo, Zamir Martelo, Rafael Castellar
 * @copyright 2016
 */
require("conexion.php");
require 'funciones.php';

class DAOselector{

    public function __construct() {
        
    }

    //Esta funcion es para consultar el id del usuario, recibe el correo electronico para buscarlo dentro de la tabala usuarios
    public function darIdUsuario($correo=''){
        $sql = "SELECT id FROM usuarios WHERE correo = '$correo'";

        $resultado = mysql_query($sql) or die ("No pudo traer el id del usuario: ". mysql_error());

        $datos = mysql_fetch_array($resultado);

        $id = $datos["id"];

        return $id;
    }
    
    //Esta funcion es para consultar y traer cliente, recibe el id del usuario para buscarlo dentro de la tabla
    public function seleccionarCliente($id){
        $sqlTraerCliente = "SELECT * FROM clientes where id_usuario = '$id'";//seleccionamos el cliente con ese id en la base de datos

    	$consulta = mysql_query($sqlTraerCliente)or die("No trajo al cliente desde la bd: ".mysql_error());//resalizamos las sentecias

    	$cliente = mysql_fetch_assoc($consulta);//obtenemos el dato de la consulta
        
        return $cliente;
    }
    
    //Esta funcion es para consultar y traer trabajador, recibe el id del usuario para buscarlo dentro de la tabla
    public function seleccionarTrabajador($id){
        $sqlTraerTrabajador = "SELECT * FROM trabajadores where id_usuario = '$id'";//seleccionamos el cliente con ese id en la base de datos

    	$consulta = mysql_query($sqlTraerTrabajador)or die("No trajo al Trabajador desde la bd: ".mysql_error());//resalizamos las sentecias

    	$trabajador = mysql_fetch_assoc($consulta);//obtenemos el dato de la consulta
        
        return $trabajador;
    }
    
    //Esta funcion es para consultar y traer el id del trabajador recibe el id del usuario para buscarlo dentro de la tabla
    public function darIdTrabajador($id_usu) {
        $sqlTraerId = "SELECT id_trabajador FROM trabajadores where id_usuario = '$id_usu'";

    	$consulta = mysql_query($sqlTraerId)or die("No trajo el id desde la bd: ".mysql_error());//resalizamos las sentecias

    	$datos = mysql_fetch_assoc($consulta);//obtenemos el dato de la consulta
        
        return $datos["id_trabajador"];
    }
    
    ////Esta funcion es para consultar y traer el perfil del trabajador, recibe el id del usuario para buscarlo dentro de la tabla
    public function darPerfil($id_trabajador) {
        $sql = "SELECT * FROM perfil WHERE id_trabajador = $id_trabajador;";
        
        $consulta = mysql_query($sql) or die("No trajo el perfil del trabajador desde la bd: ".mysql_error());
        
        $perfil = mysql_fetch_array($consulta);
        
        return $perfil;
    }
    
    //Esta funcion es para consultar y traer servicio del trabajador, recibe el id del trabajador para buscarlo dentro de la tabla
    public function darServicio($id_trabajador) {
        $sql = "SELECT * FROM servicio WHERE id_trabajador = $id_trabajador;";
        
        $consulta = mysql_query($sql) or die("No trajo el servicio del trabajador desde la bd: ".mysql_error());
        
        $servicio = mysql_fetch_array($consulta);
        
        return $servicio;
    }
    
    
    //Esta funcion es para consultar y traer los trabajos de un usuario trabajador, recibe el id del usuario para buscarlo dentro de la tabla
    public function traerTrabajos($id_usuario) {        
        $numeroTrabajos = $this->traerContadorTrabajosUsuario($id_usuario);
        $retorno = "";
        $salir = 1;
        
        //$sql = "SELECT * FROM trabajos WHERE id_trabajador = (SELECT id_trabajador FROM trabajadores WHERE id_usuario = $id_usuario)";
        $sql = "SELECT * FROM trabajos WHERE id_usuario = $id_usuario";

        $resul = mysql_query($sql) or die("Error trayendo los trabajos: ".mysql_error());
        
        if(mysql_num_rows($resul) > 0){
            while($TRABAJOS = mysql_fetch_array($resul)){
                //echo  "";
                $tit_trab = $TRABAJOS["titulo"];
                $desc_trab = $TRABAJOS["descripcion"];
                $ruta_imagen_trab = $TRABAJOS["rutaTrabajo"];
        
                $ruta_imagen_trab = "http://localhost/SIF/servidor/assets/trabajos-usuarios/".$ruta_imagen_trab;
                //echo $ruta_imagen_traba;
                $retorno = $retorno . "<article>   <a href='#' class='image'><img src='$ruta_imagen_trab' alt='' /></a>    <div class='inner'>     <center><h3 style='color:black;'>$tit_trab</h3></center>    <h4 style='color:black;'>$desc_trab</h4>    </div>   </article>";
                /*if($numeroTrabajos == $salir){
                    break;
                }else{
                    $salir++;
                }
                 */
            }//Fin del ciclo
        }
        
        return $retorno;
    }
    
    //Esta funcion es para consultar y traer un contador que indica el numero de trabajos de un usuario trabajador, recibe el id del usuario para buscarlo dentro de la tabla
    public function traerContadorTrabajosUsuario($id_usuario) {
        
        $contador = 0;
        $sql_sacar_contador = "SELECT contador FROM trabajos WHERE id_usuario = '$id_usuario'";

        $resultado = mysql_query($sql_sacar_contador) or die("Error trayendo el contador de trabajos: ".mysql_error());

        if(mysql_num_rows($resultado) > 0){
            //echo "Es mayor a Cero";
            //echo "\n".$nombreArchivo."\n".$tipo3."<--";
            while($datos = mysql_fetch_assoc($resultado)){
                $contador = $datos["contador"];
            }
        
        }
        
        return $contador;
    }
    
    
    ////Esta funcion es para consultar y traer el tipo de usuario, recibe el id del usuario para buscarlo dentro de la tabla
    public function darTipoUsuario($id_usuario) {
        $tipo = "";
        
        $sql = "SELECT tipo_usuario FROM usuarios WHERE id = $id_usuario";
        
        $res = mysql_query($sql) or die ("No pudo traer el tipo de usuario: " . mysql_error());
        
        if(mysql_num_rows($res) > 0){
            $datos = mysql_fetch_assoc($res);
            $tipo = $datos["tipo_usuario"];
        }
        
        return $tipo;
    }
    
    
    //Esta funcion es para buscar y traer los trabajadores desde una busqueda, recibe la palabra de servicio a buscar para buscarlo dentro de la tabla
    public function buscarTrabajadores($servicio) {
        $sql_traer_trabajadores = "SELECT * FROM trabajadores WHERE servicio = '$servicio'";

	$resultados = mysql_query($sql_traer_trabajadores) or die ("No pudo traer los trabajadores". mysql_error());

        $RESULTADOS_ARRAY = array("numero" => array(
            "id_usuario" => "",
            "id_trabajador" => "",
            "fecha_naci" => "",
            "nombre" => "",
            "correo" => "",
            "servicio" => "",
            "telefono" => "",
            "imagen" => "",
            "edad" => "",
            "ciudad" => ""
        ));
        
        $CONTADOR_RESULTADOS = 1;

        
	if (mysql_num_rows($resultados) > 0){
            $contador = 0;
            while($trabajadores = mysql_fetch_array($resultados)){
                $id_usuario = $trabajadores["id_usuario"];
                $id_trabajador = $trabajadores["id_trabajador"];
                $fechaNac = $trabajadores["fecha_naci"];
                $nombre = $trabajadores["nombre"];
		$correo = $trabajadores["correo"];
                $servicio_trabajador = $trabajadores["servicio"];
		$telefono = $trabajadores["telefono"];
		$imagen = $trabajadores["ruta_imagen"];
                $edad = $trabajadores["edad"];
		$ciudad = $trabajadores["ciudad"];
                
                $sql_traer_perfil_trabajador = "SELECT * FROM perfil WHERE id_trabajador = $id_trabajador;";
                
                $resultados_perfil = mysql_query($sql_traer_perfil_trabajador) or die ("No pudo traer el perfil del trabajdor desde los resultadors". mysql_error());
                
                $perfil = mysql_fetch_array($resultados_perfil);
                
                
                
                
                
                
                
                if($imagen == ""){
                    $imagen = "http://localhost/SIF/servidor/assets/imagenes-Perfil/avatar.jpg";
                }else{
                    $imagen = "http://localhost/SIF/servidor/assets/imagenes-Perfil/".$imagen;
		}
                
                $RESULTADOS_ARRAY[$CONTADOR_RESULTADOS]["id_usuario"] = $id_usuario;
                $RESULTADOS_ARRAY[$CONTADOR_RESULTADOS]["id_trabajador"] = $id_trabajador;
                $RESULTADOS_ARRAY[$CONTADOR_RESULTADOS]["fecha_naci"] = $fechaNac;
                $RESULTADOS_ARRAY[$CONTADOR_RESULTADOS]["nombre"] = $nombre;
                $RESULTADOS_ARRAY[$CONTADOR_RESULTADOS]["correo"] = $correo;
                $RESULTADOS_ARRAY[$CONTADOR_RESULTADOS]["servicio"] = $servicio_trabajador;
                $RESULTADOS_ARRAY[$CONTADOR_RESULTADOS]["telefono"] = $telefono;
                $RESULTADOS_ARRAY[$CONTADOR_RESULTADOS]["imagen"] = $imagen;
                $RESULTADOS_ARRAY[$CONTADOR_RESULTADOS]["edad"] = $edad;
                $RESULTADOS_ARRAY[$CONTADOR_RESULTADOS]["ciudad"] = $ciudad;
                
                
                
                $CONTADOR_RESULTADOS += 1;
                
            }//Fin del wuile
            
            
        }//Fin del if
        
        
        
        
        
        
        
        
        
        return $RESULTADOS_ARRAY;
        
    }//Fin de la funcion buscar
    
    
    //Esta funcion da el enlace de una conversacion
    public function darIdEnlace($de, $para) {
        $id = 0;
        $sql_sacar = "SELECT id_enlace FROM enlaces WHERE de = '$de' AND para = '$para'";
        
        $resul_enlace = mysql_query($sql_sacar) or die("No se trajo el enlace: ".mysql_error());
	    
        if (mysql_num_rows($resul_enlace) == 0){
            $dato = mysql_fetch_array($resul_enlace);
            $id = $dato["id_enlace"];
        }
        
        return $id;
    }
    
    //Esta funcion da el numero de mensajes de chat como un contador para las imagenes enviadas dentro del chat
    public function darContadorMensajesChat($id_enlace){
        $retorno = 0;

        $sql = "SELECT MAX(contador_img) As id_enlace FROM mensajes WHERE id_enlace = $id_enlace";

        $resul_cont = mysql_query($sql) or die("No Trajo el maximo contador: ".mysql_error());

        $dato = mysql_fetch_array($resul_cont);

        $retorno = $datos["id_enlace"];

        return $retorno; 
    }


    //Esta funcion comprueba si existe un enlace entre los usuarios recibidos
    public function existeEnlace($de, $para){
        $existe = false;

        $sql_ver_si_ya_existe = "SELECT id_enlace FROM enlaces WHERE de = '$de' AND para = '$para'";
        
        $resul_existe = mysql_query($sql_ver_si_ya_existe) or die("No se comprobo si existe: ".mysql_error());
	    
        if (mysql_num_rows($resul_existe) == 0){
            $existe = true;
        }


        return $existe;

    }//Fin de la funcion ver si existe un enlace entre usuarios
    
    
    
    //Esta funcion da los enlaces de el usuario actual, para efectos de chat
    public function darEnlacesMensajes($id_usuario, $ancho) {
        $ENLACES_USUARIO = array("enlace" => array(
            "enlace" => "",
            "asunto" => "",
            "nombre" => "",
            "mensaj" => "",
            "fecha_" => "",
            "img"    => ""     
        ));
        $CONTADOR_ENLACES = 1;
        
        $sql_enlaces = "SELECT * FROM enlaces WHERE de = '$id_usuario' OR para = '$id_usuario' ORDER BY fecha DESC, hora DESC;";

	$resul = mysql_query($sql_enlaces) or die("Error en la consulta".mysql_error());
        
        while($res = mysql_fetch_array($resul)){
            $mensaje = $res["mensaje"];
            $asunto = $res["asunto"];
            $de = $res["de"];
            $para = $res["para"];
            $id_enlace = $res["id_enlace"];
            $fecha1 = $res["fecha"];
            $hora1 = $res["hora"];
            $fecha_hora1 = $res["fecha_hora"];
            
            $hoy = date("Y-m-d");
            $fecha_que_vera = "";
            $fecha_que_vera = $fecha1;

            
            if($hoy == $fecha1){
                $fecha_que_vera = "Hoy ".recortar_hora($hora1);
            }else{
                //comprobar antes que haya sido esa semana
                $fecha_que_vera = daDia($fecha_hora1);            
            }            
            
            if($ancho < 280 && $ancho > 250){
                $asunto = recortar_titulo3($asunto);
                $mensaje = recortar_mensaje3($mensaje);
            }else{
                if($ancho < 280){
                    $asunto = recortar_titulo2($asunto);
                    $mensaje = recortar_mensaje2($mensaje);            
                }else{
                    if($ancho < 370){
                        $asunto = recortar_titulo1($asunto);
                        $mensaje = recortar_mensaje($mensaje);
                    }
                }
            }//Fin de los if para recortar los mensajes y hacerlos responsie
            
            //Comprobamos si el mensaje actual lo envio el usuario actual
            if(strcmp($de, $id_usuario) == 0){
                
                //Traemos los datos del otro usuario trabajador 
                $trabajador = $this->seleccionarTrabajador($para);
                
                $n_traba = $trabajador["nombre"];
                $i_traba = $trabajador["ruta_imagen"];
                
                
                //Verificamos si tiene imagen el otro usuario
                if ($i_traba != ""){
                    $i_traba = "'http://localhost/SIF/servidor/assets/imagenes-Perfil/".$i_traba."'";
                }else{
                    $i_traba= "'http://localhost/SIF/servidor/assets/imagenes-Perfil/avatar.jpg'";
                }
                
                //Guardamos los datos en el array
                $ENLACES_USUARIO[$CONTADOR_ENLACES]["enlace"] = $id_enlace;
                $ENLACES_USUARIO[$CONTADOR_ENLACES]["asunto"] = $asunto;
                $ENLACES_USUARIO[$CONTADOR_ENLACES]["nombre"] = $n_traba;
                $ENLACES_USUARIO[$CONTADOR_ENLACES]["mensaj"] = $mensaje;
                $ENLACES_USUARIO[$CONTADOR_ENLACES]["fecha_"] = $fecha_que_vera;
                $ENLACES_USUARIO[$CONTADOR_ENLACES]["img"] = $i_traba;
                
                
                
            }//si no le envio el
            else{
                if(strcmp($this->darTipoUsuario($de), "Cliente") == 0){
                    $chateador = $this->seleccionarCliente($de);
                    
                    $n_otro_usu = $chateador["nombre"];
                    $i_otro_usu = $chateador["ruta_imagen"];
                    
                    //Verificamos si tiene imagen el otro usuario
                    if ($i_otro_usu != ""){
                        $i_otro_usu = "'http://localhost/SIF/servidor/assets/imagenes-Perfil/".$i_otro_usu."'";
                    }else{
                        $i_otro_usu = "'http://localhost/SIF/servidor/assets/imagenes-Perfil/avatar.jpg'";
                    }
                    
                    //Guardamos los datos en el array
                    $ENLACES_USUARIO[$CONTADOR_ENLACES]["enlace"] = $id_enlace;
                    $ENLACES_USUARIO[$CONTADOR_ENLACES]["asunto"] = $asunto;
                    $ENLACES_USUARIO[$CONTADOR_ENLACES]["nombre"] = $n_otro_usu;
                    $ENLACES_USUARIO[$CONTADOR_ENLACES]["mensaj"] = $mensaje;
                    $ENLACES_USUARIO[$CONTADOR_ENLACES]["fecha_"] = $fecha_que_vera;
                    $ENLACES_USUARIO[$CONTADOR_ENLACES]["img"] = $i_otro_usu;
                    
                    
                    
                }//Fin del tipo cliente
                else{
                    $trabajador = $this->seleccionarTrabajador($para);
                
                    $n_traba = $trabajador["nombre"];
                    $i_traba = $trabajador["ruta_imagen"];
                    
                    
                    //Verificamos si tiene imagen el otro usuario
                    if ($i_traba != ""){
                        $i_traba = "'http://localhost/SIF/servidor/assets/imagenes-Perfil/".$i_traba."'";
                    }else{
                        $i_traba= "'http://localhost/SIF/servidor/assets/imagenes-Perfil/avatar.jpg'";
                    }
                    
                    //Guardamos los datos en el array
                    $ENLACES_USUARIO[$CONTADOR_ENLACES]["enlace"] = $id_enlace;
                    $ENLACES_USUARIO[$CONTADOR_ENLACES]["asunto"] = $asunto;
                    $ENLACES_USUARIO[$CONTADOR_ENLACES]["nombre"] = $n_traba;
                    $ENLACES_USUARIO[$CONTADOR_ENLACES]["mensaj"] = $mensaje;
                    $ENLACES_USUARIO[$CONTADOR_ENLACES]["fecha_"] = $fecha_que_vera;
                    $ENLACES_USUARIO[$CONTADOR_ENLACES]["img"] = $i_traba;
                }
                
                
            }//Fin del else, no es el usuario actual quien envia
            $CONTADOR_ENLACES += 1; 
            
            
        }//Fin del while
        
        return $ENLACES_USUARIO;
        
    }//Fin de la funcion dar enlaces de mensajes
    
    
    
    //Esta funcion trae los mensajes desde el chat
    public function traerMensajes_chat($id_enlace, $ID_USUARIO) {
        $sql = "SELECT * FROM mensajes WHERE id_enlace = $id_enlace";

        $resultado = mysql_query($sql) or die("No pudo traer los mensajes".mysql_error());
            
        $contador_local = 0;$contador_visita = 0;        
        
        
        while($mensajes = mysql_fetch_array($resultado)){
            $id_msg = $mensajes["id_mensaje"];
            $mensaj = $mensajes["mensaje"];
            $de = $mensajes["de"];
            $para = $mensajes["para"];
            $enviador = $mensajes["enviador"];
            
            $img_mg = $mensajes["imagen"];
            $cont_img = $mensajes["contador_img"];
            
            $cotizacion = $mensajes["cotizacion"];
            $id_cotizacion = $mensajes["id_cotizacion"]; 
            
            $fecha = $mensajes["fecha"];
            $hora = $mensajes["hora"];
            $fecha_hora = $mensajes["fecha_hora"];
            
            if($cotizacion == 1 || $cotizacion == "1"){
                //echo "Es una cotizacion";
                $traer_cot = "SELECT * FROM cotizaciones WHERE id_cotizacion = $id_cotizacion" ;
                $tabla = mysql_query($traer_cot) or die("Error traendo la cotizacion".mysql_error());
                $cotiza = mysql_fetch_array($tabla);
                $esnota = $cotiza["nota"];
    
                if($esnota == 1 || $esnota == "1"){
                    $nota = $cotiza["mensaje_nota"];
                    $titu = $cotiza["titulo"];
                    $fech = $cotiza["fecha"];
                    $hora = recortar_hora($cotiza["hora"]);
                    $firma_pre = $this->darNombreDeUsuario($cotiza["id_trabajador"]);
        
                    echo "<center>                        
                        <div style='background-color:#ef4300; width:90%;border-radius: 15px;'>
                            <br/>
                            <b style='color:white; display:inline-block; float:left; margin-left: 10%;'> Fecha $fech, Hora $hora </b>
                            <div style='clear: both'></div>
                            <b style='color:white'> $titu </b>
                            <p style='color:white'> $nota <p>
                            <b style='color:white; display:inline-block; float:left; margin-left: 10%;'> Nota hecha por: $firma_pre </b>
                            <br/>
                            <br/>
                        </div>
                        <br/>
                        </center>";
        
                }else{
                    //echo "Es una factura: " . $esnota;
                    
                    $cant = $cotiza["array_cantidades"];
                    $desc = $cotiza["array_descripciones"];
                    $valo = $cotiza["array_valores"];
                    $tota = $cotiza["total"];
                    $fech = $cotiza["fecha"];
                    $hora = $cotiza["hora"];
                    $estaGrande = $cotiza["grande"];
                    
                    $firma_pre = $this->darNombreDeUsuario($cotiza["id_trabajador"]);
        
                    echo "<center><table style='border: 2px solid; text-align: center; min-width:350px;'>
                            <thead>
                                <tr>
                                    <th style='text-align: center;'><label style='color:#ef4300;'> Fecha:</label> $fech</th>
                                    <th style='text-align: center;'><label style='color:#ef4300;'> Hora:</label> $hora</th>
                                    <th></th>                                    
                                </tr>
                                <tr>
                                    <th style='text-align: center;'>Cant.</th>
                                    <th style='text-align: center;'>Descripci&oacute;n</th>
                                    <th style='text-align: center;'>Valor</th>
                                </tr>
                            </thead>";
                    if($estaGrande == "1"|| $estaGrande == 1) {
                        $cant2 = explode(",", $cant);
                        $desc2 = explode(",", $desc);
                        $valo2 = explode(",", $valo);
                        
                        for($i = 0; $i < sizeof($cant2); $i++){
                            echo "<tbody style='border:solid 1px; width: 500px;'>
                                <tr>
                                    <td> $cant2[$i] </td>
                                    <td> $desc2[$i] </td>
                                    <td> $valo2[$i] </td>
                                </tr>
                            </tbody>";
                        }
                    }else{
                        echo "<tbody style='border:solid 1px; width: 500px;'>
                                <tr>
                                    <td> $cant </td>
                                    <td> $desc </td>
                                    <td> $valo </td>
                                </tr>
                            </tbody>";
                    }
                            
                        echo"<tfoot>
                                <tr>
                                    <td colspan='2'> Total: </td>
                                    <td> $tota</td>
                                </tr>
                                <tr>
                                    <td colspan='3'><label style='color:#ef4300;'> Factura hecha por: </label></td>
                                </tr>
                                <tr>
                                    <td colspan='3'> $firma_pre </td>
                                </tr>
                            </tfoot>        
                        </table></center><br/>";
                }
            }else{
    
                if($enviador == $ID_USUARIO){
                    if($img_mg!= ""){
                        $img_mg = "<img src = '"."http://localhost/SIF/servidor/assets/imagenes-Chat/".$img_mg."' />";
                    }
                    echo "<div class='chat-box-right'>
                            $mensaj
                            $img_mg
                        </div>
                        <br/>
                        <!--<hr class='hr-clas' />-->";
                }else{
                    
                    if($img_mg!= ""){
                        $img_mg = "<img src = '"."http://localhost/SIF/servidor/assets/imagenes-Chat/".$img_mg."' />";
                    }
                    echo "<div class='chat-box-left'>
                            $mensaj
                            $img_mg
                        </div>
                        <br/>
                        <!--<hr class='hr-clas' />-->";
                }
            }//fin del else de no hay cotizacion
        }//fin del while
        
    }//Fin de la funcion
    
    
    //Esta es para consultar y devolver el id del usuario para el chat, recibe dos parametros para hacer una comparacion
    public function darIdUsuarioParaChat($id_enlace, $id_usuario) {
        $id_a_retornar = 0;
        
        $sql_enlaces = "SELECT * FROM enlaces WHERE id_enlace = $id_enlace";

	$resul = mysql_query($sql_enlaces) or die("Error en la consulta".mysql_error());
        
        $res = mysql_fetch_array($resul);
            
        $de = $res["de"];
        $para = $res["para"];
        
        if($de == $id_usuario){
            $id_a_retornar = $para;
        } else {
            $id_a_retornar = $de;
        }
        
        return $id_a_retornar;
    }
    
    //Esta funcion consulta la imagen de perfil de un usuario
    public function darImagenDeUsuario($id) {
        $img = "";
        if(strcmp($this->darTipoUsuario($id), "Cliente") == 0){
            $usuario = $this->seleccionarCliente($id);
            
            $img = $usuario["ruta_imagen"];
        }else{
            $usuario = $this->seleccionarTrabajador($id);
            
            $img = $usuario["ruta_imagen"];
        }
        
        return $img;
    }
    
    //Esta funcion de el nombre de un usuario
    public function darNombreDeUsuario($id) {
        $nombre = "";
        if(strcmp($this->darTipoUsuario($id), "Cliente") == 0){
            $usuario = $this->seleccionarCliente($id);
            
            $nombre = $usuario["nombre"];
        }else{
            $usuario = $this->seleccionarTrabajador($id);
            
            $nombre = $usuario["nombre"];
        }
        
        return $nombre;
    }
    
    
    
    
    
    
    
}//Final de la clase

?>