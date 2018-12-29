-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: pasteleria
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cantidadPersonas`
--

DROP TABLE IF EXISTS `cantidadPersonas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cantidadPersonas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cantidad` (`cantidad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cantidadPersonas`
--

LOCK TABLES `cantidadPersonas` WRITE;
/*!40000 ALTER TABLE `cantidadPersonas` DISABLE KEYS */;
INSERT INTO `cantidadPersonas` VALUES (1,10),(2,20),(3,30),(4,40);
/*!40000 ALTER TABLE `cantidadPersonas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'Aministrador'),(2,'Cajer@'),(3,'Pasteler@');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoriaClientes`
--

DROP TABLE IF EXISTS `categoriaClientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoriaClientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoriaClientes`
--

LOCK TABLES `categoriaClientes` WRITE;
/*!40000 ALTER TABLE `categoriaClientes` DISABLE KEYS */;
INSERT INTO `categoriaClientes` VALUES (1,'Bueno'),(2,'Malo');
/*!40000 ALTER TABLE `categoriaClientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rut` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigoCategoria` int(10) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rut` (`rut`),
  KEY `fkcodigo` (`codigoCategoria`),
  CONSTRAINT `fkcodigo` FOREIGN KEY (`codigoCategoria`) REFERENCES `categoriaClientes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entradas`
--

DROP TABLE IF EXISTS `entradas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entradas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fechaEntrada` date NOT NULL,
  `codigoProducto` int(10) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_codigoProducto_entrada` (`codigoProducto`),
  CONSTRAINT `fk_codigoProducto_entrada` FOREIGN KEY (`codigoProducto`) REFERENCES `materiaPrimas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entradas`
--

LOCK TABLES `entradas` WRITE;
/*!40000 ALTER TABLE `entradas` DISABLE KEYS */;
/*!40000 ALTER TABLE `entradas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadoPagos`
--

DROP TABLE IF EXISTS `estadoPagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadoPagos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadoPagos`
--

LOCK TABLES `estadoPagos` WRITE;
/*!40000 ALTER TABLE `estadoPagos` DISABLE KEYS */;
INSERT INTO `estadoPagos` VALUES (1,'Pendiente Pago'),(2,'Pagado');
/*!40000 ALTER TABLE `estadoPagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadoPedidos`
--

DROP TABLE IF EXISTS `estadoPedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadoPedidos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `estado` (`estado`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadoPedidos`
--

LOCK TABLES `estadoPedidos` WRITE;
/*!40000 ALTER TABLE `estadoPedidos` DISABLE KEYS */;
INSERT INTO `estadoPedidos` VALUES (5,'Cancelado'),(3,'Completada'),(2,'En Preparación'),(4,'Entregada'),(1,'Esperando Preparación');
/*!40000 ALTER TABLE `estadoPedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materiaPrimas`
--

DROP TABLE IF EXISTS `materiaPrimas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materiaPrimas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `stockCritico` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materiaPrimas`
--

LOCK TABLES `materiaPrimas` WRITE;
/*!40000 ALTER TABLE `materiaPrimas` DISABLE KEYS */;
/*!40000 ALTER TABLE `materiaPrimas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2013_05_23_231425_crear_tabla_estado_pagos',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_05_20_000000_create_materiaPrimas_table',1),(4,'2018_05_20_000001_create_cantidadPersonas_table',1),(5,'2018_05_20_000002_create_cargos_table',1),(6,'2018_05_20_000003_create_estadoPedidos_table',1),(7,'2018_05_20_000004_create_categoriaClientes_table',1),(8,'2018_05_20_000005_create_trabajadores_table',1),(9,'2018_05_20_000007_create_clientes_table',1),(10,'2018_05_20_000008_create_recetas_table',1),(11,'2018_05_20_000009_create_tortas_table',1),(12,'2018_05_20_000010_create_pedidos_table',1),(13,'2018_07_15_124048_crear_tabla_entradas',1),(14,'2018_07_15_124117_crear_tabla_salidas',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rutCliente` int(10) unsigned NOT NULL,
  `nombreTorta` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantPersonas` int(10) NOT NULL,
  `dedicatoria` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidadTortas` int(11) NOT NULL,
  `estadoPedido` int(10) unsigned NOT NULL,
  `rutTrabajador` int(10) unsigned DEFAULT NULL,
  `rutCompletado` int(10) unsigned DEFAULT NULL,
  `fechaPedido` date NOT NULL,
  `precioTotal` int(11) NOT NULL,
  `fechaEntrega` date DEFAULT NULL,
  `estadoPago` int(10) unsigned NOT NULL,
  `horaEntrega` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigoCliente` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rutCancelado` int(10) unsigned DEFAULT NULL,
  `rutEntregado` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_estadoPedido` (`estadoPedido`),
  KEY `fk_rutTrabajador` (`rutTrabajador`),
  KEY `fk_rutCompletado` (`rutCompletado`),
  KEY `fk_clientePedidos` (`rutCliente`),
  KEY `fk_cantidadPersonas` (`cantPersonas`),
  KEY `fk_codigoTorta` (`nombreTorta`),
  KEY `fk_estadoPago` (`estadoPago`),
  KEY `fkIdCanc` (`rutCancelado`),
  KEY `fkidEntre` (`rutEntregado`),
  CONSTRAINT `fkIdCanc` FOREIGN KEY (`rutCancelado`) REFERENCES `trabajadores` (`id`),
  CONSTRAINT `fk_clientePedidos` FOREIGN KEY (`rutCliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_estadoPago` FOREIGN KEY (`estadoPago`) REFERENCES `estadoPagos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_estadoPedido` FOREIGN KEY (`estadoPedido`) REFERENCES `estadoPedidos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_rutCompletado` FOREIGN KEY (`rutCompletado`) REFERENCES `trabajadores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_rutTrabajador` FOREIGN KEY (`rutTrabajador`) REFERENCES `trabajadores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fkidEntre` FOREIGN KEY (`rutEntregado`) REFERENCES `trabajadores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `precios`
--

DROP TABLE IF EXISTS `precios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `precios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idNombreTorta` int(10) DEFAULT NULL,
  `idCanPersonas` int(10) unsigned DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkNomTor` (`idNombreTorta`),
  KEY `fkCantPer` (`idCanPersonas`),
  CONSTRAINT `fkCantPer` FOREIGN KEY (`idCanPersonas`) REFERENCES `cantidadPersonas` (`id`),
  CONSTRAINT `fkNomTor` FOREIGN KEY (`idNombreTorta`) REFERENCES `tortas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `precios`
--

LOCK TABLES `precios` WRITE;
/*!40000 ALTER TABLE `precios` DISABLE KEYS */;
/*!40000 ALTER TABLE `precios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recetas`
--

DROP TABLE IF EXISTS `recetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recetas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recetas`
--

LOCK TABLES `recetas` WRITE;
/*!40000 ALTER TABLE `recetas` DISABLE KEYS */;
INSERT INTO `recetas` VALUES (1,'Selva Negra','Dirección del PDF con la receta'),(2,'Pompaudour-Platano','Dirección del PDF con la receta'),(3,'Pompaudour-Frambuesa','Dirección del PDF con la receta'),(4,'Manjar-Nuez','Dirección del PDF con la receta'),(5,'Turrón-Nuez','Dirección del PDF con la receta'),(6,'Bizcochuelo-Manjar','Dirección del PDF con la receta'),(7,'Francisca','Dirección del PDF con la receta'),(8,'Panqueques','Dirección del PDF con la receta');
/*!40000 ALTER TABLE `recetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salidas`
--

DROP TABLE IF EXISTS `salidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salidas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fechaSalida` date NOT NULL,
  `codigoProducto` int(10) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idPedido` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_codigoProducto_salida` (`codigoProducto`),
  KEY `fkidPedido` (`idPedido`),
  CONSTRAINT `fk_codigoProducto_salida` FOREIGN KEY (`codigoProducto`) REFERENCES `materiaPrimas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fkidPedido` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salidas`
--

LOCK TABLES `salidas` WRITE;
/*!40000 ALTER TABLE `salidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `salidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tortas`
--

DROP TABLE IF EXISTS `tortas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tortas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `codigoTorta` varchar(5) DEFAULT NULL,
  `Descripción` varchar(255) DEFAULT NULL,
  `Imagen` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tortas`
--

LOCK TABLES `tortas` WRITE;
/*!40000 ALTER TABLE `tortas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tortas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tortasMateriaPrimas`
--

DROP TABLE IF EXISTS `tortasMateriaPrimas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tortasMateriaPrimas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tortaNombre` int(11) DEFAULT NULL,
  `Cantidad_Personas` int(11) unsigned DEFAULT NULL,
  `Huevos` int(11) DEFAULT NULL,
  `Harina_gramos` int(11) DEFAULT NULL,
  `Azúcar_gramos` int(11) DEFAULT NULL,
  `Leche_ml` int(11) DEFAULT NULL,
  `Crema_Batir_ml` int(11) DEFAULT NULL,
  `Merengue_gramos` int(11) DEFAULT NULL,
  `Durazno_Tarros` int(11) DEFAULT NULL,
  `Frutilla_gramos` int(11) DEFAULT NULL,
  `Almíbar_ml` int(11) DEFAULT NULL,
  `Coco_Rallado_gramos` int(11) DEFAULT NULL,
  `Cobertura_Chocolate_gramos` int(11) DEFAULT NULL,
  `Fondant_gramos` int(11) DEFAULT NULL,
  `Caramelo_ml` int(11) DEFAULT NULL,
  `Sal_gramos` int(11) DEFAULT NULL,
  `Leche_Condensada` int(11) DEFAULT NULL,
  `Jalea_Gramos` int(11) DEFAULT NULL,
  `Disco_Merengue` int(11) DEFAULT NULL,
  `Aceite_ml` int(11) DEFAULT NULL,
  `Esencia_Frambuesa_ml` int(11) DEFAULT NULL,
  `Esencia_Platano_ml` int(11) DEFAULT NULL,
  `Esencia_Vainilla_ml` int(11) DEFAULT NULL,
  `Polvo_Hornear_gramos` int(11) DEFAULT NULL,
  `Jugo_Naranja_ml` int(11) DEFAULT NULL,
  `Cacao_Polvo_gramos` int(11) DEFAULT NULL,
  `Mermelada_guinda_gramos` int(11) DEFAULT NULL,
  `Mermelada_frutilla_gramos` int(11) DEFAULT NULL,
  `Mermelada_durazno_gramos` int(11) DEFAULT NULL,
  `Marrasquinos` int(11) DEFAULT NULL,
  `cebolla` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fkPersonas` (`Cantidad_Personas`),
  KEY `fkNom` (`tortaNombre`),
  CONSTRAINT `fkNom` FOREIGN KEY (`tortaNombre`) REFERENCES `tortas` (`id`),
  CONSTRAINT `fkPersonas` FOREIGN KEY (`Cantidad_Personas`) REFERENCES `cantidadPersonas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tortasMateriaPrimas`
--

LOCK TABLES `tortasMateriaPrimas` WRITE;
/*!40000 ALTER TABLE `tortasMateriaPrimas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tortasMateriaPrimas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajadores`
--

DROP TABLE IF EXISTS `trabajadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajadores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rut` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_cargo` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rut` (`rut`),
  KEY `fk_codCargo` (`cod_cargo`),
  CONSTRAINT `fk_codCargo` FOREIGN KEY (`cod_cargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajadores`
--

LOCK TABLES `trabajadores` WRITE;
/*!40000 ALTER TABLE `trabajadores` DISABLE KEYS */;
INSERT INTO `trabajadores` VALUES (1,'123456789','No Asignado','No asignado','No asignado',12345678,'noasignado@noasignado.cl','eyJpdiI6InF3R1JBYnpmQVFUQmF6MEJjcFA1TVE9PSIsInZhbHVlIjoiTDBiSUpjd2dITWlSY05lOFQrM3R6UT09IiwibWFjIjoiZWQ3NWFhMGMwZDg1YzhmZGUzMmY3ZjZmNGZmZjFjYjE0ZjliNWE4NTY2MGJlNDg0MzNiZDBkMjlhNTc4YmYwOCJ9',3,'2018-11-27 21:26:42','2018-11-27 21:26:42'),(2,'1234567890','SYSTEM','SYSTEM','SYSTEM',1,'system@system.cl','eyJpdiI6ImF5aENYTG9JM1FKWHVHYzBCc0hKdEE9PSIsInZhbHVlIjoiNnBRXC9UNHVDaDZEeWk5UkJGNXY5VDVFRGFQRGk1TEVHeCtrUVkyTlBqeFU9IiwibWFjIjoiMmI1ZmMwYWM0MjU1NDdjNDJmOGNlNzAyNzZkNDBlZDU2MDk1YTkyNDU3MDZjMjEwOTE5NmE3ZThlZjJlYmNlYSJ9',1,'2018-11-27 21:28:27','2018-11-27 21:28:27');
/*!40000 ALTER TABLE `trabajadores` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-03  0:57:12
