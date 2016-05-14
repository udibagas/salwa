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

	public function scopeDoa($query)
	{
		return $query->join('groups', 'groups.group_id', '=', 'hadist.group_id')->where('groups.group_name', 'Doa');
	}

	public function scopeDzikir($query)
	{
		return $query->join('groups', 'groups.group_id', '=', 'hadist.group_id')->where('groups.group_name', 'Dzikir');
	}

	public function scopeHadist($query)
	{
		return $query->join('groups', 'groups.group_id', '=', 'hadist.group_id')->where('groups.group_name', 'Kumpulan Hadits');
	}
}
