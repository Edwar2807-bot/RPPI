<?php
class RolusuarioModel
{
    private $pdo;

    public function __construct()
    {
        require_once(__DIR__ . '/../Config/db.php');
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getRolusuario()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RolUsuario ORDER BY Id_rol desc");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setRolusuario($Nombre_rol)
    {
        $stmt = $this->pdo->prepare("INSERT INTO RPPI.RolUsuario VALUES(:Nombre_rol)");
        $stmt->bindParam(":Nombre_rol", $Nombre_rol);
        $stmt->execute();
    }

    public function updateRolusuario($Id_rol, $Nombre_rol)
    {
        $stmt = $this->pdo->prepare("UPDATE RPPI.RolUsuario SET Nombre_rol = :Nombre_rol WHERE Id_rol = :Id_rol");
        $stmt->bindParam(":Id_rol", $Id_rol);
        $stmt->bindParam(":Nombre_rol", $Nombre_rol);
        $stmt->execute();
    }

    public function deleteRolusuario($Id_rol  )
    {
        $stmt = $this->pdo->prepare("DELETE FROM RPPI.RolUsuario WHERE Id_rol = :Id_rol");
        $stmt->bindParam(":Id_rol", $Id_rol);
        $stmt->execute();
    }
}