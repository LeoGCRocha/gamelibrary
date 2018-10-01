create type classind as enum ('l','10','12','14','16','18')
create table user(
    nome varchar(500) not null,
    imagemDir text default 'no-game-img.jpg',
    preco numeric(5,2) not null,
    lancamento int not null check (lancamento>=1970),
    class_ind classind not null,
    windows boolean default true,
    linux boolean default true,
    mac boolean default true,
    desenvolvedora varchar(500) not null,
    distribuidor varchar(500) not null,
    );
