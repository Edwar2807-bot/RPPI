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
    <title>Solicitud pasantías | INVIMA</title>
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
                    <a href="Dash_Th.php" class="sidebar-link">
                        <i class="lni lni-grid-alt"></i>
                        <span>Panel de control</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VInfo_personal_Th.php" class="sidebar-link">
                        <i class="lni lni-users"></i>
                        <span>Información personal</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VFormacion_Th.php" class="sidebar-link">
                        <i class="lni lni-library"></i>
                        <span>Formación</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VExp_lab_Th.php" class="sidebar-link">
                        <i class="lni lni-archive"></i>
                        <span>Experiencia laboral</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VDocs_Th.php" class="sidebar-link">
                        <i class="lni lni-files"></i>
                        <span>Documentos</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="Vcal_Th.php" class="sidebar-link">
                        <i class="lni lni-calendar"></i>
                        <span>Calendario</span>
                    </a>
                </li><br>
                <li class="sidebar-item">
                    <a href="VForm_pas_th.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Formalización  pasantías</span>
                    </a>
                </li>
            </ul>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3"><br>
                <h3>Solicitud pasantías</h3><br>
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
                    <button class="btn btn-primary" onclick="location.href='Vresp_soli.php'">Agregar Nueva postulación</button>
                </div>
                <div style="max-height: 1000px; overflow-y: auto; ">
                    <table class="table table-bordered table-hover">

                    <thead class="table-dark">
                            <tr>
                                <th >Id Usuario</th>
                                <th>Id Pasantía</th>
                                <th>Entidad</th>
                                <th>Programa de pasantías</th>
                                <th>Medio enterado</th>
                                <th>Área pasantías</th>
                                <th>Hoja de vida</th>
                                <th>Carta de presentación</th>
                                <th>Documento identidad</th>
                                <th>Duración</th>
                                <th>Fecha inicio</th>
                                <th>Aceptado</th>
                                <th>Observaciones</th>
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
                                $sql = "SELECT * FROM RPPI.PostulacionPasantias";
                                $stmt = $co->query($sql);

                                // Recorriendo los resultados
                                while($mostrar = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr>
                                <th><?php echo $mostrar['Id_Usuario']; ?></th>
                                <th><?php echo $mostrar['Id_post_pasantia']; ?></th>
                                <th><?php echo $mostrar['Entidad']; ?></th>
                                <th><?php echo $mostrar['Programa_pasantias']; ?></th>
                                <th><?php echo $mostrar['Medio_ent']; ?></th>
                                <th><?php echo $mostrar['Area_pas']; ?></th>
                                <th><a href="<?php echo $mostrar['Hoja_vida']; ?>"> Hoja de vida</a></th>
                                <th><a href="<?php echo $mostrar['Carta_presentacion']; ?>"> Carta de presentación</a></th>
                                <th><a href="<?php echo $mostrar['Documento_id']; ?>"> Documento </a></th>
                                <th><?php echo $mostrar['Duracion']; ?></th>
                                <th><?php echo $mostrar['Fec_ini_pas']; ?></th>
                                <th><?php echo $mostrar['Aceptado']; ?></th>
                                <th><?php echo $mostrar['Observaciones']; ?></th>
                                <!-- Botón Responder -->
                                <td>
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $mostrar['Id_post_pasantia']; ?>">Responder</button>
                                </td>
                                </form>
                            </tr>
                            <!-- Modal para Actualizar -->
                            <div class="modal fade" id="updateModal<?php echo $mostrar['Id_post_pasantia']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalLabel">Responder Postulación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">                                        
                                            <form action="../Controllers/PostulacionpasController_Th.php" method="POST">
                                                <input type="hidden" name="Id_post_pasantia" value="<?php echo $mostrar['Id_post_pasantia']; ?>">
                                                <div class="mb-3">
                                                    <label class="lb3" for="Area_pas">Área de pasantías</label>
                                                    <select id="Area_pas" class="form-control" name="Area_pas" value="<?php echo $mostrar['Area_pas']; ?>" required>
                                                        <option value="<?php echo $mostrar['Area_pas'];?>"><?php echo $mostrar['Area_pas']; ?></option>
                                                        <option value="Dirección de Alimentos y Bebidas">Dirección de Alimentos y Bebidas</option>
                                                        <option value="Dirección de Cosméticos y plaguicidas">Dirección de Cosméticos y plaguicidas</option>
                                                        <option value="Dirección de Dispositivos Médicos">Dirección de Dispositivos Médicos</option>
                                                        <option value="Dirección de Medicamentos y Productos Biológicos">Dirección de Medicamentos y Productos Biológicos</option>
                                                        <option value="Dirección de Operaciones Sanitarias">Dirección de Operaciones Sanitarias</option>
                                                        <option value="Dirección de Responsabilidad Sanitaria">Dirección de Responsabilidad Sanitaria</option>
                                                        <option value="Dirección General">Dirección General</option>
                                                        <option value="Oficina Asesora de Planeación">Oficina Asesora de Planeación</option>
                                                        <option value="Oficina Asesora Jurídica">Oficina Asesora Jurídica</option>
                                                        <option value="Oficina de Asuntos Internacionales">Oficina de Asuntos Internacionales</option>
                                                        <option value="Oficina de Atención al Ciudadano">Oficina de Atención al Ciudadano</option>
                                                        <option value="Oficina de Control Interno">Oficina de Control Interno</option>
                                                        <option value="Oficina de Laboratorios y Control de Calidad">Oficina de Laboratorios y Control de Calidad</option>
                                                        <option value="Oficina de Tecnologías de la Información">Oficina de Tecnologías de la Información</option>
                                                        <option value="Secretaría General">Secretaría General</option>';
                                                    </select>               
                                                </div>
                                                <div class="mb-3">
                                                    <label class="lb4" for="Duracion">Duración de las pasantías</label>
                                                    <select id="Duracion" class="form-control2" name="Duracion" value="<?php echo $mostrar['Duracion']; ?>">
                                                        <option value="<?php echo $mostrar['Duracion']; ?>"><?php echo $mostrar['Duracion']; ?></option>
                                                        <option value="3 Meses">3 Meses</option>
                                                        <option value="3 Meses">4 Meses</option>
                                                        <option value="3 Meses">5 Meses</option>
                                                        <option value="6 Meses">6 Meses</option>
                                                        <option value="9 Meses">9 Meses</option>
                                                        <option value="12 Meses">12 Meses</option>
                                                    </select>             
                                                </div>
                                                <div class="mb-3">
                                                    <label class="lb1" for="Fec_ini_pas">Fecha de inicio pasantías</label>
                                                    <input type="date" class="form-control" id="Fec_ini_pas" name="Fec_ini_pas" value="<?php echo $mostrar['Fec_ini_pas']; ?>">
                                                    <input type="hidden" name="Estado_procedimiento_post_fk" value="<?php echo $mostrar['Estado_procedimiento_post_fk']; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="lb1" for="Aceptado">Aceptación de postulación</label>
                                                    <select id="Aceptado" class="form-control" name="Aceptado" value="<?php echo $mostrar['Aceptado']; ?>" required>
                                                        <option value="Si"> si</option>
                                                        <option value="No"> No</option>
                                                        <option value="No"> Corregir Datos</option>
                                                    </select>                                                         
                                                    <input type="hidden" name="Estado_procedimiento_post_fk" value="<?php echo $mostrar['Estado_procedimiento_post_fk']; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="lb1" for="Observaciones">Observaciones</label>
                                                    <textarea id="Observaciones" class="form-control" name="Observaciones" rows="4" value="<?php echo $mostrar['Observaciones']; ?>" required><?php echo $mostrar['Observaciones']; ?></textarea>
                                                </div>
                                                <button type="submit" name="updatePostulacionpasantiasTh" class="btn btn-primary">Enviar Respuesta</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal de confirmación para eliminar el registro -->
                            <div class="modal fade" id="deleteModal<?php echo $mostrar['Id_post_pasantia']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de que deseas eliminar esta postulación?
                                        </div>
                                        <div class="modal-footer">
                                            <!-- Botón para cerrar el modal sin eliminar -->
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            
                                            <!-- Formulario para eliminar el registro -->
                                            <form method="POST" action="../Controllers/PostulacionpasController_Admin.php">
                                                <input type="hidden" name="Id_post_pasantia" value="<?php echo $mostrar['Id_post_pasantia']; ?>">
                                                <button type="submit" name="deletePostulacionpasantias" class="btn btn-danger">Eliminar</button>
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
            </main>
        </div>
    </div><br>
    <br><br><br>

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
