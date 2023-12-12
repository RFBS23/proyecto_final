DROP DATABASE IF EXISTS sistemaolympus;
CREATE DATABASE sistemaolympus;
USE sistemaolympus;

-- TABLA PERSONAS
CREATE TABLE personas (
    idpersona 				INT AUTO_INCREMENT PRIMARY KEY,
    nombres 				VARCHAR(70) 	NOT NULL,
    apellidos 				VARCHAR(70) 	NOT NULL,
    genero 				VARCHAR(15) 	NOT NULL, -- hombre, mujer
    celular 				CHAR(9) 		NULL,
    direccion 				VARCHAR(100) 	NOT NULL,
    fechanacimiento 			DATE 			NOT NULL,
    tipodocumento 			CHAR(3) 		NOT NULL, -- DNI, CE: carnet extranjeria
    numerodocumento 			VARCHAR(12) 	NOT NULL,
    estado 				CHAR(1) NOT NULL DEFAULT '1',
    CONSTRAINT uk_numerodocumento_personas UNIQUE (numerodocumento)
);

INSERT INTO personas(nombres, apellidos, genero, celular, direccion, fechanacimiento, tipodocumento, numerodocumento) VALUES
    ('JULIANA', 'QUINTO QUINTANA', 'mujer', '987899241', 'por ahi', '2002-03-10', 'cde', '287654321'),
    ('FABRIZIO', 'BARRIOS SAVEDRA' , 'hombre', '987653241', 'las palmeras', '2023-03-19', 'dni', '16385274'),
    ('ROBERTO', 'SUKENBER QUISPE', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '16395256'),
    ('JUAN', 'GALVEZ GUERRA', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '76767676');
INSERT INTO personas(nombres, apellidos, genero, celular, direccion, fechanacimiento, tipodocumento, numerodocumento) VALUES
    ('JESUS', 'CAMACHO QUISPE', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '09090898'),
    ('DANIELA', 'PEREZ MENDOZA', 'mujer', '987653111', 'las palmeras', '1999-06-19', 'dni', '13245234'),
    ('CARLOS', 'ANAMPA LEON', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '56454323'),
    ('KEARA', 'PALACIONS MARCOS', 'mujer', '987653111', 'las palmeras', '1999-06-19', 'dni', '87878756'),
    ('EDU', 'QUIROS GALLARDO ', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '87878654'),
    ('CARLA', 'AEDO PALACIO', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '98987654'),
    ('SILVIA VERONIKA', 'ACEVEDO CONGORA', 'mujer', '987899241', 'por ahi', '2002-03-10', 'cde', '287674321'),
    ('JUAN CARLOS', 'ACUÑA BRICEÑO' , 'hombre', '987653241', 'las palmeras', '2023-03-19', 'dni', '16315274'),
    ('JOSE LUIS', 'GUEDA VILA', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '16395253'),
    ('ROSA HELLEN', 'AGUERO MEJIA DE JIMENEZ', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '96767676'),
    ('CARMEN IRENE', 'AGUILA GARCIA', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '09090893'),
    ('EDWIN EDDY', 'AGUILAR ORE', 'mujer', '987653111', 'las palmeras', '1999-06-19', 'dni', '13245231'),
    ('GUIDO', 'AGUIRRE BARRIENTOS', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '56451323'),
    ('ESTHER MARICEL', 'ALAMA OTOYA', 'mujer', '987653111', 'las palmeras', '1999-06-19', 'dni', '87818756'),
    ('CLAUDIA ROZANA', 'ALARCON SANCHEZ ', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '17878654'),
    ('RENEE', 'ALATTA RETAMOZO', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '98987659'),
    ('ARAUJO LOYOLA', 'BRIEL KAELA', 'mujer', '987899241', 'por ahi', '2002-03-10', 'cde', '287674021'),
    ('ARBILDO GRANDEZ', 'JODY MERCEDES' , 'hombre', '987653241', 'las palmeras', '2023-03-19', 'dni', '06315274'),
    ('GERMAN GUILLERMO', 'GERMAN GUILLERMO', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '16305253'),
    ('ARIAS DE UREÑA', 'AGUERO MEJIA DE JIMENEZ', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '96767076'),
    ('ARTEAGA SANDOVAL DE MEZA', 'AGUILA GARCIA', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '09000893'),
    ('EDWIN EDDY', 'AGUILAR ORE', 'mujer', '987653111', 'las palmeras', '1999-06-19', 'dni', '13240231'),
    ('GUIDO', 'AGUIRRE BARRIENTOS', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '56450323'),
    ('ESTHER MARICEL', 'ALAMA OTOYA', 'mujer', '987653111', 'las palmeras', '1999-06-19', 'dni', '80818756'),
    ('ASTUDILLO REYMUNDO', 'ALONSO ALEJANDRO ', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '17870654'),
    ('AYALA CONGACHI', 'ANILU IRMA', 'hombre', '987653111', 'las palmeras', '1999-06-19', 'dni', '98907659');
SELECT * FROM personas;

-- TABLA USUARIOS
CREATE TABLE usuarios (
    idusuario 			INT AUTO_INCREMENT PRIMARY KEY,
    idpersona 			INT 		NOT NULL ,
    nombreusuario 		VARCHAR(50) 	NOT NULL,
    claveacceso 		VARCHAR(100) 	NOT NULL,
    correo 			VARCHAR(90) 	NOT NULL,
    nivelacceso 		VARCHAR(20) 	NOT NULL,
    estado 			CHAR(1) 		NOT NULL DEFAULT '1', -- 1 = activo / 0 = inactivo
    CONSTRAINT uk_nomUser_usuarios UNIQUE (nombreusuario),
    CONSTRAINT fk_idpersona_usuarios FOREIGN KEY (idpersona) REFERENCES personas(idpersona),
    CONSTRAINT ck_nivelacceso_usuario CHECK (nivelacceso IN ('administrador', 'estudiante', 'profesor'))
);
INSERT INTO usuarios (idpersona, nombreusuario, claveacceso, correo, nivelacceso) VALUES
    (1, 'julianaqq', '12345', 'juli@hotmail.com', 'administrador'),
    (2, 'fabrizio', '12345', 'fabrizio@hotmail.com', 'profesor'),
    (3, 'roberto', '12345', 'robertito@hotmail.utp.pe', 'estudiante'),
    (4, 'juan', '12345', 'robertito@hotmail.utp.pe', 'estudiante'), -- registrado recien lo demas falta
    (5, 'jesus', '12345', 'robertito@hotmail.utp.pe', 'estudiante'),
    (6, 'daniela', '12345', 'juli@hotmail.com', 'administrador'),
    (7, 'carlos', '12345', 'fabrizio@hotmail.com', 'profesor'),
    (8, 'keara', '12345', 'robertito@hotmail.utp.pe', 'estudiante'),
    (9, 'edu', '12345', 'robertito@hotmail.utp.pe', 'estudiante'),
    (10, 'carla', '12345', 'robertito@hotmail.utp.pe', 'estudiante');

    
-- le actualizamos la clave 12345 (encriptado)
UPDATE usuarios SET claveacceso = '$2y$10$63.J.K3knaWLWcT6EHUKr.3Xzt9n5IFmDjtirprFMma3CAzvwibv2' WHERE idusuario = 1;
UPDATE usuarios SET claveacceso = '$2y$10$S.wXCodQx/jvWnzCkp3JxOIt2n/YuW8Vk86g4Nm5Rtl88AHvGkfoK' WHERE idusuario = 2;
UPDATE usuarios SET claveacceso = '$2y$10$S.wXCodQx/jvWnzCkp3JxOIt2n/YuW8Vk86g4Nm5Rtl88AHvGkfoK' WHERE idusuario = 3;
UPDATE usuarios SET claveacceso = '$2y$10$S.wXCodQx/jvWnzCkp3JxOIt2n/YuW8Vk86g4Nm5Rtl88AHvGkfoK' WHERE idusuario = 4;
UPDATE usuarios SET claveacceso = '$2y$10$63.J.K3knaWLWcT6EHUKr.3Xzt9n5IFmDjtirprFMma3CAzvwibv2' WHERE idusuario = 5;
UPDATE usuarios SET claveacceso = '$2y$10$S.wXCodQx/jvWnzCkp3JxOIt2n/YuW8Vk86g4Nm5Rtl88AHvGkfoK' WHERE idusuario = 6;
UPDATE usuarios SET claveacceso = '$2y$10$S.wXCodQx/jvWnzCkp3JxOIt2n/YuW8Vk86g4Nm5Rtl88AHvGkfoK' WHERE idusuario = 7;
UPDATE usuarios SET claveacceso = '$2y$10$S.wXCodQx/jvWnzCkp3JxOIt2n/YuW8Vk86g4Nm5Rtl88AHvGkfoK' WHERE idusuario = 8;
UPDATE usuarios SET claveacceso = '$2y$10$63.J.K3knaWLWcT6EHUKr.3Xzt9n5IFmDjtirprFMma3CAzvwibv2' WHERE idusuario = 9;
UPDATE usuarios SET claveacceso = '$2y$10$S.wXCodQx/jvWnzCkp3JxOIt2n/YuW8Vk86g4Nm5Rtl88AHvGkfoK' WHERE idusuario = 10;
SELECT * FROM usuarios;

-- TABLA CURSOS
CREATE TABLE cursos
(
	idcurso				INT AUTO_INCREMENT PRIMARY KEY,
	nombrecurso			VARCHAR(50) NOT NULL
);
INSERT INTO cursos (nombrecurso) VALUES
		('Taller de dibujo'),
		('Oratoria y Liderazgo'),
		('Lectura'),
		('Seminario Sabatinos');
SELECT * FROM cursos;

-- TABLA DOCENTES
CREATE TABLE docentes
(
	iddocente		INT AUTO_INCREMENT PRIMARY KEY,
	idpersona		INT NOT NULL,
	especialidad	VARCHAR(100) NOT NULL,
	cv				VARCHAR(100) NOT NULL,
	numEmergencia	CHAR(9) NOT NULL,
	CONSTRAINT fk_idpersona_doc FOREIGN KEY (idpersona) REFERENCES personas (idpersona)
);
INSERT INTO docentes (idpersona, especialidad, cv, numemergencia) VALUES
	(1, 'Taller de dibujo', 'cv.pdf', '985231694'),
	(6, 'Oratoria y Liderazgo', 'prueba.pdf', '998852194'),
	(7, 'Lectura', 'prueba.pdf', '998852194'),
	(8, 'Seminario Sabatinos', 'prueba.pdf', '998852194');
SELECT * FROM docentes;

-- TABLA MODULOS
CREATE TABLE modulos
(
	idmodulo 			INT AUTO_INCREMENT PRIMARY KEY,
	nombremodulo			VARCHAR(20)	NOT NULL,
	fechainicio			DATE 		NOT NULL,
	fechafin			DATE 		NOT NULL,
	preciomodulo			DECIMAL(7,2) 	NOT NULL,
	preciopromocional 		DECIMAL(7,2)    NULL
);
INSERT INTO modulos (nombremodulo, fechainicio, fechafin, preciomodulo) VALUES
		('CEO2023/09','2023-09-06', '2023-10-03', '150');
SELECT * FROM modulos;

-- TABLA DETALLES
CREATE TABLE detalles
(
	iddetalle			INT AUTO_INCREMENT PRIMARY KEY,
	idmodulo 			INT 	NOT NULL,
	idcurso				INT 	NOT NULL,
	iddocente			INT 	NOT NULL,
	diainicio			DATE 	NOT NULL,
	fechafin			DATE 	NOT NULL,
	horainicio			TIME 	NOT NULL,
	horafin				TIME 	NOT NULL,
	CONSTRAINT fk_idmodulo_det FOREIGN KEY (idmodulo) REFERENCES modulos (idmodulo),
	CONSTRAINT fk_iddocente_det FOREIGN KEY (iddocente) REFERENCES docentes (iddocente),
	CONSTRAINT fk_idcurso_det FOREIGN KEY (idcurso) REFERENCES cursos (idcurso)
);
INSERT INTO detalles (idmodulo, idcurso, iddocente, diainicio,fechafin, horainicio, horafin) VALUES
		(1, 1, 1, '2023-10-11','2023-12-24', '04:00', '06:00'),
		(1, 2, 1, '2023-10-11','2023-12-24', '02:00', '03:30');
SELECT * FROM detalles;

-- TABLA ALUMNOS
CREATE TABLE alumnos
(
	idalumno INT AUTO_INCREMENT PRIMARY KEY,
	idusuario INT NOT NULL,
	CONSTRAINT fk_idusuario_lis FOREIGN KEY (idusuario) REFERENCES usuarios (idusuario)
);
INSERT INTO alumnos (idusuario) VALUES
	(3),
	(4),
	(5),
	(6),
	(7),
	(8),
	(9),
	(10);
SELECT * FROM alumnos;

-- TABLA ASISTENCIALUMNOS
CREATE TABLE asistenciaalumnos
(
    idasistencia INT AUTO_INCREMENT PRIMARY KEY,
    iddetalle INT NOT NULL,
    idalumno INT NOT NULL,
    fechaasistencia DATE NULL,
    estadoasistencia VARCHAR(20)	DEFAULT '',
    CONSTRAINT fk_iddetalle FOREIGN KEY (iddetalle) REFERENCES detalles (iddetalle),
    CONSTRAINT fk_idalumno FOREIGN KEY (idalumno) REFERENCES personas (idpersona)
);

INSERT INTO asistenciaalumnos (iddetalle, idalumno ) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 4),
	(2, 5),
	(2, 6),
	(2, 7),
	(2, 8);
SELECT * FROM asistenciaalumnos;

CREATE TABLE asistenciahistoricas (
    idasistenciahistorica INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    idalumno INT NOT NULL,
    estadoasistencia VARCHAR(20) NOT NULL,
    CONSTRAINT fk_idalumno_historico FOREIGN KEY (idalumno) REFERENCES alumnos (idalumno)
);
SELECT * FROM asistenciahistoricas;

-- TABLA RESULTADO
CREATE TABLE resultados
(
    idresultado 	INT AUTO_INCREMENT PRIMARY KEY,
    idalumno		INT NOT NULL,
    iddetalle 		INT NOT NULL,
    calificacion 	DECIMAL(4, 2) DEFAULT 0.00, -- Establecer el valor predeterminado como 0.00
    CONSTRAINT fk_idalumno_res FOREIGN KEY (idalumno) REFERENCES alumnos (idalumno),
    CONSTRAINT fk_iddetalle_res FOREIGN KEY (iddetalle) REFERENCES detalles (iddetalle)
);

INSERT INTO resultados (iddetalle, idalumno) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 4),
	(2, 5),
	(2, 6),
	(2, 7),
	(2, 8);
SELECT * FROM resultados;

-- TABLA EVALUACION
CREATE TABLE evaluacion
(	
	idevaluacion INT AUTO_INCREMENT PRIMARY KEY,
	idresultado	INT NOT NULL,
	practica1	DECIMAL(4, 2) 	NULL,
	practica2 	DECIMAL(4, 2) 	NULL,
	practica3 	DECIMAL(4, 2) 	NULL,
	practica4 	DECIMAL(4, 2) 	NULL,
	practica5 	DECIMAL(4, 2) 	NULL,
	practica6 	DECIMAL(4, 2) 	NULL,
	practica7 	DECIMAL(4, 2) 	NULL,
	practica8 	DECIMAL(4, 2) 	NULL,
	practica9 	DECIMAL(4, 2) 	NULL,
	practica10 	DECIMAL(4, 2) 	NULL,
	practica11  DECIMAL(4, 2) 	NULL,
	practica12 	DECIMAL(4, 2) 	NULL,
	examenfinal	DECIMAL(4, 2) 	NULL,
	CONSTRAINT fk_idresultado_ev FOREIGN KEY (idresultado) REFERENCES resultados (idresultado)
);
SELECT * FROM evaluacion;
/*
drop TABLE matriculas
(
	idmatricula			INT AUTO_INCREMENT PRIMARY KEY,
	idalumno			INT 			NOT NULL,
	idapoderado			INT 			NOT NULL,
	idmodulo			INT 			NOT NULL,
	fechamatricula		DATE 			NOT NULL,
	precioacordado		DECIMAL(7,2) 	NULL,
	observacion			VARCHAR(200) 	NULL,
	CONSTRAINT fk_idalumno_mat FOREIGN KEY (idalumno) REFERENCES personas (idpersona),
	CONSTRAINT fk_idpersona_mat FOREIGN KEY (idapoderado) REFERENCES personas (idpersona),
	CONSTRAINT fk_idmodulo_mat FOREIGN KEY (idmodulo) REFERENCES modulos (idmodulo)
);
SELECT * FROM matriculas;
*/
