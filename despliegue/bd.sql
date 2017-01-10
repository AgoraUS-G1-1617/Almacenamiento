start transaction;

CREATE DATABASE IF NOT EXISTS egcdb;
USE egcdb;

CREATE TABLE IF NOT EXISTS Votes (
   code_vote INT PRIMARY KEY NOT NULL,
   age INT NOT NULL,
   id_poll INT(11) NOT NULL,
   genre VARCHAR(30) NOT NULL,
   comunity VARCHAR(30) NOT NULL);
 
 CREATE TABLE IF NOT EXISTS Answers (
   question VARCHAR(30) NOT NULL,
   code_vote INT NOT NULL,
   answer_question VARCHAR(30) NOT NULL,
   id_poll INT(11) NOT NULL);


GRANT SELECT, INSERT ON egcdb.* TO 'test'@'%' IDENTIFIED BY 'test';

COMMIT;