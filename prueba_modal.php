<?php
// Simulamos datos que normalmente traerías de la DB
$alcaldes = [
  ['id' => 1, 'nombre' => 'Juan Pérez', 'periodo' => '2000-2004', 'descripcion' => 'Fue un alcalde ejemplar...', 'frase' => '¡Por el progreso!', 'imagen' => 'Imagenes/Alcaldes/juanperez.jpg'],
  ['id' => 2, 'nombre' => 'María López', 'periodo' => '2005-2010', 'descripcion' => 'Impulsó proyectos importantes...', 'frase' => 'Juntos avanzamos.', 'imagen' => 'Imagenes/Alcaldes/marialopez.jpg'],
];
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>Prueba Modal Alcaldes</title>
  <style>
    .modal {
      position: fixed;
      top: 0; left: 0; width: 100%; height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: none; /* oculto por defecto */
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }
    .modal-contenido {
      background: white;
      padding: 20px;
      border-radius: 8px;
      max-width: 600px;
      max-height: 80%;
      overflow-y: auto;
      position: relative;
    }
    .cerrar {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 25px;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <h1>Alcaldes</h1>

  <?php foreach ($alcaldes as $alcalde): ?>
    <div>
      <img src="<?php echo htmlspecialchars($alcalde['imagen']); ?>" alt="Foto <?php echo htmlspecialchars($alcalde['nombre']); ?>" style="width:100px;cursor:pointer" />
      <h3><?php echo htmlspecialchars($alcalde['nombre']); ?></h3>
      <p>Periodo: <?php echo htmlspecialchars($alcalde['periodo']); ?></p>
      <button onclick="abrirModal(<?php echo $alcalde['id']; ?>)">Ver más</button>

      <!-- Contenido oculto para modal -->
      <div id="contenido-alcalde-<?php echo $alcalde['id']; ?>" style="display:none;">
        <h2><?php echo htmlspecialchars($alcalde['nombre']); ?></h2>
        <p><strong>Período:</strong> <?php echo htmlspecialchars($alcalde['periodo']); ?></p>
        <p><?php echo nl2br(htmlspecialchars($alcalde['descripcion'])); ?></p>
        <p><em><?php echo htmlspecialchars($alcalde['frase']); ?></em></p>
      </div>
    </div>
    <hr />
  <?php endforeach; ?>

  <!-- Modal -->
  <div id="modalAlcalde" class="modal">
    <div class="modal-contenido">
      <span class="cerrar" onclick="cerrarModal()">×</span>
      <div id="contenidoModalAlcalde"></div>
    </div>
  </div>

  <script>
    function abrirModal(id) {
      const contenido = document.getElementById('contenido-alcalde-' + id);
      const modal = document.getElementById('modalAlcalde');
      const contenedor = document.getElementById('contenidoModalAlcalde');

      if (contenido && modal && contenedor) {
        contenedor.innerHTML = contenido.innerHTML;
        modal.style.display = 'flex';
      } else {
        alert('Error: No se encontró el contenido o el modal.');
      }
    }

    function cerrarModal() {
      document.getElementById('modalAlcalde').style.display = 'none';
    }
  </script>

</body>
</html>
