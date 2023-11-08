CREATE TABLE jogo ( 
  id int AUTO_INCREMENT NOT NULL, 
  nome varchar(70) NOT NULL,
  empresa varchar(70) NOT NULL,
  categoria varchar(20) NOT NULL,
  anoLancamento varchar(20) NOT NULL,
  descricao varchar(20) NOT NULL,
  preco DECIMAL(10,2) NOT NULL,
  CONSTRAINT pk_jogos PRIMARY KEY (id) 
);
