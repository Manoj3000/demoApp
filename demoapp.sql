-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 03:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demoapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `demo_data`
--

CREATE TABLE `demo_data` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demo_data`
--

INSERT INTO `demo_data` (`id`, `name`, `email`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(87, 'Craig Mueller', 'jiqyfi@mailinator.com', 0, '2021-01-09 11:03:30', 'Craig Mueller', '0000-00-00 00:00:00', ''),
(88, 'Libe Graves', 'libe@mailinator.com', 1, '2021-01-09 11:04:35', 'Liberty Graves', '2021-01-21 10:26:35', 'Libe Graves'),
(89, 'Maxwell Farley', 'vovaqu@mailinator.com', 1, '2021-01-21 08:38:41', 'Maxwell Farley', '0000-00-00 00:00:00', ''),
(90, 'Alfo Byers', 'alfo@mailinator.com', 1, '2021-01-21 08:38:51', 'Alfonso Byers', '2021-01-21 12:43:49', 'Alfo Byers'),
(91, 'Sasha Matthews', 'sasha@mailinator.com', 1, '2021-01-21 08:39:00', 'Sasha Matthews', '2021-01-21 08:46:19', 'Sasha Matthews'),
(92, 'Micah Higgins', 'micah@mailinator.com', 1, '2021-01-21 08:39:12', 'Micah Higgins', '2021-01-21 08:46:01', 'Micah Higgins'),
(93, 'demo123', 'demo123@gmail.com', 0, '2021-01-21 10:26:54', 'demo', '2021-01-21 10:27:03', 'demo123'),
(94, 'Manoj Gaikwad', 'manoj@gmail.com', 1, '2021-01-21 10:34:03', 'Manoj Gaikwad', '0000-00-00 00:00:00', ''),
(95, 'superman', 'super@gmail.com', 1, '2021-01-21 10:34:43', 'superman', '0000-00-00 00:00:00', ''),
(96, 'Batman', 'Batman@mailinator.com', 1, '2021-01-21 10:34:56', 'Batman', '0000-00-00 00:00:00', ''),
(97, 'Spiderman ', 'Spiderman@mailinator.com', 1, '2021-01-21 10:35:13', 'Spiderman ', '0000-00-00 00:00:00', ''),
(98, 'Deanna Lawson', 'pool@gmail.com', 1, '2021-01-21 10:35:36', 'Deanna Lawson', '0000-00-00 00:00:00', ''),
(99, 'Dylan Oneill', 'pamo@mailinator.com', 1, '2021-02-12 07:53:00', 'Dylan Oneill', '0000-00-00 00:00:00', ''),
(100, 'paapa wagmare', 'paapa1@gmail.com', 1, '2021-05-10 15:15:16', 'paapa', '2021-05-10 15:15:45', 'paapa wagmare');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(15, 'manoj', 'manoj@gmail.com', '$2y$10$DpPzMJtfz35mzlo4ZmW7veubQCL7H4uv7Olr9Blh6KcKhQQJE3MG.', 1, '2021-01-16 08:17:15', 'manoj', '0000-00-00 00:00:00', ''),
(16, 'Demon', 'demo@email.com', '$2y$10$W4bO3SfIr9M.FLJV9N9G9.3CC5aLMaFTqINhyP4a69ADpRuHqRexK', 1, '2021-01-16 08:33:24', 'demo', '0000-00-00 00:00:00', ''),
(17, 'NEW ', 'new@gmail.com', '$2y$10$Up.gbOUmnAQ5qGxIq25UEOS.ZdILg9w3CRKZlBPqsvw4ZT09RL0HG', 1, '2021-01-21 08:38:18', 'NEW ', '0000-00-00 00:00:00', ''),
(18, 'Manoj Gaikwad', 'test@gmail.com', '$2y$10$9XOd7g1lREKJivyoLq4Nr.FT96kWesMjbPgoj9vfPiEuwhXzznxzK', 1, '2021-02-11 12:42:56', 'Manoj Gaikwad', '0000-00-00 00:00:00', ''),
(19, 'papa ', 'papa@gmail.com', '$2y$10$MIjKpGK4E8RTVUdhAoY3QODJuyefVfF7u12njnvD0evmtUe9QNZs.', 1, '2021-05-10 15:14:31', 'papa ', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo_data`
--
ALTER TABLE `demo_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `demo_data`
--
ALTER TABLE `demo_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
