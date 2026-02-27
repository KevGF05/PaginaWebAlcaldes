<?php
session_start();
session_unset();
session_destroy();

// Redirige al formulario de inicio de sesión
header("Location: ../inicioSecion.html");
exit();

