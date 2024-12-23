<?php
session_start();
class ExperiencialaboralController
{
    private $model;

    public function __construct()
    {
        require_once "../Models/ExperiencialabModel.php";
        $this->model = new ExperiencialaboralModel();
    }

    public function setExperiencialaboral($Empresa, $Cargo, $Fec_ini, $Fec_fin, $Emp_actual, $Horario, $Id_informacion_personal_exp_fk = 6, $Id_Usuario) // Valor predeterminado
    {
        if (empty($Empresa) || empty($Cargo) || empty($Fec_ini) || empty($Fec_fin) || empty($Emp_actual) || empty($Horario)) {
            echo '
            <script>alert("Completa todos los campos para poder registrar la experiencia laboral");
            window.location = "../html/VExp_lab3.1.php";
            </script>
            ';
            exit;
        } else {
            // Asegúrate de que se pasa Num_documento_exp_fk (ya tiene valor predeterminado)
            $this->model->setExperiencialaboral($Empresa, $Cargo, $Fec_ini, $Fec_fin, $Emp_actual, $Horario, $Id_informacion_personal_exp_fk, $Id_Usuario);
            echo '
            <script>alert("Experiencia laboral registrada correctamente");
            window.location = "../html/VExp_lab3.php";
            </script>
            ';
        }
    }

    public function getExperiencialaboral()
    {
        return $this->model->getExperiencialaboral();
    }

    public function deleteExperiencialaboral($Id_exp_laboral)
    {
        if (empty($Id_exp_laboral)) {
            echo '
            <script>alert("Ingresa el Id de la experiencia laboral a eliminar");
            window.location = "../html/VExp_lab3.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteExperiencialaboral($Id_exp_laboral);
            echo '
            <script>alert("Experiencia laboral eliminada correctamente");
            window.location = "../html/VExp_lab3.php";
            </script>
            ';
        }
    }

    public function updateExperiencialaboral($Id_exp_laboral, $Empresa, $Cargo, $Fec_ini, $Fec_fin, $Emp_actual, $Horario, $Id_informacion_personal_exp_fk)
    {
        if (empty($Id_exp_laboral) || empty($Empresa) || empty($Cargo) || empty($Fec_ini) || empty($Fec_fin) || empty($Emp_actual) || empty($Horario) || empty($Id_informacion_personal_exp_fk)) {
            echo '
            <script>alert("Completa todos los campos para actualizar la experiencia laboral");
            window.location = "../html/VExp_lab3.php";
            </script>
            ';
            exit;
        } else {
            $this->model->updateExperiencialaboral($Id_exp_laboral, $Empresa, $Cargo, $Fec_ini, $Fec_fin, $Emp_actual, $Horario, $Id_informacion_personal_exp_fk);
            echo '
            <script>alert("Experiencia laboral actualizada correctamente");
            window.location = "../html/VExp_lab3.php";
            </script>
            ';
        }
    }
}

$ExperiencialaboralController = new ExperiencialaboralController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getExperiencialaboral'])) {
        $ExperiencialaboralController->getExperiencialaboral();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setExperiencialaboral'])) {
        $Id_Usuario = $_SESSION['Usuario_id'];
        $Id_informacion_personal_exp_fk = !empty($_POST['Id_informacion_personal_exp_fk']) ? $_POST['Id_informacion_personal_exp_fk'] : 6; // Valor predeterminado si no se proporciona
        $ExperiencialaboralController->setExperiencialaboral(
            $_POST['Empresa'],
            $_POST['Cargo'],
            $_POST['Fec_ini'],
            $_POST['Fec_fin'],
            $_POST['Emp_actual'],
            $_POST['Horario'],
            $Id_informacion_personal_exp_fk, // Pasa el valor correspondiente
            $Id_Usuario
        );
        exit;
    }
    if (isset($_POST['deleteExperiencialaboral'])) {
        $ExperiencialaboralController->deleteExperiencialaboral($_POST['Id_exp_laboral']);
        exit;
    }
    if (isset($_POST['updateExperiencialaboral'])) {
        $Id_informacion_personal_exp_fk = !empty($_POST['Id_informacion_personal_exp_fk']) ? $_POST['Id_informacion_personal_exp_fk'] : 6; // Valor predeterminado si no se proporciona
        $ExperiencialaboralController->updateExperiencialaboral(
            $_POST['Id_exp_laboral'],
            $_POST['Empresa'],
            $_POST['Cargo'],
            $_POST['Fec_ini'],
            $_POST['Fec_fin'],
            $_POST['Emp_actual'],
            $_POST['Horario'],
            $Id_informacion_personal_exp_fk // Pasa el valor correspondiente
        );
        exit;
    }
}
?>
