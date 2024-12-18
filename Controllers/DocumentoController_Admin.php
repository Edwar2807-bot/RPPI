<?php
// Asegúrate de que la ruta de autoload sea correcta
require_once '../vendor/autoload.php';

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Blob\Models\CreateBlockBlobOptions;

class DocumentoController
{
    private $model;
    private $blobClient;
    private $containerName = "registropasantes"; // Nombre del contenedor en Azure
    private $sasToken = "sv=2022-11-02&ss=bfqt&srt=sco&sp=rwdlacupitfx&se=2030-10-16T23:49:44Z&st=2024-10-16T15:49:44Z&spr=https&sig=XdBeM7kfVvDBe7RhqyUDgT%2BXme%2F5nYhsdSlD8JOVUc0%3D"; // Token SAS

    public function __construct()
    {
        require_once "../Models/DocumentoModel.php";
        $this->model = new DocumentoModel();

        // Configurar el cliente de Blob usando el SAS (Shared Access Signature)
        $sasToken = "sv=2022-11-02&ss=bfqt&srt=sco&sp=rwdlacupitfx&se=2030-10-16T23:49:44Z&st=2024-10-16T15:49:44Z&spr=https&sig=XdBeM7kfVvDBe7RhqyUDgT%2BXme%2F5nYhsdSlD8JOVUc0%3D";
        $blobEndpoint = "https://storageregpasinvima.blob.core.windows.net";

        // Crear el cliente de Blob Storage usando el SAS Token
        $connectionString = "BlobEndpoint=$blobEndpoint;SharedAccessSignature=$sasToken";
        $this->blobClient = BlobRestProxy::createBlobService($connectionString);
    }

        // Método para registrar un documento
    public function setDocumento($Tipo_documento, $Documento, $Id_informacion_personal_doc_fk = 6)
    {
    if (empty($Tipo_documento) || empty($Documento['name'])) {
        echo '<script>alert("Completa todos los campos para poder registrar el documento"); window.location = "../html/VDocs1_Admin.php";</script>';
        exit;
    }

    if (empty($Id_informacion_personal_doc_fk)) {
        $Id_informacion_personal_doc_fk = 1; // Valor predeterminado
    }

    try {
        if (!is_uploaded_file($Documento['tmp_name'])) {
            throw new Exception("El archivo no se ha subido correctamente.");
        }

        $fileName = urlencode(basename($Documento['name']));
        $fileContent = fopen($Documento['tmp_name'], "r");
        if ($fileContent === false) {
            throw new Exception("No se pudo abrir el archivo para lectura.");
        }

        // Subir el archivo al Azure Blob Storage
        $options = new CreateBlockBlobOptions();
        $this->blobClient->createBlockBlob($this->containerName, $fileName, $fileContent, $options);
        echo "Archivo subido: " . $fileName . "<br>";

        // Comprobar la existencia del blob después de la subida
        $result = $this->blobClient->listBlobs($this->containerName);
        $found = false;
        foreach ($result->getBlobs() as $blob) {
            if ($blob->getName() === $fileName) {
                $found = true;
                echo "Blob encontrado: " . $blob->getName() . "<br>";
            }
        }

        if (!$found) {
            throw new Exception("El blob no fue encontrado después de la subida.");
        }

        // Generar la URL del archivo subido
        $fileUrl = "https://storageregpasinvima.blob.core.windows.net/" . $this->containerName . "/" . $fileName . "?" . $this->sasToken;
        echo "URL del archivo: " . $fileUrl . "<br>";

        // Llamada al modelo para insertar el documento
        $this->model->setDocumento($Tipo_documento, $fileUrl, $Id_informacion_personal_doc_fk);
        echo '<script>alert("Documento registrado correctamente"); window.location = "../html/VDocs1_Admin.php";</script>';
    } catch (Exception $e) {
        echo '<script>alert("Error al cargar el documento: ' . $e->getMessage() . '"); window.location = "../html/VDocs1_Admin.php";</script>';
    }
}

    // Método para obtener un documento
    public function getDocumento()
    {
        return $this->model->getDocumento();
    }

    // Método para eliminar un documento
    public function deleteDocumento($Id_documento)
    {
        if (empty($Id_documento)) {
            echo '
            <script>alert("Ingresa el Id del documento a eliminar");
            window.location = "../html/VDocs_Admin.php";
            </script>';
            exit;
        }

        $this->model->deleteDocumento($Id_documento);
        
        echo '
        <script>alert("Documento eliminado correctamente");
        window.location = "../html/VDocs_Admin.php";
        </script>';
    }

    // Método para actualizar un documento
    public function updateDocumento($Id_documento, $Tipo_documento, $Documento, $Id_informacion_personal_doc_fk)
    {
        // Validación de campos obligatorios
        if (empty($Id_documento) || empty($Tipo_documento) || empty($Documento) || empty($Id_informacion_personal_doc_fk)) {
            echo '
            <script>alert("Completa todos los campos para actualizar el documento");
            window.location = "../html/VDocs1_Admin.php";
            </script>';
            exit;
        }

        $this->model->updateDocumento($Id_documento, $Tipo_documento, $Documento, $Id_informacion_personal_doc_fk);
        
        echo '
        <script>alert("Documento actualizado correctamente");
        window.location = "../html/VDocs1_Admin.php";
        </script>';
    }
}

$DocumentoController = new DocumentoController();

// Manejo de solicitudes GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getDocumento'])) {
        $DocumentoController->getDocumento();
        exit;
    }
}

// Manejo de solicitudes POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setDocumento'])) {
        // Obtener el valor de Id_informacion_personal_doc_fk o asignar el valor predeterminado
        $Id_informacion_personal_doc_fk = !empty($_POST['Id_informacion_personal_doc_fk']) ? $_POST['Id_informacion_personal_doc_fk'] : 6;

        // Llamar al método para registrar el documento
        $DocumentoController->setDocumento($_POST['Tipo_documento'], $_FILES['Documento'], $Id_informacion_personal_doc_fk);
        exit; 
    }

    if (isset($_POST['deleteDocumento'])) {
        $DocumentoController->deleteDocumento($_POST['Id_documento']);
        exit;
    }

    if (isset($_POST['updateDocumento'])) {
        // Obtener el valor de Id_informacion_personal_doc_fk de POST
        $Id_informacion_personal_doc_fk = !empty($_POST['Id_informacion_personal_doc_fk']) ? $_POST['Id_informacion_personal_doc_fk'] : 1;
        
        $DocumentoController->updateDocumento($_POST['Id_documento'], $_POST['Tipo_documento'], $_POST['Documento'], $Id_informacion_personal_doc_fk);
        exit;                         
    }
}
