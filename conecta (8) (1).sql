-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Abr-2023 às 04:08
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `conecta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `id_atendimento` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_profissional` int(11) DEFAULT NULL,
  `turno` varchar(30) DEFAULT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `atendimento`
--

INSERT INTO `atendimento` (`id_atendimento`, `id_paciente`, `id_profissional`, `turno`, `observacao`, `descricao`, `status`) VALUES
(3, 1, 3, 'Tarde, das 12h ás 18h', 'Acompanhamento em consultas médicas', 'Ajuda médica', 'Confirmado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avalia`
--

CREATE TABLE `avalia` (
  `id_avalia` int(11) NOT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `id_profissional` int(11) DEFAULT NULL,
  `avaliacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `avalia`
--

INSERT INTO `avalia` (`id_avalia`, `id_paciente`, `id_profissional`, `avaliacao`) VALUES
(1, 1, 3, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nome` varchar(85) NOT NULL,
  `idade` varchar(3) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(85) NOT NULL,
  `telefone` varchar(17) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `senha` varchar(85) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `bairro` varchar(85) NOT NULL,
  `rua` varchar(85) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(85) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nome`, `idade`, `cpf`, `email`, `telefone`, `sexo`, `senha`, `cep`, `bairro`, `rua`, `numero`, `complemento`) VALUES
(1, 'José Alberto', '87', '111.111.111-11', 'jo@gmail.com', '(31) 98823-2322', 'M', '$2y$10$Ib22DrfbmbNlSqa9za9lgOA5oDaMKMH/2Y2qcSz.fo/EN3i0asz5e', '31879-70', 'Campo Alegre', 'Rua Maranata', 123, 'Casa'),
(2, 'Conceição Freitas', '72', '111.222.333-33', 'co@gmail.com', '(31) 98834-3434', 'F', '$2y$10$BU4hvenehv9LxMuA3wNatu8UNOpuR6ioHBOohPxhGcqtFgL2Pzg0i', '31734-95', 'Glória', 'Rua Babel', 867, 'Casa'),
(3, 'Antônia Feliz', '87', '111.444.545-55', 'an@gmail.com', '(31) 33444-0405', 'F', '$2y$10$YkGrewqq9pWHUI0tdlAjxuD19pdm51.r0l.XEn24J9JUWwJWcAWF2', '31234-795', 'Lagoa', 'Rua Leonel Coelho', 157, 'Apartamento'),
(4, 'Valete Néte', '91', '111.444.445-55', 'va@gmail.com', '(31) 33333-2232', 'M', '$2y$10$U0w5Te9LHkEeqlIXjFPEBO3RD4KoI0TKvAC23ukBl/WMSJmrPMpcC', '31742-23', 'Santo Antônio', 'Rua Marabá', 854, 'Casa'),
(5, 'Junior Silva', '96', '111.223.345-45', 'ju@gmail.com', '(31) 98881-2121', 'M', '$2y$10$oRn3pNQercVj.m2gyKq1Je5/k8zyQkJRrCoEzOK3b7c5sQd..F.vu', '31345-333', 'Minas Brasil', 'Rua Jacutinga', 232, 'Apartamento'),
(6, ' Jeanne Louise', '112', '113.232.445-45', 'jee@gmail.com', '(31) 98832-3232', 'F', '$2y$10$opUrsmcQQ5E/bxHabuyWluPYM5VA.WnzdOdJgVNcQP3VsMH8Tv7rO', '31546-594', 'Floresta', 'Rua Síria', 165, 'Casa'),
(7, 'Francisco Azul', '89', '133.456.565-65', 'fr@gmail.com', '(31) 33545-4566', 'M', '$2y$10$06LkqGOCZuAx/2hSXAVgxOJBfTKxXHLh7AEAT4uDSV5udyLihworC', '31233-23', 'Coqueiros', 'Rua Fauna', 323, 'Casa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissional`
--

CREATE TABLE `profissional` (
  `id_profissional` int(11) NOT NULL,
  `nome` varchar(85) NOT NULL,
  `idade` varchar(3) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(85) NOT NULL,
  `telefone` varchar(17) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `senha` varchar(85) NOT NULL,
  `cargo` varchar(85) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `avaliacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `profissional`
--

INSERT INTO `profissional` (`id_profissional`, `nome`, `idade`, `cpf`, `email`, `telefone`, `sexo`, `senha`, `cargo`, `foto`, `avaliacao`) VALUES
(1, 'Antônio Carlos', '69', '112.121.245-67', 'atn@gmail.com', '(31) 98876-7673', 'M', '$2y$10$NHwhKH5G5JDVTvlPbc6tBOtEFbp9T3RxqXTZXH7bNuk8PHbGmXK52', 'Cuidador', 'Antônio Carlos_1554602037.jpg', 5),
(2, 'Rose Andrade', '37', '112.333.677-88', 'ro@gmail.com', '(31) 34747-7589', 'F', '$2y$10$NONPVtE6MmER4KWLNIxDL.wfKd3wkHPhg2dEIrPzOqV7en3Yhxrca', 'Cuidadora', 'Rose Andrade_266587804.jpg', 4),
(3, 'Jean Souza', '35', '124.467.787-09', 'je@gmail.com', '(31) 98843-4566', 'M', '$2y$10$cvDiUJaJSAmgfQMo3iW5yePSbBqbxw8ECF8YM97hrrhhH0c/X1wpy', 'Cuidador', 'Jean Souza_126997222.jpg', 4),
(4, 'Karine Lima', '31', '124.567.878-88', 'ka@gmail.com', '(31) 33949-4988', 'F', '$2y$10$aqMRwD93SC997wbu2DjhwemYXfTRX5rCAz7mFvXA4.uF4tbX1jKyu', 'Cuidador', 'Karine Lima_1053892803.jpg', 5),
(5, 'Ricardo Feliz', '41', '133.456.678-33', 'ri@gmail.com', '(31) 98555-4543', 'M', '$2y$10$V4tLGf1b0wjMYBUHiorvSOMer9ABXvysz1SecyRXXWzDKDAKCGHvC', 'Cuidador', 'Ricardo Feliz_437526554.jpg', 4),
(6, 'Juliana Silveira', '33', '112.678.990-56', 'ju@gmail.com', '(31) 98883-3232', 'F', '$2y$10$X5eFEfMePFwhhQoYw5pVSuFa0ivHYMSPqmfI2kzZDj2CENew3xRti', 'Cuidador', 'Juliana_1518965118.jpg', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`id_atendimento`),
  ADD KEY `fk_paciente_has_profissional_profissional1_idx` (`id_profissional`),
  ADD KEY `fk_paciente_has_profissional_paciente_idx` (`id_paciente`);

--
-- Índices para tabela `avalia`
--
ALTER TABLE `avalia`
  ADD PRIMARY KEY (`id_avalia`),
  ADD KEY `fk_paciente_has_profissional_profissional2_idx` (`id_profissional`),
  ADD KEY `fk_paciente_has_profissional_paciente1_idx` (`id_paciente`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD UNIQUE KEY `idnome_UNIQUE` (`id_paciente`);

--
-- Índices para tabela `profissional`
--
ALTER TABLE `profissional`
  ADD PRIMARY KEY (`id_profissional`),
  ADD UNIQUE KEY `idprofissional_UNIQUE` (`id_profissional`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `id_atendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `avalia`
--
ALTER TABLE `avalia`
  MODIFY `id_avalia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `profissional`
--
ALTER TABLE `profissional`
  MODIFY `id_profissional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD CONSTRAINT `fk_paciente_has_profissional_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paciente_has_profissional_profissional1` FOREIGN KEY (`id_profissional`) REFERENCES `profissional` (`id_profissional`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `avalia`
--
ALTER TABLE `avalia`
  ADD CONSTRAINT `fk_paciente_has_profissional_paciente1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paciente_has_profissional_profissional2` FOREIGN KEY (`id_profissional`) REFERENCES `profissional` (`id_profissional`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
