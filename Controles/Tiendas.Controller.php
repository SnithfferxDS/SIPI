<?php
    include "../sipimini/Clases/Controller.php";
    include "../sipimini/Modelos/Tienda.php";
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
            $arreglo_de_tabla = "<h3><strong>" . $datos['mensaje'] . "</strong></h3>
                                  <h3 class='text_alert'><strong>" . $datos['errores'] . "</strong></h3>";

            $size2D = count($datos['registros']);
            for($a = 0; $a < $size2D; $a++)
            {
                $size3D = count($datos['registros'][$a]);

                $tibari .= "<tr>";
                $tibari .= "<td style='Display:none;'>" . $datos['registros'][$a][0] . "</td>";
                for($b = 1; $b < $size3D-4; $b++)
                {
                    $tibari .= "<td style='text-align:center;'>" . $datos['registros'][$a][$b] . "</td>";
                }
                $tibari .= "<td class='bg-primary' style='text-align:center'><a href='#' class='editStores' style='color:#fff;'><i class='fa fa-edit fa-2x'></i></a></td>";
                $tibari .= "<td class='bg-alert' style='text-align:center'><a href='#' class='storeDetails' style='#fff'><i class='fa fa-eye fa-2x'></i></a></td>";
                $tibari .= "</tr>";
            }
            
            $arreglo_de_tabla .= "<table class='table-striped'>
                                    <thead>
                                        <tr>
                                            <th style='Display:none;'>ID</th>
                                            <th>Nombre</th>
                                            <th>Direcci&oacute;n</th>
                                            <th>Tel&eacute;fono</th>
                                            <th>Tax</th>
                                            <th>Contacto</th>
                                            <th colspan='2'></th>
                                        </tr>
                                    </thead>
                                    <tbody>" . $tibari . "</tbody>
                                    </table>";

            //$controlador->view('Casilleros/Casilleros.lista', $datos);

            echo $arreglo_de_tabla;
        }
    }
    /* $store = new Tiendas;
    $stores = $store->index(); */
?>