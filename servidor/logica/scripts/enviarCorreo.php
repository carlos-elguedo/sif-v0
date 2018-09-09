<?php
session_start();
/**
 * @author Carlos-Elguedo, Rafael Castellar, Zamir Martelo
 * @copyright 2016
 */
    
$ID = $_SESSION["id_usuario"];

$entro = false;

if(isset($_POST["titulo_comentario"]) && !empty($_POST["titulo_comentario"]) &&
	isset($_POST["mensaje_comentario"]) && !empty($_POST["mensaje_comentario"])){

	
	$titulo = $_POST["titulo_comentario"];
	$mensaje = $_POST["mensaje_comentario"] . "\n\n Del usuario: " . $ID;
		
	mail("sifcartagena@outlook.com", $titulo, $mensaje);

	echo "OK";
            
	}else{
            echo "NO";
	}
	

 ?>