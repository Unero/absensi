/*
Navicat MySQL Data Transfer

Source Server         : AMPPS
Source Server Version : 80018
Source Host           : localhost:3306
Source Database       : absensi

Target Server Type    : MYSQL
Target Server Version : 80018
File Encoding         : 65001

Date: 2020-03-07 19:22:27
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
  `waktu_masuk` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `matkul` (`matkul`),
  KEY `mahasiswa` (`mahasiswa`),
  KEY `dosen-abs` (`dosen`),
  CONSTRAINT `dosen-abs` FOREIGN KEY (`dosen`) REFERENCES `dosen` (`nip`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `mahasiswa` FOREIGN KEY (`mahasiswa`) REFERENCES `mahasiswa` (`nim`),
  CONSTRAINT `matkul` FOREIGN KEY (`matkul`) REFERENCES `matkul` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Table structure for dosen
-- ----------------------------
DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
  `nip` int(50) NOT NULL,
  `nama_dosen` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`nip`),
  KEY `nama` (`nama_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=1005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Table structure for matkul
-- ----------------------------
DROP TABLE IF EXISTS `matkul`;
CREATE TABLE `matkul` (
  `id` int(50) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_dosen` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sks` int(10) DEFAULT NULL,
  `jam` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nama` (`nama`),
  KEY `dosen` (`nama_dosen`),
  CONSTRAINT `dosen` FOREIGN KEY (`nama_dosen`) REFERENCES `dosen` (`nama_dosen`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
