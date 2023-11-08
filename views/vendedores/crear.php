<main class="contenido">
    <div class="formulario">
        <h1>REGISTRAR NUEVO VENDEDOR</h1>
        <a class="boton-verde" href="/admin">Volver</a>
        <div class="formulario__errores">
            <?php foreach ($errores as $error) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>
        </div>
        <form method="POST" action="/vendedores/crear">
            <?php include 'formulario_vendedores.php'; ?>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </div>
</main>