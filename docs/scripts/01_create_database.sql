CREATE SCHEMA `cristore_inscripciones`;

CREATE USER 'cristore_ins'@'%' IDENTIFIED BY '38QdZiI9gprh';
-- CREATE USER 'cristore_ins'@'%' IDENTIFIED WITH mysql_native_password BY '38QdZiI9gprh';

GRANT ALL PRIVILEGES ON cristore_inscripciones.* TO 'cristore_ins'@'%';