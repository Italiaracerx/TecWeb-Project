DROP DATABASE IF EXISTS archimede;
CREATE DATABASE archimede;

CREATE TABLE type_account(
	user_type varchar(64) PRIMARY KEY,
	link varchar(64) NOT NULL
);

CREATE TABLE account(
	username varchar(64),
	type char(64) NOT NULL,
	password varchar(64) NOT NULL,
	PRIMARY KEY (username,password),	
	FOREIGN KEY (type) REFERENCES type_account(user_type)
);

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

CREATE TABLE logo(
	username varchar(64) PRIMARY KEY,
	logo varchar(64) NOT NULL,
	alt varchar(64) NOT NULL,
	FOREIGN KEY (username) REFERENCES account(username)
);

CREATE TABLE info(
	username varchar(64) PRIMARY KEY,
	negozio varchar(64) NOT NULL,
	telefono varchar(64) NOT NULL,
	mail varchar(64),
	sito varchar(64),
	titolo varchar(64),
	motto varchar(64),
	descrizione varchar(256),
	FOREIGN KEY (username) REFERENCES account(username)
);

CREATE TABLE prodotti(
	username varchar(64) NOT NULL,
	ID int NOT NULL AUTO_INCREMENT,
	titolo varchar(64) NOT NULL,
	alt varchar(64) NOT NULL,	
	descrizione varchar(64) NOT NULL,
	data datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (username, ID),
	FOREIGN KEY (username) REFERENCES account(username)
);

CREATE TABLE promozioni(
	username varchar(64) NOT NULL,
	ID int NOT NULL AUTO_INCREMENT,
	alt varchar(64) NOT NULL,
	descrizione varchar(64) NOT NULL,
	data datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (username, ID),
	FOREIGN KEY (username) REFERENCES account(username)

);

CREATE TABLE eventi(
	ID int NOT NULL AUTO_INCREMENT,
	type ENUM('APERTURA','CHIUSURA','NOVITA') NOT NULL,
	descrizione varchar(64),
	PRIMARY KEY(ID) 
);

DELIMITER $$
CREATE TRIGGER `EliminaUtente` BEFORE DELETE ON `account` FOR EACH ROW BEGIN
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
CREATE TRIGGER `NuovoUtente` AFTER INSERT ON `account` FOR EACH ROW BEGIN
if NEW.username <> 'admin'
then
	INSERT INTO info values (NEW.username,NEW.username,'WORK IN PROGRESS','WORK IN PROGRESS','WORK IN PROGRESS','WORK IN PROGRESS','WORK IN PROGRESS');
	INSERT INTO orario values (NEW.username,'08:30 - 22:00','08:30 - 22:00','08:30 - 22:00','08:30 - 22:00','08:30 - 22:00','08:30 - 22:00','08:30 - 22:00');
	INSERT INTO logo values (NEW.username,'images/working_progress.png','logo nuovo negozio');
end if;
END
$$ DELIMITER ;

INSERT INTO type_account VALUES ('admin', 'general_admin');
INSERT INTO type_account VALUES ('user', 'general_private');
INSERT INTO account VALUES ('admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');
