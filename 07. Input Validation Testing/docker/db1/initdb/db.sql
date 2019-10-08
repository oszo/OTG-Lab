-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 08, 2019 at 02:22 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acc_manage_site`
--
CREATE DATABASE IF NOT EXISTS `acc_manage_site` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `acc_manage_site`;

-- --------------------------------------------------------

--
-- Table structure for table `employee_album`
--

CREATE TABLE `employee_album` (
  `id` int(11) NOT NULL,
  `album_name` varchar(255) DEFAULT NULL,
  `album_subtitle` varchar(255) DEFAULT NULL,
  `album_detail` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_album`
--

INSERT INTO `employee_album` (`id`, `album_name`, `album_subtitle`, `album_detail`) VALUES
(1, 'Org New Year 2018', 'Org New Year 2018 na ja', 'Org New Year 2018 \r\nLorem ipsum dolor sit amet, in corrumpit gloriatur reformidans his. Ei minim quaestio pericula has. Pro ne aliquip blandit omnesque, no probo gloriatur dissentiunt per, ad eos semper putant. In errem laoreet has. Pro ancillae inciderint reformidans ad. Adhuc munere sadipscing pro eu.\r\n\r\nSoleat delenit eu mea. Ut his prompta fabellas accusamus. Has ei dicat saepe, eu est essent utroque epicurei. Quo an habemus copiosae, dico postea scripta mea ut, sed everti consulatu adversarium ad. Cum at stet sale, ea quas laudem his.\r\n\r\nDuo iuvaret perfecto gloriatur ei. Magna graeci iisque ad vis. Id duo natum admodum efficiendi, pri ut tantas viderer conceptam, quem saepe mea id. Nibh tincidunt ea nam, no augue mollis definitiones pro.\r\n\r\nDuo aeterno volumus cu, ludus intellegebat usu ad, id sed dolor deterruisset. Mandamus adversarium reprehendunt qui ea. Putent urbanitas ei pro, eam corpora persecuti liberavisse at. Tale albucius duo te.'),
(2, 'Org New Year 2017', 'Org New Year 2017 na ja', 'Org New Year 2018 \r\nLorem ipsum dolor sit amet, in corrumpit gloriatur reformidans his. Ei minim quaestio pericula has. Pro ne aliquip blandit omnesque, no probo gloriatur dissentiunt per, ad eos semper putant. In errem laoreet has. Pro ancillae inciderint reformidans ad. Adhuc munere sadipscing pro eu.\r\n\r\nSoleat delenit eu mea. Ut his prompta fabellas accusamus. Has ei dicat saepe, eu est essent utroque epicurei. Quo an habemus copiosae, dico postea scripta mea ut, sed everti consulatu adversarium ad. Cum at stet sale, ea quas laudem his.\r\n\r\nDuo iuvaret perfecto gloriatur ei. Magna graeci iisque ad vis. Id duo natum admodum efficiendi, pri ut tantas viderer conceptam, quem saepe mea id. Nibh tincidunt ea nam, no augue mollis definitiones pro.\r\n\r\nDuo aeterno volumus cu, ludus intellegebat usu ad, id sed dolor deterruisset. Mandamus adversarium reprehendunt qui ea. Putent urbanitas ei pro, eam corpora persecuti liberavisse at. Tale albucius duo te.'),
(3, 'Duo aeterno volumus cu', 'viderer conceptam, quem saepe', 'Lorem ipsum dolor sit amet, in corrumpit gloriatur reformidans his. Ei minim quaestio pericula has. Pro ne aliquip blandit omnesque, no probo gloriatur dissentiunt per, ad eos semper putant. In errem laoreet has. Pro ancillae inciderint reformidans ad. Adhuc munere sadipscing pro eu.\r\n\r\nSoleat delenit eu mea. Ut his prompta fabellas accusamus. Has ei dicat saepe, eu est essent utroque epicurei. Quo an habemus copiosae, dico postea scripta mea ut, sed everti consulatu adversarium ad. Cum at stet sale, ea quas laudem his.\r\n\r\nDuo iuvaret perfecto gloriatur ei. Magna graeci iisque ad vis. Id duo natum admodum efficiendi, pri ut tantas viderer conceptam, quem saepe mea id. Nibh tincidunt ea nam, no augue mollis definitiones pro.\r\n\r\nDuo aeterno volumus cu, ludus intellegebat usu ad, id sed dolor deterruisset. Mandamus adversarium reprehendunt qui ea. Putent urbanitas ei pro, eam corpora persecuti liberavisse at. Tale albucius duo te.'),
(4, 'us ex. Mel nonum', 'vel option praesent elaboraret, eu audiam timeam propriae his. Ne definiebas persequeris p', 'Sea quod petentium consequat an, vide probo maluisset et mel. Nullam vocibus vis cu, porro eloquentiam in nam, usu everti equidem ornatus ex. Mel nonumes nostrum eu, quis meliore theophrastus cu vix. Ea vel option praesent elaboraret, eu audiam timeam propriae his. Ne definiebas persequeris per, usu mazim tincidunt et, mel te vocent vivendum sapientem. Accusam scriptorem has ei, ut graeci aliquam tibique nec. Vis an atqui augue accusata.'),
(5, 'Duo aeterno volumus cu', 'viderer conceptam, quem saepe', 'Lorem ipsum dolor sit amet, in corrumpit gloriatur reformidans his. Ei minim quaestio pericula has. Pro ne aliquip blandit omnesque, no probo gloriatur dissentiunt per, ad eos semper putant. In errem laoreet has. Pro ancillae inciderint reformidans ad. Adhuc munere sadipscing pro eu.\r\n\r\nSoleat delenit eu mea. Ut his prompta fabellas accusamus. Has ei dicat saepe, eu est essent utroque epicurei. Quo an habemus copiosae, dico postea scripta mea ut, sed everti consulatu adversarium ad. Cum at stet sale, ea quas laudem his.\r\n\r\nDuo iuvaret perfecto gloriatur ei. Magna graeci iisque ad vis. Id duo natum admodum efficiendi, pri ut tantas viderer conceptam, quem saepe mea id. Nibh tincidunt ea nam, no augue mollis definitiones pro.\r\n\r\nDuo aeterno volumus cu, ludus intellegebat usu ad, id sed dolor deterruisset. Mandamus adversarium reprehendunt qui ea. Putent urbanitas ei pro, eam corpora persecuti liberavisse at. Tale albucius duo te.'),
(6, 'us ex. Mel nonum', 'vel option praesent elaboraret, eu audiam timeam propriae his. Ne definiebas persequeris p', 'Sea quod petentium consequat an, vide probo maluisset et mel. Nullam vocibus vis cu, porro eloquentiam in nam, usu everti equidem ornatus ex. Mel nonumes nostrum eu, quis meliore theophrastus cu vix. Ea vel option praesent elaboraret, eu audiam timeam propriae his. Ne definiebas persequeris per, usu mazim tincidunt et, mel te vocent vivendum sapientem. Accusam scriptorem has ei, ut graeci aliquam tibique nec. Vis an atqui augue accusata.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `status`) VALUES
(1, 'test', 'test123', 'test@ezcompany.com', 'non-active'),
(2, 'alice', '1234', 'alice@ezcompany.com', 'non-active'),
(3, 'bob', 'password', 'bob@ezcompany.com', 'non-active'),
(4, 'Nunc', 'NuncNunc', 'nunc@ezcompany.com', 'non-active'),
(5, 'omni', '0mni9999', 'omni@ezcompany.com', 'non-active'),
(6, 'longus', 'asdfghjkl', 'omni@ezcompany.com', 'non-active'),
(7, 'stultost', 'stuXXX', 'stultost@ezcompany.com', 'non-active'),
(8, 'guest', 'guest', 'guest@ezcompany.com', 'active'),
(9, 'praeclare', 'praeclare', 'praeclare@ezcompany.com', 'non-active'),
(10, 'quidem', 'quidem', 'quidem@ezcompany.com', 'non-active');

-- --------------------------------------------------------

--
-- Table structure for table `web_secret`
--

CREATE TABLE `web_secret` (
  `flag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_secret`
--

INSERT INTO `web_secret` (`flag`) VALUES
('FLAG{W3lc0me_T0_1nJ3cTi0n_w0rLD}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_album`
--
ALTER TABLE `employee_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_album`
--
ALTER TABLE `employee_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
