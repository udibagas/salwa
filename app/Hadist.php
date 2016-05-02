<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hadist extends Model
{
    protected $table = 'hadist';

	protected $dates = ['created', 'updated'];

	protected $primaryKey = 'hadist_id';

	public function group()
	{
		return $this->belongsTo('App\Group', 'group_id', 'group_id');
	}
}
