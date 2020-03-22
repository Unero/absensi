/*
Navicat MySQL Data Transfer

Source Server         : AMPPS
Source Server Version : 80018
Source Host           : localhost:3306
Source Database       : absensi

Target Server Type    : MYSQL
Target Server Version : 80018
File Encoding         : 65001

Date: 2020-03-22 11:41:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for absensi
-- ----------------------------
DROP TABLE IF EXISTS `absensi`;
CREATE TABLE `absensi` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `matkul` int(50) DEFAULT NULL,
  `dosen` int(50) DEFAULT NULL,
  `mahasiswa` int(50) DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '-',
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mahasiswa` (`mahasiswa`),
  KEY `matkul` (`matkul`),
  KEY `dosen-abs` (`dosen`),
  CONSTRAINT `dosen-abs` FOREIGN KEY (`dosen`) REFERENCES `dosen` (`nip`),
  CONSTRAINT `mahasiswa` FOREIGN KEY (`mahasiswa`) REFERENCES `mahasiswa` (`nim`),
  CONSTRAINT `matkul` FOREIGN KEY (`matkul`) REFERENCES `matkul` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of absensi
-- ----------------------------
INSERT INTO `absensi` VALUES ('23', '3001', '2001', '1001', '-', '2020-03-15');
INSERT INTO `absensi` VALUES ('24', '3001', '2001', '1002', '-', '2020-03-15');
INSERT INTO `absensi` VALUES ('25', '3001', '2001', '1003', '-', '2020-03-15');
INSERT INTO `absensi` VALUES ('26', '3001', '2001', '1004', '-', '2020-03-15');

-- ----------------------------
-- Table structure for dosen
-- ----------------------------
DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
  `nip` int(50) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`nip`),
  KEY `nama` (`nama_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=2003 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of dosen
-- ----------------------------
INSERT INTO `dosen` VALUES ('2001', 'Dimas Wahyu Wibowo, ST., MT');

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `nim` int(50) NOT NULL AUTO_INCREMENT,
  `nama_mhs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Teknik Informatika',
  PRIMARY KEY (`nim`),
  KEY `nama` (`nama_mhs`)
) ENGINE=InnoDB AUTO_INCREMENT=1008 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES ('1001', 'Dimas', 'TI 2B', 'Teknik Informatika');
INSERT INTO `mahasiswa` VALUES ('1002', 'Unero', 'TI 2B', 'Teknik Informatika');
INSERT INTO `mahasiswa` VALUES ('1003', 'Ernold', 'TI 2B', 'Teknik Informasi');
INSERT INTO `mahasiswa` VALUES ('1004', 'Nanda', 'TI 2B', 'Teknik Informatika');
INSERT INTO `mahasiswa` VALUES ('1006', 'Agung', 'TI 2F', 'Teknik Informatika');

-- ----------------------------
-- Table structure for matkul
-- ----------------------------
DROP TABLE IF EXISTS `matkul`;
CREATE TABLE `matkul` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_dosen` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sks` int(10) DEFAULT NULL,
  `jam` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nama` (`nama`),
  KEY `dosen` (`nama_dosen`),
  CONSTRAINT `dosen` FOREIGN KEY (`nama_dosen`) REFERENCES `dosen` (`nama_dosen`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=3003 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of matkul
-- ----------------------------
INSERT INTO `matkul` VALUES ('3001', 'PWL', 'Dimas Wahyu Wibowo, ST., MT', '6', '6');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  `level` int(5) DEFAULT '1',
  `status` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'nonaktif',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'user', 'user', 'user', '2', 'aktif');
INSERT INTO `user` VALUES ('2', 'admin', 'admin', 'admin', '3', 'aktif');
INSERT INTO `user` VALUES ('4', 'unero', 'unero', 'jalan pulosari', '1', 'aktif');
INSERT INTO `user` VALUES ('5', 'dummy', 'dummy', 'dummy address', '1', 'aktif');
INSERT INTO `user` VALUES ('7', 'test', 'test', 'jalan test', '1', 'aktif');
