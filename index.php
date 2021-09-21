<?php

    require 'config.php';

    $controller = "";
    $method = "";
    $params = "";

    $url = $_GET["url"] ?? "Index/index";
    $arrayUrl = explode("/", $url);

    if (isset($arrayUrl[0])) {
        $controller = $arrayUrl[0]; //obteniendo el nombre del controlador
    }

    if (isset($arrayUrl[1])) {
        if ($arrayUrl[1] != '') {
            $method = $arrayUrl[1]; //obteniendo el nombre del método de acción
        }
    }

    if (isset($arrayUrl[2])) {
        if ($arrayUrl[1] != '') {
            $params = $arrayUrl[2]; //obteniendo el parámetro
        }
    }

    spl_autoload_register(function($class){ //comprobamos que exista el archivo con la clase en la carpeta Library
        if (file_exists(LIBS.$class.".php")) {
            require LIBS.$class.".php"; //si existe lo agregamos
        }
    });
    
    $controller = $controller.'Controller';
    $controllersPath = "Controllers/".$controller.'.php'; //Comprobamos que exista el controlador en la carpeta Controllers
    if (file_exists($controllersPath)) {
        require $controllersPath;
        $controller = new $controller(); 

    }

?>