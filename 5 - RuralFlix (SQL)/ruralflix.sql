CREATE TABLE Usuario (
  CPF VARCHAR(11) PRIMARY KEY,
  Nome VARCHAR(100),
  Senha VARCHAR(100),
  Login VARCHAR(100),
  NumeroCartao VARCHAR(16),
  Telefone VARCHAR(20),
  Rua VARCHAR(100),
  Bairro VARCHAR(100),
  Cidade VARCHAR(100),
  Numero VARCHAR(10),
  CEP VARCHAR(10)
);

CREATE TABLE Mensalidade (
  IDMensalidade INT AUTO_INCREMENT PRIMARY KEY,
  CPFUsuario VARCHAR(11),
  DataMes INT,
  DataAno INT,
  ValorPagamento DECIMAL(10, 2),
  FOREIGN KEY (CPFUsuario) REFERENCES Usuario(CPF)
);

CREATE TABLE Videos (
  IDVideo INT AUTO_INCREMENT PRIMARY KEY,
  Titulo VARCHAR(100),
  AnoLancamento INT,
  Duracao INT
);

CREATE TABLE EpisodioSerie (
  IDVideo INT PRIMARY KEY,
  Temporada INT,
  NumEpisodio INT,
  ProximoEpisodio INT,
  FOREIGN KEY (IDVideo) REFERENCES Videos(IDVideo),
  FOREIGN KEY (ProximoEpisodio) REFERENCES EpisodioSerie(NumEpisodio)
) ENGINE=MyISAM;

CREATE TABLE Filmes (
  IDVideo INT PRIMARY KEY,
  FOREIGN KEY (IDVideo) REFERENCES Videos(IDVideo)
);

CREATE TABLE Documentarios (
  IDVideo INT PRIMARY KEY,
  NomeProdutora VARCHAR(100),
  FOREIGN KEY (IDVideo) REFERENCES Videos(IDVideo)
);

CREATE TABLE Avaliacao (
  CPFUsuario VARCHAR(11),
  IDVideo INT,
  Nota DECIMAL(2, 1),
  PRIMARY KEY (CPFUsuario, IDVideo),
  FOREIGN KEY (CPFUsuario) REFERENCES Usuario(CPF),
  FOREIGN KEY (IDVideo) REFERENCES Videos(IDVideo)
);

CREATE TABLE Atores (
  IDAtor INT AUTO_INCREMENT PRIMARY KEY,
  Nome VARCHAR(100),
  DataNascimento DATE,
  LocalNascimento VARCHAR(100)
);

CREATE TABLE Diretores (
  IDDiretor INT AUTO_INCREMENT PRIMARY KEY,
  Nome VARCHAR(100),
  DataNascimento DATE,
  LocalNascimento VARCHAR(100)
);

CREATE TABLE Atuacao (
  IDAtor INT,
  IDVideo INT,
  PRIMARY KEY (IDAtor, IDVideo),
  FOREIGN KEY (IDAtor) REFERENCES Atores(IDAtor),
  FOREIGN KEY (IDVideo) REFERENCES Videos(IDVideo)
);

CREATE TABLE Direcao (
  IDDiretor INT,
  IDVideo INT,
  PRIMARY KEY (IDDiretor, IDVideo),
  FOREIGN KEY (IDDiretor) REFERENCES Diretores(IDDiretor),
  FOREIGN KEY (IDVideo) REFERENCES Videos(IDVideo)
);