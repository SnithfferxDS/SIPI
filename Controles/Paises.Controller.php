<?php
    include "../sipimini/Clases/Controller.php";
    include "../sipimini/Modelos/Pais.php";
    class Paises
    {
        public function index()
        {
            //Se instancian las clases necesarias.
            $modelo = new Pais;
            //Se llama una función que trae todos los casilleros del modelo Casillero.
            $datos = $modelo->get_All_Countries();

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
                if ($datos['registros'][$a][2] > 0)
                {
                    $tibari .= "<td style='text-align:center;'> Si Cobra </td>";
                }
                else
                {
                    $tibari .= "<td style='text-align:center;'> No Cobra </td>";
                }
                $tibari .= "<td style='text-align:center;'>" . $datos['registros'][$a][3] . "</td>";
                $tibari .= "<td style='text-align:center;'>" . $datos['registros'][$a][4] . "%</td>";
                $tibari .= "<td class='bg-primary' style='text-align:center'><a href='#' class='editCountries' style='color:#fff;'><i class='fa fa-edit fa-2x'></i></a></td>";
                $tibari .= "<td class='bg-alert' style='text-align:center'><a href='#' class='CountryDetails' style='#fff'><i class='fa fa-eye fa-2x'></i></a></td>";
                $tibari .= "</tr>";
            }
            
            $arreglo_de_tabla .= "<table class='table-striped'>
                                    <thead>
                                        <tr>
                                            <th style='Display:none;'>ID</th>
                                            <th>Nombre</th>
                                            <th>Cobra Impuesto</th>
                                            <th>IMPEX</th>
                                            <th>Descuento / TLC</th>
                                            <th colspan='2'></th>
                                        </tr>
                                    </thead>
                                    <tbody>" . $tibari . "</tbody>
                                    </table>";

            echo $arreglo_de_tabla;
        }
    }
?>