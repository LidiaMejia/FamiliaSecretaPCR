CREATE SCHEMA `inscripcionespcr`;

CREATE USER 'userp'@'%' IDENTIFIED BY 'r3suc1t4d0';
-- CREATE USER 'userp'@'%' IDENTIFIED WITH mysql_native_password BY 'r3suc1t4d0';

GRANT ALL PRIVILEGES ON parroquia.* TO 'userp'@'%';