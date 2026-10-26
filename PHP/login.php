<?php
session_start();
include 'config.php'; // tu conexión a la BD

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Consulta preparada para evitar inyección SQL
    $stmt = mysqli_prepare($conn, "SELECT * FROM usuarios WHERE nombre = ?");
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($resultado && mysqli_num_rows($resultado) === 1) {
        $user = mysqli_fetch_assoc($resultado);

        $valido = password_verify($contrasena, $user['contrasena']);

        // Usuario antiguo con la contraseña en texto plano: se cifra al iniciar sesión
        if (!$valido && password_get_info($user['contrasena'])['algo'] === null && hash_equals($user['contrasena'], $contrasena)) {
            $valido = true;
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $update = mysqli_prepare($conn, "UPDATE usuarios SET contrasena = ? WHERE id = ?");
            mysqli_stmt_bind_param($update, "si", $hash, $user['id']);
            mysqli_stmt_execute($update);
        }

        if ($valido) {
            session_regenerate_id(true);
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nombre'] = $user['nombre'];
            $_SESSION['rol'] = $user['rol'];

            echo json_encode([
                'exito' => true,
                'redireccion' => 'admin_panel.php'
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
