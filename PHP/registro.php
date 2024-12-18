<?php
// Conexión a la base de datos
$servername = "DESKTOP-6VHCU6I"; // Cambia esto a tu servidor SQL Server
$username = "klozanoq"; // Nombre de usuario
$password = "Colombia2023*"; // Contraseña de SQL Server
$dbname = "RPPI";  // Nombre de la base de datos

// Crear la conexión
$conn = new PDO("sqlsrv:Server=$servername;Database=$dbname");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $tipoDocumento = $_POST['tipoDocumento'];
    $numid = $_POST['numid'];
    $email = $_POST['email'];
    $pass = isset($_POST['Cont']) ? $_POST['Cont'] : '';  
    $confirmar_pass = isset($_POST['Ccont']) ? $_POST['Ccont'] : '';  

    // Validar que las contraseñas coincidan
    if (empty($pass) || empty($confirmar_pass)) {
        echo "Ambas contraseñas son requeridas.";
        exit;
    }

    if ($pass != $confirmar_pass) {
        echo "Las contraseñas no coinciden.";
        exit;
    }

    // Validar requisitos de la contraseña
    if (!preg_match('/^(?=.*[A-Z])(?=.*\W).{8,}$/', $pass)) {
        echo "La contraseña debe tener al menos 8 caracteres, una mayúscula y un carácter especial.";
        exit;
    }

    // Comprobar si el correo ya está registrado
    $sql_check_email = "SELECT * FROM RPPI.Usuario WHERE Correo = :email";
    $stmt = $conn->prepare($sql_check_email);
    $stmt->execute(['email' => $email]);

    if ($stmt->rowCount() > 0) {
        echo "El correo ya está registrado.";
        exit;
    }

    // Insertar los datos en la base de datos, utilizando 'Pass' para almacenar la contraseña
    $sql = "INSERT INTO RPPI.Usuario (tipo_documento, Num_documento, Correo, Pass, Id_rol_fk, Id_estado_usuario_fk) 
            VALUES (:tipo_documento, :num_documento, :correo, :pass, 2, 1)"; // Asumiendo que 1 es el id predeterminado

    $stmt = $conn->prepare($sql);
    $params = [
        ':tipo_documento' => $tipoDocumento,
        ':num_documento' => $numid,
        ':correo' => $email,
        ':pass' => $pass // Guardando la contraseña en el campo 'Pass'
    ];

    if ($stmt->execute($params)) {
        echo "Registro exitoso";
        header('Location: ../Login.html'); // Redirige a la página de login después del registro
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2]; // Muestra error si hay un problema con la inserción
    }
}

$conn = null; // Cierra la conexión
?>
