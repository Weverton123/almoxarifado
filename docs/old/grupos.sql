-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb5+lenny9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2014 at 05:37 PM
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
-- Table structure for table `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `codigo_grupo` varchar(4) collate utf8_unicode_ci NOT NULL,
  `descricao_grupo` varchar(100) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`codigo_grupo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grupos`
--

INSERT INTO `grupos` (`codigo_grupo`, `descricao_grupo`) VALUES
('3016', '3016 - MATERIAL DE EXPEDIENTE'),
('3007', '3007 - GÊNEROS DE ALIMENTAÇÃO'),
('3019', '3019 - MATERIAL DE ACONDICIONAMENTO E EMBALAGEM'),
('3004', '3004 - GAS ENGARRAFADO'),
('3003', '3003 - COMBUSTÍVEIS E LUBRIFICANTES'),
('3017', '3017 - MATERIAL DE PROCESSAMENTO DE DADOS'),
('3021', '3021 - MATERIAL DE COPA E COZINHA'),
('3015', '3015 - MATERIAL PARA FESTIVIDADES E HOMENAGENS'),
('3020', '3020 - MATERIAL DE CAMA E MESA'),
('3024', '3024 - MATERIAL PARA MANUTENÇÃO DE BENS IMÓVEIS'),
('3025', '3025 - MATERIAL PARA MANUTENÇÃO DE BENS MÓVEIS'),
('3026', '3026 - MATERIAL ELÉTRICO'),
('3028', '3028 - MATERIAL DE PROTEÇÃO E SEGURANÇA'),
('3029', '3029 - MATERIAL PARA  ÁUDIO, VÍDEO E FOTO'),
('3040', '3040 - MATERIAL ELETRÔNICO'),
('3042', '3042 - FERRAMENTAS'),
('5233', '5233 - EQUIPAMENTOS PARA AUDIO, VIDEO E FOTO'),
('3022', '3022 - MATERIAL DE LIMPEZA E PRODUTOS DE HIGIENIZAÇÃO'),
('5235', '5235 - EQUIPAMENTOS DE PROCESSAMENTO DE DADOS'),
('3036', '3036 - MATERIAL HOSPITALAR');
