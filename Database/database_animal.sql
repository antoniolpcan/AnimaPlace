CREATE DATABASE CadastroAnimal;


USE CadastroAnimal;

CREATE TABLE Usuario(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	username VARCHAR(30) NOT NULL UNIQUE,
	senha VARCHAR(30) NOT NULL,
	nome_animal VARCHAR(30) NOT NULL,
	animal_idade VARCHAR(30) NOT NULL,
	animal_especie VARCHAR(30) NOT NULL,
	animal_sexo VARCHAR(30) NOT NULL
);

DROP TABLE Usuario;
SELECT * FROM Usuario
