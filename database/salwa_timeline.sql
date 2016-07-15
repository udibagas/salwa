CREATE ALGORITHM=UNDEFINED
	DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `salwa_timeline`
AS
	SELECT
		`videos`.`video_id` AS `id`,
		`videos`.`date` AS `time`,
		`videos`.`title` AS `title`,
		`videos`.`desc` AS `content`,
		NULL AS `img`,
		`videos`.`url_video_youtube` AS `file`,
		`users`.`name` AS `user`,
		`users`.`img_user` AS `img_user`,
		'video' AS `type`
	FROM (`videos` JOIN `users` ON ((`users`.`user_id` = `videos`.`user_id`)))
	WHERE ((`videos`.`type` = 'video')
		OR (`videos`.`type` = 'praktek'))
	UNION SELECT
		`artikel`.`artikel_id` AS `id`,
		`artikel`.`tgl_artikel` AS `time`,
		`artikel`.`judul` AS `title`,
		`artikel`.`isi` AS `content`,
		`artikel`.`img_artikel` AS `img`,
		NULL AS `file`,
		`users`.`name` AS `user`,
		`users`.`img_user` AS `img_user`,
		'artikel' AS `type`
	FROM (`artikel` JOIN `users` ON ((`users`.`user_id` = `artikel`.`user_id`)))
	UNION SELECT
		`pertanyaan`.`pertanyaan_id` AS `id`,
		`pertanyaan`.`tgl_tanya` AS `time`,
		`pertanyaan`.`judul_pertanyaan` AS `title`,
		`pertanyaan`.`ket_pertanyaan` AS `content`,
		NULL AS `img`,
		NULL AS `file`,
		'Tanya Ustadz' AS `user`,
		NULL AS `img_user`,
		'pertanyaan' AS `type`
	FROM (`pertanyaan` JOIN `users` ON ((`users`.`user_id` = `pertanyaan`.`user_id`)))
	WHERE (`pertanyaan`.`status` = 's')
	UNION SELECT
		`forums`.`forum_id` AS `id`,
		`forums`.`date` AS `time`,
		`forums`.`title` AS `title`,
		`posts`.`description` AS `content`,
		NULL AS `img`,
		NULL AS `file`,
		`users`.`name` AS `user`,
		`users`.`img_user` AS `img_user`,
		'forum' AS `type`
	FROM (`forums` JOIN `posts` ON((`forums`.`forum_id` = `posts`.`forum_id`)) JOIN `users` ON ((`users`.`user_id` = `forums`.`user_id`)))
	WHERE (`forums`.`status` = 'a')
	UNION SELECT
		`produk`.`id_produk` AS `id`,
		`produk`.`created` AS `time`,
		`produk`.`judul` AS `title`,
		`produk`.`sinopsis` AS `content`,
		`produk`.`img_buku` AS `img`,
		NULL AS `file`,
		'Salwa Market' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'produk' AS `type`
	FROM `produk`
	UNION SELECT
		`peduli`.`peduli_id` AS `id`,
		`peduli`.`tgl_artikel` AS `time`,
		`peduli`.`judul` AS `title`,
		`peduli`.`isi` AS `content`,
		`peduli`.`img_artikel` AS `img`,
		NULL AS `file`,
		'Salwa Peduli' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'peduli' AS `type`
	FROM (`peduli` JOIN `users` ON ((`users`.`user_id` = `peduli`.`user_id`)))
	UNION SELECT
		`buku`.`buku_id` AS `id`,
		`buku`.`created` AS `time`,
		`buku`.`judul` AS `title`,
		`buku`.`materi` AS `content`,
		`buku`.`img_buku` AS `img`,
		`buku`.`file_pdf` AS `file`,
		'Kitab & Terjemahan' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'kitab' AS `type`
	FROM `buku`
	UNION SELECT
		`hadist`.`hadist_id` AS `id`,
		`hadist`.`tanggal` AS `time`,
		`hadist`.`judul` AS `title`,
		`hadist`.`penjelasan` AS `content`,
		NULL AS `img`,
		NULL AS `file`,
		'Kumpulan Hadist Dzikir Doa' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'hadist' AS `type`
	FROM `hadist`
	UNION SELECT
		`mp3_download`.`mp3_download_id` AS `id`,
		`mp3_download`.`created` AS `time`,
		`mp3_download`.`judul` AS `title`,
		`mp3_download`.`keterangan` AS `content`,
		NULL AS `img`,
		`mp3_download`.`file_mp3` AS `file`,
		'Salwa Audio' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'audio' AS `type`
	FROM `mp3_download`
	UNION SELECT
		`murotal`.`murotal_id` AS `id`,
		`murotal`.`created` AS `time`,
		`murotal`.`nama_surat` AS `title`,
		`murotal`.`keterangan` AS `content`,
		NULL AS `img`,
		`murotal`.`file_mp3` AS `file`,
		'Murottal' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'murottal' AS `type`
	FROM `murotal`
	UNION SELECT
		`salwaimages`.`id_salwaimages` AS `id`,
		`salwaimages`.`tanggal` AS `time`,
		`salwaimages`.`judul` AS `title`,
		NULL AS `content`,
		`salwaimages`.`img_images` AS `img`,
		NULL AS `file`,
		'Salwa Images' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'image' AS `type`
	FROM `salwaimages`
	UNION SELECT
		`informasi`.`informasi_id` AS `id`,
		`informasi`.`tanggal` AS `time`,
		`informasi`.`judul` AS `title`,
		`informasi`.`content` AS `content`,
		`informasi`.`img_gambar` AS `img`,
		NULL AS `file`,
		'Salwa Info' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'informasi' AS `type`
	FROM `informasi`
	UNION SELECT
		`tb_kajian`.`kajian_id` AS `id`,
		`tb_kajian`.`created` AS `time`,
		`tb_kajian`.`kajian_tema` AS `title`,
		NULL AS `content`,
		`tb_kajian`.`img_kajian_photo` AS `img`,
		NULL AS `file`,
		'Info Kajian' AS `user`,
		'images/logo-padding.png' AS `img_user`,
		'kajian' AS `type`
	FROM `tb_kajian`
