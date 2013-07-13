-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 13. Juli 2013 jam 17:22
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

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
(18, 5, 3, 2, '2013-07-15', 'aselole'),
(19, 5, 4, 2, '2013-07-16', 'Single Life'),
(20, 5, 5, 2, '2013-07-17', 'Single Life Pro'),
(21, 9, 0, 0, '', ''),
(22, 9, 0, 0, '', ''),
(23, 9, 0, 0, '', '');

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
  `acara` varchar(150) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `dlmbg_jadwal`
--

INSERT INTO `dlmbg_jadwal` (`id_jadwal`, `id_waktu`, `id_hari`, `id_penyiar`, `acara`) VALUES
(1, 3, 5, 1, 'Kopok'),
(2, 6, 5, 3, 'Ngocok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_pelanggan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_pelanggan` (
  `kode_pelanggan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  PRIMARY KEY (`kode_pelanggan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data untuk tabel `dlmbg_pelanggan`
--

INSERT INTO `dlmbg_pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `telepon`, `alamat_pelanggan`) VALUES
(35, 'Dian Permana', '434343', 'bali'),
(33, 'Dedek', 'Perusahaan', 'fdfdfdf');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `dlmbg_pembayaran`
--

INSERT INTO `dlmbg_pembayaran` (`id_pembayaran`, `id_transaksi_pemasangan`, `tanggal_bayar`, `dibayar`) VALUES
(2, 'PS00000001', '', 60000),
(6, 'PS00000002', '', 0);

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
  `st` varchar(30) NOT NULL,
  `promo` varchar(100) NOT NULL,
  `durasi` varchar(100) NOT NULL,
  `prime_time` varchar(100) NOT NULL,
  `regular_time` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_tarif_iklan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `dlmbg_tarif_iklan`
--

INSERT INTO `dlmbg_tarif_iklan` (`id_tarif_iklan`, `st`, `promo`, `durasi`, `prime_time`, `regular_time`, `keterangan`) VALUES
(1, 'Tarif Iklan Program', 'Loose Spot', '0-120', '50000', '30000', 'Sehari 3 kali'),
(3, 'Tarif Iklan Program', 'Ape Kaden', '120-150', '45000', '199000', 'jossss');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_transaksi_jadwal`
--

CREATE TABLE IF NOT EXISTS `dlmbg_transaksi_jadwal` (
  `id_transaksi_jadwal` int(10) NOT NULL AUTO_INCREMENT,
  `id_transaksi_pemasangan` varchar(30) NOT NULL,
  `id_penyiar` int(11) NOT NULL,
  PRIMARY KEY (`id_transaksi_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `dlmbg_transaksi_jadwal`
--

INSERT INTO `dlmbg_transaksi_jadwal` (`id_transaksi_jadwal`, `id_transaksi_pemasangan`, `id_penyiar`) VALUES
(5, 'PS00000001', 1),
(9, 'PS00000002', 0);

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
  PRIMARY KEY (`id_transaksi_pemasangan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_transaksi_pemasangan`
--

INSERT INTO `dlmbg_transaksi_pemasangan` (`id_transaksi_pemasangan`, `tanggal`, `kode_pelanggan`, `id_tarif_iklan`, `durasi_iklan`, `volume_tayang`, `jumlah_biaya`, `uang_muka`) VALUES
('PS00000001', '2013-07-13', 35, 1, '23', '3', 100000, 40000),
('PS00000002', '2013-07-14', 35, 1, '23', '3', 100000, 93000);

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
(3, 'kasir', 'f2f9e8daebf8c0ebceef0050fe6c2423', 'kasir', 'Dedek Haryanto');

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