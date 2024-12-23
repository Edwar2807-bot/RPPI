<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Proyecto | INVIMA</title>
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
                    <a href="Dash3.php" class="sidebar-link">
                        <i class="lni lni-grid-alt"></i>
                        <span>Panel de control</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VInfo_personal3.php" class="sidebar-link">
                        <i class="lni lni-users"></i>
                        <span>Información personal</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VFormacion3.php" class="sidebar-link">
                        <i class="lni lni-library"></i>
                        <span>Formación</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VExp_lab3.php" class="sidebar-link">
                        <i class="lni lni-archive"></i>
                        <span>Experiencia laboral</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VDocs3.php" class="sidebar-link">
                        <i class="lni lni-files"></i>
                        <span>Documentos</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="Vcal3.php" class="sidebar-link">
                        <i class="lni lni-calendar"></i>
                        <span>Calendario</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="Vpro_pas.php" class="sidebar-link">
                        <i class="lni lni-pencil-alt"></i>
                        <span>Proyecto de pasantías</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VEval_tut_tabla.php" class="sidebar-link">
                        <i class="lni lni-notepad"></i>
                        <span>Evaluación tutor</span>
                    </a>
                </li>
            </ul>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3"><br>
                <h3>Proyecto</h3><br>

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
                    <button class="btn btn-primary" onclick="location.href='Vpro_pas1.php'">Agregar Nueva Evaluación</button>
                </div>
                <!-- Tabla -->
                <div style="max-height: 1000px; overflow-y: auto;">
                <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Nombre Proyecto</th>
                                <th>Descripción Proyecto</th>
                                <th>¿Aceptación tutor?</th>
                                <th>Documentos proyecto</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                        <?php
                            try {
                                // Conexión con PDO a SQL Server
                                $co = new PDO("sqlsrv:server=DESKTOP-6VHCU6I;database=RPPI");
                                $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                
                                // Consulta a la base de datos
                                $sql = "SELECT * FROM RPPI.Proyecto";
                                $stmt = $co->query($sql);

                                // Recorriendo los resultados
                                while($mostrar = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <th><?php echo $mostrar['Id_proyecto']; ?></th>
                                <th><?php echo $mostrar['Nombre_proy']; ?></th>
                                <th><?php echo $mostrar['Descripcion_proy']; ?></th>
                                <th><?php echo $mostrar['Acept_tutor']; ?></th>
                                <td><a href="<?php echo $mostrar['Documento_proy']; ?>"> Documento </a></td>
                                <!-- Botón Actualizar -->
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $mostrar['Id_proyecto']; ?>">Actualizar</button>
                                </td>
                            </tr>
                            <!-- Modal para Actualizar -->
                            <div class="modal fade" id="updateModal<?php echo $mostrar['Id_proyecto']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalLabel">Actualizar Proyecto</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../Controllers/ProyectoController.php" method="POST">
                                                <input type="hidden" name="Id_proyecto" value="<?php echo $mostrar['Id_proyecto']; ?>">
                                                <div class="mb-3">
                                                    <label for="Nombre_proy" class="form-label">Nombre proyecto</label>
                                                    <input type="text" class="form-control" name="Nombre_proy" value="<?php echo $mostrar['Nombre_proy']; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Descripcion_proy" class="form-label">Descripción proyecto</label>
                                                    <input type="text" class="form-control" name="Descripcion_proy" value="<?php echo $mostrar['Descripcion_proy']; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Acept_tutor" class="form-label">Aceptación tutor</label>
                                                    <input type="text" class="form-control" name="Acept_tutor" value="<?php echo $mostrar['Acept_tutor']; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Documento_proy" class="form-label">Documento proyecto</label>
                                                    <input type="text" class="form-control" name="Documento_proy" value="<?php echo $mostrar['Documento_proy']; ?>" readonly>
                                                    <input type="hidden" name="Id_informacion_personal_proy_fk" value="<?php echo $mostrar['Id_informacion_personal_proy_fk']; ?>">
                                                    <input type="hidden" name="Estado_procedimiento_proy_fk" value="<?php echo $mostrar['Estado_procedimiento_proy_fk']; ?>">
                                                </div>
                                                <button type="submit" name="updateProyecto" class="btn btn-primary">Guardar cambios</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal de confirmación para eliminar el registro -->
                            <div class="modal fade" id="deleteModal<?php echo $mostrar['Id_proyecto']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de que deseas eliminar este proyecto?
                                        </div>
                                        <div class="modal-footer">
                                            <!-- Botón para cerrar el modal sin eliminar -->
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            
                                            <!-- Formulario para eliminar el registro -->
                                            <form method="POST" action="../Controllers/ProyectoController.php">
                                                <input type="hidden" name="Id_proyecto" value="<?php echo $mostrar['Id_proyecto']; ?>">
                                                <button type="submit" name="deleteProyecto" class="btn btn-danger">Eliminar</button>
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
                </div>

                <br>
                <br>
                <br>

                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Descripción Actividad</th>
                            <th>Fecha Actividad</th>
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
                            
                            // Consulta a la base de datos
                            $sql = "SELECT * FROM RPPI.Actividad";
                            $stmt = $co->query($sql);

                            // Recorriendo los resultados
                            while($mostrar = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                        <th><?php echo $mostrar['Id_actividad']; ?></th>
                        <th><?php echo $mostrar['Descripcion_actividad']; ?></th>
                        <th><?php echo $mostrar['Fecha_actividad']; ?></th>        
                        <!-- Botón Actualizar -->
                        <td>
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $mostrar['Id_actividad']; ?>">Actualizar</button>
                        </td>
                        </form>
                        </tr>
                        <!-- Modal para Actualizar -->
                        <div class="modal fade" id="updateModal<?php echo $mostrar['Id_actividad']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Actualizar Actividad</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../Controllers/ActividadController.php" method="POST">
                                            <input type="hidden" name="Id_actividad" value="<?php echo $mostrar['Id_actividad']; ?>">
                                            <div class="mb-3">
                                                <label for="Descripcion_actividad" class="form-label">Descripción Actividad</label>
                                                <input type="text" class="form-control" name="Descripcion_actividad" value="<?php echo $mostrar['Descripcion_actividad']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Fecha_actividad" class="form-label">Fecha Actividad</label>
                                                <input type="date" class="form-control" name="Fecha_actividad" value="<?php echo $mostrar['Fecha_actividad']; ?>">
                                                <input type="hidden" name="Id_proy_FK" value="<?php echo $mostrar['Id_proy_FK']; ?>">
                                            </div>
                                            <button type="submit" name="updateActividad" class="btn btn-primary">Guardar cambios</button>
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
</script>
</body>
</html>
