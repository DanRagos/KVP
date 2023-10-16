-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 11:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_address` varchar(50) NOT NULL,
  `contact_person` varchar(75) NOT NULL,
  `contact_email` varchar(75) NOT NULL,
  `imglink` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `client_address`, `contact_person`, `contact_email`, `imglink`) VALUES
(1, 'ANTIPOLO HOSPITAL SYSTEM ANNEX IV / MEDICAL GALLERY', 'Antipolo, Rizal', 'Ronzuelo1', 'sonnynrt@gmail.com / medicalgallerytradingco@yahoo.com', '../image/uploads/mv santiago.webp'),
(2, 'BALAYAN BAYVIEW HOSPITAL AND MEDICAL CENTER', 'Balayan, Batangas', 'Jinn Euryale Baon - 0997.5533897 / 0945.3443629', 'jebaon98@gmail.com', '../image/uploads/mv santiago.webp'),
(3, 'MIRACULOUS FAITH ULTRASOUND AND DIAGNOSTIC CENTER', 'Malolos, Bulacan', 'Imelda \"Elda\" Del Rosario - 0925.8428713', 'n/a', '../image/uploads/mv santiago.webp'),
(4, 'PARAÑAQUE DOCTORS HOSPITAL', 'Parañaque City', 'Victor Pena - 0916.5312402', 'pdhpurch@yahoo.com / vic092073@gmail.com', '../image/uploads/mv santiago.webp'),
(5, 'QUEEN MARY HOSPITAL ', 'Ibaan, Batangas', 'Ronald Culata - 0955.6151221 / Hotline - 0977.3925212', 'queenmaryct2021@gmail.com', '../image/uploads/mv santiago.webp'),
(6, 'SAINT PASCAL DE BAYLON HOSPITAL ', 'San Pascual, Batangas', 'Emilia Nono - 0933.2280854', 'spdbhctscan@gmail.com', '../image/uploads/mv santiago.webp'),
(7, 'SILANG SPECIALIST MEDICAL CENTER', 'Silang, Cavite', 'Property - 0977.7666428 / Arlyn - 0926.0671416 / 0925.8365897', 'radiologydept.ssmc@gmail.com', '../image/uploads/mv santiago.webp'),
(8, 'ST. JOHN THE BAPTIST MEDICAL CENTER', 'Calamba, Laguna', 'Richard Soloverez - 0908.2114707 / 0915.4441795', 'richardsoloveres.rs@gmail.com', '../image/uploads/mv santiago.webp'),
(9, 'VALENZUELA CITICARE ', 'Valenzuela City', 'Clarence - 0908.8617594', 'cldeleon@citicare.com.ph', '../image/uploads/mv santiago.webp'),
(10, 'CENTRO MEDICO DE SANTISIMO ROSARIO', 'Balanga, Bataan', 'Tin - 0908.8823527', 'n/a', '../image/uploads/mv santiago.webp'),
(11, 'QUEEN MARY HOSPITAL (MOBILE TRUCK)', 'Ibaan, Batangas', 'Jesson - 0968.5638277', 'qmh.abuyog@gmail.com', '../image/uploads/mv santiago.webp'),
(12, 'GLOBAL CARE MEDICAL CENTER OF CANLUBANG', 'canlubang, laguna', 'glen- 09568990363', 'n/a', '../image/uploads/mv santiago.webp'),
(13, 'CLINICA LAGUNA MULTISPECIALTY CENTER AND DIAGNOSTICS (PARIAN)', 'Parian, Calamba', 'n/a', 'n/a', '../image/uploads/mv santiago.webp'),
(15, 'MEDISAFE MEDICAL AND HEALTH SERVICES', 'Pateros, Metro Manila', 'Dr. Kris Guevarra - 0917.8171389', 'jtlabpateros@gmail.com', '../image/uploads/mv santiago.webp'),
(17, 'SOUTH IMUS SPECIALIST HOSPITAL', 'Imus, Cavite', 'Ma\'am Vilma - 0960.5758220', 'radiology.sish@gmail.com', '../image/uploads/mv santiago.webp'),
(18, 'CLINICA LAGUNA MULTISPECIALTY CENTER AND DIAGNOSTICS (CABUYAO)', 'Cabuyao, Laguna', 'Ma\'am Mariz - 09959544578 / 09473245609', 'clinicalaguna.cabuyao@yahoo.com', '../image/uploads/mv santiago.webp'),
(19, 'MEDI-SKY DIAGNOSTIC CENTER AND MULTI-SPECIALTY CLINIC', 'Malusak, Sta. Rosa, Laguna', 'Ma\'am Lyn (Owner) - 09175037931 / Ma\'am Wendy - 09473245603', 'mediskycorporation@gmail.com', '../image/uploads/mv santiago.webp'),
(20, 'TANZA SPECIALIST MEDICAL CENTER', 'Tanza, Cavite ', ' PROPERTY Dept. - 09399067537 / RADTECH 09171599409', 'tsmcradiology@gmail.com', '../image/uploads/mv santiago.webp'),
(21, 'TAYABAS CITY HEALTH OFFICE (MOBILE TRUCK) / MEDICAL GALLERY', 'Tayabas, Quezon', 'Sir JC Manaig (Owner) - 09955501595 / Sir Arnel - 09177037482 / Radiology -', 'tayabaschoxray@gmail.com', '../image/uploads/mv santiago.webp'),
(22, 'TEKNOMED DIAGNOSTIC CENTER', 'Quezon City', 'Ma\'am Twinkle - 09663178109 / Ma\'am Pauline - 09064194782', 'teknomed.reception@gmail.com', '../image/uploads/mv santiago.webp'),
(23, 'HEALTHLINE MULTISPECIALTY CENTER MEDICAL AND LABORATORY', 'Ermita, Manila', 'tech erliza- 0948-131-8788', 'n/a', '../image/uploads/mv santiago.webp'),
(24, 'BOCAUE SPECIALIST MEDICAL CENTER', 'Bocaue, Bulacan', 'Ms. Apol Rad Tech 0968.6972143', 'n/a', '../image/uploads/mv santiago.webp'),
(25, 'APOLLO HILLSIDE CLINIC', 'Dasmariñas, Cavite', 'Clinic - 09214994298 / 09985364348', 'apollohilsideclinic@gmail.com', '../image/uploads/mv santiago.webp'),
(26, 'SAN LORENZO RUIZ HOSPITAL', 'naic, cavite', 'weng-', 'n/a', '../image/uploads/mv santiago.webp'),
(27, 'HOLY ROSARY OF CABUYAO HOSPITAL', 'Cabuyao, Laguna', 'Sir Mikee (Radtech) - 09274185206 / 09552782966', 'david_mikael@rocketmail.com', '../image/uploads/mv santiago.webp'),
(28, 'MEDICAL CENTER IMUS', 'Imus, Cavite', 'Ma\'am Vilma (Chief Radtech) - 09288381304 / Sir Evert (Radtech) - 091717779', 'mciradiology@gmail.com', '../image/uploads/mv santiago.webp'),
(29, 'OSPITAL NG IMUS ', 'Imus, Cavite ', 'Sir Urah - 09171737236', 'oniradio@yahoo.com', '../image/uploads/mv santiago.webp'),
(30, 'LOS BAÑOS DOCTORS HOSPITAL AND MEDICAL CENTER', 'Los Baños, Laguna', 'Ma\'am Hazel (Chief Tech) - 09177356713/ rowie 09913069178', 'facilities_management@lbdhmc.com.ph', '../image/uploads/mv santiago.webp'),
(31, 'BIÑAN DOCTORS HOSPITAL INC.', 'Biñan, Laguna ', 'Sir Nelson - 09178175568', 'nelsonvierneza@gmail.com', '../image/uploads/mv santiago.webp'),
(32, 'OUR LADY OF PILLAR MEDICAL CENTER (3)', 'Imus, Cavite ', 'Sir Mac - 09656404286', 'rad-004@olpmc.net', '../image/uploads/mv santiago.webp'),
(33, 'M DIAGNOSTICS PHILIPPINES INC. (PHILIPPINE AIRPORT DIAG LAB.)', 'Domestic Road, Airport', 'Dr. Christopher R. Hernandez - 0917.1555933', 'n/a', '../image/uploads/mv santiago.webp'),
(34, 'ASSUMPTION SPECIALTY HOSPITAL AND MEDICAL CENTER', 'Antipolo', 'Radiology Dept. - 09458644642', 'ashmc.radiology@gmail.com', '../image/uploads/mv santiago.webp'),
(35, 'CITY OF GENERAL TRIAS DOCTORS', 'General Trias, Cavite', 'Ma\'am Eva (Property) - 09179243487 / Radiology Dept. 09568332493 / Ma\'am Ch', 'kcrrtmha.radiologydept@gmail.com / ppdgtdmc@gmail.com / Radiology_gtdmc@yah', '../image/uploads/mv santiago.webp'),
(36, 'PINPOINT MEDICAL AND DIAGNOSTIC CENTER', 'Angono, Rizal', 'doc Besana- 09163712665', 'pinpointmdc@gmail.com', '../image/uploads/mv santiago.webp'),
(44, ' Test Client', 'Client, Address', 'test ppersone / 092130912039', 'testperson@gmail.com', '../image/uploads/mv santiago.webp'),
(45, 'RT Lim Family Hospital', 'Rt Lim, Zamboanga Sibugay', '', '', '../image/uploads/mv santiago.webp'),
(46, 'ROGACIANO M. MERCADO MEMORIAL HOSPITAL', 'Sta.Maria, Bulacan', 'Mam lulu- 09273221091', '', '../image/uploads/mv santiago.webp');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `contract_id` int(50) NOT NULL,
  `client_id` int(11) NOT NULL,
  `machine_type` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(100) NOT NULL,
  `frequency` varchar(20) NOT NULL,
  `turn_over` date NOT NULL,
  `coverage` date NOT NULL,
  `status` varchar(40) NOT NULL,
  `count` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `sv_call` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contract_id`, `client_id`, `machine_type`, `brand`, `model`, `frequency`, `turn_over`, `coverage`, `status`, `count`, `total`, `sv_call`) VALUES
(1, 25, 1, 'GE', 'Test', '1', '2023-01-16', '2024-01-15', '1', 0, 4, 0),
(2, 25, 2, 'GE', 'CTV', '1', '2023-01-17', '2024-01-18', '2', 0, 5, 25);

-- --------------------------------------------------------

--
-- Table structure for table `contract_type`
--

CREATE TABLE `contract_type` (
  `contract_id` int(11) NOT NULL,
  `quarterly` int(1) NOT NULL DEFAULT 1,
  `semi-annual` int(1) NOT NULL DEFAULT 2,
  `annual` int(1) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `machine_id` int(11) NOT NULL,
  `machine_type` varchar(30) NOT NULL,
  `machine_model` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`machine_id`, `machine_type`, `machine_model`) VALUES
(1, '1', ' GE / BrightSpeed 16 Slice'),
(2, '1', 'GE CTe / GE HiSpeed FXI'),
(3, '', 'GE / Revolution ACT'),
(4, '', 'GE / HiSpeed CTe Dual'),
(5, '', 'GE / Brivo 385 Series'),
(6, '1', 'GE / LightSpeed 16 Slice'),
(7, '1', 'GE Hispeed CTe'),
(8, '1', 'GE ct scan revolutionACT 16 slice'),
(9, '2', 'CT-Scan UPS'),
(10, '3', 'Picker '),
(11, '3', 'GE KX-21 / 300mA'),
(12, '3', 'Maxicon '),
(13, '3', 'DRE 140 / 500mA'),
(14, '3', 'Listem REX 525R'),
(15, '3', 'Dongmun / DM5125'),
(16, '3', 'KX-21/300ma'),
(17, '3', 'xray 300ma GE'),
(18, '3', 'JPI Healthcare DRE 140 / 500 mA'),
(19, '3', 'fuji smart fb'),
(20, '3', 'xray machine'),
(21, '3', 'xray machine 500ma'),
(22, '4', 'GE Refurbished & Jolly 30 Plus'),
(23, '4', 'Perlove PLX 101C'),
(24, '4', 'Dongmun DM525 MR / 400 mA'),
(25, '4', 'dongmun dm-525mr'),
(26, '4', 'Hitachi Sirius'),
(27, '5', 'Dongmun / DMX-600'),
(28, '5', 'Anke ASR4000'),
(29, '6', 'Genoray Zen2090 Pro'),
(30, '6', 'Genoray Oscar'),
(31, '7', 'Hitachi Aloka Prosound 2D Echo / Toshiba Xario Ult'),
(32, '7', 'Medison / Voluson / Voluson S6'),
(33, '7', 'Sonoace R5'),
(34, '7', 'Sonoace R7'),
(35, '7', 'Chison QBit7'),
(36, '8', 'Airis .3 Tesla '),
(37, '8', 'Openmark III'),
(38, '9', 'Carestream DirectView '),
(39, '9', 'Carestream Vita'),
(40, '9', 'Carestream Vita XE'),
(41, '9', 'Examvue CR PRO'),
(42, '9', 'Fuji Prima T2'),
(43, '10', 'Evis Exera II'),
(44, '11', 'clear 366-5 dry film medical printer');

-- --------------------------------------------------------

--
-- Table structure for table `machine_type`
--

CREATE TABLE `machine_type` (
  `machine_id` int(11) NOT NULL,
  `machine_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine_type`
--

INSERT INTO `machine_type` (`machine_id`, `machine_name`) VALUES
(1, 'CT SCAN MACHINE'),
(2, 'CT SCAN UPS'),
(3, 'GENERAL XRAY MACHINE'),
(4, 'PORTABLE / MOBILE XRAY MACHINE'),
(5, 'MAMMOGRAPHY MACHINE'),
(6, 'C-ARM MACHINE'),
(7, 'ULTRASOUND MACHINE'),
(8, 'MRI MACHINE'),
(9, 'CR SYSTEM MACHINE'),
(10, 'ENDOSCOPY MACHINE'),
(11, 'PRINTER MACHINE');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notif_id` int(11) NOT NULL,
  `notif_user` int(11) NOT NULL,
  `notif_name` varchar(100) NOT NULL,
  `notif_desc` text NOT NULL,
  `notif_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pms`
--

CREATE TABLE `pms` (
  `pms_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `service_date` date NOT NULL,
  `service_problem` text NOT NULL,
  `service_diagnosis` text NOT NULL,
  `service_done` text NOT NULL,
  `remarks` text NOT NULL,
  `service_by` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pms`
--

INSERT INTO `pms` (`pms_id`, `schedule_id`, `service_date`, `service_problem`, `service_diagnosis`, `service_done`, `remarks`, `service_by`, `status`) VALUES
(2, 1, '2021-10-07', '', '', '', '', 'Cloyd / Jeff / Dred / Aldrin', 2),
(3, 2, '2021-01-07', '', '', '', '', 'Cloyd / Jeff / Dred / Aldrin', 2),
(4, 3, '2022-03-11', '', '', '', '', 'Dred / Cloyd', 2),
(5, 1, '2021-10-07', '', '', '', '', 'Jeff, Cloyd, Aldrin, Dred', 2),
(6, 2, '2022-01-07', '', '', '', '', 'Jeff / Cloyd / Aldrin / Dred', 2),
(7, 3, '2022-03-11', '', '', '', '', 'Jeff / Cloyd / Aldrin / Dred', 2),
(8, 4, '2022-06-09', '', '', '', '', 'Jeff / Dred / Aldrin / Cloyd', 2),
(9, 5, '2022-09-23', '', '', '', '', 'Jeff / Cloyd / Dred /Aldrin', 2),
(10, 53, '2021-04-20', '', '', '', '', 'Aldrin / Cloyd / Dred / Jeff', 2),
(11, 54, '2021-07-09', '', '', '', '', 'Aldrin / Cloyd / Dred / Jeff', 2),
(12, 55, '2021-10-21', '', '', '', '', 'Aldrin / Cloyd / Dred / Jeff', 2),
(13, 56, '2022-01-31', '', '', '', '', 'Aldrin / Cloyd / Dred /Jeff', 2),
(14, 57, '2022-04-11', '', '', '', '', 'Aldrin / Cloyd / Dred / Jeff', 2),
(15, 58, '2022-06-28', '', '', '', '', 'Aldrin / Cloyd / Dred / Jeff', 2),
(16, 59, '2022-10-19', '', '', '', '', 'Aldrin / Cloyd / Dred / Jeff', 2),
(17, 61, '2022-03-08', '', '', '', '', 'Aldrin / Cloyd / Dred / Jeff', 2),
(18, 62, '2022-06-08', '', '', '', '', 'Aldrin / Cloyd / Dred / Jeff', 2),
(19, 63, '2022-08-24', '', '', '', '', 'Aldrin / Cloyd / Dred / Jeff', 2),
(20, 64, '2022-11-10', '', '', '', '', 'Aldrin / Cloyd / Dred / Jeff', 2),
(21, 67, '2022-03-01', '', '', '', '', 'ACDJ', 2),
(22, 68, '2022-07-29', '', '', '', '', 'ACDJ', 2),
(23, 69, '2022-09-01', '', '', '', '', 'ACDJ', 2),
(24, 71, '2021-09-21', '', '', '', '', 'ACDJ', 2),
(25, 72, '2021-12-21', '', '', '', '', 'ACDJ', 2),
(26, 73, '2022-03-21', '', '', '', '', 'ACDJ', 2),
(27, 74, '2022-04-22', '', '', '', '', 'ACDJ', 2),
(28, 75, '2022-07-22', '', '', '', '', 'ACDJ', 2),
(29, 76, '2022-10-19', '', '', '', '', 'ACDJ', 2),
(30, 77, '2021-07-01', '', '', '', '', 'CDJ', 2),
(31, 78, '2021-09-21', '', '', '', '', 'CDJ', 2),
(32, 79, '2022-03-01', '', '', '', '', 'CDJ', 2),
(33, 80, '2022-04-22', '', '', '', '', 'CDJ', 2),
(34, 81, '2022-07-22', '', '', '', '', 'CD', 2),
(35, 82, '2022-10-19', '', '', '', '', 'CDJ', 2),
(36, 83, '2021-09-01', '', '', '', '', 'CDJ', 2),
(37, 84, '2022-01-17', '', '', '', '', 'CDJ', 2),
(38, 85, '2022-04-26', '', '', '', '', 'CDJ', 2),
(39, 86, '2022-07-11', '', '', '', '', 'CDJ', 2),
(40, 87, '2022-10-19', '', '', '', '', 'CDJ', 2),
(41, 99, '2021-11-18', '', '', '', '', 'CDJ', 2),
(42, 100, '2022-02-01', '', '', '', '', 'CDJ', 2),
(43, 101, '2022-08-31', '', '', '', '', 'CDJ', 2),
(44, 102, '2022-09-07', '', '', '', '', 'CDJ', 2),
(45, 103, '0022-09-02', '', '', '', '', 'CDJ', 2),
(46, 107, '2022-06-08', '', '', '', '', 'CDJ', 2),
(47, 108, '2022-10-05', '', '', '', '', 'CDJ', 2),
(48, 111, '2022-06-30', '', '', '', '', 'CDJ', 2),
(49, 112, '2022-09-20', '', '', '', '', 'CDJ', 2),
(50, 115, '2022-09-28', '', '', '', '', 'CDJ', 2),
(51, 127, '2022-03-23', '', '', '', '', 'AJ', 2),
(52, 131, '2022-07-28', '', '', '', '', 'DCJ', 2),
(53, 132, '2022-09-02', '', '', '', '', 'CDJ', 2),
(54, 133, '2022-11-08', '', '', '', '', 'CDJ', 2),
(55, 135, '2022-08-01', '', '', '', '', 'CDJ', 2),
(56, 136, '2022-09-02', '', '', '', '', 'CDJ', 2),
(57, 139, '2022-02-08', '', '', '', '', 'CDJ', 2),
(58, 140, '2022-02-08', '', '', '', '', 'CDJ', 2),
(59, 141, '2022-08-01', '', '', '', '', 'CDJ', 2),
(60, 142, '2022-10-04', '', '', '', '', 'CDJ', 2),
(61, 144, '2022-02-10', '', '', '', '', 'CDJ', 2),
(62, 145, '2022-05-11', '', '', '', '', 'CDJ', 2),
(63, 146, '2022-07-01', '', '', '', '', 'CDJ', 2),
(64, 147, '2022-10-05', '', '', '', '', 'CDJ', 2),
(65, 152, '2022-03-23', '', '', '', '', 'CDJ', 2),
(66, 128, '2022-08-26', '', '', '', '', 'CDJ', 2),
(67, 153, '2022-08-26', '', '', '', '', 'CDJ', 2),
(68, 156, '2022-08-16', '', '', '', '', 'CDJ', 2),
(69, 160, '2022-03-15', '', '', '', '', 'CDJ', 2),
(70, 161, '2022-08-22', '', '', '', '', 'CDJ', 2),
(71, 164, '2022-06-13', '', '', '', '', 'CDJ', 2),
(72, 165, '2022-09-14', '', '', '', '', 'CDJ', 2),
(73, 166, '2022-11-09', '', '', '', '', 'CDJ', 2),
(74, 168, '2022-07-01', '', '', '', '', 'CDJ', 2),
(75, 169, '2022-09-14', '', '', '', '', 'CDJ', 2),
(76, 170, '2022-11-09', '', '', '', '', 'CDJ', 2),
(77, 176, '2022-08-24', '', '', '', '', 'CDJ', 2),
(78, 177, '2022-11-03', '', '', '', '', 'CDJ', 2),
(79, 192, '2022-06-30', '', '', '', '', 'CDJ', 2),
(80, 193, '2022-09-20', '', '', '', '', 'CDJ', 2),
(81, 204, '2022-09-12', '', '', '', '', 'CDJ', 2),
(82, 208, '2022-10-12', '', '', '', '', 'CDJ', 2),
(83, 216, '2022-10-11', '', '', '', '', 'CDJ', 2),
(84, 218, '2022-03-23', '', '', '', '', 'CDJ', 2),
(85, 219, '2022-08-26', '', '', '', '', 'CDJ', 2),
(86, 222, '2022-01-11', '', '', '', '', 'CDJ', 2),
(87, 223, '2022-04-21', '', '', '', '', 'CDJ', 2),
(88, 224, '2022-08-04', '', '', '', '', 'CDJ', 2),
(89, 225, '2022-10-11', '', '', '', '', 'CDJ', 2),
(90, 226, '2022-08-24', '', '', '', '', 'CDJ', 2),
(91, 226, '2022-08-24', '', '', '', '', 'CDJ', 2),
(92, 227, '2022-11-15', '', '', '', '', 'CDJ', 2),
(93, 242, '2022-09-20', '', '', '', '', 'CDJ', 2),
(94, 254, '2022-08-24', '', '', '', '', 'CDJ', 2),
(95, 255, '2022-11-03', '', '', '', '', 'CDJ', 2),
(96, 270, '2022-02-08', '', '', '', '', 'CDJ', 2),
(97, 271, '2022-05-20', '', '', '', '', 'CDJ', 2),
(98, 272, '2022-09-02', '', '', '', '', 'CDJ', 2),
(99, 282, '2021-10-04', '', '', '', '', 'CDJ', 2),
(100, 283, '2022-01-11', '', '', '', '', 'CDJ', 2),
(101, 284, '2022-03-24', '', '', '', '', 'CDJ', 2),
(102, 285, '2022-06-16', '', '', '', '', 'CDJ', 2),
(103, 286, '2022-09-12', '', '', '', '', 'CDJ', 2),
(104, 290, '2022-08-24', '', '', '', '', 'CDJ', 2),
(105, 291, '2022-11-03', '', '', '', '', 'CDJ', 2),
(106, 306, '2021-12-10', '', '', '', '', 'CDJ', 2),
(107, 307, '2022-03-16', '', '', '', '', 'CDJ', 2),
(108, 309, '2022-09-10', '', '', '', '', 'CDJ', 2),
(109, 310, '2021-12-10', '', '', '', '', 'CDJ', 2),
(110, 311, '2022-03-16', '', '', '', '', 'CDJ', 2),
(111, 312, '2022-08-30', '', '', '', '', 'CDJ', 2),
(112, 314, '2022-03-23', '', '', '', '', 'CDJ', 2),
(113, 315, '2022-08-26', '', '', '', '', 'CDJ', 2),
(114, 318, '2022-03-23', '', '', '', '', 'CDJ', 2),
(115, 319, '2022-08-26', '', '', '', '', 'CDJ', 2),
(116, 322, '2022-03-15', '', '', '', '', 'CDJ', 2),
(117, 323, '2022-08-22', '', '', '', '', 'CDJ', 2),
(118, 326, '2022-09-13', '', '', '', '', 'CDJ', 2),
(119, 334, '2022-07-28', '', '', '', '', 'CDJ', 2),
(120, 335, '2022-09-02', '', '', '', '', 'CDJ', 2),
(121, 336, '2022-11-08', '', '', '', '', 'CDJ', 2),
(122, 338, '2022-08-01', '', '', '', '', 'CDJ', 2),
(123, 339, '2022-09-02', '', '', '', '', 'CDJ', 2),
(124, 340, '2022-11-08', '', '', '', '', 'CDJ', 2),
(125, 342, '2022-02-10', '', '', '', '', 'CDJ', 2),
(126, 343, '2022-05-11', '', '', '', '', 'CDJ', 2),
(127, 344, '2022-07-01', '', '', '', '', 'CDJ', 2),
(128, 345, '2022-10-05', '', '', '', '', 'CDJ', 2),
(129, 350, '2022-08-16', '', '', '', '', 'CDJ', 2),
(130, 354, '2022-06-13', '', '', '', '', 'CDJ', 2),
(131, 355, '2022-09-14', '', '', '', '', 'CDJ', 2),
(132, 356, '2022-11-09', '', '', '', '', 'CDJ', 2),
(133, 358, '2022-07-01', '', '', '', '', 'CDJ', 2),
(134, 359, '2022-09-14', '', '', '', '', 'CDJ', 2),
(135, 360, '2022-11-09', '', '', '', '', 'CDJ', 2),
(136, 366, '2022-08-24', '', '', '', '', 'CDJ', 2),
(137, 367, '2022-11-03', '', '', '', '', 'CDJ', 2),
(138, 382, '2022-10-12', '', '', '', '', 'CDJ', 2),
(139, 390, '2022-09-20', '', '', '', '', 'CDJ', 2),
(140, 396, '2022-11-07', '', '', '', '', 'CDJ', 2),
(141, 273, '2022-11-21', '', '', '', '', 'CDJ', 2),
(142, 70, '2022-11-16', '', '', '', '', 'CDJ', 2),
(143, 400, '2022-04-28', '', '', '', '', 'CDJ', 2),
(144, 401, '2022-08-02', '', '', '', '', 'CDJ', 2),
(145, 402, '2022-10-12', '', '', '', '', 'CDJ', 2),
(146, 404, '2022-04-28', '', '', '', '', 'CDJ', 2),
(147, 405, '2022-08-02', '', '', '', '', 'CDJ', 2),
(148, 406, '2022-10-12', '', '', '', '', 'CDJ', 2),
(149, 408, '2022-04-28', '', '', '', '', 'CDJ', 2),
(150, 409, '2022-08-02', '', '', '', '', 'CDJ', 2),
(151, 410, '2022-10-12', '', '', '', '', 'CDJ', 2),
(152, 412, '2020-10-12', '', '', '', '', 'CDJ', 2),
(153, 413, '2020-03-05', '', '', '', '', 'CDJ', 2),
(154, 414, '2021-04-26', '', '', '', '', 'CDJ', 2),
(155, 415, '2021-07-29', '', '', '', '', 'CDJ', 2),
(156, 416, '2021-10-19', '', '', '', '', 'CDJ', 2),
(157, 417, '2022-01-26', '', '', '', '', 'CDJ', 2),
(158, 418, '2022-05-24', '', '', '', '', 'CDJ', 2),
(159, 419, '2022-08-09', '', '', '', '', 'CDJ', 2),
(160, 157, '2022-11-24', '', '', '', '', 'CDJ', 2),
(161, 351, '2022-11-24', '', '', '', '', 'CDJ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `location` varchar(150) NOT NULL,
  `report_name` varchar(40) NOT NULL,
  `report_date` date NOT NULL,
  `generated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `machine_type` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `count` int(11) NOT NULL,
  `guest` varchar(150) NOT NULL,
  `rep_problem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `client_id`, `machine_type`, `model`, `contract_id`, `schedule_date`, `status`, `count`, `guest`, `rep_problem`) VALUES
(1, 0, 0, '', 1, '2023-01-16', 0, 0, '', ''),
(2, 0, 0, '', 2, '2023-01-17', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `service_call`
--

CREATE TABLE `service_call` (
  `service_id` int(11) NOT NULL,
  `client_address` varchar(100) NOT NULL,
  `client` varchar(200) NOT NULL,
  `machine_type` int(11) NOT NULL,
  `model` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `mem_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(100) NOT NULL,
  `imglink` varchar(100) NOT NULL,
  `descrip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`mem_id`, `firstname`, `lastname`, `username`, `email`, `password`, `type`, `imglink`, `descrip`) VALUES
(1, 'David Daniel      ', 'Ragos', 'davidragos', 'dandanragos@gmail.com', 'Dandan2x!', 'admin\r\n', '../userpics/images.jpg', ''),
(2, 'Alliah Grace            ', 'Dolors', 'alliahdolor', 'alliahdolor@gmail.com', 'Dandan2x!', 'admin', '../userpics/images.jpg', ''),
(3, 'Test User       ', 'Ragosss', '', 'test@gmail.com', 'Dandan2x!', 'Viewer', '../userpics/2.jpg', ''),
(8, 'Alliah  ', 'Dolorss', 'alliahxD', 'alliahdolor@yahoo.com', 'Alliah089!', 'Viewer', '../userpics/avatar.png', ''),
(9, 'Test', 'Dolor', 'dolortest', 'dolortest@gmail.com', 'Dandan2x!', 'Viewer', '../userpics/Sample_User_Icon.png', ''),
(10, 'Alliah Grace', 'Dolor', 'alliahdolor', 'alliahdolor@gmail.com', 'Alliahdolor123', 'Viewer', '../userpics/Sample_User_Icon.png', ''),
(11, 'Visitor', 'Ragos', 'visitor123', 'visitor@gmail.com', '12345678', 'Viewer', '../userpics/Profile-Male-PNG.png', ''),
(12, 'galie', 'laza', 'galieboy', 'lazagalie009@gmail.com', '1234', 'Admin', '../userpics/mtb.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`contract_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`machine_id`);

--
-- Indexes for table `machine_type`
--
ALTER TABLE `machine_type`
  ADD PRIMARY KEY (`machine_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `pms`
--
ALTER TABLE `pms`
  ADD PRIMARY KEY (`pms_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `contract_id` (`contract_id`);

--
-- Indexes for table `service_call`
--
ALTER TABLE `service_call`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`mem_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `contract_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `machine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `machine_type`
--
ALTER TABLE `machine_type`
  MODIFY `machine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pms`
--
ALTER TABLE `pms`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_call`
--
ALTER TABLE `service_call`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`contract_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
