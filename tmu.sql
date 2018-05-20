/*
 Navicat Premium Data Transfer

 Source Server         : mysql-xampp
 Source Server Type    : MySQL
 Source Server Version : 100125
 Source Host           : 127.0.0.1:3306
 Source Schema         : tmu

 Target Server Type    : MySQL
 Target Server Version : 100125
 File Encoding         : 65001

 Date: 23/03/2018 11:28:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for absensi
-- ----------------------------
DROP TABLE IF EXISTS `absensi`;
CREATE TABLE `absensi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuti` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ijin` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `spj` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bolos` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_lembur` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kek_jam_kerja` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `weekday` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `weekend` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `holiday` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` datetime(0) NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `karyawan_nik_index`(`nik`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of karyawan
-- ----------------------------
INSERT INTO `karyawan` VALUES (1, '005.11.07', 'Bagus Winarmo', 'Manager Multimedia & Machinery', '$2y$10$DjauHkev2tenGMQOKfosreQ3Fu4d2aDuOHWLWcbs0OGNIRsI7G12G', '2018-03-23 11:27:50', NULL);
INSERT INTO `karyawan` VALUES (2, '006.11.07', 'Sudharmono', 'Spv. Enginerring Support', '$2y$10$daXuhTjFci7r9knC8nr6Q.ppNcfVhcW.zvSWk0vnYzJz7afskgtGS', '2018-03-23 11:27:50', NULL);
INSERT INTO `karyawan` VALUES (3, '007.09.08', 'Nanang Somantri', 'Spv. Corporate ADM', '$2y$10$1VAYm5ps8FV2LqcSFGLCkeG0YS2..JAXMhLpX4v5DfDiPnZsJ4oVu', '2018-03-23 11:27:50', NULL);
INSERT INTO `karyawan` VALUES (4, '008.09.08', 'Indra Kusuma', 'Spv. Finance', '$2y$10$b2Pz4F7Eztiodnh/hUPncO/3KczRHoq48/lI9Y1Ak5aPtIBRHLYGG', '2018-03-23 11:27:50', NULL);
INSERT INTO `karyawan` VALUES (5, '009.07.08', 'Elvin Mudhita', 'Spv. Information Technology', '$2y$10$KMPF2FbK5BKmBI0o/x2ma.b4a5e0ss9FyIZsC3p0rYhF5HUoL6lKq', '2018-03-23 11:27:50', NULL);
INSERT INTO `karyawan` VALUES (6, '011.04.09', 'Vian Fitri Yambodo', 'Programmer', '$2y$10$Zk.P0FaflA76VAu5aJa3YuPcoAUlbbvLS6DBFCfLY3Jk6IG4pWjIa', '2018-03-23 11:27:50', NULL);
INSERT INTO `karyawan` VALUES (7, '021.12.08', 'Amiruddin Basyari', 'Spv. Mechanical Marchinery', '$2y$10$DDP.gjxv3cocCz.fNWO1OOU2X/4eKr/fuyWbQ/HiB90bE9mAihyH2', '2018-03-23 11:27:50', NULL);
INSERT INTO `karyawan` VALUES (8, '022.12.08', 'Subardjo', 'Mechanical Engineer', '$2y$10$OiQAw02atIFXbPxk9GUbYOgFRpS29eRdm/cbbLmPaEOw8i9Tp7TEW', '2018-03-23 11:27:50', NULL);
INSERT INTO `karyawan` VALUES (9, '028.12.08', 'Abdullah Ma\'arif', 'Mechanical Engineer', '$2y$10$647lCqwQSUpIuGt.GWfKVOYR/CSWJ2TqYun4Si.fSOEuQ9i5toMIS', '2018-03-23 11:27:50', NULL);
INSERT INTO `karyawan` VALUES (10, '036.07.09', 'Kamaluddin Ramadhan', 'Animator 3D', '$2y$10$wUSPpdZ4nJjvcMlLjEj84.zr1/kwZlfC6eZI5Ijy/xr0y1jXouv6.', '2018-03-23 11:27:50', NULL);
INSERT INTO `karyawan` VALUES (11, '038.09.09', 'Bayu Nugraha', 'Spv. Multimedia', '$2y$10$TrSUaaN8nN.0BhcT5McuqekvabFuucmwLvSnhAbnw.HFERCk5P.j2', '2018-03-23 11:27:50', NULL);
INSERT INTO `karyawan` VALUES (12, '041.05.10', 'Dadi Musthapa', 'Senior 3D Animator', '$2y$10$6Qw2ky8EnfZPaJ4TP7SUMec3SecLlJPch3pT2J9UNeuJKb7iDnjKq', '2018-03-23 11:27:51', NULL);
INSERT INTO `karyawan` VALUES (13, '042.05.10', 'Eko Prasetyo', 'Sernior 2D Animator', '$2y$10$SKgmBPAzcyHgaGvRX.16WODkFGtA8SXieYoG/JO0l1JM97L9P1epa', '2018-03-23 11:27:51', NULL);
INSERT INTO `karyawan` VALUES (14, '043.12.10', 'Heriyanto Lesmono', 'Senior Programmer', '$2y$10$5gUcnkvuDv3HPhotsvTQku7q8DW4BLZlMKJNd7VHJdrCMjVDDOHKq', '2018-03-23 11:27:51', NULL);
INSERT INTO `karyawan` VALUES (15, '045.09.11', 'Wuryanto', 'Support', '$2y$10$NqVbP73vTIDcUeYaA21sqewwD4AYV3UMDQ0PuQjUQKjU8H.muUBWa', '2018-03-23 11:27:51', NULL);
INSERT INTO `karyawan` VALUES (16, '047.04.12', 'Didik Setyobudi', 'Instrumentation Eng', '$2y$10$CeH.tIoeVqEx3hLTxrZ1luVLY6qErj5G81E5KiUILuNK/feb31Tjm', '2018-03-23 11:27:51', NULL);
INSERT INTO `karyawan` VALUES (17, '048.05.12', 'Puji Trilaksono', 'General Affair', '$2y$10$3Zu.iBO/sCbcpIyZF1cPn.pZRFYgKdcP3j6krVOvkiCsYtEwh0W7C', '2018-03-23 11:27:51', NULL);
INSERT INTO `karyawan` VALUES (18, '049.05.12', 'Yusuf Rosadi', 'Accounting', '$2y$10$N0gJEZJP1Oq0TdiNr27LZOaFF/WJgDhv0vchMUe.CPlV3sBaJ8l/u', '2018-03-23 11:27:51', NULL);
INSERT INTO `karyawan` VALUES (19, '056.06.12', 'A.J. Messak', 'Animator 2D', '$2y$10$jKozEl5UMmNNyB8zcVSG7.gqZ24KEits60jGajc5rwf0cfGagX6Qm', '2018-03-23 11:27:51', NULL);
INSERT INTO `karyawan` VALUES (20, '054.11.12', 'Ade Komar', 'Animator 2D', '$2y$10$gX7jp3m9tQd9qWjBWIioSOujxmvc2QADIBg.p9iyNRwUDUpJw1sQi', '2018-03-23 11:27:51', NULL);
INSERT INTO `karyawan` VALUES (21, '055.12.12', 'Suryana', 'Spv. Instrumentation', '$2y$10$QYUoMqAHyHSEzxKweaSFue3/JitHOMnV/d2vYMdFeanR1H4kHS6qW', '2018-03-23 11:27:51', NULL);
INSERT INTO `karyawan` VALUES (22, '056.12.12', 'Hendrik Timotius', 'Logistic', '$2y$10$YaR6diVNGEqb3Fw5aPDywe9S23fc.cuGXOPgmoMV5pMqBMmio0Pk2', '2018-03-23 11:27:51', NULL);
INSERT INTO `karyawan` VALUES (23, '059.03.13', 'Dodik Mailairi', 'Support', '$2y$10$6u6q3cxYBiAq/1WqAXg0tOF49TlAp7JDCKzeprBrLlJvctPKgQZ2a', '2018-03-23 11:27:51', NULL);
INSERT INTO `karyawan` VALUES (24, '060.03.11', 'Triana Putra Aprijanto', 'Mechanical Technician', '$2y$10$FRUOOhXW8ueq.GafrB77Xe6yTcF./lxgwFBFQaBnYyjjC0ficMNXS', '2018-03-23 11:27:52', NULL);
INSERT INTO `karyawan` VALUES (25, '061.04.13', 'Yudha Wangsamenggala', 'PLC Programmer', '$2y$10$rNHPdL4/AIA7xLRL3/fnNeZbvVfn8NIkfQmrIwnO7Q11VYIWUZ2Vu', '2018-03-23 11:27:52', NULL);
INSERT INTO `karyawan` VALUES (26, '063.05.13', 'Nenah Rosmini', 'Mechanical Engineer', '$2y$10$gyKvXvGst1l5bkhiyWiBVuiR0gmcEa9QfPNmF22g6vKH1oC7sE9ru', '2018-03-23 11:27:52', NULL);
INSERT INTO `karyawan` VALUES (27, '064.05.13', 'Edo Ahmad Murtado', 'Mechanical Engineer', '$2y$10$si7EtZKeQNXy4wln0M/C4.H1H9WIag4FsP9RURiqDD0bHT6m20Roq', '2018-03-23 11:27:52', NULL);
INSERT INTO `karyawan` VALUES (28, '065.05.13', 'Wawan Setiawan', 'Mechanical Engineer', '$2y$10$6/5BkrikGsu4haUvJuEQwOKRZ3UsgRmDWn3LkdnnqrheYcw4758k6', '2018-03-23 11:27:52', NULL);
INSERT INTO `karyawan` VALUES (29, '069.09.13', 'Rully Shara Monica', 'Accounting', '$2y$10$SKWsUheMWKzh89BO6QoNLuzIctgKfsCAZ3OKvylySg1qVxP5kPX9K', '2018-03-23 11:27:52', NULL);
INSERT INTO `karyawan` VALUES (30, '070.11.13', 'M. Hamzah', 'Mechanical Engineer', '$2y$10$rZVquU5EC3nGRoIHpP6RQOeIa8S9EIbtWY6RiUZ.hGYlKhRHSCNWu', '2018-03-23 11:27:52', NULL);
INSERT INTO `karyawan` VALUES (31, '071.02.14', 'Budiharto', 'Instrumentation Tech', '$2y$10$KYzsmVHVPiJkLiz1DPV7feF1S/DypDIxv2WSJZRi/eCONoQ7Hgsd2', '2018-03-23 11:27:52', NULL);
INSERT INTO `karyawan` VALUES (32, '072.02.14', 'Gatot Eko S Wibowo', 'Animator 3D', '$2y$10$SlCuEYJh8uYrhQI4GoLSHuSGehzEPAQyI1DAlaHhKM4.pDzUzYm1i', '2018-03-23 11:27:52', NULL);
INSERT INTO `karyawan` VALUES (33, '077.06.14', 'Hafidz Faizal', 'Logistic', '$2y$10$V5anEj0H.Z/15azna047XOV4afkq/CViUgywKR5afcQTn4FIAegdK', '2018-03-23 11:27:52', NULL);
INSERT INTO `karyawan` VALUES (34, '079.08.14', 'Soleh', 'Drafter', '$2y$10$64Yplzpwve8u5AciFjyfZORjIebnAEDeMb8Tes/nXfNCeX.GQZgZ6', '2018-03-23 11:27:52', NULL);
INSERT INTO `karyawan` VALUES (35, '080.08.14', 'Dinar Tiara', 'Instrumentation Eng', '$2y$10$32ApG5SyxGwpa3YnLYFb/O/qMaiBP78TyOExZtTsfEg30hEtxkMsq', '2018-03-23 11:27:53', NULL);
INSERT INTO `karyawan` VALUES (36, '081.02.15', 'Asep Abdurohman', 'Programmer', '$2y$10$AUhLFmOQr/SbqCcv4RgcQuBHSSaHZi7PqCHHNdkibijnNTYGoSJcy', '2018-03-23 11:27:53', NULL);
INSERT INTO `karyawan` VALUES (37, '082.02.15', 'Ahmad Siswanto', 'Programmer 3D', '$2y$10$LhOet2jbAxZRyeglqOrW8uVN/lETrB5lyLWByJfXH03M.Oj1kLeS2', '2018-03-23 11:27:53', NULL);
INSERT INTO `karyawan` VALUES (38, '084.06.15', 'Andri Krisna Senjaya', 'Sekretaris', '$2y$10$YxQQvkj9B5FaeElg.EZW9.gs.kOxmrSrt7Y5Ivb1HTOAXbQQDAXxC', '2018-03-23 11:27:53', NULL);
INSERT INTO `karyawan` VALUES (39, '085.06.15', 'Dhira Ramadhan R', 'Mechanical Technician', '$2y$10$ySW/q.rTG40ndAAsS0wrF.KLTmV0.9Z/aYi93G2OfySx96jvCJI5a', '2018-03-23 11:27:53', NULL);
INSERT INTO `karyawan` VALUES (40, '086.06.15', 'Feri Ferdiana Setiasaputra', 'Instrumentation/Electrical Eng', '$2y$10$HTKzm8LMdM7Q1SCBoVxKo.nnycRo0vdNsZjwuABuK/Fwm68Kwquay', '2018-03-23 11:27:53', NULL);
INSERT INTO `karyawan` VALUES (41, '087.06.15', 'Ela Nurhayati', 'Programmer', '$2y$10$3oWyt0hFd20tuMq5bSROkugRQsAluAamYSRS1YR.XnRcf/Fseabo6', '2018-03-23 11:27:53', NULL);
INSERT INTO `karyawan` VALUES (42, '088.06.15', 'Heri Hermawan', 'Programmer', '$2y$10$BsytwejnG00puXueIe2rs..fuRRaHRun4ObVhK8SPH1bGGvza/TEC', '2018-03-23 11:27:53', NULL);
INSERT INTO `karyawan` VALUES (43, '090.09.15', 'Agus Hermawan', 'Programmer', '$2y$10$.7.Hs2P/TZTl3LUqxaKur.JHI7UBfORM7DD85X6EGVKAX//ZBAwTq', '2018-03-23 11:27:53', NULL);
INSERT INTO `karyawan` VALUES (44, '091.01.15', 'Nisa Fusti Manikam', 'Programmer', '$2y$10$BN.TBHn13M.LPaeJWApYP.x5Tfq9Xc74ml8mpaON0ErP1aYQo6Dti', '2018-03-23 11:27:53', NULL);
INSERT INTO `karyawan` VALUES (45, '092.10.15', 'Dede Sutaryat', 'Instrumentation/Electrical Eng', '$2y$10$DmUmfhDtaBStawThS5tVJetqSqp9RsDSLpzVJNtvUlm44F7rENGGi', '2018-03-23 11:27:53', NULL);
INSERT INTO `karyawan` VALUES (46, '093.03.16', 'Dani Gunawan', 'Support/OB Workshop', '$2y$10$CDvhywd9CMINMizeA6hBbejm/s59L5wtd6WbXx9qm7W3kMVaMwfRW', '2018-03-23 11:27:54', NULL);
INSERT INTO `karyawan` VALUES (47, '079.08.14', 'Fitra Susanto', 'Mechanical Technician', '$2y$10$6VRJS52CYp421fTMQqE6LufS6Tda/RVJC.YxR60rEqMWM9FFWrSMq', '2018-03-23 11:27:54', NULL);
INSERT INTO `karyawan` VALUES (48, '097.10.16', 'Trisnandi', 'Administration', '$2y$10$o1nehRq2fKILe40/0dxJV.cAqZHV.Qjgm0QQGjK37lzdduILsXG.O', '2018-03-23 11:27:54', NULL);
INSERT INTO `karyawan` VALUES (49, '083.04.15', 'Sopian', 'Mechanical Technician', '$2y$10$1GetgulmgJx.LkLG1vZtd.VF9keAf5OYUcHdgQBJJkEkXyyUfsndG', '2018-03-23 11:27:54', NULL);
INSERT INTO `karyawan` VALUES (50, '099.12.16', 'Adi Sulaiman', 'Animator 2D', '$2y$10$C9io463IZX3TqrWHP61gh.YqacstxVnRFu3QbJMh7UPlXIj.qWjtK', '2018-03-23 11:27:54', NULL);
INSERT INTO `karyawan` VALUES (51, '100.02.17', 'Sinta Noviana', 'Animator 2D', '$2y$10$5IvQXoETsniJRtuPcmKTMulccmChgYLRx6JT5do2NqlWkFa0rJeYG', '2018-03-23 11:27:54', NULL);
INSERT INTO `karyawan` VALUES (52, '102.03.17', 'Herman', 'Animator 2D', '$2y$10$qmT8LK7ys5pfCKU9wTnAzudCt5eCVWH6m0w.hDw.tW.fSaNRlxpuS', '2018-03-23 11:27:54', NULL);
INSERT INTO `karyawan` VALUES (53, '103.05.17', 'Dani Setiawan', 'Animator 3D', '$2y$10$qvMhNkwH8TCxTQVDxqCZLuHxbIRcnBkoHuC9lP0I726PIeXh6tifq', '2018-03-23 11:27:54', NULL);
INSERT INTO `karyawan` VALUES (54, '104.07.17', 'Yudha Dwi Pangestu', 'Subject Matter Expert', '$2y$10$..jNT26F14Qj/Ij21W33BO7PXj7dFpi/uz7Gi.o8LGqXy9wBFvYp.', '2018-03-23 11:27:54', NULL);
INSERT INTO `karyawan` VALUES (55, '105.07.17', 'Randi Pramayuda', 'Mechanical Technician', '$2y$10$CIZ9.SP7nMaeuB/pAN.GPei2qA88qBg/9ViJtUw1KqmTXKYVGvLKC', '2018-03-23 11:27:54', NULL);
INSERT INTO `karyawan` VALUES (56, '095.10.16', 'Dadi Mulyadi', 'Subject Matter Expert', '$2y$10$jZS3LsSx/qWeU8ds9GtoCOa2p5hQo29sA3NtbqB25gImlA4GgYLdK', '2018-03-23 11:27:54', NULL);
INSERT INTO `karyawan` VALUES (57, '096.10.16', 'Marga Sanjaya', 'Realtime Programmer', '$2y$10$ZrrtGQraScbPqeECMhY2Qeoz6.R7OjXeNtByuifc725ggteBsU7Le', '2018-03-23 11:27:54', NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 62 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (57, '2018_01_23_124012_create_karyawan_table', 1);
INSERT INTO `migrations` VALUES (58, '2018_01_24_032058_create_penggajian_table', 1);
INSERT INTO `migrations` VALUES (59, '2018_01_28_102655_create_absensi_table', 1);
INSERT INTO `migrations` VALUES (60, '2018_02_02_233853_create_pengguna_table', 1);
INSERT INTO `migrations` VALUES (61, '2018_02_23_090902_create_upload_table', 1);

-- ----------------------------
-- Table structure for penggajian
-- ----------------------------
DROP TABLE IF EXISTS `penggajian`;
CREATE TABLE `penggajian`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji_pokok` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kinerja` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `makan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `transport` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `lembur` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `rapel_iso` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bpjs_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bpjs_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pinjaman` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kehadiran` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kekurangan_jam_kerja` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `premi_ketenaga_kerjaan_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `premi_kesehatan_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `premi_ketenaga_kerjaan_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `premi_kesehatan_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pembulatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `periode` datetime(0) NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES (1, 'Finance Department', 'finance@technomulti.co.id', '$2y$10$vQAGVSY.9Sza/LONzYfJ5OXVcJoVnSL2Rv9V9JhA23a8rgPg3Gk.q', '2018-03-23 11:27:55', '2018-03-23 11:27:55');

-- ----------------------------
-- Table structure for upload
-- ----------------------------
DROP TABLE IF EXISTS `upload`;
CREATE TABLE `upload`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` datetime(0) NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
