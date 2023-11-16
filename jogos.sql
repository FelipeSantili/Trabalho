-- Active: 1695837195664@@localhost@3306@jogos_crud

CREATE DATABASE jogos_crud;
   
CREATE TABLE categorias (
    id int AUTO_INCREMENT NOT NULL,
    nome varchar(127) NOT NULL,
    CONSTRAINT pk_categorias PRIMARY KEY (id)
);

INSERT INTO categorias (nome) VALUES ('Ação');
INSERT INTO categorias (nome) VALUES ('Aventura');
INSERT INTO categorias (nome) VALUES ('RPG');
INSERT INTO categorias (nome) VALUES ('Puzzle');
INSERT INTO categorias (nome) VALUES ('Tiro');
INSERT INTO categorias (nome) VALUES ('Terror');


CREATE TABLE plataformas (
    id int AUTO_INCREMENT NOT NULL,
    nome varchar(127) NOT NULL,
    CONSTRAINT pk_plataformas PRIMARY KEY (id)
);

INSERT INTO plataformas (nome) VALUES ('PC');
INSERT INTO plataformas (nome) VALUES ('Playstation');
INSERT INTO plataformas (nome) VALUES ('Xbox');
INSERT INTO plataformas (nome) VALUES ('Nintendo');


CREATE TABLE jogos (
    id int AUTO_INCREMENT NOT NULL,
    nome varchar(57) NOT NULL,
    anoLancamento int NOT NULL,
    empresa varchar(57) NOT NULL,
    preco DECIMAL (10,2) NOT NULL,
    id_categoria int NOT NULL,
    id_plataforma int NOT NULL,
    CONSTRAINT pk_jogos PRIMARY KEY (id)
);
ALTER TABLE jogos ADD CONSTRAINT fk_categoria FOREIGN KEY (id_categoria) REFERENCES categorias (id);
ALTER TABLE jogos ADD CONSTRAINT fk_plataforma FOREIGN KEY (id_plataforma) REFERENCES plataformas (id);


