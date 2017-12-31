<?php
    include "../sipimini/Clases/Model.php";
    class Tienda
    {
        public function get_All_Stores()
        {
            $model = new Model;
            $stores = $model->get_All_Elemnts('tiendas');
            return $stores;
        }
    }