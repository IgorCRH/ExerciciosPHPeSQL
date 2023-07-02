-- MySQL 5.6
-- http://sqlfiddle.com/#!9/980428/1
 
-- Comandos DDL
CREATE TABLE Fornecedor (
  CodForn INT AUTO_INCREMENT PRIMARY KEY,
  Nome VARCHAR(100),
  Cidade VARCHAR(80)
);

CREATE TABLE Peca (
  CodPeca INT AUTO_INCREMENT PRIMARY KEY,
  Nome VARCHAR(30),
  Descricao VARCHAR(60)
);

CREATE TABLE Venda (
  CodForn INT,
  CodPeca INT,
  Quantidade INT,
  Data DATE,
  FOREIGN KEY (CodForn) REFERENCES Fornecedor(CodForn),
  FOREIGN KEY (CodPeca) REFERENCES Peca(CodPeca)
);

-- Comandos DML
INSERT INTO Fornecedor (Nome, Cidade) VALUES ('Ajax','Limeira');
INSERT INTO Peca (Nome, Descricao) VALUES ('Desengordurante','Limpa Gordura');
INSERT INTO Venda (CodForn, CodPeca, Quantidade, Data)
SELECT Fornecedor.CodForn, Peca.CodPeca, 5, '1997-07-02'
FROM Fornecedor, Peca
WHERE Fornecedor.Nome = 'Ajax' AND Peca.Nome = 'Desengordurante';

SELECT * FROM Fornecedor;
SELECT * FROM Peca;
SELECT * FROM Venda;
