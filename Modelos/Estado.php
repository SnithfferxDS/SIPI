<?php
    include "../sipimini/Clases/Model.php";
    class Estado
    {
        public function get_All_Status()
        {
            $model = new Model;
            $status = $model->get_All_Elemnts('estados');
            return $status;
        }
    }
?>