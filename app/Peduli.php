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
}
