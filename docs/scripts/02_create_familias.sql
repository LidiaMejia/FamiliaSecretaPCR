CREATE TABLE `familiaspcr`.`familias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `apellidos` VARCHAR(100) NOT NULL,
  `celular` VARCHAR(15) NULL,
  `email` VARCHAR(100) NULL,
  `capilla` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`));