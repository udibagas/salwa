<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalwaTimeline extends Model
{
    public $table = 'salwa_search';

	public $dates = ['tanggal'];

	// public function user()
	// {
	// 	return $this->belongsTo('App\User', 'user_id', 'user_id');
	// }
}
