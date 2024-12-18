<?php
class FormalizacionModel
{
    private $pdo;

    public function __construct()
    {
        require_once(__DIR__ . '/../Config/db.php');
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getFormalizacion()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.Formalizacion ORDER BY Id_form_pas DESC");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setFormalizacion($Conflicto_intereses, $Certificacion_ARL, $Acta_confidencialidad, $Certificacion_EPS,  $Id_informacion_personal_formal_fk, $Estado_procedimiento_fpas_fk)
    {
        $sql = "INSERT INTO RPPI.Formalizacion (Conflicto_intereses, Certificacion_ARL, Acta_confidencialidad, Certificacion_EPS,  Id_informacion_personal_formal_fk, Estado_procedimiento_fpas_fk) 
                VALUES (:Conflicto_intereses, :Certificacion_ARL, :Acta_confidencialidad, :Certificacion_EPS, :Id_informacion_personal_formal_fk, :Estado_procedimiento_fpas_fk)";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':Conflicto_intereses', $Conflicto_intereses);
        $stmt->bindParam(':Certificacion_ARL', $Certificacion_ARL);
        $stmt->bindParam(':Acta_confidencialidad', $Acta_confidencialidad);
        $stmt->bindParam(':Certificacion_EPS', $Certificacion_EPS);
        $stmt->bindParam(':Id_informacion_personal_formal_fk', $Id_informacion_personal_formal_fk);
        $stmt->bindParam(':Estado_procedimiento_fpas_fk', $Estado_procedimiento_fpas_fk);
        $stmt->execute();
    }

    public function updateFormalizacion($Id_form_pas, $Conflicto_intereses, $Certificacion_ARL, $Acta_confidencialidad, $Certificacion_EPS, $Tutor_pas, $Id_informacion_personal_formal_fk, $Estado_procedimiento_fpas_fk)
    {
        $stmt = $this->pdo->prepare("UPDATE RPPI.Formalizacion SET Conflicto_intereses = :Conflicto_intereses, Certificacion_ARL = :Certificacion_ARL, Acta_confidencialidad = :Acta_confidencialidad, Certificacion_EPS = :Certificacion_EPS, Tutor_pas = :Tutor_pas, Id_informacion_personal_formal_fk = :Id_informacion_personal_formal_fk, Estado_procedimiento_fpas_fk = :Estado_procedimiento_fpas_fk WHERE Id_form_pas = :Id_form_pas");
        $stmt->bindParam(":Id_form_pas", $Id_form_pas);
        $stmt->bindParam(":Conflicto_intereses", $Conflicto_intereses);
        $stmt->bindParam(":Certificacion_ARL", $Certificacion_ARL);
        $stmt->bindParam(":Acta_confidencialidad", $Acta_confidencialidad);
        $stmt->bindParam(":Certificacion_EPS", $Certificacion_EPS);
        $stmt->bindParam(":Tutor_pas", $Tutor_pas);
        $stmt->bindParam(":Id_informacion_personal_formal_fk", $Id_informacion_personal_formal_fk);
        $stmt->bindParam(":Estado_procedimiento_fpas_fk", $Estado_procedimiento_fpas_fk);
        $stmt->execute();
    }

    public function deleteFormalizacion($Id_form_pas)
    {
        $stmt = $this->pdo->prepare("DELETE FROM RPPI.Formalizacion WHERE Id_form_pas = :Id_form_pas");
        $stmt->bindParam(":Id_form_pas", $Id_form_pas);
        $stmt->execute();
    }
}
?>
