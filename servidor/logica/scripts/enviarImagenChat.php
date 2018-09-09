<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../../accesoDatos/DAOactualizador.php';
require '../../accesoDatos/DAOselector.php';
require '../../accesoDatos/DAOinsertador.php';


$actualizador = new DAOactualizador();
$selector = new DAOselector();
$insertador = new DAOinsertador();


$ID = $_SESSION["id_usuario"];

$ruta = "";

$archivo = $_FILES['img']['tmp_name'];
$nombreArchivo = $_FILES['img']['name'];
$tipo = $_FILES ['img'][ 'type' ];



$numero_de_chat_enviar = $_GET["NUMERO_CHAT"];
    
$array_de_enlaces = $_SESSION["ENLACES_DEL_USUARIO"];
    
$enlace_prev = $array_de_enlaces[$numero_de_chat_enviar]["enlace"];
    
$id_usuario_a_enviar = $selector->darIdUsuarioParaChat($enlace_prev, $ID);

$contador = $selector->darContadorMensajesChat($id_usuario_a_enviar);
$contador = $contador + 1;


$tipo2 = substr($tipo, strrpos($tipo, "/")+1, strlen($tipo));


//move_uploaded_file($archivo, $ruta."/".$enlace."-".$nuevoCont.".".$tipo2);
move_uploaded_file($archivo,"../../assets/imagenes-Chat/". $enlace_prev ."-".$ID . "-" . $contador.".".$tipo2);

$ruta = $enlace_prev ."-".$ID . "-" . $contador.".".$tipo2;

$insertador->insertarImagenChat($ID, $id_usuario_a_enviar, $enlace_prev, $ruta, $contador);


?>