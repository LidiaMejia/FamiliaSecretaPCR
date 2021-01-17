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