<?php

class UsuarioModel

{
    private $pdo;

    public function __construct()
    {
        require_once(__DIR__ . '/../Config/db.php');
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getUsuario()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.Usuario ORDER BY Id_usuario desc");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setUsuario($Correo, $Num_documento, $Tipo_documento, $Pass, $Id_rol_fk, $Id_estado_usuario_fk)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO RPPI.Usuario (Correo, Num_documento, Tipo_documento, Pass, Id_rol_fk, Id_estado_usuario_fk) 
                                         VALUES (:Correo, :Num_documento, :Tipo_documento, :Pass, :Id_rol_fk, :Id_estado_usuario_fk)");
            
            // Bind parameters
            $stmt->bindParam(":Correo", $Correo);
            $stmt->bindParam(":Num_documento", $Num_documento);
            $stmt->bindParam(":Tipo_documento", $Tipo_documento);
            $stmt->bindParam(":Pass", $Pass);
            $stmt->bindParam(":Id_rol_fk", $Id_rol_fk);
            $stmt->bindParam(":Id_estado_usuario_fk", $Id_estado_usuario_fk);
        
            // Execute the statement
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    
    

    public function updateUsuario($Id_usuario, $Correo, $Num_documento, $Tipo_documento, $Pass, $Id_rol_fk, $Id_estado_usuario_fk)
    {
        $stmt = $this->pdo->prepare("UPDATE RPPI.Usuario SET Correo = :Correo, Num_documento = :Num_documento, Tipo_documento = :Tipo_documento, Pass = :Pass, Id_rol_fk = :Id_rol_fk, Id_estado_usuario_fk = :Id_estado_usuario_fk WHERE Id_usuario = :Id_usuario");
        $stmt->bindParam(":Id_usuario", $Id_usuario);
        $stmt->bindParam(":Correo", $Correo);
        $stmt->bindParam(":Num_documento", $Num_documento);
        $stmt->bindParam(":Tipo_documento", $Tipo_documento);
        $stmt->bindParam(":Pass", $Pass);
        $stmt->bindParam(":Id_rol_fk", $Id_rol_fk);
        $stmt->bindParam(":Id_estado_usuario_fk", $Id_estado_usuario_fk);
        $stmt->execute();
    }

    public function deleteUsuario($Id_usuario)
    {
        $stmt = $this->pdo->prepare("DELETE FROM RPPI.Usuario WHERE Id_usuario = :Id_usuario");
        $stmt->bindParam(":Id_usuario", $Id_usuario);
        $stmt->execute();
    }
}