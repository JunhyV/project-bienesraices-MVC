<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/build/css/app.css" />
  <title>Bienes Raices</title>
</head>

<body>
  <header class="header <?php echo $inicio ? 'header--homepage' : ''; ?>">
    <nav class="navegacion">
      <a href="/">
        <h1 class="navegacion__h1">
          Bienes<span class="navegacion__h1--span">Raices</span>
        </h1>
      </a>
      <div class="navegacion__logos">
        <img width="50" height="50" class="navegacion__barra" src="/build/img/barras.svg" alt="navegacion__opciones" />
        <ul class="navegacion__ul">
          <li>
            <a class="navegacion__a" href="/nosotros">Nosotros</a>
          </li>
          <li>
            <a class="navegacion__a" href="/anuncios">Anuncios</a>
          </li>
          <li>
            <a class="navegacion__a" href="/blog">Blog</a>
          </li>
          <li>
            <a class="navegacion__a" href="/contacto">Contacto</a>
          </li>
          <?php
          session_start();
          if ($_SESSION['login']) { ?>
                <li>
                  <a class="navegacion__a" href="/logout">Logout</a>
                </li>
                <li>
                  <a class="navegacion__a" href="/admin">Admin</a>
                </li>
          <?php
          } else { ?>
              <li>
                <a class="navegacion__a" href="/login">Login</a>
              </li>
          <?php } ?>
        </ul>
        <img width="50" height="50" class="navegacion__darkmode" src="/build/img/dark-mode.svg" alt="dark-mode" />
      </div>
    </nav>
    <?php
    if ($inicio) { ?>
      <h2 class="header__h2">Venta de casas y departamentos de lujos</h2>
    <?php } ?>
  </header>

  <?php echo $contenido; ?>

  <footer class="footer">
      <nav class="navegacion">
        <a class="navegacion__a" href="/nosotros.php">Nosotros</a>
        <a class="navegacion__a" href="/anuncios.php">Anuncios</a>
        <a class="navegacion__a" href="/blog.php">Blog</a>
        <a class="navegacion__a" href="/contacto.php">Contacto</a>
      </nav>
      <p class="footer__p">Todos los derechos reservados &copy;</p>
    </footer>
    <!-- Footer -->
  </body>
  <script src="/build/js/bundle.min.js"></script>
</html>
