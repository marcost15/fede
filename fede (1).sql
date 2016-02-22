-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 06-02-2016 a las 18:09:56
-- Versión del servidor: 5.0.45
-- Versión de PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `fede`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `consejo_comunal`
-- 

CREATE TABLE `consejo_comunal` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `vocero` varchar(255) collate utf8_spanish_ci NOT NULL,
  `cargo` varchar(255) collate utf8_spanish_ci NOT NULL,
  `correo` varchar(50) collate utf8_spanish_ci NOT NULL,
  `telf` varchar(11) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `consejo_comunal`
-- 

INSERT INTO `consejo_comunal` VALUES (1, 'PATRIA QUERIDA', 'JUAN LOPEZ', 'TESORERO', 'juanlz@hotmail.com', '04165438907');
INSERT INTO `consejo_comunal` VALUES (2, 'VISTA HERMOSA', 'CARMEN VILLEGAS', 'VIVIENDA', 'villegasca@hotmail.com', '04268975600');
INSERT INTO `consejo_comunal` VALUES (3, 'LA BOLIVARIANA', 'EDUARDO MOLINA', 'ADMINISTRATIVO', 'edum@hotmail.com', '04163458790');
INSERT INTO `consejo_comunal` VALUES (4, 'EL TURAGUAL', 'JOSE AGUILAR', 'CONTRALORIA', 'joaguilar@hotmail.com', '04243279908');
INSERT INTO `consejo_comunal` VALUES (5, 'EL BUEN CIUDADANO', 'MARLENE GONZALEZ', 'ALIMENTACION', 'mar_g@hotmail.com', '04142546787');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `contratos`
-- 

CREATE TABLE `contratos` (
  `id` int(6) NOT NULL auto_increment,
  `codigo_contrato` varchar(255) collate utf8_spanish_ci NOT NULL,
  `codigo_dea` varchar(10) collate utf8_spanish_ci NOT NULL,
  `tiempo_ejec` varchar(255) collate utf8_spanish_ci NOT NULL,
  `desc_trabajo` varchar(255) collate utf8_spanish_ci NOT NULL,
  `plan` varchar(255) collate utf8_spanish_ci NOT NULL,
  `modalidad_atencion` enum('REHABILITACION','AMPLIACION','CONSTRUCCION NUEVA') collate utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_terminacion` date NOT NULL,
  `fecha_paralizacion` date NOT NULL,
  `motivo_paralizacion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `fecha_reinicio` date NOT NULL,
  `fecha_prorroga` date NOT NULL,
  `nro_dias_prorroga` int(4) NOT NULL,
  `motivo_prorroga` varchar(255) collate utf8_spanish_ci NOT NULL,
  `fecha_culminacion` date NOT NULL,
  `monto_val_pagadas` varchar(255) collate utf8_spanish_ci NOT NULL,
  `poc_ejec_financiero` varchar(255) collate utf8_spanish_ci NOT NULL,
  `poc_ejec_fisico` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` enum('EN EJECUCION','PARALIZADA','TERMINADA','CERRADA','RESCINDIDA') collate utf8_spanish_ci NOT NULL,
  `observacion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `monto_contratado` varchar(255) collate utf8_spanish_ci NOT NULL,
  `aumento` varchar(255) collate utf8_spanish_ci NOT NULL,
  `empleos_directos` varchar(255) collate utf8_spanish_ci NOT NULL,
  `empleos_indirectos` varchar(255) collate utf8_spanish_ci NOT NULL,
  `empresa_id` int(6) NOT NULL,
  `personal_insp` int(6) NOT NULL,
  `ing_residente` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `contratos`
-- 

INSERT INTO `contratos` VALUES (1, '433443', '1234567989', '5 MESES', 'DFDSFSDFSD', 'FSDSDFFSD', 'REHABILITACION', '2015-03-31', '2015-04-02', '0000-00-00', '', '0000-00-00', '0000-00-00', 0, 'FSDSDFSDF', '0000-00-00', '24342323', '34', '34', 'EN EJECUCION', 'DFSSDFSDF', '42233432', '432432234', '344', '3', 1, 1, 2);
INSERT INTO `contratos` VALUES (2, '95823566', 'OD02502102', '4 AÑOS', 'BOCONO', 'TERMINADO', 'REHABILITACION', '2010-09-15', '2014-09-15', '0000-00-00', '', '0000-00-00', '0000-00-00', 0, '', '0000-00-00', '', '', '', 'EN EJECUCION', '', '', '', '', '', 1, 1, 2);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `convenios`
-- 

CREATE TABLE `convenios` (
  `id` int(6) NOT NULL auto_increment,
  `codigo_dea` varchar(10) collate utf8_spanish_ci NOT NULL,
  `nro_convenio` varchar(255) collate utf8_spanish_ci NOT NULL,
  `ejecutor` varchar(255) collate utf8_spanish_ci NOT NULL,
  `monto` varchar(255) collate utf8_spanish_ci NOT NULL,
  `tipo` enum('PREVENTIVO','CORRECTIVO','INTERINSTITUCIONAL') collate utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_terminacion` date NOT NULL,
  `fecha_paralizacion` date NOT NULL,
  `fecha_reinicio` date NOT NULL,
  `motivo_paralizacion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` enum('EN EJECUCION','PARALIZADA','TERMINADA','CERRADA','RESCINDIDA') collate utf8_spanish_ci NOT NULL,
  `plan` varchar(255) collate utf8_spanish_ci NOT NULL,
  `descripcion_trabajos` varchar(255) collate utf8_spanish_ci NOT NULL,
  `observacion` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `convenios`
-- 

INSERT INTO `convenios` VALUES (1, '1234567989', '2344243223', 'SIMON SALAS', '432.00', 'PREVENTIVO', '2015-04-27', '2015-04-27', '2015-04-27', '2015-04-27', '', 'EN EJECUCION', 'TERMINADO', '', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `dotacion`
-- 

CREATE TABLE `dotacion` (
  `id` int(6) NOT NULL auto_increment,
  `fecha` date NOT NULL,
  `fecha_dotacion` date NOT NULL,
  `nro_memo` varchar(255) collate utf8_spanish_ci NOT NULL,
  `gerencia` varchar(255) collate utf8_spanish_ci NOT NULL,
  `codigo_dea` varchar(10) collate utf8_spanish_ci NOT NULL,
  `cod_dotacion` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

-- 
-- Volcar la base de datos para la tabla `dotacion`
-- 

INSERT INTO `dotacion` VALUES (9, '2016-01-30', '0000-00-00', '875943879', 'ADMINISTRATIVA', '1234567989', 'DOT9845');
INSERT INTO `dotacion` VALUES (7, '2010-09-15', '2010-08-14', '75433', 'ADMINISTRATIVA', 'OD02502102', '7595868');
INSERT INTO `dotacion` VALUES (8, '2016-01-20', '2016-01-30', '098488587', 'ADMINISTRATIVA', '1234567989', 'DOT98233');
INSERT INTO `dotacion` VALUES (6, '2016-01-05', '0000-00-00', '2341223', 'ADMINISTRATIVA', '1234567989', 'DOT3405');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `dotacion_mobiliario`
-- 

CREATE TABLE `dotacion_mobiliario` (
  `id` int(6) NOT NULL auto_increment,
  `dotacion_id` int(6) NOT NULL,
  `tipo` varchar(255) collate utf8_spanish_ci NOT NULL,
  `tipo_mobiliario` varchar(255) collate utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `empresa` varchar(255) collate utf8_spanish_ci NOT NULL,
  `monto` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='UNA SOLA EMPRESA POR TIPO DE MOBILIARIO' AUTO_INCREMENT=16 ;

-- 
-- Volcar la base de datos para la tabla `dotacion_mobiliario`
-- 

INSERT INTO `dotacion_mobiliario` VALUES (1, 1, '', '', 'FDSSFSDFSD', 'DFSFSDFSD', '4342323');
INSERT INTO `dotacion_mobiliario` VALUES (2, 1, '', '', 'FDSSFSDFSD', 'DFSFSDFSD', '4342323');
INSERT INTO `dotacion_mobiliario` VALUES (4, 4, 'SOLICITUD', '', 'SDFFSDF', 'FDFSDSFD', '2344243');
INSERT INTO `dotacion_mobiliario` VALUES (5, 4, 'SOLICITUD', '', 'FDSFSDFDS', 'FSFSD', '43423');
INSERT INTO `dotacion_mobiliario` VALUES (6, 4, 'SOLICITUD', '', 'fdfsdfdssd', 'FDSSDFSD', '3423');
INSERT INTO `dotacion_mobiliario` VALUES (7, 4, 'DOTADO', '', 'WRWEWEQRWEWE', 'EWRWEREWWER', '2000');
INSERT INTO `dotacion_mobiliario` VALUES (8, 4, 'SOLICITUD', 'SDFSSDF', 'DFSDFFSD', 'FSDFSDSFD', '2000');
INSERT INTO `dotacion_mobiliario` VALUES (9, 5, 'SOLICITUD', 'LKJLKJLKJ', 'HLKJHKJ', '', '');
INSERT INTO `dotacion_mobiliario` VALUES (10, 5, 'DOTADO', 'KJKJLKJ', 'KJLKJLK', 'RTTRTR', '0989809,99');
INSERT INTO `dotacion_mobiliario` VALUES (11, 6, 'SOLICITUD', 'MOBILIARIO ADMINISTRATIVO', 'MESAS', '', '');
INSERT INTO `dotacion_mobiliario` VALUES (12, 6, 'DOTADO', 'MOBILIARIO ADMINISTRATIVO', 'MESAS', 'COOPERATIVA CARPINTRUJ', '123800.00');
INSERT INTO `dotacion_mobiliario` VALUES (13, 8, 'SOLICITUD', 'MOBILIARIO ADMINISTRATIVO', 'MESAS', '', '');
INSERT INTO `dotacion_mobiliario` VALUES (14, 8, 'SOLICITUD', 'COCINA', 'BANDEJAS', '', '');
INSERT INTO `dotacion_mobiliario` VALUES (15, 8, 'DOTADO', 'MOBILIARIO ADMINISTRATIVO', 'MESAS', 'COOPERATIVA MADERAS ORINOCO', '89000.45');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `empresas`
-- 

CREATE TABLE `empresas` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `rif` varchar(15) collate utf8_spanish_ci NOT NULL,
  `tlf` varchar(11) collate utf8_spanish_ci NOT NULL,
  `repre_legal` varchar(255) collate utf8_spanish_ci NOT NULL,
  `cedula` varchar(15) collate utf8_spanish_ci NOT NULL,
  `tlf_repre` varchar(11) collate utf8_spanish_ci NOT NULL,
  `correo` varchar(50) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `empresas`
-- 

INSERT INTO `empresas` VALUES (1, 'COOPERATIVA CONSTRU TRUJILLO', '98798779', '02716675432', 'JUAN LOPEZ', '13234567', '04243215678', 'coo_cons@hotmail.com');
INSERT INTO `empresas` VALUES (2, 'EL EMPRENDEDOR', '86545354', '02727659065', 'JERNONIMO MENDOZA', '9322688', '04265438907', 'mendzj@hotmail.com');
INSERT INTO `empresas` VALUES (3, 'ARTEYDISEÑO', '74887659', '02712446758', 'KARLA CAMACHO', '12457698', '04267843567', 'karca@hotmail.com');
INSERT INTO `empresas` VALUES (4, 'COOPERATIVA ELMARCHANTE', '86483998', '02724560987', 'BLADIMIR DURAN', '8765435', '04167895432', 'duran_bla@hotmail.com');
INSERT INTO `empresas` VALUES (5, 'ELPORVENIR', '76544388787', '02712445689', 'MARISELA PERNIA', '17543678', '04243458769', 'perniam@hotmail.com');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `evaluacion_tecnica`
-- 

CREATE TABLE `evaluacion_tecnica` (
  `id` int(6) NOT NULL auto_increment,
  `codigo_dea` varchar(10) collate utf8_spanish_ci NOT NULL,
  `cod_evaluacion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `solicitado_por` varchar(255) collate utf8_spanish_ci NOT NULL,
  `medio` varchar(255) collate utf8_spanish_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `modalidad_atencion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `descripcion_solicitud` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` enum('POR REALIZAR','REALIZADO') collate utf8_spanish_ci NOT NULL,
  `fecha_entrega` date NOT NULL,
  `fecha_respuesta` date NOT NULL,
  `descripcion_respuesta` varchar(255) collate utf8_spanish_ci NOT NULL,
  `observacion` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `evaluacion_tecnica`
-- 

INSERT INTO `evaluacion_tecnica` VALUES (1, '1234567989', '', 'SFDFDSFSD', 'FDFSDSDF', '2015-04-27', 'FDSSFDFSD', 'FDSFSDSDF', 'POR REALIZAR', '2015-04-27', '2015-04-27', 'FDSFSDFSDSFD', 'FSDFSD');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `fotos`
-- 

CREATE TABLE `fotos` (
  `id` int(6) NOT NULL auto_increment,
  `tabla_id` int(6) NOT NULL,
  `foto` varchar(255) collate utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `tabla` enum('PLANTEL','CONTRATACION','EVALUACION','PROYECTO','CONVENIO','DOTACION') collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `fotos`
-- 

INSERT INTO `fotos` VALUES (1, 1, 'btn_volver.png', 'dasdasds', 'EVALUACION');
INSERT INTO `fotos` VALUES (2, 1, 'candado.png', 'DFDFSDDF', 'CONTRATACION');
INSERT INTO `fotos` VALUES (3, 1, '12565359_1123851890988210_5144638916921304196_n.jpg', 'Escenario', 'PLANTEL');
INSERT INTO `fotos` VALUES (4, 1, '320469_4727253548379_1444783456_n.jpg', 'Alumnos', 'PLANTEL');
INSERT INTO `fotos` VALUES (5, 8, 'Desert.jpg', 'Mesas', 'DOTACION');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `municipios`
-- 

CREATE TABLE `municipios` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `municipios`
-- 

INSERT INTO `municipios` VALUES (1, 'VALERA');
INSERT INTO `municipios` VALUES (2, 'SAN RAFAEL DE CARVAJAL');
INSERT INTO `municipios` VALUES (3, 'TRUJILLO');
INSERT INTO `municipios` VALUES (4, 'ANDRES BELLO');
INSERT INTO `municipios` VALUES (5, 'BOCONO');
INSERT INTO `municipios` VALUES (6, 'BOCONO');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `niveles`
-- 

CREATE TABLE `niveles` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `niveles`
-- 

INSERT INTO `niveles` VALUES (1, 'ADMINISTRADOR');
INSERT INTO `niveles` VALUES (2, 'USUARIO');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `nivel_educativo`
-- 

CREATE TABLE `nivel_educativo` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `nivel_educativo`
-- 

INSERT INTO `nivel_educativo` VALUES (1, 'PRIMARIA');
INSERT INTO `nivel_educativo` VALUES (2, 'SECUNDARIA');
INSERT INTO `nivel_educativo` VALUES (3, 'DIVERSIFICADO');
INSERT INTO `nivel_educativo` VALUES (4, 'UNIVERSITARIO');
INSERT INTO `nivel_educativo` VALUES (6, 'HHHH');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `parroquias`
-- 

CREATE TABLE `parroquias` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `municipio_id` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

-- 
-- Volcar la base de datos para la tabla `parroquias`
-- 

INSERT INTO `parroquias` VALUES (1, 'MERCEDEZ DIAS', 1);
INSERT INTO `parroquias` VALUES (2, 'LA BEATRIZ', 1);
INSERT INTO `parroquias` VALUES (3, 'EL AMPARO', 2);
INSERT INTO `parroquias` VALUES (4, 'CUBITA', 2);
INSERT INTO `parroquias` VALUES (5, 'JUAN I. MONTILLA', 1);
INSERT INTO `parroquias` VALUES (7, 'SANTA ISABEL', 4);
INSERT INTO `parroquias` VALUES (8, 'SAN JOSE DE TOSTOS', 5);
INSERT INTO `parroquias` VALUES (9, 'SAN ALEJO', 5);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `personal`
-- 

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) collate utf8_spanish_ci NOT NULL,
  `apellido` varchar(35) collate utf8_spanish_ci NOT NULL,
  `login` varchar(30) collate utf8_spanish_ci NOT NULL,
  `clave` varchar(32) collate utf8_spanish_ci NOT NULL,
  `nivel_id` int(6) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `personal`
-- 

INSERT INTO `personal` VALUES (1111111, 'FRANCISCO', 'MARIN', 'admin123', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'ACTIVO');
INSERT INTO `personal` VALUES (231213231, 'JONNANMARY', 'AGUILAR', 'admin789', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'ACTIVO');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `personal_datos`
-- 

CREATE TABLE `personal_datos` (
  `personal_id` int(11) NOT NULL,
  `direccion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `tlf_fijo` varchar(11) collate utf8_spanish_ci default NULL,
  `tlf_movil` varchar(11) collate utf8_spanish_ci default NULL,
  `correo` varchar(50) collate utf8_spanish_ci default NULL,
  `foto` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`personal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `personal_datos`
-- 

INSERT INTO `personal_datos` VALUES (1111111, 'VALERA', '', '', '', '');
INSERT INTO `personal_datos` VALUES (231213231, 'CARVAJAL', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `personal_inspector`
-- 

CREATE TABLE `personal_inspector` (
  `id` int(6) NOT NULL auto_increment,
  `tipo` enum('INSPECTOR','RESIDENTE') collate utf8_spanish_ci NOT NULL,
  `cedula` varchar(15) collate utf8_spanish_ci NOT NULL,
  `civ` varchar(255) collate utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) collate utf8_spanish_ci NOT NULL,
  `tlf` varchar(11) collate utf8_spanish_ci NOT NULL,
  `correo` varchar(50) collate utf8_spanish_ci NOT NULL,
  `modalidad` enum('COORDINACION TRUJILLO','INSP_CONTRATADA') collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `personal_inspector`
-- 

INSERT INTO `personal_inspector` VALUES (1, 'INSPECTOR', '13654963', '12321231231', 'PABLO ', 'PEREZ', '04268753214', 'PABLO_3@HOTMAIL.COM', 'INSP_CONTRATADA');
INSERT INTO `personal_inspector` VALUES (2, 'RESIDENTE', '16345658', '23211322312', 'FULANO', 'TORRES', '0424345689', 'TORRESAL@HOTMAIL.COM', 'COORDINACION TRUJILLO');
INSERT INTO `personal_inspector` VALUES (3, 'INSPECTOR', '9166722', '8764577', 'NELSON ', 'SALAS', '04264587690', 'NELSON_S@HOTMAIL.COM', 'COORDINACION TRUJILLO');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `plantel`
-- 

CREATE TABLE `plantel` (
  `id` int(6) NOT NULL auto_increment,
  `cod_dea` varchar(10) collate utf8_spanish_ci NOT NULL,
  `cod_dependencia` varchar(255) collate utf8_spanish_ci NOT NULL,
  `cod_estadistico` varchar(255) collate utf8_spanish_ci NOT NULL,
  `dependencia` enum('NACIONAL','ESTADAL','PRIVADOS','PRIVADOS SUBVENCIONADOS') collate utf8_spanish_ci NOT NULL,
  `nivel_id` int(6) NOT NULL,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `parroquias_id` int(6) NOT NULL,
  `direccion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `nro_aulas` int(6) NOT NULL,
  `matricula` int(6) NOT NULL,
  `telf` varchar(11) collate utf8_spanish_ci NOT NULL,
  `coordenadas_latitud` varchar(255) collate utf8_spanish_ci NOT NULL,
  `coordenadas_longitud` varchar(255) collate utf8_spanish_ci NOT NULL,
  `coordenadas_altitud` varchar(255) collate utf8_spanish_ci NOT NULL,
  `caracteristicas` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `plantel`
-- 

INSERT INTO `plantel` VALUES (1, '1234567989', '342442343', '423243234432', 'NACIONAL', 2, 'MANUEL MARIA CARRASQUERO', 3, 'CARVAJAL EL AMPARO', 300, 5000, '423423234', '90 16 35', '80 24 56', '800', 'ESCUELA PRIMARIA');
INSERT INTO `plantel` VALUES (2, 'ODO0732101', '', '', 'NACIONAL', 1, 'UNIDAD EDUCATIVA "CNEL. ANDRÉS LINARES" (MOTATAN SIETE)', 2, 'CALLE PRINCIPAL MOTATAN SIETE', 7, 107, '', '', '', '', '');
INSERT INTO `plantel` VALUES (3, 'OD00632116', '', '', 'NACIONAL', 1, 'UNIDADE EDUCATIVA RAFAEL QUEVEDO URBINA', 3, 'QUINTA TRANSVERSAL CAMPO ALEGRE', 0, 946, '', '', '', '', '');
INSERT INTO `plantel` VALUES (4, 'OD02502102', '', '', 'NACIONAL', 1, 'ESCUELA BOLIVARIANA "Dr. EUSEBIO BAPTISTA', 8, 'AV. SAN JOSE CRUCE CON CALLE SUCRE\r\n', 8, 205, '', '', '', '', '');
INSERT INTO `plantel` VALUES (5, 'S0405D2102', 'HH', 'HHH', 'NACIONAL', 2, 'UNIDAD EDUCATIVA JUAN BAUTISTA DALIA COSTA', 8, 'CALLE PÁEZ FRENTE AL TEATRO', 0, 500, '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `plantel_concejo`
-- 

CREATE TABLE `plantel_concejo` (
  `id` int(6) NOT NULL auto_increment,
  `plantel_id` int(6) NOT NULL,
  `consejo_id` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `plantel_concejo`
-- 

INSERT INTO `plantel_concejo` VALUES (1, 1, 1);
INSERT INTO `plantel_concejo` VALUES (2, 4, 5);
INSERT INTO `plantel_concejo` VALUES (3, 5, 3);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `plantel_personal`
-- 

CREATE TABLE `plantel_personal` (
  `id` int(6) NOT NULL auto_increment,
  `cod_dea` varchar(10) collate utf8_spanish_ci NOT NULL,
  `cedula` varchar(15) collate utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) collate utf8_spanish_ci NOT NULL,
  `correo` varchar(50) collate utf8_spanish_ci NOT NULL,
  `telf` varchar(11) collate utf8_spanish_ci NOT NULL,
  `tipo` enum('DIRECTOR','SUBDIRECTOR') collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `plantel_personal`
-- 

INSERT INTO `plantel_personal` VALUES (4, '1234567989', '18456251', 'JAILINY', 'SALAS', '', '', 'DIRECTOR');
INSERT INTO `plantel_personal` VALUES (2, 'OD02502102', '9432567', 'NANCY', 'VILLEGAS', 'nan_v@hotmail.com', '04243213456', 'DIRECTOR');
INSERT INTO `plantel_personal` VALUES (3, 'OD02502102', '13456987', 'LILIBETH', 'GONZALEZ', 'lili_89@hotmail.com', '04142440985', 'SUBDIRECTOR');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `plantel_servicios`
-- 

CREATE TABLE `plantel_servicios` (
  `id` int(6) NOT NULL auto_increment,
  `servicio_id` int(6) NOT NULL,
  `plantel_id` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=44 ;

-- 
-- Volcar la base de datos para la tabla `plantel_servicios`
-- 

INSERT INTO `plantel_servicios` VALUES (35, 1, 1);
INSERT INTO `plantel_servicios` VALUES (34, 2, 1);
INSERT INTO `plantel_servicios` VALUES (33, 3, 1);
INSERT INTO `plantel_servicios` VALUES (43, 1, 5);
INSERT INTO `plantel_servicios` VALUES (20, 4, 3);
INSERT INTO `plantel_servicios` VALUES (19, 3, 3);
INSERT INTO `plantel_servicios` VALUES (18, 1, 3);
INSERT INTO `plantel_servicios` VALUES (17, 2, 3);
INSERT INTO `plantel_servicios` VALUES (21, 1, 4);
INSERT INTO `plantel_servicios` VALUES (22, 2, 4);
INSERT INTO `plantel_servicios` VALUES (23, 3, 4);
INSERT INTO `plantel_servicios` VALUES (24, 4, 4);
INSERT INTO `plantel_servicios` VALUES (42, 3, 5);
INSERT INTO `plantel_servicios` VALUES (41, 4, 5);
INSERT INTO `plantel_servicios` VALUES (40, 2, 5);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `privilegios`
-- 

CREATE TABLE `privilegios` (
  `id` int(6) NOT NULL auto_increment,
  `pagina` varchar(255) collate utf8_spanish_ci NOT NULL,
  `nivel_id` int(6) NOT NULL,
  `acceso` enum('CONCEDER','DENEGAR') collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=98 ;

-- 
-- Volcar la base de datos para la tabla `privilegios`
-- 

INSERT INTO `privilegios` VALUES (1, 'cambiar_clave.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (2, 'casiajax.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (3, 'consmod_consejo.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (4, 'consmod_empresa.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (5, 'consmod_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (6, 'consmod_personal_inspector.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (7, 'consmod_plantel.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (8, 'ficha_contrato.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (9, 'ficha_convenio.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (10, 'ficha_dotacion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (11, 'ficha_evaluacion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (12, 'ficha_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (13, 'ficha_plantel.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (14, 'ficha_proyecto.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (15, 'index.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (16, 'modificar_contratos_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (17, 'modificar_convenio.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (18, 'modificar_dotacion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (19, 'modificar_dotacion2.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (20, 'modificar_empresa.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (21, 'modificar_evaluacion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (22, 'modificar_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (23, 'modificar_plantel.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (24, 'modificar_proyecto.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (25, 'municipios.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (26, 'negacion_usuario.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (27, 'nivel_educativo.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (28, 'niveles.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (29, 'parroquias.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (30, 'privilegios.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (31, 'registrar_consejo.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (32, 'registrar_contratos.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (33, 'registrar_contratos_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (34, 'registrar_convenio.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (35, 'registrar_dotacion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (36, 'registrar_dotacion2.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (37, 'registrar_empresa.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (38, 'registrar_evaluacion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (39, 'registrar_foto.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (40, 'registrar_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (41, 'registrar_plantel.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (42, 'registrar_proyecto.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (43, 'retirar_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (44, 'retirar_personal2.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (45, 'servicios.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (46, 'ventana_plantel.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (47, 'cambiar_clave.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (48, 'casiajax.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (49, 'consmod_consejo.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (50, 'consmod_empresa.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (51, 'consmod_personal.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (52, 'consmod_personal_inspector.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (53, 'consmod_plantel.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (54, 'ficha_contrato.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (55, 'ficha_convenio.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (56, 'ficha_dotacion.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (57, 'ficha_evaluacion.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (58, 'ficha_personal.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (59, 'ficha_plantel.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (60, 'ficha_plantel.php.orig', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (61, 'ficha_proyecto.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (62, 'index.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (63, 'modificar_contratos_personal.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (64, 'modificar_convenio.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (65, 'modificar_dotacion.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (66, 'modificar_dotacion2.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (67, 'modificar_empresa.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (68, 'modificar_evaluacion.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (69, 'modificar_personal.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (70, 'modificar_plantel.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (71, 'modificar_proyecto.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (72, 'municipios.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (73, 'negacion_usuario.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (74, 'nivel_educativo.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (75, 'niveles.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (76, 'parroquias.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (77, 'privilegios.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (78, 'registrar_consejo.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (79, 'registrar_contratos.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (80, 'registrar_contratos_personal.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (81, 'registrar_convenio.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (82, 'registrar_dotacion.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (83, 'registrar_dotacion2.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (84, 'registrar_empresa.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (85, 'registrar_evaluacion.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (86, 'registrar_personal.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (87, 'registrar_plantel.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (88, 'registrar_proyecto.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (89, 'retirar_personal.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (90, 'retirar_personal2.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (91, 'servicios.php', 2, 'CONCEDER');
INSERT INTO `privilegios` VALUES (92, 'rp_frm_contratos_status.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (93, 'rp_cons_contratos_status.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (94, 'rp_frm_dotacionesxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (95, 'rp_cons_dotacionesxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (96, 'rp_frm_evaluacionesxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (97, 'rp_cons_evaluacionesxfecha.php', 1, 'CONCEDER');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `proyectos`
-- 

CREATE TABLE `proyectos` (
  `id` int(6) NOT NULL auto_increment,
  `codigo_dea` varchar(10) collate utf8_spanish_ci NOT NULL,
  `cod_proyecto` varchar(255) collate utf8_spanish_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `desc_solicitado` varchar(255) collate utf8_spanish_ci NOT NULL,
  `responsable` varchar(255) collate utf8_spanish_ci NOT NULL,
  `estatus` enum('POR REALIZAR','REALIZADO') collate utf8_spanish_ci NOT NULL,
  `fecha_resp` date NOT NULL,
  `desc_respuesta` varchar(255) collate utf8_spanish_ci NOT NULL,
  `observacion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `proy_actual` varchar(255) collate utf8_spanish_ci NOT NULL,
  `proy_propuesto` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `proyectos`
-- 

INSERT INTO `proyectos` VALUES (1, '1234567989', '', '2015-04-27', 'SDDSSD', 'GFDDFDFDF', 'POR REALIZAR', '2015-04-27', 'FD', '', 'DDD', 'GFGFDDFD');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `servicios`
-- 

CREATE TABLE `servicios` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `servicios`
-- 

INSERT INTO `servicios` VALUES (1, 'AGUA');
INSERT INTO `servicios` VALUES (2, 'LUZ');
INSERT INTO `servicios` VALUES (3, 'ASEO URBANO');
INSERT INTO `servicios` VALUES (4, 'INTERNET');
