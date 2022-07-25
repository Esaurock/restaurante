<?php

namespace App;

class Comida
{
    private $name;
    private $precio;

    public function getName()
    {
        return $this->name;
        
    }
    public function setName($nombre)
    {
        return $this->name = $nombre;
    }

    public function __construct()
    {
        $this->name = "Sin Nombre";
        $this->precio = 0;
    }

}
