<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $dates = ['created', 'updated'];

	protected $primaryKey = 'video_id';

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
}
