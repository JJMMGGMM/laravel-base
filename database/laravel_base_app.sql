/*
Navicat MySQL Data Transfer

Source Server         : MYSQL
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : laravel_base_app

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2020-10-16 00:00:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for operaciones
-- ----------------------------
DROP TABLE IF EXISTS `operaciones`;
CREATE TABLE `operaciones` (
  `operacion_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) unsigned NOT NULL,
  `tipo_operacion_id` int(1) unsigned NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiracion` datetime NOT NULL,
  PRIMARY KEY (`operacion_id`),
  KEY `fk_tokens_validacion_usuarios` (`usuario_id`) USING BTREE,
  KEY `tipo_operacion_id` (`tipo_operacion_id`) USING BTREE,
  CONSTRAINT `operaciones_ibfk_1` FOREIGN KEY (`tipo_operacion_id`) REFERENCES `tipos_operaciones` (`tipo_operacion_id`),
  CONSTRAINT `operaciones_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of operaciones
-- ----------------------------

-- ----------------------------
-- Table structure for tipos_operaciones
-- ----------------------------
DROP TABLE IF EXISTS `tipos_operaciones`;
CREATE TABLE `tipos_operaciones` (
  `tipo_operacion_id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `desc` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`tipo_operacion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tipos_operaciones
-- ----------------------------
INSERT INTO `tipos_operaciones` VALUES ('1', 'CONFIRMAR_CORREO');
INSERT INTO `tipos_operaciones` VALUES ('2', 'CONFIRMAR_CONTRASENIA');
INSERT INTO `tipos_operaciones` VALUES ('3', 'BORRAR_CUENTA');
INSERT INTO `tipos_operaciones` VALUES ('4', 'RECUPERAR_CUENTA');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `usuario_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contra` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_sesion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `envios` int(1) unsigned NOT NULL,
  `bloqueo_envios` datetime DEFAULT NULL,
  `reintentos_ingreso` int(1) unsigned NOT NULL,
  `bloqueo_ingreso` datetime DEFAULT NULL,
  `creacion` datetime NOT NULL,
  `modificacion` datetime DEFAULT NULL,
  `activacion` datetime DEFAULT NULL,
  `eliminacion` datetime DEFAULT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `users_email_unique` (`correo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'admin', 'admin@email.app', '$2y$10$DF3cUHm/aENutyDX0fpq0.NHBrgFbxP3uZwAWZI9q20iXAsBVmuLa', 'I6Xqg13mxvWYIXuo1rHtvlqlIRG69QkwzlMi3CcvUJoKHvtuJnw5ZNwEmu1x', '4', null, '10', null, '2019-02-06 22:25:09', '2020-10-15 22:38:52', '2019-03-08 22:17:09', null);
