CREATE DATABASE angulajs;

CREATE TABLE USUARIO(
	id_usuario int not null PRIMARY KEY AUTO_INCREMENT,
	nome varchar(30) not null,
	username varchar(20) not null unique,
	pais varchar(20) not null,
	estado varchar(20) not null,
	cidade varchar (20) not null,
	bairro varchar(20) not null,
	rua varchar(20) not null,
	numero int not null,
	complemento varchar(30),
	email varchar(30) not null,
	senha varchar(32) not null,
	imagem varchar(100)
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