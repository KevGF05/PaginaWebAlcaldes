
<?php include '../PHP/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Abog. Alexander López Orellana</title>

  <link rel="stylesheet" href="../css/EstilosGenerales.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
</head>
<body>

<header class="encabezado">
  <div class="contenido-encabezado">
    <a href="../PaginaPrincipal.php"><img src="../Imagenes/Encabezado/LogoMuni.png" class="logo" alt="Logo" /></a>
  </div>
</header>

<nav class="barra-menu">
  <ul>
    <li><a href="../PaginaPrincipal.php">Inicio</a></li>
    <li><a href="../galeria.php">Galería</a></li>
    <li><a href="../Contacto.html">Contactos</a></li>
    <li><a href="../Evento.php">Eventos</a></li>
  </ul>
</nav>

<header class="titulo-container">
  <h1 class="titulo-principal">Abog. Alexander López Orellana</h1>
  <h2 class="subtitulo">"Líder en transformación municipal"</h2>
</header>

<main class="contenido-principal">
  <?php
  $query = "SELECT * FROM alcaldes WHERE nombre = 'Abog. Alexander López Orellana' LIMIT 1";
  $result = mysqli_query($conn, $query);
  $alcalde = mysqli_fetch_assoc($result);

  if ($alcalde):
  ?>
    <section class="alcalde">
      <div class="contenedor-alcalde">
        <img src="../<?php echo htmlspecialchars($alcalde['imagen']); ?>" class="foto-alcalde" alt="Foto del Alcalde" />
        <div class="info-alcalde">
          <h3><?php echo htmlspecialchars($alcalde['nombre']); ?></h3>
          <p><strong>Período:</strong> <?php echo htmlspecialchars($alcalde['periodo']); ?></p>
          
            <p><?php echo nl2br(htmlspecialchars($alcalde['descripcion'])); ?></p>
          </div>
        </div>
      </div>
    </section>
  <?php else: ?>
    <p style="text-align:center; color:red;">⚠️ No se encontró información sobre el alcalde.</p>
  <?php endif; ?>
</main>

<footer class="footer">
  <div class="footer-content">
    <p class="frase">Museo Municipal De El Progreso, Yoro</p>
    <img src="../Imagenes/Encabezado/LogoMuni.png" alt="Escudo de El Progreso" class="escudo" />
    <p class="copy">© 2025 Museo Municipal De El Progreso, Yoro. Todos los derechos reservados.</p>
  </div>
</footer>

</body>
</html>