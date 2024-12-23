<!DOCTYPE html>
<html lang="es">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Proyecto pasantías | INVIMA</title>
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
            <nav class="navbar navbar-expand px-4 py-2"><br>
                <h3>Proyecto pasantías</h3><br>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                    <li>
                        <a href="../PHP/logout.php" class="sidebar-link"> <!-- Cambiado aquí -->
                            <i class="lni lni-exit"></i>
                            <span>Cerrar Sesión</span>
                        </a>
                    </li>
                    </ul>
                </div>
            </nav><br><br>
 
            <main id="main-content" class="content">
                <div class="form-login">
                    <form action="../Controllers/ProyectoController_Admin.php" method="post" enctype="multipart/form-data"  enctype="multipart/form-data>
                            <div class="form-row">
                                <label class="lb1" for="Nombre_proy">Nombre del proyecto</label>
                                <label class="lb2" for="Descripcion_proy">Descripción del proyecto</label>
                            </div>
                            <div class="form-row1">
                                <input type="text" class="form-control1" id="Nombre_proy" name="Nombre_proy" placeholder="Ingrese el nombre" required>
                                <input type="text" class="form-control2" id="Descripcion_proy" name="Descripcion_proy" placeholder="Ingrese la descripción" required>
                            </div>
                            <div class="form-row">
                                <label class="lb1" for="Acept_tutor">¿Aceptación tutor?</label>
                                <label class="lb2" for="Documento_proy">Documento proyecto</label>
                            </div>
                            <div class="form-row1">
                                <select id="Acept_tutor" class="form-control1" name="Acept_tutor" required>
                                    <option value="">Seleccionar</option>
                                    <option value="Si">Sí</option>
                                    <option value="No">No</option>
                                </select>
                                <input type="file" class="form-control2" id="Documento_proy" name="Documento_proy" required>
                            </div>
                            <button type="submit" name="setProyecto" class="btn-reg">Guardar Proyecto</button>
                    </form> 
                    </form>
                        <button type="button" class="btn-reg2" data-bs-toggle="modal" data-bs-target="#llamadoModal">
                            Agregar Actividad
                        </button>                       
                    </form>
                    <!-- Modal -->
                    <div class="modal fade" id="llamadoModal" tabindex="-1" aria-labelledby="llamadoModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="llamadoModalLabel">Nueva actividad</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form id="llamadoForm" method="POST" action="../Controllers/ActividadController_Admin.php">
                                        <div class="mb-3">
                                        <label for="Descripcion_actividad" class="form-label">Descripción de la actividad</label>
                                        <input type="text" class="form-control" id="Descripcion_actividad" name="Descripcion_actividad" placeholder="Escribe aquí..." required>
                                        </div>
                                        <div class="mb-3">
                                        <label for="Fecha_actividad" class="form-label">Fecha de la actividad</label>
                                        <input type="date" class="form-control" id="Fecha_actividad" name="Fecha_actividad" placeholder="Escribe aquí..." required>
                                        </div>
                                        <input type="hidden" name="setActividad" value="true">
                                        <button type="submit" class="btn btn-primary" name="setActividad">Guardar</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </main> 
                    </form>
                </div>
            </main>
        </div>
    </div><br>  
    <br><br><br>    
    <footer>
        <br> 
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