<?php
class LlamadoatencionModel
{
    private $pdo;

    public function __construct()
    {
        require_once(__DIR__ . '/../Config/db.php');
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getLlamadoatencion()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.llamadoatencion ORDER BY Id_llamado_atencion desc");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setLlamadoatencion($Descripcion_llamado_atencion, $Id_eval_pasante_FK)
{
    // Verificar si el ID de evaluación de pasante existe
    $stmt = $this->pdo->prepare("SELECT * FROM RPPI.EvaluacionPasante WHERE Id_evaluacion_pasante = :Id_eval_pasante_FK");
    $stmt->bindParam(":Id_eval_pasante_FK", $Id_eval_pasante_FK);
    $stmt->execute();
    
    if ($stmt->fetchColumn() > 0) {
        // Si existe, proceder con la inserción
        $stmt = $this->pdo->prepare("INSERT INTO RPPI.llamadoatencion VALUES(:Descripcion_llamado_atencion, :Id_eval_pasante_FK)");
        $stmt->bindParam(":Descripcion_llamado_atencion", $Descripcion_llamado_atencion);
        $stmt->bindParam(":Id_eval_pasante_FK", $Id_eval_pasante_FK);
        $stmt->execute();
    } else {
        throw new Exception("El ID de evaluación de pasante no existe.");
    }
}


    public function updateLlamadoatencion($Id_llamado_atencion , $Descripcion_llamado_atencion, $Id_eval_pasante_FK)
    {
        $stmt = $this->pdo->prepare("UPDATE RPPI.llamadoatencion SET Descripcion_llamado_atencion = :Descripcion_llamado_atencion, Id_eval_pasante_FK= :Id_eval_pasante_FK  WHERE Id_llamado_atencion  = :Id_llamado_atencion");
        $stmt->bindParam(":Id_llamado_atencion", $Id_llamado_atencion);
        $stmt->bindParam(":Descripcion_llamado_atencion", $Descripcion_llamado_atencion);
        $stmt->bindParam(":Id_eval_pasante_FK", $Id_eval_pasante_FK);
        $stmt->execute();
    }

    public function deleteLlamadoatencion($Id_llamado_atencion)
    {
        $stmt = $this->pdo->prepare("DELETE FROM RPPI.llamadoatencion WHERE Id_llamado_atencion = :Id_llamado_atencion");
        $stmt->bindParam(":Id_llamado_atencion", $Id_llamado_atencion);
        $stmt->execute();
    }
}