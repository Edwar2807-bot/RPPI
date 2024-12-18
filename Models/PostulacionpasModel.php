<?php
class PostulacionpasantiasModel
{
    private $pdo;

    public function __construct()
    {
        require_once(__DIR__ . '/../Config/db.php');
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getPostulacionpasantias()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM PostulacionPasantias ORDER BY Id_post_pasantia DESC");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function setPostulacionpasantias($Entidad, $Programa_pasantias, $Medio_ent, $Area_pas, $Hoja_vida, $Carta_presentacion, $Documento_id, $Duracion, $Fec_ini_pas, $Estado_procedimiento_post_fk, $Aceptado = null)
    {
        $stmt = $this->pdo->prepare("INSERT INTO RPPI.PostulacionPasantias (Entidad, Programa_pasantias, Medio_ent, Area_pas, Hoja_vida, Carta_presentacion, Documento_id, Duracion, Fec_ini_pas, Estado_procedimiento_post_fk, Aceptado) 
            VALUES (:Entidad, :Programa_pasantias, :Medio_ent, :Area_pas, :Hoja_vida, :Carta_presentacion, :Documento_id, :Duracion, :Fec_ini_pas, :Estado_procedimiento_post_fk, :Aceptado)");

        // Vincular los parámetros
        $stmt->bindParam(":Entidad", $Entidad);
        $stmt->bindParam(":Programa_pasantias", $Programa_pasantias);
        $stmt->bindParam(":Medio_ent", $Medio_ent);
        $stmt->bindParam(":Area_pas", $Area_pas);
        $stmt->bindParam(":Hoja_vida", $Hoja_vida);
        $stmt->bindParam(":Carta_presentacion", $Carta_presentacion);
        $stmt->bindParam(":Documento_id", $Documento_id);
        $stmt->bindParam(":Duracion", $Duracion);
        $stmt->bindParam(":Fec_ini_pas", $Fec_ini_pas);
        $stmt->bindParam(":Estado_procedimiento_post_fk", $Estado_procedimiento_post_fk);
        $stmt->bindParam(":Aceptado", $Aceptado, PDO::PARAM_NULL); // Vincular Aceptado permitiendo NULL
        $stmt->execute();
    }

    public function updatePostulacionpasantias($Id_post_pasantia, $Entidad, $Programa_pasantias, $Medio_ent, $Area_pas, $Hoja_vida, $Carta_presentacion, $Documento_id, $Duracion, $Fec_ini_pas, $Estado_procedimiento_post_fk, $Aceptado = null)
    {
        $stmt = $this->pdo->prepare("UPDATE RPPI.PostulacionPasantias 
            SET Entidad = :Entidad, 
                Programa_pasantias = :Programa_pasantias, 
                Medio_ent = :Medio_ent, 
                Area_pas = :Area_pas, 
                Hoja_vida = :Hoja_vida, 
                Carta_presentacion = :Carta_presentacion, 
                Documento_id = :Documento_id, 
                Duracion = :Duracion, 
                Fec_ini_pas = :Fec_ini_pas, 
                Estado_procedimiento_post_fk = :Estado_procedimiento_post_fk,
                Aceptado = :Aceptado
            WHERE Id_post_pasantia = :Id_post_pasantia");
    
        // Vincular los parámetros
        $stmt->bindParam(":Id_post_pasantia", $Id_post_pasantia);
        $stmt->bindParam(":Entidad", $Entidad);
        $stmt->bindParam(":Programa_pasantias", $Programa_pasantias);
        $stmt->bindParam(":Medio_ent", $Medio_ent);
        $stmt->bindParam(":Area_pas", $Area_pas);
        $stmt->bindParam(":Hoja_vida", $Hoja_vida);
        $stmt->bindParam(":Carta_presentacion", $Carta_presentacion);
        $stmt->bindParam(":Documento_id", $Documento_id);
        $stmt->bindParam(":Duracion", $Duracion);
        $stmt->bindParam(":Fec_ini_pas", $Fec_ini_pas);
        $stmt->bindParam(":Estado_procedimiento_post_fk", $Estado_procedimiento_post_fk);
        $stmt->bindParam(":Aceptado", $Aceptado);
    
        $stmt->execute();
    }
    

    public function deletePostulacionpasantias($Id_post_pasantia)
    {
        $stmt = $this->pdo->prepare("DELETE FROM RPPI.PostulacionPasantias WHERE Id_post_pasantia = :Id_post_pasantia");
        $stmt->bindParam(":Id_post_pasantia", $Id_post_pasantia);
        $stmt->execute();
    }
}
