<?php
/**
 * @author Carlos Elguedo, Zamir Martelo, Rafael Castellar
 * @copyright 2016
 */
session_start();

//require("../accesoDatos/DAOinicioSesion.php");
require("../accesoDatos/DAOselector.php");
require('Cliente.php');
require('Trabajador_Independiente.php');



//Tomamos los datos desde el usuario
$metodo  = mysql_real_escape_string($_POST['metodo']);


//$daoInicioSesion = new DAOinicioSesion();
$selector = new DAOselector();

$ID = $_SESSION["id_usuario"];


if(strcmp($metodo, "1")== 0){
    
    $palabra  = mysql_real_escape_string($_POST['palabra']);
    
    $tipo_usuario = $selector->darTipoUsuario($ID);
    
    if(strcmp($tipo_usuario, "Cliente")== 0){
        
        $datosUsuarioCliente = $selector->seleccionarCliente($ID);
        
        $datosBanderas = array("nombres"=> "", "contra"=> "", "email"=> "", "edad"=> 0, "f_nac"=> "0000-00-00", "tipo"=> "Cliente");
        $cliente = new Cliente($datosBanderas);

        $cliente->Cliente($datosUsuarioCliente);
        
        $resultados = $selector->buscarTrabajadores($palabra);
        
        $_SESSION["RESULTADOS_DE_BUSQUEDA"] = $resultados;
        
        $cliente->buscarTrabajador($resultados);

    }
    
}//Fin del metodo 1

if(strcmp($metodo, "2")== 0){//Para las busquedas realizadas por los trabajadores
    
    $palabra  = mysql_real_escape_string($_POST['palabra']);
    
    $tipo_usuario = $selector->darTipoUsuario($ID);
    
    if(strcmp($tipo_usuario, "Cliente")== 0){
        
        echo "<div class='4u 12u$(mobile)''>
			    <article class='item'>
                    class='image fit'><img src='http://localhost/SIF/servidor/assets/imagenes-Perfil/avatar.jpg' />
                    <header>
			            <h3 class = 'datos'>Estas tratando de buscar de manera erronea, por favor sigue el proceso correctamente</h3>    
                    </header>
		        </article>
            </div>";

    }else{
        
        //$datosUsuarioCliente = $selector->seleccionarCliente($ID);
        
        $datosBanderas = array("nombres"=> "", "contra"=> "", "email"=> "", "edad"=> 0, "f_nac"=> "0000-00-00", "tipo"=> "Cliente");
        $cliente = new Cliente($datosBanderas);

        //$cliente->Cliente($datosUsuarioCliente);
        
        $resultados = $selector->buscarTrabajadores($palabra);
        
        $_SESSION["RESULTADOS_DE_BUSQUEDA"] = $resultados;
        
        $cliente->buscarTrabajador($resultados);
    }
    
}//Fin del metodo 2


?>