/*
 Navicat MySQL Data Transfer

 Source Server         : orionshoulders_mytestservers
 Source Server Type    : MySQL
 Source Server Version : 50156
 Source Host           : mysql.mytestservers.com
 Source Database       : rest_orionshoulders

 Target Server Type    : MySQL
 Target Server Version : 50156
 File Encoding         : utf-8

 Date: 12/23/2014 10:14:37 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `test_convert_d_to_log_odd`
-- ----------------------------
DROP TABLE IF EXISTS `test_convert_d_to_log_odd`;
CREATE TABLE `test_convert_d_to_log_odd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `d` float(11,4) DEFAULT NULL,
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
  KEY `fk_log_modifier` (`last_modified_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `test_convert_d_to_log_odd`
-- ----------------------------
BEGIN;
INSERT INTO `test_convert_d_to_log_odd` VALUES ('1', '1.2300', '2.2310', null, null, null, null, null, '0', '1'), ('2', '1.2300', '2.2310', '2014-12-16 06:26:22', null, '4', null, null, '0', '1'), ('3', '0.5000', '0.9069', '2014-12-16 06:44:40', null, '4', null, null, '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `test_convert_d_to_r`
-- ----------------------------
DROP TABLE IF EXISTS `test_convert_d_to_r`;
CREATE TABLE `test_convert_d_to_r` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `d` float(11,4) DEFAULT NULL,
  `n1` int(11) DEFAULT NULL,
  `n2` int(11) DEFAULT NULL,
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
  KEY `fk_user_defined_field_project` (`n1`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `test_convert_d_to_r`
-- ----------------------------
BEGIN;
INSERT INTO `test_convert_d_to_r` VALUES ('1', '1.0000', '2', '3', '0.4549', '2014-12-13 17:53:17', null, '4', null, null, '0', '1'), ('2', '1.1547', '100', '100', '0.3428', '2014-12-13 17:59:57', null, '4', null, null, '0', '1'), ('3', '1.1547', '10', '10', '0.0114', '2014-12-13 18:00:46', null, '4', null, null, '0', '1'), ('4', '1.0000', '1', '1', '0.0905', '2014-12-13 18:01:32', null, '4', null, null, '0', '1'), ('5', '1.0000', '1', '1', '0.0905', '2014-12-13 18:02:58', null, '4', null, null, '0', '1'), ('6', '1.0000', '1', '1', '0.0905', '2014-12-13 18:03:14', null, '4', null, null, '0', '1'), ('7', '1.0000', '1', '1', '0.4472', '2014-12-13 18:04:17', null, '4', null, null, '0', '1'), ('8', '1.1547', '1', '1', '0.5000', '2014-12-13 18:04:26', null, '4', null, null, '0', '1'), ('9', '1.1547', '1', '1', '0.5000', '2014-12-13 18:06:55', null, '4', null, null, '0', '1'), ('10', '1.1547', '10', '10', '0.5000', '2014-12-13 18:06:59', null, '4', null, null, '0', '1'), ('11', '1.1547', '10', '10', '0.5000', '2014-12-13 18:07:01', null, '4', null, null, '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `test_convert_log_odd_to_d`
-- ----------------------------
DROP TABLE IF EXISTS `test_convert_log_odd_to_d`;
CREATE TABLE `test_convert_log_odd_to_d` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `LOR` float(11,4) DEFAULT NULL,
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
  KEY `fk_log_modifier` (`last_modified_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `test_convert_log_odd_to_d`
-- ----------------------------
BEGIN;
INSERT INTO `test_convert_log_odd_to_d` VALUES ('1', '1.2500', '0.6892', '2014-12-16 06:42:37', null, '4', null, null, '0', '1'), ('2', '1.4700', '0.8105', '2014-12-16 06:43:07', null, '4', null, null, '0', '1'), ('3', '0.9069', '0.5000', '2014-12-16 06:45:07', null, '4', null, null, '0', '1'), ('4', '1.5700', '0.8656', '2014-12-17 09:53:17', null, '4', null, null, '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `test_convert_r_to_d`
-- ----------------------------
DROP TABLE IF EXISTS `test_convert_r_to_d`;
CREATE TABLE `test_convert_r_to_d` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `r` float(11,4) DEFAULT NULL,
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
  KEY `fk_log_modifier` (`last_modified_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `test_convert_r_to_d`
-- ----------------------------
BEGIN;
INSERT INTO `test_convert_r_to_d` VALUES ('1', '0.1000', '0.2010', '2014-12-14 11:27:07', null, '4', null, null, '0', '1'), ('2', '0.0500', '0.1001', '2014-12-14 11:27:21', null, '4', null, null, '0', '1'), ('3', '0.5000', '1.1547', '2014-12-14 11:27:25', null, '4', null, null, '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `test_convert_t_to_d`
-- ----------------------------
DROP TABLE IF EXISTS `test_convert_t_to_d`;
CREATE TABLE `test_convert_t_to_d` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t` float(11,4) DEFAULT NULL,
  `n` int(11) DEFAULT NULL,
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
  KEY `fk_log_modifier` (`last_modified_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `test_convert_t_to_d`
-- ----------------------------
BEGIN;
INSERT INTO `test_convert_t_to_d` VALUES ('1', '2.5700', '100', null, '2014-12-15 10:12:56', null, '4', null, null, '0', '1'), ('2', '2.5700', '100', null, '2014-12-15 10:14:50', null, '4', null, null, '0', '1'), ('3', '2.5700', '100', '0.5140', '2014-12-15 10:16:40', null, '4', null, null, '0', '1'), ('4', '2.5700', '100', '0.5140', '2014-12-15 10:18:38', null, '4', null, null, '0', '1'), ('5', '2.5700', '100', '0.5140', '2014-12-15 10:19:24', null, '4', null, null, '0', '1'), ('6', '2.5200', '100', '0.5040', '2014-12-15 10:20:08', null, '4', null, null, '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `test_convert_t_to_r`
-- ----------------------------
DROP TABLE IF EXISTS `test_convert_t_to_r`;
CREATE TABLE `test_convert_t_to_r` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t` float(11,4) DEFAULT NULL,
  `n` int(11) DEFAULT NULL,
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
  KEY `fk_log_modifier` (`last_modified_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `test_convert_t_to_r`
-- ----------------------------
BEGIN;
INSERT INTO `test_convert_t_to_r` VALUES ('1', '2.5700', '100', null, '2014-12-15 10:12:56', null, '4', null, null, '0', '1'), ('2', '2.5700', '100', null, '2014-12-15 10:14:50', null, '4', null, null, '0', '1'), ('3', '2.5700', '100', '0.5140', '2014-12-15 10:16:40', null, '4', null, null, '0', '1'), ('4', '2.5700', '100', '0.5140', '2014-12-15 10:18:38', null, '4', null, null, '0', '1'), ('5', '2.5700', '100', '0.5140', '2014-12-15 10:19:24', null, '4', null, null, '0', '1'), ('6', '2.5200', '100', '0.5040', '2014-12-15 10:20:08', null, '4', null, null, '0', '1');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `test_post_test_between_groups`
-- ----------------------------
DROP TABLE IF EXISTS `test_post_test_between_groups`;
CREATE TABLE `test_post_test_between_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `treatment_mean` float(11,4) DEFAULT NULL,
  `treatment_n` int(11) DEFAULT NULL,
  `treatment_sd` float(11,4) DEFAULT NULL,
  `control_mean` float(11,4) DEFAULT NULL,
  `control_n` int(11) DEFAULT NULL,
  `control_sd` float(11,4) DEFAULT NULL,
  `pooled_sample_sd` float(11,4) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `test_pre_test_post_test`
-- ----------------------------
DROP TABLE IF EXISTS `test_pre_test_post_test`;
CREATE TABLE `test_pre_test_post_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_mean` float(11,4) DEFAULT NULL,
  `post_n` int(11) DEFAULT NULL,
  `post_sd` float(11,4) DEFAULT NULL,
  `pre_mean` float(11,4) DEFAULT NULL,
  `pre_n` int(11) DEFAULT NULL,
  `pre_sd` float(11,4) DEFAULT NULL,
  `pooled_sample_sd` float(11,4) DEFAULT NULL,
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
  KEY `fk_user_defined_field_project` (`post_n`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `test_pre_test_post_test`
-- ----------------------------
BEGIN;
INSERT INTO `test_pre_test_post_test` VALUES ('1', '2.0000', '1', '3.0000', '5.0000', '4', '6.0000', '6.0000', '-0.5000', '2014-12-13 13:32:16', null, '4', null, null, '0', '1'), ('2', '2.0000', '1', '3.0000', '5.0000', '4', '6.0000', '6.0000', '-0.5000', '2014-12-13 13:45:48', null, '2', null, null, '0', '1'), ('3', '1.0000', null, null, '2.0000', null, '3.0000', null, '-0.3333', '2014-12-13 14:06:19', null, '2', null, null, '0', '1'), ('4', '3.0000', null, null, '4.0000', null, '5.0000', null, '-0.2000', '2014-12-13 14:08:47', null, '2', null, null, '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `test_pre_test_post_test_w_control`
-- ----------------------------
DROP TABLE IF EXISTS `test_pre_test_post_test_w_control`;
CREATE TABLE `test_pre_test_post_test_w_control` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_treatment_mean` float(11,4) DEFAULT NULL,
  `pre_treatment_mean` float(11,4) DEFAULT NULL,
  `pre_treatment_sd` float(11,4) DEFAULT NULL,
  `post_control_mean` float(11,4) DEFAULT NULL,
  `pre_control_mean` float(11,4) DEFAULT NULL,
  `pre_control_sd` float(11,4) DEFAULT NULL,
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
  KEY `fk_user_defined_field_project` (`pre_treatment_mean`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `test_pre_test_post_test_w_control`
-- ----------------------------
BEGIN;
INSERT INTO `test_pre_test_post_test_w_control` VALUES ('1', '5.0000', '2.0000', null, null, '5.0000', '6.0000', '-0.1667', '2014-12-13 14:28:12', null, '2', null, null, '0', '1'), ('2', '5.0000', '5.0000', '6.0000', '8.0000', '8.0000', '9.0000', '-0.0556', '2014-12-13 14:30:47', null, '2', null, null, '0', '1');
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
  `access_token` varchar(32) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('2', 'samuelbirk', 'samuel.birk@gmail.com', '$2y$12$ppk.R3o0/nx2pwA5Fmq3LeSuIW/cNOPc7o9H9W6qcoaGEZcl//heK', 'o7M9WVlCYhkIBCmAOUi875Arg_OEWygg', '1413394391', null, null, null, '2130706433', '1413394334', '1413394391', '0'), ('4', 'guest', 'support@orionshoulders.com', '$2y$12$QOee6PO5Z3hBUN6LJi08feYhAMvVDzl7.duB.2AeXup.q2wFNOd32', 'Kb0Zl-xIQh4ZOzsurh3DM_gVJm_abpLM', '1413394391', null, null, null, '2130706433', '1418049129', '1418049129', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
