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
                            <span>Cerrar Sesión</span>
                        </a>
                    </li>
                    </ul>
                </div>
            </nav><br><br>
            <main id="main-content" class="content">
            <div class="form-login">
        <form action="../Controllers/SolicitudController_Admin.php" method="post">
            <!-- Nombre y dependencia solicitante -->
            <div class="form-row">
                <label class="lb1" for="Nombre_solici">Nombre Solicitante</label>
                <label class="lb7" for="Dependencia_solici">Dependencia</label>
            </div>
            <div class="form-row1">
            <input type="Text" class="form-control1" id="Nombre_solici" name="Nombre_solici" placeholder="Digite el Nombre del solicitante" required>
            <select name="Dependencia_solici" id="Dependencia_solici" class="form-control2">
                <option value="" disabled selected>Seleccione la dependencia</option>
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
                <option value="Secretaría General">Secretaría General</option>
            </select>
            </div>
            <!--Grupo y lugar practicas -->
            <div class="form-row">
                <label class="lb1" for="Grupo_Solici">Grupo dependencia</label>
                <label class="lb3" for="Lugar_practica">Lugar de prácticas</label>
            </div>
            <div class="form-row1">
                <select class="form-control1" id="Grupo_Solici" name="Grupo_Solici" required>
                    <option value="" disabled selected>Seleccione un grupo</option>
                    <option value="autorizaciones_comercializacion_alimentos_bebidas">Grupo De Autorizaciones De Comercialización De Alimentos Y Bebidas</option>
                    <option value="analisis_riesgos_quimicos_alimentos_bebidas">Grupo Del Sistema De Análisis De Riesgos Químicos En Alimentos Y Bebidas</option>
                    <option value="inspeccion_vigilancia_control_alimentos_bebidas">Grupo Técnico De Inspección Vigilancia Y Control De Alimentos Y Bebidas</option>
                    <option value="carnes_productos_carnicos">Grupo Técnico De Carnes Y Productos Cárnicos Comestibles</option>
                    <option value="articulacion_entidades_territoriales">Grupo Técnico De Articulación Y Coordinación Con Las Entidades Territoriales De Salud</option>
                    <option value="vigilancia_epidemiologica_alimentos_bebidas">Grupo Técnico De Vigilancia Epidemiológica De Alimentos Y Bebidas</option>
                    <option value="registros_sanitarios_cosmeticos">Grupo De Registros Sanitarios Y Asignación De Notificación Sanitaria Obligatoria De Cosméticos, Aseo, Plaguicidas Y Productos De Higiene Doméstica</option>
                    <option value="cosmeticos_aseo_plaguicidas">Grupo Técnico De Cosméticos, Aseo, Plaguicidas Y Productos De Higiene Doméstica</option>
                    <option value="registros_dispositivos_medicos">Grupo De Registros Sanitarios De Dispositivos Médicos Y Otras Tecnologías</option>
                    <option value="vigilancia_post_comercializacion">Grupo De Vigilancia Post Comercialización</option>
                    <option value="componentes_anatomicos">Grupo De Componentes Anatómicos</option>
                    <option value="dispositivos_medicos_tecnologias">Grupo Técnico De Dispositivos Médicos Y Otras Tecnologías</option>
                    <option value="investigacion_clinica">Grupo De Investigación Clínica Y De Apoyo A La Sala Especializada De Dispositivos Médicos Y Reactivos De Diagnóstico In Vitro</option>
                    <option value="apoyo_salas_especializadas">Grupo De Apoyo De Las Salas Especializadas De La Comisión Revisora De La Dirección De Medicamentos Y Productos Biológicos</option>
                    <option value="articulacion_apoyo_tecnico">Grupo De Articulación Y Apoyo Técnico A La Inspección Vigilancia Y Control</option>
                    <option value="publicidad_medicamentos">Grupo De Publicidad De La Dirección De Medicamentos Y Productos Biológicos</option>
                    <option value="registros_fitoterapeuticos">Grupo De Registros Sanitarios De Fito terapéuticos, Medicamentos Homeopáticos Y Productos Dietarios</option>
                    <option value="registros_medicamentos_nacional">Grupo De Registros Sanitarios De Medicamentos De Síntesis Química De Fabricación Nacional</option>
                    <option value="farmacovigilancia">Grupo De Farmacovigilancia</option>
                    <option value="registros_medicamentos_biologicos">Grupo De Registros Sanitarios De Medicamentos Biológicos Y Radiofármacos</option>
                    <option value="registros_medicamentos_importados">Grupo De Registros Sanitarios De Medicamentos De Síntesis Química De Importados</option>
                    <option value="bancos_sangre">Grupo Bancos De Sangre</option>
                    <option value="apoyo_operativo">Grupo De Apoyo Operativo</option>
                    <option value="inspeccion_vigilancia_control">Grupo De Inspección, Vigilancia Y Control</option>
                    <option value="control_puertos">Grupo De Control En Puertos, Aeropuertos Y Pasos Fronterizos</option>
                    <option value="autorizaciones_importacion_exportacion">Grupo De Autorizaciones Y Licencias Para Importación Y Exportación</option>
                    <option value="trafico_postal">Grupo De Inspección Vigilancia Y Control De Tráfico Postal Y Mensajería Expresa</option>
                    <option value="gtt_bucaramanga">GTT Centro Oriente 1 (Bucaramanga)</option>
                    <option value="gtt_bogota">GTT Centro Oriente 2 (Bogotá)</option>
                    <option value="gtt_neiva">GTT Centro Oriente 3 (Neiva)</option>
                    <option value="gtt_barranquilla">GTT Costa Caribe 1 (Barranquilla)</option>
                    <option value="gtt_monteria">GTT Costa Caribe 2 (Montería)</option>
                    <option value="gtt_medellin">GTT Occidente 1 (Medellín)</option>
                    <option value="gtt_cali">GTT Occidente 2 (Cali)</option>
                    <option value="gtt_armenia">GTT Eje Cafetero (Armenia)</option>
                    <option value="gtt_orinoquia">GTT Orinoquia</option>
                    <option value="apoyo_narino">Grupo De Apoyo A Nariño</option>
                    <option value="sancionatorios_alimentos">Grupo De Procesos Sancionatorios De Alimentos Y Bebidas</option>
                    <option value="sancionatorios_medicamentos">Grupo De Procesos Sancionatorios De Medicamentos, Insumos Y Otros Productos</option>
                    <option value="sancionatorios_publicidad">Grupo De Procesos Sancionatorios De Publicidad</option>
                    <option value="sancionatorios_carnicos">Grupo De Procesos Sancionatorios De Plantas De Beneficio, Cárnicos Y Lácteos</option>
                    <option value="secretaria_tecnica">Grupo De Secretaría Técnica</option>
                    <option value="recursos">Grupo De Recursos</option>
                    <option value="comunicaciones">Grupo De Comunicaciones</option>
                    <option value="proyectos_presupuesto">Grupo De Proyectos, Presupuesto Y Estadística</option>
                    <option value="gestion_mejoramiento_organizacional">Grupo De Gestión Y Mejoramiento Organizacional</option>
                    <option value="unidad_riesgo">Grupo Unidad De Riesgo</option>
                    <option value="asesoria_juridica">Grupo De Asesoría Jurídica Y Conceptos</option>
                    <option value="apoyo_reglamentario">Grupo De Apoyo Reglamentario</option>
                    <option value="cobro_coactivo">Grupo De Cobro Persuasivo Y Coactivo</option>
                    <option value="representacion_judicial">Grupo De Representación Judicial Y Extrajudicial</option>
                    <option value="instruccion_disciplinaria">Grupo De Instrucción Disciplinaria</option>
                    <option value="admisibilidad_sanitaria">Grupo De Admisibilidad Sanitaria</option>
                    <option value="cooperacion_relacionamiento">Grupo De Cooperación Y Relacionamiento</option>
                    <option value="tramitacion_servicios">Grupo De Trámites Y Servicios</option>
                    <option value="procesos_reclamaciones">Grupo De Procesos Y Reclamaciones</option>
                    <option value="ogm">Grupo De Organismos Genéticamente Modificados</option>
                    <option value="laboratorio_productos_biologicos">Grupo Laboratorio De Productos Biológicos</option>
                    <option value="laboratorio_fisicoquimico">Grupo Laboratorio Fisicoquímico De Alimentos Y Bebidas</option>
                    <option value="microbiologia_alimentos">Grupo Laboratorio Microbiología De Alimentos Y Bebidas</option>
                    <option value="laboratorio_medicamentos">Grupo Laboratorio De Microbiología De Productos Farmacéuticos</option>
                    <option value="gestion_laboratorios">Grupo De Gestión - Despacho De La Oficina De Laboratorios Y Control De Calidad</option>
                    <option value="informacion">Grupo De Gestión De Información</option>
                    <option value="informatica">Grupo De Informática</option>
                    <option value="documental_correspondencia">Grupo De Gestión Documental Y Correspondencia</option>
                    <option value="talento_humano">Grupo De Talento Humano</option>
                    <option value="soporte_tecnologico">Grupo De Soporte Tecnológico</option>
                    <option value="tesoreria">Grupo De Tesorería</option>
                    <option value="gestion_contractual">Grupo De Gestión Contractual</option>
                    <option value="laboratorio_fisico_mecanico">Grupo Laboratorio Físico-Mecánico De Dispositivos Médicos Y Otras Tecnologías</option>
                    <option value="red_laboratorios_calidad">Grupo Red De Laboratorios Y Calidad</option>
                    <option value="unidad_reaccion_inmediata">Grupo Unidad De Reacción Inmediata</option>
                    <option value="financiero_presupuestal">Grupo Financiero Y Presupuestal</option>
                </select>
                <select class="form-control2" id="Lugar_practica" name="Lugar_practica">
                    <option value="" disabled selected>Seleccione el lugar de pasantías</option>
                    <option value="Bogotá - Edificio Conciliación">Bogotá - Edificio Conciliación</option>
                    <option value="Bogotá - Sede CAN">Bogotá - Sede CAN</option>
                    <option value="Bogotá -Sede Montevideo">Bogotá -Sede Montevideo</option>
                    <option value="Bogotá - Edificio Presidencial">Bogotá - Edificio Presidencial</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Barranquilla">Barranquilla</option>
                    <option value="Bucaramanga">Bucaramanga</option>
                    <option value="Monteria">Monteria</option>
                    <option value="Neiva">Neiva</option>
                    <option value="Pasto">Pasto</option>
                    <option value="Medellin">Medellin</option>
                    <option value="Cali">Cali</option>
                    <option value="Villavicencio">Villavicencio</option>
                </select>
            </div>

            <!-- Nivel y programa acdemico  -->
            <div class="form-row">
                <label class="lb1" for="Nivel_academico">Nivel académico</label>
                <label class="lb3" for="Programa_academico">Programa académico</label>
            </div>
            <div class="form-row1">
                <select  class="form-control1" id="Nivel_academico" name="Nivel_academico">
                    <option value="" disabled selected>Seleccione el nivel académico</option>
                    <option value="Profesional">Profesional</option>
                    <option value="Tecnologo">Tecnologo</option>
                    <option value="Técnico">Técnico</option>
                </select>
                <select class="form-control2" id="Programa_academico" name="Programa_academico" required>
                    <option value="" disabled selected>Seleccione una carrera</option>
                    <option value="medicina_veterinaria">Medicina Veterinaria</option>
                    <option value="zootecnia">Zootecnia</option>
                    <option value="diseno_grafico">Diseño Gráfico</option>
                    <option value="diseno_industrial">Diseño Industrial</option>
                    <option value="cine_television">Cine y Televisión</option>
                    <option value="enfermeria">Enfermería</option>
                    <option value="fisioterapia">Fisioterapia</option>
                    <option value="medicina">Medicina</option>
                    <option value="terapia_ocupacional">Terapia Ocupacional</option>
                    <option value="psicologia">Psicología</option>
                    <option value="trabajo_social">Trabajo Social</option>
                    <option value="sociologia">Sociología</option>
                    <option value="derecho">Derecho</option>
                    <option value="economia">Economía</option>
                    <option value="administracion_empresas">Administración de Empresas</option>
                    <option value="ingenieria_agricola">Ingeniería Agrícola</option>
                    <option value="ingenieria_civil">Ingeniería Civil</option>
                    <option value="ingenieria_mecanica">Ingeniería Mecánica</option>
                    <option value="ingenieria_quimica">Ingeniería Química</option>
                    <option value="arquitectura">Arquitectura</option>
                    <option value="estadistica">Estadística</option>
                    <option value="quimica">Química</option>
                    <option value="farmacia">Farmacia</option>
                    <option value="ingenieria_sistemas">Ingeniería de Sistemas</option>
                    <option value="ingenieria_industrial">Ingeniería Industrial</option>
                    <option value="ingenieria_ambiental_sanitaria">Ingeniería Ambiental y Sanitaria</option>
                    <option value="contaduria_publica">Contaduría Pública</option>
                    <option value="ingenieria_sanitaria">Ingeniería Sanitaria</option>
                    <option value="comunicacion_social">Comunicación Social</option>
                    <option value="quimica_farmaceutica">Química Farmacéutica</option>
                    <option value="microbiologia">Microbiología</option>
                    <option value="ingenieria_software">Ingeniería de Software</option>
                    <option value="ingenieria_biomedica">Ingeniería Biomédica</option>
                    <option value="ingenieria_alimentos">Ingeniería de Alimentos</option>
                    <option value="ingenieria_procesos">Ingeniería de Procesos</option>
                    <option value="periodismo_afines">Periodismo y Afines</option>
                    <option value="gestion_documental_archivistica">Gestión Documental - Archivística</option>
                    <option value="bacteriologia">Bacteriología</option>
                    <option value="instrumentacion_quirurgica">Instrumentación Quirúrgica</option>
                    <option value="administracion_seguridad_salud_trabajo">Administración en Seguridad y Salud en el Trabajo</option>
                    <option value="nutricionista">Nutricionista</option>
                </select>
            </div>

            <!-- Cargo y descripcion del cargo  -->
            <div class="form-row">
                <label class="lb1" for="Cargo_solici">Cargo a desempeñar</label>
                <label class="lb3" for="Descrip_cargo">Descripción del cargo</label>
            </div>
            <div class="form-row1">
                <input type="text" class="form-control1" id="Cargo_solici" name="Cargo_solici" placeholder="Digite el cargo a desempeñar" required>
                <input type="text" class="form-control2" id="Descrip_cargo" name="Descrip_cargo" placeholder="Digite la descripcio del cargo" required>
            </div>
            <!-- N° y modalidad de practicantes -->
            <div class="form-row">
                <label class="lb1" for="Numero_solici">N° de practicantes</label>
                <label class="lb4" for="Modalidad_solici">Modalidad</label>
            </div>
            <div class="form-row1">
                <input type="number" class="form-control1" id="Numero_solici" name="Numero_solici"  min="0" placeholder="Digite el N° de parcicantes" required>
                <Select class="form-control2" id="Modalidad_solici" name="Modalidad_solici">
                    <option value="" disabled selected>Seleccione la Modalidad</option>
                    <option value="Presencial">Presencial</option>
                    <option value="Virtual">Virtual</option>
                    <option value="Mixto">Mixto</option>
                </Select>
            </div>
            <!-- Actividad a desarrollar -->
            <div class="form-row">
                <label class="lb1" for="Actividad">Actividad a desarrollar</label>
            </div> 
            <div class="form-row1">
            <input type="text" class="form-control1" id="Actividad" name="Actividad" placeholder="Digite la actividad a desarrollar" required>
            </div>
            <button type="submit" name="setSolicitud" class="btn-reg">Enviar solicitud</button>
        </form>
    </div>
            </main>
        </div>
    </div><br><br><br>
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
