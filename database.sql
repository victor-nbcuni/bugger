-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2015 at 10:07 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bugger`
--
CREATE DATABASE IF NOT EXISTS `bugger` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bugger`;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `group_email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `group_email`) VALUES
(1, 'Dev', 'dev@nbcuni.com'),
(3, 'QA', ''),
(4, 'Video', 'dev@nbcuni.com');

-- --------------------------------------------------------

--
-- Table structure for table `issue_comments`
--

CREATE TABLE `issue_comments` (
`id` int(11) unsigned NOT NULL,
  `issue_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `issue_files`
--

CREATE TABLE `issue_files` (
`id` int(10) unsigned NOT NULL,
  `filename` varchar(30) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `issue_priorities`
--

CREATE TABLE `issue_priorities` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_priorities`
--

INSERT INTO `issue_priorities` (`id`, `name`) VALUES
(1, 'None'),
(2, 'Low'),
(3, 'Normal'),
(4, 'High'),
(5, 'Urgent'),
(6, 'Immediate');

-- --------------------------------------------------------

--
-- Table structure for table `issue_source_types`
--

CREATE TABLE `issue_source_types` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_source_types`
--

INSERT INTO `issue_source_types` (`id`, `name`) VALUES
(1, 'Jira'),
(2, 'Basecamp'),
(3, 'Lighthouse');

-- --------------------------------------------------------

--
-- Table structure for table `issue_statuses`
--

CREATE TABLE `issue_statuses` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_statuses`
--

INSERT INTO `issue_statuses` (`id`, `name`) VALUES
(1, 'Open'),
(2, 'In Progress'),
(3, 'Resolved'),
(4, 'Closed'),
(5, 'On Hold'),
(6, 'Ready For Testing'),
(7, 'Reopened');

-- --------------------------------------------------------

--
-- Table structure for table `issue_types`
--

CREATE TABLE `issue_types` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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
  `source_type_id` int(11) DEFAULT NULL COMMENT 'Link to issue_source_types',
  `source_id` int(11) DEFAULT NULL COMMENT 'The Actual JIRA or Basecamp ID',
  `summary` varchar(128) NOT NULL,
  `description` longtext NOT NULL,
  `example_url` varchar(255) NOT NULL,
  `due_date` date DEFAULT NULL,
  `due_time` time DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `created_at`) VALUES
(1, 'Telemundo', '0000-00-00 00:00:00'),
(2, 'Mun2', '0000-00-00 00:00:00');

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
(3, 'editor', 'Regular user, can report issues and submit requests.');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `department_id`, `email`, `username`, `password`, `name`, `logins`, `last_login`) VALUES
(1, 1, 'root@localhost', 'admin', 'e76f11cf0a9e4909853ef06304a792540c7dafdbddf6d6d5080fcadde3ae99c8', 'Administrator', 86, 1421252592);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `issue_source_types`
--
ALTER TABLE `issue_source_types`
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
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `issue_comments`
--
ALTER TABLE `issue_comments`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issue_files`
--
ALTER TABLE `issue_files`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issue_priorities`
--
ALTER TABLE `issue_priorities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `issue_source_types`
--
ALTER TABLE `issue_source_types`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `issue_statuses`
--
ALTER TABLE `issue_statuses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `issue_types`
--
ALTER TABLE `issue_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
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
