<?php
class FormacionModel
{
    private $pdo;

    public function __construct()
    {
        require_once(__DIR__ . '/../Config/db.php');
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getFormacion()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.Formacion ORDER BY Id_formacion DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function setFormacion($Tipo_educacion, $Nivel_educacion, $Institucion, $Programa,  $Fec_terminacion, $Id_informacion_personal_form_fk, $Id_Usuario)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO RPPI.Formacion (Tipo_educacion, Nivel_educacion, Institucion, Programa, Fec_terminacion, Id_informacion_personal_form_fk, Id_Usuario) VALUES (:Tipo_educacion, :Nivel_educacion, :Institucion, :Programa, :Fec_terminacion, :Id_informacion_personal_form_fk, :Id_Usuario)");
            $stmt->bindParam(":Tipo_educacion", $Tipo_educacion);                                                                                                                                                                                            
            $stmt->bindParam(":Nivel_educacion", $Nivel_educacion); 
            $stmt->bindParam(":Institucion", $Institucion);
            $stmt->bindParam(":Programa", $Programa);
            $stmt->bindParam(":Fec_terminacion",$Fec_terminacion);
            $stmt->bindParam(":Id_informacion_personal_form_fk", $Id_informacion_personal_form_fk); // Sin espacio
            $stmt->bindParam(":Id_Usuario",$Id_Usuario);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error en la inserción: " . $e->getMessage();
        }
    }

    public function updateFormacion($Id_formacion, $Tipo_educacion, $Nivel_educacion, $Institucion, $Programa, $Fec_terminacion, $Id_informacion_personal_form_fk)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE RPPI.Formacion SET Tipo_educacion = :Tipo_educacion, Nivel_educacion = :Nivel_educacion, Institucion = :Institucion, Programa = :Programa, Fec_terminacion = :Fec_terminacion, Id_informacion_personal_form_fk = :Id_informacion_personal_form_fk  WHERE Id_formacion = :Id_formacion");
            $stmt->bindParam(":Id_formacion", $Id_formacion); // Sin espacio
            $stmt->bindParam(":Tipo_educacion", $Tipo_educacion);                                                                                                                                                                                            
            $stmt->bindParam(":Nivel_educacion", $Nivel_educacion); 
            $stmt->bindParam(":Institucion", $Institucion);
            $stmt->bindParam(":Programa", $Programa);
            $stmt->bindParam(":Fec_terminacion",$Fec_terminacion);
            $stmt->bindParam(":Id_informacion_personal_form_fk", $Id_informacion_personal_form_fk); // Sin espacio
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error en la actualización: " . $e->getMessage();
        }
    }

    public function deleteFormacion($Id_formacion)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM RPPI.Formacion WHERE Id_formacion = :Id_formacion");
            $stmt->bindParam(":Id_formacion", $Id_formacion); // Sin espacio
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error en la eliminación: " . $e->getMessage();
        }
    }
}
