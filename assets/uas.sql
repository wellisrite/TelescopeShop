-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 20, 2017 at 12:40 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `kodeT` varchar(50) NOT NULL,
  `idU` varchar(50) NOT NULL,
  `bought` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `kodeT`, `idU`, `bought`, `date`, `status`, `total`) VALUES
(10, 'well20170616', 'well', '1 Orion-65<br>', '2017-06-19 08:53:26', 'Sent and confirmed by user', 6750),
(11, 'well20170619', 'well', '5 Celestron Astro<br>2 Orion-65<br>', '2017-06-19 15:23:45', 'Sent', 51000),
(12, 'well20170619', 'well', '1 Vixen-BT81S0-A<br>', '2017-06-19 08:58:05', 'About to be sent', 3080),
(13, 'Great20170619', 'Great', '10 Orion-65<br>', '2017-06-19 09:00:11', 'About to be sent', 67500),
(14, 'well20170619', 'well', '1 Celestron-cgx<br>2 Hamsley <br>1 Orion-65<br>', '2017-06-19 15:50:26', 'About to be sent', 24403);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pId` varchar(30) NOT NULL,
  `pname` varchar(80) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `description` text,
  `nbought` int(11) DEFAULT '0',
  `image` varchar(50) DEFAULT NULL,
  `category` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pId`, `pname`, `stock`, `price`, `description`, `nbought`, `image`, `category`) VALUES
('BI-01', 'Vixen-BT81S0-A', 30, 3080, 'Complete package. Everything you need to use Vixen\'s BT81S-A Binocular Telescope for spectacular views of comets and star clusters. This large aperture, 81mm binoculars are great for viewing the night sky or as a terrestrial binocular for making the most out of a good view. The optics are fully multicoated for maximum light transmission. Each optical assembly is precisely aligned at the Vixen assembly plant in Japan so as to give the sharpest images possible. \r\n\r\nThe BT81S-A binocular telescope is portable, at just 11 lbs in weight, so that it can be taken to a dark sky location very easily. The viewer has an option of attaching any SLV, SSW or LVW eyepiece to give a wide range of magnifications.  Includes 2 SLV20 eyepieces, Fork Mount, Swing Bracket and Tripod\r\n', 0, 'Vixen-BT81S-A.jpg', 'Binocular'),
('BI-02', 'Orion9636', 100, 3000, 'Our biggest and brightest astro-binocular, featuring 100mm objective lenses and strong 25x magnification\r\nFully multi-coated optics, high quality BAK-4 prisms and internal baffling ensure sharp images and pleasing contrast with maximum light throughput\r\nBarrels are cross-reinforced for maximum structural rigidity and unflinching optical alignment\r\nLong 18mm eye relief lets eyeglass wearers see an unrestricted field of view without removing their corrective lenses\r\nWeighs 10.1 lbs. - Tripod recommended for comfortable viewing (tripod sold separately)\r\n\r\n', 0, 'orion9636.jpg', 'Binocular'),
('TI-01', 'Orion-65', 13, 6750, 'A high-quality refractor at a reasonable price is still rather hard to find as refractors have always been much more expensive than any other type of telescope. But regular improvements in the technology have been lowering these astronomical prices for a while now. The result is a high-quality telescope at a remarkable price. This telescope is powerful enough to keep beginners occupied for many years to come. You will be able to see great images of the Moon and planets, as well as many deep sky objects. With an aperture of 90mm, this OTA can provide useful magnifications of up to 180X and, with its 910mm focal length, gives an excellent F10.1 aperture ratio.  The advantages in a nutshell:  good value for money light OTA, eminently portable makes an excellent guide scope The Orion AstroView mount:  This sturdy mount slides silkily into position and is suitable for any type of telescope. It easily carries telescopes of up to 120mm aperture and can also be used for photography. At 13kg in weight it is not the li', 0, 'orion-65.jpeg', 'Telescope'),
('TI-02', 'Celestron Astro', 13, 7500, 'Celestron is not only changing the way we experience astronomy, but we\'re also changing the way you interact with the night sky. The Astro Fi 90 mm Refractor is a fully featured telescope that can be controlled with your smart phone or tablet using the free Celestron SkyPortal app. Celestronâ€™s SkyPortal app replaces the traditional telescope hand control for a 100% wireless experience. Just hold your smart device up to the night sky. When you find an object youâ€™d like to view, tap the screen. Your Astro Fi telescope automatically slews to the object, while the screen displays information about it. Itâ€™s never been more fun to explore the universe!\r\n\r\nThe Astro Fi 90 creates its own wireless connection, so it can communicate with your device even in remote locations where WiFi or cellular networks arenâ€™t available. Getting ready to observe is quick and painless thanks to Celestronâ€™s award-winning SkyAlign technology. Center any three bright objects in the eyepiece, and your telescope calculates its position. You can even generate a Sky Tour of all the best celestial objects to view based on your exact time and location.', 0, 'celestron astro.jpeg', 'Telescope'),
('TI-03', 'Celestron-cgx', 20, 6753, 'Celestronâ€™s engineering team applied their years of experience designing German Equatorial mounts to the all-new CGX, a culmination of all the advancements made to our technologies. By refocusing our design efforts and anticipating the needs of todayâ€™s visual observers and astroimagers, Celestron has achieved a new level of \"state-of-the-art\" with the all new CGX German equatorial mount. Compact. Solid. Innovative. Totally redesigned with a lower profile, CGX is sturdier and more rigid than its predecessors with several new innovative features and new control software ideally suited for automation and remote operation. ', 0, 'celestron-cgx.jpg', 'Telescope'),
('TI-04', 'Hamsley ', 30, 5450, 'The Moon in pictures\r\nEver wondered how the sky looks like up close? With a telescope, you have the opportunity to see it with your own eyes. You might think that a good telescope always costs a lot of money, but nothing could be further from the truth! The hamsley Hercules is a perfect beginner\'s light refractor telescope, extremely affordable, and brings the moon and planets are within reach!. It has a lens diameter of 50 millimeters, a focal length of 600 millimeters, and depending on the eyepiece used magnification of 50x or 150x.\r\n\r\n', 0, 'hamsley.jpg', 'Telescope');

-- --------------------------------------------------------

--
-- Table structure for table `Tdetail`
--

CREATE TABLE `Tdetail` (
  `idD` int(11) NOT NULL,
  `kodeT` varchar(60) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `pId` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Tdetail`
--

INSERT INTO `Tdetail` (`idD`, `kodeT`, `quantity`, `pId`, `date`) VALUES
(2, 'admin20170619', 1, 'BI-02', '2017-06-19 15:37:28'),
(6, 'admin20170619', 1, 'TI-01', '2017-06-19 16:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `kodeT` varchar(60) NOT NULL,
  `id` varchar(60) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`kodeT`, `id`, `tanggal`) VALUES
('admin20170619', 'admin', '2017-06-19 15:37:28'),
('yudi20170608', 'yudi', '2017-06-08 07:26:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(50) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `address` varchar(63) NOT NULL,
  `email` varchar(60) NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pwd`, `name`, `gender`, `address`, `email`, `type`) VALUES
('admin', '$2y$10$AndVPj.UY7Ebh9G0FwMZ1OMiMzS.cBJV0fAcpVYcd/UBLCeWnroHW', 'admin', 'M', 'admin', 'admin@ggwp.com', 'admin'),
('Great', '$2y$10$K8sM8T1DnJlEzycrU4vNZe1IhGQMHBaZBeD1XYHiykzif7ihSqIym', 'Amaze', 'M', 'MyGreatest', 'Amaze@my.net', 'normal'),
('well', '$2y$10$y1TqpJAlSejPxvKJgUFBDeq4BwHIkg2XebPgPcl3/Lk6vcer0Qt3O', 'well', 'M', 'jalan wellisrite', 'wellisrite@gg.wp', 'normal'),
('yudi', '$2y$10$MyKyjkA17/5Tc6IIO8V0k.MOo1O/G/BfLzwpeRjGd6Rzd62TZdN.O', 'yudi', 'M', 'yudi', 'Yumedream01@yahoo.com', 'banned');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idU` (`idU`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `Tdetail`
--
ALTER TABLE `Tdetail`
  ADD PRIMARY KEY (`idD`),
  ADD KEY `kodeT` (`kodeT`),
  ADD KEY `pId` (`pId`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`kodeT`),
  ADD KEY `transaction_ibfk_1` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `Tdetail`
--
ALTER TABLE `Tdetail`
  MODIFY `idD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`idU`) REFERENCES `users` (`id`);

--
-- Constraints for table `Tdetail`
--
ALTER TABLE `Tdetail`
  ADD CONSTRAINT `Tdetail_ibfk_1` FOREIGN KEY (`kodeT`) REFERENCES `transaction` (`kodeT`),
  ADD CONSTRAINT `Tdetail_ibfk_2` FOREIGN KEY (`pId`) REFERENCES `products` (`pId`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
