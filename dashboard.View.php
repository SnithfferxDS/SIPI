<?php
    session_start();
    include "../api/conexion/conexion.php";
	//include "Controles/Model.Calss.php";
    $nivel=base64_decode($_SESSION['nivel']);
    $usuario=base64_decode($_SESSION['usuario']);

    $probar_usuario=$conn->consulta("select id_nivel from nivel_usuario where nivel='$nivel'");
    while($fila_usuario=$conn->arreglo($probar_usuario)):
        $id_nivel_usuario=$fila_usuario["id_nivel"];
    endwhile;

    $user_id = $conn->consulta("SELECT id_usuario FROM usuarios WHERE usuario = '$usuario'");

    while($row=mysql_fetch_array($user_id))
    {
        $id_usuario=$row["id_usuario"];
    }
    /*$buscador = new Model;*/
    if($id_usuario == 61)
    {
        $consulta_ordenes = $conn->consulta("SELECT * FROM ordenes WHERE cotizante = $id_usuario ORDER BY id DESC LIMIT 15") or die(mysql_error());
        $consulta_cotizaciones = $conn->consulta("SELECT * FROM cotizaciones WHERE cotizante = $id_usuario AND estado > 1 ORDER BY id DESC LIMIT 15") or die(mysql_error());
    }
    elseif($id_usuario == 65)
    {
        $consulta_ordenes = $conn->consulta("SELECT * FROM ordenes WHERE estado > 1 ORDER BY id DESC LIMIT 15") or die(mysql_error());
        $consulta_cotizaciones = $conn->consulta("SELECT * FROM cotizaciones WHERE estado > 1 ORDER BY id DESC LIMIT 15") or die(mysql_error());
    }
    else
    {
        $consulta_ordenes = $conn->consulta("SELECT * FROM ordenes WHERE cotizante = $id_usuario ORDER BY id DESC LIMIT 15") or die(mysql_error());
        $consulta_cotizaciones = $conn->consulta("SELECT * FROM cotizaciones WHERE cotizante = $id_usuario AND estado > 1 ORDER BY id DESC LIMIT 15") or die(mysql_error());
    }
    if(mysql_num_rows($consulta_ordenes))
    {
        $ordenes['mensaje'] = "";
    }
    else
    {
        $ordenes['mensaje'] = "Aun no hay datos";
        $ordenes['ordenes'] = array();
    }
         
    if(mysql_num_rows($consulta_cotizaciones) > 0)
    {
        $orden =  array();
        while($row=mysql_fetch_array($consulta_cotizaciones))
        {
            $products = $conn->consulta("SELECT nombre FROM cotizados WHERE id = ".$row['product']);
            $usuarios = $conn->consulta("SELECT nombre FROM usuarios WHERE id = ".$fila['cotizador']);
            $estados = $conn->consulta("SELECT nombre FROM estados WHERE id = ".$row['estado']);

            $cotizacion['ID_cotizacion'] = $fila['id'];
            $cotizacion['fecha'] = $row['fecha_cotizado'];
            $cotizacion['product'] = $products['nombre'];
            $cotizacion['costo'] = $row['costo'];
            
            if($id_usuario == 65)
            {
                $ordenes['cotizador'] = $usuarios['nombre'];
            }

            $cotizacion['enlace'] = $row['enlace'];
            $cotizacion['estado'] = $estados['nombre'];
        }
        $cotizaciones['cotizaciones'] = $cotizacion;
    }
    else
    {
        $cotizaciones['mensaje'] = "Aun no hay datos";
        $cotizaciones['cotizaciones'] = array();
    }
	
?>
<script src="js/estilos.js"></script>
<!-- <link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/estilo.css">
<link rel="stylesheet" href="../css/font-awesome.min.css"> -->
    <div class="w3-panel w3-pale-yellow">
        <button id="modal_coti">Cotizaci&oacute;n R&aacute;pida</button>
        <button value="">Cotizaci&oacute;n</button>
    </div>
	<div class="w3-panel w3-pale-blue">
        <h1>Ordenes</h1>
        <?php
            if(isset($ordenes['ordenes']))
            {
        ?>
        <h4><em><?php echo $ordenes['mensaje']; ?></em></h4>
        <?php
            }
            else
            {  
        ?>
        <table id="ordenes" style="width:100%">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <?php
                    if($id_usuario == 65){
                    ?>
                    <th>Cotizante</th>
                    <?php
                    }
                    ?>
                    <th>Producto</th>
                    <th>Precio</th>
                    <?php
                    if($id_usuario != 61){
                    ?>
                        <th>Cantidad</th>
                        <th>Tienda</th>
                        <th>Enlace</th>
                    <?php
                    }
                    ?>
                    <th>Estado</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                while($fila = mysql_fetch_array($consulta_ordenes))
                {
                    $products = $conn->consulta("SELECT nombre FROM cotizados WHERE id = ".$fila['id_product']);
                    $usuarios = $conn->consulta("SELECT nombre FROM usuarios WHERE id_usuario = ".$fila['cotizante']);
                    $stores = $conn->consulta("SELECT nombre FROM tiendas WHERE id = ".$fila['tienda']);
                    $countries = $conn->consulta("SELECT nombre FROM paises WHERE id = ".$fila['origen']);
                    $estados = $conn->consulta("SELECT nombre FROM estados WHERE id = ".$fila['estado']);
                    $compradores = $conn->consulta("SELECT nombre FROM usuarios WHERE id_usuario = ".$fila['comprador']);
                    $enlaces = $conn->consulta("SELECT enlace FROM cotizados WHERE id = ".$fila['id_product']);

                    $orden['ID_orden'] = $fila['id'];
                    $orden['fecha'] = $fila['fecha'];
                    while($rowP = mysql_fetch_array($products))
                    {
                        $orden['product'] = $rowP['nombre'];
                    }
                    $orden['costo'] = $fila['total_Compra'];
                    $orden['cantidad'] = $fila['cantidad'];
                    
                    if($id_usuario == 65)
                    {
                        while($rowU = mysql_fetch_array($usuarios)){$orden['cotizador'] = $rowU['nombre'];}
                        while($rowT = mysql_fetch_array($stores)){$orden['tienda'] = $rowT['nombre'];}
                        while($rowC = mysql_fetch_array($countries)){$orden['Pais'] = $rowC['nombre'];}
                        $orden['factura'] = $fila['invoice'];
                        while($rowCo = mysql_fetch_array($compradores)){$orden['comprador'] = $rowCo['nombre'];}
                    }
                    
                    while($rowEn = mysql_fetch_array($enlaces)){$orden['enlace'] = $rowEn['enlace'];}
                    while($rowE = mysql_fetch_array($estados))
                    {
                        $orden['estado'] = $rowE['nombre'];
                    }

                    /*print_r($orden['fecha']);
                    echo"&nbsp;|&nbsp;";
                    print_r( $orden['cotizador']);
                    echo"&nbsp;&nbsp;";
                    print_r( $orden['product']);
                    echo"&nbsp;&nbsp;";
                    print_r( $orden['costo']);
                    echo"&nbsp;&nbsp;";
                    print_r( $orden['cantidad']);
                    echo "<br />";
                    echo "<hr>";*/   
            ?>

                <tr>
                <input type="hidden" name="Id_Orden" id="Id_Orden" value="<?php echo $orden['ID_orden']; ?>"/>
                    <td><?php echo $orden['fecha']; ?></td>
                    <?php
                    if($id_usuario == 65){
                    ?>
                    <td><?php echo $orden['cotizador']; ?></td>
                    <?php
                    }
                    ?>
                    <td><?php echo $orden['product']; ?></td>
                    <td><?php echo $orden['costo']; ?></td>
                    <?php
                    if($id_usuario != 61){
                    ?>
                    <td style="text-align:center"><?php echo $orden['cantidad']; ?></td>
                    <td><?php echo $orden['tienda']; ?></td>
                    <td><a href="<?php echo $orden['enlace']; ?>" target="_blank"><i class="fa fa-globe fa-2x text-primary" aria-hidden="true"></i></a></td>
                    <?php
                    }
                    ?>
                    <td><?php echo $orden['estado']; ?></td>
                    <td class="bg-primary" style="text-align:center"><a href="#" class="order_details btn btn-sm" style="color:#fff;"><i class="fa fa-eye fa-2x"></i></a></td>
                    <td class="bg-alert" style="text-align:center"><a href="#" class="order_edit btn btn-sm" style="#fff"><i class="fa fa-edit fa-2x"></i></a></td>
                </tr>
            <?php
                }
            }        
            ?>
            </tbody>
        </table>
    </div>


    <div class="w3-panel w3-pale-green">
        <h1>Ultimos Cotizados</h1>
        <h4><em><?php echo $cotizaciones['mensaje']; ?></em></h4>
        <table style="width:100%">
            <thead>
                <th>fecha de cotizado</th>
                <?php
                    if($id_usuario == 65){
                ?>
                <th>cliente</th>
                <?php
                    }
                ?>
                <th>Producto</th>
                <?php
                    if($id_usuario == 65){
                ?>
                <th>Costo</th>
                <?php
                    }
                ?>
                <td>Entrega</td>
                <?php
                    if($id_usuario == 65){
                ?>
                <th>Tienda</th>
                <?php
                    }
                ?>
                <th colspan="2">Acciones</th>
            </thead>
            <tbody>
            <?php
            if(isset($cotizacion['cotizaciones']))
            {
                foreach($cotizaciones['cotizaciones'] as $cotizacion)
                {
            ?>
                <td><?php echo $cotizacion['fecha_cotizado']; ?></td>
                <?php
                    if($id_usuario == 65){
                ?>
                <td><?php echo $cotizacion['cotizador']; ?></td>
                <?php
                    }
                ?>
                <td><?php echo $cotizacion['producto']; ?></td>
                <?php
                    if($id_usuario == 65){
                ?>
                <td><?php echo $cotizacion['costo']; ?></td>
                <?php
                    }
                ?>
                <td><?php echo $cotizacion['Entrega']; ?></td>
                <?php
                    if($id_usuario == 65){
                ?>
                <td><?php echo $cotizacion['tienda']; ?></td>
                <?php
                    }
                ?>
                <td class="bg-primary" style="text-align:center"><a href="#" class="coti_details" style="color:#fff;"><i class="fa fa-eye"></i></a></td>
                <td class="bg-alert" style="text-align:center"><a href="#" class="coti_buy" style="#fff"><i class="fa fa-shopping-cart"></i></a></td>
            <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>

    <script>
        $('a.order_details').click(function(){
            $.post('Vistas/Ordenes/Details.php',function(ordenes)
            {
                $('#wrap-slider').html(ordenes);
            });
        });

        $('a.coti_details').click(function(){
            $.post('Vistas/Cotizaciones/Details.php',function(cotis)
            {
                $('#wrap-slider').html(cotis);
            });
        });

        $('a.coti_buy').click(function(){
            $.post('Vistas/Compras/Comprar.php',function(cotis)
            {
                $('#wrap-slider').html(cotis);
            });
        });

        /* $('a.edit').click(function()
        {
            $.post('Vistas/Ordenes/Edit.php',{id_producto:1},function(p_agotados)
            {
                $('#wrap-slider').html(p_agotados);
            });
        });

        $.post("Controles/Ordenes.php",
        {func:"editar_Orden"}, */
        $("a.order_edit").click(
            function(ordenes_edit){
                ordenes_edit.preventDefault();
                var $orden = $(this),
                term = $orden.find("input[name='ID_Orden']").val(),
                url = $orden.attr("action");
                var posting = $.post(url,{s:term});
                posting.done(function(data).find("#content");
                $("#wrap-slider").empty().append(content);
            });
        });
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById('Modal');
        
        // Get the button that opens the modal
        var btn = document.getElementById("modal_coti");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        } 
    </script>
    <div id="modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Cotizaci&oacute;n R&aacute;pida</h2>
        </div>
        <div class="modal-body">
            <p>introduzca los datos requeridos</p>
            <p>luego haga click en calcular...</p>
        </div>
        <div class="modal-footer">
            <h3>puede rellenar el formulario completo, luego.</h3>
        </div>
    </div>
    </div>
    <!--
    <div class="modal" id="modal_Quote" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <span class="close">&times;</span> 
            <form role="form" name="quick_quote" onsubmit="crear_cotizacion()">
                <div class="col-ms-12">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input name="precio" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="shipping">Envio</label>
                        <input type="shipping" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="taxes">Taxes</label>
                        <input type="taxes" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="cantidad" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <input type="categoria" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="tienda">Tienda</label>
                        <input type="tienda" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="pais">Pais</label>
                        <input type="pais" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="peso">Peso</label>
                        <input type="peso" class="form-control" required/>
                    </div>
                </div>
            </form>
        </div>
        <button type="submit" class="btn btn-success" data-dismiss="modeal"><i class="fa fa-save fa-2x"></i></button>
    </div>-->