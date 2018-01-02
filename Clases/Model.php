<?php
    //include "../../api/conexion/conexion.php";
    class Model
    {
        public function get_All_Elemnts($tabla=null, $limite=100)
        {
            include_once "../api/conexion/conexion.php";
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
                    while($row = mysql_fetch_array($consulta, MYSQL_NUM))
                    {
                        $records[] = $row;
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
            include_once "../../api/conexion/conexion.php";
            $mensaje = '';
            $error = '';
            $records = array();

            if($tabla == null)
            {
                $error = "No hay tabla para consultar.";
            }
            else
            {
                $consulta = $conn->consulta("SELECT nombre FROM $tabla WHERE id = $id");
                if(mysql_num_rows($consulta) > 0)
                {
                    while($row = mysql_fetch_array($consulta))
                    {
                        $records[] = $row;
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
            include_once "../../api/conexion/conexion.php";
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
            include_once "../../api/conexion/conexion.php";
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
            include_once "../../api/conexion/conexion.php";
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
            include_once "../api/conexion/conexion.php";
            $mensaje = '';
            $error = '';
            $records = array();
            
            if($query == "")
            {
                $mensaje = "No hay nada la tabla..!";
            }
            else
            {
                $consulta = $conn->consulta($query);

                if(mysql_num_rows( $consulta) > 0)
                {
                    $mensaje = " tiene estos registros: "; 
                    while($row = mysql_fetch_array($consulta, MYSQL_NUM))
                    {
                        $records[] = $row;
                    }
                }
                else if(mysql_affected_rows($consulta) > 0)
                {
                    $mensaje = "los cambios han sido aplicados";   
                }
                else
                {
                    $error = 'Error: '.mysql_errno($consulta).'; ';
                    $error .= mysql_error($consulta);
                }
            }
            
            $elements['mensaje'] = $mensaje;
            $elements['errores'] = $error;
            $elements['registros'] = $records;

            return $elements;
        }
    }
    /* $modelo = new Model;
    $registros = $modelo->get_All_Elemnts('casilleros', 20);
    print_r($registros); */
    /*echo "</ br></ br></ br></ br>";
    $prueba1 = $modelo->get_Elements_By_Id(2,'estados');
    print_r($prueba1); */
