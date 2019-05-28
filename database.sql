/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : pre_middle

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 28/05/2019 16:22:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for 01_messages
-- ----------------------------
DROP TABLE IF EXISTS `01_messages`;
CREATE TABLE `01_messages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text CHARACTER SET latin1 COLLATE utf8_general_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of 01_messages
-- ----------------------------

-- ----------------------------
-- Table structure for 01_users
-- ----------------------------
DROP TABLE IF EXISTS `01_users`;
CREATE TABLE `01_users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET latin1 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(64) CHARACTER SET latin1 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_login` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `is_suspicious` tinyint(4) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `01_users_email_uindex`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of 01_users
-- ----------------------------
INSERT INTO `01_users` VALUES (1, 'test@example.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 'Admin', '2019-05-28 04:21:44', 0);

-- ----------------------------
-- Table structure for 03_products
-- ----------------------------
DROP TABLE IF EXISTS `03_products`;
CREATE TABLE `03_products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of 03_products
-- ----------------------------
INSERT INTO `03_products` VALUES (1, 'Product title 1');
INSERT INTO `03_products` VALUES (2, 'Product title 2');
INSERT INTO `03_products` VALUES (3, 'Product title 3');
INSERT INTO `03_products` VALUES (4, 'Product title 4');
INSERT INTO `03_products` VALUES (5, 'Product title 5');
INSERT INTO `03_products` VALUES (6, 'Product title 6');
INSERT INTO `03_products` VALUES (7, 'Product title 7');
INSERT INTO `03_products` VALUES (8, 'Product title 8');
INSERT INTO `03_products` VALUES (9, 'Product title 9');
INSERT INTO `03_products` VALUES (10, 'Product title 10');
INSERT INTO `03_products` VALUES (11, 'Product title 11');
INSERT INTO `03_products` VALUES (12, 'Product title 12');
INSERT INTO `03_products` VALUES (13, 'Product title 13');
INSERT INTO `03_products` VALUES (14, 'Product title 14');
INSERT INTO `03_products` VALUES (15, 'Product title 15');
INSERT INTO `03_products` VALUES (16, 'Product title 16');
INSERT INTO `03_products` VALUES (17, 'Product title 17');
INSERT INTO `03_products` VALUES (18, 'Product title 18');
INSERT INTO `03_products` VALUES (19, 'Product title 19');
INSERT INTO `03_products` VALUES (20, 'Product title 20');
INSERT INTO `03_products` VALUES (21, 'Product title 21');
INSERT INTO `03_products` VALUES (22, 'Product title 22');
INSERT INTO `03_products` VALUES (23, 'Product title 23');
INSERT INTO `03_products` VALUES (24, 'Product title 24');
INSERT INTO `03_products` VALUES (25, 'Product title 25');
INSERT INTO `03_products` VALUES (26, 'Product title 26');
INSERT INTO `03_products` VALUES (27, 'Product title 27');
INSERT INTO `03_products` VALUES (28, 'Product title 28');
INSERT INTO `03_products` VALUES (29, 'Product title 29');
INSERT INTO `03_products` VALUES (30, 'Product title 30');
INSERT INTO `03_products` VALUES (31, 'Product title 31');
INSERT INTO `03_products` VALUES (32, 'Product title 32');
INSERT INTO `03_products` VALUES (33, 'Product title 33');
INSERT INTO `03_products` VALUES (34, 'Product title 34');
INSERT INTO `03_products` VALUES (35, 'Product title 35');
INSERT INTO `03_products` VALUES (36, 'Product title 36');
INSERT INTO `03_products` VALUES (37, 'Product title 37');
INSERT INTO `03_products` VALUES (38, 'Product title 38');
INSERT INTO `03_products` VALUES (39, 'Product title 39');
INSERT INTO `03_products` VALUES (40, 'Product title 40');
INSERT INTO `03_products` VALUES (41, 'Product title 41');
INSERT INTO `03_products` VALUES (42, 'Product title 42');
INSERT INTO `03_products` VALUES (43, 'Product title 43');
INSERT INTO `03_products` VALUES (44, 'Product title 44');
INSERT INTO `03_products` VALUES (45, 'Product title 45');
INSERT INTO `03_products` VALUES (46, 'Product title 46');
INSERT INTO `03_products` VALUES (47, 'Product title 47');
INSERT INTO `03_products` VALUES (48, 'Product title 48');
INSERT INTO `03_products` VALUES (49, 'Product title 49');
INSERT INTO `03_products` VALUES (50, 'Product title 50');

SET FOREIGN_KEY_CHECKS = 1;
