-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2020 at 01:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cabservicedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cardpayment`
--

CREATE TABLE `cardpayment` (
  `idPayment` varchar(45) NOT NULL,
  `cardNo` int(20) NOT NULL,
  `expiry` date NOT NULL,
  `securityCode` int(4) NOT NULL,
  `cardHolder` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idCustomer` varchar(40) NOT NULL,
  `FName` varchar(50) DEFAULT NULL,
  `LName` varchar(45) DEFAULT NULL,
  `NIC` varchar(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phoneNo` int(15) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idCustomer`, `FName`, `LName`, `NIC`, `email`, `phoneNo`, `password`) VALUES
('111', '111111', '1111111', '1', '1', 1, '1'),
('333', 'Devshan', 'Fernando', 'dwc', 'cdcsc', 771700839, '3'),
('cwecwec', 'Devshan', 'Fernando', 'cwcwe', 'dwedwdew', 234234, 'xwqqwq'),
('guutfytf', 'Devshan', 'Fernando', 'cwcwe', 'dwedwdew', 234234, 'higiug'),
('hiu', 'Devshan', 'Fernando', 'cwcwe', 'dwedwdew', 234234, 'jubohuh'),
('hiuh', 'Devshan', 'Fernando', 'cwcwe', 'dwedwdew', 234234, 'yfytf'),
('hiuhbj', 'Devshan', 'Fernando', 'cwcwe', 'dwedwdew', 234234, ' iniuniu'),
('hiuhbjh', 'Devshan', 'Fernando', 'cwcwe', 'dwedwdew', 234234, 'jbibubi'),
('hiuhi', 'Devshan', 'Fernando', 'cwcwe', 'dwedwdew', 234234, 'gvuvu'),
('huyuyuy', 'Devshan', 'Fernando', 'cwcwe', 'dwedwdew', 234234, 'jnonooin'),
('jniuni', 'Devshan', 'Fernando', 'nonoino', 'kjnkjnkjn', 798798, 'refrfef'),
('jniunicece', 'Devshan', 'Fernando', 'nonoino', 'kjnkjnkjn', 798798, 'brtbtb'),
('jniuniun', 'Devshan', 'Fernando', 'nonoino', 'kjnkjnkjn', 798798, 'fgbfgbffg'),
('jnnou', 'Devshan', 'Fernando', 'cwcwe', 'dwedwdew', 234234, '97789'),
('jnnouioi', 'Devshan', 'Fernando', 'cwcwe', 'dwedwdew', 234234, '5464564'),
('mimoi', 'Devshan', 'Fernando', 'nkjnkj', 'joijoijo', 8080, 'knjnkjn'),
('nlnnlknl', 'Devshan', 'Fernando', 'cwcwe', 'dwedwdew', 234234, 'vjhvjhv');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `idDriver` varchar(45) NOT NULL,
  `FName` varchar(20) DEFAULT NULL,
  `LName` varchar(20) DEFAULT NULL,
  `NIC` varchar(12) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phoneNo` int(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `rating` decimal(10,0) DEFAULT NULL,
  `noOfRated` int(11) DEFAULT NULL,
  `approved` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`idDriver`, `FName`, `LName`, `NIC`, `email`, `phoneNo`, `password`, `rating`, `noOfRated`, `approved`) VALUES
('222', 'uyguygu', 'guyuy', 'ygyuguyg', 'iugguy', 8687687, '2', NULL, NULL, 1),
('444', 'Devshan', 'Fernando', 'kknln', 'joijoijo', 771700839, '4', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `idPayment` varchar(45) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `method` varchar(30) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ride`
--

CREATE TABLE `ride` (
  `idRide` varchar(45) NOT NULL,
  `startingAddress` varchar(45) DEFAULT NULL,
  `destinationAddress` varchar(45) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `rideTaken` varchar(10) DEFAULT NULL,
  `idCustomer` varchar(40) DEFAULT NULL,
  `idPayment` varchar(45) DEFAULT NULL,
  `idDriver` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ride`
--

INSERT INTO `ride` (`idRide`, `startingAddress`, `destinationAddress`, `date`, `time`, `rideTaken`, `idCustomer`, `idPayment`, `idDriver`) VALUES
('5e2ee9c838b7a', 'adcs', 'cscsdc', '2222-02-22', '14:22', 'yes', '111', NULL, NULL),
('5e2ff1dfbd580', 'cmoaciowi', 'cxwecwoi', '1111-11-11', '11:11', 'no', '111', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicleNo` varchar(20) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `brand` varchar(45) DEFAULT NULL,
  `model` varchar(45) DEFAULT NULL,
  `yearManufacture` varchar(45) DEFAULT NULL,
  `ownersName` varchar(40) DEFAULT NULL,
  `Driver_idDriver` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicleNo`, `type`, `brand`, `model`, `yearManufacture`, `ownersName`, `Driver_idDriver`) VALUES
('gfbfbf', 'Bike', 'gfbfgbf', 'gbgfgfb', '234234', 'vfgfbfb', '444');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cardpayment`
--
ALTER TABLE `cardpayment`
  ADD PRIMARY KEY (`idPayment`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idCustomer`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`idDriver`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`idPayment`);

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`idRide`),
  ADD KEY `idCustomer` (`idCustomer`) USING BTREE,
  ADD KEY `idDriver` (`idDriver`) USING BTREE,
  ADD KEY `idPayment` (`idPayment`) USING BTREE;

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicleNo`),
  ADD KEY `fk_Vehicle_Driver1` (`Driver_idDriver`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ride`
--
ALTER TABLE `ride`
  ADD CONSTRAINT `fk_Ride_Customer` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`),
  ADD CONSTRAINT `fk_Ride_Driver1` FOREIGN KEY (`idDriver`) REFERENCES `driver` (`idDriver`),
  ADD CONSTRAINT `fk_Ride_Payment1` FOREIGN KEY (`idPayment`) REFERENCES `payment` (`idPayment`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `fk_Vehicle_Driver1` FOREIGN KEY (`Driver_idDriver`) REFERENCES `driver` (`idDriver`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
