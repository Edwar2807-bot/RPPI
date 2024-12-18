<?php
class EvaluaciontutorController
{
    private $model;

    public function __construct()
    {
        require_once "../Models/EvaluaciontutorModel.php";
        $this->model = new EvaluaciontutorModel();
    }

    public function setEvaluaciontutor($Respuesta1,$Respuesta2,$Respuesta3,$Respuesta4,$Respuesta5 , $Id_usuario_evalt_fk =1 )
    {
        if (empty($Respuesta1) || empty($Respuesta2) ||empty($Respuesta3) ||empty($Respuesta4) ||empty($Respuesta5) || empty($Id_usuario_evalt_fk )) {
            echo '
            <script>alert("Completa todos los campos para poder registrar la evaluacion del tutor");
            window.location = "../html/VEval_tut_tabla.php";
            </script>
            ';
            exit;
        } else {
            $this->model->setEvaluaciontutor($Respuesta1, $Respuesta2, $Respuesta3,$Respuesta4,$Respuesta5, $Id_usuario_evalt_fk );
            echo '
            <script>alert("Evaluacion de tutor registrada correctamente");
            window.location = "../html/VEval_tut_tabla.php";
            </script>
            ';
        }
    }

    public function getEvaluaciontutor()
    {
        return $this->model->getEvaluaciontutor();
    }

    public function deleteEvaluaciontutor($Id_evaluacion_tutor)
    {
        if ($Id_evaluacion_tutor == null) {
            echo '
            <script>alert("Ingresa el Id de la evaluacion de tutor a eliminar");
            window.location = "../html/VEval_tut_tabla.php";
            </script>
            ';
            exit;
        } else {
            $this->model->deleteEvaluaciontutor($Id_evaluacion_tutor);
            echo '
            <script>alert("evaluacion de tutor eliminada correctamente");
            window.location = "../html/VEval_tut_tabla.php";
            </script>
            ';
        }
    }

    public function updateEvaluaciontutor($Id_evaluacion_tutor, $Respuesta1, $Respuesta2, $Respuesta3, $Respuesta4, $Respuesta5, $Id_usuario_evalt_fk   )
    {
        if (empty($Id_evaluacion_tutor)||empty($Respuesta1) || empty($Respuesta2) ||empty($Respuesta3) ||empty($Respuesta4) ||empty($Respuesta5) || empty($Id_usuario_evalt_fk )) {
            echo '
            <script>alert("Completa todos los campos para actualizar la evaluacion del tutor");
            window.location ="../html/VEval_tut_tabla.php";
            </script>
            ';
            exit;
        } else {
            $this->model->updateEvaluaciontutor($Id_evaluacion_tutor, $Respuesta1, $Respuesta2, $Respuesta3,$Respuesta4,$Respuesta5, $Id_usuario_evalt_fk );
            echo '
            <script>alert("evaluacion del tutor actualizada correctamente");
            window.location ="../html/VEval_tut_tabla.php";
            </script>
            ';
        }
    }
}

$EvaluaciontutorController = new EvaluaciontutorController();


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['getEvaluaciontutor'])) {
        $EvaluaciontutorController->getEvaluaciontutor();
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Asigna el valor por defecto para la llave foránea
    $defaultIdUsuario = 1; // Aquí puedes poner el valor por defecto o obtenerlo de una sesión, como $_SESSION['user_id']

    if (isset($_POST['setEvaluaciontutor'])) {
        // No tomamos 'Id_usuario_evalt_fk' desde el formulario, sino que usamos el valor por defecto
        $EvaluaciontutorController->setEvaluaciontutor(
            $_POST['Respuesta1'],
            $_POST['Respuesta2'],
            $_POST['Respuesta3'],
            $_POST['Respuesta4'],
            $_POST['Respuesta5'],
            $defaultIdUsuario // Usamos el valor predeterminado aquí
        );
        exit;
    }

    if (isset($_POST['deleteEvaluaciontutor'])) {
        $EvaluaciontutorController->deleteEvaluaciontutor($_POST['Id_evaluacion_tutor']);
        exit;
    }

    if (isset($_POST['updateEvaluaciontutor'])) {
        // Nuevamente usamos el valor por defecto para la llave foránea en la actualización
        $EvaluaciontutorController->updateEvaluaciontutor(
            $_POST['Id_evaluacion_tutor'],
            $_POST['Respuesta1'],
            $_POST['Respuesta2'],
            $_POST['Respuesta3'],
            $_POST['Respuesta4'],
            $_POST['Respuesta5'],
            $defaultIdUsuario // Valor predeterminado para la actualización
        );
        exit;
    }

    
// Consulta para obtener los datos de la tabla EvaluacionTutor
$sql = "SELECT * FROM evaluaciontutor";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Obtener todos los resultados en un array asociativo
$evaluaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);


}
