DROP DATABASE IF EXISTS ilccampu_usuarios;
CREATE DATABASE ilccampu_usuarios CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE ilccampu_usuarios;
DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
	ID_Usuario int NOT NULL AUTO_INCREMENT,
    username varchar(100) NOT NULL,
    email varchar(100) NOT NULL,
    password varchar(100) NOT NULL,
    rol varchar(100),
	PRIMARY KEY(ID_Usuario),
    UNIQUE KEY(username,email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
INSERT INTO `usuarios`(`username`, `email`, `password`, `rol`) VALUES ('miguel','mpena.creactiva@gmail.com','','admin'),('samuel','coachsamuelg@gmail.com','creactiva100!','admin'),('ricardo','ingoriere@gmail.com','7391','admin'),('francisco','fsanchez.creactiva@gmail.com','creactiva100!','admin'),('fernando','fernandocel@gmail.com','123456789','admin');
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