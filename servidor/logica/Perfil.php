<?php

//session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Perfil{
    var $id_perfil;
    var $id_usuario;
    var $id_trabajador;
    var $telefono2;
    var $descripcion;
    var $experiencia;
    var $direccion;
    
    
    function __construct($datos) {
        $this->id_perfil = $datos["id_perfil"];
        $this->id_usuario = $datos["id_usuario"];
        $this->id_trabajador = $datos["id_trabajador"];
        $this->telefono2 = $datos["telefono_dos"];
        $this->descripcion = $datos["descripcion"];
        $this->experiencia = $datos["experiencia"];
        $this->direccion = $datos["direccion"];
    }
    
    
    
    
    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_trabajador() {
        return $this->id_trabajador;
    }

    function getTelefono2() {
        return $this->telefono2;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getExperiencia() {
        return $this->experiencia;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getId_perfil() {
        return $this->id_perfil;
    }

    function setId_perfil($id_perfil) {
        $this->id_perfil = $id_perfil;
    }
    
    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_trabajador($id_trabajador) {
        $this->id_trabajador = $id_trabajador;
    }

    function setTelefono2($telefono2) {
        $this->telefono2 = $telefono2;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setExperiencia($experiencia) {
        $this->experiencia = $experiencia;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }


    
    
    
}

?>