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
		return $this->belongsTo('App\Surah', 'ayat_id', 'id');
	}
}
