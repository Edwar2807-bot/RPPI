<?php
// Asegúrate de que la ruta de autoload sea correcta
require_once '../vendor/autoload.php';

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Blob\Models\CreateBlockBlobOptions;

class PostulacionpasantiasController
{
    private $model;
    private $blobClient;
    private $containerName = "registropasantes"; // Nombre del contenedor en Azure
    private $sasToken = "sv=2022-11-02&ss=bfqt&srt=sco&sp=rwdlacupitfx&se=2030-10-16T23:49:44Z&st=2024-10-16T15:49:44Z&spr=https&sig=XdBeM7kfVvDBe7RhqyUDgT%2BXme%2F5nYhsdSlD8JOVUc0%3D"; // Token SAS

    public function __construct()
    {
        require_once "../Models/PostulacionpasModel.php";
        $this->model = new PostulacionpasantiasModel();

        // Configurar el cliente de Blob usando el SAS (Shared Access Signature)
        $sasToken = "sv=2022-11-02&ss=bfqt&srt=sco&sp=rwdlacupitfx&se=2030-10-16T23:49:44Z&st=2024-10-16T15:49:44Z&spr=https&sig=XdBeM7kfVvDBe7RhqyUDgT%2BXme%2F5nYhsdSlD8JOVUc0%3D";
        $blobEndpoint = "https://storageregpasinvima.blob.core.windows.net";

        // Crear el cliente de Blob Storage usando el SAS Token
        $connectionString = "BlobEndpoint=$blobEndpoint;SharedAccessSignature=$sasToken";
        $this->blobClient = BlobRestProxy::createBlobService($connectionString);
        
    }

    public function setPostulacionpasantias($Entidad, $Programa_pasantias, $Medio_ent, $Area_pas, $Hoja_vida, $Carta_presentacion, $Documento_id, $Duracion, $Fec_ini_pas, $Estado_procedimiento_post_fk = 1)
    {
        // Validar campos requeridos
        if (empty($Entidad) || empty($Programa_pasantias) || empty($Medio_ent) || empty($Area_pas) || empty($Hoja_vida['name']) || empty($Carta_presentacion['name']) || empty($Documento_id['name']) || empty($Duracion) || empty($Fec_ini_pas)) {
            echo '
            <script>alert("Completa todos los campos para poder registrar la postulacion");
            window.location = "../html/VPost_pasant3.php";
            </script>
            ';
            exit;
        }
    
        // Si el estado es vacío, se establece un valor por defecto
        if (empty($Estado_procedimiento_post_fk)) {
            $Estado_procedimiento_post_fk = 1; // Valor predeterminado
        }
    
        try {
            // Verificar y subir Hoja de vida
            if (!is_uploaded_file($Hoja_vida['tmp_name'])) {
                throw new Exception("La hoja de vida no se ha subido correctamente.");
            }
    
            $hojaVidaName = urlencode(basename($Hoja_vida['name']));
            $hojaVidaContent = fopen($Hoja_vida['tmp_name'], "r");
            if ($hojaVidaContent === false) {
                throw new Exception("No se pudo abrir la hoja de vida para lectura.");
            }
    
            // Subir la hoja de vida al Azure Blob Storage
            $options = new CreateBlockBlobOptions();
            $this->blobClient->createBlockBlob($this->containerName, $hojaVidaName, $hojaVidaContent, $options);
    
            // Verificar la existencia del blob después de la subida
            $result = $this->blobClient->listBlobs($this->containerName);
            $found = false;
            foreach ($result->getBlobs() as $blob) {
                if ($blob->getName() === $hojaVidaName) {
                    $found = true;
                }
            }
    
            if (!$found) {
                throw new Exception("La hoja de vida no fue encontrada después de la subida.");
            }
    
            // Generar la URL de la hoja de vida
            $hojaVidaUrl = "https://storageregpasinvima.blob.core.windows.net/" . $this->containerName . "/" . $hojaVidaName . "?" . $this->sasToken;
    
            // Verificar y subir Carta de presentación
            if (!is_uploaded_file($Carta_presentacion['tmp_name'])) {
                throw new Exception("La carta de presentación no se ha subido correctamente.");
            }
    
            $cartaPresentacionName = urlencode(basename($Carta_presentacion['name']));
            $cartaPresentacionContent = fopen($Carta_presentacion['tmp_name'], "r");
            if ($cartaPresentacionContent === false) {
                throw new Exception("No se pudo abrir la carta de presentación para lectura.");
            }
    
            // Subir la carta de presentación al Azure Blob Storage
            $this->blobClient->createBlockBlob($this->containerName, $cartaPresentacionName, $cartaPresentacionContent, $options);
    
            // Verificar la existencia del blob después de la subida
            $found = false;
            foreach ($result->getBlobs() as $blob) {
                if ($blob->getName() === $cartaPresentacionName) {
                    $found = true;
                }
            }
    
            if (!$found) {
                throw new Exception("La carta de presentación no fue encontrada después de la subida.");
            }
    
            // Generar la URL de la carta de presentación
            $cartaPresentacionUrl = "https://storageregpasinvima.blob.core.windows.net/" . $this->containerName . "/" . $cartaPresentacionName . "?" . $this->sasToken;
    
            // Verificar y subir Documento de identidad
            if (!is_uploaded_file($Documento_id['tmp_name'])) {
                throw new Exception("El documento de identidad no se ha subido correctamente.");
            }
    
            $documentoIdName = urlencode(basename($Documento_id['name']));
            $documentoIdContent = fopen($Documento_id['tmp_name'], "r");
            if ($documentoIdContent === false) {
                throw new Exception("No se pudo abrir el documento de identidad para lectura.");
            }
    
            // Subir el documento de identidad al Azure Blob Storage
            $this->blobClient->createBlockBlob($this->containerName, $documentoIdName, $documentoIdContent, $options);
    
            // Verificar la existencia del blob después de la subida
            $found = false;
            foreach ($result->getBlobs() as $blob) {
                if ($blob->getName() === $documentoIdName) {
                    $found = true;
                }
            }
    
            if (!$found) {
                throw new Exception("El documento de identidad no fue encontrado después de la subida.");
            }
    
            // Generar la URL del documento de identidad
            $documentoIdUrl = "https://storageregpasinvima.blob.core.windows.net/" . $this->containerName . "/" . $documentoIdName . "?" . $this->sasToken;
    
            // Llamada al modelo para insertar la postulacion
            $this->model->setPostulacionpasantias($Entidad, $Programa_pasantias, $Medio_ent, $Area_pas, $hojaVidaUrl, $cartaPresentacionUrl, $documentoIdUrl, $Duracion, $Fec_ini_pas, $Estado_procedimiento_post_fk);
            
            echo '
            <script>alert("Postulacion registrada correctamente");
                window.location = "../html/VPost_pasant3.php";
            </script>
            ';
        } catch (Exception $e) {
            echo '<script>alert("Error al cargar la postulacion: ' . $e->getMessage() . '"); window.location = "../html/VPost_pasant3.php";</script>';
        }
    }


    public function getPostulacionpasantias()
    {
        return $this->model->getPostulacionpasantias();
    }

    public function deletePostulacionpasantias($Id_post_pasantia)
    {
        if ($Id_post_pasantia == null) {
            echo '
            <script>alert("Ingresa el Id de la postulacion a eliminar");
            window.location = "../html/VPost_pasant3.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deletePostulacionpasantias($Id_post_pasantia);
            echo '
            <script>alert("postulacion eliminada correctamente");
            window.location = "../html/VPost_pasant3.php";
            </script>
            ';
        }
    }

    public function updatePostulacionpasantias($Id_post_pasantia, $Entidad, $Programa_pasantias, $Medio_ent, $Area_pas, $Hoja_vida, $Carta_presentacion, $Documento_id, $Duracion, $Fec_ini_pas, $Estado_procedimiento_post_fk, $Aceptado, $Observaciones)
    {
        if (empty($Id_post_pasantia) || empty($Entidad) || empty($Programa_pasantias) || empty($Medio_ent) || empty($Area_pas) || empty($Hoja_vida) || empty($Carta_presentacion) || empty($Documento_id) || empty($Duracion) || empty($Fec_ini_pas) || empty($Estado_procedimiento_post_fk) || empty($Aceptado) || empty($Observaciones)) {
            echo '
            <script>alert("Completa todos los campos para actualizar la postulacion");
            window.location = "../html/Vsoli_pas.php";
            </script>
            ';
            exit;
        } else {
            $this->model->updatePostulacionpasantias($Id_post_pasantia, $Entidad, $Programa_pasantias, $Medio_ent, $Area_pas, $Hoja_vida, $Carta_presentacion, $Documento_id, $Duracion, $Fec_ini_pas, $Estado_procedimiento_post_fk, $Aceptado, $Observaciones);
            echo '
            <script>alert("postulacion actualizada correctamente");
            window.location = "../html/Vsoli_pas.php";
            </script>
            ';
        }
    }
    public function updatePostulacionpasantiasTh($Id_post_pasantia,  $Area_pas,  $Duracion, $Fec_ini_pas,  $Aceptado, $Observaciones)
    {
        $campos_vacios = [];

        if (empty($Id_post_pasantia)) {
            $campos_vacios[] = "Id de Postulación";
        }
        if (empty($Area_pas)) {
            $campos_vacios[] = "Área de Pasantía";
        }
        if (empty($Duracion)) {
            $campos_vacios[] = "Duración";
        }
        if (empty($Fec_ini_pas)) {
            $campos_vacios[] = "Fecha de Inicio";
        }
        if (empty($Aceptado)) {
            $campos_vacios[] = "Estado de Aceptación";
        }
        if (empty($Observaciones)) {
            $campos_vacios[] = "Observaciones";
        }

        // Si hay campos vacíos, creamos el mensaje
        if (!empty($campos_vacios)) {
            $mensaje = "Completa los siguientes campos para actualizar la postulación: " . implode(", ", $campos_vacios);
            echo '
            <script>
                alert("' . $mensaje .'");
                window.location = "../html/Vsoli_pas.php";
            </script>
            ';
            exit;
        }
        else {
            $this->model->updatePostulacionpasantiasTh($Id_post_pasantia,  $Area_pas,$Duracion, $Fec_ini_pas, $Aceptado, $Observaciones);

            //Obtener Correo del pasante
            require_once(__DIR__ . '/../Config/db.php');
            $con = new db();
            $pdo = $con->conexion();
            // Consulta usando JOIN
            $sql = "
                SELECT IP.Correo
                FROM RPPI.PostulacionPasantias PP
                JOIN RPPI.InformacionPersonal IP
                    ON IP.Id_usuario_persona_fk = PP.Id_Usuario
                WHERE PP.Id_post_pasantia = :Id_post_pasantia
            ";        
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':Id_post_pasantia', $Id_post_pasantia, PDO::PARAM_INT);
            $stmt->execute();
            $correo = $stmt->fetchColumn();
            
            if (empty($correo)) {
                echo '
                <script>
                    alert("Usuario sin correo en información personal");
                </script>
                ';
            }
            else
            {
                echo '
                <script>
                    alert("Enviando correo a: ' . $correo . '");
                </script>
                ';
            } 

            //Envío de correo de actualización
            $cuerpo_Correo = "
                <p>Hola, esperamos te encuentres muy bien. A continuación, los resultados de la revisión de tu postulación a la Pasantía:</p>
                <p><strong>Aceptado:</strong> {$Aceptado}</p>
                <p><strong>Observaciones:</strong> {$Observaciones}</p>
            ";

            require_once '../PHP/EnvioEmail.php';
            $EnviarCorreo = new EmailSender();
            // Llamar al método para enviar el correo
            $EnviarCorreo->sendEmail(
                "$correo",           // Destinatario
                "elopez@invima.gov.co",             // Remitente
                'Respuesta de postulación para Pasantía', // Asunto
                $cuerpo_Correo                      // Cuerpo del correo en HTML
            );
            echo '
            <script>
                alert("postulacion actualizada correctamente");
                window.location = "../html/Vsoli_pas.php";
            </script>
            ';
        }
    }
    
}

$PostulacionpasantiasController = new PostulacionpasantiasController();



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getPostulacionpasantias'])) {
        $PostulacionpasantiasController->getPostulacionpasantias();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setPostulacionpasantias'])) {
        $Estado_procedimiento_post_fk =!empty($_POST['Estado_procedimiento_post_fk']) ? $_POST['Estado_procedimiento_post_fk'] : 1;
        $PostulacionpasantiasController->setPostulacionpasantias($_POST['Entidad'], $_POST['Programa_pasantias'], $_POST['Medio_ent'], $_POST['Area_pas'], $_FILES['Hoja_vida'], $_FILES['Carta_presentacion'], $_FILES['Documento_id'], $_POST['Duracion'], $_POST['Fec_ini_pas'], $Estado_procedimiento_post_fk);
        exit; 
    }
    if (isset($_POST['deletePostulacionpasantias'])) {
        $PostulacionpasantiasController->deletePostulacionpasantias($_POST['Id_post_pasantia']);
        exit;
    }
    if (isset($_POST['updatePostulacionpasantias'])) {
        $Estado_procedimiento_post_fk =!empty($_POST['Estado_procedimiento_post_fk']) ? $_POST['Estado_procedimiento_post_fk'] : 1;
        $PostulacionpasantiasController->updatePostulacionpasantias($_POST['Id_post_pasantia'], $_POST['Entidad'], $_POST['Programa_pasantias'], $_POST['Medio_ent'], $_POST['Area_pas'], $_POST['Hoja_vida'], $_POST['Carta_presentacion'], $_POST['Documento_id'], $_POST['Duracion'], $_POST['Fec_ini_pas'], $Estado_procedimiento_post_fk,$_POST['Aceptado'],$_POST['Observaciones']);
        exit;
    }
    if (isset($_POST['updatePostulacionpasantiasTh'])) {
        $PostulacionpasantiasController->updatePostulacionpasantiasTh($_POST['Id_post_pasantia'], $_POST['Area_pas'], $_POST['Duracion'], $_POST['Fec_ini_pas'],$_POST['Aceptado'],$_POST['Observaciones']);
        exit;
    }
    
}
