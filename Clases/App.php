<?php
    class App
    {
        protected $controller = 'Dashboard';
        protected $method = 'index';
        protected $params = array();

        public function __construct()
        {
            $file = $_POST['control'];
            $metodo = $_POST['metodo'];
            $parametros = $_POST['data'];

            if(file_exists('../Controles/' . $file . '.Controller.php'))
            {
                $this->controller = $file;
            }
            
            require_once '../Controles/' . $this->controller . '.Controller.php';

            $this->controller = new $this->controller;

            if(isset($metodo))
            {
                if(method_exists($this->controller, $metodo))
                {
                    $this->method = $metodo;
                }
            }
            $this->params = $parametros ? array_values($parametros) : array();
            $metodo = array($this->controller,$this->method);
            call_user_func_array($metodo, $this->params);
            

        }

        public function parseurl()
        {
            /*if(isset($_GET['url']))
            {
                //echo $_GET['url'];
                return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            }
            */
            if(isset($_POST['url']))
            {
                return $url = explode('/', filter_var(rtrim($_POST['url'], '/'), FILTER_SANITIZE_URL));
            }
        }
    }
?>