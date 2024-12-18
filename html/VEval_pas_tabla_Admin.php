<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Evaluación Tutor | INVIMA</title>
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
                <h3>Evaluación Pasante</h3><br>

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
                    <button class="btn btn-primary" onclick="location.href='VEval_pas_Admin.php'">Agregar Nueva Evaluación</button>
                </div>
                <!-- Tabla -->
                <div style="max-height: 400px; overflow-y: auto;">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Id evaluacion pasante </th>
                            <th>¿Cumplió con los horarios?</th>
                            <th>¿Cumplió con el proyecto?</th>
                            <th>¿Cumplió con el reglamento?</th>
                            <th>Concepto de validación sobre el pasante</th>
                            <th>Acción</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    <?php
                        try {
                            // Conexión con PDO a SQL Server
                            $co = new PDO("sqlsrv:server=SRVVSANDIEGO\\SRVDESARROLLO;Database=ADMINISTRATIVA", "klozanoq", "Colombia2023*");
                            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            // Consulta a la base de datos
                            $sql = "SELECT * FROM RPPI.EvaluacionPasante";
                            $stmt = $co->query($sql);

                            // Recorriendo los resultados
                            while($mostrar = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                        <th><?php echo $mostrar['Id_evaluacion_pasante']; ?></th>
                        <th><?php echo $mostrar['Proyecto_eval_pasante']; ?></th>
                        <th><?php echo $mostrar['Horario_eval_pasante']; ?></th>
                        <th><?php echo $mostrar['Reglamento_eval_pasante']; ?></th>
                        <th><?php echo $mostrar['Concepto_eval_pasante']; ?></th>
                        <!-- Botón Actualizar -->
                        <td>
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $mostrar['Id_evaluacion_pasante']; ?>">Actualizar</button>
                        </td>
                        <!-- Botón Eliminar -->
                        <td>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $mostrar['Id_evaluacion_pasante']; ?>">Eliminar</button>
                        </td>
                        </form>
                        </tr>
                        <!-- Modal para Actualizar -->
                        <div class="modal fade" id="updateModal<?php echo $mostrar['Id_evaluacion_pasante']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Actualizar Evaluación Pasante</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../Controllers/EvaluacionpasanteController_Admin.php" method="POST">
                                            <input type="hidden" name="Id_evaluacion_pasante" value="<?php echo $mostrar['Id_evaluacion_pasante']; ?>">
                                            <div class="mb-3">
                                                <label for="Proyecto_eval_pasante" class="form-label">Proyecto Evaluacion Pasante</label>
                                                <input type="text" class="form-control" name="Proyecto_eval_pasante" value="<?php echo $mostrar['Proyecto_eval_pasante']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Horario_eval_pasante" class="form-label">Horario Evaluacion Pasante</label>
                                                <input type="text" class="form-control" name="Horario_eval_pasante" value="<?php echo $mostrar['Horario_eval_pasante']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Reglamento_eval_pasante" class="form-label">Reglamento Evaluacion Pasante</label>
                                                <input type="text" class="form-control" name="Reglamento_eval_pasante" value="<?php echo $mostrar['Reglamento_eval_pasante']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Concepto_eval_pasante" class="form-label">Concepto evaluacion Pasante</label>
                                                <input type="text" class="form-control" name="Concepto_eval_pasante" value="<?php echo $mostrar['Concepto_eval_pasante']; ?>">
                                            </div>
                                            <button type="submit" name="updateEvaluacionpasante" class="btn btn-primary">Guardar cambios</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal de confirmación para eliminar el registro -->
                        <div class="modal fade" id="deleteModal<?php echo $mostrar['Id_evaluacion_pasante']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estás seguro de que deseas eliminar esta evaluación?
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Botón para cerrar el modal sin eliminar -->
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        
                                        <!-- Formulario para eliminar el registro -->
                                        <form method="POST" action="../Controllers/EvaluacionpasanteController_Admin.php">
                                            <input type="hidden" name="Id_evaluacion_pasante" value="<?php echo $mostrar['Id_evaluacion_pasante']; ?>">
                                            <button type="submit" name="deleteEvaluacionpasante" class="btn btn-danger">Eliminar</button>
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
                </table>

                <br>
                <br>
                <br>

                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Id llamado atencion</th>
                            <th>Descripcion llamado atencion</th>
                            <th>Acción</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    <?php
                        try {
                            // Conexión con PDO a SQL Server
                            $co = new PDO("sqlsrv:server=SRVVSANDIEGO\\SRVDESARROLLO;Database=ADMINISTRATIVA", "klozanoq", "Colombia2023*");
                            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            // Consulta a la base de datos
                            $sql = "SELECT * FROM RPPI.LlamadoAtencion";
                            $stmt = $co->query($sql);

                            // Recorriendo los resultados
                            while($mostrar = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                        <th><?php echo $mostrar['Id_llamado_atencion']; ?></th>
                        <th><?php echo $mostrar['Descripcion_llamado_atencion']; ?></th>
        
                        <!-- Botón Actualizar (Llamado de Atención) -->
                        <td>
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#LlamadoatencionUpdateModal<?php echo $mostrar['Id_llamado_atencion']; ?>">Actualizar</button>
                        </td>
                        <!-- Botón Eliminar (Llamado de Atención) -->
                        <td>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#LlamadoatencionDeleteModal<?php echo $mostrar['Id_llamado_atencion']; ?>">Eliminar</button>
                        </td>
                        </form>
                        </tr>
                        <!-- Modal para Actualizar -->
                            <!-- Modal para Actualizar (Llamado de Atención) -->
                            <div class="modal fade" id="LlamadoatencionUpdateModal<?php echo $mostrar['Id_llamado_atencion']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalLabel">Actualizar Llamado de Atención</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../Controllers/LlamadoatencionController_Admin.php" method="POST">
                                                <input type="hidden" name="Id_llamado_atencion" value="<?php echo $mostrar['Id_llamado_atencion']; ?>">
                                                <div class="mb-3">
                                                    <label for="Descripcion_llamado_atencion" class="form-label">Llamado de Atención</label>
                                                    <input type="text" class="form-control" name="Descripcion_llamado_atencion" value="<?php echo $mostrar['Descripcion_llamado_atencion']; ?>">
                                                </div>
                                                <button type="submit" name="updateLlamadoatencion" class="btn btn-primary">Guardar cambios</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal de confirmación para eliminar el registro (Llamado de Atención) -->
                            <div class="modal fade" id="LlamadoatencionDeleteModal<?php echo $mostrar['Id_llamado_atencion']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de que deseas eliminar este llamado de atención?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            
                                            <!-- Formulario para eliminar el registro -->
                                            <form method="POST" action="../Controllers/LlamadoatencionController_Admin.php">
                                                <input type="hidden" name="Id_llamado_atencion" value="<?php echo $mostrar['Id_llamado_atencion']; ?>">
                                                <button type="submit" name="deleteLlamadoatencion" class="btn btn-danger">Eliminar</button>
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
</script>
</body>
</html>
