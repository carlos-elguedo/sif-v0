<?php

session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../accesoDatos/DAOactualizador.php';


$actualizador = new DAOactualizador();

$tipo = $_POST['usuario'];

$ID = $_SESSION["id_usuario"];


if($tipo == "1"){//Si tenemnos datos de un trabajador
    $exp = $_POST['e1'];
    $tel = $_POST['e2'];
    $tel2 = $_POST['e3'];
    $dir = $_POST['e4'];
    $pro = $_POST['e5'];
    $bandera = false;
    
    
    if($exp != "" ){
        $actualizador->actualizarExperiencia($exp, $ID);
	$bandera = true;
    }
    
   if($tel != "" ){		
        $actualizador->actualizarTelefono($tel, $ID);
        $bandera = true;
    }
    
    if($tel2 != "" ){
        $actualizador->actualizarTelefono_dos($tel2, $ID);
	$bandera = true;
    }
    
    if($dir != "" ){
        $actualizador->actualizarDireccion($dir, $ID);
	$bandera = true;
    }
    
    if($pro != "" ){
        $actualizador->actualizarServicio($pro, $ID);
	$bandera = true;
    }
    
    if($bandera == true){//Si se ha actualizado algun dato:
            
        echo "<script type = 'text/javascript'>
                alert('Se han cambiado  los datos');
                location.href = 'index.html';
            </script>";
    }

    
    
    
    
}//Final del tipo 1


if($tipo == "2"){//Si tenemnos que editar la descripcion de un trabajador
    
    $descripcionNueva = $_POST['des'];
    
    $bandera = false;
    
    if($descripcionNueva != ""){
        $actualizador->actualizarDescripcionTrabajador($descripcionNueva, $ID);
        $bandera = true;
    }
    
    
    if($bandera == true){
            echo "<script type = 'text/javascript'>
                alert('Se ha actualizado tu descripción');
                location.href = 'index.html';
            </script>";
    }
    
    
    
}

if($tipo == "3"){//Si tenemnos que guardar un nuevo trabajo
    
    
    
}

if($tipo == "20"){//Si tenemnos que editar los datos de un usuario cliente
    $nombre = $_POST['e1'];
    $contrase = $_POST['e2'];
    $telefono = $_POST['e3'];
    $bandera = false;
    
    if($nombre != "" ){
        $actualizador->actualizarNombreUsuario($nombre, $ID);
	$bandera = true;
    }
    
    if($contrase != "" ){
        $actualizador->actualizarPassUsuario($contrase, $ID);
	$bandera = true;
    }
    
    if($telefono != "" ){
        $actualizador->actualizarTelefonoUsuario($telefono, $ID);
	$bandera = true;
    }
    
    
    if($bandera == true){//Si se ha actualizado algun dato:
            
        echo "<script type = 'text/javascript'>
                alert('Se han actualizado tu información');
                location.href = 'index.html';
            </script>";
    }
    
}//Fin del tipo 20

?>