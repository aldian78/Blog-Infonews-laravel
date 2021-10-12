-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Okt 2021 pada 18.27
-- Versi server: 10.5.8-MariaDB-log
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infonews`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `categori_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `categori_id`, `judul`, `image`, `content`, `slug`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Voluptatem totam.', NULL, 'Dolor impedit molestias beatae voluptate est ullam. Suscipit minima minus quas recusandae nesciunt ut. Quis eos nihil libero sit voluptatem. Officiis sunt et architecto et ut. Provident et doloremque aut at praesentium.', 'ipsum-illo-totam-expedita-similique-voluptatem-et-et-et', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(2, 3, 4, 'Quod deleniti.', NULL, 'Distinctio voluptatem tempore voluptatum harum. Qui consequatur incidunt aut magni inventore et. Vel harum sit odio modi reiciendis et. Dicta velit unde libero optio.', 'quasi-quidem-harum-et-deserunt-enim', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(3, 3, 4, 'Cumque qui.', NULL, 'Repellat tempora deserunt quia. Vel perspiciatis consequatur odio rerum et. Possimus corporis suscipit nostrum et porro voluptates cumque. Repellendus architecto consequuntur ut facere quia. Corporis laudantium suscipit et. Eos facilis laboriosam reprehenderit perferendis a illum quasi. Vitae doloribus rerum delectus voluptatem illo.', 'non-eos-quia-cumque-rerum-placeat-sed-vel', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(4, 1, 3, 'Ea qui sit.', NULL, 'Voluptas ut asperiores illum atque at nostrum doloribus. Eius ab nobis exercitationem ad. Voluptatem velit veniam molestiae sapiente magnam amet. Necessitatibus et facilis et in saepe maiores dicta. Eveniet at voluptas tempore eos voluptas. Quisquam quisquam maxime ea ipsum quia. Voluptatem odio molestias id debitis hic. Ut enim et nesciunt laborum sunt. Ipsam similique aperiam corporis fugiat accusamus.', 'et-vero-doloremque-nemo-sit-expedita-dolores-molestiae-ea', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(5, 2, 3, 'Temporibus.', NULL, 'Tempore quisquam qui aut qui. Eos ipsam deserunt sed officiis et velit. Qui soluta optio expedita. Quia harum aut eligendi facere. Aut ipsum dolor nostrum saepe. Dolorem eos corporis et debitis aut. Praesentium est rem placeat repellendus earum. Omnis laboriosam aliquam occaecati fuga impedit.', 'eligendi-animi-dolorum-dolorum', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(6, 2, 3, 'Perferendis autem doloribus.', NULL, 'Ullam voluptatem alias repellendus. Recusandae aperiam consequuntur doloremque commodi tempore. Nemo deleniti voluptas quis aut eum ipsum rerum architecto. Dicta consectetur aut et. Dolorum eum voluptatem et ex cumque temporibus. Laudantium fugit nisi saepe deleniti et omnis non minima. Sunt laudantium facilis minima natus quidem molestiae tempora. Rerum aut ipsam aut quae corrupti ut omnis. Veritatis debitis et unde.', 'totam-cumque-earum-est-eligendi-totam', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(7, 1, 3, 'Modi.', NULL, 'Quidem voluptatum cumque expedita eos laudantium qui. Deleniti est alias magni inventore dolorem quisquam odit aut. Omnis et amet ut sint sunt tempore magni et. Officiis eaque sit ex deserunt aut et. Quos est dolorum tempore. Est recusandae ut quia. Ullam ut sit voluptatum in est.', 'excepturi-enim-fugiat-atque-veniam-molestiae-dicta', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(8, 2, 2, 'Qui ex omnis aut.', NULL, 'Eveniet libero a rem voluptatem. Odio atque aut qui deserunt sunt. Vitae sunt voluptatibus sit commodi distinctio. Vel libero qui qui. Laudantium non vero illum omnis laborum.', 'et-vel-qui-quibusdam-molestiae', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(9, 2, 1, 'Libero et et.', NULL, 'Sint ad molestiae deserunt libero rem illum vel aut. Libero et veniam ut soluta harum qui suscipit minus. Ut fugiat aliquam nesciunt eos omnis magnam. Ducimus omnis tempore quis eligendi. Nemo aut dolor similique eius temporibus sunt aut. Quisquam quas voluptas qui qui eveniet fuga. Doloribus recusandae sed perspiciatis. Et ut molestiae itaque eligendi sint.', 'sit-sit-est-voluptatem-eos', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(10, 1, 2, 'Magni consequatur quos.', NULL, 'Perferendis animi omnis laborum est. Incidunt laborum voluptatem nam magni autem. Iste voluptas sequi voluptate voluptatem voluptates vel at doloribus. Ut distinctio delectus quaerat ut. Et ratione corporis sunt fuga debitis nemo et. Quibusdam officia iusto sit illo adipisci eveniet.', 'ratione-ea-nisi-autem-iure-reprehenderit-accusamus-ducimus', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(11, 2, 2, 'Quidem.', NULL, 'Quia ea odit cupiditate sed a. Dolorem non dignissimos neque est. Maiores incidunt mollitia eius et. Magnam quas error non voluptate dolor quidem accusantium fugiat. Nam totam et qui consequatur id enim. Ad voluptate fugit iure aspernatur quo perferendis ea repellat.', 'non-ex-suscipit-molestiae-nam', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(12, 1, 3, 'Eum eum.', NULL, 'Blanditiis voluptatem perferendis laudantium voluptates vel. In praesentium voluptate explicabo commodi id sit. Sequi eos nulla numquam fugit dolores. Soluta dolor consectetur eos. Facere voluptatem harum ut consectetur. Deserunt libero quod possimus nihil. Necessitatibus id qui veritatis et natus quo incidunt similique.', 'perferendis-aperiam-blanditiis-eaque-quo', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(13, 2, 2, 'Ea officiis et repellat.', NULL, 'Corrupti occaecati sequi eligendi recusandae similique numquam. Cum natus fuga placeat. Inventore quisquam modi accusantium voluptatem tempora dolores. Velit numquam alias voluptas. Quia itaque dolorem aperiam quidem amet cumque.', 'vero-quasi-consequatur-perferendis-occaecati-incidunt-doloribus-architecto', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(14, 3, 3, 'Et sunt.', NULL, 'Praesentium esse eum qui est nisi dignissimos sit. Eligendi fuga eum omnis sunt soluta laudantium atque. Laborum eum inventore odit sit ut fugit. Suscipit odit sed excepturi minus ut. Ut cupiditate ratione qui corrupti esse rerum tenetur. Nihil qui nobis aut ut excepturi. Unde omnis quo delectus quasi vitae asperiores dolores.', 'accusamus-repudiandae-exercitationem-officia-quaerat-repudiandae-qui', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(15, 2, 3, 'Harum quis natus.', NULL, 'Facilis veritatis ut sunt fugit. Itaque voluptas dolores soluta. Maiores natus doloribus totam culpa in ea. Voluptatum voluptatem est dolores dolorum. Quia quis praesentium qui quisquam alias. Eveniet vel facere perspiciatis eligendi voluptas eaque nemo a. Fuga consequuntur magni eos sequi nesciunt suscipit error. Aut optio voluptatem harum occaecati velit nesciunt. Consequatur laborum nobis at porro sed.', 'distinctio-sed-eos-eum-molestias-mollitia', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(16, 1, 4, 'Et.', NULL, 'Non soluta ipsum et suscipit. Ut et et delectus nobis nobis. Perspiciatis culpa voluptas quibusdam voluptatem hic distinctio ut. Rerum rem sit cupiditate reiciendis. Dolorum voluptatem corrupti ut natus natus nulla sunt itaque. Voluptas neque omnis doloremque eligendi. Eligendi officiis enim voluptates earum. Porro animi dolorem laborum perspiciatis odit. Sapiente sunt enim laborum veniam officiis iure.', 'amet-quia-similique-quisquam', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(17, 1, 3, 'Officiis doloremque.', NULL, 'Voluptatem aliquid aliquam omnis nostrum qui consectetur atque. Qui placeat inventore omnis nesciunt. Quibusdam debitis provident sit est. Et libero dolore harum. Quam provident quo dolorum distinctio pariatur itaque fuga occaecati. Dolor fugit nobis et sit eum ut.', 'rerum-fugiat-quis-quisquam-mollitia-et-debitis', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(18, 1, 4, 'Officiis voluptas.', NULL, 'Et iusto non vel et. Pariatur est atque ab ducimus. Nesciunt consequatur facilis quas modi mollitia a dolores et. Rerum cupiditate et placeat ea amet doloribus recusandae eligendi. Ex repellendus eos optio dolor. Aperiam dolores reiciendis libero.', 'quidem-eum-quod-dicta-dignissimos-quia-blanditiis', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(19, 3, 4, 'Velit ut animi.', NULL, 'Magnam harum esse amet et. Possimus nemo culpa sit omnis incidunt. Nisi sunt molestiae assumenda voluptas voluptatem. Magnam non non minima sapiente minus recusandae quae. Et qui perferendis dolorum ut esse asperiores. Qui fugit cum quia necessitatibus totam aliquam. Fuga labore suscipit dicta est non qui.', 'temporibus-qui-odio-nulla-quo-laborum', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(20, 2, 1, 'Fuga veritatis expedita.', NULL, 'Eum aperiam molestiae sapiente ut. Nam ratione alias error et recusandae. Culpa harum et laudantium. Sint accusamus enim harum rem ut et repudiandae sed. Nostrum qui quia asperiores iure et est adipisci.', 'sunt-voluptatem-in-velit-ullam-nobis-consequatur-doloremque-autem', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(21, 3, 4, 'Berita terbaru nih', NULL, '<div>gass lah</div>', 'berita-terbaru-nih', '2021-10-05 19:19:16', '2021-10-05 19:19:16'),
(22, 3, 2, 'Persebaya akan menjadi juara liga 1', 'blogs-image/1633461842.jpg', '<div>Pasti lah hehe</div>', 'persebaya-akan-menjadi-juara-liga-1', '2021-10-05 19:24:04', '2021-10-05 19:24:04'),
(27, 3, 1, 'Pasti lulus tes telkom', NULL, '<div>Bismillah</div>', 'pasti-lulus-tes-telkom', '2021-10-07 06:07:19', '2021-10-07 06:07:19'),
(28, 3, 3, 'Yok bisa yok', NULL, '<div>pasti bisa lah dihadapi</div>', 'yok-bisa-yok', '2021-10-07 06:17:53', '2021-10-07 06:17:53'),
(33, 3, 1, 'Coba disek', NULL, '<div>ggggg</div>', 'coba-disek', '2021-10-07 06:33:50', '2021-10-07 06:33:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `tags_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `blog_id`, `tags_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 21, 1, NULL, NULL, NULL),
(2, 21, 2, NULL, NULL, NULL),
(3, 22, 1, NULL, NULL, NULL),
(4, 22, 2, NULL, NULL, NULL),
(11, 27, 1, NULL, NULL, NULL),
(12, 27, 2, NULL, NULL, NULL),
(13, 28, 4, NULL, NULL, NULL),
(19, 33, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categoris`
--

CREATE TABLE `categoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categoris`
--

INSERT INTO `categoris` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Programming', 'programming', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(2, 'Web design', 'web-design', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(3, 'Trading dan saham', 'trading-dan-saham', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(4, 'Fullstack', 'fullstack', '2021-10-03 18:30:03', '2021-10-03 18:30:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `contacts`
--

INSERT INTO `contacts` (`id`, `nama`, `email`, `subject`, `pesan`, `created_at`, `updated_at`) VALUES
(2, 'aldian', 'aldiandwi78@gmail.com', 'semangat bro', 'hahahaha', '2021-10-04 16:10:47', '2021-10-04 16:10:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `like` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `likes`
--

INSERT INTO `likes` (`id`, `ip_address`, `blog_id`, `like`, `created_at`, `updated_at`) VALUES
(5, '127.0.0.1', 22, '1', '2021-10-12 16:24:29', '2021-10-12 16:24:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_15_195942_create_categoris_table', 1),
(6, '2021_09_15_231138_create_blogs_table', 1),
(7, '2021_09_28_222055_create_tags_table', 1),
(8, '2021_09_28_231135_create_blog_tags_table', 1),
(9, '2021_10_02_231150_create_contacts_table', 1),
(12, '2021_10_04_015737_create_subscribers_table', 2),
(19, '2021_10_12_225228_create_likes_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(7, 'aldiandwi59@gmail.com', '2021-10-07 06:20:15', '2021-10-07 06:20:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`id`, `nama_tags`, `slug_tags`, `created_at`, `updated_at`) VALUES
(1, 'Laravel', 'laravel', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(2, 'Codeigniter', 'codeigniter', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(3, 'Node JS', 'node-js', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(4, 'Javascript', 'javascript', '2021-10-03 18:30:03', '2021-10-03 18:30:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Puti Usamah M.Ak', 'hariyah.salimah', 'tirtayasa95@example.org', '2021-10-03 18:30:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NZ3eSgYZer', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(2, 'Daruna Tampubolon M.TI.', 'wahyuni.agus', 'rmangunsong@example.net', '2021-10-03 18:30:03', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sJT9aFupbQDGKty75FKuhDVmXzpgPoJtAU18MTtWNYo8jwGpxGeeKPwrJvvA', '2021-10-03 18:30:03', '2021-10-03 18:30:03'),
(3, 'aldiandwi', 'aldian', 'aldian@gmail.com', NULL, '$2y$10$7InZuEmy8PHNzs/aUIfWLOHZDG2tpNOW0zjSCMaO95evZU2y9FhBq', NULL, '2021-10-03 18:30:03', '2021-10-03 18:30:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_user_id_foreign` (`user_id`),
  ADD KEY `blogs_categori_id_foreign` (`categori_id`);

--
-- Indeks untuk tabel `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_tags_blog_id_foreign` (`blog_id`),
  ADD KEY `blog_tags_tags_id_foreign` (`tags_id`);

--
-- Indeks untuk tabel `categoris`
--
ALTER TABLE `categoris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoris_slug_unique` (`slug`);

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_blog_id_foreign` (`blog_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_nama_tags_unique` (`nama_tags`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `categoris`
--
ALTER TABLE `categoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_categori_id_foreign` FOREIGN KEY (`categori_id`) REFERENCES `categoris` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD CONSTRAINT `blog_tags_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_tags_tags_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
