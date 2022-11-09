/*
 Navicat Premium Data Transfer

 Source Server         : MariaDB
 Source Server Type    : MariaDB
 Source Server Version : 100310
 Source Host           : localhost:3310
 Source Schema         : invoice

 Target Server Type    : MariaDB
 Target Server Version : 100310
 File Encoding         : 65001

 Date: 09/11/2022 03:37:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth
-- ----------------------------
DROP TABLE IF EXISTS `auth`;
CREATE TABLE `auth`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for invoice
-- ----------------------------
DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice`  (
  `name_of_client` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `contact_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of invoice
-- ----------------------------
INSERT INTO `invoice` VALUES ('EMMANUEL KWAME OPOKU', '32', 'futureopoku@gmail.com', '1667963322_Opoku Emmanuel Kwame CV.pdf', '2022-11-09 03:08:42', '2022-11-09 03:09:14', 42, 'sent');
INSERT INTO `invoice` VALUES ('EMMANUEL KWAME OPOKU', '4343', 'futureopoku@gmail.com', '1667963642_AES Print.pdf', '2022-11-09 03:14:02', '2022-11-09 03:14:47', 43, 'sent');
INSERT INTO `invoice` VALUES ('EMMANUEL KWAME OPOKU', '323', 'futureopoku@gmail.com', '1667963750_AES Print.pdf', '2022-11-09 03:15:50', '2022-11-09 03:16:08', 44, 'sent');
INSERT INTO `invoice` VALUES ('EMMANUEL KWAME OPOKU', '32', 'futureopoku@gmail.com', '1667963898_AES Print.pdf', '2022-11-09 03:18:18', '2022-11-09 03:18:44', 45, 'sent');
INSERT INTO `invoice` VALUES ('EMMANUEL KWAME OPOKU', '4354543', 'futureopoku@gmail.com', '1667964219_AES Print.pdf', '2022-11-09 03:23:39', '2022-11-09 03:23:51', 46, 'sent');
INSERT INTO `invoice` VALUES ('ddssdsd', '323233432', 'futureopoku@gmail.com', '1667964300_Opoku Emmanuel Kwame CV.pdf', '2022-11-09 03:25:00', '2022-11-09 03:25:15', 47, 'sent');
INSERT INTO `invoice` VALUES ('EMMANUEL KWAME OPOKU', '343524332', 'futureopoku@gmail.com', '1667964552_AES Print.pdf', '2022-11-09 03:29:12', '2022-11-09 03:29:23', 48, 'sent');

SET FOREIGN_KEY_CHECKS = 1;
