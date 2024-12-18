<?php
session_start();

// Desactivar la caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['Correo'])) {
    header("Location: ../login.html"); // Redirigir si no está autenticado
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Panel de Control | INVIMA</title>
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Dash1.css">
    <link rel="stylesheet" href="../css/rest_cont.css">
</head>
    <body>
        <header>
            <div class="bg-primary w-100 d-flex justify-content-start align-items-center" id="div-gov_co">
                <img src="../img/logo_govco (1).png" alt="img gov.co" class="py-2" height="45px">
            </div>
            <div class="w-100 d-flex flex-column justify-content-center align-items-start py-2" id="logo-container">
                <img src="../img/Recurso 2@4x.png" alt="Logo- Invima" id="logo-invima-header">
                <div class="input-wrapper d-flex align-items-center"></div>            
            </div>
        </header>
        <div class="wrapper">
            <aside id="sidebar">
                <div class="d-flex">
                    <button class="toggle-btn" type="button">
                        <i class="lni lni-menu"></i>
                    </button>
                    <div class="sidebar-logo">
                        <img src="../img/color.png" alt="img color">
                    </div>
                </div><br>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="Dash_Admin.php" class="sidebar-link">
                            <i class="lni lni-grid-alt"></i>
                            <span>Panel de control</span>
                        </a>
                    </li><br>
                        <li class="sidebar-item">
                            <a href="VInfo_personal_Admin.php" class="sidebar-link">
                                <i class="lni lni-users"></i>
                                <span>Información personal</span>
                            </a>
                        </li><br>
                        <li class="sidebar-item">
                            <a href="VFormacion_Admin.php" class="sidebar-link">
                                <i class="lni lni-library"></i>
                                <span>Formación</span>
                            </a>
                        </li><br>
                        <li class="sidebar-item">
                            <a href="VExp_lab_Admin.php" class="sidebar-link">
                                <i class="lni lni-archive"></i>
                                <span>Experiencia laboral</span>
                            </a>
                        </li><br>
                        <li class="sidebar-item">
                            <a href="VDocs_Admin.php" class="sidebar-link">
                                <i class="lni lni-files"></i>
                                <span>Documentos</span>
                            </a>
                        </li><br>
                        <li class="sidebar-item">
                            <a href="VUsuario_Admin.php" class="sidebar-link">
                                <i class="lni lni-user"></i>
                                <span>Usuario</span>
                            </a>
                        </li><br>
                        <li class="sidebar-item">
                            <a href="Vcal_Admin.php" class="sidebar-link">
                                <i class="lni lni-calendar"></i>
                                <span>Calendario</span>
                            </a>
                        </li><br>
                    </ul>
                </aside>
            <div class="main">
                <nav class="navbar navbar-expand px-4 py-3">
                    <form action="#" class="d-none d-sm-inline-block"></form>
                    <div class="navbar-collapse collapse">
                        <ul class="navbar-nav ms-auto">
                            <li>
                                <a href="../PHP/logout.php" class="sidebar-link"> <!-- Cambiado aquí -->
                                    <i class="lni lni-exit"></i>
                                    <span>Cerrar sesión</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main id="main-content" class="content">
                    <div class="container-fluid">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-12 col-md-3 ">
                                    <div class="card border-2">
                                        <div class="card-body py-4">
                                            <a href="VInfo_personal_Admin.php" class="div text-decoration-none">
                                                <h5 class="mb-2 fw-bold d-flex align-items-center">
                                                    Inf personal
                                                    <i class="lni lni-users"></i>
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="card border-2">
                                        <div class="card-body py-4">
                                            <a href="VFormacion_Admin.php" class="div text-decoration-none">
                                                <h5 class="fw-bold d-flex align-items-center">
                                                    Formación
                                                    <i class="lni lni-library"></i>
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="card border-2">
                                        <div class="card-body py-4">
                                            <a href="VExp_lab_Admin.php" class="div text-decoration-none">
                                                <h5 class="fw-bold d-flex align-items-center">
                                                    Exp laboral
                                                    <i class="lni lni-archive"></i>
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="card border-2">
                                        <div class="card-body py-4">
                                            <a href="VDocs_Admin.php" class="div text-decoration-none">
                                                <h5 class="fw-bold d-flex align-items-center">
                                                    Documentos
                                                    <i class="lni lni-files"></i>
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-12 col-md-3 ">
                                    <div class="card border-2">
                                        <div class="card-body py-4">
                                            <a href="VUsuario_Admin.php" class="div text-decoration-none">
                                                <h5 class="fw-bold d-flex align-items-center">
                                                    Usuario 
                                                    <i class="lni lni-user"></i>
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="card border-2">
                                        <div class="card-body py-4">
                                            <a href="VRol_Admin.php" class="div text-decoration-none">
                                                <h5 class="fw-bold d-flex align-items-center">
                                                    Rol
                                                    <i class="lni lni-star"></i>
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="card border-2">
                                        <div class="card-body py-4">
                                            <a href="VEstadousuario_Admin.php" class="div text-decoration-none">
                                                <h5 class="fw-bold d-flex align-items-center">
                                                    Estado del usuario
                                                    <i class="lni lni-checkmark-circle"></i>
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="card border-2">
                                        <div class="card-body py-4">
                                            <a href="VEstadoproce_Admin.php" class="div text-decoration-none">
                                                <h5 class="fw-bold d-flex align-items-center">
                                                    Estado del proceso 
                                                    <i class="lni lni-spinner"></i>
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-12 col-md-3 ">
                                    <div class="card border-2">
                                        <div class="card-body py-4">
                                            <a href="VPost_pas_Admin.php" class="div text-decoration-none">
                                                <h5 class="fw-bold d-flex align-items-center">
                                                    Postulación Pas 
                                                    <i class="lni lni-book"></i>
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="card border-2">
                                        <div class="card-body py-4">
                                            <a href="VEval_tut_tabla_Admin.php" class="div text-decoration-none">
                                                <h5 class="fw-bold d-flex align-items-center">
                                                    Eval Tutor
                                                    <i class="lni lni-notepad"></i>
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="card border-2">
                                        <div class="card-body py-4">
                                            <a href="VEval_pas_tabla_Admin.php" class="div text-decoration-none">
                                                <h5 class="fw-bold d-flex align-items-center">
                                                    Eval Pasante
                                                    <i class="lni lni-notepad"></i>
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="card border-2">
                                        <div class="card-body py-4">
                                            <a href="Vpro_pas_Admin.php" class="div text-decoration-none">
                                                <h5 class="fw-bold d-flex align-items-center">
                                                    Proyecto Pas 
                                                    <i class="lni lni-pencil-alt"></i>
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-12 col-md-3 ">
                                    <div class="card border-2">
                                        <div class="card-body py-4">
                                            <a href="VSolicitud_Admin.php" class="div text-decoration-none">
                                                <h5 class="fw-bold d-flex align-items-center">
                                                    Solicitud
                                                    <i class="lni lni-graduation"></i>
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    <footer>
        <div class="container container-footer mb-5 px-4 py-5" id="principal-section-footer">
            <div class="region region-footer">
                <div class="d-block">
                    <div id="block-invima-theme-logofooter-2" class="col-12 block-footer-section-logo col-md-3">
                        <div class="">
                            <img loading="lazy" src="../img/invima.png" width="134" alt="Logo Invima" class="mb-25">
                        </div>
                    </div>
                    <div class="block-footer-section-info col-12 col-md-5">
                        <div class="clearfix text-formatted field field--name-body field--type-text-with-summary field--label-hidden field__item">
                            <p><strong>Sede principal:</strong> Carrera 10 #64 - 28 Bogotá, Colombia</p>
                            <p><strong>Teléfono conmutador:</strong> (+57)(601) 242 50 00</p>
                            <p><strong>Horario de atención:</strong> Lunes a Viernes 7:30 a.m. a 3:30 p.m.</p>
                            <p><strong>Notificaciones Judiciales: </strong><a href="mailto:notificaciones_judiciales@invima.gov.co">notificaciones_judiciales@invima.gov.co</a></p>
                            <p><strong>Transparencia Invima: </strong><a href="mailto:soytransparente@invima.gov.co">soytransparente@invima.gov.co</a></p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="">
                            <img loading="lazy" src="../img/logo gov-co.png" width="173" alt="logo gov co footer" class="fluid-logo-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JAYM53QgBwlw6LT+lg6LMgAVW1mfyBzHQ8oJXU0lk/2wo2PPM4LTiBSJH5MP9MEd"
        crossorigin="anonymous"></script>
    <script src="../js/Dash1.js"></script>
</body>

</html>
