<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Solicitud | INVIMA</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Dash1.css">
    <link rel="stylesheet" href="../css/Exp_laboral.css">
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
            <nav class="navbar navbar-expand px-4 py-3"><br>
                <h3>Solicitud</h3><br>

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
                <!-- Buscador y Filtro -->
                <div class="d-flex justify-content-between mb-3">
                    <div class="input-group">
                        <span class="input-group-text" id="search-addon"><i class="lni lni-search"></i></span>
                        <input type="text" class="form-control" id="searchInput" placeholder="Buscar..." aria-label="Buscar" aria-describedby="search-addon">
                    </div>
                    <button class="btn btn-primary" onclick="location.href='VSolicitud1_Admin.php'">Agregar Nueva Solicitud</button>
                </div>
    <!-- Contenedor para el scroll horizontal -->
    <div style="max-height: 400px; overflow-y: auto;">
                <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Nombre Solicitante</th>
                    <th>Dependencia Solicitante</th>
                    <th>Grupo Dependencia</th>
                    <th>Lugar de Practicas</th>
                    <th>Nivel Academico</th>
                    <th>Programa Academico</th>
                    <th>Nombre del Cargo</th>
                    <th>Descripcion del cargo</th>
                    <th>N° Practicantes</th>
                    <th>Modalidad Practicas</th>
                    <th>Actividad a Desarrollar</th>
                    <th>Accion</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody id="tableBody">
            <?php
                        try {
                            // Conexión con PDO a SQL Server
                            $co = new PDO("sqlsrv:server=SRVVSANDIEGO\\SRVDESARROLLO;Database=ADMINISTRATIVA", "klozanoq", "Colombia2023*");
                            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            // Consulta a la base de datos
                            $sql = "SELECT * FROM RPPI.Solicitud";
                            $stmt = $co->query($sql);

                            // Recorriendo los resultados
                            while($mostrar = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                <tr>
                    <td><?php echo $mostrar ['Id_solicitud'] ?></td>
                    <td><?php echo $mostrar ['Nombre_solici'] ?></td>
                    <td><?php echo $mostrar ['Dependencia_solici'] ?></td>
                    <td><?php echo $mostrar ['Grupo_Solici'] ?></td>
                    <td><?php echo $mostrar ['Lugar_practica'] ?></td>
                    <td><?php echo $mostrar ['Nivel_academico'] ?></td>
                    <td><?php echo $mostrar ['Programa_academico'] ?></td>
                    <td><?php echo $mostrar ['Cargo_solici'] ?></td>
                    <td><?php echo $mostrar ['Descrip_cargo'] ?></td>
                    <td><?php echo $mostrar ['Numero_solici'] ?></td>
                    <td><?php echo $mostrar ['Modalidad_solici'] ?></td>
                    <td><?php echo $mostrar ['Actividad'] ?></td>

                    <!-- Botón Actualizar -->
                    <td>
                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $mostrar['Id_solicitud']; ?>">Actualizar</button>
                    </td>
                    <!-- Botón Eliminar -->
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $mostrar['Id_solicitud']; ?>">Eliminar</button>
                    </td>
                </tr>
                        <!-- Modal para Actualizar -->
                        <div class="modal fade" id="updateModal<?php echo $mostrar['Id_solicitud']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Actualizar Solicitud</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">                                        
                                        <form action="../Controllers/SolicitudController_Admin.php" method="POST">
                                            <input type="hidden" name="Id_solicitud" value="<?php echo $mostrar['Id_solicitud']; ?>">
                                            <div class="mb-3">
                                                <label for="Nombre_solici" class="form-label"> Nombre Solicitante</label>
                                                <input type="text" class="form-control" id="Nombre_solici" name="Nombre_solici" value="<?php echo $mostrar['Nombre_solici']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Dependencia_solici" class="form-label">Dependencia</label>
                                                <input type="text" class="form-control" id="Dependencia_solici" name="Dependencia_solici" value="<?php echo $mostrar['Dependencia_solici']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Grupo_Solici" class="form-label">Grupo dependencia</label>
                                                <input type="text" class="form-control" id="Grupo_Solici" name="Grupo_Solici" value="<?php echo $mostrar['Grupo_Solici']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Lugar_practica" class="form-label">Lugar de practicas</label>
                                                <input type="text" class="form-control" id="Lugar_practica" name="Lugar_practica" value="<?php echo $mostrar['Lugar_practica']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Nivel_academico" class="form-label">Nivel academico</label>
                                                <input type="text" class="form-control" id="Nivel_academico" name="Nivel_academico" value="<?php echo $mostrar['Nivel_academico']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Programa_academico" class="form-label">Programa academico</label>
                                                <input type="text" class="form-control" id="Programa_academico" name="Programa_academico"  value="<?php echo $mostrar['Programa_academico']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Cargo_solici" class="form-label">Cargo a desempeñar</label>
                                                <input type="text" class="form-control" id="Cargo_solici" name="Cargo_solici" value="<?php echo $mostrar['Cargo_solici']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Descrip_cargo" class="form-label">Descripcion del cargo</label>
                                                <input type="text" class="form-control" id="Descrip_cargo" name="Descrip_cargo" value="<?php echo $mostrar['Descrip_cargo']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Numero_solici" class="form-label">N° de practicantes</label>
                                                <input type="number" class="form-control" id="Numero_solici" name="Numero_solici" min="0" value="<?php echo $mostrar['Numero_solici']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Modalidad_solici" class="form-label">Modalidad</label>
                                                <input type="text" class="form-control" id="Modalidad_solici" name="Modalidad_solici" value="<?php echo $mostrar['Modalidad_solici']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Actividad" class="form-label">Actividad a desarrollar</label>
                                                <input type="text" class="form-control" id="Actividad" name="Actividad" value="<?php echo $mostrar['Actividad']; ?>" required>
                                            </div>
                                            <button type="submit" name="updateSolicitud" class="btn btn-primary">Guardar cambios</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal de confirmación para eliminar el registro -->
                        <div class="modal fade" id="deleteModal<?php echo $mostrar['Id_solicitud']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estás seguro de que deseas eliminar esta Solicitud?
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Botón para cerrar el modal sin eliminar -->
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        
                                        <!-- Formulario para eliminar el registro -->
                                        <form method="POST" action="../Controllers/SolicitudController_Admin.php">
                                            <input type="hidden" name="Id_solicitud" value="<?php echo $mostrar['Id_solicitud']; ?>">
                                            <button type="submit" name="deleteSolicitud" class="btn btn-danger">Eliminar</button>
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
