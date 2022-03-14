-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla perritosfelices.clientes: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
REPLACE INTO `clientes` (`id`, `nombre_cliente`, `nombre_perro`, `tamaño`, `telefono`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Franco Marron', 'Josue', 'chico', '2302435678', '-', '2022-03-14 14:20:03', '2022-03-14 14:20:03', NULL),
	(2, 'Mateo Dormisch', 'Firulais', 'chico', '2302121212', 'alergico', '2022-03-14 14:20:23', '2022-03-14 14:20:23', NULL),
	(3, 'Alejandro Vitale', 'Patita', 'mediano', '2302789645', '-', '2022-03-14 14:20:37', '2022-03-14 14:20:37', NULL),
	(4, 'Julio Caba', 'Pelusa', 'mediano', '2302789645', 'Disciplina que estudia y expone, de acuerdo con determinados principios y métodos, los acontecimientos y hechos que pertenecen al tiempo pasado y que constituyen el desarrollo de la humanidad desde sus orígenes hasta el momento presente.\r\n"historia contemporánea"\r\n2.\r\nConjunto de estos acontecimientos y hechos, especialmente los vividos por una persona, por un grupo o por los miembros de una comunidad social.\r\n"la llegada del hombre a la Luna fue un suceso crucial en la historia de la humanidad"', '2022-03-14 14:21:02', '2022-03-14 14:21:02', NULL),
	(5, 'Leandro Centelles', 'Akira', 'mediano', '3583432319', '-', '2022-03-14 14:21:18', '2022-03-14 14:21:18', NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando datos para la tabla perritosfelices.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando datos para la tabla perritosfelices.inventarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `inventarios` DISABLE KEYS */;
REPLACE INTO `inventarios` (`id`, `nombre`, `cantidad`, `estado`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Shampoo', 5, 'Nuevo', '--', '2022-03-14 14:21:51', '2022-03-14 14:21:51', NULL),
	(2, 'Tijeras', 2, 'Usado', '-', '2022-03-14 14:22:05', '2022-03-14 14:22:05', NULL);
/*!40000 ALTER TABLE `inventarios` ENABLE KEYS */;

-- Volcando datos para la tabla perritosfelices.migrations: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_03_03_221012_create_inventarios_table', 1),
	(6, '2022_03_10_134015_create_clientes_table', 1),
	(7, '2022_03_14_140354_create_servicios_table', 2),
	(8, '2022_03_14_140546_create_precios_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando datos para la tabla perritosfelices.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando datos para la tabla perritosfelices.personal_access_tokens: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Volcando datos para la tabla perritosfelices.precios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `precios` DISABLE KEYS */;
/*!40000 ALTER TABLE `precios` ENABLE KEYS */;

-- Volcando datos para la tabla perritosfelices.servicios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;

-- Volcando datos para la tabla perritosfelices.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Leo', 'admin@admin.com', NULL, '$2y$10$fYqwJ8zhI79AfZc592q1OeCgNOXN2CsS8drrAufwHMW2/NTPTcrh2', NULL, '2022-03-14 13:53:36', '2022-03-14 13:53:36');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
