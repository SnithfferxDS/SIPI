<?php
    include "../sipimini/Modelos/Categoria.php";
    include "../sipimini/Clases/Controller.php";
    class Categorias extends Controller
    {
        public function index()
        {
            $modelo = new Categoria;
            $datos = $modelo->get_All_Categories();
            $arreglo_de_tabla = '';
            $tibari = "";

            $arreglo_de_tabla = "<h1><strong>Casilleros" . $datos['mensaje'] . "</strong></h1>
                                  <h1 class='text_alert'><strong>" . $datos['errores'] . "</strong></h1>";

            $size2D = count($datos['registros']);
            for($a = 0; $a < $size2D; $a++)
            {
                $size3D = count($datos['registros'][$a]);

                $tibari .= "<tr>";
                $tibari .= "<td style='display: none;'>" . $datos['registros'][$a][0] . "</td>";
                $tibari .= "<td>" . $datos['registros'][$a][1] . "</td>";
                if($datos['registros'][$a][2] > 0)
                {
                    $tibari .= "<td>Si Paga</td>";
                }
                else{$tibari .= "<td>No Paga</td>";}
                if($datos['registros'][$a][3] > 0)
                {
                    $tibari .= "<td>Si Paga</td>";
                }
                else{$tibari .= "<td>No Paga</td>";}
                $tibari .= "<td>" . $datos['registros'][$a][4] . "% </td>";
                $tibari .= "<td>" . $datos['registros'][$a][5] . "% </td>";
                if($datos['registros'][$a][6] > 0)
                {
                    $tibari .= "<td>Si Requiere</td>";
                }
                else{$tibari .= "<td>No Requiere</td>";}
                $tibari .= "<td class='bg-primary' style='text-align:center'><a href='#' class='editPoBox' style='color:#fff;'><i class='fa fa-edit fa-2x'></i></a></td>";
                $tibari .= "<td class='bg-alert' style='text-align:center'><a href='#' class='detailsPoBox' style='#fff'><i class='fa fa-eye fa-2x'></i></a></td>";
                $tibari .= "</tr>";
            }
            
            $arreglo_de_tabla .= "<table class='table-striped'>
                                    <thead>
                                        <tr>
                                            <th style='display: none;'>ID</th>
                                            <th>Nombre</th>
                                            <th>Paga DAI</th>
                                            <th>Paga CESCC</th>
                                            <th>Porcentaje de Importe</th>
                                            <th>Porcentaje por Licencias</th>
                                            <th>Necesita Permiso</th>
                                            <th colspan='2'></th>
                                        </tr>
                                    </thead>
                                    <tbody>" . $tibari . "</tbody>
                                    </table>";

            //$arreglo_de_tabla .= "<h4>Hay " . $size2D . " filas en los registros</h4>";
            //$arreglo_de_tabla .= "<h5>Con " . $size3D . " columnas en ellos</h5>";
            //$controlador->view('Casilleros/Casilleros.lista', $datos);
            //$yeison = json_encode($datos);
            //echo $yeison;
            echo $arreglo_de_tabla;
        }
    }