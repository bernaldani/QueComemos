-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-02-2014 a las 17:13:08
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.17

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `quecomemos_dev`
--
DROP DATABASE `quecomemos_dev`;
CREATE DATABASE `quecomemos_dev` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `quecomemos_dev`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a3m_account`
--

DROP TABLE IF EXISTS `a3m_account`;
CREATE TABLE IF NOT EXISTS `a3m_account` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `email` varchar(160) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `createdon` datetime NOT NULL,
  `verifiedon` datetime DEFAULT NULL,
  `lastsignedinon` datetime DEFAULT NULL,
  `resetsenton` datetime DEFAULT NULL,
  `deletedon` datetime DEFAULT NULL,
  `suspendedon` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `a3m_account`
--

INSERT INTO `a3m_account` (`id`, `username`, `email`, `password`, `createdon`, `verifiedon`, `lastsignedinon`, `resetsenton`, `deletedon`, `suspendedon`) VALUES(1, 'admin', 'admin@quecomemos.com', '$2a$08$.Zt4p1csUviuJTqtB.d9B.TnQelNRFDI5d2ocS6NrN4qtdE3wjnma', '2013-08-20 20:52:33', NULL, '2014-02-24 20:07:46', '2013-09-05 23:10:51', NULL, NULL);
INSERT INTO `a3m_account` (`id`, `username`, `email`, `password`, `createdon`, `verifiedon`, `lastsignedinon`, `resetsenton`, `deletedon`, `suspendedon`) VALUES(2, 'bernaldani', 'bernaldani@gmail.com', '$2a$08$.Zt4p1csUviuJTqtB.d9B.TnQelNRFDI5d2ocS6NrN4qtdE3wjnma', '2013-08-20 20:52:33', NULL, '2014-02-24 20:07:10', '2013-09-05 23:10:51', NULL, NULL);
INSERT INTO `a3m_account` (`id`, `username`, `email`, `password`, `createdon`, `verifiedon`, `lastsignedinon`, `resetsenton`, `deletedon`, `suspendedon`) VALUES(3, '', 'jdbfranco@gmail.com', '$2a$08$.Zt4p1csUviuJTqtB.d9B.TnQelNRFDI5d2ocS6NrN4qtdE3wjnma', '2014-02-18 18:50:36', NULL, '2014-02-18 19:20:29', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a3m_account_details`
--

DROP TABLE IF EXISTS `a3m_account_details`;
CREATE TABLE IF NOT EXISTS `a3m_account_details` (
  `account_id` bigint(20) unsigned NOT NULL,
  `firstname` varchar(80) DEFAULT NULL,
  `lastname` varchar(80) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `language` varchar(80) DEFAULT NULL,
  `timezone` varchar(40) DEFAULT NULL,
  `dob` date NOT NULL,
  `picture` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `a3m_account_details`
--

INSERT INTO `a3m_account_details` (`account_id`, `firstname`, `lastname`, `city`, `country`, `language`, `timezone`, `dob`, `picture`) VALUES(1, 'Admin', 'Admin', 'Asunción', 'py', 'Spanish, Castilian', NULL, '0000-00-00', 'pic_6f4922f45568161a8cdf4ad2299f6d23.jpg');
INSERT INTO `a3m_account_details` (`account_id`, `firstname`, `lastname`, `city`, `country`, `language`, `timezone`, `dob`, `picture`) VALUES(2, 'Daniel', 'Bernal Franco', 'Asunción', 'py', 'Spanish, Castilian', NULL, '0000-00-00', 'pic_6f4922f45568161a8cdf4ad2299f6d23.jpg');
INSERT INTO `a3m_account_details` (`account_id`, `firstname`, `lastname`, `city`, `country`, `language`, `timezone`, `dob`, `picture`) VALUES(19, 'jose', 'franco', 'encarnacion', 'paraguay', NULL, NULL, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a3m_account_facebook`
--

DROP TABLE IF EXISTS `a3m_account_facebook`;
CREATE TABLE IF NOT EXISTS `a3m_account_facebook` (
  `account_id` bigint(20) NOT NULL,
  `facebook_id` bigint(20) NOT NULL,
  `linkedon` datetime NOT NULL,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `facebook_id` (`facebook_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `a3m_account_facebook`
--

INSERT INTO `a3m_account_facebook` (`account_id`, `facebook_id`, `linkedon`) VALUES(1, 839875640, '2013-12-26 19:52:22');
INSERT INTO `a3m_account_facebook` (`account_id`, `facebook_id`, `linkedon`) VALUES(19, 12345, '2014-02-18 18:50:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a3m_account_openid`
--

DROP TABLE IF EXISTS `a3m_account_openid`;
CREATE TABLE IF NOT EXISTS `a3m_account_openid` (
  `openid` varchar(240) NOT NULL,
  `account_id` bigint(20) unsigned NOT NULL,
  `linkedon` datetime NOT NULL,
  PRIMARY KEY (`openid`),
  KEY `account_id` (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a3m_account_twitter`
--

DROP TABLE IF EXISTS `a3m_account_twitter`;
CREATE TABLE IF NOT EXISTS `a3m_account_twitter` (
  `account_id` bigint(20) NOT NULL,
  `twitter_id` bigint(20) NOT NULL,
  `oauth_token` varchar(80) NOT NULL,
  `oauth_token_secret` varchar(80) NOT NULL,
  `linkedon` datetime NOT NULL,
  PRIMARY KEY (`account_id`),
  KEY `twitter_id` (`twitter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a3m_acl_permission`
--

DROP TABLE IF EXISTS `a3m_acl_permission`;
CREATE TABLE IF NOT EXISTS `a3m_acl_permission` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suspendedon` datetime DEFAULT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `key` (`key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `a3m_acl_permission`
--

INSERT INTO `a3m_acl_permission` (`id`, `key`, `description`, `suspendedon`, `is_system`) VALUES(2, 'create_roles', 'Create new roles', NULL, 1);
INSERT INTO `a3m_acl_permission` (`id`, `key`, `description`, `suspendedon`, `is_system`) VALUES(3, 'retrieve_roles', 'View existing roles.', NULL, 1);
INSERT INTO `a3m_acl_permission` (`id`, `key`, `description`, `suspendedon`, `is_system`) VALUES(4, 'update_roles', 'Update existing roles', NULL, 1);
INSERT INTO `a3m_acl_permission` (`id`, `key`, `description`, `suspendedon`, `is_system`) VALUES(5, 'delete_roles', 'Delete existing roles', NULL, 1);
INSERT INTO `a3m_acl_permission` (`id`, `key`, `description`, `suspendedon`, `is_system`) VALUES(6, 'create_permissions', 'Create new permissions', NULL, 1);
INSERT INTO `a3m_acl_permission` (`id`, `key`, `description`, `suspendedon`, `is_system`) VALUES(7, 'retrieve_permissions', 'View existing permissions', NULL, 1);
INSERT INTO `a3m_acl_permission` (`id`, `key`, `description`, `suspendedon`, `is_system`) VALUES(8, 'update_permissions', 'Update existing permissions', NULL, 1);
INSERT INTO `a3m_acl_permission` (`id`, `key`, `description`, `suspendedon`, `is_system`) VALUES(9, 'delete_permissions', 'Delete existing permissions', NULL, 1);
INSERT INTO `a3m_acl_permission` (`id`, `key`, `description`, `suspendedon`, `is_system`) VALUES(10, 'create_users', 'Create new users', NULL, 1);
INSERT INTO `a3m_acl_permission` (`id`, `key`, `description`, `suspendedon`, `is_system`) VALUES(11, 'retrieve_users', 'View existing users', NULL, 1);
INSERT INTO `a3m_acl_permission` (`id`, `key`, `description`, `suspendedon`, `is_system`) VALUES(12, 'update_users', 'Update existing users', NULL, 1);
INSERT INTO `a3m_acl_permission` (`id`, `key`, `description`, `suspendedon`, `is_system`) VALUES(13, 'delete_users', 'Delete existing users', NULL, 1);
INSERT INTO `a3m_acl_permission` (`id`, `key`, `description`, `suspendedon`, `is_system`) VALUES(14, 'ban_users', 'Ban and Unban existing users', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a3m_acl_role`
--

DROP TABLE IF EXISTS `a3m_acl_role`;
CREATE TABLE IF NOT EXISTS `a3m_acl_role` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `suspendedon` datetime DEFAULT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `a3m_acl_role`
--

INSERT INTO `a3m_acl_role` (`id`, `name`, `description`, `suspendedon`, `is_system`) VALUES(1, 'Admin', 'Website Administrator', NULL, 1);
INSERT INTO `a3m_acl_role` (`id`, `name`, `description`, `suspendedon`, `is_system`) VALUES(2, 'Resto', 'Proveedor de comida', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a3m_rel_account_permission`
--

DROP TABLE IF EXISTS `a3m_rel_account_permission`;
CREATE TABLE IF NOT EXISTS `a3m_rel_account_permission` (
  `account_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`account_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a3m_rel_account_role`
--

DROP TABLE IF EXISTS `a3m_rel_account_role`;
CREATE TABLE IF NOT EXISTS `a3m_rel_account_role` (
  `account_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`account_id`,`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `a3m_rel_account_role`
--

INSERT INTO `a3m_rel_account_role` (`account_id`, `role_id`) VALUES(1, 1);
INSERT INTO `a3m_rel_account_role` (`account_id`, `role_id`) VALUES(3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a3m_rel_role_permission`
--

DROP TABLE IF EXISTS `a3m_rel_role_permission`;
CREATE TABLE IF NOT EXISTS `a3m_rel_role_permission` (
  `role_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `a3m_rel_role_permission`
--

INSERT INTO `a3m_rel_role_permission` (`role_id`, `permission_id`) VALUES(1, 2);
INSERT INTO `a3m_rel_role_permission` (`role_id`, `permission_id`) VALUES(1, 3);
INSERT INTO `a3m_rel_role_permission` (`role_id`, `permission_id`) VALUES(1, 4);
INSERT INTO `a3m_rel_role_permission` (`role_id`, `permission_id`) VALUES(1, 5);
INSERT INTO `a3m_rel_role_permission` (`role_id`, `permission_id`) VALUES(1, 6);
INSERT INTO `a3m_rel_role_permission` (`role_id`, `permission_id`) VALUES(1, 7);
INSERT INTO `a3m_rel_role_permission` (`role_id`, `permission_id`) VALUES(1, 8);
INSERT INTO `a3m_rel_role_permission` (`role_id`, `permission_id`) VALUES(1, 9);
INSERT INTO `a3m_rel_role_permission` (`role_id`, `permission_id`) VALUES(1, 10);
INSERT INTO `a3m_rel_role_permission` (`role_id`, `permission_id`) VALUES(1, 11);
INSERT INTO `a3m_rel_role_permission` (`role_id`, `permission_id`) VALUES(1, 12);
INSERT INTO `a3m_rel_role_permission` (`role_id`, `permission_id`) VALUES(1, 13);
INSERT INTO `a3m_rel_role_permission` (`role_id`, `permission_id`) VALUES(1, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `ip_address` varchar(45) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `user_agent` varchar(120) CHARACTER SET latin1 NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`session_id`,`ip_address`,`user_agent`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES('5e9c7b50a6dbd44309328c8a13e55e58', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:27.0) Gecko/20100101 Firefox/27.0', 1392732205, 'a:3:{s:9:"user_data";s:0:"";s:10:"account_id";s:1:"3";s:19:"flash:old:app_alert";s:53:"No tienes los permisos suficientes para acceder aqui.";}');
INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES('57b134c4aa81ce351b477f0c8febc7ba', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:27.0) Gecko/20100101 Firefox/27.0', 1393252561, 'a:1:{s:10:"account_id";s:1:"1";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `slug` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `default` text COLLATE utf8_unicode_ci,
  `value` text COLLATE utf8_unicode_ci,
  `is_required` int(1) NOT NULL,
  `order` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`slug`),
  UNIQUE KEY `unique_slug` (`slug`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`slug`, `title`, `description`, `default`, `value`, `is_required`, `order`) VALUES('facebook', 'Facebook User', 'Facebook fan page', '', '', 0, 6);
INSERT INTO `settings` (`slug`, `title`, `description`, `default`, `value`, `is_required`, `order`) VALUES('ga_profile', 'Google Analytic Profile ID', 'Profile ID for this website in Google Analytics', '', '', 0, 1);
INSERT INTO `settings` (`slug`, `title`, `description`, `default`, `value`, `is_required`, `order`) VALUES('per_page', 'Items per page', 'How many items you would see in the lists', '10', '10', 0, 2);
INSERT INTO `settings` (`slug`, `title`, `description`, `default`, `value`, `is_required`, `order`) VALUES('profile_thumb', 'User photo thumb size', 'User photo thumb size', '150x150', '80x80', 0, 5);
INSERT INTO `settings` (`slug`, `title`, `description`, `default`, `value`, `is_required`, `order`) VALUES('server_email', 'Server E-mail', 'All e-mails to users will come from this e-mail address.', 'example@example.com', 'example@example.com', 0, 3);
INSERT INTO `settings` (`slug`, `title`, `description`, `default`, `value`, `is_required`, `order`) VALUES('thumbs', 'Thumbnail size', 'Thumbnail size', '150x150', '200x200', 0, 4);
INSERT INTO `settings` (`slug`, `title`, `description`, `default`, `value`, `is_required`, `order`) VALUES('twitter', 'Twitter user profile', 'Twitter user profile', '', '', 0, 7);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
