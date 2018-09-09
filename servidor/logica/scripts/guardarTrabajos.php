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
    $contador = 0;
    
    $archivo = $_FILES['img_trabajo_a_subir']['tmp_name'];
    $nombreArchivo = $_FILES['img_trabajo_a_subir']['name'];
    $tipo = $_FILES ['img_trabajo_a_subir'][ 'type' ];
    
    
    $titulo_del_trabajo = $_GET["tit"];
    $desc_del_trabajo = $_GET["desc"];


    $tipo2 = substr($tipo, strrpos($tipo, "/")+1, strlen($tipo));
    $tipo3 = "";

    if($tipo2 == ""){
        $desde = strlen($nombreArchivo) - 6;
        $posible = substr($nombreArchivo, $desde, strlen($nombreArchivo));
        $posicionPunto = strpos($posible, ".");
        $tipo3 = substr($posible, $posicionPunto+1, strlen($posible));
        $tipo2 = $tipo3;
    }
    
    $contador = $selector->traerContadorTrabajosUsuario($ID);
    if($contador != 0){
        $contador = $contador + 1;
    
        $ruta = $ID."-". $contador.".".$tipo2;
        
        move_uploaded_file($archivo, "../../assets/trabajos-usuarios/" . $ruta);
        
        $insertador->insertarTrabajo($ID, $ruta, $contador, $titulo_del_trabajo, $desc_del_trabajo);
            
        echo "OK";
    
        
    }else{//Es su primer trabajo a subir
        $contador = 1;
        
        $ruta = $ID."-1.".$tipo2;
    
        move_uploaded_file($archivo, "../../assets/trabajos-usuarios/" . $ruta);
        
        $insertador->insertarTrabajo($ID, $ruta, $contador, $titulo_del_trabajo, $desc_del_trabajo);

        echo "OK";
    }

    
        
    
    


?>