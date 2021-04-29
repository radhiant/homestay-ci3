/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - db_homestay
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_homestay` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_homestay`;

/*Table structure for table `tbl_deposit` */

DROP TABLE IF EXISTS `tbl_deposit`;

CREATE TABLE `tbl_deposit` (
  `deposit_id` varchar(20) NOT NULL,
  `pelanggan_id` varchar(20) DEFAULT NULL,
  `kamar_id` varchar(20) DEFAULT NULL,
  `deposit_tgl` datetime DEFAULT NULL,
  `deposit_nominal` varchar(60) DEFAULT NULL,
  `deposit_tgl_kembali` datetime DEFAULT NULL,
  `deposit_nominal_kembali` varchar(60) DEFAULT NULL,
  `deposit_status` varchar(20) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `deposit_tgl_input` date DEFAULT NULL,
  PRIMARY KEY (`deposit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_deposit` */

insert  into `tbl_deposit`(`deposit_id`,`pelanggan_id`,`kamar_id`,`deposit_tgl`,`deposit_nominal`,`deposit_tgl_kembali`,`deposit_nominal_kembali`,`deposit_status`,`user_id`,`deposit_tgl_input`) values 
('D-000002','PLG-000003','KMR-000012','2021-02-20 12:00:00','100000',NULL,NULL,'Diterima','USR-000001','2021-02-20'),
('D-000003','PLG-000009','KMR-000014','2021-02-20 12:00:00','100000',NULL,NULL,'Diterima','USR-000001','2021-02-20'),
('D-000004','PLG-000015','KMR-000010','2021-02-21 21:45:00','100000',NULL,NULL,'Diterima','USR-000004','2021-02-21'),
('D-000005','PLG-000006','KMR-000005','2021-02-19 21:40:00','100000',NULL,NULL,'Diterima','USR-000004','2021-02-21'),
('D-000006','PLG-000014','KMR-000004','2021-02-21 21:40:00','100000',NULL,NULL,'Diterima','USR-000004','2021-02-21');

/*Table structure for table `tbl_jnsbiaya` */

DROP TABLE IF EXISTS `tbl_jnsbiaya`;

CREATE TABLE `tbl_jnsbiaya` (
  `jnsbiaya_id` varchar(25) NOT NULL,
  `jnsbiaya_nama` varchar(60) DEFAULT NULL,
  `jnsbiaya_ket` text DEFAULT NULL,
  PRIMARY KEY (`jnsbiaya_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_jnsbiaya` */

insert  into `tbl_jnsbiaya`(`jnsbiaya_id`,`jnsbiaya_nama`,`jnsbiaya_ket`) values 
('JNS-000002','Televisi 32 Inchi','Asset Televisi 32 Inchi'),
('JNS-000003','Akses Point','Asset Akses Point'),
('JNS-000004','CCTV','Asset CCTV'),
('JNS-000005','Kopi','Kopi'),
('JNS-000006','Gula','Gula'),
('JNS-000007','Air Mineral','Air Mineral'),
('JNS-000008','Handuk','Handuk'),
('JNS-000009','AC','Air Conditioner');

/*Table structure for table `tbl_kamar` */

DROP TABLE IF EXISTS `tbl_kamar`;

CREATE TABLE `tbl_kamar` (
  `kamar_id` varchar(60) NOT NULL,
  `kamar_no` varchar(60) DEFAULT NULL,
  `kamar_type` varchar(60) DEFAULT NULL,
  `kamar_biaya` varchar(60) DEFAULT NULL,
  `kamar_tgl_input` date DEFAULT NULL,
  `kamar_user_input` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`kamar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_kamar` */

insert  into `tbl_kamar`(`kamar_id`,`kamar_no`,`kamar_type`,`kamar_biaya`,`kamar_tgl_input`,`kamar_user_input`) values 
('KMR-000001','201','Suite Double','300000','2020-12-18','USR-000001'),
('KMR-000002','301','Suite Family','350000','2020-12-18','USR-000001'),
('KMR-000003','302','Suite Family','350000','2020-12-18','USR-000001'),
('KMR-000004','202','Suite Double','300000','2020-12-18','USR-000001'),
('KMR-000005','203','Suite Double','300000','2020-12-18','USR-000001'),
('KMR-000006','303','Suite Family','350000','2020-12-18','USR-000001'),
('KMR-000007','204','Suite Double','300000','2020-12-18','USR-000001'),
('KMR-000008','205','Suite Double','300000','2020-12-18','USR-000001'),
('KMR-000009','206','Suite Double','300000','2020-12-18','USR-000001'),
('KMR-000010','207','Suite Double','300000','2020-12-18','USR-000001'),
('KMR-000012','304','Suite Family','350000','2020-12-18','USR-000001'),
('KMR-000013','305','Suite Family','350000','2020-12-18','USR-000001'),
('KMR-000014','306','Suite Family','350000','2020-12-18','USR-000001'),
('KMR-000015','307','Suite Family','350000','2020-12-18','USR-000001');

/*Table structure for table `tbl_katbarang` */

DROP TABLE IF EXISTS `tbl_katbarang`;

CREATE TABLE `tbl_katbarang` (
  `katbarang_id` varchar(20) NOT NULL,
  `katbarang_nama` varchar(60) DEFAULT NULL,
  `katbarang_tgl_input` date DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`katbarang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_katbarang` */

/*Table structure for table `tbl_katbiaya` */

DROP TABLE IF EXISTS `tbl_katbiaya`;

CREATE TABLE `tbl_katbiaya` (
  `katbiaya_id` varchar(24) NOT NULL,
  `katbiaya_nama` varchar(60) DEFAULT NULL,
  `katbiaya_ket` text DEFAULT NULL,
  PRIMARY KEY (`katbiaya_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_katbiaya` */

insert  into `tbl_katbiaya`(`katbiaya_id`,`katbiaya_nama`,`katbiaya_ket`) values 
('KTB-000002','Logistik','Barang Habis Pakai'),
('KTB-000003','Asset','Barang-barang'),
('KTB-000004','Internet','Kebutuhan Internet'),
('KTB-000005','Gaji','Gaji Karyawan'),
('KTB-000006','Listrik','Pembayaran Listrik');

/*Table structure for table `tbl_pelanggan` */

DROP TABLE IF EXISTS `tbl_pelanggan`;

CREATE TABLE `tbl_pelanggan` (
  `pelanggan_id` varchar(20) NOT NULL,
  `pelanggan_noktp` varchar(60) DEFAULT NULL,
  `pelanggan_nama` varchar(60) DEFAULT NULL,
  `pelanggan_kelamin` enum('1','2') DEFAULT NULL,
  `pelanggan_alamat` text DEFAULT NULL,
  `pelanggan_notelp` varchar(30) DEFAULT NULL,
  `pelanggan_pekerjaan` varchar(60) DEFAULT NULL,
  `pelanggan_foto` varchar(120) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `pelanggan_tgl_input` date DEFAULT NULL,
  PRIMARY KEY (`pelanggan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_pelanggan` */

insert  into `tbl_pelanggan`(`pelanggan_id`,`pelanggan_noktp`,`pelanggan_nama`,`pelanggan_kelamin`,`pelanggan_alamat`,`pelanggan_notelp`,`pelanggan_pekerjaan`,`pelanggan_foto`,`user_id`,`pelanggan_tgl_input`) values 
('PLG-000003','2312312321123123','Rika Dwi Lestari','2','Kabupaten Subang Jawa Barat','0823xxxxxxx','Pelajar','default.jpg','USR-000001','2021-02-20'),
('PLG-000004','1231231232131243','AGUSTINi','2','kebon pala, makasar','0812xxxxxxx','IRT','default.jpg','USR-000001','2021-02-20'),
('PLG-000005','1231314234423442','wesra angelina lesmana','2','kebon pala makasar','0812xxxxxxx','karyawan swasta','default.jpg','USR-000001','2021-02-20'),
('PLG-000006','6434534342342342','yumi giantini jelis','2','makasar','0812xxxxxxx','swasta','default.jpg','USR-000001','2021-02-20'),
('PLG-000007','2342342312312331','vega kahlil gibran','1','kebon pala, makasar','0812xxxxxxx','karyawan swasta','default.jpg','USR-000001','2021-02-20'),
('PLG-000008','6353454352342344','Tany sandra','1','hakim perdana kusuma, makasar','0812xxxxxxx','karyawan swasta','default.jpg','USR-000001','2021-02-20'),
('PLG-000009','4354534534535345','dessy Putrianingsi','2','makasar','0812xxxxxxx','asd','default.jpg','USR-000001','2021-02-20'),
('PLG-000010','2342342423423424','Yokuis tabuni','1','inauga, wania, mimika','0812xxxxxxx','wiraswasta','default.jpg','USR-000001','2021-02-20'),
('PLG-000011','3453453453242344','dasim burhanudin','1','bandung','0812xxxxxxx','swasta','default.jpg','USR-000001','2021-02-20'),
('PLG-000012','5434635453455355','elise apriliani','2','ambon','0813xxxxxxx','IRT','default.jpg','USR-000001','2021-02-20'),
('PLG-000013','4234235235343434','MASMUDI','1','NGANTI, RT/RW 3/7 sendangadi, mlati SLEMAN','0815xxxxxxx','PNS','default.jpg','USR-000004','2021-02-20'),
('PLG-000014','4234342424235235','WIDHUHANDINI S','2','halim perdana kusuma, makasar, jaktim','0813xxxxxxx','karyawan swasta','default.jpg','USR-000004','2021-02-21'),
('PLG-000015','4353534534534555','ITANG SETIADI','1','TANJUNGREJO, SIRNOBOYO, BONOROWO, kebumen','0822xxxxxxx','BURUH','default.jpg','USR-000004','2021-02-21');

/*Table structure for table `tbl_pembiayaan` */

DROP TABLE IF EXISTS `tbl_pembiayaan`;

CREATE TABLE `tbl_pembiayaan` (
  `pembiayaan_id` varchar(25) NOT NULL,
  `katbiaya_id` varchar(25) DEFAULT NULL,
  `jnsbiaya_id` varchar(25) DEFAULT NULL,
  `smbrbiaya_id` varchar(25) DEFAULT NULL,
  `vendor_id` varchar(25) DEFAULT NULL,
  `pembiayaan_tgl` date DEFAULT NULL,
  `pembiayaan_nmbiaya` varchar(60) DEFAULT NULL,
  `pembiayaan_nilai` varchar(50) DEFAULT NULL,
  `pembiayaan_jumlah` varchar(50) DEFAULT NULL,
  `pembiayaan_satuan` varchar(50) DEFAULT NULL,
  `pembiayaan_ket` text DEFAULT NULL,
  `pembiayaan_tgl_input` date DEFAULT NULL,
  `pembiayaan_user_input` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`pembiayaan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_pembiayaan` */

insert  into `tbl_pembiayaan`(`pembiayaan_id`,`katbiaya_id`,`jnsbiaya_id`,`smbrbiaya_id`,`vendor_id`,`pembiayaan_tgl`,`pembiayaan_nmbiaya`,`pembiayaan_nilai`,`pembiayaan_jumlah`,`pembiayaan_satuan`,`pembiayaan_ket`,`pembiayaan_tgl_input`,`pembiayaan_user_input`) values 
('PMB-000002','KTB-000003','JNS-000003','SMBR-000003','VNDR-000002','2021-01-01','Ruckus H320','10156080','3','unit','','2021-02-19','USR-000001'),
('PMB-000003','KTB-000002','JNS-000005','SMBR-000002','VNDR-000001','2021-01-01','Kapal Api Bubuk 165G','127000','10','pcs','','2021-02-19','USR-000001'),
('PMB-000004','KTB-000002','JNS-000006','SMBR-000002','VNDR-000001','2021-01-01','Gulaku 1000G','125000','10','pcs','','2021-02-19','USR-000001'),
('PMB-000005','KTB-000003','JNS-000003','SMBR-000003','VNDR-000002','2021-02-01','Ruckus H320','6770720','2','unit','','2021-02-19','USR-000001');

/*Table structure for table `tbl_pendapatan` */

DROP TABLE IF EXISTS `tbl_pendapatan`;

CREATE TABLE `tbl_pendapatan` (
  `pendapatan_id` varchar(20) NOT NULL,
  `pelanggan_id` varchar(20) DEFAULT NULL,
  `kamar_id` varchar(20) DEFAULT NULL,
  `pilsewa_id` varchar(20) DEFAULT NULL,
  `pendapatan_lamasewa` varchar(12) DEFAULT NULL,
  `pendapatan_biaya` varchar(30) DEFAULT NULL,
  `pendapatan_tgl_masuk` datetime DEFAULT NULL,
  `pendapatan_tgl_keluar` datetime DEFAULT NULL,
  `pendapatan_pembayaran` varchar(60) DEFAULT NULL,
  `pendapatan_total` varchar(30) DEFAULT NULL,
  `pendapatan_status` enum('Check-in','Check-out') DEFAULT NULL,
  `sales_id` varchar(20) DEFAULT NULL,
  `pendapatan_fee` varchar(60) DEFAULT NULL,
  `pendapatan_spembayaran` varchar(60) DEFAULT NULL,
  `pendapatan_ket` text DEFAULT NULL,
  `pendapatan_tgl_input` date DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pendapatan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_pendapatan` */

insert  into `tbl_pendapatan`(`pendapatan_id`,`pelanggan_id`,`kamar_id`,`pilsewa_id`,`pendapatan_lamasewa`,`pendapatan_biaya`,`pendapatan_tgl_masuk`,`pendapatan_tgl_keluar`,`pendapatan_pembayaran`,`pendapatan_total`,`pendapatan_status`,`sales_id`,`pendapatan_fee`,`pendapatan_spembayaran`,`pendapatan_ket`,`pendapatan_tgl_input`,`user_id`) values 
('PND-000003','PLG-000003','KMR-000012',NULL,NULL,'359930','2021-02-20 00:00:00','2021-02-21 00:00:00',NULL,'359930',NULL,'SL-000002',NULL,NULL,NULL,'2021-02-20','USR-000001'),
('PND-000004','PLG-000004','KMR-000001',NULL,NULL,'400000','2021-02-20 00:00:00','2021-02-21 00:00:00',NULL,'400000',NULL,'SL-000001',NULL,NULL,NULL,'2021-02-20','USR-000001'),
('PND-000005','PLG-000004','KMR-000008',NULL,NULL,'400000','2021-02-20 00:00:00','2021-02-21 00:00:00',NULL,'400000',NULL,'SL-000004',NULL,NULL,NULL,'2021-02-20','USR-000001'),
('PND-000006','PLG-000005','KMR-000009',NULL,NULL,'0','2021-02-19 00:00:00','2021-02-21 00:00:00',NULL,'0',NULL,'SL-000001',NULL,NULL,NULL,'2021-02-20','USR-000001'),
('PND-000007','PLG-000006','KMR-000005',NULL,NULL,'171428','2021-02-19 00:00:00','2021-02-26 00:00:00',NULL,'1199996','Check-in','SL-000001',NULL,NULL,NULL,'2021-02-20','USR-000001'),
('PND-000008','PLG-000007','KMR-000010',NULL,NULL,'355728','2021-02-20 00:00:00','2021-02-21 00:00:00',NULL,'355728',NULL,'SL-000003',NULL,NULL,NULL,'2021-02-20','USR-000001'),
('PND-000009','PLG-000008','KMR-000002',NULL,NULL,'329501','2021-02-20 00:00:00','2021-02-21 00:00:00',NULL,'329501',NULL,'SL-000004',NULL,NULL,NULL,'2021-02-20','USR-000001'),
('PND-000010','PLG-000008','KMR-000015',NULL,NULL,'329501','2021-02-20 00:00:00','2021-02-21 00:00:00',NULL,'329501',NULL,'SL-000004',NULL,NULL,NULL,'2021-02-20','USR-000001'),
('PND-000011','PLG-000009','KMR-000014',NULL,NULL,'444660','2021-02-20 00:00:00','2021-02-21 00:00:00',NULL,'444660',NULL,'SL-000003',NULL,NULL,NULL,'2021-02-20','USR-000001'),
('PND-000012','PLG-000010','KMR-000013',NULL,NULL,'350000','2021-02-13 00:00:00','2021-02-23 00:00:00',NULL,'3500000',NULL,'SL-000001',NULL,NULL,NULL,'2021-02-20','USR-000001'),
('PND-000013','PLG-000010','KMR-000003',NULL,NULL,'250000','2021-02-13 00:00:00','2021-02-22 00:00:00',NULL,'2250000',NULL,'SL-000001',NULL,NULL,NULL,'2021-02-20','USR-000001'),
('PND-000014','PLG-000011','KMR-000006',NULL,NULL,'171428','2021-02-19 00:00:00','2021-02-26 00:00:00',NULL,'1199996','Check-in','SL-000001',NULL,NULL,NULL,'2021-02-20','USR-000001'),
('PND-000015','PLG-000012','KMR-000007',NULL,NULL,'299941','2021-02-20 00:00:00','2021-02-21 00:00:00',NULL,'299941',NULL,'SL-000003',NULL,NULL,NULL,'2021-02-20','USR-000001'),
('PND-000016','PLG-000013','KMR-000004',NULL,NULL,'287944','2021-02-20 00:00:00','2021-02-21 00:00:00',NULL,'287944',NULL,'SL-000003',NULL,NULL,NULL,'2021-02-20','USR-000004'),
('PND-000017','PLG-000012','KMR-000007',NULL,NULL,'242857','2021-02-21 00:00:00','2021-02-28 00:00:00',NULL,'1699999','Check-in','SL-000001',NULL,NULL,NULL,'2021-02-21','USR-000004'),
('PND-000018','PLG-000014','KMR-000004',NULL,NULL,'339993','2021-02-21 00:00:00','2021-02-22 00:00:00',NULL,'339993',NULL,'SL-000003',NULL,NULL,NULL,'2021-02-21','USR-000004'),
('PND-000019','PLG-000014','KMR-000009',NULL,NULL,'339933','2021-02-21 00:00:00','2021-02-22 00:00:00',NULL,'339933',NULL,'SL-000003',NULL,NULL,NULL,'2021-02-21','USR-000004'),
('PND-000020','PLG-000009','KMR-000014',NULL,NULL,'365906','2021-02-21 00:00:00','2021-02-22 00:00:00',NULL,'365906',NULL,'SL-000004',NULL,NULL,NULL,'2021-02-21','USR-000004'),
('PND-000021','PLG-000003','KMR-000012',NULL,NULL,'350000','2021-02-21 00:00:00','2021-02-22 00:00:00',NULL,'350000',NULL,'SL-000001',NULL,NULL,NULL,'2021-02-21','USR-000004'),
('PND-000022','PLG-000015','KMR-000010',NULL,NULL,'300000','2021-02-21 00:00:00','2021-02-22 00:00:00',NULL,'300000',NULL,'SL-000001',NULL,NULL,NULL,'2021-02-21','USR-000004'),
('PND-000023','PLG-000011','KMR-000002',NULL,NULL,'264690','2021-02-21 00:00:00','2021-02-22 00:00:00',NULL,'264690','Check-out','SL-000002',NULL,NULL,NULL,'2021-02-22','USR-000004'),
('PND-000024','PLG-000014','KMR-000004','PLS-000005','1','300000','2021-02-24 09:00:00','2021-04-27 12:00:00','Aplikasi','300000','Check-out','SL-000003','0','Lunas','','2021-02-22','USR-000004'),
('PND-000025','PLG-000003','KMR-000012',NULL,NULL,'350000','2021-02-22 09:00:00','2021-02-25 15:48:33',NULL,'1050000','Check-out','SL-000001',NULL,NULL,NULL,'2021-02-22','USR-000004'),
('PND-000026','PLG-000015','KMR-000001','PLS-000001','2','600000','2021-03-25 10:00:00','2021-03-27 10:00:00','Tunai','1200000','Check-in','SL-000004','2000','Lunas','-','2021-03-25','USR-000001'),
('PND-000027','PLG-000015','KMR-000004','PLS-000005','3','300000','2021-04-29 12:00:00','2021-05-02 12:00:00','Transfer','900000','Check-in','SL-000005','500','Lunas','-','2021-04-08','USR-000001');

/*Table structure for table `tbl_pilsewa` */

DROP TABLE IF EXISTS `tbl_pilsewa`;

CREATE TABLE `tbl_pilsewa` (
  `pilsewa_id` varchar(60) NOT NULL,
  `pilsewa_nama` varchar(120) DEFAULT NULL,
  `pilsewa_type` varchar(60) DEFAULT NULL,
  `pilsewa_harga` varchar(60) DEFAULT NULL,
  `pilsewa_ket` text DEFAULT NULL,
  PRIMARY KEY (`pilsewa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_pilsewa` */

insert  into `tbl_pilsewa`(`pilsewa_id`,`pilsewa_nama`,`pilsewa_type`,`pilsewa_harga`,`pilsewa_ket`) values 
('PLS-000002','Mingguan','Suite Double','1200000',''),
('PLS-000003','Mingguan','Suite Family','1500000',''),
('PLS-000004','Harian','Suite Family','350000',''),
('PLS-000005','Harian','Suite Double','300000','');

/*Table structure for table `tbl_sales` */

DROP TABLE IF EXISTS `tbl_sales`;

CREATE TABLE `tbl_sales` (
  `sales_id` varchar(20) NOT NULL,
  `sales_nama` varchar(60) DEFAULT NULL,
  `sales_notelp` varchar(20) DEFAULT NULL,
  `sales_tgl_bayar` date DEFAULT NULL,
  `sales_biaya` varchar(30) DEFAULT NULL,
  `sales_ket` text DEFAULT NULL,
  `sales_tgl_input` date DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_sales` */

insert  into `tbl_sales`(`sales_id`,`sales_nama`,`sales_notelp`,`sales_tgl_bayar`,`sales_biaya`,`sales_ket`,`sales_tgl_input`,`user_id`) values 
('SL-000001','Safira HS','082xxxxxxxx','2020-12-02','0','bayar langsung','2020-12-14','USR-000001'),
('SL-000002','Oyyo','0625xxxxxxx','2020-12-16','34.1','','2020-12-14','USR-000001'),
('SL-000003','Oyyo Traveloka','021 99xxxxx','2021-02-26','33','','2021-02-20','USR-000001'),
('SL-000004','Oyyo OTA','021 99xxxxx','2021-02-25','28.6','','2021-02-20','USR-000001'),
('SL-000005','Safira HS OTA','021xxxxxxxx','2021-04-01','28.6','di orderkan petugas hotel via aplikasi','2021-04-26','USR-000001');

/*Table structure for table `tbl_smbrbiaya` */

DROP TABLE IF EXISTS `tbl_smbrbiaya`;

CREATE TABLE `tbl_smbrbiaya` (
  `smbrbiaya_id` varchar(25) NOT NULL,
  `smbrbiaya_nama` varchar(60) DEFAULT NULL,
  `smbrbiaya_ket` text DEFAULT NULL,
  PRIMARY KEY (`smbrbiaya_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_smbrbiaya` */

insert  into `tbl_smbrbiaya`(`smbrbiaya_id`,`smbrbiaya_nama`,`smbrbiaya_ket`) values 
('SMBR-000002','Safira','Safira Halim Syariah Homestay'),
('SMBR-000003','BKU','PT Bintang Komunikasi Utama');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `user_id` varchar(20) NOT NULL,
  `user_nama` varchar(35) DEFAULT NULL,
  `user_nmlengkap` varchar(30) DEFAULT NULL,
  `user_password` varchar(35) DEFAULT NULL,
  `user_level` varchar(2) DEFAULT NULL,
  `user_status` varchar(2) DEFAULT '1',
  `user_foto` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`user_id`,`user_nama`,`user_nmlengkap`,`user_password`,`user_level`,`user_status`,`user_foto`) values 
('USR-000001','Admin','Administrator','0192023a7bbd73250516f069df18b500','1','1','undraw_profile.svg'),
('USR-000002','operator','Operator','4b583376b2767b923c3e1da60d10de59','2','1','undraw_profile.svg'),
('USR-000003','radhian','Radhian','df6f5ecea3a179c254df64ade120060c','1','1','undraw_profile.svg'),
('USR-000004','sujud','Sujud','f9991b710274274ede8e2c7426555cd0','1','1','undraw_profile.svg');

/*Table structure for table `tbl_vendor` */

DROP TABLE IF EXISTS `tbl_vendor`;

CREATE TABLE `tbl_vendor` (
  `vendor_id` varchar(25) NOT NULL,
  `vendor_nama` varchar(60) DEFAULT NULL,
  `vendor_kontak` varchar(75) DEFAULT NULL,
  `vendor_notelp` varchar(20) DEFAULT NULL,
  `vendor_alamat` text DEFAULT NULL,
  `vendor_ket` text DEFAULT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_vendor` */

insert  into `tbl_vendor`(`vendor_id`,`vendor_nama`,`vendor_kontak`,`vendor_notelp`,`vendor_alamat`,`vendor_ket`) values 
('VNDR-000001','Indomaret','Indomaret','021 00000','Jl Jengki',''),
('VNDR-000002','PT Bintang Komunikasi Utama','Arshinta','080000000','Jl Jengki',''),
('VNDR-000003','Alfamart','Alfamart','021 9990000','Jl Jengki',''),
('VNDR-000004','ACE Hardware','ACE Hardware','021 000777799','Jakarta Timur',''),
('VNDR-000005','Electronic City','Electronic City','081 99900000','Jakarta Timur','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
