USE sistemaolympus;

DELIMITER $$
CREATE PROCEDURE RegistrarPractica1(
    IN _idresultado INT,
    IN _practica1 DECIMAL(4, 2)
)
BEGIN
    DECLARE _existe_nota BOOLEAN;

    -- Verificar si ya existe una evaluación para la práctica 1
    SELECT COUNT(*) INTO _existe_nota
    FROM evaluacion
    WHERE idresultado = _idresultado;

     IF _existe_nota > 0 THEN
        -- Actualizar la nota de la práctica 1
        UPDATE evaluacion
        SET practica1 = _practica1
        WHERE idresultado = _idresultado;
    ELSE
        -- Insertar una nueva fila con la nota de la práctica 1
        INSERT INTO evaluacion (idresultado, practica1)
        VALUES (_idresultado, _practica1);
    END IF;
END $$

DELIMITER $$
CREATE PROCEDURE RegistrarPractica2(
    IN _idresultado INT,
    IN _practica2 DECIMAL(4, 2)
)
BEGIN
    DECLARE _existe_nota BOOLEAN;

    -- Verificar si ya existe una evaluación para el resultado dado
    SELECT COUNT(*) INTO _existe_nota
    FROM evaluacion
    WHERE idresultado = _idresultado;

    IF _existe_nota > 0 THEN
        -- Actualizar la nota de la práctica 2 si ya existe una evaluación
        UPDATE evaluacion
        SET practica2 = _practica2
        WHERE idresultado = _idresultado;
    ELSE
        -- Insertar una nueva fila con la nota de la práctica 2 si no hay evaluación existente
        INSERT INTO evaluacion (idresultado, practica2)
        VALUES (_idresultado, _practica2);
    END IF;
END $$

DELIMITER $$
CREATE PROCEDURE RegistrarPractica3(
    IN _idresultado INT,
    IN _practica3 DECIMAL(4, 2)
)
BEGIN
    DECLARE _existe_nota BOOLEAN;

    -- Verificar si ya existe una evaluación para el resultado dado
    SELECT COUNT(*) INTO _existe_nota
    FROM evaluacion
    WHERE idresultado = _idresultado;

    IF _existe_nota > 0 THEN
        -- Actualizar la nota de la práctica 2 si ya existe una evaluación
        UPDATE evaluacion
        SET practica3 = _practica3
        WHERE idresultado = _idresultado;
    ELSE
        -- Insertar una nueva fila con la nota de la práctica 2 si no hay evaluación existente
        INSERT INTO evaluacion (idresultado, practica3)
        VALUES (_idresultado, _practica3);
    END IF;
END $$

DELIMITER $$
CREATE PROCEDURE RegistrarPractica4(
    IN _idresultado INT,
    IN _practica4 DECIMAL(4, 2)
)
BEGIN
    DECLARE _existe_nota BOOLEAN;

    -- Verificar si ya existe una evaluación para el resultado dado
    SELECT COUNT(*) INTO _existe_nota
    FROM evaluacion
    WHERE idresultado = _idresultado;

    IF _existe_nota > 0 THEN
        -- Actualizar la nota de la práctica 2 si ya existe una evaluación
        UPDATE evaluacion
        SET practica4 = _practica4
        WHERE idresultado = _idresultado;
    ELSE
        -- Insertar una nueva fila con la nota de la práctica 2 si no hay evaluación existente
        INSERT INTO evaluacion (idresultado, practica4)
        VALUES (_idresultado, _practica4);
    END IF;
END $$

DELIMITER $$
CREATE PROCEDURE RegistrarPractica5(
    IN _idresultado INT,
    IN _practica5 DECIMAL(4, 2)
)
BEGIN
    DECLARE _existe_nota BOOLEAN;

    -- Verificar si ya existe una evaluación para el resultado dado
    SELECT COUNT(*) INTO _existe_nota
    FROM evaluacion
    WHERE idresultado = _idresultado;

    IF _existe_nota > 0 THEN
        -- Actualizar la nota de la práctica 2 si ya existe una evaluación
        UPDATE evaluacion
        SET practica5 = _practica5
        WHERE idresultado = _idresultado;
    ELSE
        -- Insertar una nueva fila con la nota de la práctica 2 si no hay evaluación existente
        INSERT INTO evaluacion (idresultado, practica5)
        VALUES (_idresultado, _practica5);
    END IF;
END $$

DELIMITER $$
CREATE PROCEDURE RegistrarPractica6(
    IN _idresultado INT,
    IN _practica6 DECIMAL(4, 2)
)
BEGIN
    DECLARE _existe_nota BOOLEAN;

    -- Verificar si ya existe una evaluación para el resultado dado
    SELECT COUNT(*) INTO _existe_nota
    FROM evaluacion
    WHERE idresultado = _idresultado;

    IF _existe_nota > 0 THEN
        -- Actualizar la nota de la práctica 2 si ya existe una evaluación
        UPDATE evaluacion
        SET practica6 = _practica6
        WHERE idresultado = _idresultado;
    ELSE
        -- Insertar una nueva fila con la nota de la práctica 2 si no hay evaluación existente
        INSERT INTO evaluacion (idresultado, practica6)
        VALUES (_idresultado, _practica6);
    END IF;
END $$


DELIMITER $$
CREATE PROCEDURE RegistrarPractica7(
    IN _idresultado INT,
    IN _practica7 DECIMAL(4, 2)
)
BEGIN
    DECLARE _existe_nota BOOLEAN;

    -- Verificar si ya existe una evaluación para el resultado dado
    SELECT COUNT(*) INTO _existe_nota
    FROM evaluacion
    WHERE idresultado = _idresultado;

    IF _existe_nota > 0 THEN
        -- Actualizar la nota de la práctica 2 si ya existe una evaluación
        UPDATE evaluacion
        SET practica7 = _practica7
        WHERE idresultado = _idresultado;
    ELSE
        -- Insertar una nueva fila con la nota de la práctica 2 si no hay evaluación existente
        INSERT INTO evaluacion (idresultado, practica7)
        VALUES (_idresultado, _practica7);
    END IF;
END $$

DELIMITER $$
CREATE PROCEDURE RegistrarPractica8(
    IN _idresultado INT,
    IN _practica8 DECIMAL(4, 2)
)
BEGIN
    DECLARE _existe_nota BOOLEAN;

    -- Verificar si ya existe una evaluación para el resultado dado
    SELECT COUNT(*) INTO _existe_nota
    FROM evaluacion
    WHERE idresultado = _idresultado;

    IF _existe_nota > 0 THEN
        -- Actualizar la nota de la práctica 2 si ya existe una evaluación
        UPDATE evaluacion
        SET practica8 = _practica8
        WHERE idresultado = _idresultado;
    ELSE
        -- Insertar una nueva fila con la nota de la práctica 2 si no hay evaluación existente
        INSERT INTO evaluacion (idresultado, practica8)
        VALUES (_idresultado, _practica8);
    END IF;
END $$

DELIMITER $$
CREATE PROCEDURE RegistrarPractica9(
    IN _idresultado INT,
    IN _practica9 DECIMAL(4, 2)
)
BEGIN
    DECLARE _existe_nota BOOLEAN;

    -- Verificar si ya existe una evaluación para el resultado dado
    SELECT COUNT(*) INTO _existe_nota
    FROM evaluacion
    WHERE idresultado = _idresultado;

    IF _existe_nota > 0 THEN
        -- Actualizar la nota de la práctica 2 si ya existe una evaluación
        UPDATE evaluacion
        SET practica9 = _practica9
        WHERE idresultado = _idresultado;
    ELSE
        -- Insertar una nueva fila con la nota de la práctica 2 si no hay evaluación existente
        INSERT INTO evaluacion (idresultado, practica9)
        VALUES (_idresultado, _practica9);
    END IF;
END $$

DELIMITER $$
CREATE PROCEDURE RegistrarPractica10(
    IN _idresultado INT,
    IN _practica10 DECIMAL(4, 2)
)
BEGIN
    DECLARE _existe_nota BOOLEAN;

    -- Verificar si ya existe una evaluación para el resultado dado
    SELECT COUNT(*) INTO _existe_nota
    FROM evaluacion
    WHERE idresultado = _idresultado;

    IF _existe_nota > 0 THEN
        -- Actualizar la nota de la práctica 2 si ya existe una evaluación
        UPDATE evaluacion
        SET practica10 = _practica10
        WHERE idresultado = _idresultado;
    ELSE
        -- Insertar una nueva fila con la nota de la práctica 2 si no hay evaluación existente
        INSERT INTO evaluacion (idresultado, practica10)
        VALUES (_idresultado, _practica10);
    END IF;
END $$

DELIMITER $$
CREATE PROCEDURE RegistrarPractica11(
    IN _idresultado INT,
    IN _practica11 DECIMAL(4, 2)
)
BEGIN
    DECLARE _existe_nota BOOLEAN;

    -- Verificar si ya existe una evaluación para el resultado dado
    SELECT COUNT(*) INTO _existe_nota
    FROM evaluacion
    WHERE idresultado = _idresultado;

    IF _existe_nota > 0 THEN
        -- Actualizar la nota de la práctica 2 si ya existe una evaluación
        UPDATE evaluacion
        SET practica11 = _practica11
        WHERE idresultado = _idresultado;
    ELSE
        -- Insertar una nueva fila con la nota de la práctica 2 si no hay evaluación existente
        INSERT INTO evaluacion (idresultado, practica11)
        VALUES (_idresultado, _practica11);
    END IF;
END $$

DELIMITER $$
CREATE PROCEDURE RegistrarPractica12(
    IN _idresultado INT,
    IN _practica12 DECIMAL(4, 2)
)
BEGIN
    DECLARE _existe_nota BOOLEAN;

    -- Verificar si ya existe una evaluación para el resultado dado
    SELECT COUNT(*) INTO _existe_nota
    FROM evaluacion
    WHERE idresultado = _idresultado;

    IF _existe_nota > 0 THEN
        -- Actualizar la nota de la práctica 2 si ya existe una evaluación
        UPDATE evaluacion
        SET practica12 = _practica12
        WHERE idresultado = _idresultado;
    ELSE
        -- Insertar una nueva fila con la nota de la práctica 2 si no hay evaluación existente
        INSERT INTO evaluacion (idresultado, practica12)
        VALUES (_idresultado, _practica12);
    END IF;
END $$

-- exmane

DELIMITER $$
CREATE PROCEDURE Registrarexamen(
    IN _idresultado INT,
    IN _examenfinal DECIMAL(4, 2)
)
BEGIN
    DECLARE _existe_nota BOOLEAN;

    -- Verificar si ya existe una evaluación para el resultado dado
    SELECT COUNT(*) INTO _existe_nota
    FROM evaluacion
    WHERE idresultado = _idresultado;

    IF _existe_nota > 0 THEN
        -- Actualizar la nota de la práctica 2 si ya existe una evaluación
        UPDATE evaluacion
        SET examenfinal = _examenfinal
        WHERE idresultado = _idresultado;
    ELSE
        -- Insertar una nueva fila con la nota de la práctica 2 si no hay evaluación existente
        INSERT INTO evaluacion (idresultado, examenfinal)
        VALUES (_idresultado, _examenfinal);
    END IF;
END $$

DELIMITER $$
CREATE PROCEDURE listarpractica1()
BEGIN
    SELECT idresultado,  LPAD(ROUND(practica1), 2, '0') AS practica1
    FROM evaluacion;
END $$

DELIMITER $$ 
CREATE PROCEDURE listarpractica2()
BEGIN
    SELECT idresultado, LPAD(ROUND(practica2), 2, '0') AS practica2
    FROM evaluacion;
END $$


DELIMITER $$ 
CREATE PROCEDURE listarpractica3()
BEGIN
    SELECT idresultado, LPAD(ROUND(practica3), 2, '0') AS practica3
    FROM evaluacion;
END $$


DELIMITER $$
CREATE PROCEDURE listarpractica4()
BEGIN
    SELECT idresultado, LPAD(ROUND(practica4), 2, '0') AS practica4
    FROM evaluacion;
END $$


DELIMITER $$ 
CREATE PROCEDURE listarpractica5()
BEGIN
    SELECT idresultado, LPAD(ROUND(practica5), 2, '0') AS practica5
    FROM evaluacion;
END $$


DELIMITER $$ 
CREATE PROCEDURE listarpractica6()
BEGIN
    SELECT idresultado, LPAD(ROUND(practica6), 2, '0') AS practica6
    FROM evaluacion;
END $$


DELIMITER $$ 
CREATE PROCEDURE listarpractica7()
BEGIN
    SELECT idresultado, LPAD(ROUND(practica7), 2, '0') AS practica7
    FROM evaluacion;
END $$


DELIMITER $$
CREATE PROCEDURE listarpractica8()
BEGIN
    SELECT idresultado, LPAD(ROUND(practica8), 2, '0') AS practica8
    FROM evaluacion;
END $$


DELIMITER $$ 
CREATE PROCEDURE listarpractica9()
BEGIN
    SELECT idresultado, LPAD(ROUND(practica9), 2, '0') AS practica9
    FROM evaluacion;
END $$


DELIMITER $$ 
CREATE PROCEDURE listarpractica10()
BEGIN
    SELECT idresultado, LPAD(ROUND(practica10), 2, '0') AS practica10
    FROM evaluacion;
END $$


DELIMITER $$
CREATE PROCEDURE listarpractica11()
BEGIN
    SELECT idresultado, LPAD(ROUND(practica11), 2, '0') AS practica11
    FROM evaluacion;
END $$


DELIMITER $$ 
CREATE PROCEDURE listarpractica12()
BEGIN
    SELECT idresultado, LPAD(ROUND(practica12), 2, '0') AS practica12
    FROM evaluacion;
END $$

DELIMITER $$
CREATE PROCEDURE examenfinal()
BEGIN
    SELECT idresultado, LPAD(ROUND(examenfinal), 2, '0') AS practica13
    FROM evaluacion;
END $$

DELIMITER $$
CREATE PROCEDURE ListarPracticasExamen(IN _idalumno INT)
BEGIN
    SELECT idalumno,
           practica1, practica2, practica3, practica4, practica5,
           practica6, practica7, practica8, practica9, practica10,
           practica11, practica12, examenfinal
    FROM resultados 
    JOIN evaluacion  ON resultados.idresultado = evaluacion.idresultado
    WHERE resultados.idalumno = _idalumno;
END $$

CALL RegistrarPractica1(1, 20);
CALL RegistrarPractica2(1, 20);
CALL RegistrarPractica3(1, 02);
CALL RegistrarPractica4(1, 03);
CALL RegistrarPractica5(1, 17);
CALL RegistrarPractica6(1, 09);
CALL RegistrarPractica7(1, 19);
CALL RegistrarPractica8(1, 10);
CALL RegistrarPractica9(1, 14);
CALL RegistrarPractica10(1, 12);
CALL RegistrarPractica11(1, 14);
CALL RegistrarPractica12(1, 15);
CALL Registrarexamen(1, 18);


CALL RegistrarPractica1(2, 11);
CALL RegistrarPractica2(2, 16);
CALL RegistrarPractica3(2, 16);
CALL RegistrarPractica4(2, 12);
CALL RegistrarPractica5(2, 17);
CALL RegistrarPractica6(2, 18);
CALL RegistrarPractica7(2, 19);
CALL RegistrarPractica8(2, 10);
CALL RegistrarPractica9(2, 14);
CALL RegistrarPractica10(2, 12);
CALL RegistrarPractica11(2, 14);
CALL RegistrarPractica12(2, 15);
CALL Registrarexamen(2, 18);

CALL RegistrarPractica1(3, 20);
CALL RegistrarPractica2(3, 20);
CALL RegistrarPractica3(3, 20);
CALL RegistrarPractica4(3, 20);
CALL RegistrarPractica5(3, 20);
CALL RegistrarPractica6(3, 20);
CALL RegistrarPractica7(3, 20);
CALL RegistrarPractica8(3, 20);
CALL RegistrarPractica9(3, 20);
CALL RegistrarPractica10(3, 20);
CALL RegistrarPractica11(3, 20);
CALL RegistrarPractica12(3, 20);
CALL Registrarexamen(3, 20);

SELECT * FROM evaluacion;