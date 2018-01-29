-- phpMyAdmin SQL Dump

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` text CHARACTER SET latin1 NOT NULL,
  `password` text CHARACTER SET latin1 NOT NULL,
  `name` text CHARACTER SET latin1 NOT NULL,
  `surname` text CHARACTER SET latin1 NOT NULL,
  `phone` int(10) NOT NULL,
  `avatar` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=85704 DEFAULT CHARSET=gbk COLLATE=gbk_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `surname`, `phone`, `avatar`) VALUES
(1, 'bob', 'poppwd', 'Bob', 'Paulson', 555444, 'avatar/'),
(2, 'alice', 'alicepwd', 'Alice', 'Carroll', 555333, 'avatar/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85704;
