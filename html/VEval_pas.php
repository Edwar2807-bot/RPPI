<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Evaluacion pasantias | INVIMA</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Dash1.css">
    <link rel="stylesheet" href="../css/eval_pas.css">
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
                    <a href="Dash_tutor.php" class="sidebar-link">
                        <i class="lni lni-grid-alt"></i>
                        <span>Panel de control</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VInfo_personal_tutor.php" class="sidebar-link">
                        <i class="lni lni-users"></i>
                        <span>Información personal</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VFormacion_tutor.php" class="sidebar-link">
                        <i class="lni lni-library"></i>
                        <span>Formacion</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VExp_lab_tutor.php" class="sidebar-link">
                        <i class="lni lni-archive"></i>
                        <span>Experiencia laboral</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VDocs_tutor.php" class="sidebar-link">
                        <i class="lni lni-files"></i>
                        <span>Documentos</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="Vcal_tutor.php" class="sidebar-link">
                        <i class="lni lni-calendar"></i>
                        <span>Calendario</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="Vsoli_cred.php" class="sidebar-link">
                        <i class="lni lni-postcard"></i>
                        <span>Solicitud Credenciales</span>
                    </a>
                </li>
            </ul>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3"><br>
                <h3>Evaluacion Pasante</h3><br>
                    <div class="navbar-collapse collapse">
                        <ul class="navbar-nav ms-auto">
                            <li>
                                <a href="../PHP/logout.php" class="sidebar-link"> <!-- Cambiado aquí -->
                                    <i class="lni lni-exit"></i>
                                    <span>Cerrar Sesion</span>
                                </a>
                            </li>
                        </ul>
                    </div>
            </nav><br><br>
        <main id="main-content" class="content">
            <div class="form-login">
                <form action="../Controllers/EvaluacionpasanteController.php" method="POST">
                    <div class="form-row">
                        <label class="lb1" for="pr1">¿Cumplió con los horarios?</label>
                        <label class="lb2" for="pr2">¿Cumplió con el proyecto?</label>
                    </div>
                    <div class="form-row1">
                        <select id="Eactual1" class="form-control1" name="Horario_eval_pasante" required>
                            <option value="">Si/No</option>
                            <option value="SI">Si</option>
                            <option value="NO">No</option>
                        </select>
                        <select id="Eactual2" class="form-control2" name="Proyecto_eval_pasante" required>
                            <option value="">Si/No</option>
                            <option value="SI">Si</option>
                            <option value="NO">No</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label class="lb1" for="pr3">¿Cumplió con el reglamento?</label>
                        <label class="lb4" for="pr4">Concepto de validación sobre el pasante</label>
                    </div>
                    <div class="form-row1">
                        <select id="Eactual3" class="form-control1" name="Reglamento_eval_pasante" required>
                            <option value="0">Si/No</option>
                            <option value="SI">Si</option>
                            <option value="NO">No</option>
                        </select>
                        <input type="text" class="form-control2" id="pr4" name="Concepto_eval_pasante" placeholder="Digite su concepto" required>
                    </div> 
                    <!-- Input oculto para el ID del pasante -->
                    <input type="hidden" name="Correo_evalp_fk" value="ejemplo@correo.com"> <!-- Cambia este valor dinámicamente -->
                    <!-- Botón para enviar el formulario -->
                    <button type="submit" class="btn-reg" name="setEvaluacionpasante">Evaluar Pasantias</button><br>
                </form>
                <button type="button" class="btn-reg2" data-bs-toggle="modal" data-bs-target="#llamadoModal">
                    Agregar Llamado de atención
                </button>
                <!-- Modal -->
                <div class="modal fade" id="llamadoModal" tabindex="-1" aria-labelledby="llamadoModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="llamadoModalLabel">Nuevo Llamado de atención</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="llamadoForm" method="POST" action="../Controllers/LlamadoatencionController.php">
                                        <div class="mb-3">
                                        <label for="Descripcion_llamado_atencion" class="form-label">Descripción del Llamado de atención</label>
                                        <input type="text" class="form-control" id="Descripcion_llamado_atencion" name="Descripcion_llamado_atencion" placeholder="Escribe aquí..." required>
                                        </div>
                                        <input type="hidden" name="setLlamadoatencion" value="true">
                                        <button type="submit" class="btn btn-primary" name="setLlamadoatencion">Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div><br>   
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
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="../Js/Dash1.js"></script>
    <script src="../Js/eval_pas.js"></script>
</body>
</html>
