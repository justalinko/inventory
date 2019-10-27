-- MySQL dump 10.16  Distrib 10.1.40-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: dpos
-- ------------------------------------------------------
-- Server version	10.1.40-MariaDB

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
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_supplier` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode` varchar(200) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `note_barang` text NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES (1,5,'0000-00-00','BR1000000000','Kursi Gaming','KG',1000000,'gatau lagi');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `phone` decimal(20,0) NOT NULL,
  `hp` decimal(20,0) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Alin koko Mansuby','alinko','Humas polri',85225510000,85225510000,'alinkokomansuby@gmail.com','alinko.id','Testxxx','');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `negotation`
--

DROP TABLE IF EXISTS `negotation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `negotation` (
  `id_negotation` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(100) NOT NULL,
  `deskripsi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_rfq` int(11) NOT NULL,
  `id_quotation` int(11) NOT NULL,
  `nego_price` varchar(100) NOT NULL,
  `nego_note` text,
  `nego_lampiran` varchar(100) NOT NULL,
  PRIMARY KEY (`id_negotation`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `negotation`
--

LOCK TABLES `negotation` WRITE;
/*!40000 ALTER TABLE `negotation` DISABLE KEYS */;
INSERT INTO `negotation` VALUES (1,'Thu,15-08-2019 20:27','2019-08-15 18:27:11',2,1,'43434','0000-00-00 00:00:00','TEST_document20.docx');
/*!40000 ALTER TABLE `negotation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembelian` (
  `id_beli` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(100) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_po` int(11) NOT NULL,
  `nilai` varchar(100) NOT NULL,
  `faktur_pajak` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `lampiran` varchar(200) NOT NULL,
  PRIMARY KEY (`id_beli`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembelian`
--

LOCK TABLES `pembelian` WRITE;
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;
INSERT INTO `pembelian` VALUES (2,'Wed,31-07-2019 12:37',0,1,'111','111','23232','TEST_document13.docx'),(3,'Wed,31-07-2019 12:38',5,1,'111','111','3232','TEST_document14.docx');
/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penjualan` (
  `id_jual` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(100) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `no_invoice` decimal(10,0) NOT NULL,
  `faktur_pajak` varchar(100) NOT NULL,
  `nilai` varchar(100) NOT NULL,
  `pembayaran` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jual`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan`
--

LOCK TABLES `penjualan` WRITE;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` VALUES (1,'Mon,29-07-2019 18:35',1,11,'111','111','111','111','TEST_document10.docx');
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preorder`
--

DROP TABLE IF EXISTS `preorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preorder` (
  `id_po` int(11) NOT NULL AUTO_INCREMENT,
  `no_po` decimal(10,0) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `tujuan` text NOT NULL,
  `keterangan` text NOT NULL,
  `lampiran` varchar(200) NOT NULL,
  PRIMARY KEY (`id_po`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preorder`
--

LOCK TABLES `preorder` WRITE;
/*!40000 ALTER TABLE `preorder` DISABLE KEYS */;
INSERT INTO `preorder` VALUES (1,121,'Mon,29-07-2019 16:39',5,'Barang','Tidak tau','dan tidak tau lagi','TEST_document7.docx');
/*!40000 ALTER TABLE `preorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_order`
--

DROP TABLE IF EXISTS `purchase_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_order` (
  `id_purchase` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(100) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `deadline` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `lampiran_order` varchar(100) NOT NULL,
  PRIMARY KEY (`id_purchase`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_order`
--

LOCK TABLES `purchase_order` WRITE;
/*!40000 ALTER TABLE `purchase_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quosupplier`
--

DROP TABLE IF EXISTS `quosupplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quosupplier` (
  `id_quosupplier` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `note` text NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  PRIMARY KEY (`id_quosupplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quosupplier`
--

LOCK TABLES `quosupplier` WRITE;
/*!40000 ALTER TABLE `quosupplier` DISABLE KEYS */;
/*!40000 ALTER TABLE `quosupplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotation`
--

DROP TABLE IF EXISTS `quotation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotation` (
  `id_quotation` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(100) NOT NULL,
  `no_quotation` decimal(11,0) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `price` varchar(100) NOT NULL,
  `validasi` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `lampiran` varchar(200) NOT NULL,
  PRIMARY KEY (`id_quotation`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotation`
--

LOCK TABLES `quotation` WRITE;
/*!40000 ALTER TABLE `quotation` DISABLE KEYS */;
INSERT INTO `quotation` VALUES (1,'Sat,27-07-2019 20:25',3232,1,'asa','100','asasa','asa','TEST_document3.docx');
/*!40000 ALTER TABLE `quotation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rfq`
--

DROP TABLE IF EXISTS `rfq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rfq` (
  `id_rfq` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` enum('keluar','masuk') NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `no_rfq` varchar(100) NOT NULL,
  `budget` varchar(100) NOT NULL,
  `deadline` varchar(100) NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id_rfq`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rfq`
--

LOCK TABLES `rfq` WRITE;
/*!40000 ALTER TABLE `rfq` DISABLE KEYS */;
INSERT INTO `rfq` VALUES (1,'masuk','',1,'2121','','1211111111111','12121','TEST_document5.docx','212'),(2,'masuk','Sat,27-07-2019 21:02',1,'3','23','3','3','TEST_document6.docx','3'),(3,'keluar','Mon,29-07-2019 16:41',1,'2121','121','1211111111111','12121','TEST_document8.docx','21212');
/*!40000 ALTER TABLE `rfq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(100) NOT NULL,
  `phone` decimal(20,0) NOT NULL,
  `hp` decimal(20,0) NOT NULL,
  `email` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `website` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (5,'Alin koko Mansuby','Jepara\r\nPecangaan','Jepara',85225510000,85225510000,'alinkokomansuby@gmail.com','cce','alinko.id',''),(6,'Alin koko Mansuby','Jepara\r\nPecangaan','Jepara',85225510000,85225510000,'alinkokomansuby@gmail.com','','alinko.id',''),(7,'Alin koko Mansuby','Jepara\r\nPecangaan','Jepara',85225510000,85225510000,'alinkokomansuby@gmail.com','a','alinko.id',''),(8,'Alin koko Mansuby','Jepara\r\nPecangaan','Jepara',85225510000,85225510000,'alinkokomansuby@gmail.com','','alinko.id','');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat`
--

DROP TABLE IF EXISTS `surat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` enum('masuk','keluar') NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `pengirim` varchar(200) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `perihal` varchar(200) NOT NULL,
  `tindakan` varchar(200) NOT NULL,
  `lampiran` varchar(200) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat`
--

LOCK TABLES `surat` WRITE;
/*!40000 ALTER TABLE `surat` DISABLE KEYS */;
INSERT INTO `surat` VALUES (1,'masuk','Fri,26-07-2019 14:59','3232323','Alin','','Gatau','Terserah','TEST_document1.docx',''),(2,'keluar','Fri,26-07-2019 15:07','3232323','','Alin','Gatau','','TEST_document2.docx','SASASAS');
/*!40000 ALTER TABLE `surat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `level` enum('administrasi','purchasing','accounting','owner') NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hp` decimal(14,0) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'owner','admin','ADmin owner','d033e22ae348aeb5660fc2140aec35850c4da997',85225510000,'alinkokomansuby@gmail.com'),(3,'administrasi','administrasi','Reza Arap','e5c6ba3abff1db4479bb60c5d79cc1c2a0689dcb',99999999999999,'administrasi@griyarotan.com'),(4,'purchasing','purchasing','Beatriz Dinis','0e0730d60c07bff650576eb44f31e96809633aaa',99999999999999,'purchasing@griyarotan.com'),(5,'accounting','accounting','Alpian adit','1853fd427d08bb9891c1c413b93626056177f9f3',99999999999999,'accounting@griyarotan.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-01 17:49:32
