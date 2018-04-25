USE darossi;
/*

DROP DATABASE IF EXISTS Archimede;
CREATE DATABASE Archimede;
*/

SET FOREIGN_KEY_CHECKS=0;


DROP TABLE IF EXISTS type_account;
CREATE TABLE type_account(
	user_type varchar(64) NOT NULL,
	link varchar(64) NOT NULL,
	home boolean DEFAULT '0',
	PRIMARY KEY(user_type,link)
);

DROP TABLE IF EXISTS account;
CREATE TABLE account(
	username varchar(64),
	type char(64) NOT NULL,
	password varchar(64) NOT NULL,
	PRIMARY KEY (username),
	FOREIGN KEY (type) REFERENCES type_account(user_type)
);

DROP TABLE IF EXISTS orario;
CREATE TABLE orario(
	username varchar(64) PRIMARY KEY,
	lunedi varchar(64) NOT NULL,
	martedi varchar(64) NOT NULL,
	mercoledi varchar(64) NOT NULL,
	giovedi varchar(64) NOT NULL,
	venerdi varchar(64) NOT NULL,
	sabato varchar(64) NOT NULL,
	domenica varchar(64) NOT NULL,
	FOREIGN KEY (username) REFERENCES account(username)
);

DROP TABLE IF EXISTS logo;
CREATE TABLE logo(
	username varchar(64) PRIMARY KEY,
	logo varchar(64) NOT NULL,
	alt varchar(64) NOT NULL,
	FOREIGN KEY (username) REFERENCES account(username)
);

DROP TABLE IF EXISTS info;
CREATE TABLE info(
	username varchar(64) PRIMARY KEY,
	negozio varchar(64) NOT NULL,
	telefono varchar(64) NOT NULL,
	mail varchar(64),
	sito varchar(64),
	motto varchar(64),
	descrizione varchar(256),
	FOREIGN KEY (username) REFERENCES account(username)
);

DROP TABLE IF EXISTS prodotti;
CREATE TABLE prodotti(
	username varchar(64) NOT NULL,
	type ENUM('PRODOTTO','PROMOZIONE') NOT NULL,
	ID int NOT NULL AUTO_INCREMENT,
	titolo varchar(64) NOT NULL,
	alt varchar(64) NOT NULL,	
	descrizione varchar(64) NOT NULL,
	data datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (ID),
	FOREIGN KEY (username) REFERENCES account(username)
);

DROP TABLE IF EXISTS eventi;
CREATE TABLE eventi(
	ID int NOT NULL AUTO_INCREMENT,
	type ENUM('APERTURA','CHIUSURA','NOVITA') NOT NULL,
	data datetime NOT NULL,
	descrizione varchar(64),
	PRIMARY KEY(ID) 
);

SET FOREIGN_KEY_CHECKS=1;


DELIMITER $$
CREATE TRIGGER EliminaUtente BEFORE DELETE ON account FOR EACH ROW 
BEGIN
	DELETE FROM info WHERE username =OLD.username;
	DELETE FROM orario WHERE username =OLD.username;
	DELETE FROM logo WHERE username =OLD.username;
	DELETE FROM promozioni WHERE username =OLD.username;
	DELETE FROM prodotti WHERE username =OLD.username;
END
$$ DELIMITER ;

DELIMITER $$
CREATE TRIGGER NuovoUtente AFTER INSERT ON account FOR EACH ROW BEGIN
if NEW.type <> 'admin'
then
	INSERT INTO info values (NEW.username,NEW.username,'WORK IN PROGRESS','WORK IN PROGRESS','WORK IN PROGRESS','WORK IN PROGRESS','WORK IN PROGRESS');
	INSERT INTO orario values (NEW.username,'08:30 - 22:00','08:30 - 22:00','08:30 - 22:00','08:30 - 22:00','08:30 - 22:00','08:30 - 22:00','08:30 - 22:00');
	INSERT INTO logo values (NEW.username,'working_progress.png','logo negozio');
end if;
END
$$ DELIMITER ;

INSERT INTO type_account VALUES ('admin', 'general_admin','1');
INSERT INTO type_account VALUES ('user', 'general_private','1');
INSERT INTO type_account VALUES ('user', 'promozioni_private','0');
INSERT INTO type_account VALUES ('user', 'prodotti_private','0');
INSERT INTO type_account VALUES ('admin', 'login','0');
INSERT INTO type_account VALUES ('user', 'login','0');
INSERT INTO type_account VALUES ('unlogged', 'login','1');



INSERT INTO account VALUES ('admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');
