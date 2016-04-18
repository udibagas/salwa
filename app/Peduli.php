<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peduli extends Model
{
	protected $table = 'peduli';

    protected $dates = ['created', 'updated'];

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}
}
