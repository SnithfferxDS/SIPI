<?php
    include "../sipimini/Clases/Model.php";
    class Pais
    {
        public function get_All_Countries()
        {
            $model = new Model;
            $countries = $model->get_All_Elemnts('paises');
            return $countries;
        }
        
        public function insertar_Pais($valores)
        {
            if($id == null)
            {
                $mensaje = "Los valores no pueden estar vacios, favor revisar.";
            }
            else
            {
                $campos = array(
                    'nombre',
                    'TLC',
                    'ImpEX',
                    'Paga_Impuesto');
                $paises = $this->insert_registro($campos, $valores, 'casilleros');
                if(mysql_affected_rows($paises) > 0)
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

        public function actualiza_Pais($campo, $valor, $pais)
        {
            if($campo != null)
            {
                if($valor != null)
                {
                    if($pais != null)
                    {
                        $paises = $this->update_registro($valor, $campo, 'Paises', $pais);
                        if(mysql_affected_rows() > 0)
                        {
                            $mensaje = "El pais fue actualizado exitosamente";
                        }
                        else
                        {
                            $mensaje = mysql_error();
                        }
                    }
                    else
                    {
                        $mensaje = "Debe ingresar un pais";
                    }
                    $mensaje = "Debe ingresar un nuevo dato para actualizar el existente.";
                }
                else
                {
                    $mensaje = "Un campo tiene error, favor revisar.";
                }
                
            }
            
        }

        public function delete_Pais($pais)        
        {
            if($pais != null)
            {
                $paises = $this->delete_registro('Paises', $pais);
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