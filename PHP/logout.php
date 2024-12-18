<?php
session_start(); // Iniciar la sesión
session_unset(); // Limpiar todas las variables de sesión
session_destroy(); // Destruir la sesión
header("Location: ../Login.html"); // Redirigir al inicio de sesión
exit();
?>
