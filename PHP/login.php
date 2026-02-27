<?php
session_start();
include 'config.php'; // tu conexión a la BD

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Limpieza básica para evitar inyección
    $usuario = mysqli_real_escape_string($conn, $usuario);
    $contrasena = mysqli_real_escape_string($conn, $contrasena);

    $query = "SELECT * FROM usuarios WHERE nombre = '$usuario'";
    $resultado = mysqli_query($conn, $query);

    if ($resultado && mysqli_num_rows($resultado) === 1) {
        $user = mysqli_fetch_assoc($resultado);

        // Verificar contraseña: si usas password_hash en la DB usa password_verify
        // Si la contraseña está en texto plano, se compara directo (no recomendado)
        if (password_verify($contrasena, $user['contrasena']) || $user['contrasena'] === $contrasena) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nombre'] = $user['nombre'];
            $_SESSION['rol'] = $user['rol'];

            echo json_encode([
                'exito' => true,
                'redireccion' => '/PaginaWebAlcaldes8725/PaginaWebAlcaldes/admin_panel.php'
            ]);
            exit();
        } else {
            echo json_encode([
                'exito' => false,
                'mensaje' => 'Contraseña incorrecta.',
                'errorCampo' => 'contrasena'
            ]);
            exit();
        }
    } else {
        echo json_encode([
            'exito' => false,
            'mensaje' => 'Usuario no encontrado.',
            'errorCampo' => 'usuario'
        ]);
        exit();
    }
} else {
    http_response_code(405);
    echo json_encode([
        'exito' => false,
        'mensaje' => 'Método no permitido'
    ]);
    exit();
}
