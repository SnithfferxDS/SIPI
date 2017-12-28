<?php
    include "../sipimini/Clases/Model.php";

    class Casillero
    {
        public function get_All_POBoxes()
        {
            $model = new Model;
            $poboxes = $model->get_All_Elemnts('casilleros', 50);
            return $poboxes;
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
    }
?>