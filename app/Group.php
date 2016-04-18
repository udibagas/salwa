<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    protected $table = 'groups';

	protected $dates = ['created', 'updated'];

	public function group()
	{
		return $this->belongsTo('App\Group', 'group_id', 'group_id');
	}
}
