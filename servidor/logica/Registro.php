<?php
/**
 * @author Carlos Elguedo, Zamir Martelo, Rafael Castellar
 * @copyright 2016
 */
session_start();
include("../accesoDatos/DAOregistro.php");
//require("../accesoDatos/DAOselector.php");
require('Usuario.php');
require('Cliente.php');
require('Trabajador_Independiente.php');


$nombre;$contra;$email;$edad;$fecha_naci;$tipo;//variables del formulario

				if(! get_magic_quotes_gpc() ){//obtenemos los datos del post
					$nombre = addslashes ($_POST['nombre']);
					$fecha_naci = addslashes ($_POST['edad']);
					$email = addslashes ($_POST['email']);
					$contra = addslashes ($_POST['pass']);
					$tipo = addslashes ($_POST['tipo']);
				}else{
					$nombre = $_POST['nombre'];
					$fecha_naci = $_POST['edad'];
					$email = $_POST['email'];
					$contra = $_POST['pass'];
					$tipo = $_POST['tipo'];
                }
//Funcion para calcular la edad
function calcular_edad($fecha){
	list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}
$edad = calcular_edad($fecha_naci);

//Guardamos los datos en un array y lo enviamos a la funcion DAO que registra el usuario
$nuevoUsuario = array("nombres"=> $nombre, "contra"=> $contra, "email"=> $email, "edad"=> $edad, "f_nac"=> $fecha_naci, "tipo"=> $tipo);

//echo $nuevoUsuario["nombres"] . " - " . $nuevoUsuario["f_nac"]; 

$usuario = new Usuario($nuevoUsuario);

$daoRegistro = new DAOregistro($usuario);

$selectorRegistro = new DAOselector();



if($daoRegistro-> registrarUsuario()){
    //echo "Si se registro<br/>";
    
    $daoRegistro->usuarioNuevo;
    
    $id_usu = $selectorRegistro->darIdUsuario($email);
    
    if($usuario->get_Tipo() === "Cliente"){
        $cliente = new Cliente($nuevoUsuario);
        $_SESSION["id_usuario"] = $id_usu;
        //echo "Se registro: ". $cliente->get_FechaNac();
        
        echo "<script type = 'text/javascript'>
            //alert('Bienvenido a SIF...');
            location.href = 'sif/cliente/?primeravez=1';
            </script>";
        
    }else{
        $trabajador = new Trabajador_Independiente($nuevoUsuario);
        $_SESSION["id_usuario"] = $id_usu;
        //echo "Se registro: ". $trabajador->get_Edad();
        
        echo "<script type = 'text/javascript'>
            //alert('Bienvenido a SIF...');
            location.href = 'sif/trabajador/?primeravez=1';
            </script>";
    }
    
}else{
    echo "<script type = 'text/javascript'>
            $('#mensaje2').html('');
            alert('No se pudo registrar, hay un usuario con el mismo correo electronico');
            </script>";
}


?>