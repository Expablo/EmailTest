-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 18-Jun-2014 às 22:42
-- Versão do servidor: 5.5.32
-- versão do PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `message`
--
CREATE DATABASE IF NOT EXISTS `message` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `message`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(111) NOT NULL,
  `su_message` text CHARACTER SET utf8 NOT NULL,
  `me_message` text NOT NULL,
  `dh_message` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `message`
--

INSERT INTO `message` (`id_message`, `fk_user`, `su_message`, `me_message`, `dh_message`) VALUES
(1, 6, 'Mensagem Para todos', 'EssaLorem ipsum dolor sit amet, consectetur adipisicing elit. Amet magni, numquam, nesciunt cumque excepturi aspernatur error ut libero voluptate quae assumenda debitis iste atque obcaecati repellendus necessitatibus suscipit sint explicabo doloribus mole', '2014-06-18 19:35:21'),
(2, 6, 'mais uma vezz', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet magni, numquam, nesciunt cumque excepturi aspernatur error ut libero voluptate quae assumenda debitis iste atque obcaecati repellendus necessitatibus suscipit sint explicabo doloribus molestiae rem fugiat. Quo debitis ducimus odit, quidem alias et. Eaque mollitia nulla velit in veniam aut tempora sit repellendus dolore placeat atque, inventore, eveniet, ipsum illum adipisci laboriosam. Iure deserunt minima distinctio sequi. Eius necessitatibus autem ab modi odit beatae voluptates eaque mollitia, adipisci officiis suscipit ratione asperiores tempora dicta expedita? Minus accusamus fuga illum ipsam corporis sint enim ducimus! Ut illum inventore tenetur, dignissimos magnam sunt doloremque assumenda esse natus sapiente, dolorem? Dicta quas accusamus dolore quis in quaerat officiis est at libero omnis non, voluptatum sit voluptatibus, neque saepe dolor asperiores magnam! Id commodi eos magnam fuga. Sapiente quis consequatur mollitia odio necessitatibus ut, quod possimus consequuntur fugiat repellat ullam sunt harum, exercitationem vel vero illo incidunt non similique aspernatur libero magni. Eos animi perspiciatis deserunt eaque voluptatibus ullam eligendi culpa nisi possimus veniam dolore tenetur officia aliquid ad velit veritatis, harum temporibus, incidunt. Itaque laboriosam veniam eaque maxime, adipisci et facere sequi reprehenderit voluptate voluptatibus praesentium earum inventore nulla sed similique, eos ullam neque, mollitia.\r\n', '2014-06-18 19:36:53'),
(3, 2, 'NOVA', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet magni, numquam, nesciunt cumque excepturi aspernatur error ut libero voluptate quae assumenda debitis iste atque obcaecati repellendus necessitatibus suscipit sint explicabo doloribus molestiae rem fugiat. Quo debitis ducimus odit, quidem alias et. Eaque mollitia nulla velit in veniam aut tempora sit repellendus dolore placeat atque, inventore, eveniet, ipsum illum adipisci laboriosam. Iure deserunt minima distinctio sequi. Eius necessitatibus autem ab modi odit beatae voluptates eaque mollitia, adipisci officiis suscipit ratione asperiores tempora dicta expedita? Minus accusamus fuga illum ipsam corporis sint enim ducimus! Ut illum inventore tenetur, dignissimos magnam sunt doloremque assumenda esse natus sapiente, dolorem? Dicta quas accusamus dolore quis in quaerat officiis est at libero omnis non, voluptatum sit voluptatibus, neque saepe dolor asperiores magnam! Id commodi eos magnam fuga. Sapiente quis consequatur mollitia odio necessitatibus ut, quod possimus consequuntur fugiat repellat ullam sunt harum, exercitationem vel vero illo incidunt non similique aspernatur libero magni. Eos animi perspiciatis deserunt eaque voluptatibus ullam eligendi culpa nisi possimus veniam dolore tenetur officia aliquid ad velit veritatis, harum temporibus, incidunt. Itaque laboriosam veniam eaque maxime, adipisci et facere sequi reprehenderit voluptate voluptatibus praesentium earum inventore nulla sed similique, eos ullam neque, mollitia.\r\n', '2014-06-18 19:37:34'),
(4, 4, 'novamensagem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet magni, numquam, nesciunt cumque excepturi aspernatur error ut libero voluptate quae assumenda debitis iste atque obcaecati repellendus necessitatibus suscipit sint explicabo doloribus molestiae rem fugiat. Quo debitis ducimus odit, quidem alias et. Eaque mollitia nulla velit in veniam aut tempora sit repellendus dolore placeat atque, inventore, eveniet, ipsum illum adipisci laboriosam. Iure deserunt minima distinctio sequi. Eius necessitatibus autem ab modi odit beatae voluptates eaque mollitia, adipisci officiis suscipit ratione asperiores tempora dicta expedita? Minus accusamus fuga illum ipsam corporis sint enim ducimus! Ut illum inventore tenetur, dignissimos magnam sunt doloremque assumenda esse natus sapiente, dolorem? Dicta quas accusamus dolore quis in quaerat officiis est at libero omnis non, voluptatum sit voluptatibus, neque saepe dolor asperiores magnam! Id commodi eos magnam fuga. Sapiente quis consequatur mollitia odio necessitatibus ut, quod possimus consequuntur fugiat repellat ullam sunt harum, exercitationem vel vero illo incidunt non similique aspernatur libero magni. Eos animi perspiciatis deserunt eaque voluptatibus ullam eligendi culpa nisi possimus veniam dolore tenetur officia aliquid ad velit veritatis, harum temporibus, incidunt. Itaque laboriosam veniam eaque maxime, adipisci et facere sequi reprehenderit voluptate voluptatibus praesentium earum inventore nulla sed similique, eos ullam neque, mollitia.\r\n', '2014-06-18 19:38:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `pass_user` varchar(255) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `data_nasc` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `nome`, `pass_user`, `matricula`, `data_nasc`) VALUES
(1, 'Mauricio', '123', '123123123', '28/11/1967'),
(2, 'Palmer', '123', '312412322', '12/11/1990'),
(3, 'Rafael', '123', '234234234', '1999'),
(4, 'Maria', '123', '543234445', '23/01/1999'),
(6, 'Pablo', '123', '123123123', ''),
(7, 'Marlene', '123', '13123123', ''),
(11, 'Carolie', '123', '12312323', ''),
(12, 'Joao', '123', '312312', '12/05/1899'),
(13, 'Pablossss', '123', '12312323', '12/05/1899'),
(14, '123', '123', '123', '28/11/1967');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_message`
--

CREATE TABLE IF NOT EXISTS `user_message` (
  `Id_user_message` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(255) NOT NULL,
  `fk_message` int(255) NOT NULL,
  `ativo` int(11) NOT NULL,
  PRIMARY KEY (`Id_user_message`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `user_message`
--

INSERT INTO `user_message` (`Id_user_message`, `fk_user`, `fk_message`, `ativo`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 0),
(3, 3, 1, 0),
(4, 4, 1, 0),
(5, 5, 1, 0),
(6, 6, 1, 0),
(7, 7, 1, 0),
(8, 11, 1, 0),
(9, 12, 1, 0),
(10, 1, 2, 0),
(11, 3, 3, 0),
(12, 4, 3, 0),
(13, 7, 4, 0),
(14, 11, 4, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
