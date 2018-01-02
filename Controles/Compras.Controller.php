public function create_form($tipo = 'normal')
        {
            $form = '';
            $catops = array();
            if($tipo == 'normal'){
                $cats =  new Categoria;
                $query = "SELECT id, nombre FROM Categorias";
                $catops = $cats->get_Custom_Categories($query);
                $form = '<form>
                            <div class="form-group">
                                <label for="product_name">Producto: </label>
                                <input class="form-control" type="text" name="product_name">
                            </div>
                            <div class="form-group">
                                <label for="product_model">Producto: </label>
                                <input class="form-control" type="text" name="product_model">
                            </div>
                            <div class="form-group">
                                <label for="product_price">Producto: </label>
                                <input class="form-control" type="text" name="product_price">
                            </div>
                            <div class="form-group">
                                <label for="product_shipping">Producto: </label>
                                <input class="form-control" type="text" name="product_shipping">
                            </div>
                            <div class="form-group">
                                <label for="product_shipping">Producto: </label>
                                <input class="form-control" type="text" name="product_weigh">
                            </div>
                            <div class="form-group">
                                <label for="product_shipping">Producto: </label>
                                <input class="form-control" type="text" name="product_quantity">
                            </div>
                            <div class="form-group">
                                <label for="product_shipping">Producto: </label>
                                <select class="form-control" name="category">
                                    <option value="0"> Elige una categoria</option>'
                                    .$catops.
                                '</select>
                            </div>
                </form>';

            }
            else{

            }
            
        }