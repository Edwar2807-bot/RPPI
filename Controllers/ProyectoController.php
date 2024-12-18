<?php
// Asegúrate de que la ruta de autoload sea correcta
require_once '../vendor/autoload.php';

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Blob\Models\CreateBlockBlobOptions;

class ProyectoController
{
    private $model;
    private $blobClient;
    private $containerName = "registropasantes"; // Nombre del contenedor en Azure
    private $sasToken = "sv=2022-11-02&ss=bfqt&srt=sco&sp=rwdlacupitfx&se=2030-10-16T23:49:44Z&st=2024-10-16T15:49:44Z&spr=https&sig=XdBeM7kfVvDBe7RhqyUDgT%2BXme%2F5nYhsdSlD8JOVUc0%3D"; // Token SAS

    public function __construct()
    {
        require_once "../Models/ProyectoModel.php";
        $this->model = new ProyectoModel();

        // Configurar el cliente de Blob usando el SAS (Shared Access Signature)
        $sasToken = "sv=2022-11-02&ss=bfqt&srt=sco&sp=rwdlacupitfx&se=2030-10-16T23:49:44Z&st=2024-10-16T15:49:44Z&spr=https&sig=XdBeM7kfVvDBe7RhqyUDgT%2BXme%2F5nYhsdSlD8JOVUc0%3D";
        $blobEndpoint = "https://storageregpasinvima.blob.core.windows.net";

        // Crear el cliente de Blob Storage usando el SAS Token
        $connectionString = "BlobEndpoint=$blobEndpoint;SharedAccessSignature=$sasToken";
        $this->blobClient = BlobRestProxy::createBlobService($connectionString);
        
    }

    public function setProyecto($Nombre_proy, $Descripcion_proy, $Acept_tutor, $Documento_proy, $Id_informacion_personal_proy_fk = 6, $Estado_procedimiento_proy_fk = 1)
    {
        // Validar campos requeridos
        if (empty($Nombre_proy) || empty($Descripcion_proy) || empty($Acept_tutor) || empty($Documento_proy['name'])) {
            echo '
            <script>alert("Completa todos los campos para poder registrar el Proyecto");
            window.location = "../html/Vpro_pas.php";
            </script>
            ';
            exit;
        }
    
        // Si el ID es vacío, se establece un valor por defecto
        if (empty($Id_informacion_personal_proy_fk)) {
            $Id_informacion_personal_proy_fk = 1; // Valor predeterminado
        }
    
        try {
            // Verificar si el archivo se ha subido correctamente
            if (!is_uploaded_file($Documento_proy['tmp_name'])) {
                throw new Exception("El archivo no se ha subido correctamente.");
            }
    
            // Preparar el nombre del archivo
            $fileName = urlencode(basename($Documento_proy['name']));
            $fileContent = fopen($Documento_proy['tmp_name'], "r");
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
    
            // Llamada al modelo para insertar el proyecto
            $this->model->setProyecto($Nombre_proy, $Descripcion_proy, $Acept_tutor, $fileUrl, $Id_informacion_personal_proy_fk, $Estado_procedimiento_proy_fk);
            echo '
            <script>alert("Proyecto registrado correctamente");
            window.location = "../html/Vpro_pas.php";
            </script>
            ';
        } catch (Exception $e) {
            echo '<script>alert("Error al cargar el proyecto: ' . $e->getMessage() . '"); window.location = "../html/Vpro_pas.php";</script>';
        }
    }

    public function getProyecto()
    {
        return $this->model->getProyecto();
    }

    public function deleteProyecto($Id_proyecto)
    {
        if ($Id_proyecto == null) {
            echo '
            <script>alert("Ingresa el Id del proyecto eliminar");
            window.location = "../html/Vpro_pas.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteProyecto($Id_proyecto);
            echo '
            <script>alert("Proyecto eliminado correctamente");
            window.location = "../html/Vpro_pas.php";
            </script>
            ';
        }
    }

    public function updateProyecto($Id_proyecto, $Nombre_proy, $Descripcion_proy, $Acept_tutor, $Documento_proy, $Id_informacion_personal_proy_fk , $Estado_procedimiento_proy_fk)
    {
        if (empty($Id_proyecto) || empty($Nombre_proy) || empty($Descripcion_proy) || empty($Acept_tutor) || empty($Documento_proy) || empty($Id_informacion_personal_proy_fk ) || empty($Estado_procedimiento_proy_fk)) {
            echo '
            <script>alert("Completa todos los campos para actualizar el proyecto");
            </script>
            ';
            exit;
        } else {
            $this->model->updateProyecto($Id_proyecto, $Nombre_proy, $Descripcion_proy, $Acept_tutor, $Documento_proy, $Id_informacion_personal_proy_fk , $Estado_procedimiento_proy_fk);
            echo '
            <script>alert("Proyecto actualizado correctamente");
            window.location = "../html/Vpro_pas.php";
            </script>
            ';
        }
    }
}

$ProyectoController = new ProyectoController();



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getProyecto'])) {
        $ProyectoController->getProyecto();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setProyecto'])) {
        $Id_informacion_personal_proy_fk = !empty($_POST['Id_informacion_personal_proy_fk']) ? $_POST['Id_informacion_personal_proy_fk'] : 6; // Valor predeterminado si no se proporciona
        $Estado_procedimiento_proy_fk  = !empty($_POST['Estado_procedimiento_proy_fk ']) ? $_POST['Estado_procedimiento_proy_fk '] : 1; // Valor predeterminado si no se proporciona
        $ProyectoController->setProyecto($_POST['Nombre_proy'], $_POST['Descripcion_proy'], $_POST['Acept_tutor'], $_FILES['Documento_proy'], $Id_informacion_personal_proy_fk, $Estado_procedimiento_proy_fk);
        exit; 
    }
    if (isset($_POST['deleteProyecto'])) {
        $ProyectoController->deleteProyecto($_POST['Id_proyecto']);
        exit;
    }
    if (isset($_POST['updateProyecto'])) {
        $Id_informacion_personal_proy_fk = !empty($_POST['Id_informacion_personal_proy_fk']) ? $_POST['Id_informacion_personal_proy_fk'] : 6; // Valor predeterminado si no se proporciona
        $Estado_procedimiento_proy_fk  = !empty($_POST['Estado_procedimiento_proy_fk ']) ? $_POST['Estado_procedimiento_proy_fk '] : 1; // Valor predeterminado si no se proporciona
        $ProyectoController->updateProyecto($_POST['Id_proyecto'],$_POST['Nombre_proy'], $_POST['Descripcion_proy'], $_POST['Acept_tutor'], $_POST['Documento_proy'] ,$Id_informacion_personal_proy_fk, $Estado_procedimiento_proy_fk);
        exit;                                                                                                                                                     
    }
}
