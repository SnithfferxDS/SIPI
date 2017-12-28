<?php
    class Dashboard
    {
        public function index($user = 61)
        {
            include_once "../Clases/Model.Class.php";
            $buscador = new Model;

            if( $user == 61)
            {
                $consulta_ordenes = $buscador->custom_Query("SELECT * FROM ordenes WHERE user = $user");
                // if(mysql_num_rows() > 0)
                //{
                    while($fila = mysql_fetch_array($consulta_ordenes))
                    { 
                        $ordenes['fecha'] = $fila['fecha'];
                        $ordenes['product'] = $fila['product'];
                        $ordenes['costo'] = $fila['costo'];
                        $estados = $buscador->custom_Query("SELECT nombre FROM estados WHERE id = ".$fila['estado']);
                        $ordenes['estado'] = $estados['estado'];
                        $ordenes['enlace'] = $consulta_ordenes['enlace'];
                    }
                //}
                //return $ordenes;
            }
            elseif($user == 65)
            {
                $consulta_ordenes = $buscador->custom_Query("SELECT * FROM ordenes WHERE user = $user AND estado > 1");
                //if(mysql_num_rows() > 0)
                //{
                    while($row=mysql_fetch_array($consulta_ordenes))
                    {
                        $ordenes['fecha'] = $row['fecha'];
                        $ordenes['product'] = $row['product'];
                        $ordenes['costo'] = $row['costo'];
                        $estados = $buscador->custom_Query("SELECT nombre FROM estados WHERE id = ".$fila['estado']);
                        $ordenes['estado'] = $estados['estado'];
                        $ordenes['enlace'] = $row['enlace'];
                    }
                //}
            }
            else
            {
                $consulta_ordenes = $conn->consulta("SELECT * FROM ordenes WHERE user = $user AND estado > 1");
                if(mysql_num_rows() > 0)
                {
                    while($row=mysql_fetch_array($consulta_ordenes))
                    {
                        $ordenes['fecha'] = $row['fecha'];
                        $ordenes['product'] = $row['product'];
                        $ordenes['costo'] = $row['costo'];
                        $ordenes['estado'] = $row['estado'];
                        $ordenes['enlace'] = $row['enlace'];
                    }
                }
            }

            if( $user == 61)
            {
                $consulta_cotizaciones = $conn->consulta("SELECT * FROM cotizaciones WHERE user = $user AND estado > 1");
                if(mysql_num_rows() > 0)
                {
                    while($row=mysql_fetch_array($consulta_cotizaciones))
                    {
                        $cotizaciones['fecha'] = $row['fecha'];
                        $cotizaciones['product'] = $row['product'];
                        $cotizaciones['costo'] = $row['costo'];
                        $cotizaciones['estado'] = $row['estado'];
                        $cotizaciones['enlace'] = $row['enlace'];
                    }
                }
            }
            elseif($user == 65)
            {
                $consulta_cotizaciones = $conn->consulta("SELECT * FROM cotizaciones WHERE user = $user AND estado > 1");
                if(mysql_num_rows() > 0)
                {
                    while($row=mysql_fetch_array($consulta_cotizaciones))
                    {
                        $cotizaciones['fecha'] = $row['fecha'];
                        $cotizaciones['product'] = $row['product'];
                        $cotizaciones['costo'] = $row['costo'];
                        $cotizaciones['estado'] = $row['estado'];
                        $cotizaciones['enlace'] = $row['enlace'];
                    }
                }
            }
            else
            {
                $consulta_cotizaciones = $conn->consulta("SELECT * FROM cotizaciones WHERE user = $user AND estado > 1");
                if(mysql_num_rows() > 0)
                {
                    while($row=mysql_fetch_array($consulta_cotizaciones))
                    {
                        $cotizaciones['fecha'] = $row['fecha'];
                        $cotizaciones['product'] = $row['product'];
                        $cotizaciones['costo'] = $row['costo'];
                        $cotizaciones['estado'] = $row['estado'];
                        $cotizaciones['enlace'] = $row['enlace'];
                    }
                }
            }
            $datos['ordenes'] = $ordenes;
            $datos['cotizaciones'] = $cotizaciones;
            return $datos;
        }
    }
?>