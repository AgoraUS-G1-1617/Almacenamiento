start transaction;

create user 'user1'@'%' identified by password '*12dea96fec20593566ab75692c9949596833adc9';



GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, REFERENCES, INDEX, ALTER, CREATE TEMPORARY TABLES, LOCK TABLES, EXECUTE, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, TRIGGER ON *.* TO 'user1'@'%' IDENTIFIED BY PASSWORD '*12dea96fec20593566ab75692c9949596833adc9' WITH GRANT OPTION;
        

CREATE TABLE IF NOT EXISTS `Votes` (
L
   `code_vote` int PRIMARY KEY NOT NULL,
   `age` int NOT NULL,
   `id_poll` int(11) NOT NULL,
   `genre` text NOT NULL,
   `comunity` text NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 
 CREATE TABLE IF NOT EXISTS `Answers` (
   `question` text NOT NULL,
   `code_vote`int  NOT NULL,
   `answer_question` text NOT NULL,
   `id_poll`	int(11) NOT NULL,
   foreign key (code_vote) references votes(code_vote) on update cascade on delete cascade
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8; 

COMMIT;