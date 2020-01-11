-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Jan-2020 às 19:48
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
  `id` int(11) NOT NULL,
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

INSERT INTO `espaco` (`id`, `espaco`, `endereco`, `capacidade`, `status`, `tipo`, `descricao`) VALUES
(1, 'Sala 108', '2 Andar', 20, 0, 'Sala', 'Sala com Ar-Condicionado, TV,  Notebook e Internet.'),
(2, 'Lab-A', '1 Andar', 15, 0, 'Laboratório', 'Ar-Condicionado, Notebook e Internet.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `item` varchar(15) NOT NULL,
  `quantidade` int(3) NOT NULL,
  `disponivel` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id`, `item`, `quantidade`, `disponivel`) VALUES
(1, 'Projetor Epson', 4, 4),
(2, 'Extensäo', 10, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `EventoAula` varchar(25) NOT NULL,
  `espaco` int(11) NOT NULL,
  `dia` date NOT NULL,
  `horario` time NOT NULL,
  `endereco` int(11) NOT NULL,
  `responsavel` char(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva_item`
--

CREATE TABLE `reserva_item` (
  `id` int(11) NOT NULL,
  `AulaEvento` varchar(25) NOT NULL,
  `nome` char(25) NOT NULL,
  `quantidade` int(3) NOT NULL,
  `responsavel` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `horario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `espaco` (`espaco`),
  ADD KEY `endereco` (`endereco`);

--
-- Indexes for table `reserva_item`
--
ALTER TABLE `reserva_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `AulaEvento` (`AulaEvento`),
  ADD KEY `responsavel` (`responsavel`),
  ADD KEY `dia` (`dia`),
  ADD KEY `horario` (`horario`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reserva_item`
--
ALTER TABLE `reserva_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
