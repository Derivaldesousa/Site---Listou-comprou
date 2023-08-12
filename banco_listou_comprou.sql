-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/06/2023 às 17:02
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_listou_comprou`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_carrinho`
--

CREATE TABLE `tb_carrinho` (
  `ID_CARRINHO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `NUMERO_PRODUTO` int(11) NOT NULL,
  `QUANTIDADE_DE_PRODUTOS` int(11) NOT NULL,
  `TOTAL_PRODUTOS` int(11) NOT NULL,
  `VALOR_TOTAL` double NOT NULL,
  `DATA_ADICIONADO` date NOT NULL,
  `NOME_PRODUTO` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_carrinho`
--

INSERT INTO `tb_carrinho` (`ID_CARRINHO`, `ID_USUARIO`, `NUMERO_PRODUTO`, `QUANTIDADE_DE_PRODUTOS`, `TOTAL_PRODUTOS`, `VALOR_TOTAL`, `DATA_ADICIONADO`, `NOME_PRODUTO`) VALUES
(12, 1, 0, 0, 0, 0, '0000-00-00', 'pão francês');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_categorias`
--

CREATE TABLE `tb_categorias` (
  `ID_CATEGORIA` int(11) NOT NULL,
  `NOME` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `ID_PRODUTO` int(11) NOT NULL,
  `IMAGEM` mediumtext NOT NULL,
  `NOME` varchar(45) NOT NULL,
  `NOME_MERCADO` varchar(200) NOT NULL,
  `VALOR` double NOT NULL,
  `DATA_ATUALIZACAO` date NOT NULL,
  `CATEGORIA` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`ID_PRODUTO`, `IMAGEM`, `NOME`, `NOME_MERCADO`, `VALOR`, `DATA_ATUALIZACAO`, `CATEGORIA`) VALUES
(10, 'img/1685816527_pao-frances (1).jpg', 'pão francês', 'mercado J', 1.6, '0000-00-00', 'PADARIA'),
(11, 'img/1685816527_pao-frances (1).jpg', 'pão francês', 'mercado K', 2.6, '0000-00-00', 'PADARIA'),
(12, 'img/1685816527_pao-frances (1).jpg', 'pão francês', 'mercado L', 0.6, '0000-00-00', 'PADARIA'),
(13, 'img/1685845208_atum_enlatado.jpeg', 'Atum enlatado', 'mercado M', 11, '0000-00-00', 'ENLATADOS'),
(28, 'img/1685984941_petisco de carne.jpeg', 'petisco de carne', 'Mercado A', 10, '0000-00-00', 'ROTISSERIA'),
(29, 'img/1685984941_petisco de carne.jpeg', 'petisco de carne', 'Mercado B', 20, '0000-00-00', 'ROTISSERIA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOME` varchar(45) NOT NULL,
  `EMAIL` varchar(90) NOT NULL,
  `SENHA` varchar(45) NOT NULL,
  `DATA_CADASTRO` date NOT NULL,
  `ADMINISTRADOR` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`ID_USUARIO`, `NOME`, `EMAIL`, `SENHA`, `DATA_CADASTRO`, `ADMINISTRADOR`) VALUES
(1, 'célio', 'celiomatheus12345@gmail.com', 'Matheus19032000', '0000-00-00', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_carrinho`
--
ALTER TABLE `tb_carrinho`
  ADD PRIMARY KEY (`ID_CARRINHO`);

--
-- Índices de tabela `tb_categorias`
--
ALTER TABLE `tb_categorias`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Índices de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`ID_PRODUTO`);

--
-- Índices de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_carrinho`
--
ALTER TABLE `tb_carrinho`
  MODIFY `ID_CARRINHO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_categorias`
--
ALTER TABLE `tb_categorias`
  MODIFY `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `ID_PRODUTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
