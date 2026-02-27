<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'museo_alcaldes');

// Verificar conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Obtener datos del formulario
$evento_id = isset($_POST['evento_id']) ? intval($_POST['evento_id']) : 0;
$calificacion = isset($_POST['calificacion']) ? intval($_POST['calificacion']) : null;
$comentarios = isset($_POST['comentarios']) ? trim($_POST['comentarios']) : '';
$mejoras = isset($_POST['mejoras']) ? trim($_POST['mejoras']) : '';
$volver = isset($_POST['volver']) ? trim($_POST['volver']) : '';

// Validar campos obligatorios
if ($calificacion && $comentarios && $volver) {
    $stmt = $conexion->prepare("INSERT INTO respuestas_satisfaccion (evento_id, calificacion, comentarios, mejoras, volver) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $evento_id, $calificacion, $comentarios, $mejoras, $volver);

    if ($stmt->execute()) {
        // Redirige a la página principal después de enviar la encuesta
        header("Location: PaginaPrincipal.php");
        exit();
    } else {
        echo "Error al guardar la respuesta: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Por favor completa todos los campos obligatorios.";
}

$conexion->close();
?>
