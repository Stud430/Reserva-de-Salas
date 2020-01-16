-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jan-2020 às 21:53
-- Versão do servidor: 5.7.17
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservadesalas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `espaco`
--

CREATE TABLE `espaco` (
  `espacoID` int(11) NOT NULL,
  `espaco` varchar(25) NOT NULL,
  `endereco` varchar(25) NOT NULL,
  `capacidade` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tipo` char(20) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `espaco`
--

INSERT INTO `espaco` (`espacoID`, `espaco`, `endereco`, `capacidade`, `status`, `tipo`, `descricao`) VALUES
(1, 'Sala 108', '2 Andar', 20, 0, 'Sala', 'Sala com Ar-Condicionado, TV,  Notebook e Internet.'),
(9, 'Marketing - 108', 'Corredor Central', 9, 0, 'Laboratório', '7 Computadores, Mini Studio, 1 Cämera Profissional.'),
(10, 'Brinquedoteca', 'Bloco B - 1 Andar', 12, 0, 'Sala de Aula', 'Brinquedos e Brinquedos.'),
(16, 'Sala B', '6 aNDAR', 15, 0, 'Sala de Aula', 'ABCDE'),
(12, 'Sala 310', '3 Andar', 50, 0, 'Sala de Multimídia', 'TelÃ¤o, computador, internet, mesa retangular.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historicoitem`
--

CREATE TABLE `historicoitem` (
  `id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `EventoAula` int(11) NOT NULL,
  `nome` int(11) NOT NULL,
  `quantidade` int(3) NOT NULL,
  `responsavel` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `horario` int(11) NOT NULL,
  `devolucao` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historicoreserva`
--

CREATE TABLE `historicoreserva` (
  `id` int(11) NOT NULL,
  `EventoAula` varchar(25) NOT NULL,
  `espaco` int(11) NOT NULL,
  `dia` date NOT NULL,
  `horario` time NOT NULL,
  `endereco` int(11) NOT NULL,
  `responsavel` char(50) DEFAULT NULL,
  `detalhe` char(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historicoreserva`
--

INSERT INTO `historicoreserva` (`id`, `EventoAula`, `espaco`, `dia`, `horario`, `endereco`, `responsavel`, `detalhe`) VALUES
(1, 'Aniversário ', 10, '2020-02-15', '17:00:00', 10, 'Tia LalÃ¡', 'Evento Marcado'),
(2, 'Aula de Culinária', 16, '2020-01-22', '16:00:00', 16, 'Chef', 'Evento Marcado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `itemID` int(11) NOT NULL,
  `item` varchar(15) NOT NULL,
  `quantidade` int(3) NOT NULL,
  `disponivel` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`itemID`, `item`, `quantidade`, `disponivel`) VALUES
(1, 'Projetor Epson', 4, 4),
(2, 'Extensäo', 10, 10),
(3, 'Tablet ', 5, 5),
(4, 'Apagador', 2, 2),
(5, 'Piloto Azul', 9, 9),
(6, 'Mouse', 16, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `reservaID` int(11) NOT NULL,
  `EventoAula` varchar(25) NOT NULL,
  `espaco` int(11) NOT NULL,
  `dia` date NOT NULL,
  `horario` time NOT NULL,
  `endereco` int(11) NOT NULL,
  `responsavel` char(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`reservaID`, `EventoAula`, `espaco`, `dia`, `horario`, `endereco`, `responsavel`) VALUES
(4, 'Aula de Culinária', 16, '2020-01-22', '16:00:00', 16, 'Chef');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva_item`
--

CREATE TABLE `reserva_item` (
  `reservaitemID` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `AulaEvento` varchar(25) NOT NULL,
  `nome` char(25) NOT NULL,
  `quantidade` int(3) NOT NULL,
  `responsavel` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `horario` int(11) NOT NULL,
  `devolucao` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `tipoID` int(11) NOT NULL,
  `tipo` char(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`tipoID`, `tipo`) VALUES
(3, 'Laboratório'),
(4, 'Sala de Aula'),
(5, 'Sala de Multimídia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `NomeCompleto` char(40) NOT NULL,
  `usuario` varchar(7) NOT NULL,
  `senha` varchar(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `espaco`
--
ALTER TABLE `espaco`
  ADD PRIMARY KEY (`espacoID`);

--
-- Indexes for table `historicoitem`
--
ALTER TABLE `historicoitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item` (`item`),
  ADD KEY `EventoAula` (`EventoAula`),
  ADD KEY `nome` (`nome`),
  ADD KEY `quantidade` (`quantidade`),
  ADD KEY `responsavel` (`responsavel`),
  ADD KEY `dia` (`dia`),
  ADD KEY `horario` (`horario`),
  ADD KEY `devolucao` (`devolucao`);

--
-- Indexes for table `historicoreserva`
--
ALTER TABLE `historicoreserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `espaco` (`espaco`),
  ADD KEY `endereco` (`endereco`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`reservaID`),
  ADD KEY `espaco` (`espaco`),
  ADD KEY `endereco` (`endereco`);

--
-- Indexes for table `reserva_item`
--
ALTER TABLE `reserva_item`
  ADD PRIMARY KEY (`reservaitemID`),
  ADD KEY `item` (`item`),
  ADD KEY `AulaEvento` (`AulaEvento`),
  ADD KEY `responsavel` (`responsavel`),
  ADD KEY `dia` (`dia`),
  ADD KEY `horario` (`horario`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`tipoID`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `espaco`
--
ALTER TABLE `espaco`
  MODIFY `espacoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `historicoitem`
--
ALTER TABLE `historicoitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `historicoreserva`
--
ALTER TABLE `historicoreserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reservas`
--
ALTER TABLE `reservas`
  MODIFY `reservaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reserva_item`
--
ALTER TABLE `reserva_item`
  MODIFY `reservaitemID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `tipoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
