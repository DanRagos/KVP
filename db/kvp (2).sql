-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 09:17 AM
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
(1, 3, '2023-08-17', 'None', 'Test', 'Done', 2, 0),
(2, 2, '2023-08-17', 'None', 'Test', 'Testt', 2, 0),
(3, 1, '2023-08-30', 'Done', 'None', 'Testt', 2, 0),
(4, 5, '2023-08-10', 'GE', 'Test', 'None', 2, 0),
(5, 7, '2023-08-17', 'Test', 'Done', 'Testasdsad', 2, 0),
(6, 6, '2023-08-24', 'Test', 'Donee', 'Nonee', 2, 0),
(7, 8, '2023-08-15', 'None', 'Test None', 'Done', 2, 1),
(8, 10, '2023-08-15', 'None', 'Testt', 'Doneeee', 3, 0),
(9, 10, '2023-08-23', 'asd', 'asdasdad', 'asdsadsadsad', 3, 0),
(10, 10, '2023-08-24', 'sdsad', 'asdas', 'asdasdsaasd', 2, 0),
(11, 13, '2023-08-25', 'Test1111111111', 'Testt111111111', 'Tesadasd', 3, 1),
(12, 4, '2023-11-23', 'Tasd', 'Done', 'DASdad', 2, 0),
(13, 14, '2024-02-23', 'Test', 'Dadas', 'Nonee', 2, 0),
(14, 16, '2023-08-16', 'Test', 'Done', 'None', 2, 0),
(15, 18, '2023-09-01', 'Test', 'sdad', 'asdasd', 2, 0),
(16, 19, '2023-08-17', 'None', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 2, 0),
(17, 21, '2023-08-16', 'None12', 'Done lorem impsum dolor sit amet', 'Testtt None', 2, 0),
(18, 23, '2023-08-17', 'Test', 'Done', 'None', 2, 0),
(19, 28, '2023-08-24', 'GE', 'GE', '', 2, 0);

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
(1, 1, 3, 'GE', 'Xray', '1', '2023-08-16', '2024-08-17', '2023-08-18', '2023-08-18', 2, 0, 4, 9, 1),
(2, 1, 3, 'GE', 'Test', '1', '2023-08-16', '2023-08-17', '2023-08-18', '2023-08-18', 2, 0, 1, 0, 1),
(3, 1, 2, 'GE', 'Tes', '2', '2022-08-16', '2023-08-15', '2023-08-18', '2023-08-18', 2, 0, 2, 3, 1),
(4, 1, 3, 'GE', 'Xray', '1', '2023-08-17', '2024-08-16', '2023-08-18', '2023-08-18', 1, 3, 4, 0, 1),
(5, 1, 5, 'GE', 'Mammo', '1', '2023-08-18', '2023-08-17', '1970-01-01', '1970-01-01', 2, 0, 1, 4, 1),
(6, 1, 5, 'GE', 'Mammo', '1', '2023-08-18', '2023-08-17', '1970-01-01', '1970-01-01', 2, 1, 1, 4, 1),
(7, 1, 5, 'GE', 'Mammo', '1', '2023-08-18', '2023-08-17', '1970-01-01', '2024-08-12', 2, 1, 1, 4, 1),
(8, 1, 5, 'GE', 'Mammo', '1', '2023-08-18', '2023-08-17', '2023-08-11', '2024-08-12', 2, 1, 1, 4, 1);

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
(1, 'Service Assigned', 'You have been asigned for service no.#2 at Aug 22, 2023', 0, '2023-08-16 07:51:25', 1, 2),
(2, 'Service Assigned', 'You have been asigned for service no.#3 at Aug 24, 2023', 0, '2023-08-16 07:51:48', 1, 3),
(3, 'Schedule Service Done', 'Your schedule service no:#3 has been verified', 0, '2023-08-16 07:52:48', 1, 3),
(4, 'Schedule Service Done', 'Your schedule service no:#2 has been verified', 0, '2023-08-16 07:53:46', 1, 2),
(6, 'Service Assigned', 'You have been asigned for service no.#5 at Aug 17, 2023', 0, '2023-08-16 07:58:07', 1, 5),
(7, 'Schedule Service Done', 'Your schedule service no:#5 has been verified', 0, '2023-08-16 07:58:55', 1, 5),
(8, 'Service Assigned', 'You have been asigned for service no.#7 at Aug 23, 2023', 0, '2023-08-16 08:00:15', 1, 7),
(9, 'Schedule Service Done', 'Your schedule service no:#7 has been verified', 0, '2023-08-16 08:00:42', 1, 7),
(12, 'Schedule Service Done', 'Your schedule service no:#8 has been verified', 0, '2023-08-16 08:26:08', 1, 8),
(13, 'Schedule Service Done', 'Your schedule service no:#8 has been verified', 0, '2023-08-16 08:54:49', 1, 8),
(15, 'Service Assigned', 'You have been asigned for service no.#9 at Jul 12, 2023', 0, '2023-08-16 08:56:19', 1, 9),
(16, 'Service Assigned', 'You have been asigned for service no.#10 at Aug 17, 2023', 0, '2023-08-16 08:56:36', 1, 10),
(17, 'Service Assigned', 'You have been asigned for service no.#12 at Aug 17, 2023', 0, '2023-08-16 08:59:42', 1, 12),
(18, 'Schedule Service Done', 'Your schedule service no:#10 has been verified', 0, '2023-08-16 09:32:03', 1, 10),
(19, 'Schedule Service Done', 'Your schedule service no:#10 has been verified', 0, '2023-08-16 09:32:41', 1, 10),
(20, 'Schedule Service Done', 'Your schedule service no:#10 has been verified', 0, '2023-08-16 09:33:03', 1, 10),
(22, 'Schedule Service Done', 'Your schedule service no:#13 has been verified', 0, '2023-08-16 09:44:10', 1, 13),
(23, 'Schedule Service Done', 'Your schedule service no:#4 has been verified', 0, '2023-08-16 09:53:49', 1, 4),
(24, 'Schedule Service Done', 'Your schedule service no:#14 has been verified', 0, '2023-08-16 09:57:26', 1, 14),
(25, 'Schedule Service Done', 'Your schedule no:#16 has been verified', 0, '2023-08-16 10:24:58', 1, 16),
(26, 'Service Assigned', 'You have been asigned for schedule no.#18 at Aug 24, 2023', 0, '2023-08-16 03:15:45', 1, 18),
(27, 'Schedule Service Done', 'Your schedule no:#18 has been verified', 0, '2023-08-16 03:16:02', 1, 18),
(28, 'Schedule Service Done', 'Your schedule no:#19 has been verified', 0, '2023-08-17 08:28:11', 1, 19),
(29, 'Schedule Service Done', 'Your schedule no:#13 has been verified', 0, '2023-08-17 10:32:15', 1, 13),
(52, 'Schedule Service Done', 'Your schedule no:#23 has been verified', 0, '2023-08-17 02:26:09', 1, 23),
(60, 'Schedule Service Done', 'Your schedule no:#1 has been verified', 0, '2023-08-18 07:50:19', 1, 1),
(64, 'Schedule Service Done', 'Your schedule no:#6 has been verified', 0, '2023-08-18 07:50:30', 1, 6),
(65, 'Schedule Service Done', 'Your schedule no:#28 has been verified', 0, '2023-08-18 08:42:49', 1, 28),
(77, 'Schedule Service Done', 'Your schedule no:#21 has been verified', 0, '2023-08-18 09:53:58', 1, 21);

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
  `report_date` date NOT NULL,
  `generated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 1, 1, 0, '2023-08-17', 2),
(2, 2, 0, 1, '2023-08-23', 2),
(3, 2, 0, 2, '2023-08-24', 2),
(4, 1, 1, 0, '2023-11-23', 2),
(5, 2, 0, 3, '2023-08-17', 2),
(6, 1, 2, 0, '2023-08-17', 2),
(7, 2, 0, 4, '2023-08-23', 2),
(8, 2, 0, 5, '2023-07-05', 2),
(9, 2, 0, 6, '2023-07-12', 0),
(10, 2, 0, 7, '2023-08-17', 2),
(12, 2, 0, 8, '2023-08-17', 0),
(13, 2, 0, 9, '2023-08-30', 3),
(16, 1, 3, 0, '2022-08-16', 2),
(18, 2, 0, 10, '2023-08-24', 2),
(19, 1, 3, 0, '2024-02-16', 2),
(21, 1, 4, 0, '2023-08-23', 2),
(22, 1, 4, 0, '2023-11-17', 0),
(23, 1, 1, 0, '2024-02-23', 2),
(25, 1, 6, 0, '2023-08-22', 0),
(26, 1, 7, 0, '2023-08-22', 0),
(27, 1, 8, 0, '2023-08-22', 0),
(28, 1, 5, 0, '2023-08-22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `service_call`
--

CREATE TABLE `service_call` (
  `sv_id` int(11) NOT NULL,
  `guest` tinyint(2) NOT NULL DEFAULT 0,
  `client_id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
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
(1, 2, 1, 1, NULL, NULL, 3, 'GE', 'Xray', 'GE'),
(2, 0, 0, 0, 'Guest Client', 'Tanza, Cavite', 4, 'GE', 'Test', 'None'),
(3, 2, 1, 1, NULL, NULL, 3, 'GE', 'Xray', 'Ge'),
(4, 2, 1, 2, NULL, NULL, 3, 'GE', 'Test', 'None'),
(5, 2, 1, 2, NULL, NULL, 3, 'GE', 'Test', 'GE'),
(6, 2, 1, 2, NULL, NULL, 3, 'GE', 'Test', 'HGE'),
(7, 1, 2, 0, NULL, NULL, 1, 'HR', 'Yasd', 'asdsa'),
(8, 0, 0, 0, 'Nice Tanza', 'Tanza, Cavite', 3, 'GE', 'Tes', 'None'),
(9, 2, 1, 2, NULL, NULL, 3, 'GE', 'Test', 'Test'),
(10, 2, 1, 1, NULL, NULL, 3, 'GE', 'Xray', 'GE');

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
(1, 'Kvp', 'Admin', 'admin', 'admin@gmail.com', 'admin', 'Admin', '../uploads/sample.jpg', '../uploads/cover/Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg', 1),
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
(1, 1, 1, 1, '2023-08-16 08:00:20'),
(2, 1, 2, 1, '2023-08-16 08:00:20'),
(3, 1, 3, 1, '2023-08-16 08:00:20'),
(4, 1, 4, 1, '2023-08-16 08:00:20'),
(6, 1, 6, 1, '2023-08-16 08:00:20'),
(7, 1, 7, 1, '2023-08-16 08:00:20'),
(8, 1, 8, 1, '2023-08-16 08:00:20'),
(9, 1, 9, 1, '2023-08-16 08:00:48'),
(12, 1, 12, 1, '2023-08-16 08:48:11'),
(13, 1, 13, 1, '2023-08-16 09:33:23'),
(15, 1, 15, 1, '2023-08-16 09:33:23'),
(16, 1, 16, 1, '2023-08-16 09:33:23'),
(17, 1, 17, 1, '2023-08-16 09:33:23'),
(18, 1, 18, 1, '2023-08-16 09:33:23'),
(19, 1, 19, 1, '2023-08-16 09:33:23'),
(20, 1, 20, 1, '2023-08-16 09:33:23'),
(22, 1, 22, 1, '2023-08-17 07:54:34'),
(23, 1, 23, 1, '2023-08-17 07:54:34'),
(24, 1, 24, 1, '2023-08-17 07:54:34'),
(25, 1, 25, 1, '2023-08-17 07:54:34'),
(26, 1, 26, 1, '2023-08-17 07:54:34'),
(27, 1, 27, 1, '2023-08-17 07:54:34'),
(28, 2, 28, 0, NULL),
(29, 1, 29, 1, '2023-08-18 07:19:54'),
(52, 1, 52, 1, '2023-08-18 07:19:54'),
(53, 3, 52, 0, NULL),
(54, 2, 52, 0, NULL),
(62, 1, 60, 1, '2023-08-18 13:57:05'),
(66, 1, 64, 1, '2023-08-18 13:57:05'),
(67, 1, 65, 1, '2023-08-18 13:57:05'),
(68, 2, 65, 0, NULL),
(80, 2, 77, 0, NULL),
(81, 1, 91, 0, NULL);

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
(1, 1, 2, 1),
(2, 1, 3, 1),
(4, 1, 5, 1),
(5, 1, 7, 1),
(8, 1, 8, 1),
(10, 1, 9, 0),
(11, 1, 10, 1),
(12, 1, 12, 0),
(14, 1, 4, 1),
(15, 1, 14, 1),
(16, 1, 16, 1),
(17, 1, 18, 1),
(18, 2, 19, 1),
(19, 1, 13, 1),
(42, 1, 23, 1),
(43, 3, 23, 1),
(44, 2, 23, 1),
(52, 1, 1, 1),
(56, 1, 6, 1),
(57, 1, 28, 1),
(58, 2, 28, 1),
(70, 2, 21, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `contract_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `pms`
--
ALTER TABLE `pms`
  MODIFY `pms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `service_call`
--
ALTER TABLE `service_call`
  MODIFY `sv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user_sched`
--
ALTER TABLE `user_sched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

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
