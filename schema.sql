create table usuario(
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
