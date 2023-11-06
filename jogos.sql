
CREATE TABLE jogos ( 
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(70) NOT NULL,
  empresa varchar(70) NOT NULL,
  categorias varchar(20) NOT NULL,
  CONSTRAINT pk_jogos PRIMARY KEY (id) 
);

