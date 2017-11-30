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
	senha varchar(30) not null,
	imagem varchar(100)
); 

CREATE TABLE COMENTARIO (
	id_coment int not null PRIMARY KEY AUTO_INCREMENT,
    
);   