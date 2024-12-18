<?php
class EstadoprocedimientoController
{
    private $model;

    public function __construct()
    {
        require_once "../Models/EstadoproceModel.php";
        $this->model = new EstadoprocedimientoModel();
    }

    public function setEstadoprocedimiento($Nombre_estado_proc, $Descripcion_estado_proc )
    {
        if (empty($Nombre_estado_proc) || empty($Descripcion_estado_proc)) {
            echo '
            <script>alert("Completa todos los campos para poder registrar el estado del procedimiento");
            window.location = "../html/VEstadoproce1_Admin.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setEstadoprocedimiento($Nombre_estado_proc, $Descripcion_estado_proc);
            echo '
            <script>alert("Estado del procedimiento registrado correctamente");
            window.location = "../html/VEstadoproce1_Admin.php";
            </script>
            ';
        }
    }

    public function getEstadoprocedimiento()
    {
        return $this->model->getEstadoprocedimiento();
    }

    public function deleteEstadoprocedimiento($Id_estado_procedimiento)
    {
        if ($Id_estado_procedimiento == null) {
            echo '
            <script>alert("Ingresa el Id del Estado del procedimiento a eliminar");
            window.location = "../html/VEstadoproce_Admin.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteEstadoprocedimiento($Id_estado_procedimiento);
            echo '
            <script>alert("Estado del procedimiento eliminado correctamente");
            window.location = "../html/VEstadoproce_Admin.php";
            </script>
            ';
        }
    }

    public function updateEstadoprocedimiento($Id_estado_procedimiento, $Nombre_estado_proc, $Descripcion_estado_proc)
    {
        if (empty($Id_estado_procedimiento) || empty($Nombre_estado_proc) || empty($Descripcion_estado_proc)) {
            echo '
            <script>alert("Completa todos los campos para actualizar el Estado de prodecimiento");
            window.location = "../html/VEstadoproce_Admin.php";
            </script>
            ';
            exit;
        } else {
            $this->model->updateEstadoprocedimiento($Id_estado_procedimiento, $Nombre_estado_proc, $Descripcion_estado_proc);
            echo '
            <script>alert("Estado del procedimiento actualizado correctamente");
            window.location = "../html/VEstadoproce_Admin.php";
            </script>
            ';
        }
    }
}

$EstadoprocedimientoController = new EstadoprocedimientoController();



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getEstadoprocedimiento'])) {
        $EstadoprocedimientoController->getEstadoprocedimiento();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setEstadoprocedimiento'])) {
        $EstadoprocedimientoController->setEstadoprocedimiento($_POST['Nombre_estado_proc'], $_POST['Descripcion_estado_proc']);
        exit;
    }
    if (isset($_POST['deleteEstadoprocedimiento'])) {
        $EstadoprocedimientoController->deleteEstadoprocedimiento($_POST['Id_estado_procedimiento']);
        exit;
    }
    if (isset($_POST['updateEstadoprocedimiento'])) {
        $EstadoprocedimientoController->updateEstadoprocedimiento($_POST['Id_estado_procedimiento'],$_POST['Nombre_estado_proc'], $_POST['Descripcion_estado_proc']);
        exit;
    }
}