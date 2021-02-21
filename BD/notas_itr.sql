-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-09-2013 a las 14:02:11
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `notas_itr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `ID_GRADO` int(11) NOT NULL,
  `ID_SECCIONES` varchar(4) NOT NULL,
  `ID_MATERIA` int(11) NOT NULL,
  `ID_ACTIVIDAD` varchar(10) NOT NULL,
  `ID_PROFESOR` int(11) NOT NULL,
  `ID_ALUMNO` varchar(10) NOT NULL,
  `NOTA` decimal(3,2) NOT NULL,
  PRIMARY KEY (`ID_GRADO`,`ID_SECCIONES`,`ID_MATERIA`,`ID_ACTIVIDAD`,`ID_PROFESOR`,`ID_ALUMNO`),
  UNIQUE KEY `ACTIVIDADES_IDX01` (`ID_GRADO`,`ID_SECCIONES`,`ID_MATERIA`,`ID_ACTIVIDAD`,`ID_PROFESOR`,`ID_ALUMNO`),
  KEY `ACTIVIDADES_IDX03` (`ID_PROFESOR`),
  KEY `ACTIVIDADES_IDX04` (`ID_MATERIA`),
  KEY `ACTIVIDADES_R01` (`ID_GRADO`,`ID_SECCIONES`,`ID_ALUMNO`),
  KEY `ACTIVIDADES_R02` (`ID_MATERIA`,`ID_PROFESOR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`ID_GRADO`, `ID_SECCIONES`, `ID_MATERIA`, `ID_ACTIVIDAD`, `ID_PROFESOR`, `ID_ALUMNO`, `NOTA`) VALUES
(1, 'UV', 2, '2', 6, '20136595', '8.00'),
(1, 'UV', 2, '25', 6, '20136595', '9.00'),
(1, 'UV', 2, '1', 6, '20136595', '9.99'),
(1, 'UV', 2, '2', 6, '20134189', '8.00'),
(1, 'UV', 3, '2', 6, '20136595', '9.99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_seccion`
--

CREATE TABLE IF NOT EXISTS `alumnos_seccion` (
  `ID_GRADO` int(11) NOT NULL,
  `ID_SECCIONES` varchar(4) NOT NULL,
  `ID_ALUMNO` varchar(10) NOT NULL,
  `STR_NOMBRE_ALUMNO` varchar(60) DEFAULT NULL,
  `STR_APELLIDO_ALUMNO` varchar(60) DEFAULT NULL,
  `STRNIE` varchar(25) DEFAULT NULL,
  `INTACTIVO` decimal(1,0) NOT NULL,
  `FECHA_REGISTRO` date NOT NULL,
  PRIMARY KEY (`ID_GRADO`,`ID_SECCIONES`,`ID_ALUMNO`),
  UNIQUE KEY `ALUMNOS_SECCION_01` (`ID_GRADO`,`ID_SECCIONES`,`ID_ALUMNO`),
  UNIQUE KEY `ALUMNOS_SECCION_IDX02` (`ID_ALUMNO`),
  KEY `ALUMNOS_SECCION_IDX03` (`STRNIE`),
  KEY `ALUMNOS_SECCION_IDX04` (`STR_APELLIDO_ALUMNO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos_seccion`
--

INSERT INTO `alumnos_seccion` (`ID_GRADO`, `ID_SECCIONES`, `ID_ALUMNO`, `STR_NOMBRE_ALUMNO`, `STR_APELLIDO_ALUMNO`, `STRNIE`, `INTACTIVO`, `FECHA_REGISTRO`) VALUES
(1, 'UV', '20133172', 'Miguel MoiÃ¨s', 'Guerra Figueroa', '12345678', '0', '2013-09-26'),
(1, 'UV', '20133344', 'ALEXIS JAVIER', 'BONILLA SURIANO', '78859632', '0', '2013-09-18'),
(1, 'UV', '20133932', 'GUSTAVO EDGARDO', 'CUBIAS LOPEZ', '8523698', '0', '2013-09-18'),
(1, 'UV', '20134189', 'SILVIA DEL CARMEN', 'CORTEZ DE BARAHONA', '78589651', '0', '2013-09-18'),
(1, 'UV', '20135158', 'LEONARDO ISAAC', 'BARAHONA CORTEZ', '3698523', '0', '2013-09-18'),
(1, 'UV', '20136595', 'JONATHAN ALEXADER', 'BARAHONA CORTEZ ', '1234567', '0', '2013-09-18'),
(1, 'UV', '20137512', 'MAURICIO ', 'VELASQUEZ', '9645987', '0', '2013-09-18'),
(1, 'UV', '20139716', 'JOSUE EDUARDO ', 'BARAHONA CORTEZ', '1478529', '0', '2013-09-18'),
(1, 'XZ', '20130575', 'JUAN MANUEL', 'VILLEDA CORDOVA', '1234558', '0', '2013-09-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_actividades`
--

CREATE TABLE IF NOT EXISTS `cat_actividades` (
  `ID_GRADO` int(11) NOT NULL,
  `ID_SECCIONES` varchar(4) NOT NULL,
  `ID_MATERIA` int(11) NOT NULL,
  `ID_ACTIVIDAD` varchar(10) NOT NULL,
  `ID_PROFESOR` int(11) NOT NULL,
  `IDTIPO_ACTIVIDAD` int(11) NOT NULL,
  `STR_NOMBRE` varchar(200) DEFAULT NULL,
  `PORCENTAJE` decimal(5,2) DEFAULT NULL,
  `FECHA_ENTREGA` date DEFAULT NULL,
  PRIMARY KEY (`ID_GRADO`,`ID_SECCIONES`,`ID_MATERIA`,`ID_ACTIVIDAD`,`ID_PROFESOR`),
  KEY `CAT_ACTIVIDADES_IDX02` (`IDTIPO_ACTIVIDAD`),
  KEY `CAT_ACTIVIDADES_IDX03` (`ID_PROFESOR`),
  KEY `CAT_ACTIVIDADES_IDX04` (`ID_MATERIA`),
  KEY `CAT_ACTIVIDADES_R01` (`ID_GRADO`,`ID_SECCIONES`),
  KEY `CAT_ACTIVIDADES_R02` (`ID_MATERIA`,`ID_PROFESOR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_actividades`
--

INSERT INTO `cat_actividades` (`ID_GRADO`, `ID_SECCIONES`, `ID_MATERIA`, `ID_ACTIVIDAD`, `ID_PROFESOR`, `IDTIPO_ACTIVIDAD`, `STR_NOMBRE`, `PORCENTAJE`, `FECHA_ENTREGA`) VALUES
(1, 'UV', 5, '1', 6, 1, 'TAREA DE INVETIGACION DEL LOS ARTICULOS DE LA CONSTITUCION', '2.00', '2013-09-22'),
(1, 'UV', 5, '2', 6, 1, 'REVISION DE CUADERNO DEL PERIODO', '15.00', '2013-09-10'),
(1, 'UV', 2, '25', 6, 2, 'SE REALIZARA UN EXAMEN POR CADA CLASE QUE SE RESIVA', '30.00', '2013-09-30'),
(1, 'UV', 2, '4', 6, 2, 'examen corto', '20.00', '2013-09-17');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consulta_notas`
--
CREATE TABLE IF NOT EXISTS `consulta_notas` (
`id_grado` int(11)
,`grado` varchar(60)
,`id_secciones` varchar(4)
,`str_secciones` varchar(60)
,`id_materia` int(11)
,`str_nombre` varchar(60)
,`id_profesor` int(11)
,`str_nombre_profesor` varchar(60)
,`str_apellido_profesor` varchar(60)
,`id_alumno` varchar(10)
,`str_nombre_alumno` varchar(60)
,`str_apellido_alumno` varchar(60)
,`nota` decimal(3,2)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE IF NOT EXISTS `grados` (
  `ID_GRADO` int(11) NOT NULL AUTO_INCREMENT COMMENT 'C�digo de Grado',
  `GRADO` varchar(60) NOT NULL COMMENT 'Descripci�n del Grado.',
  PRIMARY KEY (`ID_GRADO`),
  UNIQUE KEY `IDX_GRADO` (`ID_GRADO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`ID_GRADO`, `GRADO`) VALUES
(1, '1Â°Grado'),
(2, '2Â°Grado'),
(3, '3Â°Grado'),
(5, '5Â°Grado'),
(6, '6Â°Grado'),
(7, '7Â°Grado'),
(8, '8Â°Grado'),
(9, '9Â°Grado'),
(10, '1er AÃ±o'),
(11, '2nd AÃ±o'),
(12, '3er AÃ±o');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `grados_secciones`
--
CREATE TABLE IF NOT EXISTS `grados_secciones` (
`ID_GRADO` int(11)
,`GRADO` varchar(60)
,`ID_SECCIONES` varchar(4)
,`STR_SECCIONES` varchar(60)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE IF NOT EXISTS `maestros` (
  `ID_PROFESOR` int(11) NOT NULL AUTO_INCREMENT,
  `STR_CODIGO__PROFESOR` varchar(25) DEFAULT NULL,
  `STR_NOMBRE_PROFESOR` varchar(60) DEFAULT NULL,
  `STR_APELLIDO_PROFESOR` varchar(60) DEFAULT NULL,
  `FECHA_REGISTRO` date DEFAULT NULL,
  PRIMARY KEY (`ID_PROFESOR`),
  UNIQUE KEY `MAESTROS_IDX01` (`ID_PROFESOR`),
  KEY `MAESTROS_IDX02` (`STR_CODIGO__PROFESOR`),
  KEY `MAESTROS_IDX03` (`STR_APELLIDO_PROFESOR`,`STR_NOMBRE_PROFESOR`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`ID_PROFESOR`, `STR_CODIGO__PROFESOR`, `STR_NOMBRE_PROFESOR`, `STR_APELLIDO_PROFESOR`, `FECHA_REGISTRO`) VALUES
(6, 'PRO001', 'JUAN PABLO', 'MARTINEZ', '2013-09-07'),
(7, 'PRO002', 'ANA MERCEDES', 'SOSA', '2013-09-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros_materia`
--

CREATE TABLE IF NOT EXISTS `maestros_materia` (
  `ID_MATERIA` int(11) NOT NULL,
  `ID_PROFESOR` int(11) NOT NULL,
  PRIMARY KEY (`ID_MATERIA`,`ID_PROFESOR`),
  UNIQUE KEY `MAESTROS_MATERIA_IDX01` (`ID_MATERIA`,`ID_PROFESOR`),
  KEY `MAESTROS_MATERIA_IDX02` (`ID_PROFESOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maestros_materia`
--

INSERT INTO `maestros_materia` (`ID_MATERIA`, `ID_PROFESOR`) VALUES
(2, 6),
(3, 6),
(3, 7);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `maestros_materias`
--
CREATE TABLE IF NOT EXISTS `maestros_materias` (
`ID_MATERIA` int(11)
,`ID_PROFESOR` int(11)
,`STR_CODIGO` varchar(15)
,`STR_NOMBRE` varchar(60)
,`IDPROFESOR` varchar(25)
,`STR_NOMBRE_PROFESOR` varchar(60)
,`STR_APELLIDO_PROFESOR` varchar(60)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros_seccion`
--

CREATE TABLE IF NOT EXISTS `maestros_seccion` (
  `ID_GRADO` int(11) NOT NULL,
  `ID_SECCIONES` varchar(4) NOT NULL,
  `ID_PROFESOR` int(11) NOT NULL,
  PRIMARY KEY (`ID_GRADO`,`ID_SECCIONES`,`ID_PROFESOR`),
  UNIQUE KEY `MAESTROS_SECCION_IDX01` (`ID_GRADO`,`ID_SECCIONES`,`ID_PROFESOR`),
  KEY `MAESTROS_SECCION_IDX2` (`ID_PROFESOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='MAESTROS QUE DAN CLASES EN UNA SECCION';

--
-- Volcado de datos para la tabla `maestros_seccion`
--

INSERT INTO `maestros_seccion` (`ID_GRADO`, `ID_SECCIONES`, `ID_PROFESOR`) VALUES
(1, 'UV', 6),
(1, 'XZ', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `ID_MATERIA` int(11) NOT NULL AUTO_INCREMENT,
  `STR_CODIGO` varchar(15) NOT NULL COMMENT 'c�DIGO DE LA MATERIA',
  `STR_NOMBRE` varchar(60) NOT NULL COMMENT 'NOMBRE DE LA MATERIA',
  `FECHA_REGISTRO` date DEFAULT NULL,
  PRIMARY KEY (`ID_MATERIA`),
  UNIQUE KEY `MATERIAS_IDX02` (`STR_CODIGO`),
  KEY `MATERIAS_IDX01` (`ID_MATERIA`),
  KEY `MATERIAS_IDX03` (`STR_NOMBRE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`ID_MATERIA`, `STR_CODIGO`, `STR_NOMBRE`, `FECHA_REGISTRO`) VALUES
(2, 'SOC001', 'ESTUDIOS SOCIALES', '2013-08-25'),
(3, 'CN001', 'CIENCIAS NATURALES', '2013-08-25'),
(4, 'MAT001', 'MATEMATICA', '2013-09-07'),
(5, 'TEC0001', 'TECNOLOGIA', '2013-09-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_grados`
--

CREATE TABLE IF NOT EXISTS `materias_grados` (
  `ID_GRADO` int(11) NOT NULL,
  `ID_MATERIA` int(11) NOT NULL,
  PRIMARY KEY (`ID_GRADO`,`ID_MATERIA`),
  UNIQUE KEY `MATERIAS_GRADOS_IDX01` (`ID_GRADO`,`ID_MATERIA`),
  KEY `MATERIAS_GRADOS_IDX02` (`ID_MATERIA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias_grados`
--

INSERT INTO `materias_grados` (`ID_GRADO`, `ID_MATERIA`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE IF NOT EXISTS `secciones` (
  `ID_GRADO` int(11) NOT NULL,
  `ID_SECCIONES` varchar(4) NOT NULL COMMENT 'C�digo de la secci�n.',
  `STR_SECCIONES` varchar(60) NOT NULL,
  PRIMARY KEY (`ID_GRADO`,`ID_SECCIONES`),
  UNIQUE KEY `SECCIONES_IDX` (`ID_GRADO`,`ID_SECCIONES`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que guarda las secciones del grado.';

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`ID_GRADO`, `ID_SECCIONES`, `STR_SECCIONES`) VALUES
(1, 'UV', 'B'),
(1, 'XZ', 'A'),
(2, 'AI', 'B'),
(2, 'YL', 'A'),
(3, 'QB', 'B'),
(3, 'UZ', 'A'),
(5, 'WY', 'B'),
(5, 'YE', 'A'),
(6, 'EE', 'B'),
(6, 'N Q', 'A'),
(7, 'LP', 'B'),
(7, 'YQ', 'A'),
(8, 'AX', 'A'),
(8, 'MW', 'B'),
(9, 'AV', 'B'),
(9, 'LF', 'A'),
(10, 'N Q', 'A'),
(10, 'UE', 'B'),
(11, 'GI', 'B'),
(11, 'KW', 'A'),
(11, 'ZH', 'A'),
(12, 'AA', 'B'),
(12, 'KS', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_actividad`
--

CREATE TABLE IF NOT EXISTS `tipo_actividad` (
  `IDTIPO_ACTIVIDAD` int(11) NOT NULL,
  `STR_NOMBRE_ACTIVIDAD` varchar(60) NOT NULL,
  `ES_EXAMEN` decimal(1,0) NOT NULL DEFAULT '0',
  `ES_TAREA` decimal(1,0) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IDTIPO_ACTIVIDAD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_actividad`
--

INSERT INTO `tipo_actividad` (`IDTIPO_ACTIVIDAD`, `STR_NOMBRE_ACTIVIDAD`, `ES_EXAMEN`, `ES_TAREA`) VALUES
(1, 'TAREA', '0', '1'),
(2, 'EXAMEN CORTO', '0', '1'),
(3, 'EXAMEN', '1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `DE_USUARIO` text NOT NULL,
  `ES_PROFESOR` decimal(1,0) NOT NULL,
  `ES_ALUMNO` decimal(1,0) NOT NULL,
  `VIGENTE` decimal(1,0) NOT NULL,
  `PASSWORD` varchar(25) NOT NULL,
  `FECHA_REGISTRO` date NOT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `DE_USUARIO`, `ES_PROFESOR`, `ES_ALUMNO`, `VIGENTE`, `PASSWORD`, `FECHA_REGISTRO`) VALUES
(0, 'ADMIN001', '1', '0', '1', 'jonathan', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_actividades`
--
CREATE TABLE IF NOT EXISTS `vw_actividades` (
`ID_GRADO` int(11)
,`ID_SECCIONES` varchar(4)
,`ID_MATERIA` int(11)
,`ID_ACTIVIDAD` varchar(10)
,`ID_PROFESOR` int(11)
,`IDTIPO_ACTIVIDAD` int(11)
,`NOMBRE_ACTIVIDAD` varchar(200)
,`PORCENTAJE` decimal(5,2)
,`FECHA_ENTREGA` date
,`GRADO` varchar(60)
,`STR_SECCIONES` varchar(60)
,`STR_CODIGO` varchar(15)
,`NOMBRE_MATERIA` varchar(60)
,`STR_CODIGO__PROFESOR` varchar(25)
,`STR_NOMBRE_PROFESOR` varchar(60)
,`STR_APELLIDO_PROFESOR` varchar(60)
,`STR_NOMBRE_ACTIVIDAD` varchar(60)
,`ES_EXAMEN` decimal(1,0)
,`ES_TAREA` decimal(1,0)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_alumnos_actividades`
--
CREATE TABLE IF NOT EXISTS `vw_alumnos_actividades` (
`ID_GRADO` int(11)
,`ID_SECCIONES` varchar(4)
,`ID_ALUMNO` varchar(10)
,`STR_NOMBRE_ALUMNO` varchar(60)
,`STR_APELLIDO_ALUMNO` varchar(60)
,`ID_PROFESOR` int(11)
,`ID_MATERIA` int(11)
,`ID_ACTIVIDAD` varchar(10)
,`NOMBRE_ACTIVIDAD` varchar(200)
,`PORCENTAJE` decimal(5,2)
,`GRADO` varchar(60)
,`STR_SECCIONES` varchar(60)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_alumnos_notas`
--
CREATE TABLE IF NOT EXISTS `vw_alumnos_notas` (
`ID_GRADO` int(11)
,`ID_SECCIONES` varchar(4)
,`ID_MATERIA` int(11)
,`ID_ACTIVIDAD` varchar(10)
,`ID_PROFESOR` int(11)
,`ID_ALUMNO` varchar(10)
,`NOTA` decimal(3,2)
,`GRADO` varchar(60)
,`STR_SECCIONES` varchar(60)
,`STR_CODIGO` varchar(15)
,`NOMBRE_MATERIA` varchar(60)
,`NOMBRE_ACTIVIDAD` varchar(200)
,`PORCENTAJE` decimal(5,2)
,`IDTIPO_ACTIVIDAD` int(11)
,`FECHA_ENTREGA` date
,`STR_CODIGO__PROFESOR` varchar(25)
,`STR_NOMBRE_PROFESOR` varchar(60)
,`STR_APELLIDO_PROFESOR` varchar(60)
,`STR_NOMBRE_ALUMNO` varchar(60)
,`STR_APELLIDO_ALUMNO` varchar(60)
,`STRNIE` varchar(25)
,`STR_NOMBRE_ACTIVIDAD` varchar(60)
,`ES_EXAMEN` decimal(1,0)
,`ES_TAREA` decimal(1,0)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_alumnos_para_notas`
--
CREATE TABLE IF NOT EXISTS `vw_alumnos_para_notas` (
`ID_GRADO` int(11)
,`ID_SECCIONES` varchar(4)
,`ID_ALUMNO` varchar(10)
,`STR_NOMBRE_ALUMNO` varchar(60)
,`STR_APELLIDO_ALUMNO` varchar(60)
,`ID_PROFESOR` int(11)
,`ID_MATERIA` int(11)
,`ID_ACTIVIDAD` varchar(10)
,`NOMBRE_ACTIVIDAD` varchar(200)
,`PORCENTAJE` decimal(5,2)
,`GRADO` varchar(60)
,`STR_SECCIONES` varchar(60)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_listamaestros`
--
CREATE TABLE IF NOT EXISTS `vw_listamaestros` (
`id_materia` int(11)
,`id_profesor` int(11)
,`cod_materia` varchar(15)
,`nombre_materia` varchar(60)
,`str_codigo__profesor` varchar(25)
,`str_nombre_profesor` varchar(60)
,`str_apellido_profesor` varchar(60)
,`id_grado` int(11)
,`id_secciones` varchar(4)
,`nombre_grado` varchar(60)
,`str_secciones` varchar(60)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_mostrar_alumnos_grados`
--
CREATE TABLE IF NOT EXISTS `vw_mostrar_alumnos_grados` (
`ID_GRADO` int(11)
,`GRADO` varchar(60)
,`ID_SECCIONES` varchar(4)
,`STR_SECCIONES` varchar(60)
,`ID_ALUMNO` varchar(10)
,`STR_NOMBRE_ALUMNO` varchar(60)
,`STR_APELLIDO_ALUMNO` varchar(60)
,`STRNIE` varchar(25)
,`FECHA_REGISTRO` date
);
-- --------------------------------------------------------

--
-- Estructura para la vista `consulta_notas`
--
DROP TABLE IF EXISTS `consulta_notas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consulta_notas` AS select `grados`.`ID_GRADO` AS `id_grado`,`grados`.`GRADO` AS `grado`,`secciones`.`ID_SECCIONES` AS `id_secciones`,`secciones`.`STR_SECCIONES` AS `str_secciones`,`actividades`.`ID_MATERIA` AS `id_materia`,`materias`.`STR_NOMBRE` AS `str_nombre`,`actividades`.`ID_PROFESOR` AS `id_profesor`,`maestros`.`STR_NOMBRE_PROFESOR` AS `str_nombre_profesor`,`maestros`.`STR_APELLIDO_PROFESOR` AS `str_apellido_profesor`,`actividades`.`ID_ALUMNO` AS `id_alumno`,`alumnos_seccion`.`STR_NOMBRE_ALUMNO` AS `str_nombre_alumno`,`alumnos_seccion`.`STR_APELLIDO_ALUMNO` AS `str_apellido_alumno`,`actividades`.`NOTA` AS `nota` from (((((`actividades` left join `grados` on((`actividades`.`ID_GRADO` = `grados`.`ID_GRADO`))) left join `secciones` on((convert(`actividades`.`ID_SECCIONES` using utf8) = `secciones`.`ID_SECCIONES`))) left join `materias` on((`actividades`.`ID_MATERIA` = `materias`.`ID_MATERIA`))) left join `maestros` on((`actividades`.`ID_PROFESOR` = `maestros`.`ID_PROFESOR`))) left join `alumnos_seccion` on((convert(`actividades`.`ID_ALUMNO` using utf8) = `alumnos_seccion`.`ID_ALUMNO`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `grados_secciones`
--
DROP TABLE IF EXISTS `grados_secciones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grados_secciones` AS select `grados`.`ID_GRADO` AS `ID_GRADO`,`grados`.`GRADO` AS `GRADO`,`secciones`.`ID_SECCIONES` AS `ID_SECCIONES`,`secciones`.`STR_SECCIONES` AS `STR_SECCIONES` from (`grados` left join `secciones` on((`grados`.`ID_GRADO` = `secciones`.`ID_GRADO`))) where (`secciones`.`ID_GRADO` is not null) order by `grados`.`ID_GRADO`,`secciones`.`ID_SECCIONES`;

-- --------------------------------------------------------

--
-- Estructura para la vista `maestros_materias`
--
DROP TABLE IF EXISTS `maestros_materias`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `maestros_materias` AS select `maestros_materia`.`ID_MATERIA` AS `ID_MATERIA`,`maestros_materia`.`ID_PROFESOR` AS `ID_PROFESOR`,`materias`.`STR_CODIGO` AS `STR_CODIGO`,`materias`.`STR_NOMBRE` AS `STR_NOMBRE`,`maestros`.`STR_CODIGO__PROFESOR` AS `IDPROFESOR`,`maestros`.`STR_NOMBRE_PROFESOR` AS `STR_NOMBRE_PROFESOR`,`maestros`.`STR_APELLIDO_PROFESOR` AS `STR_APELLIDO_PROFESOR` from ((`maestros_materia` left join `materias` on((`maestros_materia`.`ID_MATERIA` = `materias`.`ID_MATERIA`))) left join `maestros` on((`maestros_materia`.`ID_PROFESOR` = `maestros`.`ID_PROFESOR`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_actividades`
--
DROP TABLE IF EXISTS `vw_actividades`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_actividades` AS select `cat_actividades`.`ID_GRADO` AS `ID_GRADO`,`cat_actividades`.`ID_SECCIONES` AS `ID_SECCIONES`,`cat_actividades`.`ID_MATERIA` AS `ID_MATERIA`,`cat_actividades`.`ID_ACTIVIDAD` AS `ID_ACTIVIDAD`,`cat_actividades`.`ID_PROFESOR` AS `ID_PROFESOR`,`cat_actividades`.`IDTIPO_ACTIVIDAD` AS `IDTIPO_ACTIVIDAD`,`cat_actividades`.`STR_NOMBRE` AS `NOMBRE_ACTIVIDAD`,`cat_actividades`.`PORCENTAJE` AS `PORCENTAJE`,`cat_actividades`.`FECHA_ENTREGA` AS `FECHA_ENTREGA`,`grados`.`GRADO` AS `GRADO`,`secciones`.`STR_SECCIONES` AS `STR_SECCIONES`,`materias`.`STR_CODIGO` AS `STR_CODIGO`,`materias`.`STR_NOMBRE` AS `NOMBRE_MATERIA`,`maestros`.`STR_CODIGO__PROFESOR` AS `STR_CODIGO__PROFESOR`,`maestros`.`STR_NOMBRE_PROFESOR` AS `STR_NOMBRE_PROFESOR`,`maestros`.`STR_APELLIDO_PROFESOR` AS `STR_APELLIDO_PROFESOR`,`tipo_actividad`.`STR_NOMBRE_ACTIVIDAD` AS `STR_NOMBRE_ACTIVIDAD`,`tipo_actividad`.`ES_EXAMEN` AS `ES_EXAMEN`,`tipo_actividad`.`ES_TAREA` AS `ES_TAREA` from (((((`cat_actividades` left join `grados` on((`cat_actividades`.`ID_GRADO` = `grados`.`ID_GRADO`))) left join `secciones` on(((`cat_actividades`.`ID_GRADO` = `secciones`.`ID_GRADO`) and (convert(`cat_actividades`.`ID_SECCIONES` using utf8) = `secciones`.`ID_SECCIONES`)))) left join `materias` on((`cat_actividades`.`ID_MATERIA` = `materias`.`ID_MATERIA`))) left join `maestros` on((`cat_actividades`.`ID_PROFESOR` = `maestros`.`ID_PROFESOR`))) left join `tipo_actividad` on((`cat_actividades`.`IDTIPO_ACTIVIDAD` = `tipo_actividad`.`IDTIPO_ACTIVIDAD`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_alumnos_actividades`
--
DROP TABLE IF EXISTS `vw_alumnos_actividades`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_alumnos_actividades` AS select `alumnos_seccion`.`ID_GRADO` AS `ID_GRADO`,`alumnos_seccion`.`ID_SECCIONES` AS `ID_SECCIONES`,`alumnos_seccion`.`ID_ALUMNO` AS `ID_ALUMNO`,`alumnos_seccion`.`STR_NOMBRE_ALUMNO` AS `STR_NOMBRE_ALUMNO`,`alumnos_seccion`.`STR_APELLIDO_ALUMNO` AS `STR_APELLIDO_ALUMNO`,`maestros_seccion`.`ID_PROFESOR` AS `ID_PROFESOR`,`maestros_materia`.`ID_MATERIA` AS `ID_MATERIA`,`cat_actividades`.`ID_ACTIVIDAD` AS `ID_ACTIVIDAD`,`cat_actividades`.`STR_NOMBRE` AS `NOMBRE_ACTIVIDAD`,`cat_actividades`.`PORCENTAJE` AS `PORCENTAJE`,`grados`.`GRADO` AS `GRADO`,`secciones`.`STR_SECCIONES` AS `STR_SECCIONES` from (((((`alumnos_seccion` left join `maestros_seccion` on(((`alumnos_seccion`.`ID_GRADO` = `maestros_seccion`.`ID_GRADO`) and (`alumnos_seccion`.`ID_SECCIONES` = `maestros_seccion`.`ID_SECCIONES`)))) left join `maestros_materia` on((`maestros_seccion`.`ID_PROFESOR` = `maestros_materia`.`ID_PROFESOR`))) left join `cat_actividades` on(((`alumnos_seccion`.`ID_GRADO` = `cat_actividades`.`ID_GRADO`) and (`alumnos_seccion`.`ID_SECCIONES` = convert(`cat_actividades`.`ID_SECCIONES` using utf8))))) left join `grados` on((`alumnos_seccion`.`ID_GRADO` = `grados`.`ID_GRADO`))) left join `secciones` on(((`alumnos_seccion`.`ID_GRADO` = `secciones`.`ID_GRADO`) and (`alumnos_seccion`.`ID_SECCIONES` = `secciones`.`ID_SECCIONES`)))) order by `alumnos_seccion`.`ID_GRADO`,`alumnos_seccion`.`ID_SECCIONES`,`alumnos_seccion`.`STR_APELLIDO_ALUMNO`,`alumnos_seccion`.`STR_NOMBRE_ALUMNO`;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_alumnos_notas`
--
DROP TABLE IF EXISTS `vw_alumnos_notas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_alumnos_notas` AS select `actividades`.`ID_GRADO` AS `ID_GRADO`,`actividades`.`ID_SECCIONES` AS `ID_SECCIONES`,`actividades`.`ID_MATERIA` AS `ID_MATERIA`,`actividades`.`ID_ACTIVIDAD` AS `ID_ACTIVIDAD`,`actividades`.`ID_PROFESOR` AS `ID_PROFESOR`,`actividades`.`ID_ALUMNO` AS `ID_ALUMNO`,`actividades`.`NOTA` AS `NOTA`,`grados`.`GRADO` AS `GRADO`,`secciones`.`STR_SECCIONES` AS `STR_SECCIONES`,`materias`.`STR_CODIGO` AS `STR_CODIGO`,`materias`.`STR_NOMBRE` AS `NOMBRE_MATERIA`,`cat_actividades`.`STR_NOMBRE` AS `NOMBRE_ACTIVIDAD`,`cat_actividades`.`PORCENTAJE` AS `PORCENTAJE`,`cat_actividades`.`IDTIPO_ACTIVIDAD` AS `IDTIPO_ACTIVIDAD`,`cat_actividades`.`FECHA_ENTREGA` AS `FECHA_ENTREGA`,`maestros`.`STR_CODIGO__PROFESOR` AS `STR_CODIGO__PROFESOR`,`maestros`.`STR_NOMBRE_PROFESOR` AS `STR_NOMBRE_PROFESOR`,`maestros`.`STR_APELLIDO_PROFESOR` AS `STR_APELLIDO_PROFESOR`,`alumnos_seccion`.`STR_NOMBRE_ALUMNO` AS `STR_NOMBRE_ALUMNO`,`alumnos_seccion`.`STR_APELLIDO_ALUMNO` AS `STR_APELLIDO_ALUMNO`,`alumnos_seccion`.`STRNIE` AS `STRNIE`,`tipo_actividad`.`STR_NOMBRE_ACTIVIDAD` AS `STR_NOMBRE_ACTIVIDAD`,`tipo_actividad`.`ES_EXAMEN` AS `ES_EXAMEN`,`tipo_actividad`.`ES_TAREA` AS `ES_TAREA` from (((((((`actividades` left join `grados` on((`actividades`.`ID_GRADO` = `grados`.`ID_GRADO`))) left join `secciones` on(((`actividades`.`ID_GRADO` = `secciones`.`ID_GRADO`) and (convert(`actividades`.`ID_SECCIONES` using utf8) = `secciones`.`ID_SECCIONES`)))) left join `materias` on((`actividades`.`ID_MATERIA` = `materias`.`ID_MATERIA`))) left join `cat_actividades` on(((`actividades`.`ID_MATERIA` = `cat_actividades`.`ID_MATERIA`) and (`actividades`.`ID_GRADO` = `cat_actividades`.`ID_GRADO`) and (`actividades`.`ID_SECCIONES` = `cat_actividades`.`ID_SECCIONES`) and (`actividades`.`ID_ACTIVIDAD` = `cat_actividades`.`ID_ACTIVIDAD`) and (`actividades`.`ID_PROFESOR` = `cat_actividades`.`ID_PROFESOR`)))) left join `maestros` on((`actividades`.`ID_PROFESOR` = `maestros`.`ID_PROFESOR`))) left join `alumnos_seccion` on(((`actividades`.`ID_GRADO` = `alumnos_seccion`.`ID_GRADO`) and (convert(`actividades`.`ID_SECCIONES` using utf8) = `alumnos_seccion`.`ID_SECCIONES`) and (convert(`actividades`.`ID_ALUMNO` using utf8) = `alumnos_seccion`.`ID_ALUMNO`)))) left join `tipo_actividad` on((`cat_actividades`.`IDTIPO_ACTIVIDAD` = `tipo_actividad`.`IDTIPO_ACTIVIDAD`))) order by `actividades`.`ID_GRADO`,`actividades`.`ID_SECCIONES`,`actividades`.`ID_MATERIA`,`actividades`.`ID_ACTIVIDAD`,`actividades`.`ID_PROFESOR`,`alumnos_seccion`.`STR_APELLIDO_ALUMNO`,`alumnos_seccion`.`STR_NOMBRE_ALUMNO`;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_alumnos_para_notas`
--
DROP TABLE IF EXISTS `vw_alumnos_para_notas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_alumnos_para_notas` AS select `alumnos_seccion`.`ID_GRADO` AS `ID_GRADO`,`alumnos_seccion`.`ID_SECCIONES` AS `ID_SECCIONES`,`alumnos_seccion`.`ID_ALUMNO` AS `ID_ALUMNO`,`alumnos_seccion`.`STR_NOMBRE_ALUMNO` AS `STR_NOMBRE_ALUMNO`,`alumnos_seccion`.`STR_APELLIDO_ALUMNO` AS `STR_APELLIDO_ALUMNO`,`maestros_seccion`.`ID_PROFESOR` AS `ID_PROFESOR`,`maestros_materia`.`ID_MATERIA` AS `ID_MATERIA`,`cat_actividades`.`ID_ACTIVIDAD` AS `ID_ACTIVIDAD`,`cat_actividades`.`STR_NOMBRE` AS `NOMBRE_ACTIVIDAD`,`cat_actividades`.`PORCENTAJE` AS `PORCENTAJE`,`grados`.`GRADO` AS `GRADO`,`secciones`.`STR_SECCIONES` AS `STR_SECCIONES` from (((((`alumnos_seccion` left join `maestros_seccion` on(((`alumnos_seccion`.`ID_GRADO` = `maestros_seccion`.`ID_GRADO`) and (`alumnos_seccion`.`ID_SECCIONES` = `maestros_seccion`.`ID_SECCIONES`)))) left join `maestros_materia` on((`maestros_seccion`.`ID_PROFESOR` = `maestros_materia`.`ID_PROFESOR`))) left join `cat_actividades` on(((`alumnos_seccion`.`ID_GRADO` = `cat_actividades`.`ID_GRADO`) and (`alumnos_seccion`.`ID_SECCIONES` = convert(`cat_actividades`.`ID_SECCIONES` using utf8))))) left join `grados` on((`alumnos_seccion`.`ID_GRADO` = `grados`.`ID_GRADO`))) left join `secciones` on(((`alumnos_seccion`.`ID_GRADO` = `secciones`.`ID_GRADO`) and (`alumnos_seccion`.`ID_SECCIONES` = `secciones`.`ID_SECCIONES`)))) where (`cat_actividades`.`ID_ACTIVIDAD` is not null) order by `alumnos_seccion`.`ID_GRADO`,`alumnos_seccion`.`ID_SECCIONES`,`alumnos_seccion`.`STR_APELLIDO_ALUMNO`,`alumnos_seccion`.`STR_NOMBRE_ALUMNO`;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_listamaestros`
--
DROP TABLE IF EXISTS `vw_listamaestros`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_listamaestros` AS select `maestros_materia`.`ID_MATERIA` AS `id_materia`,`maestros_materia`.`ID_PROFESOR` AS `id_profesor`,`materias`.`STR_CODIGO` AS `cod_materia`,`materias`.`STR_NOMBRE` AS `nombre_materia`,`maestros`.`STR_CODIGO__PROFESOR` AS `str_codigo__profesor`,`maestros`.`STR_NOMBRE_PROFESOR` AS `str_nombre_profesor`,`maestros`.`STR_APELLIDO_PROFESOR` AS `str_apellido_profesor`,`materias_grados`.`ID_GRADO` AS `id_grado`,`maestros_seccion`.`ID_SECCIONES` AS `id_secciones`,`grados`.`GRADO` AS `nombre_grado`,`secciones`.`STR_SECCIONES` AS `str_secciones` from ((((((`maestros_materia` left join `materias` on((`maestros_materia`.`ID_MATERIA` = `materias`.`ID_MATERIA`))) left join `maestros` on((`maestros_materia`.`ID_PROFESOR` = `maestros`.`ID_PROFESOR`))) left join `materias_grados` on((`maestros_materia`.`ID_MATERIA` = `materias_grados`.`ID_MATERIA`))) left join `maestros_seccion` on((`materias_grados`.`ID_GRADO` = `maestros_seccion`.`ID_GRADO`))) left join `grados` on((`materias_grados`.`ID_GRADO` = `grados`.`ID_GRADO`))) left join `secciones` on(((`materias_grados`.`ID_GRADO` = `secciones`.`ID_GRADO`) and (`maestros_seccion`.`ID_SECCIONES` = `secciones`.`ID_SECCIONES`)))) where (`materias_grados`.`ID_GRADO` is not null) order by `secciones`.`STR_SECCIONES`;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_mostrar_alumnos_grados`
--
DROP TABLE IF EXISTS `vw_mostrar_alumnos_grados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_mostrar_alumnos_grados` AS select `alumnos_seccion`.`ID_GRADO` AS `ID_GRADO`,`grados`.`GRADO` AS `GRADO`,`alumnos_seccion`.`ID_SECCIONES` AS `ID_SECCIONES`,`secciones`.`STR_SECCIONES` AS `STR_SECCIONES`,`alumnos_seccion`.`ID_ALUMNO` AS `ID_ALUMNO`,`alumnos_seccion`.`STR_NOMBRE_ALUMNO` AS `STR_NOMBRE_ALUMNO`,`alumnos_seccion`.`STR_APELLIDO_ALUMNO` AS `STR_APELLIDO_ALUMNO`,`alumnos_seccion`.`STRNIE` AS `STRNIE`,`alumnos_seccion`.`FECHA_REGISTRO` AS `FECHA_REGISTRO` from ((`alumnos_seccion` left join `grados` on((`alumnos_seccion`.`ID_GRADO` = `grados`.`ID_GRADO`))) left join `secciones` on(((`alumnos_seccion`.`ID_GRADO` = `secciones`.`ID_GRADO`) and (`alumnos_seccion`.`ID_SECCIONES` = `secciones`.`ID_SECCIONES`)))) order by `alumnos_seccion`.`ID_GRADO`,`alumnos_seccion`.`ID_SECCIONES`,`alumnos_seccion`.`STR_APELLIDO_ALUMNO`,`alumnos_seccion`.`STR_NOMBRE_ALUMNO`;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos_seccion`
--
ALTER TABLE `alumnos_seccion`
  ADD CONSTRAINT `ALUMNOS_SECCION_R01` FOREIGN KEY (`ID_GRADO`, `ID_SECCIONES`) REFERENCES `secciones` (`ID_GRADO`, `ID_SECCIONES`);

--
-- Filtros para la tabla `maestros_materia`
--
ALTER TABLE `maestros_materia`
  ADD CONSTRAINT `MAESTROS_MATERIA_R01` FOREIGN KEY (`ID_MATERIA`) REFERENCES `materias` (`ID_MATERIA`),
  ADD CONSTRAINT `MAESTROS_MATERIA_R02` FOREIGN KEY (`ID_PROFESOR`) REFERENCES `maestros` (`ID_PROFESOR`);

--
-- Filtros para la tabla `maestros_seccion`
--
ALTER TABLE `maestros_seccion`
  ADD CONSTRAINT `MAESTROS_SECCION_R01` FOREIGN KEY (`ID_PROFESOR`) REFERENCES `maestros` (`ID_PROFESOR`),
  ADD CONSTRAINT `MAESTROS_SECCION_R02` FOREIGN KEY (`ID_GRADO`, `ID_SECCIONES`) REFERENCES `secciones` (`ID_GRADO`, `ID_SECCIONES`);

--
-- Filtros para la tabla `materias_grados`
--
ALTER TABLE `materias_grados`
  ADD CONSTRAINT `MATERIAS_GRADOS_R01` FOREIGN KEY (`ID_MATERIA`) REFERENCES `materias` (`ID_MATERIA`),
  ADD CONSTRAINT `MATERIAS_GRADOS_R02` FOREIGN KEY (`ID_GRADO`) REFERENCES `grados` (`ID_GRADO`);

--
-- Filtros para la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD CONSTRAINT `SECCIONES_R01` FOREIGN KEY (`ID_GRADO`) REFERENCES `grados` (`ID_GRADO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
