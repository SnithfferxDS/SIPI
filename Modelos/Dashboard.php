<?php
    include "../Clases/Model.php";
    include "../../api/conexion/conexion.php";
    class Dashboard
    {
        private $prueba_model;

        public function get_All_Orders()
        {
            
            if(isset($cas))
            {
                $query = $conn->consulta("SELECT * FROM usuarios WHERE nombre LIKE '%".$cas."%'");
            }
            else
            {
                $query = $conn->consulta("SELECT * FROM usuarios");
            }
            $arreglo = array();
            while($row = mysql_fetch_array($query, MYSQL_NUM))
            {
                $arreglo[] = $row;
            }
            return $arreglo;
            $conn->cerrar();
        }

        public function get_mesage()
        {
            $message= "Estas en Pruebas";
            return $message;
        }
    }
?>