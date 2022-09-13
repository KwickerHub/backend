-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 11, 2022 at 09:19 PM
-- Server version: 5.7.35-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ACES_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `assitance`
--

CREATE TABLE `assitance` (
  `assist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(360) NOT NULL,
  `category` varchar(360) NOT NULL COMMENT 'grid, carousel moving pictures, ',
  `type` varchar(360) NOT NULL COMMENT 'public or private',
  `location` varchar(360) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `variables` varchar(360) NOT NULL COMMENT 'arguements and paramters',
  `preview` varchar(360) NOT NULL COMMENT 'image or images',
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `addon` varchar(360) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `attr_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attr_name` varchar(360) NOT NULL,
  `type` varchar(360) NOT NULL,
  `attr_default` varchar(360) NOT NULL,
  `attr_values` varchar(360) NOT NULL,
  `description` varchar(360) NOT NULL,
  `addon` varchar(360) NOT NULL,
  `likes` int(11) NOT NULL,
  `property` varchar(360) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`attr_id`, `user_id`, `attr_name`, `type`, `attr_default`, `attr_values`, `description`, `addon`, `likes`, `property`, `date_time`) VALUES
(1, 0, 'height', 'size', '', '', '', '', 0, '', '2022-07-03 09:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `username` varchar(360) NOT NULL,
  `email` varchar(360) NOT NULL,
  `password` varchar(360) NOT NULL,
  `verified` int(11) NOT NULL,
  `unique_co` varchar(360) NOT NULL,
  `public_hash` varchar(360) DEFAULT NULL,
  `private_hash` varchar(360) NOT NULL,
  `last_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `devices` varchar(360) NOT NULL,
  `addon` varchar(360) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `username`, `email`, `password`, `verified`, `unique_co`, `public_hash`, `private_hash`, `last_in`, `devices`, `addon`, `date_time`) VALUES
(1, 'okoiman', 'okoi@mailer.com', '$2y$10$gN9gLTa4wZqLzdbzdazlg.R1IF4tU5QipexMzKEgOq3sP0e6NUicm', 0, '495937', NULL, '', '2021-11-15 00:37:23', '', '', '2021-11-15 01:37:23'),
(2, 'okoiman', 'okoi2@mailer.com', '$2y$10$PRmb6kkZf5v3qph0NYLoUOk5Vfxkxs7TOoB3Mj.wTcNwKWg/zBi.m', 0, '704456', NULL, '', '2021-11-15 00:39:21', '', '', '2021-11-15 01:39:21'),
(3, 'okoiman', 'okoi2@gmail.com', '$2y$10$nHugEO3AWL7Ylin7X43X7uEX/tNXu9Lii9Oh1ZhEEGNddYb1kJTTG', 0, '806458', NULL, '', '2021-11-15 00:43:33', '', '', '2021-11-15 01:43:33'),
(4, 'johnjohn', 'johnjohn@gmail.com', '$2y$10$4hymd9abJuaJ0s49M/3/Z.2IuyrHyvrKkJqyv.oVwUI06OVth5xKC', 0, '340235', NULL, '', '2022-01-09 22:02:05', '', '', '2022-01-09 23:02:05'),
(7, 'johnjohn', 'john@mailes.com', '$2y$10$kEV2EHSgHy3g39GG6a2NKOhwkwWdaRJdLhDHcMIjG5LmOnQrAUHVC', 0, '648355', NULL, '', '2022-01-09 22:14:19', '', '', '2022-01-09 23:14:19'),
(8, 'markokon', 'markokon@mailer.com', '$2y$10$inf7.hJgoI1cEybWs9gipur8DXoR9btY8eh2JmFGklvkx4YZD71Eq', 0, '861858', NULL, '', '2022-01-09 22:21:00', '', '', '2022-01-09 23:21:00'),
(9, 'marko', 'marko@gmail.com', '$2y$10$YCcCpp3BkqDUAhwqmrSJD.VnGEDkIemNPUH8HRA0ygpv.mxp/iwIC', 0, '171894', NULL, '', '2022-01-09 22:27:43', '', '', '2022-01-09 23:27:43'),
(10, 'johno', 'johno@gmail.com', '$2y$10$lsjlBlCYpQUirgaiMrR0SOTvE7zNQUkQoJRtQ2A1fzOKzLPnr2P0m', 0, '204190', NULL, '', '2022-01-09 22:32:02', '', '', '2022-01-09 23:32:02'),
(11, 'kim', 'kim@gmail.com', '$2y$10$d98Tm4IkU8xTd/w85Bsc2.ct/o0V6yWMOw9Vsr.mS5LFc0TxCwlkq', 0, '661276', NULL, '', '2022-01-10 02:59:08', '', '', '2022-01-10 03:59:08'),
(12, 'ken', 'ken@gmail.com', '$2y$10$5QClk5FAziUJwkgS/3dbcOGWLDrQ8wcBZ7E6wuMIhV30K5hlLoG6q', 0, '397537', NULL, '', '2022-01-10 03:01:18', '', '', '2022-01-10 04:01:18'),
(13, 'kenny', 'kenny@gmail.com', '$2y$10$/nKPvrpTayMDxpn5tcEGsuj8bQMnKoYrPvd3yQ6CFk7F0HAy5SDOO', 0, '149810', NULL, '', '2022-01-10 03:03:10', '', '', '2022-01-10 04:03:10'),
(14, 'paul', 'paul@gmail.com', '$2y$10$oCbi9dk4XpIE0o138iSuauYeuJvn3UsRTzITgfeRsDdDYJ4qUhdRW', 0, '546351', NULL, '', '2022-01-10 03:04:50', '', '', '2022-01-10 04:04:50'),
(15, 'peter', 'peter@gmail.com', '$2y$10$d/eHqtDhjzLgHORUYOWRvurYJPADgoKNb6aXwObLtE88.1kPEawee', 0, '145829', NULL, '', '2022-01-10 03:06:21', '', '', '2022-01-10 04:06:21'),
(16, 'micke', 'micke@gmail.com', '$2y$10$E/aFfw9C4PkUEbGqYCPJ6eOJ.8l0Skfkcxpj/61ZpfP6/DpxvRmg6', 0, '674300', NULL, '', '2022-01-13 20:29:04', '', '', '2022-01-13 21:29:04'),
(17, 'johndown', 'johndown@gmail.com', '$2y$10$PtPwiW07wSqHPQF8z75NQ.QYK6JB5WHdIxFBonuwvDiBXBCiSbHgu', 0, '333916', NULL, '', '2022-01-13 20:40:24', '', '', '2022-01-13 21:40:24'),
(18, 'makrio', 'markrio@gmail.com', '$2y$10$v8Q6k2ZqAMcPyAay3LjkWelToAXymYUvhoha2pklhA8dD3s/L5882', 0, '913778', NULL, '', '2022-01-13 20:44:07', '', '', '2022-01-13 21:44:07'),
(19, 'root', 'markjoe@mailer.com', '$2y$10$J4KpT9OJLt69Z4J8GoRgmOGkRPuigMkjMmEHUgY41fc5DDjCnUlbO', 0, '754904', NULL, '', '2022-01-13 20:44:46', '', '', '2022-01-13 21:44:46'),
(20, 'root4', 'root4@gmail.com', '$2y$10$7IBtZysxjDcYlcaRbTiLCOAZPe/KDvCHfVX6mreIMJ1vfxrPpZXka', 0, '148752', NULL, '', '2022-01-13 20:49:29', '', '', '2022-01-13 21:49:29'),
(21, 'root5', 'root5@gmail.com', '$2y$10$tUEsj.phA8f.3wlNAPwkeeG3W8NUEcoYJy2u8dO7mqORiPLvtZ9Ne', 0, '738248', NULL, '', '2022-01-13 20:50:41', '', '', '2022-01-13 21:50:41'),
(22, 'root5', 'root6@gmail.com', '$2y$10$6furtYAOAUYCNAKFcBJrkeXRtcI2GGDUAP3RPUR1gJHN/WIlykccC', 0, '520403', NULL, '', '2022-01-13 20:52:16', '', '', '2022-01-13 21:52:16'),
(23, 'root7', 'root7@gmail.com', '$2y$10$mUi1VCyJJqPuTffzekd42.LUWP.2U/deEOjMUdnL7UuRdXBpWuDtu', 0, '743768', NULL, '', '2022-01-13 20:52:54', '', '', '2022-01-13 21:52:54'),
(24, 'johnenny', 'johnenny@gmail.com', '$2y$10$vVXX1BEBj3ohhtirDTOSyeEde3kcmVcFEqxu2ZW4n9LLGp4Bzm2zW', 0, '520354', NULL, '', '2022-01-28 14:48:21', '', '', '2022-01-28 15:48:21'),
(25, 'johned', 'johned@gmailer.com', '$2y$10$oe2LJfY.G3NLipq4L7L1qezbYBqUXLeqUnJTyEJXEPFM5vbn6yWYq', 0, '966166', NULL, '', '2022-01-28 14:59:53', '', '', '2022-01-28 15:59:53'),
(26, 'theDeal', 'theDeal@gmail.com', '$2y$10$Hx.2TTMbOVElDl/4lDcpCOHnFs5vS/758WApeCajBMcPiAdK52QZ6', 0, '120582', NULL, '', '2022-01-28 15:06:22', '', '', '2022-01-28 16:06:22'),
(27, 'marked', 'marked@gmailer.com', '$2y$10$6kL9csZC8CdnDs/5XnEUw.C5YnDwCYXNi3p496nQ2fdycE5A3vIhq', 0, '352506', NULL, '', '2022-01-28 15:13:18', '', '', '2022-01-28 16:13:18'),
(28, 'mademan', 'mademan@gmail.com', '$2y$10$yvlBqBsp8OIuYagVpzgFwOvRy/zFcXImzeWJPHApe2CFRW24vH/6O', 0, '245852', NULL, '', '2022-01-28 15:22:08', '', '', '2022-01-28 16:22:08'),
(29, 'thesea', 'thesea@gmail.com', '$2y$10$a/7fxEboGiadi2N/3pMVley7zd2zS858iMDswtGpiXZPOQZPfqWta', 0, '374849', NULL, '', '2022-01-28 17:34:04', '', '', '2022-01-28 18:34:04'),
(30, 'petman', 'petman@gmail.com', '$2y$10$OmRBUflwygxtfnbq8M67QOBKCyb9ryfg0Y1SYI5yR6dtEtLYKrtEO', 1, '995160', NULL, '', '2022-01-28 17:54:35', '', '', '2022-01-28 18:51:31'),
(31, 'okon', 'okon@mail.com', '$2y$10$2GqHPiPOwnu4LVDQbLxtH./hCYQEcMKU1CnHPOz93UJ/1OtRfLJ3W', 0, '617597', NULL, '', '2022-02-11 08:46:46', '', '', '2022-02-11 09:46:46'),
(32, 'john', 'john@mail.com', '$2y$10$crFz5EIkP4fRFROEUfxe1O89dDK1zW72n241SwbNZEBQ1aJ3nvuxq', 0, '348686', NULL, '', '2022-02-11 10:18:12', '', '', '2022-02-11 11:18:12'),
(33, 'johnjohn', 'johnjohn@mail.com', '$2y$10$rfqemYJBDq9bLlREKhxC8e29HRgcBvoH7oQh9XmhCIf6jfaXfg/bi', 0, '190658', NULL, '', '2022-02-11 10:20:29', '', '', '2022-02-11 11:20:29'),
(34, 'nkenyor', 'nkenyor@gmail.com', '$2y$10$.k2DcPxkCl1HjHxIqFOenO74lpd6Zn./WEJjsoDJskKbO2fsRTD4G', 1, '843575', NULL, '', '2022-07-01 22:35:25', '', '', '2022-07-01 23:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `color_name` varchar(360) NOT NULL,
  `color_code` varchar(360) NOT NULL,
  `color_RGB` varchar(360) NOT NULL,
  `color_CMYK` varchar(360) NOT NULL,
  `addon` varchar(360) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `elements`
--

CREATE TABLE `elements` (
  `tag_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tag_name` varchar(360) NOT NULL,
  `tag_type` varchar(360) NOT NULL,
  `tag_example` varchar(360) NOT NULL,
  `tag_description` varchar(360) NOT NULL,
  `default_style` text NOT NULL,
  `addon` varchar(360) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elements`
--

INSERT INTO `elements` (`tag_id`, `user_id`, `tag_name`, `tag_type`, `tag_example`, `tag_description`, `default_style`, `addon`, `date_time`) VALUES
(1, 0, 'div', 'block', '<div> </div>', 'this is block division in the page. It is usually used to segment the workflow or page design into sections.', '', '', '2022-07-03 10:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `icon_id` int(11) NOT NULL,
  `icon_name` varchar(360) NOT NULL,
  `icon_type` varchar(360) NOT NULL,
  `icon_location` varchar(360) NOT NULL,
  `icon_description` varchar(360) NOT NULL,
  `icon_height` varchar(360) NOT NULL,
  `icon_width` varchar(360) NOT NULL,
  `icon_default` varchar(360) NOT NULL,
  `variables` varchar(360) NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `addon` varchar(360) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_name` varchar(360) NOT NULL,
  `type` varchar(360) NOT NULL,
  `project_location` varchar(360) NOT NULL,
  `project_settings` varchar(360) NOT NULL,
  `project_description` text NOT NULL,
  `addon` varchar(360) NOT NULL,
  `date` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `user_id`, `project_name`, `type`, `project_location`, `project_settings`, `project_description`, `addon`, `date`, `date_updated`) VALUES
(1, 34, 'web_testing', 'private', 'web_testing430976.html', '', 'completer web stands for the web', '', '2022-07-03 10:21:47', '2022-07-03 09:21:47'),
(2, 34, 'the_test_web', 'private', 'the_test_web927227.html', '', 'one of the first test packages.', '', '2022-07-03 07:31:12', '2022-07-03 06:31:12'),
(3, 34, 'test_duplicate', 'private', 'test_duplicate218756.html', '', 'testing the duplicate functionality.', '', '2022-07-23 01:07:22', '2022-07-23 00:07:22'),
(4, 34, 'test_duplicate2', 'private', 'test_duplicate2770827.html', '', 'till testing the duplicate skills.', '', '2022-07-23 01:17:31', '2022-07-23 00:17:31'),
(5, 34, 'test_duplicate3', 'private', 'test_duplicate3501537.html', '', 'testing the duplicate functionality', '', '2022-07-23 01:22:30', '2022-07-23 00:22:30'),
(6, 34, 'test_duplicate4', 'private', 'test_duplicate4111452.html', '', 'testing the duplicate functionality', '', '2022-07-23 01:25:27', '2022-07-23 00:25:27'),
(7, 34, 'test_duplicate5', 'private', 'test_duplicate5506307.html', '', 'testing the duplicate functionality', '', '2022-07-23 01:27:19', '2022-07-23 00:27:19'),
(8, 34, 'test_duplicate6', 'private', 'test_duplicate6119119.html', '', 'testing the duplicate functionality', '', '2022-07-23 01:40:53', '2022-07-23 00:40:53'),
(9, 34, 'test_diuplcate7', 'private', 'test_diuplcate7473794.html', '', 'testing the diuplcate', '', '2022-07-23 01:54:06', '2022-07-23 00:54:06'),
(10, 34, 'test_diuplcate8', 'private', 'test_diuplcate8444845.html', '', 'testing the diuplcate', '', '2022-07-23 01:55:03', '2022-07-23 00:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `style_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `style_name` varchar(360) NOT NULL,
  `type` varchar(360) NOT NULL,
  `style_default` varchar(360) NOT NULL,
  `style_values` varchar(360) NOT NULL,
  `addon` varchar(360) NOT NULL,
  `description` varchar(360) NOT NULL,
  `likes` int(11) NOT NULL,
  `property` varchar(360) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`style_id`, `user_id`, `style_name`, `type`, `style_default`, `style_values`, `addon`, `description`, `likes`, `property`, `date_time`) VALUES
(1, 0, 'height', 'size', '', '', '', 'This will change the height of the element currently selected.', 0, '', '2022-01-28 23:39:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assitance`
--
ALTER TABLE `assitance`
  ADD PRIMARY KEY (`assist_id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`attr_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `public_hash` (`public_hash`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`icon_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`style_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assitance`
--
ALTER TABLE `assitance`
  MODIFY `assist_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `attr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `elements`
--
ALTER TABLE `elements`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `icon_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `style`
--
ALTER TABLE `style`
  MODIFY `style_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
