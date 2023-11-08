<table>
    <thead class="mostrar">
        <tr>
            <th>ID</th>
            <th>TITULO</th>
            <th>IMAGEN</th>
            <th>PRECIO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($propiedades as $propiedad) : ?>
            <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td style="display: flex; flex-direction:column; align-items:center; justify-content: center;"><img src="<?php echo 'imagenes/' . $propiedad->imagen; ?>" alt="imagen-propiedad"></td>
                <td>$<?php echo  $propiedad->precio; ?></td>
                <td class="botones">
                    <a class="boton-amarillo" href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" width>Actualizar</a>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                        <input type="hidden" name="tipo" value="propiedades">
                        <input class="boton-rojo" type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>