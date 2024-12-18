<?php
class EvaluacionpasanteModel
{
    private $pdo;

    public function __construct()
    {
        require_once(__DIR__ . '/../Config/db.php');
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getEvaluacionpasante()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.EvaluacionPasante ORDER BY Id_evaluacion_pasante desc");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setEvaluacionpasante($Proyecto_eval_pasante, $Horario_eval_pasante, $Reglamento_eval_pasante, $Concepto_eval_pasante, $Id_usuario_evalp_fk)
    {
        $stmt = $this->pdo->prepare("INSERT INTO RPPI.EvaluacionPasante VALUES(:Proyecto_eval_pasante, :Horario_eval_pasante, :Reglamento_eval_pasante, :Concepto_eval_pasante, :Id_usuario_evalp_fk)");
        $stmt->bindParam(":Proyecto_eval_pasante", $Proyecto_eval_pasante);
        $stmt->bindParam(":Horario_eval_pasante", $Horario_eval_pasante);
        $stmt->bindParam(":Reglamento_eval_pasante", $Reglamento_eval_pasante);
        $stmt->bindParam(":Concepto_eval_pasante", $Concepto_eval_pasante);
        $stmt->bindParam(":Id_usuario_evalp_fk", $Id_usuario_evalp_fk);
        $stmt->execute();
    }

    public function updateEvaluacionpasante($Id_evaluacion_pasante, $Proyecto_eval_pasante, $Horario_eval_pasante, $Reglamento_eval_pasante, $Concepto_eval_pasante, $Id_usuario_evalp_fk )
    {
        $stmt = $this->pdo->prepare("UPDATE RPPI.EvaluacionPasante SET Proyecto_eval_pasante = :Proyecto_eval_pasante, Horario_eval_pasante = :Horario_eval_pasante, Reglamento_eval_pasante = :Reglamento_eval_pasante, Concepto_eval_pasante = :Concepto_eval_pasante, Id_usuario_evalp_fk  = :Id_usuario_evalp_fk  WHERE Id_evaluacion_pasante = :Id_evaluacion_pasante");
        $stmt->bindParam(":Id_evaluacion_pasante", $Id_evaluacion_pasante);
        $stmt->bindParam(":Proyecto_eval_pasante", $Proyecto_eval_pasante);
        $stmt->bindParam(":Horario_eval_pasante", $Horario_eval_pasante);
        $stmt->bindParam(":Reglamento_eval_pasante", $Reglamento_eval_pasante);
        $stmt->bindParam(":Concepto_eval_pasante", $Concepto_eval_pasante);
        $stmt->bindParam(":Id_usuario_evalp_fk", $Id_usuario_evalp_fk);
        $stmt->execute();
    }

    public function deleteEvaluacionpasante($Id_evaluacion_pasante)
    {
        $stmt = $this->pdo->prepare("DELETE FROM RPPI.EvaluacionPasante WHERE Id_evaluacion_pasante = :Id_evaluacion_pasante");
        $stmt->bindParam(":Id_evaluacion_pasante", $Id_evaluacion_pasante);
        $stmt->execute();
    }
}