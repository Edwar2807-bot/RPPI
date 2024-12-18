<?php
class EvaluaciontutorModel
{
    private $pdo;

    public function __construct()
    {
        require_once(__DIR__ . '/../Config/db.php');
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getEvaluaciontutor()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.EvaluacionTutor ORDER BY Id_evaluacion_tutor DESC");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setEvaluaciontutor($Respuesta1, $Respuesta2, $Respuesta3, $Respuesta4, $Respuesta5, $Id_usuario_evalt_fk)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO RPPI.EvaluacionTutor 
            (Respuesta1, Respuesta2, Respuesta3, Respuesta4, Respuesta5, Id_usuario_evalt_fk) 
            VALUES (:Respuesta1, :Respuesta2, :Respuesta3, :Respuesta4, :Respuesta5, :Id_usuario_evalt_fk)
        ");
        $stmt->bindParam(":Respuesta1", $Respuesta1);
        $stmt->bindParam(":Respuesta2", $Respuesta2);
        $stmt->bindParam(":Respuesta3", $Respuesta3);
        $stmt->bindParam(":Respuesta4", $Respuesta4);
        $stmt->bindParam(":Respuesta5", $Respuesta5);
        $stmt->bindParam(":Id_usuario_evalt_fk", $Id_usuario_evalt_fk);
        $stmt->execute();
    }

    public function updateEvaluaciontutor($Id_evaluacion_tutor, $Respuesta1, $Respuesta2, $Respuesta3, $Respuesta4, $Respuesta5, $Id_usuario_evalt_fk)
    {
        $stmt = $this->pdo->prepare("
            UPDATE RPPI.EvaluacionTutor 
            SET Respuesta1 = :Respuesta1, Respuesta2 = :Respuesta2, Respuesta3 = :Respuesta3, 
                Respuesta4 = :Respuesta4, Respuesta5 = :Respuesta5, Id_usuario_evalt_fk = :Id_usuario_evalt_fk
            WHERE Id_evaluacion_tutor = :Id_evaluacion_tutor
        ");
        $stmt->bindParam(":Id_evaluacion_tutor", $Id_evaluacion_tutor);
        $stmt->bindParam(":Respuesta1", $Respuesta1);
        $stmt->bindParam(":Respuesta2", $Respuesta2);
        $stmt->bindParam(":Respuesta3", $Respuesta3);
        $stmt->bindParam(":Respuesta4", $Respuesta4);
        $stmt->bindParam(":Respuesta5", $Respuesta5);
        $stmt->bindParam(":Id_usuario_evalt_fk", $Id_usuario_evalt_fk);
        $stmt->execute();
    }

    public function deleteEvaluaciontutor($Id_evaluacion_tutor)
    {
        $stmt = $this->pdo->prepare("DELETE FROM RPPI.EvaluacionTutor WHERE Id_evaluacion_tutor = :Id_evaluacion_tutor");
        $stmt->bindParam(":Id_evaluacion_tutor", $Id_evaluacion_tutor);
        $stmt->execute();
    }
}
