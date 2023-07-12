-- Comandos DDL
CREATE SEQUENCE fornecedor_codforn_seq;

CREATE TABLE Fornecedor (
  CodForn INT DEFAULT nextval('fornecedor_codforn_seq') PRIMARY KEY,
  Nome Varchar (100),
  Cidade Varchar (80)
);

CREATE SEQUENCE peca_codpeca_seq;

CREATE TABLE Peca (
  CodPeca INT DEFAULT nextval('peca_codpeca_seq') PRIMARY KEY,
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