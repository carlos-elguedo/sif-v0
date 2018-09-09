<?php
/**
 * @author Carlos Elguedo, Zamir Martelo, Rafael Castellar
 * @copyright 2016
 */
session_start();


require("../../accesoDatos/DAOselector.php");
//require('Cliente.php');
//require('Trabajador_Independiente.php');



//Tomamos los datos desde el usuario
//$metodo = mysql_real_escape_string($_POST['tipo']);
$numero_de_chat = mysql_real_escape_string($_POST['NUMERO_CHAT']);



$selector = new DAOselector();

$ID = $_SESSION["id_usuario"];
$enlaces = $_SESSION["ENLACES_DEL_USUARIO"];

$id_enlace = $enlaces[$numero_de_chat]["enlace"];

$selector->traerMensajes_chat($id_enlace, $ID);






?>