# ************************************************************
# Sequel Pro SQL dump
# Versi�n 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.38)
# Base de datos: MiTienda
# Tiempo de Generaci�n: 2015-03-17 14:39:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla Categorias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Categorias`;

CREATE TABLE `Categorias` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(60) DEFAULT NULL,
  `descripcion_categoria` tinytext,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Categorias` WRITE;
/*!40000 ALTER TABLE `Categorias` DISABLE KEYS */;

INSERT INTO `Categorias` (`id_cat`, `nombre_categoria`, `descripcion_categoria`)
VALUES
	(1,'Drama','Aqui estan las peliculas de drama'),
	(2,'Comedia','Aquí van las peliculas de comedia\n'),
	(3,'Terror','Aquí van las peliculas de terror');

/*!40000 ALTER TABLE `Categorias` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Contactos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Contactos`;

CREATE TABLE `Contactos` (
  `id_contacto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(255) DEFAULT NULL,
  `asunto` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `mensaje` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_contacto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Contactos` WRITE;
/*!40000 ALTER TABLE `Contactos` DISABLE KEYS */;

INSERT INTO `Contactos` (`id_contacto`, `nombre_completo`, `asunto`, `correo`, `mensaje`)
VALUES
	(1,'MoisÃ©s Rojas','probando','moyo2100@gmail.com','asdf');

/*!40000 ALTER TABLE `Contactos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Productos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Productos`;

CREATE TABLE `Productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clave_producto` varchar(60) DEFAULT NULL,
  `nombre_producto` varchar(60) DEFAULT NULL,
  `descripcion_producto` tinytext,
  `imagen_producto` varchar(60) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `fecha_lanzamiento` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Productos` WRITE;
/*!40000 ALTER TABLE `Productos` DISABLE KEYS */;

INSERT INTO `Productos` (`id`, `clave_producto`, `nombre_producto`, `descripcion_producto`, `imagen_producto`, `precio`, `fecha_lanzamiento`)
VALUES
	(1,'SKU-010','Fight Club','Un tipo loco que le gustan las peleas','fight_club.jpg',189.00,NULL),
	(2,'DKU-02','Forrest Gump','Un tipo Feliz\n','Forrest.jpg',189.00,NULL),
	(3,'sku-200','Batman Forever','asdf fdsa','172713-BatmanForever.jpg',79.00,'2015-01-14'),
	(4,'sku-202','Los aÃ±os felices','<p>Aqu&iacute; va un texto feliz</p>\r\n','153016-guardianes-de-la-galaxia.jpg',178.00,'2015-02-18'),
	(5,'asdf','fdsa','&lt;p&gt;asdf&lt;/p&gt;\r\n','151034-guardianes-de-la-galaxia.jpg',123.00,'2015-03-10'),
	(6,'sku-1200','asdf','&lt;p&gt;fdsa&lt;/p&gt;\r\n','151118-guardianes-de-la-galaxia.jpg',321.00,'2015-03-09'),
	(7,'SKU-1289','Batman Forever','asdfasdf\n',NULL,189.00,'0000-00-00');

/*!40000 ALTER TABLE `Productos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla Relacion_producto_categoria
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Relacion_producto_categoria`;

CREATE TABLE `Relacion_producto_categoria` (
  `id_producto` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Relacion_producto_categoria` WRITE;
/*!40000 ALTER TABLE `Relacion_producto_categoria` DISABLE KEYS */;

INSERT INTO `Relacion_producto_categoria` (`id_producto`, `id_categoria`)
VALUES
	(1,1),
	(1,2),
	(4,1),
	(4,3);

/*!40000 ALTER TABLE `Relacion_producto_categoria` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
