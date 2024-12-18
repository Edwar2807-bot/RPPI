CREATE SCHEMA RPPI

CREATE TABLE RPPI.RolUsuario (
	Id_rol Int IDENTITY(1,1) PRIMARY KEY NOT NULL,
	Nombre_rol Varchar (50) NOT NULL
);

CREATE TABLE RPPI.EstadoUsuario(
	Id_estado_usuario Int IDENTITY(1,1) PRIMARY KEY NOT NULL,
	Nombre_estado Varchar (50) NOT NULL,
	Descripcion_estado Varchar (100) NOT NULL
);

CREATE TABLE RPPI.Usuario(
	Id_usuario Int IDENTITY(1,1) PRIMARY KEY NOT NULL,
	Correo Varchar (50) NOT NULL,
	Num_documento BigInt NOT NULL,
	Tipo_documento Varchar (50) NOT NULL,
	Pass Varchar (50) NOT NULL,
	Id_rol_fk Int NOT NULL,
	CONSTRAINT Id_rol_fk FOREIGN KEY (Id_rol_fk) REFERENCES RPPI.RolUsuario (Id_rol),
	Id_estado_usuario_fk Int NOT NULL,
	CONSTRAINT Id_estado_usuario_fk FOREIGN KEY (Id_estado_usuario_fk) REFERENCES RPPI.EstadoUsuario (Id_estado_usuario)
);

CREATE TABLE RPPI.EstadoProcedimiento(
	Id_estado_procedimiento Int IDENTITY(1,1) PRIMARY KEY NOT NULL,
	Nombre_estado_proc Varchar (20) NOT NULL,
	Descripcion_estado_proc Varchar (50) NOT NULL
);

CREATE TABLE RPPI.PostulacionPasantias(
	Id_post_pasantia Int IDENTITY(1,1) PRIMARY KEY NOT NULL,
	Entidad Varchar (50) NOT NULL,
	Programa_pasantias Varchar (50) NOT NULL,
	Medio_ent Varchar (50) NOT NULL,
	Area_pas Varchar (50) NOT NULL,
	Hoja_vida Varchar (500) NOT NULL,
	Carta_presentacion Varchar (500) NOT NULL,
	Documento_id Varchar (500) NOT NULL,
	Duracion Varchar (50) NOT NULL,
	Fec_ini_pas Date NOT NULL,
	Estado_procedimiento_post_fk Int NOT NULL,
	CONSTRAINT Estado_procedimiento_post_fk FOREIGN KEY (Estado_procedimiento_post_fk) REFERENCES RPPI.EstadoProcedimiento (Id_estado_procedimiento)
);

CREATE TABLE RPPI.InformacionPersonal(
	Id_informacion_personal Int IDENTITY(1,1) PRIMARY KEY NOT NULL,
	Num_documento BigInt NOT NULL,
	Tipo_identificacion Varchar (50) NOT NULL,
	Fec_nacimiento Date NOT NULL,
	Nombre Varchar (50)  NOT NULL,
	Apellido Varchar (50) NOT NULL,
	Correo Varchar (50) NOT NULL,
	Telefono Int NOT NULL,
	Direccion Varchar (50) NOT NULL,
	Fec_expedicion Date NOT NULL,
	Ciudad Varchar (50) NOT NULL,
	Estrato Int NOT NULL,
	Genero Varchar (50) NOT NULL,
	Nivel_educativo Varchar (50) NOT NULL,
	Foto Varchar (200) NOT NULL,
	Id_usuario_persona_fk Int NOT NULL,
	CONSTRAINT Id_usuario_persona_fk FOREIGN KEY (Id_usuario_persona_fk) REFERENCES RPPI.Usuario (Id_usuario),
	Id_post_pasantias_fk Int NOT NULL,
	CONSTRAINT Id_post_pasantias_fk FOREIGN KEY (Id_post_pasantias_fk) REFERENCES RPPI.PostulacionPasantias (Id_post_pasantia)
);

CREATE TABLE RPPI.EvaluacionTutor(
	Id_evaluacion_tutor Int IDENTITY(1,1) PRIMARY KEY NOT NULL,
	Respuesta1 Varchar (50) NOT NULL,
	Respuesta2 Varchar (50) NOT NULL,
	Respuesta3 Varchar (50) NOT NULL,
	Respuesta4 Varchar (50) NOT NULL,
	Respuesta5 Varchar (50) NOT NULL,
	Id_usuario_evalt_fk Int NOT NULL,
	CONSTRAINT Id_usuario_evalt_fk FOREIGN KEY (Id_usuario_evalt_fk) REFERENCES RPPI.Usuario (Id_usuario)
);

CREATE TABLE RPPI.EvaluacionPasante(
	Id_evaluacion_pasante Int IDENTITY(1,1) PRIMARY KEY NOT NULL,
	Proyecto_eval_pasante Varchar (20) NOT NULL,
	Horario_eval_pasante Varchar (20) NOT NULL,
	Reglamento_eval_pasante Varchar (20) NOT NULL,
	Concepto_eval_pasante Varchar (50) NOT NULL,
	Id_usuario_evalp_fk Int NOT NULL,
	CONSTRAINT Correo_evalp_fk FOREIGN KEY (Id_usuario_evalp_fk) REFERENCES RPPI.Usuario (Id_usuario)
);

CREATE TABLE RPPI.LlamadoAtencion(
	Id_llamado_atencion Int IDENTITY(1,1) PRIMARY KEY NOT NULL,
	Descripcion_llamado_atencion Varchar (50) NOT NULL,
	Id_eval_pasante_FK INT NOT NULL,
	CONSTRAINT Id_eval_pasante_FK FOREIGN KEY (Id_eval_pasante_FK) REFERENCES RPPI.EvaluacionPasante (Id_evaluacion_pasante)
);

CREATE TABLE RPPI.Formacion(
	Id_formacion Int IDENTITY(1,1) PRIMARY KEY NOT NULL,
	Tipo_educacion Varchar (50) NOT NULL,
	Nivel_educacion Varchar (50) NOT NULL,
	Institucion Varchar (50) NOT NULL,
	Programa Varchar (50) NOT NULL,
	Fec_terminacion Date NOT NULL,
	Id_informacion_personal_form_fk Int NOT NULL,
	CONSTRAINT Id_informacion_personal_form_fk FOREIGN KEY (Id_informacion_personal_form_fk) REFERENCES RPPI.InformacionPersonal (Id_informacion_personal)
);

CREATE TABLE RPPI.ExperienciaLaboral(
	Id_exp_laboral Int IDENTITY(1,1) PRIMARY KEY NOT NULL,
	Empresa Varchar (50) NOT NULL,
	Cargo Varchar (50) NOT NULL,
	Fec_ini Date NOT NULL,
	Fec_fin Date NOT NULL,
	Emp_actual Varchar (20) NOT NULL,
	Horario Varchar (50) NOT NULL,
	Id_informacion_personal_exp_fk Int NOT NULL,
	CONSTRAINT Id_informacion_personal_exp_fk FOREIGN KEY (Id_informacion_personal_exp_fk) REFERENCES RPPI.InformacionPersonal (Id_informacion_personal)
);

CREATE TABLE RPPI.Documento(
	Id_documento Int IDENTITY(1,1) PRIMARY KEY NOT NULL,
	Tipo_documento Varchar (20) NOT NULL,
	Documento Varchar (500) NOT NULL,
	Id_informacion_personal_doc_fk Int NOT NULL,
	CONSTRAINT Id_informacion_personal_doc_fk FOREIGN KEY (Id_informacion_personal_doc_fk) REFERENCES RPPI.InformacionPersonal (Id_informacion_personal)
);

CREATE TABLE RPPI.Proyecto(
	Id_proyecto Int IDENTITY(1,1) PRIMARY KEY NOT NULL,
	Nombre_proy Varchar (50)  NOT NULL,
	Descripcion_proy Varchar (50) NOT NULL,
	Acept_tutor Varchar (50) NOT NULL,
	Documento_proy Varchar (500) NOT NULL,
	Id_informacion_personal_proy_fk Int  NOT NULL,
	CONSTRAINT Id_informacion_personal_proy_fk FOREIGN KEY (Id_informacion_personal_proy_fk) REFERENCES RPPI.InformacionPersonal (Id_informacion_personal),
	Estado_procedimiento_proy_fk Int NOT NULL,
	CONSTRAINT Estado_procedimiento_proy_fk FOREIGN KEY (Estado_procedimiento_proy_fk) REFERENCES RPPI.EstadoProcedimiento (Id_estado_procedimiento)
);

CREATE TABLE RPPI.Actividad(
	Id_actividad Int IDENTITY(1,1) PRIMARY KEY NOT NULL,
	Descripcion_actividad Varchar (50) NOT NULL,
	Fecha_actividad Date NOT NULL,
	Id_proy_FK Int NOT NULL,
	CONSTRAINT Id_proy_FK FOREIGN KEY (Id_proy_FK) REFERENCES RPPI.Proyecto (Id_proyecto)
);

CREATE TABLE RPPI.Formalizacion(
	Id_form_pas Int IDENTITY(1,1) PRIMARY KEY NOT NULL,
	Conflicto_intereses Varchar (500)  NOT NULL,
	Certificacion_ARL Varchar (500) NOT NULL,
	Acta_confidencialidad Varchar (500) NOT NULL,
	Certificacion_EPS Varchar (500) NOT NULL,
	Aceptado varchar (50) NOT NULL,
	Id_informacion_personal_formal_fk Int  NOT NULL,
	CONSTRAINT Id_informacion_personal_formal_fk FOREIGN KEY (Id_informacion_personal_formal_fk) REFERENCES RPPI.InformacionPersonal (Id_informacion_personal),
	Estado_procedimiento_fpas_fk Int NOT NULL,
	CONSTRAINT Estado_procedimiento_fpas_fk FOREIGN KEY (Estado_procedimiento_fpas_fk) REFERENCES RPPI.EstadoProcedimiento (Id_estado_procedimiento)
);






