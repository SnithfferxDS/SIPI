<?php
    include "../sipimini/Modelos/Estado.php";
    include "../sipimini/Clases/Controller.php";
    
    class Estados extends Controller
    {
        public function index()
        {   

            $modelo = new Estado;
            $datos = $modelo->get_All_Status();
            $arreglo_de_tabla = '';
            $tibari = "";

            $arreglo_de_tabla = "<h1><strong>" . $datos['mensaje'] . "</strong></h1>
                                  <h1 class='text_alert'><strong>" . $datos['errores'] . "</strong></h1>";

            $size2D = count($datos['registros']);
            for($a = 0; $a < $size2D; $a++)
            {
                $size3D = count($datos['registros'][$a]);

                $tibari .= "<tr>";
                $tibari .= "<td style='display: none;'>" . $datos['registros'][$a][0] . "</td>";
                for($b = 1; $b < $size3D-2; $b++)
                {
                    $tibari .= "<td>" . $datos['registros'][$a][$b] . "</td>";
                }
                $tibari .= "<td class='bg-primary' style='text-align:center'><a href='#' class='editPoBox' style='color:#fff;'><i class='fa fa-edit fa-2x'></i></a></td>";
                $tibari .= "<td class='bg-alert' style='text-align:center'><a href='#' class='detailsPoBox' style='#fff'><i class='fa fa-eye fa-2x'></i></a></td>";
                $tibari .= "</tr>";
            }
            
            $arreglo_de_tabla .= "<table class='table-striped'>
                                    <thead>
                                        <tr>
                                            <th style='display: none;'>ID</th>
                                            <th>Nombre</th>
                                            <th>Alias</th>
                                            <th>Descripci&oacute;n</th>
                                            <th colspan='2'></th>
                                        </tr>
                                    </thead>
                                    <tbody>" . $tibari . "</tbody>
                                    </table>";
            echo $arreglo_de_tabla;
        }
    }
?>