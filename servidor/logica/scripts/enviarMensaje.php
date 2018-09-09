<?php
session_start();
/**
 * @author Carlos-Elguedo, Rafael Castellar, Zamir Martelo
 * @copyright 2016
 */
require '../../accesoDatos/DAOactualizador.php';
require '../../accesoDatos/DAOselector.php';
require '../../accesoDatos/DAOinsertador.php';


$actualizador = new DAOactualizador();
$selector = new DAOselector();
$insertador = new DAOinsertador();


$tipo = mysql_real_escape_string($_POST['tipo']);

$ID = $_SESSION["id_usuario"];



if(strcmp($tipo, "1")== 0){//Si es un mensaje desde la pagina de perfil
    

    //Tomamos desde el usuario el numero del resultado que desea ver
    $numero_de_resultados = $_POST["datoOculto"];
    //Toomamos el array de resultados desde la sesion actual del usuario
    $array_del_trabajador = $_SESSION["RESULTADOS_DE_BUSQUEDA"];



    if($numero_de_resultados < sizeof($array_del_trabajador)){

        $id_usuario_resultado = $array_del_trabajador[$numero_de_resultados]["id_usuario"];
        $id_trabajador_resultado = $array_del_trabajador[$numero_de_resultados]["id_trabajador"];

        $asunto = mysql_real_escape_string($_POST["titulo"]);//obtenemos el asunto
        $mensaje = mysql_real_escape_string($_POST["mensaje"]);

        if($ID == $id_usuario_resultado){
            echo "No puedes enviarte un mensaje a ti mismo";
        }else{
            //Si es la primera vez que se va a enviar un mensaje
            if($selector->existeEnlace($ID, $id_usuario_resultado) == true){
                
                $insertador->insertarPrimerMensaje($ID, $id_usuario_resultado, $mensaje, $asunto);
                
            }else{
                
                $insertador->enviarMensaje($ID, $id_usuario_resultado, $mensaje, $asunto);
            }
        }//Fin del else que comprueba que no es el mismo usuario enviandose un mensaje a si mismo

        




    }//Fin de la comprobacion que se quiere enviar un mensaje erroneo

}//Fin del tipo 1


if(strcmp($tipo, "2")== 0){//Si es un mensaje desde el chat de la aplicacion
    
    //Tomamos desde el usuario el numero del resultado que desea ver
    $numero_de_chat_enviar = $_POST["NUMERO_CHAT"];
    
    $array_de_enlaces = $_SESSION["ENLACES_DEL_USUARIO"];
    
    $enlace_prev = $array_de_enlaces[$numero_de_chat_enviar]["enlace"];
    
    $id_usuario_a_enviar = $selector->darIdUsuarioParaChat($enlace_prev, $ID);
    
    if($numero_de_chat_enviar < sizeof($array_de_enlaces)){
        
        $mensaje = mysql_real_escape_string($_POST["mensaje"]);
        
        if($ID == $id_usuario_a_enviar){
            echo "No puedes enviarte un mensaje a ti mismo";
        }else{
            $insertador->enviarMensaje_chat($ID, $id_usuario_a_enviar, $mensaje, $enlace_prev);
            
        }
        
    }//Fin de la comprobacion a enviar un mensaje erroneo
    
    
    
    
}

if(strcmp($tipo, "3")== 0){//Si es un mensaje cotizacion tipo nota
    $nota = mysql_real_escape_string($_POST['nt']);
    $filas = mysql_real_escape_string($_POST['f']);
    
    $t = $_POST["t"];
    $n = $_POST["n"];
    
    $numero_de_chat_enviar = $_POST["NUMERO_CHAT"];
    
    $array_de_enlaces = $_SESSION["ENLACES_DEL_USUARIO"];
    
    $enlace_prev = $array_de_enlaces[$numero_de_chat_enviar]["enlace"];
    
    $id_usuario_a_enviar = $selector->darIdUsuarioParaChat($enlace_prev, $ID);
    
    
    $insertador->enviarNota($ID, $id_usuario_a_enviar, $n, $t, $enlace_prev);
    
}


if(strcmp($tipo, "4")== 0){//Si es un mensaje cotizacion tipo factura
    
    $filas = mysql_real_escape_string($_POST['f']);
    
    $c = $_POST["c"];
    $d = $_POST["d"];
    $v = $_POST["v"];
    $t = $_POST["t"];
    
    
    
    $numero_de_chat_enviar = $_POST["NUMERO_CHAT"];
    
    $array_de_enlaces = $_SESSION["ENLACES_DEL_USUARIO"];
    
    $enlace_prev = $array_de_enlaces[$numero_de_chat_enviar]["enlace"];
    
    $id_usuario_a_enviar = $selector->darIdUsuarioParaChat($enlace_prev, $ID);
    
    if($filas>2){
        //echo implode(",", $c) . "------";
        $c = implode(",", $c);
        $d = implode(",", $d);
        $v = implode(",", $v);
        
        $insertador->enviarFacturaGrande($ID, $id_usuario_a_enviar, $c, $d, $v, $t, $enlace_prev);
    }else{
        $insertador->enviarFactura($ID, $id_usuario_a_enviar, $c, $d, $v, $t, $enlace_prev);
    }
    
    
    
    
    
}










 ?>