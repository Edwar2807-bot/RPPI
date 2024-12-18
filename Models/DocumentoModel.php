<?php
class DocumentoModel
{
    private $pdo;

    public function __construct()
    {
        require_once(__DIR__ . '/../Config/db.php');
        $con = new db();
        $this->pdo = $con->conexion();
    }

    public function getDocumentoById($Id_documento)
    {
        $query = "SELECT * FROM RPPI.Documento WHERE Id_documento = :Id_documento"; // Cambia 'documentos' por 'RPPI.Documento'
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':Id_documento', $Id_documento, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function getDocumento()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.Documento ORDER BY Id_documento DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function setDocumento($Tipo_documento, $Documento, $Id_informacion_personal_doc_fk = 1) // Valor por defecto
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO RPPI.Documento (Tipo_documento, Documento, Id_informacion_personal_doc_fk) VALUES (:Tipo_documento, :Documento, :Id_informacion_personal_doc_fk)");
            $stmt->bindParam(":Tipo_documento", $Tipo_documento);
            $stmt->bindParam(":Documento", $Documento);
            $stmt->bindParam(":Id_informacion_personal_doc_fk", $Id_informacion_personal_doc_fk);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al insertar documento: " . $e->getMessage();
        }
    }

public function updateDocumento($Id_documento, $Tipo_documento, $Documento, $Id_informacion_personal_doc_fk)
{
    try {
        $stmt = $this->pdo->prepare("UPDATE RPPI.Documento SET Tipo_documento = :Tipo_documento, Documento = :Documento, Id_informacion_personal_doc_fk = :Id_informacion_personal_doc_fk WHERE Id_documento = :Id_documento");
        $stmt->bindParam(":Id_documento", $Id_documento);
        $stmt->bindParam(":Tipo_documento", $Tipo_documento);
        $stmt->bindParam(":Documento", $Documento);
        $stmt->bindParam(":Id_informacion_personal_doc_fk", $Id_informacion_personal_doc_fk);
        $stmt->execute();

        // Verificar si se actualizó al menos una fila
        if ($stmt->rowCount() == 0) {
            throw new Exception("No se actualizó ningún documento. Verifica el ID.");
        }

        return true; // Retornar true si se actualizó exitosamente
    } catch (PDOException $e) {
        // Manejo de errores
        echo "Error al actualizar documento: " . $e->getMessage();
        return false; // Retornar false si hay un error
    }
}


    public function deleteDocumento($Id_documento)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM RPPI.Documento WHERE Id_documento = :Id_documento");
            $stmt->bindParam(":Id_documento", $Id_documento);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar documento: " . $e->getMessage();
        }
    }
}
