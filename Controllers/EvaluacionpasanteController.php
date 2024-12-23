<?php
class EvaluacionpasanteController
{
    private $model;

    public function __construct()
    {
        require_once "../Models/EvaluacionpasanteModel.php";
        $this->model = new EvaluacionpasanteModel();
    }

    public function setEvaluacionpasante($Proyecto_eval_pasante, $Horario_eval_pasante, $Reglamento_eval_pasante, $Concepto_eval_pasante, $Id_usuario_evalp_fk, $Nombre, $Apellido, $Cedula, $Id_Pasantia )
    {
        if (empty($Proyecto_eval_pasante) || empty($Horario_eval_pasante) || empty($Reglamento_eval_pasante) || empty($Concepto_eval_pasante) || empty($Id_usuario_evalp_fk ) || empty($Nombre) || empty($Apellido) || empty($Cedula ) || empty($Id_Pasantia )){
            echo '
            <script>alert("Completa todos los campos para poder registrar la Evaluacion del pasante");
            window.location = "../html/VEval_pas.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setEvaluacionpasante($Proyecto_eval_pasante, $Horario_eval_pasante, $Reglamento_eval_pasante, $Concepto_eval_pasante, $Id_usuario_evalp_fk, $Nombre, $Apellido, $Cedula, $Id_Pasantia );
            echo '
            <script>alert("Evaluacion del pasante registrada correctamente");
            window.location = "../html/VEval_pas_tabla.php";
            </script>
            ';
        }
    }

    public function getEvaluacionpasante()
    {
        return $this->model->getEvaluacionpasante();
    }

    public function deleteEvaluacionpasante($Id_evaluacion_pasante)
    {
        if ($Id_evaluacion_pasante == null) {
            echo '
            <script>alert("Ingresa el Id de la evaluacion del pasante eliminar");
            window.location = "../html/VEval_pas_tabla.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteEvaluacionpasante($Id_evaluacion_pasante);
            echo '
            <script>alert("Evaluacion del pasante eliminada correctamente");
            window.location = "../html/VEval_pas_tabla.php";
            </script>
            ';
        }
    }

    public function updateEvaluacionpasante($Id_evaluacion_pasante, $Proyecto_eval_pasante, $Horario_eval_pasante, $Reglamento_eval_pasante, $Concepto_eval_pasante, $Id_usuario_evalp_fk,$Nombre, $Apellido, $Cedula, $Id_Pasantia )
    {
        if (empty($Id_evaluacion_pasante) || empty($Proyecto_eval_pasante) || empty($Horario_eval_pasante) || empty($Reglamento_eval_pasante) || empty($Concepto_eval_pasante) || empty($Id_usuario_evalp_fk )) {
            echo '
            <script>alert("Completa todos los campos para actualizar la evaluacion del pasante");
            </script>
            ';
            exit;
        } else {
            $this->model->updateEvaluacionpasante($Id_evaluacion_pasante, $Proyecto_eval_pasante, $Horario_eval_pasante, $Reglamento_eval_pasante, $Concepto_eval_pasante, $Id_usuario_evalp_fk, $Nombre, $Apellido, $Cedula, $Id_Pasantia );
            echo '
            <script>alert("Evaluacion del pasante actualizada correctamente");
            window.location = "../html/VEval_pas_tabla.php";
            </script>
            ';
        }
    }
}

$EvaluacionpasanteController = new EvaluacionpasanteController();



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getEvaluacionpasante'])) {
        $EvaluacionpasanteController->getEvaluacionpasante();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['setEvaluacionpasante'])) {
        $EvaluacionpasanteController->setEvaluacionpasante($_POST['Proyecto_eval_pasante'], $_POST['Horario_eval_pasante'], $_POST['Reglamento_eval_pasante'], $_POST['Concepto_eval_pasante'], $_POST['Id_usuario_evalp_fk']=1,$_POST['Nombre'],$_POST['Apellido'],$_POST['Cedula'],$_POST['Id_Pasantia'] );
        exit; 
    }
    if (isset($_POST['deleteEvaluacionpasante'])) {
        $EvaluacionpasanteController->deleteEvaluacionpasante($_POST['Id_evaluacion_pasante']);
        exit;
    }
    if (isset($_POST['updateEvaluacionpasante'])) {
        $EvaluacionpasanteController->updateEvaluacionpasante($_POST['Id_evaluacion_pasante'],$_POST['Proyecto_eval_pasante'], $_POST['Horario_eval_pasante'], $_POST['Reglamento_eval_pasante'], $_POST['Concepto_eval_pasante'] ,$_POST['Id_usuario_evalp_fk']=1,$_POST['Nombre'],$_POST['Apellido'],$_POST['Cedula'],$_POST['Id_Pasantia']);
        exit;                                                                                                                                                             
    }
}
