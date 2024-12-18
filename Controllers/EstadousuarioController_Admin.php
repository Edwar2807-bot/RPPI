<?php
class EstadousuarioController
{
    private $model;

    public function __construct()
    {
        require_once "../Models/EstadousuarioModel.php";
        $this->model = new EstadousuarioModel();
    }

    public function setEstadousuario($Nombre_estado, $Descripcion_estado)
    {
        if (empty($Nombre_estado) || empty($Descripcion_estado)) {
            echo '
            <script>alert("Completa todos los campos para poder registrar el estado del usuario");
            window.location = "../html/VEstadousuario1_Admin.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setEstadousuario($Nombre_estado, $Descripcion_estado);
            echo '
            <script>alert("Estado del usuario registrado correctamente");
            window.location = "../html/VEstadousuario1_Admin.php";
            </script>
            ';
        }
    }

    public function getEstadousuario()
    {
        return $this->model->getEstadousuario();
    }

    public function deleteEstadousuario($Id_estado_usuario)
    {
        if ($Id_estado_usuario == null) {
            echo '
            <script>alert("Ingresa el Id de el estado de usuario a eliminar");
            window.location = "../html/VEstadousuario_Admin.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteEstadousuario($Id_estado_usuario);
            echo '
            <script>alert("Estado de usuario eliminado correctamente");
            window.location = "../html/VEstadousuario_Admin.php";
            </script>
            ';
        }
    }

    public function updateEstadousuario($Id_estado_usuario, $Nombre_estado, $Descripcion_estado)
    {
        if (empty($Id_estado_usuario) || empty($Nombre_estado) || empty($Descripcion_estado)) {
            echo '
            <script>alert("Completa todos los campos para actualizar el Estado del usuario");
            window.location = "../html/VEstadousuario_Admin.php";
            </script>
            ';
            exit;
        } else {
            $this->model->updateEstadousuario($Id_estado_usuario, $Nombre_estado, $Descripcion_estado);
            echo '
            <script>alert("Estado del usuario actualizado correctamente");
            window.location = "../html/VEstadousuario_Admin.php";
            </script>
            ';
        }
    }
}

$EstadousuarioController = new EstadousuarioController();



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getEstadousuario'])) {
        $EstadousuarioController->getEstadousuario();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setEstadousuario'])) {
        $EstadousuarioController->setEstadousuario($_POST['Nombre_estado'], $_POST['Descripcion_estado']);
        exit; 
    }
    if (isset($_POST['deleteEstadousuario'])) {
        $EstadousuarioController->deleteEstadousuario($_POST['Id_estado_usuario']);
        exit;
    }
    if (isset($_POST['updateEstadousuario'])) {
        $EstadousuarioController->updateEstadousuario($_POST['Id_estado_usuario'],$_POST['Nombre_estado'], $_POST['Descripcion_estado']);
        exit;  
    }
}
