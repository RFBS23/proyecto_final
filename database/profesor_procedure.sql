USE sistemaolympus;

DELIMITER $$

CREATE PROCEDURE spu_modulo_profesor(
    IN _nombreusuario VARCHAR(50),
    IN _nombremodulo VARCHAR(20)
)
BEGIN
    SELECT
        cursos.nombrecurso AS Curso,
        CONCAT(personas.nombres, ' ', personas.apellidos) AS Profesor
    FROM detalles
    INNER JOIN cursos ON detalles.idcurso = cursos.idcurso
    INNER JOIN docentes ON detalles.iddocente = docentes.iddocente
    INNER JOIN personas ON docentes.idpersona = personas.idpersona
    INNER JOIN modulos ON detalles.idmodulo = modulos.idmodulo
    INNER JOIN usuarios ON docentes.idpersona = usuarios.idpersona
    WHERE modulos.nombremodulo = _nombremodulo
      AND usuarios.nombreusuario = _nombreusuario;
END $$


CALL spu_modulo_profesor("fabrizio", "CEO2023/09");

DELIMITER $$
CREATE PROCEDURE spu_alumnos_del_cursoP(
    IN _nombrecurso VARCHAR(50),
    IN _nombreusuario VARCHAR(50)
)
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
    INNER JOIN docentes ON detalles.iddocente = docentes.iddocente
    INNER JOIN usuarios ON docentes.idpersona = usuarios.idpersona
    WHERE cursos.nombrecurso = _nombrecurso
      AND usuarios.nombreusuario = _nombreusuario;
END $$

CALL spu_alumnos_del_cursoP('Taller de dibujo', 'fabrizio');


