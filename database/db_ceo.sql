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
    (1, 'juliana QQ', '123456', 'julita@gmail.com', 'estudiante'),
    (2, 'administracion', '12345', 'fabri@hotmail.com', 'administrador'),
    (3, 'roberto', '12345', 'robertoprof@hotmail.com', 'profesor'),
    (6, 'danielaaa', '12345', 'danielaf@hotmail.com', 'profesor');
-- le actualizamos la clave 12345 (encriptado)
UPDATE usuarios SET claveacceso = '$2y$10$63.J.K3knaWLWcT6EHUKr.3Xzt9n5IFmDjtirprFMma3CAzvwibv2' WHERE idusuario = 1;
UPDATE usuarios SET claveacceso = '$2y$10$S.wXCodQx/jvWnzCkp3JxOIt2n/YuW8Vk86g4Nm5Rtl88AHvGkfoK' WHERE idusuario = 2;
UPDATE usuarios SET claveacceso = '$2y$10$hwSqY1dcyt/cK4JbbMnizegI7xsRz/gH.1nDIrQ63KyVFmj9fc1oy' WHERE idusuario = 3;
UPDATE usuarios SET claveacceso = '$2y$10$hwSqY1dcyt/cK4JbbMnizegI7xsRz/gH.1nDIrQ63KyVFmj9fc1oy' WHERE idusuario = 4;
UPDATE usuarios SET nivelacceso = 'estudiante' WHERE idusuario = 4;
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
	iddocente			INT AUTO_INCREMENT PRIMARY KEY,
	idpersona			INT 			NOT NULL,
	especialidad			VARCHAR(100) 	NOT NULL,
	cv				VARCHAR(100) 	NOT NULL,
	numEmergencia			CHAR(9) 	NOT NULL,
	
	CONSTRAINT fk_idpersona_doc FOREIGN KEY (idpersona) REFERENCES personas (idpersona)
);
INSERT INTO docentes (idpersona, especialidad, cv, numemergencia) VALUES
	('2', 'Taller de dibujo', 'cv.pdf', '985231694'),
	('3', 'Oratoria y Liderazgo', 'prueba.pdf', '998852194'),
	('4', 'Lectura', 'prueba.pdf', '998852194'),
	('5', 'Seminario Sabatinos', 'prueba.pdf', '998852194');
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
		('CEO2023/09','2023-09-06', '2023-10-03', '150'),
		('CEO2024/01','2024-01-01', '2023-04-03', '150');
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
		(1, 2, 2, '2023-10-11','2023-12-24', '02:00', '03:30'),
		(1, 3, 3, '2023-10-11','2023-12-24', '12:00', '01:30');
INSERT INTO detalles (idmodulo, idcurso, iddocente, diainicio,fechafin, horainicio, horafin) VALUES
	(2, 4, 4, '2023-10-11','2023-12-24', '04:00', '06:00');
SELECT * FROM detalles;

-- TABLA ALUMNOS
CREATE TABLE alumnos
(
	idalumno INT AUTO_INCREMENT PRIMARY KEY,
	idpersona INT NOT NULL,
    idusuario int not null,
	CONSTRAINT fk_idpersona_lis FOREIGN KEY (idpersona) REFERENCES personas (idpersona),
    constraint fk_idusuario_lis foreign key (idusuario) references usuarios (idusuario)
);
INSERT INTO alumnos (idpersona, idusuario) VALUES
	(6, 4),
	(7, 1),
	( 8),
	( 9),
	( 10),
	( 11),
	( 12),
	( 13),
	( 14),
	( 15),
	( 16),
	( 17),
	( 18),
	( 19),
	( 20),
	( 21),
	( 22),
	( 23),
	( 24),
	( 25),
	( 26),
	( 27),
	( 28),
	( 29),
	( 30);
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
	(1, 5),
	(1, 6),
	(1, 7),
	(1, 8),
	(1, 9),
	(1, 10),
	(1, 11),
	(1, 12),
	(1, 13),
	(1, 14),
	(1, 15),
	(1, 16),
	(1, 17),
	(1, 18),
	(1, 19),
	(1, 20),
	(2, 21),
	(2, 22),
	(2, 23),
	(2, 24),
	(2, 25);
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
(1,1),
(1,2),
(1,3),
(1,4),
(1,5),
(1,6),
(1,7),
(1,8),
(1,9),
(1,10),
(1,11),
(1,12),
(1,13),
(1,14),
(1,15),
(1,16),
(1,17),
(1,18),
(1,19),
(1, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25);
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

CREATE TABLE matriculas
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

