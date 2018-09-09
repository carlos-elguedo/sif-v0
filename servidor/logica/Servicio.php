<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Servicio{
    
    var $id_servicio;
    var $id_trabajador;
    var $nombre_servicio;
    var $area_servicio;
    var $detalles_del_trabajador;
    
    
    function __construct($datos) {
        $this->id_servicio = $datos["id_servicio"];
        $this->id_trabajador = $datos["id_trabajador"];
        $this->nombre_servicio = $datos["nombre"];
        $this->area_servicio = $datos["area"];
        $this->detalles_del_trabajador = $datos["descripcion"];
    }
    
    function getNombre_servicio() {
        return $this->nombre_servicio;
    }

    function getArea_servicio() {
        return $this->area_servicio;
    }

    function getDetalles_del_trabajador() {
        return $this->detalles_del_trabajador;
    }

    function getId_servicio() {
        return $this->id_servicio;
    }

    function getId_trabajador() {
        return $this->id_trabajador;
    }

    function setId_servicio($id_servicio) {
        $this->id_servicio = $id_servicio;
    }

    function setId_trabajador($id_trabajador) {
        $this->id_trabajador = $id_trabajador;
    }
        
    function setNombre_servicio($nombre_servicio) {
        $this->nombre_servicio = $nombre_servicio;
    }

    function setArea_servicio($area_servicio) {
        $this->area_servicio = $area_servicio;
    }

    function setDetalles_del_trabajador($detalles_del_trabajador) {
        $this->detalles_del_trabajador = $detalles_del_trabajador;
    }

    function toString() {
        return "Servicio prestado: " . $this->getArea_servicio();
    }
    
}
