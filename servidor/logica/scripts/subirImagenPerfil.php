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


$tipo2 = substr($tipo, strrpos($tipo, "/")+1, strlen($tipo));

move_uploaded_file($archivo,"../../assets/imagenes-Perfil/" . $ruta."/".$ID.".".$tipo2);


$ruta = $ID.".".$tipo2;

$insertarImagen = $insertador->insertarImagenPerfil($ID, $ruta);

if(strcmp($insertarImagen, "OK" )==0){
    echo "<script type = 'text/javascript'>
            alert('Se ha guardado la imagen');
            location.href = 'index.html';
        </script>";
}else{
    echo "<script type = 'text/javascript'>
            alert('No se pudo guardar la imagen');
            //location.href = 'index.html';
        </script>";
}


?>