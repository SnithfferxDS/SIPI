<?php
    class Controller
    {
        public function model($model)
        {
            require_once 'Modelos/' . $model . '.Model.php';
            return new $model();
        }

        public function view($view, $data = array())
        {
            require 'Vistas/' . $view . '.View.php';
        }
    }
?>