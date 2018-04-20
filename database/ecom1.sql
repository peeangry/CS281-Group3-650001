-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2018 at 08:00 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom1`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Huawei'),
(4, 'Oppo'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Apple'),
(2, 'Samsung\r\n'),
(3, 'Huawei'),
(4, 'Oppo'),
(5, 'Accessorries'),
(6, 'special'),
(7, 'TY');

-- --------------------------------------------------------

--
-- Table structure for table `email_info`
--

CREATE TABLE `email_info` (
  `ID` int(10) NOT NULL,
  `email` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_info`
--

INSERT INTO `email_info` (`ID`, `email`) VALUES
(1, 'superhipee@hotmail.com'),
(2, 'pchanawut@hotmail.com'),
(4, 'smell-sjr@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 2, 7, 1, '07M47684BS5725041', 'Completed'),
(2, 2, 2, 1, '07M47684BS5725041', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 1, 1, 'iPhone X', 47900, 'Dimensions 143.6 x 70.9 x 7.7 mm (5.65 x 2.79 x 0.30 in)\r\n\r\nWeight 174 g (6.14 oz)\r\n\r\nBuild Front/back glass, stainless steel frame\r\n\r\nSIM Nano-SIM\r\n\r\n-IP67 certified - dust/water resistant (up to 1m for 30 mins) \r\n-Apple Pay (Visa, MasterCard, AMEX certified)\r\n\r\n', 'iphonex.jpeg', 'iphone x 10  iphonex iphone10 '),
(2, 1, 1, 'iPhone 8 Plus', 36500, 'iPhone 8 Plus \r\n\r\nDISPLAY & SENSORS\r\n	Smartphone\r\n	Display Retina Display 24-bit (True color) \r\n- Multi-Touch\r\n- Width 5.5 Inch (Diagonal)\r\n- Resolution 1080 x 1920 Pixels (401 ppi) \r\n- Capacitive\r\n	Sensor \r\n- Fingerprint identity sensor (Touch ID) \r\n- Accelerometer (Accelerometer) \r\n- Ambient Light Sensor (Ambient light) \r\n- Proximity Sensor \r\n- Three-axis Gyroscope (Three-axis gyroscope) \r\n- Built-in Barometer\r\n	Colours : Gold, Space Gray, Silver\r\nCONNECTIVITY\r\n	Location: Assisted GPS\r\n	WiFi 802.11 a/b/g/n/ac \r\n- Portable Internet hot-spots (Portable Wi-Fi Hotspot)\r\n	Bluetooth 5.0 \r\n- Support for stereo headsets\r\n	Supported NFC (Near Field Communication)\r\n	USB Lightning\r\n', 'iphone8plus.jpg', 'iphone iphone8+ iphone8plus 8+ 8plus Apple apple'),
(3, 1, 1, 'iPad Pro 12.9', 40000, ' iPad Pro 12.9 Wi-Fi + Cellular\r\n\r\nDISPLAY & SENSORS\r\n	Tablet\r\n	Display Retina Display 24-bit (True color) \r\n- Multi-Touch\r\n- Width 12.9 Inch (Diagonal)\r\n- Resolution 2048 x 2732 Pixels (264 ppi) \r\n- Capacitive \r\n- Fingerprints Resistant\r\n	Sensor \r\n- Fingerprint Verification (Finger Print) \r\n- Ambient Light Sensor (Ambient light) \r\n- Three-axis Gyroscope (Three-axis gyroscope) \r\n- Built-in Barometer\r\nCONNECTIVITY\r\n	Location: Assisted GPS\r\n	WiFi 802.11 a/b/g/n/ac\r\n	Bluetooth 4.2\r\n	USB Lightning\r\n', 'ipad12.9.jpg', 'apple ipad iPadpro pro 12.9 ipadpro12.9\r\nipadpro iPadPro12.9 Apple'),
(4, 1, 1, 'iPad Pro 10.5', 35000, 'iPad Pro 10.5 Wi-Fi + Cellular\r\n\r\nDISPLAY & SENSORS\r\n	Tablet\r\n	Display Retina Display 24-bit (True color) \r\n- Multi-Touch\r\n- Width 10.5 Inch (Diagonal)\r\n- Resolution 1668 x 2224 Pixels (264 ppi) \r\n- Capacitive \r\n- Fingerprints Resistant\r\n	Sensor \r\n- Fingerprint Verification (Finger Print) \r\n- Ambient Light Sensor (Ambient light) \r\n- Three-axis Gyroscope (Three-axis gyroscope) \r\n- Built-in Barometer\r\nCONNECTIVITY\r\n	Location: Assisted GPS\r\n	WiFi 802.11 a/b/g/n/ac\r\n	Bluetooth 4.2\r\n	USB Lightning\r\n', 'ipad10.5.png', 'apple ipad iPadpro pro 10.5 ipadpro10.5\r\nipadpro iPadPro10.5 Apple'),
(5, 2, 2, 'Samsung Galaxy S9 Plus', 28900, 'Samsung Galaxy S9+\r\n\r\nDISPLAY & SENSORS\r\n	Smartphone\r\n	Display Super AMOLED 24-bit (True color) \r\n- Multi-Touch\r\n- Width 6.2 Inch (Diagonal)\r\n- Resolution 2960 x 1440 Pixels (529 ppi) \r\n- Capacitive \r\n- Corning Gorilla Glass 5 \r\n- Dust Resistant\r\n	Sensor \r\n- Fingerprint Verification (Finger Print) \r\n- Facial recognition technology (Face Detection) \r\n- Accelerometer (Accelerometer) \r\n- Ambient Light Sensor (Ambient light) \r\n- Proximity Sensor \r\n- Magnetic Detection \r\n- Gyroscope (Gyroscope) \r\n- Built-in Barometer \r\n- Iris Scanning System\r\n	Waterproof (Water-resistent)\r\n- Temporary resistent.\r\n	Colours : Black, Blue, Purple\r\n\r\n\r\n\r\nCONNECTIVITY\r\n	Location: Assisted GPS\r\n- Support for application Google Maps\r\n	WiFi 802.11 a/b/g/n/ac \r\n- Portable Internet hot-spots (Portable Wi-Fi Hotspot)\r\n- Wi-Fi Direct\r\n	Bluetooth 5.0 \r\n- Support for stereo headsets\r\n	Supported NFC (Near Field Communication)\r\n	ANT+\r\n	USB Type-C\r\n	Headset /Jack 3.5 mm.\r\n', 's9+.jpg', 'samsung s9+ s9plus 9+ s galaxy S SamsungGalaxyS9Plus   9plus S9plus S9+'),
(6, 2, 2, 'Samsung Galaxy Note 8', 33000, 'Samsung Galaxy Note 8\r\n\r\nDISPLAY & SENSORS\r\n	Smartphone\r\n	Display Super AMOLED 24-bit (True color) \r\n- Multi-Touch\r\n- Width 6.3 Inch (Diagonal)\r\n- Resolution 1440 x 2960 Pixels (521 ppi) \r\n- Capacitive \r\n- Corning Gorilla Glass 5 \r\n- Dust Resistant\r\n	Sensor \r\n- Fingerprint Verification (Finger Print) \r\n- Facial recognition technology (Face Detection) \r\n- Accelerometer (Accelerometer) \r\n- Ambient Light Sensor (Ambient light) \r\n- Proximity Sensor \r\n- Magnetic Detection \r\n- Gyroscope (Gyroscope) \r\n- Adjust the view displayed automatically (Orientation) \r\n- Built-in Barometer \r\n- S-Pen Supported \r\n- Iris Scanning System\r\n	Waterproof (Water-resistent)\r\n- Temporary resistent.\r\nCONNECTIVITY\r\n	Location: Assisted GPS\r\n	WiFi 802.11 a/b/g/n/ac \r\n- Portable Internet hot-spots (Portable Wi-Fi Hotspot)\r\n- Wi-Fi Direct\r\n	Bluetooth 5.0\r\n	Supported NFC (Near Field Communication)\r\n	USB Type-C\r\n	Headset /Jack 3.5 mm.\r\n', 'note8.jpeg', 'Samsung samsung SamsungGalaxyNote8 Note8\r\nnote8 8 note Note Galaxy SamsungGalaxy'),
(7, 3, 3, 'Huawei P20 Pro', 28900, 'Huawei P20 Pro\r\n\r\nDISPLAY & SENSORS\r\n	Smartphone\r\n	Display OLED 24-bit (True color) \r\n- Multi-Touch\r\n- Width 6.1 Inch (Diagonal)\r\n- Resolution 1080 x 2240 Pixels (408 ppi) \r\n- Capacitive\r\n	Sensor \r\n- Fingerprint Verification (Finger Print) \r\n- Facial recognition technology (Face Detection) \r\n- Ambient Light Sensor (Ambient light) \r\n- Motion Sensor (Accelerometer) \r\n- Proximity Sensor \r\n- Gyroscope (Gyroscope)\r\n	Colours : Black, Blue\r\nCONNECTIVITY\r\n	Location: Assisted GPS\r\n	WiFi 802.11 a/b/g/n/ac \r\n- Portable Internet hot-spots (Portable Wi-Fi Hotspot)\r\n- Wi-Fi Direct\r\n	Infrared (IrDA)\r\n	Bluetooth 4.2 LE \r\n- Support for stereo headsets\r\n	Supported NFC (Near Field Communication)\r\n	USB Type-C\r\n\r\n', 'p20pro.jpeg', 'Huawei P20 Pro HuaweiP20Pro p20 pro p20pro\r\n20 p '),
(8, 4, 4, 'Oppo R9s Plus', 23900, 'OPPO R9s Plus\r\n\r\nDISPLAY & SENSORS\r\n	Smartphone\r\n	Display IPS TFT 24-bit (True color) \r\n- Multi-Touch\r\n- Width 6 Inch (Diagonal)\r\n- Resolution 1080 x 1920 Pixels (368 ppi) \r\n- Capacitive \r\n- Corning Gorilla Glass\r\n	Sensor \r\n- Fingerprint Verification (Finger Print) \r\n- Accelerometer (Accelerometer) \r\n- Ambient Light Sensor (Ambient light) \r\n- Proximity Sensor \r\n- Adjust the view displayed automatically (Orientation)\r\n	Colours : Black, Gold, Rose Gold\r\nCONNECTIVITY\r\n	Location: Assisted GPS\r\n	WiFi 802.11 a/b/g/n/ac \r\n- Portable Internet hot-spots (Portable Wi-Fi Hotspot)\r\n- Wi-Fi Direct\r\n	Bluetooth 4.1 \r\n- Support for stereo headsets\r\n	Micro USB 2.0\r\n	USB On-The-Go (USB On-The-Go)\r\n	Headset /Jack 3.5 mm.\r\n', 'r9splus.jpg', 'Oppo R9s Plus oppo r9splus plus r9s '),
(9, 1, 1, 'iPhone 8', 12000, 'iPhone 8\r\n\r\nDISPLAY & SENSORS\r\n	Smartphone\r\n	Display Retina Display 24-bit (True color) \r\n- Multi-Touch\r\n- Width 4.7 Inch (Diagonal)\r\n- Resolution 750 x 1334 Pixels (326 ppi) \r\n- Capacitive \r\n- Dust Resistant\r\n	Sensor \r\n- Fingerprint identity sensor (Touch ID) \r\n- Accelerometer (Accelerometer) \r\n- Ambient Light Sensor (Ambient light) \r\n- Proximity Sensor \r\n- Three-axis Gyroscope (Three-axis gyroscope) \r\n- Built-in Barometer\r\n	Waterproof (Water-resistent)\r\n- Temporary resistent.\r\n	Colours : Gold, Space Gray, Silver\r\n\r\n\r\nCONNECTIVITY\r\n	Location: Assisted GPS\r\n	WiFi 802.11 a/b/g/n/ac \r\n- Portable Internet hot-spots (Portable Wi-Fi Hotspot)\r\n	Bluetooth 5.0 \r\n- Support for stereo headsets\r\n	Supported NFC (Near Field Communication)\r\n	USB Lightning\r\n', 'iphone8.jpeg', 'iphone iPhone8 iphone8 8  apple Apple'),
(10, 2, 2, 'Samsung Galaxy S9 ', 25900, 'Samsung Galaxy S9\r\n\r\nDISPLAY & SENSORS\r\n	Smartphone\r\n	Display Super AMOLED 24-bit (True color) \r\n- Multi-Touch\r\n- Width 5.8 Inch (Diagonal)\r\n- Resolution 2960 x 1440 Pixels (570 ppi) \r\n- Capacitive \r\n- Corning Gorilla Glass 5 \r\n- Dust Resistant\r\n	Sensor \r\n- Fingerprint Verification (Finger Print) \r\n- Facial recognition technology (Face Detection) \r\n- Accelerometer (Accelerometer) \r\n- Ambient Light Sensor (Ambient light) \r\n- Proximity Sensor \r\n- Magnetic Detection \r\n- Gyroscope (Gyroscope) \r\n- Adjust the view displayed automatically (Orientation) \r\n- Built-in Barometer \r\n- Iris Scanning System\r\n	Waterproof (Water-resistent)\r\n- Temporary resistent.\r\nCONNECTIVITY\r\n	Location: Assisted GPS\r\n- Support for application Google Maps\r\n	WiFi 802.11 a/b/g/n/ac \r\n- Portable Internet hot-spots (Portable Wi-Fi Hotspot)\r\n- Wi-Fi Direct\r\n	Bluetooth 5.0 \r\n- Support for stereo headsets\r\n	Supported NFC (Near Field Communication)\r\n	ANT+\r\n	Type-C USB 3.1\r\n	Headset /Jack 3.5 mm.\r\n', 's9.jpg', 'samsung s9  9 s galaxy S SamsungGalaxyS9   S9 S9 Galaxy'),
(11, 3, 3, 'Huawei P20', 23900, 'Huawei P20\r\n\r\nDISPLAY & SENSORS\r\n	Smartphone\r\n	Display LCD 24-bit (True color) \r\n- Multi-Touch\r\n- Width 5.8 Inch (Diagonal)\r\n- Resolution 1080 x 2240 Pixels (428 ppi) \r\n- Capacitive\r\n	Sensor \r\n- Fingerprint Verification (Finger Print) \r\n- Facial recognition technology (Face Detection) \r\n- Ambient Light Sensor (Ambient light) \r\n- Motion Sensor (Accelerometer) \r\n- Proximity Sensor \r\n- Gyroscope (Gyroscope)\r\n	Colours : Black, Pink, Blue\r\nCONNECTIVITY\r\n	Location: Assisted GPS\r\n	WiFi 802.11 a/b/g/n/ac \r\n- Portable Internet hot-spots (Portable Wi-Fi Hotspot)\r\n- Wi-Fi Direct\r\n	Bluetooth 4.2 LE \r\n- Support for stereo headsets\r\n	Supported NFC (Near Field Communication)\r\n	USB Type-C\r\n', 'p20.jpg', 'Huawei P20  HuaweiP20 p20  \r\n20 p P'),
(12, 4, 4, 'Oppo R9s', 19900, 'OPPO R9s\r\n\r\nDISPLAY & SENSORS\r\n	Smartphone\r\n	Display AMOLED 24-bit (True color) \r\n- Multi-Touch\r\n- Width 5.5 Inch (Diagonal)\r\n- Resolution 1080 x 1920 Pixels (401 ppi) \r\n- Capacitive \r\n- Corning Gorilla Glass\r\n	Sensor \r\n- Fingerprint Verification (Finger Print) \r\n- Accelerometer (Accelerometer) \r\n- Ambient Light Sensor (Ambient light) \r\n- Proximity Sensor \r\n- Adjust the view displayed automatically (Orientation)\r\n	Colours : Black, Gold, Rose Gold\r\nCONNECTIVITY\r\n	Location: Assisted GPS\r\n	WiFi 802.11 a/b/g/n/ac \r\n- Portable Internet hot-spots (Portable Wi-Fi Hotspot)\r\n- Wi-Fi Direct\r\n	Bluetooth 4.1 \r\n- Support for stereo headsets\r\n	Micro USB 2.0\r\n	USB On-The-Go (USB On-The-Go)\r\n	Headset /Jack 3.5 mm.\r\n', 'r9s.png', 'Oppo R9s r9s OppoR9s'),
(13, 1, 1, 'New iPad 9.7', 11900, 'iPad 9.7 Wi-Fi + Cellular\r\n\r\nDISPLAY & SENSORS\r\n	Tablet\r\n	Display Retina Display 24-bit (True color) \r\n- Multi-Touch\r\n- Width 9.7 Inch (Diagonal)\r\n- Resolution 1536 x 2048 Pixels (264 ppi) \r\n- Capacitive \r\n- Fingerprints Resistant\r\n	Sensor \r\n- Fingerprint Verification (Finger Print) \r\n- Motion Sensor (Accelerometer) \r\n- Three-axis Gyroscope (Three-axis gyroscope) \r\n- Built-in Barometer\r\n\r\nCONNECTIVITY\r\n	Location: Assisted GPS\r\n	WiFi 802.11 a/b/g/n/ac \r\n- Portable Internet hot-spots (Portable Wi-Fi Hotspot)\r\n	Bluetooth 4.2 \r\n- Support for stereo headsets\r\n	USB Lightning\r\n', 'ipad9.7.jpg', 'New iPad 9.7 iPad ipad Apple apple newipad '),
(14, 5, 5, 'Apple AirPods', 6990, 'Bluetooth\r\n\r\nWireless\r\n\r\nWeight\r\nAirPods (each): 0.14 ounces (4 g)\r\n\r\nCharging Case: 1.34 ounces (38 g)\r\n\r\nDimensions\r\nAirPods (each): 0.65 by 0.71 by 1.59 inches (16.5 by 18.0 by 40.5 mm)\r\n\r\nCharging Case: 1.74 by 0.84 by 2.11 inches (44.3 by 21.3 by 53.5 mm)\r\n\r\nConnections\r\nAirPods: Bluetooth\r\n\r\nCharging Case: Lightning connector\r\n\r\nAirPods Sensors (each):\r\nDual beam-forming microphones\r\n\r\nDual optical sensors\r\n\r\nMotion-detecting accelerometer\r\n\r\nSpeech-detecting accelerometer\r\n\r\nPower and Battery\r\nAirPods with Charging Case: More than 24 hours listening time, up to 11 hours talk time\r\n\r\nAirPods (single charge): Up to 5 hours listening time, Up to 2 hours talk time\r\n\r\n15 minutes in the case equals 3 hours listening time or over an hour of talk time', 'airpod.png', 'AppleAirPods Apple AirPods apple airpods'),
(15, 5, 5, 'Apple Pencil', 3900, 'Apple Pencil expands the power of iPad Pro and iPad (6th generation) and opens up new creative possibilities. Its sensitive to pressure and tilt so you can easily vary line weight create subtle shading, and produce a wide range of artistic effects  just like a conventional pencil, but with pixel-perfect precision.\r\n\r\nDimensions\r\n\r\nLength: 6.92 inches (175.7 mm) measured from tip to cap\r\n\r\nDiameter: 0.35 inch (8.9 mm)\r\n\r\nWeight: 0.73 ounce (20.7 grams)\r\n\r\nConnections\r\nBluetooth\r\n\r\nLightning connector\r\n\r\nOther Features\r\nMagnetically attached cap', 'apple pencil.png', 'Apple Pencil apple pencil'),
(16, 5, 5, 'Case for iPad Pro 12.9', 1290, 'Protect your iPad', 'case ipad pro.png', 'CaseiPad Pro 12.9 case ipad'),
(17, 5, 5, 'Case for iPad Pro 10.5', 1290, 'Protect Your iPad', 'case ipad proten.png', 'Case iPad Pro 10.5'),
(18, 5, 5, 'Case for iphone 8', 990, 'protect your iphone', 'case iphone eight.png', 'Case iphone 8 case'),
(19, 5, 5, 'Case for iphone 8+', 990, 'protect your iphone', 'Case iphone eight plus.png', 'Case iphone 8+ case'),
(20, 5, 5, 'Case for Note 8', 890, 'protect your phone', 'case note8.jpg', 'Case Note 8 case '),
(21, 5, 5, 'Case for Galaxy S9+', 890, 'protect your phone', 'case s9+.png', 'Case Galaxy S9+ case'),
(22, 5, 5, 'Case for Galaxy S9', 890, 'protect your phone', 'case s9.png', 'Case Galaxy S9 case'),
(23, 5, 5, 'Case for Oppo R9s Plus', 790, 'protect your phone', 'case r9s plus.jpg', 'Case Oppo R9s Plus case r9s+  R9s+'),
(24, 5, 5, 'Case for Oppo R9s', 790, 'protect your phone', 'case r9s.jpg', 'Case Oppo R9s case r9s  R9s'),
(25, 5, 5, 'Case for Huawei P20 Pro', 1190, 'protect your phone', 'case p20pro.jpg', 'Case Huawei P20 Pro p20 case huawei'),
(50, 6, 0, 'PChana Phone', 1000000, 'PChana', '007.png', 'PChana');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(100) NOT NULL,
  `freedelivery` int(100) NOT NULL,
  `decreasenext` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'PChana', 'M.', 'superhipee@hotmail.com', '25f9e794323b453885f5181f1b624d0b', '0864562591', 'Hope Of Korat', 'admin'),
(2, 'asdasd', 'asdasd', 'subaddmin@hotmail.com', '25f9e794323b453885f5181f1b624d0b', '0123456789', '23148asdasdasd', 'user'),
(3, 'mos', 'mosmos', 'mos@hotmail.com', 'd55628b1cf599c77145102a5deacf590', '0888888888', 'mos 123/7', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `email_info`
--
ALTER TABLE `email_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `email_info`
--
ALTER TABLE `email_info`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
