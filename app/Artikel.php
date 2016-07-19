<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';

	protected $dates = ['created', 'updated'];

	protected $primaryKey = 'artikel_id';

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $with = ['user', 'group'];

	public $appends = ['img'];

	protected $fillable = [
		'judul', 'isi', 'isi_mobile', 'ringkasan',
		'kd_judul', 'updatedby', 'user_id',
		'createdby', 'group_id', 'img_artikel'
	];

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
