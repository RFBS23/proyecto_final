USE sistemaolympus;

DELIMITER $$
CREATE PROCEDURE spu_modulo_alumno(
    IN _nombreusuario VARCHAR(50),
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
    INNER JOIN asistenciaalumnos ON detalles.iddetalle = asistenciaalumnos.iddetalle
    INNER JOIN alumnos ON asistenciaalumnos.idalumno = alumnos.idalumno
    INNER JOIN usuarios ON alumnos.idusuario = usuarios.idusuario
    WHERE modulos.nombremodulo = _nombremodulo
      AND usuarios.nombreusuario = _nombreusuario;
END $$


DELIMITER $$
CREATE PROCEDURE spu_alumnos(IN nombrecurso VARCHAR(50), IN nombreusuario VARCHAR(50))
BEGIN
    SELECT 
        ah.fecha AS Fecha,
        ah.estadoasistencia AS EstadoAsistencia
    FROM asistenciahistoricas ah
    INNER JOIN asistenciaalumnos aa ON ah.idalumno = aa.idalumno
    INNER JOIN detalles ON aa.iddetalle = detalles.iddetalle
    INNER JOIN cursos ON detalles.idcurso = cursos.idcurso
    INNER JOIN alumnos ON aa.idalumno = alumnos.idalumno
    INNER JOIN usuarios ON alumnos.idusuario = usuarios.idusuario
    INNER JOIN personas ON usuarios.idpersona = personas.idpersona
    WHERE usuarios.nombreusuario = nombreusuario AND cursos.nombrecurso = nombrecurso
    ORDER BY ah.fecha DESC
    LIMIT 1;
END $$


DELIMITER $$
CREATE PROCEDURE spu_alumnos_resultados(IN nombrecurso VARCHAR(50), IN nombreusuario VARCHAR(50))
BEGIN
    SELECT
        resultados.idresultado,
        resultados.calificacion AS Calificacion
    FROM resultados
    INNER JOIN detalles ON resultados.iddetalle = detalles.iddetalle
    INNER JOIN cursos ON detalles.idcurso = cursos.idcurso
    INNER JOIN alumnos ON resultados.idalumno = alumnos.idalumno
    INNER JOIN usuarios ON alumnos.idusuario = usuarios.idusuario
    INNER JOIN personas ON usuarios.idpersona = personas.idpersona
    WHERE cursos.nombrecurso = nombrecurso AND usuarios.nombreusuario = nombreusuario;
END $$

CALL spu_alumnos_resultados("Taller de dibujo", "juan");



