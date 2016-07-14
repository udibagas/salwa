<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalwaTimeline extends Model
{
    public $table = 'salwa_timeline';

	public $dates = ['created', 'updated'];

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}
}
