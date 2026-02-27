<?php include '../PHP/config.php'; ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Don Cayetano Mejía</title>

    <link rel="stylesheet" href="../css/EstilosGenerales.css" />
    <link rel="stylesheet" href="../css/EstilosContactos.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <script src="JS/Scripts.js" defer></script>
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
        <a href="galeria.php">Galería</a>
        <div class="separador"></div>
        <a href="Contacto.html">Contactos</a>
        <div class="inscriccion separador"></div>
        <a href="Evento.php">Eventos</a>
      </ul>
    </nav>
    <!--Titulo y subtituli de pagina -->
    <header class="titulo-container">
      <h1 class="titulo-principal">Don Cayetano Mejía (1908) </h1>
      <h2 class="subtitulo">"Museo De La Ciudad De El Progreso, Yoro"</h2>
    </header>
    
    

<main class= "Contenido Principal">
     <!-- Alcalde actual (fijo) -->
    <?php
    $actual_query = mysqli_query($conn, "SELECT * FROM alcaldes WHERE nombre = 'Don Cayetano Mejía'  LIMIT 1");
    $alcalde_actual = mysqli_fetch_assoc($actual_query);
    ?>

    <!-- Alcalde actual (fijo) -->
    <?php if ($alcalde_actual): ?>-

      <section class="alcalde">
        <div class="contenedor-alcalde">
          <img src="../<?php echo htmlspecialchars($alcalde_actual['imagen']); ?>" alt="Foto del Alcalde" class="foto-alcalde" onclick="abrirImagenModal(this.src)" />
          <div class="info-alcalde">
            <h3><?php echo htmlspecialchars($alcalde_actual['nombre']); ?></h3>
            <p><?php echo htmlspecialchars($alcalde_actual['periodo']); ?></p>
            <p><em><?php echo htmlspecialchars($alcalde_actual['descripcion']); ?></em></p>
            <div id="infoSection" class="info-section">
              <p><?php echo nl2br(htmlspecialchars($alcalde_actual['descripcion'])); ?></p>
            </div>
            <button id="verMasBtn" onclick="toggleInfo()">Ver más</button>
          </div>
        </div>
      </section>
    <?php else: ?>
      <p style="text-align:center; color: red;">⚠️ No hay un alcalde actual definido.</p>
    <?php endif; ?>
  </main>



  </body>
</html>
