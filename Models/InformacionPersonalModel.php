<?php
class InformacionPersonalModel
{
    private $pdo;

    public function __construct()
    {
        require_once(__DIR__ . '/../Config/db.php');
        $con = new db();
        $this->pdo = $con->conexion();
    }

    // Método para obtener todos los registros
    public function getInformacionPersonal()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.InformacionPersonal ORDER BY Num_documento DESC");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    // Método para verificar si el Num_documento ya existe
    public function getByNumDocumento($Num_documento)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.InformacionPersonal WHERE Num_documento = :Num_documento");
        $stmt->bindParam(":Num_documento", $Num_documento);
        $stmt->execute();
        return $stmt->fetch(); // Retorna el registro o false si no existe
    }

    // Método para verificar si el Correo ya existe
    public function getByCorreo($Correo)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.InformacionPersonal WHERE Correo = :Correo");
        $stmt->bindParam(":Correo", $Correo);
        $stmt->execute();
        return $stmt->fetch(); // Retorna el registro o false si no existe
    }

    // Método para insertar un nuevo registro
    public function setInformacionPersonal($Num_documento, $Tipo_identificacion, $Fec_nacimiento, $Nombre, $Apellido, $Correo, $Telefono, $Direccion, $Fec_expedicion, $Ciudad, $Estrato, $Genero, $Nivel_educativo, $Foto, $Id_usuario_persona_fk, $Id_post_pasantias_fk)
    {
        try {
            // Preparar la consulta SQL
            $stmt = $this->pdo->prepare("INSERT INTO RPPI.InformacionPersonal 
                (Num_documento, Tipo_identificacion, Fec_nacimiento, Nombre, Apellido, Correo, Telefono, Direccion, Fec_expedicion, Ciudad, Estrato, Genero, Nivel_educativo, Foto, Id_usuario_persona_fk, Id_post_pasantias_fk) 
                VALUES (:Num_documento, :Tipo_identificacion, :Fec_nacimiento, :Nombre, :Apellido, :Correo, :Telefono, :Direccion, :Fec_expedicion, :Ciudad, :Estrato, :Genero, :Nivel_educativo, :Foto, :Id_usuario_persona_fk, :Id_post_pasantias_fk)");
    
            // Vincular los parámetros
            $stmt->bindParam(":Num_documento", $Num_documento);
            $stmt->bindParam(":Tipo_identificacion", $Tipo_identificacion);
            $stmt->bindParam(":Fec_nacimiento", $Fec_nacimiento);
            $stmt->bindParam(":Nombre", $Nombre);
            $stmt->bindParam(":Apellido", $Apellido);
            $stmt->bindParam(":Correo", $Correo);
            $stmt->bindParam(":Telefono", $Telefono);
            $stmt->bindParam(":Direccion", $Direccion);
            $stmt->bindParam(":Fec_expedicion", $Fec_expedicion);
            $stmt->bindParam(":Ciudad", $Ciudad);
            $stmt->bindParam(":Estrato", $Estrato);
            $stmt->bindParam(":Genero", $Genero);
            $stmt->bindParam(":Nivel_educativo", $Nivel_educativo);
            $stmt->bindParam(":Foto", $Foto);
            $stmt->bindParam(":Id_usuario_persona_fk", $Id_usuario_persona_fk);
            $stmt->bindParam(":Id_post_pasantias_fk", $Id_post_pasantias_fk);
    
            // Ejecutar la consulta
            if ($stmt->execute()) {
                return true; // Inserción exitosa
            } else {
                return false; // Error al insertar
            }
        } catch (Exception $e) {
            // Manejo de errores
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    // Método para actualizar un registro existente
    public function updateInformacionPersonal($Id_informacion_personal, $Num_documento, $Tipo_identificacion, $Fec_nacimiento, $Nombre, $Apellido, $Correo, $Telefono, $Direccion, $Fec_expedicion, $Ciudad, $Estrato, $Genero, $Nivel_educativo, $Foto, $Id_usuario_persona_fk, $Id_post_pasantias_fk)
    {
        $stmt = $this->pdo->prepare("UPDATE RPPI.InformacionPersonal 
            SET Num_documento = :Num_documento, Tipo_identificacion = :Tipo_identificacion, Fec_nacimiento = :Fec_nacimiento, Nombre = :Nombre, Apellido = :Apellido, Correo = :Correo, Telefono = :Telefono, Direccion = :Direccion, Fec_expedicion = :Fec_expedicion, Ciudad = :Ciudad, Estrato = :Estrato, Genero = :Genero, Nivel_educativo = :Nivel_educativo, Foto = :Foto, Id_usuario_persona_fk = :Id_usuario_persona_fk, Id_post_pasantias_fk = :Id_post_pasantias_fk 
            WHERE Id_informacion_personal = :Id_informacion_personal");

        $stmt->bindParam(":Id_informacion_personal", $Id_informacion_personal);
        $stmt->bindParam(":Num_documento", $Num_documento);
        $stmt->bindParam(":Tipo_identificacion", $Tipo_identificacion);
        $stmt->bindParam(":Fec_nacimiento", $Fec_nacimiento);
        $stmt->bindParam(":Nombre", $Nombre);
        $stmt->bindParam(":Apellido", $Apellido);
        $stmt->bindParam(":Correo", $Correo);
        $stmt->bindParam(":Telefono", $Telefono);
        $stmt->bindParam(":Direccion", $Direccion);
        $stmt->bindParam(":Fec_expedicion", $Fec_expedicion);
        $stmt->bindParam(":Ciudad", $Ciudad);
        $stmt->bindParam(":Estrato", $Estrato);
        $stmt->bindParam(":Genero", $Genero);
        $stmt->bindParam(":Nivel_educativo", $Nivel_educativo);
        $stmt->bindParam(":Foto", $Foto);
        $stmt->bindParam(":Id_usuario_persona_fk", $Id_usuario_persona_fk);
        $stmt->bindParam(":Id_post_pasantias_fk", $Id_post_pasantias_fk);

        $stmt->execute();
    }

    // Método para eliminar un registro
    public function deleteInformacionPersonal($Id_informacion_personal)
    {
        $stmt = $this->pdo->prepare("DELETE FROM RPPI.InformacionPersonal WHERE Id_informacion_personal = :Id_informacion_personal");
        $stmt->bindParam(":Id_informacion_personal", $Id_informacion_personal);
        $stmt->execute();
    }

    public function getFotoById($Id_informacion_personal)
    {
        $stmt = $this->pdo->prepare("SELECT Foto FROM RPPI.InformacionPersonal WHERE Id_informacion_personal = :Id_informacion_personal");
        $stmt->bindParam(":Id_informacion_personal", $Id_informacion_personal);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result ? $result['Foto'] : null; // Devuelve la foto o null si no existe
    }
}
