<?php
$propiedades = $datos['propiedades'];
?>
<main class="contenido">
  <div class="contenido nosotros">
    <h2 class="contenido__h2">Más sobre nosotros</h2>
    <div class="nosotros__cards">
      <div>
        <img class="nosotros__img" src="build/img/icono1.svg" alt="seguridad" />
        <h4 class="contenido__h4">Seguridad</h4>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta
          quae magnam sunt ab facere, voluptate assumenda dolorum enim.
          Illo, iste.
        </p>
      </div>
      <!-- Card 1 -->
      <div>
        <img class="nosotros__img" src="build/img/icono2.svg" alt="precio" />
        <h4 class="contenido__h4">Precio</h4>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta
          quae magnam sunt ab facere, voluptate assumenda dolorum enim.
          Illo, iste.
        </p>
      </div>
      <!-- Card 2 -->
      <div>
        <img class="nosotros__img" src="build/img/icono3.svg" alt="a-tiempo" />
        <h4 class="contenido__h4">A Tiempo</h4>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta
          quae magnam sunt ab facere, voluptate assumenda dolorum enim.
          Illo, iste.
        </p>
      </div>
      <!-- Card 3 -->
    </div>
  </div>
  <!-- Más sobre nosotros -->
  <div class="contenido casas">
    <h2 class="contenido__h2">Casas y departamentos en Venta</h2>
    <div class="anuncios">
    <?php 
    foreach ($propiedades as $propiedad){
      include 'elementos/propiedad.php';
    }
    ?>
    </div>
    <a class="boton-verde" href="anuncios"> Ver todas </a>
  </div>
  <!-- Anuncios -->
  <div class="contactanos">
    <picture class="contactanos__img">
      <source srcset="build/img/encuentra.webp" type="img/webp" />
      <source srcset="build/img/encuentra.jpg" type="img/jpeg" />
      <img src="build/img/encuentra.jpg" alt="contacto-img" />
    </picture>
    <div class="contactanos__banner">
      <h2>Encuetra la casa de tus sueños</h2>
      <p>
        Llena el formulario de contacto y un asesor se pondrá en contacto
        contigo a la brevedad
      </p>
      <a class="boton-amarillo" href="contacto">Conactanos</a>
    </div>
  </div>
  <!-- Contactanos -->
  <div class="blog-testimoniales">
    <div class="blog">
      <h2 class="contenido__h2">Nuestro Blog</h2>
      <div class="blog__cards">
        <article class="blog__card">
          <a href="entrada-blog">
            <picture>
              <source srcset="build/img/blog1.webp" type="img/webp" />
              <source srcset="build/img/blog1.jpg" type="img/jpeg" />
              <img class="blog__img" src="build/img/blog1.jpg" alt="blog-1" />
            </picture>
          </a>
          <div>
            <a class="blog__link" href="entrada-blog">
              <h3>Terraza en el techo de tu casa</h3>
            </a>
            <p>Escrito el: 20/10/2021 por: Admin</p>
            <p>
              Consejos para construir una terraza en el techo de tu casa con
              los mejores materiales y ahorrando dinero.
            </p>
          </div>
        </article>
        <!-- Artículo 1 -->
        <article class="blog__card">
          <a href="entrada-blog">
            <picture>
              <source srcset="build/img/blog2.webp" type="img/webp" />
              <source srcset="build/img/blog2.jpg" type="img/jpeg" />
              <img src="build/img/blog2.jpg" alt="blog-2" />
            </picture>
          </a>
          <div>
            <a class="blog__link" href="entrada-blog">
              <h3>Guía para la decoración de tu hogar</h3>
            </a>
            <p>Escrito el: 20/10/2021 por: Admin</p>
            <p>
              Maximiza el espacio en tu hogar con esta guia, aprende a
              combinar muebles y colores para darle vida a tu espacio
            </p>
          </div>
        </article>
        <!-- Artículo 2 -->
      </div>
    </div>
    <div>
      <h2>Testimoniales</h2>
      <div class="testimoniales">
        <blockquote>
          El personal se comportó de una excelente forma, muy buena atención
          y la casa que me ofrecieron cumple con todas mis expectativas.
        </blockquote>
        <p>- Jonathan Salazar</p>
      </div>
    </div>
  </div>
</main>