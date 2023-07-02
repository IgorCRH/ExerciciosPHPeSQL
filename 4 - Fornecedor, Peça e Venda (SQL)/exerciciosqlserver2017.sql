-- SQL Server 2017
-- http://sqlfiddle.com/#!18/853a7/9
-- Comandos DDL
CREATE TABLE Fornecedor (
  CodForn INT IDENTITY(1,1) PRIMARY KEY,
  Nome Varchar (100),
  Cidade Varchar (80)
  );
  
CREATE TABLE Peca (
  CodPeca INT IDENTITY(1,1) PRIMARY KEY,
  Nome Varchar (30),
  Descricao Varchar (60)
  );
  
CREATE TABLE Venda (
  CodForn INT,
  CodPeca INT,
  Quantidade INT,
  Data DATE,
  FOREIGN KEY (CodForn) REFERENCES Fornecedor(CodForn),
  FOREIGN KEY (CodPeca) REFERENCES Peca(CodPeca)
  );

-- Exemplo de Comandos DML para Inserir Dados
INSERT INTO Fornecedor (Nome, Cidade) VALUES ('Ajax','Limeira');
INSERT INTO Peca (Nome, Descricao) VALUES ('Desengordurante','Limpa Gordura');

INSERT INTO Venda (CodForn, CodPeca, Quantidade, Data)
SELECT CodForn, CodPeca, 5, '1997-07-02' -- Seleciona as chaves-estrangeiras CodForn e CodPeca e as insere
FROM Fornecedor, Peca
WHERE Fornecedor.Nome = 'Ajax' AND Peca.Nome = 'Desengordurante';

SELECT * FROM Fornecedor; -- Seleciona as tabelas inteiras
SELECT * FROM Peca;
SELECT * FROM Venda;
