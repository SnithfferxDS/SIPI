<?php
    include "../Clases/Model.php";
    class Seguimiento
    {
        public function get_All_Trackings($id = null)
        {
            $model = new Model;
            $trackings = array();
            $orders = array();
            $orden = "SELECT id FROM ordenes WHERE cotizante = $id AND estado < 11";
            $orders = $model->custom_Query($orden);
            foreach($order as $orders['registros'])
            {
                $trackings = $model->custom_Query("SELECT * FROM segimientos WHERE orden = $order DESC");
            }
            return $trackings;
        }
    }
    $orden = new Seguimiento;
    $o = $orden->get_All_Trackings(5);
    print_r($o);
?>