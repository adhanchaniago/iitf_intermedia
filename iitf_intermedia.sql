-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Sep 2019 pada 12.25
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iitf_intermedia`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `listlomba`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `listlomba` (
`id` varchar(20)
,`namalomba` varchar(50)
,`kategori` varchar(20)
,`deskripsi` text
,`tema` varchar(200)
,`harga` float
,`keterangan` varchar(20)
,`jumlah_anggota` int(11)
,`file_gambar` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `email`, `password`) VALUES
('Z-18081921', 'zaenur.rochman98@gmail.com', '$2a$08$7SP.Rz1123gSsZ/RG5gXYOntlFD.wOg2lAVRb0UsloE8lyRY2LoEW');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id` int(11) NOT NULL,
  `id_pendaftaran` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `lampiran_identitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id`, `id_pendaftaran`, `nama`, `no_hp`, `lampiran_identitas`) VALUES
(28, 'P-20190830072532', 'zaenurrochman', '08121323123', 'A-P-20190830072532_0.pdf'),
(34, 'P-20190831124314', 'jumadi', '081236790744', 'A-P-20190831124314_0.pdf'),
(37, 'P-20190830072532', 'Yudi', '081236790744', 'A-P-20190830072532_1.pdf'),
(38, 'P-20190902101504', 'zaenurrochman', '081578178182', 'A-P-20190902101504_0.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_juara`
--

CREATE TABLE `tb_juara` (
  `id_lomba` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nominal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_juara`
--

INSERT INTO `tb_juara` (`id_lomba`, `nama`, `nominal`) VALUES
('L-19081954', 'Juara 1', 1500000),
('L-19081954', 'Juara 2', 750000),
('L-27081903', 'Juara 1', 750000),
('L-27081903', 'Juara 2', 500000),
('L-30081957', 'Juara 1', 750000),
('L-30081957', 'Juara 2', 500000),
('L-31081901', 'Juara 1', 10000000),
('L-31081901', 'Juara 2', 5000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Mahasiswa atau umum', 'loren ipsum dolor sit amet loren'),
(3, 'Pelajar', ''),
(4, 'Pelajar atau Umum', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_koor`
--

CREATE TABLE `tb_koor` (
  `id` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `institusi` varchar(30) NOT NULL,
  `lampiran_identitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_koor`
--

INSERT INTO `tb_koor` (`id`, `id_user`, `nama`, `email`, `no_hp`, `institusi`, `lampiran_identitas`) VALUES
('K-20190824173049', 'U-20190824173049', 'Dwi Candra Permana', 'dwichan@outlook.com', '', '', ''),
('K-20190827214106', 'U-20190827214106', 'zaenur', 'zaenur.rochman98@gmail.com', '081578988248', 'amikom', 'E_learning_16.11.0068_Metopel.pdf'),
('K-20190831065005', 'U-20190831065005', 'Ammar Aryanto', '', '085312313313', 'UNWIKU', 'Metopel_Zaenurrochman.docx'),
('K-20190831123503', 'U-20190831123503', 'Rahmat', 'rahmathidayatf@gmail.com', '081578178181', 'Universitas Amikom Purwokerto', 'Nilai_04-Maret-2019_14_01_55.pdf'),
('K-20190901100053', 'U-20190901100053', 'sofyan', 'sofyanfake@gmail.com', '08911113324', 'sd n ', 'Nilai_04-Maret-2019_14_01_55.pdf'),
('K-20190901103619', 'U-20190901103619', 'dzulfian', 'muflihdzulfian22@gmail.com', '085555111444', 'Amikom', 'Nilai_04-Maret-2019_14_01_55.pdf'),
('K-20190901135521', 'U-20190901135521', 'Intermedia', 'iitfintermedia@gmail.com', '', '', ''),
('K-20190902075800', 'U-20190902075800', 'zaenurrochman', 'zaenur.rochman98@outlook.com', '085312313313', 'Universitas Amikom Purwokerto', 'Foto_Koor-U-20190902075800.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lomba`
--

CREATE TABLE `tb_lomba` (
  `id` varchar(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tema` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `guide_book` varchar(50) NOT NULL,
  `harga` float NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `file_gambar` varchar(30) NOT NULL,
  `lampiran` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_lomba`
--

INSERT INTO `tb_lomba` (`id`, `id_kategori`, `nama`, `tema`, `deskripsi`, `guide_book`, `harga`, `keterangan`, `jumlah_anggota`, `file_gambar`, `lampiran`) VALUES
('L-19081954', 1, 'MOBILE APP', 'Industri 4.0', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ', 'Mobile_applicationIITF2019.pdf', 100000, 'kelompok', 2, 'G-L-19081954.png', 'false'),
('L-27081903', 4, 'DESIGN POSTER', 'Literasi Digital', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ', 'DESIGN_POSTERIITF2019.rar', 50000, 'individu', 0, 'G-L-27081903.png', 'true'),
('L-30081957', 3, 'MOTION GRAPHIC', 'Edukasi Narkoba', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ', 'MOTION_GRAPHICIITF2019.zip', 75000, 'kelompok', 1, 'G-L-30081957.png', 'false'),
('L-31081901', 3, 'WEB DESIGN', 'Industri 4.0', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ', 'TestingIITF2019.zip', 1000000000, 'individu', 0, 'G-L-31081901.png', 'false');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `id` varchar(20) NOT NULL,
  `id_koor` varchar(20) NOT NULL,
  `id_lomba` varchar(20) NOT NULL,
  `nama_team` varchar(30) NOT NULL,
  `bukti_bayar` varchar(50) NOT NULL,
  `status` enum('active','unactive') NOT NULL,
  `lampiran_file` varchar(50) NOT NULL,
  `lampiran_surat` varchar(50) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`id`, `id_koor`, `id_lomba`, `nama_team`, `bukti_bayar`, `status`, `lampiran_file`, `lampiran_surat`, `tanggal_daftar`) VALUES
('P-20190830072532', 'K-20190827214106', 'L-19081954', 'intermedia', 'Bukti_pembayaran-P-20190830072532.pdf', 'active', 'File-P-20190830072532.zip', 'Surat-P-20190830072532.pdf', '2019-08-30'),
('P-20190831065254', 'K-20190831065005', 'L-30081957', 'Mantu Idaman', 'Bukti_pembayaran-P-20190831065254.png', 'unactive', 'File-P-20190831065254.zip', 'Surat-P-20190831065254.pdf', '2019-08-31'),
('P-20190831124314', 'K-20190831123503', 'L-19081954', 'BulakRanger', 'Bukti_pembayaran-P-20190831124314.png', 'active', '', '', '2019-08-31'),
('P-20190901100942', 'K-20190901100053', 'L-27081903', '', 'Bukti_pembayaran-P-20190901100942.jpg', 'active', 'File-P-20190901100942.zip', 'Surat-P-20190901100942.pdf', '2019-09-01'),
('P-20190901104241', 'K-20190901103619', 'L-31081901', '', 'Bukti_pembayaran-P-20190901104241.png', 'active', 'File-P-20190901104241.zip', 'Surat-P-20190901104241.pdf', '2019-09-01'),
('P-20190902101504', 'K-20190902075800', 'L-27081903', 'Intermedia', 'Bukti_pembayaran-P-20190902101504.jpg', 'active', '', '', '2019-09-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengumuman`
--

CREATE TABLE `tb_pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tanggal_reg` date NOT NULL,
  `step_selesai` int(2) NOT NULL,
  `code` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `token` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `password`, `tanggal_reg`, `step_selesai`, `code`, `status`, `token`) VALUES
('U-20190824173049', 'dwichan@outlook.com', '$2a$08$OZM8jYmdROWfmiHcy1myWuJPmMmeucN7cNHtkFynGdUT0QmY2BexW', '2019-08-24', 0, '', '', ''),
('U-20190827214106', 'zaenur.rochman98@gmail.com', '$2a$08$dZKcxRokzG3/0myUcYBgju3RAtFEqFyPa7SJQIwFhj9JQYLMhwsrS', '2019-08-27', 5, 'CvqnYuIaE5dj', 'true', 'ceb2fef7b799c70189a4e00901ec34'),
('U-20190831065005', '', '$2a$08$7sU0hvhBA1qaosg5z38yLu5qPrwTKKxnorRroXl6ZDwNxr1scvfDO', '2019-08-31', 4, 'T8q5OoRDlZ9K', 'true', ''),
('U-20190831123503', 'rahmathidayatf@gmail.com', '$2a$08$4CC5iviHxg5D/iMZGHiLFO2qlDeI7SFnmHw6OFb6JhU2G46NIxVeq', '2019-08-31', 4, '6PRcKzTLUp4H', 'true', ''),
('U-20190901100053', 'sofyanfake@gmail.com', '$2a$08$R4NTR7e4nB5DNfjGh1UDi.7busTjWd5et1DFI2rIAsSJqn8EHp1Zm', '2019-09-01', 5, 'uERZ16jBW8yw', 'true', ''),
('U-20190901103619', 'muflihdzulfian22@gmail.com', '$2a$08$j13vR186fLApzTkRPLBLo.hOMAVSUTJFyyW/YA7oJXjshUUCMtT1e', '2019-09-01', 5, 'nVC7IQrNxlSy', 'true', ''),
('U-20190901135521', 'iitfintermedia@gmail.com', '$2a$08$S/qjTybZ412o/27D/mjYau7.fuzjHsiB5mi.sqSGoqHBXPik8FkYm', '2019-09-01', 0, 'ZULtTwElAkp2', 'true', ''),
('U-20190902075800', 'zaenur.rochman98@outlook.com', '$2a$08$xtm051N3YwRoit0w6KJAiOPVSZF78LHft4j5YRIOfjqsxYRDe4ora', '2019-09-02', 4, 'OeI7Ll6ojVTs', 'true', '');

-- --------------------------------------------------------

--
-- Struktur untuk view `listlomba`
--
DROP TABLE IF EXISTS `listlomba`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listlomba`  AS  select `a`.`id` AS `id`,`a`.`nama` AS `namalomba`,`b`.`nama` AS `kategori`,`a`.`deskripsi` AS `deskripsi`,`a`.`tema` AS `tema`,`a`.`harga` AS `harga`,`a`.`keterangan` AS `keterangan`,`a`.`jumlah_anggota` AS `jumlah_anggota`,`a`.`file_gambar` AS `file_gambar` from (`tb_lomba` `a` join `tb_kategori` `b` on((`a`.`id_kategori` = `b`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_anggota_daftar` (`id_pendaftaran`);

--
-- Indexes for table `tb_juara`
--
ALTER TABLE `tb_juara`
  ADD KEY `fk_juara_lomba` (`id_lomba`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_koor`
--
ALTER TABLE `tb_koor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_user_koor` (`id_user`);

--
-- Indexes for table `tb_lomba`
--
ALTER TABLE `tb_lomba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lomba_kategori` (`id_kategori`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lomba_daftar` (`id_lomba`),
  ADD KEY `fk_pendaftaran_koor` (`id_koor`);

--
-- Indexes for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `fk_anggota_daftar` FOREIGN KEY (`id_pendaftaran`) REFERENCES `tb_pendaftaran` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_juara`
--
ALTER TABLE `tb_juara`
  ADD CONSTRAINT `fk_juara_lomba` FOREIGN KEY (`id_lomba`) REFERENCES `tb_lomba` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_koor`
--
ALTER TABLE `tb_koor`
  ADD CONSTRAINT `fk_user_koor` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_lomba`
--
ALTER TABLE `tb_lomba`
  ADD CONSTRAINT `fk_lomba_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD CONSTRAINT `fk_lomba_daftar` FOREIGN KEY (`id_lomba`) REFERENCES `tb_lomba` (`id`),
  ADD CONSTRAINT `fk_pendaftaran_koor` FOREIGN KEY (`id_koor`) REFERENCES `tb_koor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
