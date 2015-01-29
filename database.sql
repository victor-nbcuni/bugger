-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2015 at 11:18 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

--SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";--
--SET time_zone = "+00:00";--

--
-- Database: `bugger`
--
--CREATE DATABASE IF NOT EXISTS `bugger` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;--
--USE `bugger`;--

-- --------------------------------------------------------

--
-- Table structure for table `api_users`
--

CREATE TABLE `api_users` (
`id` int(10) unsigned NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `api_users`
--

INSERT INTO `api_users` (`id`, `api_key`, `is_active`) VALUES
(1, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `group_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `issue_comments`
--

CREATE TABLE `issue_comments` (
`id` int(11) unsigned NOT NULL,
  `issue_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `can_edit` tinyint(1) NOT NULL DEFAULT '1',
  `archived` tinyint(1) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_comments`
--

INSERT INTO `issue_comments` (`id`, `issue_id`, `user_id`, `comment`, `can_edit`, `archived`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Changed status of "Open" to "In Progress"', 0, 0, '2015-01-20 15:55:11', '2015-01-20 15:55:11'),
(2, 1, 1, 'Working on it....', 1, 0, '2015-01-20 15:55:18', '2015-01-20 15:55:18'),
(3, 1, 1, 'Changed status of "In Progress" to "Ready For Testing"', 0, 0, '2015-01-20 16:07:26', '2015-01-20 16:07:26'),
(4, 1, 1, 'Changed status to "Closed"', 0, 0, '2015-01-20 17:23:54', '2015-01-20 17:23:54'),
(5, 1, 1, 'Changed status to "Reopened"', 0, 0, '2015-01-20 17:24:15', '2015-01-20 17:24:15'),
(6, 1, 1, 'Changed priority to "Urgent"', 0, 0, '2015-01-20 17:24:22', '2015-01-20 17:24:22'),
(7, 1, 1, 'Changed type to "New Feature"', 0, 0, '2015-01-20 17:24:29', '2015-01-20 17:24:29'),
(8, 1, 1, 'Changed priority to "Medium"', 0, 0, '2015-01-20 17:25:35', '2015-01-20 17:25:35'),
(9, 1, 1, 'HELLO', 1, 0, '2015-01-20 17:25:47', '2015-01-20 17:25:47'),
(10, 1, 1, 'test', 1, 0, '2015-01-20 17:26:55', '2015-01-20 17:26:55'),
(11, 1, 1, 'Changed status to "Resolved"', 0, 0, '2015-01-20 17:40:48', '2015-01-20 17:40:48'),
(12, 1, 1, 'ANOTHER TEST', 1, 0, '2015-01-20 17:40:58', '2015-01-20 17:40:58'),
(13, 3, 1, 'I''m on it.......!!!!!', 1, 0, '2015-01-21 10:41:55', '2015-01-21 10:46:45'),
(14, 3, 1, 'Changed status to "Closed"', 0, 0, '2015-01-21 10:42:03', '2015-01-21 10:42:03'),
(15, 2, 1, 'Changed status to "Resolved"', 0, 0, '2015-01-21 15:56:41', '2015-01-21 15:56:41'),
(16, 2, 1, 'Changed status to "Closed"', 0, 0, '2015-01-22 09:42:45', '2015-01-22 09:42:45'),
(17, 4, 1, 'hello', 1, 0, '2015-01-22 16:28:51', '2015-01-22 16:28:51'),
(18, 4, 1, 'hello', 1, 0, '2015-01-22 16:30:00', '2015-01-22 16:30:00'),
(19, 4, 1, 'Changed priority to "Urgent"', 0, 0, '2015-01-23 09:32:21', '2015-01-23 09:32:21'),
(20, 4, 1, 'Changed priority to "High"', 0, 0, '2015-01-23 09:32:52', '2015-01-23 09:32:52'),
(21, 4, 1, 'Changed type to "Support Request"', 0, 0, '2015-01-23 09:32:58', '2015-01-23 09:32:58'),
(22, 4, 1, 'asdsd', 1, 1, '2015-01-26 11:13:57', '2015-01-26 14:21:34'),
(23, 4, 1, 'ddd', 1, 1, '2015-01-26 11:14:38', '2015-01-26 14:20:42'),
(24, 4, 1, 'xxx', 1, 1, '2015-01-26 11:22:42', '2015-01-26 14:19:23'),
(25, 4, 1, 'sdfsdf', 1, 1, '2015-01-26 11:23:19', '2015-01-26 14:19:04'),
(26, 4, 1, 'SSS', 1, 1, '2015-01-26 11:40:10', '2015-01-26 14:18:59'),
(27, 4, 1, 'XXxxx1111', 1, 1, '2015-01-26 11:40:20', '2015-01-26 14:22:03'),
(28, 4, 1, 'Changed priority to "Urgent"', 0, 0, '2015-01-26 13:16:28', '2015-01-26 13:16:28'),
(29, 4, 1, 'Changed type to "Defect"', 0, 0, '2015-01-26 13:18:34', '2015-01-26 13:18:34'),
(30, 4, 1, 'r', 1, 1, '2015-01-26 14:14:10', '2015-01-26 14:24:18'),
(31, 4, 1, 'eeref', 1, 1, '2015-01-26 14:24:37', '2015-01-26 14:28:24'),
(32, 4, 1, 'test', 1, 1, '2015-01-26 14:28:19', '2015-01-26 14:29:57'),
(33, 4, 1, 'WEWErdfdf', 1, 1, '2015-01-26 14:30:00', '2015-01-26 20:33:17'),
(34, 4, 1, 'SDSD', 1, 1, '2015-01-26 14:30:01', '2015-01-26 16:06:23'),
(35, 4, 1, 'XXX', 1, 1, '2015-01-26 14:30:03', '2015-01-26 16:06:18'),
(36, 4, 1, '34zzz', 1, 1, '2015-01-26 16:06:32', '2015-01-26 20:33:12'),
(37, 4, 1, 'Changed status to "Closed"', 0, 0, '2015-01-26 16:06:46', '2015-01-26 16:06:46'),
(38, 4, 1, 'Changed type to "New Feature"', 0, 0, '2015-01-26 16:07:06', '2015-01-26 16:07:06'),
(39, 4, 1, 'Changed type to "Defect"', 0, 0, '2015-01-26 16:07:14', '2015-01-26 16:07:14'),
(40, 7, 1, 'Changed type to "Support Request"', 0, 0, '2015-01-26 20:34:19', '2015-01-26 20:34:19'),
(41, 5, 1, 'Changed priority to "High"', 0, 0, '2015-01-26 21:43:35', '2015-01-26 21:43:35'),
(42, 5, 1, '1', 1, 0, '2015-01-26 21:43:40', '2015-01-26 21:43:40'),
(43, 5, 1, '2', 1, 0, '2015-01-26 21:43:44', '2015-01-26 21:43:44'),
(44, 5, 1, '3', 1, 0, '2015-01-26 21:45:20', '2015-01-26 21:45:20'),
(45, 5, 1, '4', 1, 0, '2015-01-26 21:45:21', '2015-01-26 21:45:21'),
(46, 5, 1, '5', 1, 0, '2015-01-26 21:45:22', '2015-01-26 21:45:22'),
(47, 5, 1, '6', 1, 0, '2015-01-26 21:45:24', '2015-01-26 21:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `issue_files`
--

CREATE TABLE `issue_files` (
`id` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_files`
--

INSERT INTO `issue_files` (`id`, `filename`, `issue_id`, `user_id`, `created_at`) VALUES
(9, 'Screen Shot 2014-12-17 at 5.39.05 PM.png', 5, 1, '2015-01-26 16:08:37'),
(14, 'Screen Shot 2014-12-17 at 5.39.05 PM.png', 6, 1, '2015-01-26 20:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `issue_priorities`
--

CREATE TABLE `issue_priorities` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_priorities`
--

INSERT INTO `issue_priorities` (`id`, `name`, `color`) VALUES
(1, 'Low', '#7E8B8C'),
(2, 'Medium', '#40A4D8'),
(3, 'High', '#F1731F'),
(4, 'Urgent', '#D71A21');

-- --------------------------------------------------------

--
-- Table structure for table `issue_statuses`
--

CREATE TABLE `issue_statuses` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_statuses`
--

INSERT INTO `issue_statuses` (`id`, `name`, `color`) VALUES
(1, 'Open', '#D71A21'),
(2, 'Reopened', '#DB617A'),
(3, 'In Progress', '#40A4D8'),
(4, 'Ready For Testing', '#985C8F'),
(5, 'Resolved', '#AED143'),
(6, 'Closed', '#61AE48'),
(7, 'On Hold', '#F1731F');

-- --------------------------------------------------------

--
-- Table structure for table `issue_types`
--

CREATE TABLE `issue_types` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_types`
--

INSERT INTO `issue_types` (`id`, `name`) VALUES
(1, 'Defect'),
(2, 'Improvement'),
(3, 'New Feature'),
(5, 'Support Request');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
`id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `priority_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `reporter_user_id` int(11) NOT NULL,
  `assigned_department_id` int(11) NOT NULL,
  `pms_id` int(11) DEFAULT NULL COMMENT 'Link to pms',
  `source_id` int(11) DEFAULT NULL COMMENT 'The Actual JIRA or Basecamp ID',
  `summary` varchar(128) NOT NULL,
  `description` longtext NOT NULL,
  `example_url` varchar(255) NOT NULL,
  `due_date` date DEFAULT NULL,
  `due_time` time DEFAULT NULL,
  `last_updated_by_user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pms`
--

CREATE TABLE `pms` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pms`
--

INSERT INTO `pms` (`id`, `name`) VALUES
(1, 'Jira'),
(2, 'Basecamp'),
(3, 'Lighthouse');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `created_at`) VALUES
(1, 'Telemundo', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Login privileges, granted after account confirmation'),
(2, 'admin', 'Administrative user, has access to everything.'),
(3, 'editor', 'Regular user, can view and create tickets.');

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE `user_tokens` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`id` int(11) unsigned NOT NULL,
  `department_id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `name` varchar(30) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `department_id`, `email`, `username`, `password`, `name`, `logins`, `last_login`) VALUES
(1, 1, 'root@localhost.com', 'admin', 'e76f11cf0a9e4909853ef06304a792540c7dafdbddf6d6d5080fcadde3ae99c8', '', 147, 1422483474);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_users`
--
ALTER TABLE `api_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_comments`
--
ALTER TABLE `issue_comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_files`
--
ALTER TABLE `issue_files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_priorities`
--
ALTER TABLE `issue_priorities`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_statuses`
--
ALTER TABLE `issue_statuses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_types`
--
ALTER TABLE `issue_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
 ADD PRIMARY KEY (`id`), ADD KEY `status_id` (`status_id`), ADD KEY `type_id` (`type_id`), ADD KEY `priority_id` (`priority_id`);

--
-- Indexes for table `pms`
--
ALTER TABLE `pms`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uniq_name` (`name`);

--
-- Indexes for table `roles_users`
--
ALTER TABLE `roles_users`
 ADD PRIMARY KEY (`user_id`,`role_id`), ADD KEY `fk_role_id` (`role_id`);

--
-- Indexes for table `user_tokens`
--
ALTER TABLE `user_tokens`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uniq_token` (`token`), ADD KEY `fk_user_id` (`user_id`), ADD KEY `expires` (`expires`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uniq_username` (`username`), ADD UNIQUE KEY `uniq_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_users`
--
ALTER TABLE `api_users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issue_comments`
--
ALTER TABLE `issue_comments`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `issue_files`
--
ALTER TABLE `issue_files`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `issue_priorities`
--
ALTER TABLE `issue_priorities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `issue_statuses`
--
ALTER TABLE `issue_statuses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `issue_types`
--
ALTER TABLE `issue_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pms`
--
ALTER TABLE `pms`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_tokens`
--
ALTER TABLE `user_tokens`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `roles_users`
--
ALTER TABLE `roles_users`
ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_tokens`
--
ALTER TABLE `user_tokens`
ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
