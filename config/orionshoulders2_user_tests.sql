/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50617
 Source Host           : localhost
 Source Database       : orionshoulders2_user_tests

 Target Server Type    : MySQL
 Target Server Version : 50617
 File Encoding         : utf-8

 Date: 12/03/2014 10:48:58 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `country`
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `country`
-- ----------------------------
BEGIN;
INSERT INTO `country` VALUES ('AU', 'Australia', '18886000'), ('BR', 'Brazil', '170115000'), ('CA', 'Canada', '1147000'), ('CN', 'China', '1277558000'), ('DE', 'Germany', '82164700'), ('FR', 'France', '59225700'), ('GB', 'United Kingdom', '59623400'), ('IN', 'India', '1013662000'), ('RU', 'Russia', '146934000'), ('US', 'United States', '278357000');
COMMIT;

-- ----------------------------
--  Table structure for `test_pooled_sample_sd`
-- ----------------------------
DROP TABLE IF EXISTS `test_pooled_sample_sd`;
CREATE TABLE `test_pooled_sample_sd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `treatment_n` int(11) DEFAULT NULL,
  `treatment_sd` float(11,4) DEFAULT NULL,
  `control_n` int(11) DEFAULT NULL,
  `control_sd` float(11,4) DEFAULT NULL,
  `final_result` float(11,4) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `last_modified_by_id` int(11) DEFAULT NULL,
  `history_id` int(11) DEFAULT NULL,
  `deleted` int(1) DEFAULT '0',
  `active` int(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_log_creator` (`created_by_id`),
  KEY `fk_log_modifier` (`last_modified_by_id`),
  KEY `fk_user_defined_field_project` (`treatment_n`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `test_pooled_sample_sd`
-- ----------------------------
BEGIN;
INSERT INTO `test_pooled_sample_sd` VALUES ('16', '1', '2.0000', '3', '4.0000', '4.0000', null, null, '2', '2', null, '0', '1'), ('17', '5', '6.0000', '7', '8.0000', '7.2664', '2014-12-03 09:39:26', null, '2', null, null, '0', '1'), ('18', '8', '9.0000', '10', '11.0000', '10.1735', '2014-12-03 09:40:57', null, '2', null, null, '0', '1'), ('19', '2', '3.0000', '4', '5.0000', '4.5826', '2014-12-03 09:43:54', null, '2', null, null, '0', '1'), ('20', '3', '4.0000', '5', '6.0000', '5.4160', '2014-12-03 09:44:21', null, '2', null, null, '0', '1'), ('21', '7', '8.0000', '9', '10.0000', '9.1963', '2014-12-03 09:44:59', null, '2', null, null, '0', '1'), ('22', '5', '7.0000', '9', '11.0000', '9.8489', '2014-12-03 09:46:59', null, '2', null, null, '0', '1'), ('23', '1', '3.0000', '4', '5.0000', '5.0000', '2014-12-03 09:51:08', null, '2', null, null, '0', '1'), ('24', '8', '9.0000', '10', '11.0000', '10.1735', '2014-12-03 09:56:29', null, '2', null, null, '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `registration_ip` int(11) unsigned DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('2', 'samuelbirk', 'samuel.birk@gmail.com', '$2y$12$ppk.R3o0/nx2pwA5Fmq3LeSuIW/cNOPc7o9H9W6qcoaGEZcl//heK', 'o7M9WVlCYhkIBCmAOUi875Arg_OEWygg', '1413394391', null, null, null, '2130706433', '1413394334', '1413394391', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
