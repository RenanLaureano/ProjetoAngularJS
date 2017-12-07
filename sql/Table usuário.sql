CREATE DATABASE angulajs;

CREATE TABLE USUARIO(
	id_usuario int not null PRIMARY KEY AUTO_INCREMENT,
	nome varchar(30) not null,
	username varchar(20) not null unique,
	email varchar(30) not null,
	senha varchar(32) not null
); 


CREATE TABLE _post(
	id SERIAL PRIMARY KEY,
	title VARCHAR NOT NULL,
	text VARCHAR NOT NULL,
	date_post date NOT NULL,
	username VARCHAR(20)
);


CREATE TABLE _coment(
	id SERIAL PRIMARY KEY,
	username VARCHAR(20) NOT NULL,
	coment VARCHAR(300) NOT NULL,
	post_date DATE NOT NULL,
	id_post SERIAL
);