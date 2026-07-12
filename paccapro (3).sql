-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 04:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paccapro`
--

-- --------------------------------------------------------

--
-- Table structure for table `box`
--

CREATE TABLE `box` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `cont` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`id`, `item`, `cont`) VALUES
(1, 'Cool Seal ( Fibre Reinfirced Coating) 1 Ltr', 12),
(2, 'Cool Seal ( Fibre Reinfirced Coating) 4 Ltr', 4),
(3, 'Cool Seal (Fibre Reinforced Coating) 10 Ltr', 1),
(4, 'Cool Seal ( Fibre Reinforced Coating) 20 Ltr', 1),
(5, 'COOL SEAL ( SOOTHING SAPPHIRE ) - 10 LTR', 1),
(6, 'COOL SEAL ( TERRACOTTA ) - 10 LTR', 1),
(7, 'COOL SEAL ( TERRACOTTA ) - 1 LTR', 12),
(8, 'COOL SEAL ( TERRACOTTA ) - 20 LTR', 1),
(9, 'EASY PAINT-X 1 LTR', 18),
(10, 'EASY PAINT X 250 Ml', 20),
(11, 'EASY PAINT-X  3 LTR', 4),
(12, 'EASY PAINT -X 500 ML', 24),
(13, 'FLOW FAAST 100 Lit Can', 1),
(14, 'FLOW FAAST 1 Lit Can', 12),
(15, 'FLOW FAAST 200 LIT CAN', 1),
(16, 'FLOW FAAST 20 Lit Can', 1),
(17, 'FLOW FAAST 500 Ml', 24),
(18, 'FLOW FAAST - 50 LIT', 1),
(19, 'FLOW FAAST 5 Lit. Can', 4),
(20, 'GOSANA 10 Lit', 1),
(21, 'GOSANA 1 Lit', 18),
(22, 'GOSANA 20 Lit', 1),
(23, 'GOSANA 4 Lit', 4),
(24, 'MASTERBOND SBR LATEX – 1 LTR', 12),
(25, 'MASTERBOND SBR LATEX – 20 LTR', 1),
(26, 'MASTERBOND SBR LATEX – 5 LTR', 4),
(27, 'M - COOL 10 LIT', 1),
(28, 'M - COOL 1 LIT', 18),
(29, 'M - COOL 20 LIT', 1),
(30, 'M - COOL 4 LIT', 4),
(31, 'METAL PRO 1 Lit.', 12),
(32, 'METAL PRO 20 Lit', 1),
(33, 'METAL PRO 250 Ml', 50),
(34, 'METAL PRO 500 Ml', 24),
(35, 'METAL PRO 5 Lit.', 4),
(36, 'M-SAND BOOSTER 200 LIT', 1),
(37, 'M - Sand BOOZTER 1LIT', 12),
(38, 'M-Sand BOOZTER - 200 Ml', 50),
(39, 'M - Sand BOOZTER 20LIT', 1),
(40, 'M- Sand BOOZTER 50LIT', 1),
(41, 'M - Sand BOOZTER 5LIT', 4),
(42, 'NO - TERMITE 100 ML', 10),
(43, 'NO-TERMITE 1 LIT TIN', 12),
(44, 'NO - TERMITE 200 LIT', 1),
(45, 'NO - TERMITE 20 LIT', 1),
(46, 'NO - TERMITE 3 LIT TIN', 4),
(47, 'NO - TERMITE 500 ML TIN', 20),
(48, 'NO - TERMITE 5 LIT', 4),
(49, 'NO to RUST 1 LTR Can', 12),
(50, 'NO to RUST 20 LIT Can', 1),
(51, 'NO to RUST 250 MLCan', 50),
(52, 'NO to RUST 500 ML Can', 24),
(53, 'NO to RUST 50 LIT Can', 1),
(54, 'NO to RUST 5 Ltr Can', 4),
(55, 'OYT [Sky Blue] 10 Ltr', 1),
(56, 'OYT [Sky Blue ] 1 Lit', 18),
(57, 'OYT [Sky Blue] 20 Ltr', 1),
(58, 'OYT [Sky Blue] 4 Ltr', 4),
(59, 'OYT [White] 10 Ltr', 1),
(60, 'OYT [White] 1 Ltr', 18),
(61, 'OYT [White] 20 Ltr', 1),
(62, 'OYT [White] 4 Ltr', 4),
(63, 'PACCA BLACK BOARD PAINT 1 LTR', 18),
(64, 'PACCA BLACK BOARD PAINT 4 LTR', 4),
(65, 'PACCA CEILING SHINE - SUPER CEILING WHITE EMULSION - 10 LTR', 1),
(66, 'PACCA CEILING SHINE - SUPER CEILING WHITE EMULSION - 1 LTR', 12),
(67, 'PACCA CEILING SHINE - SUPER CEILING WHITE EMULSION - 20 LTR', 1),
(68, 'PACCA CEILING SHINE - SUPER CEILING WHITE EMULSION - 4 LTR', 4),
(69, 'PACCA ECO PRIMER - 10 LTR', 1),
(70, 'PACCA ECO PRIMER - 20 LTR', 1),
(71, 'PACCA ENAMEL THINNER - 1 LTR', 18),
(72, 'PACCA ENAMEL THINNER - 20 LTR', 1),
(73, 'PACCA ENAMEL THINNER - 5 LTR', 4),
(74, 'PACCA FLEXI BLOC ( Two part flexible  PS sealant) - 4 kg', 4),
(75, 'PACCA FLOOR ( Floor coat emulsion ) F.Green - 10 Ltr', 1),
(76, 'PACCA FLOOR ( Floor coat emulsion ) F.Green - 1 Ltr', 12),
(77, 'PACCA FLOOR ( Floor coat emulsion ) F.Green - 20 Ltr', 1),
(78, 'PACCA FLOOR ( Floor coat emulsion ) F.Green - 4 Ltr', 4),
(79, 'PACCA FLOOR ( Floor coat emulsion ) F.Grey - 1 Ltr', 18),
(80, 'PACCA FLOOR ( Floor coat emulsion ) F.Red - 1 Ltr', 12),
(81, 'PACCA FLOOR ( Floor coat emulsion ) F.Yellow - 10 Ltr', 1),
(82, 'PACCA FLOOR ( Floor coat emulsion ) F.Yellow - 1 Ltr', 12),
(83, 'PACCA FLOOR ( Floor coat emulsion ) F.Yellow - 20 Ltr', 1),
(84, 'PACCA FLOOR ( Floor coat emulsion ) F.Yellow - 4 Ltr', 4),
(85, 'PACCA INSTA SHIELD THINNER - 5LIT', 4),
(86, 'PACCA MAX eX EMULSION PAINT EXTERIOR BONE WHITE 10 LTR', 1),
(87, 'PACCA MAX eX EMULSION PAINT EXTERIOR BONE WHITE 1 LTR', 18),
(88, 'PACCA MAX eX EMULSION PAINT EXTERIOR BONE WHITE 20 LTR', 1),
(89, 'PACCA MAX eX EMULSION PAINT EXTERIOR BONE WHITE 4 LTR', 4),
(90, 'PACCA MAX eX EMULSION PAINT EXTERIOR  WHITE 10 LTR', 1),
(91, 'PACCA MAX eX EMULSION PAINT EXTERIOR  WHITE 1 LTR', 12),
(92, 'PACCA MAX eX EMULSION PAINT EXTERIOR  WHITE 20 LTR', 1),
(93, 'PACCA MAX eX EMULSION PAINT EXTERIOR  WHITE 4 LTR', 4),
(94, 'PACCA MAX EX EXTERIOR EMULSION ( MB ) 20 LTR', 1),
(95, 'PACCA MAX EXTERIOR EMULSION ( DB ) 10 LTR', 1),
(96, 'PACCA MAX EXTERIOR EMULSION ( DB ) 20 LTR', 1),
(97, 'PACCA MAX EXTERIOR EMULSION ( DB ) - 4 LTR', 4),
(98, 'PACCA MAX EXTERIOR EMULSION ( LB ) 10 LTR', 1),
(99, 'PACCA MAX EXTERIOR EMULSION ( LB ) 1 LTR', 12),
(100, 'PACCA MAX EXTERIOR EMULSION ( LB ) 20 LTR', 1),
(101, 'PACCA MAX EXTERIOR EMULSION ( LB ) 4 LTR', 4),
(102, 'PACCA MAX EXTERIOR EMULSION ( MB ) 10 LTR', 1),
(103, 'PACCA MAX EXTERIOR EMULSION ( MB ) 1 LTR', 18),
(104, 'PACCA MAX EXTERIOR EMULSION ( MB ) 20 LTR', 1),
(105, 'PACCA MAX EXTERIOR EMULSION ( MB ) 4 LTR', 4),
(106, 'PACCA MAX EXTERIOR EMULSION ( TERRACOTTA ) 1 LTR', 18),
(107, 'PACCA MAX EXTERIOR EMULSION ( WHITE ) 10 LTR', 1),
(108, 'PACCA MAX EXTERIOR EMULSION ( WHITE ) 1 LTR', 12),
(109, 'PACCA MAX EXTERIOR EMULSION ( WHITE ) 20 LTR', 1),
(110, 'PACCA MAX EXTERIOR EMULSION ( WHITE ) 4 LTR', 4),
(111, 'PACCA MAX EXTERIOR EMULSION ( WHITE ) 50 LTR', 1),
(112, 'PACCA MAX EXTERIOR EMULSION ( Wild Yellow - 7865 ) 10 LTR', 1),
(113, 'PACCA MAX EXTERIOR EMULSION ( Wild Yellow - 7865 ) 20 LTR', 1),
(114, 'PACCA MAX TILE PRO  ( COPPER B 0587 ) 10 Ltr', 1),
(115, 'PACCA MAX TILE PRO  ( COPPER B 0587 ) 20 Ltr', 1),
(116, 'PACCA MAX TILE PRO  ( COPPER B 0587 ) 4 Ltr', 4),
(117, 'PACCA MAX ULTRA EXTERIOR EMULSION ( Fawn - ON05 ) - 10 LTR', 1),
(118, 'PACCA MAX ULTRA EXTERIOR EMULSION ( Fawn - ON05 ) - 20 LTR', 1),
(119, 'PACCA MAX ULTRA EXTERIOR EMULSION ( Morning Glooy - 0765 ) - 10 LTR', 1),
(120, 'PACCA MAX ULTRA EXTERIOR EMULSION ( Morning Glooy - 0765 ) - 20 LTR', 1),
(121, 'PACCA MAX ULTRA EXTERIOR EMULSION (SPRING FROLIC 7787) 20 LIT', 1),
(122, 'PACCA MAX ULTRA EXTERIOR EMULSION ( WHITE ) 10 LTR', 1),
(123, 'PACCA MAX ULTRA EXTERIOR EMULSION ( WHITE ) 20 LTR', 1),
(124, 'PACCA MAX ULTRA EXTERIOR EMULSION ( WHITE )4 LTR', 4),
(125, 'PACCA MAX ULTRA EXTERIOR EMULSION ( WHITE ) 50 LTR', 1),
(126, 'PACCA MIX PLASTER  1 KG', 40),
(127, 'PACCA MIX PLASTER 20 KG', 2),
(128, 'PACCA MIX PLASTER 40 KG', 1),
(129, 'PACCA MIX PLASTER 5 KG', 5),
(130, 'PACCA NEW SEAL ( HIGH STRENGTH PUTTY ) 40 Kg', 1),
(131, 'PACCA PERMI GROUT (3K Epoxy Tile Grout) BLACK - 1 KG', 8),
(132, 'PACCA PERMI GROUT (3K Epoxy Tile Grout) DARK GRAY - 1 KG', 12),
(133, 'PACCA PERMI GROUT (3K Epoxy Tile Grout) IVORY - 1 KG', 8),
(134, 'PACCA PERMI GROUT (3K Epoxy Tile Grout) IVORY  - 5 KG', 4),
(135, 'PACCA PERMI GROUT (3K Epoxy Tile Grout) WHITE - 1 KG', 8),
(136, 'PACCA PERMI GROUT (3K Epoxy Tile Grout) WHITE  - 5 KG', 4),
(137, 'PACCA PERMI PRIME ( EPOXY PRIMER Base - 2.5 Kg + Hardener - 2.5 Kg )  5 KG', 4),
(138, 'PACCA PERMI PRIME ( EPOXY PRIMER Base - 500 Gm + Hardener - 500 Gm )  1KG', 12),
(139, 'PACCA PERMI PRIME ( EPOXY PRIMER Base - 5 Kg + Hardener - 5 Kg )  10 KG', 1),
(140, 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base 4 Kg + Hardener - 1 Kg ) Black - 5 KG', 4),
(141, 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base 4 Kg + Hardener - 1 Kg ) Deep Green - 5 KG', 4),
(142, 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base 800 Gm + Hardener ? 200 Gm ) Cement Grey - 1 KG', 12),
(143, 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base 800 Gm + Hardener ? 200 Gm ) Sky Blue - 1 KG', 12),
(144, 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base - 8 Kg + Hardener - 2 Kg ) 10 KG', 1),
(145, 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base - 8 Kg + Hardener - 2 Kg ) Sky Blue - 10 KG', 1),
(146, 'PACCA PREMIUM GLOSS ENAMEL 20 LTR ( GOLDEN BROWN )', 1),
(147, 'PACCA PREMIUM GLOSS ENAMEL 20 LTR ( LIGHT GREY )', 1),
(148, 'PACCA PREMIUM GLOSS ENAMEL 20 LTR ( SAND TUNE )', 1),
(149, 'PACCA PREMIUM GLOSS ENAMEL 20 LTR ( SMOKE GREY )', 1),
(150, 'PACCA PREMIUM GLOSS ENAMEL 20 LTR ( WHITE )', 1),
(151, 'PACCA PREMIUM GLOSS ENAMEL 4 LTR ( BLUE BELL WHITE )', 4),
(152, 'PACCA PREMIUM GLOSS ENAMEL 4 LTR ( LIGHT GREY )', 4),
(153, 'PACCA PREMIUM GLOSS ENAMEL 4 LTR ( SAND TUNE )', 4),
(154, 'PACCA PREMIUM GLOSS ENAMEL 4 LTR ( SMOKE GREY )', 4),
(155, 'PACCA PREMIUM METAL PRIMER ( RED OXIDE ) 1 LTR', 12),
(156, 'PACCA PREMIUM METAL PRIMER ( RED OXIDE ) 20  LTR', 1),
(157, 'PACCA PREMIUM METAL PRIMER ( RED OXIDE ) 4 LTR', 4),
(158, 'PACCA PREMIUM METAL PRIMER ( RED OXIDE ) 500 ML', 24),
(159, 'PACCA PREMIUM METAL PRIMER ( YELLOW - ZP ) 1 LTR', 12),
(160, 'PACCA PREMIUM METAL PRIMER ( YELLOW - ZP ) 20  LTR', 1),
(161, 'PACCA PREMIUM METAL PRIMER ( YELLOW - ZP ) 4 LTR', 4),
(162, 'PACCA PREMIUM METAL PRIMER ( YELLOW - ZP ) 500 ML', 24),
(163, 'PACCA PREMIUM WOOD PRIMER 10 LTR ( WHITE )', 1),
(164, 'PACCA PREMIUM WOOD PRIMER 1 LTR ( WHITE )', 12),
(165, 'PACCA PREMIUM WOOD PRIMER 20 LTR ( WHITE )', 1),
(166, 'PACCA PREMIUM WOOD PRIMER 4 LTR ( WHITE )', 4),
(167, 'PACCA PREMIUM WOOD PRIMER 500 ML ( WHITE )', 24),
(168, 'PACCA PROXY EP 505 - 1 KG', 12),
(169, 'PACCA PUTTY BOOZTER - 1 LTR', 12),
(170, 'PACCA PUTTY BOOZTER - 200 ML', 50),
(171, 'PACCA SEAL 1 Kg  Can', 12),
(172, 'PACCA SEAL 20 Kg  Can', 1),
(173, 'PACCA SEAL 25 Kg  Can', 1),
(174, 'PACCA SEAL 500 Gms', 24),
(175, 'PACCA SEAL 5 Kg  Can', 4),
(176, 'PACCA SEAL GRS - 1 KG', 12),
(177, 'PACCA SEAL GRS - 200 GM', 50),
(178, 'PACCA SEAL GRS - 20 KG', 1),
(179, 'PACCA SEAL GRS - 500 GM', 24),
(180, 'PACCA SEAL GRS - 5 KG', 4),
(181, 'Pacca Super Primer Interior Primer 10lit', 1),
(182, 'Pacca Super Primer Interior Primer 1 Lit', 12),
(183, 'Pacca Super Primer Interior Primer 20 Lit', 1),
(184, 'Pacca Super Primer Interior Primer 4 Lit', 4),
(185, 'PACCA UNIVERSAL BOOZTER - 1 LTR', 12),
(186, 'PACCA UNIVERSAL BOOZTER - 200 ML', 50),
(187, 'PACCA UNIVERSAL BOOZTER - 20 LTR', 1),
(188, 'PACCA UNIVERSAL BOOZTER - 5 LTR', 4),
(189, 'PACCA UNIVERSAL PRIMER 10 LTR', 1),
(190, 'PACCA UNIVERSAL PRIMER 1 LTR', 12),
(191, 'PACCA UNIVERSAL PRIMER 20 LTR', 1),
(192, 'PACCA UNIVERSAL PRIMER 4 LTR', 4),
(193, 'PACCA UNIVERSAL PRIMER 50 LTR', 1),
(194, 'PAINT-X 1 Ltr. Tin', 18),
(195, 'PAINT X 20 Ltr Can', 1),
(196, 'PAINT X - 220 LTR', 1),
(197, 'PAINT-X 250 Ml Tin', 20),
(198, 'Paint-X 3 Lit Tin', 4),
(199, 'PAINT-X 500 Ml Tin', 24),
(200, 'REVE BOND 1000 Gms', 18),
(201, 'REVE BOND 125 Gms', 80),
(202, 'REVE BOND 250 Gms', 50),
(203, 'REVE BOND 500 Gms', 30),
(204, 'REVEFIL - N 1 KG (BLACK)', 40),
(205, 'REVE FIL - N 1 KG (BLUE)', 40),
(206, 'REVEFIL - N 1KG ( BRICK RED)', 40),
(207, 'REVEFIL - N 1KG (BROWN)', 40),
(208, 'REVEFIL - N 1KG ( GRAY)', 40),
(209, 'REVEFIL - N1 KG ( GREEN )', 40),
(210, 'REVEFIL - N 1 KG(IVORY)', 40),
(211, 'REVE FIL - N 1 KG(PINK)', 40),
(212, 'REVE FIL - N 1KG (PISTHA)', 40),
(213, 'REVE FIL - N 1KG (TERRACOTTA)', 40),
(214, 'REVEFIL - N 1KG(WHITE)', 40),
(215, 'REVE FIL - N 1KG (YELLOW)', 40),
(216, 'REVE FIL - N 50 KG ( GRAY)', 1),
(217, 'REVE FIL - N 50 KG ( WHITE )', 1),
(218, 'REVE FIX - N 10 KG', 4),
(219, 'REVE FIX - N 1 KG( POUCH)', 40),
(220, 'REVE FIX - N 20 KG', 1),
(221, 'REVEFIX - N 25 Kg', 2),
(222, 'REVE FIX - N 30 KG', 2),
(223, 'REVE GRIP 100 GM', 60),
(224, 'REVE GRIP 250 GM', 50),
(225, 'REVE GRIP 500 GM', 24),
(226, 'REVE GRIP 50 GM', 40),
(227, 'SHINE TILE PU ENAMEL (BLUE MOON ) ? 4 Ltr', 4),
(228, 'SHINE TILE (Signal Red) - 20 Lit', 1),
(229, 'SHINE TILE [Black] 1 Lit.', 12),
(230, 'SHINE TILE [Black] 4 Lit.', 4),
(231, 'SHINE TILE [Brick Red] 1 Lit', 12),
(232, 'SHINE TILE [BRICK RED] 20 LIT', 1),
(233, 'SHINE TILE [Brick Red] 4 Lits', 4),
(234, 'SHINE TILE [Brick Red] 500 Ml', 24),
(235, 'SHINE TILE [Clear] 1 Lit', 12),
(236, 'SHINE TILE [Clear] 4 Lits', 4),
(237, 'SHINE TILE [Clear] 500 Ml', 24),
(238, 'SHINE TILE [Hanuman Red] 1 Lit', 12),
(239, 'SHINE TILE [Hanuman Red] 4 Lits', 4),
(240, 'SHINE TILE [Hanuman Red] 500 Ml', 24),
(241, 'SHINE TILE [Signal Red] 1 Lit', 12),
(242, 'SHINE TILE [Signal Red] 4 Lit', 4),
(243, 'SHINE TILE [Signal Red] 500ml', 24),
(244, 'SHINE TILE [Terracotta] 1 Lit', 12),
(245, 'SHINE TILE [Terracotta] 4 Lits', 4),
(246, 'SHINE TILE [Terracotta] 500 Ml', 24),
(247, 'SHINE TILE [Tile Red] 1 Lit', 12),
(248, 'SHINE TILE [Tile Red] 4 Lits', 4),
(249, 'SHINE TILE [Tile Red] 500 Ml', 24),
(250, 'SHINE TILE [White] 1 Lit.', 12),
(251, 'SHINE TILE [White] 4 Lits', 4),
(252, 'SHINE TILE [White] 500 Ml', 24),
(253, 'SOLAR KOAT  - LIQUID 125 ML', 0),
(254, 'SOLAR KOAT -  POWDER 5 KG', 5),
(255, 'SUMMERCOAT  - 10 KG', 2),
(256, 'SUMMER COAT - LIQUID 125ML', 0),
(257, 'SUMMER COAT - POWDER 5 KG', 5),
(258, 'SummeR-EX 10 Kgs', 2),
(259, 'SummeR-EX 1 Kg', 18),
(260, 'SummeR-EX 20 Kgs', 1),
(261, 'SummeR-EX 5 Kg', 4),
(262, 'SUPERPLAST 400 ? 1 LTR', 12),
(263, 'SUPERPLAST 400 ? 20 LTR', 1),
(264, 'SUPERPLAST 400 ? 5 LTR', 4),
(265, 'SURKI BOND 1 Lit', 16),
(266, 'SURKI BOND 20 Lit.', 1),
(267, 'SURKI BOND 5 Lit', 4),
(268, 'SURYA KAVASH 1 Kg', 18),
(269, 'SURYA KAVASH 20 Kgs', 1),
(270, 'SURYA KAVASH 5 Kg', 4),
(271, 'TEK SEAL 1 Kg Pouch[Gray]', 40),
(272, 'TEK SEAL 1 Kg Pouch [White]', 40),
(273, 'TILE PLUS 10 Lit [Brick Red]', 1),
(274, 'TILE PLUS 10 Lit [Terracotta]', 1),
(275, 'TILE PLUS 10 Lit [TILE RED]', 1),
(276, 'TILE PLUS 1 Lit [Brick Red]', 18),
(277, 'TILE PLUS 1 Lit [ JOLLY HOLLY )', 12),
(278, 'TILE PLUS 1 Lit [SUNRISE)', 18),
(279, 'TILE PLUS 1 Lit [Terracotta]', 18),
(280, 'TILE PLUS 1 Lit [Tile Red]', 18),
(281, 'TILE PLUS 20 Lit [BRICK RED]', 1),
(282, 'TILE PLUS 20 Lit [Ollve Green]', 1),
(283, 'TILE PLUS 20 Lit [ Terracotta]', 1),
(284, 'TILE PLUS 20 Lit [Tile Red]', 1),
(285, 'TILE PLUS 4 Lit [ Brick Red]', 4),
(286, 'TILE PLUS 4 Lit [Terracotta]', 4),
(287, 'TILE PLUS 4 Lit [TILE RED]', 4),
(288, 'TOPBOND-(13KG+5Ltr)', 4),
(289, 'TOTAL BOND 1000 Gms', 16),
(290, 'TOTAL BOND 125 Gms', 100),
(291, 'TOTAL BOND  250 Gms', 50),
(292, 'TOTAL BOND  500 Gms', 32),
(293, 'VECO CEMENT PRIMER EXTERIOR 10 LIT', 1),
(294, 'VECO CEMENT PRIMER EXTERIOR 1 LIT', 12),
(295, 'VECO CEMENT PRIMER EXTERIOR  4 LI T', 4),
(296, 'VECO CEMENT PRIMER EXTERIORE 20 LIT', 1),
(297, 'VECO EXTERIOR SPL PRIMER 10 LTR', 1),
(298, 'VECO EXTERIOR SPL PRIMER 20 LTR', 1),
(299, 'VECO EXTERIOR SPL PRIMER 50 LTR', 1),
(300, 'VECO INTERIOR EMULSIOMN 10 LTR (LEMON SOUFFLE)', 1),
(301, 'VECO INTERIOR EMULSION 10 Ltr (BASE )', 1),
(302, 'VECO INTERIOR EMULSION 10 LTR (JOLLY HOLLY', 1),
(303, 'VECO INTERIOR EMULSION 10 LTR ( WHITE)', 1),
(304, 'VECO INTERIOR EMULSION1L LTR (JOLLY HOLLY', 12),
(305, 'VECO INTERIOR EMULSION 1 Ltr ( BASE )', 12),
(306, 'VECO INTERIOR EMULSION 1 LTR (SUN RISE)', 12),
(307, 'VECO INTERIOR EMULSION  1 LTR (WHITE)', 12),
(308, 'VECO INTERIOR EMULSION 20 Ltr (BASE )', 1),
(309, 'VECO INTERIOR EMULSION  20 LTR (JOLLY HOLLY', 1),
(310, 'Veco Interior Emulsion 20 Ltr (Lemon Souffle)', 1),
(311, 'VECO INTERIOR EMULSION 20 LTR (WHITE)', 1),
(312, 'VECO INTERIOR EMULSION 4 Ltr(BASE)', 4),
(313, 'VECO INTERIOR EMULSION 4 LTR (JOLLY HOLLY)', 4),
(314, 'VECO INTERIOR EMULSION 4 LTR (SUN RISE)', 4),
(315, 'VECO INTERIOR EMULSION 4 LTR (WHITE)', 4),
(316, 'VECO INTERIOR EMULSION SUNRISE 10 LIT', 1),
(317, 'VECO INTERIOR EMULSION SUNRISE 20 LIT', 1),
(318, 'VECO LATEX 1 Kg', 12),
(319, 'VECO LATEX 20 Kgs', 1),
(320, 'VECO LATEX 250 Gms', 50),
(321, 'VECO LATEX 500 Gms', 24),
(322, 'VECO LATEX 5 Kgs', 4),
(323, 'VECO PRIMER 10 Lit Can', 1),
(324, 'VECO PRIMER 1 Lit Can', 12),
(325, 'VECO PRIMER 20 Lit Can', 1),
(326, 'VECO PRIMER 4 Lit Can', 4),
(327, 'VECO PRIMER - 50 LIT', 1),
(328, 'V Flex G2K 10Kg', 1),
(329, 'V FLEX G2K 1 KG', 12),
(330, 'V Flex G2K 20Kg', 1),
(331, 'V  FLEX G2K  5KG', 4),
(332, 'VIJAY BASE COAT PRIMER 1 LTR', 12),
(333, 'VIJAY BASE COAT PRIMER 20LITS', 1),
(334, 'VIJAY BASE COAT PRIMER - 5 LIT', 4),
(335, 'VIJAY TOP COAT GLOSS PAINT 1LIT', 12),
(336, 'VIJAY TOP COAT GLOSS PAINT 20LIT', 1),
(337, 'VIJAY WHITE EXTERIOR TILE PRIMER 10LIT', 1),
(338, 'VIJAY WHITE INTERIOR TILE PRIMER 20 LIT', 1),
(339, 'VIJAY WHITE INTERIOR TILE PRIMER 4 LIT', 4),
(340, 'VIJAY WHITE WALL CAREPUTTY 1Kg', 30),
(341, 'VIJAY WHITE  WALL CARE PUTTY 40 Kg', 1),
(342, 'V-SEAL 1 Lit.', 16),
(343, 'V-SEAL 20 Lit.', 1),
(344, 'V-SEAL 5 Lit.', 4),
(345, 'WATER SEAL (IW PLUS) 1 LTR', 12),
(346, 'WATER SEAL (IW PLUS) 200 LIT', 1),
(347, 'WATER SEAL (IW PLUS) - 200 ML', 50),
(348, 'WATER SEAL (IW PLUS) 20 LTR', 1),
(349, 'WATER SEAL (IW PLUS) - 500 ML', 24),
(350, 'WATERSEAL (IW PLUS) 50 LIT', 1),
(351, 'WATER SEAL (IW PLUS) 5 LTR', 4),
(352, 'WATER SEAL  Liquid 100 Ml Can', 60),
(353, 'WATER SEAL  Liquid 1 Lit.', 12),
(354, 'WATER SEAL  Liquid  20 Lit Can', 1),
(355, 'WATER SEAL Liquid 2.5 Ltr', 6),
(356, 'WATER SEAL Liquid 500 Ml Can', 24),
(357, 'WATER SEAL  Liquid 5 Lit', 4),
(358, 'WATER SEAL  Powder 1 Kg Pkt', 30),
(359, 'WATER SEAL   Powder 1 Kg  Pouch', 40),
(360, 'WET SEAL 1 Lit', 16),
(361, 'WET SEAL 20 Lit', 1),
(362, 'WET SEAL 3 Lit', 6),
(363, 'WET SEAL 500 Ml', 24),
(364, 'WET SEAL 5 Lit', 4),
(365, 'WOOD PRO 1 Lit', 12),
(366, 'WOOD PRO 250 Ml', 20),
(367, 'WOOD PRO 3 Ltr', 4),
(368, 'WOOD PRO 500 Ml', 24),
(369, 'WOOD PRO 5 Lit', 4),
(370, 'CALCINED GYPSUM 1 Kg', 30),
(371, 'CALCINED GYPSUM 40 Kg A Grade', 1),
(372, 'CALCINED GYPSUM PLASTER  50 Kg A Grade', 1),
(373, 'PACCA CRACK PASTE 4.5 KG', 4),
(374, 'PACCA CRACK PASTE 900GM', 12);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `Category_name` varchar(255) DEFAULT NULL,
  `Category_code` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `Category_name`, `Category_code`) VALUES
(1, 'GROUTS & ADHESIVES', 'GA'),
(2, 'ADMIXTURES', 'AD'),
(3, 'SPECIALITY PRODUCTS', 'SP'),
(4, 'REPAIRS PRODUCTS', 'RP'),
(5, 'COATINGS', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `Color_name` varchar(255) DEFAULT NULL,
  `Color_code` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `Color_name`, `Color_code`) VALUES
(1, 'BLUE', 'BL'),
(2, 'NO COLOUR', '00'),
(3, 'PINK', 'PK'),
(4, 'PISTHA', 'PA'),
(5, 'TERRACOTTA', 'TA'),
(6, 'YELLOW', 'YW'),
(7, 'BLACK', 'BK'),
(8, 'BRICK RED', 'BR'),
(9, 'BROWN', 'BN'),
(10, 'GRAY', 'GY'),
(11, 'GREEN', 'GN'),
(12, 'IVORY', 'IY'),
(13, 'WHITE', 'WT'),
(15, 'SKY BLUE', 'SB'),
(16, 'CLEAR', 'CL'),
(17, 'HANUMAN RED', 'HR'),
(18, 'SIGNAL RED', 'SR'),
(19, 'TILE RED', 'TR'),
(20, 'LEMON SOUFFLE', 'LS'),
(21, 'SUNRISE', 'SS'),
(22, 'BASE', 'BS'),
(23, 'JOLLY HOLLY', 'JH'),
(24, 'SKY BLUE', 'SB'),
(25, 'WATER BLUE', 'WB');

-- --------------------------------------------------------

--
-- Table structure for table `gatepass`
--

CREATE TABLE `gatepass` (
  `S_no` int(11) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Vehicle_no` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Box` int(11) NOT NULL,
  `Bag` int(11) NOT NULL,
  `Container` int(11) NOT NULL,
  `Barrel` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `particulars` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `gatepass` int(11) NOT NULL DEFAULT 0,
  `pflag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `particulars`, `status`, `gatepass`, `pflag`) VALUES
(1, '3720/SO/23-24', 'VELLOR -  M/S. L.G.P.M PRAKASH PAINTS', 1, 0, 1),
(2, '3721/SO/23-24', 'VELLOR -  M/S. L.G.P.M PRAKASH PAINTS', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_totals`
--

CREATE TABLE `order_totals` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `total_box` int(11) NOT NULL,
  `total_barrel` int(11) NOT NULL,
  `total_container` int(11) NOT NULL,
  `total_bag` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_totals`
--

INSERT INTO `order_totals` (`id`, `order_id`, `total_box`, `total_barrel`, `total_container`, `total_bag`, `created_at`) VALUES
(1, '3720/SO/23-24', 3, 0, 0, 0, '0000-00-00 00:00:00'),
(2, '3721/SO/23-24', 2, 0, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `packaging`
--

CREATE TABLE `packaging` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `pcs` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `date_inserted` timestamp NOT NULL DEFAULT current_timestamp(),
  `qr_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packaging`
--

INSERT INTO `packaging` (`id`, `product_name`, `quantity`, `pcs`, `remaining`, `date_inserted`, `qr_status`) VALUES
(1, 'EASY PAINT-X 1 LTR', 1, 18, 0, '2025-04-29 06:28:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `id` int(11) NOT NULL,
  `Product` varchar(255) NOT NULL,
  `Demand` int(11) NOT NULL,
  `MSQ` int(11) NOT NULL,
  `Available` int(11) NOT NULL,
  `Pending` int(11) NOT NULL,
  `inserted_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pp_in`
--

CREATE TABLE `pp_in` (
  `in_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `qcode` varchar(255) DEFAULT NULL,
  `flag` int(11) NOT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pp_in`
--

INSERT INTO `pp_in` (`in_id`, `uid`, `qcode`, `flag`, `timestamp`) VALUES
(1, 1, 'PPSPEPX0000001LL001.000R002025/04/2900001', 0, '2025-04-29 06:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `pp_out`
--

CREATE TABLE `pp_out` (
  `out_id` int(11) NOT NULL,
  `in_id` int(11) NOT NULL,
  `qcode` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) NOT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `id` int(11) NOT NULL,
  `parent_product` varchar(255) NOT NULL,
  `total_weight` decimal(10,2) NOT NULL,
  `batch` int(11) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `BatchWeight` int(11) NOT NULL,
  `wastage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`id`, `parent_product`, `total_weight`, `batch`, `date_added`, `status`, `BatchWeight`, `wastage`) VALUES
(1, 'EASY PAINT-X', 18.00, 1, '2025-04-29 11:58:17', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `Brand_name` varchar(2) NOT NULL DEFAULT 'PP',
  `Category` varchar(2) DEFAULT NULL,
  `Product` varchar(255) DEFAULT NULL,
  `Color` varchar(2) DEFAULT NULL,
  `Version` int(2) DEFAULT NULL,
  `Unit_Measurement` varchar(1) DEFAULT NULL,
  `Weight_Measurement` varchar(2) DEFAULT NULL,
  `Weight_Dimention` varchar(7) DEFAULT NULL,
  `Packing_Measurement` varchar(1) DEFAULT NULL,
  `Future_Version` varchar(2) DEFAULT NULL,
  `pro_code` varchar(50) DEFAULT NULL,
  `Parent_Product` varchar(50) DEFAULT NULL,
  `pass_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Brand_name`, `Category`, `Product`, `Color`, `Version`, `Unit_Measurement`, `Weight_Measurement`, `Weight_Dimention`, `Packing_Measurement`, `Future_Version`, `pro_code`, `Parent_Product`, `pass_category`) VALUES
(1, 'PP', 'CS', 'Cool Seal ( Fibre Reinfirced Coating) 1 Ltr', 'WT', 1, 'L', 'L', '1', 'R', '0', 'PPCSCSL00WT001LL001.000R00', 'COOL SEAL WHITE', 'BO'),
(2, 'PP', 'CS', 'Cool Seal ( Fibre Reinfirced Coating) 4 Ltr', 'WT', 1, 'L', 'L', '4', 'R', '0', 'PPCSCSL00WT001LL004.000R00', 'COOL SEAL WHITE', 'BO'),
(3, 'PP', 'CS', 'Cool Seal (Fibre Reinforced Coating) 10 Ltr', 'WT', 1, 'L', 'L', '10', 'R', '0', 'PPCSCSL00WT001LL010.000R00', 'COOL SEAL WHITE', 'CO'),
(4, 'PP', 'CS', 'Cool Seal ( Fibre Reinforced Coating) 20 Ltr', 'WT', 1, 'L', 'L', '20', 'R', '0', 'PPCSCSL00WT001LL020.000R00', 'COOL SEAL WHITE', 'CO'),
(5, 'PP', 'CS', 'COOL SEAL ( SOOTHING SAPPHIRE ) - 10 LTR', 'SS', 1, 'L', 'L', '10', 'R', '0', 'PPCSCSL00SS001LL010.000R00', 'COOL SEAL SUNRISE', 'CO'),
(6, 'PP', 'CS', 'COOL SEAL ( TERRACOTTA ) - 10 LTR', 'TA', 1, 'L', 'L', '10', 'R', '0', 'PPCSCSL00TA001LL010.000R00', 'COOL SEAL TERRACOTTA', 'CO'),
(7, 'PP', 'CS', 'COOL SEAL ( TERRACOTTA ) - 1 LTR', 'TA', 1, 'L', 'L', '1', 'R', '0', 'PPCSCSL00TA001LL001.000R00', 'COOL SEAL TERRACOTTA', 'BO'),
(8, 'PP', 'CS', 'COOL SEAL ( TERRACOTTA ) - 20 LTR', 'TA', 1, 'L', 'L', '20', 'R', '0', 'PPCSCSL00TA001LL020.000R00', 'COOL SEAL TERRACOTTA', 'CO'),
(9, 'PP', 'SP', 'EASY PAINT-X 1 LTR', '0', 1, 'L', 'L', '1', 'R', '0', 'PPSPEPX0000001LL001.000R00', 'EASY PAINT-X', 'BO'),
(10, 'PP', 'SP', 'EASY PAINT X 250 Ml', '0', 1, 'L', 'L', '0.25', 'R', '0', 'PPSPEPX0000001LL000.250R00', 'EASY PAINT-X', 'BO'),
(11, 'PP', 'SP', 'EASY PAINT-X  3 LTR', '0', 1, 'L', 'L', '3', 'R', '0', 'PPSPEPX0000001LL003.000R00', 'EASY PAINT-X', 'BO'),
(12, 'PP', 'SP', 'EASY PAINT -X 500 ML', '0', 1, 'L', 'L', '0.5', 'R', '0', 'PPSPEPX0000001LL000.500R00', 'EASY PAINT-X', 'BO'),
(13, 'PP', 'AD', 'FLOW FAAST 100 Lit Can', '0', 1, 'L', 'L', '100', 'R', '0', 'PPADFFT0000001LL100.000R00', 'FLOW FAAST', 'CO'),
(14, 'PP', 'AD', 'FLOW FAAST 1 Lit Can', '0', 1, 'L', 'L', '1', 'R', '0', 'PPADFFT0000001LL001.000R00', 'FLOW FAAST', 'BO'),
(15, 'PP', 'AD', 'FLOW FAAST 200 LIT CAN', '0', 1, 'L', 'L', '200', 'R', '0', 'PPADFFT0000001LL200.000R00', 'FLOW FAAST', 'CO'),
(16, 'PP', 'AD', 'FLOW FAAST 20 Lit Can', '0', 1, 'L', 'L', '20', 'R', '0', 'PPADFFT0000001LL020.000R00', 'FLOW FAAST', 'CO'),
(17, 'PP', 'AD', 'FLOW FAAST 500 Ml', '0', 1, 'L', 'L', '0.5', 'R', '0', 'PPADFFT0000001LL000.500R00', 'FLOW FAAST', 'BO'),
(18, 'PP', 'AD', 'FLOW FAAST - 50 LIT', '0', 1, 'L', 'L', '50', 'R', '0', 'PPADFFT0000001LL050.000R00', 'FLOW FAAST', 'BO'),
(19, 'PP', 'AD', 'FLOW FAAST 5 Lit. Can', '0', 1, 'L', 'L', '5', 'R', '0', 'PPADFFT0000001LL005.000R00', 'FLOW FAAST', 'BO'),
(20, 'PP', 'CS', 'GOSANA 10 Lit', '0', 1, 'L', 'L', '10', 'R', '0', 'PPCSGSA0000001LL010.000R00', 'GOSANA', 'CO'),
(21, 'PP', 'CS', 'GOSANA 1 Lit', '0', 1, 'L', 'L', '1', 'R', '0', 'PPCSGSA0000001LL001.000R00', 'GOSANA', 'BO'),
(22, 'PP', 'CS', 'GOSANA 20 Lit', '0', 1, 'L', 'L', '20', 'R', '0', 'PPCSGSA0000001LL020.000R00', 'GOSANA', 'CO'),
(23, 'PP', 'CS', 'GOSANA 4 Lit', '0', 1, 'L', 'L', '4', 'R', '0', 'PPCSGSA0000001LL004.000R00', 'GOSANA', 'BO'),
(24, 'RK', 'SB', 'MASTERBOND SBR LATEX – 1 LTR', 'X0', 1, 'L', 'L', '1', 'R', '0', 'RKSBRLATEX0001LL001.000R00', 'SBR LATEX', 'BO'),
(25, 'RK', 'SB', 'MASTERBOND SBR LATEX – 20 LTR', 'X0', 1, 'L', 'L', '20', 'R', '0', 'RKSBRLATEX0001LL020.000R00', 'SBR LATEX', 'CO'),
(26, 'RK', 'SB', 'MASTERBOND SBR LATEX – 5 LTR', 'X0', 1, 'L', 'L', '5', 'R', '0', 'RKSBRLATEX0001LL005.000R00', 'SBR LATEX', 'BO'),
(27, 'PP', 'CS', 'M - COOL 10 LIT', '0', 1, 'L', 'L', '10', 'R', '0', 'PPCSMCL0000001LL010.000R00', 'M-COOL', 'CO'),
(28, 'PP', 'CS', 'M - COOL 1 LIT', '0', 1, 'L', 'L', '1', 'R', '0', 'PPCSMCL0000001LL001.000R00', 'M-COOL', 'BO'),
(29, 'PP', 'CS', 'M - COOL 20 LIT', '0', 1, 'L', 'L', '20', 'R', '0', 'PPCSMCL0000001LL020.000R00', 'M-COOL', 'CO'),
(30, 'PP', 'CS', 'M - COOL 4 LIT', '0', 1, 'L', 'L', '4', 'R', '0', 'PPCSMCL0000001LL004.000R00', 'M-COOL', 'BO'),
(31, 'PP', 'SP', 'METAL PRO 1 Lit.', '0', 1, 'L', 'L', '1', 'R', '0', 'PPSPMTP0000001LL001.000R00', 'METAL PRO', 'BO'),
(32, 'PP', 'SP', 'METAL PRO 20 Lit', '0', 1, 'L', 'L', '20', 'R', '0', 'PPSPMTP0000001LL020.000R00', 'METAL PRO', 'CO'),
(33, 'PP', 'SP', 'METAL PRO 250 Ml', '0', 1, 'L', 'L', '0.25', 'R', '0', 'PPSPMTP0000001LL000.250R00', 'METAL PRO', 'BO'),
(34, 'PP', 'SP', 'METAL PRO 500 Ml', '0', 1, 'L', 'L', '0.5', 'R', '0', 'PPSPMTP0000001LL000.500R00', 'METAL PRO', 'BO'),
(35, 'PP', 'SP', 'METAL PRO 5 Lit.', '0', 1, 'L', 'L', '5', 'R', '0', 'PPSPMTP0000001LL005.000R00', 'METAL PRO', 'BO'),
(36, 'PP', 'AD', 'M-SAND BOOSTER 200 LIT', '0', 1, 'L', 'L', '200', 'R', '0', 'PPADMSB0000001LL200.000R00', 'M-SAND BOOZTER', 'CO'),
(37, 'PP', 'AD', 'M - Sand BOOZTER 1LIT', '0', 1, 'L', 'L', '1', 'R', '0', 'PPADMSB0000001LL001.000R00', 'M-SAND BOOZTER', 'BO'),
(38, 'PP', 'AD', 'M-Sand BOOZTER - 200 Ml', '0', 1, 'L', 'L', '0.2', 'R', '0', 'PPADMSB0000001LL000.200R00', 'M-SAND BOOZTER', 'CO'),
(39, 'PP', 'AD', 'M - Sand BOOZTER 20LIT', '0', 1, 'L', 'L', '20', 'R', '0', 'PPADMSB0000001LL020.000R00', 'M-SAND BOOZTER', 'CO'),
(40, 'PP', 'AD', 'M- Sand BOOZTER 50LIT', '0', 1, 'L', 'L', '50', 'R', '0', 'PPADMSB0000001LL050.000R00', 'M-SAND BOOZTER', 'CO'),
(41, 'PP', 'AD', 'M - Sand BOOZTER 5LIT', '0', 1, 'L', 'L', '5', 'R', '0', 'PPADMSB0000001LL005.000R00', 'M-SAND BOOZTER', 'BO'),
(42, 'PP', 'SP', 'NO - TERMITE 100 ML', '0', 1, 'L', 'L', '0.1', 'R', '0', 'PPSPNTT0000001LL000.100R00', 'NO-TERMITE', 'CO'),
(43, 'PP', 'SP', 'NO-TERMITE 1 LIT TIN', '0', 1, 'L', 'L', '1', 'R', '0', 'PPSPNTT0000001LL001.000R00', 'NO-TERMITE', 'BO'),
(44, 'PP', 'SP', 'NO - TERMITE 200 LIT', '0', 1, 'L', 'L', '200', 'R', '0', 'PPSPNTT0000001LL200.000R00', 'NO-TERMITE', 'CO'),
(45, 'PP', 'SP', 'NO - TERMITE 20 LIT', '0', 1, 'L', 'L', '20', 'R', '0', 'PPSPNTT0000001LL020.000R00', 'NO-TERMITE', 'CO'),
(46, 'PP', 'SP', 'NO - TERMITE 3 LIT TIN', '0', 1, 'L', 'L', '3', 'R', '0', 'PPSPNTT0000001LL003.000R00', 'NO-TERMITE', 'BO'),
(47, 'PP', 'SP', 'NO - TERMITE 500 ML TIN', '0', 1, 'L', 'L', '0.5', 'R', '0', 'PPSPNTT0000001LL000.500R00', 'NO-TERMITE', 'BO'),
(48, 'PP', 'SP', 'NO - TERMITE 5 LIT', '0', 1, 'L', 'L', '5', 'R', '0', 'PPSPNTT0000001LL005.000R00', 'NO-TERMITE', 'BO'),
(49, 'PP', 'SP', 'NO to RUST 1 LTR Can', '0', 1, 'L', 'L', '1', 'R', '0', 'PPSPNR00000001LL001.000R00', 'NO to RUST', 'BO'),
(50, 'PP', 'SP', 'NO to RUST 20 LIT Can', '0', 1, 'L', 'L', '20', 'R', '0', 'PPSPNR00000001LL020.000R00', 'NO to RUST', 'CO'),
(51, 'PP', 'SP', 'NO to RUST 250 MLCan', '0', 1, 'L', 'L', '0.25', 'R', '0', 'PPSPNR00000001LL000.250R00', 'NO to RUST', 'BO'),
(52, 'PP', 'SP', 'NO to RUST 500 ML Can', '0', 1, 'L', 'L', '0.5', 'R', '0', 'PPSPNR00000001LL000.500R00', 'NO to RUST', 'BO'),
(53, 'PP', 'SP', 'NO to RUST 50 LIT Can', '0', 1, 'L', 'L', '50', 'R', '0', 'PPSPNR00000001LL050.000R00', 'NO to RUST', 'CO'),
(54, 'PP', 'SP', 'NO to RUST 5 Ltr Can', '0', 1, 'L', 'L', '5', 'R', '0', 'PPSPNR00000001LL005.000R00', 'NO to RUST', 'BO'),
(55, 'PP', 'CS', 'OYT [Sky Blue] 10 Ltr', 'SB', 1, 'L', 'L', '10', 'R', '0', 'PPCSOYT00SB001LL010.000R00', 'OYT BLUE', 'CO'),
(56, 'PP', 'CS', 'OYT [Sky Blue ] 1 Lit', 'SB', 1, 'L', 'L', '1', 'R', '0', 'PPCSOYT00SB001LL001.000R00', 'OYT BLUE', 'BO'),
(57, 'PP', 'CS', 'OYT [Sky Blue] 20 Ltr', 'SB', 1, 'L', 'L', '20', 'R', '0', 'PPCSOYT00SB001LL020.000R00', 'OYT BLUE', 'CO'),
(58, 'PP', 'CS', 'OYT [Sky Blue] 4 Ltr', 'SB', 1, 'L', 'L', '4', 'R', '0', 'PPCSOYT00SB001LL004.000R00', 'OYT BLUE', 'BO'),
(59, 'PP', 'CS', 'OYT [White] 10 Ltr', 'WT', 1, 'L', 'L', '10', 'R', '0', 'PPCSOYT00WT001LL010.000R00', 'OYT WHITE', 'CO'),
(60, 'PP', 'CS', 'OYT [White] 1 Ltr', 'WT', 1, 'L', 'L', '1', 'R', '0', 'PPCSOYT00WT001LL001.000R00', 'OYT WHITE', 'BO'),
(61, 'PP', 'CS', 'OYT [White] 20 Ltr', 'WT', 1, 'L', 'L', '20', 'R', '0', 'PPCSOYT00WT001LL020.000R00', 'OYT WHITE', 'CO'),
(62, 'PP', 'CS', 'OYT [White] 4 Ltr', 'WT', 1, 'L', 'L', '4', 'R', '0', 'PPCSOYT00WT001LL004.000R00', 'OYT WHITE', 'BO'),
(63, 'PP', 'CS', 'PACCA BLACK BOARD PAINT 1 LTR', 'WT', 1, 'L', 'L', '1', 'R', '0', 'PPCSBBP00WT001LL001.000R00', 'BLACK BOARD PAINT', 'BO'),
(64, 'PP', 'CS', 'PACCA BLACK BOARD PAINT 4 LTR', 'WT', 1, 'L', 'L', '4', 'R', '0', 'PPCSBBP00WT001LL004.000R00', 'BLACK BOARD PAINT', 'BO'),
(65, 'PP', 'CS', 'PACCA CEILING SHINE - SUPER CEILING WHITE EMULSION - 10 LTR', '0', 1, 'L', 'L', '10', 'R', '0', 'PPCSSCEWT00001LL010.000R00', 'CEILING SHINE', 'CO'),
(66, 'PP', 'CS', 'PACCA CEILING SHINE - SUPER CEILING WHITE EMULSION - 1 LTR', '0', 1, 'L', 'L', '1', 'R', '0', 'PPCSSCEWT00001LL001.000R00', 'CEILING SHINE', 'BO'),
(67, 'PP', 'CS', 'PACCA CEILING SHINE - SUPER CEILING WHITE EMULSION - 20 LTR', '0', 1, 'L', 'L', '20', 'R', '0', 'PPCSSCEWT00001LL020.000R00', 'CEILING SHINE', 'CO'),
(68, 'PP', 'CS', 'PACCA CEILING SHINE - SUPER CEILING WHITE EMULSION - 4 LTR', '0', 1, 'L', 'L', '4', 'R', '0', 'PPCSSCEWT00001LL004.000R00', 'CEILING SHINE', 'BO'),
(69, 'PP', 'CS', 'PACCA ECO PRIMER - 10 LTR', 'WT', 1, 'L', 'L', '10', 'R', '0', 'PPCSECO00WT001LL010.000R00', 'ECO PRIMER', 'CO'),
(70, 'PP', 'CS', 'PACCA ECO PRIMER - 20 LTR', 'WT', 1, 'L', 'L', '20', 'R', '0', 'PPCSECO00WT001LL020.000R00', 'ECO PRIMER', 'CO'),
(71, 'PP', 'CS', 'PACCA ENAMEL THINNER - 1 LTR', '0', 1, 'L', 'L', '1', 'R', '0', 'PPCSETHIN00001LL001.000R00', 'ENAMAL THINNER', 'BO'),
(72, 'PP', 'CS', 'PACCA ENAMEL THINNER - 20 LTR', '0', 1, 'L', 'L', '20', 'R', '0', 'PPCSETHIN00001LL020.000R00', 'ENAMAL THINNER', 'CO'),
(73, 'PP', 'CS', 'PACCA ENAMEL THINNER - 5 LTR', '0', 1, 'L', 'L', '5', 'R', '0', 'PPCSETHIN00001LL005.000R00', 'ENAMAL THINNER', 'BO'),
(74, 'PP', 'CS', 'PACCA FLEXI BLOC ( Two part flexible  PS sealant) - 4 kg', '0', 1, 'L', 'L', '4', 'R', '0', 'PPCSFXBLO00001LL004.000R00', 'FLEXI BLOC', 'BO'),
(75, 'PP', 'CS', 'PACCA FLOOR ( Floor coat emulsion ) F.Green - 10 Ltr', 'GR', 1, 'L', 'L', '10', 'R', '0', 'PPCSFCE00GRE01LL010.000R00', 'FLOOR COAT', 'CO'),
(76, 'PP', 'CS', 'PACCA FLOOR ( Floor coat emulsion ) F.Green - 1 Ltr', 'GR', 1, 'L', 'L', '1', 'R', '0', 'PPCSFCE00GRE01LL001.000R00', 'FLOOR COAT', 'BO'),
(77, 'PP', 'CS', 'PACCA FLOOR ( Floor coat emulsion ) F.Green - 20 Ltr', 'GR', 1, 'L', 'L', '20', 'R', '0', 'PPCSFCE00GRE01LL020.000R00', 'FLOOR COAT', 'CO'),
(78, 'PP', 'CS', 'PACCA FLOOR ( Floor coat emulsion ) F.Green - 4 Ltr', 'GR', 1, 'L', 'L', '4', 'R', '0', 'PPCSFCE00GRE01LL004.000R00', 'FLOOR COAT', 'BO'),
(79, 'PP', 'CS', 'PACCA FLOOR ( Floor coat emulsion ) F.Grey - 1 Ltr', 'GR', 1, 'L', 'L', '1', 'R', '0', 'PPCSFCE00GRY01LL001.000R00', 'FLOOR COAT', 'BO'),
(80, 'PP', 'CS', 'PACCA FLOOR ( Floor coat emulsion ) F.Red - 1 Ltr', 'RE', 1, 'L', 'L', '1', 'R', '0', 'PPCSFCE00RED01LL001.000R00', 'FLOOR COAT', 'BO'),
(81, 'PP', 'CS', 'PACCA FLOOR ( Floor coat emulsion ) F.Yellow - 10 Ltr', 'YE', 1, 'L', 'L', '10', 'R', '0', 'PPCSFCE00YEL01LL010.000R00', 'FLOOR COAT', 'CO'),
(82, 'PP', 'CS', 'PACCA FLOOR ( Floor coat emulsion ) F.Yellow - 1 Ltr', 'YE', 1, 'L', 'L', '1', 'R', '0', 'PPCSFCE00YEL01LL001.000R00', 'FLOOR COAT', 'BO'),
(83, 'PP', 'CS', 'PACCA FLOOR ( Floor coat emulsion ) F.Yellow - 20 Ltr', 'YE', 1, 'L', 'L', '20', 'R', '0', 'PPCSFCE00YEL01LL020.000R00', 'FLOOR COAT', 'CO'),
(84, 'PP', 'CS', 'PACCA FLOOR ( Floor coat emulsion ) F.Yellow - 4 Ltr', 'YE', 1, 'L', 'L', '4', 'R', '0', 'PPCSFCE00YEL01LL004.000R00', 'FLOOR COAT', 'BO'),
(85, 'PP', 'CS', 'PACCA INSTA SHIELD THINNER - 5LIT', '0', 1, 'L', 'L', '5', 'R', '0', 'PPCSINST000001LL005.000R00', 'INSTA SHIELD', 'BO'),
(86, 'PP', 'CS', 'PACCA MAX eX EMULSION PAINT EXTERIOR BONE WHITE 10 LTR', 'BW', 1, 'L', 'L', '10', 'R', '0', 'PPCSeXEE0BW001LL010.000R00', 'eX EMULSION', 'CO'),
(87, 'PP', 'CS', 'PACCA MAX eX EMULSION PAINT EXTERIOR BONE WHITE 1 LTR', 'BW', 1, 'L', 'L', '1', 'R', '0', 'PPCSeXEE0BW001LL001.000R00', 'eX EMULSION', 'BO'),
(88, 'PP', 'CS', 'PACCA MAX eX EMULSION PAINT EXTERIOR BONE WHITE 20 LTR', 'BW', 1, 'L', 'L', '20', 'R', '0', 'PPCSeXEE0BW001LL020.000R00', 'eX EMULSION', 'CO'),
(89, 'PP', 'CS', 'PACCA MAX eX EMULSION PAINT EXTERIOR BONE WHITE 4 LTR', 'BW', 4, 'L', 'L', '10', 'R', '0', 'PPCSeXEE0BW004LL010.000R00', 'eX EMULSION', 'BO'),
(90, 'PP', 'CS', 'PACCA MAX eX EMULSION PAINT EXTERIOR  WHITE 10 LTR', 'WT', 1, 'L', 'L', '10', 'R', '0', 'PPCSeXEE0WT001LL010.000R00', 'eX EMULSION', 'CO'),
(91, 'PP', 'CS', 'PACCA MAX eX EMULSION PAINT EXTERIOR  WHITE 1 LTR', 'WT', 1, 'L', 'L', '1', 'R', '0', 'PPCSeXEE0WT001LL001.000R00', 'eX EMULSION', 'BO'),
(92, 'PP', 'CS', 'PACCA MAX eX EMULSION PAINT EXTERIOR  WHITE 20 LTR', 'WT', 1, 'L', 'L', '20', 'R', '0', 'PPCSeXEE0WT001LL020.000R00', 'eX EMULSION', 'CO'),
(93, 'PP', 'CS', 'PACCA MAX eX EMULSION PAINT EXTERIOR  WHITE 4 LTR', 'WT', 1, 'L', 'L', '4', 'R', '0', 'PPCSeXEE0WT001LL004.000R00', 'eX EMULSION', 'BO'),
(94, 'PP', 'CS', 'PACCA MAX EX EXTERIOR EMULSION ( MB ) 20 LTR', 'MB', 1, 'L', 'L', '20', 'R', '0', 'PPCSeXEE0MB001LL020.000R00', 'eX EMULSION', 'CO'),
(95, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( DB ) 10 LTR', 'DB', 1, 'L', 'L', '10', 'R', '0', 'PPCSeXEE0DB001LL010.000R00', 'EXT EMULSION', 'CO'),
(96, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( DB ) 20 LTR', 'DB', 1, 'L', 'L', '20', 'R', '0', 'PPCSeXEE0DB001LL020.000R00', 'EXT EMULSION', 'CO'),
(97, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( DB ) - 4 LTR', 'DB', 1, 'L', 'L', '4', 'R', '0', 'PPCSeXEE0DB001LL004.000R00', 'EXT EMULSION', 'BO'),
(98, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( LB ) 10 LTR', 'LB', 1, 'L', 'L', '10', 'R', '0', 'PPCSACEE0LB001LL010.000R00', 'EXT EMULSION', 'CO'),
(99, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( LB ) 1 LTR', 'LB', 1, 'L', 'L', '1', 'R', '0', 'PPCSACEE0LB001LL001.000R00', 'EXT EMULSION', 'BO'),
(100, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( LB ) 20 LTR', 'LB', 1, 'L', 'L', '20', 'R', '0', 'PPCSACEE0LB001LL020.000R00', 'EXT EMULSION', 'CO'),
(101, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( LB ) 4 LTR', 'LB', 1, 'L', 'L', '4', 'R', '0', 'PPCSACEE0LB001LL004.000R00', 'EXT EMULSION', 'BO'),
(102, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( MB ) 10 LTR', 'MB', 1, 'L', 'L', '10', 'R', '0', 'PPCSACEE0MB001LL010.000R00', 'EXT EMULSION', 'CO'),
(103, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( MB ) 1 LTR', 'MB', 1, 'L', 'L', '1', 'R', '0', 'PPCSACEE0MB001LL001.000R00', 'EXT EMULSION', 'BO'),
(104, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( MB ) 20 LTR', 'MB', 1, 'L', 'L', '20', 'R', '0', 'PPCSACEE0MB001LL020.000R00', 'EXT EMULSION', 'CO'),
(105, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( MB ) 4 LTR', 'MB', 1, 'L', 'L', '4', 'R', '0', 'PPCSACEE0MB001LL004.000R00', 'EXT EMULSION', 'BO'),
(106, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( TERRACOTTA ) 1 LTR', 'TA', 1, 'L', 'L', '1', 'R', '0', 'PPCSACEE0TA001LL001.000R00', 'EXT EMULSION', 'BO'),
(107, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( WHITE ) 10 LTR', 'WT', 1, 'L', 'L', '10', 'R', '0', 'PPCSACEE0WT001LL010.000R00', 'EXT EMULSION', 'CO'),
(108, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( WHITE ) 1 LTR', 'WT', 1, 'L', 'L', '1', 'R', '0', 'PPCSACEE0WT001LL001.000R00', 'EXT EMULSION', 'BO'),
(109, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( WHITE ) 20 LTR', 'WT', 1, 'L', 'L', '20', 'R', '0', 'PPCSACEE0WT001LL020.000R00', 'EXT EMULSION', 'CO'),
(110, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( WHITE ) 4 LTR', 'WT', 1, 'L', 'L', '4', 'R', '0', 'PPCSACEE0WT001LL004.000R00', 'EXT EMULSION', 'BO'),
(111, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( WHITE ) 50 LTR', 'WT', 1, 'L', 'L', '50', 'R', '0', 'PPCSACEE0WT001LL050.000R00', 'EXT EMULSION', 'CO'),
(112, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( Wild Yellow - 7865 ) 10 LTR', 'WY', 1, 'L', 'L', '10', 'R', '0', 'PPCSACEE0WY001LL010.000R00', 'EXT EMULSION', 'CO'),
(113, 'PP', 'CS', 'PACCA MAX EXTERIOR EMULSION ( Wild Yellow - 7865 ) 20 LTR', 'WY', 1, 'L', 'L', '20', 'R', '0', 'PPCSACEE0WY001LL020.000R00', 'EXT EMULSION', 'CO'),
(114, 'PP', 'CS', 'PACCA MAX TILE PRO  ( COPPER B 0587 ) 10 Ltr', 'CO', 1, 'L', 'L', '10', 'R', '0', 'PPCSTP000COB01LL010.000R00', 'TILE PRO', 'CO'),
(115, 'PP', 'CS', 'PACCA MAX TILE PRO  ( COPPER B 0587 ) 20 Ltr', 'CO', 1, 'L', 'L', '20', 'R', '0', 'PPCSTP000COB01LL020.000R00', 'TILE PRO', 'CO'),
(116, 'PP', 'CS', 'PACCA MAX TILE PRO  ( COPPER B 0587 ) 4 Ltr', 'CO', 1, 'L', 'L', '4', 'R', '0', 'PPCSTP000COB01LL004.000R00', 'TILE PRO', 'BO'),
(117, 'PP', 'CS', 'PACCA MAX ULTRA EXTERIOR EMULSION ( Fawn - ON05 ) - 10 LTR', 'FW', 1, 'L', 'L', '10', 'R', '0', 'PPCSULTE0FWN01LL010.000R00', 'ULTRA EMULSION', 'CO'),
(118, 'PP', 'CS', 'PACCA MAX ULTRA EXTERIOR EMULSION ( Fawn - ON05 ) - 20 LTR', 'FW', 1, 'L', 'L', '20', 'R', '0', 'PPCSULTE0FWN01LL020.000R00', 'ULTRA EMULSION', 'CO'),
(119, 'PP', 'CS', 'PACCA MAX ULTRA EXTERIOR EMULSION ( Morning Glooy - 0765 ) - 10 LTR', 'MG', 1, 'L', 'L', '10', 'R', '0', 'PPCSULTE0MG001LL010.000R00', 'ULTRA EMULSION', 'CO'),
(120, 'PP', 'CS', 'PACCA MAX ULTRA EXTERIOR EMULSION ( Morning Glooy - 0765 ) - 20 LTR', 'MG', 1, 'L', 'L', '20', 'R', '0', 'PPCSULTE0MG001LL020.000R00', 'ULTRA EMULSION', 'CO'),
(121, 'PP', 'CS', 'PACCA MAX ULTRA EXTERIOR EMULSION (SPRING FROLIC 7787) 20 LIT', 'SF', 1, 'L', 'L', '20', 'R', '0', 'PPCSULTE0SF001LL020.000R00', 'ULTRA EMULSION', 'CO'),
(122, 'PP', 'CS', 'PACCA MAX ULTRA EXTERIOR EMULSION ( WHITE ) 10 LTR', 'WT', 1, 'L', 'L', '10', 'R', '0', 'PPCSULTE0WT001LL010.000R00', 'ULTRA EMULSION', 'CO'),
(123, 'PP', 'CS', 'PACCA MAX ULTRA EXTERIOR EMULSION ( WHITE ) 20 LTR', 'WT', 1, 'L', 'L', '20', 'R', '0', 'PPCSULTE0WT001LL020.000R00', 'ULTRA EMULSION', 'CO'),
(124, 'PP', 'CS', 'PACCA MAX ULTRA EXTERIOR EMULSION ( WHITE )4 LTR', 'WT', 1, 'L', 'L', '40', 'R', '0', 'PPCSULTE0WT001LL040.000R00', 'ULTRA EMULSION', 'BO'),
(125, 'PP', 'CS', 'PACCA MAX ULTRA EXTERIOR EMULSION ( WHITE ) 50 LTR', 'WT', 1, 'L', 'L', '50', 'R', '0', 'PPCSULTE0WT001LL050.000R00', 'ULTRA EMULSION', 'CO'),
(126, 'PP', 'RP', 'PACCA MIX PLASTER  1 KG', '0', 1, 'P', 'G', '1', 'R', '0', 'PPRPPMP0000001PG001.000R00', 'PACCA MIX PLASTER', 'BA'),
(127, 'PP', 'RP', 'PACCA MIX PLASTER 20 KG', '0', 1, 'P', 'G', '20', 'R', '0', 'PPRPPMP0000001PG020.000R00', 'PACCA MIX PLASTER', 'BA'),
(128, 'PP', 'RP', 'PACCA MIX PLASTER 40 KG', '0', 1, 'P', 'G', '40', 'R', '0', 'PPRPPMP0000001PG040.000R00', 'PACCA MIX PLASTER', 'BA'),
(129, 'PP', 'RP', 'PACCA MIX PLASTER 5 KG', '0', 1, 'P', 'G', '5', 'R', '0', 'PPRPPMP0000001PG005.000R00', 'PACCA MIX PLASTER', 'BA'),
(130, 'PP', 'RP', 'PACCA NEW SEAL ( HIGH STRENGTH PUTTY ) 40 Kg', '0', 1, 'P', 'G', '40', 'R', '0', 'PPRPNSHSP00001PG040.000R00', 'PACCA NEW SEAL', 'BA'),
(131, 'PP', 'RP', 'PACCA PERMI GROUT (3K Epoxy Tile Grout) BLACK - 1 KG', 'BL', 1, 'P', 'G', '1', 'R', '0', 'PPRPPGR00BLK01PG001.000R00', 'PERMI GROUT', 'BO'),
(132, 'PP', 'RP', 'PACCA PERMI GROUT (3K Epoxy Tile Grout) DARK GRAY - 1 KG', 'DG', 1, 'P', 'G', '1', 'R', '0', 'PPRPPGR00DGY01PG001.000R00', 'PERMI GROUT', 'BO'),
(133, 'PP', 'RP', 'PACCA PERMI GROUT (3K Epoxy Tile Grout) IVORY - 1 KG', 'IV', 1, 'P', 'G', '1', 'R', '0', 'PPRPPGR00IVY01PG001.000R00', 'PERMI GROUT', 'BO'),
(134, 'PP', 'RP', 'PACCA PERMI GROUT (3K Epoxy Tile Grout) IVORY  - 5 KG', 'IV', 1, 'P', 'G', '5', 'R', '0', 'PPRPPGR00IVY01PG005.000R00', 'PERMI GROUT', 'BO'),
(135, 'PP', 'RP', 'PACCA PERMI GROUT (3K Epoxy Tile Grout) WHITE - 1 KG', 'WH', 1, 'P', 'G', '1', 'R', '0', 'PPRPPGR00WHT01PG001.000R00', 'PERMI GROUT', 'BO'),
(136, 'PP', 'RP', 'PACCA PERMI GROUT (3K Epoxy Tile Grout) WHITE  - 5 KG', 'WH', 1, 'P', 'G', '5', 'R', '0', 'PPRPPGR00WHT01PG005.000R00', 'PERMI GROUT', 'BO'),
(137, 'PP', 'RP', 'PACCA PERMI PRIME ( EPOXY PRIMER Base - 2.5 Kg + Hardener - 2.5 Kg )  5 KG', 'HR', 1, 'P', 'G', '5', 'R', '0', 'PPRPEPB00HRN01PG005.000R00', 'PERMI PRIME', 'BO'),
(138, 'PP', 'RP', 'PACCA PERMI PRIME ( EPOXY PRIMER Base - 500 Gm + Hardener - 500 Gm )  1KG', 'HR', 1, 'P', 'G', '1', 'R', '0', 'PPRPEPB00HRN01PG001.000R00', 'PERMI PRIME', 'BO'),
(139, 'PP', 'RP', 'PACCA PERMI PRIME ( EPOXY PRIMER Base - 5 Kg + Hardener - 5 Kg )  10 KG', 'HR', 1, 'P', 'G', '10', 'R', '0', 'PPRPEPB00HRN01PG010.000R00', 'PERMI PRIME', 'BO'),
(140, 'PP', 'RP', 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base 4 Kg + Hardener - 1 Kg ) Black - 5 KG', 'BL', 1, 'P', 'G', '5', 'R', '0', 'PPRPETCB0BLK01PG005.000R00', 'PERMI STRONG', 'BO'),
(141, 'PP', 'RP', 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base 4 Kg + Hardener - 1 Kg ) Deep Green - 5 KG', 'DG', 1, 'P', 'G', '5', 'R', '0', 'PPRPETCB0DGR01PG005.000R00', 'PERMI STRONG', 'BO'),
(142, 'PP', 'RP', 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base 800 Gm + Hardener – 200 Gm ) Cement Grey - 1 KG', 'CG', 1, 'P', 'G', '1', 'R', '0', 'PPRPETCB0CGR01PG001.000R00', 'PERMI STRONG', 'BO'),
(143, 'PP', 'RP', 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base 800 Gm + Hardener – 200 Gm ) Sky Blue - 1 KG', 'SB', 1, 'P', 'G', '1', 'R', '0', 'PPRPETCB0SBL01PG001.000R00', 'PERMI STRONG', 'BO'),
(144, 'PP', 'RP', 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base - 8 Kg + Hardener - 2 Kg ) 10 KG', '0', 1, 'P', 'G', '10', 'R', '0', 'PPRPETCB000001PG010.000R00', 'PERMI STRONG', 'BO'),
(145, 'PP', 'RP', 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base - 8 Kg + Hardener - 2 Kg ) Sky Blue - 10 KG', 'SB', 1, 'P', 'G', '10', 'R', '0', 'PPRPETCB0SBL01PG010.000R00', 'PERMI STRONG', 'BO'),
(146, 'PP', 'CS', 'PACCA PREMIUM GLOSS ENAMEL 20 LTR ( GOLDEN BROWN )', 'GB', 1, 'L', 'L', '20', 'R', '0', 'PPCSGLEMLGBN01LL020.000R00', 'GLOSS ENAMEL GOLDEN BROWN', 'CO'),
(147, 'PP', 'CS', 'PACCA PREMIUM GLOSS ENAMEL 20 LTR ( LIGHT GREY )', 'LG', 1, 'L', 'L', '20', 'R', '0', 'PPCSGLEMLLGY01LL020.000R00', 'GLOSS ENAMEL LIGHT GRAY', 'CO'),
(148, 'PP', 'CS', 'PACCA PREMIUM GLOSS ENAMEL 20 LTR ( SAND TUNE )', 'ST', 1, 'L', 'L', '20', 'R', '0', 'PPCSGLEMLSTE01LL020.000R00', 'GLOSS ENAMEL SAND TUNE', 'CO'),
(149, 'PP', 'CS', 'PACCA PREMIUM GLOSS ENAMEL 20 LTR ( SMOKE GREY )', 'SM', 1, 'L', 'L', '20', 'R', '0', 'PPCSGLEMLSMG01LL020.000R00', 'GLOSS ENAMEL SMOKE GREY', 'CO'),
(150, 'PP', 'CS', 'PACCA PREMIUM GLOSS ENAMEL 20 LTR ( WHITE )', 'WH', 1, 'L', 'L', '20', 'R', '0', 'PPCSGLEMLWHT01LL020.000R00', 'GLOSS ENAMEL WHITE', 'CO'),
(151, 'PP', 'CS', 'PACCA PREMIUM GLOSS ENAMEL 4 LTR ( BLUE BELL WHITE )', 'BB', 1, 'L', 'L', '4', 'R', '0', 'PPCSGLEMLBBW01LL004.000R00', 'GLOSS ENAMEL ', 'BO'),
(152, 'PP', 'CS', 'PACCA PREMIUM GLOSS ENAMEL 4 LTR ( LIGHT GREY )', 'LG', 1, 'L', 'L', '4', 'R', '0', 'PPCSGLEMLLGY01LL004.000R00', 'GLOSS ENAMEL LIGHT GREY', 'BO'),
(153, 'PP', 'CS', 'PACCA PREMIUM GLOSS ENAMEL 4 LTR ( SAND TUNE )', 'ST', 1, 'L', 'L', '4', 'R', '0', 'PPCSGLEMLSTE01LL004.000R00', 'GLOSS ENAMEL SAND TUNE', 'BO'),
(154, 'PP', 'CS', 'PACCA PREMIUM GLOSS ENAMEL 4 LTR ( SMOKE GREY )', 'SM', 1, 'L', 'L', '4', 'R', '0', 'PPCSGLEMLSMG01LL004.000R00', 'GLOSS ENAMEL SMOKE GREY', 'BO'),
(155, 'PP', 'CS', 'PACCA PREMIUM METAL PRIMER ( RED OXIDE ) 1 LTR', 'RE', 1, 'L', 'L', '1', 'R', '0', 'PPCSMP000REO01LL001.000R00', 'METAL PRIMER RED OXIDE', 'BO'),
(156, 'PP', 'CS', 'PACCA PREMIUM METAL PRIMER ( RED OXIDE ) 20  LTR', 'RE', 1, 'L', 'L', '20', 'R', '0', 'PPCSMP000REO01LL020.000R00', 'METAL PRIMER RED OXIDE', 'CO'),
(157, 'PP', 'CS', 'PACCA PREMIUM METAL PRIMER ( RED OXIDE ) 4 LTR', 'RE', 1, 'L', 'L', '4', 'R', '0', 'PPCSMP000REO01LL004.000R00', 'METAL PRIMER RED OXIDE', 'BO'),
(158, 'PP', 'CS', 'PACCA PREMIUM METAL PRIMER ( RED OXIDE ) 500 ML', 'RE', 1, 'L', 'L', '0.5', 'R', '0', 'PPCSMP000REO01LL000.500R00', 'METAL PRIMER RED OXIDE', 'BO'),
(159, 'PP', 'CS', 'PACCA PREMIUM METAL PRIMER ( YELLOW - ZP ) 1 LTR', 'YL', 1, 'L', 'L', '1', 'R', '0', 'PPCSMP000YLO01LL001.000R00', 'METAL PRIMER YELLOW', 'BO'),
(160, 'PP', 'CS', 'PACCA PREMIUM METAL PRIMER ( YELLOW - ZP ) 20  LTR', 'YL', 1, 'L', 'L', '20', 'R', '0', 'PPCSMP000YLO01LL020.000R00', 'METAL PRIMER YELLOW', 'CO'),
(161, 'PP', 'CS', 'PACCA PREMIUM METAL PRIMER ( YELLOW - ZP ) 4 LTR', 'YL', 1, 'L', 'L', '4', 'R', '0', 'PPCSMP000YLO01LL004.000R00', 'METAL PRIMER YELLOW', 'BO'),
(162, 'PP', 'CS', 'PACCA PREMIUM METAL PRIMER ( YELLOW - ZP ) 500 ML', 'YL', 1, 'L', 'L', '0.5', 'R', '0', 'PPCSMP000YLO01LL000.500R00', 'METAL PRIMER YELLOW', 'BO'),
(163, 'PP', 'CS', 'PACCA PREMIUM WOOD PRIMER 10 LTR ( WHITE )', 'WT', 1, 'L', 'L', '10', 'R', '0', 'PPCSWOPRIWT001LL010.000R00', 'WOOD PRIMER', 'CO'),
(164, 'PP', 'CS', 'PACCA PREMIUM WOOD PRIMER 1 LTR ( WHITE )', 'WT', 1, 'L', 'L', '1', 'R', '0', 'PPCSWOPRIWT001LL001.000R00', 'WOOD PRIMER', 'BO'),
(165, 'PP', 'CS', 'PACCA PREMIUM WOOD PRIMER 20 LTR ( WHITE )', 'WT', 1, 'L', 'L', '20', 'R', '0', 'PPCSWOPRIWT001LL020.000R00', 'WOOD PRIMER', 'CO'),
(166, 'PP', 'CS', 'PACCA PREMIUM WOOD PRIMER 4 LTR ( WHITE )', 'WT', 1, 'L', 'L', '4', 'R', '0', 'PPCSWOPRIWT001LL004.000R00', 'WOOD PRIMER', 'BO'),
(167, 'PP', 'CS', 'PACCA PREMIUM WOOD PRIMER 500 ML ( WHITE )', 'WT', 1, 'L', 'L', '0.5', 'R', '0', 'PPCSWOPRIWT001LL000.500R00', 'WOOD PRIMER', 'BO'),
(168, 'PP', 'CS', 'PACCA PROXY EP 505 - 1 KG', '0', 1, 'P', 'G', '1', 'R', '0', 'PPCSPROXY00001PG001.000R00', 'PROXY EP 505', 'BO'),
(169, 'PP', 'SP', 'PACCA PUTTY BOOZTER - 1 LTR', '0', 1, 'P', 'G', '1', 'R', '0', 'PPSPPUTTY00001PG001.000R00', 'PUTTY BOOZTER', 'BO'),
(170, 'PP', 'SP', 'PACCA PUTTY BOOZTER - 200 ML', '0', 1, 'P', 'G', '0.2', 'R', '0', 'PPSPPUTTY00001PG000.200R00', 'PUTTY BOOZTER', 'CO'),
(171, 'PP', 'RP', 'PACCA SEAL 1 Kg  Can', '0', 1, 'P', 'G', '1', 'R', '0', 'PPRPPSEAL00001PG001.000R00', 'PACCA SEAL', 'BO'),
(172, 'PP', 'RP', 'PACCA SEAL 20 Kg  Can', '0', 1, 'P', 'G', '20', 'R', '0', 'PPRPPSEAL00001PG020.000R00', 'PACCA SEAL', 'CO'),
(173, 'PP', 'RP', 'PACCA SEAL 25 Kg  Can', '0', 1, 'P', 'G', '25', 'R', '0', 'PPRPPSEAL00001PG025.000R00', 'PACCA SEAL', 'BO'),
(174, 'PP', 'RP', 'PACCA SEAL 500 Gms', '0', 1, 'P', 'G', '0.5', 'R', '0', 'PPRPPSEAL00001PG000.500R00', 'PACCA SEAL', 'BO'),
(175, 'PP', 'RP', 'PACCA SEAL 5 Kg  Can', '0', 1, 'P', 'G', '5', 'R', '0', 'PPRPPSEAL00001PG005.000R00', 'PACCA SEAL', 'BO'),
(176, 'PP', 'RP', 'PACCA SEAL GRS - 1 KG', '0', 1, 'P', 'G', '1', 'R', '0', 'PPRPPSGRS00001PG001.000R00', 'PACCA SEAL GRS', 'BO'),
(177, 'PP', 'RP', 'PACCA SEAL GRS - 200 GM', '0', 1, 'P', 'G', '0.2', 'R', '0', 'PPRPPSGRS00001PG000.200R00', 'PACCA SEAL GRS', 'CO'),
(178, 'PP', 'RP', 'PACCA SEAL GRS - 20 KG', '0', 1, 'P', 'G', '20', 'R', '0', 'PPRPPSGRS00001PG020.000R00', 'PACCA SEAL GRS', 'CO'),
(179, 'PP', 'RP', 'PACCA SEAL GRS - 500 GM', '0', 1, 'P', 'G', '0.5', 'R', '0', 'PPRPPSGRS00001PG000.500R00', 'PACCA SEAL GRS', 'BO'),
(180, 'PP', 'RP', 'PACCA SEAL GRS - 5 KG', '0', 1, 'P', 'G', '5', 'R', '0', 'PPRPPSGRS00001PG005.000R00', 'PACCA SEAL GRS', 'BO'),
(181, 'PP', 'CS', 'Pacca Super Primer Interior Primer 10lit', '0', 1, 'L', 'L', '10', 'R', '0', 'PPCSSPINP00001LL010.000R00', 'INT SUPER PRIMER', 'CO'),
(182, 'PP', 'CS', 'Pacca Super Primer Interior Primer 1 Lit', '0', 1, 'L', 'L', '1', 'R', '0', 'PPCSSPINP00001LL001.000R00', 'INT SUPER PRIMER', 'BO'),
(183, 'PP', 'CS', 'Pacca Super Primer Interior Primer 20 Lit', '0', 1, 'L', 'L', '20', 'R', '0', 'PPCSSPINP00001LL020.000R00', 'INT SUPER PRIMER', 'CO'),
(184, 'PP', 'CS', 'Pacca Super Primer Interior Primer 4 Lit', '0', 1, 'L', 'L', '4', 'R', '0', 'PPCSSPINP00001LL004.000R00', 'INT SUPER PRIMER', 'BO'),
(185, 'PP', 'SP', 'PACCA UNIVERSAL BOOZTER - 1 LTR', '0', 1, 'L', 'L', '1', 'R', '0', 'PPSPUNIBZ00001LL001.000R00', 'UNIVERSAL BOOZTER', 'BO'),
(186, 'PP', 'SP', 'PACCA UNIVERSAL BOOZTER - 200 ML', '0', 1, 'L', 'L', '0.2', 'R', '0', 'PPSPUNIBZ00001LL000.200R00', 'UNIVERSAL BOOZTER', 'CO'),
(187, 'PP', 'SP', 'PACCA UNIVERSAL BOOZTER - 20 LTR', '0', 1, 'L', 'L', '20', 'R', '0', 'PPSPUNIBZ00001LL020.000R00', 'UNIVERSAL BOOZTER', 'CO'),
(188, 'PP', 'SP', 'PACCA UNIVERSAL BOOZTER - 5 LTR', '0', 1, 'L', 'L', '5', 'R', '0', 'PPSPUNIBZ00001LL005.000R00', 'UNIVERSAL BOOZTER', 'BO'),
(189, 'PP', 'CS', 'PACCA UNIVERSAL PRIMER 10 LTR', '0', 1, 'L', 'L', '10', 'R', '0', 'PPCSUNIPR00001LL010.000R00', 'UNIVERSAL PRIMER', 'CO'),
(190, 'PP', 'CS', 'PACCA UNIVERSAL PRIMER 1 LTR', '0', 1, 'L', 'L', '1', 'R', '0', 'PPCSUNIPR00001LL001.000R00', 'UNIVERSAL PRIMER', 'BO'),
(191, 'PP', 'CS', 'PACCA UNIVERSAL PRIMER 20 LTR', '0', 1, 'L', 'L', '20', 'R', '0', 'PPCSUNIPR00001LL020.000R00', 'UNIVERSAL PRIMER', 'CO'),
(192, 'PP', 'CS', 'PACCA UNIVERSAL PRIMER 4 LTR', '0', 1, 'L', 'L', '4', 'R', '0', 'PPCSUNIPR00001LL004.000R00', 'UNIVERSAL PRIMER', 'BO'),
(193, 'PP', 'CS', 'PACCA UNIVERSAL PRIMER 50 LTR', '0', 1, 'L', 'L', '50', 'R', '0', 'PPCSUNIPR00001LL050.000R00', 'UNIVERSAL PRIMER', 'CO'),
(194, 'PP', 'SP', 'PAINT-X 1 Ltr. Tin', '0', 1, 'L', 'L', '1', 'R', '0', 'PPSPPTX0000001LL001.000R00', 'PAINT-X', 'BO'),
(195, 'PP', 'SP', 'PAINT X 20 Ltr Can', '0', 1, 'L', 'L', '20', 'R', '0', 'PPSPPTX0000001LL020.000R00', 'PAINT X', 'CO'),
(196, 'PP', 'SP', 'PAINT X - 220 LTR', '0', 1, 'L', 'L', '220', 'R', '0', 'PPSPPTX0000001LL220.000R00', 'PAINT X', 'CO'),
(197, 'PP', 'SP', 'PAINT-X 250 Ml Tin', '0', 1, 'L', 'L', '0.25', 'R', '0', 'PPSPPTX0000001LL000.250R00', 'PAINT-X', 'BO'),
(198, 'PP', 'SP', 'Paint-X 3 Lit Tin', '0', 1, 'L', 'L', '3', 'R', '0', 'PPSPPTX0000001LL003.000R00', 'Paint-X', 'BO'),
(199, 'PP', 'SP', 'PAINT-X 500 Ml Tin', '0', 1, 'L', 'L', '0.5', 'R', '0', 'PPSPPTX0000001LL000.500R00', 'PAINT-X', 'BO'),
(200, 'PP', 'SP', 'REVE BOND 1000 Gms', '0', 1, 'P', 'G', '1', 'R', '0', 'PPSPRB00000001PG001.000R00', 'REVE BOND', 'BO'),
(201, 'PP', 'SP', 'REVE BOND 125 Gms', '0', 1, 'P', 'G', '0.125', 'R', '0', 'PPSPRB00000001PG000.125R00', 'REVE BOND', 'BO'),
(202, 'PP', 'SP', 'REVE BOND 250 Gms', '0', 1, 'P', 'G', '0.25', 'R', '0', 'PPSPRB00000001PG000.250R00', 'REVE BOND', 'BO'),
(203, 'PP', 'SP', 'REVE BOND 500 Gms', '0', 1, 'P', 'G', '0.5', 'R', '0', 'PPSPRB00000001PG000.500R00', 'REVE BOND', 'BO'),
(204, 'PP', 'GA', 'REVEFIL - N 1 KG (BLACK)', 'BL', 1, 'P', 'G', '1', 'R', '0', 'PPGARFL00BLK01PG001.000R00', 'REVE FIL-N BLACK', 'BA'),
(205, 'PP', 'GA', 'REVE FIL - N 1 KG (BLUE)', 'BL', 1, 'P', 'G', '1', 'R', '0', 'PPGARFL00BLE01PG001.000R00', 'REVE FIL-N BLUE', 'BA'),
(206, 'PP', 'GA', 'REVEFIL - N 1KG ( BRICK RED)', 'BR', 1, 'P', 'G', '1', 'R', '0', 'PPGARFL00BRD01PG001.000R00', 'REVE FIL-N BRICK RED', 'BA'),
(207, 'PP', 'GA', 'REVEFIL - N 1KG (BROWN)', 'BR', 1, 'P', 'G', '1', 'R', '0', 'PPGARFL00BRN01PG001.000R00', 'REVE FIL-N BROWN', 'BA'),
(208, 'PP', 'GA', 'REVEFIL - N 1KG ( GRAY)', 'GR', 1, 'P', 'G', '1', 'R', '0', 'PPGARFL00GRY01PG001.000R00', 'REVE FIL-N GRAU', 'BA'),
(209, 'PP', 'GA', 'REVEFIL - N1 KG ( GREEN )', 'GR', 1, 'P', 'G', '1', 'R', '0', 'PPGARFL00GRN01PG001.000R00', 'REVE FIL-N GREEN', 'BA'),
(210, 'PP', 'GA', 'REVEFIL - N 1 KG(IVORY)', 'IV', 1, 'P', 'G', '1', 'R', '0', 'PPGARFL00IVY01PG001.000R00', 'REVE FIL-N IVORY', 'BA'),
(211, 'PP', 'GA', 'REVE FIL - N 1 KG(PINK)', 'PN', 1, 'P', 'G', '1', 'R', '0', 'PPGARFL00PNK01PG001.000R00', 'REVE FIL-N PINK', 'BA'),
(212, 'PP', 'GA', 'REVE FIL - N 1KG (PISTHA)', 'PS', 1, 'P', 'G', '1', 'R', '0', 'PPGARFL00PSA01PG001.000R00', 'REVE FIL-N PISTHA', 'BA'),
(213, 'PP', 'GA', 'REVE FIL - N 1KG (TERRACOTTA)', 'TR', 1, 'P', 'G', '1', 'R', '0', 'PPGARFL00TRA01PG001.000R00', 'REVE FIL-N TERRACOTTA', 'BA'),
(214, 'PP', 'GA', 'REVEFIL - N 1KG(WHITE)', 'WT', 1, 'P', 'G', '1', 'R', '0', 'PPGARFL00WTE01PG001.000R00', 'REVE FIL-N WHITE', 'BA'),
(215, 'PP', 'GA', 'REVE FIL - N 1KG (YELLOW)', 'YL', 1, 'P', 'G', '1', 'R', '0', 'PPGARFL00YLW01PG001.000R00', 'REVE FIL-N YELLOW', 'BA'),
(216, 'PP', 'GA', 'REVE FIL - N 50 KG ( GRAY)', 'GR', 1, 'P', 'G', '50', 'R', '0', 'PPGARFL00GRY01PG050.000R00', 'REVE FIL-N  GRAY', 'BA'),
(217, 'PP', 'GA', 'REVE FIL - N 50 KG ( WHITE )', 'WT', 1, 'P', 'G', '50', 'R', '0', 'PPGARFL00WTE01PG050.000R00', 'REVE FIL-N WHITE', 'BA'),
(218, 'PP', 'GA', 'REVE FIX - N 10 KG', '0', 1, 'P', 'G', '10', 'R', '0', 'PPGARFX0000001PG010.000R00', 'REVE FIX-N', 'BA'),
(219, 'PP', 'GA', 'REVE FIX - N 1 KG( POUCH)', '0', 1, 'F', 'G', '1', 'R', '0', 'PPGARFXP000001FG001.000R00', 'REVE FIX-N', 'BA'),
(220, 'PP', 'GA', 'REVE FIX - N 20 KG', '0', 1, 'F', 'G', '20', 'R', '0', 'PPGARFX0000001FG020.000R00', 'REVE FIX-N', 'BA'),
(221, 'PP', 'GA', 'REVEFIX - N 25 Kg', '0', 1, 'F', 'G', '25', 'R', '0', 'PPGARFX0000001FG025.000R00', 'REVE FIX-N', 'BA'),
(222, 'PP', 'GA', 'REVE FIX - N 30 KG', '0', 1, 'F', 'G', '30', 'R', '0', 'PPGARFX0000001FG030.000R00', 'REVE FIX-N', 'BA'),
(223, 'PP', 'AD', 'REVE GRIP 100 GM', '0', 1, 'L', 'G', '0.1', 'R', '0', 'PPADRGP0000001LG000.100R00', 'REVE GRIP', 'BO'),
(224, 'PP', 'AD', 'REVE GRIP 250 GM', '0', 1, 'L', 'G', '0.25', 'R', '0', 'PPADRGP0000001LG000.250R00', 'REVE GRIP', 'BO'),
(225, 'PP', 'AD', 'REVE GRIP 500 GM', '0', 1, 'L', 'G', '0.5', 'R', '0', 'PPADRGP0000001LG000.500R00', 'REVE GRIP', 'BO'),
(226, 'PP', 'AD', 'REVE GRIP 50 GM', '0', 1, 'L', 'G', '0.05', 'R', '0', 'PPADRGP0000001LG000.050R00', 'REVE GRIP', 'BO'),
(227, 'PP', 'CS', 'SHINE TILE PU ENAMEL (BLUE MOON ) – 4 Ltr', 'BM', 1, 'L', 'L', '4', 'R', '0', 'PPCSSTL00BMN01LL004.000R00', 'SHINE TILE BLUE MOON', 'BO'),
(228, 'PP', 'CS', 'SHINE TILE (Signal Red) - 20 Lit', 'SR', 1, 'L', 'L', '20', 'R', '0', 'PPCSSTL00SRD01LL020.000R00', 'SHINE TILE SIGNAL RED', 'CO'),
(229, 'PP', 'CS', 'SHINE TILE [Black] 1 Lit.', 'BL', 1, 'L', 'L', '1', 'R', '0', 'PPCSSTL00BLK01LL001.000R00', 'SHINE TILE BLACK', 'BO'),
(230, 'PP', 'CS', 'SHINE TILE [Black] 4 Lit.', 'BL', 1, 'L', 'L', '4', 'R', '0', 'PPCSSTL00BLK01LL004.000R00', 'SHINE TILE BLACK', 'BO'),
(231, 'PP', 'CS', 'SHINE TILE [Brick Red] 1 Lit', 'BR', 1, 'L', 'L', '1', 'R', '0', 'PPCSSTL00BRD01LL001.000R00', 'SHINE TILE BRICK RED', 'BO'),
(232, 'PP', 'CS', 'SHINE TILE [BRICK RED] 20 LIT', 'BR', 1, 'L', 'L', '20', 'R', '0', 'PPCSSTL00BRD01LL020.000R00', 'SHINE TILE BRICK RED', 'CO'),
(233, 'PP', 'CS', 'SHINE TILE [Brick Red] 4 Lits', 'BR', 1, 'L', 'L', '4', 'R', '0', 'PPCSSTL00BRD01LL004.000R00', 'SHINE TILE BRICK RED', 'BO'),
(234, 'PP', 'CS', 'SHINE TILE [Brick Red] 500 Ml', 'BR', 1, 'L', 'L', '0.5', 'R', '0', 'PPCSSTL00BRD01LL000.500R00', 'SHINE TILE BRICK RED', 'BO'),
(235, 'PP', 'CS', 'SHINE TILE [Clear] 1 Lit', 'CL', 1, 'L', 'L', '1', 'R', '0', 'PPCSSTL00CLR01LL001.000R00', 'SHINE TILE CLEAR', 'BO'),
(236, 'PP', 'CS', 'SHINE TILE [Clear] 4 Lits', 'CL', 1, 'L', 'L', '4', 'R', '0', 'PPCSSTL00CLR01LL004.000R00', 'SHINE TILE CLEAR', 'BO'),
(237, 'PP', 'CS', 'SHINE TILE [Clear] 500 Ml', 'CL', 1, 'L', 'L', '0.5', 'R', '0', 'PPCSSTL00CLR01LL000.500R00', 'SHINE TILE CLEAR', 'BO'),
(238, 'PP', 'CS', 'SHINE TILE [Hanuman Red] 1 Lit', 'HR', 1, 'L', 'L', '1', 'R', '0', 'PPCSSTL00HRD01LL001.000R00', 'SHINE TILE HANUMAN RED', 'BO'),
(239, 'PP', 'CS', 'SHINE TILE [Hanuman Red] 4 Lits', 'HR', 1, 'L', 'L', '4', 'R', '0', 'PPCSSTL00HRD01LL004.000R00', 'SHINE TILE HANUMAN RED', 'BO'),
(240, 'PP', 'CS', 'SHINE TILE [Hanuman Red] 500 Ml', 'HR', 1, 'L', 'L', '0.5', 'R', '0', 'PPCSSTL00HRD01LL000.500R00', 'SHINE TILE HANUMAN RED', 'BO'),
(241, 'PP', 'CS', 'SHINE TILE [Signal Red] 1 Lit', 'SR', 1, 'L', 'L', '1', 'R', '0', 'PPCSSTL00SRD01LL001.000R00', 'SHINE TILE SIGNAL RED', 'BO'),
(242, 'PP', 'CS', 'SHINE TILE [Signal Red] 4 Lit', 'SR', 1, 'L', 'L', '4', 'R', '0', 'PPCSSTL00SRD01LL004.000R00', 'SHINE TILE SIGNAL RED', 'BO'),
(243, 'PP', 'CS', 'SHINE TILE [Signal Red] 500ml', 'SR', 1, 'L', 'L', '0.5', 'R', '0', 'PPCSSTL00SRD01LL000.500R00', 'SHINE TILE SIGNAL RED', 'BO'),
(244, 'PP', 'CS', 'SHINE TILE [Terracotta] 1 Lit', 'TR', 1, 'L', 'L', '1', 'R', '0', 'PPCSSTL00TRA01LL001.000R00', 'SHINE TILE TERRACOTTA', 'BO'),
(245, 'PP', 'CS', 'SHINE TILE [Terracotta] 4 Lits', 'TR', 1, 'L', 'L', '4', 'R', '0', 'PPCSSTL00TRA01LL004.000R00', 'SHINE TILE TERRACOTTA', 'BO'),
(246, 'PP', 'CS', 'SHINE TILE [Terracotta] 500 Ml', 'TR', 1, 'L', 'L', '0.5', 'R', '0', 'PPCSSTL00TRA01LL000.500R00', 'SHINE TILE TERRACOTTA', 'BO'),
(247, 'PP', 'CS', 'SHINE TILE [Tile Red] 1 Lit', 'TR', 1, 'L', 'L', '1', 'R', '0', 'PPCSSTL00TRD01LL001.000R00', 'SHINE TILE TILE RED', 'BO'),
(248, 'PP', 'CS', 'SHINE TILE [Tile Red] 4 Lits', 'TR', 1, 'L', 'L', '4', 'R', '0', 'PPCSSTL00TRD01LL004.000R00', 'SHINE TILE TILE RED', 'BO'),
(249, 'PP', 'CS', 'SHINE TILE [Tile Red] 500 Ml', 'TR', 1, 'L', 'L', '0.5', 'R', '0', 'PPCSSTL00TRD01LL000.500R00', 'SHINE TILE TILE RED', 'BO'),
(250, 'PP', 'CS', 'SHINE TILE [White] 1 Lit.', 'WT', 1, 'L', 'L', '1', 'R', '0', 'PPCSSTL00WTE01LL001.000R00', 'SHINE TILE WHITE', 'BO'),
(251, 'PP', 'CS', 'SHINE TILE [White] 4 Lits', 'WT', 1, 'L', 'L', '4', 'R', '0', 'PPCSSTL00WTE01LL004.000R00', 'SHINE TILE WHITE', 'BO'),
(252, 'PP', 'CS', 'SHINE TILE [White] 500 Ml', 'WT', 1, 'L', 'L', '0.5', 'R', '0', 'PPCSSTL00WTE01LL000.500R00', 'SHINE TILE WHITE', 'BO'),
(253, 'PP', 'CS', 'SOLAR KOAT  - LIQUID 125 ML', '0', 1, 'L', 'G', '0.125', 'R', '0', 'PPCSSKOAT00001LG000.125R00', 'SOLAR KOAT', 'BO'),
(254, 'PP', 'CS', 'SOLAR KOAT -  POWDER 5 KG', '0', 1, 'L', 'G', '5', 'R', '0', 'PPCSSKOAT00001LG005.000R00', 'SOLAR KOAT', 'BA'),
(255, 'PP', 'CS', 'SUMMERCOAT  - 10 KG', '0', 1, 'P', 'G', '10', 'R', '0', 'PPCSSCOAT00001PG010.000R00', 'SUMMERCOAT', 'CO'),
(256, 'PP', 'CS', 'SUMMER COAT - LIQUID 125ML', '0', 1, 'P', 'G', '0.125', 'R', '0', 'PPCSSCOAT00001PG000.125R00', 'SUMMERCOAT', 'BO'),
(257, 'PP', 'CS', 'SUMMER COAT - POWDER 5 KG', '0', 1, 'P', 'G', '5', 'R', '0', 'PPCSSCOAT00001PG005.000R00', 'SUMMERCOAT', 'BO'),
(258, 'PP', 'RP', 'SummeR-EX 10 Kgs', '0', 1, 'P', 'G', '10', 'R', '0', 'PPRPSUMEX00001PG010.000R00', 'SummeR-EX', 'CO'),
(259, 'PP', 'RP', 'SummeR-EX 1 Kg', '0', 1, 'P', 'G', '1', 'R', '0', 'PPRPSUMEX00001PG001.000R00', 'SummeR-EX', 'BO'),
(260, 'PP', 'RP', 'SummeR-EX 20 Kgs', '0', 1, 'P', 'G', '20', 'R', '0', 'PPRPSUMEX00001PG020.000R00', 'SummeR-EX', 'CO'),
(261, 'PP', 'RP', 'SummeR-EX 5 Kg', '0', 1, 'P', 'G', '5', 'R', '0', 'PPRPSUMEX00001PG005.000R00', 'SummeR-EX', 'BO'),
(262, 'RK', 'RP', 'SUPERPLAST 400 – 1 LTR', '0', 1, 'L', 'L', '1', 'R', '0', 'RKRPSUPPL00001LL001.000R00', 'SUPERPLAST 400 – 1 LTR', 'BO'),
(263, 'RK', 'RP', 'SUPERPLAST 400 – 20 LTR', '0', 1, 'L', 'L', '20', 'R', '0', 'RKRPSUPPL00001LL020.000R00', 'SUPERPLAST 400 – 20 LTR', 'CO'),
(264, 'RK', 'RP', 'SUPERPLAST 400 – 5 LTR', '0', 1, 'L', 'L', '5', 'R', '0', 'RKRPSUPPL00001LL005.000R00', 'SUPERPLAST 400 – 5 LTR', 'BO'),
(265, 'PP', 'SP', 'SURKI BOND 1 Lit', '0', 1, 'L', 'L', '1', 'R', '0', 'PPSPSBOND00001LL001.000R00', 'SURKI BOND', 'BO'),
(266, 'PP', 'SP', 'SURKI BOND 20 Lit.', '0', 1, 'L', 'L', '20', 'R', '0', 'PPSPSBOND00001LL020.000R00', 'SURKI BOND', 'CO'),
(267, 'PP', 'SP', 'SURKI BOND 5 Lit', '0', 1, 'L', 'L', '5', 'R', '0', 'PPSPSBOND00001LL005.000R00', 'SURKI BOND', 'BO'),
(268, 'PP', 'CS', 'SURYA KAVASH 1 Kg', '0', 1, 'P', 'G', '1', 'R', '0', 'PPCSSKAVS00001PG001.000R00', 'SURYA KAVASH', 'BO'),
(269, 'PP', 'CS', 'SURYA KAVASH 20 Kgs', '0', 1, 'P', 'G', '20', 'R', '0', 'PPCSSKAVS00001PG020.000R00', 'SURYA KAVASH', 'CO'),
(270, 'PP', 'CS', 'SURYA KAVASH 5 Kg', '0', 1, 'P', 'G', '5', 'R', '0', 'PPCSSKAVS00001PG005.000R00', 'SURYA KAVASH', 'BO'),
(271, 'PP', 'GA', 'TEK SEAL 1 Kg Pouch[Gray]', 'GR', 1, 'P', 'G', '1', 'R', '0', 'PPGATSL00GRY01PG001.000R00', 'TEK SEAL GRAY', 'BA'),
(272, 'PP', 'GA', 'TEK SEAL 1 Kg Pouch [White]', 'WT', 1, 'P', 'G', '1', 'R', '0', 'PPGATSL00WTE01PG001.000R00', 'TEK SEAL WHITE', 'BA'),
(273, 'PP', 'CS', 'TILE PLUS 10 Lit [Brick Red]', 'BR', 1, 'L', 'L', '10', 'R', '0', 'PPCSTP+00BRD01LL010.000R00', 'TILE PLUS BRICK RED', 'CO'),
(274, 'PP', 'CS', 'TILE PLUS 10 Lit [Terracotta]', 'TR', 1, 'L', 'L', '10', 'R', '0', 'PPCSTP+00TRA01LL010.000R00', 'TILE PLUS TERRACOTTA', 'CO'),
(275, 'PP', 'CS', 'TILE PLUS 10 Lit [TILE RED]', 'TR', 1, 'L', 'L', '10', 'R', '0', 'PPCSTP+00TRD01LL010.000R00', 'TILE PLUS TILE RED', 'CO'),
(276, 'PP', 'CS', 'TILE PLUS 1 Lit [Brick Red]', 'BR', 1, 'L', 'L', '1', 'R', '0', 'PPCSTP+00BRD01LL001.000R00', 'TILE PLUS BRICK RED', 'BO'),
(277, 'PP', 'CS', 'TILE PLUS 1 Lit [ JOLLY HOLLY )', 'JH', 1, 'L', 'L', '1', 'R', '0', 'PPCSTP+00JHY01LL001.000R00', 'TILE PLUS JOLLY HOLLY', 'BO'),
(278, 'PP', 'CS', 'TILE PLUS 1 Lit [SUNRISE)', 'SN', 1, 'L', 'L', '1', 'R', '0', 'PPCSTP+00SNR01LL001.000R00', 'TILE PLUS SUNRISE', 'BO'),
(279, 'PP', 'CS', 'TILE PLUS 1 Lit [Terracotta]', 'TR', 1, 'L', 'L', '1', 'R', '0', 'PPCSTP+00TRA01LL001.000R00', 'TILE PLUS TERRACOTTA', 'BO'),
(280, 'PP', 'CS', 'TILE PLUS 1 Lit [Tile Red]', 'TR', 1, 'L', 'L', '1', 'R', '0', 'PPCSTP+00TRD01LL001.000R00', 'TILE PLUS TILE RED', 'BO'),
(281, 'PP', 'CS', 'TILE PLUS 20 Lit [BRICK RED]', 'BR', 1, 'L', 'L', '20', 'R', '0', 'PPCSTP+00BRD01LL020.000R00', 'TILE PLUS BRICK RED', 'CO'),
(282, 'PP', 'CS', 'TILE PLUS 20 Lit [Ollve Green]', 'OL', 1, 'L', 'L', '20', 'R', '0', 'PPCSTP+00OLG01LL020.000R00', 'TILE PLUS OLIVE GREEN', 'CO'),
(283, 'PP', 'CS', 'TILE PLUS 20 Lit [ Terracotta]', 'TR', 1, 'L', 'L', '20', 'R', '0', 'PPCSTP+00TRA01LL020.000R00', 'TILE PLUS TERRACOTTA', 'CO'),
(284, 'PP', 'CS', 'TILE PLUS 20 Lit [Tile Red]', 'TR', 1, 'L', 'L', '20', 'R', '0', 'PPCSTP+00TRD01LL020.000R00', 'TILE PLUS TILE RED', 'CO'),
(285, 'PP', 'CS', 'TILE PLUS 4 Lit [ Brick Red]', 'BR', 1, 'L', 'L', '4', 'R', '0', 'PPCSTP+00BRD01LL004.000R00', 'TILE PLUS BRICK RED', 'BO'),
(286, 'PP', 'CS', 'TILE PLUS 4 Lit [Terracotta]', 'TR', 1, 'L', 'L', '4', 'R', '0', 'PPCSTP+00TRA01LL004.000R00', 'TILE PLUS TERRACOTTA', 'BO'),
(287, 'PP', 'CS', 'TILE PLUS 4 Lit [TILE RED]', 'TR', 1, 'L', 'L', '4', 'R', '0', 'PPCSTP+00TRD01LL004.000R00', 'TILE PLUS TILE RED', 'BO'),
(288, 'RR', 'SP', 'TOPBOND-(13KG+5Ltr)', '0', 1, 'L', 'L', '18', 'R', '0', 'RRSPTOPBO00001LL018.000R00', 'TOPBOND', 'BO'),
(289, 'PP', 'SP', 'TOTAL BOND 1000 Gms', '0', 1, 'P', 'G', '1', 'R', '0', 'PPSPTB00000001PG001.000R00', 'TOTAL BOND', 'BO'),
(290, 'PP', 'SP', 'TOTAL BOND 125 Gms', '0', 1, 'P', 'G', '0.125', 'R', '0', 'PPSPTB00000001PG000.125R00', 'TOTAL BOND', 'BO'),
(291, 'PP', 'SP', 'TOTAL BOND  250 Gms', '0', 1, 'P', 'G', '0.25', 'R', '0', 'PPSPTB00000001PG000.250R00', 'TOTAL BOND', 'BO'),
(292, 'PP', 'SP', 'TOTAL BOND  500 Gms', '0', 1, 'P', 'G', '5.5', 'R', '0', 'PPSPTB00000001PG005.500R00', 'TOTAL BOND', 'BO'),
(293, 'PP', 'CS', 'VECO CEMENT PRIMER EXTERIOR 10 LIT', '0', 1, 'L', 'L', '10', 'R', '0', 'PPCSCPEXT00001LL010.000R00', 'CEMENT PRIMER', 'CO'),
(294, 'PP', 'CS', 'VECO CEMENT PRIMER EXTERIOR 1 LIT', '0', 1, 'L', 'L', '1', 'R', '0', 'PPCSCPEXT00001LL001.000R00', 'CEMENT PRIMER', 'BO'),
(295, 'PP', 'CS', 'VECO CEMENT PRIMER EXTERIOR  4 LI T', '0', 1, 'L', 'L', '4', 'R', '0', 'PPCSCPEXT00001LL004.000R00', 'CEMENT PRIMER', 'BO'),
(296, 'PP', 'CS', 'VECO CEMENT PRIMER EXTERIORE 20 LIT', '0', 1, 'L', 'L', '20', 'R', '0', 'PPCSCPEXT00001LL020.000R00', 'CEMENT PRIMER', 'CO'),
(297, 'PP', 'CS', 'VECO EXTERIOR SPL PRIMER 10 LTR', '0', 1, 'L', 'L', '10', 'R', '0', 'PPCSCPSPL00001LL010.000R00', 'SPL PRIMER', 'CO'),
(298, 'PP', 'CS', 'VECO EXTERIOR SPL PRIMER 20 LTR', '0', 1, 'L', 'L', '20', 'R', '0', 'PPCSCPSPL00001LL020.000R00', 'SPL PRIMER', 'CO'),
(299, 'PP', 'CS', 'VECO EXTERIOR SPL PRIMER 50 LTR', '0', 1, 'L', 'L', '50', 'R', '0', 'PPCSCPSPL00001LL050.000R00', 'SPL PRIMER', 'CO'),
(300, 'PP', 'CS', 'VECO INTERIOR EMULSIOMN 10 LTR (LEMON SOUFFLE)', 'LS', 1, 'L', 'L', '10', 'R', '0', 'PPCSEMINTLSE01LL010.000R00', 'VECO INTERIOR EMULSION', 'CO'),
(301, 'PP', 'CS', 'VECO INTERIOR EMULSION 10 Ltr (BASE )', 'BS', 1, 'L', 'L', '10', 'R', '0', 'PPCSEMINTBSE01LL010.000R00', 'VECO INTERIOR EMULSION', 'CO'),
(302, 'PP', 'CS', 'VECO INTERIOR EMULSION 10 LTR (JOLLY HOLLY', 'JH', 1, 'L', 'L', '10', 'R', '0', 'PPCSEMINTJHY01LL010.000R00', 'VECO INTERIOR EMULSION', 'CO'),
(303, 'PP', 'CS', 'VECO INTERIOR EMULSION 10 LTR ( WHITE)', 'WT', 1, 'L', 'L', '10', 'R', '0', 'PPCSEMINTWTE01LL010.000R00', 'VECO INTERIOR EMULSION', 'CO'),
(304, 'PP', 'CS', 'VECO INTERIOR EMULSION1L LTR (JOLLY HOLLY', 'JH', 1, 'L', 'L', '1', 'R', '0', 'PPCSEMINTJHY01LL001.000R00', 'VECO INTERIOR EMULSION', 'BO'),
(305, 'PP', 'CS', 'VECO INTERIOR EMULSION 1 Ltr ( BASE )', 'BS', 1, 'L', 'L', '1', 'R', '0', 'PPCSEMINTBSE01LL001.000R00', 'VECO INTERIOR EMULSION', 'BO'),
(306, 'PP', 'CS', 'VECO INTERIOR EMULSION 1 LTR (SUN RISE)', 'SR', 1, 'L', 'L', '1', 'R', '0', 'PPCSEMINTSRE01LL001.000R00', 'VECO INTERIOR EMULSION', 'BO'),
(307, 'PP', 'CS', 'VECO INTERIOR EMULSION  1 LTR (WHITE)', 'WT', 1, 'L', 'L', '1', 'R', '0', 'PPCSEMINTWTE01LL001.000R00', 'VECO INTERIOR EMULSION', 'BO'),
(308, 'PP', 'CS', 'VECO INTERIOR EMULSION 20 Ltr (BASE )', 'BS', 1, 'L', 'L', '20', 'R', '0', 'PPCSEMINTBSE01LL020.000R00', 'VECO INTERIOR EMULSION', 'CO'),
(309, 'PP', 'CS', 'VECO INTERIOR EMULSION  20 LTR (JOLLY HOLLY', 'JH', 1, 'L', 'L', '20', 'R', '0', 'PPCSEMINTJHY01LL020.000R00', 'VECO INTERIOR EMULSION', 'CO'),
(310, 'PP', 'CS', 'Veco Interior Emulsion 20 Ltr (Lemon Souffle)', 'LS', 1, 'L', 'L', '20', 'R', '0', 'PPCSEMINTLSE01LL020.000R00', 'VECO INTERIOR EMULSION', 'CO'),
(311, 'PP', 'CS', 'VECO INTERIOR EMULSION 20 LTR (WHITE)', 'WT', 1, 'L', 'L', '20', 'R', '0', 'PPCSEMINTWTE01LL020.000R00', 'VECO INTERIOR EMULSION', 'CO'),
(312, 'PP', 'CS', 'VECO INTERIOR EMULSION 4 Ltr(BASE)', 'BS', 1, 'L', 'L', '4', 'R', '0', 'PPCSEMINTBSE01LL004.000R00', 'VECO INTERIOR EMULSION', 'BO'),
(313, 'PP', 'CS', 'VECO INTERIOR EMULSION 4 LTR (JOLLY HOLLY)', 'JH', 1, 'L', 'L', '4', 'R', '0', 'PPCSEMINTJHY01LL004.000R00', 'VECO INTERIOR EMULSION', 'BO'),
(314, 'PP', 'CS', 'VECO INTERIOR EMULSION 4 LTR (SUN RISE)', 'SR', 1, 'L', 'L', '4', 'R', '0', 'PPCSEMINTSRE01LL004.000R00', 'VECO INTERIOR EMULSION', 'BO'),
(315, 'PP', 'CS', 'VECO INTERIOR EMULSION 4 LTR (WHITE)', 'WT', 1, 'L', 'L', '4', 'R', '0', 'PPCSEMINTWTE01LL004.000R00', 'VECO INTERIOR EMULSION', 'BO'),
(316, 'PP', 'CS', 'VECO INTERIOR EMULSION SUNRISE 10 LIT', 'SR', 1, 'L', 'L', '10', 'R', '0', 'PPCSEMINTSRE01LL010.000R00', 'VECO INTERIOR EMULSION', 'CO'),
(317, 'PP', 'CS', 'VECO INTERIOR EMULSION SUNRISE 20 LIT', 'SR', 1, 'L', 'L', '20', 'R', '0', 'PPCSEMINTSRE01LL020.000R00', 'VECO INTERIOR EMULSION', 'CO'),
(318, 'PP', 'RP', 'VECO LATEX 1 Kg', '0', 1, 'L', 'G', '1', 'R', '0', 'PPRPVLATE00001LG001.000R00', 'VECO LATEX', 'BO'),
(319, 'PP', 'RP', 'VECO LATEX 20 Kgs', '0', 1, 'L', 'G', '20', 'R', '0', 'PPRPVLATE00001LG020.000R00', 'VECO LATEX', 'CO'),
(320, 'PP', 'RP', 'VECO LATEX 250 Gms', '0', 1, 'L', 'G', '0.25', 'R', '0', 'PPRPVLATE00001LG000.250R00', 'VECO LATEX', 'BO'),
(321, 'PP', 'RP', 'VECO LATEX 500 Gms', '0', 1, 'L', 'G', '0.5', 'R', '0', 'PPRPVLATE00001LG000.500R00', 'VECO LATEX', 'BO'),
(322, 'PP', 'RP', 'VECO LATEX 5 Kgs', '0', 1, 'L', 'G', '5', 'R', '0', 'PPRPVLATE00001LG005.000R00', 'VECO LATEX', 'BO'),
(323, 'PP', 'CS', 'VECO PRIMER 10 Lit Can', '0', 1, 'L', 'L', '10', 'R', '0', 'PPCSVPRIM00001LL010.000R00', 'VECO PRIMER', 'CO'),
(324, 'PP', 'CS', 'VECO PRIMER 1 Lit Can', '0', 1, 'L', 'L', '1', 'R', '0', 'PPCSVPRIM00001LL001.000R00', 'VECO PRIMER', 'BO'),
(325, 'PP', 'CS', 'VECO PRIMER 20 Lit Can', '0', 1, 'L', 'L', '20', 'R', '0', 'PPCSVPRIM00001LL020.000R00', 'VECO PRIMER', 'CO'),
(326, 'PP', 'CS', 'VECO PRIMER 4 Lit Can', '0', 1, 'L', 'L', '4', 'R', '0', 'PPCSVPRIM00001LL004.000R00', 'VECO PRIMER', 'BO'),
(327, 'PP', 'CS', 'VECO PRIMER - 50 LIT', '0', 1, 'L', 'L', '50', 'R', '0', 'PPCSVPRIM00001LL050.000R00', 'VECO PRIMER', 'CO'),
(328, 'PP', 'AD', 'V Flex G2K 10Kg', '0', 1, 'L', 'G', '10', 'R', '0', 'PPADVFG2K00001LG010.000R00', 'V FLEX', 'CO'),
(329, 'PP', 'AD', 'V FLEX G2K 1 KG', '0', 1, 'L', 'G', '1', 'R', '0', 'PPADVFG2K00001LG001.000R00', 'V FLEX', 'BO'),
(330, 'PP', 'AD', 'V Flex G2K 20Kg', '0', 1, 'L', 'G', '20', 'R', '0', 'PPADVFG2K00001LG020.000R00', 'V FLEX', 'CO'),
(331, 'PP', 'AD', 'V  FLEX G2K  5KG', '0', 1, 'L', 'G', '5', 'R', '0', 'PPADVFG2K00001LG005.000R00', 'V FLEX', 'BO'),
(332, 'PP', 'CS', 'VIJAY BASE COAT PRIMER 1 LTR', '0', 1, 'L', 'L', '1', 'R', '0', 'PPCSBCPRI00001LL001.000R00', 'VIJAY BASE COAT PRIMER', 'BO'),
(333, 'PP', 'CS', 'VIJAY BASE COAT PRIMER 20LITS', '0', 1, 'L', 'L', '20', 'R', '0', 'PPCSBCPRI00001LL020.000R00', 'VIJAY BASE COAT PRIMER', 'CO'),
(334, 'PP', 'CS', 'VIJAY BASE COAT PRIMER - 5 LIT', '0', 1, 'L', 'L', '5', 'R', '0', 'PPCSBCPRI00001LL005.000R00', 'VIJAY BASE COAT PRIMER', 'BO'),
(335, 'PP', 'CS', 'VIJAY TOP COAT GLOSS PAINT 1LIT', '0', 1, 'L', 'L', '1', 'R', '0', 'PPCSTCGLS00001LL001.000R00', 'TOP COAT GLOSS PAINT', 'BO'),
(336, 'PP', 'CS', 'VIJAY TOP COAT GLOSS PAINT 20LIT', '0', 1, 'L', 'L', '20', 'R', '0', 'PPCSTCGLS00001LL020.000R00', 'TOP COAT GLOSS PAINT', 'CO'),
(337, 'PP', 'CS', 'VIJAY WHITE EXTERIOR TILE PRIMER 10LIT', '0', 1, 'L', 'L', '10', 'R', '0', 'PPCSTILPR00001LL010.000R00', 'TILE PRIMER', 'CO'),
(338, 'PP', 'CS', 'VIJAY WHITE INTERIOR TILE PRIMER 20 LIT', '0', 1, 'L', 'L', '20', 'R', '0', 'PPCSTILPR00001LL020.000R00', 'TILE PRIMER', 'CO'),
(339, 'PP', 'CS', 'VIJAY WHITE INTERIOR TILE PRIMER 4 LIT', '0', 1, 'L', 'L', '4', 'R', '0', 'PPCSTILPR00001LL004.000R00', 'TILE PRIMER', 'BO'),
(340, 'PP', 'RP', 'VIJAY WHITE WALL CAREPUTTY 1Kg', '0', 1, 'P', 'G', '1', 'R', '0', 'PPRPVWPUT00001PG001.000R00', 'WALL PATTY', 'BA'),
(341, 'PP', 'RP', 'VIJAY WHITE  WALL CARE PUTTY 40 Kg', '0', 1, 'P', 'G', '40', 'R', '0', 'PPRPVWPUT00001PG040.000R00', 'WALL PATTY', 'BA'),
(342, 'PP', 'AD', 'V-SEAL 1 Lit.', '0', 1, 'L', 'L', '1', 'R', '0', 'PPADVSL0000001LL001.000R00', 'V-SEAL', 'BO'),
(343, 'PP', 'AD', 'V-SEAL 20 Lit.', '0', 1, 'L', 'L', '20', 'R', '0', 'PPADVSL0000001LL020.000R00', 'V-SEAL', 'CO'),
(344, 'PP', 'AD', 'V-SEAL 5 Lit.', '0', 1, 'L', 'L', '5', 'R', '0', 'PPADVSL0000001LL005.000R00', 'V-SEAL', 'BO'),
(345, 'PP', 'SP', 'WATER SEAL (IW PLUS) 1 LTR', '0', 1, 'L', 'L', '1', 'R', '0', 'PPSPWS+0000001LL001.000R00', 'WATER SEAL IW+', 'BO'),
(346, 'PP', 'SP', 'WATER SEAL (IW PLUS) 200 LIT', '0', 1, 'L', 'L', '200', 'R', '0', 'PPSPWS+0000001LL200.000R00', 'WATER SEAL IW+', 'CO'),
(347, 'PP', 'SP', 'WATER SEAL (IW PLUS) - 200 ML', '0', 1, 'L', 'L', '0.2', 'R', '0', 'PPSPWS+0000001LL000.200R00', 'WATER SEAL IW+', 'CO'),
(348, 'PP', 'SP', 'WATER SEAL (IW PLUS) 20 LTR', '0', 1, 'L', 'L', '20', 'R', '0', 'PPSPWS+0000001LL020.000R00', 'WATER SEAL IW+', 'CO'),
(349, 'PP', 'SP', 'WATER SEAL (IW PLUS) - 500 ML', '0', 1, 'L', 'L', '0.5', 'R', '0', 'PPSPWS+0000001LL000.500R00', 'WATER SEAL IW+', 'BO'),
(350, 'PP', 'SP', 'WATERSEAL (IW PLUS) 50 LIT', '0', 1, 'L', 'L', '50', 'R', '0', 'PPSPWS+0000001LL050.000R00', 'WATER SEAL IW+', 'BO'),
(351, 'PP', 'SP', 'WATER SEAL (IW PLUS) 5 LTR', '0', 1, 'L', 'L', '5', 'R', '0', 'PPSPWS+0000001LL005.000R00', 'WATER SEAL IW+', 'BO'),
(352, 'PP', 'AD', 'WATER SEAL  Liquid 100 Ml Can', '0', 1, 'L', 'L', '0.1', 'R', '0', 'PPADWSL0000001LL000.100R00', 'WATER SEAL LIQUID', 'CO'),
(353, 'PP', 'AD', 'WATER SEAL  Liquid 1 Lit.', '0', 1, 'L', 'L', '1', 'R', '0', 'PPADWSL0000001LL001.000R00', 'WATER SEAL LIQUID', 'BO');
INSERT INTO `products` (`id`, `Brand_name`, `Category`, `Product`, `Color`, `Version`, `Unit_Measurement`, `Weight_Measurement`, `Weight_Dimention`, `Packing_Measurement`, `Future_Version`, `pro_code`, `Parent_Product`, `pass_category`) VALUES
(354, 'PP', 'AD', 'WATER SEAL  Liquid  20 Lit Can', '0', 1, 'L', 'L', '20', 'R', '0', 'PPADWSL0000001LL020.000R00', 'WATER SEAL LIQUID', 'CO'),
(355, 'PP', 'AD', 'WATER SEAL Liquid 2.5 Ltr', '0', 1, 'L', 'L', '2.5', 'R', '0', 'PPADWSL0000001LL002.500R00', 'WATER SEAL LIQUID', 'BO'),
(356, 'PP', 'AD', 'WATER SEAL Liquid 500 Ml Can', '0', 1, 'L', 'L', '0.5', 'R', '0', 'PPADWSL0000001LL000.500R00', 'WATER SEAL LIQUID', 'BO'),
(357, 'PP', 'AD', 'WATER SEAL  Liquid 5 Lit', '0', 1, 'L', 'L', '5', 'R', '0', 'PPADWSL0000001LL005.000R00', 'WATER SEAL LIQUID', 'BO'),
(358, 'PP', 'AD', 'WATER SEAL  Powder 1 Kg Pkt', '0', 1, 'P', 'G', '1', 'R', '0', 'PPADWSP0000001PG001.000R00', 'WATER SEAL POWDER', 'BO'),
(359, 'PP', 'AD', 'WATER SEAL   Powder 1 Kg  Pouch', '0', 1, 'P', 'G', '1', 'R', '0', 'PPADWSPP000001PG001.000R00', 'WATER SEAL POWDER', 'BA'),
(360, 'PP', 'AD', 'WET SEAL 1 Lit', '0', 1, 'L', 'L', '1', 'R', '0', 'PPADWTL0000001LL001.000R00', 'WET SEAL', 'BO'),
(361, 'PP', 'AD', 'WET SEAL 20 Lit', '0', 1, 'L', 'L', '20', 'R', '0', 'PPADWTL0000001LL020.000R00', 'WET SEAL', 'CO'),
(362, 'PP', 'AD', 'WET SEAL 3 Lit', '0', 1, 'L', 'L', '3', 'R', '0', 'PPADWTL0000001LL003.000R00', 'WET SEAL', 'BO'),
(363, 'PP', 'AD', 'WET SEAL 500 Ml', '0', 1, 'L', 'L', '0.5', 'R', '0', 'PPADWTL0000001LL000.500R00', 'WET SEAL', 'BO'),
(364, 'PP', 'AD', 'WET SEAL 5 Lit', '0', 1, 'L', 'L', '5', 'R', '0', 'PPADWTL0000001LL005.000R00', 'WET SEAL', 'BO'),
(365, 'PP', 'SP', 'WOOD PRO 1 Lit', '0', 1, 'L', 'L', '1', 'R', '0', 'PPSPWPRO000001LL001.000R00', 'WOOD PRO', 'BO'),
(366, 'PP', 'SP', 'WOOD PRO 250 Ml', '0', 1, 'L', 'L', '0.25', 'R', '0', 'PPSPWPRO000001LL000.250R00', 'WOOD PRO', 'BO'),
(367, 'PP', 'SP', 'WOOD PRO 3 Ltr', '0', 1, 'L', 'L', '3', 'R', '0', 'PPSPWPRO000001LL003.000R00', 'WOOD PRO', 'BO'),
(368, 'PP', 'SP', 'WOOD PRO 500 Ml', '0', 1, 'L', 'L', '0.5', 'R', '0', 'PPSPWPRO000001LL000.500R00', 'WOOD PRO', 'BO'),
(369, 'PP', 'SP', 'WOOD PRO 5 Lit', '0', 1, 'L', 'L', '5', 'R', '0', 'PPSPWPRO000001LL005.000R00', 'WOOD PRO', 'BO'),
(370, 'PP', 'RP', 'CALCINED GYPSUM 1 Kg', '0', 1, 'P', 'G', '1', 'R', '0', 'PPRPPOP0000001PG001.000R00', 'CALCINED GYPSUM', 'BA'),
(371, 'PP', 'RP', 'CALCINED GYPSUM 40 Kg A Grade', '0', 1, 'P', 'G', '40', 'R', '0', 'PPRPPOP0000001PG040.000R00', 'CALCINED GYPSUM', 'BA'),
(372, 'PP', 'RP', 'CALCINED GYPSUM PLASTER  50 Kg A Grade', '0', 1, 'P', 'G', '50', 'R', '0', 'PPRPPOP0000001PG050.000R00', 'CALCINED GYPSUM', 'BA'),
(373, 'PP', 'RP', 'PACCA CRACK PASTE 4.5 KG', '0', 1, 'L', 'L', '4.5', 'R', '0', 'PPRPCPAST00001LL004.500R00', 'PACCA CRACK', 'BO'),
(374, 'PP', 'RP', 'PACCA CRACK PASTE 900GM', '0', 1, 'L', 'L', '0.9', 'R', '0', 'PPRPCPAST00001LL000.900R00', 'PACCA CRACK', 'BO');

-- --------------------------------------------------------

--
-- Table structure for table `product_summary`
--

CREATE TABLE `product_summary` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `p_code` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_summary`
--

INSERT INTO `product_summary` (`id`, `p_name`, `p_code`) VALUES
(1, 'REVE FIL - N 1 KG (BLUE)', 'RFL'),
(2, '	\r\nREVE FIX - N 10 KG', 'RFX'),
(3, 'CORRASOLVE 500ml', 'CRS'),
(4, 'CORROSOLVE 1 Ltr', 'CRS'),
(5, 'FLOW FAAST 1 Lit Can', 'FFT'),
(6, 'FLOW FAAST 50 Lit. Can', 'FFT');

-- --------------------------------------------------------

--
-- Table structure for table `product_totals`
--

CREATE TABLE `product_totals` (
  `id` int(11) NOT NULL,
  `parent_product` varchar(255) DEFAULT NULL,
  `total_weight` decimal(10,3) DEFAULT NULL,
  `production_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `unique_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `p_measurement`
--

CREATE TABLE `p_measurement` (
  `id` int(11) NOT NULL,
  `Packing_Type` varchar(255) DEFAULT NULL,
  `Packing_Code` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_measurement`
--

INSERT INTO `p_measurement` (`id`, `Packing_Type`, `Packing_Code`) VALUES
(1, 'RIGIT', 'R');

-- --------------------------------------------------------

--
-- Table structure for table `qr`
--

CREATE TABLE `qr` (
  `pid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `pr_id` int(11) NOT NULL,
  `qcode` varchar(60) DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qr`
--

INSERT INTO `qr` (`pid`, `uid`, `pr_id`, `qcode`, `flag`) VALUES
(1, 1, 9, 'PPSPEPX0000001LL001.000R002025/04/2900001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `qr_master`
--

CREATE TABLE `qr_master` (
  `uid` int(11) NOT NULL,
  `pr_code` varchar(255) NOT NULL,
  `p_date` varchar(10) NOT NULL,
  `batch` varchar(20) NOT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qr_master`
--

INSERT INTO `qr_master` (`uid`, `pr_code`, `p_date`, `batch`, `count`) VALUES
(1, 'PPSPEPX0000001LL001.000R00', '2025/04/29', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_no`
--

CREATE TABLE `sales_no` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_no`
--

INSERT INTO `sales_no` (`id`, `order_id`) VALUES
(0, '3720/SO/23-24');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `demand_pcs` varchar(255) DEFAULT NULL,
  `box_size` int(11) NOT NULL,
  `pack` int(11) NOT NULL,
  `remaining_pcs` int(11) NOT NULL,
  `processed` int(11) DEFAULT 0,
  `pending` int(11) DEFAULT NULL,
  `input_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `products` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `msq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `products`, `qty`, `msq`) VALUES
(1, 'Cool Seal ( Fibre Reinfirced Coating) 1 Ltr', 332, 150),
(2, 'Cool Seal ( Fibre Reinfirced Coating) 4 Ltr', 145, 65),
(3, 'Cool Seal (Fibre Reinforced Coating) 10 Ltr', 141, 64),
(4, 'Cool Seal ( Fibre Reinforced Coating) 20 Ltr', 202, 47),
(5, 'COOL SEAL ( SOOTHING SAPPHIRE ) - 10 LTR', 182, 43),
(6, 'COOL SEAL ( TERRACOTTA ) - 10 LTR', 108, 76),
(7, 'COOL SEAL ( TERRACOTTA ) - 1 LTR', 200, 48),
(8, 'COOL SEAL ( TERRACOTTA ) - 20 LTR', 172, 55),
(9, 'EASY PAINT-X 1 LTR', 422, 50),
(10, 'EASY PAINT X 250 Ml', 181, 46),
(11, 'EASY PAINT-X  3 LTR', 126, 41),
(12, 'EASY PAINT -X 500 ML', 211, 68),
(13, 'FLOW FAAST 100 Lit Can', 175, 55),
(14, 'FLOW FAAST 1 Lit Can', 150, 74),
(15, 'FLOW FAAST 200 LIT CAN', 189, 42),
(16, 'FLOW FAAST 20 Lit Can', 136, 72),
(17, 'FLOW FAAST 500 Ml', 112, 69),
(18, 'FLOW FAAST - 50 LIT', 155, 51),
(19, 'FLOW FAAST 5 Lit. Can', 136, 50),
(20, 'GOSANA 10 Lit', 116, 56),
(21, 'GOSANA 1 Lit', 172, 49),
(22, 'GOSANA 20 Lit', 112, 78),
(23, 'GOSANA 4 Lit', 147, 42),
(24, 'MASTERBOND SBR LATEX – 1 LTR', 303, 58),
(25, 'MASTERBOND SBR LATEX – 20 LTR', 136, 45),
(26, 'MASTERBOND SBR LATEX – 5 LTR', 199, 49),
(27, 'M - COOL 10 LIT', 184, 73),
(28, 'M - COOL 1 LIT', 121, 53),
(29, 'M - COOL 20 LIT', 157, 48),
(30, 'M - COOL 4 LIT', 119, 41),
(31, 'METAL PRO 1 Lit.', 125, 62),
(32, 'METAL PRO 20 Lit', 168, 65),
(33, 'METAL PRO 250 Ml', 164, 58),
(34, 'METAL PRO 500 Ml', 114, 55),
(35, 'METAL PRO 5 Lit.', 181, 65),
(36, 'M-SAND BOOSTER 200 LIT', 159, 76),
(37, 'M - Sand BOOZTER 1LIT', 155, 65),
(38, 'M-Sand BOOZTER - 200 Ml', 196, 59),
(39, 'M - Sand BOOZTER 20LIT', 115, 61),
(40, 'M- Sand BOOZTER 50LIT', 190, 46),
(41, 'M - Sand BOOZTER 5LIT', 101, 49),
(42, 'NO - TERMITE 100 ML', 137, 66),
(43, 'NO-TERMITE 1 LIT TIN', 241, 64),
(44, 'NO - TERMITE 200 LIT', 192, 80),
(45, 'NO - TERMITE 20 LIT', 115, 48),
(46, 'NO - TERMITE 3 LIT TIN', 101, 42),
(47, 'NO - TERMITE 500 ML TIN', 161, 67),
(48, 'NO - TERMITE 5 LIT', 100, 46),
(49, 'NO to RUST 1 LTR Can', 153, 73),
(50, 'NO to RUST 20 LIT Can', 311, 63),
(51, 'NO to RUST 250 MLCan', 145, 58),
(52, 'NO to RUST 500 ML Can', 955, 62),
(53, 'NO to RUST 50 LIT Can', 178, 54),
(54, 'NO to RUST 5 Ltr Can', 122, 47),
(55, 'OYT [Sky Blue] 10 Ltr', 1621, 71),
(56, 'OYT [Sky Blue ] 1 Lit', 108, 55),
(57, 'OYT [Sky Blue] 20 Ltr', 123, 61),
(58, 'OYT [Sky Blue] 4 Ltr', 189, 62),
(59, 'OYT [White] 10 Ltr', 1006, 46),
(60, 'OYT [White] 1 Ltr', 138, 45),
(61, 'OYT [White] 20 Ltr', 195, 49),
(62, 'OYT [White] 4 Ltr', 134, 70),
(63, 'PACCA BLACK BOARD PAINT 1 LTR', 180, 42),
(64, 'PACCA BLACK BOARD PAINT 4 LTR', 167, 40),
(65, 'PACCA CEILING SHINE - SUPER CEILING WHITE EMULSION - 10 LTR', 194, 78),
(66, 'PACCA CEILING SHINE - SUPER CEILING WHITE EMULSION - 1 LTR', 171, 67),
(67, 'PACCA CEILING SHINE - SUPER CEILING WHITE EMULSION - 20 LTR', 170, 61),
(68, 'PACCA CEILING SHINE - SUPER CEILING WHITE EMULSION - 4 LTR', 159, 65),
(69, 'PACCA ECO PRIMER - 10 LTR', 216, 61),
(70, 'PACCA ECO PRIMER - 20 LTR', 102, 71),
(71, 'PACCA ENAMEL THINNER - 1 LTR', 161, 48),
(72, 'PACCA ENAMEL THINNER - 20 LTR', 199, 72),
(73, 'PACCA ENAMEL THINNER - 5 LTR', 111, 52),
(74, 'PACCA FLEXI BLOC ( Two part flexible  PS sealant) - 4 kg', 158, 46),
(75, 'PACCA FLOOR ( Floor coat emulsion ) F.Green - 10 Ltr', 157, 78),
(76, 'PACCA FLOOR ( Floor coat emulsion ) F.Green - 1 Ltr', 108, 45),
(77, 'PACCA FLOOR ( Floor coat emulsion ) F.Green - 20 Ltr', 175, 76),
(78, 'PACCA FLOOR ( Floor coat emulsion ) F.Green - 4 Ltr', 393, 42),
(79, 'PACCA FLOOR ( Floor coat emulsion ) F.Grey - 1 Ltr', 109, 65),
(80, 'PACCA FLOOR ( Floor coat emulsion ) F.Red - 1 Ltr', 106, 77),
(81, 'PACCA FLOOR ( Floor coat emulsion ) F.Yellow - 10 Ltr', 102, 67),
(82, 'PACCA FLOOR ( Floor coat emulsion ) F.Yellow - 1 Ltr', 195, 65),
(83, 'PACCA FLOOR ( Floor coat emulsion ) F.Yellow - 20 Ltr', 165, 44),
(84, 'PACCA FLOOR ( Floor coat emulsion ) F.Yellow - 4 Ltr', 139, 67),
(85, 'PACCA INSTA SHIELD THINNER - 5LIT', 102, 42),
(86, 'PACCA MAX eX EMULSION PAINT EXTERIOR BONE WHITE 10 LTR', 194, 49),
(87, 'PACCA MAX eX EMULSION PAINT EXTERIOR BONE WHITE 1 LTR', 162, 40),
(88, 'PACCA MAX eX EMULSION PAINT EXTERIOR BONE WHITE 20 LTR', 126, 53),
(89, 'PACCA MAX eX EMULSION PAINT EXTERIOR BONE WHITE 4 LTR', 149, 64),
(90, 'PACCA MAX eX EMULSION PAINT EXTERIOR  WHITE 10 LTR', 164, 41),
(91, 'PACCA MAX eX EMULSION PAINT EXTERIOR  WHITE 1 LTR', 174, 54),
(92, 'PACCA MAX eX EMULSION PAINT EXTERIOR  WHITE 20 LTR', 178, 69),
(93, 'PACCA MAX eX EMULSION PAINT EXTERIOR  WHITE 4 LTR', 167, 61),
(94, 'PACCA MAX EX EXTERIOR EMULSION ( MB ) 20 LTR', 100, 59),
(95, 'PACCA MAX EXTERIOR EMULSION ( DB ) 10 LTR', 100, 71),
(96, 'PACCA MAX EXTERIOR EMULSION ( DB ) 20 LTR', 103, 58),
(97, 'PACCA MAX EXTERIOR EMULSION ( DB ) - 4 LTR', 115, 78),
(98, 'PACCA MAX EXTERIOR EMULSION ( LB ) 10 LTR', 168, 55),
(99, 'PACCA MAX EXTERIOR EMULSION ( LB ) 1 LTR', 198, 43),
(100, 'PACCA MAX EXTERIOR EMULSION ( LB ) 20 LTR', 148, 51),
(101, 'PACCA MAX EXTERIOR EMULSION ( LB ) 4 LTR', 168, 44),
(102, 'PACCA MAX EXTERIOR EMULSION ( MB ) 10 LTR', 198, 71),
(103, 'PACCA MAX EXTERIOR EMULSION ( MB ) 1 LTR', 8455, 59),
(104, 'PACCA MAX EXTERIOR EMULSION ( MB ) 20 LTR', 279, 41),
(105, 'PACCA MAX EXTERIOR EMULSION ( MB ) 4 LTR', 197, 72),
(106, 'PACCA MAX EXTERIOR EMULSION ( TERRACOTTA ) 1 LTR', 182, 72),
(107, 'PACCA MAX EXTERIOR EMULSION ( WHITE ) 10 LTR', 126, 67),
(108, 'PACCA MAX EXTERIOR EMULSION ( WHITE ) 1 LTR', 185, 76),
(109, 'PACCA MAX EXTERIOR EMULSION ( WHITE ) 20 LTR', 144, 60),
(110, 'PACCA MAX EXTERIOR EMULSION ( WHITE ) 4 LTR', 166, 73),
(111, 'PACCA MAX EXTERIOR EMULSION ( WHITE ) 50 LTR', 200, 63),
(112, 'PACCA MAX EXTERIOR EMULSION ( Wild Yellow - 7865 ) 10 LTR', 198, 55),
(113, 'PACCA MAX EXTERIOR EMULSION ( Wild Yellow - 7865 ) 20 LTR', 190, 49),
(114, 'PACCA MAX TILE PRO  ( COPPER B 0587 ) 10 Ltr', 154, 40),
(115, 'PACCA MAX TILE PRO  ( COPPER B 0587 ) 20 Ltr', 102, 54),
(116, 'PACCA MAX TILE PRO  ( COPPER B 0587 ) 4 Ltr', 150, 69),
(117, 'PACCA MAX ULTRA EXTERIOR EMULSION ( Fawn - ON05 ) - 10 LTR', 142, 62),
(118, 'PACCA MAX ULTRA EXTERIOR EMULSION ( Fawn - ON05 ) - 20 LTR', 159, 65),
(119, 'PACCA MAX ULTRA EXTERIOR EMULSION ( Morning Glooy - 0765 ) - 10 LTR', 169, 59),
(120, 'PACCA MAX ULTRA EXTERIOR EMULSION ( Morning Glooy - 0765 ) - 20 LTR', 170, 59),
(121, 'PACCA MAX ULTRA EXTERIOR EMULSION (SPRING FROLIC 7787) 20 LIT', 142, 77),
(122, 'PACCA MAX ULTRA EXTERIOR EMULSION ( WHITE ) 10 LTR', 101, 47),
(123, 'PACCA MAX ULTRA EXTERIOR EMULSION ( WHITE ) 20 LTR', 183, 47),
(124, 'PACCA MAX ULTRA EXTERIOR EMULSION ( WHITE )4 LTR', 106, 56),
(125, 'PACCA MAX ULTRA EXTERIOR EMULSION ( WHITE ) 50 LTR', 184, 57),
(126, 'PACCA MIX PLASTER  1 KG', 100, 79),
(127, 'PACCA MIX PLASTER 20 KG', 150, 61),
(128, 'PACCA MIX PLASTER 40 KG', 148, 70),
(129, 'PACCA MIX PLASTER 5 KG', 189, 47),
(130, 'PACCA NEW SEAL ( HIGH STRENGTH PUTTY ) 40 Kg', 153, 64),
(131, 'PACCA PERMI GROUT (3K Epoxy Tile Grout) BLACK - 1 KG', 142, 61),
(132, 'PACCA PERMI GROUT (3K Epoxy Tile Grout) DARK GRAY - 1 KG', 104, 72),
(133, 'PACCA PERMI GROUT (3K Epoxy Tile Grout) IVORY - 1 KG', 199, 54),
(134, 'PACCA PERMI GROUT (3K Epoxy Tile Grout) IVORY  - 5 KG', 285, 55),
(135, 'PACCA PERMI GROUT (3K Epoxy Tile Grout) WHITE - 1 KG', 194, 75),
(136, 'PACCA PERMI GROUT (3K Epoxy Tile Grout) WHITE  - 5 KG', 122, 46),
(137, 'PACCA PERMI PRIME ( EPOXY PRIMER Base - 2.5 Kg + Hardener - 2.5 Kg )  5 KG', 192, 49),
(138, 'PACCA PERMI PRIME ( EPOXY PRIMER Base - 500 Gm + Hardener - 500 Gm )  1KG', 157, 68),
(139, 'PACCA PERMI PRIME ( EPOXY PRIMER Base - 5 Kg + Hardener - 5 Kg )  10 KG', 210, 69),
(140, 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base 4 Kg + Hardener - 1 Kg ) Black - 5 KG', 189, 61),
(141, 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base 4 Kg + Hardener - 1 Kg ) Deep Green - 5 KG', 177, 59),
(142, 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base 800 Gm + Hardener ? 200 Gm ) Cement Grey - 1 KG', 388, 73),
(143, 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base 800 Gm + Hardener ? 200 Gm ) Sky Blue - 1 KG', 161, 68),
(144, 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base - 8 Kg + Hardener - 2 Kg ) 10 KG', 151, 80),
(145, 'PACCA PERMI STRONG  ( EPOXY TOP COAT Base - 8 Kg + Hardener - 2 Kg ) Sky Blue - 10 KG', 171, 74),
(146, 'PACCA PREMIUM GLOSS ENAMEL 20 LTR ( GOLDEN BROWN )', 100, 52),
(147, 'PACCA PREMIUM GLOSS ENAMEL 20 LTR ( LIGHT GREY )', 190, 78),
(148, 'PACCA PREMIUM GLOSS ENAMEL 20 LTR ( SAND TUNE )', 147, 74),
(149, 'PACCA PREMIUM GLOSS ENAMEL 20 LTR ( SMOKE GREY )', 167, 55),
(150, 'PACCA PREMIUM GLOSS ENAMEL 20 LTR ( WHITE )', 194, 52),
(151, 'PACCA PREMIUM GLOSS ENAMEL 4 LTR ( BLUE BELL WHITE )', 165, 57),
(152, 'PACCA PREMIUM GLOSS ENAMEL 4 LTR ( LIGHT GREY )', 147, 48),
(153, 'PACCA PREMIUM GLOSS ENAMEL 4 LTR ( SAND TUNE )', 137, 69),
(154, 'PACCA PREMIUM GLOSS ENAMEL 4 LTR ( SMOKE GREY )', 146, 80),
(155, 'PACCA PREMIUM METAL PRIMER ( RED OXIDE ) 1 LTR', 119, 74),
(156, 'PACCA PREMIUM METAL PRIMER ( RED OXIDE ) 20  LTR', 157, 47),
(157, 'PACCA PREMIUM METAL PRIMER ( RED OXIDE ) 4 LTR', 125, 57),
(158, 'PACCA PREMIUM METAL PRIMER ( RED OXIDE ) 500 ML', 158, 63),
(159, 'PACCA PREMIUM METAL PRIMER ( YELLOW - ZP ) 1 LTR', 114, 62),
(160, 'PACCA PREMIUM METAL PRIMER ( YELLOW - ZP ) 20  LTR', 198, 40),
(161, 'PACCA PREMIUM METAL PRIMER ( YELLOW - ZP ) 4 LTR', 145, 60),
(162, 'PACCA PREMIUM METAL PRIMER ( YELLOW - ZP ) 500 ML', 130, 55),
(163, 'PACCA PREMIUM WOOD PRIMER 10 LTR ( WHITE )', 117, 56),
(164, 'PACCA PREMIUM WOOD PRIMER 1 LTR ( WHITE )', 197, 76),
(165, 'PACCA PREMIUM WOOD PRIMER 20 LTR ( WHITE )', 132, 49),
(166, 'PACCA PREMIUM WOOD PRIMER 4 LTR ( WHITE )', 168, 62),
(167, 'PACCA PREMIUM WOOD PRIMER 500 ML ( WHITE )', 145, 79),
(168, 'PACCA PROXY EP 505 - 1 KG', 172, 49),
(169, 'PACCA PUTTY BOOZTER - 1 LTR', 168, 52),
(170, 'PACCA PUTTY BOOZTER - 200 ML', 176, 70),
(171, 'PACCA SEAL 1 Kg  Can', 178, 76),
(172, 'PACCA SEAL 20 Kg  Can', 159, 46),
(173, 'PACCA SEAL 25 Kg  Can', 162, 44),
(174, 'PACCA SEAL 500 Gms', 1933, 43),
(175, 'PACCA SEAL 5 Kg  Can', 182, 44),
(176, 'PACCA SEAL GRS - 1 KG', 110, 50),
(177, 'PACCA SEAL GRS - 200 GM', 103, 80),
(178, 'PACCA SEAL GRS - 20 KG', 187, 46),
(179, 'PACCA SEAL GRS - 500 GM', 124, 74),
(180, 'PACCA SEAL GRS - 5 KG', 162, 69),
(181, 'Pacca Super Primer Interior Primer 10lit', 135, 41),
(182, 'Pacca Super Primer Interior Primer 1 Lit', 189, 40),
(183, 'Pacca Super Primer Interior Primer 20 Lit', 140, 80),
(184, 'Pacca Super Primer Interior Primer 4 Lit', 134, 75),
(185, 'PACCA UNIVERSAL BOOZTER - 1 LTR', 149, 54),
(186, 'PACCA UNIVERSAL BOOZTER - 200 ML', 144, 49),
(187, 'PACCA UNIVERSAL BOOZTER - 20 LTR', 172, 41),
(188, 'PACCA UNIVERSAL BOOZTER - 5 LTR', 125, 59),
(189, 'PACCA UNIVERSAL PRIMER 10 LTR', 113, 49),
(190, 'PACCA UNIVERSAL PRIMER 1 LTR', 190, 73),
(191, 'PACCA UNIVERSAL PRIMER 20 LTR', 107, 55),
(192, 'PACCA UNIVERSAL PRIMER 4 LTR', 168, 59),
(193, 'PACCA UNIVERSAL PRIMER 50 LTR', 117, 48),
(194, 'PAINT-X 1 Ltr. Tin', 183, 66),
(195, 'PAINT X 20 Ltr Can', 162, 63),
(196, 'PAINT X - 220 LTR', 170, 79),
(197, 'PAINT-X 250 Ml Tin', 128, 43),
(198, 'Paint-X 3 Lit Tin', 129, 63),
(199, 'PAINT-X 500 Ml Tin', 153, 61),
(200, 'REVE BOND 1000 Gms', 540, 80),
(201, 'REVE BOND 125 Gms', 194, 54),
(202, 'REVE BOND 250 Gms', 183, 71),
(203, 'REVE BOND 500 Gms', 285, 72),
(204, 'REVEFIL - N 1 KG (BLACK)', 183, 67),
(205, 'REVE FIL - N 1 KG (BLUE)', 145, 78),
(206, 'REVEFIL - N 1KG ( BRICK RED)', 176, 68),
(207, 'REVEFIL - N 1KG (BROWN)', 142, 69),
(208, 'REVEFIL - N 1KG ( GRAY)', 184, 57),
(209, 'REVEFIL - N1 KG ( GREEN )', 195, 40),
(210, 'REVEFIL - N 1 KG(IVORY)', 119, 70),
(211, 'REVE FIL - N 1 KG(PINK)', 115, 68),
(212, 'REVE FIL - N 1KG (PISTHA)', 118, 50),
(213, 'REVE FIL - N 1KG (TERRACOTTA)', 146, 49),
(214, 'REVEFIL - N 1KG(WHITE)', 173, 56),
(215, 'REVE FIL - N 1KG (YELLOW)', 127, 51),
(216, 'REVE FIL - N 50 KG ( GRAY)', 119, 48),
(217, 'REVE FIL - N 50 KG ( WHITE )', 114, 48),
(218, 'REVE FIX - N 10 KG', 113, 58),
(219, 'REVE FIX - N 1 KG( POUCH)', 123, 64),
(220, 'REVE FIX - N 20 KG', 177, 67),
(221, 'REVEFIX - N 25 Kg', 113, 62),
(222, 'REVE FIX - N 30 KG', 139, 67),
(223, 'REVE GRIP 100 GM', 140, 68),
(224, 'REVE GRIP 250 GM', 141, 69),
(225, 'REVE GRIP 500 GM', 142, 70),
(226, 'REVE GRIP 50 GM', 143, 71),
(227, 'SHINE TILE PU ENAMEL (BLUE MOON ) ? 4 Ltr', 144, 72),
(228, 'SHINE TILE (Signal Red) - 20 Lit', 145, 73),
(229, 'SHINE TILE [Black] 1 Lit.', 146, 74),
(230, 'SHINE TILE [Black] 4 Lit.', 147, 75),
(231, 'SHINE TILE [Brick Red] 1 Lit', 148, 76),
(232, 'SHINE TILE [BRICK RED] 20 LIT', 149, 77),
(233, 'SHINE TILE [Brick Red] 4 Lits', 150, 78),
(234, 'SHINE TILE [Brick Red] 500 Ml', 151, 79),
(235, 'SHINE TILE [Clear] 1 Lit', 152, 80),
(236, 'SHINE TILE [Clear] 4 Lits', 153, 81),
(237, 'SHINE TILE [Clear] 500 Ml', 154, 82),
(238, 'SHINE TILE [Hanuman Red] 1 Lit', 155, 83),
(239, 'SHINE TILE [Hanuman Red] 4 Lits', 156, 84),
(240, 'SHINE TILE [Hanuman Red] 500 Ml', 157, 85),
(241, 'SHINE TILE [Signal Red] 1 Lit', 158, 86),
(242, 'SHINE TILE [Signal Red] 4 Lit', 159, 87),
(243, 'SHINE TILE [Signal Red] 500ml', 160, 88),
(244, 'SHINE TILE [Terracotta] 1 Lit', 161, 89),
(245, 'SHINE TILE [Terracotta] 4 Lits', 162, 90),
(246, 'SHINE TILE [Terracotta] 500 Ml', 163, 91),
(247, 'SHINE TILE [Tile Red] 1 Lit', 164, 92),
(248, 'SHINE TILE [Tile Red] 4 Lits', 165, 93),
(249, 'SHINE TILE [Tile Red] 500 Ml', 166, 94),
(250, 'SHINE TILE [White] 1 Lit.', 167, 95),
(251, 'SHINE TILE [White] 4 Lits', 168, 96),
(252, 'SHINE TILE [White] 500 Ml', 169, 97),
(253, 'SOLAR KOAT  - LIQUID 125 ML', 170, 98),
(254, 'SOLAR KOAT -  POWDER 5 KG', 171, 99),
(255, 'SUMMERCOAT  - 10 KG', 172, 100),
(256, 'SUMMER COAT - LIQUID 125ML', 173, 101),
(257, 'SUMMER COAT - POWDER 5 KG', 174, 102),
(258, 'SummeR-EX 10 Kgs', 175, 103),
(259, 'SummeR-EX 1 Kg', 176, 104),
(260, 'SummeR-EX 20 Kgs', 177, 105),
(261, 'SummeR-EX 5 Kg', 178, 106),
(262, 'SUPERPLAST 400 ? 1 LTR', 179, 107),
(263, 'SUPERPLAST 400 ? 20 LTR', 180, 108),
(264, 'SUPERPLAST 400 ? 5 LTR', 181, 109),
(265, 'SURKI BOND 1 Lit', 182, 110),
(266, 'SURKI BOND 20 Lit.', 183, 111),
(267, 'SURKI BOND 5 Lit', 184, 112),
(268, 'SURYA KAVASH 1 Kg', 185, 113),
(269, 'SURYA KAVASH 20 Kgs', 186, 114),
(270, 'SURYA KAVASH 5 Kg', 187, 115),
(271, 'TEK SEAL 1 Kg Pouch[Gray]', 188, 116),
(272, 'TEK SEAL 1 Kg Pouch [White]', 189, 117),
(273, 'TILE PLUS 10 Lit [Brick Red]', 190, 118),
(274, 'TILE PLUS 10 Lit [Terracotta]', 191, 119),
(275, 'TILE PLUS 10 Lit [TILE RED]', 192, 120),
(276, 'TILE PLUS 1 Lit [Brick Red]', 193, 121),
(277, 'TILE PLUS 1 Lit [ JOLLY HOLLY )', 194, 122),
(278, 'TILE PLUS 1 Lit [SUNRISE)', 195, 123),
(279, 'TILE PLUS 1 Lit [Terracotta]', 196, 124),
(280, 'TILE PLUS 1 Lit [Tile Red]', 197, 125),
(281, 'TILE PLUS 20 Lit [BRICK RED]', 198, 126),
(282, 'TILE PLUS 20 Lit [Ollve Green]', 199, 127),
(283, 'TILE PLUS 20 Lit [ Terracotta]', 200, 128),
(284, 'TILE PLUS 20 Lit [Tile Red]', 201, 129),
(285, 'TILE PLUS 4 Lit [ Brick Red]', 202, 130),
(286, 'TILE PLUS 4 Lit [Terracotta]', 203, 131),
(287, 'TILE PLUS 4 Lit [TILE RED]', 204, 132),
(288, 'TOPBOND-(13KG+5Ltr)', 271, 133),
(289, 'TOTAL BOND 1000 Gms', 206, 134),
(290, 'TOTAL BOND 125 Gms', 207, 135),
(291, 'TOTAL BOND  250 Gms', 208, 136),
(292, 'TOTAL BOND  500 Gms', 209, 137),
(293, 'VECO CEMENT PRIMER EXTERIOR 10 LIT', 210, 138),
(294, 'VECO CEMENT PRIMER EXTERIOR 1 LIT', 211, 139),
(295, 'VECO CEMENT PRIMER EXTERIOR  4 LI T', 212, 140),
(296, 'VECO CEMENT PRIMER EXTERIORE 20 LIT', 213, 141),
(297, 'VECO EXTERIOR SPL PRIMER 10 LTR', 214, 142),
(298, 'VECO EXTERIOR SPL PRIMER 20 LTR', 215, 143),
(299, 'VECO EXTERIOR SPL PRIMER 50 LTR', 216, 144),
(300, 'VECO INTERIOR EMULSIOMN 10 LTR (LEMON SOUFFLE)', 217, 145),
(301, 'VECO INTERIOR EMULSION 10 Ltr (BASE )', 218, 146),
(302, 'VECO INTERIOR EMULSION 10 LTR (JOLLY HOLLY', 219, 147),
(303, 'VECO INTERIOR EMULSION 10 LTR ( WHITE)', 220, 148),
(304, 'VECO INTERIOR EMULSION1L LTR (JOLLY HOLLY', 221, 149),
(305, 'VECO INTERIOR EMULSION 1 Ltr ( BASE )', 222, 150),
(306, 'VECO INTERIOR EMULSION 1 LTR (SUN RISE)', 223, 151),
(307, 'VECO INTERIOR EMULSION  1 LTR (WHITE)', 224, 152),
(308, 'VECO INTERIOR EMULSION 20 Ltr (BASE )', 225, 153),
(309, 'VECO INTERIOR EMULSION  20 LTR (JOLLY HOLLY', 226, 154),
(310, 'Veco Interior Emulsion 20 Ltr (Lemon Souffle)', 227, 155),
(311, 'VECO INTERIOR EMULSION 20 LTR (WHITE)', 228, 156),
(312, 'VECO INTERIOR EMULSION 4 Ltr(BASE)', 229, 157),
(313, 'VECO INTERIOR EMULSION 4 LTR (JOLLY HOLLY)', 230, 158),
(314, 'VECO INTERIOR EMULSION 4 LTR (SUN RISE)', 231, 159),
(315, 'VECO INTERIOR EMULSION 4 LTR (WHITE)', 232, 160),
(316, 'VECO INTERIOR EMULSION SUNRISE 10 LIT', 233, 161),
(317, 'VECO INTERIOR EMULSION SUNRISE 20 LIT', 234, 162),
(318, 'VECO LATEX 1 Kg', 235, 163),
(319, 'VECO LATEX 20 Kgs', 236, 164),
(320, 'VECO LATEX 250 Gms', 237, 165),
(321, 'VECO LATEX 500 Gms', 238, 166),
(322, 'VECO LATEX 5 Kgs', 239, 167),
(323, 'VECO PRIMER 10 Lit Can', 240, 168),
(324, 'VECO PRIMER 1 Lit Can', 241, 169),
(325, 'VECO PRIMER 20 Lit Can', 242, 170),
(326, 'VECO PRIMER 4 Lit Can', 243, 171),
(327, 'VECO PRIMER - 50 LIT', 244, 172),
(328, 'V Flex G2K 10Kg', 251, 173),
(329, 'V FLEX G2K 1 KG', 256, 174),
(330, 'V Flex G2K 20Kg', 251, 175),
(331, 'V  FLEX G2K  5KG', 248, 176),
(332, 'VIJAY BASE COAT PRIMER 1 LTR', 249, 177),
(333, 'VIJAY BASE COAT PRIMER 20LITS', 250, 178),
(334, 'VIJAY BASE COAT PRIMER - 5 LIT', 251, 179),
(335, 'VIJAY TOP COAT GLOSS PAINT 1LIT', 252, 180),
(336, 'VIJAY TOP COAT GLOSS PAINT 20LIT', 253, 181),
(337, 'VIJAY WHITE EXTERIOR TILE PRIMER 10LIT', 254, 182),
(338, 'VIJAY WHITE INTERIOR TILE PRIMER 20 LIT', 255, 183),
(339, 'VIJAY WHITE INTERIOR TILE PRIMER 4 LIT', 256, 184),
(340, 'VIJAY WHITE WALL CAREPUTTY 1Kg', 257, 185),
(341, 'VIJAY WHITE  WALL CARE PUTTY 40 Kg', 258, 186),
(342, 'V-SEAL 1 Lit.', 259, 187),
(343, 'V-SEAL 20 Lit.', 260, 188),
(344, 'V-SEAL 5 Lit.', 261, 189),
(345, 'WATER SEAL (IW PLUS) 1 LTR', 262, 190),
(346, 'WATER SEAL (IW PLUS) 200 LIT', 263, 191),
(347, 'WATER SEAL (IW PLUS) - 200 ML', 264, 192),
(348, 'WATER SEAL (IW PLUS) 20 LTR', 265, 193),
(349, 'WATER SEAL (IW PLUS) - 500 ML', 266, 194),
(350, 'WATERSEAL (IW PLUS) 50 LIT', 267, 195),
(351, 'WATER SEAL (IW PLUS) 5 LTR', 268, 196),
(352, 'WATER SEAL  Liquid 100 Ml Can', 269, 197),
(353, 'WATER SEAL  Liquid 1 Lit.', 270, 198),
(354, 'WATER SEAL  Liquid  20 Lit Can', 271, 199),
(355, 'WATER SEAL Liquid 2.5 Ltr', 272, 200),
(356, 'WATER SEAL Liquid 500 Ml Can', 273, 201),
(357, 'WATER SEAL  Liquid 5 Lit', 274, 202),
(358, 'WATER SEAL  Powder 1 Kg Pkt', 275, 203),
(359, 'WATER SEAL   Powder 1 Kg  Pouch', 276, 204),
(360, 'WET SEAL 1 Lit', 277, 205),
(361, 'WET SEAL 20 Lit', 278, 206),
(362, 'WET SEAL 3 Lit', 279, 207),
(363, 'WET SEAL 500 Ml', 280, 208),
(364, 'WET SEAL 5 Lit', 281, 209),
(365, 'WOOD PRO 1 Lit', 282, 210),
(366, 'WOOD PRO 250 Ml', 283, 211),
(367, 'WOOD PRO 3 Ltr', 284, 212),
(368, 'WOOD PRO 500 Ml', 285, 213),
(369, 'WOOD PRO 5 Lit', 286, 214),
(370, 'CALCINED GYPSUM 1 Kg', 307, 215),
(371, 'CALCINED GYPSUM 40 Kg A Grade', 288, 216),
(372, 'CALCINED GYPSUM PLASTER  50 Kg A Grade', 289, 217),
(373, 'PACCA CRACK PASTE 4.5 KG', 290, 218),
(374, 'PACCA CRACK PASTE 900GM', 291, 219);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `u_measurement`
--

CREATE TABLE `u_measurement` (
  `id` int(11) NOT NULL,
  `Unit_name` varchar(255) DEFAULT NULL,
  `Unit_code` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `u_measurement`
--

INSERT INTO `u_measurement` (`id`, `Unit_name`, `Unit_code`) VALUES
(1, 'LIQUID', 'L'),
(2, 'POWDER', 'P'),
(3, 'PASTE', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `w_measurement`
--

CREATE TABLE `w_measurement` (
  `id` int(11) NOT NULL,
  `Weight_name` varchar(255) DEFAULT NULL,
  `Weight_code` varchar(7) DEFAULT NULL,
  `Weight_` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `w_measurement`
--

INSERT INTO `w_measurement` (`id`, `Weight_name`, `Weight_code`, `Weight_`) VALUES
(1, 'KG', '001.000', '1 KG'),
(2, 'KG', '005.000', '5 KG'),
(3, 'KG', '010.000', '10 KG'),
(4, 'KG', '020.000', '20 KG'),
(5, 'KG', '025.000', '25 KG'),
(6, 'KG', '030.000', '30 KG'),
(7, 'KG', '040.000', '40 KG'),
(8, 'L', '001.000', '1 LTR'),
(9, 'L', '005.000', '5 LTR'),
(10, 'L', '020.000', '20 LTR'),
(11, 'L', '050.000', '50 LTR'),
(12, 'L', '002.500', '2.5 LTR'),
(13, 'L', '003.000', '3 LTR'),
(14, 'L', '004.000', '4 LTR'),
(15, 'L', '010.000', '10 LTR'),
(16, 'ML', '000.500', '500 ML'),
(17, 'ML', '000.200', '200 ML'),
(18, 'ML', '000.100', '100 ML'),
(19, 'ML', '000.250', '250 ML'),
(20, 'G', '000.100', '100 G'),
(21, 'G', '000.250', '250 G'),
(22, 'G', '000.500', '500 G'),
(23, 'G', '000.050', '50 G'),
(24, 'G', '000.100', '100 G'),
(25, 'G', '000.125', '125 G'),
(26, 'G', '000.200', '200G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `box`
--
ALTER TABLE `box`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gatepass`
--
ALTER TABLE `gatepass`
  ADD PRIMARY KEY (`S_no`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_totals`
--
ALTER TABLE `order_totals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packaging`
--
ALTER TABLE `packaging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pp_in`
--
ALTER TABLE `pp_in`
  ADD PRIMARY KEY (`in_id`),
  ADD KEY `flag` (`flag`);

--
-- Indexes for table `pp_out`
--
ALTER TABLE `pp_out`
  ADD PRIMARY KEY (`out_id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_summary`
--
ALTER TABLE `product_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_totals`
--
ALTER TABLE `product_totals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_measurement`
--
ALTER TABLE `p_measurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qr`
--
ALTER TABLE `qr`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `qr_master`
--
ALTER TABLE `qr_master`
  ADD PRIMARY KEY (`uid`,`pr_code`,`p_date`,`batch`);

--
-- Indexes for table `sales_no`
--
ALTER TABLE `sales_no`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `u_measurement`
--
ALTER TABLE `u_measurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `w_measurement`
--
ALTER TABLE `w_measurement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `box`
--
ALTER TABLE `box`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_totals`
--
ALTER TABLE `order_totals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packaging`
--
ALTER TABLE `packaging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pp_in`
--
ALTER TABLE `pp_in`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pp_out`
--
ALTER TABLE `pp_out`
  MODIFY `out_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

--
-- AUTO_INCREMENT for table `product_summary`
--
ALTER TABLE `product_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_totals`
--
ALTER TABLE `product_totals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_measurement`
--
ALTER TABLE `p_measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qr`
--
ALTER TABLE `qr`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qr_master`
--
ALTER TABLE `qr_master`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `u_measurement`
--
ALTER TABLE `u_measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `w_measurement`
--
ALTER TABLE `w_measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
