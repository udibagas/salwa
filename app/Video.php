<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $dates = ['created', 'updated'];

	protected $primaryKey = 'video_id';

	const CREATED_AT = 'created';

	const UPDATED_AT = 'updated';

	protected $with = ['user'];

	protected $fillable = [
		'title', 'title_code', 'date', 'desc',
		'updatedby', 'user_id', 'url_video_youtube',
		'createdby', 'group_id', 'img_video'
	];


	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}

	public function files()
	{
		return $this->hasMany('App\VideoFile', 'video_id', 'video_id');
	}

	public function scopeAudio($query)
	{
		return $query->where('type', 'audio');
	}

	public function scopeVideo($query)
	{
		return $query->where('type', 'video');
	}

	public function comments()
	{
		return $this->hasMany('App\Comment', 'post_id', 'video_id');
	}
}
