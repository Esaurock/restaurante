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

        // llamamndo setId 
        $id = $segment[2];
        $this->setId($id);

        // llamando al setMethod
        $method = $_SERVER['REQUEST_METHOD'];
        $this->setMethod($method);

    }

    public function send()
    {
        echo "<p>Controlador</p>";
        var_dump($this->getController());

        echo "<p>Id</p>";
        var_dump($this->getId());

        echo "<p>Method</p>";
        var_dump($this->getMethod());
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
        if ($method == "GET") {
            if ($this->getId() == 0) {
                $this->method = "index";
            } else {
                $this->method = "show";
            }
        }

        if ($method == "POST") $this->method = "store";
        if ($method == "PUT" || $method == "PATCH") $this->method = "update";
        if ($method == "DELETE") $this->method = "destroy";
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
