<?php
include 'PHP/config.php';

if (!isset($_GET['evento_id'])) {
    echo "Evento no especificado.";
    exit();
}

$evento_id = $_GET['evento_id'];

// Obtener información del evento
$evento_query = mysqli_query($conn, "SELECT * FROM eventos WHERE id = $evento_id");
$evento = mysqli_fetch_assoc($evento_query);

// Obtener inscritos
$inscritos_query = mysqli_query($conn, "SELECT * FROM inscripciones_eventos WHERE evento_id = $evento_id");
$total_inscritos = mysqli_num_rows($inscritos_query);

// Calcular cupos restantes
$cupos_restantes = $evento['cupos'] - $total_inscritos;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inscritos al Evento</title>
    <link rel="stylesheet" href="CSS/gestionar_eventos.css">
    <link rel="stylesheet" href="/CSS/ver_inscritos.css">
</head>

<body>
    <div class="container">
        <h1>📋 Inscritos a: <?php echo htmlspecialchars($evento['titulo']); ?></h1>
        <p><strong>Cupos disponibles:</strong> <?php echo $evento['cupos']; ?></p>
        <p><strong>Inscritos:</strong> <?php echo $total_inscritos; ?></p>
        <p><strong>Cupos restantes:</strong> <?php echo max(0, $cupos_restantes); ?></p>

        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
            </tr>

            <?php while ($inscrito = mysqli_fetch_assoc($inscritos_query)) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($inscrito['primer_nombre']); ?></td>
                    <td><?php echo htmlspecialchars($inscrito['primer_apellido']); ?></td>
                    <td><?php echo htmlspecialchars($inscrito['email']); ?></td>
                    <td><?php echo htmlspecialchars($inscrito['telefono']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <div style="margin-bottom: 20px;">
        <a href="gestionar_eventos.php" style="padding: 10px 20px; background-color: #ffa726; color: white; border-radius: 6px; text-decoration: none; font-weight: bold;">
            ⬅️ Volver al Panel de Administración
        </a>
    </div>
</body>

</html>