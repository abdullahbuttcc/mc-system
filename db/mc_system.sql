-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 08:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mc_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

CREATE TABLE `activitylog` (
  `ActivityLogID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `TableName` text NOT NULL,
  `FieldName` text NOT NULL,
  `ChangeDescription` text NOT NULL,
  `LastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `agencyofficerhistorytable`
--

CREATE TABLE `agencyofficerhistorytable` (
  `AgencyOfficerHistoryID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `AgencyOfficerID` text NOT NULL,
  `NarrativeDate` datetime NOT NULL,
  `Narrative` text NOT NULL,
  `LastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agencyofficerhistorytable`
--

INSERT INTO `agencyofficerhistorytable` (`AgencyOfficerHistoryID`, `EntryDate`, `AgencyOfficerID`, `NarrativeDate`, `Narrative`, `LastUpdated`) VALUES
(1, '2021-09-18 14:32:36', '1', '2021-09-18 14:32:36', 'User logged in', '0000-00-00 00:00:00'),
(2, '2021-09-18 14:32:42', '1', '2021-09-18 14:32:42', 'User logged in', '0000-00-00 00:00:00'),
(3, '2021-09-18 14:35:01', '1', '2021-09-18 14:35:01', 'User logged in', '0000-00-00 00:00:00'),
(4, '2021-09-18 14:35:41', '1', '2021-09-18 14:35:41', 'User logged in', '0000-00-00 00:00:00'),
(5, '2021-09-18 14:55:08', '1', '2021-09-18 14:55:08', 'User logged out', '0000-00-00 00:00:00'),
(6, '2021-09-18 15:02:43', '1', '2021-09-18 15:02:43', 'Password forgotten, reset email sent to john@john.com', '0000-00-00 00:00:00'),
(7, '2021-09-18 18:59:28', '1', '2021-09-18 18:59:28', 'User logged in', '0000-00-00 00:00:00'),
(8, '2021-09-18 19:04:37', '1', '2021-09-18 19:04:37', 'User logged out', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `agencyofficertable`
--

CREATE TABLE `agencyofficertable` (
  `AgencyOfficerID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `FirstName` text NOT NULL,
  `MiddleName` text NOT NULL,
  `LastName` text NOT NULL,
  `BirthDate` date NOT NULL,
  `UnitNumber` text NOT NULL,
  `StreetNumber` text NOT NULL,
  `StreetName` text NOT NULL,
  `StreetType` text NOT NULL,
  `Suburb` text NOT NULL,
  `State` text NOT NULL,
  `Postcode` text NOT NULL,
  `Email1` text NOT NULL,
  `Email2` text NOT NULL,
  `MobilePhone` text NOT NULL,
  `HomePhone` text NOT NULL,
  `WorkPhone` text NOT NULL,
  `Password` text NOT NULL,
  `Organisation` text NOT NULL,
  `CommencementDate` datetime NOT NULL,
  `Active` text NOT NULL,
  `DepartureDate` datetime NOT NULL,
  `DepartureReason` text NOT NULL,
  `LastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agencyofficertable`
--

INSERT INTO `agencyofficertable` (`AgencyOfficerID`, `EntryDate`, `FirstName`, `MiddleName`, `LastName`, `BirthDate`, `UnitNumber`, `StreetNumber`, `StreetName`, `StreetType`, `Suburb`, `State`, `Postcode`, `Email1`, `Email2`, `MobilePhone`, `HomePhone`, `WorkPhone`, `Password`, `Organisation`, `CommencementDate`, `Active`, `DepartureDate`, `DepartureReason`, `LastUpdated`) VALUES
(1, '2021-09-18 11:08:52', 'john', 'm.', 'doe', '2021-09-01', '1', '2', '4', '1', '3', '4', '5', 'john@john.com', '23', 'dsfs', '23423', '234', 'password', '234', '2021-09-18 11:08:52', '235sd', '2021-09-18 11:08:52', 'jgd', '2021-09-18 11:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `bookingtable`
--

CREATE TABLE `bookingtable` (
  `BookingID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `Client` text NOT NULL,
  `Provider` text NOT NULL,
  `Service` text NOT NULL,
  `DateStart` datetime NOT NULL,
  `DateEnd` datetime NOT NULL,
  `TransactionPrice` int(11) NOT NULL,
  `Recurring` text NOT NULL,
  `Frequency` int(11) NOT NULL,
  `LastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingtable`
--

INSERT INTO `bookingtable` (`BookingID`, `EntryDate`, `Client`, `Provider`, `Service`, `DateStart`, `DateEnd`, `TransactionPrice`, `Recurring`, `Frequency`, `LastUpdated`) VALUES
(1, '2021-12-11 16:21:56', '1', '1', 'service', '2021-12-11 16:21:56', '2021-12-11 16:21:56', 100, 'recurring', 10, '2021-12-11 16:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `clientcontacttable`
--

CREATE TABLE `clientcontacttable` (
  `ClientContactID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `ClientNDISNumber` text NOT NULL,
  `FirstName` text NOT NULL,
  `MiddleName` text NOT NULL,
  `LastName` text NOT NULL,
  `BirthDate` date NOT NULL,
  `UnitNumber` text NOT NULL,
  `StreetNumber` text NOT NULL,
  `StreetName` text NOT NULL,
  `StreetType` text NOT NULL,
  `Suburb` text NOT NULL,
  `State` text NOT NULL,
  `Postcode` text NOT NULL,
  `Email1` text NOT NULL,
  `Email2` text NOT NULL,
  `MobilePhone` text NOT NULL,
  `HomePhone` text NOT NULL,
  `PreferredContact` text NOT NULL,
  `Password` text NOT NULL,
  `SecurityQuestion` text NOT NULL,
  `SecurityAnswer` text NOT NULL,
  `EmergencyContact` text NOT NULL,
  `CommencementDate` datetime NOT NULL,
  `AggregateRating` float NOT NULL,
  `NumberOfRatings` int(11) NOT NULL DEFAULT 0,
  `Living` int(11) NOT NULL,
  `DepartureDate` datetime NOT NULL,
  `DepartureReason` text NOT NULL,
  `LastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientcontacttable`
--

INSERT INTO `clientcontacttable` (`ClientContactID`, `EntryDate`, `ClientNDISNumber`, `FirstName`, `MiddleName`, `LastName`, `BirthDate`, `UnitNumber`, `StreetNumber`, `StreetName`, `StreetType`, `Suburb`, `State`, `Postcode`, `Email1`, `Email2`, `MobilePhone`, `HomePhone`, `PreferredContact`, `Password`, `SecurityQuestion`, `SecurityAnswer`, `EmergencyContact`, `CommencementDate`, `AggregateRating`, `NumberOfRatings`, `Living`, `DepartureDate`, `DepartureReason`, `LastUpdated`) VALUES
(1, '2021-09-18 15:56:16', '21312', 'johnny', 'm', 'doe', '2020-04-02', '1', '1', '1', '1', '1', 'ACT', '1', 'john2@john2.com', 'abd@dsf.com', '034234', '324234', '34242', 'password', 'masfsa', 'mdfsf', '235235', '2021-09-18 00:00:00', 342, 0, 4, '2021-09-18 15:56:16', '324', '2021-12-13 10:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `clienthistorytable`
--

CREATE TABLE `clienthistorytable` (
  `ClientHistoryID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `ClientContactID` text NOT NULL,
  `NarrativeDate` int(11) NOT NULL,
  `Narrative` text NOT NULL,
  `LastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clienthistorytable`
--

INSERT INTO `clienthistorytable` (`ClientHistoryID`, `EntryDate`, `ClientContactID`, `NarrativeDate`, `Narrative`, `LastUpdated`) VALUES
(1, '2021-09-18 19:04:51', '1', 2147483647, 'User logged in', '0000-00-00 00:00:00'),
(2, '2021-09-18 19:06:01', '1', 2147483647, 'User logged in', '0000-00-00 00:00:00'),
(3, '2021-09-18 19:10:52', '1', 2147483647, 'User logged in', '0000-00-00 00:00:00'),
(4, '2021-09-18 19:12:21', '1', 2147483647, 'User logged in', '0000-00-00 00:00:00'),
(5, '2021-09-18 19:13:58', '1', 2147483647, 'User logged out', '0000-00-00 00:00:00'),
(6, '2021-12-10 15:08:41', '1', 2147483647, 'User logged in', '0000-00-00 00:00:00'),
(7, '2021-12-10 16:28:20', '1', 2147483647, 'User logged out', '0000-00-00 00:00:00'),
(8, '2021-12-10 16:31:58', '1', 2147483647, 'User logged in', '0000-00-00 00:00:00'),
(9, '2021-12-11 19:13:10', '4', 2147483647, 'User logged out', '0000-00-00 00:00:00'),
(10, '2021-12-11 19:17:28', '2', 2147483647, 'User logged in', '0000-00-00 00:00:00'),
(11, '2021-12-11 19:18:37', '2', 2147483647, 'User logged out', '0000-00-00 00:00:00'),
(12, '2021-12-11 19:18:40', '1', 2147483647, 'User logged in', '0000-00-00 00:00:00'),
(13, '2021-12-11 20:42:32', '1', 2147483647, 'User logged in', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `discussiontable`
--

CREATE TABLE `discussiontable` (
  `DiscussionID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `SenderID` varchar(255) NOT NULL,
  `RecipientID` varchar(255) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discussiontable`
--

INSERT INTO `discussiontable` (`DiscussionID`, `EntryDate`, `SenderID`, `RecipientID`, `Message`) VALUES
(1, '2021-12-12 02:59:42', '1', '1', '1'),
(2, '2021-12-12 03:00:07', '1', '1', '1'),
(3, '2021-12-12 03:04:20', '1', '1', 'fdsfd'),
(4, '2021-12-12 03:04:28', '1', '1', 'sdfsdfsd'),
(5, '2021-12-12 03:04:38', '1', '1', '32432'),
(6, '2021-12-12 03:05:26', '1', '1', '32432'),
(7, '2021-12-12 03:06:38', '1', '1', 'hkj'),
(8, '2021-12-12 03:06:45', '1', '1', 'huiyui'),
(9, '2021-12-12 03:16:03', '1', '1', 'huiyui'),
(10, '2021-12-12 03:18:04', '1', '1', 'huiyui'),
(11, '2021-12-12 03:18:42', '1', '1', 'huiyui'),
(12, '2021-12-12 03:19:28', '1', '1', 'huiyui'),
(13, '2021-12-12 03:20:17', '1', '1', 'huiyui'),
(14, '2021-12-12 03:25:11', '1', '1', 'huiyui'),
(15, '2021-12-12 03:26:36', '1', '1', 'huiyui'),
(16, '2021-12-12 03:29:07', '1', '1', 'huiyui'),
(17, '2021-12-12 03:30:26', '1', '1', 'huiyui'),
(18, '2021-12-12 03:33:37', '1', '1', 'huiyui'),
(19, '2021-12-12 03:35:07', '1', '1', 'huiyui'),
(20, '2021-12-13 09:25:02', '1', '1', 'kibn');

-- --------------------------------------------------------

--
-- Table structure for table `ndisplantable`
--

CREATE TABLE `ndisplantable` (
  `NDISPlanID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `Client` text NOT NULL,
  `PlanStartDate` datetime NOT NULL,
  `PlanEndDate` datetime NOT NULL,
  `Service` text NOT NULL,
  `AmountApproved` int(11) NOT NULL,
  `AmountAvailable` int(11) NOT NULL,
  `EndDate` datetime NOT NULL,
  `EndReason` text NOT NULL,
  `LastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ndisplantable`
--

INSERT INTO `ndisplantable` (`NDISPlanID`, `EntryDate`, `Client`, `PlanStartDate`, `PlanEndDate`, `Service`, `AmountApproved`, `AmountAvailable`, `EndDate`, `EndReason`, `LastUpdated`) VALUES
(1, '2021-12-11 12:54:23', '1', '2021-12-11 12:54:23', '2021-12-13 16:54:23', 'sjfksdjk services', 100, 200, '2021-12-11 12:54:23', 'kjhjh end reason', '2021-12-11 12:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `negotiationtable`
--

CREATE TABLE `negotiationtable` (
  `NegotiationID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `Transaction` text NOT NULL,
  `PreferredDateStart` datetime NOT NULL,
  `PreferredDateEnd` datetime NOT NULL,
  `Price` int(11) NOT NULL,
  `Frequency` int(11) NOT NULL,
  `Accepted` text NOT NULL,
  `LastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `providercontacttable`
--

CREATE TABLE `providercontacttable` (
  `ProviderContactID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `ProviderNDISNumber` text NOT NULL,
  `FirstName` text NOT NULL,
  `MiddleName` text NOT NULL,
  `LastName` text NOT NULL,
  `UnitNumber` text NOT NULL,
  `StreetNumber` text NOT NULL,
  `StreetName` text NOT NULL,
  `StreetType` text NOT NULL,
  `Suburb` text NOT NULL,
  `State` text NOT NULL,
  `Postcode` text NOT NULL,
  `Email1` text NOT NULL,
  `Email2` text NOT NULL,
  `MobilePhone` text NOT NULL,
  `WorkPhone` text NOT NULL,
  `PreferredContact` text NOT NULL,
  `Password` text NOT NULL,
  `SecurityQuestion` text NOT NULL,
  `SecurityAnswer` text NOT NULL,
  `CommencementDate` datetime NOT NULL,
  `AggregateRating` float NOT NULL,
  `NumberOfRatings` int(11) NOT NULL DEFAULT 0,
  `ProviderOrganisation` int(11) NOT NULL DEFAULT 0,
  `Active` text NOT NULL,
  `DepartureDate` datetime NOT NULL,
  `DepartureReason` text NOT NULL,
  `LastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `providercontacttable`
--

INSERT INTO `providercontacttable` (`ProviderContactID`, `EntryDate`, `ProviderNDISNumber`, `FirstName`, `MiddleName`, `LastName`, `UnitNumber`, `StreetNumber`, `StreetName`, `StreetType`, `Suburb`, `State`, `Postcode`, `Email1`, `Email2`, `MobilePhone`, `WorkPhone`, `PreferredContact`, `Password`, `SecurityQuestion`, `SecurityAnswer`, `CommencementDate`, `AggregateRating`, `NumberOfRatings`, `ProviderOrganisation`, `Active`, `DepartureDate`, `DepartureReason`, `LastUpdated`) VALUES
(1, '2021-09-18 15:58:14', 'rqerwe', 'wqr', 'qwt', 'wqte', '1', '44', '454', '', '44', '53', '53', 'john3@john3.com', 'joh@jsl.com', '02342134', '023234', '0245235', 'password', '23423', '23523', '2021-09-18 15:58:14', 3242, 0, 0, '2892', '2021-09-18 15:58:14', '082038', '2021-09-18 15:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `providerhistorytable`
--

CREATE TABLE `providerhistorytable` (
  `ProviderHistoryID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `ProviderContactID` text NOT NULL,
  `NarrativeDate` datetime NOT NULL,
  `Narrative` text NOT NULL,
  `LastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `providerhistorytable`
--

INSERT INTO `providerhistorytable` (`ProviderHistoryID`, `EntryDate`, `ProviderContactID`, `NarrativeDate`, `Narrative`, `LastUpdated`) VALUES
(1, '2021-09-18 19:15:12', '1', '2021-09-18 19:15:12', 'User logged in', '0000-00-00 00:00:00'),
(2, '2021-09-18 19:15:25', '1', '2021-09-18 19:15:25', 'User logged out', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `providerorganisationtable`
--

CREATE TABLE `providerorganisationtable` (
  `ProviderOrganisationID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `ProviderOrganisationNDISNumber` text NOT NULL,
  `TradingName` text NOT NULL,
  `LegalName` text NOT NULL,
  `ABN` text NOT NULL,
  `ACN` text NOT NULL,
  `DisplayLogo` text NOT NULL,
  `UnitNumber` text NOT NULL,
  `StreetNumber` text NOT NULL,
  `StreetName` text NOT NULL,
  `StreetType` text NOT NULL,
  `Suburb` text NOT NULL,
  `State` text NOT NULL,
  `Postcode` text NOT NULL,
  `Email1` text NOT NULL,
  `Email2` text NOT NULL,
  `Website` varchar(255) DEFAULT NULL,
  `MobilePhone` text NOT NULL,
  `HomePhone` text NOT NULL,
  `WorkPhone` text NOT NULL,
  `CommencementDate` datetime NOT NULL,
  `Active` text NOT NULL,
  `AggregateRating` float NOT NULL,
  `DepartureDate` datetime NOT NULL,
  `DepartureReason` text NOT NULL,
  `LastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `providerorganisationtable`
--

INSERT INTO `providerorganisationtable` (`ProviderOrganisationID`, `EntryDate`, `ProviderOrganisationNDISNumber`, `TradingName`, `LegalName`, `ABN`, `ACN`, `DisplayLogo`, `UnitNumber`, `StreetNumber`, `StreetName`, `StreetType`, `Suburb`, `State`, `Postcode`, `Email1`, `Email2`, `Website`, `MobilePhone`, `HomePhone`, `WorkPhone`, `CommencementDate`, `Active`, `AggregateRating`, `DepartureDate`, `DepartureReason`, `LastUpdated`) VALUES
(1, '2021-12-11 16:33:57', '23', 'tradingName', 'legalName', 'abn', 'acn', 'display logo', '12345', '1', 'street name', 'streetType', 'safsf', 'sdf', '13', 'test@gmail.com', 'test@gmail.com', 'skfj', '24234', '332', 'sdfsf3323', '2021-12-11 16:33:57', 'sfsa', 234, '2021-12-11 16:33:57', 'sfasfdas fdasas', '2021-12-11 16:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `PwdResetId` int(11) NOT NULL,
  `PwdResetEmail` text NOT NULL,
  `PwdResetSelector` text NOT NULL,
  `PwdResetToken` longtext NOT NULL,
  `PwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`PwdResetId`, `PwdResetEmail`, `PwdResetSelector`, `PwdResetToken`, `PwdResetExpires`) VALUES
(19, 'john@john.com', '72fef6a74bf7912b', '$2y$10$Q/eSZPUciZxBeaKPneqsiehvsacBB2ylXdhHmp.D1BVQnkokseLMi', '1631959960');

-- --------------------------------------------------------

--
-- Table structure for table `servicesprovidedtable`
--

CREATE TABLE `servicesprovidedtable` (
  `ServicesProvidedID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `ProviderID` text NOT NULL,
  `Service` text NOT NULL,
  `Suburb` varchar(255) NOT NULL,
  `Active` text NOT NULL,
  `DepartureDate` datetime NOT NULL,
  `DepartureReason` text NOT NULL,
  `LastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicesprovidedtable`
--

INSERT INTO `servicesprovidedtable` (`ServicesProvidedID`, `EntryDate`, `ProviderID`, `Service`, `Suburb`, `Active`, `DepartureDate`, `DepartureReason`, `LastUpdated`) VALUES
(1, '2021-12-12 07:55:42', '1', 'service', 'suburb', 'active', '2021-12-12 07:55:42', 'departure Reason', '2021-12-12 07:55:42'),
(2, '2021-12-12 07:55:42', '1', 'service1', 'suburb1', 'any', '2021-12-12 07:55:42', 'departure Reason', '2021-12-12 07:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `servicetable`
--

CREATE TABLE `servicetable` (
  `ServiceID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `ServiceDescription` text NOT NULL,
  `NDISClassification` text NOT NULL,
  `Active` text NOT NULL,
  `DepartureDate` datetime NOT NULL,
  `DepartureReason` text NOT NULL,
  `LastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supportorganisationtable`
--

CREATE TABLE `supportorganisationtable` (
  `SupportOrganisationID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `NDISReferencenumber` text NOT NULL,
  `TradingName` text NOT NULL,
  `LegalName` text NOT NULL,
  `ABN` text NOT NULL,
  `ACN` text NOT NULL,
  `UnitNumber` text NOT NULL,
  `StreetNumber` text NOT NULL,
  `StreetName` text NOT NULL,
  `StreetType` text NOT NULL,
  `Suburb` text NOT NULL,
  `State` text NOT NULL,
  `Postcode` text NOT NULL,
  `Email1` text NOT NULL,
  `Email2` text NOT NULL,
  `MobilePhone` text NOT NULL,
  `HomePhone` text NOT NULL,
  `WorkPhone` text NOT NULL,
  `CommencementDate` datetime NOT NULL,
  `Active` text NOT NULL,
  `DepartureDate` datetime NOT NULL,
  `DepartureReason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supportpersontable`
--

CREATE TABLE `supportpersontable` (
  `SupportPersonID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `FirstName` text NOT NULL,
  `MiddleName` text NOT NULL,
  `LastName` text NOT NULL,
  `BirthDate` date NOT NULL,
  `UnitNumber` text NOT NULL,
  `StreetNumber` text NOT NULL,
  `StreetName` text NOT NULL,
  `StreetType` text NOT NULL,
  `Suburb` text NOT NULL,
  `State` text NOT NULL,
  `Postcode` text NOT NULL,
  `Email1` text NOT NULL,
  `Email2` text NOT NULL,
  `MobilePhone` text NOT NULL,
  `HomePhone` text NOT NULL,
  `WorkPhone` text NOT NULL,
  `Organisation` text NOT NULL,
  `ClientID` text NOT NULL,
  `Relationship` text NOT NULL,
  `CommencementDate` datetime NOT NULL,
  `Active` text NOT NULL,
  `DepartureDate` datetime NOT NULL,
  `DepartureReason` text NOT NULL,
  `LastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactiontable`
--

CREATE TABLE `transactiontable` (
  `NegotiationID` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL,
  `Client` text NOT NULL,
  `Provider` text NOT NULL,
  `TransactionDate` datetime NOT NULL,
  `RatingbyClient` float NOT NULL,
  `RatingbyProvider` float NOT NULL,
  `Fee` int(11) NOT NULL,
  `LastUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylog`
--
ALTER TABLE `activitylog`
  ADD PRIMARY KEY (`ActivityLogID`),
  ADD UNIQUE KEY `ActivityLogID` (`ActivityLogID`);

--
-- Indexes for table `agencyofficerhistorytable`
--
ALTER TABLE `agencyofficerhistorytable`
  ADD PRIMARY KEY (`AgencyOfficerHistoryID`);

--
-- Indexes for table `agencyofficertable`
--
ALTER TABLE `agencyofficertable`
  ADD PRIMARY KEY (`AgencyOfficerID`),
  ADD UNIQUE KEY `AgencyOfficerID` (`AgencyOfficerID`);

--
-- Indexes for table `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD PRIMARY KEY (`BookingID`),
  ADD UNIQUE KEY `BookingID` (`BookingID`);

--
-- Indexes for table `clientcontacttable`
--
ALTER TABLE `clientcontacttable`
  ADD PRIMARY KEY (`ClientContactID`),
  ADD UNIQUE KEY `ClientContactID` (`ClientContactID`);

--
-- Indexes for table `clienthistorytable`
--
ALTER TABLE `clienthistorytable`
  ADD PRIMARY KEY (`ClientHistoryID`),
  ADD UNIQUE KEY `ClientHistoryID` (`ClientHistoryID`);

--
-- Indexes for table `discussiontable`
--
ALTER TABLE `discussiontable`
  ADD PRIMARY KEY (`DiscussionID`);

--
-- Indexes for table `ndisplantable`
--
ALTER TABLE `ndisplantable`
  ADD PRIMARY KEY (`NDISPlanID`),
  ADD UNIQUE KEY `NDISPlanID` (`NDISPlanID`);

--
-- Indexes for table `negotiationtable`
--
ALTER TABLE `negotiationtable`
  ADD PRIMARY KEY (`NegotiationID`),
  ADD UNIQUE KEY `NegotiationID` (`NegotiationID`);

--
-- Indexes for table `providercontacttable`
--
ALTER TABLE `providercontacttable`
  ADD PRIMARY KEY (`ProviderContactID`),
  ADD UNIQUE KEY `ProviderContactID` (`ProviderContactID`);

--
-- Indexes for table `providerhistorytable`
--
ALTER TABLE `providerhistorytable`
  ADD PRIMARY KEY (`ProviderHistoryID`),
  ADD UNIQUE KEY `ProviderHistoryID` (`ProviderHistoryID`);

--
-- Indexes for table `providerorganisationtable`
--
ALTER TABLE `providerorganisationtable`
  ADD PRIMARY KEY (`ProviderOrganisationID`),
  ADD UNIQUE KEY `ProviderOrganisationID` (`ProviderOrganisationID`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`PwdResetId`);

--
-- Indexes for table `servicesprovidedtable`
--
ALTER TABLE `servicesprovidedtable`
  ADD PRIMARY KEY (`ServicesProvidedID`),
  ADD UNIQUE KEY `ServicesProvidedID` (`ServicesProvidedID`);

--
-- Indexes for table `servicetable`
--
ALTER TABLE `servicetable`
  ADD PRIMARY KEY (`ServiceID`),
  ADD UNIQUE KEY `ServiceID` (`ServiceID`);

--
-- Indexes for table `supportorganisationtable`
--
ALTER TABLE `supportorganisationtable`
  ADD PRIMARY KEY (`SupportOrganisationID`),
  ADD UNIQUE KEY `SupportOrganisationID` (`SupportOrganisationID`);

--
-- Indexes for table `supportpersontable`
--
ALTER TABLE `supportpersontable`
  ADD PRIMARY KEY (`SupportPersonID`),
  ADD UNIQUE KEY `SupportPersonID` (`SupportPersonID`);

--
-- Indexes for table `transactiontable`
--
ALTER TABLE `transactiontable`
  ADD PRIMARY KEY (`NegotiationID`),
  ADD UNIQUE KEY `NegotiationID` (`NegotiationID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencyofficerhistorytable`
--
ALTER TABLE `agencyofficerhistorytable`
  MODIFY `AgencyOfficerHistoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clientcontacttable`
--
ALTER TABLE `clientcontacttable`
  MODIFY `ClientContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clienthistorytable`
--
ALTER TABLE `clienthistorytable`
  MODIFY `ClientHistoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `discussiontable`
--
ALTER TABLE `discussiontable`
  MODIFY `DiscussionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `providercontacttable`
--
ALTER TABLE `providercontacttable`
  MODIFY `ProviderContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `providerhistorytable`
--
ALTER TABLE `providerhistorytable`
  MODIFY `ProviderHistoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `PwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
