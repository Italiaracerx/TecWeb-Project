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
	username varchar(64) NOT NULL,
	prodotto varchar(64) NOT NULL,
	alt varchar(64) NOT NULL,
	descrizione varchar(64) NOT NULL,
	/*ATTENZIONE CHE ALT E DESCRIZIONE POTREBBERO ESSERE LA STESSA COSA*/
	data datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (username, prodotto)
);

CREATE TABLE promozioni(
	username varchar(64) NOT NULL,
	promozione varchar(64) NOT NULL,
	alt varchar(64) NOT NULL,
	data datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (username, promozione)
);

CREATE TABLE eventi(
	ID int NOT NULL AUTO_INCREMENT,
	descrizione varchar(64),
	PRIMARY KEY(ID) 
);

DELIMITER $$
CREATE TRIGGER `EliminaUtente` BEFORE DELETE ON `accountNegozi` FOR EACH ROW BEGIN
if OLD.username <> 'admin'
then
	DELETE FROM info WHERE user =OLD.username;
	DELETE FROM orario WHERE user =OLD.username;
	DELETE FROM logo WHERE user =OLD.username;
	DELETE FROM promozioni WHERE user =OLD.username;
	DELETE FROM prodotti WHERE user =OLD.username;
end if;
END
$$ DELIMITER ;

DELIMITER $$
CREATE TRIGGER `NuovoUtente` AFTER INSERT ON `accountNegozi` FOR EACH ROW BEGIN
if NEW.username <> 'admin'
then
	INSERT INTO info values (NEW.username,'WORK IN PROGRESS','WORK IN PROGRESS','WORK IN PROGRESS','WORK IN PROGRESS','WORK IN PROGRESS','WORK IN PROGRESS');
	INSERT INTO orario values (NEW.username,'08:30 - 22:00','08:30 - 22:00','08:30 - 22:00','08:30 - 22:00','08:30 - 22:00','08:30 - 22:00','08:30 - 22:00');
	INSERT INTO logo values (NEW.username,'images/working_progress.png','ciauzzone');
end if;
END
$$ DELIMITER ;