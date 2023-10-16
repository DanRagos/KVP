-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 09:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kvp`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomplished_schedule`
--

CREATE TABLE `accomplished_schedule` (
  `id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `accomp_date` date NOT NULL,
  `diagnosis` varchar(150) NOT NULL,
  `service_don` text NOT NULL,
  `recomm` text NOT NULL,
  `accomp_status` int(11) NOT NULL DEFAULT 2,
  `withC` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accomplished_schedule`
--

INSERT INTO `accomplished_schedule` (`id`, `schedule_id`, `accomp_date`, `diagnosis`, `service_don`, `recomm`, `accomp_status`, `withC`) VALUES
(1, 1, '2023-08-23', 'GE', 'Test', 'Done', 2, 0),
(2, 2, '2023-08-22', 'Test', 'SV Guest', 'GE', 2, 0),
(3, 4, '2023-08-25', 'Diagnosis hehehz', 'SV Contract Based', 'Dada', 3, 0),
(4, 3, '2023-08-24', 'GE', 'SV Non Contract Based', 'GE', 2, 0),
(5, 9, '2023-10-26', 'Noonee', 'Testt', 'Tra', 2, 0),
(6, 12, '2023-08-25', 'Pm no.1 ', 'Testt ', 'None', 2, 0),
(7, 15, '2023-08-25', 'sadas', 'asdas', 'asd', 2, 0),
(8, 16, '2023-08-25', 'asdas', 'asdas', 'asdas', 2, 0),
(9, 17, '2023-08-25', 'asd', 'asd', 'asd', 2, 0),
(10, 18, '2023-08-25', 'asdsa', 'asd', 'asdas', 2, 0),
(11, 19, '2023-08-25', 'asd', 'asdas', 'asd', 2, 0),
(12, 22, '2023-08-25', 'GEasdsa', 'asdasd', 'asdsad', 2, 0),
(13, 24, '2023-08-25', 'asda', 'asdas', 'dasda', 2, 0),
(14, 25, '2023-08-25', 'asdasd', 'asdsad', 'asdasdsa', 2, 0),
(15, 26, '2023-08-25', 'asdasd', 'asd', 'asd', 2, 0),
(16, 27, '2023-08-25', 'asdas', 'asd', 'asdad', 2, 0),
(17, 28, '2023-08-25', 'asdasd', 'asd', 'assadasd', 2, 0),
(18, 29, '2023-08-25', 'sad', 'asd', 'asdas', 2, 0),
(19, 30, '2023-08-30', 'Test', 'Donee', 'GEGE', 2, 0),
(20, 33, '2024-08-30', 'Test', 'None', 'Done', 2, 0),
(21, 6, '2023-08-31', 'GE', 'Test dsaaddada', 'asdasdasdaasda', 3, 0),
(22, 6, '2023-08-31', 'GE', 'Test dsaaddada', 'asdasdasdaasda', 3, 0),
(23, 6, '2023-08-31', 'GE', 'Test dsaaddada', 'asdasdasdaasda', 3, 0),
(24, 6, '2023-08-25', 'adasdsa', 'asdasdasdas', 'adasdadasasdasdasdasdas', 3, 0),
(25, 6, '2023-08-25', 'adasdsa', 'asdasdasdas', 'adasdadasasdasdasdasdas', 3, 0),
(26, 6, '2023-08-25', 'adasdsa', 'asdasdasdas', 'adasdadasasdasdasdasdas', 3, 0),
(27, 6, '2023-08-25', 'adasdsa', 'asdasdasdas', 'adasdadasasdasdasdasdas', 3, 0),
(28, 6, '2023-08-25', 'adasdsa', 'asdasdasdas', 'adasdadasasdasdasdasdas', 3, 0),
(29, 6, '2023-08-25', 'adasdsa', 'asdasdasdas', 'adasdadasasdasdasdasdas', 3, 0),
(30, 6, '2023-08-25', 'adasdsa', 'asdasdasdas', 'adasdadasasdasdasdasdas', 3, 0),
(31, 6, '2023-08-31', 'Test', 'Nonneee', 'GEEE Test', 2, 0),
(32, 6, '2023-08-31', 'Test', 'Nonneee', 'GEEE Test', 2, 0),
(33, 4, '2023-08-31', 'asdada', 'Tead', 'asdasdsdddasd', 2, 0),
(34, 4, '2023-08-31', 'asdada', 'Tead', 'asdasdsdddasd', 2, 0),
(35, 48, '2023-11-23', 'None', 'Test Tatyp asdja', 'Damdam asdaldkslak', 2, 0),
(36, 50, '2023-09-13', 'GE', 'Test', 'Testt', 2, 0),
(37, 50, '2023-09-13', 'GE', 'Test', 'Testt', 2, 0),
(38, 51, '2023-09-21', 'GE', 'TEst', 'ASDsdaas', 2, 0),
(39, 51, '2023-09-21', 'GE', 'TEst', 'ASDsdaas', 2, 0),
(40, 53, '2023-09-13', 'GE', 'Test', 'asdassa', 2, 0),
(41, 55, '2023-09-21', 'Tesa', 'GE', 'asdsadsadsa', 2, 0),
(42, 55, '2023-09-21', 'Tesa', 'GE', 'asdsadsadsa', 2, 0),
(43, 55, '2023-09-21', 'Tesa', 'GE', 'asdsadsadsa', 2, 0),
(44, 55, '2023-09-21', 'Tesa', 'GE', 'asdsadsadsa', 2, 0),
(45, 52, '2023-09-21', 'GE', 'Test', 'asdadasdaas', 2, 0),
(46, 46, '2023-10-04', ' HG', 'Teads', 'asdadada', 2, 0),
(47, 56, '2023-09-19', 'asdasd', 'adsasd', 'werrwe', 2, 0),
(48, 56, '2023-09-19', 'asdasd', 'adsasd', 'werrwe', 2, 0),
(49, 56, '2023-09-19', 'asdasd', 'adsasd', 'werrwe', 2, 0),
(50, 7, '2023-09-14', 'GE', 'asdasd', 'asdasdsadasdasdsdas', 2, 0),
(51, 7, '2023-09-14', 'GE', 'asdasd', 'asdasdsadasdasdsdas', 2, 0),
(52, 8, '2023-09-28', 'Test', 'asdasdsa', 'asdadasdasasdasda', 2, 0),
(53, 57, '2023-09-14', 'GE', 'Teasd', 'asdadsada', 2, 0),
(54, 57, '2023-09-14', 'GE', 'Teasd', 'asdadsada', 2, 0),
(55, 57, '2023-09-14', 'GE', 'Teasd', 'asdadsada', 2, 0),
(56, 57, '2023-09-14', 'GE', 'Teasd', 'asdadsada', 2, 0),
(57, 54, '2023-09-29', 'asdas', 'dadasdasdasa', 'sdasdasdasdasas', 2, 0),
(58, 54, '2023-09-29', 'asdas', 'dadasdasdasa', 'sdasdasdasdasas', 2, 0),
(59, 54, '2023-09-29', 'asdas', 'dadasdasdasa', 'sdasdasdasdasas', 2, 0),
(60, 58, '2023-09-14', 'asda', 'dasdasdas', 'sdasdasdas', 2, 0),
(61, 58, '2023-09-14', 'asda', 'dasdasdas', 'sdasdasdas', 2, 0),
(62, 59, '2023-09-21', 'asdasd', 'SAd', 'sdasdas', 2, 0),
(63, 60, '2023-09-27', 'Asadas', 'Testasda', 'adasdsadsadas', 2, 0),
(64, 60, '2023-09-27', 'Asadas', 'Testasda', 'adasdsadsadas', 2, 0),
(65, 60, '2023-09-27', 'Asadas', 'Testasda', 'adasdsadsadas', 2, 0),
(66, 60, '2023-09-27', 'Asadas', 'Testasda', 'adasdsadsadas', 2, 0),
(67, 61, '2023-09-28', 'adas', 'asd', 'asdasdasdasas', 2, 0),
(68, 61, '2023-09-28', 'adas', 'asd', 'asdasdasdasas', 2, 0),
(69, 67, '2023-09-13', 'GE', 'Teasd', 'asdasdsa', 2, 0),
(70, 78, '2023-09-20', 'GE', 'asdasdsa', 'asdsadasas', 2, 0);

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
  `imglink` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `client_address`, `contact_person`, `contact_email`, `imglink`) VALUES
(1, 'ANTIPOLO HOSPITAL SYSTEM ANNEX IV / MEDICAL GALLERY', 'Antipolo, Rizal', 'Ronzuelo', 'sonnynrt@gmail.com / medicalgallerytradingco@yahoo.com', '../image/uploads/mv santiago.webp'),
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
(29, 'OSPITAL NG IMUS ', 'Imus, Cavite', 'Sir Urah - 09171737236', 'oniradio@yahoo.com', '../image/uploads/mv santiago.webp'),
(30, 'LOS BAÑOS DOCTORS HOSPITAL AND MEDICAL CENTER', 'Los Baños, Laguna', 'Ma\'am Hazel (Chief Tech) - 09177356713/ rowie 09913069178', 'facilities_management@lbdhmc.com.ph', '../image/uploads/mv santiago.webp'),
(31, 'BIÑAN DOCTORS HOSPITAL INC.', 'Biñan, Laguna', 'Sir Nelson - 09178175568', 'nelsonvierneza@gmail.com', '../image/uploads/mv santiago.webp'),
(32, 'OUR LADY OF PILLAR MEDICAL CENTER (3)', 'Imus, Cavite ', 'Sir Mac - 09656404286', 'rad-004@olpmc.net', '../image/uploads/mv santiago.webp'),
(33, 'M DIAGNOSTICS PHILIPPINES INC. (PHILIPPINE AIRPORT DIAG LAB.)', 'Domestic Road, Airport', 'Dr. Christopher R. Hernandez - 0917.1555933', 'n/a', '../image/uploads/mv santiago.webp'),
(34, 'ASSUMPTION SPECIALTY HOSPITAL AND MEDICAL CENTER', 'Antipolo', 'Radiology Dept. - 09458644642', 'ashmc.radiology@gmail.com', '../image/uploads/mv santiago.webp'),
(35, 'CITY OF GENERAL TRIAS DOCTORS', 'General Trias, Cavite', 'Ma\'am Eva (Property) - 09179243487 / Radiology Dept. 09568332493 / Ma\'am Ch', 'kcrrtmha.radiologydept@gmail.com / ppdgtdmc@gmail.com / Radiology_gtdmc@yah', '../image/uploads/mv santiago.webp'),
(36, 'PINPOINT MEDICAL AND DIAGNOSTIC CENTER', 'Angono, Rizal', 'doc Besana- 09163712665', 'pinpointmdc@gmail.com', '../image/uploads/mv santiago.webp'),
(44, ' Test Client', 'Client, Address', 'test ppersone / 092130912039', 'testperson@gmail.com', '../image/uploads/mv santiago.webp'),
(45, 'RT Lim Family Hospital', 'Rt Lim, Zamboanga Sibugay', '', '', '../image/uploads/mv santiago.webp'),
(46, 'ROGACIANO M. MERCADO MEMORIAL HOSPITAL', 'Sta.Maria, Bulacan', 'Mam lulu- 09273221091', '', '../image/uploads/mv santiago.webp'),
(65, 'Test ', 'Ragos', 'ragoragos', 'ragos@gmail.com', '../image/uploads/RAGOS_LARRY.jpg');

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
  `pTurn_over` date NOT NULL DEFAULT current_timestamp(),
  `pCoverage` date NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1,
  `count` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `sv_call` int(11) DEFAULT 0,
  `isActive` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contract_id`, `client_id`, `machine_type`, `brand`, `model`, `frequency`, `turn_over`, `coverage`, `pTurn_over`, `pCoverage`, `status`, `count`, `total`, `sv_call`, `isActive`) VALUES
(1, 1, 4, 'GE', 'Tayo', '1', '2024-08-24', '2025-08-23', '2023-08-22', '2023-08-29', 2, 3, 4, 8, 1),
(2, 2, 9, 'GE', 'Xt123', '1', '2023-08-25', '2024-08-26', '2023-08-24', '2023-09-22', 1, 0, 5, 0, 1),
(3, 3, 3, 'GE', 'Test', '3', '2023-08-25', '2026-08-24', '2023-08-25', '2023-09-21', 1, 2, 3, 0, 1),
(4, 1, 1, 'asd', 'asda', '2', '2023-08-25', '2024-08-24', '2023-08-25', '2023-09-20', 1, 2, 2, 0, 1),
(5, 4, 1, 'Tae', 'asdasdasasa', '3', '2023-08-25', '2024-08-24', '2023-08-24', '2023-09-27', 1, 0, 1, 0, 1),
(6, 4, 1, 'GH', 'Paranaque', '1', '2023-08-30', '2024-08-29', '2023-08-30', '2023-09-02', 1, 4, 4, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contract_type`
--

CREATE TABLE `contract_type` (
  `contract_id` int(11) NOT NULL,
  `quarterly` int(1) NOT NULL DEFAULT 1,
  `semi-annual` int(1) NOT NULL DEFAULT 2,
  `annual` int(1) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `machine_id` int(11) NOT NULL,
  `machine_type` varchar(30) NOT NULL,
  `machine_model` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `is_general` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `isSchedule` tinyint(1) NOT NULL DEFAULT 0,
  `schedule_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `content`, `is_general`, `created_at`, `isSchedule`, `schedule_id`) VALUES
(1, 'Service Assigned', 'You have been asigned for schedule no.#2 at Aug 25, 2023', 0, '2023-08-24 01:11:13', 1, 2),
(2, 'Service Assigned', 'You have been asigned for schedule no.#3 at Aug 23, 2023', 0, '2023-08-24 01:15:14', 1, 3),
(5, 'Schedule Service Done', 'Your schedule no:#2 has been verified', 0, '2023-08-24 01:36:27', 1, 2),
(6, 'Schedule Service Done', 'Your schedule no:#4 has been verified', 0, '2023-08-24 01:36:54', 1, 4),
(7, 'Schedule Service Done', 'Your schedule no:#3 has been verified', 0, '2023-08-24 01:37:19', 1, 3),
(8, 'Service Assigned', 'You have been asigned for schedule no.#6 at Jul 05, 2023', 0, '2023-08-24 01:47:14', 1, 6),
(9, 'Service Assigned', 'You have been asigned for schedule no.#7 at Aug 17, 2023', 0, '2023-08-24 01:47:38', 1, 7),
(10, 'Service Assigned', 'You have been asigned for schedule no.#8 at Aug 28, 2023', 0, '2023-08-24 01:55:16', 1, 8),
(11, 'Schedule Service Done', 'Your schedule no:#4 has been verified', 0, '2023-08-25 07:47:41', 1, 4),
(51, 'Schedule Service Done', 'Your schedule no:#1 has been verified', 0, '2023-08-25 08:50:17', 1, 1),
(59, 'Schedule Service Done', 'Your schedule no:#9 has been verified', 0, '2023-08-25 08:58:25', 1, 9),
(60, 'Schedule Service Done', 'Your schedule no:#12 has been verified', 0, '2023-08-25 09:16:23', 1, 12),
(61, 'Schedule Service Done', 'Your schedule no:#15 has been verified', 0, '2023-08-25 09:37:27', 1, 15),
(62, 'Schedule Service Done', 'Your schedule no:#16 has been verified', 0, '2023-08-25 09:37:27', 1, 16),
(63, 'Schedule Service Done', 'Your schedule no:#17 has been verified', 0, '2023-08-25 09:38:18', 1, 17),
(64, 'Schedule Service Done', 'Your schedule no:#18 has been verified', 0, '2023-08-25 09:39:07', 1, 18),
(65, 'Schedule Service Done', 'Your schedule no:#19 has been verified', 0, '2023-08-25 09:39:55', 1, 19),
(66, 'Schedule Service Done', 'Your schedule no:#22 has been verified', 0, '2023-08-25 09:51:04', 1, 22),
(67, 'Schedule Service Done', 'Your schedule no:#24 has been verified', 0, '2023-08-25 09:52:16', 1, 24),
(68, 'Schedule Service Done', 'Your schedule no:#25 has been verified', 0, '2023-08-25 09:55:04', 1, 25),
(69, 'Schedule Service Done', 'Your schedule no:#26 has been verified', 0, '2023-08-25 09:55:04', 1, 26),
(70, 'Schedule Service Done', 'Your schedule no:#27 has been verified', 0, '2023-08-25 09:55:05', 1, 27),
(71, 'Schedule Service Done', 'Your schedule no:#28 has been verified', 0, '2023-08-25 09:55:05', 1, 28),
(72, 'Schedule Service Done', 'Your schedule no:#29 has been verified', 0, '2023-08-25 09:55:30', 1, 29),
(73, 'Schedule Service Done', 'Your schedule no:#30 has been verified', 0, '2023-08-30 07:25:21', 1, 30),
(74, 'Schedule Service Done', 'Your schedule no:#33 has been verified', 0, '2023-08-30 07:46:42', 1, 33),
(75, 'Service Assigned', 'You have been asigned for schedule no.#35 at Aug 16, 2023', 0, '2023-08-30 10:59:14', 1, 35),
(76, 'Schedule Service Done', 'Your schedule no:#6 has been verified', 0, '2023-08-30 12:34:43', 1, 6),
(77, 'Schedule Service Done', 'Your schedule no:#6 has been verified', 0, '2023-08-30 12:34:43', 1, 6),
(78, 'Schedule Service Done', 'Your schedule no:#6 has been verified', 0, '2023-08-30 12:34:44', 1, 6),
(79, 'Schedule Service Done', 'Your schedule no:#6 has been verified', 0, '2023-08-30 12:35:19', 1, 6),
(80, 'Schedule Service Done', 'Your schedule no:#6 has been verified', 0, '2023-08-30 12:35:19', 1, 6),
(81, 'Schedule Service Done', 'Your schedule no:#6 has been verified', 0, '2023-08-30 12:35:19', 1, 6),
(82, 'Schedule Service Done', 'Your schedule no:#6 has been verified', 0, '2023-08-30 12:35:19', 1, 6),
(83, 'Schedule Service Done', 'Your schedule no:#6 has been verified', 0, '2023-08-30 12:35:19', 1, 6),
(84, 'Schedule Service Done', 'Your schedule no:#6 has been verified', 0, '2023-08-30 12:35:19', 1, 6),
(85, 'Schedule Service Done', 'Your schedule no:#6 has been verified', 0, '2023-08-30 12:35:19', 1, 6),
(86, 'Schedule Service Done', 'Your schedule no:#6 has been verified', 0, '2023-08-30 12:35:51', 1, 6),
(87, 'Schedule Service Done', 'Your schedule no:#6 has been verified', 0, '2023-08-30 12:35:51', 1, 6),
(88, 'Schedule Service Done', 'Your schedule no:#4 has been verified', 0, '2023-08-30 12:40:27', 1, 4),
(89, 'Schedule Service Done', 'Your schedule no:#4 has been verified', 0, '2023-08-30 12:40:27', 1, 4),
(90, 'Service Assigned', 'You have been asigned for schedule no.#36 at Aug 31, 2023', 0, '2023-08-30 01:02:31', 1, 36),
(91, 'Service Assigned', 'You have been asigned for schedule no.#37 at Aug 31, 2023', 0, '2023-08-30 01:04:07', 1, 37),
(92, 'Service Assigned', 'You have been asigned for schedule no.#38 at Aug 23, 2023', 0, '2023-08-30 01:05:00', 1, 38),
(93, 'Service Assigned', 'You have been asigned for schedule no.#39 at Aug 27, 2023', 0, '2023-08-30 01:05:24', 1, 39),
(94, 'Service Assigned', 'You have been asigned for schedule no.#40 at Aug 01, 2023', 0, '2023-08-30 01:06:22', 1, 40),
(95, 'Service Assigned', 'You have been asigned for schedule no.#41 at Sep 01, 2023', 0, '2023-08-30 01:07:42', 1, 41),
(96, 'Service Assigned', 'You have been asigned for schedule no.#42 at Sep 06, 2023', 0, '2023-09-04 03:06:21', 1, 42),
(97, 'Service Assigned', 'You have been asigned for schedule no.#43 at Sep 07, 2023', 0, '2023-09-04 03:06:40', 1, 43),
(98, 'Von Iloveyou', 'Test', 0, '2023-09-06 07:31:22', 0, 12),
(99, 'Service Assigned', 'You have been asigned for schedule no.#44 at Sep 07, 2023', 0, '2023-09-06 01:33:27', 1, 44),
(100, 'Service Assigned', 'You have been asigned for schedule no.#45 at Sep 13, 2023', 0, '2023-09-06 01:33:43', 1, 45),
(101, 'Service Assigned', 'You have been asigned for schedule no.#46 at Sep 07, 2023', 0, '2023-09-06 02:38:19', 1, 46),
(102, 'Service Assigned', 'You have been asigned for schedule no.#47 at Sep 07, 2023', 0, '2023-09-07 12:04:14', 1, 47),
(103, 'Schedule Service Done', 'Your schedule no:#48 has been verified', 0, '2023-09-08 07:22:55', 1, 48),
(104, 'Service Assigned', 'You have been asigned for schedule no.#50 at Sep 14, 2023', 0, '2023-09-11 02:22:34', 1, 50),
(105, 'Schedule Service Done', 'Your schedule no:#50 has been verified', 0, '2023-09-11 02:22:45', 1, 50),
(106, 'Schedule Service Done', 'Your schedule no:#50 has been verified', 0, '2023-09-11 02:22:45', 1, 50),
(107, 'Service Assigned', 'You have been asigned for schedule no.#51 at Sep 14, 2023', 0, '2023-09-11 02:23:09', 1, 51),
(108, 'Schedule Service Done', 'Your schedule no:#51 has been verified', 0, '2023-09-11 02:23:30', 1, 51),
(109, 'Schedule Service Done', 'Your schedule no:#51 has been verified', 0, '2023-09-11 02:23:30', 1, 51),
(110, 'Service Assigned', 'You have been asigned for schedule no.#52 at Sep 21, 2023', 0, '2023-09-11 02:23:53', 1, 52),
(111, 'Service Assigned', 'You have been asigned for schedule no.#53 at Sep 21, 2023', 0, '2023-09-11 02:28:56', 1, 53),
(112, 'Schedule Service Done', 'Your schedule no:#53 has been verified', 0, '2023-09-11 02:33:47', 1, 53),
(113, 'Service Assigned', 'You have been asigned for schedule no.#54 at Aug 28, 2023', 0, '2023-09-11 02:34:10', 1, 54),
(114, 'Service Assigned', 'You have been asigned for schedule no.#55 at Sep 18, 2023', 0, '2023-09-11 02:34:32', 1, 55),
(115, 'Schedule Service Done', 'Your schedule no:#55 has been verified', 0, '2023-09-11 02:34:49', 1, 55),
(116, 'Schedule Service Done', 'Your schedule no:#55 has been verified', 0, '2023-09-11 02:34:49', 1, 55),
(117, 'Schedule Service Done', 'Your schedule no:#55 has been verified', 0, '2023-09-11 02:34:49', 1, 55),
(118, 'Schedule Service Done', 'Your schedule no:#55 has been verified', 0, '2023-09-11 02:34:49', 1, 55),
(119, 'Schedule Service Done', 'Your schedule no:#52 has been verified', 0, '2023-09-11 02:35:58', 1, 52),
(120, 'Schedule Service Done', 'Your schedule no:#46 has been verified', 0, '2023-09-11 02:36:38', 1, 46),
(121, 'Service Assigned', 'You have been asigned for schedule no.#56 at Sep 25, 2023', 0, '2023-09-11 02:36:52', 1, 56),
(122, 'Schedule Service Done', 'Your schedule no:#56 has been verified', 0, '2023-09-11 02:37:05', 1, 56),
(123, 'Schedule Service Done', 'Your schedule no:#56 has been verified', 0, '2023-09-11 02:37:05', 1, 56),
(124, 'Schedule Service Done', 'Your schedule no:#56 has been verified', 0, '2023-09-11 02:37:05', 1, 56),
(125, 'Schedule Service Done', 'Your schedule no:#7 has been verified', 0, '2023-09-11 02:39:48', 1, 7),
(126, 'Schedule Service Done', 'Your schedule no:#7 has been verified', 0, '2023-09-11 02:39:48', 1, 7),
(127, 'Schedule Service Done', 'Your schedule no:#8 has been verified', 0, '2023-09-11 02:53:16', 1, 8),
(128, 'Service Assigned', 'You have been asigned for schedule no.#57 at Sep 29, 2023', 0, '2023-09-11 02:53:41', 1, 57),
(129, 'Schedule Service Done', 'Your schedule no:#57 has been verified', 0, '2023-09-11 02:54:12', 1, 57),
(130, 'Schedule Service Done', 'Your schedule no:#57 has been verified', 0, '2023-09-11 02:54:12', 1, 57),
(131, 'Schedule Service Done', 'Your schedule no:#57 has been verified', 0, '2023-09-11 02:54:12', 1, 57),
(132, 'Schedule Service Done', 'Your schedule no:#57 has been verified', 0, '2023-09-11 02:54:12', 1, 57),
(133, 'Schedule Service Done', 'Your schedule no:#54 has been verified', 0, '2023-09-11 02:55:14', 1, 54),
(134, 'Schedule Service Done', 'Your schedule no:#54 has been verified', 0, '2023-09-11 02:55:14', 1, 54),
(135, 'Schedule Service Done', 'Your schedule no:#54 has been verified', 0, '2023-09-11 02:55:14', 1, 54),
(136, 'Service Assigned', 'You have been asigned for schedule no.#58 at Sep 29, 2023', 0, '2023-09-11 02:55:48', 1, 58),
(137, 'Schedule Service Done', 'Your schedule no:#58 has been verified', 0, '2023-09-11 02:56:03', 1, 58),
(138, 'Schedule Service Done', 'Your schedule no:#58 has been verified', 0, '2023-09-11 02:56:03', 1, 58),
(139, 'Service Assigned', 'You have been asigned for schedule no.#59 at Sep 21, 2023', 0, '2023-09-11 02:59:38', 1, 59),
(140, 'Schedule Service Done', 'Your schedule no:#59 has been verified', 0, '2023-09-11 02:59:55', 1, 59),
(141, 'Service Assigned', 'You have been asigned for schedule no.#60 at Sep 28, 2023', 0, '2023-09-11 03:00:13', 1, 60),
(142, 'Schedule Service Done', 'Your schedule no:#60 has been verified', 0, '2023-09-11 03:00:36', 1, 60),
(143, 'Schedule Service Done', 'Your schedule no:#60 has been verified', 0, '2023-09-11 03:00:36', 1, 60),
(144, 'Schedule Service Done', 'Your schedule no:#60 has been verified', 0, '2023-09-11 03:00:36', 1, 60),
(145, 'Schedule Service Done', 'Your schedule no:#60 has been verified', 0, '2023-09-11 03:00:36', 1, 60),
(146, 'Service Assigned', 'You have been asigned for schedule no.#61 at Oct 05, 2023', 0, '2023-09-11 03:01:52', 1, 61),
(147, 'Schedule Service Done', 'Your schedule no:#61 has been verified', 0, '2023-09-11 03:02:31', 1, 61),
(148, 'Schedule Service Done', 'Your schedule no:#61 has been verified', 0, '2023-09-11 03:02:31', 1, 61),
(149, 'Service Assigned', 'You have been asigned for schedule no.#62 at Sep 11, 2023', 0, '2023-09-11 03:20:36', 1, 62),
(150, 'Service Assigned', 'You have been asigned for schedule no.#63 at Sep 12, 2023', 0, '2023-09-11 03:20:55', 1, 63),
(151, 'Service Assigned', 'You have been asigned for schedule no.#64 at Sep 26, 2023', 0, '2023-09-11 03:35:09', 1, 64),
(152, 'Service Assigned', 'You have been asigned for schedule no.#65 at Sep 27, 2023', 0, '2023-09-11 03:35:26', 1, 65),
(153, 'Service Assigned', 'You have been asigned for schedule no.#66 at Sep 28, 2023', 0, '2023-09-11 03:36:18', 1, 66),
(154, 'Service Assigned', 'You have been asigned for schedule no.#67 at Sep 29, 2023', 0, '2023-09-11 03:39:01', 1, 67),
(155, 'Service Assigned', 'You have been asigned for schedule no.#68 at Sep 30, 2023', 0, '2023-09-11 03:39:22', 1, 68),
(156, 'Service Assigned', 'You have been asigned for schedule no.#69 at Oct 05, 2023', 0, '2023-09-11 03:42:40', 1, 69),
(157, 'Service Assigned', 'You have been asigned for schedule no.#70 at Oct 05, 2023', 0, '2023-09-11 03:45:50', 1, 70),
(158, 'Service Assigned', 'You have been asigned for schedule no.#71 at Oct 06, 2023', 0, '2023-09-11 03:46:08', 1, 71),
(159, 'Service Assigned', 'You have been asigned for schedule no.#72 at Oct 06, 2023', 0, '2023-09-11 03:46:08', 1, 72),
(160, 'Service Assigned', 'You have been asigned for schedule no.#73 at Oct 06, 2023', 0, '2023-09-11 03:46:08', 1, 73),
(161, 'Service Assigned', 'You have been asigned for schedule no.#74 at Sep 20, 2023', 0, '2023-09-11 03:47:01', 1, 74),
(162, 'Service Assigned', 'You have been asigned for schedule no.#75 at Sep 20, 2023', 0, '2023-09-11 03:47:01', 1, 75),
(163, 'Service Assigned', 'You have been asigned for schedule no.#76 at Sep 12, 2023', 0, '2023-09-11 03:49:12', 1, 76),
(164, 'Service Assigned', 'You have been asigned for schedule no.#77 at Sep 13, 2023', 0, '2023-09-11 03:49:58', 1, 77),
(165, 'Service Assigned', 'You have been asigned for schedule no.#78 at Aug 31, 2023', 0, '2023-09-11 03:50:20', 1, 78),
(166, 'Service Assigned', 'You have been asigned for schedule no.#79 at Oct 07, 2023', 0, '2023-09-11 03:51:41', 1, 79),
(167, 'Service Assigned', 'You have been asigned for schedule no.#80 at Oct 09, 2023', 0, '2023-09-11 03:52:05', 1, 80),
(168, 'Service Assigned', 'You have been asigned for schedule no.#81 at Oct 10, 2023', 0, '2023-09-11 03:52:43', 1, 81),
(169, 'Schedule Service Done', 'Your schedule no:#67 has been verified', 0, '2023-09-11 03:58:22', 1, 67),
(170, 'Schedule Service Done', 'Your schedule no:#78 has been verified', 0, '2023-09-11 03:58:46', 1, 78);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `location` varchar(150) NOT NULL,
  `report_name` varchar(40) NOT NULL,
  `report_date` date NOT NULL DEFAULT current_timestamp(),
  `generated_by` varchar(30) NOT NULL,
  `db_type` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `location`, `report_name`, `report_date`, `generated_by`, `db_type`) VALUES
(8, '../pdfReport/Test 12.pdf', 'Test 12', '2023-09-08', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `schedule_type` tinyint(2) NOT NULL,
  `contract_id` int(11) DEFAULT NULL,
  `sv_id` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `schedule_type`, `contract_id`, `sv_id`, `schedule_date`, `status`) VALUES
(1, 1, 1, 0, '2023-08-18', 2),
(2, 2, 0, 1, '2023-08-25', 2),
(3, 2, 0, 2, '2023-08-23', 2),
(4, 2, 0, 3, '2023-08-15', 2),
(6, 2, 0, 4, '2023-07-06', 2),
(7, 2, 0, 5, '2023-07-14', 2),
(8, 2, 0, 6, '2023-08-28', 2),
(9, 1, 1, 0, '2023-11-22', 2),
(12, 1, 2, 0, '2023-08-24', 2),
(15, 1, 3, 0, '2023-08-23', 2),
(20, 1, 4, 0, '2023-08-29', 0),
(22, 1, 1, 0, '2023-11-25', 2),
(24, 1, 1, 0, '2023-11-25', 2),
(25, 1, 2, 0, '2023-11-25', 2),
(26, 1, 2, 0, '2024-02-25', 2),
(27, 1, 2, 0, '2024-05-25', 2),
(28, 1, 2, 0, '2024-08-25', 2),
(30, 1, 5, 0, '2023-08-29', 2),
(31, 1, 6, 0, '2023-08-30', 0),
(33, 1, 1, 0, '2024-08-30', 2),
(34, 1, 1, 0, '2024-11-30', 0),
(35, 2, 0, 7, '2023-08-16', 0),
(38, 2, 0, 10, '2023-08-23', 0),
(39, 2, 0, 11, '2023-08-27', 0),
(40, 2, 0, 12, '2023-08-01', 0),
(44, 2, 0, 16, '2023-09-07', 0),
(45, 2, 0, 17, '2023-09-13', 0),
(46, 2, 0, 18, '2023-09-07', 2),
(47, 2, 0, 19, '2023-09-07', 0),
(48, 1, 3, 0, '2023-11-23', 2),
(49, 1, 3, 0, '2024-11-23', 0),
(50, 2, 0, 20, '2023-09-14', 2),
(51, 2, 0, 21, '2023-09-14', 2),
(52, 2, 0, 22, '2023-09-21', 2),
(53, 2, 0, 23, '2023-09-21', 2),
(54, 2, 0, 24, '2023-08-29', 2),
(55, 2, 0, 25, '2023-09-18', 2),
(56, 2, 0, 26, '2023-09-25', 2),
(57, 2, 0, 27, '2023-09-29', 2),
(58, 2, 0, 28, '2023-09-29', 2),
(59, 2, 0, 29, '2023-09-21', 2),
(60, 2, 0, 30, '2023-09-28', 2),
(61, 2, 0, 31, '2023-10-05', 2),
(62, 2, 0, 32, '2023-09-11', 0),
(63, 2, 0, 33, '2023-09-12', 0),
(64, 2, 0, 34, '2023-09-26', 0),
(65, 2, 0, 35, '2023-09-27', 0),
(66, 2, 0, 36, '2023-09-28', 0),
(67, 2, 0, 37, '2023-09-29', 2),
(68, 2, 0, 38, '2023-09-30', 0),
(69, 2, 0, 39, '2023-10-05', 0),
(70, 2, 0, 40, '2023-10-05', 0),
(71, 2, 0, 41, '2023-10-06', 0),
(72, 2, 0, 42, '2023-10-06', 0),
(73, 2, 0, 43, '2023-10-06', 0),
(74, 2, 0, 44, '2023-09-20', 0),
(75, 2, 0, 45, '2023-09-20', 0),
(76, 2, 0, 46, '2023-09-12', 0),
(77, 2, 0, 47, '2023-09-13', 0),
(78, 2, 0, 48, '2023-08-31', 2),
(79, 2, 0, 49, '2023-10-07', 0),
(80, 2, 0, 50, '2023-10-09', 0),
(81, 2, 0, 51, '2023-10-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_call`
--

CREATE TABLE `service_call` (
  `sv_id` int(11) NOT NULL,
  `guest` tinyint(2) NOT NULL DEFAULT 0,
  `client_id` int(11) NOT NULL,
  `contract_id` int(11) DEFAULT NULL,
  `guest_name` varchar(200) DEFAULT NULL,
  `guest_address` varchar(150) DEFAULT NULL,
  `machine_type` int(11) NOT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `rep_problem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_call`
--

INSERT INTO `service_call` (`sv_id`, `guest`, `client_id`, `contract_id`, `guest_name`, `guest_address`, `machine_type`, `brand`, `model`, `rep_problem`) VALUES
(1, 0, 0, 0, 'Tanza Client', 'Guest Tanza', 3, 'GE', 'Test', 'None'),
(2, 1, 25, 0, NULL, NULL, 2, 'GE', 'Te', 'asd'),
(3, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'GE'),
(4, 1, 10, 0, NULL, NULL, 2, 'GE', 'XCC', 'asd'),
(5, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'GE'),
(6, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'GE'),
(7, 1, 1, 0, NULL, NULL, 1, 'GE', 'Test', 'adsa'),
(10, 1, 12, 0, NULL, NULL, 5, 'Global', 'Tesa', 'ADssada'),
(11, 0, 0, 0, 'Test Clienttt', 'Neada', 6, 'GEasdas', 'SDasdsa', 'asdad'),
(12, 0, 0, 0, 'Nonne', 'Tanzaa, None', 10, 'Enbd', 'Macine', 'Dasda'),
(14, 1, 1, 0, NULL, NULL, 2, 'G', 'CT', 'Test'),
(15, 1, 34, 0, NULL, NULL, 2, 'GE', 'CD', 'adsa'),
(16, 1, 1, 0, NULL, NULL, 2, 'asdas', 'asdas', 'sadasd'),
(17, 1, 31, 0, NULL, NULL, 4, 'asda', 'asdasdas', 'adas'),
(18, 2, 1, 1, NULL, NULL, 4, NULL, NULL, '21'),
(19, 1, 1, 0, NULL, NULL, 1, 'GE', 'CD', 'Teast'),
(20, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'HER'),
(21, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'Tesr'),
(22, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'GE'),
(23, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'GE'),
(24, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'asdsa'),
(25, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'asda'),
(26, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'asda'),
(27, 1, 1, 0, NULL, NULL, 2, 'GE', 'Test', 'Teadsas '),
(28, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'DADsad '),
(29, 2, 1, 1, NULL, NULL, 4, NULL, NULL, ' SD'),
(30, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'GE'),
(31, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'GE'),
(32, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'GE'),
(33, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'Test'),
(34, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'GE'),
(35, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'GE'),
(36, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'GE'),
(37, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'GE '),
(38, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'T'),
(39, 2, 1, 1, NULL, NULL, 4, NULL, NULL, ' sdasd'),
(40, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'GE'),
(41, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'ASdas'),
(42, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'ASdas'),
(43, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'ASdas'),
(44, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'Ge'),
(45, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'Ge'),
(46, 1, 1, 0, NULL, NULL, 2, 'GE', 'Test', 'Asdasd'),
(47, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'asdsa'),
(48, 2, 1, 1, NULL, NULL, 4, NULL, NULL, 'adas'),
(49, 0, 0, 0, 'GE', 'asdasd', 5, 'GE', 'Tesadasdasas', 'adasd'),
(50, 0, 0, 0, 'GE Tay', 'Asdasdsaasdas, CAv', 4, 'GE', 'Teasd', 'asdas'),
(51, 0, 0, 0, 'Tanzaaaaa', 'Tanza, Cavite', 4, 'GE', 'Tesa', 'adasd');

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
  `coverPhoto` varchar(100) DEFAULT NULL,
  `userStatus` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`mem_id`, `firstname`, `lastname`, `username`, `email`, `password`, `type`, `imglink`, `coverPhoto`, `userStatus`) VALUES
(1, 'Kvp', 'Admin', 'admin', 'admin@gmail.com', 'admin', 'Admin', '../uploads/line_seiki.jpg', '../uploads/cover/Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg', 1),
(2, 'Danda', 'Ragos', 'dandan', 'dandanragos@gmail.com', '1234', 'admin', '../uploads/line_seiki.jpg', '../uploads/cover/desola-lanre-ologun-zYgV-NGZtlA-unsplash.jpg', 1),
(3, 'Test', 'None', 'dandan123', 'dandanragoss@gmail.com', '123', 'admin', '../uploads/user.png', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `read_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`id`, `user_id`, `notification_id`, `is_read`, `read_at`) VALUES
(1, 2, 1, 0, NULL),
(2, 3, 1, 0, NULL),
(3, 1, 2, 1, '2023-08-25 08:59:50'),
(4, 2, 2, 0, NULL),
(9, 2, 5, 0, NULL),
(10, 3, 5, 0, NULL),
(11, 1, 6, 1, '2023-08-25 08:59:50'),
(12, 2, 6, 0, NULL),
(13, 3, 6, 0, NULL),
(14, 1, 7, 1, '2023-08-25 08:59:50'),
(15, 2, 7, 0, NULL),
(16, 1, 8, 1, '2023-08-25 08:59:50'),
(17, 2, 8, 0, NULL),
(18, 1, 9, 1, '2023-08-25 08:59:50'),
(19, 2, 10, 0, NULL),
(20, 1, 11, 1, '2023-08-25 08:59:50'),
(21, 2, 11, 0, NULL),
(22, 3, 11, 0, NULL),
(88, 1, 51, 1, '2023-08-25 08:59:50'),
(103, 1, 59, 1, '2023-08-25 08:59:50'),
(104, 2, 59, 0, NULL),
(105, 1, 60, 1, '2023-08-25 09:57:18'),
(106, 2, 61, 0, NULL),
(107, 3, 61, 0, NULL),
(108, 1, 62, 1, '2023-08-25 09:57:18'),
(109, 2, 62, 0, NULL),
(110, 1, 63, 1, '2023-08-25 09:57:18'),
(111, 2, 63, 0, NULL),
(112, 3, 64, 0, NULL),
(113, 1, 64, 1, '2023-08-25 09:57:18'),
(114, 2, 65, 0, NULL),
(115, 1, 66, 1, '2023-08-25 09:57:18'),
(116, 2, 66, 0, NULL),
(117, 2, 67, 0, NULL),
(118, 2, 68, 0, NULL),
(119, 1, 69, 1, '2023-08-25 09:57:18'),
(120, 2, 69, 0, NULL),
(121, 1, 70, 1, '2023-08-25 09:57:18'),
(122, 1, 71, 1, '2023-08-25 09:57:18'),
(123, 2, 71, 0, NULL),
(124, 2, 72, 0, NULL),
(125, 3, 72, 0, NULL),
(126, 1, 73, 1, '2023-08-30 07:46:13'),
(127, 1, 74, 1, '2023-08-30 12:49:59'),
(128, 2, 74, 0, NULL),
(129, 1, 75, 1, '2023-08-30 12:49:59'),
(130, 1, 76, 1, '2023-08-30 12:49:59'),
(131, 2, 76, 0, NULL),
(132, 1, 77, 1, '2023-08-30 12:49:59'),
(133, 2, 77, 0, NULL),
(134, 1, 78, 1, '2023-08-30 12:49:59'),
(135, 2, 78, 0, NULL),
(136, 1, 79, 1, '2023-08-30 12:49:59'),
(137, 2, 79, 0, NULL),
(138, 1, 80, 1, '2023-08-30 12:49:59'),
(139, 2, 80, 0, NULL),
(140, 1, 81, 1, '2023-08-30 12:49:59'),
(141, 2, 81, 0, NULL),
(142, 1, 82, 1, '2023-08-30 12:49:59'),
(143, 2, 82, 0, NULL),
(144, 1, 83, 1, '2023-08-30 12:49:59'),
(145, 2, 83, 0, NULL),
(146, 1, 84, 1, '2023-08-30 12:49:59'),
(147, 2, 84, 0, NULL),
(148, 1, 85, 1, '2023-08-30 12:49:59'),
(149, 2, 85, 0, NULL),
(150, 1, 86, 1, '2023-08-30 12:49:59'),
(151, 2, 86, 0, NULL),
(152, 1, 87, 1, '2023-08-30 12:49:59'),
(153, 2, 87, 0, NULL),
(154, 1, 88, 1, '2023-08-30 12:49:59'),
(155, 2, 88, 0, NULL),
(156, 3, 88, 0, NULL),
(157, 1, 89, 1, '2023-08-30 12:49:59'),
(158, 2, 89, 0, NULL),
(159, 3, 89, 0, NULL),
(160, 3, 90, 0, NULL),
(161, 2, 90, 0, NULL),
(162, 2, 91, 0, NULL),
(163, 3, 91, 0, NULL),
(164, 1, 92, 1, '2023-08-30 13:14:55'),
(165, 2, 92, 0, NULL),
(166, 1, 93, 1, '2023-08-30 13:14:55'),
(167, 2, 93, 0, NULL),
(168, 1, 94, 1, '2023-08-30 13:14:55'),
(169, 2, 94, 0, NULL),
(170, 1, 95, 1, '2023-08-30 13:14:55'),
(171, 2, 95, 0, NULL),
(172, 0, 96, 0, NULL),
(173, 0, 97, 0, NULL),
(174, 5, 61, 0, NULL),
(175, 1, 99, 1, '2023-09-06 13:33:47'),
(176, 2, 99, 0, NULL),
(177, 3, 99, 0, NULL),
(178, 1, 100, 1, '2023-09-06 13:33:47'),
(179, 2, 100, 0, NULL),
(180, 3, 100, 0, NULL),
(181, 1, 101, 1, '2023-09-08 08:47:51'),
(182, 2, 101, 0, NULL),
(183, 3, 101, 0, NULL),
(184, 1, 102, 1, '2023-09-08 08:47:51'),
(185, 2, 102, 0, NULL),
(186, 1, 103, 1, '2023-09-08 08:47:51'),
(187, 1, 104, 1, '2023-09-11 15:05:03'),
(188, 2, 104, 0, NULL),
(189, 1, 105, 1, '2023-09-11 15:05:03'),
(190, 2, 105, 0, NULL),
(191, 1, 106, 1, '2023-09-11 15:05:03'),
(192, 2, 106, 0, NULL),
(193, 1, 107, 1, '2023-09-11 15:05:03'),
(194, 2, 107, 0, NULL),
(195, 1, 108, 1, '2023-09-11 15:05:03'),
(196, 2, 108, 0, NULL),
(197, 1, 109, 1, '2023-09-11 15:05:03'),
(198, 2, 109, 0, NULL),
(199, 1, 110, 1, '2023-09-11 15:05:03'),
(200, 2, 110, 0, NULL),
(201, 3, 110, 0, NULL),
(202, 1, 111, 1, '2023-09-11 15:05:03'),
(203, 2, 111, 0, NULL),
(204, 1, 112, 1, '2023-09-11 15:05:03'),
(205, 2, 112, 0, NULL),
(206, 1, 113, 1, '2023-09-11 15:05:03'),
(207, 1, 114, 1, '2023-09-11 15:05:03'),
(208, 2, 114, 0, NULL),
(209, 1, 115, 1, '2023-09-11 15:05:03'),
(210, 2, 115, 0, NULL),
(211, 1, 116, 1, '2023-09-11 15:05:03'),
(212, 2, 116, 0, NULL),
(213, 1, 117, 1, '2023-09-11 15:05:03'),
(214, 2, 117, 0, NULL),
(215, 1, 118, 1, '2023-09-11 15:05:03'),
(216, 2, 118, 0, NULL),
(217, 1, 119, 1, '2023-09-11 15:05:03'),
(218, 2, 119, 0, NULL),
(219, 3, 119, 0, NULL),
(220, 1, 120, 1, '2023-09-11 15:05:03'),
(221, 2, 120, 0, NULL),
(222, 3, 120, 0, NULL),
(223, 1, 121, 1, '2023-09-11 15:05:03'),
(224, 2, 121, 0, NULL),
(225, 1, 122, 1, '2023-09-11 15:05:03'),
(226, 2, 122, 0, NULL),
(227, 1, 123, 1, '2023-09-11 15:05:03'),
(228, 2, 123, 0, NULL),
(229, 1, 124, 1, '2023-09-11 15:05:03'),
(230, 2, 124, 0, NULL),
(231, 1, 125, 1, '2023-09-11 15:05:03'),
(232, 1, 126, 1, '2023-09-11 15:05:03'),
(233, 2, 127, 0, NULL),
(234, 2, 128, 0, NULL),
(235, 3, 128, 0, NULL),
(236, 1, 128, 1, '2023-09-11 15:05:03'),
(237, 2, 129, 0, NULL),
(238, 3, 129, 0, NULL),
(239, 1, 129, 1, '2023-09-11 15:05:03'),
(240, 2, 130, 0, NULL),
(241, 3, 130, 0, NULL),
(242, 1, 130, 1, '2023-09-11 15:05:03'),
(243, 2, 131, 0, NULL),
(244, 3, 131, 0, NULL),
(245, 1, 131, 1, '2023-09-11 15:05:03'),
(246, 2, 132, 0, NULL),
(247, 3, 132, 0, NULL),
(248, 1, 132, 1, '2023-09-11 15:05:03'),
(249, 1, 133, 1, '2023-09-11 15:05:03'),
(250, 1, 134, 1, '2023-09-11 15:05:03'),
(251, 1, 135, 1, '2023-09-11 15:05:03'),
(252, 0, 136, 0, NULL),
(253, 1, 137, 1, '2023-09-11 15:05:03'),
(254, 2, 137, 0, NULL),
(255, 1, 138, 1, '2023-09-11 15:05:03'),
(256, 2, 138, 0, NULL),
(257, 0, 139, 0, NULL),
(258, 1, 140, 1, '2023-09-11 15:05:03'),
(259, 2, 140, 0, NULL),
(260, 3, 141, 0, NULL),
(261, 2, 141, 0, NULL),
(262, 1, 141, 1, '2023-09-11 15:05:03'),
(263, 3, 142, 0, NULL),
(264, 2, 142, 0, NULL),
(265, 1, 142, 1, '2023-09-11 15:05:03'),
(266, 3, 143, 0, NULL),
(267, 2, 143, 0, NULL),
(268, 1, 143, 1, '2023-09-11 15:05:03'),
(269, 3, 144, 0, NULL),
(270, 2, 144, 0, NULL),
(271, 1, 144, 1, '2023-09-11 15:05:03'),
(272, 3, 145, 0, NULL),
(273, 2, 145, 0, NULL),
(274, 1, 145, 1, '2023-09-11 15:05:03'),
(275, 1, 146, 1, '2023-09-11 15:05:03'),
(276, 2, 146, 0, NULL),
(277, 3, 146, 0, NULL),
(278, 1, 147, 1, '2023-09-11 15:05:03'),
(279, 2, 147, 0, NULL),
(280, 3, 147, 0, NULL),
(281, 1, 148, 1, '2023-09-11 15:05:03'),
(282, 2, 148, 0, NULL),
(283, 3, 148, 0, NULL),
(284, 1, 149, 1, '2023-09-11 15:32:04'),
(285, 2, 149, 0, NULL),
(286, 1, 150, 1, '2023-09-11 15:32:04'),
(287, 2, 150, 0, NULL),
(288, 1, 151, 0, NULL),
(289, 2, 151, 0, NULL),
(290, 3, 151, 0, NULL),
(291, 3, 152, 0, NULL),
(292, 1, 152, 0, NULL),
(293, 2, 152, 0, NULL),
(294, 1, 153, 0, NULL),
(295, 3, 153, 0, NULL),
(296, 2, 153, 0, NULL),
(297, 2, 154, 0, NULL),
(298, 3, 154, 0, NULL),
(299, 1, 155, 0, NULL),
(300, 2, 155, 0, NULL),
(301, 3, 155, 0, NULL),
(302, 0, 156, 0, NULL),
(303, 0, 157, 0, NULL),
(304, 3, 158, 0, NULL),
(305, 3, 159, 0, NULL),
(306, 3, 160, 0, NULL),
(307, 1, 161, 0, NULL),
(308, 2, 161, 0, NULL),
(309, 1, 162, 0, NULL),
(310, 2, 162, 0, NULL),
(311, 3, 163, 0, NULL),
(312, 2, 163, 0, NULL),
(313, 1, 163, 0, NULL),
(314, 1, 164, 0, NULL),
(315, 2, 164, 0, NULL),
(316, 3, 164, 0, NULL),
(317, 0, 165, 0, NULL),
(318, 1, 166, 0, NULL),
(319, 2, 166, 0, NULL),
(320, 2, 169, 0, NULL),
(321, 3, 169, 0, NULL),
(322, 0, 170, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_sched`
--

CREATE TABLE `user_sched` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `sched_id` int(11) NOT NULL,
  `us_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sched`
--

INSERT INTO `user_sched` (`id`, `uid`, `sched_id`, `us_status`) VALUES
(1, 2, 2, 1),
(2, 3, 2, 1),
(3, 1, 3, 1),
(4, 2, 3, 1),
(9, 1, 6, 1),
(10, 2, 6, 1),
(11, 1, 7, 1),
(12, 2, 8, 1),
(13, 1, 4, 1),
(14, 2, 4, 1),
(15, 3, 4, 1),
(81, 1, 1, 1),
(96, 1, 9, 1),
(97, 2, 9, 1),
(98, 1, 12, 1),
(99, 2, 15, 1),
(100, 3, 15, 1),
(101, 1, 16, 1),
(102, 2, 16, 1),
(103, 1, 17, 1),
(104, 2, 17, 1),
(105, 3, 18, 1),
(106, 1, 18, 1),
(107, 2, 19, 1),
(108, 1, 22, 1),
(109, 2, 22, 1),
(110, 2, 24, 1),
(111, 2, 25, 1),
(112, 1, 26, 1),
(113, 2, 26, 1),
(114, 1, 27, 1),
(115, 1, 28, 1),
(116, 2, 28, 1),
(117, 2, 29, 1),
(118, 3, 29, 1),
(119, 1, 30, 1),
(120, 1, 33, 1),
(121, 2, 33, 1),
(122, 1, 35, 0),
(123, 3, 36, 0),
(124, 2, 36, 0),
(125, 2, 37, 0),
(126, 3, 37, 0),
(127, 1, 38, 0),
(128, 2, 38, 0),
(129, 1, 39, 0),
(130, 2, 39, 0),
(131, 1, 40, 0),
(132, 2, 40, 0),
(133, 1, 41, 0),
(134, 2, 41, 0),
(135, 0, 42, 0),
(136, 0, 43, 0),
(137, 1, 44, 0),
(138, 2, 44, 0),
(139, 3, 44, 0),
(140, 1, 45, 0),
(141, 2, 45, 0),
(142, 3, 45, 0),
(143, 1, 46, 1),
(144, 2, 46, 1),
(145, 3, 46, 1),
(146, 1, 47, 0),
(147, 2, 47, 0),
(148, 1, 48, 1),
(149, 1, 50, 1),
(150, 2, 50, 1),
(151, 1, 51, 1),
(152, 2, 51, 1),
(153, 1, 52, 1),
(154, 2, 52, 1),
(155, 3, 52, 1),
(156, 1, 53, 1),
(157, 2, 53, 1),
(158, 1, 54, 1),
(159, 1, 55, 1),
(160, 2, 55, 1),
(161, 1, 56, 1),
(162, 2, 56, 1),
(163, 2, 57, 1),
(164, 3, 57, 1),
(165, 1, 57, 1),
(166, 0, 58, 0),
(167, 1, 58, 1),
(168, 2, 58, 1),
(169, 0, 59, 0),
(170, 1, 59, 1),
(171, 2, 59, 1),
(172, 3, 60, 1),
(173, 2, 60, 1),
(174, 1, 60, 1),
(175, 1, 61, 1),
(176, 2, 61, 1),
(177, 3, 61, 1),
(178, 1, 62, 0),
(179, 2, 62, 0),
(180, 1, 63, 0),
(181, 2, 63, 0),
(182, 1, 64, 0),
(183, 2, 64, 0),
(184, 3, 64, 0),
(185, 3, 65, 0),
(186, 1, 65, 0),
(187, 2, 65, 0),
(188, 1, 66, 0),
(189, 3, 66, 0),
(190, 2, 66, 0),
(191, 2, 67, 1),
(192, 3, 67, 1),
(193, 1, 68, 0),
(194, 2, 68, 0),
(195, 3, 68, 0),
(196, 0, 69, 0),
(197, 0, 70, 0),
(198, 3, 71, 0),
(199, 3, 72, 0),
(200, 3, 73, 0),
(201, 1, 74, 0),
(202, 2, 74, 0),
(203, 1, 75, 0),
(204, 2, 75, 0),
(205, 3, 76, 0),
(206, 2, 76, 0),
(207, 1, 76, 0),
(208, 1, 77, 0),
(209, 2, 77, 0),
(210, 3, 77, 0),
(211, 0, 78, 1),
(212, 1, 79, 0),
(213, 2, 79, 0),
(214, 0, 78, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomplished_schedule`
--
ALTER TABLE `accomplished_schedule`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `contract_id` (`contract_id`),
  ADD KEY `sv_id` (`sv_id`);

--
-- Indexes for table `service_call`
--
ALTER TABLE `service_call`
  ADD PRIMARY KEY (`sv_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sched`
--
ALTER TABLE `user_sched`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomplished_schedule`
--
ALTER TABLE `accomplished_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `contract_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `pms`
--
ALTER TABLE `pms`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `service_call`
--
ALTER TABLE `service_call`
  MODIFY `sv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT for table `user_sched`
--
ALTER TABLE `user_sched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
