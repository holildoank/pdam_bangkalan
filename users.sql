/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : sekolah

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-09-27 21:55:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `id_level` int(11) NOT NULL,
  `time_online` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `permission` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('6', '2', 'Admin', 'admin', '$2y$10$D1nb28r4OrY20l7S4Qw7LuF3kC8iiMtK7nWm9179zf4MJrA/Xfsje', '0', '1474988525', '0', '3', '', 'aUEI4rtMYWTJZbPsaMfhmwAJWuBocWtyoLBTlA25b3Kw3wALcT70SoQYV54u', '2016-05-11 03:56:47', '2016-09-27 14:47:05');
INSERT INTO `users` VALUES ('7', '1', 'Holil DOOAA', 'holil', '$2y$10$YBwGyJdjk76aaK.K14rimOtscycHqHZXzO4quzOhbbALllCmcc8uO', '0', '1462965904', '0', '1', '', 'bFCFaKcYHywOD1iYlorhu85T5RQtQHaM8EWgOZofoUpMX9fGfRl1iDBcw3D1', '2016-05-11 03:58:30', '2016-05-11 11:10:04');
