<?php
    $controller = 'Dashboard';
    $method = 'index';
    $params = array();

    if(file_exists('Controles/' . $_POST['controlador'] . '.Controller.php'))
    {
        $controller = $_POST['controlador'];
        require_once 'controles/' . $controller . '.Controller.php';

        $controller = new $controller;
        
        if(method_exists($controller, $_POST['metodo']))
        {
            $method = array($_POST['controlador'], $_POST['metodo']);
            $params = $_POST['datos'] ? array_values($_POST['datos']) : array();
            /* $metodo = array($this->controller,$this->method); */
            call_user_func_array($method, $params);
        }
    }
?>