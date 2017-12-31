<?php
    include "../sipimini/Modelos/Tienda.php";
    include "../sipimini/Clases/Controller.php";
    class Tiendas
    {
        public function index()
        {
            //Se instancian las clases necesarias.
            //$controlador = new Controller;
            $modelo = new Tienda;
            //Se llama una función que trae todos los casilleros del modelo Casillero.
            $datos = $modelo->get_All_Stores();

            //Se crea la tabla
            $arreglo_de_tabla = '';
            $tibari = "";
            //Acoplamiento de mensajes
            $arreglo_de_tabla = "<h3><strong>Casilleros" . $datos['mensaje'] . "</strong></h3>
                                  <h3 class='text_alert'><strong>" . $datos['errores'] . "</strong></h3>";

            $size2D = count($datos['registros']);
            for($a = 0; $a < $size2D; $a++)
            {
                $size3D = count($datos['registros'][$a]);

                $tibari .= "<tr>";
                $tibari .= "<td style='Display:none;'>" . $datos['registros'][$a][0] . "</td>";
                for($b = 1; $b < $size3D; $b++)
                {
                    $tibari .= "<td>" . $datos['registros'][$a][$b] . "</td>";
                    $tibari .= "<td class='bg-primary' style='text-align:center'><a href='#' class='editStores' style='color:#fff;'><i class='fa fa-eye'></i></a></td>";
                    $tibari .= "<td class='bg-alert' style='text-align:center'><a href='#' class='storeDetails' style='#fff'><i class='fa fa-shopping-cart'></i></a></td>";
                }
                $tibari .= "</tr>";
            }
            
            $arreglo_de_tabla .= "<table class='table-striped'>
                                    <thead>
                                        <tr>
                                            <th style='Display:none;'>ID</th>
                                            <th>Nombre</th>
                                            <th>Direcci&oacute;n</th>
                                            <th>Contacto</th>
                                            <th>E-mail</th>
                                            <th>Tel&eacute;fono</th>
                                        </tr>
                                    </thead>
                                    <tbody>" . $tibari . "</tbody>
                                    </table>";

            //$controlador->view('Casilleros/Casilleros.lista', $datos);

            echo $arreglo_de_tabla;
        }
    }
?>