<?php
    if(isset($_POST['metodo']))
    {
        if(file_exists($_POST['controlador']))
        {
            require_once 'controles/'.$_POST['controlador'].'.Controller.php';
            $control = new $_POST['comtrolador'];

            if(method_exists($control, $_POST['metodo']))
            {
                $parametros = $_POST['datos'];
                call_user_func_array($control, $parametros);
            }
        }
    }

    if(isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];
        switch($action) {
            case 'test' : test();break;
            case 'blah' : blah();break;
            // ...etc...
        }
    }
    /* if(isset($_POST['action']) && !empty($_POST['action']))
    {
        $pobox = new PoBoxes;
        $action = $_POST['action'];
        $params = $_POST['valores'];
        switch($action)
        {
            case 'index' : $pobox->index();break;
            case 'create' : $pobox->create($params);break;
        }
    } */
?>