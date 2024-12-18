<?php
class SolicitudModel
{
    private $pdo;

    public function __construct()
    {
        require_once(__DIR__ . '/../Config/db.php');
        $con = new db();
        $this->pdo = $con->conexion();
    }

    // Método para obtener todos los registros
    public function getSolicitud()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.Solicitud ORDER BY Id_solicitud DESC");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    // Método para insertar un nuevo registro
    public function setSolicitud($Nombre_solici, $Dependencia_solici, $Grupo_Solici, $Lugar_practica, $Nivel_academico, $Programa_academico, $Cargo_solici, $Descrip_cargo, $Numero_solici, $Modalidad_solici, $Actividad, $Id_usuario_solici_fk)
    {
        try {
            // Preparar la consulta SQL
            $stmt = $this->pdo->prepare("INSERT INTO RPPI.Solicitud 
    (Nombre_solici, Dependencia_solici, Grupo_Solici, Lugar_practica, Nivel_academico, Programa_academico, Cargo_solici, Descrip_cargo, Numero_solici, Modalidad_solici, Actividad, Id_usuario_solici_fk) 
    VALUES (:Nombre_solici, :Dependencia_solici, :Grupo_Solici, :Lugar_practica, :Nivel_academico, :Programa_academico, :Cargo_solici, :Descrip_cargo, :Numero_solici, :Modalidad_solici, :Actividad, :Id_usuario_solici_fk)");

            // Vincular los parámetros
            $stmt->bindParam(":Nombre_solici", $Nombre_solici);
            $stmt->bindParam(":Dependencia_solici", $Dependencia_solici);
            $stmt->bindParam(":Grupo_Solici", $Grupo_Solici);
            $stmt->bindParam(":Lugar_practica", $Lugar_practica);
            $stmt->bindParam(":Nivel_academico", $Nivel_academico);
            $stmt->bindParam(":Programa_academico", $Programa_academico);
            $stmt->bindParam(":Cargo_solici", $Cargo_solici);
            $stmt->bindParam(":Descrip_cargo", $Descrip_cargo);
            $stmt->bindParam(":Numero_solici", $Numero_solici);
            $stmt->bindParam(":Modalidad_solici", $Modalidad_solici);
            $stmt->bindParam(":Actividad", $Actividad);
            $stmt->bindParam(":Id_usuario_solici_fk", $Id_usuario_solici_fk);
    
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
    public function updateSolicitud($Id_solicitud, $Nombre_solici, $Dependencia_solici, $Grupo_Solici, $Lugar_practica, $Nivel_academico, $Programa_academico, $Cargo_solici, $Descrip_cargo, $Numero_solici, $Modalidad_solici, $Actividad, $Id_usuario_solici_fk)
    {
        $stmt = $this->pdo->prepare("UPDATE RPPI.Solicitud 
            SET Nombre_solici = :Nombre_solici, Dependencia_solici = :Dependencia_solici, Grupo_Solici = :Grupo_Solici, Lugar_practica = :Lugar_practica, Nivel_academico = :Nivel_academico, Programa_academico = :Programa_academico, Cargo_solici = :Cargo_solici, Descrip_cargo = :Descrip_cargo, Numero_solici = :Numero_solici, Modalidad_solici = :Modalidad_solici, Actividad = :Actividad, Id_usuario_solici_fk = :Id_usuario_solici_fk 
            WHERE Id_solicitud = :Id_solicitud");

        $stmt->bindParam(":Id_solicitud", $Id_solicitud);
        $stmt->bindParam(":Nombre_solici", $Nombre_solici);
        $stmt->bindParam(":Dependencia_solici", $Dependencia_solici);
        $stmt->bindParam(":Grupo_Solici", $Grupo_Solici);
        $stmt->bindParam(":Lugar_practica", $Lugar_practica);
        $stmt->bindParam(":Nivel_academico", $Nivel_academico);
        $stmt->bindParam(":Programa_academico", $Programa_academico);
        $stmt->bindParam(":Cargo_solici", $Cargo_solici);
        $stmt->bindParam(":Descrip_cargo", $Descrip_cargo);
        $stmt->bindParam(":Numero_solici", $Numero_solici);
        $stmt->bindParam(":Modalidad_solici", $Modalidad_solici);
        $stmt->bindParam(":Actividad", $Actividad);
        $stmt->bindParam(":Id_usuario_solici_fk", $Id_usuario_solici_fk);

        $stmt->execute();
    }

    // Método para eliminar un registro
    public function deleteSolicitud($Id_solicitud)
    {
        $stmt = $this->pdo->prepare("DELETE FROM RPPI.Solicitud WHERE Id_solicitud = :Id_solicitud");
        $stmt->bindParam(":Id_solicitud", $Id_solicitud);
        $stmt->execute();
    }
}
