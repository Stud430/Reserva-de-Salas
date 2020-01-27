-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Jan-2020 às 20:18
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
  `espaco` varchar(30) NOT NULL,
  `endereco` varchar(30) NOT NULL,
  `capacidade` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tipo` char(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `espaco`
--

INSERT INTO `espaco` (`espacoID`, `espaco`, `endereco`, `capacidade`, `status`, `tipo`) VALUES
(17, 'Brinquedoteca', '2 Andar', 15, 0, 'Sala de Aula'),
(18, 'MKT - 08', '3 Andar', 13, 0, 'Laboratório de Marketing'),
(19, 'Sala 310', '3 Andar', 60, 0, 'Sala de Aula'),
(22, 'Sala  20', '3 Andar - 2 porta á esquerda', 30, 0, 'Sala de Aula'),
(21, 'Auditório CAEL', '1 Andar - Bloco B', 60, 0, 'Sala de Multimídia');

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
  `EventoAula` varchar(100) NOT NULL,
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
(13, 'Aula de HTML5', 18, '2020-05-15', '09:30:00', 18, 'Professor Carlos', 'Evento Marcado'),
(12, 'Aula de Photoshop', 18, '2020-05-15', '08:00:00', 18, 'Professora Aline', 'Evento Marcado'),
(11, 'Cine Kids - Os Vegetais', 17, '2020-03-13', '14:00:00', 17, 'Professor JoÃ¤o', 'Evento Marcado'),
(10, 'Aula de Macinha', 17, '2020-03-15', '10:00:00', 17, 'Professora Ana', 'Evento Marcado'),
(14, 'Palestra - Desing de Games', 20, '2020-04-20', '17:30:00', 20, 'Professora CÃ¡tia', 'Evento Marcado'),
(15, 'Filme O Patriota', 21, '2020-06-14', '11:00:00', 21, 'Professor Gabriel', 'Evento Marcado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `itemID` int(11) NOT NULL,
  `item` varchar(30) NOT NULL,
  `quantidade` int(3) NOT NULL,
  `disponivel` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`itemID`, `item`, `quantidade`, `disponivel`) VALUES
(8, 'Projetor Epson', 3, 3),
(7, 'Mouse', 8, 8),
(9, 'Extensäo 10 Metros', 5, 5),
(10, 'Giz Branco', 50, 50),
(11, 'Piloto Azul', 6, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `reservaID` int(11) NOT NULL,
  `EventoAula` varchar(100) NOT NULL,
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
(12, 'Aula de Macinha', 17, '2020-03-15', '10:00:00', 17, 'Professora Ana'),
(13, 'Cine Kids - Os Vegetais', 17, '2020-03-13', '14:00:00', 17, 'Professor JoÃ¤o'),
(14, 'Aula de Photoshop', 18, '2020-05-15', '08:00:00', 18, 'Professora Aline'),
(15, 'Aula de HTML5', 18, '2020-05-15', '09:30:00', 18, 'Professor Carlos'),
(16, 'Palestra - Desing de Games', 20, '2020-04-20', '17:30:00', 20, 'Professora CÃ¡tia'),
(17, 'Palestra - Desing de Games', 20, '2020-04-20', '17:30:00', 20, 'Professora CÃ¡tia'),
(18, 'Filme O Patriota', 21, '2020-06-14', '11:00:00', 21, 'Professor Gabriel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva_item`
--

CREATE TABLE `reserva_item` (
  `reservaitemID` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `AulaEvento` int(3) NOT NULL,
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
  `tipo` char(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`tipoID`, `tipo`) VALUES
(8, 'Laboratório de Marketing'),
(7, 'Sala de Multimídia'),
(6, 'Sala de Aula');

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
  MODIFY `espacoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `historicoitem`
--
ALTER TABLE `historicoitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `historicoreserva`
--
ALTER TABLE `historicoreserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `reservas`
--
ALTER TABLE `reservas`
  MODIFY `reservaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `reserva_item`
--
ALTER TABLE `reserva_item`
  MODIFY `reservaitemID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `tipoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
