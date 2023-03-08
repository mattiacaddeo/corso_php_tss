-- Active: 1677862054501@@127.0.0.1@3306@form_in_php
CREATE TABLE Regione (
    id_regione int NOT NULL AUTO_INCREMENT,
    nome varchar(255) NOT NULL,
    PRIMARY KEY (id_regione)
);

DROP TABLE Regione;

INSERT INTO Regione (nome) VALUES('Abruzzo');

TRUNCATE TABLE Regione;

DROP TABLE `Provincia`;

CREATE TABLE Provincia (
    id_provincia int NOT NULL AUTO_INCREMENT,
    nome varchar(255) NOT NULL,
    sigla char(2) NOT NULL,
    id_regione int,
    PRIMARY KEY (id_provincia)
);

SELECT * FROM Provincia;

TRUNCATE TABLE Provincia;

SELECT * FROM Regione;

SELECT id_regione FROM Regione WHERE nome="Sardegna";

INSERT INTO Provincia (nome, sigla, id_regione) VALUES('Ciccio','Pa',99);
