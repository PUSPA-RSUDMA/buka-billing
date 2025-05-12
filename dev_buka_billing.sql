/*
 Navicat Premium Dump SQL

 Source Server         : development
 Source Server Type    : MySQL
 Source Server Version : 50744 (5.7.44-log)
 Source Host           : 192.168.34.224:3306
 Source Schema         : dev_buka_billing

 Target Server Type    : MySQL
 Target Server Version : 50744 (5.7.44-log)
 File Encoding         : 65001

 Date: 12/05/2025 15:30:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for alasans
-- ----------------------------
DROP TABLE IF EXISTS `alasans`;
CREATE TABLE `alasans`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `alasans_label_unique`(`label`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of alasans
-- ----------------------------
INSERT INTO `alasans` VALUES (1, 'Direktur', NULL, NULL);
INSERT INTO `alasans` VALUES (2, 'Casemix', NULL, NULL);
INSERT INTO `alasans` VALUES (3, 'Ruangan', NULL, NULL);

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache
-- ----------------------------
INSERT INTO `cache` VALUES ('laravel_cache_admin@mail.com|127.0.0.1', 'i:1;', 1746862410);
INSERT INTO `cache` VALUES ('laravel_cache_admin@mail.com|127.0.0.1:timer', 'i:1746862410;', 1746862410);

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cancelled_at` int(11) NULL DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of job_batches
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2025_05_08_021028_create_alasans_table', 2);
INSERT INTO `migrations` VALUES (5, '2025_05_08_021949_create_permintaans_table', 2);
INSERT INTO `migrations` VALUES (6, '2025_05_08_012927_create_permission_tables', 3);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 2);
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 3);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 4);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 5);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------
INSERT INTO `password_reset_tokens` VALUES ('bulyan@app.com', '$2y$12$uF4gFBdIUyJPOW23MnYL1eD6isztLEYplUzTnA4G85yoB93qnJwTG', '2025-05-08 01:08:37');

-- ----------------------------
-- Table structure for permintaans
-- ----------------------------
DROP TABLE IF EXISTS `permintaans`;
CREATE TABLE `permintaans`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_register` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `perubahan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('baru','proses','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'baru',
  `alasan_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `processed_by` int(11) NULL DEFAULT NULL,
  `processed_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `permintaans_alasan_id_foreign`(`alasan_id`) USING BTREE,
  CONSTRAINT `permintaans_alasan_id_foreign` FOREIGN KEY (`alasan_id`) REFERENCES `alasans` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permintaans
-- ----------------------------
INSERT INTO `permintaans` VALUES (8, '31721', '<p>Tindakan :</p><p>Farmasi :</p><p>Askep :</p><p>Radiologi :</p><p>Lab :</p><p>Lainnya :</p>', 'selesai', 1, 4, '2025-05-08 06:16:18', '2025-05-08 08:02:27', 0, NULL);
INSERT INTO `permintaans` VALUES (9, '31721', '<p>Tindakan :</p><p>Farmasi :</p><p>Askep :</p><p>Radiologi :</p><p>Lab :</p><p>Lainnya :</p>', 'selesai', 2, 4, '2025-05-08 06:16:37', '2025-05-08 08:04:02', 0, NULL);
INSERT INTO `permintaans` VALUES (10, '31721', '<p>Tindakan :</p><p>Farmasi :</p><p>Askep :</p><p>Radiologi :</p><p>Lab :</p><p>Lainnya :</p>', 'selesai', 1, 4, '2025-05-08 06:16:47', '2025-05-08 06:16:47', 0, NULL);
INSERT INTO `permintaans` VALUES (11, '31721', '<p>Tindakan :</p><p>Farmasi :</p><p>Askep :</p><p>Radiologi :</p><p>Lab :</p><p>Lainnya :</p>', 'selesai', 3, 4, '2025-05-08 06:16:54', '2025-05-10 07:40:36', 4, '2025-05-10 07:40:36');
INSERT INTO `permintaans` VALUES (12, '31721', '<p>Tindakan :</p><p>Farmasi :</p><p>Askep :</p><p>Radiologi :</p><p>Lab :</p><p>Lainnya :</p>', 'baru', 1, 5, '2025-05-08 06:17:05', '2025-05-08 06:17:05', 0, NULL);
INSERT INTO `permintaans` VALUES (13, '31721', '<p>Tindakan :</p><p>Farmasi :</p><p>Askep :</p><p>Radiologi :</p><p>Lab :</p><p>Lainnya :</p>', 'baru', 2, 5, '2025-05-08 06:17:18', '2025-05-08 06:17:18', 0, NULL);
INSERT INTO `permintaans` VALUES (14, '31721', '<p>Tindakan :</p><p>Farmasi :</p><p>Askep :</p><p>Radiologi :</p><p>Lab :</p><p>Lainnya :</p>', 'baru', 2, 5, '2025-05-08 06:17:27', '2025-05-08 06:17:27', 0, NULL);
INSERT INTO `permintaans` VALUES (15, '31721', '<p>Tindakan :</p><p>Farmasi :</p><p>Askep :</p><p>Radiologi :</p><p>Lab :</p><p>Lainnya :</p>', 'baru', 3, 3, '2025-05-08 06:17:35', '2025-05-08 06:17:35', 0, NULL);
INSERT INTO `permintaans` VALUES (16, '31721', '<p>Tindakan :</p><p>Farmasi :</p><p>Askep :</p><p>Radiologi :</p><p>Lab :</p><p>Lainnya :</p>', 'proses', 2, 3, '2025-05-08 06:17:43', '2025-05-12 05:33:08', 2, '2025-05-12 05:33:08');
INSERT INTO `permintaans` VALUES (23, '31721', '<p>Tindakan :safdasdf</p><p>Farmasi :safda</p><p>Askep :asdfasdf</p><p>Radiologi :sfdasdf</p><p>Lab :sadfasdfs</p><p>Lainnya :safdas</p>', 'selesai', 1, 3, '2025-05-08 07:56:09', '2025-05-08 07:56:14', 0, NULL);
INSERT INTO `permintaans` VALUES (24, '31721', '<p>Tindakan :</p><p>Farmasi :</p><p>Askep :</p><p>Radiologi :</p><p>Lab :</p><p>Lainnya :</p>', 'selesai', 3, 3, '2025-05-08 08:03:51', '2025-05-12 05:32:18', 2, '2025-05-12 05:32:13');
INSERT INTO `permintaans` VALUES (25, '45343', '<p>Tindakan :</p><p>Farmasi :</p><p>Askep :</p><p>Radiologi :</p><p>Lab :</p><p>Lainnya :</p>', 'selesai', 1, 3, '2025-05-08 08:09:30', '2025-05-12 05:32:19', 2, '2025-05-12 05:31:19');
INSERT INTO `permintaans` VALUES (27, '123123', '<p>Tindakan :</p><p>Farmasi :</p><p>Askep :</p><p>Radiologi :</p><p>Lab :</p><p>Lainnya :</p>', 'selesai', 1, 2, '2025-05-08 08:23:08', '2025-05-09 00:35:17', 0, NULL);
INSERT INTO `permintaans` VALUES (28, '31721', '<p>Tindakan :sdafsad</p><p>Farmasi :fsadfas</p><p>Askep :fsdafasd</p><p>Radiologi :sdafasdf</p><p>Lab :safasdf</p><p>Lainnya :safasdf</p>', 'selesai', 2, 3, '2025-05-10 07:35:26', '2025-05-10 07:36:04', 3, '2025-05-10 07:36:04');
INSERT INTO `permintaans` VALUES (29, '65744', '<p>Tindakan :fgdhdf</p><p>Farmasi :fdhfhf</p><p>Askep :dfdh</p><p>Radiologi :fhdh</p><p>Lab :fdhfdh</p><p>Lainnya :fdhgdfh</p>', 'selesai', 2, 3, '2025-05-10 07:37:35', '2025-05-12 05:31:15', 2, '2025-05-12 05:25:04');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name`, `guard_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name`, `guard_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', 'web', NULL, NULL);
INSERT INTO `roles` VALUES (2, 'user', 'web', NULL, NULL);

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id`) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('nEaYW78pu7xCUcRx1XbO8BclzLkhi95yVksFVRp0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia2dUaDg5WHNuVlNRQVJ1SWtDVDg5V0JDSkF4Z3NXMFZVSmRsSW52YSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo3NDoiaHR0cHM6Ly9idWthLWJpbGxpbmcudGVzdC9wZXJtaW50YWFuP2FsYXNhbl9pZD0mc3RhdHVzPSZ0YW5nZ2FsPTIwMjUtMDUtMDgiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMToiaHR0cHM6Ly9idWthLWJpbGxpbmcudGVzdC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1747021871);
INSERT INTO `sessions` VALUES ('yWnjm7WpvQdyjJF4is8wXZls5lguxgB2bDUTgo9f', 4, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 8.0.0; SM-G955U Build/R16NW) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWVl5WWJJUmh6bG9hTndMRHNRU0RObDZ5Uk1OcDdKTjFPZG1iSWRvbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vYnVrYS1iaWxsaW5nLnRlc3QvcGVybWludGFhbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1747028688);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Test User', 'test@example.com', '2025-05-07 02:45:11', '$2y$12$h2kMH1Wlhuh5cn80RwD.Q.KdsKfYZYHOhfhSOe1c5hclM5sjuw.Da', 'StosW7elhU', '2025-05-07 02:45:11', '2025-05-07 02:45:11');
INSERT INTO `users` VALUES (2, 'bulyan', 'bulyan@app.com', NULL, '$2y$12$GQSS0wYEwt2M3zhoYfLriO4RADiQo0t9aDy0UUFS6npY9Zzp/zSke', NULL, '2025-05-07 03:03:07', '2025-05-07 03:03:07');
INSERT INTO `users` VALUES (3, 'admin', 'admin@gmail.com', NULL, '$2y$12$XFvQZWO1ViaAKUFbg94Jp.D3rn8yo7gF.QdN7t8zblZlORIC8j5Au', NULL, '2025-05-08 03:27:07', '2025-05-08 03:27:07');
INSERT INTO `users` VALUES (4, 'rina', 'rina@app.com', NULL, '$2y$12$OocnRdray6bsonlmO50I/Oqy1y9xrkoRVlfM7DQDE.lm/r4tV8FMW', NULL, '2025-05-09 08:30:12', '2025-05-09 08:30:12');
INSERT INTO `users` VALUES (5, 'baru', 'baru@app.com', NULL, '$2y$12$QOR95TBEe8UDq1ABbzr/wegGUJrSS2n2OH7JD477si3MXDLGGpbuy', NULL, '2025-05-09 08:31:29', '2025-05-09 08:31:29');

SET FOREIGN_KEY_CHECKS = 1;
