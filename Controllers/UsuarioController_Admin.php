<?php
Class UsuarioController
{
    private $model;

    public function __construct()
    {
        require_once "../Models/UsuarioModel.php";
        $this->model = new UsuarioModel();
    }

    public function setUsuario($Correo, $Num_documento, $Tipo_documento, $Pass, $Id_rol_fk, $Id_estado_usuario_fk)
    {
        if (empty($Correo) || empty($Num_documento) || empty($Tipo_documento) || empty($Pass) || empty($Id_rol_fk) || empty($Id_estado_usuario_fk)){
            echo'
            <script>alert("Completa todos los campos para poder registrar el usuario");
            window.location = "../html/VUsuario_Admin.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setUsuario($Correo, $Num_documento, $Tipo_documento, $Pass, $Id_rol_fk, $Id_estado_usuario_fk);
            echo'
            <script>alert("Usuario registrado exitosamente");
            window.location = "../html/VUsuario_Admin.php";
            </script>
            ';
        }
    }

    public function getUsuario()
    {
        return $this->model->getUsuario();
    }

    public function deleteUsuario($Id_usuario)
    {
        if($Id_usuario == null){
            echo '
            <script>alert("Ingresa el Id del usuario eliminar");
            window.location = "../html/VUsuario_Admin.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteUsuario($Id_usuario);
            echo '
            <script>alert("Usuario eliminado exitosamente");
            window.location = "../html/VUsuario_Admin.php";
            </script>
            ';
            exit;
        }
    }

    public function updateUsuario($Id_usuario, $Correo, $Num_documento, $Tipo_documento, $Pass, $Id_rol_fk, $Id_estado_usuario_fk)
    {
        // Verificar si algún campo está vacío
        if (empty($Id_usuario) || empty($Correo) || empty($Num_documento) || empty($Tipo_documento) || empty($Pass) || empty($Id_rol_fk) || empty($Id_estado_usuario_fk)) {
            // Mostrar alerta si faltan campos
            echo '
            <script>
                alert("Completa todos los campos para poder actualizar el usuario");
                window.location.href = "../html/VUsuario_Admin.php";  
            </script>
            ';
            exit;
        } else {
            // Llamar al modelo para actualizar el usuario
            $this->model->updateUsuario($Id_usuario, $Correo, $Num_documento, $Tipo_documento, $Pass, $Id_rol_fk, $Id_estado_usuario_fk);
    
            // Mostrar mensaje de éxito y redireccionar
            echo '
            <script>
                alert("Usuario actualizado exitosamente");
                window.location.href = "../html/VUsuario_Admin.php";  
            </script>
            ';
        }
    }
    
}

$UsuarioController = new UsuarioController();

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getUsuario'])){
        $UsuarioController->getUsuario();
        exit;
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['setUsuario'])){
        $UsuarioController->setUsuario( $_POST['Correo'], $_POST['Num_documento'], $_POST['Tipo_documento'], $_POST['Pass'], $_POST['Id_rol_fk'], $_POST['Id_estado_usuario_fk']);
        exit;
    }
    if(isset($_POST['deleteUsuario'])){
        $UsuarioController->deleteUsuario($_POST['Id_usuario']);
        exit;
    }
    if(isset($_POST['updateUsuario'])){
        $UsuarioController->updateUsuario($_POST['Id_usuario'], $_POST['Correo'], $_POST['Num_documento'], $_POST['Tipo_documento'], $_POST['Pass'], $_POST['Id_rol_fk'], $_POST['Id_estado_usuario_fk']);
        exit;
    }
}






