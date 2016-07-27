<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalwaTimeline extends Model
{
    public $table = 'salwa_timeline';

	public $dates = ['time'];

	// public $appends = ['hadist', 'penjelasanHadist', 'pertanyaan', 'jawaban'];

	public function getContentAttribute($value)
	{
		$stripedContent = strip_tags($value, '<img><br><br /><ul><li><ol><strong><i><span>');
		// $stripedContent = preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>', $stripedContent);
		// return $stripedContent;
		return str_replace('&nbsp;', ' ', $stripedContent);

		// $text = '<p style="padding:0px;"><strong style="padding:0;margin:0;">hello</strong></p>';
		// echo preg_replace("/<([a-z][a-z0-9]*)[^>]*?(\/?)>/i",'<$1$2>', $text);
	}

	// public function getHadistAttribute($value)
	// {
	// 	if ($this->type == 'hadist') {
	// 		$content = explode('|||', $this->content);
	// 		return $content[0];
	// 	}
	//
	// 	return null;
	// }
	//
	// public function getPenjelasanHadistAttribute($value)
	// {
	// 	if ($this->type == 'hadist') {
	// 		$content = explode('|||', $this->content);
	// 		return (isset($content[1]))
	// 			? str_replace('&nbsp;', ' ', nl2br(strip_tags($content[1], '<a><em><i><strong><b><br><br /><ul><li><ol>')))
	// 			: '';
	// 	}
	//
	// 	return null;
	// }
	//
	// public function getPertanyaanAttribute($value)
	// {
	// 	if ($this->type == 'pertanyaan') {
	// 		$content = explode('|||', $this->content);
	// 		return $content[0];
	// 	}
	//
	// 	return null;
	// }
	//
	// public function getJawabanAttribute($value)
	// {
	// 	if ($this->type == 'pertanyaan') {
	// 		$content = explode('|||', $this->content);
	// 		return (isset($content[1]))
	// 			? str_replace('&nbsp;', ' ', nl2br(strip_tags($content[1], '<a><img><em><i><strong><b><br><br /><ul><li><ol>')))
	// 			: '';
	// 	}
	//
	// 	return null;
	// }

}
