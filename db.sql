-- Adminer 4.7.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `note` tinytext NOT NULL,
  `id_user_minus` int(11) NOT NULL,
  `id_user_plus` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_transaction`),
  KEY `id_user_minus` (`id_user_minus`),
  KEY `id_user_plus` (`id_user_plus`),
  CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id_user_minus`) REFERENCES `user` (`id_user`),
  CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`id_user_plus`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `transaction` (`id_transaction`, `amount`, `note`, `id_user_minus`, `id_user_plus`, `created_at`, `updated_at`) VALUES
(3,	50000,	'Top Up',	1,	5,	'2021-03-14 22:05:04',	'2021-03-14 22:05:04'),
(4,	5000,	'Buy',	5,	1,	'2021-03-14 22:13:10',	'2021-03-14 22:13:10'),
(5,	5000,	'Buy',	5,	1,	'2021-03-14 22:14:56',	'2021-03-14 22:14:56'),
(6,	20000,	'Buy',	5,	1,	'2021-03-14 22:15:14',	'2021-03-14 22:15:14'),
(7,	10000,	'Buy',	5,	1,	'2021-03-14 22:27:26',	'2021-03-14 22:27:26'),
(8,	10000,	'Buy',	5,	1,	'2021-03-14 22:29:22',	'2021-03-14 22:29:22'),
(9,	5000,	'Buy',	5,	1,	'2021-03-14 22:29:37',	'2021-03-14 22:29:37');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(64) NOT NULL,
  `user_type` smallint(6) NOT NULL COMMENT 'Admin:1, Penjual:2, Siswa:3',
  `card_id` varchar(25) NOT NULL,
  `machine_id` varchar(25) DEFAULT NULL,
  `gender` smallint(1) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `amount` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id_user`, `name`, `username`, `password`, `user_type`, `card_id`, `machine_id`, `gender`, `phone`, `amount`, `created_at`, `updated_at`) VALUES
(1,	'Admin',	'admin@gmail.com',	'$2y$10$4F1po7EBMIODHKgn6SmjYOhO7D5wa9Vj/LrDsVAv6409Spte74XC6',	1,	'',	'TEST',	NULL,	NULL,	50300,	'2021-03-14 09:06:21',	'2021-03-14 22:29:37'),
(5,	'Andi',	'testing@mail.com',	'$2y$10$4F1po7EBMIODHKgn6SmjYOhO7D5wa9Vj/LrDsVAv6409Spte74XC6',	3,	'12ASDXX',	NULL,	2,	'855',	9510,	'2021-03-14 15:35:45',	'2021-03-14 22:29:37'),
(6,	'Kantin 1',	'kantin@gmail.com',	'$2y$10$4F1po7EBMIODHKgn6SmjYOhO7D5wa9Vj/LrDsVAv6409Spte74XC6',	2,	'12ASDFG',	'12ASDFGMA',	1,	'0854',	50000,	'2021-03-14 20:01:46',	'2021-03-14 00:00:00');

-- 2021-03-14 15:54:09

