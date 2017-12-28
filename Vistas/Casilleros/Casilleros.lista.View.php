<h1><?php echo $data["mensaje"]; ?></h1>
<h1><?php echo $data["errores"]; ?></h1>
<hr>
<br>
<div class="container">
    <div class="3w-panel 3w-blue">
        <a href="#" class="boton">Crear nuevo</a>
        <br />
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Descripcion</th>
                <th>Contacto</th>
                <th>E-mail</th>
                <th>Telefono</th>
                <th>Estado</th>
                <th>Compa&ntilde;ia</th>
                <th colspan="2">Acciones</th>
            </thead>
            <tbody>
                <?php
                    foreach($data as $pobox)
                    {
                ?>
                <tr>
                    <!-- <td style="display:none;"><?php //echo $pobox[0]; ?></td> -->
                    <td>
                        <?php echo $pobox; ?>
                    </td>
                    <td><i class="fa fa-eye"></i><a href="Casilleros.Details.php">&nbsp;Detalles</a></td>
                    <td><i class="fa fa-edit"></i><a href="Casilleros.Edit.php">&nbsp;Eitar</a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>