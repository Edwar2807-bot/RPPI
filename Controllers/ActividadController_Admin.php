<?php
class ActividadController
{
    private $model;

    public function __construct()
    {
        require_once "../Models/ActividadModel.php";
        $this->model = new ActividadModel();
    }


    public function setActividad( $Descripcion_actividad, $Fecha_actividad, $Id_proy_FK = 2)
    {
        if (empty($Descripcion_actividad) || empty($Fecha_actividad)){
            echo '
            <script>alert("Completa todos los campos para poder registrar la Actividad");
            window.location = "../html/Vpro_pas_Admin.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setActividad($Descripcion_actividad, $Fecha_actividad, $Id_proy_FK );
            echo '
            <script>alert("Actividad registrada correctamente");
            window.location = "../html/Vpro_pas_Admin.php";
            </script>
            ';
        }
    }

    public function getAtividad()
    {
        return $this->model->getActividad();
    }

    public function deleteActividad($Id_actividad)
    {
        if ($Id_actividad == null) {
            echo '
            <script>alert("Ingresa el Id de la actividad a eliminar");
            window.location = "../html/Vpro_pas_Admin.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteActividad($Id_actividad);
            echo '
            <script>alert("Actividad eliminada correctamente");
            window.location = "../html/Vpro_pas_Admin.php";
            </script>
            ';
        }
    }

    public function updateActividad($Id_actividad, $Descripcion_actividad, $Fecha_actividad, $Id_proy_FK)
    {
        if (empty($Id_actividad) || empty($Descripcion_actividad) || empty($Fecha_actividad) || empty($Id_proy_FK)) {
            echo '

            ';
            exit;
        } else {
            $this->model->updateActividad($Id_actividad, $Descripcion_actividad, $Fecha_actividad, $Id_proy_FK);
            echo '
            <script>alert("Actividad actualizada correctamente");
            window.location = "../html/Vpro_pas_Admin.php";
            </script>
            ';
        }
    }
}

$ActividadController = new ActividadController();



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getActividad'])) {
        $ActividadController->getAtividad();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setActividad'])) {
        $Id_proy_FK = !empty($_POST['Id_proy_FK']) ? $_POST['Id_proy_FK'] : 2; // Valor predeterminado si no se proporciona
        $ActividadController->setActividad($_POST['Descripcion_actividad'], $_POST['Fecha_actividad'], $Id_proy_FK);
        exit;
    }
    if (isset($_POST['deleteActividad'])) {
        $ActividadController->deleteActividad($_POST['Id_actividad']);
        exit;
    }
    if (isset($_POST['updateActividad'])) {
        $Id_proy_FK  = !empty($_POST['Id_proy_FK']) ? $_POST['Id_proy_FK'] : 2; // Valor predeterminado si no se proporciona
        $ActividadController->updateActividad($_POST['Id_actividad'], $_POST['Descripcion_actividad'], $_POST['Fecha_actividad'], $Id_proy_FK);
        exit;
    }
    
}