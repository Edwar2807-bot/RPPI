<?php
class ActividadModel
{
    private $pdo;

    public function __construct()
    {
        require_once(__DIR__ . '/../Config/db.php');
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getActividad()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.Actividad ORDER BY Id_actividad desc");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setActividad($Descripcion_actividad, $Fecha_actividad, $Id_proy_FK)
    {
        $stmt = $this->pdo->prepare("INSERT INTO RPPI.Actividad VALUES( :Descripcion_actividad, :Fecha_actividad, :Id_proy_FK)");
        $stmt->bindParam(":Descripcion_actividad", $Descripcion_actividad);
        $stmt->bindParam(":Fecha_actividad", $Fecha_actividad);
        $stmt->bindParam(":Id_proy_FK", $Id_proy_FK);
        $stmt->execute();
    }

    public function updateActividad($Id_actividad, $Descripcion_actividad, $Fecha_actividad, $Id_proy_FK)
    {
        $stmt = $this->pdo->prepare("UPDATE RPPI.Actividad SET Descripcion_actividad = :Descripcion_actividad, Fecha_actividad = :Fecha_actividad, Id_proy_FK = :Id_proy_FK WHERE Id_actividad = :Id_actividad");
        $stmt->bindParam(":Id_actividad", $Id_actividad);
        $stmt->bindParam(":Descripcion_actividad", $Descripcion_actividad);
        $stmt->bindParam(":Fecha_actividad", $Fecha_actividad);
        $stmt->bindParam(":Id_proy_FK", $Id_proy_FK);
        $stmt->execute();
    }

    public function deleteActividad($Id_actividad  )
    {
        $stmt = $this->pdo->prepare("DELETE FROM RPPI.Actividad WHERE Id_actividad  = :Id_actividad ");
        $stmt->bindParam(":Id_actividad", $Id_actividad);
        $stmt->execute();
    }
}