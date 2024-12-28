-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 28, 2024 at 07:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodfusion_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `category` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `likes` int(11) DEFAULT 0,
  `description` text NOT NULL,
  `author` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `date`, `category`, `image`, `likes`, `description`, `author`) VALUES
(1, 'Chicken Steak', '2023-08-07', 'Main Dish', 'img/recipes/r1.jpg\r\n', 175, 'Tender, flavorful chicken steak with a perfect golden crust.', 25),
(2, 'Hard Boiled Egg and Avocado', '2024-01-02', 'Healthy Options', 'img/recipes/r2.jpg', 200, 'Creamy avocado paired with a perfectly cooked hard-boiled egg.', 25),
(3, 'Pancake', '2024-09-03', 'Breakfast', 'img/recipes/r3.jpg', 85, 'Fluffy, golden, and irresistibly delicious.', 25),
(4, 'Fries Potato', '2024-04-09', 'Side Dish', 'img/recipes/r4.jpg', 73, 'Crispy, golden, and perfectly seasoned.', 25),
(5, 'Chocolate Cake', '2024-03-15', 'Dessert', 'img/recipes/r5.jpg', 19, 'Rich, moist, and decadently chocolatey.', 25),
(6, 'Fruit Smoothie', '2024-10-20', 'Beverage', 'img/recipes/r6.jpg', 2, 'Fresh, fruity, and refreshing.', 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(2000) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `failed_attempts` int(11) DEFAULT 0,
  `last_failed_attempt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `failed_attempts`, `last_failed_attempt`) VALUES
(19, 'Ranit', 'ranitdev@gmail.com', '202cb962ac59075b964b07152d234b70', 0, NULL),
(20, 'Shahadat', 'Shahadat@gmail.com', '202cb962ac59075b964b07152d234b70', 0, NULL),
(21, 'theinhtetsoe', 'theinhtetsoe1@gmail.com', '780ea9376333dabb1959f16e1622e00c', 1, '2024-12-27 20:32:25'),
(22, 'ginn', 'theinhtetsoe6@gmail.com', '2805ef0068cbebce331330f6809f8b41', 0, NULL),
(23, 'hzee', 'hzee@gmail.com', '62dac1803fb213c8f5dd5daf2e3b4d14', 5, '2024-12-27 19:22:32'),
(24, 'hzee', 'hzee1@gmail.com', '$2y$10$KBa2Lu1CCvewIpGdsNsPyuYDH6GYFtH1DcNOUZt4exBh2fjg6SKOC', 5, '2024-12-27 19:22:32'),
(25, 'khantsithu', 'khantsithu.work@gmail.com', '$2y$10$a0i3iBCgza1afAu16Gwjl.2dHv9mUd5NfrzNhTn9tHQFiayzaqk.u', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
