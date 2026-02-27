<?php
include "PHP/config.php";
$imagenes = mysqli_query($conn, "SELECT * FROM galeria ORDER BY fecha_subida DESC");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Galería</title>
  <link rel="stylesheet" href="CSS/EstilosGenerales.css" />
  <link rel="stylesheet" href="CSS/EstilosGaleria.css" />
  <link rel="stylesheet" href="CSS/modal.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <script src="JS/Scripts.js" defer></script>
  <script>
    // Función para filtrar imágenes por categoría
    function filtrarGaleria() {
      const filtro = document.getElementById('filtro').value;
      const imagenes = document.querySelectorAll('.galeria .imagen');
      imagenes.forEach(img => {
        const categoria = img.getAttribute('data-categoria');
        if (filtro === 'todos' || categoria === filtro) {
          img.style.display = 'block';
        } else {
          img.style.display = 'none';
        }
      });
    }
  </script>
</head>

<body>
  <!-- Header -->
  <header class="encabezado">
    <div class="contenido-encabezado">
      <a href="inicioSecion.html">
        <img src="Imagenes/Encabezado/LogoMuni.png" alt="Logo" class="logo" style="cursor: pointer" />
      </a>
    </div>
  </header>

  <!-- Navegación -->
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

  <!-- Título -->
  <header class="titulo-container">
    <h1 class="titulo-principal">Galería</h1>
    <h2 class="subtitulo">"Museo De la Ciudad De El Progreso, Yoro"</h2>
  </header>

  <div class="linea-separadora"></div>

  <!-- Filtro -->
  <div class="filtro-container">
    <label for="filtro">Filtrar por categoría:</label>
    <select id="filtro" onchange="filtrarGaleria()">
      <option value="todos">Mostrar todas</option>
      <option value="externo">Museo Externo</option>
      <option value="interno">Museo Interno</option>
    </select>
  </div>

  <!-- Galería dinámica -->
  <div class="galeria">
    <?php while ($img = mysqli_fetch_assoc($imagenes)) :
      // Extraemos categoría "interno" o "externo" según el nombre del archivo
      $categoria = strtolower(str_replace("Museo", "", explode("/", $img['archivo_imagen'])[0]));
    ?>
      <div class="imagen" data-categoria="<?php echo htmlspecialchars($categoria); ?>">
        <img
          src="Imagenes/Galeria/<?php echo htmlspecialchars($img['archivo_imagen']); ?>"
          alt="<?php echo htmlspecialchars($img['titulo']); ?>"
          onclick="abrirImagenModal(this.src)"
          style="cursor: pointer" />
        <div class="overlay"><?php echo htmlspecialchars($img['descripcion']); ?></div>
      </div>
    <?php endwhile; ?>
  </div>

  <!-- Modal Introducción -->
  <div class="modal" id="modalIntro" style="display:none;">
    <div class="modal-contenido">
      <span class="cerrar" onclick="cerrarModal('Intro')">&times;</span>
      <h3>Introducción</h3>
      <p>Esta es una galería del museo de El Progreso, Yoro. Aquí podrás explorar imágenes del museo interno y externo, apreciando su historia y cultura.</p>
    </div>
  </div>

  <!-- Modal Imagen -->
  <div class="modal" id="modalImagen" style="display:none;">
    <div class="modal-contenido" style="padding: 0; background: transparent; box-shadow: none;">
      <span class="cerrar" onclick="cerrarImagenModal()">&times;</span>
      <img id="imagenAmpliada" class="imagen-modal" src="" alt="Imagen ampliada" />
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="overlay"></div>
    <div class="footer-content">
      <p class="frase">Museo Municipal De El Progreso, Yoro</p>
      <img src="Imagenes/Encabezado/LogoMuni.png" alt="Escudo de El Progreso" class="escudo" />
      <p class="copy">© Copyright 2025 Museo Municipal De El Progreso, Yoro. Todos los derechos reservados.</p>
    </div>
  </footer>
</body>

</html>
