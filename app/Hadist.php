<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hadist extends Model
{
    protected $table = 'hadist';

	protected $dates = ['created', 'updated', 'tanggal'];

	protected $primaryKey = 'hadist_id';

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $with = ['group'];

	protected $hidden = ['created', 'updated', 'createdby', 'updatedby', 'dilihat'];

    protected $appends = ['url'];

    public function getUrlAttribute()
    {
        return '/hadist/'.$this->hadist_id.'-'.str_slug($this->judul);
    }

	public function getTanggalAttribute($value)
	{
		return date('d/m/Y H:i:s', strtotime($value));
	}

	protected $fillable = [
		'judul', 'hadist', 'ringkasan', 'penjelasan', 'tanggal',
		'kd_judul', 'updatedby', 'createdby', 'group_id',
	];

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

	public function comments()
	{
		return $this->morphMany('App\Comment', 'commentable');
	}
}
