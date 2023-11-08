<?php
$propiedad = $datos['propiedad'];
?>
<main class="contenido">
    <h2 class="contenido__h2"><?php echo $propiedad->titulo; ?></h2>
    <a href="anuncios.php" class="boton-verde">Volver</a>
    <div class="anuncio">
        <div class="anuncios__card anuncio">
            <picture>
                <source srcset="imagenes/<?php echo $propiedad->imagen; ?>" type="img/jpeg" />
                <img class="anuncio__img" loading="lazy" src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="destacada" />
            </picture>
            <h3><span class="txt-verde"><?php echo $propiedad->imagen; ?></span></h3>
            <div class="anuncios__iconos">
                <li class="iconos__card">
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono-baño" />
                    <p class="contenido__p"><?php echo $propiedad->habitaciones; ?></p>
                </li>
                <li class="iconos__card">
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono-estacionamiento" />
                    <p class="contenido__p"><?php echo $propiedad->wc; ?></p>
                </li>
                <li class="iconos__card">
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono-recamaras" />
                    <p class="contenido__p"><?php echo $propiedad->estacionamiento; ?></p>
                </li>
            </div>
            <div class="anuncios__texto">
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti
                    consequuntur temporibus dolor nam! Dolores voluptatibus eius
                    magnam quam blanditiis velit quo tempore cumque a impedit
                    doloremque placeat nemo praesentium molestiae iure optio iste
                    ipsum, aperiam molestias aspernatur saepe et maiores. Soluta
                    impedit libero pariatur animi facilis commodi praesentium?
                    Excepturi suscipit exercitationem dolor inventore alias laudantium
                    eveniet reprehenderit veniam nulla doloremque deserunt commodi
                    accusamus consectetur fugiat corporis officiis nisi maiores
                    cupiditate aliquid voluptate, similique dolore sed hic? Odit velit
                    eum culpa fuga magnam eos, natus accusamus illo quo voluptatum qui
                    libero placeat, sed rem provident minus earum! Nihil placeat non
                    molestiae.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi
                    sequi sed officiis itaque deserunt quasi iusto velit quo illum!
                    Placeat odio maiores repudiandae doloribus ipsa, dolores minus.
                    Dolorem ab ipsum cum sint laudantium impedit optio commodi totam
                    numquam magni. Officia placeat iure odit velit eligendi sequi
                    exercitationem ex dignissimos amet.
                </p>
            </div>
        </div>
        <!-- Anuncio 1 -->
    </div>
</main>