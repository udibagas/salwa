<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $dates = ['created', 'updated'];

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}
}
