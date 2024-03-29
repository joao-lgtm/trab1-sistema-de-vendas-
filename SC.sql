DROP DATABASE IF EXISTS SC;
CREATE DATABASE IF NOT EXISTS SC;
USE SC;

CREATE TABLE IF NOT EXISTS PRODUTO (
    ID_PRODUTO INT NOT NULL PRIMARY KEY,
    DESCRICAO VARCHAR(40),
    PRECO_UNITARIO FLOAT(22 , 2 )
);



CREATE TABLE IF NOT EXISTS ESTADO (
    ID_ESTADO INT NOT NULL PRIMARY KEY,
    NOME_ESTADO VARCHAR(30),
    SIGLA VARCHAR(2)
);
    
CREATE TABLE IF NOT EXISTS CIDADE (
    ID_CIDADE INT NOT NULL PRIMARY KEY,
    NOME_CIDADE VARCHAR(35),
    COD_ESTADO INT,
    FOREIGN KEY (COD_ESTADO)
        REFERENCES ESTADO (ID_ESTADO)
        ON UPDATE CASCADE ON DELETE CASCADE
);
    
    
CREATE TABLE IF NOT EXISTS FORNECEDOR (
    ID_FORNECEDOR INT NOT NULL PRIMARY KEY,
    RAZAO_SOCIAL VARCHAR(25),
    NOME_FANTASIA VARCHAR(25),
    COD_CIDADE INT,
    FOREIGN KEY (COD_CIDADE)
        REFERENCES CIDADE (ID_CIDADE)
        ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS LOJA (
    ID_LOJA INT NOT NULL PRIMARY KEY,
    CNPJ INT(25),
    RAZAO_SOCIAL VARCHAR(25),
    NOME_FANTASIA VARCHAR(25),
    COD_CIDADE INT(5),
    FOREIGN KEY (COD_CIDADE)
        REFERENCES CIDADE (ID_CIDADE)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS COMPRA (
    ID_COMPRA INT NOT NULL PRIMARY KEY,
    COD_FORNECEDOR INT,
    COD_PRODUTO INT,
    QUANTIDADE INT(5),
    COD_LOJA INT,
    PRECO_UNITARIO FLOAT(22 , 2 ),
    FOREIGN KEY (COD_FORNECEDOR)
        REFERENCES FORNECEDOR (ID_FORNECEDOR)
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (COD_PRODUTO)
        REFERENCES PRODUTO (ID_PRODUTO)
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (COD_LOJA)
        REFERENCES LOJA (ID_LOJA)
        ON UPDATE CASCADE ON DELETE CASCADE
    
);


