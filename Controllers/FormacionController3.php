<?php
class FormacionController
{
    private $model;

    public function __construct()
    {
        require_once "../Models/FormacionModel.php";
        $this->model = new FormacionModel();
    }

    public function setFormacion($Tipo_educacion, $Nivel_educacion, $Institucion, $Programa, $Fec_terminacion, $Id_informacion_personal_form_fk = 6)
    {
        if (empty($Tipo_educacion) || empty($Nivel_educacion) || empty($Institucion) || empty($Programa) || empty($Fec_terminacion)){
            echo '
            <script>alert("Completa todos los campos para poder registrar la Formacion");
            window.location = "../html/VFormacion3.1.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setFormacion($Tipo_educacion, $Nivel_educacion, $Institucion, $Programa, $Fec_terminacion, $Id_informacion_personal_form_fk);
            echo '
            <script>alert("Formacion registrada correctamente");
            window.location = "../html/VFormacion3.1.php";
            </script>
            ';
        }
    }

    public function getFormacion()
    {
        return $this->model->getFormacion();
    }

    public function deleteFormacion($Id_formacion)
    {
        if ($Id_formacion == null) {
            echo '
            <script>alert("Ingresa el Id de la Formacion eliminar");
            window.location = "../html/VFormacion3.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteFormacion($Id_formacion);
            echo '
            <script>alert("Formacion eliminada correctamente");
            window.location = "../html/VFormacion3.php";
            </script>
            ';
        }
    }

    public function updateFormacion($Id_formacion, $Tipo_educacion, $Nivel_educacion, $Institucion, $Programa, $Fec_terminacion, $Id_informacion_personal_form_fk)
    {
        if (empty($Id_formacion) || empty($Tipo_educacion) || empty($Nivel_educacion) || empty($Institucion) || empty($Programa) || empty($Fec_terminacion) || empty($Id_informacion_personal_form_fk)) {
            echo '
            <script>alert("Completa todos los campos para actualizar la Formacion");
            window.location = "../html/VFormacion3.php";
            </script>
            ';
            exit;
        } else {
            $this->model->updateFormacion($Id_formacion, $Tipo_educacion, $Nivel_educacion, $Institucion, $Programa, $Fec_terminacion, $Id_informacion_personal_form_fk);
            echo '
            <script>alert("Formacion actualizada correctamente");
            window.location = "../html/VFormacion3.php";
            </script>
            ';
        }
    }
}

$FormacionController = new FormacionController();



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getFormacion'])) {
        $FormacionController->getFormacion();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setFormacion'])) {
        $Id_informacion_personal_form_fk = !empty($_POST['Id_informacion_personal_form_fk']) ? $_POST['Id_informacion_personal_form_fk'] : 6; // Valor predeterminado si no se proporciona
        $FormacionController->setFormacion($_POST['Tipo_educacion'], $_POST['Nivel_educacion'], $_POST['Institucion'], $_POST['Programa'], $_POST['Fec_terminacion'], $Id_informacion_personal_form_fk);
        exit; 
    }
    if (isset($_POST['deleteFormacion'])) {
        $FormacionController->deleteFormacion($_POST['Id_formacion']);
        exit;
    }
    if (isset($_POST['updateFormacion'])) {
        // Asegurarse de que el campo foráneo se está recibiendo, si no, asignar un valor por defecto (puedes ajustarlo según tu lógica).
        $Id_informacion_personal_form_fk = !empty($_POST['Id_informacion_personal_form_fk']) ? $_POST['Id_informacion_personal_form_fk'] : 6;
        
        // Llamada a la función de actualización
        $FormacionController->updateFormacion(
            $_POST['Id_formacion'],
            $_POST['Tipo_educacion'],
            $_POST['Nivel_educacion'],
            $_POST['Institucion'],
            $_POST['Programa'],
            $_POST['Fec_terminacion'],
            $Id_informacion_personal_form_fk  // Aquí pasa la clave foránea
        );
        exit;
    }
}
