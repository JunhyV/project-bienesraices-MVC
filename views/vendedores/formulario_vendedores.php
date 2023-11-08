<div class="formulario__formato">
    <p class="legend">Información personal</p>
    <label for="nombre">NOMBRE</label>
    <input type="text" name="nombre" id="nombre" placeholder="Tu nombre" value="<?php echo esc($vendedor->nombre); ?>">
    <label for="apellido">APELLIDO</label>
    <input type="text" name="apellido" id="apellido" placeholder="Tu apellido" value="<?php echo esc($vendedor->apellido); ?>">
    <label for="telefono">TELEFONO</label>
    <input type="number" name="telefono" id="telefono" placeholder="000-000-00-00" value="<?php echo esc($vendedor->telefono); ?>">
</div>
