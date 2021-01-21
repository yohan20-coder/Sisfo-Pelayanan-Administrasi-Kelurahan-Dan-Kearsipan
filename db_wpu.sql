-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Okt 2020 pada 14.43
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wpu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `arske`
--

CREATE TABLE `arske` (
  `id` int(5) NOT NULL,
  `nosurat` varchar(25) NOT NULL,
  `noklasi` varchar(25) NOT NULL,
  `ringkasan` text NOT NULL,
  `pengelolah` varchar(25) NOT NULL,
  `tglsurat` date NOT NULL,
  `kepada` varchar(25) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `arske`
--

INSERT INTO `arske` (`id`, `nosurat`, `noklasi`, `ringkasan`, `pengelolah`, `tglsurat`, `kepada`, `keterangan`) VALUES
(10, '111', '', 'ghfhfjhfj', '111', '2020-08-25', '1111', '111'),
(15, '2222', '222', '2222', '2222', '2020-09-29', '2222', '2222');

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsma`
--

CREATE TABLE `arsma` (
  `id` int(11) NOT NULL,
  `nosurat` varchar(50) NOT NULL,
  `noklasi` varchar(50) NOT NULL,
  `tglsurat` date NOT NULL,
  `tglteri` date NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `disposisi` text NOT NULL,
  `instansi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `arsma`
--

INSERT INTO `arsma` (`id`, `nosurat`, `noklasi`, `tglsurat`, `tglteri`, `perihal`, `isi`, `disposisi`, `instansi`) VALUES
(58, 'werw', '', '2020-08-11', '2020-08-11', 'sfs', 'sdfsf', 'ssfd', 'sfsdf'),
(59, 'andi', '111', '2020-09-29', '2020-10-28', '111', '1111', '111', '1111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartukel`
--

CREATE TABLE `kartukel` (
  `id` int(11) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nama_kk` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `kelurahan` varchar(25) NOT NULL,
  `rt/rw` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kartukel`
--

INSERT INTO `kartukel` (`id`, `no_kk`, `nama_kk`, `alamat`, `kelurahan`, `rt/rw`) VALUES
(4, '1111111111111112', 'Candra Mukti22', 'jln durian22', 'Rewarangga22', '355322'),
(5, '1234567891234567', 'Andika ganteng', 'jln durian', 'Rewarangga', '01/02'),
(6, '2222222222222222', 'Yudi', 'jln durian', 'Rewarangga', '01/02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `golongan` varchar(20) NOT NULL,
  `jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `nip`, `jk`, `golongan`, `jabatan`) VALUES
(1, 'Andi', '111111', 'Laki-Laki', 'Penata TK II/A', 'Lurah'),
(2, 'Imelda yang cantik', '222222', 'Perempuan', 'Penata II/A', 'Sekertaris Kelurahan'),
(5, 'Randi', '1222222222222', 'Laki-Laki', 'Penata II/B', 'Bendahara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tempatla` varchar(25) NOT NULL,
  `tglah` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pend` varchar(25) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id`, `nama`, `no_kk`, `nik`, `jk`, `tempatla`, `tglah`, `agama`, `pend`, `pekerjaan`) VALUES
(2, 'Anita', '111313', '1313131', 'Perempuan', 'sfsfs', '2020-10-12', 'Katolik', 'SMA', 'Petani'),
(3, 'Ardian', '1234567891234567', '35453', 'Laki-Laki', 'asdad', '2020-10-06', 'Islam', 'SD', 'Petani'),
(4, 'Imel', '1111111111111112', '1313', 'Perempuan', 'Surabaya', '2020-10-20', 'Kristen/Protestan', 'Sarjana(S1)', 'Guru'),
(5, 'Rosalia', '1234567891234567', '4242242', 'Perempuan', 'asdad', '2020-10-14', 'Hindu', 'SMP', 'Pedagang'),
(6, 'Andika', '1111111111111112', '24242', 'Laki-Laki', 'Surabaya', '2020-10-20', 'Budha', 'Sarjana(S1)', 'PNS'),
(7, 'Imelda yang cantik', '1234567891011111', '12345678', 'Perempuan', 'Surabaya', '2020-10-12', 'Katolik', 'SMA', 'Karyawan Swasta'),
(8, 'Imelda yang cantik1', '1111111111111112', '123456789', 'Perempuan', 'sss', '2020-10-19', 'Kristen/Protestan', 'Magister(S2)', 'Dosen'),
(9, 'Andi tamvan', '1111111111111112', '1234567891', 'Laki-Laki', 'Surabaya', '2020-10-05', 'Konghucu', 'Doktor(S3)', 'Dosen'),
(10, 'Andika', '1111111111111112', '12345678912', 'Laki-Laki', 'Surabaya', '2020-10-19', 'Budha', 'Profesor', 'Dosen'),
(11, 'Andi tamvan', '1234567891234567', '123456789125667', 'Laki-Laki', 'Surabaya', '2020-10-06', 'Katolik', 'Doktor(S3)', 'Dosen'),
(12, 'Andika', '2222222222222222', '24242112', 'Laki-Laki', 'Surabaya', '2020-10-20', 'Budha', 'Sarjana(S1)', 'PNS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Andi', 'yohanesardinus@gmail.com', '20200812_203832.jpg', '$2y$10$UWHfrxur3PVtweVFKbrQmu7ANstY6ohk9H7cMLf.RYEGMGE3SuIcG', 1, 1, 1577927356),
(7, 'Imelda Cantik', 'imel@gmail.com', 'default.jpg', '$2y$10$0nh8e6alD77EXthUMGOQ5OuewafZ9FgCx3i1UDTccdPcVGwdvWQQi', 1, 1, 1601730344),
(9, 'ardia', 'ardian@gmail.com', 'default.jpg', '$2y$10$u1audCmxsTtHmpXPM02OCeFZyMgDXx9X.b49FpenkDDU0.WYLeyw.', 3, 1, 1601731341);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(27, 1, 5),
(28, 1, 8),
(30, 1, 9),
(39, 1, 2),
(40, 1, 3),
(41, 1, 4),
(45, 3, 2),
(46, 3, 4),
(47, 3, 3),
(48, 1, 11),
(49, 2, 11),
(50, 3, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `name`, `menu`) VALUES
(1, 'Administrator', 'Admin'),
(2, 'Master Data', 'Master'),
(3, 'Pelayanan Administrasi', 'layanan'),
(4, 'Manajemen Arsip', 'Arsip'),
(5, 'Setting Menu', 'Menu'),
(11, 'Setting Account', 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member'),
(3, 'Member 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(4, 5, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 5, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(9, 5, 'Management Role Access', 'admin/role', 'fa fa-fw fa-user-tie', 1),
(10, 4, 'Arsip Surat Masuk', 'arsip', 'fas fa-fw fa-folder', 1),
(11, 4, 'Arsip Surat Keluar', 'arsip/suratkel', 'fas fa-fw fa-folder', 1),
(12, 5, 'Management Pengguna', 'menu/tampiluser', 'fas fa-fw fa-users', 1),
(13, 2, 'Master Kartu Keluarga', 'master', 'fas fa-fw fa-book', 1),
(14, 2, 'Master Data Penduduk', 'master/penduduk', 'fas fa-fw fa-users', 1),
(15, 2, 'Master Data Pegawai', 'master/pegawai', 'fas fa-fw fa-user', 1),
(16, 3, 'Pelayanan Surat', 'layanan', 'fas fa-fw fa-file', 1),
(17, 11, 'ProfilKu', 'user', 'fas fa-fw fa-user', 1),
(18, 11, 'Ubah Profil', 'user/edit', 'fas fa-fw fa-user', 1),
(19, 11, 'Ubah Password', 'user/changepassword', 'fas fa-fw fa-lock', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `arske`
--
ALTER TABLE `arske`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `arsma`
--
ALTER TABLE `arsma`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kartukel`
--
ALTER TABLE `kartukel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `arske`
--
ALTER TABLE `arske`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `arsma`
--
ALTER TABLE `arsma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `kartukel`
--
ALTER TABLE `kartukel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
