-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jun 26, 2015 at 09:53 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `fede`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `consejo_comunal`
-- 

CREATE TABLE `consejo_comunal` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `vocero` varchar(255) collate utf8_spanish_ci NOT NULL,
  `cargo` varchar(255) collate utf8_spanish_ci NOT NULL,
  `correo` varchar(50) collate utf8_spanish_ci NOT NULL,
  `telf` varchar(11) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `consejo_comunal`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `contratos`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `contratos`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `convenios`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `convenios`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `dotacion`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `dotacion`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `dotacion_mobiliario`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='UNA SOLA EMPRESA POR TIPO DE MOBILIARIO' AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `dotacion_mobiliario`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `empresas`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `empresas`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `evaluacion_tecnica`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `evaluacion_tecnica`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fotos`
-- 

CREATE TABLE `fotos` (
  `id` int(6) NOT NULL auto_increment,
  `tabla_id` int(6) NOT NULL,
  `foto` varchar(255) collate utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) collate utf8_spanish_ci NOT NULL,
  `tabla` enum('PLANTEL','CONTRATACION','EVALUACION','PROYECTO','CONVENIO','DOTACION') collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `fotos`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `municipios`
-- 

CREATE TABLE `municipios` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `municipios`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `niveles`
-- 

CREATE TABLE `niveles` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `niveles`
-- 

INSERT INTO `niveles` VALUES (1, 'ADMINISTRADOR');
INSERT INTO `niveles` VALUES (2, 'USUARIO');

-- --------------------------------------------------------

-- 
-- Table structure for table `nivel_educativo`
-- 

CREATE TABLE `nivel_educativo` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `nivel_educativo`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `parroquias`
-- 

CREATE TABLE `parroquias` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  `municipio_id` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `parroquias`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `personal`
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
-- Dumping data for table `personal`
-- 

INSERT INTO `personal` VALUES (111111111, 'ADMIN', 'ADMIN', 'admin123', '25d55ad283aa400af464c76d713c07ad', 1, 'ACTIVO');

-- --------------------------------------------------------

-- 
-- Table structure for table `personal_datos`
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
-- Dumping data for table `personal_datos`
-- 

INSERT INTO `personal_datos` VALUES (111111111, 'ADMIN', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `personal_inspector`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `personal_inspector`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `plantel`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `plantel`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `plantel_concejo`
-- 

CREATE TABLE `plantel_concejo` (
  `id` int(6) NOT NULL auto_increment,
  `plantel_id` int(6) NOT NULL,
  `consejo_id` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `plantel_concejo`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `plantel_personal`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `plantel_personal`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `plantel_servicios`
-- 

CREATE TABLE `plantel_servicios` (
  `id` int(6) NOT NULL auto_increment,
  `servicio_id` int(6) NOT NULL,
  `plantel_id` int(6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `plantel_servicios`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `privilegios`
-- 

CREATE TABLE `privilegios` (
  `id` int(6) NOT NULL auto_increment,
  `pagina` varchar(255) collate utf8_spanish_ci NOT NULL,
  `nivel_id` int(6) NOT NULL,
  `acceso` enum('CONCEDER','DENEGAR') collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=49 ;

-- 
-- Dumping data for table `privilegios`
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
INSERT INTO `privilegios` VALUES (19, 'modificar_empresa.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (20, 'modificar_evaluacion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (21, 'modificar_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (22, 'modificar_plantel.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (23, 'modificar_proyecto.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (24, 'municipios.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (25, 'negacion_usuario.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (26, 'nivel_educativo.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (27, 'niveles.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (28, 'parroquias.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (29, 'privilegios.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (30, 'registrar_consejo.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (31, 'registrar_contratos.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (32, 'registrar_contratos_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (33, 'registrar_convenio.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (34, 'registrar_dotacion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (35, 'registrar_empresa.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (36, 'registrar_evaluacion.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (37, 'registrar_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (38, 'registrar_plantel.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (39, 'registrar_proyecto.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (40, 'retirar_personal.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (41, 'retirar_personal2.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (42, 'rp_cons_contratos_status.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (43, 'rp_cons_dotacionesxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (44, 'rp_cons_evaluacionesxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (45, 'rp_frm_contratos_status.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (46, 'rp_frm_dotacionesxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (47, 'rp_frm_evaluacionesxfecha.php', 1, 'CONCEDER');
INSERT INTO `privilegios` VALUES (48, 'servicios.php', 1, 'CONCEDER');

-- --------------------------------------------------------

-- 
-- Table structure for table `proyectos`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `proyectos`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `servicios`
-- 

CREATE TABLE `servicios` (
  `id` int(6) NOT NULL auto_increment,
  `nombre` varchar(255) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `servicios`
-- 

