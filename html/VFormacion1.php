<?php
session_start(); // Esto debe ser lo primero en el archivo
require_once('../PHP/VerificacionAcceso.php');
verificarAcceso();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Formación | INVIMA</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Dash1.css">
    <link rel="stylesheet" href="../css/Formacion1.css">
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
                    <a href="Dash1.php" class="sidebar-link">
                        <i class="lni lni-grid-alt"></i>
                        <span>Panel de control</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VInfo_personal1.php" class="sidebar-link">
                        <i class="lni lni-users"></i>
                        <span>Información personal</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VFormacion.php" class="sidebar-link">
                        <i class="lni lni-library"></i>
                        <span>Formación</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VExp_lab.php" class="sidebar-link">
                        <i class="lni lni-archive"></i>
                        <span>Experiencia laboral</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VDocs.php" class="sidebar-link">
                        <i class="lni lni-files"></i>
                        <span>Documentos</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="Vcal1.php" class="sidebar-link">
                        <i class="lni lni-calendar"></i>
                        <span>Calendario</span>
                    </a>
                </li>
            </ul>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3"><br>
                <h3>Formación</h3><br>
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
                    <form action="../Controllers/FormacionController.php" method="POST">
                        <div class="form-row">
                            <label class="lb1" for="Tipo_educacion">Tipo de educación </label>
                            <label class="lb2" for="Nivel_educacion">Nivel de educación</label>
                        </div>
                        <div class="form-row1">
                            <select id="Tipo_educacion" class="form-control1" name="Tipo_educacion" required>
                                <option value="">Seleccionar Tipo de educación</option>
                                <option value="Educacion formal">Educación formal</option>
                                <option value="Educacion no formal">Educación no formal</option>
                                <option value="Educacion informal">Educación informal</option>
                            </select>
                            <select id="Nivel_educacion" class="form-control2" name="Nivel_educacion" required>
                                <option value="">Seleccionar Nivel educativo</option>
                                <option value="Educación Media">Educación Media</option>
                                <option value="Técnica Profesional">Técnica Profesional</option>
                                <option value="Tecnológica">Tecnológica</option>
                                <option value="Universitaria">Universitaria</option>
                                <option value="Pregrado">Pregrado</option>
                                <option value="Posgrado">Posgrado</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <label class="lb1" for="Institucion">Institución</label>
                            <label class="lb3" for="Programa">Programa</label>
                        </div>
                        <div class="form-row1">
                            <input type="Text" class="form-control1" id="Institucion" name="Institucion" placeholder="Ingrese el nombre de la Institución"   required>
                            <input type="Text" class="form-control2" id="Programa" name="Programa" placeholder="Ingrese el nombre del programa"  required>
                        </div>
                        <div class="form-row">
                            <label class="lb1" for="Programa">Fecha de terminación programa académico</label>
                        </div>
                        <div class="form-row1">
                            <input type="date" class="form-control1" id="Fec_terminacion" name="Fec_terminacion"  required>
                        </div>
                        <a href="VFormacion.php" type="submit" class="btn-can">Cancelar</a>
                        <button type="submit" name="setFormacion" class="btn-reg">Registrar</button>
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
</body>
</html>
