CREATE ALGORITHM=UNDEFINED
	DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `salwa_timeline`
AS
	SELECT
		`videos`.`video_id` AS `id`,
		`videos`.`updated` AS `time`,
		`videos`.`title` AS `title`,
		`videos`.`desc` AS `content`,
		NULL AS `img`,
		`videos`.`url_video_youtube` AS `file`,
		`users`.`name` AS `user`,
		`users`.`img_user` AS `img_user`,
		'video' AS `type`,
		NULL AS `group_id`,
		NULL AS `group`
	FROM (`videos` LEFT JOIN `users` ON ((`users`.`user_id` = `videos`.`user_id`)))
	WHERE ((`videos`.`type` = 'video')
		OR (`videos`.`type` = 'praktek'))
	UNION SELECT
		`artikel`.`artikel_id` AS `id`,
		`artikel`.`updated` AS `time`,
		`artikel`.`judul` AS `title`,
		`artikel`.`isi` AS `content`,
		`artikel`.`img_artikel` AS `img`,
		NULL AS `file`,
		`users`.`name` AS `user`,
		`users`.`img_user` AS `img_user`,
		'artikel' AS `type`,
		`groups`.`group_id` AS `group_id`,
		`groups`.`group_name` AS `group`
	FROM (`artikel` LEFT JOIN `users` ON ((`users`.`user_id` = `artikel`.`user_id`)) LEFT JOIN `groups` ON ((`groups`.`group_id` = `artikel`.`group_id`)))
	UNION SELECT
		`pertanyaan`.`pertanyaan_id` AS `id`,
		`pertanyaan`.`updated` AS `time`,
		`pertanyaan`.`judul_pertanyaan` AS `title`,
		CONCAT(`pertanyaan`.`ket_pertanyaan`, '|||', `pertanyaan`.`jawaban`) AS `content`,
		NULL AS `img`,
		NULL AS `file`,
		'Tanya Ustadz' AS `user`,
		NULL AS `img_user`,
		'pertanyaan' AS `type`,
		`groups`.`group_id` AS `group_id`,
		`groups`.`group_name` AS `group`
	FROM (`pertanyaan` LEFT JOIN `users` ON ((`users`.`user_id` = `pertanyaan`.`user_id`)) LEFT JOIN `groups` ON ((`groups`.`group_id` = `pertanyaan`.`group_id`)))
	WHERE (`pertanyaan`.`status` = 's')
	UNION SELECT
		`forums`.`forum_id` AS `id`,
		`forums`.`updated` AS `time`,
		`forums`.`title` AS `title`,
		`posts`.`description` AS `content`,
		NULL AS `img`,
		NULL AS `file`,
		`users`.`name` AS `user`,
		`users`.`img_user` AS `img_user`,
		'forum' AS `type`,
		`groups`.`group_id` AS `group_id`,
		`groups`.`group_name` AS `group`
	FROM (`forums` LEFT JOIN `posts` ON((`forums`.`forum_id` = `posts`.`forum_id`)) LEFT JOIN `users` ON ((`users`.`user_id` = `forums`.`user_id`)) LEFT JOIN `groups` ON ((`groups`.`group_id` = `forums`.`group_id`)))
	WHERE (`forums`.`status` = 'a')
	UNION SELECT
		`produk`.`id_produk` AS `id`,
		`produk`.`updated` AS `time`,
		`produk`.`judul` AS `title`,
		`produk`.`sinopsis` AS `content`,
		`produk`.`img_buku` AS `img`,
		NULL AS `file`,
		'Salwa Market' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'produk' AS `type`,
		`groups`.`group_id` AS `group_id`,
		`groups`.`group_name` AS `group`
	FROM (`produk` LEFT JOIN `groups` ON ((`groups`.`group_id` = `produk`.`group_id`)))
	UNION SELECT
		`peduli`.`peduli_id` AS `id`,
		`peduli`.`updated` AS `time`,
		`peduli`.`judul` AS `title`,
		`peduli`.`isi` AS `content`,
		`peduli`.`img_artikel` AS `img`,
		NULL AS `file`,
		'Salwa Peduli' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'peduli' AS `type`,
		`groups`.`group_id` AS `group_id`,
		`groups`.`group_name` AS `group`
	FROM (`peduli` LEFT JOIN `users` ON ((`users`.`user_id` = `peduli`.`user_id`)) LEFT JOIN `groups` ON ((`groups`.`group_id` = `peduli`.`group_id`)))
	UNION SELECT
		`buku`.`buku_id` AS `id`,
		`buku`.`updated` AS `time`,
		`buku`.`judul` AS `title`,
		`buku`.`materi` AS `content`,
		`buku`.`img_buku` AS `img`,
		`buku`.`file_pdf` AS `file`,
		'Kitab & Terjemahan' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'kitab' AS `type`,
		`groups`.`group_id` AS `group_id`,
		`groups`.`group_name` AS `group`
	FROM (`buku` LEFT JOIN `groups` ON ((`groups`.`group_id` = `buku`.`group_id`)))
	UNION SELECT
		`hadist`.`hadist_id` AS `id`,
		`hadist`.`updated` AS `time`,
		`hadist`.`judul` AS `title`,
		CONCAT(`hadist`.`hadist`, '|||', `hadist`.`penjelasan`) AS `content`,
		NULL AS `img`,
		NULL AS `file`,
		'Kumpulan Hadist, Dzikir dan Doa' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'hadist' AS `type`,
		`groups`.`group_id` AS `group_id`,
		`groups`.`group_name` AS `group`
	FROM (`hadist` LEFT JOIN `groups` ON ((`groups`.`group_id` = `hadist`.`group_id`)))
	UNION SELECT
		`mp3_download`.`mp3_download_id` AS `id`,
		`mp3_download`.`updated` AS `time`,
		`mp3_download`.`judul` AS `title`,
		`mp3_download`.`keterangan` AS `content`,
		NULL AS `img`,
		`mp3_download`.`file_mp3` AS `file`,
		'Salwa Audio' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'audio' AS `type`,
		`groups`.`group_id` AS `group_id`,
		`groups`.`group_name` AS `group`
	FROM (`mp3_download` LEFT JOIN `groups` ON ((`groups`.`group_id` = `mp3_download`.`group_id`)))
	UNION SELECT
		`murotal`.`murotal_id` AS `id`,
		`murotal`.`updated` AS `time`,
		`murotal`.`nama_surat` AS `title`,
		`murotal`.`keterangan` AS `content`,
		NULL AS `img`,
		`murotal`.`file_mp3` AS `file`,
		'Murottal' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'murottal' AS `type`,
		`groups`.`group_id` AS `group_id`,
		`groups`.`group_name` AS `group`
	FROM (`murotal` LEFT JOIN `groups` ON ((`groups`.`group_id` = `murotal`.`group_id`)))
	UNION SELECT
		`salwaimages`.`id_salwaimages` AS `id`,
		`salwaimages`.`updated` AS `time`,
		`salwaimages`.`judul` AS `title`,
		NULL AS `content`,
		`salwaimages`.`img_images` AS `img`,
		NULL AS `file`,
		'Salwa Images' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'image' AS `type`,
		`groups`.`group_id` AS `group_id`,
		`groups`.`group_name` AS `group`
	FROM (`salwaimages`  LEFT JOIN `groups` ON ((`groups`.`group_id` = `salwaimages`.`group_id`)))
	UNION SELECT
		`informasi`.`informasi_id` AS `id`,
		`informasi`.`updated` AS `time`,
		`informasi`.`judul` AS `title`,
		`informasi`.`content` AS `content`,
		`informasi`.`img_gambar` AS `img`,
		NULL AS `file`,
		'Salwa Info' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'informasi' AS `type`,
		`groups`.`group_id` AS `group_id`,
		`groups`.`group_name` AS `group`
	FROM (`informasi` LEFT JOIN `groups` ON ((`groups`.`group_id` = `informasi`.`group_id`)))
	UNION SELECT
		`tb_kajian`.`kajian_id` AS `id`,
		`tb_kajian`.`updated` AS `time`,
		`tb_kajian`.`kajian_tema` AS `title`,
		NULL AS `content`,
		`tb_kajian`.`img_kajian_photo` AS `img`,
		NULL AS `file`,
		'Info Kajian' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'kajian' AS `type`,
		`tb_kajian`.`jenis_kajian` AS `group_id`,
		NULL AS `group`
	FROM `tb_kajian`
