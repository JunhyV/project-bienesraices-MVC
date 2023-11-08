<?php
$usuario = $datos['usuario'];
?>
<main class="contenido">
  <div class="formulario">
    <h2 class="contenido__h2">Iniciar Sesión</h2>
    <div class="formulario__errores">
      <?php foreach ($errores as $error) { ?>
        <p class="error"><?php echo $error; ?></p>
      <?php } ?>
    </div>
    <form action="login" method="POST">
      <!-- inicia formulario -->
      <div class="formulario__formato">
        <!-- SECCION 1 -->
        <p class="legend">Datos de contacto</p>
        <label for="email">EMAIL</label>
        <input type="email" name="email" id="email" placeholder="correo@correo.com" value="<?php echo $usuario->email; ?>" />
        <label for="password">CONTRASEÑA</label>
        <input type="password" name="password" id="password" placeholder="Escribe tu contraseña" />
      </div>
      <input class="boton-verde" type="submit" value="Iniciar Sesion" />
    </form>
  </div>
</main>