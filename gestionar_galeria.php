<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'admin') {
    header("Location: iniciar_sesion.html");
    exit();
}

include 'PHP/config.php';


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['agregar_imagen'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria']; // MuseoExterno o MuseoInterno

    $nombre_imagen = basename($_FILES['imagen']['name']);
    $ruta_guardado = "Imagenes/Galeria/$categoria/" . $nombre_imagen;

    // Asegúrate de que el directorio existe
    if (!is_dir("Imagenes/Galeria/$categoria")) {
        mkdir("Imagenes/Galeria/$categoria", 0777, true);
    }

    // Mover la imagen al directorio correspondiente
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_guardado)) {
        // Guarda solo la ruta relativa en la base de datos
        $archivo_imagen = "$categoria/" . $nombre_imagen;

        $sql = "INSERT INTO galeria (titulo, descripcion, archivo_imagen) 
                VALUES ('$titulo', '$descripcion', '$archivo_imagen')";
        mysqli_query($conn, $sql);
    } else {
        echo "<p style='color: red;'>❌ Error al subir la imagen.</p>";
    }
}


if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $img = mysqli_fetch_assoc(mysqli_query($conn, "SELECT archivo_imagen FROM galeria WHERE id = $id"));
    if ($img && file_exists($img['archivo_imagen'])) {
        unlink($img['archivo_imagen']);
    }
    mysqli_query($conn, "DELETE FROM galeria WHERE id = $id");
}

$resultado = mysqli_query($conn, "SELECT * FROM galeria ORDER BY fecha_subida DESC");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestor de Galería</title>
    <link rel="stylesheet" href="css/gestionar_eventos.css">
    <link rel="stylesheet" href="css/gestionar_galeria.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>🖼️ Gestión de Galería</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="titulo" placeholder="Título" required>
            <textarea name="descripcion" placeholder="Descripción" required></textarea>

            <select name="categoria" required>
                <option value="MuseoExterno">Museo Externo</option>
                <option value="MuseoInterno">Museo Interno</option>
            </select>

            <input type="file" name="imagen" accept="image/*" required>
            <button type="submit" name="agregar_imagen">Agregar Imagen</button>
        </form>


        <h2>📷 Imágenes Subidas</h2>
        <table>
            <tr>
                <th>Imagen</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Eliminar</th>
            </tr>
            <?php while ($fila = mysqli_fetch_assoc($resultado)) : ?>
                <tr>
                    <td><img src="<?php echo $fila['archivo_imagen']; ?>" width="80"></td>
                    <td><?php echo $fila['titulo']; ?></td>
                    <td><?php echo $fila['descripcion']; ?></td>
                    <td><a href="?eliminar=<?php echo $fila['id']; ?>" onclick="return confirm('¿Eliminar imagen?')">Eliminar</a></td>
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