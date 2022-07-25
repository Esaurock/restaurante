<?php

// llama a la carpeta donde se encuentra  la clase request
use App\Http\Request;

require __DIR__ . "./../vendor/autoload.php";

$request = new Request();

$request->send();

// para correr el hp sin xampp 
// php -S localhost:8080 .\public\index.php
