DROP DATABASE IF EXISTS ilccampu_usuarios;
CREATE DATABASE ilccampu_usuarios CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE ilccampu_usuarios;
DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
	ID_Usuario int NOT NULL AUTO_INCREMENT,
    username varchar(20) NOT NULL,
    email varchar(50) NOT NULL,
    password varchar(60) NOT NULL,
    rol varchar(50),
	PRIMARY KEY(ID_Usuario),
    UNIQUE KEY(username,email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
INSERT INTO `usuarios`(`username`, `email`, `password`, `rol`) VALUES ('miguel','mpena.creactiva@gmail.com','$2y$12$aHvkbXmIYr1NVm4CYQB0RO3sRpGqJ6klWmzTtKg1l9iBkjLIBFtem','admin'),('samuel','coachsamuelg@gmail.com','$2y$12$xaz3UWNIAC6Ef9etwNGU.uCjXPwxsELriqCDNzLTOK0GpcNinmQwm','admin'),('ricardo','ingoriere@gmail.com','$2y$12$eYG.FMTDFXgR5uC.fvjEE.C8LfpzODXOjTrIdlt1hM6nwPECBAoK6','admin'),('francisco','fsanchez.creactiva@gmail.com','$2y$12$hgPboQ0JdfItiWED.Qy41.0ooZLW9qfR.wKBuMzS6TwUb2w7UstJu','admin'),('fernando','fernandocel@gmail.com','$2y$12$Z4K7D0HAdQCic0hUnnIeyOzP5SNnii222ONf6JMTdbndUKmYsiS8e','admin');
DROP TABLE IF EXISTS Usuarios_Clc;
CREATE TABLE IF NOT EXISTS Usuarios_Clc(
    ID int NOT NULL AUTO_INCREMENT,
    Certificado varchar(10) NOT NULL,
    Apellido varchar(45),
    Nombre varchar(45),
    Email varchar(100),
    Telefono varchar(100),
    Rol varchar(200),
    Cohorte varchar(100),
    Observacion varchar(200),
    PRIMARY KEY(ID),
    UNIQUE KEY(ID,Email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;