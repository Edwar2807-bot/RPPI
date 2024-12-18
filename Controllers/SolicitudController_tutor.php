<?php
class SolicitudController
{
    private $model;

    public function __construct()
    {
        require_once "../Models/SolicitudModel.php";
        $this->model = new SolicitudModel();
    }

    public function setSolicitud($Nombre_solici, $Dependencia_solici, $Grupo_Solici, $Lugar_practica, $Nivel_academico, $Programa_academico, $Cargo_solici, $Descrip_cargo, $Numero_solici, $Modalidad_solici, $Actividad, $Id_usuario_solici_fk = 1) // Valor predeterminado
    {
        if (empty($Nombre_solici) || empty($Dependencia_solici) || empty($Grupo_Solici) || empty($Lugar_practica) || empty($Nivel_academico) || empty($Programa_academico) || empty($Cargo_solici) || empty($Descrip_cargo) || empty($Numero_solici) || empty($Modalidad_solici) || empty($Actividad)) {
            echo '
            <script>alert("Completa todos los campos para poder registrar la solicitud");
            window.location = "../html/VSolicitud1_tutor.php";
            </script>
            ';
            exit;
        } else {
            // Asegúrate de que se pasa Num_documento_exp_fk (ya tiene valor predeterminado)
            $this->model->setSolicitud($Nombre_solici, $Dependencia_solici, $Grupo_Solici, $Lugar_practica, $Nivel_academico, $Programa_academico, $Cargo_solici, $Descrip_cargo, $Numero_solici, $Modalidad_solici, $Actividad, $Id_usuario_solici_fk);
            echo '
            <script>alert("Solicitud insertada exitosamente");
            window.location = "../html/VSolicitud_tutor.php";
            </script>
            ';
        }
    }

    public function getSolicitud()
    {
        return $this->model->getSolicitud();
    }

    public function deleteSolicitud($Id_solicitud)
    {
        if (empty($Id_solicitud)) {
            echo '
            <script>alert("Ingresa el Id de la Solicitud a eliminar");
            window.location = "../html/VSolicitud_tutor.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteSolicitud($Id_solicitud);
            echo '
            <script>alert("Solicitud eliminada correctamente");
            window.location = "../html/VSolicitud_tutor.php";
            </script>
            ';
        }
    }

    public function updateSolicitud($Id_solicitud, $Nombre_solici, $Dependencia_solici, $Grupo_Solici, $Lugar_practica, $Nivel_academico, $Programa_academico, $Cargo_solici, $Descrip_cargo, $Numero_solici, $Modalidad_solici, $Actividad, $Id_usuario_solici_fk)
    {
        if (empty($Id_solicitud) ||empty($Nombre_solici) || empty($Dependencia_solici) || empty($Grupo_Solici) || empty($Lugar_practica) || empty($Nivel_academico) || empty($Programa_academico) || empty($Cargo_solici) || empty($Descrip_cargo) || empty($Numero_solici) || empty($Modalidad_solici) || empty($Actividad) || empty($Id_usuario_solici_fk)) {
            echo '
            <script>alert("Completa todos los campos para actualizar la Solicitud");
            window.location = "../html/VSolicitud_tutor.php";
            </script>
            ';
            exit;
        } else {
            $this->model->updateSolicitud($Id_solicitud, $Nombre_solici, $Dependencia_solici, $Grupo_Solici, $Lugar_practica, $Nivel_academico, $Programa_academico, $Cargo_solici, $Descrip_cargo, $Numero_solici, $Modalidad_solici, $Actividad, $Id_usuario_solici_fk);
            echo '
            <script>alert("Solicitud actualizada correctamente");
            window.location = "../html/VSolicitud_tutor.php";
            </script>
            ';
        }
    }
}

$SolicitudController = new SolicitudController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getSolicitud'])) {
        $SolicitudController->getSolicitud();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setSolicitud'])) {
        $Id_usuario_solici_fk = !empty($_POST['Id_usuario_solici_fk']) ? $_POST['Id_usuario_solici_fk'] : 1; // Valor predeterminado si no se proporciona
        $SolicitudController->setSolicitud(
            $_POST['Nombre_solici'],
            $_POST['Dependencia_solici'],
            $_POST['Grupo_Solici'],
            $_POST['Lugar_practica'],
            $_POST['Nivel_academico'],
            $_POST['Programa_academico'],
            $_POST['Cargo_solici'],
            $_POST['Descrip_cargo'],
            $_POST['Numero_solici'],
            $_POST['Modalidad_solici'],
            $_POST['Actividad'],
            $Id_usuario_solici_fk // Pasa el valor correspondiente
        );
        exit;
    }
    if (isset($_POST['deleteSolicitud'])) {
        $SolicitudController->deleteSolicitud($_POST['Id_solicitud']);
        exit;
    }
    if (isset($_POST['updateSolicitud'])) {
        $Id_usuario_solici_fk = !empty($_POST['Id_usuario_solici_fk']) ? $_POST['Id_usuario_solici_fk'] : 1; // Valor predeterminado si no se proporciona
        $SolicitudController->updateSolicitud(
            $_POST['Id_solicitud'],
            $_POST['Nombre_solici'],
            $_POST['Dependencia_solici'],
            $_POST['Grupo_Solici'],
            $_POST['Lugar_practica'],
            $_POST['Nivel_academico'],
            $_POST['Programa_academico'],
            $_POST['Cargo_solici'],
            $_POST['Descrip_cargo'],
            $_POST['Numero_solici'],
            $_POST['Modalidad_solici'],
            $_POST['Actividad'],
            $Id_usuario_solici_fk // Pasa el valor correspondiente
        );
        exit;
    }
}
?>
