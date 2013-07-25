-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 25. Juli 2013 jam 04:53
-- Versi Server: 5.1.44
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_radio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_acara`
--

CREATE TABLE IF NOT EXISTS `dlmbg_acara` (
  `id_acara` int(5) NOT NULL AUTO_INCREMENT,
  `acara` varchar(100) NOT NULL,
  PRIMARY KEY (`id_acara`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `dlmbg_acara`
--

INSERT INTO `dlmbg_acara` (`id_acara`, `acara`) VALUES
(2, 'Koplo'),
(3, 'Dangdut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_detail_transaksi_jadwal`
--

CREATE TABLE IF NOT EXISTS `dlmbg_detail_transaksi_jadwal` (
  `id_detail_transaksi_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi_jadwal` int(11) NOT NULL,
  `id_hari` int(5) NOT NULL,
  `id_waktu` int(10) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `acara` varchar(100) NOT NULL,
  PRIMARY KEY (`id_detail_transaksi_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data untuk tabel `dlmbg_detail_transaksi_jadwal`
--

INSERT INTO `dlmbg_detail_transaksi_jadwal` (`id_detail_transaksi_jadwal`, `id_transaksi_jadwal`, `id_hari`, `id_waktu`, `tanggal`, `acara`) VALUES
(1, 1, 5, 2, '2013-07-10', 'aselole'),
(2, 1, 4, 2, '2013-07-16', 'inoex'),
(3, 1, 6, 2, '2013-07-18', 'joss'),
(4, 1, 3, 2, '2013-07-19', 'naskeleng'),
(5, 1, 9, 2, '2013-07-26', 'bojong'),
(6, 1, 8, 2, '2013-07-29', 'brengkengan'),
(11, 2, 7, 2, '2013-07-19', 'Single Life'),
(10, 2, 8, 2, '2013-07-20', 'Production Life'),
(12, 3, 0, 0, '', ''),
(13, 3, 0, 0, '', ''),
(14, 3, 0, 0, '', ''),
(15, 4, 3, 2, '2013-07-13', 'aselole'),
(16, 4, 4, 3, '2013-07-15', 'Single Life'),
(17, 4, 5, 2, '2013-07-17', 'Single Life Pro'),
(18, 5, 3, 2, '2013-07-15', '2'),
(19, 5, 4, 2, '2013-07-16', '2'),
(20, 5, 5, 2, '2013-07-17', '2'),
(21, 9, 3, 2, '2013-07-22', 'Kosmic Flow'),
(22, 9, 4, 3, '2013-07-23', 'Janger'),
(23, 9, 6, 4, '2013-07-25', 'Senandung Galau'),
(34, 10, 3, 2, '2013-07-31', '2'),
(33, 10, 3, 2, '', '2'),
(32, 10, 3, 2, '', '2'),
(31, 10, 3, 2, '', '2'),
(35, 10, 3, 2, '', '2'),
(36, 11, 0, 0, '', ''),
(37, 11, 0, 0, '', ''),
(38, 11, 0, 0, '', ''),
(39, 11, 0, 0, '', ''),
(40, 11, 0, 0, '', ''),
(41, 11, 0, 0, '', ''),
(42, 11, 0, 0, '', ''),
(43, 11, 0, 0, '', ''),
(44, 11, 0, 0, '', ''),
(45, 11, 0, 0, '', ''),
(57, 12, 5, 2, '2013-07-25', '3'),
(56, 12, 3, 4, '2013-07-26', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_hari`
--

CREATE TABLE IF NOT EXISTS `dlmbg_hari` (
  `id_hari` int(11) NOT NULL AUTO_INCREMENT,
  `hari` varchar(100) NOT NULL,
  PRIMARY KEY (`id_hari`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `dlmbg_hari`
--

INSERT INTO `dlmbg_hari` (`id_hari`, `hari`) VALUES
(3, 'Senin'),
(4, 'Selasa'),
(5, 'Rabu'),
(6, 'Kamis'),
(7, 'Jumat'),
(8, 'Sabtu'),
(9, 'Minggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_jadwal`
--

CREATE TABLE IF NOT EXISTS `dlmbg_jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_waktu` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_penyiar` int(11) NOT NULL,
  `id_acara` int(5) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `dlmbg_jadwal`
--

INSERT INTO `dlmbg_jadwal` (`id_jadwal`, `id_waktu`, `id_hari`, `id_penyiar`, `id_acara`) VALUES
(1, 2, 5, 1, 3),
(2, 4, 3, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_pelanggan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_pelanggan` (
  `kode_pelanggan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `jenis` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_pelanggan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data untuk tabel `dlmbg_pelanggan`
--

INSERT INTO `dlmbg_pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `telepon`, `alamat_pelanggan`, `jenis`) VALUES
(35, 'Dian Permana', '434343', 'bali', 'Umum'),
(33, 'Dedek', 'Perusahaan', 'fdfdfdf', 'Perusahaan'),
(36, 's', 'ss', 'ssss', 'Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_pembayaran`
--

CREATE TABLE IF NOT EXISTS `dlmbg_pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi_pemasangan` varchar(50) NOT NULL,
  `tanggal_bayar` varchar(30) NOT NULL,
  `dibayar` int(11) NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `dlmbg_pembayaran`
--

INSERT INTO `dlmbg_pembayaran` (`id_pembayaran`, `id_transaksi_pemasangan`, `tanggal_bayar`, `dibayar`) VALUES
(2, 'PS00000001', '', 60000),
(7, 'PS00000003', '', 0),
(6, 'PS00000002', '2013-07-20', 400000),
(8, 'PS00000004', '', 0),
(9, 'PS00000005', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_penyiar`
--

CREATE TABLE IF NOT EXISTS `dlmbg_penyiar` (
  `id_penyiar` int(5) NOT NULL AUTO_INCREMENT,
  `penyiar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_penyiar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `dlmbg_penyiar`
--

INSERT INTO `dlmbg_penyiar` (`id_penyiar`, `penyiar`) VALUES
(1, 'Ika Kartika Rahayu Ngabekti'),
(3, 'Gede Suma Wijaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_setting`
--

CREATE TABLE IF NOT EXISTS `dlmbg_setting` (
  `id_setting` int(10) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content_setting` text NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `dlmbg_setting`
--

INSERT INTO `dlmbg_setting` (`id_setting`, `tipe`, `title`, `content_setting`) VALUES
(1, 'site_title', 'Nama Situs', 'Aplikasi Radio | DLMBG'),
(2, 'site_quotes', 'Quotes Situs', 'Okelah Kalo Begitu'),
(3, 'site_footer', 'Teks Footer', 'Gede Lumbung - 2013 <br>Aplikasi Radio | DLMBG'),
(4, 'key_login', 'Hash Key MD5', 'AppRadio32'),
(5, 'site_theme', 'Theme Folder', 'black-inverse'),
(6, 'site_limit_small', 'Limit Data Small', '5'),
(7, 'site_limit_medium', 'Limit Data Medium', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_tarif_iklan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_tarif_iklan` (
  `id_tarif_iklan` int(5) NOT NULL AUTO_INCREMENT,
  `promo` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `biaya` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_tarif_iklan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `dlmbg_tarif_iklan`
--

INSERT INTO `dlmbg_tarif_iklan` (`id_tarif_iklan`, `promo`, `kategori`, `biaya`, `keterangan`) VALUES
(1, 'Loose Spot', 'Regular Time', '50000', 'Sehari 3 kali'),
(3, 'Ape Kaden', 'Prime Time', '45000', 'jossss'),
(4, 'Kosmos Horizon', 'Regular Time', '20000', 'Ok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_transaksi_jadwal`
--

CREATE TABLE IF NOT EXISTS `dlmbg_transaksi_jadwal` (
  `id_transaksi_jadwal` int(10) NOT NULL AUTO_INCREMENT,
  `id_transaksi_pemasangan` varchar(30) NOT NULL,
  `id_penyiar` int(11) NOT NULL,
  PRIMARY KEY (`id_transaksi_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `dlmbg_transaksi_jadwal`
--

INSERT INTO `dlmbg_transaksi_jadwal` (`id_transaksi_jadwal`, `id_transaksi_pemasangan`, `id_penyiar`) VALUES
(5, 'PS00000001', 1),
(10, 'PS00000003', 1),
(9, 'PS00000002', 1),
(11, 'PS00000004', 0),
(12, 'PS00000005', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_transaksi_pemasangan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_transaksi_pemasangan` (
  `id_transaksi_pemasangan` varchar(30) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `kode_pelanggan` int(11) NOT NULL,
  `id_tarif_iklan` int(11) NOT NULL,
  `durasi_iklan` varchar(20) NOT NULL,
  `volume_tayang` varchar(20) NOT NULL,
  `jumlah_biaya` int(11) NOT NULL,
  `uang_muka` int(11) NOT NULL,
  `jenis_iklan` varchar(50) NOT NULL,
  `stts` varchar(50) NOT NULL,
  `harga_lain` int(10) NOT NULL,
  `pajak` varchar(10) NOT NULL,
  `hit_pajak` int(20) NOT NULL,
  PRIMARY KEY (`id_transaksi_pemasangan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_transaksi_pemasangan`
--

INSERT INTO `dlmbg_transaksi_pemasangan` (`id_transaksi_pemasangan`, `tanggal`, `kode_pelanggan`, `id_tarif_iklan`, `durasi_iklan`, `volume_tayang`, `jumlah_biaya`, `uang_muka`, `jenis_iklan`, `stts`, `harga_lain`, `pajak`, `hit_pajak`) VALUES
('PS00000001', '2013-07-13', 35, 1, '23', '3', 100000, 40000, '', '', 0, '', 0),
('PS00000002', '2013-07-14', 35, 3, '23', '3', 483000, 93000, 'kontrak', 'Lunas', 7000, '', 0),
('PS00000003', '2013-07-20', 33, 3, '45', '5', 1125000, 400000, 'kontrak', 'Belum Lunas', 5000, '', 0),
('PS00000004', '', 33, 3, '20', '10', 9900000, 1000000, '0', 'Belum Lunas', 45000, '10', 0),
('PS00000005', '', 33, 4, '10', '2', 440000, 4000000, '0', 'Lunas', 20000, '10', 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_user`
--

CREATE TABLE IF NOT EXISTS `dlmbg_user` (
  `kode_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `dlmbg_user`
--

INSERT INTO `dlmbg_user` (`kode_user`, `username`, `password`, `level`, `nama_user`) VALUES
(1, 'admin', 'febe1e308d81e63cbe88e81920aa95ed', 'admin', 'Gede Lumbung'),
(3, 'kasir', 'a399badbf2cff1439824e6f143d0339a', 'kasir', 'Dedek Haryanto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_waktu`
--

CREATE TABLE IF NOT EXISTS `dlmbg_waktu` (
  `id_waktu` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` varchar(100) NOT NULL,
  PRIMARY KEY (`id_waktu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `dlmbg_waktu`
--

INSERT INTO `dlmbg_waktu` (`id_waktu`, `waktu`) VALUES
(2, '06.00-07.00'),
(3, '07.00-08.00'),
(4, '08.00-09.00'),
(5, '09.00-10.00'),
(6, '10.00-11.00');
