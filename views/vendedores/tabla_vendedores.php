<table>
    <thead class="mostrar">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>TELEFONO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vendedores as $vendedor) : ?>
            <tr>
                <td><?php echo $vendedor->id; ?></td>
                <td style="text-transform: uppercase;"><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                <td><?php echo  $vendedor->telefono; ?></td>
                <td class="botones">
                    <a class="boton-amarillo" href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" width>Actualizar</a>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                        <input type="hidden" name="tipo" value="vendedores">
                        <input class="boton-rojo" type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>