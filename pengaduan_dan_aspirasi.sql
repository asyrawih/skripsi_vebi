-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 11:03 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_dan_aspirasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_akun`
--

CREATE TABLE `data_akun` (
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_akun`
--

INSERT INTO `data_akun` (`username`, `password`, `nama`, `role`, `status`) VALUES
('abrar', 'abrar', 'muh saikar abrar saidiman', 'User', 'Setuju'),
('adinda', '$2y$10$7RkvLTpRLzY8hEcdfj1LpumMGaHAWG6kk1x8IsYfhwMbS/kadywWG', 'Adinda Ai', 'User', 'Setuju'),
('admin', '$2y$10$DbKxTMGnorcx4sOeFz2WwOtOBu6rNYNRLgmZFIlGLS/u5MpWHEru6', 'admin', 'Admin', 'Setuju'),
('ammha', '$2y$10$Tq3xyVOj5VanTx3riAT8ReS16pSeobJkd6FLoLS.cQuOWp5RvjFoC', 'Rosmiati Ammha', 'User', 'Setuju'),
('andi', '$2y$10$Nmj7TcM1IQhfjrGNf1ZuXuKh6AcCiz/CQFaQ9k/dKCQnlsRu5Oeoq', 'Andi Syaputra', 'User', 'Setuju'),
('ansar', '$2y$10$FzwBAnZ0A10p7BDXTB8UbO4FRpYZlBZx0eQuL18my4jxe9JTeEjou', 'Rajuman Ansar', 'User', 'Setuju'),
('app', '$2y$10$F5nbgT.YpLj/ts604rT1qOO/3A8H9cM./EJxyZyMOrkUH9wC.u8y.', 'Baso Arfandi', 'User', 'Setuju'),
('ardi', '$2y$10$R1hVIQ9wEHXKryB9/wuoCOibfvJlzdWZO0QiB/78njs2SOW.hcrxa', 'Ardiansyah SKom', 'User', 'Setuju'),
('arvina', '$2y$10$X9psNu0vR3NcAFHiTyBRsu5rkJ4uLkCO/UiGD5pn738xxuVcnF42u', 'Arvina Yudithia Sompie', 'User', 'Setuju'),
('arwin', '$2y$10$qv9qlzCkcIXvNF3LLsj3muM5guNYCOXcHo/xRoCBzkksCrXmgvcsq', 'Arwin Uto', 'User', 'Setuju'),
('ban', '$2y$10$SiLmYDWFpMwe.63WL3NGgucS4GGvErd/T7lEIvULBFRbXJ6YEtpNC', 'Munarfah Gozali', 'User', 'Setuju'),
('deni', '$2y$10$dPoNuFRI.5j2shK/4GOQeuFs1tt2EUEzfq.ldZIT05BOaKoR5Lnpm', 'Deni Kurniawan', 'User', 'Setuju'),
('dilla', '$2y$10$GB8lnBatQ4oXcswXpPFU0OWIJCP18WP3p6.vObiWmk/evWezojNde', 'Fadhilla R', 'User', 'Setuju'),
('fadli', '$2y$10$k5wNiQjvTR1YN.M6Th2HruHQL/nKF96qh58xDSHxc6pwfpoYzXUYK', 'ANDI MUH FADLI P', 'User', 'Setuju'),
('fatir', '$2y$10$EgXpH7jSRGet2ad8ZbYRjuLRgzyC1F7CSMqnxW4MS1zsTIPJdNeMG', 'Fatira S', 'User', 'Setuju'),
('fauzan', '$2y$10$uZkysBQa8N2chLPYLxIBcOL1tnXsGPg8QS4aWZHwK2hOPYnMOe1TG', 'Achmad fauzan', 'User', 'Setuju'),
('fauzul', '$2y$10$fiWLo/uwIil0ULWnr84iE.YnKjkW6m1cXnVlDla5nb2QXwhiD8zmS', 'M Fauzul', 'User', 'Setuju'),
('febri123', '$2y$10$P87lcegbE4K8dUGaxGRaRuG3ZDLy9z0VlLP8hvYHq06/UeQANUbaq', 'FEBRIANTI KHAIRUNNISRAM', 'User', 'Setuju'),
('fitri', '$2y$10$7YhQcjpWhBvEMp5a85uGEeMOLb3i9hEQ64y2E4vB3z6tBfZrV.5NO', 'Nur Fitri', 'User', 'Setuju'),
('gufran', '$2y$10$UjOVoE1zeWAD.mjfFSQpPOY6/H4WDAPpME6vDWqer/1lzimo/udUK', 'Muh Gufran', 'User', 'Setuju'),
('hamdi', '$2y$10$UuhuwFJz3MQEzcFpeS6Eg.oegx.rSZHortL3wT3Vpp8H/xoUiI/EO', 'Alhilal Hamdi ', 'User', 'Setuju'),
('if', '$2y$10$9a0h5eBWPPH9amN5q6wy7.28DDsghse5eeq2ZddyvC26hjiHCdYHO', 'Anonim anonim', 'User', 'Setuju'),
('indah', '$2y$10$4TwpTNioU18qPAZWDUWqIu/qh7Fc1/cKpHi0p.7vpI36xCrwTVS4u', 'Nur Indah Sari', 'User', 'Setuju'),
('iqbal', '$2y$10$hEY4u7CuCraBIwqWA4u9c.9zF9LQMniCp66l2bISgW5qLOeVxtzKy', 'Muh. Iqbal Suyono', 'User', 'Setuju'),
('iqbal1', '$2y$10$Ag6ZhTIqOM03I3/cXc9htuyeSLT7sQw2TCFeZWlisR1eBs9ZhV5ci', 'M Iqbal', 'User', 'Setuju'),
('irham', '$2y$10$NUaTYt/rQ8pD4cYTjc9zOugqsd2w7Xfk.W6FDVKnHTHya83KcxYLi', 'Andi Irham Zainal', 'User', 'Setuju'),
('isdar', '$2y$10$/MvUa8m4/Ym2W4i/yTWAU.T64L.GvU9CkUCOhsecwxWIPL/FE6nMy', 'MUH ISDARIANSYAH ', 'User', 'Setuju'),
('isma', '$2y$10$a2tN.xzw3A/yMQuGyl/ruO29UeGAGa/A43Q5z4Ff0Sw.7jbo5.2/C', 'Nur Ismawati', 'User', 'Setuju'),
('jj', '$2y$10$KLjMa/n62FO/H5ERN77FSOra.IKAvydx4zRDtPX5dhAb7KriZBY5O', 'Jumardi Jamal', 'User', 'Setuju'),
('jono', '$2y$10$CtJuGJf9ACJ5Sk9rGAyJwOSG5FYP6.isyhAi.yf8Q3cjPodX8qw/K', 'Maharjono  A', 'User', 'Setuju'),
('khairil', '$2y$10$EAqhetlkAy9e7qsfkFoncuRztys/di7eZIEIgem5OWoy1Z5kyDtR2', 'Khairil arsyad', 'User', 'Setuju'),
('kifli', '$2y$10$4U4Fqp.1vl1EUlAxJ60j1OzKdvSkUnIqGzP4b8HUkMolXl.vIzftG', 'Zulkifli E', 'User', 'Setuju'),
('lemang', '$2y$10$Jmegqzi0yQylTsZxhCTwAueAwQAREtJpBpQpsqeKHjajOhb.WYtCe', 'Sulaeman Ali Akbar', 'User', 'Setuju'),
('lut', '$2y$10$r3/sKQLaGwG//0U2UYrHOuw5/45neEFOvhdOj4WX.L6LfLwYWvT4G', 'Baso Lutfi', 'User', 'Setuju'),
('nailul', '$2y$10$y.NNvu5PgfkaGmxORF54UOqRg.4dCKaH5uIKVSOTOBqrMDcwmmlxe', 'Nailul Autar Lukman', 'User', 'Setuju'),
('nas', '$2y$10$wJ7iehj7PrVruWst3yh48us3kFPJxY8dAoqCl5YmHMtHRJc0DaPhG', 'Nasrullah Umar', 'User', 'Setuju'),
('navta', '$2y$10$Q810cEqGdR9y65tbqs2dH.qCDWXpMDeWAD.DKCd/QvO9Kx2vWk.Wi', 'Navtalia M', 'User', 'Setuju'),
('nobi', '$2y$10$4uHHny5N3OUlKPWIIXn1i.P8M5h4owU.FYydyF2NbtxKIcjN16NCC', 'Nofri S', 'User', 'Setuju'),
('nunu', '$2y$10$dS5HNq3jMAWsK21gQTFr5OwOPwBlwDVmW8hsiQ7u8P0h5rrl9KTru', 'Nunu P', 'User', 'Setuju'),
('opik', '$2y$10$e30g7ONHD7exZFKTefFaLuDVW9yuELJMgWTL.ovOS0SebiyP8dSai', 'M. Taufik H', 'User', 'Setuju'),
('panji', '$2y$10$r6JRCKWsgZ96JT8a7PTTzOms8QR7LrX0Ww5KuD3vpB8ik8S04X/Um', 'Panji Lesmana', 'User', 'Setuju'),
('rina', '$2y$10$BDZill1RKNwLcOn4ncO5S.5gD1sgdcbhfKrAgd1Wb1AlNcMDWqL7i', 'Satrina R', 'User', 'Setuju'),
('toding', '$2y$10$RWwQ8f26Z48ObB1bD0qrgePIEgYy.Q7VN1E8Rnd0G3SSQ825yAu/S', 'Andi oding', 'User', 'Setuju'),
('triyana', '$2y$10$zm.QL10NTCp./nRoYmOY6utqO4sPACc7rhRm5/YOudilQRJ4WuzYu', 'Triyana A', 'User', 'Setuju'),
('wawan', '$2y$10$wJP5Se1E.10cCDyYzHcgNeZSX8xYXCPikq9Oz.Zeplw0lMNBd0XsK', 'M Irwansyah', 'User', 'Setuju'),
('widi', '$2y$10$m2efCQV/FgY/NkWxwJHzle0e5MUX0x/nIP0meS9K2zdqYXF1VVaXm', 'Aswidi Arfandi', 'User', 'Setuju'),
('yen', '$2y$10$7QD5G4MptvsDm680fhl8lugmJ.CYZWUXBIlu50vgkb6XqS7UwpD1C', 'Yeni S', 'User', 'Setuju'),
('yuni', '$2y$10$KR4gsEqal1OLiOt.tCu5w.2LQGI9VkXdX4.uroK9QQZ253pVLyrw2', 'Yuni Alias', 'User', 'Setuju'),
('zab', '$2y$10$nUjHK0Jkd4uaiOVbVXUhsefZDbnUzweZAuIN.3KfhDvuY6hc0PG4K', 'ZAB Alias', 'User', 'Setuju');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengaduan_dan_aspirasi`
--

CREATE TABLE `data_pengaduan_dan_aspirasi` (
  `id` int(11) NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `tentang` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pengaduan_dan_aspirasi`
--

INSERT INTO `data_pengaduan_dan_aspirasi` (`id`, `username_user`, `no_hp`, `alamat`, `tentang`, `tanggal`, `waktu`, `keterangan`, `kategori`) VALUES
(9, 'adinda', '085988645439', 'Makassar', 'Masalah yang sering kami hadapi dan sering terulang di Proses Pembayaran, masih sering Kode Bayar tidak muncul dan kadang memakan waktu yang cukup lama. Hal seperti ini menurut kami dapat merugikan karna kadang menjadi kendala di Perencanaan di Operasional kami yang sudah di jadwalkan.\r\nHarapan kami problematika seperti ini paling tidak bisa di mininalisir dan mitigasinya harus cepat.. Thanks', '2022-03-10', '08:18:03', 'Pending', 'Pengaduan'),
(10, 'arvina', '082257745997', 'Makassar, Jln.Perintis Kemerdekaan 10', 'Fasilitas dan pembangunannya lebih di tingkatkan,', '2022-03-10', '08:19:07', 'Pending', 'Aspirasi'),
(11, 'nailul', '082213927535', 'jl. mahoni IV, paccerakkang, kec biringkanaya, kota makaasar', 'kualitas pelayanan agar ditingkatkan. ', '2022-03-10', '08:21:33', 'Pending', 'Pengaduan'),
(12, 'khairil', '08990847840', 'Jl paccerakkang ', 'Semoga makassar new port dapat tumbuh dan berkembang sebagai pelabuhan utama bagi indonesia bagian timur . \r\nSekian dan terimakasih', '2022-03-10', '08:22:42', 'Pending', 'Pengaduan'),
(13, 'fadli', '081242227985', 'Jl. Toa Daeng 3 Lr. Teratai No. 1 Makassar', 'Kurangnya perhatian terhadap K3', '2022-03-10', '08:23:47', 'Pending', 'Pengaduan'),
(14, 'nailul', '082213927535', 'jl. mahoni IV, paccerakkang, kec biringkanaya, kota makassar', 'Pelayanan sudah maksimal, meskipun crane kadang mengalami masalah ketika beroperasi, tetapi tidak menjadi kendala berarti yang dapat mengganggu proses operasional perusahaan.', '2022-03-10', '08:25:08', 'Pending', 'Pengaduan'),
(15, 'iqbal', '081240021072', 'Aspol Tallo blok D no 10', 'Pemberian arah jalur akses mobil tronton yang akan membawa atau mengambil kontener di terminal petikemas Makassar new port dari menuju blok petikemas sampai keluar blok.', '2022-03-10', '08:30:08', 'Pending', 'Pengaduan'),
(16, 'ansar', '085343684702', 'Perintis', 'Tidak ada tempat istirahat dan makan siang yang disediakan untuk mobil pembawa dan pengambil kontainer sehingga kami biasanya kelaparan. Semoga kedepannya ada disediakan', '2022-03-10', '08:31:03', 'Pending', 'Pengaduan'),
(17, 'yuni', '082199483265', 'Perintis', 'antri yang terlalu panjang saat siang hari bagi mobil pengambil dan pengantar kontainer di gate sehingga memakan waktu terlalu lama', '2022-03-10', '08:31:56', 'Pending', 'Pengaduan'),
(18, 'isdar', '082192826213', 'BTN ANTARA RESIDENCE ', 'Lebih meningkatkan penerapan manajemen risiko untuk meminimalisir serta mengantisipasi hambatan yang mungkin terjadi ', '2022-03-10', '08:32:50', 'Pending', 'Aspirasi'),
(19, 'panji', '082199237521', 'Perintis kemerdekaan 10, kompleks hartaco permai, blok f4', 'Saya berharap PT PELINDO regional 4 makassar, di era pandemi ini bisa lebih mengutamakan kesehatan dan alat safety,,agar para pekerja dan penumpang bisa merasa aman,,begitupun juga dengan angkutan peti kemas,,agar dapat lebih teliti untuk memeriksa agar tidak terjadi hal yang tidak di inginkan ,,terimakasih', '2022-03-10', '08:33:48', 'Pending', 'Pengaduan'),
(20, 'zab', '085240525849', 'Sultan Alauddin IV No. 3', 'Tingkatkan dan pertahankan kinerja saat ini', '2022-03-10', '08:34:50', 'Pending', 'Pengaduan'),
(21, 'triyana', '082393415808', 'Jl. Kenanga no.5', 'Sebaiknya untuk mahasiswa yang lagi PKL disediakan ruangan dan diberikan tugas sesuai jurusan sehingga dapat menunjang kegiatan yang produktif. ', '2022-03-10', '08:35:52', 'Pending', 'Pengaduan'),
(22, 'jono', '6281356930427', 'Sulawesi selatan , enrekang ', ' saya berharap agar pt pelindo lebih mengutamakan keamanan dan kenyamanan para pekerja dan penumpan', '2022-03-10', '08:36:42', 'Pending', 'Aspirasi'),
(23, 'hamdi', '082395772697', 'Jalan perintis kemerdekaan 2', 'Saya harap agar PT Pelindo lebih mengutamakan kenyamanan pada pekerja dan penumpang terima kasih ', '2022-03-10', '08:37:37', 'Pending', 'Aspirasi'),
(24, 'deni', '085217227178', 'Perumnas antang', 'Akses masuk yang terbilang cukup susah', '2022-03-10', '08:38:27', 'Pending', 'Pengaduan'),
(25, 'toding', '082399672552', 'Asrama brimob batalyon a pelopor', 'Segera melakukan perbaikan pada setiap kapal', '2022-03-10', '08:41:16', 'Pending', 'Pengaduan'),
(26, 'if', '082346710644', 'Jl. Prof Matulada', 'Semoga bisa lebih baik kedepannya', '2022-03-10', '08:41:59', 'Pending', 'Aspirasi'),
(27, 'abrar', '085399291195', 'JL. DR WS HUSODO XIII/13 NO 10', 'kurangnya sosialisasi terhadap pengguna jasa sehingga bnyak pengguna jasa blum paham betul terhadap system yg didijalankan oleh penyedia jasa yaitu PT PELINDO Cabang Makassar New Port ', '2022-03-10', '08:42:58', 'Pending', 'Pengaduan'),
(28, 'fauzan', '08577373195', 'Sudiang', 'Maraknya pungutan liar yang dilakukan beberapa operator alat berat.', '2022-03-10', '08:44:09', 'Pending', 'Pengaduan'),
(30, 'irham', '085211336556', 'jl batua raya', 'akses ke new port sering macet karena mobil truk yang lalulalang membawa kontener menuju lokasi sehingga membuat kepadatan di jalan/ seharusnya mobil truk di buatkan jalan yang khusus sehingga kami selaku pengguna jasa cepat mengakses lokasi tanpa bertemu truk truk yang membuat macet dan tidak banyak memakan waktu di jalan', '2022-03-10', '08:46:20', 'Pending', 'Pengaduan'),
(31, 'gufran', '085313940084', 'Makassar', 'Barang yang dikirim terdapat keterlambatan sehingga mengecewakan konsumen', '2022-03-10', '08:47:03', 'Pending', 'Pengaduan'),
(32, 'widi', '0895806156793', 'Moncongloe', 'Mohon fasilitas yang disediakan agar dijaga dengan baik, karena terdapat beberapa fasilitas rusak', '2022-03-10', '08:47:52', 'Pending', 'Aspirasi'),
(33, 'kifli', '085955126468', 'Perintis Kemerdekaan 7', 'Saya merasa kecewa dengan ketidak ramahan karyawan', '2022-03-10', '08:48:41', 'Pending', 'Pengaduan'),
(34, 'fitri', '085283358883', 'BTP Blok J', 'Terdapat kekeliruan pada surat balasan yang dikirimkan', '2022-03-10', '08:49:23', 'Pending', 'Aspirasi'),
(35, 'rina', '082393243859', 'Sudiang', 'Alangkah lebih baik pelayanan ditingkatkan', '2022-03-10', '08:50:02', 'Pending', 'Aspirasi'),
(36, 'ammha', '085388606948', 'BTP', 'Ruang tunggu kotor dan AC tidak bekerja, sehingga panas', '2022-03-10', '08:50:45', 'Pending', 'Pengaduan'),
(37, 'fatir', '082189035979', 'Perdos Unhas', 'Disamping kantor terdapat bau yang tidak sedap', '2022-03-10', '08:51:31', 'Pending', 'Pengaduan'),
(38, 'lemang', '081272754540', 'Jl. Pajaiyyang Daya', 'Saya sedikit kecewa terhadap pada ruang tunggu yang tidak nyaman ', '2022-03-10', '08:52:17', 'Pending', 'Pengaduan'),
(39, 'iqbal1', '082349379464', 'BTN Antara', 'Barang yang saya kirimkan tidak ada proses yang berjalan, mohon segera dikirimkan', '2022-03-10', '08:53:02', 'Pending', 'Pengaduan'),
(40, 'jj', '082198553116', 'Bone', 'Sebaiknya menambah admin/karyawan, sehingga proses cepat selesai', '2022-03-10', '08:53:43', 'Pending', 'Pengaduan'),
(41, 'ardi', '082150662264', 'Jl. Sahabat Unhas', 'Terdapat kerusakan pada barang yang saya terima, mungkin dari proses pembungkusan yang tidak safety', '2022-03-10', '08:54:20', 'Pending', 'Pengaduan'),
(42, 'andi', '081284444674', 'Sudiang', 'Mohon teliti pada jika proses packing, karena terdapat kesalahan pada barang saya', '2022-03-10', '08:55:06', 'Pending', 'Pengaduan'),
(43, 'nas', '085346578989', 'Gowa', 'Terdapat limbah sehingga berbau busuk sekitar kantor', '2022-03-10', '08:55:49', 'Pending', 'Pengaduan'),
(44, 'ban', '081292090068', 'Sudiang Raya', 'Mohon kebijakan mengenai aturan perizinan direnggangkan', '2022-03-10', '08:56:30', 'Pending', 'Aspirasi'),
(45, 'wawan', '08992520069', 'Daya', 'Dengan ini saya menyatakan bahwa harga masuk terlalu tinggi sehingga menyulitkan kami rakyat kecil.', '2022-03-10', '08:57:13', 'Pending', 'Aspirasi'),
(46, 'nunu', '082292228334', 'Jl. Sungai Saddang', 'Standar pembangunan sudah cukup bagus, tapi bagusnya ditingkatkan kembali', '2022-03-10', '08:57:58', 'Pending', 'Aspirasi'),
(47, 'arwin', '082196254096', 'Panaikang', 'Kondisi kapal setelah di dorong terdapat lecet', '2022-03-10', '08:58:47', 'Pending', 'Pengaduan'),
(48, 'indah', '082291912559', 'BTN Hamzi', 'Kebijakan tentang harga penyewaan agar di tinjau kembali', '2022-03-10', '08:59:29', 'Pending', 'Aspirasi'),
(49, 'app', '082194772761', 'Wajo', 'Mohon air bersih di pelabuhan diperhatikan dengan baik', '2022-03-10', '09:00:06', 'Pending', 'Pengaduan'),
(50, 'nobi', '082194584583', 'Moncongloe', 'Mohon ketelitian admin/karyawan diperhatikan karena terdapat kesalahan pada surat', '2022-03-10', '09:00:46', 'Pending', 'Pengaduan'),
(51, 'isma', '085247945065', 'Maros', 'Terdapat kecelakan ketika mendorong kapal', '2022-03-10', '09:01:29', 'Pending', 'Pengaduan'),
(52, 'lut', '082191092956', 'Jl. Perintis Kemerdekaan 4 Tamalanrea', 'Mohon meninjau kembali lokasi pelabuhan karena terdapat fasilitas yang tidak bisa', '2022-03-10', '09:02:07', 'Pending', 'Aspirasi'),
(53, 'yen', '081909807707', 'Antang', 'Mohon berikan info cetak sehingga saya lebih mudah tahu seputar pelabuhan', '2022-03-10', '09:02:43', 'Pending', 'Aspirasi'),
(54, 'fauzul', '081526014336', 'Kapasa', 'Sering listrik di pelabuhan mengalami pemadaman', '2022-03-10', '09:03:37', 'Pending', 'Pengaduan'),
(55, 'navta', '085298328629', 'Panakukang', 'Saya tidak bisa hadir dalam pertemuan karena ada kesibukan yang mendadak', '2022-03-10', '09:04:31', 'Pending', 'Pengaduan'),
(56, 'dilla', '085242710690', 'Jl Hartaco Daya', 'Saya merasa kurang nyaman di palabuhan karena ada bau yang tidak sedap', '2022-03-10', '09:05:13', 'Pending', 'Pengaduan'),
(57, 'opik', '085256605855', 'Pengayoman', 'Keran air di wastafel WC tidak berfungsi', '2022-03-10', '09:06:23', 'Pending', 'Pengaduan'),
(58, 'febri123', '0812345678', 'Makassar', 'Mohon fasilitas yang disediakan agar dijaga dengan baik, karena terdapat beberapa fasilitas rusak', '2022-03-10', '09:08:51', 'Pending', 'Aspirasi'),
(59, 'fauzan', '086789123456', 'Btp', 'Haus', '2022-04-09', '05:50:08', 'Pending', 'Pengaduan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_akun`
--
ALTER TABLE `data_akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `data_pengaduan_dan_aspirasi`
--
ALTER TABLE `data_pengaduan_dan_aspirasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username_user` (`username_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pengaduan_dan_aspirasi`
--
ALTER TABLE `data_pengaduan_dan_aspirasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_pengaduan_dan_aspirasi`
--
ALTER TABLE `data_pengaduan_dan_aspirasi`
  ADD CONSTRAINT `data_pengaduan_dan_aspirasi_ibfk_1` FOREIGN KEY (`username_user`) REFERENCES `data_akun` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
