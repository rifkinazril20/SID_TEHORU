-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Jul 2023 pada 23.54
-- Versi server: 10.5.21-MariaDB-cll-lve
-- Versi PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `febd2356_desa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(99) DEFAULT NULL,
  `username` varchar(99) DEFAULT NULL,
  `password` varchar(99) DEFAULT NULL,
  `telp` varchar(99) DEFAULT NULL,
  `email` varchar(99) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `telp`, `email`, `level`, `status`, `date`) VALUES
(1, 'Administrator', 'admin', '7363a0d0604902af7b70b271a0b96480', '081295916567', 'admin@admin.com', 1, 1, '2022-01-20'),
(2, 'Operator', 'operator', '7363a0d0604902af7b70b271a0b96480', '087848274656', 'operator@operator.com', 2, 1, '2022-03-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `slug` varchar(99) DEFAULT NULL,
  `judul` varchar(99) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idkat` int(11) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `gambar` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `slug`, `judul`, `iduser`, `idkat`, `ket`, `date`, `views`, `gambar`) VALUES
(1, 'lorem-ipsum-dolor', 'Lorem ipsum dolor ', 1, 2, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus fuga veritatis et omnis numquam impedit ab modi possimus quod veniam, quas dicta facere repudiandae consequatur, nihil voluptatibus. Quam magnam aut earum voluptates doloribus cum quisquam repellat corporis dolor. Temporibus maiores consectetur, quaerat voluptatibus aliquam, consequuntur natus nisi eius esse provident ad explicabo numquam enim, ducimus rerum labore nam illum illo veniam est ipsam. Quasi quo eligendi incidunt iste expedita enim maiores repudiandae commodi! Error tenetur corrupti sequi, recusandae at doloribus sint tempore aliquam laboriosam libero eveniet commodi, excepturi impedit dolor mollitia voluptas saepe quidem soluta vero ea? Consectetur quam facere sequi dolore corrupti nesciunt, alias laboriosam placeat molestias, voluptatum illo veritatis reiciendis. Pariatur voluptatem ab animi eligendi sequi? Veritatis aperiam nesciunt quos earum, ex eius sed debitis necessitatibus saepe a nisi nihil vero optio ipsum itaque fugiat similique adipisci, maxime sapiente magnam accusamus pariatur. Vero accusantium delectus eum qui distinctio!<br></p>', '2022-02-27', 5, '6e94cedb4dd81d678b0f49738ef10d61.jpg'),
(2, 'heloo-there', 'Heloo there', 1, 1, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi error neque voluptas odio autem deleniti explicabo repellendus iusto fuga molestiae nisi, tempore distinctio. Quod iste officiis culpa impedit sunt! Cupiditate atque at quaerat, tempore perspiciatis maxime dolor ullam autem corporis voluptatum, incidunt totam quod. Omnis cupiditate rem voluptas recusandae, quasi illum, in nemo autem iusto quis incidunt eveniet doloribus nihil voluptatibus expedita corrupti culpa ipsa id ipsam quae sint alias quaerat architecto. Tempore sunt expedita, dignissimos laudantium obcaecati vel officia nam temporibus nihil illo optio maxime delectus dicta sit. Aspernatur, reprehenderit. Ratione magni atque saepe consectetur assumenda placeat labore nemo molestias. Voluptate, tenetur culpa! Optio beatae animi velit nobis aut quae exercitationem magni sunt accusamus odio assumenda, totam laborum obcaecati? Quisquam ipsa optio alias eius nostrum hic iste suscipit necessitatibus, porro possimus ipsam velit beatae itaque dolores, laudantium qui? Sapiente odio modi, possimus cupiditate molestiae ab deserunt tempora! Velit, incidunt.<br></p>', '2022-03-02', 16, 'a25101df030dfbb752ef4cd0c6b29657.jpg'),
(4, 'nyepii', 'nyepii', 1, 2, '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe, ducimus error obcaecati odit ipsa praesentium. In ullam laboriosam qui tenetur esse fugit voluptas labore aut aliquam temporibus adipisci, blanditiis nisi doloremque nihil eligendi eius. Vel fugiat nostrum sequi nobis libero eveniet, ipsam aperiam dolore. Fugit voluptatum esse tempore nemo aliquid asperiores incidunt veniam est alias numquam sunt, nostrum cum voluptas! Minima sed hic ipsa iure consequuntur debitis magnam molestiae at corrupti consequatur nulla delectus non atque cupiditate, dicta libero similique repudiandae! Magnam quod cupiditate voluptate quas velit magni animi quibusdam officia corrupti, quia similique vero eaque numquam, molestias inventore quos quasi perspiciatis quaerat! Quaerat nobis veritatis perspiciatis assumenda totam, commodi tenetur saepe veniam maiores, magnam delectus repellendus rem voluptatem sequi. Et ipsa commodi libero qui tempora. Voluptate quam sunt corrupti numquam quos, unde corporis? Illum fuga qui sit voluptas itaque illo commodi. Optio ea itaque eos pariatur molestias nulla necessitatibus!<br></p>', '2022-03-03', 0, '45cc965deb021d7710f5814adc225fae.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bpd`
--

CREATE TABLE `bpd` (
  `judul` varchar(99) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `gambar` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bpd`
--

INSERT INTO `bpd` (`judul`, `ket`, `gambar`) VALUES
('BPD Desa', '<div>&nbsp; &nbsp; Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia labore dolor aliquam ex! Consectetur distinctio laudantium eos ducimus aperiam deserunt placeat, provident nulla velit ipsa iste, reiciendis sint minus numquam minima esse! Sapiente dicta obcaecati cumque quidem necessitatibus provident excepturi quibusdam quaerat optio nulla ducimus illum ad quisquam inventore vero maxime ratione accusamus ut neque eaque quis, perferendis, sequi reiciendis delectus? Praesentium autem adipisci sunt ducimus, ad reprehenderit ut, ullam architecto delectus nam debitis ex nulla. Saepe cumque porro animi dolore dolores commodi est cum repudiandae, temporibus rem! Possimus error ipsam doloribus fuga culpa quos praesentium, nam nihil inventore aliquid. test&nbsp;&nbsp;&nbsp;&nbsp;</div><div><br></div>', 'faeed51d2f1a6350fd032e1016623f90.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `judul` varchar(99) DEFAULT NULL,
  `mulai` datetime DEFAULT NULL,
  `selesai` datetime DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `gambar` varchar(99) DEFAULT NULL,
  `gambar2` varchar(99) DEFAULT NULL,
  `gambar3` varchar(99) DEFAULT NULL,
  `lat` varchar(99) DEFAULT NULL,
  `lng` varchar(99) DEFAULT NULL,
  `slug` varchar(99) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `judul`, `mulai`, `selesai`, `ket`, `lokasi`, `gambar`, `gambar2`, `gambar3`, `lat`, `lng`, `slug`, `status`, `view`) VALUES
(1, 'Dirgahayu Kemerdekaan RI ke-75th 2', '2022-02-20 12:00:00', '2022-02-24 04:20:00', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam accusamus exercitationem quisquam quasi, possimus porro ad iste dignissimos recusandae alias illo suscipit, sed in voluptates assumenda repellat nihil excepturi quam animi sequi. Aspernatur libero minima voluptatem cumque numquam dicta rem saepe eveniet illum blanditiis aut atque doloremque quisquam repellat consectetur, enim neque commodi cum natus quibusdam vitae voluptas adipisci reprehenderit? Dolore earum assumenda veritatis tempore corrupti nam minima id neque, omnis doloremque itaque voluptas odit aut ad quae eius necessitatibus ab vel rerum. Cumque quis dolor iure similique pariatur optio, sunt eos rerum at accusantium, quod quasi, tempore beatae dolorem?<br></p>', '<p>bogor</p>', 'bb2ac9fa3d113f1231e46a370e761764.jpg', '37ef284b5106e37e84de47d5cb7fb441.jpg', '6e41279a61d98b81f774102fbad82ca0.jpg', '-6.509085836497545', '106.90782768023105', 'dirgahayu-kemerdekaan-ri-ke-75th-2', 1, 10),
(2, 'hiii', '2022-03-02 12:00:00', '2022-04-05 12:00:00', '<p>hiii<br></p>', '<p>hiii<br></p>', 'd19cb95551b27ca7317de3311dcb7ea5.jpg', 'b1e47f194ac3584c10caff268e1b719a.jpg', '650e081f1f5aae06b189df58870a4bfe.jpg', '-6.942785785094588', '106.32071564626338', 'hiii', 1, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `judul` varchar(99) DEFAULT NULL,
  `status` varchar(99) DEFAULT NULL,
  `gambar` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `status`, `gambar`) VALUES
(1, 'Dirgahayu Kemerdekaan', 'Publish', 'ac071eab7fc5cc7aed652ef70098d2bf.jpg'),
(2, 'Islamic New years', 'Publish', 'ebb81b8761308551b0aa2030a3dfb19f.jpg'),
(3, 'LPRT MURA', 'Publish', '26b086894653dbc125de4ffd44d1a408.jpg'),
(5, 'hello my name febri', 'Publish', 'ce2b196b37be6ac467a4cedb2939819f.jpg'),
(6, 'Marhaban ya ramadhan ', 'Publish', '5256af7c4ef1fcfd6b13a9a27c8866ef.jpg'),
(8, 'Dirgahayu Kemerdekaan RI ke-75th 2', 'Publish', '15b83185c3976baaa80faab73c29bbfa.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_kegiatan`
--

CREATE TABLE `galeri_kegiatan` (
  `id` int(11) NOT NULL,
  `idkegiatan` int(11) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `foto` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri_kegiatan`
--

INSERT INTO `galeri_kegiatan` (`id`, `idkegiatan`, `ket`, `foto`) VALUES
(2, 2, 'Hello world', '63d62cded55c31c8cfb96f797611e47c.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `irigasi`
--

CREATE TABLE `irigasi` (
  `id` int(11) NOT NULL,
  `irigasi` varchar(99) DEFAULT NULL,
  `panjang_jalur` varchar(99) DEFAULT NULL,
  `lebar` varchar(99) DEFAULT NULL,
  `geojson` text DEFAULT NULL,
  `warna` varchar(99) DEFAULT NULL,
  `ketebalan` varchar(99) DEFAULT NULL,
  `gambar` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `irigasi`
--

INSERT INTO `irigasi` (`id`, `irigasi`, `panjang_jalur`, `lebar`, `geojson`, `warna`, `ketebalan`, `gambar`) VALUES
(5, 'Irigasi 2', '5000 m', '3 m', '{\"type\":\"FeatureCollection\",\"features\":[{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"LineString\",\"coordinates\":[[106.843117,-6.277931],[106.845996,-6.289961],[106.851495,-6.288127],[106.851796,-6.283392],[106.847929,-6.283434],[106.847757,-6.276865]]}},{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"LineString\",\"coordinates\":[[106.843206,-6.278145],[106.846514,-6.286804],[106.850123,-6.286292]]}}]}', '#793B14', '1', 'e997dca4294bab88a05354c1304eaab0.jpg'),
(6, 'Irigasi saya', '5000 m', '3 m', '{\"type\":\"FeatureCollection\",\"features\":[{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"LineString\",\"coordinates\":[[106.71844,-6.581737]]}},{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"LineString\",\"coordinates\":[[106.704004,-6.590945],[106.721877,-6.618229],[106.732875,-6.637668],[106.757278,-6.652331],[106.784812,-6.651649],[106.804747,-6.649262],[106.832587,-6.64858],[106.835336,-6.654036],[106.853209,-6.647216],[106.85424,-6.628801]]}}]}', '#488792', '10', '9faa25adc914c2cc33c8ce2707a051b3.jpg'),
(7, 'Irigasi 1', '5000 m', '3 m', '{\"type\":\"FeatureCollection\",\"features\":[{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"LineString\",\"coordinates\":[[106.737699,-6.571164],[106.72292,-6.660175],[106.776194,-6.680975]]}}]}', '#B2CA22', '8', 'f32f2da3d1dd1a0e234b0597c7686073.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `jenis_kegiatan` varchar(99) DEFAULT NULL,
  `icon` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `jenis_kegiatan`, `icon`) VALUES
(2, 'Rabat Beton', 'ce36a01cf9f02b10ce58c9e1a8a1e240.png'),
(3, 'TPT-TPJ', 'ad3f333240079472215d835c58a442dc.png'),
(4, 'Gapura', '8b2a0a78614cdead9efb2986b27fcad6.png'),
(5, 'Gedung', 'deb6a12a6b92df808477647792ba4cba.png'),
(6, 'Hotmix', 'a4425695be4ae3d4973e3f33804ccd97.png'),
(7, 'Jembatan', '694d94739ad467b21b3eae48018188b4.png'),
(8, 'Lapen', 'f8bf47838fc4dd45e5dcfb533ce735a1.png'),
(9, 'MCK', '5f8a11afdbafd40708355446da1af2e4.png'),
(10, 'Paving', '03591d0d898e88130f9c936870da6010.png'),
(11, 'Taman', '182aac7099eeb30a713282eacda54869.png'),
(12, 'RTLH', '31a580fbbf9c5728bea226776abf012f.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kat` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kat`) VALUES
(1, 'Bencana alam'),
(2, 'Islamic');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_komplain`
--

CREATE TABLE `kategori_komplain` (
  `id` int(11) NOT NULL,
  `kat` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_komplain`
--

INSERT INTO `kategori_komplain` (`id`, `kat`) VALUES
(1, 'Administrasi'),
(2, 'Beras Miskin'),
(3, 'BLT (Bantuan Langsung Tunai)'),
(4, 'Infrastruktur'),
(5, 'Keamanan'),
(6, 'Kesehatan'),
(7, 'Pelayanan Publik'),
(8, 'Pendidikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `kegiatan` varchar(99) DEFAULT NULL,
  `idjenis` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `idsumberdana` int(11) DEFAULT NULL,
  `anggaran` varchar(99) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `volume` varchar(99) DEFAULT NULL,
  `pelaksana` varchar(99) DEFAULT NULL,
  `desk` text DEFAULT NULL,
  `lat` varchar(99) DEFAULT NULL,
  `lng` varchar(99) DEFAULT NULL,
  `sampul` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `kegiatan`, `idjenis`, `alamat`, `idsumberdana`, `anggaran`, `tahun`, `volume`, `pelaksana`, `desk`, `lat`, `lng`, `sampul`) VALUES
(2, 'Jombang Berkadang', 8, 'bogor', 5, '2000000', '2022', '1 Unit', '	TPK Desa', '<p>test asd</p>', '-6.631188154758206', '106.79397124970103', 'bc6b08f3c6a72145c41ab10c47b35819.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `id` int(11) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jenis_anggaran` varchar(99) DEFAULT NULL,
  `rincian` varchar(99) DEFAULT NULL,
  `nilai_anggaran` varchar(99) DEFAULT NULL,
  `nilai_realisasi` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`id`, `tahun`, `jenis_anggaran`, `rincian`, `nilai_anggaran`, `nilai_realisasi`) VALUES
(7, '2020', 'Pembiayaan', 'test2', '10000', '201000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_berita`
--

CREATE TABLE `komentar_berita` (
  `id` int(11) NOT NULL,
  `idberita` int(11) DEFAULT NULL,
  `nama` varchar(99) DEFAULT NULL,
  `email` varchar(99) DEFAULT NULL,
  `komen` text DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar_berita`
--

INSERT INTO `komentar_berita` (`id`, `idberita`, `nama`, `email`, `komen`, `date`) VALUES
(1, 2, 'Muhammad Febriansyah D2E', 'muhammadfebrian121@gmail.com', 'hello', '2022-03-02 13:47:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lahan`
--

CREATE TABLE `lahan` (
  `id` int(11) NOT NULL,
  `lahan` varchar(99) DEFAULT NULL,
  `luas` varchar(99) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `pemilik_lahan` varchar(99) DEFAULT NULL,
  `alamat_pemilik` text DEFAULT NULL,
  `geojson` text DEFAULT NULL,
  `warna` varchar(99) DEFAULT NULL,
  `gambar` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lahan`
--

INSERT INTO `lahan` (`id`, `lahan`, `luas`, `isi`, `pemilik_lahan`, `alamat_pemilik`, `geojson`, `warna`, `gambar`) VALUES
(6, 'Lahan Jagung', '', 'Jagung', 'Azril Nurahman', 'bogor', '{\"type\":\"FeatureCollection\",\"features\":[{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"Polygon\",\"coordinates\":[[[106.739761,-6.555816],[106.739761,-6.640055],[106.831186,-6.677225],[106.739761,-6.555816]]]}}]}', '#39C9E1', '747857c30023c1218b8b17b683764a27.jpg'),
(7, 'Lahan Padi', '20km', 'Padi', 'Febrian', 'bogor', '{\"type\":\"FeatureCollection\",\"features\":[{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"Polygon\",\"coordinates\":[[[106.727045,-6.599472],[106.737699,-6.671428],[106.803346,-6.685067],[106.852151,-6.545242],[106.822593,-6.525118],[106.766914,-6.512497],[106.727045,-6.599472]]]}}]}', '#8EDB28', '36b279d07e6ca83f8912d921a9edc910.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembaga_masyarakat`
--

CREATE TABLE `lembaga_masyarakat` (
  `id` int(11) NOT NULL,
  `jenis` varchar(99) DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL,
  `nik` varchar(99) DEFAULT NULL,
  `nama` varchar(99) DEFAULT NULL,
  `username` varchar(99) DEFAULT NULL,
  `password` varchar(99) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL,
  `nama` varchar(99) DEFAULT NULL,
  `jk` varchar(99) DEFAULT NULL,
  `tempatlahir` varchar(99) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `umur` varchar(99) DEFAULT NULL,
  `status_kawin` varchar(99) DEFAULT NULL,
  `warganegara` varchar(99) DEFAULT NULL,
  `agama` varchar(99) DEFAULT NULL,
  `pendidikan` varchar(99) DEFAULT NULL,
  `nik` varchar(99) DEFAULT NULL,
  `rt` varchar(99) DEFAULT NULL,
  `rw` varchar(99) DEFAULT NULL,
  `dusun` varchar(99) DEFAULT NULL,
  `nokk` varchar(99) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id`, `nama`, `jk`, `tempatlahir`, `tgllahir`, `umur`, `status_kawin`, `warganegara`, `agama`, `pendidikan`, `nik`, `rt`, `rw`, `dusun`, `nokk`, `tgl_daftar`, `alamat`, `status`) VALUES
(3, 'Muhammad febriansyah', 'Perempuan', 'bgor', '2022-01-05', '12', 'Belum Kawin', 'as', 'Islam', 'SMK', '21039123', '08', '09', 'test', '102831283', '2022-01-22', 'tese', 1),
(4, 'syakila', 'Perempuan', 'Bogor', '2022-01-12', '7', 'Belum Kawin', 'Indonesia', 'Islam', 'SD', '023012931', '08', '09', 'bedahan ', '113012301', '2022-01-22', 'bedahan', 1),
(5, 'Geraldi', 'Laki-laki', 'Bogor', '2006-08-23', '14', 'Belum Kawin', 'Indonesia', 'Islam', 'SMP', '1312312312', '007', '004', 'Bedahan', '1923012931', '2022-03-16', 'Bedahan city best vilagge bruh', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `nopengaduan` varchar(99) DEFAULT NULL,
  `idpenduduk` int(11) DEFAULT NULL,
  `idkat` int(11) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `lampiran` varchar(99) DEFAULT NULL,
  `status` varchar(99) DEFAULT NULL,
  `lat` varchar(99) DEFAULT NULL,
  `lng` varchar(99) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `nopengaduan`, `idpenduduk`, `idkat`, `isi`, `lampiran`, `status`, `lat`, `lng`, `date`) VALUES
(2, 'COMP-20220317145227', 3, 6, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non facilis porro nam vitae temporibus, ducimus optio ipsum eveniet impedit fugiat laborum odit quisquam quod nemo natus assumenda eos dolorem at sit consequuntur iusto? Quisquam, amet minus? Dignissimos obcaecati alias, eligendi deserunt, fugit commodi ullam molestiae cupiditate dolorum corrupti voluptate, dolore tempora dolorem itaque reprehenderit in tempore. Temporibus, facilis? Eos, sunt. Cupiditate, id autem. Placeat rerum aut quia non saepe. Cupiditate, nisi cum. Voluptatibus commodi doloremque, vero neque dicta labore explicabo corrupti! Vero doloremque explicabo assumenda pariatur necessitatibus quia quod repellendus, ipsam voluptas expedita et quibusdam facere cumque. In, ipsam quae.\r\n', '1227dfbcca26c85f75b153a16ce83274.jpg', 'Selesai', '-6.59435597918586', '106.76513671875001', '2022-03-17 14:52:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(99) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `gambar` varchar(99) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `slug` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `ket`, `gambar`, `date`, `iduser`, `views`, `slug`) VALUES
(2, 'Dirgahayu Kemerdekaan RI ke-75th 2', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti vel consequatur dicta ratione modi necessitatibus! Quas explicabo eveniet aliquid? Alias nulla repudiandae, itaque, fugiat necessitatibus ipsa voluptatem magnam perspiciatis tempora autem soluta nobis nemo, illo eos labore ex ipsum officia unde illum! Quam, alias consequuntur. Illum doloribus in dicta, cumque et libero fugit ullam beatae tempora accusamus molestiae debitis autem delectus quos sit sed omnis quo at labore praesentium quia minus quae. Ratione sapiente libero doloribus cum minus explicabo assumenda modi voluptatum porro inventore tenetur officiis rem asperiores praesentium odio facere distinctio aliquid vitae, accusantium iure nesciunt qui laborum magnam. Quidem voluptas repellendus unde tempora accusantium est, iste molestias nobis possimus, nesciunt, suscipit distinctio maxime. Necessitatibus eveniet, eos natus consequuntur blanditiis officiis tempora sed. Officiis, quisquam. Exercitationem magni consectetur nesciunt debitis veritatis a provident consequuntur! Commodi animi distinctio possimus quos fuga blanditiis et iure repellendus, id quam deleniti magni aut.<br></p>', 'b5c2b8d4f0555aa2443b882fbed9aae9.jpg', '2022-02-22', 1, 15, 'dirgahayu-kemerdekaan-ri-ke-75th-2'),
(3, 'Hello world', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti vel consequatur dicta ratione modi necessitatibus! Quas explicabo eveniet aliquid? Alias nulla repudiandae, itaque, fugiat necessitatibus ipsa voluptatem magnam perspiciatis tempora autem soluta nobis nemo, illo eos labore ex ipsum officia unde illum! Quam, alias consequuntur. Illum doloribus in dicta, cumque et libero fugit ullam beatae tempora accusamus molestiae debitis autem delectus quos sit sed omnis quo at labore praesentium quia minus quae. Ratione sapiente libero doloribus cum minus explicabo assumenda modi voluptatum porro inventore tenetur officiis rem asperiores praesentium odio facere distinctio aliquid vitae, accusantium iure nesciunt qui laborum magnam. Quidem voluptas repellendus unde tempora accusantium est, iste molestias nobis possimus, nesciunt, suscipit distinctio maxime. Necessitatibus eveniet, eos natus consequuntur blanditiis officiis tempora sed. Officiis, quisquam. Exercitationem magni consectetur nesciunt debitis veritatis a provident consequuntur! Commodi animi distinctio possimus quos fuga blanditiis et iure repellendus, id quam deleniti magni aut.<br></p>', '5135f9c948dc79d39ee5830396055c85.jpg', '2022-02-23', 1, 3, 'hello-world');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `pengunjund_id` int(11) NOT NULL,
  `pengunjung_tanggal` datetime DEFAULT NULL,
  `pengunjung_ip` varchar(99) DEFAULT NULL,
  `pengunjung_perangkat` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`pengunjund_id`, `pengunjung_tanggal`, `pengunjung_ip`, `pengunjung_perangkat`) VALUES
(1, '2022-03-18 15:23:05', '::1', 'Chrome'),
(2, '2023-05-14 10:26:06', '182.2.145.210', 'Chrome'),
(3, '2023-05-14 10:26:59', '180.251.181.124', 'Chrome'),
(4, '2023-05-14 10:28:32', '2404:c0:2120::39:87aa', 'Chrome'),
(5, '2023-06-05 10:13:12', '101.128.119.101', 'Chrome'),
(6, '2023-06-05 10:13:13', '110.50.80.198', 'Chrome'),
(7, '2023-06-08 08:52:10', '114.125.86.120', 'Chrome'),
(8, '2023-06-18 22:40:10', '114.124.217.98', 'Other'),
(9, '2023-06-18 22:40:22', '114.79.1.91', 'Chrome'),
(10, '2023-06-18 22:45:51', '114.79.3.209', 'Chrome'),
(11, '2023-06-19 06:10:44', '114.79.2.60', 'Chrome'),
(12, '2023-06-19 21:36:48', '103.253.213.46', 'Chrome'),
(13, '2023-06-21 14:10:42', '103.253.213.46', 'Chrome'),
(14, '2023-06-28 06:57:24', '103.253.213.46', 'Chrome'),
(15, '2023-07-03 23:52:25', '2404:c0:2e10::445:9369', 'Chrome'),
(16, '2023-07-10 10:11:39', '140.213.71.9', 'Chrome'),
(17, '2023-07-10 10:11:41', '113.197.108.37', 'Chrome'),
(18, '2023-07-13 07:57:28', '140.213.64.35', 'Chrome'),
(19, '2023-07-13 09:16:39', '140.213.64.54', 'Chrome'),
(20, '2023-07-13 11:06:04', '114.79.3.31', 'Chrome'),
(21, '2023-07-14 21:35:18', '203.78.116.46', 'Chrome'),
(22, '2023-07-15 19:35:43', '114.79.5.181', 'Chrome'),
(23, '2023-07-15 22:26:59', '103.92.225.31', 'Other'),
(24, '2023-07-15 22:33:08', '125.167.118.40', 'Chrome');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_bumdes`
--

CREATE TABLE `produk_bumdes` (
  `id` int(11) NOT NULL,
  `produk` varchar(99) DEFAULT NULL,
  `slug` varchar(99) DEFAULT NULL,
  `kategori` varchar(99) DEFAULT NULL,
  `telp` varchar(99) DEFAULT NULL,
  `harga` varchar(20) DEFAULT NULL,
  `gambar` varchar(99) DEFAULT NULL,
  `desk` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `view` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk_bumdes`
--

INSERT INTO `produk_bumdes` (`id`, `produk`, `slug`, `kategori`, `telp`, `harga`, `gambar`, `desk`, `date`, `view`) VALUES
(2, 'Ayam goyeng', 'ayam-goyeng', 'makanan', '+62812895916567', '20000', 'df62fc72128d943520ec6f0de158b202.jpg', '<p>gggggggggggggggg</p>', '2022-02-24', 5),
(3, 'Kuaci', 'kuaci', 'cemilan', '', '0812959196567', '2c414cc7f06791c8eaa59202ebf2860a.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem voluptatibus numquam maxime culpa, veritatis itaque harum dolorum corrupti tenetur. Temporibus dolor laborum asperiores rem accusantium aliquam vel, nulla nemo ab dolores est numquam minima, consequatur optio quasi? Dolores iste voluptatibus sequi distinctio voluptates sapiente recusandae, illum suscipit, cupiditate laboriosam ipsam dolore. Ipsa unde perferendis, ea modi, sit alias asperiores ratione voluptatum optio dolor culpa officiis ipsum! Eligendi nisi amet neque ex voluptates voluptatem explicabo exercitationem soluta eius culpa odit, necessitatibus obcaecati blanditiis id nemo aspernatur ducimus alias atque dolorum, tempore illo! Esse ratione harum eveniet aliquam error cumque perferendis maxime. Eligendi, enim officiis, facere praesentium id delectus animi culpa ducimus impedit vitae asperiores modi ullam. Soluta culpa, labore ducimus voluptatibus atque ratione officiis quis quos eos ipsa qui libero totam! Similique architecto iure maxime aspernatur, iusto voluptas, sapiente illo, optio libero eligendi corrupti quos necessitatibus repellendus reiciendis inventore. Ad, similique?<br></p>', '2022-02-24', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_warga`
--

CREATE TABLE `produk_warga` (
  `id` int(11) NOT NULL,
  `produk` varchar(99) DEFAULT NULL,
  `slug` varchar(99) DEFAULT NULL,
  `gambar` varchar(99) DEFAULT NULL,
  `harga` varchar(99) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `lat` varchar(99) DEFAULT NULL,
  `lng` varchar(99) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `pemilik` varchar(99) DEFAULT NULL,
  `telppemilik` varchar(15) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk_warga`
--

INSERT INTO `produk_warga` (`id`, `produk`, `slug`, `gambar`, `harga`, `ket`, `lat`, `lng`, `view`, `pemilik`, `telppemilik`, `iduser`, `date`) VALUES
(3, 'Ayam goyeng', 'ayam-goyeng', 'eca6836cd790775abf439bce5d0677c2.jpg', '3242', '<p>gg</p>', '-6.380812331938274', '106.4469179548027', 34, 'tt', '+6281295916567', 1, '2022-02-24'),
(4, 'test', 'test', '6f691003a90a7af9283cdfc23f421c5d.jpg', '2131231', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic nihil quidem quas ullam possimus harum molestias. Consequatur culpa iusto sit quis laboriosam natus doloremque! Ea asperiores quas ipsa itaque impedit debitis? Eligendi voluptate hic provident expedita sunt odit eos! Quam inventore exercitationem tempore qui nesciunt quia, consequuntur, modi ab illum, aut at ipsum quasi. Amet iste, et ipsum, dolor expedita necessitatibus eaque, laudantium quas earum dicta sunt rerum deleniti incidunt! Veritatis eaque natus dolorem odit aut veniam velit consectetur optio architecto! Repellendus velit corporis repellat voluptate odio! Quo debitis, maxime quos fuga commodi, quisquam animi eaque neque aliquam reprehenderit, quod ipsum ipsa deleniti quis rerum molestiae. Maiores possimus molestias quasi sit, autem repudiandae atque natus! Consequuntur, dolores! Consectetur quo veniam iusto dolorum repudiandae corrupti impedit natus sapiente. Reprehenderit provident, facilis sunt omnis eius numquam quod assumenda, error, consectetur dicta dolores? Nisi tempora similique rerum maxime voluptatum explicabo aliquam minima et.</p>', '-6.47360918121307', '106.67188728741621', 6, 'tt', '', 1, '2022-03-03'),
(5, 'test', 'test', 'd50e58dfe2b7de90e05ab51756575311.jpg', '124124', '<p>gg</p>', '-6.348056476859352', '106.92429190449484', 0, 'tt', '+6281295916567', 1, '2022-02-24'),
(6, 'Kerajinan tangan', 'kerajinan-tangan', 'ecc874fe85b91eab7e3022421f789d29.png', '125000', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita non atque quae. Doloremque dignissimos corrupti, ratione est quidem adipisci quibusdam velit sunt amet esse inventore voluptatibus quisquam numquam necessitatibus nobis iusto illum veniam sed labore unde voluptatum iste! Aut, iste cum! Maxime velit repudiandae maiores odio eius iste nobis? Neque!<br></p>', '-6.293458760393985', '107.01809394201413', 8, 'Muhammad febriansyah', '087828481838', 3, '2022-03-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sejarah`
--

CREATE TABLE `sejarah` (
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sejarah`
--

INSERT INTO `sejarah` (`deskripsi`) VALUES
('<div>&nbsp; &nbsp; Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia labore dolor aliquam ex! Consectetur distinctio laudantium eos ducimus aperiam deserunt placeat, provident nulla velit ipsa iste, reiciendis sint minus numquam minima esse! Sapiente dicta obcaecati cumque quidem necessitatibus provident excepturi quibusdam quaerat optio nulla ducimus illum ad quisquam inventore vero maxime ratione accusamus ut neque eaque quis, perferendis, sequi reiciendis delectus? Praesentium autem adipisci sunt ducimus, ad reprehenderit ut, ullam architecto delectus nam debitis ex nulla. Saepe cumque porro animi dolore dolores commodi est cum repudiandae, temporibus rem! Possimus error ipsam doloribus fuga culpa quos praesentium, nam nihil inventore aliquid.</div><div><br></div>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `web` varchar(99) DEFAULT NULL,
  `keyword` varchar(99) DEFAULT NULL,
  `logo` varchar(99) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `email` varchar(99) DEFAULT NULL,
  `yt` varchar(99) DEFAULT NULL,
  `ig` varchar(99) DEFAULT NULL,
  `fb` varchar(99) DEFAULT NULL,
  `lat` varchar(99) DEFAULT NULL,
  `lng` varchar(99) DEFAULT NULL,
  `wilayah` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`web`, `keyword`, `logo`, `alamat`, `telp`, `email`, `yt`, `ig`, `fb`, `lat`, `lng`, `wilayah`) VALUES
('BEDAHAN', 'APP DES', 'favicon.ico', 'jawabarat', 'bogor', 'bogor', '08129591657', 'muhammadfebrian121@gmail.com', '-', '-7.9200313986944995', '111.66663971263918', '{\"type\":\"FeatureCollection\",\"features\":[{\"type\":\"Feature\",\"properties\":{},\"geometry\":{\"type\":\"Polygon\",\"coordinates\":[[[106.133423,-6.506357],[106.814575,-6.920974],[107.627563,-6.833716],[108.099976,-6.419025],[106.386108,-6.102322],[106.133423,-6.506357]]]}}]}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `gambar1` varchar(99) DEFAULT NULL,
  `gambar2` varchar(99) DEFAULT NULL,
  `gambar3` varchar(99) DEFAULT NULL,
  `judul1` text DEFAULT NULL,
  `judul2` text DEFAULT NULL,
  `judul3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`gambar1`, `gambar2`, `gambar3`, `judul1`, `judul2`, `judul3`) VALUES
('1dd7065e5063bd7eed7db3afc2ced7bb.jpg', 'a4dced29f2c9fbf7fa419adf3d047eb4.jpg', 'b01bda106371e2491c0cbfe02df404ad.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quam eos iusto dolorem voluptas qui dicta sequi, quae aliquid itaque suscipit ullam, aut porro magnam, non saepe distinctio. Possimus repudiandae doloremque odio officiis alias vel non quam recusandae magnam reiciendis aliquam, mollitia sed aspernatur voluptatum quia inventore. Aspernatur nisi doloremque eius modi in maxime, incidunt fugiat quibusdam non at molestias molestiae, perspiciatis sed nihil deleniti, animi explicabo voluptatum vitae earum. Ullam expedita illo natus qui eos recusandae aperiam, pariatur explicabo beatae! Neque, labore? Quaerat fugit nisi nemo assumenda cumque consequuntur molestias. Deleniti, dolorem ratione minus sed rem repudiandae assumenda at!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quam eos iusto dolorem voluptas qui dicta sequi, quae aliquid itaque suscipit ullam, aut porro magnam, non saepe distinctio. Possimus repudiandae doloremque odio officiis alias vel non quam recusandae magnam reiciendis aliquam, mollitia sed aspernatur voluptatum quia inventore. Aspernatur nisi doloremque eius modi in maxime, incidunt fugiat quibusdam non at molestias molestiae, perspiciatis sed nihil deleniti, animi explicabo voluptatum vitae earum. Ullam expedita illo natus qui eos recusandae aperiam, pariatur explicabo beatae! Neque, labore? Quaerat fugit nisi nemo assumenda cumque consequuntur molestias. Deleniti, dolorem ratione minus sed rem repudiandae assumenda at!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis obcaecati tenetur doloremque? ALorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quam eos iusto dolorem voluptas qui dicta sequi, quae aliquid itaque suscipit ullam, aut porro magnam, non saepe distinctio. Possimus repudiandae doloremque odio officiis alias vel non quam recusandae magnam reiciendis aliquam, mollitia sed aspernatur voluptatum quia inventore. Aspernatur nisi doloremque eius modi in maxime, incidunt fugiat quibusdam non at molestias molestiae, perspiciatis sed nihil deleniti, animi explicabo voluptatum vitae earum. Ullam expedita illo natus qui eos recusandae aperiam, pariatur explicabo beatae! Neque, labore? Quaerat fugit nisi nemo assumenda cumque consequuntur molestias. Deleniti, dolorem ratione minus sed rem repudiandae assumenda at!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur`
--

CREATE TABLE `struktur` (
  `judul` varchar(99) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `gambar` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `struktur`
--

INSERT INTO `struktur` (`judul`, `ket`, `gambar`) VALUES
('Struktur Desa', '<div>&nbsp; &nbsp; Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia labore dolor aliquam ex! Consectetur distinctio laudantium eos ducimus aperiam deserunt placeat, provident nulla velit ipsa iste, reiciendis sint minus numquam minima esse! Sapiente dicta obcaecati cumque quidem necessitatibus provident excepturi quibusdam quaerat optio nulla ducimus illum ad quisquam inventore vero maxime ratione accusamus ut neque eaque quis, perferendis, sequi reiciendis delectus? Praesentium autem adipisci sunt ducimus, ad reprehenderit ut, ullam architecto delectus nam debitis ex nulla. Saepe cumque porro animi dolore dolores commodi est cum repudiandae, temporibus rem! Possimus error ipsam doloribus fuga culpa quos praesentium, nam nihil inventore aliquid. test&nbsp;&nbsp;&nbsp;&nbsp;</div><div><br></div>', '04104728cdf48d5bee7cc9998134e285.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumberdana`
--

CREATE TABLE `sumberdana` (
  `id` int(11) NOT NULL,
  `sumberdana` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sumberdana`
--

INSERT INTO `sumberdana` (`id`, `sumberdana`) VALUES
(2, 'BK Kabupaten'),
(3, 'Jasmas'),
(4, 'BK Provinsi'),
(5, 'PID'),
(6, 'PDRD'),
(7, 'PAD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `nama_surat` varchar(99) DEFAULT NULL,
  `template` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id`, `nama_surat`, `template`) VALUES
(1, 'Keterangan Pengantar', NULL),
(2, 'Keterangan Penduduk', NULL),
(3, 'Biodata Penduduk', NULL),
(4, 'Keterangan Pindah Penduduk', NULL),
(5, 'Keterangan Jual Beli', NULL),
(6, 'Pengantar Surat Keterangan Catatan Kepolisian', NULL),
(7, 'Keterangan KTP dalam Proses', NULL),
(8, 'Keterangan Beda Identitas', NULL),
(9, 'Keterangan Bepergian / Jalan', NULL),
(10, 'Keterangan Kurang Mampu', NULL),
(11, 'Pengantar Izin Keramaian', NULL),
(12, 'Pengantar Laporan Kehilangan', NULL),
(13, 'Keterangan Usaha', NULL),
(14, 'Keterangan JAMKESOS', NULL),
(15, 'Keterangan Domisili Usaha', NULL),
(16, 'Keterangan Kelahiran', NULL),
(17, 'Permohonan Akta Lahir', NULL),
(18, 'Pernyataan Belum Memiliki Akta Lahir', NULL),
(19, 'Permohonan Duplikat Kelahiran', NULL),
(20, 'Keterangan Kematian', NULL),
(21, 'Keterangan Lahir Mati', NULL),
(22, 'Keterangan Untuk Nikah (N-1 s/d N-7)', NULL),
(23, 'Keterangan Pergi Kawin', NULL),
(24, 'Keterangan Wali Hakim', NULL),
(25, 'Permohonan Duplikat Surat Nikah', NULL),
(26, 'Permohonan Cerai', NULL),
(27, 'Keterangan Pengantar Rujuk/Cerai', NULL),
(28, 'Permohonan Kartu Keluarga', NULL),
(29, 'Domisili Usaha Non-Warga', NULL),
(30, 'Keterangan Beda Identitas KIS', NULL),
(31, 'Keterangan Izin Orang Tua/Suami/Istri', NULL),
(32, 'Pernyataan Penguasaan Fisik Bidang Tanah (SPORADIK)', NULL),
(33, 'Permohonan Perubahan Kartu Keluarga', NULL),
(34, 'Non Warga', NULL),
(35, 'Keterangan Domisili', NULL),
(36, 'Keterangan Penghasilan Orangtua', NULL),
(37, 'Pengantar Permohonan Penerbitan Buku Pas Lintas', NULL),
(38, 'Keterangan Penghasilan Ayah', NULL),
(39, 'Keterangan Penghasilan Ibu', NULL),
(40, 'Perintah Perjalanan Dinas', NULL),
(41, 'Kuasa', NULL),
(42, 'Keterangan Kepemilikan Kendaraan', NULL),
(43, 'Keterangan Kepemilikan Tanah', NULL),
(44, 'Baru', NULL),
(45, 'Raw', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id` int(11) NOT NULL,
  `idpengaduan` int(11) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `tanggapan` text DEFAULT NULL,
  `idadmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id`, `idpengaduan`, `tgl`, `tanggapan`, `idadmin`) VALUES
(1, 2, '2022-03-17 19:32:17', '<p><span style=\"background-color: rgba(0, 0, 0, 0.075);\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non facilis porro nam vitae temporibus, ducimus optio ipsum eveniet impedit fugiat laborum odit quisquam quod nemo natus assumenda eos dolorem at sit consequuntur iusto?</span><br></p>', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `visi_misi`
--

CREATE TABLE `visi_misi` (
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `visi_misi`
--

INSERT INTO `visi_misi` (`deskripsi`) VALUES
('<div>&nbsp; &nbsp; Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia labore dolor aliquam ex! Consectetur distinctio laudantium eos ducimus aperiam deserunt placeat, provident nulla velit ipsa iste, reiciendis sint minus numquam minima esse! Sapiente dicta obcaecati cumque quidem necessitatibus provident excepturi quibusdam quaerat optio nulla ducimus illum ad quisquam inventore vero maxime ratione accusamus ut neque eaque quis, perferendis, sequi reiciendis delectus? Praesentium autem adipisci sunt ducimus, ad reprehenderit ut, ullam architecto delectus nam debitis ex nulla. Saepe cumque porro animi dolore dolores commodi est cum repudiandae, temporibus rem! Possimus error ipsam doloribus fuga culpa quos praesentium, nam nihil inventore aliquid. test&nbsp;&nbsp;&nbsp;&nbsp;</div><div><br></div>');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri_kegiatan`
--
ALTER TABLE `galeri_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `irigasi`
--
ALTER TABLE `irigasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_komplain`
--
ALTER TABLE `kategori_komplain`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar_berita`
--
ALTER TABLE `komentar_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lahan`
--
ALTER TABLE `lahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lembaga_masyarakat`
--
ALTER TABLE `lembaga_masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`pengunjund_id`);

--
-- Indeks untuk tabel `produk_bumdes`
--
ALTER TABLE `produk_bumdes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk_warga`
--
ALTER TABLE `produk_warga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sumberdana`
--
ALTER TABLE `sumberdana`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `galeri_kegiatan`
--
ALTER TABLE `galeri_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `irigasi`
--
ALTER TABLE `irigasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_komplain`
--
ALTER TABLE `kategori_komplain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `komentar_berita`
--
ALTER TABLE `komentar_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lahan`
--
ALTER TABLE `lahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `lembaga_masyarakat`
--
ALTER TABLE `lembaga_masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `pengunjund_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `produk_bumdes`
--
ALTER TABLE `produk_bumdes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk_warga`
--
ALTER TABLE `produk_warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sumberdana`
--
ALTER TABLE `sumberdana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
