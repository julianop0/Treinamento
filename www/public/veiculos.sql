-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25-Jun-2020 às 14:36
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `concessionaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

DROP TABLE IF EXISTS `veiculos`;
CREATE TABLE IF NOT EXISTS `veiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) NOT NULL,
  `placa` varchar(7) NOT NULL,
  `codigo_renavam` varchar(11) NOT NULL,
  `ano_modelo` int(4) NOT NULL,
  `ano_fabricacao` int(4) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `km` int(6) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `preco` float(8,2) NOT NULL,
  `preco_fipe` float(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `descricao`, `placa`, `codigo_renavam`, `ano_modelo`, `ano_fabricacao`, `cor`, `km`, `marca`, `preco`, `preco_fipe`) VALUES
(29, '156 SportWagon 2.5 V6 24V 190cv 4p Aut.', 'MVH8616', '53987888782', 2003, 2003, 'Azul', 0, 'Alfa Romeo', 200000.00, 200000.00),
(28, 'C70 Cup', 'MNK5013', '22114466328', 1998, 1998, 'Bege', 8000, 'Volvo', 75000.00, 75000.00),
(27, 'Band.Picape Chassi Curto Diesel', 'MZO2851', '02485362801', 1985, 1985, 'Dourado', 25, 'Toyota', 150000.00, 150000.00),
(26, 'CIELO 1.6 16V 119cv  5p', 'NEL3850', '18463342642', 2010, 2010, 'Azul', 0, 'CHERY', 100000.00, 100000.00),
(24, 'GOL', 'VBJ4J45', '43768901324', 2010, 2010, 'Branco', 0, 'VW', 50000.00, 50000.00),
(25, '328iA Exclusive 2.8 24V', 'JZN8723', '01155746365', 1997, 1997, 'Prata', 450, 'BMW', 40000.00, 40000.00),
(30, 'Seville 4.6', 'LVB7107', '86793111231', 1991, 1991, 'Branco', 650, 'Cadillac', 300000.00, 300000.00),
(31, 'FLUENCE Sed. Dyn. Plus 2.0 16V FLEX Aut.', 'HZT7133', '85853779332', 2015, 2015, 'Branco', 500, 'Renault', 60000.00, 60000.00),
(32, 'Golf GTI 1.8 Turbo', 'HZM7584', '15628694294', 1998, 1998, 'Prata', 0, 'VW - VolksWagen', 80000.00, 80000.00),
(33, 'Gol 1.8 Mi Rallye Total Flex 8V 4p', 'MYH3373', '65508700358', 2005, 2005, 'Dourado', 0, 'VW - VolksWagen', 25000.00, 25000.00),
(34, 'Vectra Elite 2.0 MPFI', 'BAC0177', '91782905807', 2005, 2005, 'Prata', 0, 'GM - Chevrolet', 40000.00, 40000.00),
(35, 'Astra 500 Sedan 2.0 MPFI 16V 4p', 'HYG0916', '98520686099', 2000, 2000, 'Dourado', 50000, 'GM - Chevrolet', 40000.00, 40000.00),
(36, 'TRACKER LT 1.8 16V Flex 4x2 Aut.', 'NEP5445', '50310700260', 2016, 2016, 'Dourado', 0, 'GM - Chevrolet', 90000.00, 90000.00),
(37, 'Corvette 5.7/ 6.0, 6.2 Conv./Stingray', 'HPX6114', '50129891092', 1991, 1991, 'Prata', 0, 'GM - Chevrolet', 160000.00, 160000.00);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
