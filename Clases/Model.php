<?php
    class Model
    {
        public function get_All_Elemnts($tabla=null, $limite=100)
        {
            include "../api/conexion/conexion.php";
            /* $coneccion = new Conexion; */
            $mensaje = '';
            $error = '';
            $records = array();

            if($tabla == null)
            {
                $error = "No hay tabla para consultar.";
            }
            else
            {
                $consulta = $conn->consulta("SELECT * FROM $tabla LIMIT $limite");
                if(mysql_num_rows($consulta) > 0)
                {
                    while($row = mysql_fetch_array($consulta))
                    {
                        $records = $row;
                    }
                    $mensaje = "Registros en tabla: ".$tabla;
                }
                else{
                    $error = "No hay registros en la tabla.";
                }
            }
            $elements['mensaje'] = $mensaje;
            $elements['errores'] = $error;
            $elements['registros'] = $records;

            return $elements;
        }

        public function get_Elements_By_Id($id = null, $tabla = null)
        {
            $mensaje = '';
            $error = '';
            $records = array();

            if($tabla == null)
            {
                $error = "No hay tabla para consultar.";
            }
            else
            {
                $consulta=$conn->consulta("SELECT * FROM $tabla WHERE id = $id");
                if(mysql_num_rows($consulta) > 0)
                {
                    while($row = mysql_fetch_array($consulta))
                    {
                        $records = $row;
                    }
                    $mensaje = "Registros en tabla: ".$tabla;
                }
                else
                {
                    $error = "No hay nada en la tabla.";
                }
            }

            $elements['mensaje'] = $mensaje;
            $elements['errores'] = $error;
            $elements['registros'] = $records;

            return $elements;
        }

        public function insert_registro($campos = array(), $valores = array(), $tabla = null)
        {
            $mensaje = '';
            $error = '';
            $records = array();

            if($tabla == null)
            {
                $error = "No hay tabla para consultar.";
            }
            else
            {
                $consulta=$conn->consulta("INSERT INTO $tabla $campos VALUES $valores");
                if(mysql_affected_rows($consulta) > 0)
                {
                    $mensaje = "El registro fue insertado exitosamente";
                }
                else
                {
                    $error = "Ocurrio un error al insertar el registro";
                }
            }

            $elements['mensaje'] = $mensaje;
            $elements['errores'] = $error;

            return $elements;
        }

        public function update_registro($valor = null, $campo = null, $tabla = null, $id = null)
        {
            $mensaje = '';
            $error = '';
            $records = array();
        
            if($tabla == null)
            {
                $error = "No hay tabla para consultar.";
            }
            else
            {
                $consulta = $conn->consulta("UPDATE $tabla SET $campo = $valor WHERE id = $id");
                if(mysql_affected_rows( $consulta) > 0)
                {
                    $mensaje = "El registro fue insertado exitosamente";
                }
                else
                {
                    $error = "Ocurrio un error al insertar el registro";
                }
            }
            
            $elements['mensaje'] = $mensaje;
            $elements['errores'] = $error;
            $elements['registros'] = $records;

            return $elements;
        }

        public function delete_registro($tabla = null, $id = null)
        {
            $mensaje = '';
            $error = '';
            $records = array();

            if($tabla == null)
            {
                $error = "No hay tabla para consultar.";
            }
            else
            {
                $consulta = $conn->consulta("DELETE FROM $tabla WHERE id = $id");
                if(mysql_affected_rows( $consulta) > 0)
                {
                    $mensaje = "El registro fue eliminado exitosamente";
                }
                else
                {
                    $error = "Ocurrio un error al eliminar el registro";
                }
            }
            
            $elements['mensaje'] = $mensaje;
            $elements['errores'] = $error;
            $elements['registros'] = $records;

            return $elements;
        }

        public function custom_Query($query = "")
        {
            $mensaje = '';
            $error = '';
            $records = array();
            
            if($query == "")
            {
                $mensaje = "No hay nada para hacer..!";
            }
            else
            {
                $consulta = $conn->consulta($query);

                if(mysql_affected_rows( $consulta) > 0)
                {
                    $mensaje = "los cambios han sido aplicados";
                }
                else
                {
                    if(mysql_num_rows($consulta) > 0)
                    {
                        while($row = mysql_fetch_array($consulta))
                        {
                            $records = $row;
                        }
                    }
                    else
                    {
                        $error = mysql_errno($consulta);
                    }
                    
                }
            }
            
            $elements['mensaje'] = $mensaje;
            $elements['errores'] = $error;
            $elements['registros'] = $records;

            return $elements;
        }
    }