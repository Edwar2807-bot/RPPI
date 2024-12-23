<?php
class ExperiencialaboralModel
{
    private $pdo;

    public function __construct()
    {
        require_once(__DIR__ . '/../Config/db.php');
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getExperiencialaboral()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.ExperienciaLaboral ORDER BY Id_exp_laboral DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function setExperiencialaboral($Empresa, $Cargo, $Fec_ini, $Fec_fin, $Emp_actual, $Horario, $Id_informacion_personal_exp_fk, $Id_Usuario)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO RPPI.ExperienciaLaboral (Empresa, Cargo, Fec_ini, Fec_fin, Emp_actual, Horario, Id_informacion_personal_exp_fk, Id_Usuario) 
                                                    VALUES (:Empresa, :Cargo, :Fec_ini, :Fec_fin, :Emp_actual, :Horario, :Id_informacion_personal_exp_fk, :Id_Usuario)");
            $stmt->bindParam(":Empresa", $Empresa);
            $stmt->bindParam(":Cargo", $Cargo);
            $stmt->bindParam(":Fec_ini", $Fec_ini);
            $stmt->bindParam(":Fec_fin", $Fec_fin);
            $stmt->bindParam(":Emp_actual", $Emp_actual);
            $stmt->bindParam(":Horario", $Horario);
            $stmt->bindParam(":Id_informacion_personal_exp_fk", $Id_informacion_personal_exp_fk); // Sin espacio
            $stmt->bindParam(":Id_Usuario", $Id_Usuario);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error en la inserción: " . $e->getMessage();
        }
    }

    public function updateExperiencialaboral($Id_exp_laboral, $Empresa, $Cargo, $Fec_ini, $Fec_fin, $Emp_actual, $Horario, $Id_informacion_personal_exp_fk)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE RPPI.ExperienciaLaboral SET Empresa = :Empresa, Cargo = :Cargo, Fec_ini = :Fec_ini, Fec_fin = :Fec_fin, Emp_actual = :Emp_actual, Horario = :Horario, Id_informacion_personal_exp_fk = :Id_informacion_personal_exp_fk WHERE Id_exp_laboral = :Id_exp_laboral");
            $stmt->bindParam(":Id_exp_laboral", $Id_exp_laboral);
            $stmt->bindParam(":Empresa", $Empresa);
            $stmt->bindParam(":Cargo", $Cargo);
            $stmt->bindParam(":Fec_ini", $Fec_ini);
            $stmt->bindParam(":Fec_fin", $Fec_fin);
            $stmt->bindParam(":Emp_actual", $Emp_actual);
            $stmt->bindParam(":Horario", $Horario);
            $stmt->bindParam(":Id_informacion_personal_exp_fk", $Id_informacion_personal_exp_fk);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error en la actualización: " . $e->getMessage();
        }
    }

    public function deleteExperiencialaboral($Id_exp_laboral)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM RPPI.ExperienciaLaboral WHERE Id_exp_laboral = :Id_exp_laboral");
            $stmt->bindParam(":Id_exp_laboral", $Id_exp_laboral);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error en la eliminación: " . $e->getMessage();
        }
    }
}
