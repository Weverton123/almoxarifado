-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb5+lenny9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2014 at 05:43 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6-1+lenny16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `almoxarifado`
--

-- --------------------------------------------------------

--
-- Table structure for table `setores`
--

CREATE TABLE IF NOT EXISTS `setores` (
  `codigo_setor` varchar(10) collate utf8_unicode_ci NOT NULL,
  `descricao_setor` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`codigo_setor`),
  UNIQUE KEY `codigo_setor` (`codigo_setor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setores`
--

INSERT INTO `setores` (`codigo_setor`, `descricao_setor`) VALUES
('SA', 'Secretaria Administrativa'),
('CBS', 'Coordenação das Bibliotecas Setoriais'),
('CPD', 'Centro de Processamento de Dados'),
('SIR', 'Seção de Informação e Referência'),
('DST', 'Divisão de Serviços Técnicos'),
('SCIRC', 'Seção de Circulação'),
('DAU', 'Divisão de Apoio ao Usuário'),
('SCE', 'Seção de Coleções Especiais'),
('ALMOXA', 'Almoxarifado'),
('SC', 'Seção de Compras'),
('SDI', 'Setor de Doação e Intercâmcio'),
('SR', 'Setor de Restauração'),
('SRD', 'Setor de Repositórios Digitais');
