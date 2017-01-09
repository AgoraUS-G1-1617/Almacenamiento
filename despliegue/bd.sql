CREATE TABLE IF NOT EXISTS `Votes` (
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