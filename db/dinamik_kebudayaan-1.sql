-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Feb 2016 pada 14.37
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinamik_kebudayaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hak` varchar(20) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `nama_panggilan` varchar(20) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `hak`, `nama_depan`, `nama_belakang`, `nama_panggilan`, `jk`, `agama`, `tempat_lahir`, `tanggal_lahir`, `email`, `no_hp`, `alamat`, `photo`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'Soni', 'Setiawan', 'Sonice16', 'L', 'islam', 'Bandung', '1997-10-16', 'soni.setiawan.it07@gmail.com', '089608602725', 'Jln Kebon Kopi Gg Nursalim', 'programmer.png', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_artikel`
--

CREATE TABLE IF NOT EXISTS `tb_artikel` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kategori_forum` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_artikel`
--

INSERT INTO `tb_artikel` (`id`, `id_admin`, `id_provinsi`, `id_kategori_forum`, `cover`, `tanggal`) VALUES
(6, 1, 1, 2, 'palestine.PNG', '2016-02-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_artikel_language`
--

CREATE TABLE IF NOT EXISTS `tb_artikel_language` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(160) NOT NULL,
  `isi` text NOT NULL,
  `id_language` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_artikel_language`
--

INSERT INTO `tb_artikel_language` (`id_artikel`, `judul`, `isi`, `id_language`) VALUES
(6, 'Angklungklung', '<p>alat musik tradisional indonesiaaAAaaAAAA</p>\r\n', 1),
(6, 'Angklungs', '<p>traditional&nbsp;</p>\r\n', 3),
(6, 'Angklung', '<p>alat musik tradisional ti indonesaaa</p>\r\n', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE IF NOT EXISTS `tb_berita` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `id_admin`, `cover`, `tanggal`) VALUES
(1, 1, 'Capture1111.PNG', '2016-02-08'),
(2, 1, 'mtk2.PNG', '2016-02-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita_language`
--

CREATE TABLE IF NOT EXISTS `tb_berita_language` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(160) NOT NULL,
  `isi` text NOT NULL,
  `id_language` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berita_language`
--

INSERT INTO `tb_berita_language` (`id_berita`, `judul`, `isi`, `id_language`) VALUES
(1, 'Kini Belajar Seni Sudah Didukung TeknologiMan !', '<p>dasjdgaskhdashdjkhbandkasl</p>\r\n', 1),
(1, 'Ayeuna Mah Seni Teh Tos Didukung Teknologi', '<p>dshjdkahskb amn bhichiaccaeyoyqw oajfcanbfm</p>\r\n', 2),
(2, 'berita', '<p>asd</p>\r\n', 1),
(2, 'berita', '<p>as</p>\r\n', 2),
(1, 'djaskjl', '<p>dhsajdh</p>\r\n', 3),
(2, 'dhsajdhaskhk', '<p>dshajdhak</p>\r\n', 3),
(1, 'dhsajhdka', '<p>dsahjd</p>\r\n', 4),
(2, 'dhasjkcnma', '<p>dsahcbzxnmhdjask</p>\r\n', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_disable`
--

CREATE TABLE IF NOT EXISTS `tb_disable` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_disable`
--

INSERT INTO `tb_disable` (`id`, `id_user`, `id_quiz`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban`
--

CREATE TABLE IF NOT EXISTS `tb_jawaban` (
  `id` int(11) NOT NULL,
  `jawaban_texta` varchar(255) NOT NULL,
  `jawaban_textb` varchar(255) NOT NULL,
  `jawaban_textc` varchar(255) NOT NULL,
  `jawaban_textd` varchar(255) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_language` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jawaban`
--

INSERT INTO `tb_jawaban` (`id`, `jawaban_texta`, `jawaban_textb`, `jawaban_textc`, `jawaban_textd`, `id_soal`, `id_language`) VALUES
(1, 'Bali', 'Jawa', 'Sumatera', 'Sulawesi', 1, 1),
(2, 'Bali', 'Jawa', 'Sumatera', 'Sulawesi', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_forum`
--

CREATE TABLE IF NOT EXISTS `tb_kategori_forum` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori_forum`
--

INSERT INTO `tb_kategori_forum` (`id`, `logo`, `kategori`) VALUES
(1, '', 'Tari'),
(2, '', 'Musik'),
(3, 'kartu_sekolah.PNG', 'ktp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_quiz`
--

CREATE TABLE IF NOT EXISTS `tb_kategori_quiz` (
  `id` int(11) NOT NULL,
  `kategori_quiz` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori_quiz`
--

INSERT INTO `tb_kategori_quiz` (`id`, `kategori_quiz`) VALUES
(1, 'Seni Tari'),
(2, 'Musik Tradisional Daerah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar`
--

CREATE TABLE IF NOT EXISTS `tb_komentar` (
  `id` int(11) NOT NULL,
  `id_forum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar_berita`
--

CREATE TABLE IF NOT EXISTS `tb_komentar_berita` (
  `id` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_komentar_berita`
--

INSERT INTO `tb_komentar_berita` (`id`, `id_berita`, `id_user`, `isi_komentar`, `tanggal`, `status`) VALUES
(2, 2, 2, 'sughooi', '2016-01-19', '1'),
(3, 3, 2, 'Kerenn ', '2016-02-07', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar_topik`
--

CREATE TABLE IF NOT EXISTS `tb_komentar_topik` (
  `id` int(11) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_komentar_topik`
--

INSERT INTO `tb_komentar_topik` (`id`, `id_topik`, `id_user`, `isi_komentar`, `tanggal`, `status`) VALUES
(1, 2, 2, 'Keren banget lah  , jadi pengen berbudaya indonesia', '2016-02-03', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_language`
--

CREATE TABLE IF NOT EXISTS `tb_language` (
  `id` int(11) NOT NULL,
  `language` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_language`
--

INSERT INTO `tb_language` (`id`, `language`) VALUES
(1, 'Indonesia'),
(2, 'Sunda'),
(3, 'English'),
(4, 'Jawa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE IF NOT EXISTS `tb_level` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `batasxp` int(11) NOT NULL,
  `julukan` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id`, `level`, `batasxp`, `julukan`) VALUES
(2, 1, 3000, 'Cikal Budayers');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_provinsi`
--

CREATE TABLE IF NOT EXISTS `tb_provinsi` (
  `id` int(11) NOT NULL,
  `provinsi` varchar(160) NOT NULL,
  `id_language` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`id`, `provinsi`, `id_language`) VALUES
(1, 'Jawa Barat', 2),
(2, 'Daerah Istimewa Yogyakarta', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_quiz`
--

CREATE TABLE IF NOT EXISTS `tb_quiz` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_quiz`
--

INSERT INTO `tb_quiz` (`id`, `tanggal`) VALUES
(1, '2016-02-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_quiz_language`
--

CREATE TABLE IF NOT EXISTS `tb_quiz_language` (
  `id_quiz` int(11) NOT NULL,
  `judul_quiz` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `soal1` int(11) NOT NULL,
  `soal2` int(11) NOT NULL,
  `soal3` int(11) NOT NULL,
  `soal4` int(11) NOT NULL,
  `soal5` int(11) NOT NULL,
  `id_kategori_quiz` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_quiz_language`
--

INSERT INTO `tb_quiz_language` (`id_quiz`, `judul_quiz`, `keterangan`, `soal1`, `soal2`, `soal3`, `soal4`, `soal5`, `id_kategori_quiz`) VALUES
(1, 'Tari Jaipong', 'Quiz ini Berisi soal soal tentang tarian jaipong', 1, 1, 1, 1, 1, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal`
--

CREATE TABLE IF NOT EXISTS `tb_soal` (
  `id` int(11) NOT NULL,
  `jawaban` char(1) NOT NULL,
  `jawaban_text_benar` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `xp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_soal`
--

INSERT INTO `tb_soal` (`id`, `jawaban`, `jawaban_text_benar`, `id_kategori`, `xp`) VALUES
(1, 'B', 'Jawa', 1, 300);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal_language`
--

CREATE TABLE IF NOT EXISTS `tb_soal_language` (
  `id_soal` int(11) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `id_language` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_soal_language`
--

INSERT INTO `tb_soal_language` (`id_soal`, `soal`, `id_language`) VALUES
(1, 'Tari Jaipong Berasal dari daerah?', 1),
(1, 'Tari Jaipong tidaerah mana?', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_topik`
--

CREATE TABLE IF NOT EXISTS `tb_topik` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori_forum` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_topik`
--

INSERT INTO `tb_topik` (`id`, `id_user`, `id_kategori_forum`, `tanggal`, `status`) VALUES
(2, 2, 1, '2016-02-02', '0'),
(3, 2, 1, '2016-02-02', '0'),
(4, 2, 1, '2016-02-02', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_topik_language`
--

CREATE TABLE IF NOT EXISTS `tb_topik_language` (
  `id_topik` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `id_language` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_topik_language`
--

INSERT INTO `tb_topik_language` (`id_topik`, `judul`, `isi`, `id_language`) VALUES
(2, 'Tarian Jaipong Bikin Geger Dunia', 'asdasdsa', 1),
(3, 'Tarian Bali', 'Bali ini terkenal dengan tarian Bali', 1),
(4, 'Tarian Aceh', 'Aceh memiliki tarian yang sangat unik', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak` varchar(50) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `nama_panggilan` varchar(50) NOT NULL,
  `tentang` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `tanggal_daftar` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `xp` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `hak`, `nama_depan`, `nama_belakang`, `nama_panggilan`, `tentang`, `alamat`, `email`, `no_hp`, `photo`, `tanggal_daftar`, `status`, `level`, `xp`) VALUES
(1, 'shanks', 'shanks', 'user', '', '', '', '', '', 'shanks10', '', '', '2016-02-02', '1', 1, 1500),
(2, 'namikaze', 'minato', 'user', 'Namikaze', 'Minato', 'Flash', 'Hokage 4', 'Konoha', 'minato.namikaze@gmail.com', '0', 'jannine.png', '2016-02-02', '1', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_disable`
--
ALTER TABLE `tb_disable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori_forum`
--
ALTER TABLE `tb_kategori_forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori_quiz`
--
ALTER TABLE `tb_kategori_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_komentar_berita`
--
ALTER TABLE `tb_komentar_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_komentar_topik`
--
ALTER TABLE `tb_komentar_topik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_language`
--
ALTER TABLE `tb_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id`,`level`);

--
-- Indexes for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_quiz`
--
ALTER TABLE `tb_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_topik`
--
ALTER TABLE `tb_topik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_disable`
--
ALTER TABLE `tb_disable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_kategori_forum`
--
ALTER TABLE `tb_kategori_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_kategori_quiz`
--
ALTER TABLE `tb_kategori_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_komentar_berita`
--
ALTER TABLE `tb_komentar_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_komentar_topik`
--
ALTER TABLE `tb_komentar_topik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_language`
--
ALTER TABLE `tb_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_quiz`
--
ALTER TABLE `tb_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_topik`
--
ALTER TABLE `tb_topik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
