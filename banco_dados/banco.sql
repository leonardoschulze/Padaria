-- Criar o banco de dados

CREATE DATABASE padaria;


-- Usar o banco de dados

USE padaria;

-- Criar a tabela de usuários (funcionário da padaria)

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Criar tabela de clientes 

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Criar tabela de produtos da padaria

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    quantidade_estoque INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE carrinho (
    cod_compra INT(8) NOT NULL,
    cod_produto int(8) NOT NULL,
    unidades_vendidas INT(8) NOT NULL,
    data_insercao date NOT NULL,
    hora_insercao time NOT NULL
);

CREATE TABLE compras (
    cod_compra INT(8) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    cod_cliente INT(8) NOT NULL,
    forma_pgto VARCHAR(15) NOT NULL,
    parcelamento INT(2) NOT NULL,
    valor_liquido VARCHAR(10) NOT NULL,
    valor_final VARCHAR(10) NOT NULL,
    status VARCHAR(10) NOT NULL
);

-- Insert do usuário

INSERT INTO usuarios(id, nome, email) VALUES (NULL, 'João', 'joao@gmail.com');

-- Insert do cliente

INSERT INTO clientes(id, nome, email) VALUES (NULL, 'Maria', 'maria@gmail.com');

-- Insert dos produtos

INSERT INTO produtos(id, nome, quantidade_estoque)
VALUES 
(NULL,'Pão','93'),
(NULL,'Pão de queijo','34'),
(NULL,'Pastel','17'),
(NULL,'Cuca','12'),
(NULL,'Bolo','20'),
(NULL,'Sonho','45'),
(NULL,'Empada','29'),
(NULL,'Café','83'),
(NULL,'Rosca','19'),
(NULL,'Bolinho de Carne','24')
 
