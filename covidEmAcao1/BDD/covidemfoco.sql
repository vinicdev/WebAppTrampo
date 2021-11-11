-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 10-Nov-2021 às 18:23
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `covidemfoco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dadosepidemiologicos`
--

DROP TABLE IF EXISTS `dadosepidemiologicos`;
CREATE TABLE IF NOT EXISTS `dadosepidemiologicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dadosCasos` varchar(100) NOT NULL,
  `dadosObitos` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dadosvacinacao`
--

DROP TABLE IF EXISTS `dadosvacinacao`;
CREATE TABLE IF NOT EXISTS `dadosvacinacao` (
  `idCovid` int(11) NOT NULL AUTO_INCREMENT,
  `dosesAplicadas` varchar(30) NOT NULL,
  `dosesDistribuidas` varchar(30) NOT NULL,
  `primeiraDose` varchar(30) NOT NULL,
  `segundaDose` varchar(30) NOT NULL,
  `recursos` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`idCovid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(220) NOT NULL,
  `senha` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `usuario`, `senha`, `created`, `modified`) VALUES
(1, 'admin', '$2y$10$z9g7qbrM5/WgJoH/Aaz0gOVYfB9wsYwFK8YnxbNyVPUVJxKOVQ24C', '2021-11-10 15:20:21', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `meiosdeprevencao`
--

DROP TABLE IF EXISTS `meiosdeprevencao`;
CREATE TABLE IF NOT EXISTS `meiosdeprevencao` (
  `idMeios` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`idMeios`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;