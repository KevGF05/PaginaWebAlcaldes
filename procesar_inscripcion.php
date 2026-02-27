<?php
include "PHP/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $primer_nombre = $_POST['primer_nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $evento_id = $_POST['evento_id'];

    $stmt = $conn->prepare("INSERT INTO inscripciones_eventos 
        (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, email, telefono, evento_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $email, $telefono, $evento_id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Inscripción exitosa'); window.location.href='evento.php';</script>";
    } else {
        echo "Error al registrar: " . $stmt->error;
    }
    $stmt->close();
}
?>
