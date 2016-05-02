# SQL Manager for MySQL 5.3.1.7
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : db_sonda


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE IF EXISTS `db_sonda`;

CREATE DATABASE `db_sonda`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';

USE `db_sonda`;

#
# Dropping database objects
#

DROP TABLE IF EXISTS `muestras`;
DROP TABLE IF EXISTS `tipos_de_suelo`;
DROP TABLE IF EXISTS `sensores`;

#
# Structure for the `sensores` table : 
#

CREATE TABLE `sensores` (
  `id_sensor` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombre_sensor` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `orden` INTEGER(11) NOT NULL DEFAULT 1,
  `unidad_medida` VARCHAR(20) COLLATE utf8_general_ci NOT NULL DEFAULT '%',
  PRIMARY KEY USING BTREE (`id_sensor`) COMMENT '',
  UNIQUE INDEX `nombre_sensor` USING BTREE (`nombre_sensor`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=6 AVG_ROW_LENGTH=3276 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `tipos_de_suelo` table : 
#

CREATE TABLE `tipos_de_suelo` (
  `id_tipo_suelo` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_suelo` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `f_electrolitico_min` INTEGER(11) NOT NULL,
  `f_electrolito_max` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`id_tipo_suelo`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=5 AVG_ROW_LENGTH=4096 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `muestras` table : 
#

CREATE TABLE `muestras` (
  `id_muestra` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `id_sensor` INTEGER(11) NOT NULL,
  `id_tipo_suelo` INTEGER(11) NOT NULL,
  `valor_muestra` FLOAT(12,10) NOT NULL,
  `latitud` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `longitud` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `fecha_dato` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY USING BTREE (`id_muestra`) COMMENT '',
   INDEX `id_sensor` USING BTREE (`id_sensor`) COMMENT '',
   INDEX `id_tipo_suelo` USING BTREE (`id_tipo_suelo`) COMMENT '',
  CONSTRAINT `muestras_to_sensores_fk` FOREIGN KEY (`id_sensor`) REFERENCES `sensores` (`id_sensor`),
  CONSTRAINT `muestras_to_tipos_de_suelo_fk` FOREIGN KEY (`id_tipo_suelo`) REFERENCES `tipos_de_suelo` (`id_tipo_suelo`)
)ENGINE=InnoDB
AUTO_INCREMENT=21 AVG_ROW_LENGTH=862 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Data for the `sensores` table  (LIMIT -494,500)
#

INSERT INTO `sensores` (`id_sensor`, `nombre_sensor`, `orden`, `unidad_medida`) VALUES

  (1,'Humedad Relativa',2,'%'),
  (2,'Anemometro (Viento)',4,'Km/H'),
  (3,'Calidad del Aire',5,'.'),
  (4,'Temperatura',1,'&deg;'),
  (5,'Precipitaciones',3,'mm');
COMMIT;

#
# Data for the `tipos_de_suelo` table  (LIMIT -495,500)
#

INSERT INTO `tipos_de_suelo` (`id_tipo_suelo`, `nombre_tipo_suelo`, `f_electrolitico_min`, `f_electrolito_max`) VALUES

  (1,'Bosque',57,79),
  (2,'Humedal',80,100),
  (3,'Desierto',0,7),
  (4,'Cordillerano',60,90);
COMMIT;

#
# Data for the `muestras` table  (LIMIT -480,500)
#

INSERT INTO `muestras` (`id_muestra`, `id_sensor`, `id_tipo_suelo`, `valor_muestra`, `latitud`, `longitud`, `fecha_dato`) VALUES

  (1,1,1,12.0000000000,'-33.489758','-70.618294','2016-04-24 08:44:13'),
  (2,2,1,55.0000000000,'-33.489758','-70.618294','2016-04-24 08:45:42'),
  (3,3,1,3.0000000000,'-33.489758','-70.618294','2016-04-24 08:46:04'),
  (4,4,1,23.0000000000,'-33.489758','-70.618294','2016-04-24 08:46:23'),
  (5,5,1,1.0000000000,'-33.489758','-70.618294','2016-04-24 08:46:46'),
  (6,1,1,12.0000000000,'-33.050714','-71.611048','2016-04-24 08:44:13'),
  (7,2,1,55.0000000000,'-33.050714','-71.611048','2016-04-24 08:45:42'),
  (8,3,1,3.0000000000,'-33.050714','-71.611048','2016-04-24 08:46:04'),
  (9,4,1,23.0000000000,'-33.050714','-71.611048','2016-04-24 08:46:23'),
  (10,5,1,1.0000000000,'-33.050714','-71.611048','2016-04-24 08:46:46'),
  (11,1,1,12.0000000000,'-32.871303','-71.248242','2016-04-24 08:44:13'),
  (12,2,1,55.0000000000,'-32.871303','-71.248242','2016-04-24 08:45:42'),
  (13,3,1,3.0000000000,'-32.871303','-71.248242','2016-04-24 08:46:04'),
  (14,4,1,23.0000000000,'-32.871303','-71.248242','2016-04-24 08:46:23'),
  (15,5,1,1.0000000000,'-32.871303','-71.248242','2016-04-24 08:46:46'),
  (16,2,1,55.0000000000,'-33.687927','-71.207895','2016-04-24 08:45:42'),
  (18,3,1,3.0000000000,'-33.687927','-71.207895','2016-04-24 08:46:04'),
  (19,4,1,23.0000000000,'-33.687927','-71.207895','2016-04-24 08:46:23'),
  (20,5,1,1.0000000000,'-33.687927','-71.207895','2016-04-24 08:46:46');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;