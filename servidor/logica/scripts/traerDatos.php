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
$metodo = mysql_real_escape_string($_POST['tipo']);
$numero_de_chat = mysql_real_escape_string($_POST['num']);



$selector = new DAOselector();

$ID = $_SESSION["id_usuario"];
$enlaces = $_SESSION["ENLACES_DEL_USUARIO"];


function recortar($cad){return substr($cad, 0, 12)."...";}


//Para traer el titulo de la conversacion
if(strcmp($metodo, "1")== 0){
    
    echo "SIF - " . recortar($enlaces[$numero_de_chat]["asunto"]);
    
    
}  

if(strcmp($metodo, "2")== 0){
    if(strcmp($selector->darTipoUsuario($ID), "Trabajador")== 0){
        echo "<a id = 'cotizaciones' href='#'><span class='fa fa-money'></span>&nbsp; Cotizar
                <script>
                $('#cotizaciones').click(function(eve){
                    eve.preventDefault();
                    $('#cotizar').click();
                });</script>
                </a>";
    }else{
        /*echo "<a id = 'cambiarTitulo' href='#'><span class='fa fa-edit'></span>&nbsp; Cambiar titulo
                <script>
                $('#cambiarTitulo').click(function(eve){
                    eve.preventDefault();
                    $('#cambiar_titulo').click();
                });</script>
                </a>";
                */
        echo "";
    }

}












?>