<?php
    include "../sipimini/Clases/Model.php";
    class Categoria extends Model
    {
        public function get_All_Categories()
        {
            $categories = $this->get_All_Elemnts('categorias');
            return $categories;
        }

        public function update_Category($campo = null, $valor = null, $casillero = null)
        {

            $categories = $this->update_registro($valor, $campo, 'casilleros', $casillero);
            return $categories;
        }

        public function insert_Category($campos = null, $valores = null, $tabla = null)
        {
            $categories = $this->insert_registro($campos, $valores, $tabla);
            return $categories;
        }

        public function delete_Category($id = null, $tabla = null)
        {
            $categories = $this->delete_registro($tabla, $id);
            return $categories;
        }
    }
?>