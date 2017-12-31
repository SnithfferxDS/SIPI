<?php
    include "../sipimini/Modelos/Casillero.php";
    include "../sipimini/Clases/Controller.php";
    class Casilleros
    {
        public function index()
        {
            //Se instancian las clases necesarias.
            //$controlador = new Controller;
            $modelo = new Casillero;
            //Se llama una función que trae todos los casilleros del modelo Casillero.
            $datos = $modelo->get_All_POBoxes();
            /* $casilleros = array();
            $sizePOB = count($datos['registros']);
            
            for($a = 0; $a < $sizePOB; $a++)
            {   
                $infoPOB = count($datos['registros'][$a]);
                for($b = 0; $b < $infoPOB; $b++)
                {
                    $casilleros[$a]['id'] = $datos['registros'][$a]['id'];
                    $casilleros[$a]['nombre'] = $datos['registros'][$a]['nombre'];
                    $casilleros[$a]['direcion'] = $datos['registros'][$a]['direccion'];
                    $casilleros[$a]['descripcion'] = $datos['registros'][$a]['descripcion'];
                    $casilleros[$a]['contacto'] = $datos['registros'][$a]['contacto'];
                    $casilleros[$a]['email'] = $datos['registros'][$a]['contact_email'];
                    $casilleros[$a]['phone'] = $datos['registros'][$a]['contact_phone'];
                    $casilleros[$a]['estado'] = $datos['registros'][$a]['estado'];
                    $casilleros[$a]['company'] = $datos['registros'][$a]['company'];
                }
            } */

            //Se crea la tabla
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
                for($b = 1; $b < $size3D; $b++)
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
                                            <th>Direcci&oacute;n</th>
                                            <th>Descripci&oacute;n</th>
                                            <th>Contacto</th>
                                            <th>E-mail</th>
                                            <th>Tel&eacute;fono</th>
                                            <th>Estado</th>
                                            <th>Compa&ntilde;ia</th>
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
        
        public function create($parametros = array())
        {
            $values = array(
                'name' => $parametros['casillero_nombre'],
                'address' => $parametros['direccion'],
                'receptor' => $parametros['contacto'],
                'telefono' => $parametros['contact_phone']
            );
            $result = $this->insertar_casillero($values);
            return $this->view('Casilleros/list', $result);
        }

        public function update($id=null)
        {
            if($id != null)
            {
                $actualizado = $this->cotizado->update($id);

                if($actualizado == false)
                {
                    $data['error'] = "Ha ocurrido un error al actualizar el registro";
                }
                else
                {
                    $this->load->view('templates/header');
                    $this->load->view('Casilleros/index');
                    $this->load->view('templates/footer');
                }
            }
            else
            {
                redirect('Cotizaciones/error_id');
            }
        }

        public function delete($id=null)
        {
            if($id != null)
            {
                $quemado = $this->cotizado->delete($id);
                if($quemado == false)
                {
                    $data['error'] = "Ha ocurrido un error al borrar el registro";
                }
                else
                {
                    $this->load->view('templates/header');
                    $this->load->view('Casilleros/');
                    $this->load->view('templates/footer');
                }
            }
            else
            {
                redirect('Cotizaciones/error_id');
            }
        }
    }
 /*    $cas = new Casilleros;
    $casi = $cas->index();
    //var_dump($casi);
    //print_r($casi);
    echo($casi); */
?>