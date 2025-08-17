-- Criar o banco de dados

CREATE DATABASE padaria;

-- Usar o banco de dados

USE padaria;

-- Criar tabela de produtos da padaria

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    quantidade_estoque INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    preco DECIMAL(10, 2) NOT NULL
);

-- Tabela de vendas
CREATE TABLE vendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_venda DATETIME DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10,2) NOT NULL,
    status VARCHAR(20) DEFAULT 'finalizada'
);

-- Tabela de itens_vendidos
CREATE TABLE itens_vendidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    venda_id INT NOT NULL,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL,
    preco_unitario DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (venda_id) REFERENCES vendas(id),
    FOREIGN KEY (produto_id) REFERENCES produtos(id)
);

-- Insert dos produtos

INSERT INTO produtos(id, nome, quantidade_estoque, preco)
VALUES 
(NULL,'Pão','93', '0.50'),
(NULL,'Pão de queijo','34', '2.50'),
(NULL,'Pastel','17', '4.00'),
(NULL,'Cuca','12','15.00' ),
(NULL,'Bolo','20', '10.00'),
(NULL,'Sonho','45', '3.00'),
(NULL,'Empada','29', '3.50'),
(NULL,'Café','83', '4.50'),
(NULL,'Rosca','19', '8.00'),
(NULL,'Bolinho de Carne','24', '3.00')
 
