<?php
require_once ('Usuario.php');
require_once ('Perfil.php');
require_once ('Servicio.php');

/**
 * @author Carlos Elguedo, Rafael Castellar Zamir Martelo
 * @version 1.0
 * @created 29-oct-2016 02:06:22 p.m.
 */

class Trabajador_Independiente extends Usuario{
    
    var $id;
    var $id_trabajador;
    var $servicio;
    var $rutaImagen;
    var $ciudad;
    var $perfil;
    var $servicio_objeto;
    

    function Trabajador_Independiente($trabajadorDB){
        
        $this->id               = $trabajadorDB["id_usuario"];
        $this->id_trabajador    = $trabajadorDB["id_trabajador"];
        $this->nombre           = $trabajadorDB["nombre"];
        $this->correo           = $trabajadorDB["correo"];
        $this->servicio         = $trabajadorDB["servicio"];
        $this->telefono         = $trabajadorDB["telefono"];
        $this->ciudad           = $trabajadorDB["ciudad"];
        $this->rutaImagen       = $trabajadorDB["ruta_imagen"];
        //$this->perfil = new Perfil();
        //$this->servicio_objeto = new Servicio();
        
    }
    public function __construct($datos) {
            parent::__construct($datos);
    }


    
    function getId() {
        return $this->id;
    }

    function getId_trabajador() {
        return $this->id_trabajador;
    }

    function getServicio() {
        return $this->servicio;
    }

    function getRutaImagen() {
        return $this->rutaImagen;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function getServicio_objeto() {
        return $this->servicio_objeto;
    }

    function setServicio_objeto($servicio_objeto) {
        $this->servicio_objeto = $servicio_objeto;
    }
    
    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function setId_trabajador($id_trabajador) {
        $this->id_trabajador = $id_trabajador;
    }

    function setServicio($servicio) {
        $this->servicio = $servicio;
    }

    function setRutaImagen($rutaImagen) {
        $this->rutaImagen = $rutaImagen;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }



}
?>