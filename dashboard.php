<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: inicioSecion.html");
    exit();
}

// Conexión a la base de datos
include "PHP/config.php";


// Consulta para obtener los datos de calificaciones
$sql = "SELECT calificacion, COUNT(*) as total FROM respuestas_satisfaccion GROUP BY calificacion ORDER BY calificacion ASC";
$result = $conn->query($sql);

$labels = [];
$counts = [];

while ($row = $result->fetch_assoc()) {
  $labels[] = $row['calificacion'] . " ⭐";
  $counts[] = $row['total'];
}

$labels_json = json_encode($labels);
$counts_json = json_encode($counts);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel Administrativo</title>
  <link rel="stylesheet" href="CSS/dashboard.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

  <div class="dashboard-container">
    <aside class="sidebar">
      <h2>Admin</h2>
      <ul>
        <li><a href="gestionar_eventos.php">📅 Gestionar Eventos</a></li>
        <li><a href="gestionar_alcaldes.php">🧔‍♂️ Gestionar Alcaldes</a></li>
        <li><a href="gestionar_galeria.php">🖼️ Gestionar Galería</a></li>
        <li><a href="PHP/logout.php">🚪 Cerrar Sesión</a></li>
      </ul>
    </aside>

    <main class="main-panel">
      <h1>Bienvenido, <?php echo $_SESSION['usuario_nombre']; ?> 👋</h1>
      <p>Selecciona una opción del menú lateral para comenzar.</p>

      <div class="card-grid">
        <a href="gestionar_eventos.php" class="card">➕ Nuevo Evento</a>
        <a href="gestionar_alcaldes.php" class="card">➕ Nuevo Alcalde</a>
        <a href="gestionar_galeria.php" class="card">➕ Nueva Imagen</a>
      </div>

      <section class="metrica-section" style="margin-top: 40px;">
        <h2>📊 Métricas de Satisfacción</h2>
        <canvas id="graficaPastel" width="400" height="400"></canvas>
      </section>
    </main>
  </div>

  <script>
    const labels = <?php echo $labels_json; ?>;
    const data = <?php echo $counts_json; ?>;

    const ctx = document.getElementById('graficaPastel').getContext('2d');
    new Chart(ctx, {
      type: 'pie',
      data: {
        labels: labels,
        datasets: [{
          label: 'Calificaciones',
          data: data,
          backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF']
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom'
          }
        }
      }
    });
  </script>

</body>
</html>
