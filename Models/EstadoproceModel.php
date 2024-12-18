<?php
class EstadoprocedimientoModel
{
    private $pdo;

    public function __construct()
    {
        require_once(__DIR__ . '/../Config/db.php');
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getEstadoprocedimiento()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM EstadoProcedimiento ORDER BY Id_estado_procedimiento desc");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setEstadoprocedimiento($Nombre_estado_proc, $Descripcion_estado_proc)
    {
        $stmt = $this->pdo->prepare("INSERT INTO RPPI.EstadoProcedimiento VALUES(:Nombre_estado_proc, :Descripcion_estado_proc)");
        $stmt->bindParam(":Nombre_estado_proc", $Nombre_estado_proc);
        $stmt->bindParam(":Descripcion_estado_proc", $Descripcion_estado_proc);
        $stmt->execute();
    }

    public function updateEstadoprocedimiento($Id_estado_procedimiento, $Nombre_estado_proc, $Descripcion_estado_proc)
    {
        $stmt = $this->pdo->prepare("UPDATE RPPI.EstadoProcedimiento SET Nombre_estado_proc = :Nombre_estado_proc, Descripcion_estado_proc = :Descripcion_estado_proc WHERE Id_estado_procedimiento = :Id_estado_procedimiento");
        $stmt->bindParam(":Id_estado_procedimiento", $Id_estado_procedimiento);
        $stmt->bindParam(":Nombre_estado_proc", $Nombre_estado_proc);
        $stmt->bindParam(":Descripcion_estado_proc", $Descripcion_estado_proc);
        $stmt->execute();
    }

    public function deleteEstadoprocedimiento($Id_estado_procedimiento)
    {
        $stmt = $this->pdo->prepare("DELETE FROM RPPI.EstadoProcedimiento WHERE Id_estado_procedimiento = :Id_estado_procedimiento");
        $stmt->bindParam(":Id_estado_procedimiento", $Id_estado_procedimiento);
        $stmt->execute();
    }
}