DROP DATABASE IF EXISTS CentroArchimede;
CREATE DATABASE CentroArchimede;

DROP TABLE IF EXISTS Login;
CREATE TABLE login(
id int NOT NULL AUTO_INCREMENT,
username varchar(64) NOT NULL,
password varchar(64) NOT NULL,
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS Orario;
CREATE TABLE Orario(
username varchar(64) NOT NULL,
feriale varchar(20) NOT NULL,
sabato varchar(20) NOT NULL,
festivo varchar(20) NOT NULL,
PRIMARY KEY (username),
FOREIGN KEY (username) REFERENCES login (username)
);

DROP TABLE IF EXISTS private;
CREATE TABLE private(
username varchar (64) NOT NULL,
negozio varchar (16) NOT NULL,
immagine varchar (64) NOT NULL,
email varchar (32) NOT NULL,
telefono varchar (10) NOT NULL,
PRIMARY KEY (username),
FOREIGN KEY(username) REFERENCES login (username)
);

CREATE TABLE Persons (
    ID int NOT NULL AUTO_INCREMENT,
    LastName varchar(255) NOT NULL,
    FirstName varchar(255),
    Age int,
    PRIMARY KEY (ID)
);

INSERT INTO login VALUES("admin","admin");
INSERT INTO login VALUES("lego","lego");
INSERT INTO login VALUES("armani","armani");
INSERT INTO login VALUES("trony","trony");
