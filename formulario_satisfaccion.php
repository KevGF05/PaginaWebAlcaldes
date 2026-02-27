<?php
$evento_id = isset($_GET['evento_id']) ? intval($_GET['evento_id']) : 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Encuesta de Satisfacción del Evento</title>
  <link rel="stylesheet" href="css/formularioSastifacion.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
</head>
<body>
  <div class="encuesta-container">
    <h1>📝 Encuesta de Satisfacción</h1>
    <p>Gracias por asistir al evento. Tu opinión es muy importante para nosotros.</p>
    <form id="form-satisfaccion" method="POST" action="procesar_satisfaccion.php">
      <input type="hidden" name="evento_id" value="<?php echo $evento_id; ?>">

      <label>1. ¿Cómo calificarías el evento en general?</label>
      <div class="estrellas">
        <label><input type="radio" name="calificacion" value="1" required> ⭐</label>
        <label><input type="radio" name="calificacion" value="2"> ⭐⭐</label>
        <label><input type="radio" name="calificacion" value="3"> ⭐⭐⭐</label>
        <label><input type="radio" name="calificacion" value="4"> ⭐⭐⭐⭐</label>
        <label><input type="radio" name="calificacion" value="5"> ⭐⭐⭐⭐⭐</label>
      </div>

      <label for="comentarios">2. ¿Qué fue lo que más te gustó?</label>
      <textarea name="comentarios" id="comentarios" rows="3" required></textarea>

      <label for="mejoras">3. ¿Qué podríamos mejorar?</label>
      <textarea name="mejoras" id="mejoras" rows="3"></textarea>

      <label for="volver">4. ¿Asistirías a un próximo evento?</label>
      <select name="volver" id="volver" required>
        <option value="">Seleccione una opción</option>
        <option value="si">Sí</option>
        <option value="no">No</option>
        <option value="depende">Depende del tema</option>
      </select>

      <button type="submit">Enviar Respuesta</button>
    </form>
  </div>

  <script src="js/satisfaccion.js"></script>
</body>
</html>
