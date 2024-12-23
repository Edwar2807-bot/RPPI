<?php
function verificarAcceso() {
    // Incluir el archivo de configuración de roles
    require_once('../Config/roles.php');  // Asegúrate de que el archivo roles.php contenga el arreglo $permisosPorRol

    // Iniciar la sesión si no ha sido iniciada
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Verifica si el usuario está autenticado
    if (!isset($_SESSION['rol_id'])) {
        // Si no está autenticado, redirige al login
        header("Location: ../Login.html");
        exit;
    }

    // Obtener el Id_rol del usuario desde la sesión
    $rolUsuario = $_SESSION['rol_id'];

    // Verifica si la página actual está en la lista de permisos para el rol
    $paginaActual = basename($_SERVER['PHP_SELF']);  // Obtiene el nombre del archivo PHP actual

    // Verifica si el usuario tiene permiso para acceder a la página actual
    if (!in_array($paginaActual, $permisosPorRol[$rolUsuario])) {
        // Si el usuario no tiene permiso para acceder a esta página, redirige o muestra mensaje
        header("Location: acceso_denegado.php");  // Redirigir a página de acceso denegado
        exit;
    }
}
?>