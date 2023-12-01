CREATE DATABASE FUNCIONARIOS;

USE FUNCIONARIOS;

CREATE TABLE tabfuncionarios (
  funId int(11) NOT NULL auto_Increment PRIMARY KEY,
  funNome  varchar(30) NOT NULL,
  funSenha varchar(10) NOT NULL,
  funEmail varchar(50) NOT NULL,
  funCargo varchar(20) NOT NULL,
  funUsuario varchar(10) NOT NULL,
  funFoto varchar(18) NOT NULL
) ;


CREATE TABLE tabcarrinho (
  carId int(11) NOT NULL,
  carProId int(11) NOT NULL,
  carQtde int(11) DEFAULT NULL
) ;

ALTER TABLE tabcarrinho MODIFY carId INT AUTO_INCREMENT PRIMARY KEY;


CREATE TABLE tabprodutos (
  proId int(11) NOT NULL,
  proDescricao varchar(255) DEFAULT NULL,
  proImagem varchar(30) NOT NULL,
  proPreco decimal(10,2) DEFAULT NULL
) ;

insert into tabprodutos (proId, proDescricao, proImagem, proPreco) values (1, 'All Star Tradicional', 'tenis-1', 150.00);
insert into tabprodutos (proId, proDescricao, proImagem, proPreco) values (2, 'Nike Air Jordan 1 MID', 'tenis-2', 550.00);
insert into tabprodutos (proId, proDescricao, proImagem, proPreco) values (3, 'Tênis Adidas Response Super 3.0', 'tenis-3', 450.00);
insert into tabprodutos (proId, proDescricao, proImagem, proPreco) values (4, 'Tênis Nike - Branco - Feminino', 'tenis-4', 359.90);
insert into tabprodutos (proId, proDescricao, proImagem, proPreco) values (5, 'Tênis New Balance Tempo Masculino - Cinza', 'tenis-5', 499.90);
insert into tabprodutos (proId, proDescricao, proImagem, proPreco) values (6, 'Tênis Vans Old Skool - Black/White', 'tenis-6', 399.99);




select * from tabprodutos;