-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Jun-2018 às 22:41
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
-- Database: `pa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atributos`
--

CREATE TABLE `atributos` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `descricao` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `descricao` varchar(85) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `descricao` varchar(85) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(80) NOT NULL,
  `ver` int(11) NOT NULL,
  `requisitar` int(11) NOT NULL,
  `aceitar_req` int(11) NOT NULL,
  `editar` int(11) NOT NULL,
  `contas` int(11) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `descricao` varchar(80) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `visivel` int(11) NOT NULL,
  `limite_data` int(11) NOT NULL,
  `foto` varchar(80) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `serial_number` int(11) NOT NULL,
  `serial_ipvc` int(11) NOT NULL,
  `id_kit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `foto` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva_item`
--

CREATE TABLE `reserva_item` (
  `id` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `num_total` int(11) NOT NULL,
  `num_presente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

CREATE TABLE `teste` (
  `id` int(11) NOT NULL,
  `marca` varchar(85) NOT NULL,
  `modelo` varchar(85) NOT NULL,
  `descricao` varchar(85) NOT NULL,
  `visivel` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `foto` varchar(85) NOT NULL,
  `serial_number` int(11) NOT NULL,
  `serial_ipvc` int(11) NOT NULL,
  `id_kit` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `teste`
--

INSERT INTO `teste` (`id`, `marca`, `modelo`, `descricao`, `visivel`, `id_categoria`, `foto`, `serial_number`, `serial_ipvc`, `id_kit`, `id_estado`) VALUES
(7, 'canon', '500d', 'camara fotografica 500d', 1, 3, '6648-2.jpg', 23313, 4324355, 3, 1),
(8, 'dffdsaf', 'sdfg', 'gdsagg', 1, 5, '805656.jpg', 434, 352432, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste_atributos`
--

CREATE TABLE `teste_atributos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(85) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste_data`
--

CREATE TABLE `teste_data` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `teste_data`
--

INSERT INTO `teste_data` (`id`, `data`) VALUES
(2, '2018-05-16 00:00:00'),
(3, '2018-06-02 00:00:00'),
(4, '2018-05-23 00:00:00'),
(12, '2018-07-19 00:00:00'),
(13, '2018-05-30 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste_estado`
--

CREATE TABLE `teste_estado` (
  `id` int(11) NOT NULL,
  `descricao` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `teste_estado`
--

INSERT INTO `teste_estado` (`id`, `descricao`) VALUES
(1, 'Funcional'),
(2, 'NÃ£o funcional'),
(3, 'Em arranjo'),
(4, 'Para abate');

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste_fkey`
--

CREATE TABLE `teste_fkey` (
  `id` int(11) NOT NULL,
  `descricao` varchar(85) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `teste_fkey`
--

INSERT INTO `teste_fkey` (`id`, `descricao`) VALUES
(1, 'Sem categoria'),
(3, 'Camara fotografica'),
(4, 'Monitor'),
(5, 'Computador'),
(6, 'Camara de filmar'),
(7, 'Rato'),
(8, 'Cartao memoria SD'),
(9, 'Lentes maquina'),
(10, 'Teclado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste_kit`
--

CREATE TABLE `teste_kit` (
  `id` int(11) NOT NULL,
  `descricao` varchar(85) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `limite_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `teste_kit`
--

INSERT INTO `teste_kit` (`id`, `descricao`, `id_categoria`, `limite_data`) VALUES
(1, 'Sem Kit', 1, 0),
(3, 'olympus', 3, 4),
(5, 'thggf', 6, 3432);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste_user`
--

CREATE TABLE `teste_user` (
  `id` int(11) NOT NULL,
  `username` varchar(85) NOT NULL,
  `password` varchar(85) NOT NULL,
  `email` varchar(85) NOT NULL,
  `numero` int(11) NOT NULL,
  `telefone` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `teste_user`
--

INSERT INTO `teste_user` (`id`, `username`, `password`, `email`, `numero`, `telefone`) VALUES
(1, 'pedro', 'passepedro', 'pedroemail@gmail.com', 1233, 54355),
(2, 'emanuel', 'passeemanuel', 'emanuelmail@gmail.com', 0, 0),
(3, 'clement', 'passeclement', 'clementemail@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `telefone` int(9) NOT NULL,
  `email` varchar(80) NOT NULL,
  `id_grupo` int(11) NOT NULL
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
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
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
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_kit` (`id_kit`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserva_item`
--
ALTER TABLE `reserva_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilizador` (`id_utilizador`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `teste`
--
ALTER TABLE `teste`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fkey` (`id_categoria`),
  ADD KEY `id_kit` (`id_kit`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indexes for table `teste_atributos`
--
ALTER TABLE `teste_atributos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `teste_data`
--
ALTER TABLE `teste_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teste_estado`
--
ALTER TABLE `teste_estado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teste_fkey`
--
ALTER TABLE `teste_fkey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teste_kit`
--
ALTER TABLE `teste_kit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `teste_user`
--
ALTER TABLE `teste_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atributos`
--
ALTER TABLE `atributos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserva_item`
--
ALTER TABLE `reserva_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teste`
--
ALTER TABLE `teste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teste_atributos`
--
ALTER TABLE `teste_atributos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teste_data`
--
ALTER TABLE `teste_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teste_estado`
--
ALTER TABLE `teste_estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teste_fkey`
--
ALTER TABLE `teste_fkey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teste_kit`
--
ALTER TABLE `teste_kit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teste_user`
--
ALTER TABLE `teste_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atributos`
--
ALTER TABLE `atributos`
  ADD CONSTRAINT `id_item3` FOREIGN KEY (`id_item`) REFERENCES `item` (`id`);

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `id_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`);

--
-- Limitadores para a tabela `reserva_item`
--
ALTER TABLE `reserva_item`
  ADD CONSTRAINT `id_item2` FOREIGN KEY (`id_item`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `id_utilizador` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`id`);

--
-- Limitadores para a tabela `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `id_item` FOREIGN KEY (`id_item`) REFERENCES `item` (`id`);

--
-- Limitadores para a tabela `teste`
--
ALTER TABLE `teste`
  ADD CONSTRAINT `kit` FOREIGN KEY (`id_kit`) REFERENCES `teste_kit` (`id`),
  ADD CONSTRAINT `testecategoria` FOREIGN KEY (`id_categoria`) REFERENCES `teste_fkey` (`id`),
  ADD CONSTRAINT `testeestado` FOREIGN KEY (`id_estado`) REFERENCES `teste_estado` (`id`);

--
-- Limitadores para a tabela `teste_atributos`
--
ALTER TABLE `teste_atributos`
  ADD CONSTRAINT `teste_atributos_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `teste` (`id`);

--
-- Limitadores para a tabela `teste_kit`
--
ALTER TABLE `teste_kit`
  ADD CONSTRAINT `kitcategoria` FOREIGN KEY (`id_categoria`) REFERENCES `teste_fkey` (`id`);

--
-- Limitadores para a tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `id_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
