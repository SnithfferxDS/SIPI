<?php
    include "../sipimini/Clases/Model.php";

    class Casillero
    {
        public function get_All_POBoxes()
        {
            $model = new Model;/*
            $poboxes = $model->get_All_Elemnts('casilleros', 50);
            return $poboxes; */
            $casilleros = $model->custom_Query("SELECT casilleros.id,
                                                    casilleros.nombre,
                                                    casilleros.direccion,
                                                    casilleros.descripcion,
                                                    casilleros.contacto,
                                                    casilleros.contact_email,
                                                    casilleros.contact_phone,
                                                    estados.nombre as estado,
                                                    casilleros.company
                                                FROM casilleros, estados
                                                WHERE estados.id = casilleros.estado
                                                LIMIT 50");

            return $casilleros;
        }

        public function get_POB_By_Id($aidi, $teibol)
        {
            $model = new Model;
            $pobs = $model->get_Elements_By_Id($aidi, $teibol);
            return $pobs;
        }
        
        public function insertar_casillero($valores)
        {
            $model = new Model;
            if($id == null)
            {
                $mensaje = "Los valores no pueden estar vacios, favor revisar.";
            }
            else
            {
                $campos = array(
                    'nombre',
                    'direccion',
                    'receptor',
                    'Numero_Telefonico');
                $poboxes = $this->insert_registro($campos, $valores, 'casilleros');
                if(mysql_affected_rows($poboxes) > 0)
                {
                    $mensaje = "El registro fue insertado exitadosamente.";
                }
                else
                {
                    $mensaje = mysql_error();
                }
            }
            $element['mensaje'] = $mensaje;
            return $element;
        }

        public function actualiza_PoBox($campo, $valor, $casillero)
        {
            if($campo != null)
            {
                if($valor != null)
                {
                    if($casillero != null)
                    {
                        $poboxes = $this->update_registro($valor, $campo, 'casilleros', $casillero);
                        if(mysql_affected_rows() > 0)
                        {
                            $mensaje = "El casillero fue actualizado exitosamente";
                        }
                        else
                        {
                            $mensaje = mysql_error();
                        }
                    }
                    else
                    {
                        $mensaje = "Debe ingresar un casillero";
                    }
                    $mensaje = "Debe ingresar un nuevo dato para actualizar el existente.";
                }
                else
                {
                    $mensaje = "Un campo tiene error, favor revisar.";
                }
                
            }
            
        }

        public function delete_registro($casillero)        
        {
            if($casillero != null)
            {
                $poboxes = $this->delete_registro($tabla, $casillero);
            }
            else
            {
                $mensaje = "Se neceita un(a) 'ID', para realizar la consulta.";
            }
            
            if(mysql_affected_rows() > 0)
            {
                $mensaje = "El registro fue eliminado exitosamente";
            }
            else
            {
                $mensaje = "Ocurrio un error al insertar el registro";
            }
            
        }

        public function search_elsewhere($id = null, $tabla = null)
        {
            $kueri = "SELECT * FROM $tabla WHERE id = $id";
            $result = custom_Query($kueri);
            return $result;
        }
    }
    /* $pob = new Casillero;
    $cas = $pob->get_All_POBoxes();
    $yeison = json_encode($cas);
    print_r($yeison); */
?>