<?php
$propiedades = $datos['propiedades'];
$vendedores = $datos['vendedores'];
?>
<main class="contenido">
    <div class="anuncio">
        <h1>MOSTRAR PROPIEDADES EN BASE DE DATOS</h1>
        <a style="align-self: flex-start;" class="boton-verde" href="/admin">Volver</a>
        <?php 
        include 'propiedades/tabla_propiedad.php';
        include 'vendedores/tabla_vendedores.php';
        ?>
    </div>
</main>