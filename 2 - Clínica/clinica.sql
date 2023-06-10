SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_endereco`
--

CREATE TABLE `tb_endereco` (
  `ID` int(11) NOT NULL,
  `Rua` varchar(80) NOT NULL,
  `Bairro` varchar(80) NOT NULL,
  `Numero` varchar(10) NOT NULL,
  `Complemento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estrutura da tabela `tb_formacao`
--

CREATE TABLE `tb_formacao` (
  `IDFormacao` int(11) NOT NULL,
  `Especializacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estrutura da tabela `tb_medico`
--

CREATE TABLE `tb_medico` (
  `CRM` int(11) NOT NULL,
  `Nome` varchar(80) NOT NULL,
  `Salario` double(11,4) NOT NULL,
  `DataAdmissao` date NOT NULL,
  `FormacaoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estrutura da tabela `tb_paciente`
--

CREATE TABLE `tb_paciente` (
  `Codigo` int(11) NOT NULL,
  `Nome` varchar(80) NOT NULL,
  `CPF` varchar(13) NOT NULL,
  `RG` varchar(15) NOT NULL,
  `EnderecoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estrutura da tabela `tb_quarto_internacao`
--

CREATE TABLE `tb_quarto_internacao` (
  `IDInternacao` int(11) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Andar` int(11) NOT NULL,
  `PacienteID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_formacao`
--
ALTER TABLE `tb_formacao`
  ADD PRIMARY KEY (`IDFormacao`);

--
-- Indexes for table `tb_medico`
--
ALTER TABLE `tb_medico`
  ADD PRIMARY KEY (`CRM`),
  ADD KEY `fk_tb_medico_tb_formacao` (`FormacaoID`) USING BTREE;

--
-- Indexes for table `tb_paciente`
--
ALTER TABLE `tb_paciente`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `FK_tb_paciente_tb_endereco` (`EnderecoID`);

--
-- Indexes for table `tb_quarto_internacao`
--
ALTER TABLE `tb_quarto_internacao`
  ADD PRIMARY KEY (`IDInternacao`),
  ADD UNIQUE KEY `UQ_Numero_quarto_internacao` (`Numero`),
  ADD KEY `PacienteID` (`PacienteID`);

--
-- AUTO_INCREMENT for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `tb_formacao`
--
ALTER TABLE `tb_formacao`
  MODIFY `IDFormacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `tb_paciente`
--
ALTER TABLE `tb_paciente`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `tb_quarto_internacao`
--
ALTER TABLE `tb_quarto_internacao`
  MODIFY `IDInternacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_paciente`
--
ALTER TABLE `tb_paciente`
  ADD CONSTRAINT `FK_tb_paciente_tb_endereco` FOREIGN KEY (`EnderecoID`) REFERENCES `tb_endereco` (`ID`);

--
-- Limitadores para a tabela `tb_quarto_internacao`
--
ALTER TABLE `tb_quarto_internacao`
  ADD CONSTRAINT `tb_quarto_internacao_ibfk_1` FOREIGN KEY (`PacienteID`) REFERENCES `tb_paciente` (`Codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
