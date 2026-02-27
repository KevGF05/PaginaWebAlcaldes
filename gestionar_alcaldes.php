<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
    header("Location: iniciar_sesion.html");
    exit();
}

include 'PHP/config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['agregar_alcalde'])) {
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $frase = trim($_POST['frase']);
    $periodo = trim($_POST['periodo']);
    $orden = intval($_POST['orden']);
    $es_actual = isset($_POST['alcalde_actual']) ? 1 : 0;


    if (!empty($nombre) && !empty($descripcion) && !empty($periodo)) {
        $stmt_check = $conn->prepare("SELECT COUNT(*) FROM alcaldes WHERE nombre = ?");
        $stmt_check->bind_param("s", $nombre);
        $stmt_check->execute();
        $stmt_check->bind_result($count);
        $stmt_check->fetch();
        $stmt_check->close();

        if ($count > 0) {
            $mensaje = "<p style='color:red;'>❌ Ya existe un alcalde con ese nombre.</p>";
        } else {
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
                $imagen_nombre = basename($_FILES['imagen']['name']);
                $imagen_tmp = $_FILES['imagen']['tmp_name'];
                $ruta_destino = 'Imagenes/Alcaldes/' . uniqid() . '_' . $imagen_nombre;

                if (move_uploaded_file($imagen_tmp, $ruta_destino)) {
                    if ($es_actual === 1) {
                        $conn->query("UPDATE alcaldes SET es_actual = 0");
                    }

                    $stmt = $conn->prepare("INSERT INTO alcaldes (nombre, descripcion, frase, periodo, imagen, orden, es_actual) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssssii", $nombre, $descripcion, $frase, $periodo, $ruta_destino, $orden, $es_actual);

                    if ($stmt->execute()) {
                        $mensaje = "<p style='color:green;'>✅ Alcalde agregado correctamente.</p>";
                    } else {
                        $mensaje = "<p style='color:red;'>❌ Error al guardar en la base de datos.</p>";
                    }
                    $stmt->close();
                } else {
                    $mensaje = "<p style='color:red;'>❌ Error al subir la imagen.</p>";
                }
            } else {
                $mensaje = "<p style='color:red;'>❌ Por favor selecciona una imagen válida.</p>";
            }
        }
    } else {
        $mensaje = "<p style='color:red;'>❌ Todos los campos son obligatorios.</p>";
    }
}

if (isset($_GET['eliminar'])) {
    $id = intval($_GET['eliminar']);

    $result_img = mysqli_query($conn, "SELECT imagen FROM alcaldes WHERE id = $id");
    if ($result_img && mysqli_num_rows($result_img) > 0) {
        $row_img = mysqli_fetch_assoc($result_img);
        $imagen_a_borrar = $row_img['imagen'];
        if (file_exists($imagen_a_borrar)) {
            unlink($imagen_a_borrar);
        }
    }

    mysqli_query($conn, "DELETE FROM alcaldes WHERE id = $id");
    header("Location: gestionar_alcaldes.php");
    exit();
}

$alcaldes = mysqli_query($conn, "SELECT * FROM alcaldes ORDER BY orden ASC, periodo DESC");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Alcaldes</title>
    <link rel="stylesheet" href="css/gestionar_galeria.css">
</head>

</style>

<body>
    <div class="container">
        <h1>🧔‍♂️ Gestión de Alcaldes</h1>

        <?php echo $mensaje; ?>

        <h2>Agregar Nuevo Alcalde</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="nombre" placeholder="Nombre del alcalde" required>
            <input type="text" name="periodo" placeholder="Período (Ej: 2006-2010)" required>
            <textarea name="descripcion" rows="3" placeholder="Descripción / Trayectoria" required></textarea>
            <textarea name="frase" rows="2" placeholder="Frase célebre u opinión" required></textarea>
            <input type="number" name="orden" placeholder="Orden en la lista (ej. 1, 2, 3)" min="1" value="1" required>

            <label class="checkbox-label">
                <input type="checkbox" name="alcalde_actual" value="1">
                Alcalde Actual
            </label>


            <input type="file" name="imagen" accept="image/*" required>
            <button type="submit" name="agregar_alcalde">Guardar Alcalde</button>
        </form>

        <h2>📋 Alcaldes Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Período</th>
                    <th>Orden</th>
                    <th>Actual</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($a = mysqli_fetch_assoc($alcaldes)) : ?>
                    <tr>
                        <td><img src="<?php echo htmlspecialchars($a['imagen']); ?>" width="70" style="object-fit: cover; border-radius: 6px;"></td>
                        <td><?php echo htmlspecialchars($a['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($a['periodo']); ?></td>
                        <td><?php echo $a['orden']; ?></td>
                        <td><?php echo $a['es_actual'] ? "✅" : ""; ?></td>
                        <td><a href="?eliminar=<?php echo $a['id']; ?>" onclick="return confirm('¿Eliminar este alcalde?');">Eliminar</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>


    </div>

    <div style="margin-bottom: 20px;">
        <a href="admin_panel.php" style="padding: 10px 20px; background-color: #ffa726; color: white; border-radius: 6px; text-decoration: none; font-weight: bold;">
            ⬅️ Volver al Panel de Administración
        </a>
    </div>
</body>

</html>