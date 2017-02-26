-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Host: 127.4.21.130:3306
-- Generation Time: Feb 26, 2017 at 06:24 AM
-- Server version: 5.5.52
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipoz`
--

-- --------------------------------------------------------

--
-- Table structure for table `sipoz_client`
--

CREATE TABLE IF NOT EXISTS `sipoz_client` (
  `sipoz_client_id` int(11) NOT NULL AUTO_INCREMENT,
  `sipoz_client_firstname` varchar(50) DEFAULT NULL,
  `sipoz_client_lastname` varchar(50) DEFAULT NULL,
  `sipoz_client_address` varchar(250) DEFAULT NULL,
  `sipoz_client_phone` varchar(30) DEFAULT NULL,
  `sipoz_client_username` varchar(30) DEFAULT NULL,
  `sipoz_client_password` varchar(255) DEFAULT NULL,
  `sipoz_client_status` char(1) DEFAULT NULL,
  PRIMARY KEY (`sipoz_client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sipoz_client`
--

INSERT INTO `sipoz_client` (`sipoz_client_id`, `sipoz_client_firstname`, `sipoz_client_lastname`, `sipoz_client_address`, `sipoz_client_phone`, `sipoz_client_username`, `sipoz_client_password`, `sipoz_client_status`) VALUES
(1, 'Ivan ', 'Ramirez', '5/25 Buckingham', '0450872306', 'ivan', '2c42e5cf1cdbafea04ed267018ef1511', '1'),
(2, 'Gabriel', 'Malaver', 'Paddington', '0450505050', 'gabrielito', 'gabrielito', '1'),
(3, 'Sonia', 'Gerena', 'Carina Heights', '0412128989', 'sonia', 'sonia', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sipoz_invoice`
--

CREATE TABLE IF NOT EXISTS `sipoz_invoice` (
  `sipoz_invoice_number` int(11) NOT NULL AUTO_INCREMENT,
  `sipoz_invoice_date` datetime DEFAULT NULL,
  `sipoz_invoice_client_id` int(11) DEFAULT NULL,
  `sipoz_invoice_amount` decimal(8,2) DEFAULT NULL,
  `sipoz_invoice_status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`sipoz_invoice_number`),
  KEY `fk_sipoz_invoice_1_idx` (`sipoz_invoice_client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sipoz_invoice`
--

INSERT INTO `sipoz_invoice` (`sipoz_invoice_number`, `sipoz_invoice_date`, `sipoz_invoice_client_id`, `sipoz_invoice_amount`, `sipoz_invoice_status`) VALUES
(1, '2015-01-25 00:00:00', 1, '100.00', 'e'),
(2, '2015-03-20 00:00:00', 2, '100.00', 'e'),
(3, '2015-02-18 00:00:00', 3, '200.00', 'e'),
(4, '2015-03-06 00:00:00', 3, '200.00', 'e'),
(5, '2015-02-01 00:00:00', 1, '200.00', 'e'),
(6, '2015-03-01 00:00:00', 2, '200.00', 'e'),
(7, '2015-02-01 00:00:00', 3, '100.00', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `sipoz_invoice_items`
--

CREATE TABLE IF NOT EXISTS `sipoz_invoice_items` (
  `sipoz_invoice_items_number` int(11) NOT NULL AUTO_INCREMENT,
  `sipoz_invoice_items_invoice_number` int(11) DEFAULT NULL,
  `sipoz_invoice_items_stock_id` int(11) DEFAULT NULL,
  `sipoz_invoice_items_quantity` int(11) DEFAULT NULL,
  `sipoz_invoice_items_stock_price` decimal(7,2) DEFAULT NULL,
  `sipoz_invoice_items_stock_amount` decimal(7,2) DEFAULT NULL,
  `sipoz_invoice_items_status` char(1) DEFAULT NULL,
  PRIMARY KEY (`sipoz_invoice_items_number`),
  KEY `fk_sipoz_invoice_items_1_idx` (`sipoz_invoice_items_invoice_number`),
  KEY `fk_sipoz_invoice_items_2_idx` (`sipoz_invoice_items_stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sipoz_stock`
--

CREATE TABLE IF NOT EXISTS `sipoz_stock` (
  `sipoz_stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `sipoz_stock_name` varchar(250) DEFAULT NULL,
  `sipoz_stock_description` text,
  `sipoz_stock_onhand` varchar(5) DEFAULT NULL,
  `sipoz_stock_price` decimal(7,2) DEFAULT NULL,
  `sipoz_stock_status` char(1) DEFAULT NULL,
  `sipoz_stock_filepath` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`sipoz_stock_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `sipoz_stock`
--

INSERT INTO `sipoz_stock` (`sipoz_stock_id`, `sipoz_stock_name`, `sipoz_stock_description`, `sipoz_stock_onhand`, `sipoz_stock_price`, `sipoz_stock_status`, `sipoz_stock_filepath`) VALUES
(2, 'Logitech Keyboard K120', '- A comfortable, sleek and sturdy keyboard, with adjustable tilt legs\r\n- Durable and spill-resistant design protects the keyboard from accidental spills\r\n- Features low-profile, quiet and full-sized F keys with an integrated number pad\r\n- Bold and bright white characters make the keys easier to read\r\n- USB enabled\r\n- System Requirements: Windows 7, Vista and XP', '10', '25.00', 'e', 'catalogue/keyboard.jpg'),
(3, 'Monitor', '17 inches', '50', '350.00', 'e', 'catalogue/monitor.jpg'),
(4, 'CPU', 'LG', '10', '500.00', 'e', NULL),
(5, 'Motherboard', 'Asus', '25', '601.00', 'e', NULL),
(6, 'Speakers', 'LG', '10', '25.00', 'e', NULL),
(7, 'RAM Memory', 'Intel', '10', '125.00', 'e', NULL),
(8, 'Printer', 'Epson', '12', '100.00', 'e', NULL),
(9, 'Laptop', 'Dell - Inspiron 15', '5', '1500.00', 'e', NULL),
(10, 'DVD', 'ASUS', '5', '20.00', 'e', NULL),
(11, 'Mouse Pad', 'Microsoft', '12', '25.00', 'e', NULL),
(12, 'Mouse', 'LG', '5', '15.00', 'e', 'catalogue/mouse.jpg'),
(13, 'mouse', 'wireless', '5', '20.00', 'e', NULL),
(14, 'mouse', 'wireless', '5', '20.00', 'e', NULL),
(15, 'Modem', 'patito', '1', '80.00', 'e', NULL),
(16, 'Laptop', 'Dell Inspiron 15', '2', '1500.00', 'e', NULL),
(17, 'Printer', 'HP', '23', '80.00', 'e', NULL),
(18, 'mouse', 'acer', '5', '10.00', 'e', NULL),
(19, 'Mouse', 'Insistent', '7', '20.00', 'e', NULL),
(20, 'Headphones', 'Mutant', '2', '30.00', 'e', NULL),
(21, 'Samsung Galaxy', 'Samsung', '3', '500.00', 'e', NULL),
(22, 'iPad', 'Apple', '2', '250.00', 'e', NULL),
(23, 'iPhone', 'Apple 6', '2', '1000.00', 'e', NULL),
(24, 'Hard Disk', 'Dell', '3', '90.00', 'e', NULL),
(25, 'Network card', 'IEEE', '2', '200.00', 'e', NULL),
(29, 'Iron Man', 'New one', '200', '200.00', 'e', 'catalogue/IR1.jpg'),
(31, 'Lapto', 'Dell Inspiron 15', '10', '1500.00', 'e', 'catalogue/sipoz5.jpg'),
(32, 'Mouse', 'Insystem USB', '100', '15.00', 'e', 'catalogue/sipoz6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sipoz_user`
--

CREATE TABLE IF NOT EXISTS `sipoz_user` (
  `sipoz_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `sipoz_user_username` varchar(30) DEFAULT NULL,
  `sipoz_user_password` varchar(100) DEFAULT NULL,
  `sipoz_user_firstname` varchar(50) DEFAULT NULL,
  `sipoz_user_lastname` varchar(50) DEFAULT NULL,
  `sipoz_user_group` varchar(50) DEFAULT NULL,
  `sipoz_user_status` char(1) DEFAULT NULL,
  `sipoz_user_address` varchar(45) DEFAULT NULL,
  `sipoz_user_phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`sipoz_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `sipoz_user`
--

INSERT INTO `sipoz_user` (`sipoz_user_id`, `sipoz_user_username`, `sipoz_user_password`, `sipoz_user_firstname`, `sipoz_user_lastname`, `sipoz_user_group`, `sipoz_user_status`, `sipoz_user_address`, `sipoz_user_phone`) VALUES
(1, 'admin', 'b90d33f2b12789d32691050a2083be28eb99985601a1f1a72efc9232e49306fd', 'Dario', 'Ramirez', 'a', 'e', NULL, NULL),
(2, 'sonia', 'b90d33f2b12789d32691050a2083be28eb99985601a1f1a72efc9232e49306fd', 'Sonia', 'Gerena', 'u', 'e', NULL, NULL),
(19, 'test1', '1b4f0e9851971998e732078544c96b36c3d01cedf7caa332359d6f1d83567014', 'Test', 'test1', '', '', 'test', '123'),
(20, 'ivan', 'cd0b9452fc376fc4c35a60087b366f70d883fc901524daf1f122fbd319384f6a', 'Ivan', 'Ramirez', '', '', '3/95 Anzac Road', '0405875245'),
(21, 'german', 'bebcf8f60bdac894f4f58104baa420415de4934ebfc1bf7585bcf3ed21eeba13', 'german ', 'baron', '', '', 'cra 9aA No 8-65', '311 587 7278'),
(22, 'gerbarona@gmail.com', 'bebcf8f60bdac894f4f58104baa420415de4934ebfc1bf7585bcf3ed21eeba13', 'german ', 'baron', '', '', 'cra 9aA No 8-65', '311 587 7278'),
(23, 'Gerbarona', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'German', 'Baron', '', '', 'Esperanza', '222'),
(24, 'Jc', '9f1c9ed30e18c43065c407b436df0ac3d4962085a78cb40e94bd70be1d2cfbb1', 'J', 'C', '', '', 'Av', '2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sipoz_invoice`
--
ALTER TABLE `sipoz_invoice`
  ADD CONSTRAINT `fk_sipoz_invoice_1` FOREIGN KEY (`sipoz_invoice_client_id`) REFERENCES `sipoz_client` (`sipoz_client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sipoz_invoice_items`
--
ALTER TABLE `sipoz_invoice_items`
  ADD CONSTRAINT `fk_sipoz_invoice_items_1` FOREIGN KEY (`sipoz_invoice_items_invoice_number`) REFERENCES `sipoz_invoice` (`sipoz_invoice_number`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sipoz_invoice_items_2` FOREIGN KEY (`sipoz_invoice_items_stock_id`) REFERENCES `sipoz_stock` (`sipoz_stock_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
