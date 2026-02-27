<?php
include 'PHP/config.php';
$eventos = mysqli_query($conn, "SELECT * FROM eventos WHERE estado = 'activo' ORDER BY fecha_evento ASC, hora_evento ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/EstilosGenerales.css" />
  <link rel="stylesheet" href="css/EventosStyles.css">
  <title>Enventos</title>
</head>

<body>
  <!-- Encabezado con imagen -->
  <header class="encabezado">
      <div class="contenido-encabezado">
        <a href="inicioSecion.html">
          <img
          src="Imagenes/Encabezado/LogoMuni.png"
          alt="Logo"
          class="logo"
          style="cursor: pointer"
        />
        </a>
      </div>
    </header>
  <!-- Barra de navegación -->
  <nav class="barra-menu">
    <ul>
      <li><a href="PaginaPrincipal.php">Inicio</a></li>
      <div class="separador"></div>
      <li><a href="#" onclick="abrirModal('Intro')">Introducción</a></li>
      <div class="separador"></div>
      <li><a href="galeria.php">Galería</a></li>
      <div class="separador"></div>
      <li><a href="Contacto.html">Contactos</a></li>
      <div class="inscriccion separador"></div>
      <li><a href="Evento.php">Eventos</a></li>
    </ul>
  </nav>

  <section class="eventos-container">
    <h2>Próximos Eventos</h2>
    <div class="eventos-lista">
      <?php while ($evento = mysqli_fetch_assoc($eventos)) : ?>
        <div class="evento">
          <figure class="evento-imagen">
            <img src="<?php echo $evento['imagen'] ?: 'Imagenes/placeholder_evento.jpg'; ?>" alt="Imagen del evento">
          </figure>

          <div class="evento-info">
            <h5><?php echo htmlspecialchars($evento['titulo']); ?></h5>
            <span class="evento-hora-lugar">
              <?php echo date("g:i A", strtotime($evento['hora_evento'])); ?> /
              <?php echo $evento['descripcion']; ?>
            </span>
            <a href="EventoRegistro.php" class="inscribirse-btn">Inscribirse</a>
          </div>

          <div class="evento-fecha">
            <div class="evento-dia"><?php echo date("d", strtotime($evento['fecha_evento'])); ?></div>
            <div class="evento-mes"><?php
                                    setlocale(LC_TIME, "es_ES.UTF-8");
                                    echo strftime("%B %Y", strtotime($evento['fecha_evento']));
                                    ?></div>
          </div>
        </div>
      <?php endwhile; ?>
  </section>

  <!-- Pie de pagina Footer-->
  <footer class="footer">
    <div class="overlay"></div>
    <div class="footer-content">
      <p class="frase">Museo Municipal De El Pogreso, Yoro</p>
      <img
        src="Imagenes/Encabezado/LogoMuni.png"
        alt="Escudo de El Progreso"
        class="escudo" />
      <p class="copy">
        © Copyright 2025 Museo Municipal De El Progreso, Yoro. Todos los
        derechos reservados.
      </p>
    </div>
  </footer>
</body>

</html>