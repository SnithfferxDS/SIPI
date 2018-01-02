<?php
    include "../sipimini/Clases/Model.php";
    class Tarjeta
    {
        public function get_All_Cards()
        {
            $model = new Model;
            $cards = $model->get_All_Elemnts('tarjetas');
            return $cards;
        }
    }
?>