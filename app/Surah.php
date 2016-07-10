<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surah extends Model
{
	protected $connection = 'mysql2';

    public $table = 'surah';

	public $timestamps = false;

	public function ayats()
	{
		return $this->hasMany('App\Ayah', 'surat_id', 'id');
	}
}
