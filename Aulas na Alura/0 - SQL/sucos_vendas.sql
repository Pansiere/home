-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 24/06/2024 às 11:17
-- Versão do servidor: 8.0.32
-- Versão do PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `SUCOS`
--
CREATE DATABASE IF NOT EXISTS `SUCOS` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `SUCOS`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `CPF` varchar(11) NOT NULL,
  `NOME` varchar(30) DEFAULT NULL,
  `ENDERECO1` varchar(150) DEFAULT NULL,
  `ENDERECO2` varchar(150) DEFAULT NULL,
  `BAIRRO` varchar(50) DEFAULT NULL,
  `CIDADE` varchar(50) DEFAULT NULL,
  `ESTADO` varchar(50) DEFAULT NULL,
  `CEP` varchar(8) DEFAULT NULL,
  `IDADE` smallint DEFAULT NULL,
  `SEXO` varchar(1) DEFAULT NULL,
  `LIMITE_CREDITO` float DEFAULT NULL,
  `VOLUME_COMPRA` float DEFAULT NULL,
  `PRIMEIRA_COMPRA` bit(1) DEFAULT NULL,
  `DATA_NASCIMENTO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`CPF`, `NOME`, `ENDERECO1`, `ENDERECO2`, `BAIRRO`, `CIDADE`, `ESTADO`, `CEP`, `IDADE`, `SEXO`, `LIMITE_CREDITO`, `VOLUME_COMPRA`, `PRIMEIRA_COMPRA`, `DATA_NASCIMENTO`) VALUES
('14872134554', 'Joao Pedro V. Pansiere', 'Ips', '111', 'Coqueiral', 'Aracruz', 'ES', '29199144', 22, 'M', 3000, 232, b'0', '1999-10-05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `PRODUTOS`
--

CREATE TABLE `PRODUTOS` (
  `PRODUTO` varchar(20) NOT NULL,
  `NOME` varchar(150) NOT NULL,
  `EMBALAGEM` varchar(50) NOT NULL,
  `TAMANHO` varchar(50) NOT NULL,
  `SABOR` varchar(50) NOT NULL,
  `PRECO_LISTA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `PRODUTOS`
--

INSERT INTO `PRODUTOS` (`PRODUTO`, `NOME`, `EMBALAGEM`, `TAMANHO`, `SABOR`, `PRECO_LISTA`) VALUES
('1000889', 'Sabor da Montanha - 700 ml - Uva', 'Garrafa', '700 ml', 'Uva', 6.309),
('1002767', 'Videira do Campo - 700 ml - Cereja/Maa', 'Garrafa', '700 ml', 'Cereja/Maa', 8.41),
('1004327', 'Videira do Campo - 1,5 Litros - Melncia', 'PET', '1,5 Litros', 'Melncia', 19.51),
('1037797', 'Clean - 2 Litros - Laranja', 'PET', '2 Litros', 'Laranja', 16.008),
('1040107', 'Light - 350 ml - Melncia', 'Lata', '350 ml', 'Melncia', 4.555),
('1041119', 'Linha Citros - 700 ml - Lima/Limo', 'Garrafa', '700 ml', 'Lima/Limo', 4.904),
('1042712', 'Linha Citros - 700 ml - Limo', 'Garrafa', '700 ml', 'Limo', 4.904),
('1051518', 'Frescor do Vero - 470 ml - Limo', 'Garrafa', '470 ml', 'Limo', 3.2995),
('1078680', 'Frescor do Vero - 470 ml - Manga', 'Garrafa', '470 ml', 'Manga', 5.1795),
('1086543', 'Linha Refrescante - 1 Litro - Manga', 'PET', '1 Litro', 'Manga', 11.0105),
('1088126', 'Linha Citros - 1 Litro - Limo', 'PET', '1 Litro', 'Limo', 7.004),
('1101035', 'Linha Refrescante - 1 Litro - Morango/Limo', 'PET', '1 Litro', 'Morango/Limo', 9.0105),
('229900', 'Pedaos de Frutas - 350 ml - Maa', 'Lata', '350 ml', 'Maa', 4.211),
('231776', 'Festival de Sabores - 700 ml - Aai', 'Garrafa', '700 ml', 'Aai', 13.312),
('243083', 'Festival de Sabores - 1,5 Litros - Maracuj', 'PET', '1,5 Litros', 'Maracuj', 10.512),
('326779', 'Linha Refrescante - 1,5 Litros - Manga', 'PET', '1,5 Litros', 'Manga', 16.5105),
('394479', 'Sabor da Montanha - 700 ml - Cereja', 'Garrafa', '700 ml', 'Cereja', 8.409),
('479745', 'Clean - 470 ml - Laranja', 'Garrafa', '470 ml', 'Laranja', 3.768),
('520380', 'Pedaos de Frutas - 1 Litro - Maa', 'PET', '1 Litro', 'Maa', 12.011),
('544931', 'Frescor do Vero - 350 ml - Limo', 'ggeasy', '350 ml', 'Limo', 99.99),
('695594', 'Festival de Sabores - 1,5 Litros - Aai', 'PET', '1,5 Litros', 'Aai', 28.512),
('723457', 'Festival de Sabores - 700 ml - Maracuj', 'Garrafa', '700 ml', 'Maracuj', 4.912),
('746596', 'Light - 1,5 Litros - Melncia', 'PET', '1,5 Litros', 'Melncia', 19.505),
('773912', 'Clean - 1 Litro - Laranja', 'PET', '1 Litro', 'Laranja', 8.008),
('788975', 'Pedaos de Frutas - 1,5 Litros - Maa', 'PET', '1,5 Litros', 'Maa', 18.011),
('826490', 'Linha Refrescante - 700 ml - Morango/Limo', 'Garrafa', '700 ml', 'Morango/Limo', 6.3105),
('838819', 'Clean - 1,5 Litros - Laranja', 'PET', '1,5 Litros', 'Laranja', 12.008);

-- --------------------------------------------------------

--
-- Estrutura para tabela `TABELA_DE_VENDEDORES`
--

CREATE TABLE `TABELA_DE_VENDEDORES` (
  `MATRICULA` varchar(5) DEFAULT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `PERCENTUAL_COMISSAO` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CPF`) USING BTREE;

--
-- Índices de tabela `PRODUTOS`
--
ALTER TABLE `PRODUTOS`
  ADD PRIMARY KEY (`PRODUTO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
