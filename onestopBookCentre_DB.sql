-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2021 at 09:11 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gedungsehentibuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `idAlamat` bigint(20) UNSIGNED NOT NULL,
  `namaPenerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noTel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `butiranAlamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poskod` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idPembeli` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`idAlamat`, `namaPenerima`, `noTel`, `butiranAlamat`, `poskod`, `idPembeli`) VALUES
(1, 'Mohamad Hafiz Haziq Bin Mohamad Nazri', '01126094561', '307, Jln Seraya 4, FELDA Tenggaroh 01', '81900', 5);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idBuku` bigint(20) UNSIGNED NOT NULL,
  `tajukBuku` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbnBuku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarangBuku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbitBuku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikhTerbitBuku` date NOT NULL,
  `ukuranBuku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mukaSuratBuku` int(11) NOT NULL,
  `sinopsisBuku` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikhCiptaBuku` date NOT NULL,
  `stokBuku` int(11) NOT NULL,
  `hargaBuku` double(9,2) NOT NULL,
  `jenisKulitBuku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambarBuku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusBuku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idGenre` bigint(20) UNSIGNED NOT NULL,
  `idPenjual` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idBuku`, `tajukBuku`, `isbnBuku`, `pengarangBuku`, `penerbitBuku`, `tarikhTerbitBuku`, `ukuranBuku`, `mukaSuratBuku`, `sinopsisBuku`, `tarikhCiptaBuku`, `stokBuku`, `hargaBuku`, `jenisKulitBuku`, `gambarBuku`, `statusBuku`, `idGenre`, `idPenjual`) VALUES
(2, 'The Long Way to a Small, Angry Planet', '9781473619814', 'Becky Chambers', 'HODDER & STOUGHTON', '2018-09-11', '128 x 198 x 30', 432, 'When Rosemary Harper joins the crew of the Wayfarer, she isn\'t expecting much. The ship, which has seen better days, offers her everything she could possibly want: a small, quiet spot to call home for a while, adventure in far-off corners of the galaxy, and distance from her troubled past.\r\n\r\nBut Rosemary gets more than she bargained for with the Wayfarer. The crew is a mishmash of species and personalities, from Sissix, the friendly reptillian pilot, to Kizzy and Jenks, the constantly sparring engineers who keep the ship running. Life on board is chaotic, but more or less peaceful - exactly what Rosemary wants.\r\n\r\nUntil the crew are offered the job of a lifetime: the chance to build a hyperspace tunnel to a distant planet. They\'ll earn enough money to live comfortably for years... if they survive the long trip through war-torn interstellar space without endangering any of the fragile alliances that keep the galaxy peaceful.', '2021-01-22', 100, 13.79, 'Paperback', '2.jpg', 'available', 1, 2),
(3, 'Origin : (Robert Langdon Book 5)', '9780552175692', 'Dan Brown', 'Transworld Publishers Ltd', '2018-07-12', '110 x 178 x 33', 560, 'Robert Langdon, Harvard professor of symbology and religious iconology, arrives at the Guggenheim Museum Bilbao to attend the unveiling of a discovery that \"will change the face of science forever\". The evening\'s host is his friend and former student, Edmond Kirsch, a forty-year-old tech magnate whose dazzling inventions and audacious predictions have made him a controversial figure around the world. This evening is to be no exception: he claims he will reveal an astonishing scientific breakthrough to challenge the fundamentals of human existence.\r\n\r\nBut Langdon and several hundred other guests are left reeling when the meticulously orchestrated evening is blown apart before Kirsch\'s precious discovery can be revealed. With his life under threat, Langdon is forced into a desperate bid to escape, along with the museum\'s director, Ambra Vidal. Together they flee to Barcelona on a perilous quest to locate a cryptic password that will unlock Kirsch\'s secret.', '2021-01-23', 56, 65.52, 'Paperback', '3.jpg', 'available', 1, 3),
(4, 'Brave New World', '9780099477464', 'Aldous Huxley', 'Vintage Publishing', '2019-03-08', '110 x 178 x 18', 288, 'With introductions by Margaret Atwood and David Bradshaw. Far in the future, the World Controllers have created the ideal society. Bernard Marx seems alone harbouring an ill-defined longing to break free. A visit to one of the few remaining Savage Reservations where the old, imperfect life still continues, may be the cure for his distress...Huxley\'s ingenious fantasy of the future sheds a blazing light on the present and is considered to be his most enduring masterpiece.', '2021-01-24', 78, 44.24, 'Paperback', '4.jpg', 'available', 3, 4),
(5, 'The Complete Poetry Of Edgar Allan Poe', '9780451531056', 'Edgar Allan Poe', 'Penguin Putnam Inc', '2020-11-16', '105 x 172 x 15.24', 139, 'Explore the transcendent world of unity and ultimate beauty in Edgar Allan Poe\'s verse in this complete poetry collection. Although best known for his short stories, Edgar Allan Poe was by nature and choice a poet. From his exquisite lyric \"To Helen,\" to his immortal masterpieces, \"Annabel Lee,\" \"The Bells,\" and \"The Raven,\" Poe stands beside the celebrated English romantic poets Shelley, Byron, and Keats, and his haunting, sensuous poetic vision profoundly influenced the Victorian giants Swinburne, Tennyson, and Rossetti. Today his dark side speaks eloquently to contemporary readers in poems such as \"The Haunted Palace\" and \"The Conqueror Worm,\" with their powerful images of madness and the macabre. But even at the end of his life, Poe reached out to his art for comfort and courage, giving us in \"Eldorado\" a talisman to hold during our darkest moments--a timeless gift from a great American writer. Includes an Introduction by Jay Parini\r\nand an Afterword by April Bernard', '2021-01-27', 139, 25.22, 'Paperback', '5.jpg', 'available', 3, 3),
(6, 'Fahrenheit 451', '9780006546061', 'Ray Bradbury', 'HarperCollins Publishers', '2019-02-07', '129 x 198 x 18', 192, 'Guy Montag is a fireman. His job is to burn books, which are forbidden, being the source of all discord and unhappiness. Even so, Montag is unhappy; there is discord in his marriage. Are books hidden in his house? The Mechanical Hound of the Fire Department, armed with a lethal hypodermic, escorted by helicopters, is ready to track down those dissidents who defy society to preserve and read books.\r\n\r\nThe classic novel of a post-literate future, \'Fahrenheit 451\' stands alongside Orwell\'s \'1984\' and Huxley\'s \'Brave New World\' as a prophetic account of Western civilization\'s enslavement by the media, drugs and conformity.\r\n\r\nBradbury\'s powerful and poetic prose combines with uncanny insight into the potential of technology to create a novel which over fifty years from first publication, still has the power to dazzle and shock.', '2021-01-28', 20, 46.14, 'Paperback', '11.jpg', 'available', 3, 1),
(7, 'The House in the Cerulean Sea\r\n', '9781250217318', 'TJ Klune', 'St Martin\'s Press', '2020-02-08', '137.16 x 208.28 x 25.4', 400, 'Linus Baker leads a quiet, solitary life. At forty, he lives in a tiny house with a devious cat and his old records. As a Case Worker at the Department in Charge Of Magical Youth, he spends his days overseeing the well-being of children in government-sanctioned orphanages.\r\n\r\nWhen Linus is unexpectedly summoned by Extremely Upper Management he\'s given a curious and highly classified assignment: travel to Marsyas Island Orphanage, where six dangerous children reside: a gnome, a sprite, a wyvern, an unidentifiable green blob, a were-Pomeranian, and the Antichrist. Linus must set aside his fears and determine whether or not they\'re likely to bring about the end of days.', '2021-01-27', 40, 64.83, 'Paperback', '7.jpg', 'available', 4, 2),
(8, 'Season of Storms : The Witcher', '9781473231139', 'Andrzej Sapkowski ', 'Orion Publishing Co', '2020-05-27', '128 x 196 x 28', 368, 'Before he was Ciri\'s guardian, Geralt of Rivia was a legendary swordsman. Season of Storms is an adventure set in the world of the Witcher, the book series that inspired the hit Netflix show and bestselling video games.\r\n\r\nGeralt. The witcher whose mission is to protect ordinary people from the monsters created with magic. A mutant who has the task of killing unnatural beings. He uses a magical sign, potions and the pride of every witcher - two swords, steel and silver.\r\n\r\nBut what would happen if Geralt lost his weapons?\r\n\r\nAndrzej Sapkowski returns to his phenomenal world of the Witcher in a stand-alone novel where Geralt fights, travels and loves again, Dandelion sings and flies from trouble to trouble, sorcerers are scheming ... and across the whole world clouds are gathering.\r\n\r\nThe season of storms is coming...', '2021-01-31', 200, 42.27, 'Paperback', '8.jpg', 'available', 4, 2),
(9, 'The Starless Sea', '9781784702861', 'Erin Morgenstern', 'Vintage Publishing', '2020-08-06', '129 x 198 x 129', 512, 'A journey of wonder and imagination\' Stylist\r\n\r\nYou are invited to join Zachary on the starless sea: the home of storytellers, story-lovers and those who will protect our stories at all costs.\r\n\r\nDiscover the enchanting, magical new bestseller from the author of The Night Circus\r\n\r\nWhen Zachary Rawlins stumbles across a strange book hidden in his university library it leads him on a quest unlike any other. Its pages entrance him with their tales of lovelorn prisoners, lost cities and nameless acolytes, but they also contain something impossible: a recollection from his own childhood.', '2021-02-01', 212, 68.02, 'Paperback', '9.jpg', 'available', 4, 3),
(10, 'The Seven Deaths of Evelyn Hardcastle', '9781408889510', 'Stuart Turton', 'Bloomsbury Publishing PLC', '2018-10-04', '129 x 198 x 35', 528, 'Gosford Park meets Groundhog Day by way of Agatha Christie and Black Mirror - the most inventive story you\'ll read\r\n\r\nTonight, Evelyn Hardcastle will be killed ... Again\r\n\r\nIt is meant to be a celebration but it ends in tragedy. As fireworks explode overhead, Evelyn Hardcastle, the young and beautiful daughter of the house, is killed.\r\n\r\nBut Evelyn will not die just once. Until Aiden - one of the guests summoned to Blackheath for the party - can solve her murder, the day will repeat itself, over and over again. Every time ending with the fateful pistol shot.\r\n\r\nThe only way to break this cycle is to identify the killer. But each time the day begins again, Aiden wakes in the body of a different guest. And someone is determined to prevent him ever escaping Blackheath...', '2021-02-03', 50, 52.36, 'Paperback', '10.jpg', 'available', 5, 2),
(11, 'Fahrenheit 451', '9781451690316', 'Ray Bradbury', 'SIMON & SCHUSTER', '2012-05-23', '103 x 170 x 17', 158, 'Guy Montag is a fireman. In his world, where television rules and literature is on the brink of extinction, firemen start fires rather than put them out. His job is to destroy the most illegal of commodities, the printed book, along with the houses in which they are hidden. Montag never questions the destruction and ruin his actions produce, returning each day to his bland life and wife, Mildred, who spends all day with her television “family.” But then he meets an eccentric young neighbor, Clarisse, who introduces him to a past where people didn’t live in fear and to a present where one sees the world through the ideas in books instead of the mindless chatter of television. When Mildred attempts suicide and Clarisse suddenly disappears, Montag begins to question everything he has ever known. He starts hiding books in his home, and when his pilfering is discovered, the fireman has to run for his life.', '2021-02-02', 61, 24.19, 'Paperback', 'S11625500602.jpeg', 'available', 7, 2),
(12, 'The House in the Cerulean Sea', '9781250217288', 'TJ Klune', 'St Martin\'s Press', '2020-02-08', '148 x 219 x 37', 352, 'An enchanting story, masterfully told, The House in the Cerulean Sea is about the profound experience of discovering an unlikely family in an unexpected place-and realizing that family is yours.', '2021-02-03', 120, 60.25, 'Hardback', '12.jpg', 'available', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `butiran_pesanan`
--

CREATE TABLE `butiran_pesanan` (
  `idButiranPesanan` bigint(20) UNSIGNED NOT NULL,
  `idPesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idBuku` bigint(20) UNSIGNED NOT NULL,
  `kuantitiPesanan` int(11) NOT NULL,
  `jumlahHargaBuku` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `butiran_pesanan`
--

INSERT INTO `butiran_pesanan` (`idButiranPesanan`, `idPesanan`, `idBuku`, `kuantitiPesanan`, `jumlahHargaBuku`) VALUES
(1, 'B5S11628045641', 6, 2, 92.28);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `idGenre` bigint(20) UNSIGNED NOT NULL,
  `namaGenre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`idGenre`, `namaGenre`) VALUES
(1, 'Adventure'),
(2, 'Drama'),
(3, 'Classics'),
(4, 'Fantasy'),
(5, 'Horror'),
(6, 'Romance'),
(7, 'Science Fiction'),
(8, 'Historical Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `idKeluar` bigint(20) UNSIGNED NOT NULL,
  `idBuku` bigint(20) UNSIGNED NOT NULL,
  `idPenjual` bigint(20) UNSIGNED NOT NULL,
  `idAlamat` bigint(20) UNSIGNED NOT NULL,
  `idKurier` bigint(20) UNSIGNED NOT NULL,
  `kuantitiBuku` int(11) NOT NULL,
  `jumlahHargaBuku` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kurier`
--

CREATE TABLE `kurier` (
  `idKurier` bigint(20) UNSIGNED NOT NULL,
  `namaKurier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaKurier` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kurier`
--

INSERT INTO `kurier` (`idKurier`, `namaKurier`, `hargaKurier`) VALUES
(1, 'Poslaju', 5.06),
(2, 'J&T Express', 4.14);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_01_17_060001_create_penjual_table', 1),
(2, '2021_01_17_061250_create_poskod_table', 1),
(3, '2021_01_17_061402_create_pembeli_table', 1),
(4, '2021_01_17_061411_create_alamat_table', 1),
(5, '2021_02_02_135427_create_genre_table', 1),
(6, '2021_02_02_135448_create_buku_table', 1),
(7, '2021_02_02_135637_create_troli_table', 1),
(8, '2021_04_15_140154_create_kurier_table', 1),
(9, '2021_04_17_132358_create_penjual_kurier_table', 1),
(10, '2021_04_19_001934_create_keluar_table', 1),
(11, '2021_05_08_193819_create_pesanan_table', 1),
(12, '2021_05_08_193849_create_butiran_pesanan_table', 1),
(13, '2021_06_30_111907_create_penilaian_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `idPembeli` bigint(20) UNSIGNED NOT NULL,
  `emelPembeli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaPembeli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kataLaluanPembeli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noTelPembeli` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `watakPembeli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambarPembeli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikhDaftarPembeli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`idPembeli`, `emelPembeli`, `namaPembeli`, `kataLaluanPembeli`, `noTelPembeli`, `watakPembeli`, `gambarPembeli`, `tarikhDaftarPembeli`) VALUES
(5, 'hafiz@gmail.com', 'hafiz307', 'hafiz', '01126094561', 'buyer', 'B51628045660.png', '2021-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `idPenilaian` bigint(20) UNSIGNED NOT NULL,
  `idPembeli` bigint(20) UNSIGNED NOT NULL,
  `idPesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idBuku` bigint(20) UNSIGNED NOT NULL,
  `markahPenilaian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`idPenilaian`, `idPembeli`, `idPesanan`, `idBuku`, `markahPenilaian`) VALUES
(1, 5, 'B5S11628045641', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `idPenjual` bigint(20) UNSIGNED NOT NULL,
  `emelPenjual` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaPenjual` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kataLaluanPenjual` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noTelPenjual` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noAkaunBankPenjual` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `watakPenjual` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambarPenjual` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikhDaftarPenjual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`idPenjual`, `emelPenjual`, `namaPenjual`, `kataLaluanPenjual`, `noTelPenjual`, `noAkaunBankPenjual`, `watakPenjual`, `gambarPenjual`, `tarikhDaftarPenjual`) VALUES
(1, 'syarikatAdam@gmail.com', 'syarikat_adam', '12345', '0123456789', '987654321', 'seller', '1.jpeg', '2021-01-01'),
(2, 'karangkrafmall@gmail.com', 'Karang Kraf Mall', '12345', '0123456789', '2346607', 'seller', '2.jpeg', '2021-01-01'),
(3, 'bukufixi@gmail.com', 'Buku Fixi', '12345', '0123456789', '7698354253', 'seller', '3.png', '2021-01-01'),
(4, 'book2ubookstore@gmail.com', 'book2ubookstore', '12345', '0123456789', '9876543210', 'seller', '4.jpeg', '2021-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `penjual_kurier`
--

CREATE TABLE `penjual_kurier` (
  `idPenjualKurier` bigint(20) UNSIGNED NOT NULL,
  `idPenjual` bigint(20) UNSIGNED NOT NULL,
  `idKurier` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjual_kurier`
--

INSERT INTO `penjual_kurier` (`idPenjualKurier`, `idPenjual`, `idKurier`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2),
(5, 4, 1),
(6, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `idPesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idAlamat` bigint(20) UNSIGNED NOT NULL,
  `idKurier` bigint(20) UNSIGNED NOT NULL,
  `idPembeli` bigint(20) UNSIGNED NOT NULL,
  `idPenjual` bigint(20) UNSIGNED NOT NULL,
  `subHargaPesanan` double(8,2) NOT NULL,
  `hargaPesanan` double(8,2) NOT NULL,
  `gambarTransaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusPesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarikhWaktuPesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`idPesanan`, `idAlamat`, `idKurier`, `idPembeli`, `idPenjual`, `subHargaPesanan`, `hargaPesanan`, `gambarTransaksi`, `statusPesanan`, `tarikhWaktuPesanan`) VALUES
('B5S11628045641', 1, 1, 5, 1, 92.28, 97.34, '1628045641.pdf', 'ship', 1628045641);

-- --------------------------------------------------------

--
-- Table structure for table `poskod`
--

CREATE TABLE `poskod` (
  `poskod` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daerah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negeri` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poskod`
--

INSERT INTO `poskod` (`poskod`, `daerah`, `negeri`) VALUES
('21300', 'Kuala Terengganu', 'Terengganu'),
('21600', 'Marang', 'Terengganu'),
('81900', 'Kota Tinggi', 'Johor'),
('86810', 'Mersing', 'Johor');

-- --------------------------------------------------------

--
-- Table structure for table `troli`
--

CREATE TABLE `troli` (
  `idTroli` bigint(20) UNSIGNED NOT NULL,
  `idBuku` bigint(20) UNSIGNED NOT NULL,
  `kuantitiTroli` int(11) NOT NULL,
  `hargaTroli` double(8,2) NOT NULL,
  `idPembeli` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`idAlamat`),
  ADD KEY `alamat_idpembeli_foreign` (`idPembeli`),
  ADD KEY `alamat_poskod_foreign` (`poskod`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idBuku`),
  ADD KEY `buku_idpenjual_foreign` (`idPenjual`),
  ADD KEY `buku_idgenre_foreign` (`idGenre`);

--
-- Indexes for table `butiran_pesanan`
--
ALTER TABLE `butiran_pesanan`
  ADD PRIMARY KEY (`idButiranPesanan`),
  ADD KEY `butiran_pesanan_idpesanan_foreign` (`idPesanan`),
  ADD KEY `butiran_pesanan_idbuku_foreign` (`idBuku`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`idGenre`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idKeluar`),
  ADD KEY `keluar_idbuku_foreign` (`idBuku`),
  ADD KEY `keluar_idpenjual_foreign` (`idPenjual`),
  ADD KEY `keluar_idalamat_foreign` (`idAlamat`),
  ADD KEY `keluar_idkurier_foreign` (`idKurier`);

--
-- Indexes for table `kurier`
--
ALTER TABLE `kurier`
  ADD PRIMARY KEY (`idKurier`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`idPembeli`),
  ADD UNIQUE KEY `pembeli_emelpembeli_unique` (`emelPembeli`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`idPenilaian`),
  ADD KEY `penilaian_idpembeli_foreign` (`idPembeli`),
  ADD KEY `penilaian_idpesanan_foreign` (`idPesanan`),
  ADD KEY `penilaian_idbuku_foreign` (`idBuku`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`idPenjual`),
  ADD UNIQUE KEY `penjual_emelpenjual_unique` (`emelPenjual`);

--
-- Indexes for table `penjual_kurier`
--
ALTER TABLE `penjual_kurier`
  ADD PRIMARY KEY (`idPenjualKurier`),
  ADD KEY `penjual_kurier_idpenjual_foreign` (`idPenjual`),
  ADD KEY `penjual_kurier_idkurier_foreign` (`idKurier`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idPesanan`),
  ADD KEY `pesanan_idalamat_foreign` (`idAlamat`),
  ADD KEY `pesanan_idkurier_foreign` (`idKurier`),
  ADD KEY `pesanan_idpembeli_foreign` (`idPembeli`),
  ADD KEY `pesanan_idpenjual_foreign` (`idPenjual`);

--
-- Indexes for table `poskod`
--
ALTER TABLE `poskod`
  ADD PRIMARY KEY (`poskod`);

--
-- Indexes for table `troli`
--
ALTER TABLE `troli`
  ADD PRIMARY KEY (`idTroli`),
  ADD KEY `troli_idbuku_foreign` (`idBuku`),
  ADD KEY `troli_idpembeli_foreign` (`idPembeli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `idAlamat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `idBuku` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `butiran_pesanan`
--
ALTER TABLE `butiran_pesanan`
  MODIFY `idButiranPesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `idGenre` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idKeluar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kurier`
--
ALTER TABLE `kurier`
  MODIFY `idKurier` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `idPembeli` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `idPenilaian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `idPenjual` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penjual_kurier`
--
ALTER TABLE `penjual_kurier`
  MODIFY `idPenjualKurier` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `troli`
--
ALTER TABLE `troli`
  MODIFY `idTroli` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamat`
--
ALTER TABLE `alamat`
  ADD CONSTRAINT `alamat_idpembeli_foreign` FOREIGN KEY (`idPembeli`) REFERENCES `pembeli` (`idPembeli`),
  ADD CONSTRAINT `alamat_poskod_foreign` FOREIGN KEY (`poskod`) REFERENCES `poskod` (`poskod`);

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_idgenre_foreign` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`),
  ADD CONSTRAINT `buku_idpenjual_foreign` FOREIGN KEY (`idPenjual`) REFERENCES `penjual` (`idPenjual`);

--
-- Constraints for table `butiran_pesanan`
--
ALTER TABLE `butiran_pesanan`
  ADD CONSTRAINT `butiran_pesanan_idbuku_foreign` FOREIGN KEY (`idBuku`) REFERENCES `buku` (`idBuku`),
  ADD CONSTRAINT `butiran_pesanan_idpesanan_foreign` FOREIGN KEY (`idPesanan`) REFERENCES `pesanan` (`idPesanan`);

--
-- Constraints for table `keluar`
--
ALTER TABLE `keluar`
  ADD CONSTRAINT `keluar_idalamat_foreign` FOREIGN KEY (`idAlamat`) REFERENCES `alamat` (`idAlamat`),
  ADD CONSTRAINT `keluar_idbuku_foreign` FOREIGN KEY (`idBuku`) REFERENCES `buku` (`idBuku`),
  ADD CONSTRAINT `keluar_idkurier_foreign` FOREIGN KEY (`idKurier`) REFERENCES `kurier` (`idKurier`),
  ADD CONSTRAINT `keluar_idpenjual_foreign` FOREIGN KEY (`idPenjual`) REFERENCES `penjual` (`idPenjual`);

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_idbuku_foreign` FOREIGN KEY (`idBuku`) REFERENCES `buku` (`idBuku`),
  ADD CONSTRAINT `penilaian_idpembeli_foreign` FOREIGN KEY (`idPembeli`) REFERENCES `pembeli` (`idPembeli`),
  ADD CONSTRAINT `penilaian_idpesanan_foreign` FOREIGN KEY (`idPesanan`) REFERENCES `pesanan` (`idPesanan`);

--
-- Constraints for table `penjual_kurier`
--
ALTER TABLE `penjual_kurier`
  ADD CONSTRAINT `penjual_kurier_idkurier_foreign` FOREIGN KEY (`idKurier`) REFERENCES `kurier` (`idKurier`),
  ADD CONSTRAINT `penjual_kurier_idpenjual_foreign` FOREIGN KEY (`idPenjual`) REFERENCES `penjual` (`idPenjual`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_idalamat_foreign` FOREIGN KEY (`idAlamat`) REFERENCES `alamat` (`idAlamat`),
  ADD CONSTRAINT `pesanan_idkurier_foreign` FOREIGN KEY (`idKurier`) REFERENCES `kurier` (`idKurier`),
  ADD CONSTRAINT `pesanan_idpembeli_foreign` FOREIGN KEY (`idPembeli`) REFERENCES `pembeli` (`idPembeli`),
  ADD CONSTRAINT `pesanan_idpenjual_foreign` FOREIGN KEY (`idPenjual`) REFERENCES `penjual` (`idPenjual`);

--
-- Constraints for table `troli`
--
ALTER TABLE `troli`
  ADD CONSTRAINT `troli_idbuku_foreign` FOREIGN KEY (`idBuku`) REFERENCES `buku` (`idBuku`),
  ADD CONSTRAINT `troli_idpembeli_foreign` FOREIGN KEY (`idPembeli`) REFERENCES `pembeli` (`idPembeli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
