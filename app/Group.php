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

	public function artikels()
	{
		return $this->hasMany('App\Artikel', 'group_id', 'group_id');
	}

	public function informasis()
	{
		return $this->hasMany('App\Informasi', 'group_id', 'group_id');
	}

	public function pedulis()
	{
		return $this->hasMany('App\Peduli', 'group_id', 'group_id');
	}

	public function scopeForum($query)
	{
		return $query->where('type', 'forum');
	}

	public function scopeArtikel($query)
	{
		return $query->where('type', 'artikel');
	}

	public function scopeInformasi($query)
	{
		return $query->where('type', 'informasi');
	}

	public function scopePeduli($query)
	{
		return $query->where('type', 'peduli');
	}
}
