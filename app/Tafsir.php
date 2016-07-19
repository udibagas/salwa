<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tafsir extends Model
{
    public $table = 'tafsir';

	public $timestamps = false;

	protected $fillable = ['surah_id', 'from_ayah', 'to_ayah', 'tafsir'];

	public function surah()
	{
		return $this->belongsTo('App\Surah');
	}
}
