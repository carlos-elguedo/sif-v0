<?php
/**
 * @author Carlos Elguedo, Zamir Martelo, Rafael Castellar
 * @copyright 2016
 */
session_start();

require("../accesoDatos/DAOinicioSesion.php");
require("../accesoDatos/DAOselector.php");
require('Cliente.php');
require('Trabajador_Independiente.php');



//Tomamos los datos desde el formulario
$usuario = mysql_real_escape_string($_POST['correo']);//obtenemos los datos del post
$contra  = mysql_real_escape_string($_POST['pass']);


$daoInicioSesion = new DAOinicioSesion();
$selector = new DAOselector();


$estado_de_la_entrada = $daoInicioSesion->iniciarSesion($usuario, $contra);

//Inicio de sesion correcto para el cliente, puede ingresar al sistema
if( $estado_de_la_entrada == 1 ){
    //echo "Bienvenido prro Cliente";
    
    $id = $selector->darIdUsuario($usuario);
    
    //$datosUsuarioCliente = $selector->seleccionarCliente($id);
    //$datosBanderas = array("nombres"=> "", "contra"=> "", "email"=> "", "edad"=> 0, "f_nac"=> "0000-00-00", "tipo"=> "Cliente");
    //$cliente = new Cliente($datosBanderas);
    //$cliente->Cliente($datosUsuarioCliente);
    
    $_SESSION["id_usuario"] = $id;
    
    
    echo "<script type = 'text/javascript'>
            //alert('Bienvenido a SIF...');
            location.href = 'sif/cliente/';
            </script>";
}

//Inicio de sesion correcto para el trabajador, puede ingresar al sistema
if( $estado_de_la_entrada == 2 ){
    //echo "Bienvenido prro Trabajador";
    
    $id = $selector->darIdUsuario($usuario);
    
    //$datosUsuarioTrabajador = $selector->seleccionarTrabajador($id);
    //$datosBanderas = array("nombres"=> "", "contra"=> "", "email"=> "", "edad"=> 0, "f_nac"=> "0000-00-00", "tipo"=> "Cliente");
    //$trabajador = new Trabajador_Independiente($datosBanderas);
    //$trabajador->Trabajador_Independiente($datosUsuarioTrabajador);
    
    $_SESSION["id_usuario"] = $id;
    
    echo "<script type = 'text/javascript'>
            //alert('Bienvenido a SIF...');
            location.href = 'sif/trabajador/';
            </script>";
}
//Para cuando se equivoca en el correo, no existe el correo
if( $estado_de_la_entrada == 3 ){
    //echo "Ese correo no existe prro ";
    echo "<script type = 'text/javascript'>
            $('#mensaje2').html('');
            alert('El correo no existe');
            </script>";
}

if( $estado_de_la_entrada == 4 ){
    //echo "Ese contraseña esta mala prro ";
    echo "<script type = 'text/javascript'>
            $('#mensaje2').html('');
            alert('La contraseña es incorrecta');
            </script>";
}

//Para cuendo todos los datos son incorrectos
if( $estado_de_la_entrada == 9 ){
    //echo "Para donde Bienes prro";
}


?>