DROP DATABASE IF EXISTS archimede;
CREATE DATABASE archimede;

CREATE TABLE accountNegozi(
	username varchar(20),
	password varchar (64),
	PRIMARY KEY (username,password)
);

CREATE TABLE orario(
	username varchar(64) PRIMARY KEY,
	lunedi varchar(64) NOT NULL,
	martedi varchar(64) NOT NULL,
	mercoledi varchar(64) NOT NULL,
	giovedi varchar(64) NOT NULL,
	venerdi varchar(64) NOT NULL,
	sabato varchar(64) NOT NULL,
	domenica varchar(64) NOT NULL
);

CREATE TABLE logo(
	username varchar(64) PRIMARY KEY,
	logo varchar(64) NOT NULL,
	descrizione varchar(64) not null
);

CREATE TABLE info(
	username varchar(64) PRIMARY KEY,
	negozio varchar(64) not null,
	telefono varchar(64) not null,
	mail varchar(64),
	sito varchar(64),
	titolo varchar(64),
	descrizione varchar(256)
);

CREATE TABLE prodotti(
	username varchar(64) PRIMARY KEY,
	prodotto varchar(64) NOT NULL,
	alt varchar(64) NOT NULL,
	descrizione varchar(64) NOT NULL
);

CREATE TABLE promozioni(
	username varchar(64) PRIMARY KEY,
	promozione varchar(64) NOT NULL,
	alt varchar(64) NOT NULL
);

CREATE TABLE eventi(
	ID int NOT NULL AUTO_INCREMENT,
	descrizione varchar(64),
	PRIMARY KEY(ID) 
);

DELIMITER $$
CREATE TRIGGER `EliminaUtente` AFTER DELETE ON `accountNegozi` FOR EACH ROW BEGIN
DELETE FROM info WHERE user =old.username;
DELETE FROM orario WHERE user =old.username;
DELETE FROM logo WHERE user =old.username;
DELETE FROM promozioni WHERE user =old.username;
DELETE FROM prodotti WHERE user =old.username;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `NuovoUtente` AFTER INSERT ON `accountNegozi` FOR EACH ROW BEGIN
INSERT INTO info values (new.username,'WORK IN PROGRESS','WORK IN PROGRESS','WORK IN PROGRESS','WORK IN PROGRESS','WORK IN PROGRESS','WORK IN PROGRESS');
INSERT INTO orario values (new.username,'08:30 - 22:00','08:30 - 22:00','08:30 - 22:00','08:30 - 22:00','08:30 - 22:00','08:30 - 22:00','08:30 - 22:00');
INSERT INTO logo values (new.username,'images/cose','ciauzzone');

END
$$
DELIMITER ;