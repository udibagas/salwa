<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	public static function typeList()
	{
		return [
			'artikel' 	=> 'artikel',
			'audio'		=> 'audio',
			'informasi' => 'informasi',
			'peduli' 	=> 'peduli',
			'produk'	=> 'produk',
			'video' 	=> 'video',
		];
	}

	protected $fillable = [
		'user_id', 'commentable_id', 'title', 'content',
		'star', 'commentable_type', 'parent_id', 'approved'
	];

	protected $with = ['user'];

	public function commentable()
	{
		return $this->morphTo();
	}

    public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'user_id');
	}

    public function parent()
	{
		return $this->belongsTo('App\Comment', 'parent_id', 'id');
	}

	public function scopeOfType($query, $type)
	{
		return $query->where('commentable_type', $type);
	}

	public function scopeApproved($query)
	{
		return $query->where('approved', 1);
	}

	public function scopeUnapproved($query)
	{
		return $query->where('approved', 0);
	}
}
