<?php
class RolusuarioController
{
    private $model;

    public function __construct()
    {
        require_once "../Models/RolusuarioModel.php";
        $this->model = new RolusuarioModel();
    }

    public function setRolusuario($Nombre_rol)
    {
        if (empty($Nombre_rol)) {
            echo '
            <script>alert("Completa todos los campos para poder registrar el Rol");
            window.location = "../html/VRol1_Admin.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setRolusuario($Nombre_rol);
            echo '
            <script>alert("Rol registrado correctamente");
            window.location = "../html/VRol1_Admin.php";
            </script>
            ';
        }
    }

    public function getRolusuario()
    {
        return $this->model->getRolusuario();
    }

    public function deleteRolusuario($Id_rol)
    {
        if ($Id_rol == null) {
            echo '
            <script>alert("Ingresa el Id de el Rol a eliminar");
            window.location = "../html/VRol_Admin.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteRolusuario($Id_rol);
            echo '
            <script>alert("Rol eliminado correctamente");
            window.location = "../html/VRol_Admin.php";
            </script>
            ';
        }
    }

    public function updateRolusuario($Id_rol , $Nombre_rol  )
    {
        if (empty($Id_rol) || empty($Nombre_rol)) {
            echo '
            <script>alert("Completa todos los campos para actualizar el rol");
            window.location = "../html/VRol_Admin.php";
            </script>
            ';
            exit;
        } else {
            $this->model->updateRolusuario($Id_rol, $Nombre_rol);
            echo '
            <script>alert("rol actualizado correctamente");
            window.location = "../html/VRol_Admin.php";
            </script>
            ';
        }
    }
}

$RolusuarioController = new RolusuarioController();



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getRolusuario'])) {
        $RolusuarioController->getRolusuario();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setRolusuario'])) {
        $RolusuarioController->setRolusuario($_POST['Nombre_rol']);
        exit; 
    }
    if (isset($_POST['deleteRolusuario'])) {
        $RolusuarioController->deleteRolusuario($_POST['Id_rol']);
        exit;
    }
    if (isset($_POST['updateRolusuario'])) {
        $RolusuarioController->updateRolusuario($_POST['Id_rol'],$_POST['Nombre_rol']);
        exit;  
    }
}
