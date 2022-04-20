-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 03:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` bigint(50) NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `datum_premijere` date NOT NULL,
  `zanr` varchar(50) NOT NULL,
  `id_reziser` bigint(20) NOT NULL,
  `id_glavni_glumac` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `naziv`, `datum_premijere`, `zanr`, `id_reziser`, `id_glavni_glumac`) VALUES
(1, 'Bande Njujorka', '2002-12-20', 'Krimi drama', 2, 9),
(2, 'Radioaktivna', '2020-03-11', 'Drama/Ljubavni', 4, 5),
(3, 'Ptice', '1963-03-28', 'Horor/Triler', 6, 6),
(4, 'Lusi', '2014-08-21', 'Akcija/Triler', 1, 1),
(5, 'Život je lep', '1997-12-20', 'Ratni/Drama', 5, 7),
(6, 'Male žene', '2019-12-25', 'Ljubavni/Drama', 3, 4),
(7, 'Peti element', '1997-10-01', 'Naučnofantastični/Kriminalistički', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `glumac`
--

CREATE TABLE `glumac` (
  `id` bigint(100) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `godine` int(5) NOT NULL,
  `drzava_porekla` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `glumac`
--

INSERT INTO `glumac` (`id`, `ime`, `prezime`, `godine`, `drzava_porekla`) VALUES
(1, 'Scarlett', 'Johansson', 37, 'SAD'),
(2, 'Bruce', 'Willis', 67, 'Nemacka'),
(3, 'Robert', 'De Niro', 78, 'SAD'),
(4, 'Soirse ', 'Ronan', 28, 'SAD'),
(5, 'Rosamund ', 'Pike', 43, 'Velika Britanija'),
(6, 'Tippie', 'Hedren', 92, 'SAD'),
(7, 'Roberto', 'Benigni', 69, 'Italija'),
(8, 'Jean', 'Reno', 73, 'Maroko'),
(9, 'Daniel', 'Day-Lewis', 64, 'Velika Britanija');

-- --------------------------------------------------------

--
-- Table structure for table `reziser`
--

CREATE TABLE `reziser` (
  `id` bigint(50) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `broj_filmova` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reziser`
--

INSERT INTO `reziser` (`id`, `ime`, `prezime`, `broj_filmova`) VALUES
(1, 'Luc', 'Besson', 78),
(2, 'Martin', 'Scorsese', 94),
(3, 'Greta', 'Gerwig', 2),
(4, 'Marjane', 'Satrapi', 6),
(5, 'Roberto', 'Benigni', 25),
(6, 'Alfred', 'Hitchcock', 49);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `glumac`
--
ALTER TABLE `glumac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reziser`
--
ALTER TABLE `reziser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `glumac`
--
ALTER TABLE `glumac`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reziser`
--
ALTER TABLE `reziser`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
