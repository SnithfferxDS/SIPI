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
            return $view . '.View.php';
        }
    }
?>