-- Tabela Salao
CREATE TABLE Salao (
  Numero INT AUTO_INCREMENT PRIMARY KEY,
  Andar INT
);

-- Tabela Autor
CREATE TABLE Autor (
  Codigo INT AUTO_INCREMENT PRIMARY KEY,
  Nome VARCHAR(100),
  Nacionalidade VARCHAR(100)
);

-- Tabela Obra
CREATE TABLE Obra (
  Codigo INT AUTO_INCREMENT PRIMARY KEY,
  Titulo VARCHAR(100),
  Ano INT,
  SalaoNumero INT,
  AutorCodigo INT,
  FOREIGN KEY (SalaoNumero) REFERENCES Salao(Numero),
  FOREIGN KEY (AutorCodigo) REFERENCES Autor(Codigo)
);

-- Tabela Escultura
CREATE TABLE Escultura (
  ObraCodigo INT PRIMARY KEY,
  Peso double(10,2),
  Material VARCHAR(100),
  FOREIGN KEY (ObraCodigo) REFERENCES Obra(Codigo)
);

-- Tabela Pintura
CREATE TABLE Pintura (
  ObraCodigo INT PRIMARY KEY,
  Estilo VARCHAR(100),
  FOREIGN KEY (ObraCodigo) REFERENCES Obra(Codigo)
);

-- Tabela Funcionarios
CREATE TABLE Funcionarios (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  CPF VARCHAR(14),
  Nome VARCHAR(100),
  Salario double(10,2)
);

-- Tabela Guardas
CREATE TABLE Guardas (
  FuncionarioID INT PRIMARY KEY,
  HoraEntrada TIME,
  HoraSaida TIME,
  FOREIGN KEY (FuncionarioID) REFERENCES Funcionarios(ID)
);

-- Tabela Restauradores
CREATE TABLE Restauradores (
  FuncionarioID INT PRIMARY KEY,
  Especialidade VARCHAR(100),
  FOREIGN KEY (FuncionarioID) REFERENCES Funcionarios(ID)
);

-- Tabela MateriaPrima
CREATE TABLE MateriaPrima (
  Codigo INT AUTO_INCREMENT PRIMARY KEY,
  Nome VARCHAR(100),
  Quantidade INT
);

-- Tabela Manutencao
CREATE TABLE Manutencao (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  DataInicio DATE,
  DataPrevistaTermino DATE,
  DescricaoServico VARCHAR(200),
  CustoPrevisto double(10,2),
  ObraCodigo INT,
  FOREIGN KEY (ObraCodigo) REFERENCES Obra(Codigo)
);

-- Tabela ManutencaoMateriaPrima
CREATE TABLE ManutencaoMateriaPrima (
  ManutencaoID INT,
  MateriaPrimaCodigo INT,
  QuantidadeUtilizada INT,
  CustoUnitario double(10,2),
  FOREIGN KEY (ManutencaoID) REFERENCES Manutencao(ID),
  FOREIGN KEY (MateriaPrimaCodigo) REFERENCES MateriaPrima(Codigo)
);

-- Trigger para atualizar o custo previsto na tabela Manutencao
DELIMITER $$
CREATE TRIGGER calcularCustoPrevisto
AFTER INSERT ON ManutencaoMateriaPrima
FOR EACH ROW
BEGIN
  UPDATE Manutencao
  SET CustoPrevisto = (
    SELECT SUM(QuantidadeUtilizada * CustoUnitario)
    FROM ManutencaoMateriaPrima
    WHERE ManutencaoID = NEW.ManutencaoID
  )
  WHERE ID = NEW.ManutencaoID;
END $$
DELIMITER ;