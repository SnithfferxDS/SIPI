<?php
    include "../sipimini/Clases/Controller.php";
    include "../sipimini/Modelos/Tarjeta.php";
    class Tarjetas
    {
        public function index()
        {
            //Se instancian las clases necesarias.
            $modelo = new Tarjeta;
            //Se llama una función que trae todos los casilleros del modelo Casillero.
            $datos = $modelo->get_All_Cards();

            //Se crea la tabla
            $arreglo_de_tabla = '';
            $tibari = "";
            //Acoplamiento de mensajes
            $arreglo_de_tabla = "<h3><strong>" . $datos['mensaje'] . "</strong></h3>
                                  <h3 class='text_alert'><strong>" . $datos['errores'] . "</strong></h3>";

            $size2D = count($datos['registros']);
            for($a = 0; $a < $size2D; $a++)
            {
                $size3D = count($datos['registros'][$a]);

                $tibari .= "<tr>";
                $tibari .= "<td style='Display:none;'>" . $datos['registros'][$a][0] . "</td>";
                $tibari .= "<td style='text-align:center;'>" . $datos['registros'][$a][1] . "</td>";
                $tibari .= "<td style='text-align:center;'>" . $datos['registros'][$a][2] . "</td>";
                $tibari .= "<td style='text-align:center;'>" . $datos['registros'][$a][4] . "</td>";
                $tibari .= "<td style='text-align:center;'>" . $datos['registros'][$a][5] . "</td>";
                if($datos['registros'][$a][7] > 0)
                {
                    $tibari .= "<td style='text-align:center;'> Usar </td>";
                }
                else
                {$tibari .= "<td style='text-align:center;'> No Usar </td>";}
                $tibari .= "<td style='text-align:center;'>" . $datos['registros'][$a][10] . "</td>";
                $tibari .= "<td class='bg-primary' style='text-align:center'><a href='#' class='editStores' style='color:#fff;'><i class='fa fa-edit fa-2x'></i></a></td>";
                $tibari .= "<td class='bg-alert' style='text-align:center'><a href='#' class='storeDetails' style='#fff'><i class='fa fa-eye fa-2x'></i></a></td>";
                $tibari .= "</tr>";
            }
            $arreglo_de_tabla .= "<table class='table-striped'>
                                    <thead>
                                        <tr>
                                            <th style='Display:none;'>ID</th>
                                            <th>Nombre</th>
                                            <th>N&uacute;mero</th>
                                            <th>Vencimiento</th>
                                            <th>L&iacutemite</th>
                                            <th>Usarse</th>
                                            <th>Disponible</th>
                                            <th colspan='2'></th>
                                        </tr>
                                    </thead>
                                    <tbody>" . $tibari . "</tbody>
                                    </table>";

            echo $arreglo_de_tabla;
        }
    }