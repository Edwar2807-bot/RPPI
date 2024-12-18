<?php
class PreguntaController
{
    private $model;

    public function __construct()
    {
        require_once "../Models/PreguntaModel.php";
        $this->model = new PreguntaModel();
    }

    public function setPregunta($Contenido_pregunta, $Id_eval_tutor_FK)
    {
        if (empty($Contenido_pregunta) || empty($Id_eval_tutor_FK)) {
            echo '
            <script>alert("Completa todos los campos para poder registrar la Pregunta");
            window.location = "../html/.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setPregunta($Contenido_pregunta, $Id_eval_tutor_FK);
            echo '
            <script>alert("Pregunta registrada correctamente");
            window.location = "../html/.php";
            </script>
            ';
        }
    }

    public function getPregunta()
    {
        return $this->model->getPregunta();
    }

    public function deletePregunta($Id_pregunta)
    {
        if ($Id_pregunta == null) {
            echo '
            <script>alert("Ingresa el Id de la Pregunta a eliminar");
            window.location = "../html/.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deletePregunta($Id_pregunta);
            echo '
            <script>alert("Pregunta eliminada correctamente");
            window.location = "../html/.php";
            </script>
            ';
        }
    }

    public function updatePregunta($Id_pregunta, $Contenido_pregunta, $Id_eval_tutor_FK)
    {
        if (empty($Id_pregunta) || empty($Contenido_pregunta) || empty($Id_eval_tutor_FK)) {
            echo '
            <script>alert("Completa todos los campos para actualizar la Pregunta");
            </script>
            ';
            exit;
        } else {
            $this->model->updatePregunta($Id_pregunta, $Contenido_pregunta, $Id_eval_tutor_FK );
            echo '
            <script>alert("Pregunta actualizada correctamente");
            window.location = "../html/.php";
            </script>
            ';
        }
    }
}

$PreguntaController = new PreguntaController();



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getPregunta'])) {
        $PreguntaController->getPregunta();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setPregunta'])) {
        $PreguntaController->setPregunta($_POST['Contenido_pregunta'], $_POST['Id_eval_tutor_FK']);
        exit; 
    }
    if (isset($_POST['deletePregunta'])) {
        $PreguntaController->deletePregunta($_POST['Id_pregunta']);
        exit;
    }
    if (isset($_POST['updatePregunta'])) {
        $PreguntaController->updatePregunta($_POST['Id_pregunta'],$_POST['Contenido_pregunta'], $_POST['Id_eval_tutor_FK']);
        exit;  
    }
}
