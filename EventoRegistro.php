<?php
include "PHP/config.php";
$eventos = mysqli_query($conn, "SELECT id, titulo FROM eventos WHERE estado = 'activo'");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/EstilosGenerales.css" />
  <link rel="stylesheet" href="css/FormularioEvento.css" />
  <title>Inscripción a Eventos</title>
</head>
<body>
  <!-- Encabezado -->
  <header class="encabezado">
    <div class="contenido-encabezado">
      <img src="Imagenes/Encabezado/LogoMuni.png" alt="Logo" class="logo" />
    </div>
  </header>

  <!-- Menú -->
  <nav class="barra-menu">
    <ul>
      <li><a href="PaginaPrincipal.html">Inicio</a></li>
      <div class="separador"></div>
      <li><a href="#" onclick="abrirModal('Intro')">Introducción</a></li>
      <div class="separador"></div>
      <a href="galeria.php">Galería</a>
      <div class="separador"></div>
      <a href="Contacto.html">Contactos</a>
      <div class="separador"></div>
      <a href="evento.php">Eventos</a>
    </ul>
  </nav>

  <!-- Formulario -->
  <section class="formulario-evento">
    <h2 class="titulo-formulario">Inscripción a Eventos</h2>
    <form action="procesar_inscripcion.php" method="post" class="form-evento">
      <label for="primer_nombre">Primer Nombre:</label>
      <input type="text" name="primer_nombre" id="primer_nombre" required>

      <label for="segundo_nombre">Segundo Nombre:</label>
      <input type="text" name="segundo_nombre" id="segundo_nombre">

      <label for="primer_apellido">Primer Apellido:</label>
      <input type="text" name="primer_apellido" id="primer_apellido" required>

      <label for="segundo_apellido">Segundo Apellido:</label>
      <input type="text" name="segundo_apellido" id="segundo_apellido">

      <label for="email">Correo electrónico:</label>
      <input type="email" name="email" id="email" required>

      <label for="telefono">Teléfono:</label>
      <input type="tel" name="telefono" id="telefono" required pattern="[0-9]{8}">

      <label for="evento_id">Seleccione el Evento:</label>
      <select name="evento_id" id="evento_id" required>
        <option value="">-- Seleccione un evento --</option>
        <?php while($e = mysqli_fetch_assoc($eventos)): ?>
          <option value="<?= $e['id'] ?>"><?= htmlspecialchars($e['titulo']) ?></option>
        <?php endwhile; ?>
      </select>

      <input type="submit" value="Enviar inscripción">
    </form>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="overlay"></div>
    <div class="footer-content">
      <p class="frase">Museo Municipal De El Progreso, Yoro</p>
      <img src="Imagenes/Encabezado/LogoMuni.png" alt="Escudo de El Progreso" class="escudo" />
      <p class="copy">© 2025 Museo Municipal De El Progreso, Yoro. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>
</html>






