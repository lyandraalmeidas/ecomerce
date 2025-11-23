CREATE DATABASE livraria_top;

USE livraria_top;

CREATE TABLE cliente (
    id_cliente BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    data_nascimento DATE NOT NULL,
    senha_hash VARCHAR(255) NOT NULL
);

CREATE TABLE genero (
    id_genero BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE autor (
    id_autor BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE livro (
    id_livro BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    valor_unitario DECIMAL(10, 2) NOT NULL,
    estoque INT NOT NULL DEFAULT 0,
    isbn VARCHAR(13) UNIQUE NOT NULL,
    data_publicacao DATE NOT NULL,
    id_genero BIGINT NOT NULL,
    FOREIGN KEY (id_genero) REFERENCES genero(id_genero)
);

CREATE TABLE livro_autor (
    id_livro BIGINT UNSIGNED NOT NULL,
    id_autor BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (id_livro, id_autor),
    FOREIGN KEY (id_livro) REFERENCES livro(id_livro) ON DELETE CASCADE,
    FOREIGN KEY (id_autor) REFERENCES autor(id_autor) ON DELETE CASCADE
);

CREATE TABLE venda (
    id_venda BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    data_venda DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    valor_total DECIMAL(10, 2) NOT NULL,
    id_cliente BIGINT UNSIGNED NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
);

CREATE TABLE item_venda (
    id_item_venda BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    quantidade INT UNSIGNED NOT NULL,
    valor_unitario DECIMAL(10, 2) NOT NULL,
    id_venda BIGINT UNSIGNED NOT NULL,
    id_livro BIGINT UNSIGNED NOT NULL,
    FOREIGN KEY (id_venda) REFERENCES venda(id_venda) ON DELETE CASCADE,
    FOREIGN KEY (id_livro) REFERENCES livro(id_livro),
    CONSTRAINT chk_quantidade_itemvenda CHECK (quantidade > 0)
);

CREATE TABLE movimentacao_estoque (
    id_movimentacao BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tipo_movimentacao ENUM('ENTRADA', 'SAIDA', 'AJUSTE') NOT NULL,
    quantidade INT NOT NULL,
    data_movimentacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id_livro BIGINT UNSIGNED NOT NULL,
    FOREIGN KEY (id_livro) REFERENCES livro(id_livro)
);

CREATE TABLE historico_alteracao_livro (
    id_historico BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_livro BIGINT UNSIGNED NOT NULL,
    coluna_alterada VARCHAR(100) NOT NULL,
    valor_antigo VARCHAR(255),
    valor_novo VARCHAR(255),
    data_alteracao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_livro) REFERENCES livro(id_livro)
);

DELIMITER $$

CREATE TRIGGER reducao_estoque
AFTER INSERT ON item_venda
FOR EACH ROW
BEGIN
    UPDATE livro 
    SET estoque = estoque - NEW.quantidade
    WHERE id_livro = NEW.id_livro; 
END$$

DELIMITER ; 

INSERT INTO cliente (nome, cpf, email, telefone, data_nascimento, senha_hash)
VALUES ('Ana Silva', '12345678901', 'ana.silva@email.com', '999999999', '1990-05-15', 'hash_senha_ana');

INSERT INTO genero (nome)
VALUES ('Ficção Científica');

INSERT INTO venda (valor_total, id_cliente)
VALUES (49.90, 1);

INSERT INTO livro (titulo, valor_unitario, estoque, id_genero)
VALUES ('Duna', 79.90, 50, 1);

INSERT INTO item_venda (quantidade, valor_unitario, id_venda, id_livro)
VALUES (2, 79.90, 1, 1);

SELECT * FROM livro;