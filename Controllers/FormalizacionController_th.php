<?php
// Asegúrate de que la ruta de autoload sea correcta
require_once '../vendor/autoload.php';

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Blob\Models\CreateBlockBlobOptions;

class FormalizacionController
{
    private $model;
    private $blobClient;
    private $containerName = "registropasantes"; // Nombre del contenedor en Azure
    private $sasToken = "sv=2022-11-02&ss=bfqt&srt=sco&sp=rwdlacupitfx&se=2030-10-16T23:49:44Z&st=2024-10-16T15:49:44Z&spr=https&sig=XdBeM7kfVvDBe7RhqyUDgT%2BXme%2F5nYhsdSlD8JOVUc0%3D"; // Token SAS

    public function __construct()
    {
        require_once "../Models/FormalizacionModel.php";
        $this->model = new FormalizacionModel();

        // Configurar el cliente de Blob usando el SAS (Shared Access Signature)
        $blobEndpoint = "https://storageregpasinvima.blob.core.windows.net";

        // Crear el cliente de Blob Storage usando el SAS Token
        $connectionString = "BlobEndpoint=$blobEndpoint;SharedAccessSignature=$this->sasToken";
        $this->blobClient = BlobRestProxy::createBlobService($connectionString);
    }

    public function setFormalizacion($Conflicto_intereses, $Certificacion_ARL, $Acta_confidencialidad, $Certificacion_EPS, $Id_informacion_personal_doc_fk = 6, $Estado_procedimiento_fpas_fk = 1) 
    {
        if (empty($Conflicto_intereses['name']) || empty($Certificacion_ARL['name']) || empty($Acta_confidencialidad['name']) || empty($Certificacion_EPS['name'])) {
            echo '<script>alert("Completa todos los campos para poder registrar el documento"); window.location = "../html/Vform_pas.php";</script>';
            exit;
        }
        
        // Si el estado es vacío, se establece un valor por defecto
        if (empty($Id_informacion_personal_doc_fk)) {
            $Id_informacion_personal_doc_fk = 6; // Valor predeterminado
        }
        if (empty($Estado_procedimiento_fpas_fk)) {
            $Estado_procedimiento_fpas_fk = 1;
        }
    
        try {
            // Verificar y subir Hoja de vida
            if (!is_uploaded_file($Conflicto_intereses['tmp_name'])) {
                throw new Exception("El conflicto de intereses no se ha subido correctamente.");
            }
    
            $ConflictoInteresesName = urlencode(basename($Conflicto_intereses['name']));
            $ConflictoInteresesContent = fopen($Conflicto_intereses['tmp_name'], "r");
            if ($ConflictoInteresesContent === false) {
                throw new Exception("No se pudo abrir el conflicto de intereses para lectura.");
            }
    
            // Subir la hoja de vida al Azure Blob Storage
            $options = new CreateBlockBlobOptions();
            $this->blobClient->createBlockBlob($this->containerName, $ConflictoInteresesName, $ConflictoInteresesContent, $options);
    
            // Verificar la existencia del blob después de la subida
            $result = $this->blobClient->listBlobs($this->containerName);
            $found = false;
            foreach ($result->getBlobs() as $blob) {
                if ($blob->getName() === $ConflictoInteresesName) {
                    $found = true;
                }
            }
    
            if (!$found) {
                throw new Exception("El conflicto de intereses no fue encontrada después de la subida.");
            }
    
            // Generar la URL de la hoja de vida
            $ConflictoInteresesUrl = "https://storageregpasinvima.blob.core.windows.net/" . $this->containerName . "/" . $ConflictoInteresesName . "?" . $this->sasToken;
    
            // Verificar y subir Carta de presentación
            if (!is_uploaded_file($Certificacion_ARL['tmp_name'])) {
                throw new Exception("La ARL no se ha subido correctamente.");
            }
    
            $CertificacionARLName = urlencode(basename($Certificacion_ARL['name']));
            $CertificacionARLContent = fopen($Certificacion_ARL['tmp_name'], "r");
            if ($CertificacionARLContent === false) {
                throw new Exception("No se pudo abrir la ARL para lectura.");
            }
    
            // Subir la carta de presentación al Azure Blob Storage
            $this->blobClient->createBlockBlob($this->containerName, $CertificacionARLName, $CertificacionARLContent, $options);
    
            // Verificar la existencia del blob después de la subida
            $found = false;
            foreach ($result->getBlobs() as $blob) {
                if ($blob->getName() === $CertificacionARLName) {
                    $found = true;
                }
            }
    
            if (!$found) {
                throw new Exception("La ARL no fue encontrada después de la subida.");
            }
    
            // Generar la URL de la carta de presentación
            $CertificacionARLUrl = "https://storageregpasinvima.blob.core.windows.net/" . $this->containerName . "/" . $CertificacionARLName . "?" . $this->sasToken;
    
            // Verificar y subir Documento de identidad
            if (!is_uploaded_file($Acta_confidencialidad['tmp_name'])) {
                throw new Exception("El acta de confidencialidad no se ha subido correctamente.");
            }
    
            $ActaconfidencialidadName = urlencode(basename($Acta_confidencialidad['name']));
            $ActaconfidencialidadContent = fopen($Acta_confidencialidad['tmp_name'], "r");
            if ($ActaconfidencialidadContent === false) {
                throw new Exception("No se pudo abrir el acta de confidencialidad para lectura.");
            }
    
            // Subir el documento de identidad al Azure Blob Storage
            $this->blobClient->createBlockBlob($this->containerName, $ActaconfidencialidadName, $ActaconfidencialidadContent, $options);
    
            // Verificar la existencia del blob después de la subida
            $found = false;
            foreach ($result->getBlobs() as $blob) {
                if ($blob->getName() === $ActaconfidencialidadName) {
                    $found = true;
                }
            }
    
            if (!$found) {
                throw new Exception("El acta de confidencialidad no fue encontrado después de la subida.");
            }
    
            // Generar la URL del documento de identidad
            $ActaconfidencialidadUrl = "https://storageregpasinvima.blob.core.windows.net/" . $this->containerName . "/" . $ActaconfidencialidadName . "?" . $this->sasToken;

            // Verificar y subir Certificación EPS
            if (!is_uploaded_file($Certificacion_EPS['tmp_name'])) {
                throw new Exception("La EPS no se ha subido correctamente.");
            }
    
            $CertificacionEPSName = urlencode(basename($Certificacion_EPS['name']));
            $CertificacionEPSContent = fopen($Certificacion_EPS['tmp_name'], "r");
            if ($CertificacionEPSContent === false) {
                throw new Exception("No se pudo abrir La EPS para lectura.");
            }
    
            // Subir la EPS al Azure Blob Storage
            $this->blobClient->createBlockBlob($this->containerName, $CertificacionEPSName, $CertificacionEPSContent, $options);
    
            // Verificar la existencia del blob después de la subida
            $result = $this->blobClient->listBlobs($this->containerName);
            $found = false;
            foreach ($result->getBlobs() as $blob) {
                if ($blob->getName() === $CertificacionEPSName) {
                    $found = true;
                }
            }
    
            if (!$found) {
                throw new Exception("La EPS no fue encontrada después de la subida.");
            }
    
            // Generar la URL de la EPS
            $CertificacionUrl = "https://storageregpasinvima.blob.core.windows.net/" . $this->containerName . "/" . $CertificacionEPSName . "?" . $this->sasToken;

            // Llamada al modelo para insertar la postulacion
            $this->model->setFormalizacion($ConflictoInteresesUrl, $CertificacionARLUrl, $ActaconfidencialidadUrl, $CertificacionUrl, $Id_informacion_personal_doc_fk, $Estado_procedimiento_fpas_fk);
            
            echo '
            <script>alert("Formalización registrada correctamente");
            window.location = "../html/Vform_pas.php";
            </script>
            ';
        } catch (Exception $e) {
            echo '<script>alert("Error al cargar la postulacion: ' . $e->getMessage() . '"); window.location = "../html/Vform_pas.php";</script>';
        }
    }


    public function getFormalizacion()
    {
        return $this->model->getFormalizacion();
    }

    public function deleteFormalizacion($Id_form_pas)
    {
        if ($Id_form_pas == null) {
            echo '<script>alert("Ingresa el Id de la formalizacion a eliminar"); window.location = "../html/Vform_pas.php";</script>';
            exit;
        } else {
            $this->model->deleteFormalizacion($Id_form_pas);
            echo '<script>alert("Formalizacion eliminada correctamente"); window.location = "../html/Vform_pas.php";</script>';
        }
    }

    public function updateFormalizacion($Id_form_pas, $Conflicto_intereses, $Certificacion_ARL, $Acta_confidencialidad, $Certificacion_EPS, $Id_informacion_personal_formal_fk, $Estado_procedimiento_fpas_fk)
    {
        if (empty($Id_form_pas) || empty($Conflicto_intereses) || empty($Certificacion_ARL) || empty($Acta_confidencialidad) || empty($Certificacion_EPS) || empty($Id_informacion_personal_formal_fk) || empty($Estado_procedimiento_fpas_fk)) {
            echo '<script>alert("Completa todos los campos para actualizar la Formalizacion");</script>';
            exit;
        } else {
            $this->model->updateFormalizacion($Id_form_pas, $Conflicto_intereses, $Certificacion_ARL, $Acta_confidencialidad, $Certificacion_EPS, $Id_informacion_personal_formal_fk, $Estado_procedimiento_fpas_fk);
            echo '<script>alert("Formalizacion actualizada correctamente"); window.location = "../html/Vform_pas.php";</script>';
        }
    }
}

$FormalizacionController = new FormalizacionController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getFormalizacion'])) {
        $FormalizacionController->getFormalizacion();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setFormalizacion'])) {
        $Id_informacion_personal_formal_fk =!empty($_POST['Id_informacion_personal_formal_fk']) ? $_POST['Id_informacion_personal_formal_fk'] : 6;
        $Estado_procedimiento_post_fk =!empty($_POST['Estado_procedimiento_post_fk']) ? $_POST['Estado_procedimiento_post_fk'] : 1;
        $FormalizacionController->setFormalizacion(
            $_FILES['Conflicto_intereses'],
            $_FILES['Certificacion_ARL'],
            $_FILES['Acta_confidencialidad'],
            $_FILES['Certificacion_EPS'],
            $Id_informacion_personal_formal_fk,
            $Estado_procedimiento_fpas_fk
        );
        exit;
    }
    if (isset($_POST['deleteFormalizacion'])) {
        $FormalizacionController->deleteFormalizacion($_POST['Id_form_pas']);
        exit;
    }
    if (isset($_POST['updateFormalizacion'])) {
        $Id_informacion_personal_formal_fk =!empty($_POST['Id_informacion_personal_formal_fk']) ? $_POST['Id_informacion_personal_formal_fk'] : 6;
        $Estado_procedimiento_post_fk =!empty($_POST['Estado_procedimiento_post_fk']) ? $_POST['Estado_procedimiento_post_fk'] : 1;
        $FormalizacionController->updateFormalizacion(
            $_POST['Id_form_pas'],
            $_FILES['Conflicto_intereses'],
            $_FILES['Certificacion_ARL'],
            $_FILES['Acta_confidencialidad'],
            $_FILES['Certificacion_EPS'],
            $Id_informacion_personal_formal_fk,
            $Estado_procedimiento_fpas_fk
        );
        exit;
    }
}