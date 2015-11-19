-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2015 at 08:13 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pizzaria`
--
CREATE DATABASE IF NOT EXISTS `pizzaria` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pizzaria`;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `name`) VALUES
(1, 'pequena'),
(2, 'media'),
(3, 'grande');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'admins', '2015-11-18 17:05:29', '2015-11-18 17:05:29'),
(2, 'managers', '2015-11-18 10:57:28', '2015-11-18 10:57:28'),
(3, 'users', '2015-11-18 07:47:48', '2015-11-18 07:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `ingredientes`
--

CREATE TABLE IF NOT EXISTS `ingredientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `name`, `comments`) VALUES
(1, 'queijo', 'pizza branca'),
(2, ' stracchino', 'pizza branca'),
(3, ' batatas ', 'pizza branca'),
(4, ' tomate.', 'pizza branca');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `registo` varchar(255) NOT NULL,
  `pizza_id` int(3) NOT NULL,
  `ingrediente_id` varchar(45) NOT NULL,
  `created` datetime DEFAULT NULL,
  `estado` varchar(45) DEFAULT 'pendente',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id`, `registo`, `pizza_id`, `ingrediente_id`, `created`, `estado`) VALUES
(1, 'admin', 0, '', '2016-11-18 15:33:12', 'pendente'),
(2, 'admin', 0, '', '2015-11-18 15:34:14', 'pendente'),
(3, 'admin', 0, '', '2014-11-18 15:35:58', 'pendente'),
(4, 'admin', 0, '', '2015-11-18 15:37:36', 'pendente'),
(5, 'admin', 0, '', '2015-11-18 15:38:29', 'pendente'),
(6, 'admin', 0, '', '2015-11-18 15:40:13', 'pendente'),
(7, 'admin', 1, '1', '2015-11-18 16:01:34', 'pendente');

-- --------------------------------------------------------

--
-- Table structure for table `pizzas`
--

CREATE TABLE IF NOT EXISTS `pizzas` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `Tipo` varchar(20) NOT NULL,
  `Preco` decimal(3,0) NOT NULL,
  `Ingredientes` varchar(20) NOT NULL,
  `Fotos` varchar(20) NOT NULL,
  `categoria_id` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` (`id`, `name`, `Tipo`, `Preco`, `Ingredientes`, `Fotos`, `categoria_id`) VALUES
(1, 'Reginaldo', 'mexicana', '100', 'carne, farinha,ovos,', '2', 1),
(2, 'branca', 'simples e delicada', '200', 'queijo,tomate,batata', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE IF NOT EXISTS `privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` char(11) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `controller` (`controller`,`action`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `group_name`, `controller`, `action`) VALUES
(1, 'admins', 'privileges', 'add'),
(2, 'admins', 'privileges', 'edit'),
(3, 'admins', 'privileges', 'delete'),
(4, 'admins', 'privileges', 'view'),
(5, 'admins', 'privileges', 'index'),
(11, 'admins', 'groups', 'add'),
(12, 'admins', 'groups', 'edit'),
(13, 'admins', 'groups', 'delete'),
(14, 'admins', 'groups', 'view'),
(15, 'admins', 'groups', 'index'),
(18, 'admins', 'users', 'index'),
(19, 'admins', 'users', 'view'),
(20, 'admins', 'users', 'add'),
(21, 'admins', 'users', 'edit'),
(22, 'admins', 'users', 'delete'),
(23, 'managers', 'clientes', 'add'),
(24, 'managers', 'clientes', 'index');

-- --------------------------------------------------------

--
-- Table structure for table `registos`
--

CREATE TABLE IF NOT EXISTS `registos` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `apelido` varchar(20) NOT NULL,
  `telefone` int(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nuit` varchar(20) NOT NULL,
  `numbi` varchar(20) NOT NULL,
  `casa` varchar(45) NOT NULL,
  `quarteirao` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `distrito` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `registos`
--

INSERT INTO `registos` (`id`, `name`, `apelido`, `telefone`, `email`, `nuit`, `numbi`, `casa`, `quarteirao`, `bairro`, `distrito`) VALUES
(1, 'Danilo', 'Castro', 823552530, 'danicastro@gmail.com', '1003562789', 'A210257mz', '', '', '', ''),
(2, 'Sergio', 'Matusse', 2147483647, 'sergiomatusse@gmail.com', '21123331as', 'ad2001mc', '', '', '', ''),
(3, 'sebas', 'Mugunhe', 827878227, 'sbs@gmail.com', '20103196', '32323', 'mag', '12', 'bairr', 'kamavota'),
(4, 'augusto', 'macaba', 825523333, 'augmaca@gmail.com', '2010523', 'a877777', '12', '59', 'mag', 'urbano5'),
(5, 'reginaldo', 'mata', 843409990, 'regmata@yahoo.com.br', '4290955566', 'BI00999355', '23', '45', 'sommerchield', 'maputo'),
(6, '', '', 0, '', '', '', '12', '23', '23', '23'),
(7, '', '', 0, '', '', '', '12', '12', '23', 'urbano5'),
(8, 'mau mau', 'mugunhe', 8, 'sbstmugu@gmail.com', '2999', '2919', '2919', '2919', '2919', '201999'),
(9, 'estevao', 'cumbana', 827878227, 'sbstmugu@gmail.com', '2010', '2200', '2010', '2010', '2010', '45'),
(10, 'mau mau', 'cumbana', 98, 'sbstmugu@gmail.com', '23', '2200', '2010', '34', '2010', '201999'),
(11, 'estevao', 'cumbana', 87, 'sbstmugu@gmail.com', '2010', '2200', '2010', '12', '2010', 'urbano5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`) VALUES
(1, 'admin', '3a3534f6b743387475f37d6c7a4807082c0daff7', 1, '2015-11-18 07:57:06', '2015-11-18 10:20:13'),
(2, 'manager', '42b915d5aa34db5cb61adfa53037f6fa74ee566c', 2, '2015-11-18 07:57:18', '2015-11-18 10:20:21'),
(3, 'augusto', 'eb65b93ffa5de0ddd445d0d216145b4892749f1a', 3, '2015-11-18 11:59:27', '2015-11-18 11:59:27'),
(4, 'reginaldo', '52b339270529d9fbe6a9582be7cf70e3b23a65bb', 0, '2015-11-18 12:02:51', '2015-11-18 12:02:51'),
(5, 'mau', 'b2d69dc64006284ec69253bd1a1eb03e46de51a9', 0, '2015-11-18 17:47:21', '2015-11-18 17:47:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
