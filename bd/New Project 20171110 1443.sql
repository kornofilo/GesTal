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
INSERT INTO `bodega` (`id_bodega`,`nombre_bodega`,`direccion`) VALUES 
 (1,'hola','12'),
 (2,'chitre','12');
/*!40000 ALTER TABLE `bodega` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`caja`
--

DROP TABLE IF EXISTS `caja`;
CREATE TABLE `caja` (
  `id_caja` int(11) NOT NULL auto_increment,
  `nombre_caja` varchar(45) default NULL,
  `id_de_estante` int(10) unsigned NOT NULL,
  `id_de_bodega` int(10) unsigned NOT NULL,
  `estado` int(1) unsigned NOT NULL,
  PRIMARY KEY  (`id_caja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`caja`
--

/*!40000 ALTER TABLE `caja` DISABLE KEYS */;
INSERT INTO `caja` (`id_caja`,`nombre_caja`,`id_de_estante`,`id_de_bodega`,`estado`) VALUES 
 (1,'este',10,100,1),
 (2,'david',2,1,1);
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
  `id_direccion` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `creado_por_idx` (`creado_por`),
  KEY `id_metadata_idx` (`id_metadata`),
  KEY `id_direccion_idx` (`id_direccion`),
  CONSTRAINT `creado_por` FOREIGN KEY (`creado_por`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`documento`
--

/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
INSERT INTO `documento` (`id`,`id_metadata`,`version`,`estado`,`fecha_creacion`,`creado_por`,`fecha_subida`,`id_direccion`) VALUES 
 (1,1,2,'1','2000-12-12 12:12:12',2,'2001-12-12 12:12:09',2),
 (2,1,2,'1','2000-12-12 12:12:12',2,'2001-12-12 12:12:09',2),
 (4,1,2,'1','2000-12-12 12:12:12',2,'2001-12-12 12:12:09',NULL);
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`estante`
--

DROP TABLE IF EXISTS `estante`;
CREATE TABLE `estante` (
  `id_estante` int(11) NOT NULL auto_increment,
  `nombre_estante` varchar(45) default NULL,
  `id_de_bodega` int(10) unsigned NOT NULL,
  `estado` int(1) unsigned NOT NULL,
  PRIMARY KEY  (`id_estante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`estante`
--

/*!40000 ALTER TABLE `estante` DISABLE KEYS */;
INSERT INTO `estante` (`id_estante`,`nombre_estante`,`id_de_bodega`,`estado`) VALUES 
 (1,'qw',1,1);
/*!40000 ALTER TABLE `estante` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`folder`
--

DROP TABLE IF EXISTS `folder`;
CREATE TABLE `folder` (
  `id_folder` int(11) NOT NULL auto_increment,
  `nombre_folder` varchar(45) default NULL,
  `id_de_estante` int(10) unsigned NOT NULL,
  `id_de_caja` int(10) unsigned NOT NULL,
  `id_de_bodega` int(10) unsigned NOT NULL,
  `estado` int(1) unsigned NOT NULL,
  PRIMARY KEY  (`id_folder`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`folder`
--

/*!40000 ALTER TABLE `folder` DISABLE KEYS */;
INSERT INTO `folder` (`id_folder`,`nombre_folder`,`id_de_estante`,`id_de_caja`,`id_de_bodega`,`estado`) VALUES 
 (1,'qwe',3,2,1,1),
 (2,'este',10,1,100,1);
/*!40000 ALTER TABLE `folder` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE `grupos` (
  `id_grupo` int(10) unsigned NOT NULL auto_increment,
  `nombre_grupo` varchar(45) NOT NULL,
  `departamento` varchar(45) NOT NULL,
  PRIMARY KEY  (`id_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`grupos`
--

/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` (`id_grupo`,`nombre_grupo`,`departamento`) VALUES 
 (1,'operadores','sistemas'),
 (2,'gerentes','sistemas'),
 (3,'secretarias','contabilidad'),
 (4,'bodegueros','bodega'),
 (5,'administradores','sistemas'),
 (6,'grupo de los todos','gerencia'),
 (7,'grupo de los nada','antes que nadda'),
 (8,'as','sd');
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;


--
-- Table structure for table `mydb`.`grupos_modulos`
--

DROP TABLE IF EXISTS `grupos_modulos`;
CREATE TABLE `grupos_modulos` (
  `id_del_grupo` int(10) unsigned NOT NULL,
  `id_del_modulo` varchar(45) NOT NULL,
  `s` int(2) unsigned NOT NULL,
  `i` int(2) unsigned NOT NULL,
  `u` int(2) unsigned NOT NULL,
  `d` int(2) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`grupos_modulos`
--

/*!40000 ALTER TABLE `grupos_modulos` DISABLE KEYS */;
INSERT INTO `grupos_modulos` (`id_del_grupo`,`id_del_modulo`,`s`,`i`,`u`,`d`) VALUES 
 (5,'1',1,1,1,1),
 (5,'2',1,1,1,1),
 (5,'3',1,1,1,1),
 (5,'4',1,1,1,1),
 (5,'5',1,1,1,0),
 (5,'6',1,1,1,0),
 (2,'1',1,0,0,0),
 (2,'2',1,0,0,0),
 (2,'3',1,0,0,0),
 (2,'4',1,0,0,0),
 (2,'5',1,0,0,0),
 (2,'6',1,0,0,0),
 (3,'1',1,0,0,0),
 (3,'2',1,0,0,0),
 (3,'3',1,1,0,0),
 (3,'4',1,1,0,0),
 (3,'5',1,1,0,0),
 (3,'6',1,1,0,0),
 (4,'1',0,0,0,0),
 (4,'2',0,0,0,0),
 (4,'3',0,0,0,0),
 (4,'4',0,0,0,0),
 (4,'5',1,0,0,0),
 (4,'6',0,0,0,0),
 (5,'7',1,1,1,0),
 (2,'7',1,1,1,0),
 (3,'7',1,1,1,0),
 (4,'7',1,1,1,0),
 (6,'1',1,1,1,1),
 (6,'2',1,1,1,1),
 (6,'3',1,1,1,1),
 (6,'4',1,1,1,1),
 (6,'5',1,1,1,1),
 (6,'6',1,1,1,1),
 (6,'7',1,1,1,1),
 (6,'8',1,1,1,1),
 (6,'9',1,1,1,1),
 (7,'1',0,0,0,0),
 (7,'2',0,0,0,0),
 (7,'3',0,0,0,0),
 (7,'4',0,0,0,0),
 (7,'5',0,0,0,0),
 (7,'6',0,0,0,0),
 (7,'7',0,0,0,0),
 (7,'8',0,0,0,0),
 (7,'9',0,0,0,0),
 (6,'10',1,1,1,1),
 (6,'11',1,1,1,1),
 (6,'12',1,1,1,1),
 (6,'13',1,1,1,1),
 (6,'14',1,1,1,1),
 (6,'15',1,1,1,1);
INSERT INTO `grupos_modulos` (`id_del_grupo`,`id_del_modulo`,`s`,`i`,`u`,`d`) VALUES 
 (6,'16',1,1,1,1);
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
  `id_modulo` int(10) unsigned NOT NULL auto_increment,
  `descripcion` varchar(45) NOT NULL,
  `ruta` varchar(60) NOT NULL,
  PRIMARY KEY  (`id_modulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`modulos`
--

/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` (`id_modulo`,`descripcion`,`ruta`) VALUES 
 (1,'usuarios','index.php/usuarios/lista_usuarios'),
 (2,'grupos','index.php/grupo/lista_grupos'),
 (3,'grupos-modulos','index.php/grupos_modulos/lista_modulos'),
 (4,'metadata','index.php/metadata/lista_metadata'),
 (5,'documentos','index.php/documentos/lista_documentos'),
 (6,'imagenes','index.php/imagenes/lista_imagenes'),
 (7,'bodega','index.php/bodega/lista_bodega'),
 (8,'estante','index.php/estante/lista_estante'),
 (9,'cajas','index.php/caja/lista_caja'),
 (10,'folder','index.php/folder/lista_folder'),
 (12,'estantes','index,php/estantes/lista_estantes'),
 (13,'usuarios_grupos','index,php/usuarios_grupos/lista_usuarios_grupos'),
 (14,'modulos','index.php/modulo/ver_modulo');
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
  `id_del_grupo` int(10) unsigned NOT NULL,
  `estado` int(1) unsigned NOT NULL,
  PRIMARY KEY  (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydb`.`usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`,`nombre`,`cedula`,`telefono`,`correo`,`password`,`id_del_grupo`,`estado`) VALUES 
 (1,'aldair','4-774-200','64743533','aldair774@hotmail.com','12345',1,1),
 (2,'will','4-2453-67','13245','will@horai.fom','will',5,1),
 (3,'maximo','4-356-2333','21434533','max@hotmail.com','max',4,1),
 (4,'ricardo','4-6344-2763','88654533','ricardo@hotmail.com','ricardo',2,1),
 (11,'todo','4-2453-67','13245','will@horai.fom','todo',6,1),
 (13,'nada','4-2453-67','13245','will@horai.fom','nada',7,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
