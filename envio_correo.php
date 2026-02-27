<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

include 'PHP/config.php';

// Obtener correos de la tabla
$sql = "SELECT email FROM inscripciones_eventos WHERE email IS NOT NULL AND email != ''";
$resultado = $conn->query($sql);

// Verifica si hay resultados
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $correo = trim($fila['email']);
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $mail = new PHPMailer(true);
            try {
                // Configuración servidor SMTP Gmail
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'kevingf1997@gmail.com';
                $mail->Password   = 'ayxhaddyfovnouux'; // Clave de aplicación de Gmail
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                // Remitente (debe coincidir con la cuenta Gmail usada)
                $mail->setFrom('kevingf1997@gmail.com', 'Museo Alcaldes');

                // Destinatario
                $mail->addAddress($correo);

                // Contenido del correo
                $mail->isHTML(false);
                $mail->Subject = 'Encuesta de Satisfacción del Evento';
                $mail->Body    = "Hola,\n\nGracias por participar en nuestro evento. Completa la encuesta en:\nhttp://192.168.1.5/PaginaWebAlcaldes8725/PaginaWebAlcaldes/formulario_satisfaccion.php\n\n¡Gracias!";

                $mail->send();
                echo "Correo enviado a: $correo<br>";
            } catch (Exception $e) {
                echo "Error al enviar a $correo: {$mail->ErrorInfo}<br>";
            }
        }
    }
} else {
    echo "No se encontraron correos en la base de datos.";
}

$conexion->close();
?>
