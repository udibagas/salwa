<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ayah extends Model
{
	protected $connection = 'mysql2';

    public $table = 'ayah';

	public $timestamps = false;

	public function surat()
	{
		return $this->belongsTo('App\Surah', 'surat_id', 'id');
	}

	public static function getQariList()
	{
		$dirs = scandir('quran_audio');
		$qari = [];

		foreach ($dirs as $d) {
			if (!in_array($d, ['.', '..'])) {
				$qari[$d] = $d;
			}
		}

		return $qari;
	}
}
