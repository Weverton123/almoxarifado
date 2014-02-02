-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb5+lenny9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2014 at 05:42 PM
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
-- Table structure for table `operadores`
--

CREATE TABLE IF NOT EXISTS `operadores` (
  `login` varchar(14) collate utf8_unicode_ci NOT NULL,
  `nome_operador` varchar(50) collate utf8_unicode_ci default NULL,
  `senha_operador` varchar(40) collate utf8_unicode_ci NOT NULL,
  `tipo` char(1) collate utf8_unicode_ci NOT NULL,
  `setor` varchar(10) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `operadores`
--

INSERT INTO `usuario` (`login`, `nome`, `senha`, `setor_codigo`, `tipousuario_tipo`) VALUES
('Tereza', 'Tereza Cristina Medeiros de Andrade', '2b0f658cbffd284984fb11d90254081f', '2', 'SA'),
('marcio', 'Márcio P. Mariano', '7f1a65908b05238c21c134c764c89e28', '1', 'SA'),
('socorro', 'Maria do Socorro do Nascimento', '3dc29711456f1a732b010293d2700516', '2', 'SCE'),
('eliezer', 'Eliezer Pinheiro Lima', '63c17d596f401acb520efe4a2a7a01ee', '2', 'DST'),
('erica', 'Erica Simony Fernandes de Melo', 'c0f971d8cd24364f2029fcb9ac7b71f5', '2', 'SIR'),
('elisangela', 'Elisangela Alves de Moura', 'aa0aaa6d129bd12d9787ac441f571fe8', '2', 'SC'),
('Ana Luiza', 'Ana Luiza Medeiros', 'a800f3e3ad747367679ff2d58f62f307', '2', 'SCIRC'),
('janio', 'Janio Cesar', '2b09ee9dffa41296a243aef2cdafec9a', '2', 'CPD'),
('Margareth', 'MARGARETH RÉGIA DE LÁRA MENEZES', '8e8402a76367b3404bbac7f235d451c7', '2', 'CBS'),
('matheus', 'Matheus Lisboa', '71f6278d140af599e06ad9bf1ba03cb0', '2', 'SC'),
('clediane', 'Clediane de Araújo Guedes', '253614bbac999b38b5b60cae531c4969', '2', 'SRD'),
('zairasrc', 'Zaira Atanazio Ferreira', 'f7ce3d8a8e903a3ccd84673c03f3a9fb', '2', 'SR'),
('wel', 'Wellington Rodrigues da Silva', 'c18dc61c9affb5281ac7c251662f39e1', '2', 'CPD'),
('nandotonny', 'Fernando Antonny Guerra Alves', '8b9615202dfe0e3af6542ac3483314be', '2', 'SDI'),
('guilherme', 'Guilherme Henrique Pereira de Carvalho', 'bdcc41211aa62a8f10f26d1a2d1727bf', '2', 'SA'),
('euzebia', 'Euzébia Pontes', '2ba1245d06438825e8768a6b388982a4', '2', 'SCIRC'),
('scarabeidae', 'Thiago Araújo da Silva', 'd50d27d18b8bb91255161afbe85e8b95', '2', 'SC'),
('marcel', 'Marcel de Freitas', '2e2aea6862287ce2cb2f1237235d7054', '2', 'CPD'),
('josianaregis', 'Josiana Florencio', 'a45958517604f5cd90d6ee51ad9cfdb6', '2', 'DAU'),
('lysandra', 'Lysandra Galvão', '17a103af914c12612d82d6be53c06648', '1', 'SA'),
('ithalo', 'José Ithalo de Araújo', 'c295dbad8e8dcfe43607b06df0ac3f32', '2', 'SCIRC'),
('silvestre', 'Silvestre Gomes Martins', 'b3b4d2dbedc99fe843fd3dedb02f086f', '2', 'ALMOXA'),
('jefferson', 'Jefferson Bruno Lima de Melo', 'fa131721954c3ddae16ee67620ffb2e0', '1', 'ALMOXA'),
('fernanda', 'Fernanda de Medeiros Ferreira Aquino', 'f976b57bb9dd27aa2e7e7df2825893a6', '2', 'SIR'),
('martha', 'Martha Aparecida Silva Nascimento', '9a6e4b89dfa7859f84a84a132be6ffe8', '2', 'DAU'),
('solange', 'Solange Pinon', '28b0eb6a294557fe2f4b242741083a2a', '2', 'SCE'),
('zaira', 'Zaira Atanázio ', '8208974663db80265e9bfe7b222dcb18', '2', 'SR'),
('raimundomuniz', 'Raimundo Muniz de Oliveira', '1b36ea1c9b7a1c3ad668b8bb5df7963f', '2', 'SIR'),
('italo', 'Ítalo Bolsista', 'd4e6cf61d0076542a3572ba4af9e3977', '1', 'CPD');
