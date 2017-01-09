start transaction;

create user 'user1'@'%' identified by password '*12dea96fec20593566ab75692c9949596833adc9';



GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, REFERENCES, INDEX, ALTER, CREATE TEMPORARY TABLES, LOCK TABLES, EXECUTE, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, TRIGGER ON *.* TO 'user1'@'%' IDENTIFIED BY PASSWORD '*12dea96fec20593566ab75692c9949596833adc9' WITH GRANT OPTION;
        

CREATE DATABASE IF NOT EXISTS egcdb;
USE egcdb;

CREATE TABLE IF NOT EXISTS Votes(
	id INT AUTO_INCREMENT,
	vote 	VARCHAR(30) NOT NULL,
	votation_id INT NOT NULL,
	PRIMARY KEY(ID));

INSERT INTO Votes VALUE(NULL,'PRUEBA',1);

COMMIT;
