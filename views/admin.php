<?php

$resultado = $_GET['resultado'] ?? null;
$alerta = '';

//Evaluar el query string para mostrar alerta
if (!is_null($resultado)) {
    switch (intval($resultado)) {
        case 1:
            $alerta = 'Registro creado correctamente';
            break;
        case 2:
            $alerta = 'Registro actualizado correctamente';
            break;
        case 3:
            $alerta = 'Registro eliminado correctamentWe';
            break;
        default:
            break;
    }
}

?>
<main class="contenido">
    <div class="crud">
        <h2>CREAR CRUD</h2>
        <?php if ($resultado) : ?>
            <div class="alerta-verde"><?php echo $alerta; ?></div>
        <?php endif; ?>
        <div class="propiedades">
            <a class="boton-verde" href="/propiedades/crear">CREAR PROPIEDAD</a>
            <a class="boton-verde" href="/vendedores/crear">CREAR VENDEDOR</a>
            <a class="boton-verde" href="/mostrar">MOSTRAR DATOS</a>
        </div>
    </div>
</main>