<?php
session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['Correo'])) {
    header("Location: ../html/Dash1.php"); // Redirigir al panel de control
    exit();
}

// Datos de conexión a la base de datos
$servername = "DESKTOP-6VHCU6I"; // Nombre de la instancia de SQL Server
$username = "klozanoq"; // Nombre de usuario
$password = "Colombia2023*"; // Contraseña de SQL Server
$dbname = "RPPI";  // Nombre de la base de datos

try {
    // Crear la conexión usando PDO
    $conn = new PDO("sqlsrv:Server=$servername;Database=$dbname");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? ''; // Validación básica
    $password = $_POST['password'] ?? ''; // Validación básica

    // Validar que los campos no estén vacíos
    if (empty($email) || empty($password)) {
        echo "Por favor, completa todos los campos.";
        exit();
    }

// Consulta para obtener el usuario y su rol
$stmt = $conn->prepare("SELECT u.Correo, u.Pass, r.Id_rol FROM RPPI.Usuario u
                        JOIN RPPI.RolUsuario r ON u.Id_rol_fk = r.Id_rol 
                        WHERE u.Correo = :email");
$stmt->execute(['email' => $email]);
$row = $stmt->fetch();

// Verificar si el usuario existe
if ($row) {
    // Verificar la contraseña directamente
    if ($password === $row['Pass']) { // Comparar la contraseña directamente
        // Iniciar sesión y guardar los datos necesarios
        $_SESSION['Correo'] = $row['Correo'];
        $_SESSION['rol_id'] = $row['Id_rol']; // Guardar el ID del rol en la sesión

        // Redirigir según el ID del rol del usuario
        switch ($row['Id_rol']) {
            case 1: // ID del rol para Admin
                header("Location: ../html/Dash_Admin.php");
                break;
            case 2: // ID del rol para Pasante
                header("Location: ../html/Dash1.php");
                break;
            case 3: // ID del rol para Pasante2
                header("Location: ../html/Dash2.php");
                break;
            case 4: // ID del rol para Pasante3
                header("Location: ../html/Dash3.php");
                break;
            case 5: // ID del rol para Tutor
                header("Location: ../html/Dash_tutor.php");
                break;
            case 6: // ID del rol para Talento Humano
                header("Location: ../html/Dash_Th.php");
                break;
            default:
                header("Location: DashDefault.php");
                break;
        }
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
        error_log("Intento de inicio de sesión fallido para el usuario: $email (contraseña incorrecta)");
    }
}
}

ob_end_flush(); // Limpiar el buffer de salida
?>
