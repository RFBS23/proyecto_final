USE sistemaolympus;

DELIMITER $$
CREATE PROCEDURE spu_listar_modulos
(
    IN _nombremodulo VARCHAR(20)
)
BEGIN
    SELECT
        cursos.nombrecurso AS Cursos,
        CONCAT(personas.nombres, ' ', personas.apellidos) AS Docente
    FROM detalles
    INNER JOIN cursos ON detalles.idcurso = cursos.idcurso
    INNER JOIN docentes ON detalles.iddocente = docentes.iddocente
    INNER JOIN personas ON docentes.idpersona = personas.idpersona
    INNER JOIN modulos ON detalles.idmodulo = modulos.idmodulo
    WHERE modulos.nombremodulo = _nombremodulo;
END $$

DELIMITER $$
CREATE PROCEDURE spu_alumnos_del_curso(IN nombrecurso VARCHAR(50))
BEGIN
    SELECT 
	asistenciaalumnos.idasistencia,
        personas.apellidos AS Apellidos,
        personas.nombres AS Nombres,
        asistenciaalumnos.estadoasistencia AS Estado
    FROM asistenciaalumnos
    INNER JOIN detalles ON asistenciaalumnos.iddetalle = detalles.iddetalle
    INNER JOIN cursos ON detalles.idcurso = cursos.idcurso
    INNER JOIN alumnos ON asistenciaalumnos.idalumno = alumnos.idalumno
    INNER JOIN personas ON alumnos.idusuario = personas.idpersona
    WHERE cursos.nombrecurso = nombrecurso;
END $$
call spu_alumnos_del_curso ('Taller de dibujo');

DELIMITER $$
CREATE PROCEDURE spu_alumnos_del_curso_resultados(IN nombrecurso VARCHAR(50))
BEGIN
    SELECT
        resultados.idresultado,
        personas.apellidos AS Apellidos,
        personas.nombres AS Nombres,
        resultados.calificacion AS Calificacion
    FROM resultados
    INNER JOIN detalles ON resultados.iddetalle = detalles.iddetalle
    INNER JOIN cursos ON detalles.idcurso = cursos.idcurso
    INNER JOIN alumnos ON resultados.idalumno = alumnos.idalumno
    INNER JOIN personas ON alumnos.idusuario = personas.idpersona
    WHERE cursos.nombrecurso = nombrecurso;
END $$

DELIMITER $$
CREATE PROCEDURE spu_alumnos_del_curso_practica(IN nombrecurso VARCHAR(50))
BEGIN
    SELECT
        resultados.idresultado,
        personas.apellidos AS Apellidos,
        personas.nombres AS Nombres,
        resultados.calificacion AS Calificacion
    FROM resultados
    INNER JOIN detalles ON resultados.iddetalle = detalles.iddetalle
    INNER JOIN cursos ON detalles.idcurso = cursos.idcurso
    INNER JOIN alumnos ON resultados.idalumno = alumnos.idalumno
    INNER JOIN personas ON alumnos.idusuario = personas.idpersona
    WHERE cursos.nombrecurso = nombrecurso;
END $$

DELIMITER $$
CREATE PROCEDURE spu_asistencia_actualizar
(
    IN _idasistencia INT,
    IN _estadoasistencia VARCHAR(20)
)
BEGIN

    UPDATE asistenciaalumnos SET
        estadoasistencia = _estadoasistencia,
        fechaasistencia = CURDATE()
    WHERE idasistencia = _idasistencia;


    INSERT INTO asistenciahistoricas (fecha, idalumno, estadoasistencia)
    SELECT CURDATE(), idalumno, _estadoasistencia
    FROM asistenciaalumnos
    WHERE idasistencia = _idasistencia;
END $$

DELIMITER $$
CREATE PROCEDURE ActualizarCalificacionFinal(IN _idresultado INT)
BEGIN
    DECLARE total_practicas DECIMAL(4, 2);
    DECLARE examen_final DECIMAL(4, 2);
    DECLARE calificacion_final DECIMAL(4, 2);

    -- Calcula la suma de las 12 prácticas
    SELECT
        (practica1 + practica2 + practica3 + practica4 + practica5 +
         practica6 + practica7 + practica8 + practica9 + practica10 +
         practica11 + practica12) / 12
    INTO total_practicas
    FROM evaluacion
    WHERE idresultado = _idresultado;

    -- Obtiene la calificación del examen final
    SELECT examenfinal INTO examen_final FROM evaluacion WHERE idresultado = _idresultado;

    -- Calcula la calificación final
    SET calificacion_final = (total_practicas + examen_final) / 2;

    -- Actualiza la calificación final en la tabla resultados
    UPDATE resultados
    SET calificacion = calificacion_final
    WHERE idresultado = _idresultado;

END $$

CALL ActualizarCalificacionFinal(3); -- Cambia 1 por el idevaluacion que desees
SELECT * FROM resultados;
SELECT * FROM evaluacion;

DELIMITER $$
CREATE PROCEDURE spu_personas_registrar(
	IN _nombres 			VARCHAR(70),
    IN _apellidos 			VARCHAR(70),
    IN _genero 				VARCHAR(50),
    IN _celular 			CHAR(9),
    IN _direccion 			VARCHAR(100),
    IN _fechanacimiento 	DATE,
    IN _tipodocumento 		CHAR(3),
    IN _numerodocumento 	VARCHAR(12)
)BEGIN
	INSERT INTO personas(nombres, apellidos, genero, celular, direccion, fechanacimiento, tipodocumento, numerodocumento) 
    VALUES (_nombres, _apellidos, _genero, _celular, _direccion, _fechanacimiento, _tipodocumento, _numerodocumento);
END $$

-- LISTAR PERSONAS
DELIMITER $$
CREATE PROCEDURE spu_personas_listar()
BEGIN
	SELECT
		idpersona,
        nombres,
        apellidos,
        genero,
        celular,
        direccion,
        fechanacimiento,
        tipodocumento,
        numerodocumento
        FROM personas
        ORDER BY idpersona ASC;
END $$
CALL spu_personas_listar();

DELIMITER $$
CREATE PROCEDURE spu_genero_listar()
BEGIN
	SELECT DISTINCT genero
    FROM personas;
END $$
CALL spu_genero_listar();

DELIMITER $$
CREATE PROCEDURE spu_tipodoc_listar()
BEGIN
	SELECT DISTINCT tipodocumento
    FROM personas;
END $$
CALL spu_genero_listar();

DELIMITER $$
CREATE PROCEDURE spu_estudiantes_cantidad()
BEGIN
	SELECT COUNT(*) AS totalEstudiantes
    FROM usuarios
    WHERE nivelacceso = 'estudiante';
END $$

DELIMITER $$
CREATE PROCEDURE spu_cursos_cantidad()
BEGIN
	SELECT COUNT(*) AS totalcursos
    FROM cursos;
END $$

DELIMITER $$
CREATE PROCEDURE spu_resultado_cantidad()
BEGIN
	SELECT COUNT(*) FROM resultado;
END $$
