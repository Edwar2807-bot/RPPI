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
    <link rel="stylesheet" href="../css/Formacion.css">
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
                <!-- Buscador y Filtro -->
                <div class="d-flex justify-content-between mb-3">
                    <div class="input-group">
                        <span class="input-group-text" id="search-addon"><i class="lni lni-search"></i></span>
                        <input type="text" class="form-control" id="searchInput" placeholder="Buscar..." aria-label="Buscar" aria-describedby="search-addon">
                    </div>

                    <button class="btn btn-primary" onclick="location.href='VFormacion1.php'">Agregar Nueva Formación</button>
                </div>
                <!-- Tabla -->
                <div style="max-height: 1000px; overflow-y: auto;">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Tipo de educación</th>
                            <th>Nivel de educación</th>
                            <th>Institucion</th>
                            <th>Programa</th>
                            <th>Fecha de terminación</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    <?php
                        try {
                            // Conexión con PDO a SQL Server
                            require_once(__DIR__ . '/../Config/db.php');
                            $pdo = new db();
                            $co = $pdo->conexion();
                            $usuario_id = $_SESSION['Usuario_id'];
                            
                            // Consulta a la base de datos
                            // Consulta a la base de datos
                            $sql = "SELECT * FROM RPPI.Formacion Where Id_Usuario = :Id_Usuario";
                            $stmt = $co->prepare($sql);
                            $stmt->bindParam(':Id_Usuario', $usuario_id, PDO::PARAM_INT);
                            $stmt->execute();

                            // Recorriendo los resultados
                            while($mostrar = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td><?php echo $mostrar ['Id_formacion'] ?></td>
                            <td><?php echo $mostrar ['Tipo_educacion'] ?></td>
                            <td><?php echo $mostrar ['Nivel_educacion'] ?></td>
                            <td><?php echo $mostrar ['Institucion'] ?></td>
                            <td><?php echo $mostrar ['Programa'] ?></td>
                            <td><?php echo $mostrar ['Fec_terminacion'] ?></td>
                        <!-- Botón Actualizar -->
                        <td>
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $mostrar['Id_formacion']; ?>">Actualizar</button>
                        </td>
                        </form>
                        </tr>
                        <!-- Modal para Actualizar -->
                        <div class="modal fade" id="updateModal<?php echo $mostrar['Id_formacion']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Actualizar Evaluación Tutor</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">                                        
                                        <form action="../Controllers/FormacionController.php" method="POST">
                                            <input type="hidden" name="Id_formacion" value="<?php echo $mostrar['Id_formacion']; ?>">
                                            <div class="mb-3">
                                                <label for="Respuesta1" class="form-label">Tipo de educación</label>
                                                <select id="Tipo_educacion" class="form-control" name="Tipo_educacion" value="<?php echo $mostrar['Tipo_educacion']; ?>">
                                                    <option value="">Seleccionar Tipo de educación</option>
                                                    <option value="Educacion formal">Educación formal</option>
                                                    <option value="Educacion no formal">Educación no formal</option>
                                                    <option value="Educacion informal">Educación informal</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Respuesta2" class="form-label">Nivel educativo</label>
                                                <select id="Nivel_educacion" class="form-control" name="Nivel_educacion" value="<?php echo $mostrar['Nivel_educacion']; ?>">
                                                    <option value="">Seleccionar Nivel educativo</option>
                                                    <option value="Educación Media">Educación Media</option>
                                                    <option value="Técnica Profesional">Técnica Profesional</option>
                                                    <option value="Tecnológica">Tecnológica</option>
                                                    <option value="Universitaria">Universitaria</option>
                                                    <option value="Pregrado">Pregrado</option>
                                                    <option value="Posgrado">Posgrado</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Respuesta3" class="form-label">Institución</label>
                                                <input type="Text" class="form-control" id="Institucion" name="Institucion" placeholder="Ingrese el nombre de la Institucion" value="<?php echo $mostrar['Institucion']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Respuesta4" class="form-label">Programa</label>
                                                <input type="Text" class="form-control" id="Programa" name="Programa" placeholder="Ingrese el nombre del programa" value="<?php echo $mostrar['Programa']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Respuesta5" class="form-label">Fecha de terminación</label>
                                                <input type="date" class="form-control" id="Fec_terminacion" name="Fec_terminacion" value="<?php echo $mostrar['Fec_terminacion']; ?>">
                                                <input type="hidden" name="Id_informacion_personal_form_fk" value="<?php echo $mostrar['Id_informacion_personal_form_fk']; ?>">
                                            </div>
                                            <button type="submit" name="updateFormacion" class="btn btn-primary">Guardar cambios</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        } catch(PDOException $e) {
                            echo "Error en la conexión: " . $e->getMessage();
                        }
                        ?>
                    </tbody>
                </table>

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
<script>
    // Función para el buscador
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toUpperCase();
        let rows = document.getElementById('tableBody').getElementsByTagName('tr');
        for (let i = 0; i < rows.length; i++) {
            let cells = rows[i].getElementsByTagName('td');
            let match = false;
            for (let j = 0; j < cells.length; j++) {
                if (cells[j].innerText.toUpperCase().indexOf(filter) > -1) {
                    match = true;
                    break;
                }
            }
            rows[i].style.display = match ? '' : 'none';
        }
    });

    // Función para el filtro
    document.getElementById('filterInput').addEventListener('change', function() {
        let filter = this.value.toUpperCase();
        let rows = document.getElementById('tableBody').getElementsByTagName('tr');
        for (let i = 0; i < rows.length; i++) {
            let categoryCell = rows[i].getElementsByTagName('td')[2];
            if (filter === '' || categoryCell.innerText.toUpperCase().indexOf(filter) > -1) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    });
</script>
</body>
</html>
