-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Jul-2018 às 04:02
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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

--
-- Extraindo dados da tabela `atributos`
--

INSERT INTO `atributos` (`id`, `descricao`, `id_item`) VALUES
(1, 'atributo1 com update', 1),
(3, 'atributo3', 2),
(4, 'atributo4', 2),
(5, 'atributo 5', 3),
(6, 'atributo 6', 3),
(7, 'atributo7', 4),
(8, 'atributo8', 4),
(9, 'atributo9', 5),
(10, 'atributo10', 5),
(11, 'atributo11', 6),
(12, 'atributo12', 6),
(13, 'teste atributo', 7),
(15, 'atributo descriÃ§Ã£o1', 8),
(16, 'atributo descriÃ§Ã£o2', 8),
(33, 'novo atributo para ', 8),
(100, '1 atributo quantidade', 35),
(101, '2 atributo quiantidade', 35),
(102, '1 atributo quantidade', 36),
(103, '2 atributo quiantidade', 36),
(104, '1 atributo quantidade', 37),
(105, '2 atributo quiantidade', 37),
(106, '1 atributo quantidade', 38),
(107, '2 atributo quiantidade', 38),
(108, '1 atributo quantidade', 39),
(109, '2 atributo quiantidade', 39),
(110, '1 atributo quantidade', 40),
(111, '2 atributo quiantidade', 40),
(112, '1 atributo quantidade', 41),
(113, '2 atributo quiantidade', 41),
(114, '1 atributo quantidade', 42),
(115, '2 atributo quiantidade', 42),
(116, '1 atributo quantidade', 43),
(117, '2 atributo quiantidade', 43),
(118, '1 atributo quantidade', 44),
(119, '2 atributo quiantidade', 44);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_item`
--

CREATE TABLE `categoria_item` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria_item`
--

INSERT INTO `categoria_item` (`id`, `descricao`) VALUES
(1, 'Sem Categoria'),
(2, 'Categoria item 2'),
(3, 'Categoria item 3'),
(4, 'Categoria item 4'),
(5, 'Categoria item 5'),
(6, 'Categoria item 200'),
(7, 'teste categoria'),
(8, 'nova api cat item'),
(9, 'testeup');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_kit`
--

CREATE TABLE `categoria_kit` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria_kit`
--

INSERT INTO `categoria_kit` (`id`, `descricao`) VALUES
(1, 'Sem Categoria'),
(2, 'Categoria Kit 2'),
(3, 'Categoria kit 3'),
(4, 'Categoria kit 4'),
(5, 'Categoria kit 50'),
(6, 'nova api cat kit'),
(7, 'testeup');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `descricao` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id`, `descricao`) VALUES
(1, 'Funcional'),
(2, 'Em arranjo'),
(3, 'Para abate'),
(4, 'NÃ£o funcional'),
(5, 'Pendente'),
(6, 'Em atraso'),
(7, 'Aceite'),
(8, 'Recusado'),
(10, 'Cancelado'),
(11, 'Em progresso'),
(12, 'teste11up');

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

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id`, `descricao`, `ver`, `reservar`, `ver_admin`, `reservas`, `criar_editar`, `user_ver`, `user_editar`, `criar_msg`, `ver_historico`) VALUES
(1, 'Visitante', 1, 1, 0, 0, 0, 0, 0, 0, 0),
(2, 'Administrador', 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 'teste', 1, 1, 1, 1, 1, 1, 1, 1, 0),
(4, 'teste11up', 1, 0, 0, 1, 1, 1, 1, 1, 0);

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

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`id`, `descricao`, `marca`, `modelo`, `serial_number`, `serial_ipvc`, `visivel`, `id_categoria`, `id_estado`, `id_kit`, `foto`, `observacao`) VALUES
(1, 'descricao12', 'marca 12', 'modelo 12', 99999, 11111, 1, 3, 2, 2, '20180527_200909.jpg', 'ObservaÃ§Ã£o 1 update\r\nLinha 2 de ObservaÃ§Ã£o    '),
(2, 'descricao2', 'marca2', 'modelo2', 432435, 65264265, 0, 2, 4, 1, 'WP_20180514_11_08_28_Pro.jpg', ''),
(3, 'descricao3', 'marca3', 'modelo3', 54564386, 4536, 1, 5, 1, 6, 'WP_20180514_11_09_27_Pro.jpg', ''),
(4, 'descricao4', 'marca4', 'modelo4', 32424, 542355, 1, 6, 1, 3, 'WP_20180514_11_09_22_Pro.jpg', ''),
(5, 'descricao5', 'marca5', 'modelo5', 34241254, 2133432, 1, 3, 1, 4, 'WP_20180514_11_08_50_Pro.jpg', 'observaçao 5\r\nobservaçao 5 2\r\nobservaçao 5 3\r\nobservaçao 5 4\r\nobservaçao 5 5'),
(6, 'descricao6', 'marca6', 'modelo6', 547664, 76876, 1, 3, 1, 1, 'WP_20180514_11_08_34_Pro.jpg', 'observacao1'),
(7, 'descriÃ§ao7', 'marca7', 'modelo7', 12909123, 30238932, 1, 4, 2, 5, '6648-2.jpg', 'linha\r\nlinha2\r\nlinha3\r\nlinha4'),
(8, 'descriÃ§ao8 com update de foto nova', 'marca8', 'modelo8', 2134127, 312663, 0, 3, 3, 1, '6648-2.jpg', 'teste descriÃ§ao\r\nteste descriÃ§Ã£o2\r\nteste descriÃ§Ã£o3\r\nteste descriÃ§Ã£o update'),
(35, 'descriÃ§Ã£o quantidade', 'marca quantidade', 'modelo quantidade', 2313, 3123123, 1, 4, 3, 1, '1_teste.png', 'observaÃ§Ã£o\r\nquantidade'),
(36, 'descriÃ§Ã£o quantidade', 'marca quantidade', 'modelo quantidade', 2313, 3123123, 1, 4, 3, 1, '805656.jpg', 'observaÃ§Ã£o\r\nquantidade'),
(37, 'descriÃ§Ã£o quantidade', 'marca quantidade', 'modelo quantidade', 2313, 3123123, 1, 4, 3, 1, '3_teste.png', 'observaÃ§Ã£o\r\nquantidade'),
(38, 'descriÃ§Ã£o quantidade', 'marca quantidade', 'modelo quantidade', 2313, 3123123, 1, 4, 3, 1, 'finalfantasy-1509570752447-8265.jpg', 'observaÃ§Ã£o\r\nquantidade'),
(39, 'descriÃ§Ã£o quantidade', 'marca quantidade', 'modelo quantidade', 2313, 3123123, 1, 4, 3, 8, '5_teste.png', 'observaÃ§Ã£o\r\nquantidade'),
(40, 'descriÃ§Ã£o quantidade', 'marca quantidade', 'modelo quantidade', 2313, 3123123, 1, 4, 3, 1, '6_teste.png', 'observaÃ§Ã£o\r\nquantidade'),
(41, 'descriÃ§Ã£o quantidade', 'marca quantidade', 'modelo quantidade', 2313, 3123123, 1, 4, 3, 1, '7_teste.png', 'observaÃ§Ã£o\r\nquantidade'),
(42, 'descriÃ§Ã£o quantidade', 'marca quantidade', 'modelo quantidade', 2313, 3123123, 1, 4, 3, 1, '8_teste.png', 'observaÃ§Ã£o\r\nquantidade'),
(43, 'descriÃ§Ã£o quantidade', 'marca quantidade', 'modelo quantidade', 2313, 3123123, 1, 4, 3, 7, '9_teste.png', 'observaÃ§Ã£o\r\nquantidade'),
(44, 'descriÃ§Ã£o quantidade', 'marca quantidade', 'modelo quantidade', 2313, 3123123, 1, 4, 3, 7, '10_teste.png', 'observaÃ§Ã£o\r\nquantidade'),
(45, 'testeitemup', 'marcateste', 'modeloteste', 1, 3, 1, 2, 1, 1, 'Captura de EcrÃ£ (117).png', 'sem teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `kit`
--

CREATE TABLE `kit` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `limite_data` int(11) NOT NULL,
  `observacao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `kit`
--

INSERT INTO `kit` (`id`, `descricao`, `id_categoria`, `limite_data`, `observacao`) VALUES
(1, 'Sem Kit', 1, 0, ''),
(2, 'kit1', 2, 30, ''),
(3, 'kit2', 3, 20, ''),
(4, 'kit3', 4, 50, 'observacaoupdate1'),
(5, 'kit novo', 3, 50, 'fgdsfgd'),
(6, 'kit datatable', 3, 3, 'dsfasdf'),
(7, 'g', 4, 4, ''),
(8, 'teste111', 2, 11, '11'),
(9, 'kit datatable', 3, 3, 'dsfasdf');

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

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`id`, `assunto`, `mensagem`, `lido`, `data`, `id_utilizador`, `id_emissor`) VALUES
(1, 'assunto 1', 'mensagem 1 \"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 0, '2018-06-01 07:31:41', 3, 3),
(2, 'assunto 2', 'mensagem 2 \"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 0, '2018-06-03 09:12:33', 3, 3),
(3, 'assunto 3', 'mensagem 3 \"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 1, '2018-06-05 17:32:00', 3, 3),
(4, 'assunto 4', 'mensagem 4 \"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 0, '2018-06-08 10:46:09', 3, 3),
(5, 'assunto 5', 'mensagem 5 \"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 1, '2018-06-20 14:24:36', 3, 3),
(6, 'assunto 6', 'mensagem 6 \"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 1, '2018-06-27 17:22:32', 3, 3),
(7, 'assunto teste envio', ' mensagem envio teste \"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 0, '2018-06-30 14:18:09', 5, 3),
(8, 'teste enter', 'boas\r\noutra linha\r\nlinha diferente\r\nultima linha, no total sao 4', 1, '2018-06-30 13:23:34', 3, 3),
(9, 'teste linhas', 'linha\r\nmais uma linha\r\nmais duas linhas\r\n4 linhas no total', 0, '2018-06-30 17:16:36', 5, 3),
(22, 'Bem-vindo!', 'Caro rui. \r\n          Se deseja usufruir de mais funcionalidades da nossa plataforma por favor complete o seu perfil com o seu contacto e nÃºmero mecatrÃ³nico!\r\n          Para editar o seu perfil por favor carregue no seu nome, no canto superior direito, e depois escolha a opÃ§Ã£o <b>Editar informaÃ§Ãµes</b>!\r\n          Depois de completar o seu perfil entre em contacto com o email <b>mail@mail.ipvc.pt</b>, onde envia algumas informaÃ§Ãµes como o seu mail registado, o seu nÃºmero mecatrÃ³nico e o seu username para poder ter acesso a mais privilÃ©gios!', 1, '2018-07-05 19:53:56', 12, 9),
(26, 'Aviso!', 'Caro pedro. \r\n          O tempo de aluguer do kit <b>kit1</b> jÃ¡ chegou ao final, a data de entrega do kit estÃ¡ registada como <b>2018-07-04</b>, por favor entregue o kit ou entre em contacto com o funcionÃ¡rio para explicar a situaÃ§Ã£o!', 1, '2018-07-06 21:12:04', 3, 4),
(27, 'NotificaÃ§Ã£o da sua reserva!', 'Caro pedro. Esta Ã© uma mensagem de notificaÃ§Ã£o para indicar que o pedido da sua reserva do kit <b>teste111</b> foi enviado com sucesso, por favor aguarde pela avaliaÃ§Ã£o de um funcionÃ¡rio.', 1, '2018-07-13 01:06:09', 3, 9),
(28, 'NotificaÃ§Ã£o da sua reserva!', 'Caro pedro. Esta Ã© uma mensagem de notificaÃ§Ã£o para indicar que o pedido da sua reserva do kit <b>teste111</b> jÃ¡ foi avaliado e foi recusado.', 1, '2018-07-13 01:06:26', 3, 3),
(29, 'NotificaÃ§Ã£o da sua reserva!', 'Caro pedro. Esta Ã© uma mensagem de notificaÃ§Ã£o para indicar que o pedido da sua reserva do kit <b>teste111</b> jÃ¡ foi avaliado e foi aceite, a sua data de levantamento Ã© 2018-07-16.', 1, '2018-07-13 01:06:52', 3, 3),
(30, 'loles', ' teste\r\nfuck', 1, '2018-07-13 01:08:03', 3, 3),
(31, 'testeassuntoerffsfdfssdffas', ' teste\r\nlinha\r\naÃ§Ã£o', 1, '2018-07-13 18:57:03', 3, 3),
(32, 'NotificaÃ§Ã£o da reserva!', 'Caro clement. Esta Ã© uma mensagem de notificaÃ§Ã£o para indicar que o pedido da sua reserva do kit <b>kit datatable</b> jÃ¡ foi avaliado e foi recusado.', 0, '2018-07-15 00:33:42', 5, 3);

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

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id`, `id_kit`, `id_funcionario`, `id_reservante`, `id_estado`, `data_inicio`, `data_fim`, `observacao`) VALUES
(1, 3, 9, 6, 5, '2018-07-10', '2018-07-18', 'Teste\r\nUpdate\r\nReserva'),
(2, 6, 4, 6, 6, '2018-07-01', '2018-07-02', ''),
(3, 5, 4, 5, 6, '2018-07-02', '2018-07-26', 'teste edit'),
(4, 6, 9, 3, 5, '2018-07-19', '2018-07-26', 'teste'),
(8, 6, 9, 3, 5, '2018-07-18', '2018-08-03', ''),
(9, 6, 9, 4, 5, '2018-07-20', '2018-07-21', ''),
(10, 6, 3, 5, 11, '2018-07-25', '2018-07-31', ''),
(11, 6, 9, 6, 5, '2018-08-04', '2018-07-17', ''),
(12, 6, 9, 8, 5, '2018-07-20', '2018-08-09', ''),
(13, 6, 3, 5, 8, '2018-07-02', '2018-07-12', ''),
(14, 2, 4, 3, 6, '2018-07-01', '2018-07-04', ''),
(15, 3, 4, 4, 7, '2018-07-17', '2018-07-17', ''),
(16, 3, 3, 4, 10, '2018-07-01', '2018-07-02', ''),
(17, 3, 12, 6, 8, '2018-07-03', '2018-07-07', ''),
(18, 8, 3, 3, 7, '2018-07-22', '2018-07-25', ''),
(19, 2, 4, 3, 7, '2018-07-18', '2018-07-26', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `numero` int(11) NOT NULL,
  `telefone` int(11) NOT NULL,
  `id_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `numero`, `telefone`, `id_grupo`) VALUES
(3, 'pedro', 'pedropasse', 'pedromail@gmail.com', 10225, 999888777, 2),
(4, 'emanuel', 'emanuelpasse', 'emanuelmail@gmail.com', 1, 0, 1),
(5, 'clement', 'clementpasse', 'clementmail@gmail.com', 0, 0, 1),
(6, 'teste', 'testepasse', 'teste@gmail.com', 11, 0, 1),
(8, 'testeupdate', 'testeupdatepasse', 'testeupdate@gmail.com', 1343, 646, 1),
(9, 'Sistema', 'sistemapasse', 'sistema@gmail.com', 0, 0, 2),
(12, 'rui', 'ruipasse', 'ruimail@gmail.com', 0, 0, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `categoria_item`
--
ALTER TABLE `categoria_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categoria_kit`
--
ALTER TABLE `categoria_kit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `itens`
--
ALTER TABLE `itens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `kit`
--
ALTER TABLE `kit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
