<div class="anuncios__card">
    <picture>
      <source srcset="imagenes/<?php echo $propiedad->imagen ?>" type="img/jpeg" />
      <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen ?>" alt="anuncio-img" />
    </picture>
    <div class="anuncios__contenido">
      <h4 class="contenido__h4"><?php echo $propiedad->titulo ?></h4>
      <p> <?php echo $propiedad->descripcion ?> </p>
      <h3><span class="txt-verde"><?php echo $propiedad->precio ?></span></h3>
      <div class="anuncios__iconos">
        <li class="iconos__card">
          <img class="icono" src="build/img/icono_wc.svg" alt="icono-baño" />
          <p><?php echo $propiedad->habitaciones ?></p>
        </li>
        <li class="iconos__card">
          <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono-estacionamiento" />
          <p><?php echo $propiedad->wc ?></p>
        </li>
        <li class="iconos__card">
          <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono-recamaras" />
          <p><?php echo $propiedad->estacionamiento ?></p>
        </li>
      </div>
      <a class="anuncios__link" href="anuncio?id=<?php echo $propiedad->id ?>">Ver propiedad</a>
    </div>
  </div>