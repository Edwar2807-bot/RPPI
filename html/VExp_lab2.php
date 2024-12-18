<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Experiencia laboral | INVIMA</title>
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
                <h3>Experiencia laboral</h3><br>

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
                    <button class="btn btn-primary" onclick="location.href='VExp_lab2.1.php'">Agregar Nueva exp laboral</button>
                </div>
                <!-- Tabla -->
                <div style="max-height: 400px; overflow-y: auto;">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Empresa</th>
                            <th>Cargo</th>
                            <th>Fecha de ingreso</th>
                            <th>Fecha de salida</th>
                            <th>¿Empleo actual?</th>
                            <th>Horario</th>
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
                            $sql = "SELECT * FROM RPPI.ExperienciaLaboral";
                            $stmt = $co->query($sql);

                            // Recorriendo los resultados
                            while($mostrar = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td><?php echo $mostrar ['Id_exp_laboral'] ?></td>
                            <td><?php echo $mostrar ['Empresa'] ?></td>
                            <td><?php echo $mostrar ['Cargo'] ?></td>
                            <td><?php echo $mostrar ['Fec_ini'] ?></td>
                            <td><?php echo $mostrar ['Fec_fin'] ?></td>
                            <td><?php echo $mostrar ['Emp_actual'] ?></td>
                            <td><?php echo $mostrar ['Horario'] ?></td>
                        <!-- Botón Actualizar -->
                        <td>
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $mostrar['Id_exp_laboral']; ?>">Actualizar</button>
                        </td>
                        </form>
                        </tr>
                        <!-- Modal para Actualizar -->
                        <div class="modal fade" id="updateModal<?php echo $mostrar['Id_exp_laboral']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Experiencia laboral</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">                                        
                                        <form action="../Controllers/ExperiencialabController2.php" method="POST">
                                            <input type="hidden" name="Id_exp_laboral" value="<?php echo $mostrar['Id_exp_laboral']; ?>">
                                            <div class="mb-3">
                                                <label for="Respuesta1" class="form-label">Empresa o entidad </label>
                                                <input type="text" class="form-control" id="Empresa" name="Empresa" placeholder="Nombre de la empresa" value="<?php echo $mostrar['Empresa']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Respuesta2" class="form-label">Cargo</label>
                                                <input type="text" class="form-control" id="Cargo" name="Cargo" placeholder="Ingrese su cargo" value="<?php echo $mostrar['Cargo']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Respuesta3" class="form-label">Fecha de ingreso</label>
                                                <input type="date" class="form-control" id="Fechai" name="Fec_ini" value="<?php echo $mostrar['Fec_ini']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Respuesta4" class="form-label">Fecha de terminacion</label>
                                                <input type="date" class="form-control" id="Fechat" name="Fec_fin" value="<?php echo $mostrar['Fec_fin']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Respuesta5" class="form-label">¿Empleo actual?</label>
                                                <select id="Eactual" class="form-control" name="Emp_actual" value="<?php echo $mostrar['Emp_actual']; ?>">
                                                    <option value="1">Seleccionar</option>
                                                    <option value="Si">Si</option>
                                                    <option value="No">No</option>  
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Respuesta4" class="form-label">Horiario laboral</label>
                                                <select id="Hlab" class="form-control" name="Horario" value="<?php echo $mostrar['Horario']; ?>">
                                                    <option value="1">Seleccionar el horario</option>
                                                    <option value="Diurno">Diurno</option>
                                                    <option value="Nocturno">Nocturno</option>
                                                    <option value="Fines de semana">Fines de semana</option>
                                                </select>
                                                <input type="hidden" name="Id_informacion_personal_form_fk" value="<?php echo $mostrar['Id_informacion_personal_exp_fk']; ?>">
                                            </div>
                                            <button type="submit" name="updateExperiencialaboral" class="btn btn-primary">Guardar cambios</button>
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
