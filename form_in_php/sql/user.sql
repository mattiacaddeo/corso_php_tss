-- Active: 1677862054501@@127.0.0.1@3306@form_in_php

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `birth_city` varchar(255) NOT NULL,
  `id_regione` int(11) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO user ( `first_name`, `last_name`, `birthday`, `birth_city`, `regione_id`, `provincia_id`, `gender`, `username`, `password`) 
        VALUES ( 'Mario', 'Rossi', '2023-03-15', 'Torino', '18', '96', 'M', 'mariorossi@email.com', MD5('password'));

INSERT INTO `form_in_php`.`user` (`first_name`, `last_name`, `birthday`, `birth_city`, `id_regione`, `id_provincia`, `gender`, `username`, `password`) 
VALUES ('Mario', 'Rossi', '2023-01-01', 'Torino', '18', '96', 'M', 'mariorossi@email.com', MD5('password'));

ALTER TABLE `user` 
ADD UNIQUE (username);

SELECT * FROM user;

UPDATE user SET first_name='Mario', last_name='Rossi', birthday='2023-03-15', birth_city='Torino', id_regione='18', id_provincia='96', 
gender='M', username='mariorossi@email.com', password=MD5('password') WHERE id_user = 1;

SET FOREIGN_KEY_CHECKS=0; 
SET FOREIGN_KEY_CHECKS=1; 

TRUNCATE TABLE user;

ALTER TABLE `Task`
 ADD FOREIGN KEY (id_user) REFERENCES user(id_user);