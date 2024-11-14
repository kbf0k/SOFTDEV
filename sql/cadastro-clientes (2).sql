-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Nov-2024 às 19:52
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
-- Banco de dados: `cadastro-clientes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio`
--

CREATE TABLE `cardapio` (
  `id_cardapio` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cardapio`
--

INSERT INTO `cardapio` (`id_cardapio`, `id`, `nome`, `preco`, `descricao`) VALUES
(1, 1, 'Cardápio Kids Clássico', '50.00', 'Salgados variados (coxinha, quibe, bolinha de queijo), Mini pizzas e mini hot dogs, Suco de frutas naturais, Sorvete com cobertura e granulado, Batata Frita'),
(2, 2, 'Cardápio Kids Gourmet', '80.00', 'Salgados variados (coxinha,quibe,bolinha de queijo), Mini hambúrgueres artesanais, Refrigerantes, Milk-shake de chocolate e morango, Nuggets'),
(3, 3, 'Cardápio Kids Diversão', '70.00', 'Pedaços de pizza diversos, Bolo de cenoura com cobertura de chocolate, Mini churros, Refrigerantes e sucos naturais, Tortas doces de diversos sabores'),
(4, 4, 'Cardápio Kids Prime', '60.00', 'Salgados variados, Lanches, Refrigerante, Milk-shake, Doces'),
(6, 5, 'Cardápio Kids Festa', '65.00', 'Mini salgados diversos, Mini sanduíches de presunto e queijo, Batatas fritas, Milk-shake de baunilha, Refrigerante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(45) DEFAULT NULL,
  `sobrenome_usuario` varchar(45) DEFAULT NULL,
  `data_nasc_usuario` date DEFAULT NULL,
  `email_usuario` varchar(45) DEFAULT NULL,
  `senha_usuario` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `sobrenome_usuario`, `data_nasc_usuario`, `email_usuario`, `senha_usuario`) VALUES
(1, 'kaique', 'ferreira', '2024-11-08', 'kaique1245br@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD PRIMARY KEY (`id_cardapio`),
  ADD KEY `id` (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cardapio`
--
ALTER TABLE `cardapio`
  MODIFY `id_cardapio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
