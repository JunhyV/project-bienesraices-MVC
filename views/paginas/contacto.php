<?php
$id = $datos['id'];
$mensaje = "";
$clase = "";

switch ($id) {
  case "1":
    $mensaje = "Correo enviado con éxito";
    $clase = 'alerta-verde';
    break;
    
    case "2":
      $mensaje = "Hubo un error en el envio del correo";
      $clase = 'alerta-roja';
      break;
      
      default:
      break;
    }
?>
<main class="contenido">
  <div class="formulario">
    <h2 class="contenido__h2">Contacto</h2>
    <div class="<?php echo $clase ?>"><?php echo $mensaje ?></div>
    <picture>
      <source srcset="build/img/destacada3.webp" type="img/webp" />
      <source srcset="build/img/destacada3.jpg" type="img/jpeg" />
      <img loading="lazy" src="build/img/destacada3.jpg" alt="formulario-img" />
    </picture>
    <h2 class="contenido__h2">Llene el formulario</h2>
    <form method="POST" action="/contacto">
      <!-- inicia formulario -->
      <div class="formulario__formato">
        <!-- SECCION 1 -->
        <p class="legend">Información personal</p>
        <label for="nombre">NOMBRE</label>
        <input required type="text" name="contacto[nombre]" id="nombre" placeholder="Tu nombre" />
        <label for="mensaje">MENSAJE</label>
        <textarea required name="contacto[mensaje]" id="mensaje" cols="30" rows="10"></textarea>
      </div>
      <div class="formulario__formato">
        <!-- SECCION 2 -->
        <p class="legend">Información sobre la propiedad</p>
        <label for="venta-compra">VENDE O COMPRA</label>
        <select required name="contacto[venta-compra]" id="venta-compra">
          <option value="" disabled selected>--Seleccione--</option>
          <option value="comprar">Compra</option>
          <option value="vender">Vende</option>
        </select>
        <label for="precio">PRECIO O PRESUPUESTO</label>
        <input required type="number" name="contacto[precio]" id="precio" placeholder="Tu precio o presupuesto" />
      </div>
      <div class="formulario__formato">
        <!-- SECCION 3 -->
        <p class=" legend">Información sobre la propiedad</p>
        <p class=" mini">Como desea ser contactado</p>
        <div class="contacto">
          <div>
            <label for="contactar">TELEFONO</label>
            <input required type="radio" value="telefono" name="contacto[contactar]" id="contactar-telefono" />
          </div>
          <div>
            <label for="contactar-email">EMAIL</label>
            <input type="radio" value="email" name="contacto[contactar]" id="contactar-email" />
          </div>
        </div>
        <div class="contacto__forma"></div>
      </div>
      <input class="boton-verde" type="submit" value="Enviar" />
    </form>
  </div>
</main>