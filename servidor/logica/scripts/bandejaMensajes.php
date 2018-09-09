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

$ID = $_SESSION["id_usuario"];

$tipo  = mysql_real_escape_string($_POST['usuario']);
$ancho = mysql_real_escape_string($_POST['ancho']);



$enlaces = $selector->darEnlacesMensajes($ID, $ancho);

$_SESSION["ENLACES_DEL_USUARIO"] = $enlaces;

for($i = 1; $i < sizeof($enlaces); $i++){
    //Sacamos los datos del array para mostrarlos
    $img = $enlaces[$i]["img"];
    $enl = $enlaces[$i]["enlace"];
    $nom = $enlaces[$i]["nombre"];
    $msg = $enlaces[$i]["mensaj"];
    $fec = $enlaces[$i]["fecha_"];
    $asu = $enlaces[$i]["asunto"];
    
    
    echo "<div class='logo'>
            <div class='izquierda'>
                <span class='image avatar72'><img class ='foto' src=$img/></span>
            </div>
            <div class='derecha'>
                <a class = 'pinchoMensaje' href='../chat/index.html?num=$i'>
                    <h1 class='title' style = 'display:inline;float:left'>$asu</h1>
                    <h1 style = 'display:inline;float:right;margin-right:5px;'>$fec<h1>
                    <p style='marging-left:10px;'>$msg</p>
                    <br/>
                </a>							
            </div>	
        </div>";
    
    
}


?>