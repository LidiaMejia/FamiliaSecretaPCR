USE `cristore_inscripciones`;

CREATE TABLE `comunion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `edad` VARCHAR(15) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  `fecha_inscripcion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));

  CREATE TABLE `confirma` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `edad` VARCHAR(15) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  `fecha_inscripcion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));

  CREATE TABLE `adultos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `edad` VARCHAR(15) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  `bautismo` TINYINT NULL DEFAULT 0 COMMENT '1 si va a realizar el bautismo',
  `comunion` TINYINT NULL DEFAULT 0 COMMENT '1 si va a realizar la primera comunión', 
  `confirma` TINYINT NULL DEFAULT 0 COMMENT '1 si va a realizar la confirma',
  `fecha_inscripcion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));

  CREATE TABLE `Coroadultos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `edad` VARCHAR(15) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  PRIMARY KEY (`id`));

  CREATE TABLE `Corokids` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `edad` VARCHAR(15) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `lectores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `edad` VARCHAR(15) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  `fecha_inscripcion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));

  CREATE TABLE `matrimonios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre_pareja` VARCHAR(200) NOT NULL,
  `tiempo_casados` VARCHAR(50) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  `sector` VARCHAR(200) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `familias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre_familia` VARCHAR(200) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  `mensaje_tarjeta` VARCHAR(400) NOT NULL,
  `plantilla_tarjeta` INT NOT NULL DEFAULT 1 COMMENT 'Número de Plantilla en Canva',
  PRIMARY KEY (`id`));

CREATE TABLE `monaguillos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_nino` VARCHAR(100) NOT NULL,
  `edad_nino` CHAR(3) NOT NULL,
  `nombre_madre` VARCHAR(100) NOT NULL,
  `telefono_madre` VARCHAR(10) NOT NULL,
  `nombre_padre` VARCHAR(100) NOT NULL,
  `telefono_padre` VARCHAR(100) NOT NULL,
  `parroquia_bautismo` VARCHAR(100) NOT NULL,
  `fecha_bautismo` DATETIME NOT NULL,
  `parroquia_comunion` VARCHAR(100) NOT NULL,
  `fecha_comunion` DATETIME NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `latin` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `identidad` varchar(15) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `lugar_residencia` varchar(255) NOT NULL,
  `nivel_educacion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`));

  CREATE TABLE `retiroCuaresma` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `identidad` varchar(15) NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  `parroquia` VARCHAR(255) NOT NULL,
  `sector` VARCHAR(255) NOT NULL,
  `movimiento` VARCHAR(255) NOT NULL,
  `placa_vehiculo` VARCHAR(8) NOT NULL,
  `marca_vehiculo` VARCHAR(55) NOT NULL,
  `color_vehiculo` VARCHAR(55) NOT NULL,
  `fecha_inscripcion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));

  CREATE TABLE `adoradores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  `fecha_inscripcion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));

CREATE TABLE `grupoOracionInfantil` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_nino` VARCHAR(100) NOT NULL,
  `edad_nino` CHAR(3) NOT NULL,
  `nombre_madre` VARCHAR(100) NOT NULL,
  `telefono_madre` VARCHAR(10) NOT NULL,
  `nombre_padre` VARCHAR(100) NOT NULL,
  `telefono_padre` VARCHAR(100) NOT NULL,
  `bautismo` TINYINT NULL DEFAULT 0 COMMENT '1 si el niño ya realizó el bautismo',
  `comunion` TINYINT NULL DEFAULT 0 COMMENT '1 si el niño ya realizó la primera comunión', 
  `fecha_inscripcion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));

CREATE TABLE `madrugadores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  `fecha_inscripcion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));

CREATE TABLE `cursoApocalipsis` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  `fecha_inscripcion` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`));
