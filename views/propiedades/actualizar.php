<main class="contenido">
    <div class="formulario">
        <h1>ACTUALIZAR PROPIEDAD</h1>
        <a class="boton-verde" href="/admin">Volver</a>
        <div class="formulario__errores">
            <?php foreach ($errores as $error) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>
        </div>
        <form method="POST" action="/propiedades/actualizar" enctype="multipart/form-data">
            <?php include 'formulario_propiedades.php'; ?>
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ;?>">
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </div>
</main>