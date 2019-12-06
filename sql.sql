-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.15 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица yii2basic.duties
CREATE TABLE IF NOT EXISTS `duties` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii2basic.duties: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `duties` DISABLE KEYS */;
INSERT INTO `duties` (`id`, `name`) VALUES
	(3, 'tyertyrt'),
	(5, 'dgsdfgsdfgsdfgs');
/*!40000 ALTER TABLE `duties` ENABLE KEYS */;

-- Дамп структуры для таблица yii2basic.organization
CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii2basic.organization: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
INSERT INTO `organization` (`id`, `name`) VALUES
	(2, 'Creative web'),
	(5, 'Creative web 12');
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;

-- Дамп структуры для таблица yii2basic.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `surname` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii2basic.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `surname`, `email`) VALUES
	(86, 'Narekrewre', 'Vardanyan', 'dfsdfsdf@aa.ru'),
	(87, 'Narek12121', 'Vardanyan', 'nupagadi@mail.com'),
	(88, 'yo', 'Vardanyan', 'nupagadi@mail.com'),
	(90, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(91, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(92, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(93, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(94, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(95, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(96, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(97, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(98, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(99, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(100, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(101, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(102, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(103, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(104, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(105, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(106, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(107, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(108, 'dsfdsdw', 'dwqdqw', 'dwqdqw@riii.com'),
	(109, 'dsfdsdw', 'dwqdqw', 'dwqdqw@riii.com'),
	(110, 'Narek', 'das', 'nupagadi@mail.com'),
	(111, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(112, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(113, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(114, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(115, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(116, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(117, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(118, 'yo', 'uuuuuuuuuuuula', 'nupagadi@mail.com'),
	(119, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(120, 'yo', 'Vardanyan', 'nupagadi@mail.com'),
	(121, 'yo', 'Vardanyan', 'nupagadi@mail.com'),
	(122, 'yo', 'Vardanyan', 'nupagadi@mail.com'),
	(123, 'yo', 'Vardanyan', 'nupagadi@mail.com'),
	(124, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(125, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(126, 'yo', 'Vardanyan', 'nupagadi@mail.com'),
	(127, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(128, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(129, 'yo', 'uuuuuuuuuuuula', 'nupagadi@mail.com'),
	(130, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(131, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(132, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(133, 'fdgfdgdfg', 'Vardanyan', 'nupagadi@mail.com'),
	(134, 'fdgfdgdfg', 'Vardanyan', 'nupagadi@mail.com'),
	(135, 'dfsdd', 'Vardanyan', 'nupagadi@mail.com'),
	(136, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(137, 'Narek', 'Vardanyan', 'nupagadi@mail.com'),
	(138, 'Narek', 'Vardanyan', 'nupagadi@mail.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Дамп структуры для таблица yii2basic.user_duties
CREATE TABLE IF NOT EXISTS `user_duties` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `duties_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK__users` (`user_id`),
  KEY `FK_user_organization_organization` (`duties_id`),
  CONSTRAINT `FK_user_duties_duties` FOREIGN KEY (`duties_id`) REFERENCES `duties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user_duties_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Дамп данных таблицы yii2basic.user_duties: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `user_duties` DISABLE KEYS */;
INSERT INTO `user_duties` (`id`, `user_id`, `duties_id`) VALUES
	(3, 136, 3),
	(4, 136, 5),
	(5, 137, 3),
	(6, 138, 5);
/*!40000 ALTER TABLE `user_duties` ENABLE KEYS */;

-- Дамп структуры для таблица yii2basic.user_organization
CREATE TABLE IF NOT EXISTS `user_organization` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `organization_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK__users` (`user_id`),
  KEY `FK_user_organization_organization` (`organization_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii2basic.user_organization: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `user_organization` DISABLE KEYS */;
INSERT INTO `user_organization` (`id`, `user_id`, `organization_id`) VALUES
	(15, 125, 2),
	(16, 125, 5),
	(17, 127, 2),
	(18, 127, 5),
	(19, 128, 2),
	(20, 128, 5),
	(23, 129, 2),
	(24, 130, 2),
	(25, 130, 5),
	(26, 131, 2),
	(27, 131, 5),
	(28, 132, 2),
	(29, 132, 5),
	(30, 133, 2),
	(31, 133, 5),
	(32, 134, 2),
	(33, 134, 5),
	(34, 135, 2),
	(35, 136, 2),
	(36, 137, 2),
	(37, 137, 5),
	(38, 138, 2);
/*!40000 ALTER TABLE `user_organization` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
