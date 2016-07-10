<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuranIndo extends Model
{
	protected $connection = 'mysql2';
	
	public $table = 'quran_indo';

	public $timestamps = false;
}
