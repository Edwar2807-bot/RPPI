<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Formalizacion pasantias | INVIMA</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Dash1.css">
    <link rel="stylesheet" href="../css/form_pas.css">
</head>

<body>
    <header>
        <div class="bg-primary w-100 d-flex justify-content-between align-items-center" id="div-gov_co">
            <img src="../img/logo_gov.co.png" alt="img gov.co" class="py-2" height="45px">
        </div>
        <br>
        <div class="w-100 d-flex justify-content-around align-items-center py-2">
            <img src="../img/Logo-potencia-de-la-vida 1.png" alt="Logo-potencia-de-la-vida">
            <div class="input-wrapper d-flex align-items-center">
                <img src="/permisoslaborales/resources/img/icons/search.png" alt="">
            </div>
            <img src="../img/Logo_Invima-Te-Acompana_0.png" alt="Logo_Invima-Te-Acompana" class="py-2" height="45px">
        </div>
        <br>
        <div class="w-100 d-flex justify-content-between align-items-center" id="div-menu-header">
            <img src="../img/blanco.png" alt="img gov.co" class="py-2" height="45px">
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
                    <a href="Dash2.php" class="sidebar-link">
                        <i class="lni lni-grid-alt"></i>
                        <span>Panel de control</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VInfo_personal2.php" class="sidebar-link">
                        <i class="lni lni-users"></i>
                        <span>Información personal</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VFormacion2.php" class="sidebar-link">
                        <i class="lni lni-library"></i>
                        <span>Formacion</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VExp_lab2.php" class="sidebar-link">
                        <i class="lni lni-archive"></i>
                        <span>Experiencia laboral</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VDocs2.php" class="sidebar-link">
                        <i class="lni lni-files"></i>
                        <span>Documentos</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="Vcal2.php" class="sidebar-link">
                        <i class="lni lni-calendar"></i>
                        <span>Calendario</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="Vform_pas.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Formalizacion pasantias</span>
                    </a>
                </li>
            </ul>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3"><br>
                <h3>Formalizacion pasantias</h3><br>
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
                    <form action="../Controllers/FormalizacionController.php" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <label class="lb1" for="Certificacion_EPS">Certificado afiliación EPS</label>
                            <label class="lb2" for="Certificacion_ARL">Certificado afiliación ARL</label>
                        </div>
                        <div class="form-row1">
                            <input type="file" class="form-control1" id="Certificacion_EPS" name="Certificacion_EPS" required>
                            <input type="file" class="form-control2" id="Certificacion_ARL" name="Certificacion_ARL" required>
                        </div>
                        <div class="form-row">
                            <label class="lb1" for="Conflicto_intereses">Conflicto de intereses</label>
                            <label class="lb3" for="Acta_confidencialidad">Acta de confidencialidad</label>
                        </div>
                        <div class="form-row1">
                            <a href="../download.php?file=conflicto_intereses.pdf" class="form-control1">Descargar conflicto intereses</a>
                            <a href="../download.php?file=acta_confidencialidad.pdf" class="form-control2">Descargar acta confidencialidad</a>
                        </div>
                        <div class="form-row">
                            <label class="lb1" for="Conflicto_intereses">Conflicto de intereses</label>
                            <label class="lb3" for="Acta_confidencialidad">Acta de confidencialidad</label>
                        </div>
                        <div class="form-row1">
                            <input type="file" class="form-control1" id="Conflicto_intereses" name="Conflicto_intereses" required>
                            <input type="file" class="form-control2" id="Acta_confidencialidad" name="Acta_confidencialidad" required>
                        </div>
                        <button type="submit" name="setFormalizacion" class="btn-reg">Registrarse</button>
                    </form>
                </div>
            </main>
        </div>
    </div><br>
    <footer>
        <div class="d-flex justify-content-between">
            <div>
                <img src="../img/Logo_Invima-Te-Acompana_Blanco.png" alt="Logo_Invima-Te-Acompana_Blanco" class="py-2" height="45px">
                <div>
                    <p>Sede principal: Carrera 10 #64 - 28 Bogotá, Colombia <br>
                        Teléfono conmutador: (+57)(601) 7422121 <br>
                        Contáctenos PQRSD <br>
                        Horario de atención: Lunes a Viernes 7:30 a.m. a 3:30 p.m. <br>
                        Línea anticorrupción: (+57)(601) 7458593 <br>
                        Notificaciones Judiciales: notificaciones_judiciales@invima.gov.co <br>
                        Transparencia Invima: soytransparente@invima.gov.co</p>
                </div>
                <div class="d-flex" id="div-social-media">
                    <a href="https://www.instagram.com/invimacolombia/">
                        <img src="../img/instagram.png" alt="instagram">
                    </a>
                    <a href="https://www.youtube.com/c/InvimaColombiaOficial">
                        <img src="../img/youtube.png" alt="youtube">
                    </a>
                    <a href="https://twitter.com/invimacolombia?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">
                        <img src="../img/twitter.png" alt="twitter">
                    </a>
                    <a href="https://www.facebook.com/InvimaColombia/?locale=es_LA">
                        <img src="../img/facebook.png" alt="facebook">
                    </a>
                </div>
            </div>
            <div>
                <h2>ENLACES DE INTERES</h2>
                <div class="div-links-interest">
                    <img src="/permisoslaborales/resources/img/icons/Arrow - Right 2.png" alt="arrow" class="icon-arrow">
                    <div class="px-2">EL INSTITUTO</div>
                </div>
                <div class="div-links-interest">
                    <img src="/permisoslaborales/resources/img/icons/Arrow - Right 2.png" alt="arrow" class="icon-arrow">
                    <div class="px-2">QUÉ HACEMOS</div>
                </div>
                <div class="div-links-interest">
                    <img src="/permisoslaborales/resources/img/icons/Arrow - Right 2.png" alt="arrow" class="icon-arrow">
                    <div class="px-2">ATENCIÓN AL CIUDADANO</div>
                </div>
                <div class="div-links-interest">
                    <img src="/permisoslaborales/resources/img/icons/Arrow - Right 2.png" alt="arrow" class="icon-arrow">
                    <div class="px-2">TRÁMITES Y SERVICIOS</div>
                </div>
            </div>
            <div>
                <div class="div-links-interest">
                    <img src="/permisoslaborales/resources/img/icons/Arrow - Right 2.png" alt="arrow" class="icon-arrow">
                    <div class="px-2">NORMATIVIDAD</div>
                </div>
                <div class="div-links-interest">
                    <img src="/permisoslaborales/resources/img/icons/Arrow - Right 2.png" alt="arrow" class="icon-arrow">
                    <div class="px-2">PARTICIPA</div>
                </div>
                <div class="div-links-interest">
                    <img src="/permisoslaborales/resources/img/icons/Arrow - Right 2.png" alt="arrow" class="icon-arrow">
                    <div class="px-2">SALA DE PRENSA</div>
                </div>
                <div class="div-links-interest">
                    <img src="/permisoslaborales/resources/img/icons/Arrow - Right 2.png" alt="arrow" class="icon-arrow">
                    <div class="px-2">TRANSPARENCIA</div>
                </div>
            </div>
        </div>
        <hr class="opacity-100">
        <div class="w-100 d-flex justify-content-between">
            <img src="../img/blanco.png" alt="invima-blanco">
            <img src="../img/logo gov-03 1.png" alt="invima-blanco">
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="../Js/Dash1.js"></script>
</body>
</html>
