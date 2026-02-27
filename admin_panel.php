<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: iniciar_sesion.html");
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

  <style>
    .grafico-container {
      width: 400px;
      height: 400px;
      margin: 0 auto;
    }

    #graficaPastel {
      width: 100% !important;
      height: 100% !important;
    }
  </style>
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
        <div class="grafico-container">
          <canvas id="graficaPastel"></canvas>
        </div>
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
          backgroundColor: [
            '#ff9999', '#66b3ff', '#99ff99', '#ffcc99', '#c2c2f0'
          ],
          borderColor: '#ffffff',
          borderWidth: 2
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              font: {
                size: 14
              }
            }
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                return `${context.label}: ${context.raw} votos`;
              }
            }
          }
        }
      }
    });
  </script>

</body>
</html>
