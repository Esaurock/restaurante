<?php

namespace App\Http;

class Request
{
    private $controller;
    private $method;
    private $id;

    public function __construct()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $segment = explode("/", $uri);
        
        // llamando al controlador
        $controller = $segment[1];
        $this->setController($controller);

        // llamando al setMethod

        // llamamndo setId 
        $id = $segment[2];
        $this->setId($id);
    }

    public function send()
    {
        echo "<p>Controlador</p>";
        var_dump($this->getController());
    
        echo "<p>Id</p>";
        var_dump($this->getId());
    
    }

    public function getController()
    {
        return $this->controller;
    }
    public function setController($controller)
    {
        if (!empty($controller)) {
            $controller = strtolower($controller);
            $controller = ucfirst($controller);
            $this->controller = "App\Http\Controllers\\" . $controller . "Controller";
        } else {
            $this->controller = "\App\Http\Controllers\HomeController";
        }
    }

    public function getMethod()
    {
        return $this->method;
    }
    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        if (!empty($id)) {
            $this->id = $id;
        } else {
            $this->id = 0;
        }
    }
}
