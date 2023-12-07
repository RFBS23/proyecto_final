-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: sistemaolympus
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnos` (
  `idalumno` int NOT NULL AUTO_INCREMENT,
  `idusuario` int NOT NULL,
  PRIMARY KEY (`idalumno`),
  KEY `fk_idusuario_lis` (`idusuario`),
  CONSTRAINT `fk_idusuario_lis` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (1,3),(2,4);
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asistenciaalumnos`
--

DROP TABLE IF EXISTS `asistenciaalumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asistenciaalumnos` (
  `idasistencia` int NOT NULL AUTO_INCREMENT,
  `iddetalle` int NOT NULL,
  `idalumno` int NOT NULL,
  `fechaasistencia` date DEFAULT NULL,
  `estadoasistencia` varchar(20) DEFAULT '',
  PRIMARY KEY (`idasistencia`),
  KEY `fk_iddetalle` (`iddetalle`),
  KEY `fk_idalumno` (`idalumno`),
  CONSTRAINT `fk_idalumno` FOREIGN KEY (`idalumno`) REFERENCES `personas` (`idpersona`),
  CONSTRAINT `fk_iddetalle` FOREIGN KEY (`iddetalle`) REFERENCES `detalles` (`iddetalle`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistenciaalumnos`
--

LOCK TABLES `asistenciaalumnos` WRITE;
/*!40000 ALTER TABLE `asistenciaalumnos` DISABLE KEYS */;
INSERT INTO `asistenciaalumnos` VALUES (1,1,1,'2023-12-01','PRESENTE'),(2,1,2,'2023-12-07','JUSTIFICADO');
/*!40000 ALTER TABLE `asistenciaalumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asistenciahistoricas`
--

DROP TABLE IF EXISTS `asistenciahistoricas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asistenciahistoricas` (
  `idasistenciahistorica` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idalumno` int NOT NULL,
  `estadoasistencia` varchar(20) NOT NULL,
  PRIMARY KEY (`idasistenciahistorica`),
  KEY `fk_idalumno_historico` (`idalumno`),
  CONSTRAINT `fk_idalumno_historico` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumno`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistenciahistoricas`
--

LOCK TABLES `asistenciahistoricas` WRITE;
/*!40000 ALTER TABLE `asistenciahistoricas` DISABLE KEYS */;
INSERT INTO `asistenciahistoricas` VALUES (1,'2023-12-01',1,'PRESENTE'),(2,'2023-12-01',1,'PRESENTE'),(3,'2023-12-07',2,'AUSENTE'),(4,'2023-12-07',2,'PRESENTE'),(5,'2023-12-07',2,'TARDANZA'),(6,'2023-12-07',2,'AUSENTE'),(7,'2023-12-07',2,'PRESENTE'),(8,'2023-12-07',2,'AUSENTE'),(9,'2023-12-07',2,'TARDANZA'),(10,'2023-12-07',2,'JUSTIFICADO'),(11,'2023-12-07',2,'PRESENTE'),(12,'2023-12-07',2,'AUSENTE'),(13,'2023-12-07',2,'TARDANZA'),(14,'2023-12-07',2,'JUSTIFICADO'),(15,'2023-12-07',2,'PRESENTE'),(16,'2023-12-07',2,'JUSTIFICADO');
/*!40000 ALTER TABLE `asistenciahistoricas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cursos` (
  `idcurso` int NOT NULL AUTO_INCREMENT,
  `nombrecurso` varchar(50) NOT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'Taller de dibujo'),(2,'Oratoria y Liderazgo'),(3,'Lectura'),(4,'Seminario Sabatinos');
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles`
--

DROP TABLE IF EXISTS `detalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalles` (
  `iddetalle` int NOT NULL AUTO_INCREMENT,
  `idmodulo` int NOT NULL,
  `idcurso` int NOT NULL,
  `iddocente` int NOT NULL,
  `diainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `horainicio` time NOT NULL,
  `horafin` time NOT NULL,
  PRIMARY KEY (`iddetalle`),
  KEY `fk_idmodulo_det` (`idmodulo`),
  KEY `fk_iddocente_det` (`iddocente`),
  KEY `fk_idcurso_det` (`idcurso`),
  CONSTRAINT `fk_idcurso_det` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`),
  CONSTRAINT `fk_iddocente_det` FOREIGN KEY (`iddocente`) REFERENCES `docentes` (`iddocente`),
  CONSTRAINT `fk_idmodulo_det` FOREIGN KEY (`idmodulo`) REFERENCES `modulos` (`idmodulo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles`
--

LOCK TABLES `detalles` WRITE;
/*!40000 ALTER TABLE `detalles` DISABLE KEYS */;
INSERT INTO `detalles` VALUES (1,1,1,1,'2023-10-11','2023-12-24','04:00:00','06:00:00'),(2,1,2,2,'2023-10-11','2023-12-24','02:00:00','03:30:00'),(3,2,4,4,'2023-10-11','2023-12-24','04:00:00','06:00:00');
/*!40000 ALTER TABLE `detalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docentes`
--

DROP TABLE IF EXISTS `docentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `docentes` (
  `iddocente` int NOT NULL AUTO_INCREMENT,
  `idpersona` int NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `cv` varchar(100) NOT NULL,
  `numEmergencia` char(9) NOT NULL,
  PRIMARY KEY (`iddocente`),
  KEY `fk_idpersona_doc` (`idpersona`),
  CONSTRAINT `fk_idpersona_doc` FOREIGN KEY (`idpersona`) REFERENCES `personas` (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docentes`
--

LOCK TABLES `docentes` WRITE;
/*!40000 ALTER TABLE `docentes` DISABLE KEYS */;
INSERT INTO `docentes` VALUES (1,2,'Taller de dibujo','cv.pdf','985231694'),(2,3,'Oratoria y Liderazgo','prueba.pdf','998852194'),(3,4,'Lectura','prueba.pdf','998852194'),(4,5,'Seminario Sabatinos','prueba.pdf','998852194');
/*!40000 ALTER TABLE `docentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evaluacion` (
  `idevaluacion` int NOT NULL AUTO_INCREMENT,
  `idresultado` int NOT NULL,
  `practica1` decimal(4,2) DEFAULT NULL,
  `practica2` decimal(4,2) DEFAULT NULL,
  `practica3` decimal(4,2) DEFAULT NULL,
  `practica4` decimal(4,2) DEFAULT NULL,
  `practica5` decimal(4,2) DEFAULT NULL,
  `practica6` decimal(4,2) DEFAULT NULL,
  `practica7` decimal(4,2) DEFAULT NULL,
  `practica8` decimal(4,2) DEFAULT NULL,
  `practica9` decimal(4,2) DEFAULT NULL,
  `practica10` decimal(4,2) DEFAULT NULL,
  `practica11` decimal(4,2) DEFAULT NULL,
  `practica12` decimal(4,2) DEFAULT NULL,
  `examenfinal` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`idevaluacion`),
  KEY `fk_idresultado_ev` (`idresultado`),
  CONSTRAINT `fk_idresultado_ev` FOREIGN KEY (`idresultado`) REFERENCES `resultados` (`idresultado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion`
--

LOCK TABLES `evaluacion` WRITE;
/*!40000 ALTER TABLE `evaluacion` DISABLE KEYS */;
INSERT INTO `evaluacion` VALUES (1,1,20.00,20.00,20.00,20.00,20.00,20.00,20.00,20.00,20.00,20.00,20.00,20.00,15.00),(3,2,12.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,5.00);
/*!40000 ALTER TABLE `evaluacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulos`
--

DROP TABLE IF EXISTS `modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modulos` (
  `idmodulo` int NOT NULL AUTO_INCREMENT,
  `nombremodulo` varchar(20) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `preciomodulo` decimal(7,2) NOT NULL,
  `preciopromocional` decimal(7,2) DEFAULT NULL,
  PRIMARY KEY (`idmodulo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulos`
--

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` VALUES (1,'CEO2023/09','2023-09-06','2023-10-03',150.00,NULL),(2,'CEO2024/01','2024-01-01','2023-04-03',150.00,NULL);
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `idpersona` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(70) NOT NULL,
  `apellidos` varchar(70) NOT NULL,
  `genero` varchar(15) NOT NULL,
  `celular` char(9) DEFAULT NULL,
  `direccion` varchar(100) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `tipodocumento` char(3) NOT NULL,
  `numerodocumento` varchar(12) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idpersona`),
  UNIQUE KEY `uk_numerodocumento_personas` (`numerodocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,'JULIANA','QUINTO QUINTANA','mujer','987899241','por ahi','2002-03-10','cde','287654321','1'),(2,'FABRIZIO','BARRIOS SAVEDRA','hombre','987653241','las palmeras','2023-03-19','dni','16385274','1'),(3,'ROBERTO','SUKENBER QUISPE','hombre','987653111','las palmeras','1999-06-19','dni','16395256','1'),(4,'JUAN','GALVEZ GUERRA','hombre','987653111','las palmeras','1999-06-19','dni','76767676','1'),(5,'JESUS','CAMACHO QUISPE','hombre','987653111','las palmeras','1999-06-19','dni','09090898','1'),(6,'DANIELA','PEREZ MENDOZA','mujer','987653111','las palmeras','1999-06-19','dni','13245234','1'),(7,'CARLOS','ANAMPA LEON','hombre','987653111','las palmeras','1999-06-19','dni','56454323','1'),(8,'KEARA','PALACIONS MARCOS','mujer','987653111','las palmeras','1999-06-19','dni','87878756','1'),(9,'EDU','QUIROS GALLARDO ','hombre','987653111','las palmeras','1999-06-19','dni','87878654','1'),(10,'CARLA','AEDO PALACIO','hombre','987653111','las palmeras','1999-06-19','dni','98987654','1'),(11,'SILVIA VERONIKA','ACEVEDO CONGORA','mujer','987899241','por ahi','2002-03-10','cde','287674321','1'),(12,'JUAN CARLOS','ACUÑA BRICEÑO','hombre','987653241','las palmeras','2023-03-19','dni','16315274','1'),(13,'JOSE LUIS','GUEDA VILA','hombre','987653111','las palmeras','1999-06-19','dni','16395253','1'),(14,'ROSA HELLEN','AGUERO MEJIA DE JIMENEZ','hombre','987653111','las palmeras','1999-06-19','dni','96767676','1'),(15,'CARMEN IRENE','AGUILA GARCIA','hombre','987653111','las palmeras','1999-06-19','dni','09090893','1'),(16,'EDWIN EDDY','AGUILAR ORE','mujer','987653111','las palmeras','1999-06-19','dni','13245231','1'),(17,'GUIDO','AGUIRRE BARRIENTOS','hombre','987653111','las palmeras','1999-06-19','dni','56451323','1'),(18,'ESTHER MARICEL','ALAMA OTOYA','mujer','987653111','las palmeras','1999-06-19','dni','87818756','1'),(19,'CLAUDIA ROZANA','ALARCON SANCHEZ ','hombre','987653111','las palmeras','1999-06-19','dni','17878654','1'),(20,'RENEE','ALATTA RETAMOZO','hombre','987653111','las palmeras','1999-06-19','dni','98987659','1'),(21,'ARAUJO LOYOLA','BRIEL KAELA','mujer','987899241','por ahi','2002-03-10','cde','287674021','1'),(22,'ARBILDO GRANDEZ','JODY MERCEDES','hombre','987653241','las palmeras','2023-03-19','dni','06315274','1'),(23,'GERMAN GUILLERMO','GERMAN GUILLERMO','hombre','987653111','las palmeras','1999-06-19','dni','16305253','1'),(24,'ARIAS DE UREÑA','AGUERO MEJIA DE JIMENEZ','hombre','987653111','las palmeras','1999-06-19','dni','96767076','1'),(25,'ARTEAGA SANDOVAL DE MEZA','AGUILA GARCIA','hombre','987653111','las palmeras','1999-06-19','dni','09000893','1'),(26,'EDWIN EDDY','AGUILAR ORE','mujer','987653111','las palmeras','1999-06-19','dni','13240231','1'),(27,'GUIDO','AGUIRRE BARRIENTOS','hombre','987653111','las palmeras','1999-06-19','dni','56450323','1'),(28,'ESTHER MARICEL','ALAMA OTOYA','mujer','987653111','las palmeras','1999-06-19','dni','80818756','1'),(29,'ASTUDILLO REYMUNDO','ALONSO ALEJANDRO ','hombre','987653111','las palmeras','1999-06-19','dni','17870654','1'),(30,'AYALA CONGACHI','ANILU IRMA','hombre','987653111','las palmeras','1999-06-19','dni','98907659','1'),(31,'gghjgh','jghj','mujer','987654321','holsd','2023-12-08','dni','123456','1');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultados`
--

DROP TABLE IF EXISTS `resultados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resultados` (
  `idresultado` int NOT NULL AUTO_INCREMENT,
  `idalumno` int NOT NULL,
  `iddetalle` int NOT NULL,
  `calificacion` decimal(4,2) DEFAULT '0.00',
  PRIMARY KEY (`idresultado`),
  KEY `fk_idalumno_res` (`idalumno`),
  KEY `fk_iddetalle_res` (`iddetalle`),
  CONSTRAINT `fk_idalumno_res` FOREIGN KEY (`idalumno`) REFERENCES `alumnos` (`idalumno`),
  CONSTRAINT `fk_iddetalle_res` FOREIGN KEY (`iddetalle`) REFERENCES `detalles` (`iddetalle`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultados`
--

LOCK TABLES `resultados` WRITE;
/*!40000 ALTER TABLE `resultados` DISABLE KEYS */;
INSERT INTO `resultados` VALUES (1,1,1,17.50),(2,2,1,0.00);
/*!40000 ALTER TABLE `resultados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `idpersona` int NOT NULL,
  `nombreusuario` varchar(50) NOT NULL,
  `claveacceso` varchar(100) NOT NULL,
  `correo` varchar(90) NOT NULL,
  `nivelacceso` varchar(20) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `uk_nomUser_usuarios` (`nombreusuario`),
  KEY `fk_idpersona_usuarios` (`idpersona`),
  CONSTRAINT `fk_idpersona_usuarios` FOREIGN KEY (`idpersona`) REFERENCES `personas` (`idpersona`),
  CONSTRAINT `ck_nivelacceso_usuario` CHECK ((`nivelacceso` in (_utf8mb4'administrador',_utf8mb4'estudiante',_utf8mb4'profesor')))
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,1,'julianaqq','$2y$10$63.J.K3knaWLWcT6EHUKr.3Xzt9n5IFmDjtirprFMma3CAzvwibv2','juli@hotmail.com','administrador','1'),(2,2,'fabrizio','$2y$10$S.wXCodQx/jvWnzCkp3JxOIt2n/YuW8Vk86g4Nm5Rtl88AHvGkfoK','fabrizio@hotmail.com','profesor','1'),(3,3,'roberto','$2y$10$S.wXCodQx/jvWnzCkp3JxOIt2n/YuW8Vk86g4Nm5Rtl88AHvGkfoK','robertito@hotmail.utp.pe','estudiante','1'),(4,4,'juan','$2y$10$S.wXCodQx/jvWnzCkp3JxOIt2n/YuW8Vk86g4Nm5Rtl88AHvGkfoK','robertito@hotmail.utp.pe','estudiante','1');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-07 18:24:09
