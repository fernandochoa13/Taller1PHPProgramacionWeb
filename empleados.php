<?php

class empleadodatos{

    private $nombre = "";
    private $apellido = "";
    private $edad = 0;
    private $gen = "";
    private $civil = "";
    private $sueldo = 0;

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre =$nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        return $this->apellido = $apellido;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function setEdad($edad){
        $this->edad =$edad;
    }

    public function getGenero(){
        return $this->gen;
    }

    public function setGenero($gen){
        $this->gen =$gen;
    }

    public function getEstadoCivil(){
        return $this->civil;
    }

    public function setEstadoCivil($civil){
        $this->civil = $civil;
    }
    
    public function getSueldo(){
        return $this->sueldo;
    }

    public function setSueldo($sueldo){
        $this->sueldo =$sueldo;
    }
}


?>