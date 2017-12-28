<div class="container">
    <div class="3w-panel">
        <h1><?php echo $pobox['nombre']; ?></h1>
        <p><?php echo $pobox['descripcion']; ?></p>
        <div>
            <p><?php echo $pobox['direccion']; ?></p>
        </div>
        <div>
            <table>
                <th>
                    Contacto
                </th>
                <th>
                    E-mail
                </th>
                <th>
                    Telefono
                </th>
                <td>
                    <?php echo $pobox['contacto']; ?>
                </td>
                <td>
                    <?php echo $pobox['email']; ?>
                </td>
                <td>
                    <?php echo $pobox['phone']; ?>
                </td>
            </table>
        </div>
    </div>
</div>