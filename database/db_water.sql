/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_water

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 10/07/2024 01:17:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_anggota
-- ----------------------------
DROP TABLE IF EXISTS `tb_anggota`;
CREATE TABLE `tb_anggota`  (
  `id_anggota` int NOT NULL AUTO_INCREMENT,
  `id_kk` int NOT NULL,
  `id_pend` int NOT NULL,
  `hubungan` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_anggota`) USING BTREE,
  INDEX `tb_anggota_ibfk_1`(`id_pend` ASC) USING BTREE,
  INDEX `id_kk`(`id_kk` ASC) USING BTREE,
  CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_pend`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_anggota
-- ----------------------------
INSERT INTO `tb_anggota` VALUES (14, 9, 23, 'Istri');
INSERT INTO `tb_anggota` VALUES (15, 9, 29, 'Anak');
INSERT INTO `tb_anggota` VALUES (16, 12, 32, 'Kepala Keluarga');

-- ----------------------------
-- Table structure for tb_datang
-- ----------------------------
DROP TABLE IF EXISTS `tb_datang`;
CREATE TABLE `tb_datang`  (
  `id_datang` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_datang` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jekel` enum('LK','PR') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_datang` date NOT NULL,
  `pelapor` int NOT NULL,
  `nik_pelapor` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_pelapor` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jekel_pelapor` enum('LK','PR') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_datang`) USING BTREE,
  INDEX `pelapor`(`pelapor` ASC) USING BTREE,
  CONSTRAINT `tb_datang_ibfk_1` FOREIGN KEY (`pelapor`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_datang
-- ----------------------------
INSERT INTO `tb_datang` VALUES (3, '30282379', 'Pulan Pendatang 1', 'LK', '2024-07-07', 24, '51023010231020', 'Femi', 'LK');
INSERT INTO `tb_datang` VALUES (4, '302723897', 'Pulan pendatang 2', 'LK', '2024-07-06', 25, '839829398', 'Bima Ega F.', 'LK');
INSERT INTO `tb_datang` VALUES (5, '8972397', 'Pulan pendatang 3', 'PR', '2024-07-05', 28, '328982798', 'Data Warga 3', 'LK');
INSERT INTO `tb_datang` VALUES (7, '23982398', 'gijweogiwj', 'LK', '2024-07-10', 24, '51023010231020', 'Femi', 'LK');
INSERT INTO `tb_datang` VALUES (8, '3928732987', 'Bima Pendatang', 'LK', '2024-07-10', 32, '389223987', 'giowejgoiwe', 'LK');

-- ----------------------------
-- Table structure for tb_kk
-- ----------------------------
DROP TABLE IF EXISTS `tb_kk`;
CREATE TABLE `tb_kk`  (
  `id_kk` int NOT NULL AUTO_INCREMENT,
  `no_kk` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kepala` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `desa` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rt` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rw` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kec` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kab` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `prov` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `file_kk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_kk
-- ----------------------------
INSERT INTO `tb_kk` VALUES (9, '32923889', 'Mas Jito', 'Alamat mas jito', '04', '05', 'Kisaran', 'Asahan', 'Sumatera Utara', 'default.png');
INSERT INTO `tb_kk` VALUES (11, '3202839', 'Sutejo', 'alamatt sutejo', '04', '05', 'Kisaran', 'Asahan', 'Sumatera Utara', '1720409995_OLQE6F0.jpg');
INSERT INTO `tb_kk` VALUES (12, '389027', 'owjgpowj', 'ojgpojpo', '83', '8', 'goiwejgio', 'iojgowj', 'iojoig', '1720412518_image.png');

-- ----------------------------
-- Table structure for tb_lahir
-- ----------------------------
DROP TABLE IF EXISTS `tb_lahir`;
CREATE TABLE `tb_lahir`  (
  `id_lahir` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_kk` int NOT NULL,
  PRIMARY KEY (`id_lahir`) USING BTREE,
  INDEX `id_kk`(`id_kk` ASC) USING BTREE,
  CONSTRAINT `tb_lahir_ibfk_1` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_lahir
-- ----------------------------

-- ----------------------------
-- Table structure for tb_mendu
-- ----------------------------
DROP TABLE IF EXISTS `tb_mendu`;
CREATE TABLE `tb_mendu`  (
  `id_mendu` int NOT NULL AUTO_INCREMENT,
  `id_pdd` int NOT NULL,
  `tgl_mendu` date NOT NULL,
  `sebab` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_mendu`) USING BTREE,
  INDEX `id_pdd`(`id_pdd` ASC) USING BTREE,
  CONSTRAINT `tb_mendu_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_mendu
-- ----------------------------

-- ----------------------------
-- Table structure for tb_pdd
-- ----------------------------
DROP TABLE IF EXISTS `tb_pdd`;
CREATE TABLE `tb_pdd`  (
  `id_pend` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tempat_lh` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('Laki-Laki','Perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `desa` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `blok` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nomor_rumah` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rt` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rw` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_kepemilikan` enum('Rumah Sendiri','Kontrak') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `agama` enum('Islam','Kristen Protestan','Kristen Katolik','Hindu','Buddha','Konghucu') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pekerjaan` enum('Guru','Dosen','Dokter','Perawat','Pengacara','Notaris','Wiraswasta/Pengusaha','Karyawan Swasta','PNS','Polisi','TNI','Teknisi','Buruh','Petani/Nelayan','Seniman/Artis','Freelance','Driver','Pekerja Sosial','Arsitek','Peneliti','Konsultan','Pekerja Tambang','Pemadam Kebakaran','Pegawai BUMN (ASN)','Vlogger/Content Creator','Tidak Bekerja','Mahasiswa/Pelajar') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_perkawinan` enum('Menikah','Lajang (Belum Menikah)','Cerai Mati','Cerai Hidup') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kewarganegaraan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` enum('Ada','Meninggal','Pindah') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `file_ktp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pend`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pdd
-- ----------------------------
INSERT INTO `tb_pdd` VALUES (23, '52103021001310', 'Rendi', '0857712737121', 'Jakarta', '1999-07-05', 'Laki-Laki', 'Jl. Pisangan Baru Tengah', 'A', '20', '04', '12', 'Rumah Sendiri', 'Islam', 'Dosen', 'Menikah', 'Indonesia', 'Pindah', '2024-07-07 18:21:10', '2024-07-07 18:21:10', 'default.png');
INSERT INTO `tb_pdd` VALUES (24, '51023010231020', 'Femi', '0857127912999', 'Jakarta', '2006-02-05', 'Laki-Laki', 'Jl. Jakarta Timur', 'A', '20', '10', '20', 'Rumah Sendiri', 'Islam', 'Perawat', 'Menikah', 'Indonesia', 'Pindah', '2024-07-07 17:50:52', '2024-07-07 17:50:52', 'default.png');
INSERT INTO `tb_pdd` VALUES (25, '839829398', 'Bima Ega F.', '83029823', 'Kisaran', '1999-04-05', 'Laki-Laki', 'alamat asli', '04', '05', '04', '03', 'Rumah Sendiri', 'Islam', 'Guru', 'Menikah', 'Indonesia', 'Pindah', '2024-07-07 18:21:28', '2024-07-07 18:21:28', 'default.png');
INSERT INTO `tb_pdd` VALUES (26, '3223987', 'Warga 1', '309829', 'kisaran', '1999-05-04', 'Laki-Laki', 'alamt warga 1', '04', '05', '06', '10', 'Rumah Sendiri', 'Islam', 'Guru', 'Menikah', 'Indonesia', 'Pindah', '2024-07-07 17:49:07', '2024-07-07 17:49:07', 'default.png');
INSERT INTO `tb_pdd` VALUES (28, '328982798', 'Data Warga 3', '832920723987', 'Tempat lahir data warga 3', '1999-05-04', 'Laki-Laki', 'Alamat data warga 3', '04', '05', '07', '08', 'Rumah Sendiri', 'Islam', 'Guru', 'Menikah', 'Indonesia', 'Pindah', '2024-07-07 17:52:16', '2024-07-07 17:52:16', 'default.png');
INSERT INTO `tb_pdd` VALUES (29, '2389237', 'Warga Tetap 1', '8907239', 'Kisaran', '1999-04-05', 'Laki-Laki', 'Alamat Warga Tetap 1', '04', '05', '09', '10', 'Rumah Sendiri', 'Islam', 'Perawat', 'Menikah', 'Indonesia', 'Ada', '2024-07-07 23:07:00', '2024-07-07 23:07:00', '1720409040_OLQE6F0.jpg');
INSERT INTO `tb_pdd` VALUES (30, '8973289', 'Warga Tetap 2', '0928732897', 'Kisaran', '1999-05-04', 'Laki-Laki', 'Alamat Warga Tetap 2', '05', '08', '87', '08', 'Rumah Sendiri', 'Islam', 'Dokter', 'Menikah', 'Indonesia', 'Ada', '2024-07-07 23:07:00', '2024-07-07 23:07:00', 'default.png');
INSERT INTO `tb_pdd` VALUES (31, '2903298', 'Warga Tetap 3', '382098237987', 'Kisaran', '1999-05-04', 'Laki-Laki', 'Alamat Warga Tetap 3', '05', '99', '88', '87', 'Rumah Sendiri', 'Islam', 'Guru', 'Menikah', 'Indonesia', 'Ada', '2024-07-07 23:07:00', '2024-07-07 23:07:00', 'default.png');
INSERT INTO `tb_pdd` VALUES (32, '389223987', 'giowejgoiwe', '893792837', 'ogiwgjwe', '1999-05-04', 'Laki-Laki', 'alamat goiwjeoig', '038', '897', '8', '98', 'Rumah Sendiri', 'Islam', 'Guru', 'Menikah', 'Indonesia', 'Ada', '2024-07-08 09:07:00', '2024-07-08 09:07:00', 'default.png');
INSERT INTO `tb_pdd` VALUES (33, '2389732987', 'oiweejgio', '807987', 'weigoji', '1999-05-04', 'Laki-Laki', 'gwejgoiwej', '040', '05', '08', '88', 'Rumah Sendiri', 'Islam', 'Guru', 'Menikah', 'Indonesia', 'Ada', '2024-07-08 11:07:00', '2024-07-08 11:07:00', '1720412487_OLQE6F0.jpg');

-- ----------------------------
-- Table structure for tb_pengguna
-- ----------------------------
DROP TABLE IF EXISTS `tb_pengguna`;
CREATE TABLE `tb_pengguna`  (
  `id_pengguna` int NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` enum('Administrator','Kaur Pemerintah') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pengguna`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pengguna
-- ----------------------------
INSERT INTO `tb_pengguna` VALUES (1, 'Syahrial', 'admin', 'admin', 'Administrator');
INSERT INTO `tb_pengguna` VALUES (3, 'Rubbama', 'admin2', 'admin2', 'Kaur Pemerintah');

-- ----------------------------
-- Table structure for tb_pindah
-- ----------------------------
DROP TABLE IF EXISTS `tb_pindah`;
CREATE TABLE `tb_pindah`  (
  `id_pindah` int NOT NULL AUTO_INCREMENT,
  `id_pdd` int NOT NULL,
  `tgl_pindah` date NOT NULL,
  `alasan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pindah`) USING BTREE,
  INDEX `id_pdd`(`id_pdd` ASC) USING BTREE,
  CONSTRAINT `tb_pindah_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pindah
-- ----------------------------
INSERT INTO `tb_pindah` VALUES (3, 26, '2024-07-07', 'Because there is a place that more beautifull');
INSERT INTO `tb_pindah` VALUES (4, 24, '2024-07-04', 'Because this people migration to swiss to see a vi');
INSERT INTO `tb_pindah` VALUES (5, 28, '2024-07-17', 'I have mistake today sister');
INSERT INTO `tb_pindah` VALUES (6, 23, '2024-07-09', 'Because borring');
INSERT INTO `tb_pindah` VALUES (7, 25, '2024-07-07', 'Because migrate to london');

-- ----------------------------
-- Table structure for tb_surat_domisili
-- ----------------------------
DROP TABLE IF EXISTS `tb_surat_domisili`;
CREATE TABLE `tb_surat_domisili`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tb_pdd_id` int NOT NULL,
  `alasan_buat_surat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tujuan_buat_surat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `tb_pdd_id`(`tb_pdd_id` ASC) USING BTREE,
  CONSTRAINT `tb_surat_domisili_ibfk_1` FOREIGN KEY (`tb_pdd_id`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_surat_domisili
-- ----------------------------
INSERT INTO `tb_surat_domisili` VALUES (1, 31, 'Alasan Buat Surat 1', 'Tujuan Buat Surat 1 Edit', '030/PWT/VI/2024');
INSERT INTO `tb_surat_domisili` VALUES (2, 31, 'Alasan Buat Surat 2', 'Tujuan Buat Surat 2 Edit\n', '031/PWT/VI/2024');
INSERT INTO `tb_surat_domisili` VALUES (3, 30, 'Alasan Buat Surat 3', 'Tujuan Buat Surat 3', '032/PWT/VI/2024');
INSERT INTO `tb_surat_domisili` VALUES (4, 31, 'Alasan Buat Surat 4', 'Tujuan Buat Surat 4', '033/PWT/VI/2024');
INSERT INTO `tb_surat_domisili` VALUES (5, 29, 'Alasan Buat Surat 2', 'Tujuan Buat Surat 2', '034/PWT/VI/2024');
INSERT INTO `tb_surat_domisili` VALUES (8, 30, 'oiwejgewoij', 'oigjwoigjewo', '035/PWT/VI/2024');
INSERT INTO `tb_surat_domisili` VALUES (9, 29, 'ogiwegowenoiwenio', 'oignweeoignowienio', '036/PWT/VI/2024');
INSERT INTO `tb_surat_domisili` VALUES (12, 30, '9gjweoigwje', 'iogjigwe', '037/PWT/VI/2024');
INSERT INTO `tb_surat_domisili` VALUES (13, 30, 'iogjwoigj', 'oijgoiwejg', '038/PWT/VI/2024');
INSERT INTO `tb_surat_domisili` VALUES (14, 31, 'rogiwj', 'oigjweiogjwe\n', '039/PWT/VI/2024');
INSERT INTO `tb_surat_domisili` VALUES (15, 31, 'Alasan: Ingin tes aplikasi ini', 'Tujuan: Ingin tes aplikasi ini', '040/PWT/VI/2024');
INSERT INTO `tb_surat_domisili` VALUES (16, 33, 'Alasan testing', 'Tujuan Testing', '041/PWT/VII/2024');

SET FOREIGN_KEY_CHECKS = 1;
