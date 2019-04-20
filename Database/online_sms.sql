-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2019 at 08:27 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessory`
--

CREATE TABLE `accessory` (
  `id` int(11) NOT NULL,
  `aname` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `pimage` varchar(300) NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accessory`
--

INSERT INTO `accessory` (`id`, `aname`, `quantity`, `price`, `pimage`, `delete_status`) VALUES
(1, 'Armband phone pouch', '47', '150', '', 0),
(2, 'Cellphone holder stand', '44', '160', '', 0),
(3, 'Phone Cover', '99', '130', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `modal`
--

CREATE TABLE `modal` (
  `id` int(5) NOT NULL,
  `header` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modal`
--

INSERT INTO `modal` (`id`, `header`, `title`, `description`) VALUES
(1, 'Notification', 'Hello, this is version 2.0 and I am still working on this. ', 'Please don\'t forget to give credit to original developer because I really worked hard to develop this project and please don\'t forget to like and share it if you found it useful :)\r\n\r\nFor students or anyone else who needs program or source code for thesis writing or any Professional Software Development,Website Development,Mobile Apps Development at affordable cost\r\ncontact me at\r\nEmail : mayuri.infospace@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE `part` (
  `id` int(11) NOT NULL,
  `partname` varchar(50) NOT NULL,
  `parttype` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `warranty` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`id`, `partname`, `parttype`, `price`, `warranty`, `quantity`, `delete_status`) VALUES
(1, 'Microphone', 'Speaker', '1500', '365', '15', 0),
(2, 'Camera Lens', 'Camera', '2000', '730', '20', 1),
(3, 'Menu Dial', 'keypad ', '1000', '730', '20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pbrand` varchar(50) NOT NULL,
  `pmodel` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `pcolor` varchar(50) NOT NULL,
  `pprice` varchar(50) NOT NULL,
  `pimage` varchar(100) NOT NULL,
  `emei1` varchar(50) NOT NULL,
  `emei2` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `wperiod` varchar(50) NOT NULL,
  `assign` tinyint(4) NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`id`, `pname`, `pbrand`, `pmodel`, `category`, `pcolor`, `pprice`, `pimage`, `emei1`, `emei2`, `description`, `wperiod`, `assign`, `delete_status`) VALUES
(31, 'Samsung on 5 pro', 'Samsung', 'On 5 Pro', 'Android', 'Black', '6290', '95997.jpg', '3563523235645665', '98564563456789', '																																																																																The Samsung Galaxy On5 Pro is powered by 1.3GHz quad-core processor and it comes with 2GB of RAM.', '365', 0, 0),
(33, 'Nokia', 'Nokia', 'Nokia Lumia', 'Iphone', 'Black', '9544', '4231.jpg', '90897876756', '986875675646', '								daewd								 ', '320', 0, 0),
(34, 'Samsung Gallexy', 'Samsung', 'Gallexy', 'Android', '', '', '', '567567567567567567567', '778989662456456', 'sdfsdf', '46', 0, 0),
(35, 'aaaa', '', 'sdfsf', '', '', '', 'jyoti.png', '435435', '345345', 'sdgsdgf', '34543545', 0, 1),
(36, 'sdfg', '', 'dsgf', '', '', '', '', 'dfsg', 'dfg', 'dsg', '456546', 1, 0),
(37, 'sg', '', 'dfg', '', '', '', '', 'dg', 'ertye', '456', '456', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tac`
--

CREATE TABLE `tac` (
  `id` int(11) NOT NULL,
  `description` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tac`
--

INSERT INTO `tac` (`id`, `description`) VALUES
(1, '1.sdfsdfsdfsdff<br>\r\n2.zsfsdfsdfsdfsd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `company` varchar(300) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `company`, `name`, `email`, `password`, `phone`, `address`, `role`, `image`, `delete_status`) VALUES
(1, 'SSS', 'Mayuri K', 'mayuri@gmail.com', 'd13a0dab8fa5b30a5d311034fca71a44e7c60a57566a086a78602a1f4f47125b', '+919423979339', 'Maharashtra, India', 'seller', '242695b607054e1a33.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessory`
--
ALTER TABLE `accessory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tac`
--
ALTER TABLE `tac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessory`
--
ALTER TABLE `accessory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `modal`
--
ALTER TABLE `modal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `part`
--
ALTER TABLE `part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tac`
--
ALTER TABLE `tac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
