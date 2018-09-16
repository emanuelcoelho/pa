-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Set-2018 às 16:56
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websitedb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atributos`
--

CREATE TABLE `atributos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(120) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_item`
--

CREATE TABLE `categoria_item` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_kit`
--

CREATE TABLE `categoria_kit` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `descricao` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `ver` int(11) NOT NULL,
  `reservar` int(11) NOT NULL,
  `ver_admin` int(11) NOT NULL,
  `reservas` int(11) NOT NULL,
  `criar_editar` int(11) NOT NULL,
  `user_ver` int(11) NOT NULL,
  `user_editar` int(11) NOT NULL,
  `criar_msg` int(11) NOT NULL,
  `ver_historico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `id` int(11) NOT NULL,
  `descricao` varchar(120) NOT NULL,
  `marca` varchar(60) NOT NULL,
  `modelo` varchar(60) NOT NULL,
  `serial_number` int(11) NOT NULL,
  `serial_ipvc` int(11) NOT NULL,
  `visivel` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_kit` int(11) DEFAULT NULL,
  `foto` varchar(120) NOT NULL,
  `observacao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `kit`
--

CREATE TABLE `kit` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `designacao` varchar(85) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `limite_data` int(11) NOT NULL,
  `observacao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id` int(11) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `mensagem` varchar(1000) NOT NULL,
  `lido` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `id_emissor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `id_kit` int(11) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `id_reservante` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL,
  `observacao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nome` varchar(85) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `numero` int(11) NOT NULL,
  `telefone` int(11) NOT NULL,
  `id_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atributos`
--
ALTER TABLE `atributos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `categoria_item`
--
ALTER TABLE `categoria_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoria_kit`
--
ALTER TABLE `categoria_kit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_kit` (`id_kit`),
  ADD KEY `id_categoria2` (`id_categoria`);

--
-- Indexes for table `kit`
--
ALTER TABLE `kit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilizador` (`id_utilizador`),
  ADD KEY `id_emissor` (`id_emissor`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kit2` (`id_kit`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_reservante` (`id_reservante`),
  ADD KEY `id_estado2` (`id_estado`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atributos`
--
ALTER TABLE `atributos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `categoria_item`
--
ALTER TABLE `categoria_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categoria_kit`
--
ALTER TABLE `categoria_kit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `itens`
--
ALTER TABLE `itens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `kit`
--
ALTER TABLE `kit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atributos`
--
ALTER TABLE `atributos`
  ADD CONSTRAINT `id_item` FOREIGN KEY (`id_item`) REFERENCES `itens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `id_categoria2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_item` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `id_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `id_kit` FOREIGN KEY (`id_kit`) REFERENCES `kit` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Limitadores para a tabela `kit`
--
ALTER TABLE `kit`
  ADD CONSTRAINT `id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_kit` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Limitadores para a tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `emissorkey` FOREIGN KEY (`id_emissor`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `mensagemkey` FOREIGN KEY (`id_utilizador`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `id_estado2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `id_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `id_kit2` FOREIGN KEY (`id_kit`) REFERENCES `kit` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `id_reservante` FOREIGN KEY (`id_reservante`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `id_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
