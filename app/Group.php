<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

	protected $primaryKey = 'group_id';

	protected $dates = ['created', 'updated'];

	public function group()
	{
		return $this->belongsTo('App\Group', 'group_id', 'group_id');
	}

	public function forums()
	{
		return $this->hasMany('App\Forum', 'group_id', 'group_id');
	}

	public function scopeForum($query)
	{
		return $query->where('type', 'forum');
	}
}
