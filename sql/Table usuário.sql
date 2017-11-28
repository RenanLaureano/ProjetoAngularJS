CREATE TABLE USUARIO(
	nome varchar(30) not null,
	username varchar(20) not null primary key,
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