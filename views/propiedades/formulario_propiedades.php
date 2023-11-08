<div class="formulario__formato">
    <p class="legend">Información general</p>
    <label for="titulo">TITULO</label>
    <input type="text" name="titulo" id="titulo" placeholder="Tu titulo" value="<?php echo esc($propiedad->titulo); ?>">
    <label for="precio">PRECIO</label>
    <input type="number" name="precio" id="precio" placeholder="Ej: 1,200,000" value="<?php echo esc($propiedad->precio); ?>">
    <label for="imagen">FOTOGRAFIA</label>
    <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">
    <label for="descripcion">DESCRIPCION</label>
    <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo esc($propiedad->descripcion); ?></textarea>
</div>
<div class="formulario__formato">
    <p class="legend">Información de propiedad</p>
    <label for="habitaciones">HABITACIONES</label>
    <input type="number" placeholder="Ej: 3" min="1" max="9" name="habitaciones" id="habitaciones" value="<?php echo $propiedad->habitaciones; ?>">
    <label for="wc">BAÑOS</label>
    <input type="number" placeholder="Ej: 2" min="1" max="9" name="wc" id="wc" value="<?php echo $propiedad->wc; ?>">
    <label for="estacionamiento">ESTACIONAMIENTO</label>
    <input type="number" placeholder="Ej: 1" min="1" max="9" name="estacionamiento" id="estacionamiento" value="<?php echo $propiedad->estacionamiento; ?>">
</div>
<div class="formulario__formato">
    <p class="legend">Información de vendedor</p>
    <Select style="text-transform: uppercase;" name="vendedor" id="vendedor">
        <option value="0" disabled selected>--Selecione--</option>
        <?php foreach ($vendedores as $vendedor) : ?>
            <option <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : null ?> value="<?php echo $vendedor->id ?>" name='vendedor'>
                <?php echo $vendedor->nombre . " " . $vendedor->apellido ?>
            </option>
        <?php endforeach; ?>
    </Select>
</div>