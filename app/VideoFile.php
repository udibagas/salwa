<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoFile extends Model
{
	protected $table = 'videofiles';

	protected $primaryKey = 'file_id';

	public $timestamps = false;

	public function video()
	{
		return $this->belongsTo('App\Video', 'video_id', 'video_id');
	}

	public function scopeWeb($query)
	{
		return $query->where('type', 'w');
	}

	public function scopeMobile($query)
	{
		return $query->where('type', 'm');
	}

	public function scopeCdn($query)
	{
		return $query->where('type', 'cdn');
	}
}
