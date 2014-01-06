-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2014 at 11:58 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dev_env`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `pass_hash` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `user_guid` varchar(45) NOT NULL,
  `user_email_authenticated` varchar(45) DEFAULT NULL,
  `user_email_token` varchar(45) DEFAULT NULL,
  `user_email_token_expires` varchar(45) DEFAULT NULL,
  `user_registration` varchar(45) DEFAULT NULL,
  `user_newpass` varchar(45) DEFAULT NULL,
  `user_editcount` int(11) NOT NULL,
  `user_real_mn` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `first_name`, `pass_hash`, `email`, `user_guid`, `user_email_authenticated`, `user_email_token`, `user_email_token_expires`, `user_registration`, `user_newpass`, `user_editcount`, `user_real_mn`, `last_name`) VALUES
(1, 'prophetnite', 'prophet', 'mycoolpass', 'prophet@prophetnite.com', 'lakjshdflkjashfjklsh', NULL, NULL, NULL, NULL, NULL, 0, NULL, 'nite'),
(2, 'testuser2', 'bob', 'YUPHASHED', 'bob@localhost.com', 'jkhiuywiruyweriuyweriu', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'walkers');
