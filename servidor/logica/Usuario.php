<?php
/**
 * @author Carlos Elguedo, Zamir Martelo, Rafael Castellar
 * @copyright 2016
 */

class Usuario{
    var $nombre;
    var $correo;
    var $telefono;
    var $edad;
    var $tipo;
    var $pass;
    var $fechaNac;

    public function __construct($datos) {
        $this->nombre = $datos["nombres"];
        $this->correo = $datos["email"];
        $this->edad = $datos["edad"];
        $this->tipo = $datos["tipo"];
        $this->pass = $datos["contra"];
        $this->fechaNac = $datos["f_nac"];
        $this->telefono = "";
    }


    //Getters...
    public function get_Nombres(){
        return $this->nombre;
    }
    public function get_Correo(){
        return $this->correo;
    }
    public function get_Telefono(){
        return $this->telefono;
    }
    public function get_Edad(){
        return $this->edad;
    }
    public function get_Tipo(){
        return $this->tipo;
    }
    public function get_Pass(){
        return $this->pass;
    }
    public function get_FechaNac(){
        return $this->fechaNac;
    }
    public function to_string(){
        return "Nombre: " . $this->nombre . " Correo: " . $this->correo . " Tipo Usuario: " . $this->tipo;
    }

    //Setters...
    public function set_Nombres($valor=''){
        $this->nombre = $valor;
    }
    public function set_Correo($valor=''){
        $this->correo = $valor;
    }
    public function set_Telefono($valor=''){
        $this->telefono = $valor;
    }
    public function set_Edad($valor=''){
        $this->edad = $valor;
    }
    public function set_Tipo($valor=''){
        $this->tipo = $valor;
    }
    public function set_Pass($valor=''){
        $this->passs = $valor;
    }
    public function set_FechaNac($valor=''){
        $this->fechaNac = $valor;
    }







}

 ?>