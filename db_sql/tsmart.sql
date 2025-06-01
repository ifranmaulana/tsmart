-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 05:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `idartikel` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `konten` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `url` text NOT NULL,
  `sumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`idartikel`, `judul`, `konten`, `gambar`, `tanggal`, `url`, `sumber`) VALUES
(5, 'Mentan: Bulog Wajib Serap Gabah Apa Pun Kualitasnya!', 'Menteri Pertanian (Mentan) Andi Amran Sulaiman meminta Perum Bulog wajib menyerap gabah dari petani dengan kualitas apa pun. Permintaan itu ditegaskan Amran saat menghadiri panen raya dan serap gabah di Desa Maluka Baulin, Kabupaten Tanah Laut, Kalimantan Selatan, Selasa (18/3/2025). “Saya kecewa dengan Bulog hari ini. Petani menunggu kepastian harga di sawah, tapi Bulog malah menunggu di gudang. Ini enggak bisa dibiarkan. Semua sektor harus bergerak cepat, enggak ada alasan. Bulog wajib serap gabah any quality, dan kalau ada yang tidak mau bekerja untuk rakyat, lebih baik minggir!” ujar Mentan dalam keterangannya.\r\nSeorang petani mengutarakan bahwa Bulog di wilayah tersebut jarang turun ke lapangan dan sulit dihubungi. Padahal, mayoritas petani tengah memasuki musim panen. Dalam kesempatan itu, Mentan Amran juga mengingatkan seluruh pemangku kepentingan di sektor pertanian harus bekerja dalam satu kesatuan. Amran mengatakan, jika ada satu sektor yang bermasalah, semuanya akan ikut bermasalah.\r\n“Kalau ada yang enggak mau kerja, suruh minggir. Ini enggak pakai tawar-menawar. Kalau di bawah saya ada yang enggak becus, saya hitung jam buat ganti orangnya. SK (surat keputusan) bisa saya tanda tangan dalam lima menit. Jadi jangan main-main kalau kerja untuk rakyat,” kata Amran. Diketahui, Presiden Prabowo Subianto memerintahkan Perum Bulog untuk menyerap tiga juta ton setara beras dari petani hingga April 2025. Pemerintah telah menyiapkan anggaran Rp 16,7 triliun untuk mencapai target tersebut. Anggaran diambil dari APBN.\r\nData terbaru yang diungkapkan Wakil Menteri Pertanian Sudaryono, menyebutkan bahwa Bulog telah menyerap sekitar 350.000 ton beras.\r\n“Sekarang hariannya Bulog sudah 20.000 (ton) lebih ya. Kami mau tingkatkan sampai 50.000 kalau bisa,” kata Sudaryono saat ditemui di kantor Kemenko Pangan, Graha Mandiri, Jakarta Pusat, Senin (17/3/2025). Sementara data per Selasa (11/3/2025), serapan Bulog mencapai 255.000 ton beras.', '1746852841.jpeg', '2025-05-10 11:54:01', 'https://money.kompas.com/read/2025/03/18/160800326/mentan-bulog-wajib-serap-gabah-apa-pun-kualitasnya?page=all&utm_source=Google&utm_medium=Newstand&utm_campaign=partner.', 'Kompas'),
(6, 'TNI AD Akan Bangun 11.000 Titik Pengairan untuk 500.000 Hektare Sawah', 'TNI Angkatan Darat akan membangun 11.000 titik pengairan yang bisa mengairi 500.000 hektare sawah. Hal ini disampaikan Kepala Staf TNI Angkatan Darat (KSAD) Jenderal Maruli Simanjuntak saat meresmikan sarana pengairan pertanian di Desa Ciwaru, Kecamatan Ciemas, Kabupaten Sukabumi, Jawa Barat, Senin (21/4/2025). \"Kita (TNI AD) sudah sampaikan, kita punya rencana 11.000 titik yang bisa mengairi sampai 500.000 hektare sawah. Ini dalam proses, mudah-mudahan bisa terealisasi dan kita kerjakan serempak. Ide-ide ini juga kita menampung (berasal) dari masyarakat,” ujar KSAD dalam keterangan resmi, Selasa (22/4/2025). Maruli menjelaskan, peresmian sarana pengairan pertanian itu merupakan upaya TNI AD dalam mendukung ketahanan pangan nasional bekerja sama dengan Kementerian Pertanian dan Kementerian Pekerjaan Umum.\r\nMaruli menjelaskan, peresmian sarana pengairan ini dilakukan serentak di 10 wilayah Indonesia (Banyumas, Brebes, Magetan, Nganjuk, Gresik, Pandeglang, Sukabumi, Simeulue, Aceh Tenggara, dan Gayo Lues), yang mencakup sekitar 4.536,42 hektare lahan sawah. Khusus untuk wilayah Sukabumi, sarana ini telah mengairi sawah seluas 2.377 hektare dengan metode pompa hidram, pipanisasi maupun irigasi pompa. Menurut dia, hal ini sesuai arahan Presiden Prabowo Subianto, di mana masalah pengairan menjadi prioritas utama di seluruh Indonesia.\r\n\"Pembangunan sarana pengairan ini bertujuan untuk meningkatkan produktivitas lahan pertanian serta mendukung sistem pertanian berkelanjutan,\" tulis keterangan Dinas Penerangan TNI AD. Sarana tersebut mencakup pembangunan irigasi, embung, dan jalur distribusi air yang akan dimanfaatkan oleh ribuan petani di wilayah tersebut. Pada kesempatan yang sama, Wakil Menteri Pertanian Sudaryono mengatakan, keterlibatan TNI itu merupakan salah satu bentuk fungsi teritorial TNI. Fungsi teritorial TNI yang dimaksud dalam program pertanian adalah sebagai pendampingan, memfasilitasi dan mendorong masyarakat dalam peningkatan kesejahteraan melalui pertanian.', '1746852824.jpg', '2025-05-10 11:53:44', 'https://nasional.kompas.com/read/2025/04/22/11463891/tni-ad-akan-bangun-11000-titik-pengairan-untuk-500000-hektare-sawah.', 'Kompas'),
(7, 'Pangkas Izin Sektor Pertanian untuk Tutup Celah Korupsi', 'Presiden Prabowo Subianto menegaskan komitmennya untuk terus mendorong efisiensi anggaran. Hal tersebut salah satunya ditempuh melalui pemangkasan perizinan dan jalur distribusi seperti telah diterapkan dalam distribusi pupuk bersubsidi. Pemangkasan perizinan dan jalur distribusi itu sekaligus penting untuk mencegah korupsi.\r\nDalam acara panen raya nasional di 14 provinsi sentra produksi padi yang seremoninya digelar di Desa Randegan Wetan, Kecamatan Jatitujuh, Kabupaten Majalengka, Jawa Barat, Senin (7/4/2025), Menteri Pertanian Andi Amran Sulaiman melaporkan, semula jalur perizinan dan distribusi pupuk bersubsidi bagi para petani berbelit-belit.\r\nButuh gebrakan untuk memangkas birokrasi yang rumit itu. Situasinya berubah sejak dikeluarkannya Peraturan Presiden (Perpres) Nomor 6 Tahun 2025 tentang Tata Kelola Pupuk Bersubsidi.\r\n”Sebelumnya adalah 12 menteri yang harus tanda tangan, ditandatangani 38 gubernur, kemudian 500 wali kota/bupati se-Indonesia, baru bisa tiba di petani. Sekarang berkat Inpres (Perpres No 6/2025) yang Bapak Presiden tanda tangani, dari Menteri Pertanian langsung ke pabrik, pabrik langsung ke Gapoktan petani. Ini betul-betul revolusi sektor pertanian,” kata Amran.\r\nSehubungan dengan laporan itu, Presiden menegaskan akan senantiasa mendorong efisiensi anggaran. Itu dilakukannya melalui pemotongan jalur distribusi yang panjang. Secara bersamaan, praktik korupsi juga berusaha ditekannya melalui mekanisme tersebut.\r\n”Saya akan menghemat anggaran terus-menerus. Saya akan berusaha sekeras tenaga agar setiap anggaran, setiap uang rakyat, uang negara harus dirasakan manfaatnya oleh seluruh rakyat Indonesia, terutama rakyat yang paling membutuhkan,” kata Presiden.\r\nMenurut Presiden, petani memiliki peranan penting bagi bangsa ini. Keberadaan mereka menjamin berlangsungnya ketahanan pangan. Untuk itu, ia menyebut, petani sebagai tulang punggung bangsa dan negara.\r\n”Para petani adalah produsen pangan, tanpa pangan tidak ada negara, saya katakan berkali-kali, bertahun-tahun tanpa pangan tidak ada negara. Tanpa pangan tidak ada NKRI,” tandas Presiden.\r\nLebih dari itu, Presiden ingin menjalankan pembangunan pertanian berpihak kepada rakyat. Bahkan, ia ingin menurunkan harga pangan secara nasional. Cita-cita itu ingin diwujudkannya untuk membuat masyarakat bahagia. Lantas, segenap pejabat dimintanya ikut bekerja melayani rakyat sepenuh hati.\r\n”Itu keinginan saya dan keinginan semua menteri, semua gubernur, semua bupati. Kita akan bahagia kalau rakyat ita senyum. Kita akan bahagia kalau para petani kita makmur,” kata Presiden.', '1746852807.webp', '2025-05-10 11:53:27', 'https://www.kompas.id/artikel/pangkas-izin-sektor-pertanian-untuk-tutup-celah-korupsi', 'Kompas');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hama`
--

CREATE TABLE `hama` (
  `idhama` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `sumber` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `idkeranjang` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `jumlah` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idkomentar` int(11) NOT NULL,
  `idartikel` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `balasan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idkomentar`, `idartikel`, `iduser`, `isi`, `tanggal`, `balasan`) VALUES
(3, 7, 2, 'bermanfaat', '2025-05-14 21:51:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_01_074620_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pestisida`
--

CREATE TABLE `pestisida` (
  `idpestisida` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `sumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `namaproduk` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `namaproduk`, `deskripsi`, `gambar`) VALUES
(2, 'Ketave', 'Ketave adalah insektisida racun kontak dan lambung yang digunakan untuk mengendalikan hama pada tanaman padi dan sayuran. Ketave berbentuk larutan dalam air berwarna kecoklatan. \r\nBahan aktif \r\nBahan aktif Ketave adalah Nitenpyram 100 g/l\r\nKetave bekerja secara sistemik translaminar\r\nCara kerja\r\nKetave efektif mengendalikan hama penusuk dan penghisap seperti wereng, kutu daun, kutu kebul, thrips, dan liriomyza \r\nCara aplikasi: penyemprotan volume tinggi pada saat populasi atau intensitas serangan hama telah mencapai ambang pengendaliannya', '1746853026.jpg'),
(3, 'Abacel', 'Abacel adalah insektisida yang berbentuk pekatan berwarna coklat gelap. Abacel dapat digunakan untuk mengendalikan hama ulat grayak, thrips, wereng, kutu daun, dan kutu kebul. \r\nKandungan \r\nAbacel mengandung bahan aktif abamektin 18 g/l\r\nAbacel berbentuk racun kontak dan lambung\r\nCara penggunaan \r\nDosis pemakaian Abacel 18 EC adalah 0,5 ml / liter air\r\nDosis dapat ditingkatkan menjadi 1 - 3 ml / liter air jika serangan hama meningkat\r\nTuangkan Abacel ke dalam ember yang berisi air dan aduk dengan merata sebelum digunakan', '1746852980.jpg'),
(4, 'Plenum', 'Syngenta PLENUM 50 WG adalah insektisida sistemik yang bersifat menghambat aktivitas makan serangga, berbentuk butiran berwarna kecoklatan yang dapat disuspensikan dalam air untuk mengendalikan hama wereng coklat, wereng punggung putih, wereng hijau, kepinding tanah dan walang sangit pada tanaman padi.', '1746852955.jpeg'),
(5, 'Roundup', 'Roundup adalah herbisida sistemik, atau obat pembasmi rumput, yang efektif untuk mengendalikan berbagai jenis gulma dan rumput liar. Roundup terkenal karena kemampuan untuk menembus hingga akar gulma, sehingga efektif dalam membasmi rumput secara tuntas.', '1747065841.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produkdetail`
--

CREATE TABLE `produkdetail` (
  `idprodukdetail` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `namavariasi` varchar(250) NOT NULL,
  `harga` varchar(250) NOT NULL,
  `stok` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkdetail`
--

INSERT INTO `produkdetail` (`idprodukdetail`, `idproduk`, `namavariasi`, `harga`, `stok`) VALUES
(20, 4, '100 gr', '70000', '10'),
(21, 3, '100 ml', '31999', '10'),
(22, 3, '250 ml', '34900', '10'),
(23, 2, '250 ml', '55000', '10'),
(24, 2, '500 ml', '97000', '10'),
(25, 5, '200 ml', '32000', '10'),
(26, 5, '1 liter', '100000', '10');

-- --------------------------------------------------------

--
-- Table structure for table `pupuk`
--

CREATE TABLE `pupuk` (
  `idpupuk` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `sumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4T3VNdMe0wtCCXSyujzBvSNbCBgGHZ0ECp1fGWsD', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZFd5MHJaWUVMYkd6TGNJSVBqVlRTYnVTdmNkV2xNclBYMVhmZk8xTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rZXJhbmphbmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6NDoiY2FydCI7YToyOntzOjg6IjMtMTAwIG1sIjthOjQ6e3M6ODoiaWRwcm9kdWsiO3M6MToiMyI7czo3OiJ2YXJpYW50IjtzOjY6IjEwMCBtbCI7czo1OiJwcmljZSI7aTozMTk5OTtzOjg6InF1YW50aXR5IjtpOjE7fXM6ODoiMi0yNTAgbWwiO2E6NDp7czo4OiJpZHByb2R1ayI7czoxOiIyIjtzOjc6InZhcmlhbnQiO3M6NjoiMjUwIG1sIjtzOjU6InByaWNlIjtpOjU1MDAwO3M6ODoicXVhbnRpdHkiO2k6MTt9fX0=', 1747364884),
('nJ9ndGhU0orszqeLhDpRe0NMem5T9bagqrmS2Lg7', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidWZUU25IYmg1S2V3b2dneWFuakg4c29NODByZ2dyUzJIc3ZBZ2VISSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGVja291dC8xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjQ6ImNhcnQiO2E6MTp7czo4OiIzLTEwMCBtbCI7YTo0OntzOjg6ImlkcHJvZHVrIjtzOjE6IjMiO3M6NzoidmFyaWFudCI7czo2OiIxMDAgbWwiO3M6NToicHJpY2UiO2k6MzE5OTk7czo4OiJxdWFudGl0eSI7czoxOiIxIjt9fX0=', 1747320546),
('V9oewxefOa3MNeShZSSDJkCGlKWAy9sJW73mF9nn', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiY3I3ZTN1Sk9OQlNEdWVTbHFiUFZ3WVF4MVpkNHBOSm9rMFVyWHk5SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWtkZXRhaWwvMyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoiY2FydCI7YToxOntzOjg6IjMtMTAwIG1sIjthOjQ6e3M6ODoiaWRwcm9kdWsiO3M6MToiMyI7czo3OiJ2YXJpYW50IjtzOjY6IjEwMCBtbCI7czo1OiJwcmljZSI7aTozMTk5OTtzOjg6InF1YW50aXR5IjtpOjE7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1747238593);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `payment_method` varchar(50) DEFAULT NULL,
  `snap_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(250) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'admin@gmail.com', NULL, '$2y$12$NlulSNiSrv7w1FWD1m2WTOZpIBg6OomDDHq/Pbx0aE4CLVowDY/N2', NULL, 'Admin', NULL, '2025-04-29 21:44:24'),
(2, 'user', 'User', 'user@gmail.com', NULL, '$2y$12$c5Qd8YFYoV0TnoTSA10ZSOsn7rUQ/SPzCa5yTqvzEig5jXttu5ljC', NULL, 'User', NULL, '2025-04-30 07:48:51'),
(3, 'mitra', 'Mitra', 'mitra@gmail.com', NULL, '$2y$12$zoSvhS9EW/mDvPfTkhvvgO2bXu.Mq.mqFhKxd9IzzjV6GMo.5jh0S', NULL, 'Mitra', NULL, '2025-04-30 07:59:09'),
(5, 'admin1', 'admin1', NULL, NULL, '$2y$12$2muVDOgNwj3rysb8rAjSMOHr9iOVTln/8GiRncmIDZ8Y8eHQwekkq', NULL, 'Admin', '2025-05-09 01:19:32', '2025-05-09 01:19:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`idartikel`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hama`
--
ALTER TABLE `hama`
  ADD PRIMARY KEY (`idhama`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`idkeranjang`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idkomentar`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pestisida`
--
ALTER TABLE `pestisida`
  ADD PRIMARY KEY (`idpestisida`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indexes for table `produkdetail`
--
ALTER TABLE `produkdetail`
  ADD PRIMARY KEY (`idprodukdetail`);

--
-- Indexes for table `pupuk`
--
ALTER TABLE `pupuk`
  ADD PRIMARY KEY (`idpupuk`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `idartikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hama`
--
ALTER TABLE `hama`
  MODIFY `idhama` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `idkeranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idkomentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pestisida`
--
ALTER TABLE `pestisida`
  MODIFY `idpestisida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produkdetail`
--
ALTER TABLE `produkdetail`
  MODIFY `idprodukdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pupuk`
--
ALTER TABLE `pupuk`
  MODIFY `idpupuk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
