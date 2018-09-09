<?php
/**
 * @author Carlos Elguedo, Zamir Martelo, Rafael Castellar
 * @copyright 2016
 */
require("conexion.php");

class DAOactualizador{

    public function __construct() {
        
    }

    //Esta funcion actualiza la experiencia de un usuario trabajador
    public function actualizarExperiencia($dato, $id_usuario) {
        $sql = "UPDATE `sif`.`perfil` SET `experiencia` = '$dato' WHERE `id_usuario` = '$id_usuario';";

	$consulta = mysql_query($sql) or die ("No se actualizo la experiencia ". mysql_error());
        
    }
    
    
    
    
    
    //Esta funcion actualiza el telefono de un usuario
    public function actualizarTelefono($dato, $id_usuario) {
        $sql = "UPDATE `sif`.`trabajadores` SET `telefono`='$dato' WHERE `id_usuario` = '$id_usuario';";

	$consulta = mysql_query($sql) or die ("No se actualizo el telefono: ". mysql_error());
        
    }
    
    
    
    
    
    //Esta funcion actualiza el segundo telefono de un usuario trabajador
    public function actualizarTelefono_dos($dato, $id_usuario) {
        $sql = "UPDATE `sif`.`perfil` SET `telefono_dos` = '$dato' WHERE `id_usuario` = '$id_usuario';";

	$consulta = mysql_query($sql) or die ("No se actualizo el telefono dos: ". mysql_error());
        
    }
    
    
    
    
    //Esta funcion actualiza la direccion de un usuario
    public function actualizarDireccion($dato, $id_usuario) {
        $sql = "UPDATE `sif`.`perfil` SET `direccion` = '$dato' WHERE `id_usuario` = '$id_usuario';";

	$consulta = mysql_query($sql) or die ("No se actualizo la direccion: ". mysql_error());
        
    }
    
    
    
    //Esta funcion actualiza el servicio de un usuario
    public function actualizarServicio($dato, $id_usuario) {
        $sql = "UPDATE `sif`.`trabajadores` SET `servicio` = '$dato' WHERE `id_usuario` = '$id_usuario';";
        
        $sql2 = "UPDATE `sif`.`servicio` SET `nombre` = '$dato' WHERE `id_usuario` = '$id_usuario';";

	$consulta = mysql_query($sql) or die ("No se actualizo el servicio del trabajador: ". mysql_error());
        
        $consulta2 = mysql_query($sql2) or die ("No se actualizo el servicio la tabla servicio: ". mysql_error());
    }
    
    
    
    //Esta funcion actualiza la descipcion de un uaurio trabajador
    public function actualizarDescripcionTrabajador($dato, $id_usuario) {
        $sql = "UPDATE `sif`.`perfil` SET `descripcion` = '$dato' WHERE `id_usuario` = '$id_usuario';";
        
        $consulta = mysql_query($sql) or die ("No se actualizo la descripcion del trabajador: ". mysql_error());
    }
    
    
    
    
    //Esta funcion atualiza los nombre de un usuario
    public function actualizarNombreUsuario($dato, $id_usuario) {
        
        $tipo = "";
        
        $sqltraerTipo = "SELECT tipo_usuario FROM usuarios WHERE id = $id_usuario";
        
        $res = mysql_query($sqltraerTipo) or die ("No pudo traer el tipo de usuario: " . mysql_error());
        
        if(mysql_num_rows($res) > 0){
            $datos = mysql_fetch_assoc($res);
            $tipo = $datos["tipo_usuario"];
        }
        
        if(strcmp($tipo, "Cliente")==0){
            $sql = "UPDATE `sif`.`clientes` SET `nombre` = '$dato' WHERE `id_usuario` = '$id_usuario';";
            
            $consulta = mysql_query($sql) or die ("No se actualizo el nombre del cliente: ". mysql_error());
        }
        if(strcmp($tipo, "Trabajador")==0){
            $sql = "UPDATE `sif`.`trabajadores` SET `nombre` = '$dato' WHERE `id_usuario` = '$id_usuario';";
            
            $consulta = mysql_query($sql) or die ("No se actualizo el nombre del trabajador: ". mysql_error());
        }
       
    }//Fin de la funcion
    
    
    
    //Esta funcion actualiza la contrasenia de un usuario 
    public function actualizarPassUsuario($dato, $id_usuario) {
        $sql = "UPDATE `sif`.`usuarios` SET `password` = '$dato' WHERE `id` = '$id_usuario';";
            
        $consulta = mysql_query($sql) or die ("No se actualizo el nombre del cliente: ". mysql_error());
    }//Fin de la funcion    
    
    //Esta funcion actualiza el telefono de un usuario de culaquier tipo
    public function actualizarTelefonoUsuario($dato, $id_usuario) {
        
        $tipo = "";
        
        $sqltraerTipo = "SELECT tipo_usuario FROM usuarios WHERE id = $id_usuario";
        
        $res = mysql_query($sqltraerTipo) or die ("No pudo traer el tipo de usuario: " . mysql_error());
        
        if(mysql_num_rows($res) > 0){
            $datos = mysql_fetch_assoc($res);
            $tipo = $datos["tipo_usuario"];
        }
        
        if(strcmp($tipo, "Cliente")==0){
            $sql = "UPDATE `sif`.`clientes` SET `telefono` = '$dato' WHERE `id_usuario` = '$id_usuario';";
            
            $consulta = mysql_query($sql) or die ("No se actualizo el nombre del cliente: ". mysql_error());
        }
        if(strcmp($tipo, "Trabajador")==0){
            $sql = "UPDATE `sif`.`trabajadores` SET `telefono` = '$dato' WHERE `id_usuario` = '$id_usuario';";
            
            $consulta = mysql_query($sql) or die ("No se actualizo el nombre del trabajador: ". mysql_error());
        }
       
    }//Fin de la funcion    
    
    
    
    
    
    
    
}


?>