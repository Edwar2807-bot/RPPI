<?php
class EstadousuarioModel
{
    private $pdo;

    public function __construct()
    {
        require_once(__DIR__ . '/../Config/db.php');
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getEstadousuario()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.EstadoUsuario ORDER BY Id_estado_usuario desc");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setEstadousuario($Nombre_estado, $Descripcion_estado)
    {
        $stmt = $this->pdo->prepare("INSERT INTO RPPI.EstadoUsuario VALUES(:Nombre_estado, :Descripcion_estado)");
        $stmt->bindParam(":Nombre_estado", $Nombre_estado);
        $stmt->bindParam(":Descripcion_estado", $Descripcion_estado);
        $stmt->execute();
    }

    public function updateEstadousuario($Id_estado_usuario, $Nombre_estado, $Descripcion_estado)
    {
        $stmt = $this->pdo->prepare("UPDATE RPPI.EstadoUsuario SET Nombre_estado = :Nombre_estado, Descripcion_estado = :Descripcion_estado  WHERE Id_estado_usuario = :Id_estado_usuario");
        $stmt->bindParam(":Id_estado_usuario", $Id_estado_usuario);
        $stmt->bindParam(":Nombre_estado", $Nombre_estado);
        $stmt->bindParam(":Descripcion_estado", $Descripcion_estado);
        $stmt->execute();
    }

    public function deleteEstadousuario($Id_estado_usuario )
    {
        $stmt = $this->pdo->prepare("DELETE FROM RPPI.EstadoUsuario WHERE Id_estado_usuario  = :Id_estado_usuario ");
        $stmt->bindParam(":Id_estado_usuario", $Id_estado_usuario);
        $stmt->execute();
    }
}