create database filmes;
use filmes;
create table filme(
	cod int primary key auto_increment,
    nome varchar(40),
    ano int,
    genero varchar(40),
    diretor varchar(40),
    estrela varchar(40)
);
insert into filme values(default,'click',2006,'comédia','Frank Coraci','Adam Sandler');
select * from filme;