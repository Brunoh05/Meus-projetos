-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Nov-2023 às 21:31
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
 CREATE TABLE pbrg2;
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluguel`
--

CREATE TABLE `aluguel` (
  `id_usuario` int(4) DEFAULT NULL,
  `id_imovel` int(4) DEFAULT NULL,
  `valor` double(10,2) DEFAULT NULL,
  `id_aluguel` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_usuario` int(4) DEFAULT NULL,
  `id_imovel` int(4) DEFAULT NULL,
  `id_avaliacao` int(4) NOT NULL,
  `nota` double(2,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `CEP` varchar(50) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `id_endereco` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imovel`
--

CREATE TABLE `imovel` (
  `id_usuario` int(4) DEFAULT NULL,
  `descricao` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `id_imovel` int(4) NOT NULL,
  `status_atual` enum('ocupado','desocupado') DEFAULT NULL,
  `tipo_casa` enum('praia','campim','casa','apartamento') DEFAULT NULL,
  `cidades` enum('jaraguadosul','saojose','balneariocamburiu','criciuma','florianopolis') DEFAULT NULL,
  `valor` double(6,2) DEFAULT NULL,
  `imgURL` varchar(255) DEFAULT NULL,
  `telefone` double(12,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imovel`
--

INSERT INTO `imovel` (`id_usuario`, `descricao`, `id_imovel`, `status_atual`, `tipo_casa`, `cidades`, `valor`, `imgURL`, `telefone`) VALUES
(2, 'casa de campim, com 2 quartos, duas camas de casal, uma cozinha, 1 banheiro e uma sala de jantar, sem wifi.', 1, 'ocupado', 'campim', 'saojose', 166.00, 'img/casacampim1.jpg', 4795644568),
(1, 'apartamento simples', 2, 'desocupado', 'apartamento', 'jaraguadosul', 72.00, 'img/apartamento1.jpg', 4795670180),
(6, 'Casa de praia simples e comfortável', 3, 'desocupado', 'praia', 'florianopolis', 215.00, 'img/casapraia1.jpg', 4770556893),
(4, 'Casa de Camping em meio a floresta, com bala?o e uma lagoa.', 4, 'ocupado', 'campim', 'saojose', 120.00, 'img/casacampim2.jpg', 4733456092),
(1, 'Apartamento de luxo com piscina e muitas atividades para fam?lia. (OBS: para 3 ou 4 pessoas).', 5, 'ocupado', 'apartamento', 'criciuma', 189.00, 'img/apartamento2.jpg', 4756569080),
(3, 'lugar tranquilo e bom para relaxar, ? 8km da praia, para uma ou dua pessoas', 6, 'desocupado', 'praia', 'balneariocamburiu', 105.00, 'img/casapraia2.jpg', 4734787891),
(7, 'casa moderna', 7, 'ocupado', 'casa', 'jaraguadosul', 175.00, 'img/casa1.jpg', 4769123200),
(0, 'uma casa bem simples com um quarto com cama de solteiro, um banheiro e uma cozinha comum. ', 8, 'desocupado', 'casa', 'criciuma', 49.00, 'img/casa2.jpg', 4756843232),
(5, 'casa com piscina', 9, 'ocupado', 'casa', 'florianopolis', 160.00, 'img/casa4.jpg', 4789893435),
(8, 'casa de campismo', 10, 'ocupado', 'campim', 'criciuma', 130.00, 'img/casacampim3.jpg', 4760123490),
(4, 'um apartamento para até 4 pessoas', 11, 'desocupado', 'apartamento', 'florianopolis', 125.00, 'img/apartamento3.jpg', 4755638989),
(3, 'Casa colonial de 15 de janeiro  do ano de 1974. Tr?s quartos, dois banheiros e uma coxinha com sala de jantar.', 12, 'desocupado', 'casa', 'jaraguadosul', 180.00, 'img/casa3.jpg', 4790808076),
(1, 'Dois quartos com cama de casal, uma cozinha, uma sala de jantar e um banheiro', 13, 'ocupado', 'praia', 'balneariocamburiu', 200.00, 'img/casapraia3.jpg', 4790991231),
(5, 'apartamento para casal', 14, 'desocupado', 'apartamento', 'saojose', 100.00, 'img/apartamento4.jpg', 4788659237),
(12, 'Casa de praia simples e comfortável.', 15, 'desocupado', 'praia', 'balneariocamburiu', 75.00, 'img/casapraia4.jpg', 4788901256);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`) VALUES
(1, 'rafael', 'rafael@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'grabriel', 'gabriel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'bruno', 'bruno@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'pedro', 'pedro@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(5, 'ana', 'ana@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(6, 'Claudia', 'claudia@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluguel`
--
ALTER TABLE `aluguel`
  ADD PRIMARY KEY (`id_aluguel`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_imovel` (`id_imovel`);

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_imovel` (`id_imovel`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Índices para tabela `imovel`
--
ALTER TABLE `imovel`
  ADD PRIMARY KEY (`id_imovel`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imovel`
--
ALTER TABLE `imovel`
  MODIFY `id_imovel` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
