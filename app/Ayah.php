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
		return [
			"Abdullah_Matroud_128kbps" => "Abdullah Al Matroud",
			"Abdurrahmaan_As-Sudais_64kbps" => "Abdurahman As Sudais",
			"Ghamadi_40kbps" => "Ghamidi",
			"Hani_Rifai_64kbps" => "Hani Rifai",
			"Hudhaify_64kbps" => "Hudhaify",
			"Husary_64kbps" => "Husary",
			"Misyary_Al_Afasy_64kbps" => "Misyari Al Afasy",
			"Saood_ash-Shuraym_64kbps" => "Saud Asy Syuraim"
		];
	}
}
