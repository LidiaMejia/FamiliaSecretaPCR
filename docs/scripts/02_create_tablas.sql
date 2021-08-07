CREATE TABLE `cristore_inscripciones`.`comunion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `edad` VARCHAR(15) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  PRIMARY KEY (`id`));

  CREATE TABLE `cristore_inscripciones`.`confirma` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `edad` VARCHAR(15) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  PRIMARY KEY (`id`));

  CREATE TABLE `cristore_inscripciones`.`adultos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `edad` VARCHAR(15) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  `bautismo` TINYINT NULL DEFAULT 0 COMMENT '1 si va a realizar el bautismo',
  `comunion` TINYINT NULL DEFAULT 0 COMMENT '1 si va a realizar la primera comunion', 
  `confirma` TINYINT NULL DEFAULT 0 COMMENT '1 si va a realizar la confirma',
  PRIMARY KEY (`id`));

CREATE TABLE `cristore_inscripciones`.`lectores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `edad` VARCHAR(15) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  PRIMARY KEY (`id`));

  CREATE TABLE `cristore_inscripciones`.`Coroadultos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `edad` VARCHAR(15) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  PRIMARY KEY (`id`));

  CREATE TABLE `cristore_inscripciones`.`Corokids` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `edad` VARCHAR(15) NOT NULL,
  `telefono` VARCHAR(100) NOT NULL,
  `email` VARCHAR(200) NULL,
  PRIMARY KEY (`id`));