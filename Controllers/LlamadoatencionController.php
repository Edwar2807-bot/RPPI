<?php
class LlamadoatencionController
{
    private $model;

    public function __construct()
    {
        require_once "../Models/LlamadoatencionModel.php";
        $this->model = new LlamadoatencionModel();
    }

    public function setLlamadoatencion($Descripcion_llamado_atencion, $Id_eval_pasante_FK = 1)
    {
        if (empty($Descripcion_llamado_atencion) || empty($Id_eval_pasante_FK)) {
            echo '
            <script>alert("Completa todos los campos para poder registrar el llamado de atención");
            window.location = "../html/VEval_pas_tabla.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setLlamadoatencion($Descripcion_llamado_atencion, $Id_eval_pasante_FK);
            echo '
            <script>alert("Llamado de atención registrado correctamente");
            window.location = "../html/VEval_pas_tabla.php";
            </script>
            ';
        }
    }

    public function getLlamadoatencion()
    {
        return $this->model->getLlamadoatencion();
    }

    public function deleteLlamadoatencion($Id_llamado_atencion)
    {
        if (empty($Id_llamado_atencion)) {
            echo '
            <script>alert("Ingresa el ID del llamado de atención a eliminar");
            window.location = "../html/VEval_pas_tabla.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteLlamadoatencion($Id_llamado_atencion);
            echo '
            <script>alert("Llamado de atención eliminado correctamente");
            window.location = "../html/VEval_pas_tabla.php";
            </script>
            ';
        }
    }

    public function updateLlamadoatencion($Id_llamado_atencion, $Descripcion_llamado_atencion, $Id_eval_pasante_FK)
    {
        if (empty($Id_llamado_atencion) || empty($Descripcion_llamado_atencion) || empty($Id_eval_pasante_FK)) {
            echo '
            <script>alert("Completa todos los campos para actualizar el llamado de atención");
            window.location = "../html/VEval_pas_tabla.php";
            </script>
            ';
            exit;
        } else {
            $this->model->updateLlamadoatencion($Id_llamado_atencion, $Descripcion_llamado_atencion, $Id_eval_pasante_FK);
            echo '
            <script>alert("Llamado de atención actualizado correctamente");
            window.location = "../html/VEval_pas_tabla.php";
            </script>
            ';
        }
    }
}

$LlamadoatencionController = new LlamadoatencionController();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getLlamadoatencion'])) {
        $LlamadoatencionController->getLlamadoatencion();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setLlamadoatencion'])) {
        $Id_eval_pasante_FK = !empty($_POST['Id_eval_pasante_FK']) ? $_POST['Id_eval_pasante_FK'] : 1; // Valor predeterminado si no se proporciona
        $LlamadoatencionController->setLlamadoatencion($_POST['Descripcion_llamado_atencion'], $Id_eval_pasante_FK);
        exit;
    }

    if (isset($_POST['deleteLlamadoatencion'])) {
        if (!isset($_POST['Id_llamado_atencion'])) {
            echo '
            <script>alert("El campo ID es obligatorio para eliminar el llamado de atención");
            window.location = "../html/VEval_pas_tabla_Admin.php";
            </script>
            ';
        } else {
            $LlamadoatencionController->deleteLlamadoatencion($_POST['Id_llamado_atencion']);
        }
        exit;
    }

    if (isset($_POST['updateLlamadoatencion'])) {
        if (!isset($_POST['Id_llamado_atencion']) || empty($_POST['Descripcion_llamado_atencion'])) {
            echo '
            <script>alert("El campo ID es obligatorio para actualizar el llamado de atención");
            window.location = "../html/VEval_pas_tabla_Admin.php";
            </script>
            ';
        } else {
            $Id_eval_pasante_FK = !empty($_POST['Id_eval_pasante_FK']) ? $_POST['Id_eval_pasante_FK'] : 1; // Valor predeterminado si no se proporciona
            $LlamadoatencionController->updateLlamadoatencion($_POST['Id_llamado_atencion'], $_POST['Descripcion_llamado_atencion'], $Id_eval_pasante_FK);
        }
        exit;
    }
}
