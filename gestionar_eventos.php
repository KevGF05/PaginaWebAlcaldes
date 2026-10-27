<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
  header("Location: inicioSecion.html");
  exit();
}

include 'PHP/config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['agregar_evento'])) {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $fecha_evento = $_POST['fecha_evento'];
  $hora_evento = $_POST['hora_evento'];
  $cupos = $_POST['cupos'];
  $estado = $_POST['estado'];

  // Procesar imagen
  $imagen_nombre = $_FILES['imagen']['name'];
  $imagen_temporal = $_FILES['imagen']['tmp_name'];
  $nombre_final = uniqid() . '_' . $imagen_nombre;

  $ruta_servidor = 'C:/xampp/htdocs/PaginaWebAlcaldes/eventosImg/' . $nombre_final;
  $ruta_web = 'eventosImg/' . $nombre_final;

  if (move_uploaded_file($imagen_temporal, $ruta_servidor)) {
    $sql = "INSERT INTO eventos (titulo, descripcion, fecha_evento, hora_evento, cupos, estado, imagen)
            VALUES ('$titulo', '$descripcion', '$fecha_evento', '$hora_evento', '$cupos', '$estado', '$ruta_web')";
    if (mysqli_query($conn, $sql)) {
      // ✅ Redirigir para evitar reenvío del formulario al recargar
      header("Location: gestionar_eventos.php?exito=1");
      exit();
    } else {
      echo "<p style='color:red;'>Error al guardar en la base de datos.</p>";
    }
  } else {
    echo "<p style='color:red;'>Error al subir la imagen.</p>";
  }
}

if (isset($_GET['eliminar'])) {
  $id = $_GET['eliminar'];
  mysqli_query($conn, "DELETE FROM eventos WHERE id = $id");
}

$eventos = mysqli_query($conn, "SELECT * FROM eventos ORDER BY fecha_evento ASC, hora_evento ASC");
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Gestionar Eventos</title>
  <link rel="stylesheet" href="css/gestionar_eventos.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>

  <div class="container">
    <h1>📅 Gestión de Eventos</h1>

    <!-- ✅ Mensaje de éxito tras redirección -->
    <?php if (isset($_GET['exito']) && $_GET['exito'] == 1): ?>
      <p style="color: green; font-weight: bold;">✅ Evento agregado correctamente.</p>
    <?php endif; ?>

    <h2>Agregar Nuevo Evento</h2>
    <form method="POST" action="" enctype="multipart/form-data">
      <input type="text" name="titulo" placeholder="Título del evento" required>
      <textarea name="descripcion" rows="3" placeholder="Descripción" required></textarea>
      <input type="date" name="fecha_evento" required>
      <input type="time" name="hora_evento" required>
      <input type="number" name="cupos" placeholder="Cupos disponibles" min="1" required>
      <select name="estado" required>
        <option value="activo">Activo</option>
        <option value="finalizado">Finalizado</option>
        <option value="cancelado">Cancelado</option>
      </select>
      <input type="file" name="imagen" accept="image/*" required>
      <button type="submit" name="agregar_evento">Guardar Evento</button>
    </form>

    <h2>📋 Eventos Registrados</h2>
    <table>
      <tr>
        <th>Título</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Cupos</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
      <?php while ($evento = mysqli_fetch_assoc($eventos)) : ?>
        <tr>
          <td><?php echo htmlspecialchars($evento['titulo']); ?></td>
          <td><?php echo htmlspecialchars($evento['fecha_evento']); ?></td>
          <td><?php echo htmlspecialchars($evento['hora_evento']); ?></td>
          <td><?php echo htmlspecialchars($evento['cupos']); ?></td>
          <td><?php echo ucfirst(htmlspecialchars($evento['estado'])); ?></td>
          <td>
            <a href="?eliminar=<?php echo $evento['id']; ?>" onclick="return confirm('¿Eliminar este evento?');">🗑 Eliminar</a>
            <br>
            <a href="ver_inscritos.php?evento_id=<?php echo $evento['id']; ?>" class="ver-inscritos">👥 Ver inscritos</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>

  <div style="margin-bottom: 20px;">
    <a href="admin_panel.php" style="padding: 10px 20px; background-color: #ffa726; color: white; border-radius: 6px; text-decoration: none; font-weight: bold;">
      ⬅️ Volver al Panel de Administración
    </a>
  </div>

</body>
</html>
