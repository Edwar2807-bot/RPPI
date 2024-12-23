<?php

class InformacionPersonalController  
{
    private $model;

    public function __construct()
    {
        require_once "../Models/InformacionPersonalModel.php";
        $this->model = new InformacionPersonalModel();
    }

    public function getByNumDocumento($Num_documento)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.InformacionPersonal WHERE Num_documento = :Num_documento");
        $stmt->bindParam(":Num_documento", $Num_documento);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getByCorreo($Correo)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM RPPI.InformacionPersonal WHERE Correo = :Correo");
        $stmt->bindParam(":Correo", $Correo);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function setInformacionPersonal($Num_documento, $Tipo_identificacion, $Fec_nacimiento, $Nombre, $Apellido, $Correo, $Telefono, $Direccion, $Fec_expedicion, $Ciudad, $Estrato, $Genero, $Nivel_educativo, $Foto, $Id_usuario_persona_fk = 1, $Id_post_pasantias_fk = 2)
    {
        // Validar campos vacíos
        if (empty($Num_documento) || empty($Tipo_identificacion) || empty($Fec_nacimiento) || empty($Nombre) || empty($Apellido) || empty($Correo) || empty($Telefono) || empty($Direccion) || empty($Fec_expedicion) || empty($Ciudad) || empty($Estrato) || empty($Genero) || empty($Nivel_educativo) || empty($Foto)){
            echo '
            <script>alert("Completa todos los campos para poder registrar la información personal");
            window.location = "../html/VInfo_personal1_tutor.php";
            </script>
            ';
            exit;
        }

        // Verificar si el número de documento ya existe
        if ($this->model->getByNumDocumento($Num_documento)) {
            echo '
            <script>alert("El número de documento ya está registrado");
            window.location = "../html/VInfo_personal1_tutor.php";
            </script>
            ';
            exit;
        }

        // Verificar si el correo ya existe
        if ($this->model->getByCorreo($Correo)) {
            echo '
            <script>alert("El correo ya está registrado");
            window.location = "../html/VInfo_personal1_tutor.php";
            </script>
            ';
            exit;
        }

        // Registrar información personal
        $this->model->setInformacionPersonal($Num_documento, $Tipo_identificacion, $Fec_nacimiento, $Nombre, $Apellido, $Correo, $Telefono, $Direccion, $Fec_expedicion, $Ciudad, $Estrato, $Genero, $Nivel_educativo, $Foto, $Id_usuario_persona_fk, $Id_post_pasantias_fk);
        echo '
            <script>alert("Informacion personal registrada");
            window.location = "../html/VInfo_personal_tutor.php";
            </script>
        ';
    }

    public function getInformacionPersonal()
    {
        return $this->model->getInformacionPersonal();
    }

    public function deleteInformacionPersonal($Id_informacion_personal)
    {
        if ($Id_informacion_personal == null) {
            echo '
            <script>alert("Ingresa el Id de la información personal a eliminar");
            window.location = "../html/VInfo_personal_tutor.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteInformacionPersonal($Id_informacion_personal);
            echo '
            <script>alert("Información personal eliminada correctamente");
            window.location = "../html/VInfo_personal_tutor.php";
            </script>
            ';
        }
    }

    public function updateInformacionPersonal($Id_informacion_personal, $Num_documento, $Tipo_identificacion, $Fec_nacimiento, $Nombre, $Apellido, $Correo, $Telefono, $Direccion, $Fec_expedicion, $Ciudad, $Estrato, $Genero, $Nivel_educativo, $Id_usuario_persona_fk, $Id_post_pasantias_fk)
    {
        // Validar campos vacíos
        if (empty($Id_informacion_personal) || empty($Num_documento) || empty($Tipo_identificacion) || empty($Fec_nacimiento) || empty($Nombre) || empty($Apellido) || empty($Correo) || empty($Telefono) || empty($Direccion) || empty($Fec_expedicion) || empty($Ciudad) || empty($Estrato) || empty($Genero) || empty($Nivel_educativo)) {
            echo '
            <script>alert("Completa todos los campos para actualizar la información personal");
            window.location = "../html/VInfo_personal_tutor.php"";
            </script>
            ';
            exit;
        }

        // Manejo de archivo de foto
        $Foto = null; // Inicializar la variable
        if (isset($_FILES['Foto']) && $_FILES['Foto']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = '../resources/img/profile_pictures/'; // Ajusta según tu estructura de carpetas
            $uploadFile = $uploadDir . basename($_FILES['Foto']['name']);

            // Mueve el archivo a la ubicación deseada
            if (move_uploaded_file($_FILES['Foto']['tmp_name'], $uploadFile)) {
                $Foto = basename($_FILES['Foto']['name']); // Asigna el nombre del archivo a la variable $Foto
            } else {
                echo 'Error al subir la imagen';
                exit;
            }
        } else {
            // Si no se subió una nueva imagen, puedes conservar el valor anterior de la base de datos
            $Foto = $this->model->getFotoById($Id_informacion_personal); // Asegúrate de tener este método en tu modelo
        }

        // Actualiza la información personal en la base de datos
        $this->model->updateInformacionPersonal($Id_informacion_personal, $Num_documento, $Tipo_identificacion, $Fec_nacimiento, $Nombre, $Apellido, $Correo, $Telefono, $Direccion, $Fec_expedicion, $Ciudad, $Estrato, $Genero, $Nivel_educativo, $Foto, $Id_usuario_persona_fk, $Id_post_pasantias_fk);
        echo '
        <script>alert("Información personal actualizada correctamente");
        window.location = "../html/VInfo_personal_tutor.php";
        </script>
        ';
    }

    
}

// Instanciación del controlador
$InformacionPersonalController = new InformacionPersonalController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getInformacionPersonal'])) {
        $InformacionPersonalController->getInformacionPersonal();
        var_dump($_POST); // Verás los datos enviados por el formulario
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setInformacionPersonal'])) {
        $Id_usuario_persona_fk = !empty($_POST['Id_usuario_persona_fk']) ? $_POST['Id_usuario_persona_fk'] : 1; // Valor predeterminado si no se proporciona
        $Id_post_pasantias_fk = !empty($_POST['Id_post_pasantias_fk']) ? $_POST['Id_post_pasantias_fk'] : 2; // Valor predeterminado si no se proporciona
        $InformacionPersonalController->setInformacionPersonal($_POST['Num_documento'], $_POST['Tipo_identificacion'], $_POST['Fec_nacimiento'], $_POST['Nombre'], $_POST['Apellido'], $_POST['Correo'], $_POST['Telefono'], $_POST['Direccion'], $_POST['Fec_expedicion'], $_POST['Ciudad'], $_POST['Estrato'], $_POST['Genero'], $_POST['Nivel_educativo'], $_FILES['Foto']['name'], $Id_usuario_persona_fk, $Id_post_pasantias_fk);
        exit; 
    }
    if (isset($_POST['deleteInformacionPersonal'])) {
        $InformacionPersonalController->deleteInformacionPersonal($_POST['Id_informacion_personal']);
        exit;
    }
    if (isset($_POST['updateInformacionPersonal'])) {
        $Id_usuario_persona_fk = !empty($_POST['Id_usuario_persona_fk']) ? $_POST['Id_usuario_persona_fk'] : 1; // Valor predeterminado si no se proporciona
        $Id_post_pasantias_fk = !empty($_POST['Id_post_pasantias_fk']) ? $_POST['Id_post_pasantias_fk'] : 2; // Valor predeterminado si no se proporciona
        $InformacionPersonalController->updateInformacionPersonal($_POST['Id_informacion_personal'], $_POST['Num_documento'], $_POST['Tipo_identificacion'], $_POST['Fec_nacimiento'], $_POST['Nombre'], $_POST['Apellido'], $_POST['Correo'], $_POST['Telefono'], $_POST['Direccion'], $_POST['Fec_expedicion'], $_POST['Ciudad'], $_POST['Estrato'], $_POST['Genero'], $_POST['Nivel_educativo'], $Id_usuario_persona_fk, $Id_post_pasantias_fk);
        exit;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
    }
}
