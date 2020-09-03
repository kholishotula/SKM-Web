-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 09:59 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skm_kp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(150) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jabatan` varchar(150) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `pendidikan_terakhir` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `foto_profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `alamat`, `jabatan`, `jenis_kelamin`, `pendidikan_terakhir`, `username`, `password`, `foto_profil`) VALUES
(1, 'Maya', 'Gresik', 'Mahasiswa', 'P', 'SMA', 'admin', 'admin123', 'img/img_profil/15.PNG'),
(2, 'Bella', 'Surabaya', 'Kepala Bagian', 'P', 'S2/S3', 'bellasih', '$2y$12$VXRUQmRHdzc0M05wdzVBKuagD/hj.0bJhPQTscNVLJWQbP9SX7P2a', 'img\\img_profil\\2.png');

-- --------------------------------------------------------

--
-- Table structure for table `isi_submit`
--

CREATE TABLE `isi_submit` (
  `id_isi_submit` int(11) NOT NULL,
  `id_responden` int(11) NOT NULL,
  `id_kuesioner` int(11) NOT NULL,
  `skor_akhir` int(11) NOT NULL,
  `kritik_saran` text NOT NULL,
  `tgl_submit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `isi_submit`
--

INSERT INTO `isi_submit` (`id_isi_submit`, `id_responden`, `id_kuesioner`, `skor_akhir`, `kritik_saran`, `tgl_submit`) VALUES
(1, 1, 3, 62, 'Perlu ditingkatkan', '2020-02-05'),
(2, 2, 1, 52, 'Perlu ditingkatkan', '2020-02-05'),
(3, 3, 3, 50, 'sgwhd', '0000-00-00'),
(4, 4, 3, 62, 'apasaja', '0000-00-00'),
(5, 5, 3, 25, 'diufisdafisjdfj', '0000-00-00'),
(6, 6, 3, 72, 'jdhfajkshfkjah', '2020-02-05'),
(7, 7, 13, 100, 'hjuy', '2020-02-05'),
(8, 8, 13, 75, 'Tingkatkan pelayanan', '2020-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id_kuesioner` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `kode_verifikasi` varchar(30) NOT NULL,
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kuesioner`
--

INSERT INTO `kuesioner` (`id_kuesioner`, `id_admin`, `id_layanan`, `keterangan`, `kode_verifikasi`, `aktif`) VALUES
(1, 1, 1, 'Kuesioner LPSE 2019', '89898', 0),
(2, 1, 2, 'Kuesioner PPID 2019', '09090', 0),
(3, 1, 3, 'Kuesioner Persandian 2019', 'UUU', 1),
(13, 1, 1, 'Kakkaka', '89898', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_rekapitulasi`
--

CREATE TABLE `laporan_rekapitulasi` (
  `id_laporan` int(11) NOT NULL,
  `judul_laporan` varchar(250) NOT NULL,
  `tahun_laporan` year(4) NOT NULL,
  `tgl_upload` date NOT NULL,
  `file_laporan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laporan_rekapitulasi`
--

INSERT INTO `laporan_rekapitulasi` (`id_laporan`, `judul_laporan`, `tahun_laporan`, `tgl_upload`, `file_laporan`) VALUES
(1, 'Laporan Kepuasan Survei PPID', 2017, '2020-07-04', 'files\\rekap\\1.pdf'),
(2, 'Laporan Kepuasn Survei LPSE', 2017, '2020-07-04', 'files\\rekap\\2.pdf'),
(3, 'Laporan Kepuasan Survei LPSE ', 2018, '2020-07-04', 'files\\rekap\\3.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`) VALUES
(1, 'LPSE'),
(2, 'PPID'),
(3, 'Persandian');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `konten_pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `konten_pertanyaan`) VALUES
(1, 'Pengadaan Barang/Jasa Secara Elektronik (LPSE) Pemerintah Kota Blitar menghasilkan informasi pengadaan barang/jasa yang transparan'),
(2, 'Informasi yang dihasilkan oleh Pengadaan Barang/Jasa Secara Elektronik (LPSE) mudah dipahami'),
(3, 'Informasi yang dihasilkan oleh Pengadaan Barang/Jasa Secara Elektronik (LPSE) tepat waktu'),
(4, 'Pengadaan Barang/Jasa Secara Elektronik (LPSE) Pemerintah Kota Blitar menghasilkan informasi pengadaan barang/jasa yang relevan dengan pekerjaan anda'),
(5, 'Layanan Pengadaan Secara Elektronik (LPSE). Sangat bermanfaat dalam membantu pekerjaan anda.'),
(6, 'Layanan Pengadaan Secara Elektronik (LPSE). Mudah digunakan karena memiliki fasilitas petunjuk penggunaan (petunjuk menu, petunjuk pengisian, petunjuk pengoperasian, dll)'),
(7, 'Layanan Pengadaan Secara Elektronik (LPSE). Menjamin kerahasiaan data-data transaksi pada proses pengadaan barang/jasa '),
(8, 'Layanan Pengadaan Secara Elektronik (LPSE). Sangat handal sehingga jarang error.'),
(9, 'Layanan Pengadaan Barang/Jasa Secara Elektronik (LPSE) menyediakan/memberikan pelatihan proses pengadaan barang/jasa secara elektronik kepada anda '),
(10, 'Layanan Pengadaan Barang/Jasa Secara Elektronik (LPSE) menyediakan/memberikan sarana akses internet pada proses pengadaan barang/jasa secara elektronik kepada anda '),
(11, 'Pada saat melakukan pendaftaran/verifikasi dan memberikan dukungan teknis (dukungan online semacam jawaban pertanyaan-pertanyaan yang sering ditanyakan) Layanan Pengadaan Barang/Jasa Secara Elektronik (LPSE) memberikan respon yang cepat kepada anda'),
(12, 'Layanan Pengadaan Barang/Jasa Secara Elektronik (LPSE) dapat diakses secara terus menerus (1 x 24 jam) '),
(13, 'Dalam Layanan Pengadaan Secara Elektronik (LPSE) pencarian informasi proses pengadaan barang/jasa tersedia dan dapat dilakukan dengan cepat'),
(14, 'Dalam Layanan Pengadaan Secara Elektronik (LPSE) pengambilan dan eksekusi transaksi-transaksi (upload/download) pengadaan barang/jasa dapat dilakukan dengan cepat'),
(15, 'Penggunaan Layanan Pengadaan Barang/Jasa Secara Elektronik (LPSE) mendukung efisiensi operasional dan proses pengadaan barang dan jasa '),
(16, 'Pengadaan Barang/Jasa Secara Elektronik (LPSE) memberikan informasi yang memuaskan anda '),
(17, 'Performa dari sistem LPSE (kemampuan perangkat keras, perangkat lunak, kebijakan, prosedur) dalam Pengadaan Barang/Jasa Secara Elektronik (LPSE) memberikan kepuasan kepada anda '),
(18, 'Anda puas dengan pelatihan, sarana akses internet, bantuan teknis, layanan pendaftaran dan verifikasi yang diberikan oleh Layanan Pengadaan Barang/Jasa Secara Elektronik (LPSE) '),
(19, 'Dengan proses Pengadaan Barang/Jasa Secara Elektronik (LPSE), pengadaan barang lebih transparan dan akuntabel (dapat dipertanggungjawabkan)'),
(20, 'Pengadaan Barang/Jasa Secara Elektronik (LPSE) memberikan informasi strategis untuk pengambilan keputusan'),
(21, 'Persyaratan untuk memperoleh layanan publik di Dinas Komunikasi, Informatika dan Statistik Kota Blitar mudah untuk dipenuhi.'),
(22, 'Prosedur/alur pelayanan publik di Dinas Komunikasi, Informatika dan Statistik Kota Blitar dapat dipahami dengan jelas dan mudah dijalankan.'),
(23, 'Pelayanan publik yang Anda terima dilaksanakan cepat dan tepat waktu sesuai dengan standar waktu pelayanan publik di Dinas Komunikasi, Informatika dan Statistik Kota Blitar.'),
(24, 'Petugas tidak menerima imbalan uang dalam rangka pelayanan publik di Dinas Komunikasi, Informatika dan Statistik Kota Blitar. '),
(25, 'Produk/hasil layanan publik Dinas Komunikasi, Informatika dan Statistik Kota Blitar memiliki kualitas yang baik dan sesuai harapan Saudara.'),
(26, 'Petugas pelaksana layanan melaksanakan tugasnya dengan cakap, terampil, dan berintegritas.'),
(27, 'Petugas pelaksana memberikan pelayanan dengan ramah dan sopan. '),
(28, 'Sarana dan prasarana tersedia lengkap dan sesuai dengan jenis pelayanan publik yang diberikan. '),
(29, 'Prosedur penyampaian aduan/keluhan/saran terkait dengan penyelenggaraan pelayanan publik di Dinas Komunikasi, Informatika dan Statistik Kota Blitar jelas dan mudah dilakukan'),
(30, 'Petugas melayani pengaduan/keluhan/saran Saudara tentang pelayanan publik di Dinas Komunikasi, Informatika dan Statistik Kota Blitar dengan tanggap dan ramah.'),
(31, 'Persyaratan untuk memperoleh layanan berkaitan dengan persandian di Dinas Komunikasi, Informatika dan Statistik Kota Blitar mudah untuk dipenuhi.'),
(32, 'Prosedur/alur pelayanan persandian di Dinas Komunikasi, Informatika dan Statistik Kota Blitar dapat dipahami dengan jelas dan mudah dijalankan.'),
(33, 'Pelayanan persandian yang diterima dilaksanakan cepat dan tepat waktu sesuai dengan standar waktu pelayanan persandian di Dinas Komunikasi, Informatika dan Statistik Kota Blitar.'),
(34, 'Petugas tidak menerima imbalan uang dalam rangka pelayanan persandian di Dinas Komunikasi, Informatika dan Statistik Kota Blitar. '),
(35, 'Produk/hasil layanan persandian Dinas Komunikasi, Informatika dan Statistik Kota Blitar memiliki kualitas yang baik dan sesuai harapan Saudara.'),
(36, 'Petugas pelaksana layanan persandian melaksanakan tugasnya dengan cakap, terampil, dan berintegritas.'),
(37, 'Petugas pelaksana memberikan pelayanan persandian dengan ramah dan sopan. '),
(38, 'Sarana dan prasarana tersedia lengkap dan sesuai dengan jenis pelayanan persandian yang diberikan. '),
(39, 'Prosedur penyampaian aduan/keluhan/saran terkait dengan penyelenggaraan pelayanan persandian di Dinas Komunikasi, Informatika dan Statistik Kota Blitar jelas dan mudah dilakukan'),
(40, 'Petugas melayani pengaduan/keluhan/saran Saudara tentang pelayanan persandian di Dinas Komunikasi, Informatika dan Statistik Kota Blitar dengan tanggap dan ramah.');

-- --------------------------------------------------------

--
-- Table structure for table `responden`
--

CREATE TABLE `responden` (
  `id_responden` int(11) NOT NULL,
  `nama_responden` varchar(150) NOT NULL,
  `alamat_asal` varchar(200) DEFAULT NULL,
  `pekerjaan_jabatan` varchar(150) NOT NULL,
  `instansi` varchar(150) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `pendidikan_terakhir` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `responden`
--

INSERT INTO `responden` (`id_responden`, `nama_responden`, `alamat_asal`, `pekerjaan_jabatan`, `instansi`, `jenis_kelamin`, `pendidikan_terakhir`) VALUES
(1, 'Bella', 'Kota Blitar', 'Mahasiswi', 'ITS', 'P', 'S1'),
(2, 'Bellasih', '', 'PPK', 'ITS', 'P', 'S1'),
(3, 'aku juga', 'Kota Blitar', 'a', 'a', 'L', 'SMA/SMK'),
(4, 'Bella', 'Kota Blitar', 'a', 'a', 'L', 'SMA/SMK'),
(5, 'b', 'Kota Blitar', 'n', 'm', 'P', 'S1'),
(6, 'opopo', 'Kota Blitar', 'nfandja', 'jfakjng', 'P', 'Diploma'),
(7, 'cuwi', '', 'PPK', 'cjdb', 'L', 'SMA/SMK'),
(8, 'Bella', '', 'PPK', 'Institut Teknologi Sepuluh Nopember', 'P', 'S2/S3');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `id_isi_submit` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`id_isi_submit`, `id_pertanyaan`, `nilai`) VALUES
(1, 31, 3),
(1, 32, 2),
(1, 33, 3),
(1, 34, 2),
(1, 35, 3),
(1, 36, 2),
(1, 37, 3),
(1, 38, 2),
(1, 39, 3),
(1, 40, 2),
(2, 1, 4),
(2, 2, 3),
(2, 3, 4),
(2, 4, 3),
(2, 5, 4),
(2, 6, 3),
(2, 7, 4),
(2, 8, 3),
(2, 9, 1),
(2, 10, 2),
(2, 11, 1),
(2, 12, 1),
(2, 13, 1),
(2, 14, 1),
(2, 15, 1),
(2, 16, 1),
(2, 17, 2),
(2, 18, 1),
(2, 19, 1),
(2, 20, 1),
(3, 31, 2),
(3, 32, 2),
(3, 33, 2),
(3, 34, 2),
(3, 35, 2),
(3, 36, 2),
(3, 37, 2),
(3, 38, 2),
(3, 39, 2),
(3, 40, 2),
(4, 31, 4),
(4, 32, 3),
(4, 33, 2),
(4, 34, 1),
(4, 35, 2),
(4, 36, 3),
(4, 37, 4),
(4, 38, 3),
(4, 39, 2),
(4, 40, 1),
(5, 31, 1),
(5, 32, 1),
(5, 33, 1),
(5, 34, 1),
(5, 35, 1),
(5, 36, 1),
(5, 37, 1),
(5, 38, 1),
(5, 39, 1),
(5, 40, 1),
(6, 31, 4),
(6, 32, 4),
(6, 33, 3),
(6, 34, 2),
(6, 35, 3),
(6, 36, 3),
(6, 37, 2),
(6, 38, 2),
(6, 39, 3),
(6, 40, 3),
(7, 1, 4),
(7, 2, 4),
(7, 3, 4),
(8, 1, 3),
(8, 2, 4),
(8, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `terdiri_dari`
--

CREATE TABLE `terdiri_dari` (
  `id_kuesioner` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `terdiri_dari`
--

INSERT INTO `terdiri_dari` (`id_kuesioner`, `id_pertanyaan`) VALUES
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(3, 35),
(3, 36),
(3, 37),
(3, 38),
(3, 39),
(3, 40),
(1, 4),
(13, 1),
(13, 2),
(13, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `isi_submit`
--
ALTER TABLE `isi_submit`
  ADD PRIMARY KEY (`id_isi_submit`),
  ADD KEY `fk_isi_responden` (`id_responden`),
  ADD KEY `fk_isi_kuesioner` (`id_kuesioner`);

--
-- Indexes for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id_kuesioner`),
  ADD KEY `fk_kuesioner_admin` (`id_admin`),
  ADD KEY `fk_layanan` (`id_layanan`);

--
-- Indexes for table `laporan_rekapitulasi`
--
ALTER TABLE `laporan_rekapitulasi`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `responden`
--
ALTER TABLE `responden`
  ADD PRIMARY KEY (`id_responden`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD KEY `fk_id_isi_submit` (`id_isi_submit`);

--
-- Indexes for table `terdiri_dari`
--
ALTER TABLE `terdiri_dari`
  ADD KEY `fk_terdiri_kuesioner` (`id_kuesioner`),
  ADD KEY `fk_terdiri_pertanyaan` (`id_pertanyaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `isi_submit`
--
ALTER TABLE `isi_submit`
  MODIFY `id_isi_submit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id_kuesioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `laporan_rekapitulasi`
--
ALTER TABLE `laporan_rekapitulasi`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `responden`
--
ALTER TABLE `responden`
  MODIFY `id_responden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `isi_submit`
--
ALTER TABLE `isi_submit`
  ADD CONSTRAINT `fk_isi_kuesioner` FOREIGN KEY (`id_kuesioner`) REFERENCES `kuesioner` (`id_kuesioner`),
  ADD CONSTRAINT `fk_isi_responden` FOREIGN KEY (`id_responden`) REFERENCES `responden` (`id_responden`);

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `fk_id_isi_submit` FOREIGN KEY (`id_isi_submit`) REFERENCES `isi_submit` (`id_isi_submit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
