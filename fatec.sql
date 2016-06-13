CREATE TABLE `usuario` (
  `usuario_id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `nome` varchar(50) ,
  `email` varchar(50) ,
  `username` varchar(50) UNIQUE ,
  `senha` varchar(32) ,
  `nivel` varchar(30));

CREATE TABLE `tb_categoria` (
  `categoria_id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `categoria_nome` varchar(255));

CREATE TABLE `tb_noticia` (
  `noticia_id` INTEGER PRIMARY KEY AUTOINCREMENT,
  `categoria_id` INTEGER NOT NULL ,
  `titulo` varchar(255) ,
  `data` DATETIME ,
  `imagem` varchar(255) ,
  `thumbnail` varchar(255) ,
  `exibir` varchar(5) ,
  `descricao` longtext,
  FOREIGN KEY(categoria_id) REFERENCES tb_categoria(categoria_id));


insert into tb_categoria (categoria_nome) values ("educacao"),("entretenimento"),("esporte"),("politica"),("saude");

insert into usuario (nome,email,username,senha,nivel) VALUES ("Diego Andrade","diego@criasoft.com.br","diego","81dc9bdb52d04dc20036dbd8313ed055","2");
81dc9bdb52d04dc20036dbd8313ed055