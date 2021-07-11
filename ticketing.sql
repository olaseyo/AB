-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 11, 2021 at 09:02 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `number_of_seat` int(11) NOT NULL,
  `fare_amount` float(8,2) NOT NULL,
  `date_of_booking` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_amount` float(8,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `code` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `customer_id`, `schedule_id`, `number_of_seat`, `fare_amount`, `date_of_booking`, `total_amount`, `status`, `code`, `created_at`) VALUES
(2, 7, 1, 5, 1, 10000.00, '2021-07-11 00:12:59', 10000.00, 1, 'AD60ea297b48437', '2021-07-11 00:12:59'),
(3, 7, 1, 5, 3, 10000.00, '2021-07-11 00:41:06', 30000.00, 1, 'AD60ea3012bb73e', '2021-07-11 00:41:06'),
(4, 7, 2, 5, 2, 10000.00, '2021-07-11 01:08:48', 20000.00, 1, 'AD60ea36903af97', '2021-07-11 01:08:48'),
(5, 8, 1, 6, 4, 20000.00, '2021-07-11 16:42:36', 80000.00, 1, 'AD60eb116c8ca33', '2021-07-11 16:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `total_seat` int(11) NOT NULL,
  `busy` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `name`, `user_id`, `class`, `reg_no`, `total_seat`, `busy`, `created_at`) VALUES
(1, 'Toyota Haice', 7, 'Executive', 'Lag 988 AJ', 35, 1, '2021-07-10 18:24:29'),
(4, 'Mazda', 7, 'Executive', 'Lag 900 AJ', 30, 1, '2021-07-10 20:47:42'),
(5, 'Mercedes Sprinter', 7, 'Regular', 'Lag 988 BM', 40, 1, '2021-07-10 22:26:19'),
(15, 'Marcopolo', 245, 'First Class', 'AJ 001 GB', 41, 1, '2021-07-11 20:13:49'),
(19, 'Toyota', 248, 'Regular', 'AJ 001 GB', 39, 0, '2021-07-11 20:15:53'),
(21, 'Innoson', 250, 'First Class', 'LG 087 OO', 16, 0, '2021-07-11 20:17:17'),
(23, 'Mazda', 252, 'Regular', 'LG 087 OO', 34, 1, '2021-07-11 20:19:03'),
(25, 'Toyota', 254, 'Regular', 'OY 123 OK', 32, 1, '2021-07-11 20:20:41'),
(27, 'Innoson', 256, 'First Class', 'KG 145 AY', 30, 0, '2021-07-11 21:00:49'),
(29, 'Mazda', 258, 'Regular', 'AJ 001 GB', 23, 1, '2021-07-11 21:02:16'),
(31, 'Innoson', 260, 'Executive', 'AJ 001 GB', 33, 1, '2021-07-11 21:06:05'),
(33, 'Marcopolo', 262, 'First Class', 'OY 123 OK', 35, 1, '2021-07-11 21:06:53'),
(35, 'Innoson', 264, 'Executive', 'KG 145 AY', 38, 1, '2021-07-11 21:08:53'),
(36, 'Toyota', 266, 'Executive', 'OY 123 OK', 40, 1, '2021-07-11 21:21:16'),
(38, 'Mazda', 266, 'Regular', 'LG 087 OO', 43, 1, '2021-07-11 21:21:16'),
(39, 'Innoson', 268, 'Executive', 'AJ 001 GB', 42, 1, '2021-07-11 21:22:56'),
(41, 'Toyota', 268, 'First Class', 'AJ 001 GB', 19, 1, '2021-07-11 21:22:57'),
(42, 'Marcopolo', 270, 'First Class', 'LG 087 OO', 17, 1, '2021-07-11 21:24:59'),
(44, 'Innoson', 270, 'Regular', 'AJ 001 GB', 30, 1, '2021-07-11 21:24:59'),
(45, 'Innoson', 272, 'Regular', 'AJ 001 GB', 16, 1, '2021-07-11 21:27:28'),
(47, 'Marcopolo', 272, 'Regular', 'KG 145 AY', 23, 1, '2021-07-11 21:27:29'),
(48, 'Toyota', 274, 'Regular', 'KG 145 AY', 26, 1, '2021-07-11 21:28:03'),
(50, 'Innoson', 274, 'Executive', 'OY 123 OK', 25, 1, '2021-07-11 21:28:04'),
(51, 'Toyota', 276, 'Regular', 'KG 145 AY', 26, 1, '2021-07-11 21:30:02'),
(53, 'Marcopolo', 276, 'Regular', 'KG 145 AY', 34, 1, '2021-07-11 21:30:03'),
(55, 'Marcopolo', 278, 'Executive', 'OY 123 OK', 34, 1, '2021-07-11 21:30:03'),
(57, 'Innoson', 280, 'Executive', 'OY 123 OK', 42, 1, '2021-07-11 21:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `email`, `create_at`) VALUES
(1, 7, NULL, NULL, '08135882953', NULL, '2021-07-11 00:04:20'),
(2, 7, NULL, NULL, '08135882952', NULL, '2021-07-11 01:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `busy` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `fullname`, `contact`, `user_id`, `busy`, `created_at`) VALUES
(1, 'Olaseyo Olumide', '0987654345678', 7, 1, '2021-07-10 18:01:13'),
(6, 'Kemi Toyin2', '098765432', 8, 1, '2021-07-10 18:06:34'),
(8, 'Chinedu', '09087654323', 7, 1, '2021-07-10 22:27:29'),
(9, 'Olaseyo Olumide', '0908765432', 8, 0, '2021-07-11 18:16:07'),
(10, 'Olaseyo Olumide', '0908765432', 8, 0, '2021-07-11 18:32:11'),
(13, 'Claudie Yundt', '+1-348-541-0023', 7, 1, '2021-07-11 18:49:58'),
(38, 'Prof. Frederic Moen PhD', '537.676.0740 x79184', 250, 0, '2021-07-11 20:17:17'),
(40, 'Marjory Sauer', '(297) 353-0550 x428', 252, 1, '2021-07-11 20:19:03'),
(42, 'Karli Hansen IV', '1-358-784-9650', 254, 1, '2021-07-11 20:20:41'),
(44, 'Mrs. Norma Conn', '(620) 626-9077 x00295', 256, 0, '2021-07-11 21:00:49'),
(46, 'Sophia Lubowitz', '204-594-8098', 258, 1, '2021-07-11 21:02:16'),
(48, 'Zoila Champlin', '746.903.9507 x18528', 260, 1, '2021-07-11 21:06:05'),
(50, 'Yoshiko Berge III', '(791) 703-8143', 262, 1, '2021-07-11 21:06:52'),
(52, 'Miss Princess Homenick', '+1 (260) 248-9905', 264, 1, '2021-07-11 21:08:53'),
(53, 'Prof. Rashad Kub', '286.694.9517', 266, 1, '2021-07-11 21:21:16'),
(55, 'Prof. Freeman Koepp', '+1.839.753.1053', 266, 1, '2021-07-11 21:21:16'),
(56, 'Elvera Hahn I', '824-816-7695', 268, 1, '2021-07-11 21:22:56'),
(58, 'Broderick Marks', '1-754-814-6708 x14332', 268, 1, '2021-07-11 21:22:57'),
(59, 'Percy Runte', '+13858939381', 270, 1, '2021-07-11 21:24:59'),
(61, 'Mekhi Koch II', '782-609-7640', 270, 1, '2021-07-11 21:24:59'),
(62, 'Nettie Ruecker', '1-951-542-8349', 272, 1, '2021-07-11 21:27:28'),
(64, 'Lawson White', '427.868.7885', 272, 1, '2021-07-11 21:27:29'),
(65, 'Delilah Hegmann III', '830.275.8320 x1244', 274, 1, '2021-07-11 21:28:03'),
(67, 'Dr. Catharine Beatty', '(447) 329-4128 x776', 274, 1, '2021-07-11 21:28:04'),
(68, 'Krystina Crooks', '(891) 748-0497 x738', 276, 1, '2021-07-11 21:30:02'),
(70, 'Meredith Aufderhar', '(841) 899-7447', 276, 1, '2021-07-11 21:30:02'),
(72, 'Erik Homenick', '(685) 723-5034 x19064', 278, 1, '2021-07-11 21:30:03'),
(74, 'Erik Funk', '1-504-243-0527 x58782', 280, 1, '2021-07-11 21:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `amount_paid` float(8,2) NOT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `amount_paid`, `payment_method`, `created_at`, `user_id`) VALUES
(1, 4, 20000.00, 'POS', '2021-07-11 00:29:10', 7),
(2, 5, 80000.00, 'Cash', '2021-07-11 15:42:42', 8),
(3, 5, 80000.00, 'Cash', '2021-07-11 15:47:30', 8),
(4, 5, 80000.00, 'Cash', '2021-07-11 15:48:10', 8),
(5, 5, 80000.00, 'Cash', '2021-07-11 15:48:49', 8),
(6, 5, 80000.00, 'Cash', '2021-07-11 15:49:33', 8),
(7, 5, 80000.00, 'Cash', '2021-07-11 15:50:01', 8);

-- --------------------------------------------------------

--
-- Table structure for table `travel_schedules`
--

CREATE TABLE `travel_schedules` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `starting_point` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `departure_time` time NOT NULL,
  `estimated_arrival_time` time NOT NULL,
  `schedule_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fare_amount` float(8,2) NOT NULL,
  `total_seat` int(11) NOT NULL,
  `remark` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `travel_schedules`
--

INSERT INTO `travel_schedules` (`id`, `driver_id`, `bus_id`, `user_id`, `starting_point`, `destination`, `departure_time`, `estimated_arrival_time`, `schedule_date`, `fare_amount`, `total_seat`, `remark`, `status`) VALUES
(2, 1, 1, 7, 'Akure', 'Asaba', '12:00:00', '19:00:00', '2021-07-10 19:58:14', 10000.00, 30, 'blabla', 1),
(5, 6, 4, 7, 'Ibadan', 'Asaba', '12:00:00', '19:00:00', '2021-07-10 22:23:44', 10000.00, 25, 'bbabab', 1),
(6, 8, 5, 7, 'Lagos', 'Calabar', '02:00:00', '19:00:00', '2021-07-10 22:29:47', 20000.00, 36, 'Blabla', 1),
(7, 13, 15, 245, 'Akure', 'Aba', '12:00:00', '12:00:00', '2021-07-11 20:13:49', 17788.00, 41, 'Ipsam voluptates et odit quas. Nesciunt impedit saepe excepturi excepturi consectetur qui iure. Voluptatum molestiae officiis accusamus.', 1),
(8, 40, 23, 252, 'Lagos', 'Aba', '18:00:00', '15:00:00', '2021-07-11 20:19:03', 13782.00, 34, 'Sit sed dolor ut eveniet. Odit recusandae sit cum recusandae vero. Incidunt veniam aliquid enim nostrum omnis quas adipisci dolores.', 1),
(9, 42, 25, 254, 'Akure', 'Jos', '15:00:00', '15:00:00', '2021-07-11 20:20:41', 48951.00, 32, 'Non cum excepturi qui ut commodi dignissimos commodi rerum. Et quos corporis ea culpa illum. Repudiandae illo corporis voluptatibus deserunt qui. Possimus et minus non laboriosam quam.', 1),
(10, 44, 27, 256, 'Lagos', 'Calabar', '12:00:00', '15:00:00', '2021-07-11 21:00:49', 44960.00, 30, 'Dolor est aliquam alias earum. Et sint voluptatem ea et modi similique qui. Quasi itaque ipsa rem.', 1),
(11, 46, 29, 258, 'Abuja', 'Calabar', '09:00:00', '18:00:00', '2021-07-11 21:02:16', 19187.00, 23, 'Voluptatem non ducimus aut suscipit itaque quasi. Porro quia vel commodi. Et neque ut error ut voluptas sit amet.', 1),
(12, 48, 31, 260, 'Abuja', 'Ikare', '12:00:00', '09:00:00', '2021-07-11 21:06:05', 25067.00, 33, 'Sunt quidem dolorem doloribus neque hic. Eos ut veritatis et labore. Ullam aspernatur ut aut in.', 1),
(13, 50, 33, 262, 'Abuja', 'Calabar', '09:00:00', '18:00:00', '2021-07-11 21:06:53', 33171.00, 35, 'Facilis ut delectus non voluptatem. Nostrum est illum et magnam quia et. Vero ut nulla quas blanditiis et. Rem eos nemo rerum dolores assumenda odit.', 1),
(15, 53, 36, 266, 'Abuja', 'Ikare', '12:00:00', '12:00:00', '2021-07-11 21:21:16', 18423.00, 40, 'Temporibus tenetur tempore consequatur. Odit quis excepturi modi reiciendis qui. Similique sunt voluptas hic asperiores.', 1),
(16, 55, 38, 266, 'Akure', 'Jos', '18:00:00', '09:00:00', '2021-07-11 21:21:16', 47323.00, 43, 'Quibusdam sequi doloribus tempore ex nam voluptas vero. Sit qui et est dolore beatae delectus. Provident occaecati vitae delectus quasi aut est.', 1),
(17, 56, 39, 268, 'Akure', 'Ikare', '09:00:00', '09:00:00', '2021-07-11 21:22:56', 49002.00, 42, 'Et quo unde aliquid inventore autem similique ea. Vel commodi rerum enim similique rerum. Natus omnis doloribus numquam debitis corrupti ex ipsam. Pariatur exercitationem ipsa porro aut inventore.', 1),
(18, 58, 41, 268, 'Lagos', 'Calabar', '18:00:00', '12:00:00', '2021-07-11 21:22:57', 11441.00, 19, 'Qui cupiditate ut molestiae voluptatem est. Pariatur quaerat aut nulla non. Dolor alias quos quod voluptas quibusdam ea. Dolore eaque error voluptas temporibus.', 1),
(19, 59, 42, 270, 'Ibadan', 'Calabar', '18:00:00', '09:00:00', '2021-07-11 21:24:59', 46855.00, 17, 'Cumque explicabo ratione harum vel voluptatem qui pariatur. Aut fugiat aliquid est quisquam. Quod porro architecto maxime labore voluptatem. Nihil ea sapiente voluptates. Ut earum quis aut.', 1),
(21, 62, 45, 272, 'Abuja', 'Calabar', '18:00:00', '18:00:00', '2021-07-11 21:27:28', 21639.00, 16, 'Molestiae esse consectetur sit nostrum. Cumque quo quaerat maxime quia deleniti sit officiis. Quia qui quam eum ipsam voluptatem et. Repellendus ipsam nihil et quae cumque non at.', 1),
(23, 65, 48, 274, 'Abuja', 'Calabar', '09:00:00', '18:00:00', '2021-07-11 21:28:04', 44303.00, 26, 'Voluptate est accusantium saepe. Et eaque qui perferendis quo et odio. Ut soluta reprehenderit dolores rerum doloremque fugit et. Cupiditate molestiae ducimus ab.', 1),
(25, 68, 51, 276, 'Akure', 'Calabar', '15:00:00', '09:00:00', '2021-07-11 21:30:02', 10007.00, 26, 'Dolor qui nihil nam sit in ipsum. Sunt exercitationem laborum dolor eius. A illo itaque beatae rerum perferendis. Doloremque sequi id dicta rerum fugiat dolorem voluptates.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Active',
  `is_admin` int(11) NOT NULL DEFAULT '0' COMMENT '0=not admin,1=admin',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `contact`, `status`, `is_admin`, `created_at`) VALUES
(7, 'Arno', '21232f297a57a5a743894a0e4a801fc3', 'Lois Lesch', 'grady33@turner.com', '339.817.5251', 'Active', 0, '2021-07-10 13:49:32'),
(8, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'tom@email.com', '0987654345678', 'Active', 1, '2021-07-10 13:49:59'),
(9, 'Olumide2', '21232f297a57a5a743894a0e4a801fc3', 'Olaseyo Olumide', 'good.olumide751@gmail.com', '08135882953', 'Active', 0, '2021-07-10 13:53:40'),
(129, 'Otis', '21232f297a57a5a743894a0e4a801fc3', 'Trace Runte', 'wwisoky@heaney.com', '(635) 361-8365', 'Active', 0, '2021-07-11 16:20:35'),
(130, 'Edmund', '21232f297a57a5a743894a0e4a801fc3', 'Bethel Welch', 'leopoldo10@reynolds.com', '207.286.4626', 'Active', 0, '2021-07-11 16:21:07'),
(131, 'Shana', '21232f297a57a5a743894a0e4a801fc3', 'Angeline Douglas', 'christiana.wyman@rosenbaum.org', '(390) 907-5703', 'Active', 0, '2021-07-11 16:21:19'),
(132, 'Marcellus', '21232f297a57a5a743894a0e4a801fc3', 'Ms. Emilie Howe', 'palma70@pollich.info', '+1.538.420.9467', 'Active', 0, '2021-07-11 16:21:44'),
(133, 'Giuseppe', '21232f297a57a5a743894a0e4a801fc3', 'Darwin Rolfson', 'hazle.hoppe@hotmail.com', '831.859.2531 x89887', 'Active', 0, '2021-07-11 16:22:19'),
(134, 'Valerie', '21232f297a57a5a743894a0e4a801fc3', 'Annamarie Leannon', 'keira.will@rippin.com', '493.542.4873 x950', 'Active', 0, '2021-07-11 16:23:18'),
(135, 'Florence', '21232f297a57a5a743894a0e4a801fc3', 'Prof. Gustave Roberts V', 'ernser.adah@yahoo.com', '269-239-8122', 'Active', 0, '2021-07-11 16:23:45'),
(136, 'Alejandrin', '21232f297a57a5a743894a0e4a801fc3', 'Eva Runolfsson', 'kebert@gmail.com', '1-848-979-7378', 'Active', 0, '2021-07-11 16:24:24'),
(137, 'Viviane', '21232f297a57a5a743894a0e4a801fc3', 'Bette Dare', 'murl32@hotmail.com', '1-269-251-4169', 'Active', 0, '2021-07-11 16:28:44'),
(138, 'Kyleigh', '21232f297a57a5a743894a0e4a801fc3', 'Corine Roberts', 'leffler.cristal@kohler.com', '1-573-843-8412 x675', 'Active', 0, '2021-07-11 16:32:14'),
(139, 'Tom', '21232f297a57a5a743894a0e4a801fc3', 'Mrs. Erica Johns', 'gbarton@gmail.com', '+1-869-526-4554', 'Active', 0, '2021-07-11 16:33:12'),
(140, 'Veda', '21232f297a57a5a743894a0e4a801fc3', 'Ambrose Parker', 'wiegand.jany@douglas.com', '947.296.3781 x7592', 'Active', 0, '2021-07-11 16:33:59'),
(141, 'Elta', '21232f297a57a5a743894a0e4a801fc3', 'Dr. Kareem Raynor I', 'devonte33@dibbert.com', '+18707653413', 'Active', 0, '2021-07-11 17:35:19'),
(142, 'Scarlett', '21232f297a57a5a743894a0e4a801fc3', 'Greyson Ratke', 'sonya08@yahoo.com', '882-497-0505', 'Active', 0, '2021-07-11 17:40:46'),
(143, 'Ima', '21232f297a57a5a743894a0e4a801fc3', 'Sheridan Kulas', 'golden.rogahn@gmail.com', '332.982.3274 x44200', 'Active', 0, '2021-07-11 17:56:30'),
(145, 'Winston', '21232f297a57a5a743894a0e4a801fc3', 'Emie Wilderman I', 'tmoen@cruickshank.com', '1-904-490-4793 x458', 'Active', 0, '2021-07-11 17:57:02'),
(226, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '(312) 821-2752 x4380', 'Active', 1, '2021-07-11 19:33:26'),
(228, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '(372) 967-1677', 'Active', 1, '2021-07-11 19:36:57'),
(230, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '+1 (714) 284-5671', 'Active', 1, '2021-07-11 19:38:15'),
(232, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '482-803-5707 x8327', 'Active', 1, '2021-07-11 19:38:29'),
(234, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '1-743-757-0078 x199', 'Active', 1, '2021-07-11 19:39:28'),
(236, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '348.805.3888', 'Active', 1, '2021-07-11 19:40:35'),
(238, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '+14363869210', 'Active', 1, '2021-07-11 19:42:01'),
(240, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '1-843-984-9364', 'Active', 1, '2021-07-11 20:10:47'),
(242, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '+1-347-603-6563', 'Active', 1, '2021-07-11 20:11:35'),
(244, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '+1-782-967-9205', 'Active', 1, '2021-07-11 20:13:49'),
(245, 'Karianne', '21232f297a57a5a743894a0e4a801fc3', 'Stephania Steuber III', 'smarvin@mcglynn.org', '(758) 759-7355 x7448', 'Active', 0, '2021-07-11 20:13:49'),
(246, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '+1-874-413-0798', 'Active', 1, '2021-07-11 20:15:39'),
(248, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '+15376782926', 'Active', 1, '2021-07-11 20:15:53'),
(250, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '301-252-1417', 'Active', 1, '2021-07-11 20:17:17'),
(252, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '+1 (772) 314-7294', 'Active', 1, '2021-07-11 20:19:02'),
(254, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '896-387-7657', 'Active', 1, '2021-07-11 20:20:41'),
(256, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '702.517.1362 x176', 'Active', 1, '2021-07-11 21:00:49'),
(258, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '(693) 918-1822', 'Active', 1, '2021-07-11 21:02:16'),
(260, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '(862) 599-9000 x37339', 'Active', 1, '2021-07-11 21:06:05'),
(262, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '(327) 950-3837 x852', 'Active', 1, '2021-07-11 21:06:52'),
(264, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '532-487-8443', 'Active', 1, '2021-07-11 21:08:52'),
(266, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '854-422-9158 x652', 'Active', 1, '2021-07-11 21:21:15'),
(268, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '+15959056275', 'Active', 1, '2021-07-11 21:22:56'),
(270, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '(530) 806-8610 x255', 'Active', 1, '2021-07-11 21:24:59'),
(272, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '405.529.6338 x88901', 'Active', 1, '2021-07-11 21:27:28'),
(274, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '(739) 843-8962 x525', 'Active', 1, '2021-07-11 21:28:03'),
(276, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '(460) 796-3670 x7720', 'Active', 1, '2021-07-11 21:30:02'),
(278, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '583-394-3712', 'Active', 1, '2021-07-11 21:30:03'),
(280, 'Riddle', '21232f297a57a5a743894a0e4a801fc3', 'Tom Riddle', 'riddle@email.com', '+18797441089', 'Active', 1, '2021-07-11 21:30:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_id` (`schedule_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `travel_schedules`
--
ALTER TABLE `travel_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travel_schedule_user_id_foreign_key` (`user_id`),
  ADD KEY `travel_schedules_driver_id` (`driver_id`),
  ADD KEY `travel_schedules_bus_id_fk` (`bus_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `travel_schedules`
--
ALTER TABLE `travel_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `booking_schedule_id_foreign_key` FOREIGN KEY (`schedule_id`) REFERENCES `travel_schedules` (`id`),
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `bookings_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `buses`
--
ALTER TABLE `buses`
  ADD CONSTRAINT `buses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `driver_user_id_foreign_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payment_user_id_foreign_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);

--
-- Constraints for table `travel_schedules`
--
ALTER TABLE `travel_schedules`
  ADD CONSTRAINT `travel_schedule_user_id_foreign_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `travel_schedules_bus_id_fk` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`),
  ADD CONSTRAINT `travel_schedules_driver_id` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
