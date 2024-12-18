<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Información Personal | INVIMA</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Dash1.css">
    <link rel="stylesheet" href="../css/inf_pers.css">
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
                        <span>Formación</span>
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
                <h3>Información Personal</h3><br>
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
                <form action="../Controllers/InformacionPersonalController_tutor.php" method="post" enctype="multipart/form-data">
            <!-- Tipo de identificación y número de documento -->
            <div class="form-row">
                <label class="lb1" for="Tipo_identificacion">Tipo de documento</label>
                <label class="lb2" for="Num_documento">Número de identificación</label>
            </div>
            <div class="form-row1">
                <select id="Tipo_identificacion" class="form-control1" name="Tipo_identificacion" required>
                    <option value="">Seleccionar Tipo de documento</option>
                    <option value="Cedula de ciudadania">Cédula de ciudadanía</option>
                    <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                    <option value="Cedula de extranjeria">Cédula de extranjería</option>
                </select>
                <input type="number" class="form-control2" id="Num_documento" name="Num_documento" placeholder="Digite el número de documento" required>
            </div>

            <!-- Nombre, Apellido -->
            <div class="form-row">
                <label class="lb1" for="Nombre">Nombre</label>
                <label class="lb2" for="Apellido">Apellido</label>
            </div>
            <div class="form-row1">
                <input type="text" class="form-control1" id="Nombre" name="Nombre" placeholder="Digite el nombre" required>
                <input type="text" class="form-control2" id="Apellido" name="Apellido" placeholder="Digite el apellido" required>
            </div>

            <!-- Fecha de nacimiento, Teléfono -->
            <div class="form-row">
                <label class="lb1" for="Fec_nacimiento">Fecha de nacimiento</label>
                <label class="lb2" for="Telefono">Teléfono</label>
            </div>
            <div class="form-row1">
                <input type="date" class="form-control1" id="Fec_nacimiento" name="Fec_nacimiento" required>
                <input type="number" class="form-control2" id="Telefono" name="Telefono" placeholder="Digite el teléfono" required>
            </div>

            <!-- Correo, Dirección -->
            <div class="form-row">
                <label class="lb1" for="Correo">Correo</label>
                <label class="lb2" for="Direccion">Dirección</label>
            </div>
            <div class="form-row1">
                <input type="email" class="form-control1" id="Correo" name="Correo" placeholder="Digite el correo" required>
                <input type="text" class="form-control2" id="Direccion" name="Direccion" placeholder="Digite la dirección" required>
            </div>

            <!-- Fecha de expedición, Ciudad -->
            <div class="form-row">
                <label class="lb1" for="Fec_expedicion">Fecha de expedición</label>
                <label class="lb2" for="Ciudad">Ciudad</label>
            </div>
            <div class="form-row1">
                <input type="date" class="form-control1" id="Fec_expedicion" name="Fec_expedicion" required>
                <input type="text" class="form-control2" id="Ciudad" name="Ciudad" placeholder="Digite la ciudad" required>
            </div>

            <!-- Estrato, Género -->
            <div class="form-row">
                <label class="lb1" for="Estrato">Estrato</label>
                <label class="lb2" for="Genero">Género</label>
            </div>
            <div class="form-row1">
                <select id="Estrato" class="form-control1" name="Estrato" required>
                    <option value="">Seleccionar Estrato</option>
                    <option value="1">Estrato 1</option>
                    <option value="2">Estrato 2</option>
                    <option value="3">Estrato 3</option>
                    <option value="4">Estrato 4</option>
                    <option value="5">Estrato 5</option>
                    <option value="6">Estrato 6</option>
                </select>
                <select id="Genero" class="form-control2" name="Genero" required>
                    <option value="">Seleccionar Género</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            <!-- Nivel Educativo -->
            <div class="form-row">
                <label class="lb1" for="Nivel_educativo">Nivel Educativo</label>
            </div>
            <div class="form-row1">
                <select id="Nivel_educativo" class="form-control1" name="Nivel_educativo" required>
                    <option value="">Seleccionar Nivel Educativo</option>
                    <option value="Primaria">Primaria</option>
                    <option value="Secundaria">Secundaria</option>
                    <option value="Técnico">Técnico</option>
                    <option value="Tecnológico">Tecnológico</option>
                    <option value="Profesional">Profesional</option>
                    <option value="Maestría">Maestría</option>
                    <option value="Doctorado">Doctorado</option>
                </select>
            </div>

            <!-- Foto de perfil -->
            <div class="upload-box">
                <label for="Foto">Seleccionar foto de perfil</label>
                <input type="file" id="Foto" name="Foto" accept="image/*" onchange="previewImage(event)" required>
                <div class="preview">
                    <img id="preview-img" src="#" alt="Vista previa de la imagen" style="display: none; max-width: 100%;">
                </div>
                <div class="photo-characteristics">
                    <h3>Características de la foto:</h3>
                    <ul>
                        <li>Tamaño máximo: 2MB</li>
                        <li>Formato: JPG o PNG</li>
                    </ul>
                </div>
            </div>
            <script>
                function previewImage(event) {
                    var reader = new FileReader();
                    reader.onload = function(){
                        var output = document.getElementById('preview-img');
                        output.style.display = 'block';
                        output.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                };
            </script>

            <button type="submit" name="setInformacionPersonal" class="btn-reg">Registrarse</button>
        </form>
                </div>
            </main>
        </div>
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
</body>
</html>
