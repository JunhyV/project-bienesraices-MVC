<?php
$propiedades = $datos['propiedades'];
?>
<main class="contenido">
  <h2 class="contenido__h2">Casas y departamentos en Venta</h2>
  <div class="anuncios">
    <?php foreach ($propiedades as $propiedad) {
        include 'elementos/propiedad.php';
    } ?>
  </div>
</main>