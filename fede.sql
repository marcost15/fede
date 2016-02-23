-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2016 at 05:04 PM
-- Server version: 10.0.23-MariaDB-0+deb8u1
-- PHP Version: 5.6.17-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fede`
--

-- --------------------------------------------------------

--
-- Table structure for table `consejo_comunal`
--

CREATE TABLE IF NOT EXISTS `consejo_comunal` (
`id` int(6) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `vocero` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telf` varchar(11) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `consejo_comunal`
--

INSERT INTO `consejo_comunal` (`id`, `nombre`, `vocero`, `cargo`, `correo`, `telf`) VALUES
(1, 'PATRIA QUERIDA', 'JUAN LOPEZ', 'TESORERO', 'juanlz@hotmail.com', '04165438907'),
(2, 'VISTA HERMOSA', 'CARMEN VILLEGAS', 'VIVIENDA', 'villegasca@hotmail.com', '04268975600'),
(3, 'LA BOLIVARIANA', 'EDUARDO MOLINA', 'ADMINISTRATIVO', 'edum@hotmail.com', '04163458790'),
(4, 'EL TURAGUAL', 'JOSE AGUILAR', 'CONTRALORIA', 'joaguilar@hotmail.com', '04243279908'),
(5, 'EL BUEN CIUDADANO', 'MARLENE GONZALEZ', 'ALIMENTACION', 'mar_g@hotmail.com', '04142546787');

-- --------------------------------------------------------

--
-- Table structure for table `contratos`
--

CREATE TABLE IF NOT EXISTS `contratos` (
`id` int(6) NOT NULL,
  `codigo_contrato` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_dea` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tiempo_ejec` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `desc_trabajo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `plan` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `modalidad_atencion` enum('REHABILITACION','AMPLIACION','CONSTRUCCION NUEVA') COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_terminacion` date NOT NULL,
  `fecha_paralizacion` date NOT NULL,
  `motivo_paralizacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reinicio` date NOT NULL,
  `fecha_prorroga` date NOT NULL,
  `nro_dias_prorroga` int(4) NOT NULL,
  `motivo_prorroga` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_culminacion` date NOT NULL,
  `monto_val_pagadas` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `poc_ejec_financiero` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `poc_ejec_fisico` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` enum('EN EJECUCION','PARALIZADA','TERMINADA','CERRADA','RESCINDIDA') COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `monto_contratado` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `aumento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `empleos_directos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `empleos_indirectos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `empresa_id` int(6) NOT NULL,
  `personal_insp` int(6) NOT NULL,
  `ing_residente` int(6) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `contratos`
--

INSERT INTO `contratos` (`id`, `codigo_contrato`, `codigo_dea`, `tiempo_ejec`, `desc_trabajo`, `plan`, `modalidad_atencion`, `fecha_inicio`, `fecha_terminacion`, `fecha_paralizacion`, `motivo_paralizacion`, `fecha_reinicio`, `fecha_prorroga`, `nro_dias_prorroga`, `motivo_prorroga`, `fecha_culminacion`, `monto_val_pagadas`, `poc_ejec_financiero`, `poc_ejec_fisico`, `estatus`, `observacion`, `monto_contratado`, `aumento`, `empleos_directos`, `empleos_indirectos`, `empresa_id`, `personal_insp`, `ing_residente`) VALUES
(1, '433443', '1234567989', '5 MESES', 'DFDSFSDFSD', 'FSDSDFFSD', 'REHABILITACION', '2015-03-31', '2015-04-02', '0000-00-00', '', '0000-00-00', '0000-00-00', 0, 'FSDSDFSDF', '0000-00-00', '24342323', '34', '34', 'EN EJECUCION', 'DFSSDFSDF', '42233432', '432432234', '344', '3', 1, 1, 2),
(2, '95823566', 'OD02502102', '4 AÑOS', 'BOCONO', 'TERMINADO', 'REHABILITACION', '2010-09-15', '2014-09-15', '0000-00-00', '', '0000-00-00', '0000-00-00', 0, '', '0000-00-00', '', '', '', 'EN EJECUCION', '', '', '', '', '', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `convenios`
--

CREATE TABLE IF NOT EXISTS `convenios` (
`id` int(6) NOT NULL,
  `codigo_dea` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nro_convenio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ejecutor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `monto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` enum('PREVENTIVO','CORRECTIVO','INTERINSTITUCIONAL') COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_terminacion` date NOT NULL,
  `fecha_paralizacion` date NOT NULL,
  `fecha_reinicio` date NOT NULL,
  `motivo_paralizacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` enum('EN EJECUCION','PARALIZADA','TERMINADA','CERRADA','RESCINDIDA') COLLATE utf8_spanish_ci NOT NULL,
  `plan` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_trabajos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `convenios`
--

INSERT INTO `convenios` (`id`, `codigo_dea`, `nro_convenio`, `ejecutor`, `monto`, `tipo`, `fecha_inicio`, `fecha_terminacion`, `fecha_paralizacion`, `fecha_reinicio`, `motivo_paralizacion`, `estatus`, `plan`, `descripcion_trabajos`, `observacion`) VALUES
(1, '1234567989', '2344243223', 'SIMON SALAS', '432.00', 'PREVENTIVO', '2015-04-27', '2015-04-27', '2015-04-27', '2015-04-27', '', 'EN EJECUCION', 'TERMINADO', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dotacion`
--

CREATE TABLE IF NOT EXISTS `dotacion` (
`id` int(6) NOT NULL,
  `fecha` date NOT NULL,
  `fecha_dotacion` date NOT NULL,
  `nro_memo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `gerencia` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_dea` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cod_dotacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `dotacion`
--

INSERT INTO `dotacion` (`id`, `fecha`, `fecha_dotacion`, `nro_memo`, `gerencia`, `codigo_dea`, `cod_dotacion`) VALUES
(9, '2016-01-30', '0000-00-00', '875943879', 'ADMINISTRATIVA', '1234567989', 'DOT9845'),
(7, '2010-09-15', '2010-08-14', '75433', 'ADMINISTRATIVA', 'OD02502102', '7595868'),
(8, '2016-01-20', '2016-01-30', '098488587', 'ADMINISTRATIVA', '1234567989', 'DOT98233'),
(6, '2016-01-05', '0000-00-00', '2341223', 'ADMINISTRATIVA', '1234567989', 'DOT3405');

-- --------------------------------------------------------

--
-- Table structure for table `dotacion_mobiliario`
--

CREATE TABLE IF NOT EXISTS `dotacion_mobiliario` (
`id` int(6) NOT NULL,
  `dotacion_id` int(6) NOT NULL,
  `tipo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo2` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_mobiliario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `monto` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='UNA SOLA EMPRESA POR TIPO DE MOBILIARIO';

--
-- Dumping data for table `dotacion_mobiliario`
--

INSERT INTO `dotacion_mobiliario` (`id`, `dotacion_id`, `tipo`, `tipo2`, `tipo_mobiliario`, `descripcion`, `empresa`, `monto`) VALUES
(1, 1, '', '', '', 'FDSSFSDFSD', 'DFSFSDFSD', '4342323'),
(2, 1, '', '', '', 'FDSSFSDFSD', 'DFSFSDFSD', '4342323'),
(4, 4, 'SOLICITUD', '', '', 'SDFFSDF', 'FDFSDSFD', '2344243'),
(5, 4, 'SOLICITUD', '', '', 'FDSFSDFDS', 'FSFSD', '43423'),
(6, 4, 'SOLICITUD', '', '', 'fdfsdfdssd', 'FDSSDFSD', '3423'),
(7, 4, 'DOTADO', '', '', 'WRWEWEQRWEWE', 'EWRWEREWWER', '2000'),
(8, 4, 'SOLICITUD', '', 'SDFSSDF', 'DFSDFFSD', 'FSDFSDSFD', '2000'),
(9, 5, 'SOLICITUD', '', 'LKJLKJLKJ', 'HLKJHKJ', '', ''),
(10, 5, 'DOTADO', '', 'KJKJLKJ', 'KJLKJLK', 'RTTRTR', '0989809,99'),
(11, 6, 'SOLICITUD', '', 'MOBILIARIO ADMINISTRATIVO', 'MESAS', '', ''),
(12, 6, 'DOTADO', '', 'MOBILIARIO ADMINISTRATIVO', 'MESAS', 'COOPERATIVA CARPINTRUJ', '123800.00'),
(16, 8, 'SOLICITUD', 'DOTADO', 'DOTACION', 'MESAS', 'ENLACE', '2000'),
(17, 8, 'S', 'D', 'DGHHHH', 'GFDFF', 'GFHFF', '2000'),
(18, 9, 'S', 'D', 'FHFGGFGFH', 'HGFGFFG', 'FHFFHFGH', '6999');

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
`id` int(6) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rif` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `tlf` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `repre_legal` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `tlf_repre` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `rif`, `tlf`, `repre_legal`, `cedula`, `tlf_repre`, `correo`) VALUES
(1, 'COOPERATIVA CONSTRU TRUJILLO', '98798779', '02716675432', 'JUAN LOPEZ', '13234567', '04243215678', 'coo_cons@hotmail.com'),
(2, 'EL EMPRENDEDOR', '86545354', '02727659065', 'JERNONIMO MENDOZA', '9322688', '04265438907', 'mendzj@hotmail.com'),
(3, 'ARTEYDISEÑO', '74887659', '02712446758', 'KARLA CAMACHO', '12457698', '04267843567', 'karca@hotmail.com'),
(4, 'COOPERATIVA ELMARCHANTE', '86483998', '02724560987', 'BLADIMIR DURAN', '8765435', '04167895432', 'duran_bla@hotmail.com'),
(5, 'ELPORVENIR', '76544388787', '02712445689', 'MARISELA PERNIA', '17543678', '04243458769', 'perniam@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `evaluacion_tecnica`
--

CREATE TABLE IF NOT EXISTS `evaluacion_tecnica` (
`id` int(6) NOT NULL,
  `codigo_dea` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cod_evaluacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `solicitado_por` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `medio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `modalidad_atencion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_solicitud` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` enum('POR REALIZAR','REALIZADO') COLLATE utf8_spanish_ci NOT NULL,
  `fecha_entrega` date NOT NULL,
  `fecha_respuesta` date NOT NULL,
  `descripcion_respuesta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `evaluacion_tecnica`
--

INSERT INTO `evaluacion_tecnica` (`id`, `codigo_dea`, `cod_evaluacion`, `solicitado_por`, `medio`, `fecha_solicitud`, `modalidad_atencion`, `descripcion_solicitud`, `estatus`, `fecha_entrega`, `fecha_respuesta`, `descripcion_respuesta`, `observacion`) VALUES
(1, '1234567989', '', 'SFDFDSFSD', 'FDFSDSDF', '2015-04-27', 'FDSSFDFSD', 'FDSFSDSDF', 'POR REALIZAR', '2015-04-27', '2015-04-27', 'FDSFSDFSDSFD', 'FSDFSD');

-- --------------------------------------------------------

--
-- Table structure for table `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
`id` int(6) NOT NULL,
  `tabla_id` int(6) NOT NULL,
  `foto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tabla` enum('PLANTEL','CONTRATACION','EVALUACION','PROYECTO','CONVENIO','DOTACION') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `fotos`
--

INSERT INTO `fotos` (`id`, `tabla_id`, `foto`, `descripcion`, `tabla`) VALUES
(1, 1, 'btn_volver.png', 'dasdasds', 'EVALUACION'),
(2, 1, 'candado.png', 'DFDFSDDF', 'CONTRATACION'),
(3, 1, '12565359_1123851890988210_5144638916921304196_n.jpg', 'Escenario', 'PLANTEL'),
(4, 1, '320469_4727253548379_1444783456_n.jpg', 'Alumnos', 'PLANTEL'),
(5, 8, 'Desert.jpg', 'Mesas', 'DOTACION');

-- --------------------------------------------------------

--
-- Table structure for table `municipios`
--

CREATE TABLE IF NOT EXISTS `municipios` (
`id` int(6) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `municipios`
--

INSERT INTO `municipios` (`id`, `nombre`) VALUES
(1, 'VALERA'),
(2, 'SAN RAFAEL DE CARVAJAL'),
(3, 'TRUJILLO'),
(4, 'ANDRES BELLO'),
(5, 'BOCONO'),
(6, 'BOCONO');

-- --------------------------------------------------------

--
-- Table structure for table `niveles`
--

CREATE TABLE IF NOT EXISTS `niveles` (
`id` int(6) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `niveles`
--

INSERT INTO `niveles` (`id`, `nombre`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'USUARIO');

-- --------------------------------------------------------

--
-- Table structure for table `nivel_educativo`
--

CREATE TABLE IF NOT EXISTS `nivel_educativo` (
`id` int(6) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nivel_educativo`
--

INSERT INTO `nivel_educativo` (`id`, `nombre`) VALUES
(1, 'PRIMARIA'),
(2, 'SECUNDARIA'),
(3, 'DIVERSIFICADO'),
(4, 'UNIVERSITARIO'),
(6, 'HHHH');

-- --------------------------------------------------------

--
-- Table structure for table `parroquias`
--

CREATE TABLE IF NOT EXISTS `parroquias` (
`id` int(6) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `municipio_id` int(6) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `parroquias`
--

INSERT INTO `parroquias` (`id`, `nombre`, `municipio_id`) VALUES
(1, 'MERCEDEZ DIAS', 1),
(2, 'LA BEATRIZ', 1),
(3, 'EL AMPARO', 2),
(4, 'CUBITA', 2),
(5, 'JUAN I. MONTILLA', 1),
(7, 'SANTA ISABEL', 4),
(8, 'SAN JOSE DE TOSTOS', 5),
(9, 'SAN ALEJO', 5);

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `login` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `nivel_id` int(6) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`id`, `nombre`, `apellido`, `login`, `clave`, `nivel_id`, `estado`) VALUES
(1111111, 'FRANCISCO', 'MARIN', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'ACTIVO'),
(231213231, 'JONNANMARY', 'AGUILAR', 'admin789', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'ACTIVO');

-- --------------------------------------------------------

--
-- Table structure for table `personal_datos`
--

CREATE TABLE IF NOT EXISTS `personal_datos` (
  `personal_id` int(11) NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tlf_fijo` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tlf_movil` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `personal_datos`
--

INSERT INTO `personal_datos` (`personal_id`, `direccion`, `tlf_fijo`, `tlf_movil`, `correo`, `foto`) VALUES
(1111111, 'VALERA', '', '', '', ''),
(231213231, 'CARVAJAL', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `personal_inspector`
--

CREATE TABLE IF NOT EXISTS `personal_inspector` (
`id` int(6) NOT NULL,
  `tipo` enum('INSPECTOR','RESIDENTE') COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `civ` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tlf` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `modalidad` enum('COORDINACION TRUJILLO','INSP_CONTRATADA') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `personal_inspector`
--

INSERT INTO `personal_inspector` (`id`, `tipo`, `cedula`, `civ`, `nombre`, `apellido`, `tlf`, `correo`, `modalidad`) VALUES
(1, 'INSPECTOR', '13654963', '12321231231', 'PABLO ', 'PEREZ', '04268753214', 'PABLO_3@HOTMAIL.COM', 'INSP_CONTRATADA'),
(2, 'RESIDENTE', '16345658', '23211322312', 'FULANO', 'TORRES', '0424345689', 'TORRESAL@HOTMAIL.COM', 'COORDINACION TRUJILLO'),
(3, 'INSPECTOR', '9166722', '8764577', 'NELSON ', 'SALAS', '04264587690', 'NELSON_S@HOTMAIL.COM', 'COORDINACION TRUJILLO');

-- --------------------------------------------------------

--
-- Table structure for table `plantel`
--

CREATE TABLE IF NOT EXISTS `plantel` (
`id` int(6) NOT NULL,
  `cod_dea` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cod_dependencia` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cod_estadistico` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `dependencia` enum('NACIONAL','ESTADAL','PRIVADOS','PRIVADOS SUBVENCIONADOS') COLLATE utf8_spanish_ci NOT NULL,
  `nivel_id` int(6) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `parroquias_id` int(6) NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nro_aulas` int(6) NOT NULL,
  `matricula` int(6) NOT NULL,
  `telf` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `coordenadas_latitud` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `coordenadas_longitud` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `coordenadas_altitud` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `caracteristicas` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `plantel`
--

INSERT INTO `plantel` (`id`, `cod_dea`, `cod_dependencia`, `cod_estadistico`, `dependencia`, `nivel_id`, `nombre`, `parroquias_id`, `direccion`, `nro_aulas`, `matricula`, `telf`, `coordenadas_latitud`, `coordenadas_longitud`, `coordenadas_altitud`, `caracteristicas`) VALUES
(1, '1234567989', '342442343', '423243234432', 'NACIONAL', 2, 'MANUEL MARIA CARRASQUERO', 3, 'CARVAJAL EL AMPARO', 300, 5000, '423423234', '90 16 35', '80 24 56', '800', 'ESCUELA PRIMARIA'),
(2, 'ODO0732101', '', '', 'NACIONAL', 1, 'UNIDAD EDUCATIVA "CNEL. ANDRÉS LINARES" (MOTATAN SIETE)', 2, 'CALLE PRINCIPAL MOTATAN SIETE', 7, 107, '', '', '', '', ''),
(3, 'OD00632116', '', '', 'NACIONAL', 1, 'UNIDADE EDUCATIVA RAFAEL QUEVEDO URBINA', 3, 'QUINTA TRANSVERSAL CAMPO ALEGRE', 0, 946, '', '', '', '', ''),
(4, 'OD02502102', '', '', 'NACIONAL', 1, 'ESCUELA BOLIVARIANA "Dr. EUSEBIO BAPTISTA', 8, 'AV. SAN JOSE CRUCE CON CALLE SUCRE\r\n', 8, 205, '', '', '', '', ''),
(5, 'S0405D2102', 'HH', 'HHH', 'NACIONAL', 2, 'UNIDAD EDUCATIVA JUAN BAUTISTA DALIA COSTA', 8, 'CALLE PÁEZ FRENTE AL TEATRO', 0, 500, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `plantel_concejo`
--

CREATE TABLE IF NOT EXISTS `plantel_concejo` (
`id` int(6) NOT NULL,
  `plantel_id` int(6) NOT NULL,
  `consejo_id` int(6) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `plantel_concejo`
--

INSERT INTO `plantel_concejo` (`id`, `plantel_id`, `consejo_id`) VALUES
(1, 1, 1),
(2, 4, 5),
(3, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `plantel_personal`
--

CREATE TABLE IF NOT EXISTS `plantel_personal` (
`id` int(6) NOT NULL,
  `cod_dea` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telf` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` enum('DIRECTOR','SUBDIRECTOR') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `plantel_personal`
--

INSERT INTO `plantel_personal` (`id`, `cod_dea`, `cedula`, `nombre`, `apellido`, `correo`, `telf`, `tipo`) VALUES
(4, '1234567989', '18456251', 'JAILINY', 'SALAS', '', '', 'DIRECTOR'),
(2, 'OD02502102', '9432567', 'NANCY', 'VILLEGAS', 'nan_v@hotmail.com', '04243213456', 'DIRECTOR'),
(3, 'OD02502102', '13456987', 'LILIBETH', 'GONZALEZ', 'lili_89@hotmail.com', '04142440985', 'SUBDIRECTOR');

-- --------------------------------------------------------

--
-- Table structure for table `plantel_servicios`
--

CREATE TABLE IF NOT EXISTS `plantel_servicios` (
`id` int(6) NOT NULL,
  `servicio_id` int(6) NOT NULL,
  `plantel_id` int(6) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `plantel_servicios`
--

INSERT INTO `plantel_servicios` (`id`, `servicio_id`, `plantel_id`) VALUES
(35, 1, 1),
(34, 2, 1),
(33, 3, 1),
(43, 1, 5),
(20, 4, 3),
(19, 3, 3),
(18, 1, 3),
(17, 2, 3),
(21, 1, 4),
(22, 2, 4),
(23, 3, 4),
(24, 4, 4),
(42, 3, 5),
(41, 4, 5),
(40, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `privilegios`
--

CREATE TABLE IF NOT EXISTS `privilegios` (
`id` int(6) NOT NULL,
  `pagina` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nivel_id` int(6) NOT NULL,
  `acceso` enum('CONCEDER','DENEGAR') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `privilegios`
--

INSERT INTO `privilegios` (`id`, `pagina`, `nivel_id`, `acceso`) VALUES
(1, 'cambiar_clave.php', 1, 'CONCEDER'),
(2, 'casiajax.php', 1, 'CONCEDER'),
(3, 'consmod_consejo.php', 1, 'CONCEDER'),
(4, 'consmod_empresa.php', 1, 'CONCEDER'),
(5, 'consmod_personal.php', 1, 'CONCEDER'),
(6, 'consmod_personal_inspector.php', 1, 'CONCEDER'),
(7, 'consmod_plantel.php', 1, 'CONCEDER'),
(8, 'ficha_contrato.php', 1, 'CONCEDER'),
(9, 'ficha_convenio.php', 1, 'CONCEDER'),
(10, 'ficha_dotacion.php', 1, 'CONCEDER'),
(11, 'ficha_evaluacion.php', 1, 'CONCEDER'),
(12, 'ficha_personal.php', 1, 'CONCEDER'),
(13, 'ficha_plantel.php', 1, 'CONCEDER'),
(14, 'ficha_proyecto.php', 1, 'CONCEDER'),
(15, 'index.php', 1, 'CONCEDER'),
(16, 'modificar_contratos_personal.php', 1, 'CONCEDER'),
(17, 'modificar_convenio.php', 1, 'CONCEDER'),
(18, 'modificar_dotacion.php', 1, 'CONCEDER'),
(19, 'modificar_dotacion2.php', 1, 'CONCEDER'),
(20, 'modificar_empresa.php', 1, 'CONCEDER'),
(21, 'modificar_evaluacion.php', 1, 'CONCEDER'),
(22, 'modificar_personal.php', 1, 'CONCEDER'),
(23, 'modificar_plantel.php', 1, 'CONCEDER'),
(24, 'modificar_proyecto.php', 1, 'CONCEDER'),
(25, 'municipios.php', 1, 'CONCEDER'),
(26, 'negacion_usuario.php', 1, 'CONCEDER'),
(27, 'nivel_educativo.php', 1, 'CONCEDER'),
(28, 'niveles.php', 1, 'CONCEDER'),
(29, 'parroquias.php', 1, 'CONCEDER'),
(30, 'privilegios.php', 1, 'CONCEDER'),
(31, 'registrar_consejo.php', 1, 'CONCEDER'),
(32, 'registrar_contratos.php', 1, 'CONCEDER'),
(33, 'registrar_contratos_personal.php', 1, 'CONCEDER'),
(34, 'registrar_convenio.php', 1, 'CONCEDER'),
(35, 'registrar_dotacion.php', 1, 'CONCEDER'),
(36, 'registrar_dotacion2.php', 1, 'CONCEDER'),
(37, 'registrar_empresa.php', 1, 'CONCEDER'),
(38, 'registrar_evaluacion.php', 1, 'CONCEDER'),
(39, 'registrar_foto.php', 1, 'CONCEDER'),
(40, 'registrar_personal.php', 1, 'CONCEDER'),
(41, 'registrar_plantel.php', 1, 'CONCEDER'),
(42, 'registrar_proyecto.php', 1, 'CONCEDER'),
(43, 'retirar_personal.php', 1, 'CONCEDER'),
(44, 'retirar_personal2.php', 1, 'CONCEDER'),
(45, 'servicios.php', 1, 'CONCEDER'),
(46, 'ventana_plantel.php', 1, 'CONCEDER'),
(47, 'cambiar_clave.php', 2, 'CONCEDER'),
(48, 'casiajax.php', 2, 'CONCEDER'),
(49, 'consmod_consejo.php', 2, 'CONCEDER'),
(50, 'consmod_empresa.php', 2, 'CONCEDER'),
(51, 'consmod_personal.php', 2, 'CONCEDER'),
(52, 'consmod_personal_inspector.php', 2, 'CONCEDER'),
(53, 'consmod_plantel.php', 2, 'CONCEDER'),
(54, 'ficha_contrato.php', 2, 'CONCEDER'),
(55, 'ficha_convenio.php', 2, 'CONCEDER'),
(56, 'ficha_dotacion.php', 2, 'CONCEDER'),
(57, 'ficha_evaluacion.php', 2, 'CONCEDER'),
(58, 'ficha_personal.php', 2, 'CONCEDER'),
(59, 'ficha_plantel.php', 2, 'CONCEDER'),
(60, 'ficha_plantel.php.orig', 2, 'CONCEDER'),
(61, 'ficha_proyecto.php', 2, 'CONCEDER'),
(62, 'index.php', 2, 'CONCEDER'),
(63, 'modificar_contratos_personal.php', 2, 'CONCEDER'),
(64, 'modificar_convenio.php', 2, 'CONCEDER'),
(65, 'modificar_dotacion.php', 2, 'CONCEDER'),
(66, 'modificar_dotacion2.php', 2, 'CONCEDER'),
(67, 'modificar_empresa.php', 2, 'CONCEDER'),
(68, 'modificar_evaluacion.php', 2, 'CONCEDER'),
(69, 'modificar_personal.php', 2, 'CONCEDER'),
(70, 'modificar_plantel.php', 2, 'CONCEDER'),
(71, 'modificar_proyecto.php', 2, 'CONCEDER'),
(72, 'municipios.php', 2, 'CONCEDER'),
(73, 'negacion_usuario.php', 2, 'CONCEDER'),
(74, 'nivel_educativo.php', 2, 'CONCEDER'),
(75, 'niveles.php', 2, 'CONCEDER'),
(76, 'parroquias.php', 2, 'CONCEDER'),
(77, 'privilegios.php', 2, 'CONCEDER'),
(78, 'registrar_consejo.php', 2, 'CONCEDER'),
(79, 'registrar_contratos.php', 2, 'CONCEDER'),
(80, 'registrar_contratos_personal.php', 2, 'CONCEDER'),
(81, 'registrar_convenio.php', 2, 'CONCEDER'),
(82, 'registrar_dotacion.php', 2, 'CONCEDER'),
(83, 'registrar_dotacion2.php', 2, 'CONCEDER'),
(84, 'registrar_empresa.php', 2, 'CONCEDER'),
(85, 'registrar_evaluacion.php', 2, 'CONCEDER'),
(86, 'registrar_personal.php', 2, 'CONCEDER'),
(87, 'registrar_plantel.php', 2, 'CONCEDER'),
(88, 'registrar_proyecto.php', 2, 'CONCEDER'),
(89, 'retirar_personal.php', 2, 'CONCEDER'),
(90, 'retirar_personal2.php', 2, 'CONCEDER'),
(91, 'servicios.php', 2, 'CONCEDER'),
(92, 'rp_frm_contratos_status.php', 1, 'CONCEDER'),
(93, 'rp_cons_contratos_status.php', 1, 'CONCEDER'),
(94, 'rp_frm_dotacionesxfecha.php', 1, 'CONCEDER'),
(95, 'rp_cons_dotacionesxfecha.php', 1, 'CONCEDER'),
(96, 'rp_frm_evaluacionesxfecha.php', 1, 'CONCEDER'),
(97, 'rp_cons_evaluacionesxfecha.php', 1, 'CONCEDER');

-- --------------------------------------------------------

--
-- Table structure for table `proyectos`
--

CREATE TABLE IF NOT EXISTS `proyectos` (
`id` int(6) NOT NULL,
  `codigo_dea` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cod_proyecto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `desc_solicitado` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estatus` enum('POR REALIZAR','REALIZADO') COLLATE utf8_spanish_ci NOT NULL,
  `fecha_resp` date NOT NULL,
  `desc_respuesta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `proy_actual` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `proy_propuesto` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `proyectos`
--

INSERT INTO `proyectos` (`id`, `codigo_dea`, `cod_proyecto`, `fecha_solicitud`, `desc_solicitado`, `responsable`, `estatus`, `fecha_resp`, `desc_respuesta`, `observacion`, `proy_actual`, `proy_propuesto`) VALUES
(1, '1234567989', '', '2015-04-27', 'SDDSSD', 'GFDDFDFDF', 'POR REALIZAR', '2015-04-27', 'FD', '', 'DDD', 'GFGFDDFD');

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
`id` int(6) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`) VALUES
(1, 'AGUA'),
(2, 'LUZ'),
(3, 'ASEO URBANO'),
(4, 'INTERNET');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consejo_comunal`
--
ALTER TABLE `consejo_comunal`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contratos`
--
ALTER TABLE `contratos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `convenios`
--
ALTER TABLE `convenios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dotacion`
--
ALTER TABLE `dotacion`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dotacion_mobiliario`
--
ALTER TABLE `dotacion_mobiliario`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluacion_tecnica`
--
ALTER TABLE `evaluacion_tecnica`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipios`
--
ALTER TABLE `municipios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `niveles`
--
ALTER TABLE `niveles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nivel_educativo`
--
ALTER TABLE `nivel_educativo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parroquias`
--
ALTER TABLE `parroquias`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_datos`
--
ALTER TABLE `personal_datos`
 ADD PRIMARY KEY (`personal_id`);

--
-- Indexes for table `personal_inspector`
--
ALTER TABLE `personal_inspector`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plantel`
--
ALTER TABLE `plantel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plantel_concejo`
--
ALTER TABLE `plantel_concejo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plantel_personal`
--
ALTER TABLE `plantel_personal`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plantel_servicios`
--
ALTER TABLE `plantel_servicios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilegios`
--
ALTER TABLE `privilegios`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proyectos`
--
ALTER TABLE `proyectos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consejo_comunal`
--
ALTER TABLE `consejo_comunal`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contratos`
--
ALTER TABLE `contratos`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `convenios`
--
ALTER TABLE `convenios`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dotacion`
--
ALTER TABLE `dotacion`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `dotacion_mobiliario`
--
ALTER TABLE `dotacion_mobiliario`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `evaluacion_tecnica`
--
ALTER TABLE `evaluacion_tecnica`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `municipios`
--
ALTER TABLE `municipios`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `niveles`
--
ALTER TABLE `niveles`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nivel_educativo`
--
ALTER TABLE `nivel_educativo`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `parroquias`
--
ALTER TABLE `parroquias`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `personal_inspector`
--
ALTER TABLE `personal_inspector`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `plantel`
--
ALTER TABLE `plantel`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `plantel_concejo`
--
ALTER TABLE `plantel_concejo`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `plantel_personal`
--
ALTER TABLE `plantel_personal`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `plantel_servicios`
--
ALTER TABLE `plantel_servicios`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `privilegios`
--
ALTER TABLE `privilegios`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `proyectos`
--
ALTER TABLE `proyectos`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
