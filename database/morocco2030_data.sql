-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 19 jan. 2026 à 18:31
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `morocco2030`
--

-- --------------------------------------------------------

--
-- Structure de la table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_type` varchar(255) NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `activities`
--

INSERT INTO `activities` (`id`, `subject_type`, `subject_id`, `action`, `description`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\City', 5, 'deleted', 'City deleted: salma salimi', '2025-12-07 18:40:41', '2025-12-07 18:40:41'),
(2, 'App\\Models\\City', 6, 'created', 'New City created: baba', '2025-12-07 19:39:42', '2025-12-07 19:39:42'),
(3, 'App\\Models\\City', 6, 'deleted', 'City deleted: baba', '2025-12-07 19:49:42', '2025-12-07 19:49:42'),
(4, 'App\\Models\\City', 7, 'created', 'New City created: Casablanca', '2025-12-07 19:50:07', '2025-12-07 19:50:07'),
(5, 'App\\Models\\City', 7, 'updated', 'City updated: Casablanca', '2025-12-07 20:01:05', '2025-12-07 20:01:05'),
(6, 'App\\Models\\Destination', 4, 'created', 'New Destination created: lahri faycal', '2025-12-07 20:17:54', '2025-12-07 20:17:54'),
(7, 'App\\Models\\City', 8, 'created', 'New City created: baba', '2025-12-07 20:46:57', '2025-12-07 20:46:57'),
(8, 'App\\Models\\Contact', 2, 'deleted', 'Contact deleted: Sara Ben Ali', '2025-12-07 21:24:18', '2025-12-07 21:24:18'),
(9, 'App\\Models\\Contact', 6, 'updated', 'Contact updated: Youssef Baraka', '2025-12-07 21:44:42', '2025-12-07 21:44:42'),
(10, 'App\\Models\\City', 8, 'updated', 'City updated: Rabat', '2025-12-07 21:49:32', '2025-12-07 21:49:32'),
(11, 'App\\Models\\Contact', 6, 'updated', 'Contact updated: Youssef Baraka', '2025-12-07 21:58:25', '2025-12-07 21:58:25'),
(12, 'App\\Models\\Contact', 5, 'updated', 'Contact updated: Salma Tahiri', '2025-12-07 22:14:04', '2025-12-07 22:14:04'),
(13, 'App\\Models\\City', 9, 'created', 'New City created: Agadir', '2025-12-07 22:17:36', '2025-12-07 22:17:36'),
(14, 'App\\Models\\Destination', 5, 'created', 'New Destination created: lahri faycal', '2025-12-07 22:30:00', '2025-12-07 22:30:00'),
(15, 'App\\Models\\Destination', 5, 'updated', 'Destination updated: lahri faycal', '2025-12-07 23:00:14', '2025-12-07 23:00:14'),
(16, 'App\\Models\\Destination', 5, 'updated', 'Destination updated: agadir oufela', '2025-12-07 23:21:49', '2025-12-07 23:21:49'),
(17, 'App\\Models\\Destination', 4, 'updated', 'Destination updated: hassan 2 mosque', '2025-12-07 23:22:01', '2025-12-07 23:22:01'),
(18, 'App\\Models\\Destination', 6, 'created', 'New Destination created: Hadik', '2025-12-08 09:25:22', '2025-12-08 09:25:22'),
(19, 'App\\Models\\Contact', 3, 'updated', 'Contact updated: Sara Ben Ali', '2025-12-08 09:55:13', '2025-12-08 09:55:13'),
(20, 'App\\Models\\City', 7, 'updated', 'City updated: Casablanca (Test Update)', '2025-12-08 10:16:44', '2025-12-08 10:16:44'),
(21, 'App\\Models\\City', 7, 'updated', 'City updated: Casablanca', '2025-12-08 10:16:44', '2025-12-08 10:16:44'),
(22, 'App\\Models\\Destination', 7, 'created', 'New Destination created: lahri faycal', '2025-12-08 12:03:58', '2025-12-08 12:03:58'),
(23, 'App\\Models\\Contact', 5, 'deleted', 'Contact deleted: Salma Tahiri', '2025-12-08 14:35:53', '2025-12-08 14:35:53'),
(24, 'App\\Models\\Contact', 3, 'deleted', 'Contact deleted: Sara Ben Ali', '2025-12-08 14:35:56', '2025-12-08 14:35:56'),
(25, 'App\\Models\\Contact', 4, 'updated', 'Contact updated: Ahmed El Mansouri', '2025-12-08 20:35:55', '2025-12-08 20:35:55'),
(26, 'App\\Models\\Contact', 6, 'updated', 'Contact updated: Youssef Baraka', '2025-12-09 07:01:41', '2025-12-09 07:01:41'),
(27, 'App\\Models\\Destination', 8, 'created', 'New Destination created: salma salimi', '2025-12-09 07:13:39', '2025-12-09 07:13:39'),
(28, 'App\\Models\\Contact', 15, 'updated', 'Contact updated: John Smith', '2025-12-09 11:23:46', '2025-12-09 11:23:46'),
(29, 'App\\Models\\City', 10, 'created', 'New City created: Tanger', '2025-12-10 15:59:18', '2025-12-10 15:59:18'),
(31, 'App\\Models\\City', 10, 'updated', 'City updated: Dakhla', '2025-12-10 16:00:31', '2025-12-10 16:00:31'),
(33, 'App\\Models\\City', 10, 'deleted', 'Deleted City: Dakhla', '2025-12-10 21:24:21', '2025-12-10 21:24:21'),
(34, 'App\\Models\\Contact', 14, 'updated', 'Updated Contact: test@example.com', '2025-12-11 07:51:56', '2025-12-11 07:51:56'),
(35, 'App\\Models\\Contact', 15, 'updated', 'Updated Contact: john.smith@example.com', '2025-12-11 08:07:14', '2025-12-11 08:07:14'),
(36, 'App\\Models\\City', 11, 'updated', 'Updated City: Casablanca', '2025-12-12 07:44:20', '2025-12-12 07:44:20'),
(37, 'App\\Models\\City', 17, 'updated', 'Updated City: Chefchaouen', '2025-12-12 07:49:15', '2025-12-12 07:49:15'),
(38, 'App\\Models\\City', 19, 'updated', 'Updated City: Asilah', '2025-12-12 07:51:26', '2025-12-12 07:51:26'),
(39, 'App\\Models\\City', 16, 'updated', 'Updated City: Agadir', '2025-12-12 07:53:42', '2025-12-12 07:53:42'),
(40, 'App\\Models\\City', 18, 'updated', 'Updated City: Ifrane', '2025-12-12 08:55:47', '2025-12-12 08:55:47'),
(41, 'App\\Models\\City', 15, 'updated', 'Updated City: Tangier', '2025-12-12 08:57:04', '2025-12-12 08:57:04'),
(42, 'App\\Models\\City', 14, 'updated', 'Updated City: Fes', '2025-12-12 08:58:36', '2025-12-12 08:58:36'),
(43, 'App\\Models\\City', 13, 'updated', 'Updated City: Marrakech', '2025-12-12 09:01:46', '2025-12-12 09:01:46'),
(44, 'App\\Models\\City', 12, 'updated', 'Updated City: Rabat', '2025-12-12 09:03:39', '2025-12-12 09:03:39'),
(45, 'App\\Models\\Commentaire', 2, 'updated', 'Updated Commentaire: Benchekroun', '2025-12-12 09:43:33', '2025-12-12 09:43:33'),
(46, 'App\\Models\\Contact', 17, 'created', 'Created new Contact: faycallahri12@gmail.com', '2025-12-12 09:45:01', '2025-12-12 09:45:01'),
(47, 'App\\Models\\Newsletter', 9, 'created', 'Created new Newsletter: faycallahri999@host.com', '2025-12-12 09:45:25', '2025-12-12 09:45:25'),
(48, 'App\\Models\\Volontaire', 3, 'created', 'Created new Volontaire: Faycal', '2025-12-12 09:48:06', '2025-12-12 09:48:06'),
(49, 'App\\Models\\City', 12, 'updated', 'Updated City: Rabat', '2025-12-12 09:53:22', '2025-12-12 09:53:22'),
(50, 'App\\Models\\City', 15, 'updated', 'Updated City: Tangier', '2025-12-12 09:59:30', '2025-12-12 09:59:30'),
(51, 'App\\Models\\Volontaire', 4, 'created', 'Created new Volontaire: Casablanca', '2025-12-12 10:19:55', '2025-12-12 10:19:55'),
(52, 'App\\Models\\Volontaire', 4, 'deleted', 'Deleted Volontaire: Casablanca', '2025-12-12 10:20:14', '2025-12-12 10:20:14'),
(53, 'App\\Models\\Commentaire', 2, 'deleted', 'Deleted Commentaire: Benchekroun', '2025-12-12 10:24:05', '2025-12-12 10:24:05'),
(54, 'App\\Models\\Newsletter', 4, 'deleted', 'Deleted Newsletter: marwa.benali@example.com', '2025-12-12 10:28:00', '2025-12-12 10:28:00'),
(55, 'App\\Models\\Newsletter', 9, 'deleted', 'Deleted Newsletter: faycallahri999@host.com', '2025-12-12 10:28:06', '2025-12-12 10:28:06'),
(56, 'App\\Models\\City', 12, 'updated', 'Updated City: Rabat', '2025-12-12 11:22:34', '2025-12-12 11:22:34'),
(57, 'App\\Models\\City', 12, 'updated', 'Updated City: Rabat', '2025-12-12 11:22:34', '2025-12-12 11:22:34'),
(58, 'App\\Models\\City', 13, 'updated', 'Updated City: Marrakech', '2025-12-12 11:22:46', '2025-12-12 11:22:46'),
(59, 'App\\Models\\City', 14, 'updated', 'Updated City: Fes', '2025-12-12 11:22:57', '2025-12-12 11:22:57'),
(60, 'App\\Models\\City', 15, 'updated', 'Updated City: Tangier', '2025-12-12 11:23:08', '2025-12-12 11:23:08'),
(61, 'App\\Models\\City', 16, 'updated', 'Updated City: Agadir', '2025-12-12 11:23:19', '2025-12-12 11:23:19'),
(62, 'App\\Models\\City', 17, 'updated', 'Updated City: Chefchaouen', '2025-12-12 11:23:29', '2025-12-12 11:23:29'),
(63, 'App\\Models\\City', 18, 'updated', 'Updated City: Ifrane', '2025-12-12 11:23:40', '2025-12-12 11:23:40'),
(64, 'App\\Models\\City', 19, 'updated', 'Updated City: Asilah', '2025-12-12 11:23:50', '2025-12-12 11:23:50'),
(65, 'App\\Models\\City', 11, 'updated', 'Updated City: Casablanca', '2025-12-12 11:24:05', '2025-12-12 11:24:05'),
(66, 'App\\Models\\Commentaire', 4, 'created', 'Created new Commentaire: salimi', '2025-12-12 11:24:48', '2025-12-12 11:24:48'),
(67, 'App\\Models\\Commentaire', 5, 'created', 'Created new Commentaire: baba', '2025-12-12 11:25:00', '2025-12-12 11:25:00'),
(68, 'App\\Models\\Newsletter', 10, 'created', 'Created new Newsletter: faycallahri12@gmail.com', '2025-12-12 19:49:18', '2025-12-12 19:49:18'),
(69, 'App\\Models\\Newsletter', 11, 'created', 'Created new Newsletter: faycallahri999@gmail.com', '2025-12-12 19:49:46', '2025-12-12 19:49:46'),
(70, 'App\\Models\\Newsletter', 12, 'created', 'Created new Newsletter: zmla@gmfabyjnkdrk.com', '2025-12-12 19:50:09', '2025-12-12 19:50:09'),
(71, 'App\\Models\\Newsletter', 2, 'deleted', 'Deleted Newsletter: contact.client@example.com', '2025-12-12 19:51:40', '2025-12-12 19:51:40'),
(72, 'App\\Models\\Newsletter', 3, 'deleted', 'Deleted Newsletter: user.random@gmail.com', '2025-12-12 19:51:45', '2025-12-12 19:51:45'),
(73, 'App\\Models\\Commentaire', 5, 'deleted', 'Deleted Commentaire: baba', '2025-12-12 20:00:11', '2025-12-12 20:00:11'),
(74, 'App\\Models\\Newsletter', 7, 'deleted', 'Deleted Newsletter: info.news@company.org', '2025-12-12 20:01:12', '2025-12-12 20:01:12'),
(75, 'App\\Models\\City', 12, 'updated', 'Updated City: Rabat', '2025-12-12 20:01:45', '2025-12-12 20:01:45'),
(76, 'App\\Models\\Contact', 11, 'updated', 'Updated Contact: youssef.alaoui@example.com', '2025-12-12 20:02:56', '2025-12-12 20:02:56'),
(77, 'App\\Models\\Commentaire', 4, 'deleted', 'Deleted Commentaire: salimi', '2025-12-12 20:08:48', '2025-12-12 20:08:48'),
(78, 'App\\Models\\Destination', 9, 'created', 'Created new Destination: Casablanca', '2025-12-12 20:11:45', '2025-12-12 20:11:45'),
(79, 'App\\Models\\Contact', 14, 'deleted', 'Deleted Contact: test@example.com', '2025-12-12 20:14:41', '2025-12-12 20:14:41'),
(80, 'App\\Models\\Contact', 7, 'updated', 'Updated Contact: imad@example.com', '2025-12-12 20:15:11', '2025-12-12 20:15:11'),
(81, 'App\\Models\\Contact', 15, 'updated', 'Updated Contact: john.smith@example.com', '2025-12-12 20:15:19', '2025-12-12 20:15:19'),
(82, 'App\\Models\\Contact', 17, 'updated', 'Updated Contact: faycallahri12@gmail.com', '2025-12-12 20:15:28', '2025-12-12 20:15:28'),
(83, 'App\\Models\\Newsletter', 13, 'created', 'Created new Newsletter: faycal.lahri@etud.iga.ac.ma', '2025-12-13 12:22:53', '2025-12-13 12:22:53'),
(84, 'App\\Models\\Newsletter', 14, 'created', 'Created new Newsletter: faycallahri999@host.com', '2025-12-13 12:31:22', '2025-12-13 12:31:22'),
(85, 'App\\Models\\Commentaire', 6, 'created', 'Created new Commentaire: baba', '2025-12-13 12:42:51', '2025-12-13 12:42:51'),
(86, 'App\\Models\\Destination', 9, 'updated', 'Updated Destination: hassan 2 mosque', '2025-12-13 13:12:45', '2025-12-13 13:12:45'),
(87, 'App\\Models\\Newsletter', 15, 'created', 'Created new Newsletter: salma.benchekroun@example.com', '2025-12-13 22:10:24', '2025-12-13 22:10:24'),
(88, 'App\\Models\\Commentaire', 7, 'created', 'Created new Commentaire: baba', '2025-12-14 10:10:06', '2025-12-14 10:10:06'),
(89, 'App\\Models\\Commentaire', 7, 'deleted', 'Deleted Commentaire: baba', '2025-12-14 10:10:28', '2025-12-14 10:10:28'),
(90, 'App\\Models\\Newsletter', 13, 'deleted', 'Deleted Newsletter: faycal.lahri@etud.iga.ac.ma', '2025-12-14 10:12:59', '2025-12-14 10:12:59'),
(91, 'App\\Models\\Commentaire', 8, 'created', 'Created new Commentaire: baba', '2025-12-14 10:15:19', '2025-12-14 10:15:19'),
(92, 'App\\Models\\Commentaire', 9, 'created', 'Created new Commentaire: salma salimi', '2025-12-14 10:16:03', '2025-12-14 10:16:03'),
(93, 'App\\Models\\Commentaire', 9, 'deleted', 'Deleted Commentaire: salma salimi', '2025-12-14 10:16:18', '2025-12-14 10:16:18'),
(94, 'App\\Models\\Commentaire', 8, 'deleted', 'Deleted Commentaire: baba', '2025-12-14 10:16:21', '2025-12-14 10:16:21'),
(95, 'App\\Models\\Newsletter', 14, 'deleted', 'Deleted Newsletter: faycallahri999@host.com', '2025-12-14 13:09:24', '2025-12-14 13:09:24'),
(96, 'App\\Models\\Newsletter', 12, 'deleted', 'Deleted Newsletter: zmla@gmfabyjnkdrk.com', '2025-12-14 13:09:27', '2025-12-14 13:09:27'),
(97, 'App\\Models\\Newsletter', 16, 'created', 'Created new Newsletter: zmla@gmfabyjnkdrk.com', '2025-12-14 13:09:33', '2025-12-14 13:09:33'),
(98, 'App\\Models\\Contact', 18, 'created', 'Created new Contact: zmla@gmfabyjnkdrk.com', '2025-12-14 13:12:29', '2025-12-14 13:12:29'),
(99, 'App\\Models\\Contact', 19, 'created', 'Created new Contact: faycal.lahri@etud.iga.ac.ma', '2025-12-14 13:14:58', '2025-12-14 13:14:58'),
(100, 'App\\Models\\Newsletter', 17, 'created', 'Created new Newsletter: faycallahri999@host.com', '2025-12-14 13:15:07', '2025-12-14 13:15:07'),
(101, 'App\\Models\\Contact', 19, 'deleted', 'Deleted Contact: faycal.lahri@etud.iga.ac.ma', '2025-12-14 13:23:26', '2025-12-14 13:23:26'),
(102, 'App\\Models\\Contact', 20, 'created', 'Created new Contact: faycallahri12@gmail.com', '2025-12-14 15:26:30', '2025-12-14 15:26:30'),
(103, 'App\\Models\\Commentaire', 10, 'created', 'Created new Commentaire: za', '2025-12-14 15:26:56', '2025-12-14 15:26:56'),
(104, 'App\\Models\\Newsletter', 18, 'created', 'Created new Newsletter: lmjjinomi@gmail.com', '2025-12-14 18:31:43', '2025-12-14 18:31:43'),
(105, 'App\\Models\\Volontaire', 5, 'created', 'Created new Volontaire: Rabat', '2025-12-15 10:54:30', '2025-12-15 10:54:30'),
(106, 'App\\Models\\Commentaire', 11, 'created', 'Created new Commentaire: baba', '2025-12-15 11:13:50', '2025-12-15 11:13:50'),
(107, 'App\\Models\\Commentaire', 12, 'created', 'Created new Commentaire: Casablanca', '2025-12-15 11:15:16', '2025-12-15 11:15:16'),
(108, 'App\\Models\\Commentaire', 13, 'created', 'Created new Commentaire: qewrewr', '2025-12-15 11:16:21', '2025-12-15 11:16:21'),
(109, 'App\\Models\\Commentaire', 14, 'created', 'Created new Commentaire: lahri faycal', '2025-12-15 11:17:05', '2025-12-15 11:17:05'),
(110, 'App\\Models\\Commentaire', 14, 'deleted', 'Deleted Commentaire: lahri faycal', '2025-12-15 11:17:13', '2025-12-15 11:17:13'),
(111, 'App\\Models\\Faq', 72, 'deleted', 'Deleted FAQ: Can families find suitable acc...', '2025-12-15 20:57:53', '2025-12-15 20:57:53'),
(112, 'App\\Models\\Destination', 10, 'created', 'Created new Destination: Casablanca', '2025-12-17 11:01:38', '2025-12-17 11:01:38'),
(113, 'App\\Models\\Volontaire', 6, 'created', 'Created new Volontaire: awane', '2025-12-20 16:48:17', '2025-12-20 16:48:17'),
(114, 'App\\Models\\Contact', 20, 'updated', 'Updated Contact: faycallahri12@gmail.com', '2025-12-20 19:30:25', '2025-12-20 19:30:25'),
(115, 'App\\Models\\Contact', 21, 'created', 'Created new Contact: faycallahri999@gmail.com', '2025-12-20 19:32:35', '2025-12-20 19:32:35'),
(116, 'App\\Models\\Contact', 22, 'created', 'Created new Contact: faycal.lahri@etud.iga.ac.ma', '2025-12-20 20:23:56', '2025-12-20 20:23:56'),
(117, 'App\\Models\\Contact', 20, 'deleted', 'Deleted Contact: faycallahri12@gmail.com', '2025-12-20 20:28:32', '2025-12-20 20:28:32'),
(118, 'App\\Models\\Contact', 18, 'deleted', 'Deleted Contact: zmla@gmfabyjnkdrk.com', '2025-12-20 20:28:43', '2025-12-20 20:28:43'),
(119, 'App\\Models\\Contact', 10, 'deleted', 'Deleted Contact: fatima.z@example.com', '2025-12-20 20:28:48', '2025-12-20 20:28:48'),
(120, 'App\\Models\\Contact', 6, 'deleted', 'Deleted Contact: y.baraka@example.com', '2025-12-20 20:28:53', '2025-12-20 20:28:53'),
(121, 'App\\Models\\Contact', 12, 'deleted', 'Deleted Contact: salimi@example.com', '2025-12-20 20:29:06', '2025-12-20 20:29:06'),
(122, 'App\\Models\\Contact', 4, 'updated', 'Updated Contact: ahmed.mansouri@example.com', '2025-12-21 11:34:33', '2025-12-21 11:34:33'),
(123, 'App\\Models\\Contact', 16, 'updated', 'Updated Contact: marie.dupont@example.fr', '2025-12-21 11:34:41', '2025-12-21 11:34:41'),
(124, 'App\\Models\\Contact', 8, 'updated', 'Updated Contact: amine@example.com', '2025-12-21 11:34:47', '2025-12-21 11:34:47'),
(125, 'App\\Models\\Contact', 13, 'deleted', 'Deleted Contact: Ikram Attouch@example.com', '2025-12-21 11:35:07', '2025-12-21 11:35:07'),
(126, 'App\\Models\\Contact', 23, 'created', 'Created new Contact: faycallahri12@gmail.com', '2025-12-21 11:36:21', '2025-12-21 11:36:21'),
(127, 'App\\Models\\Contact', 23, 'updated', 'Updated Contact: faycallahri12@gmail.com', '2025-12-21 11:40:32', '2025-12-21 11:40:32'),
(128, 'App\\Models\\Contact', 23, 'updated', 'Updated Contact: faycallahri12@gmail.com', '2025-12-21 11:45:05', '2025-12-21 11:45:05'),
(129, 'App\\Models\\Contact', 23, 'updated', 'Updated Contact: faycallahri12@gmail.com', '2025-12-21 11:46:22', '2025-12-21 11:46:22'),
(130, 'App\\Models\\Contact', 24, 'created', 'Created new Contact: imad000062@gmail.com', '2025-12-21 14:40:05', '2025-12-21 14:40:05'),
(131, 'App\\Models\\Contact', 25, 'created', 'Created new Contact: imad.ennassiri21@gmail.com', '2025-12-21 14:59:22', '2025-12-21 14:59:22'),
(132, 'App\\Models\\Contact', 26, 'created', 'Created new Contact: imad000062@gmail.com', '2025-12-21 15:01:10', '2025-12-21 15:01:10'),
(133, 'App\\Models\\Contact', 27, 'created', 'Created new Contact: imad.ennassiri21@gmail.com', '2025-12-21 15:01:32', '2025-12-21 15:01:32'),
(134, 'App\\Models\\Contact', 26, 'updated', 'Updated Contact: imad000062@gmail.com', '2025-12-21 15:04:37', '2025-12-21 15:04:37'),
(135, 'App\\Models\\Contact', 28, 'created', 'Created new Contact: amine27messaoudi@gmail.com', '2025-12-21 16:12:26', '2025-12-21 16:12:26'),
(136, 'App\\Models\\Contact', 23, 'updated', 'Updated Contact: faycallahri12@gmail.com', '2025-12-21 17:01:26', '2025-12-21 17:01:26'),
(137, 'App\\Models\\Contact', 23, 'deleted', 'Deleted Contact: faycallahri12@gmail.com', '2025-12-21 17:48:18', '2025-12-21 17:48:18'),
(138, 'App\\Models\\Contact', 28, 'deleted', 'Deleted Contact: amine27messaoudi@gmail.com', '2025-12-22 07:34:27', '2025-12-22 07:34:27'),
(139, 'App\\Models\\Contact', 27, 'deleted', 'Deleted Contact: imad.ennassiri21@gmail.com', '2025-12-22 07:34:33', '2025-12-22 07:34:33'),
(140, 'App\\Models\\Contact', 25, 'deleted', 'Deleted Contact: imad.ennassiri21@gmail.com', '2025-12-22 07:34:35', '2025-12-22 07:34:35'),
(141, 'App\\Models\\Contact', 21, 'deleted', 'Deleted Contact: faycallahri999@gmail.com', '2025-12-22 07:34:38', '2025-12-22 07:34:38'),
(142, 'App\\Models\\Contact', 4, 'deleted', 'Deleted Contact: ahmed.mansouri@example.com', '2025-12-22 07:34:41', '2025-12-22 07:34:41'),
(143, 'App\\Models\\Contact', 22, 'deleted', 'Deleted Contact: faycal.lahri@etud.iga.ac.ma', '2025-12-22 07:34:43', '2025-12-22 07:34:43'),
(144, 'App\\Models\\Contact', 26, 'deleted', 'Deleted Contact: imad000062@gmail.com', '2025-12-22 07:34:45', '2025-12-22 07:34:45'),
(145, 'App\\Models\\Contact', 29, 'created', 'Created new Contact: faycallahri999@gmail.com', '2025-12-22 07:35:12', '2025-12-22 07:35:12'),
(146, 'App\\Models\\Contact', 30, 'created', 'Created new Contact: faycal.lahri@etud.iga.ac.ma', '2025-12-22 07:35:31', '2025-12-22 07:35:31'),
(147, 'App\\Models\\Contact', 30, 'updated', 'Updated Contact: faycal.lahri@etud.iga.ac.ma', '2025-12-22 07:38:21', '2025-12-22 07:38:21'),
(148, 'App\\Models\\Contact', 31, 'created', 'Created new Contact: rimaelbarkaoui@gmail.com', '2025-12-22 08:57:06', '2025-12-22 08:57:06'),
(149, 'App\\Models\\Contact', 32, 'created', 'Created new Contact: yassineabida47@gmail.com', '2025-12-22 10:47:08', '2025-12-22 10:47:08'),
(150, 'App\\Models\\Contact', 33, 'created', 'Created new Contact: faycallahri999@gmail.com', '2025-12-25 08:54:53', '2025-12-25 08:54:53'),
(151, 'App\\Models\\Contact', 34, 'created', 'Created new Contact: youneszahfouf@gmail.com', '2025-12-29 17:07:05', '2025-12-29 17:07:05'),
(152, 'App\\Models\\Contact', 35, 'created', 'Created new Contact: hamzaberrada761@gmail.com', '2025-12-31 07:12:01', '2025-12-31 07:12:01'),
(153, 'App\\Models\\Contact', 36, 'created', 'Created new Contact: hamzaberrada761@gmail.com', '2025-12-31 07:17:08', '2025-12-31 07:17:08'),
(154, 'App\\Models\\Contact', 34, 'deleted', 'Deleted Contact: youneszahfouf@gmail.com', '2025-12-31 07:17:23', '2025-12-31 07:17:23'),
(155, 'App\\Models\\Contact', 37, 'created', 'Created new Contact: hamzaberrada761@gmail.com', '2025-12-31 07:21:11', '2025-12-31 07:21:11'),
(156, 'App\\Models\\Commentaire', 35, 'created', 'Created new Commentaire: Lahri', '2025-12-31 07:23:51', '2025-12-31 07:23:51'),
(157, 'App\\Models\\Contact', 38, 'created', 'Created new Contact: naouar.belghini@iga.ac.ma', '2025-12-31 07:35:20', '2025-12-31 07:35:20'),
(158, 'App\\Models\\Contact', 39, 'created', 'Created new Contact: naouar.belghini@iga.ac.ma', '2025-12-31 07:38:59', '2025-12-31 07:38:59'),
(159, 'App\\Models\\City', 16, 'deleted', 'Deleted City: Agadir', '2026-01-13 19:01:58', '2026-01-13 19:01:58'),
(160, 'App\\Models\\Destination', 9, 'deleted', 'Deleted Destination: hassan 2 mosque', '2026-01-13 19:53:56', '2026-01-13 19:53:56'),
(161, 'App\\Models\\City', 12, 'updated', 'Updated City: Rabat', '2026-01-13 20:00:45', '2026-01-13 20:00:45'),
(162, 'App\\Models\\City', 12, 'updated', 'Updated City: Rabat', '2026-01-13 20:01:37', '2026-01-13 20:01:37'),
(163, 'App\\Models\\City', 12, 'updated', 'Updated City: Rabat', '2026-01-13 20:02:38', '2026-01-13 20:02:38'),
(164, 'App\\Models\\Destination', 11, 'created', 'Created new Destination: Tour Hassan', '2026-01-13 20:07:42', '2026-01-13 20:07:42'),
(165, 'App\\Models\\Destination', 12, 'created', 'Created new Destination: Médina de Rabat', '2026-01-13 20:09:23', '2026-01-13 20:09:23'),
(166, 'App\\Models\\Destination', 13, 'created', 'Created new Destination: Théâtre Mohammed V', '2026-01-13 20:11:03', '2026-01-13 20:11:03'),
(167, 'App\\Models\\Destination', 14, 'created', 'Created new Destination: Musée Mohammed VI d’Art Moderne et Contemporain (MMVI)', '2026-01-13 20:13:01', '2026-01-13 20:13:01');

-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `size` enum('big','small') NOT NULL,
  `description` text DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cities`
--

INSERT INTO `cities` (`id`, `nom`, `size`, `description`, `label`, `latitude`, `longitude`, `titre`, `image`, `video`, `created_at`, `updated_at`) VALUES
(11, 'Casablanca', 'big', 'Largest city of Morocco, economic capital with the Hassan II Mosque and Atlantic coast.', 'Casa', NULL, NULL, 'Casablanca, the economic heart of Morocco', 'cities/images/2i41UoLtFG17J4CVD6FEUus6iChZp0JvtYBoBgKX.jpg', 'cities/videos/sS4c9NZPHzn6ojihh6XtBiBKi0tOECSyN1h9B9a1.mp4', '2025-12-12 08:42:06', '2025-12-12 11:24:05'),
(12, 'Rabat', 'big', 'Rabat est la capitale du Maroc, une ville calme et moderne au bord de l’Atlantique, connue pour ses monuments historiques et sa qualité de vie.', 'Rabat', NULL, NULL, 'Ville royale', 'cities/images/lP70V7YiAH7SJfmQlf6Og5ZA5cQVrOGJ6udrl9Se.jpg', 'cities/videos/1Zvb71iA1Tbjk5Einz4RfrEGGN8cmCFf1QegyXZ0.mp4', '2025-12-12 08:46:02', '2026-01-13 20:02:38'),
(13, 'Marrakech', 'big', 'Touristic capital famous for Jemaa el-Fna, the Medina, and its desert culture.', 'Marrakech', NULL, NULL, 'Marrakech, the red city', 'cities/images/Gejqc82JKxEb1Rska1peiXc4puMSycmpxSAyxnXB.jpg', 'cities/videos/SSid0JsRKMGHc1C7F3rNkcvOCBYvAWDdqwPFC9zd.mp4', '2025-12-12 08:46:02', '2025-12-12 11:22:46'),
(14, 'Fes', 'big', 'Historic imperial city known for its ancient medina and cultural heritage.', 'Fes', NULL, NULL, 'Fes, the spiritual capital', 'cities/images/8BoQ5PHv3adOlNnCvS0Os6ya26e9UQXKd1IGTBTD.jpg', 'cities/videos/rkWsuxjt9CqizZRILZUNZgdx5oxF6XcoqtBH6XLH.mp4', '2025-12-12 08:46:02', '2025-12-12 11:22:57'),
(15, 'Tangier', 'big', 'Strategic port city connecting Africa and Europe, known for its modern development.', 'Tangier', NULL, NULL, 'Tangier, the northern gateway', 'cities/images/xIrmdmJJxYFch3odylQkub8mrFft3YMqcUMKLLs2.jpg', 'cities/videos/nDCVlt7m7T6jwVswKs4HgMfHdwmKQzWRxz9UZGzU.mp4', '2025-12-12 08:46:02', '2025-12-12 11:23:08'),
(17, 'Chefchaouen', 'small', 'Blue-painted mountain town famous for its unique architecture and calm atmosphere.', 'Chaouen', NULL, NULL, 'Chefchaouen, the blue pearl', 'cities/images/3uufLYVTwGv7T1DiNpXAHtP7o5l5tQO6t6Sczu9I.jpg', 'cities/videos/jwHFHJsAy5kiklmE1Sx0mpzmq16gNipuYRMVEo28.mp4', '2025-12-12 08:46:02', '2025-12-12 11:23:29'),
(18, 'Ifrane', 'small', 'Small alpine-style town known for its cold weather and clean urban design.', 'Ifrane', NULL, NULL, 'Ifrane, the little Switzerland of Morocco', 'cities/images/sa1RWx8rMab2oxwAq0eRkkXCFBp6XcEZc4BXDdmG.jpg', 'ifrane.mp4', '2025-12-12 08:46:02', '2025-12-12 11:23:40'),
(19, 'Asilah', 'small', 'Quiet coastal town known for its white walls, murals, and artistic festivals.', 'Asilah', NULL, NULL, 'Asilah, the artistic coastal town', 'cities/images/kXnWlVb7QDuaLwedjcYVtAWQrpmec3YFsg1FoteS.jpg', 'cities/videos/zfSeacmalNEVtTNFtgPvDmL4R954Dno675lR5gDy.mp4', '2025-12-12 08:46:02', '2025-12-12 11:23:50');

-- --------------------------------------------------------

--
-- Structure de la table `city_categories`
--

CREATE TABLE `city_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `categorie` enum('touristique','côtière','montagneuse','historique','culturelle','désertique') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `city_categories`
--

INSERT INTO `city_categories` (`id`, `city_id`, `categorie`, `created_at`, `updated_at`) VALUES
(120, 13, 'touristique', '2025-12-12 11:22:46', '2025-12-12 11:22:46'),
(121, 13, 'montagneuse', '2025-12-12 11:22:46', '2025-12-12 11:22:46'),
(122, 13, 'historique', '2025-12-12 11:22:46', '2025-12-12 11:22:46'),
(123, 13, 'culturelle', '2025-12-12 11:22:46', '2025-12-12 11:22:46'),
(124, 13, 'désertique', '2025-12-12 11:22:46', '2025-12-12 11:22:46'),
(125, 14, 'touristique', '2025-12-12 11:22:57', '2025-12-12 11:22:57'),
(126, 14, 'montagneuse', '2025-12-12 11:22:57', '2025-12-12 11:22:57'),
(127, 14, 'historique', '2025-12-12 11:22:57', '2025-12-12 11:22:57'),
(128, 14, 'culturelle', '2025-12-12 11:22:57', '2025-12-12 11:22:57'),
(129, 15, 'touristique', '2025-12-12 11:23:08', '2025-12-12 11:23:08'),
(130, 15, 'côtière', '2025-12-12 11:23:08', '2025-12-12 11:23:08'),
(131, 15, 'montagneuse', '2025-12-12 11:23:08', '2025-12-12 11:23:08'),
(132, 15, 'historique', '2025-12-12 11:23:08', '2025-12-12 11:23:08'),
(133, 15, 'culturelle', '2025-12-12 11:23:08', '2025-12-12 11:23:08'),
(139, 17, 'touristique', '2025-12-12 11:23:29', '2025-12-12 11:23:29'),
(140, 17, 'montagneuse', '2025-12-12 11:23:29', '2025-12-12 11:23:29'),
(141, 17, 'historique', '2025-12-12 11:23:29', '2025-12-12 11:23:29'),
(142, 18, 'touristique', '2025-12-12 11:23:40', '2025-12-12 11:23:40'),
(143, 18, 'montagneuse', '2025-12-12 11:23:40', '2025-12-12 11:23:40'),
(144, 19, 'touristique', '2025-12-12 11:23:50', '2025-12-12 11:23:50'),
(145, 19, 'côtière', '2025-12-12 11:23:50', '2025-12-12 11:23:50'),
(146, 11, 'touristique', '2025-12-12 11:24:05', '2025-12-12 11:24:05'),
(147, 11, 'côtière', '2025-12-12 11:24:05', '2025-12-12 11:24:05'),
(148, 11, 'historique', '2025-12-12 11:24:05', '2025-12-12 11:24:05'),
(149, 11, 'culturelle', '2025-12-12 11:24:05', '2025-12-12 11:24:05'),
(159, 12, 'côtière', '2026-01-13 20:02:38', '2026-01-13 20:02:38'),
(160, 12, 'historique', '2026-01-13 20:02:38', '2026-01-13 20:02:38'),
(161, 12, 'culturelle', '2026-01-13 20:02:38', '2026-01-13 20:02:38');

-- --------------------------------------------------------

--
-- Structure de la table `city_images`
--

CREATE TABLE `city_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `city_paragraphs`
--

CREATE TABLE `city_paragraphs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `city_paragraphs`
--

INSERT INTO `city_paragraphs` (`id`, `city_id`, `titre`, `contenu`, `created_at`, `updated_at`) VALUES
(7, 12, 'Rabat: The Political Heart of Morocco', 'Rabat is the capital of Morocco and hosts the country’s main government institutions, including the Royal Palace, Parliament, and major ministries. Its political role gives the city a calm and organized character compared to other major Moroccan cities like Casablanca. The diplomatic presence is strong, with numerous embassies and international organizations.', '2026-01-13 19:58:42', '2026-01-13 19:58:42'),
(8, 12, 'A City of Heritage and Modernity', 'Rabat blends historical heritage with modern urban planning. Ancient sites such as the Kasbah des Oudayas, the Hassan Tower, and the Mausoleum of Mohammed V stand beside wide boulevards, modern neighborhoods, and contemporary cultural spaces. This mix gives Rabat an elegant and unique identity.', '2026-01-13 19:59:00', '2026-01-13 19:59:00'),
(9, 12, 'Coastline, Gardens, and Green Spaces', 'Located on the Atlantic coast, Rabat enjoys a mild climate and clean urban planning with many parks and green areas. The Bouregreg River divides Rabat from Salé and offers promenades, bike paths, and marinas. Places like the Jardins de l’Agdal, Forêt de Hilton, and the Corniche make the city one of the most pleasant for outdoor life in Morocco.', '2026-01-13 19:59:20', '2026-01-13 19:59:20'),
(10, 12, 'Culture, Education, and Art', 'Rabat is also a cultural and educational hub. It hosts major museums (like the Musée Mohammed VI d’Art Moderne et Contemporain), theaters, and music events including the famous Mawazine festival. The city attracts students from around the country thanks to its universities and grandes écoles such as Mohammed V University and ENSIAS.', '2026-01-13 19:59:42', '2026-01-13 19:59:42');

-- --------------------------------------------------------

--
-- Structure de la table `city_videos`
--

CREATE TABLE `city_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `video` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `nom`, `prenom`, `email`, `commentaire`, `photo`, `created_at`, `updated_at`) VALUES
(15, 'Miller', 'John', 'john.miller.travel@gmail.com', 'Morocco completely exceeded my expectations. The hospitality was incredible and everyone made us feel welcome from day one. I cannot wait to come back!', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(16, 'Thompson', 'Emily', 'emily.thompson.uk@mail.com', 'Marrakech’s energy is something you have to feel to understand. The colors, the sounds, the food… absolutely unforgettable.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(17, 'Ramírez', 'Carlos', 'carlos.ramirez.es@gmail.com', 'Viajar a Marruecos fue una experiencia única. La comida es deliciosa y la gente es muy amable. Sin duda volveré.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(18, 'Durand', 'Sophie', 'sophie.durand.fr@gmail.com', 'Entre les riads, la cuisine marocaine et l’accueil chaleureux, le Maroc est devenu l’un de mes pays préférés.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(19, 'Anderson', 'Michael', 'm.anderson.usa@mail.com', 'The Sahara desert was a life-changing experience. Watching the sunset over the dunes and sleeping under the stars is something I will never forget.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(20, 'Khan', 'Aisha', 'aisha.khan.travel@gmail.com', 'Morocco felt safe, modern, and deeply rooted in culture. The balance between tradition and progress is impressive.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(21, 'Wilson', 'David', 'david.wilson.uk@gmail.com', 'From the high-speed train to the quality hotels, Morocco’s infrastructure is very impressive. Traveling between cities was smooth and comfortable.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(22, 'Martínez', 'Lucía', 'lucia.martinez.es@mail.com', 'Marrakech tiene una energía increíble. Cada rincón está lleno de vida, historia y sonrisas.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(23, 'Bernard', 'Thomas', 'thomas.bernard.fr@gmail.com', 'Le Maroc est une destination parfaite pour les amoureux de la culture, de la gastronomie et de l’aventure.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(24, 'Johnson', 'Sarah', 'sarah.johnson.usa@gmail.com', 'The food alone is worth the trip. Tagines, couscous, fresh bread… everything was delicious and full of flavor.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(25, 'Tanaka', 'Yuki', 'yuki.tanaka.jp@gmail.com', 'I loved how respectful and kind people were. Morocco has a very warm soul that you feel everywhere you go.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(26, 'Hassan', 'Omar', 'omar.hassan.travel@mail.com', 'Traveling across Morocco felt easy and enjoyable. The trains, taxis, and airports were well organized and tourist-friendly.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(27, 'Clark', 'Emma', 'emma.clark.uk@mail.com', 'The riad we stayed in was beautiful and peaceful. Moroccan hospitality truly makes you feel at home.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(28, 'Lemoine', 'Pierre', 'pierre.lemoine.fr@mail.com', 'Le désert du Sahara est tout simplement magique. Une expérience que tout le monde devrait vivre au moins une fois.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(29, 'Rodríguez', 'Daniel', 'daniel.rodriguez.es@gmail.com', 'Marruecos es un país lleno de contrastes increíbles: playas, montañas, desierto y ciudades vibrantes.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(30, 'Bennett', 'Laura', 'laura.bennett.usa@mail.com', 'Knowing that Morocco will host the 2030 World Cup made the trip even more exciting. You can feel the energy and pride everywhere.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(31, 'Kowalski', 'Nina', 'nina.kowalski.travel@gmail.com', 'I felt very safe as a solo traveler. People were always ready to help and give directions with a smile.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(32, 'El Amrani', 'Hassan', 'h.elamrani.visitor@gmail.com', 'Morocco offers an amazing mix of modern comfort and deep traditions. Every city has its own unique character.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(33, 'O’Connor', 'James', 'j.oconnor.uk@gmail.com', 'The hospitality is unmatched. Strangers treated us like friends, and every interaction felt genuine.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(34, 'Moreau', 'Claire', 'claire.moreau.fr@gmail.com', 'Un voyage inoubliable. Le Maroc m’a marqué par sa culture, sa cuisine et la gentillesse de ses habitants.', '', '2025-12-15 21:54:18', '2025-12-15 21:54:18'),
(35, 'Lahri', 'Faycal', 'faycal.lahri@etud.iga.ac.ma', 'test', NULL, '2025-12-31 07:23:51', '2025-12-31 07:23:51');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_prenom` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `statut` enum('non_lu','en_cours','traite','non_valide') NOT NULL DEFAULT 'non_lu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `nom_prenom`, `telephone`, `email`, `objet`, `message`, `statut`, `created_at`, `updated_at`) VALUES
(29, 'Faycal Lahri', '0612665926', 'faycallahri999@gmail.com', 'Press & Media', 'parle moi du maroc', 'traite', '2025-12-22 07:35:12', '2025-12-22 08:36:34'),
(30, 'imad ennassiri', '0612665926', 'faycal.lahri@etud.iga.ac.ma', 'Press & Media', 'parle moi de la france', 'traite', '2025-12-22 07:35:31', '2025-12-22 08:38:27'),
(31, 'rim el barkaoui', '0620913333', 'rimaelbarkaoui@gmail.com', 'Tourism Support', 'is morocco safe for touriste because i heared that local shops spam people and also steal from them', 'traite', '2025-12-22 08:57:06', '2025-12-22 09:57:44'),
(32, 'yassine abida', '0612665926', 'yassineabida47@gmail.com', 'Other', 'donne moi un planning de 2 semaines au maroc avec les differentes activites que je peux faire budget illimite', 'traite', '2025-12-22 10:47:08', '2025-12-22 11:49:46'),
(33, 'Faycal Lahri', '0612665926', 'faycallahri999@gmail.com', 'General Inquiry', 'donne moi un plamning de 5 jours a marrakech hotel , prix et activites', 'traite', '2025-12-25 08:54:52', '2025-12-25 09:55:14'),
(35, 'amine', '0620913333', 'hamzaberrada761@gmail.com', 'Tourism Support', 'give me the best activities i can do in marrakech in 4 days plans', 'traite', '2025-12-31 07:12:01', '2025-12-31 08:12:49'),
(36, 'johny lqre3', '0612665926', 'hamzaberrada761@gmail.com', 'Other', 'donne moi un planning pour visiter casa de 3 jours et 4 jours a marrakech en incluant les differentes activites a faire', 'traite', '2025-12-31 07:17:08', '2025-12-31 08:17:18'),
(37, 'raja', '0612665926', 'hamzaberrada761@gmail.com', 'Press & Media', 'donne moi un planning de 5 jours et les differentes activites a faire a casablanca', 'traite', '2025-12-31 07:21:11', '2025-12-31 08:21:30'),
(38, 'salma', '0612665926', 'naouar.belghini@iga.ac.ma', 'General Inquiry', 'donne moi unn programme de voyage , je suis au Maroc et mon equipe c\'est l\'egypte , j\'ai un budget de 1000 euro et je veux savoir combien budgetiser cette somme au Maroc', 'traite', '2025-12-31 07:35:20', '2025-12-31 08:35:57'),
(39, 'Faycal Lahri', '0620913333', 'naouar.belghini@iga.ac.ma', 'Press & Media', 'je veux elaborer un partenariat avec vous', 'traite', '2025-12-31 07:38:59', '2025-12-31 08:39:31');

-- --------------------------------------------------------

--
-- Structure de la table `contact_responses`
--

CREATE TABLE `contact_responses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `objet` varchar(255) DEFAULT NULL,
  `response` text NOT NULL,
  `response_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact_responses`
--

INSERT INTO `contact_responses` (`id`, `contact_id`, `objet`, `response`, `response_date`, `created_at`, `updated_at`) VALUES
(4, 30, 'Réponse à votre demande d\'informations sur le Maroc.\n', 'Cher M. Ennassiri,\n\nJe vous remercie de votre intérêt pour la plateforme Discover Morocco 2030, et de votre message concernant les informations liées à la France.\n\nIl est important de préciser que Discover Morocco 2030 est une plateforme dédiée à promouvoir le Royaume du Maroc et à fournir des informations précises et complètes sur ce pays. Nos efforts se concentrent sur l\'histoire, la géographie, le tourisme, la culture, l\'agriculture, le sport, les infrastructures et les aspects pratiques liés au Maroc. \n\nPar conséquent, nous ne sommes pas en mesure de fournir des informations détaillées sur la France. Cependant, si vous avez des questions concernant le Maroc, n\'hésitez pas à nous les poser. Nous serons ravis de vous aider à découvrir les richesses et les opportunités que le Royaume a à offrir.\n\nNotre équipe reste à votre disposition pour toute demande relative au Maroc.\n\nCordialement,\n\nL\'équipe de Discover Morocco 2030.\n', '2025-12-22 08:36:09', '2025-12-22 08:36:09', '2025-12-22 08:36:09'),
(5, 29, 'Informations sur le Maroc : Histoire, Tourisme & Culture', 'Cher M. Lahri,\n\nJe vous remercie de votre intérêt pour la plateforme Discover Morocco 2030, et de votre demande concernant le Maroc. \n\nDiscover Morocco 2030 est une plateforme dédiée à la promotion du Royaume et à la diffusion d\'informations précises sur son histoire, sa géographie, son tourisme, sa culture, son agriculture, ses infrastructures et les aspects pratiques pour les visiteurs.\n\nPour vous donner un aperçu plus détaillé, vous pouvez explorer nos différentes sections concernant l\'histoire du Maroc, des périodes dynastiesques aux monuments emblématiques. Vous trouverez également des informations approfondies sur la géographie, les régions, les villes et les paysages variés du pays.  Nous proposons de nombreux circuits touristiques, des villes impériales aux déserts et aux montagnes, ainsi que des informations sur les expériences culturelles proposées.\n\nNous sommes à votre entière disposition pour répondre à toutes vos questions spécifiques concernant le Maroc. N\'hésitez pas à consulter notre site web ou à nous contacter pour toute demande complémentaire.\n\nCordialement,\n\nL\'équipe de Discover Morocco 2030.', '2025-12-22 08:36:41', '2025-12-22 08:36:41', '2025-12-22 08:36:41'),
(6, 30, 'Information sur le Maroc : Notre expertise se concentre sur le Royaume.', 'Cher M. Ennassiri,\n\nJe vous remercie de votre intérêt pour la plateforme Discover Morocco 2030 et de votre demande d\'informations concernant la France.\n\nIl est important de souligner que Discover Morocco 2030 se consacre exclusivement à la promotion du Royaume du Maroc et à la diffusion de contenus pertinents à son sujet. Nous nous concentrons sur l\'histoire, la géographie, le tourisme, la culture, l\'agriculture, les infrastructures et les aspects pratiques liés au Maroc.\n\nPar conséquent, nous ne sommes pas en mesure de fournir des informations détaillées sur la France. Toutefois, si vous avez des questions spécifiques sur le Maroc, nous serons ravis de vous aider. Vous pouvez consulter nos différentes sections dédiées aux aspects mentionnés ci-dessus, ou nous contacter directement pour toute demande complémentaire.\n\nNotre équipe reste à votre disposition pour toute information concernant le Maroc.\n\nCordialement,\n\nL\'équipe de Discover Morocco 2030.', '2025-12-22 08:38:33', '2025-12-22 08:38:33', '2025-12-22 08:38:33'),
(7, 31, 'Sécurité des touristes au Maroc : Conseils et informations utiles.\n', 'Cher/Chère M. El Barkaoui,\n\nNous vous remercions de l\'intérêt que vous portez à la plateforme Discover Morocco 2030 et de votre question concernant la sécurité des touristes au Maroc.\n\nIl est compréhensible que vous soyez préoccupé par les expériences négatives rapportées concernant les commerces locaux. La sécurité des touristes est une priorité pour le gouvernement marocain et les autorités locales. Nous sommes conscients de certains problèmes qui peuvent exister, notamment dans certaines zones.\n\nCependant, le Maroc est un pays généralement sûr pour les touristes, et de nombreuses mesures sont mises en place pour assurer leur bien-être. Il est important de noter que les situations peuvent varier considérablement d’une région à l’autre et d’un commerce à l’autre.\n\nNous vous recommandons de prendre certaines précautions de base pour une expérience plus agréable et en toute sécurité :\n\n*   Soyez attentif à votre environnement et évitez de montrer des objets de valeur.\n*   Négociez les prix, mais faites-le avec respect et politesse.\n*   Privilégiez les commerces bien fréquentés et les zones touristiques sécurisées.\n*   Conservez vos objets personnels en sécurité.\n\nVous pouvez également consulter les informations de sécurité disponibles sur le site web du Ministère du Tourisme du Maroc et d\'autres sources fiables.\n\nN\'hésitez pas à nous contacter si vous avez d\'autres questions ou si vous souhaitez des informations plus spécifiques sur certaines régions du Maroc. Nous sommes à votre disposition pour vous aider à planifier votre séjour en toute sérénité.\n\nCordialement,\n\nL\'équipe de Discover Morocco 2030.\n', '2025-12-22 09:57:52', '2025-12-22 09:57:52', '2025-12-22 09:57:52'),
(8, 32, 'Suggestions de voyage Morocco : itinéraire 2 semaines, activités & budget illimité.\n', 'Cher M. Abida,\n\nSuite à votre demande concernant un planning de deux semaines au Maroc avec diverses activités et un budget illimité, je me permets de vous apporter quelques suggestions qui pourraient vous inspirer.\n\nLe Maroc offre une richesse d\'expériences variées. Pour un séjour de deux semaines, vous pourriez envisager une itinéraire combinant différentes régions. Une première étape pourrait être Marrakech, avec ses médinas chargées d\'histoire et ses souks animés. Explorez la place Jemaa el-Fna, visitez le Palais Bahia et découvrez les jardins Majorelle.\n\nEnsuite, dirigés vers le sud, vous pourriez vivre une expérience unique dans le désert du Sahara. Un séjour en campement du désert, avec ses dunes ondulantes et ses couchers de soleil spectaculaires, est fortement recommandé. Vous pouvez également envisager une randonnée à dos de chameau ou une nuit dans un campement berbere traditionnel. \n\nEnfin, une visite culturelle dans les villes impériales comme Fès, Meknès ou Rabat compléterait votre séjour. Fès, en particulier, est célèbre pour son architecture méditerranéenne et son artisanat traditionnel, notamment la poterie et le cuir. Vous pourriez également explorer les jardins de l\'agdal à Rabat, la capitale du Maroc.\n\nPour une expérience plus détendue, la côte atlantique offre des plages magnifiques et des stations balnéaires animées. Des villes comme Essaouira sont réputées pour leur ambiance maritime et leurs activités nautiques. \n\nIl est important de noter que cette proposition est indicative et peut être personnalisée selon vos préférences. Nous vous recommandons de faire appel à un guide local pour optimiser votre séjour et découvrir des sites moins fréquentés.\n\nN\'hésitez pas à nous contacter si vous souhaitez des informations plus détaillées sur des activités spécifiques, des hébergements ou des agences de voyage partenaires.\n\nCordialement,\n\nL\'équipe de Discover Morocco 2030.\n', '2025-12-22 11:49:56', '2025-12-22 11:49:56', '2025-12-22 11:49:56'),
(9, 33, 'Proposition de planning 5 jours Marrakech : hôtels, activités et prix.\n', 'Cher Monsieur Lahri,\n\nSuite à votre demande concernant un planning de 5 jours à Marrakech incluant hôtel, prix et activités, je vous prie d\'agréer, Monsieur Lahri, l\'expression de mes salutations distinguées.\n\nDiscover Morocco 2030 est ravi de vous aider à organiser votre séjour à Marrakech. Voici une proposition de planning possible, intégrant différents aspects de la ville :\n\n**Hébergement :**\n\nMarrakech offre une large gamme d\'hébergements, des riads traditionnels aux hôtels de luxe. Les prix varient considérablement en fonction de la catégorie.  Un riad de charme, situé dans le quartier de la Médina, peut se situer entre 80€ et 250€ par nuit. Des hôtels plus modernes et situés plus à l\'extérieur de la ville proposent des tarifs à partir de 50€ par nuit.  Nous pouvons vous conseiller sur des options spécifiques en fonction de vos préférences.\n\n**Activités (plan de 5 jours) :**\n\n*   **Jour 1 :** Arrivée à Marrakech, installation à votre hôtel et découverte de la Médina.  Promenade dans les souks pour s\'imprégner de l\'ambiance locale, visite de la place Jemaa el-Fna, le cœur de la ville.\n*   **Jour 2 :** Visite du Palais Bahia, un exemple remarquable d\'architecture marocaine. Explorez le Jardin Majorelle, un havre de paix aux couleurs vives créé par Yves Saint Laurent.\n*   **Jour 3 :** Excursion dans le désert du Sahara.  Une nuit dans un campement berbere est une expérience inoubliable, incluant des activités comme le trekking, la découverte des traditions locales et le spectacle du coucher de soleil. (Prix généralement compris entre 200€ et 400€ par personne).\n*   **Jour 4 :** Visite de la ville impériale de Meknès, une ancienne capitale du Maroc. Découvrez les monuments historiques de la ville, tels que l\'Hôtel de la Porte Cachée et la Bab Mansour.\n*   **Jour 5 :** Temps libre pour shopping, détente ou exploration de Marrakech. Vous pouvez également vous rendre au Jardin Secret, un jardin luxuriant offrant une alternative paisible aux souks.\n\n**Prix :**\n\nLes prix indiqués sont donnés à titre indicatif et sont susceptibles de varier en fonction de la période de l\'année, de la disponibilité des hôtels et des activités, ainsi que de vos demandes spécifiques.  Pour une estimation plus précise, n\'hésitez pas à nous fournir vos dates de voyage et vos préférences.\n\nPour plus d\'informations sur les hôtels, les activités et les options de transport, vous pouvez consulter notre site web [insérer lien vers site web].\n\nNous restons à votre entière disposition pour toute question complémentaire ou pour vous aider à personnaliser ce planning en fonction de vos besoins et de vos envies.\n\nCordialement,\n\nL’équipe de Discover Morocco 2030.\n', '2025-12-25 09:55:28', '2025-12-25 09:55:28', '2025-12-25 09:55:28'),
(10, 35, 'Marrakech : 4 jours d\'activités et suggestions de circuits.', 'Cher Amine,\n\nSuite à votre demande concernant les meilleures activités à faire à Marrakech pendant 4 jours, l\'équipe de Discover Morocco 2030 vous remercie de l\'intérêt que vous portez à notre plateforme.\n\nMarrakech offre une multitude d\'expériences enrichissantes. Voici quelques suggestions pour votre séjour de 4 jours :\n\n*   **Découverte des souks :** Immergez-vous dans l\'ambiance animée des souks de Marrakech, un labyrinthe de boutiques proposant des épices, des textiles, des artisanats et des souvenirs locaux. N\'hésitez pas à marchander pour obtenir les meilleurs prix.\n\n*   **Visite de la Place Jemaa el-Fna :**  Cette place emblématique est le cœur de la vie marocaine. Elle se transforme en une scène de spectacles nocturnes avec des conteurs, des musiciens, des charmeurs de serpents et des stands de nourriture.\n\n*   **Exploration du Palais Bahia :** Admirez l\'architecture magnifique de ce palais du XIXe siècle, un exemple remarquable de l\'art marocain. L\'intérieur est richement décoré de mosaïques, de stucs et de cours intérieure paisibles.\n\n*   **Promenade dans le Jardin Majorelle :** Ce jardin luxuriant, créé par le peintre Jacques Majorelle et rénové par Yves Saint Laurent, est un havre de paix avec ses couleurs vives et ses plantes exotiques.\n\n*   **Excursion dans les montagnes de l\'Atlas :**  Profitez d\'une excursion d\'une journée vers les montagnes de l\'Atlas pour admirer les paysages magnifiques, visiter des villages traditionnels et découvrir la culture berbère.\n\n*   **Détente dans un hammam traditionnel :** Offrez-vous une expérience relaxante dans un hammam traditionnel, un lieu de purification où vous serez dépouillé, lavé et massé.\n\n*   **Découverte des Tombeaux Saadiens :** Explorez ce complexe de mausolées dibangun au XVIe siècle, témoignage de la puissance de la dynastie Saadienne.\n\nPour une planification plus détaillée, nous vous recommandons de consulter notre section dédiée aux circuits touristiques au Maroc. Vous y trouverez des itinéraires adaptés à différents budgets et intérêts.\n\nNous restons à votre disposition pour toute question complémentaire.\n\nCordialement,\n\nL\'équipe de Discover Morocco 2030.\n', '2025-12-31 08:13:00', '2025-12-31 08:13:00', '2025-12-31 08:13:00'),
(11, 36, 'Suggestion de planning : Casablanca & Marrakech (3/4 jours)', 'Cher Johny lqre3,\n\nNous vous remercions de votre intérêt pour la plateforme Discover Morocco 2030. Suite à votre demande concernant un planning de visite pour Casablanca et Marrakech, voici quelques suggestions pour vous aider à organiser votre séjour.\n\nPour Casablanca, nous vous recommandons de consacrer une journée à explorer la Ville Blanche. Vous pouvez commencer par la découverte de la Mosquée Hassan II, l\'une des plus grandes mosquées du monde, ainsi que d\'une promenade sur la Corniche. Une autre option est de visiter le quartier de Habous pour découvrir le marché traditionnel et l\'architecture coloniale.\n\nÀ Marrakech, voici une proposition pour un séjour de 3 jours et 4 jours :\n\n*   **Jour 1 :** Immersion dans les souks, visite de la Place Jemaa el-Fna et découverte du Palais Bahia.\n*   **Jour 2 :** Excursion dans le Jardin Majorelle et exploration de la médina.\n*   **Jour 3 :** Visite des Tombeaux Saadiens et découverte du quartier de Mellah.\n*   **Jour 4 :** Excursion dans les montagnes de l\'Atlas ou détente dans un hammam traditionnel.\n\nCes suggestions ne sont qu’une base, et vous encourageons à consulter notre section dédiée aux circuits touristiques au Maroc pour plus de détails et d\'options personnalisées. Vous y trouverez des itinéraires adaptés à différents budgets et intérêts.\n\nN\'hésitez pas à revenir vers nous si vous avez d\'autres questions.\n\nCordialement,\n\nL\'équipe de Discover Morocco 2030.', '2025-12-31 08:17:27', '2025-12-31 08:17:27', '2025-12-31 08:17:27'),
(12, 37, 'Planning de 5 jours à Casablanca : activités et suggestions.', 'Chère Raja,\n\nNous vous remercions de votre intérêt pour la plateforme Discover Morocco 2030. En réponse à votre demande concernant un planning de 5 jours et des activités à réaliser à Casablanca, voici une proposition détaillée :\n\n**Jour 1 : Découverte du centre historique**\n\n*   Visite de la Cathédrale Mohammed V, un magnifique exemple d’architecture Art Déco.\n*   Exploration de la Place Mohammed V, un lieu de rencontre animé.\n*   Promenade dans le quartier de Habous, connu pour ses boutiques artisanales et ses cafés.\n\n**Jour 2 : Exploration culturelle**\n\n*   Visite du Musée National de Casablanca, qui présente l’histoire et la culture du Maroc.\n*   Découverte du Quartier Français, avec ses bâtiments coloniaux emblématiques.\n*   Possibilité de visiter le Parc Habous, un espace vert agréable pour se détendre.\n\n**Jour 3 : Shopping et détente**\n\n*   Shopping dans les centres commerciaux modernes de Casablanca, comme Morocco Mall ou Atlantic City.\n*   Profitez d\'une promenade le long de la Corniche, la promenade maritime de Casablanca.\n*   Possibilité de savourer une gastronomie locale dans l\'un des nombreux restaurants de la ville.\n\n**Jour 4 : Excursion à Hassan II Mosque (si le temps le permet)**\n\n*   Visitez la Mosquée Hassan II, l\'une des plus grandes mosquées du monde. (Note : l\'accès peut être réglementé)\n*   Profitez de la vue panoramique sur l\'océan Atlantique depuis le minaret.\n\n**Jour 5 : Découverte des quartiers modernes**\n\n*   Exploration du quartier de Casablanca Business, le cœur économique de la ville.\n*   Visitez le Quartier de la Corniche, avec ses restaurants et ses bars.\n*   Possibilité de profiter d\'un dernier déjeuner marquant avant de partir.\n\nCe planning est une suggestion et peut être adapté à vos préférences. Vous trouverez également des informations complémentaires sur nos circuits touristiques au Maroc pour des itinéraires plus personnalisés.\n\nN\'hésitez pas à nous contacter si vous avez d\'autres questions ou si vous souhaitez discuter de vos besoins.\n\nCordialement,\n\nL\'équipe de Discover Morocco 2030.', '2025-12-31 08:21:40', '2025-12-31 08:21:40', '2025-12-31 08:21:40'),
(13, 38, 'Estimation coût voyage Maroc - 4 personnes - Budget 1000€', 'Chère Salma,\n\nNous vous remercions de votre message et de votre intérêt pour la plateforme Discover Morocco 2030. Suite à votre demande concernant un programme de voyage au Maroc avec votre équipe égyptienne et un budget de 1000 euros, nous comprenons que vous souhaitez connaître une estimation des coûts à prévoir.\n\nIl est important de noter que le budget alloué dépendra fortement de vos choix d\'hébergement, de transport et d\'activités. Cependant, voici une estimation indicative et une suggestion de programme pour vous aider à structurer vos coûts :\n\n**Hébergement (4 nuits) :**\n\n*   **Hôtel économique (2-3 étoiles) :** 20-40 euros par nuit = 80-160 euros. Nous pouvons vous proposer des hôtels dans différentes villes, comme Marrakech, Casablanca ou Fès.\n*   **Riad (plus authentique, mais potentiellement plus cher) :** 40-80 euros par nuit = 160-320 euros.\n\n**Transport :**\n\n*   **Transferts entre villes :** En bus, le coût peut être inférieur à 50 euros par personne pour un trajet de plusieurs heures. En voiture, prévoyez environ 80-120 euros pour un trajet de similaire longueur.\n*   **Transport local :** Les taxis et les transports en commun sont abordables (environ 5-15 euros par jour par personne).\n\n**Activités et visites :**\n\n*   **Visites guidées :** 15-30 euros par personne par visite.\n*   **Entrée aux monuments :**  Les prix varient selon le monument (environ 5-20 euros par personne).\n*   **Activités culturelles (musées, artisanat) :** 10-25 euros par personne.\n\n**Nourriture :**\n\n*   **Repas dans des restaurants locaux :** 15-30 euros par personne par jour.\n*   **Achats de produits locaux (épices, souvenirs) :**  Varie en fonction de vos préférences.\n\nÉtant donné votre budget de 1000 euros pour quatre personnes, il est conseillé de prévoir un budget quotidien d\'environ 250-300 euros, en tenant compte des coûts de transport et des activités.  Ceci est une estimation et peut être ajusté en fonction de vos choix spécifiques.\n\nNous pouvons vous aider à affiner ce programme en fonction de vos intérêts et de vos préférences.  Nous vous suggérons de consulter notre site web pour plus d\'informations sur les différentes villes et activités proposées au Maroc.\n\nN\'hésitez pas à nous contacter si vous avez des questions ou si vous souhaitez discuter plus en détail de votre projet.\n\nCordialement,\n\nL\'équipe de Discover Morocco 2030.', '2025-12-31 08:36:09', '2025-12-31 08:36:09', '2025-12-31 08:36:09'),
(14, 39, 'Partenariat possible : Promotion du Maroc - Discover Morocco 2030', 'Cher Faycal Lahri,\n\nNous vous remercions de votre message et de l’intérêt que vous portez à Discover Morocco 2030. Nous sommes vivement intéressés par l’élaboration d’un partenariat avec votre structure, notamment dans le secteur de la presse et des médias.\n\nDiscover Morocco 2030 a pour mission de promouvoir le Royaume du Maroc auprès d’un public international et de valoriser son patrimoine, sa culture et son potentiel touristique. Nous sommes convaincus qu’un partenariat avec votre organisation pourrait être bénéfique pour les deux parties, en permettant de toucher un lectorat plus large et de renforcer la visibilité du Maroc.\n\nPour mieux comprendre vos attentes et vos objectifs, nous vous invitons à nous exposer plus en détail les aspects de ce partenariat qui vous intéressent, ainsi que les avantages que vous envisagez d’en retirer. Nous sommes à votre disposition pour discuter de différentes modalités et explorer les synergies potentielles.\n\nN\'hésitez pas à nous contacter pour convenir d\'un entretien ou d\'une réunion de présentation. Nous restons à votre entière disposition pour toute question complémentaire.\n\nCordialement,\n\nL\'équipe de Discover Morocco 2030.', '2025-12-31 08:39:39', '2025-12-31 08:39:39', '2025-12-31 08:39:39');

-- --------------------------------------------------------

--
-- Structure de la table `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `gps_location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `destinations`
--

INSERT INTO `destinations` (`id`, `city_id`, `nom`, `description`, `label`, `titre`, `image`, `video`, `gps_location`, `created_at`, `updated_at`) VALUES
(11, 12, 'Tour Hassan', 'La Tour Hassan est un minaret inachevé datant du XIIᵉ siècle. Elle devait faire partie de la plus grande mosquée du monde à l\'époque almohade. Aujourd’hui, c’est un symbole historique majeur du Maroc.', 'Monument historique', 'Monument emblématique de Rabat', 'destinations/images/iGf9lZYCx6TfSNSfXIMPBhnWFqydN3vndZgwZe3j.webp', NULL, '34.0244, -6.8228', '2026-01-13 20:07:42', '2026-01-13 20:07:42'),
(12, 12, 'Médina de Rabat', 'La Médina de Rabat est la vieille ville où l’on trouve des ruelles étroites, des souks, des artisans et des petites boutiques. Elle reflète l’authenticité et l’héritage culturel de la capitale.', 'Quartier traditionnel', 'Cœur historique de la ville', 'destinations/images/eUvBJCzShAz9JjOpjNmWIR6R70DNC5ZunJaS1wT2.jpg', NULL, '34.0182, -6.8336', '2026-01-13 20:09:23', '2026-01-13 20:09:23'),
(13, 12, 'Théâtre Mohammed V', 'Le Théâtre Mohammed V est le plus grand théâtre de la capitale. Il accueille des concerts, des pièces et des spectacles variés, faisant de lui un lieu central de la vie artistique et culturelle de Rabat.', 'Théâtre / Centre culturel', 'Scène culturelle de Rabat', 'destinations/images/PT8qcqfVWbIlC0d8sz4bVGBh3bRAiQCybHZHEkkT.jpg', NULL, '34.0209, -6.8187', '2026-01-13 20:11:03', '2026-01-13 20:11:03'),
(14, 12, 'Musée Mohammed VI d’Art Moderne et Contemporain (MMVI)', 'Le MMVI est un musée consacré à l’art moderne et contemporain marocain et international. Il présente des œuvres variées dans un bâtiment élégant et moderne, symbole de l’ouverture culturelle de la capitale.', 'Musée d’art', 'Art moderne au cœur de Rabat', 'destinations/images/jnzhP7AiNtdofJlFNShG1DGPzSiZGQav34iNGrY7.webp', NULL, '34.0172, -6.8346', '2026-01-13 20:13:01', '2026-01-13 20:13:01');

-- --------------------------------------------------------

--
-- Structure de la table `destination_categories`
--

CREATE TABLE `destination_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `destination_categories`
--

INSERT INTO `destination_categories` (`id`, `destination_id`, `categorie`, `created_at`, `updated_at`) VALUES
(19, 11, 'touristique', '2026-01-13 20:07:42', '2026-01-13 20:07:42'),
(20, 11, 'historique', '2026-01-13 20:07:42', '2026-01-13 20:07:42'),
(21, 11, 'culturelle', '2026-01-13 20:07:42', '2026-01-13 20:07:42'),
(22, 12, 'touristique', '2026-01-13 20:09:23', '2026-01-13 20:09:23'),
(23, 12, 'historique', '2026-01-13 20:09:23', '2026-01-13 20:09:23'),
(24, 12, 'culturelle', '2026-01-13 20:09:23', '2026-01-13 20:09:23'),
(25, 13, 'historique', '2026-01-13 20:11:03', '2026-01-13 20:11:03'),
(26, 13, 'culturelle', '2026-01-13 20:11:03', '2026-01-13 20:11:03'),
(27, 14, 'culturelle', '2026-01-13 20:27:18', '2026-01-13 20:27:18');

-- --------------------------------------------------------

--
-- Structure de la table `destination_images`
--

CREATE TABLE `destination_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `destination_images`
--

INSERT INTO `destination_images` (`id`, `destination_id`, `image`, `caption`, `created_at`, `updated_at`) VALUES
(1, 11, 'destinations/gallery/gvhWYqGSA9C4fgCQ8J6My3zViCgBfnJAtW7cPwS6.webp', 'Tour Hassan - Gallery Image', '2026-01-13 20:07:42', '2026-01-13 20:07:42'),
(2, 12, 'destinations/gallery/YnuyYTUt8uG4X6hHBwyfByeShM4bsHZlM81S63jO.jpg', 'Médina de Rabat - Gallery Image', '2026-01-13 20:09:23', '2026-01-13 20:09:23'),
(3, 14, 'destinations/gallery/UAhsL7mhXJS27WcPk87L6mBCPS1m0v6BFzZyCUea.webp', 'Musée Mohammed VI d’Art Moderne et Contemporain (MMVI) - Gallery Image', '2026-01-13 20:27:18', '2026-01-13 20:27:18');

-- --------------------------------------------------------

--
-- Structure de la table `destination_paragraphs`
--

CREATE TABLE `destination_paragraphs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `destination_paragraphs`
--

INSERT INTO `destination_paragraphs` (`id`, `destination_id`, `titre`, `contenu`, `created_at`, `updated_at`) VALUES
(4, 11, 'Monument historique', 'La Tour Hassan est l’un des symboles les plus célèbres de Rabat et du Maroc. Construite au XIIᵉ siècle sous le règne du sultan Yacoub al-Mansour, elle devait servir de minaret à la plus grande mosquée du monde à l’époque almohade, mais le projet est resté inachevé suite à la mort du sultan. Malgré son état inachevé, la tour conserve toute sa grandeur avec ses 44 mètres de hauteur et ses colonnes imposantes qui témoignent du génie architectural de l’époque. Elle se situe sur une vaste esplanade entourée de jardins et de vestiges de la mosquée originale, offrant aux visiteurs un panorama historique et culturel unique. Aujourd’hui, la Tour Hassan est un lieu touristique incontournable et un symbole de l’identité de la capitale, mêlant histoire, architecture et patrimoine religieux.', '2026-01-13 20:14:43', '2026-01-13 20:25:25'),
(5, 12, 'Le cœur historique et culturel de la capitale', 'La Médina de Rabat est le quartier ancien qui reflète toute l’authenticité et la richesse culturelle de la ville. Ses ruelles étroites et sinueuses, bordées de maisons aux façades traditionnelles, abritent de nombreux souks où l’on vend tapis, poteries, bijoux, textiles et produits artisanaux typiques du Maroc. La Médina est un véritable labyrinthe vivant, où chaque coin de rue raconte une histoire et où l’on peut ressentir l’atmosphère authentique d’une ville marocaine historique. Les marchés colorés, les artisans au travail, les cafés traditionnels et les petites places animées offrent une immersion complète dans le quotidien des habitants et le patrimoine culturel de Rabat. C’est un lieu qui attire à la fois les touristes et les locaux, pour découvrir l’histoire et l’artisanat marocains.', '2026-01-13 20:15:54', '2026-01-13 20:15:54'),
(6, 13, 'Scène culturelle et artistique de Rabat Texte :', 'Le Théâtre Mohammed V est le principal centre culturel de la capitale et un lieu phare de la vie artistique marocaine. Inauguré dans un style moderne et élégant, il accueille chaque année une grande variété d’événements : concerts, pièces de théâtre, spectacles de danse, festivals et manifestations internationales. Le théâtre joue un rôle central dans la promotion des arts et de la culture au Maroc, offrant une plateforme aux artistes locaux et étrangers pour présenter leurs créations. Avec ses grandes salles équipées de technologies modernes et son architecture impressionnante, le Théâtre Mohammed V est à la fois un symbole de la modernité et un lieu de rassemblement culturel pour les habitants et les visiteurs, contribuant à enrichir la vie culturelle de Rabat.', '2026-01-13 20:25:50', '2026-01-13 20:25:50'),
(7, 14, 'L’art moderne au cœur de Rabat', 'Le Musée Mohammed VI d’Art Moderne et Contemporain, ou MMVI, est le premier musée public marocain entièrement consacré à l’art moderne et contemporain. Situé dans un bâtiment moderne et élégant, il présente une collection riche et diversifiée d’œuvres marocaines et internationales, incluant la peinture, la sculpture, la photographie et les arts numériques. Le musée est conçu pour être à la fois un espace d’exposition et un centre culturel interactif, organisant régulièrement des conférences, des ateliers et des événements pour le public de tous âges. Il symbolise l’ouverture culturelle de Rabat et offre aux visiteurs un lieu de découverte artistique où l’histoire, la modernité et la créativité se rencontrent. Le MMVI est ainsi devenu un point de référence majeur pour l’art contemporain au Maroc et attire chaque année des milliers d’amateurs d’art et de touristes.', '2026-01-13 20:26:11', '2026-01-13 20:26:11');

-- --------------------------------------------------------

--
-- Structure de la table `destination_videos`
--

CREATE TABLE `destination_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `video` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `faqs`
--

INSERT INTO `faqs` (`id`, `category`, `question`, `answer`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 'General Info', 'Where is Morocco located?', 'Morocco is located in North Africa, bordered by the Atlantic Ocean and the Mediterranean Sea, with Spain just across the Strait of Gibraltar. It serves as a cultural bridge between Africa, Europe, and the Arab world.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(5, 'General Info', 'What languages are spoken in Morocco?', 'Arabic and Amazigh (Berber) are the official languages. French is widely used in business and administration, while English is increasingly common in tourism areas by 2030.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(6, 'General Info', 'What is the best time to visit Morocco?', 'The best time to visit Morocco is during spring (March–May) and autumn (September–November), when temperatures are mild and ideal for sightseeing.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(7, 'General Info', 'Is Morocco a good destination for first-time travelers?', 'Yes, Morocco is considered very welcoming for first-time travelers, with modern infrastructure, clear signage in tourist areas, and a strong culture of hospitality.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(8, 'General Info', 'What time zone does Morocco use?', 'Morocco generally follows GMT+1, with adjustments during Ramadan when the clock may temporarily change.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(9, 'General Info', 'How long should I plan to stay in Morocco?', 'A typical trip lasts 7 to 14 days, allowing visitors to explore imperial cities, coastal towns, and natural landscapes.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(10, 'General Info', 'Is Morocco suitable for family travel?', 'Yes, Morocco is family-friendly, offering resorts, cultural experiences, and safe public spaces suitable for children.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(11, 'General Info', 'What kind of climate does Morocco have?', 'Morocco has a diverse climate: Mediterranean on the coast, continental inland, and desert conditions in the south.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(12, 'General Info', 'Do I need a guide to visit Morocco?', 'A guide is not mandatory, but hiring a licensed local guide can greatly enrich your experience, especially in historic medinas.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(13, 'General Info', 'Is Morocco environmentally conscious for tourism?', 'By 2030, Morocco has invested heavily in sustainable tourism, renewable energy, and eco-friendly accommodations.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(14, 'Visa & Entry', 'Do tourists need a visa to enter Morocco?', 'Many nationalities, including EU, UK, USA, Canada, and Australia, can enter Morocco visa-free for stays up to 90 days.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(15, 'Visa & Entry', 'Is my passport required to enter Morocco?', 'Yes, a valid passport is required and must be valid for at least six months from your date of entry.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(16, 'Visa & Entry', 'Can I extend my stay beyond 90 days?', 'Yes, extensions can be requested at local police offices, but approval is not guaranteed.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(17, 'Visa & Entry', 'Are e-visas available for Morocco?', 'By 2030, Morocco offers an official e-visa system for eligible nationalities, simplifying the application process.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(18, 'Visa & Entry', 'Do I need a return ticket to enter Morocco?', 'Immigration officers may request proof of onward or return travel, especially for visa-free visitors.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(19, 'Visa & Entry', 'Are there customs restrictions when entering Morocco?', 'Yes, there are limits on alcohol, tobacco, and currency. Drones and certain electronics require special authorization.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(20, 'Visa & Entry', 'Can I enter Morocco multiple times on a tourist stay?', 'Yes, multiple entries are allowed as long as the total stay does not exceed the permitted duration.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(21, 'Visa & Entry', 'Is travel insurance required for entry?', 'Travel insurance is not mandatory but is strongly recommended for medical care and emergencies.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(22, 'Visa & Entry', 'What happens if I overstay my visa?', 'Overstaying can result in fines, delays, or entry bans. Always regularize your status before departure.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(23, 'Visa & Entry', 'Are border procedures efficient in Morocco?', 'Yes, major airports and ports use modern systems, making entry procedures generally smooth and efficient.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(24, 'Transport', 'Is public transport reliable in Morocco?', 'Yes, Morocco offers reliable public transport including trains, buses, trams, and taxis in major cities.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(25, 'Transport', 'What is the TGV Al Boraq?', 'Al Boraq is Morocco’s high-speed train connecting major cities like Tangier, Rabat, and Casablanca quickly and comfortably.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(26, 'Transport', 'Are domestic flights common in Morocco?', 'Yes, domestic flights connect distant cities such as Casablanca, Marrakech, Agadir, and Dakhla.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(27, 'Transport', 'Can tourists rent cars in Morocco?', 'Yes, car rental is widely available, and roads are modern and well-maintained by 2030.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(28, 'Transport', 'Are taxis safe in Morocco?', 'Taxis are generally safe. Petit taxis operate within cities, while grand taxis are used for longer distances.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(29, 'Transport', 'Do cities have tram or metro systems?', 'Several cities, including Rabat, Casablanca, and Marrakech, operate modern tramway systems.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(30, 'Transport', 'Is ride-hailing available in Morocco?', 'By 2030, regulated ride-hailing services operate in major cities alongside traditional taxis.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(31, 'Transport', 'Can I travel by train across Morocco?', 'Yes, the national rail network connects most major cities efficiently and affordably.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(32, 'Transport', 'Are buses a good option for long distances?', 'Yes, modern bus companies offer comfortable and affordable intercity travel.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(33, 'Transport', 'Is transportation accessible for people with disabilities?', 'Major transport hubs and newer vehicles increasingly offer accessibility features.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(34, 'Safety & Health', 'Is Morocco safe for tourists?', 'Yes, Morocco is considered one of the safest countries in the region, with a strong tourist police presence.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(35, 'Safety & Health', 'Are emergency services available?', 'Yes, Morocco has emergency numbers for police, ambulance, and fire services nationwide.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(36, 'Safety & Health', 'Do I need vaccinations to visit Morocco?', 'No special vaccinations are required, but routine travel vaccines are recommended.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(37, 'Safety & Health', 'Is tap water safe to drink?', 'In major cities tap water is treated, but visitors often prefer bottled water.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(38, 'Safety & Health', 'Are hospitals modern in Morocco?', 'Major cities have modern hospitals and private clinics meeting international standards.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(39, 'Safety & Health', 'What should I do in case of illness?', 'Visit a pharmacy or private clinic; pharmacists are well-trained and accessible.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(40, 'Safety & Health', 'Is food hygiene reliable?', 'Restaurants in tourist areas follow strict hygiene standards, especially by 2030.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(41, 'Safety & Health', 'Are natural disasters common?', 'Morocco has low risk of natural disasters, with occasional heatwaves or minor earthquakes.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(42, 'Safety & Health', 'Is travel insurance important?', 'Yes, travel insurance is highly recommended for health care and unexpected events.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(43, 'Safety & Health', 'Are solo travelers safe in Morocco?', 'Yes, solo travelers are common and generally feel safe, especially in tourist-friendly areas.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(44, 'Culture & Etiquette', 'What is the main religion in Morocco?', 'Islam is the main religion, and visitors are expected to respect local customs and traditions.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(45, 'Culture & Etiquette', 'How should tourists dress in Morocco?', 'Modest dress is recommended, especially in rural areas and religious sites.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(46, 'Culture & Etiquette', 'Is Morocco culturally conservative?', 'Morocco balances tradition and modernity, with openness in cities and more conservatism in rural areas.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(47, 'Culture & Etiquette', 'Is it polite to tip in Morocco?', 'Yes, tipping is appreciated in restaurants, hotels, and for guides.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(48, 'Culture & Etiquette', 'Can tourists take photos freely?', 'Photography is generally allowed, but always ask before photographing people.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(49, 'Culture & Etiquette', 'Are public displays of affection acceptable?', 'Public displays of affection should be minimal, especially outside tourist areas.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(50, 'Culture & Etiquette', 'How important is hospitality in Morocco?', 'Hospitality is a core value, and guests are often warmly welcomed.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(51, 'Culture & Etiquette', 'Should I bargain in markets?', 'Yes, bargaining is common and part of the cultural experience in traditional souks.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(52, 'Culture & Etiquette', 'Is Friday a special day in Morocco?', 'Yes, Friday is the main prayer day, and some businesses may close midday.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(53, 'Culture & Etiquette', 'Can non-Muslims enter mosques?', 'Most mosques are reserved for Muslims, except for a few historic sites open to visitors.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(54, 'Money & Costs', 'What currency is used in Morocco?', 'The Moroccan Dirham (MAD) is the official currency and is used nationwide.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(55, 'Money & Costs', 'Can I use credit cards in Morocco?', 'Credit cards are widely accepted in hotels, restaurants, and large shops.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(56, 'Money & Costs', 'Are ATMs easy to find?', 'Yes, ATMs are widely available in cities and tourist areas.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(57, 'Money & Costs', 'Is Morocco an affordable destination?', 'Yes, Morocco offers good value for money compared to many international destinations.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(58, 'Money & Costs', 'How much should I budget per day?', 'A mid-range traveler can budget between 60 and 120 EUR per day, depending on activities.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(59, 'Money & Costs', 'Is tipping mandatory?', 'Tipping is not mandatory but is customary and appreciated.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(60, 'Money & Costs', 'Can I exchange money easily?', 'Yes, currency exchange offices and banks are common in major cities.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(61, 'Money & Costs', 'Are prices fixed in shops?', 'Prices are fixed in malls and supermarkets, but negotiable in traditional markets.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(62, 'Money & Costs', 'Is digital payment common?', 'By 2030, mobile and contactless payments are increasingly common.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(63, 'Money & Costs', 'Should I carry cash?', 'Yes, carrying some cash is useful, especially in small towns and markets.', 1, '2025-12-15 21:50:42', '2025-12-15 21:50:42'),
(64, 'Accommodation', 'What types of accommodation are available in Morocco?', 'Options include luxury hotels, riads, guesthouses, eco-lodges, and budget hostels.', 1, '2025-12-15 21:50:43', '2025-12-15 21:50:43'),
(65, 'Accommodation', 'What is a riad?', 'A riad is a traditional Moroccan house or palace with an interior garden or courtyard.', 1, '2025-12-15 21:50:43', '2025-12-15 21:50:43'),
(66, 'Accommodation', 'Are hotels modern in Morocco?', 'Yes, especially in major cities and resorts, hotels meet international standards.', 1, '2025-12-15 21:50:43', '2025-12-15 21:50:43'),
(67, 'Accommodation', 'Is accommodation safe for tourists?', 'Yes, licensed accommodations follow safety and hygiene regulations.', 1, '2025-12-15 21:50:43', '2025-12-15 21:50:43'),
(68, 'Accommodation', 'Do accommodations offer Wi-Fi?', 'Most hotels and riads offer free high-speed Wi-Fi by 2030.', 1, '2025-12-15 21:50:43', '2025-12-15 21:50:43'),
(69, 'Accommodation', 'Should I book accommodation in advance?', 'Booking in advance is recommended during peak seasons and festivals.', 1, '2025-12-15 21:50:43', '2025-12-15 21:50:43'),
(70, 'Accommodation', 'Are eco-friendly hotels available?', 'Yes, Morocco has expanded eco-lodges and sustainable hotels nationwide.', 1, '2025-12-15 21:50:43', '2025-12-15 21:50:43'),
(71, 'Accommodation', 'Is accommodation expensive in Morocco?', 'Prices vary, but Morocco offers options for all budgets.', 1, '2025-12-15 21:50:43', '2025-12-15 21:50:43'),
(73, 'Accommodation', 'Are accommodations accessible for people with disabilities?', 'Newer hotels increasingly provide accessible rooms and facilities.', 1, '2025-12-15 21:50:43', '2025-12-15 21:50:43');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mediable_type` varchar(255) NOT NULL,
  `mediable_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `mediable_type`, `mediable_id`, `file_path`, `file_type`, `mime_type`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\City', 7, 'media/a6TfjljodYcg1govEvHU5FTYjf7OBe63cP867Kjx.png', 'image', NULL, '2025-12-07 19:51:34', '2025-12-07 19:51:34'),
(3, 'App\\Models\\City', 7, 'media/hk2DkPAGTZP1lJ5eJdisg0A3GC8N6Qy1ptRrbE6J.mp4', 'video', NULL, '2025-12-07 20:01:46', '2025-12-07 20:01:46'),
(5, 'App\\Models\\Destination', 4, 'media/9b7Yemlvu33hJttFdX5G7QQY0o3AclYjxBEjUTIl.png', 'image', NULL, '2025-12-07 22:28:52', '2025-12-07 22:28:52'),
(7, 'App\\Models\\Destination', 4, 'media/Zb3UQCyE1omDVdm0ZQCSgUW1UtteiWvYyNxdyEi3.webp', 'image', NULL, '2025-12-09 21:41:06', '2025-12-09 21:41:06'),
(8, 'App\\Models\\Destination', 7, 'media/i9ZpZLStfd1PIyRHPiKy0qbRAwReyNK3yCQoDkIl.png', 'image', NULL, '2025-12-10 15:37:02', '2025-12-10 15:37:02'),
(9, 'App\\Models\\Destination', 6, 'media/chvmSImGyPUf1QmSTCwiwKAxTGTvRWx6MhpZlqfN.mp4', 'video', NULL, '2025-12-10 15:37:44', '2025-12-10 15:37:44'),
(10, 'App\\Models\\Destination', 4, 'media/XtlYuq8riXLVVkHWWZeFinlSiY7R53XJqEerOZuo.jpg', 'image', NULL, '2025-12-11 09:09:21', '2025-12-11 09:09:21'),
(13, 'App\\Models\\City', 12, 'media/epDwvb6AGs4DTvJ0b72H54YFvTZtLhWfZ0ZyNyFM.mp4', 'video', NULL, '2026-01-13 20:03:39', '2026-01-13 20:03:39'),
(14, 'App\\Models\\Destination', 14, 'media/TZG3hR8ICtFPvpBJ3g6XoP0AaRnc8A4sSua9E11k.webp', 'image', NULL, '2026-01-13 20:28:01', '2026-01-13 20:28:01'),
(15, 'App\\Models\\Destination', 13, 'media/TlP0nZPjBTl6C90nVyMFCEw4n9tsScRJ4dogyFk7.jpg', 'image', NULL, '2026-01-13 20:29:03', '2026-01-13 20:29:03'),
(16, 'App\\Models\\Destination', 12, 'media/WuDyc0d2jyYQRWT4oZPYBrxEZatV4AqDoWO3Ari3.jpg', 'image', NULL, '2026-01-13 20:30:00', '2026-01-13 20:30:00'),
(17, 'App\\Models\\Destination', 11, 'media/zAZm4UXckYo9AoIJJVds15kdCpInuZzIihWlcaoJ.jpg', 'image', NULL, '2026-01-13 20:30:52', '2026-01-13 20:30:52'),
(18, 'App\\Models\\Destination', 11, 'media/mWo8X9qCFH49SUYdQSYirJjmzGhw1WNj4bsFnh3W.avif', 'image', NULL, '2026-01-13 21:47:50', '2026-01-13 21:47:50'),
(19, 'App\\Models\\Destination', 12, 'media/nMf73PSreHzOMlAL8ZkNBT6ZPPT5Qa6a9HgU28IW.jpg', 'image', NULL, '2026-01-13 21:48:33', '2026-01-13 21:48:33'),
(20, 'App\\Models\\Destination', 12, 'media/ffebbat8JcA7mpeHuJRe0WEPEEzWt1hNmGE9h5G8.webp', 'image', NULL, '2026-01-13 21:49:06', '2026-01-13 21:49:06');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2025_11_19_124836_create_contacts_table', 1),
(6, '2025_11_19_124843_create_newsletter_table', 1),
(25, '2014_10_12_000000_create_users_table', 2),
(26, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(27, '2019_08_19_000000_create_failed_jobs_table', 2),
(28, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(29, '2025_12_06_085925_create_contacts_table', 2),
(30, '2025_12_06_085925_create_newsletters_table', 2),
(31, '2025_12_06_085928_create_volontaires_table', 2),
(32, '2025_12_06_085935_create_commentaires_table', 2),
(33, '2025_12_06_090817_create_cities_table', 2),
(34, '2025_12_06_090817_create_city_images_table', 2),
(35, '2025_12_06_090818_create_city_categories_table', 2),
(36, '2025_12_06_090818_create_city_paragraphs_table', 2),
(37, '2025_12_06_090818_create_city_videos_table', 2),
(38, '2025_12_06_091401_create_destinations_table', 2),
(39, '2025_12_06_091843_create_destination_categories_table', 2),
(40, '2025_12_06_091916_create_destination_images_table', 2),
(41, '2025_12_06_091941_create_destination_videos_table', 2),
(42, '2025_12_06_092009_create_destination_paragraphs_table', 2),
(43, '2025_12_07_192055_create_activities_table', 3),
(44, '2025_12_07_192111_create_media_table', 3),
(45, '2025_12_07_212241_modify_categorie_column_in_destination_categories_table', 4),
(46, '2025_12_15_140854_create_faqs_table', 5),
(47, '2025_12_19_113614_add_coordinates_to_cities_table', 6),
(48, '2025_12_20_202501_modify_statut_in_contacts_table', 7),
(49, '2025_12_21_174019_create_contact_responses_table', 8);

-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'test1@example.com', '2025-12-07 22:29:25', '2025-12-07 22:29:25'),
(5, 'alex.johnson@mail.com', '2025-12-09 08:39:48', '2025-12-09 08:39:48'),
(6, 'sara.lopez@hotmail.com', '2025-12-09 08:39:48', '2025-12-09 08:39:48'),
(8, 'mohammed.ait@gmail.com', '2025-12-09 08:39:48', '2025-12-09 08:39:48'),
(10, 'faycallahri12@gmail.com', '2025-12-12 19:49:18', '2025-12-12 19:49:18'),
(11, 'faycallahri999@gmail.com', '2025-12-12 19:49:46', '2025-12-12 19:49:46'),
(15, 'salma.benchekroun@example.com', '2025-12-13 22:10:24', '2025-12-13 22:10:24'),
(16, 'zmla@gmfabyjnkdrk.com', '2025-12-14 13:09:33', '2025-12-14 13:09:33'),
(17, 'faycallahri999@host.com', '2025-12-14 13:15:07', '2025-12-14 13:15:07'),
(18, 'lmjjinomi@gmail.com', '2025-12-14 18:31:42', '2025-12-14 18:31:42');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `volontaires`
--

CREATE TABLE `volontaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `identite` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville_volontariat` varchar(255) NOT NULL,
  `langues` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`langues`)),
  `niveau_etudes` varchar(255) NOT NULL,
  `competences` text DEFAULT NULL,
  `disponibilite` varchar(255) NOT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `volontaires`
--

INSERT INTO `volontaires` (`id`, `nom`, `prenom`, `date_naissance`, `identite`, `email`, `telephone`, `pays`, `ville`, `adresse`, `ville_volontariat`, `langues`, `niveau_etudes`, `competences`, `disponibilite`, `cv`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Hassan', 'Ouali', '1998-05-12', 'AB123456', 'hassan@example.com', '0611223344', 'Maroc', 'Casablanca', 'Rue Al Qods', 'Rabat', '[\"Français\", \"Arabe\"]', 'Licence', 'Informatique, communication', 'Weekend', 'hassan_cv.pdf', NULL, '2025-12-07 22:33:23', NULL),
(2, 'Nadia', 'Souiri', '2000-09-22', 'XY987654', 'nadia@example.com', '0677889900', 'Maroc', 'Marrakech', NULL, 'Casablanca', '[\"Anglais\", \"Arabe\"]', 'Master', 'Gestion de projet', 'Toute la semaine', 'hassan_cv.pdf', NULL, '2025-12-07 22:33:23', NULL),
(3, 'Faycal', 'Lahri', '2003-06-05', 'BE928319', 'faycal.lahri@etud.iga.ac.ma', '0612665926', 'Morocco', 'Casablanca', '70 rue nizar el abidi', 'Casablanca', '[\"Arabic\",\"French\",\"English\"]', 'High School', 'N/A', 'Part Time', 'volunteers/cv/aMMCMmOy3iPIE5nb0OvWDPccI6rNlRuiGodV4T1t.docx', 'volunteers/photos/JPXnfT17JsODmDi7WzQtmbvtwtwv7CcFQ3xhjYoT.jpg', '2025-12-12 09:48:06', '2025-12-12 09:48:06'),
(5, 'Rabat', 'Lahri', '2025-12-08', 'BE928319', 'faycallahri12@gmail.com', '0612665926', 'Morocco', 'Casablanca', '3gfy34g5y', 'Marrakech', '[\"Arabic\",\"French\"]', 'Bachelor\'s Degree', 'N/A', 'Part Time', 'volunteers/cv/Jf3cGA4iXhseeZBNyWsovaXr7oJwOtA5piXJuU4m.pdf', 'volunteers/photos/G15BKFjEk3UrxGlv2LWLhTXVHVn0Ols12FMgZvo2.jpg', '2025-12-15 10:54:29', '2025-12-15 10:54:29'),
(6, 'awane', 'amine', '2025-12-01', 'BE928319', 'faycallahri12@gmail.com', '0612665926', 'Morocco', 'Casablanca', 'aerqrjnhgaenbj 2 rgvwer', 'Agadir', '[\"Arabic\",\"French\",\"English\",\"Spanish\"]', 'PhD', 'N/A', 'Weekends Only', 'volunteers/cv/9BRS3gf3wuhdLeECFyVu4UAwi1xBW5w4igfESyFi.pdf', 'volunteers/photos/CcYsyIzk14zt4ZTGBvtwBS72qPrFiEknCjNfvQhl.jpg', '2025-12-20 16:48:17', '2025-12-20 16:48:17');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_subject_type_subject_id_index` (`subject_type`,`subject_id`);

--
-- Index pour la table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `city_categories`
--
ALTER TABLE `city_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_categories_city_id_foreign` (`city_id`);

--
-- Index pour la table `city_images`
--
ALTER TABLE `city_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_images_city_id_foreign` (`city_id`);

--
-- Index pour la table `city_paragraphs`
--
ALTER TABLE `city_paragraphs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_paragraphs_city_id_foreign` (`city_id`);

--
-- Index pour la table `city_videos`
--
ALTER TABLE `city_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_videos_city_id_foreign` (`city_id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact_responses`
--
ALTER TABLE `contact_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_responses_contact_id_foreign` (`contact_id`);

--
-- Index pour la table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destinations_city_id_foreign` (`city_id`);

--
-- Index pour la table `destination_categories`
--
ALTER TABLE `destination_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_categories_destination_id_foreign` (`destination_id`);

--
-- Index pour la table `destination_images`
--
ALTER TABLE `destination_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_images_destination_id_foreign` (`destination_id`);

--
-- Index pour la table `destination_paragraphs`
--
ALTER TABLE `destination_paragraphs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_paragraphs_destination_id_foreign` (`destination_id`);

--
-- Index pour la table `destination_videos`
--
ALTER TABLE `destination_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_videos_destination_id_foreign` (`destination_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_mediable_type_mediable_id_index` (`mediable_type`,`mediable_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `volontaires`
--
ALTER TABLE `volontaires`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT pour la table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `city_categories`
--
ALTER TABLE `city_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT pour la table `city_images`
--
ALTER TABLE `city_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `city_paragraphs`
--
ALTER TABLE `city_paragraphs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `city_videos`
--
ALTER TABLE `city_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `contact_responses`
--
ALTER TABLE `contact_responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `destination_categories`
--
ALTER TABLE `destination_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `destination_images`
--
ALTER TABLE `destination_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `destination_paragraphs`
--
ALTER TABLE `destination_paragraphs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `destination_videos`
--
ALTER TABLE `destination_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `volontaires`
--
ALTER TABLE `volontaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `city_categories`
--
ALTER TABLE `city_categories`
  ADD CONSTRAINT `city_categories_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `city_images`
--
ALTER TABLE `city_images`
  ADD CONSTRAINT `city_images_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `city_paragraphs`
--
ALTER TABLE `city_paragraphs`
  ADD CONSTRAINT `city_paragraphs_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `city_videos`
--
ALTER TABLE `city_videos`
  ADD CONSTRAINT `city_videos_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `contact_responses`
--
ALTER TABLE `contact_responses`
  ADD CONSTRAINT `contact_responses_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `destinations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `destination_categories`
--
ALTER TABLE `destination_categories`
  ADD CONSTRAINT `destination_categories_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `destination_images`
--
ALTER TABLE `destination_images`
  ADD CONSTRAINT `destination_images_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `destination_paragraphs`
--
ALTER TABLE `destination_paragraphs`
  ADD CONSTRAINT `destination_paragraphs_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `destination_videos`
--
ALTER TABLE `destination_videos`
  ADD CONSTRAINT `destination_videos_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
