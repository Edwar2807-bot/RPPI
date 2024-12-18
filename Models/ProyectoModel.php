<?php
class ProyectoModel
{
    private $pdo;

    public function __construct()
    {
        require_once(__DIR__ . '/../Config/db.php');
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getProyecto()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.Proyecto ORDER BY Id_proyecto  desc");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setProyecto($Nombre_proy, $Descripcion_proy, $Acept_tutor, $Documento_proy, $Id_informacion_personal_proy_fk, $Estado_procedimiento_proy_fk)
    {
        $stmt = $this->pdo->prepare("INSERT INTO RPPI.Proyecto VALUES(:Nombre_proy, :Descripcion_proy, :Acept_tutor, :Documento_proy, :Id_informacion_personal_proy_fk, :Estado_procedimiento_proy_fk)");
        $stmt->bindParam(":Nombre_proy", $Nombre_proy);
        $stmt->bindParam(":Descripcion_proy", $Descripcion_proy);
        $stmt->bindParam(":Acept_tutor", $Acept_tutor);
        $stmt->bindParam(":Documento_proy", $Documento_proy);
        $stmt->bindParam(":Id_informacion_personal_proy_fk", $Id_informacion_personal_proy_fk);
        $stmt->bindParam(":Estado_procedimiento_proy_fk", $Estado_procedimiento_proy_fk);
        $stmt->execute();
    }

    public function updateProyecto($Id_proyecto, $Nombre_proy, $Descripcion_proy, $Acept_tutor, $Documento_proy, $Id_informacion_personal_proy_fk, $Estado_procedimiento_proy_fk)
    {
        $stmt = $this->pdo->prepare("UPDATE RPPI.Proyecto SET Nombre_proy = :Nombre_proy, Descripcion_proy = :Descripcion_proy, Acept_tutor = :Acept_tutor, Documento_proy = :Documento_proy, Id_informacion_personal_proy_fk  = :Id_informacion_personal_proy_fk, Estado_procedimiento_proy_fk = :Estado_procedimiento_proy_fk WHERE Id_proyecto = :Id_proyecto");
        $stmt->bindParam(":Id_proyecto", $Id_proyecto );
        $stmt->bindParam(":Nombre_proy", $Nombre_proy);
        $stmt->bindParam(":Descripcion_proy", $Descripcion_proy);
        $stmt->bindParam(":Acept_tutor", $Acept_tutor);
        $stmt->bindParam(":Documento_proy", $Documento_proy);
        $stmt->bindParam(":Id_informacion_personal_proy_fk", $Id_informacion_personal_proy_fk);
        $stmt->bindParam(":Estado_procedimiento_proy_fk", $Estado_procedimiento_proy_fk);
        $stmt->execute();
    }

    public function deleteProyecto($Id_proyecto )
    {
        $stmt = $this->pdo->prepare("DELETE FROM RPPI.Proyecto WHERE Id_proyecto = :Id_proyecto");
        $stmt->bindParam(":Id_proyecto", $Id_proyecto );
        $stmt->execute();
    }
}