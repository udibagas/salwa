<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mp3 extends Model
{
	protected $table = 'mp3_download';

    protected $dates = ['created', 'updated'];

	protected $primaryKey = 'mp3_download_id';

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $fillable = [
		'judul', 'kd_judul', 'file_mp3', 'group_id',
		'createdby', 'updatedby', 'keterangan'
	];

	// protected $with = ['group'];

	public function group()
	{
		return $this->belongsTo('App\Group', 'group_id', 'group_id');
	}

	public function comments()
	{
		return $this->morphMany('App\Comment', 'commentable');
	}
}
