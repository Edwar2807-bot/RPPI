<?php
// Define la constante de depuración aquí
define('DEBUG', false); //mensajes, cambiar a false en produccion

class db
{
    // Propiedades de la clase
    private $servername = "DESKTOP-6VHCU6I";  // Nombre de la instancia de SQL Server
    private $username = "klozanoq";                      // Nombre de usuario
    private $password = "Colombia2023*";                   // Contraseña de SQL Server
    private $dbname = "RPPI";                  // Nombre de la base de datos

    // Método para la conexión
    public function conexion()
    {
        try {
            // Utiliza 'sqlsrv' para conectarte a SQL Server
            $pdo = new PDO("sqlsrv:server=$this->servername;database=$this->dbname");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (DEBUG) {
                echo '<h1>Conexión Exitosa</h1>';
            }
            return $pdo; // Retorna el objeto PDO si la conexión es exitosa
        } catch (PDOException $e) {
            if (DEBUG) {
                // Imprime el error si estamos en modo depuración
                echo "Error en la conexión: " . $e->getMessage();
            }
            return false; // Retorna false en caso de error, sin importar el modo
        }
    }
}
?>
