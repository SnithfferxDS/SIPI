<?php
    session_start();
    include("../api/conexion/conexion.php");
    $nivel=base64_decode($_SESSION['nivel']);
    $usuario=base64_decode($_SESSION['usuario']);
    $user_id = $conn->consulta("SELECT id_usuario FROM usuarios WHERE usuario = '$usuario'");
    
    while($row=mysql_fetch_array($user_id))
    {
        $id_usuario=$row["id_usuario"];
    }
?>
    <script src="../js/configuracion_acordeon.js"></script>
    <div class="basic" id="list1b" style="text-align:center;">
    <span style="background:#dd2c00;">Acciones</span>
	<div>
		<ul id="sub_menu">
            <li><a href="#" class="seguimiento boton">Seguimiento de paquetes&nbsp;<i class="fa fa-cubes" aria-hidden="true"></i></a></li>
            <li><a href="#" class="orders boton">Ordenes compra&nbsp;<i class="fa fa-shopping-bag" aria-hidden="true"></i></a></li>
            <li><a href="#" onclick="Cotizacion boton" class="cotizar boton">Cotizar Producto&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i></a></li>

            <?php
                if($id_usuario == 65)
                {
            ?>
            <li><a href="#" class="Comprar boton">Comprar&nbsp;<i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
            <li><a href="sipimini/vistas/ajaxtuto.html" class="cotizar boton">Prueba&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i></a></li>
            <?php } ?>
        </ul>
    </div>
    <?php
        if($id_usuario == 65)
        {
    ?>
    <span style="background:#dd2c00;">Elementos</span>
	<div>
		<ul id="sub_menu">
            <li>
                <a href="#" class="Casilleros boton">Casilleros</a>
            </li>
            <li>
                <a href="#" class="Tiendas boton">Tiendas</a>
            </li>
            <li>
                <a href="#" class="Paises boton">Paises</a>
            </li>
            <li>
                <a href="#" class="Tarjetas boton">Tarjetas</a>
            </li>
            <li>
                <a href="#" class="Categorias boton">Categoriras</a>
            </li>
            <li>
                <a href="#" class="Estados boton">Estados</a>
            </li>
        </ul>
    </div>
    <?php
        }
    ?>
</div>