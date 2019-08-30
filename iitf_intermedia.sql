-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Agu 2019 pada 16.20
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
(29, 'P-20190830072532', 'Juara 2', '08121323123', 'A-P-20190830072532_1.docx');

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
('L-27081903', 'Juara 2', 500000);

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
('K-20190826081108', 'U-20190826081108', 'zaenur', 'zaenur.rochman98@outlook.com', '081578988248', 'amikom', ''),
('K-20190827214106', 'U-20190827214106', 'zaenur', 'zaenur.rochman98@gmail.com', '081578988248', 'amikom', 'E_learning_16.11.0068_Metopel.pdf');

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
  `jumlah_anggota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_lomba`
--

INSERT INTO `tb_lomba` (`id`, `id_kategori`, `nama`, `tema`, `deskripsi`, `guide_book`, `harga`, `keterangan`, `jumlah_anggota`) VALUES
('L-19081954', 1, 'MOBILE APP', 'Industri 4.0', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ', 'Mobile_applicationIITF2019.pdf', 100000, 'kelompok', 2),
('L-27081903', 4, 'DESIGN POSTER', 'Literasi Digital', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ', 'DESIGN_POSTERIITF2019.rar', 50000, 'individu', 0);

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
('P-20190829180544', 'K-20190826081108', 'L-27081903', '', '', 'unactive', '', '', '2019-08-29'),
('P-20190830072532', 'K-20190827214106', 'L-19081954', 'intermedia', 'Bukti_pembayaran-P-20190830072532.pdf', 'unactive', 'File-P-20190830072532.zip', 'Surat-P-20190830072532.pdf', '2019-08-30');

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

--
-- Dumping data untuk tabel `tb_pengumuman`
--

INSERT INTO `tb_pengumuman` (`id`, `judul`, `deskripsi`, `tanggal`) VALUES
(1, 'testing', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ', '2019-08-19');

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
('U-20190826081108', 'zaenur.rochman98@outlook.com', '$2a$08$Ci8hiMZYr6pxen4Apq9C9utuBk4z2CUkVnwiGR0I7uL9L7P7N/s5q', '2019-08-26', 3, 'ur7gtlPXVLvh', 'true', ''),
('U-20190827214106', 'zaenur.rochman98@gmail.com', '$2a$08$dZKcxRokzG3/0myUcYBgju3RAtFEqFyPa7SJQIwFhj9JQYLMhwsrS', '2019-08-27', 4, 'CvqnYuIaE5dj', 'true', 'ceb2fef7b799c70189a4e00901ec34');

-- --------------------------------------------------------

--
-- Struktur untuk view `listlomba`
--
DROP TABLE IF EXISTS `listlomba`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listlomba`  AS  select `a`.`id` AS `id`,`a`.`nama` AS `namalomba`,`b`.`nama` AS `kategori`,`a`.`deskripsi` AS `deskripsi`,`a`.`tema` AS `tema`,`a`.`harga` AS `harga`,`a`.`keterangan` AS `keterangan`,`a`.`jumlah_anggota` AS `jumlah_anggota` from (`tb_lomba` `a` join `tb_kategori` `b` on((`a`.`id_kategori` = `b`.`id`))) ;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
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
