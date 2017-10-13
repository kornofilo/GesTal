-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.22-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema `mydb`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `mydb`;
USE `mydb`;

--
-- Table structure for table `mydb`.`auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
CREATE TABLE `auditoria` (
  `id_auditoria` int(10) unsigned NOT NULL auto_increment,
  `id_usuario` int(10) unsigned NOT NULL,
  `fecha` datetime NOT NULL,
  `accion` varchar(15) NOT NULL,
  `id_documento` int(10) unsigned NOT NULL,
  `version_documento` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id_auditoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`auditoria`
--

/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `auditoria` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`bodega`
--

DROP TABLE IF EXISTS `bodega`;
CREATE TABLE `bodega` (
  `id_bodega` int(11) NOT NULL auto_increment,
  `nombre_bodega` varchar(45) default NULL,
  `direccion` varchar(45) default NULL,
  PRIMARY KEY  (`id_bodega`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`bodega`
--

/*!40000 ALTER TABLE `bodega` DISABLE KEYS */;
/*!40000 ALTER TABLE `bodega` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`caja`
--

DROP TABLE IF EXISTS `caja`;
CREATE TABLE `caja` (
  `id_caja` int(11) NOT NULL auto_increment,
  `nombre_caja` varchar(45) default NULL,
  PRIMARY KEY  (`id_caja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`caja`
--

/*!40000 ALTER TABLE `caja` DISABLE KEYS */;
/*!40000 ALTER TABLE `caja` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`direccion`
--

DROP TABLE IF EXISTS `direccion`;
CREATE TABLE `direccion` (
  `id_direccion` int(11) NOT NULL auto_increment,
  `id_folder` int(11) default NULL,
  `id_bodega` int(11) default NULL,
  `id_estante` int(11) default NULL,
  `id_caja` int(11) default NULL,
  PRIMARY KEY  (`id_direccion`),
  KEY `id_bodega_idx` (`id_bodega`),
  KEY `id_estante_idx` (`id_estante`),
  KEY `id_caja_idx` (`id_caja`),
  KEY `id_folder_idx` (`id_folder`),
  CONSTRAINT `id_bodega` FOREIGN KEY (`id_bodega`) REFERENCES `bodega` (`id_bodega`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_caja` FOREIGN KEY (`id_caja`) REFERENCES `caja` (`id_caja`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_estante` FOREIGN KEY (`id_estante`) REFERENCES `estante` (`id_estante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_folder` FOREIGN KEY (`id_folder`) REFERENCES `folder` (`id_folder`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`direccion`
--

/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`documento`
--

DROP TABLE IF EXISTS `documento`;
CREATE TABLE `documento` (
  `id` int(11) NOT NULL auto_increment,
  `id_metadata` int(11) NOT NULL,
  `version` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `creado_por` int(11) NOT NULL,
  `fecha_subida` datetime NOT NULL,
  `id_direccion` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `creado_por_idx` (`creado_por`),
  KEY `id_metadata_idx` (`id_metadata`),
  KEY `id_direccion_idx` (`id_direccion`),
  CONSTRAINT `creado_por` FOREIGN KEY (`creado_por`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_direccion` FOREIGN KEY (`id_direccion`) REFERENCES `direccion` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_metadata` FOREIGN KEY (`id_metadata`) REFERENCES `metadata` (`id_metadata`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`documento`
--

/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`estante`
--

DROP TABLE IF EXISTS `estante`;
CREATE TABLE `estante` (
  `id_estante` int(11) NOT NULL auto_increment,
  `nombre_estante` varchar(45) default NULL,
  PRIMARY KEY  (`id_estante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`estante`
--

/*!40000 ALTER TABLE `estante` DISABLE KEYS */;
/*!40000 ALTER TABLE `estante` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`folder`
--

DROP TABLE IF EXISTS `folder`;
CREATE TABLE `folder` (
  `id_folder` int(11) NOT NULL auto_increment,
  `nombre_folder` varchar(45) default NULL,
  PRIMARY KEY  (`id_folder`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`folder`
--

/*!40000 ALTER TABLE `folder` DISABLE KEYS */;
/*!40000 ALTER TABLE `folder` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE `grupos` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nombre_grupo` varchar(45) NOT NULL,
  `departamento` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`grupos`
--

/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` (`id`,`nombre_grupo`,`departamento`) VALUES 
 (1,'hla','sd'),
 (2,'operadores','sistemas'),
 (3,'gerentes','sistemas'),
 (4,'secretarias','contabilidad'),
 (5,'bodegueros','bodega'),
 (6,'administradores','sistemas'),
 (7,'operadores','sistemas'),
 (8,'gerentes','sistemas'),
 (9,'secretarias','contabilidad'),
 (10,'bodegueros','bodega'),
 (11,'administradores','sistemas');
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`grupos_modulos`
--

DROP TABLE IF EXISTS `grupos_modulos`;
CREATE TABLE `grupos_modulos` (
  `id_grupo` int(10) unsigned NOT NULL,
  `id_modulo` varchar(45) NOT NULL,
  `s` int(2) unsigned NOT NULL,
  `i` int(2) unsigned NOT NULL,
  `u` int(2) unsigned NOT NULL,
  `d` int(2) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`grupos_modulos`
--

/*!40000 ALTER TABLE `grupos_modulos` DISABLE KEYS */;
INSERT INTO `grupos_modulos` (`id_grupo`,`id_modulo`,`s`,`i`,`u`,`d`) VALUES 
 (6,'1',1,1,1,0),
 (6,'2',1,1,1,1),
 (6,'3',1,1,1,1),
 (6,'4',1,1,1,1),
 (6,'5',1,1,1,1);
/*!40000 ALTER TABLE `grupos_modulos` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`imagen`
--

DROP TABLE IF EXISTS `imagen`;
CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL auto_increment,
  `id_documento` int(11) default NULL,
  `imagen` varchar(200) default NULL,
  PRIMARY KEY  (`id_imagen`),
  KEY `id_documento_idx` (`id_documento`),
  CONSTRAINT `id_documento` FOREIGN KEY (`id_documento`) REFERENCES `documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`imagen`
--

/*!40000 ALTER TABLE `imagen` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagen` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`meta`
--

DROP TABLE IF EXISTS `meta`;
CREATE TABLE `meta` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `valor` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `id_documento` int(10) unsigned NOT NULL,
  `usuario` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`meta`
--

/*!40000 ALTER TABLE `meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `meta` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`modulos`
--

DROP TABLE IF EXISTS `modulos`;
CREATE TABLE `modulos` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `descripcion` varchar(45) NOT NULL,
  `ruta` varchar(60) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`modulos`
--

/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` (`id`,`descripcion`,`ruta`) VALUES 
 (1,'usuarios','base url'),
 (2,'grupos','base'),
 (3,'modulos','base');
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL auto_increment,
  `nombre` varchar(45) default NULL,
  `cedula` varchar(45) default NULL,
  `telefono` varchar(45) default NULL,
  `correo` varchar(45) default NULL,
  `password` varchar(45) default NULL,
  PRIMARY KEY  (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`,`nombre`,`cedula`,`telefono`,`correo`,`password`) VALUES 
 (1,'aldair','4-774-200','64743533','aldair774@hotmail.com','12345'),
 (2,'will','4-743-246','63434533','will@hotmail.com','will'),
 (3,'maximo','4-356-2333','21434533','max@hotmail.com','max'),
 (4,'ricardo','4-6344-2763','88654533','ricardo@hotmail.com','ricardo');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`usuarios_grupos`
--

DROP TABLE IF EXISTS `usuarios_grupos`;
CREATE TABLE `usuarios_grupos` (
  `id_del_usuario` int(10) unsigned NOT NULL,
  `id_del_grupo` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id_del_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`usuarios_grupos`
--

/*!40000 ALTER TABLE `usuarios_grupos` DISABLE KEYS */;
INSERT INTO `usuarios_grupos` (`id_del_usuario`,`id_del_grupo`) VALUES 
 (1,1),
 (2,5),
 (3,4),
 (4,2);
/*!40000 ALTER TABLE `usuarios_grupos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
