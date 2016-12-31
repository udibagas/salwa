<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peduli extends Model
{
	protected $table = 'peduli';

    protected $dates = ['created', 'updated'];

	protected $primaryKey = 'peduli_id';

	protected $fillable = [
		'judul', 'isi', 'isi_mobile', 'ringkasan',
		'kd_judul', 'updatedby', 'user_id',
		'createdby', 'group_id', 'img_artikel'
	];

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $with = ['user', 'group'];

	protected $appends = ['img', 'imgSquare', 'url', 'title'];

	protected $hidden = ['peduli_id'];

	public function getUrlAttribute()
    {
        return '/peduli/'.$this->peduli_id.'-'.str_slug($this->judul);
    }

	public function getTitleAttribute()
    {
        return $this->judul;
    }

	public function getIdAttribute()
    {
        return $this->peduli_id;
    }

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}

	public function group()
	{
		return $this->belongsTo('App\Group', 'group_id', 'group_id');
	}

	public function comments()
	{
		return $this->morphMany('App\Comment', 'commentable');
	}

	public function getImgAttribute($value)
	{
		return $this->img_artikel
			? 'http://www.salamdakwah.com/'.$this->img_artikel
			: 'http://www.salamdakwah.com/images/salwa-peduli.jpg';
	}

	public function getImgSquareAttribute($value)
	{
		return $this->img_artikel
			? 'http://www.salamdakwah.com/'.$this->img_artikel
			: 'http://www.salamdakwah.com/images/salwa-peduli-quare.png';
	}
}
