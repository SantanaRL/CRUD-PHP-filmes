create database filmes;
use filmes;
create table filme(
	cod int primary key auto_increment,
    nome varchar(40),
    ano int,
    genero varchar(40),
    diretor varchar(40),
    faixa_etaria int,
    estrela varchar(40),
	roterista varchar(40)
);
insert into filme values(default,'click',2006,'comédia','Frank Coraci',12,'Adam Sandler',NULL);
select * from filme;