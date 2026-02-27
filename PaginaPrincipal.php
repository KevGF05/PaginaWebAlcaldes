<?php include 'PHP/config.php'; ?>



<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Alcaldes De El Progreso</title>

  <link rel="stylesheet" href="css/EstilosGenerales.css" />
  <link rel="stylesheet" href="css/modal.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

  <style>
    /* MODALES CENTRADOS */
    .modal {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0, 0, 0, 0.6);
      display: none;
      /* oculto por defecto */
      justify-content: center;
      align-items: center;
      z-index: 1000;
      overflow-y: auto;
      padding: 20px;
    }

    .modal-contenido {
      background: #fff;
      border-radius: 10px;
      max-width: 600px;
      width: 90%;
      max-height: 90vh;
      overflow-y: auto;
      padding: 20px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
      position: relative;
    }

    .modal-contenido .cerrar {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 24px;
      font-weight: bold;
      color: #333;
      cursor: pointer;
    }

    /* FOTO ALCALDE FIJO CIRCULAR */
    .foto-alcalde {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      object-fit: cover;
      cursor: pointer;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      flex-shrink: 0;
    }

    /* CONTENEDOR ALCALDE FIJO */
    .contenedor-alcalde {
      display: flex;
      align-items: flex-start;
      gap: 20px;
      margin-bottom: 30px;
      flex-wrap: wrap;
    }

    .info-alcalde {
      flex: 1;
      min-width: 250px;
    }

    .info-alcalde h3,
    .info-alcalde p,
    .info-alcalde em {
      margin: 8px 0;
    }

    /* TEXTO EXPANDIBLE DEL ALCALDE FIJO */
    .info-section {
      max-height: 70px;
      overflow: hidden;
      transition: max-height 0.3s ease;
    }

    .info-section.expandido {
      max-height: 1000px;
      overflow: visible;
    }

    /* BOTON VER MÁS */
    #verMasBtn {
      margin-top: 10px;
      padding: 8px 16px;
      background-color: #f57c00;
      border: none;
      border-radius: 6px;
      color: white;
      cursor: pointer;
      font-size: 1em;
      transition: background-color 0.3s;
    }

    #verMasBtn:hover {
      background-color: #f9a825;
    }
  </style>
</head>

<body>
  <!-- Encabezado -->
  <header class="encabezado">
    <div class="contenido-encabezado">
      <a href="inicioSecion.html">
        <img src="Imagenes/Encabezado/LogoMuni.png" alt="Logo" class="logo" />
      </a>
    </div>
  </header>

  <!-- Menú -->
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
    <h1 class="titulo-principal">Biografía De Los Alcaldes De El Progreso, Yoro</h1>
    <h2 class="subtitulo">"Un recorrido en la historia de nuestros líderes municipales"</h2>
  </header>

  <div class="linea-separadora"></div>

  <!-- Contenido principal -->
  <main class="contenido-principal">

    <!-- Alcalde actual (fijo) -->
    <?php
    $actual_query = mysqli_query($conn, "SELECT * FROM alcaldes WHERE es_actual = 1 LIMIT 1");
    $alcalde_actual = mysqli_fetch_assoc($actual_query);
    ?>

    <!-- Alcalde actual (fijo) -->
    <?php if ($alcalde_actual): ?>
      <section class="alcalde">
        <div class="contenedor-alcalde">
          <img src="<?php echo htmlspecialchars($alcalde_actual['imagen']); ?>" alt="Foto del Alcalde" class="foto-alcalde" onclick="abrirImagenModal(this.src)" />
          <div class="info-alcalde">
            <h3><?php echo htmlspecialchars($alcalde_actual['nombre']); ?></h3>
            <p><?php echo htmlspecialchars($alcalde_actual['periodo']); ?></p>
            <p><em><?php echo htmlspecialchars($alcalde_actual['frase']); ?></em></p>
            <div id="infoSection" class="info-section">
              <p><?php echo nl2br(htmlspecialchars($alcalde_actual['descripcion_total'])); ?></p>
            </div>
            <button id="verMasBtn" onclick="toggleInfo()">Ver más</button>
          </div>
        </div>
      </section>
    <?php else: ?>
      <p style="text-align:center; color: red;">⚠️ No hay un alcalde actual definido.</p>
    <?php endif; ?>

<!-- Otros alcaldes desde la base de datos -->

<section class="tarjetas-alcaldes">
  <?php
  $query = "
    SELECT a.*, r.resumen 
    FROM alcaldes a
    LEFT JOIN res_alcaldes r ON a.id = r.id_alcalde
    WHERE a.nombre != 'Abogado Alexander Lopez Orellana'
    ORDER BY a.orden ASC
  ";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $id = (int)$row['id'];
    $archivoPhp = $row['archivo']; // Usa el valor directamente de la BD
  ?>
    <div class="tarjeta">
      <img src="<?php echo htmlspecialchars($row['imagen']); ?>" alt="Alcalde <?php echo htmlspecialchars($row['nombre']); ?>" onclick="abrirImagenModal(this.src)" style="cursor: pointer" />
      <h4><?php echo htmlspecialchars($row['nombre']); ?></h4>
      <p>Periodo: <?php echo htmlspecialchars($row['periodo']); ?></p>
      <div class="decoracion"></div>
      <button onclick="abrirModal(<?php echo $id; ?>)">Ver más</button>

      <div id="contenido-alcalde-<?php echo $id; ?>" style="display: none;">
        <h3><?php echo htmlspecialchars($row['nombre']); ?></h3>
        <p><strong>Período:</strong> <?php echo htmlspecialchars($row['periodo']); ?></p>
        <p>
          <?php echo !empty($row['descripcion_total']) ? htmlspecialchars($row['descripcion_total']) : ''; ?>
        </p>
        <p><em><?php echo htmlspecialchars($row['frase']); ?></em></p>

        <!-- Enlace "Ver más detalles" apuntando al archivo PHP correspondiente -->
        <?php if (!empty($archivoPhp)): ?>
      <a href="alcaldes_data/<?php echo htmlspecialchars($archivoPhp); ?>" class="btn-ver-mas">Ver más</a>

<?php else: ?>
  <button disabled style="background-color: gray; cursor: not-allowed;">Sin detalles</button>
<?php endif; ?>
      </div>
    </div>
  <?php
  }
  ?>
</section>


  </main>

  <!-- MODALES -->

  <div class="modal" id="modalIntro">
    <div class="modal-contenido">
      <span class="cerrar" onclick="cerrarModal('Intro')">&times;</span>
      <h3>Introducción</h3>
      <p>Bienvenido a la página de los alcaldes de El Progreso, Yoro. Aquí encontrarás información detallada sobre quienes han liderado el municipio a lo largo de los años...</p>
    </div>
  </div>

  <div class="modal" id="modalImagen">
    <div class="modal-contenido" style="padding: 0; background: transparent; box-shadow: none;">
      <span class="cerrar" onclick="cerrarImagenModal()">&times;</span>
      <img id="imagenAmpliada" class="imagen-modal" src="" />
    </div>
  </div>

  <div class="modal" id="modalAlcalde">
    <div class="modal-contenido">
      <span class="cerrar" onclick="cerrarModal('Alcalde')">&times;</span>
      <div id="contenidoModalAlcalde"></div>
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

  <!-- SCRIPTS -->
  <script>
    // Abre modal: si id es 'Intro' abre modalIntro, si es número abre modalAlcalde
    function abrirModal(id) {
      if (id === 'Intro') {
        document.getElementById('modalIntro').style.display = 'flex';
        return;
      }
      const contenido = document.getElementById('contenido-alcalde-' + id);
      const modal = document.getElementById('modalAlcalde');
      const contenedor = document.getElementById('contenidoModalAlcalde');
      if (!contenido || !modal || !contenedor) {
        alert('Error al cargar modal de alcalde');
        return;
      }
      contenedor.innerHTML = contenido.innerHTML;
      modal.style.display = 'flex';
    }

    // Cierra modales
    function cerrarModal(tipo) {
      if (tipo === 'Intro') {
        document.getElementById('modalIntro').style.display = 'none';
      } else if (tipo === 'Alcalde') {
        document.getElementById('modalAlcalde').style.display = 'none';
      }
    }

    // Modal imagen ampliada
    function abrirImagenModal(src) {
      const modalImagen = document.getElementById('modalImagen');
      const imagenAmpliada = document.getElementById('imagenAmpliada');
      if (!modalImagen || !imagenAmpliada) {
        alert('Modal o imagen para ampliar no encontrados');
        return;
      }
      imagenAmpliada.src = src;
      modalImagen.style.display = 'flex';
    }

    function cerrarImagenModal() {
      document.getElementById('modalImagen').style.display = 'none';
    }

    // Toggle info alcalde fijo
    function toggleInfo() {
      const infoSection = document.getElementById("infoSection");
      const btn = document.getElementById("verMasBtn");
      if (!infoSection || !btn) return;

      if (infoSection.classList.contains("expandido")) {
        infoSection.classList.remove("expandido");
        btn.textContent = "Ver más";
      } else {
        infoSection.classList.add("expandido");
        btn.textContent = "Ocultar información";
      }
    }

    function toggleInfo() {
      const infoSection = document.getElementById("infoSection");
      const btn = document.getElementById("verMasBtn");
      if (!infoSection || !btn) return;

      if (infoSection.classList.contains("expandido")) {
        infoSection.classList.remove("expandido");
        btn.textContent = "Ver más";
      } else {
        infoSection.classList.add("expandido");
        btn.textContent = "Ocultar información";
      }
    }
  </script>
</body>

</html>