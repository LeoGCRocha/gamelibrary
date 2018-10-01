create table jogo(
    id int primary key auto_increment,
    nome varchar(500) not null,
    imagemDir text,
    preco numeric(5,2) not null,
    lancamento date not null ,
    classind enum ('l','10','12','14','16','18') not null,
    windows boolean default true,
    linux boolean default true,
    mac boolean default true,
    desenvolvedora varchar(500) not null,
    distribuidor varchar(500) not null
   	);
create table usuario(
    id int primary key auto_increment,
    nome varchar(500) not null,
    email varchar(100) not null,
    senha text not null, 
    sexo enum('masculino','feminino'),
    telefone varchar(13),
    wallet numeric(7,2) not null,
    super boolean default false
    );
